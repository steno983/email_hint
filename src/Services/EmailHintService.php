<?php

namespace Steno983\EmailHint\Services;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class EmailHintService
{
    public function setUp()
    {
        $this->app->register(\Steno983\EmailHint\EmailHintServiceProvider::class);
    }

    public function hint(string $email): ?string
    {
        $validator = Validator::make(['email' => $email], [
            'email' => ['email', 'required']
        ]);

        if ($validator->fails()) {
            throw new \InvalidArgumentException('Valid email formatted expected');
        }

        $domainToCheck = Str::of($email)->after('@')->toString();
        $domains = Config::get('emailhint.domains', []);

        if (in_array($domainToCheck, $domains) || in_array($domainToCheck, Config::get('emailhint.exclude', []))) {
            return null;
        }

        $shortest = -1;
        $closest = $domainToCheck;
        foreach ($domains as $domain) {
            $levenshtein = levenshtein($domainToCheck, $domain);
            if ($levenshtein <= $shortest || $shortest < 0) {
                $closest = $domain;
                $shortest = $levenshtein;
            }
        }
        return Str::of($email)->replace($domainToCheck, $closest)->toString();
    }
}