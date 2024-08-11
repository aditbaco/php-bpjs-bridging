<?php

namespace BpjsBridging\PCare\RequestObject;

class RujukLanjutKhusus extends RujukLanjut
{
    private $kdKhusus;
    private $kdSubSpesialis;
    private $catatan;

    public function __construct(string $tglEstRujuk, string $kdppk, string $kdKhusus, string $kdSubSpesialis = null, string $catatan = '')
    {
        parent::__construct($tglEstRujuk, $kdppk);
        $this->kdKhusus = $kdKhusus;
        $this->kdSubSpesialis = $kdSubSpesialis;
        $this->catatan = $catatan;
    }

    public function toData()
    {
        $data = parent::toData();
        $data['subSpesialis'] = null;
        $data['khusus'] = [
            'kdKhusus' => $this->kdKhusus,
            'kdSubSpesialis' => $this->kdSubSpesialis,
            'catatan' => $this->catatan,
        ];

        return $data;
    }
}
