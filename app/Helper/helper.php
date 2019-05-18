<?php

use App\Jobs\MailNotifyJob;
// helper added into autoloader of composer.json


if (!function_exists('sendMySMTP')) {

    function sendMySMTP(array $data) {

        try {
            dispatch(new MailNotifyJob($data));

		} catch (\Exception $e) {
			throw $e;
		}
    }
}
