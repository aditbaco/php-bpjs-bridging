<?php
namespace BpjsBridging\Antrean\RequestObject;

use BpjsBridging\RequestObject;

class JadwalDokterRequest implements RequestObject
{
    public $kodePoli = "";
    public $kodeSubSpesialis = "";
    public $kodeDokter = 0;
    public $jadwal = [];

    public function __construct(string $kodePoli = "", string $kodeSubSpesialis = "", int $kodeDokter = 0, JadwalDokter ...$jadwal)
    {
        $this->kodePoli = $kodePoli;
        $this->kodeSubSpesialis = $kodeSubSpesialis;
        $this->kodeDokter = $kodeDokter;
        $this->jadwal = $jadwal;
    }

    public function validate() {
        return true;
    }

    public function toData()
    {
        return [
            "kodepoli" => $this->kodePoli,
            "kodesubspesialis" => $this->kodeSubSpesialis,
            "kodedokter" => $this->kodeDokter,
            "jadwal" => array_map(fn ($v) => $v->toData(), $this->jadwal)
        ];
    }
}
