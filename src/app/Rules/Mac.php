<?php

namespace PixellWeb\Monetico\app\Rules;


use Illuminate\Contracts\Validation\Rule;
use PixellWeb\Monetico\Kit\HmacComputer;


class Mac implements Rule
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
        $fileds = request()->except('MAC');
        return (new HmacComputer())->validateSeal($fileds, config('monetico.cle_mac'), request('MAC'));;
    }



    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Problème de sécurité. La signature MAC n\'est pas valide.';
    }
}
