<?php

namespace BpjsBridging\PCare\RequestObject;

class RujukLanjutSpesialis extends RujukLanjut
{
    private $kdSubSpesialis;
    private $kdSarana;

    public function __construct(string $tglEstRujuk, string $kdppk, string $kdSubSpesialis, string $kdSarana = null)
    {
        parent::__construct($tglEstRujuk, $kdppk);
        $this->kdSubSpesialis = $kdSubSpesialis;
        $this->kdSarana = $kdSarana;
    }

    public function toData()
    {
        $data = parent::toData();
        $data['khusus'] = null;
        $data['subSpesialis'] = [
            'kdSubSpesialis1' => $this->kdSubSpesialis,
            'kdSarana' => $this->kdSarana
        ];
        return $data;
    }
}
