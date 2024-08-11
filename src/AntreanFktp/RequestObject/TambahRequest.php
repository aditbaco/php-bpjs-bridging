<?php

namespace BpjsBridging\AntreanFktp\RequestObject;

use BpjsBridging\RequestObject;
use Carbon\Carbon;

class TambahRequest implements RequestObject
{
    private $nomorkartu;
    private $nik;
    private $nohp;
    private $kodepoli;
    private $namapoli;
    private $norm;
    private $tanggalperiksa;
    private $kodedokter;
    private $namadokter;
    private $jampraktek;
    private $nomorantrean;
    private $angkaantrean;
    private $keterangan;

    public function __construct(
        string $nomorkartu = "",
        string $nik = "",
        string $nohp = "",
        string $kodepoli = "",
        string $namapoli = "",
        string $norm = "",
        string|Carbon $tanggalperiksa = "",
        int $kodedokter = 0,
        string $namadokter = "",
        string $jampraktek = "",
        string $nomorantrean = "",
        int $angkaantrean = 0,
        string $keterangan = ""
    ) {
        $this->nomorkartu = $nomorkartu;
        $this->nik = $nik;
        $this->nohp = $nohp;
        $this->kodepoli = $kodepoli;
        $this->namapoli = $namapoli;
        $this->norm = $norm;
        $this->tanggalperiksa = $tanggalperiksa;
        $this->kodedokter = $kodedokter;
        $this->namadokter = $namadokter;
        $this->jampraktek = $jampraktek;
        $this->nomorantrean = $nomorantrean;
        $this->angkaantrean = $angkaantrean;
        $this->keterangan = $keterangan;
    }

    public function setNomorkartu(string $value) {
        $this->nomorkartu = $value;
        return $this;
    }

    public function setNik(string $value) {
        $this->nik = $value;
        return $this;
    }

    public function setNohp(string $value) {
        $this->nohp = $value;
        return $this;
    }

    public function setKodepoli(string $value) {
        $this->kodepoli = $value;
        return $this;
    }

    public function setNamapoli(string $value) {
        $this->namapoli = $value;
        return $this;
    }

    public function setNorm(string $value) {
        $this->norm = $value;
        return $this;
    }

    public function setTanggalperiksa(string|Carbon $value) {
        $this->tanggalperiksa = $value;
        return $this;
    }

    public function setKodedokter(int $value) {
        $this->kodedokter = $value;
        return $this;
    }

    public function setNamadokter(string $value) {
        $this->namadokter = $value;
        return $this;
    }

    public function setJampraktek(string $value) {
        $this->jampraktek = $value;
        return $this;
    }

    public function setNomorantrean(string $value) {
        $this->nomorantrean = $value;
        return $this;
    }

    public function setAngkaantrean(int $value) {
        $this->angkaantrean = $value;
        return $this;
    }

    public function setKeterangan(string $value) {
        $this->keterangan = $value;
        return $this;
    }

    public function toData() {
        $tanggalperiksa = $this->tanggalperiksa;
        if ($tanggalperiksa instanceof Carbon) {
            $tanggalperiksa = $tanggalperiksa->toDateString();
        }
        return [
            "nomorkartu" => $this->nomorkartu,
            "nik" => $this->nik,
            "nohp" => $this->nohp,
            "kodepoli" => $this->kodepoli,
            "namapoli" => $this->namapoli,
            "norm" => $this->norm,
            "tanggalperiksa" => $tanggalperiksa,
            "kodedokter" => $this->kodedokter,
            "namadokter" => $this->namadokter,
            "jampraktek" => $this->jampraktek,
            "nomorantrean" => $this->nomorantrean,
            "angkaantrean" => $this->angkaantrean,
            "keterangan" => $this->keterangan,
        ];
    }

    public function validate() {
        return true;
    }
}
