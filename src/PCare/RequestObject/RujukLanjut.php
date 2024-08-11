<?php

namespace BpjsBridging\PCare\RequestObject;

abstract class RujukLanjut
{
    protected string $tglEstRujuk;
    protected string $kdppk;

    public function __construct(string $tglEstRujuk, string $kdppk)
    {
        $this->tglEstRujuk = $tglEstRujuk;
        $this->kdppk = $kdppk;
    }

    public function toData()
    {
        return [
            "tglEstRujuk" => $this->tglEstRujuk,
            "kdppk" => $this->kdppk
        ];
    }
}
