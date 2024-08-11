<?php

namespace BpjsBridging\PCare\RequestObject;

use BpjsBridging\RequestObject;
use Carbon\Carbon;

class ObatRequest implements RequestObject
{
    private $kdObatSK;
    private $noKunjungan;
    private $racikan;
    private $kdRacikan;
    private $obatDPHO;
    private $kdObat;
    private $signa1;
    private $signa2;
    private $jmlObat;
    private $jmlPermintaan;
    private $nmObatNonDPHO;

    public function __construct(
        int $kdObatSK = 0,
        string $noKunjungan = null,
        bool $racikan = true,
        ?string $kdRacikan = null,
        bool $obatDPHO = true,
        string $kdObat = null,
        int $signa1 = 0,
        int $signa2 = 0,
        int $jmlObat = 0,
        int $jmlPermintaan = 0,
        ?string $nmObatNonDPHO = null
    ) {
        $this->kdObatSK = $kdObatSK;
        $this->noKunjungan = $noKunjungan;
        $this->racikan = $racikan;
        $this->kdRacikan = $kdRacikan;
        $this->obatDPHO = $obatDPHO;
        $this->kdObat = $kdObat;
        $this->signa1 = $signa1;
        $this->signa2 = $signa2;
        $this->jmlObat = $jmlObat;
        $this->jmlPermintaan = $jmlPermintaan;
        $this->nmObatNonDPHO = $nmObatNonDPHO;
    }

    public function setKdObatSK(int $value): self
    {
        $this->kdObatSK = $value;
        return $this;
    }

    public function setNoKunjungan(string $value): self
    {
        $this->noKunjungan = $value;
        return $this;
    }

    public function setRacikan(bool $value): self
    {
        $this->racikan = $value;
        return $this;
    }

    public function setKdRacikan(?string $value): self
    {
        $this->kdRacikan = $value;
        return $this;
    }

    public function setObatDPHO(bool $value): self
    {
        $this->obatDPHO = $value;
        return $this;
    }

    public function setKdObat(string $value): self
    {
        $this->kdObat = $value;
        return $this;
    }

    public function setSigna1(int $value): self
    {
        $this->signa1 = $value;
        return $this;
    }

    public function setSigna2(int $value): self
    {
        $this->signa2 = $value;
        return $this;
    }

    public function setJmlObat(int $value): self
    {
        $this->jmlObat = $value;
        return $this;
    }

    public function setJmlPermintaan(int $value): self
    {
        $this->jmlPermintaan = $value;
        return $this;
    }

    public function setNmObatNonDPHO(?string $value): self
    {
        $this->nmObatNonDPHO = $value;
        return $this;
    }

    public function toData()
    {
        return [
            "kdObatSK" => $this->kdObatSK,
            "noKunjungan" => $this->noKunjungan,
            "racikan" => $this->racikan,
            "kdRacikan" => $this->kdRacikan,
            "obatDPHO" => $this->obatDPHO,
            "kdObat" => $this->kdObat,
            "signa1" => $this->signa1,
            "signa2" => $this->signa2,
            "jmlObat" => $this->jmlObat,
            "jmlPermintaan" => $this->jmlPermintaan,
            "nmObatNonDPHO" => $this->nmObatNonDPHO
        ];
    }

    public function validate() {
        return true;
    }
}
