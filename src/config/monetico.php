<?php

use Illuminate\Validation\Rule;
use Ipsum\Reservation\app\Models\Reservation\Reservation;

return [

    'cle_mac' => env('MONETICO_CLE_MAC'),
    'tpe'     => env('MONETICO_TPE'),
    'code_societe' => env('MONETICO_CODE_SOCIETE'),
    'payment_page_url' => env('MONETICO_TEST') ? 'https://p.monetico-services.com/test/paiement.cgi' : 'https://p.monetico-services.com/paiement.cgi',


    'cle_version' => "3.0",


    'logging_channel' => 'paiement',

    'rule_exists' => 'exists:reservations,reference',

];
