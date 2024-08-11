<?php

namespace BpjsBridging\PCare\RequestObject;

use BpjsBridging\RequestObject;
use Carbon\Carbon;

class PendaftaranRequest implements RequestObject {
    private $kdProviderPeserta;
    private $tglDaftar;
    private $noKartu;
    private $kdPoli;
    private $keluhan;
    private $kunjSakit;
    private $sistole;
    private $diastole;
    private $beratBadan;
    private $tinggiBadan;
    private $respRate;
    private $lingkarPerut;
    private $heartRate;
    private $rujukBalik;
    private $kdTkp;

    public function __construct(
        string $kdProviderPeserta = null,
        string $tglDaftar = null,
        string $noKartu = null,
        string $kdPoli = null,
        string $keluhan = null,
        bool $kunjSakit = null,
        int $sistole = null,
        int $diastole = null,
        int $beratBadan = null,
        int $tinggiBadan = null,
        int $respRate = null,
        int $lingkarPerut = null,
        int $heartRate = null,
        int $rujukBalik = null,
        string $kdTkp = null
    ) {
        $this->kdProviderPeserta = $kdProviderPeserta;
        $this->tglDaftar = $tglDaftar;
        $this->noKartu = $noKartu;
        $this->kdPoli = $kdPoli;
        $this->keluhan = $keluhan;
        $this->kunjSakit = $kunjSakit;
        $this->sistole = $sistole;
        $this->diastole = $diastole;
        $this->beratBadan = $beratBadan;
        $this->tinggiBadan = $tinggiBadan;
        $this->respRate = $respRate;
        $this->lingkarPerut = $lingkarPerut;
        $this->heartRate = $heartRate;
        $this->rujukBalik = $rujukBalik;
        $this->kdTkp = $kdTkp;
    }

    public function setKdProviderPeserta(string $kdProviderPeserta): self
    {
        $this->kdProviderPeserta = $kdProviderPeserta;
        return $this;
    }

    public function setTglDaftar(string $tglDaftar): self
    {
        $this->tglDaftar = $tglDaftar;
        return $this;
    }

    public function setNoKartu(string $noKartu): self
    {
        $this->noKartu = $noKartu;
        return $this;
    }

    public function setKdPoli(string $kdPoli): self
    {
        $this->kdPoli = $kdPoli;
        return $this;
    }

    public function setKeluhan(string $keluhan): self
    {
        $this->keluhan = $keluhan;
        return $this;
    }

    public function setKunjSakit(bool $kunjSakit): self
    {
        $this->kunjSakit = $kunjSakit;
        return $this;
    }

    public function setSistole(int $sistole): self
    {
        $this->sistole = $sistole;
        return $this;
    }

    public function setDiastole(int $diastole): self
    {
        $this->diastole = $diastole;
        return $this;
    }

    public function setBeratBadan(int $beratBadan): self
    {
        $this->beratBadan = $beratBadan;
        return $this;
    }

    public function setTinggiBadan(int $tinggiBadan): self
    {
        $this->tinggiBadan = $tinggiBadan;
        return $this;
    }

    public function setRespRate(int $respRate): self
    {
        $this->respRate = $respRate;
        return $this;
    }

    public function setLingkarPerut(int $lingkarPerut): self
    {
        $this->lingkarPerut = $lingkarPerut;
        return $this;
    }

    public function setHeartRate(int $heartRate): self
    {
        $this->heartRate = $heartRate;
        return $this;
    }

    public function setRujukBalik(int $rujukBalik): self
    {
        $this->rujukBalik = $rujukBalik;
        return $this;
    }

    /**
     * Mengatur jenis pelayanan kesehatan tingkat pertama.
     *
     * @param string $kdTkp Nilai yang akan diatur untuk kdTkp.
     * @return self
     * @see \BpjsBridging\PCare\Bridging::TKP_RJTP
     * @see \BpjsBridging\PCare\Bridging::TKP_RITP
     * @see \BpjsBridging\PCare\Bridging::TKP_PROMOTIF
     */
    public function setKdTkp(string $kdTkp): self
    {
        $this->kdTkp = $kdTkp;
        return $this;
    }

    public function toData() {
        return [
            'kdProviderPeserta' => $this->kdProviderPeserta,
            'tglDaftar' => $this->tglDaftar,
            'noKartu' => $this->noKartu,
            'kdPoli' => $this->kdPoli,
            'keluhan' => $this->keluhan,
            'kunjSakit' => $this->kunjSakit,
            'sistole' => $this->sistole,
            'diastole' => $this->diastole,
            'beratBadan' => $this->beratBadan,
            'tinggiBadan' => $this->tinggiBadan,
            'respRate' => $this->respRate,
            'lingkarPerut' => $this->lingkarPerut,
            'heartRate' => $this->heartRate,
            'rujukBalik' => $this->rujukBalik,
            'kdTkp' => $this->kdTkp
        ];
    }

    public function validate()
    {
        return true;
    }
}
