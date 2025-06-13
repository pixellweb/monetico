<?php

use Illuminate\Validation\Rule;
use Ipsum\Reservation\app\Models\Reservation\Reservation;

return [

    'test' => env('MONETICO_TEST', false),
    'cle_mac' => env('MONETICO_CLE_MAC'),
    'tpe'     => env('MONETICO_TPE'),
    'code_societe' => env('MONETICO_CODE_SOCIETE'),
    'payment_page_url_test' => 'https://p.monetico-services.com/test/paiement.cgi',
    'payment_page_url_prod' => 'https://p.monetico-services.com/paiement.cgi',


    'cle_version' => "3.0",


    'logging_channel' => 'paiement',

    'rule_exists' => 'exists:reservations,reference',

];
