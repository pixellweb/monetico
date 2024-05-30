<?php

namespace PixellWeb\Monetico\app\FormRequest;


use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest as HttpFormRequest;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;
use PixellWeb\Monetico\app\InterfaceRetour;
use PixellWeb\Monetico\app\Rules\CodeRetour;
use PixellWeb\Monetico\app\Rules\Mac;


class IPNResponse extends HttpFormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'reference'   => ['required', config('monetico.rule_exists')],
            'query'       => ['required', new Mac()],
            'MAC'         => 'required',
            'date'        => 'required',
            'montant'     => 'required',
            //'texte-libre' => 'required',
            'code-retour' => ['required', new CodeRetour()],
            'cvx'         => 'required',
            'vld'         => '',
            'brand'       => 'required',
            //'status3ds'   => 'required',
            'numauto'     => 'required',
            'originecb'   => 'required',
            'bincb'       => '',
            'hpancb'      => '',
            'ipclient'    => 'required',
            'originetr'   => 'required',
            /*'veres' => 'required',  3D secure
            'pares' => 'required',*/
            'motifrefus'  => '',
        ];
    }


    protected function prepareForValidation()
    {
        Log::channel(config('monetico.logging_channel'))->info('Traitement IPN', $this->all());
        Log::channel(config('monetico.logging_channel'))->info($this->getQueryString());

        $this->merge([
            'query' => $this->all()
        ]);
    }


    protected function failedValidation(\Illuminate\Validation\Validator|Validator $validator)
    {
        Log::channel(config('monetico.logging_channel'))->critical($validator->messages());

        exit(isset($validator->failed()['MAC']) ? InterfaceRetour::codeRetourKo() : InterfaceRetour::codeRetourOk());
    }


}
