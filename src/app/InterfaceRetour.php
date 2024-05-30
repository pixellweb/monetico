<?php


namespace PixellWeb\Monetico\app;



class InterfaceRetour
{


    static public function codeRetourOk()
    {
        return "version=2\ncdr=0\n";
    }

    static public function codeRetourKo()
    {
        return "version=2\ncdr=1\n";
    }

}
