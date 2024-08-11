<?php

namespace BpjsBridging\AntreanFktp;

use BpjsBridging\AntreanFktp\RequestObject\BatalRequest;
use BpjsBridging\AntreanFktp\RequestObject\StatusRequest;
use BpjsBridging\AntreanFktp\RequestObject\TambahRequest;
use BpjsBridging\Bridge;
use Carbon\Carbon;

class Bridging extends Bridge
{
    /**
     * Mengambil daftar poli (klinik) yang tersedia pada tanggal tertentu.
     *
     * @param Carbon|null $tangal Tanggal untuk mengambil daftar poli. Jika tidak disediakan, tanggal saat ini digunakan.
     */
    public function poli(Carbon $tangal = null) {
        if ($tangal == null) $tangal = Carbon::now();
        return $this->get("/ref/poli/tanggal/" . $tangal->isoFormat('YYYY-MM-DD'));
    }

    /**
     * Mengambil daftar dokter yang tersedia pada tanggal tertentu di poli tertentu.
     *
     * @param string $kdPoli kode poli (klinik)
     * @param Carbon|null $tangal Tanggal untuk mengambil daftar dokter. Jika tidak disediakan, tanggal saat ini digunakan.
     */
    public function dokter(string $kdPoli, Carbon $tangal = null) {
        if ($tangal == null) $tangal = Carbon::now();
        return $this->get("/ref/dokter/kodepoli/$kdPoli/tanggal/" . $tangal->isoFormat('YYYY-MM-DD'));
    }

    /**
     * Tambah Antrean
     *
     * Tambah antrean
     *
     * @param TambahRequest $request request object
     */
    public function tambahAntrean(TambahRequest $request) {
        return $this->post('/antrean/add', $request->toData());
    }

    public function updateAntrean(StatusRequest $request) {
        return $this->post('/antrean/panggil', $request->toData());
    }

    public function batalAntrean(BatalRequest $request) {
        return $this->post('/antrean/batal', $request->toData());
    }
}
