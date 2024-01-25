<?php

namespace Steno983\EmailHint;

use Illuminate\Support\ServiceProvider;

class EmailHintServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../config/emailhint.php', 'emailhint'
        );

        $this->publishes([
            __DIR__ . '/../config/emailhint.php' => config_path('emailhint.php'),
        ]);
    }
}