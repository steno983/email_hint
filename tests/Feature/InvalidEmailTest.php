<?php

use Illuminate\Support\Str;
use Steno983\EmailHint\Services\EmailHintService;

test('that an invalid email show suggestions', function () {
    $emails = [
        'abcdefg@gmil.com',
        'abcdefg@hotmmail.com',
        'abcdefg@iclaud.com',
    ];

    foreach ($emails as $mail) {
        $ehs = new EmailHintService();
        $res = $ehs->hint($mail);
        expect($res)->not->toBeNull();
    }
});

it('will replace wrong domain with correct gmail', function () {
    $emails = [
        'abcdefg@gmil.com',
        'abcdefg@gmai.com',
        'abcdefg@gomail.com',
    ];

    foreach ($emails as $mail) {
        $a = Str::of($mail)
            ->before('@')
            ->toString();
        $ehs = new EmailHintService();
        $res = $ehs->hint($mail);
        expect($res)->toEqual($a . '@gmail.com');
    }
});

it('will replace wrong domain with correct hotmail', function () {
    $emails = [
        'abcdefg@hotmail.it',
        'abcdefg@hotmai.com',
        'abcdefg@otmail.com',
    ];

    foreach ($emails as $mail) {
        $a = Str::of($mail)
            ->before('@')
            ->toString();
        $ehs = new EmailHintService();
        $res = $ehs->hint($mail);
        expect($res)->toEqual($a . '@hotmail.com');
    }
});
