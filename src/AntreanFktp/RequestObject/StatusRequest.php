<?php

namespace BpjsBridging\AntreanFktp\RequestObject;

use BpjsBridging\RequestObject;
use Carbon\Carbon;

class StatusRequest implements RequestObject
{
    private $tanggalPeriksa;
    private $kodePoli;
    private $nomorKartu;
    private $status;
    private $waktu;

    public function __construct(Carbon $tanggalPeriksa = null, $kodePoli = null, $nomorKartu = null, $status = null, Carbon $waktu = null)
    {
        $this->tanggalPeriksa = $tanggalPeriksa ? $tanggalPeriksa->isoFormat('YYYY-MM-DD') : null;
        $this->kodePoli = $kodePoli;
        $this->nomorKartu = $nomorKartu;
        $this->status = $status;
        $this->waktu = $waktu ? $waktu->unix() * 1000 : null;
    }

    public function setTanggalPeriksa(Carbon $tanggalPeriksa)
    {
        $this->tanggalPeriksa = $tanggalPeriksa->isoFormat('YYYY-MM-DD');
        return $this;
    }

    public function setKodePoli($kodePoli)
    {
        $this->kodePoli = $kodePoli;
        return $this;
    }

    public function setNomorKartu($nomorKartu)
    {
        $this->nomorKartu = $nomorKartu;
        return $this;
    }

    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }

    public function setWaktu(Carbon $waktu)
    {
        $this->waktu = $waktu->unix() * 1000;
        return $this;
    }

    public function toData()
    {
        return [
            'tanggalperiksa' => $this->tanggalPeriksa,
            'kodepoli' => $this->kodePoli,
            'nomorkartu' => $this->nomorKartu,
            'status' => $this->status,
            'waktu' => $this->waktu,
        ];
    }

    public function validate()
    {
        return true;
    }
}
