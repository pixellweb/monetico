<?php

namespace PixellWeb\Monetico\app\Rules;

use Illuminate\Contracts\Validation\Rule;


class CodeRetour implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string $attribute
     * @param  mixed $value
     * @return bool
     * @throws \Exception
     */
    public function passes($attribute, $value)
    {
        return $value === 'payetest' or $value === 'paiement';
    }



    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Problème de sécurité. Le code retour n\'est pas valide.';
    }
}
