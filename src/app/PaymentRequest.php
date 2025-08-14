<?php


namespace PixellWeb\Monetico\app;

use PixellWeb\Monetico\Kit\Collections\Currency;
use PixellWeb\Monetico\Kit\Collections\Language;
use PixellWeb\Monetico\Kit\Request\OrderContext;
use PixellWeb\Monetico\Kit\Request\PaymentRequest as KitPaymentRequest;

class PaymentRequest extends KitPaymentRequest 
{



    public function __construct(string $reference, float $montant, OrderContext $contexteCommande, string $mail)
    {
        parent::__construct($reference, number_format($montant, 2), Currency::EUR, Language::FR, $contexteCommande);

        // Mail obligatoire, sinon, il n'y a pas de retour automatique sur le site après paiement
        $this->setMail($mail);
    }

    protected function paymentPageUrl(): string
    {
        return config('monetico.test') ? config('monetico.payment_page_url_test') : config('monetico.payment_page_url_prod');
    }


    public function link()
    {
        $query = '';
        foreach ($this->getFormFields() as $key => $value) {
            $query .= "&" . $key . '=' . urlencode($value);
        }
        $query = ltrim($query, '&');

        return $this->paymentPageUrl() . '?' . $query;
    }


}
