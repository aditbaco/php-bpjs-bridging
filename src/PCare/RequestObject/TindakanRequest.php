<?php

namespace BpjsBridging\PCare\RequestObject;

use BpjsBridging\RequestObject;

class TindakanRequest implements RequestObject {
    private $kdTindakanSK;
    private $noKunjungan;
    private $kdTindakan;
    private $biaya;
    private $keterangan;
    private $hasil;

    public function __construct() {
        $this->kdTindakanSK = null;
        $this->noKunjungan = null;
        $this->kdTindakan = null;
        $this->biaya = null;
        $this->keterangan = null;
        $this->hasil = null;
    }

    public function setKdTindakanSK($value) {
        $this->kdTindakanSK = $value;
        return $this;
    }

    public function setNoKunjungan($value) {
        $this->noKunjungan = $value;
        return $this;
    }

    public function setKdTindakan($value) {
        $this->kdTindakan = $value;
        return $this;
    }

    public function setBiaya($value) {
        $this->biaya = $value;
        return $this;
    }

    public function setKeterangan($value) {
        $this->keterangan = $value;
        return $this;
    }

    public function setHasil($value) {
        $this->hasil = $value;
        return $this;
    }

    public function toData() {
        return [
            'kdTindakanSK' => $this->kdTindakanSK,
            'noKunjungan' => $this->noKunjungan,
            'kdTindakan' => $this->kdTindakan,
            'biaya' => $this->biaya,
            'keterangan' => $this->keterangan,
            'hasil' => $this->hasil
        ];
    }

    public function validate() {
        return true;
    }
}
