<?php


namespace PixellWeb\Monetico\app;


class MoneticoException extends \Exception
{
    /**
     * ReferentielApiException constructor.
     * @param string $message
     * @param int $code
     * @param \Throwable|null $previous
     */
    public function __construct($message = "", $code = 0, \Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
        \Log::channel(config('monetico.logging_channel'))->alert($message);
    }
}
