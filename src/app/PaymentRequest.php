<?php


namespace PixellWeb\Monetico\app;

use PixellWeb\Monetico\Kit\Collections\Currency;
use PixellWeb\Monetico\Kit\Collections\Language;
use PixellWeb\Monetico\Kit\Request\OrderContext;
use PixellWeb\Monetico\Kit\Request\PaymentRequest as KitPaymentRequest;

class PaymentRequest extends KitPaymentRequest 
{



    public function __construct(string $reference, float $montant, OrderContext $contexteCommande)
    {
        parent::__construct($reference, $montant, Currency::EUR, Language::FR, $contexteCommande);
    }


    public function link()
    {
        $query = '';
        foreach ($this->getFormFields() as $key => $value) {
            $query .= "&" . $key . '=' . urlencode($value);
        }
        $query = ltrim($query, '&');

        return config('monetico.payment_page_url') . '?' . $query;
    }


}
