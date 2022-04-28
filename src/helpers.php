<?php

use SachinKiranti\SparrowSms\SparrowSms;

if (! function_exists('send_sparrow_sms')) :

    function send_sparrow_sms ($recipients, $message) {
        return (new SparrowSms($recipients, $message))->send();
    }

endif;

if (! function_exists('get_sparrow_sms_credit')) :

    function get_sparrow_sms_credit () {
        return (new SparrowSms('', ''))->credit();
    }

endif;