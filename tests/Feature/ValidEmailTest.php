<?php

use Steno983\EmailHint\Services\EmailHintService;

test('that a valid email didn\'t show suggestions', function () {
    $emails = [
        'abcdefg@gmail.com',
        'abcdefg@hotmail.com',
        'abcdefg@icloud.com',
    ];

    foreach($emails as $mail){
        $ehs = new EmailHintService();
        $res = $ehs->hint($mail);
        expect($res)->toBeNull();
    }
});
