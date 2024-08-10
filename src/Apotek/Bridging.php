<?php

namespace BpjsBridging\Apotek;

use BpjsBridging\Bridge;
use Carbon\Carbon;

class Bridging extends Bridge
{

    /**
     * Daftar Obat DPHO
     */
    public function referensiDPHO()
    {
        return $this->get('/referensi/dpho');
    }

    /**
     * Daftar Obat Poli
     *
     * @param string $kdPoli kode poli
     */
    public function referensiPoli($kdPoli)
    {
        return $this->get("/referensi/poli/$kdPoli");
    }

    /**
     * Pencarian data fasilitas kesehatan
     *
     * @param int $jnsFaskes Jenis Faskes (1. Faskes 1, 2. Faskes 2/RS)
     * @param string $namaFaskes Nama Faskes
     */
    public function referensiFasilitasKesehatan($jnsFaskes, $namaFaskes)
    {
        return $this->get("/referensi/ppk/$jnsFaskes/$namaFaskes");
    }

    /**
     * Pencarian Setting Apotek
     *
     * @param string $kdApotek Kode Apotek
     */
    public function referensiSettingApotek($kdApotek)
    {
        return $this->get("/referensi/settingppk/read/$kdApotek");
    }

    /**
     * Pencarian data spesialistik
     */
    public function referensiSpesialistik()
    {
        return $this->get('/referensi/spesialistik');
    }

    /**
     * Pencarian obat
     *
     * @param string $kdJnsObat
     * @param Carbon $tglResep
     * @param string $filter
     */
    public function referensiObat($kdJnsObat, Carbon $tglResep, $filter)
    {
        $tglResep = $tglResep->isoFormat("YYYY-MM-DD");
        return $this->get("/referensi/obat/$kdJnsObat/$tglResep/$filter");
    }

    /**
     * Simpan Obat Non Racikan
     */
    public  function insertNonRacikan(string $noSJP, string $noResep, string $kdObat, string $nmObat, int $signa1Obat, int $signa2Obat, int $jumlah, int $jho, string $catKhsObat)
    {
        return $this->post("/obatnonracikan/v3/insert", [
            "NOSJP" => $noSJP,
            "NORESEP" => $noResep,
            "KDOBT" => $kdObat,
            "NMOBAT" => $nmObat,
            "SIGNA1OBT" => $signa1Obat,
            "SIGNA2OBT" => $signa2Obat,
            "JMLOBT" => $jumlah,
            "JHO" => $jho,
            "CatKhsObt" => $catKhsObat,
        ]);
    }

    /**
     * Simpan Obat Racikan
     */
    public  function insertRacikan(string $noSJP, string $noResep, string $jnsRObat, string $kdObat, string $nmObat, int $signa1Obat, int $signa2Obat, int $permintaan, int $jumlah, int $jho, string $catKhsObat)
    {
        return $this->post("/obatracikan/v3/insert", [
            "NOSJP" => $noSJP,
            "NORESEP" => $noResep,
            "JNSROBT" => $jnsRObat,
            "KDOBT" => $kdObat,
            "NMOBAT" => $nmObat,
            "SIGNA1OBT" => $signa1Obat,
            "SIGNA2OBT" => $signa2Obat,
            "PERMINTAAN" => $permintaan,
            "JMLOBT" => $jumlah,
            "JHO" => $jho,
            "CatKhsObt" => $catKhsObat,
        ]);
    }

    /**
     * Hapus Pelayanan Obat
     *
     * @param string $noSep
     * @param string $noResep
     * @param string $kdObat
     * @param string $tipeObat
     */
    public function hapusPelayananObat(string $noSep, string $noResep, string $kdObat, string $tipeObat)
    {
        return $this->post('/pelayanan/obat/hapus/', [
            "nosepapotek" => $noSep,
            "noresep" => $noResep,
            "kodeobat" => $kdObat,
            "tipeobat" => $tipeObat,
        ]);
    }

    /**
     * Daftar Pelayanan Obat
     *
     * @param string $noSep
     */
    public function daftarPelayananObat(string $noSep)
    {
        return $this->get("/obat/daftar/$noSep");
    }

    /**
     * Riwayat Pelayanan Obat
     *
     * @param Carbon $tglAwal
     * @param Carbon $tglAkhir
     * @param string $noKartu
     */
    public function riwayatPelayananObat(Carbon $tglAwal, Carbon $tglAkhir, string $noKartu)
    {
        $tglAwal = $tglAwal->isoFormat("YYYY-MM-DD");
        $tglAkhir = $tglAkhir->isoFormat("YYYY-MM-DD");
        return $this->get("/riwayatobat/$tglAwal/$tglAkhir/$noKartu");
    }

    /**
     * Undocumented function
     *
     * @param Carbon $tglSjp
     * @param string $refAsalSjp
     * @param string $poliResep
     * @param integer $kdJenisObat (1. Obat PRB, 2. Obat Kronis Blm Stabil, 3. Obat Kemoterapi)
     * @param string $noResep
     * @param string $idUserSjp
     * @param Carbon $tglResep
     * @param Carbon $tglPelResep
     * @param string $kdDokter
     * @param boolean $iterasi
     */
    public function simpanResep(Carbon $tglSjp, string $refAsalSjp, string $poliResep, int $kdJenisObat, string $noResep, string $idUserSjp, Carbon $tglResep, Carbon $tglPelResep, string $kdDokter, bool $iterasi)
    {
        return $this->post('/sjpresep/v3/insert', [
            "TGLSJP" => $tglSjp->isoFormat("YYYY-MM-DD hh:mm:ss"),
            "REFASALSJP" =>  $refAsalSjp,
            "POLIRSP" =>  $poliResep,
            "KDJNSOBAT" =>  "$kdJenisObat",
            "NORESEP" =>  $noResep,
            "IDUSERSJP" =>  $idUserSjp,
            "TGLRSP" => $tglResep->isoFormat("YYYY-MM-DD hh:mm:ss"),
            "TGLPELRSP" => $tglPelResep->isoFormat("YYYY-MM-DD hh:mm:ss"),
            "KdDokter" =>  $kdDokter,
            "iterasi" => ($iterasi ? "1" : "0"),
        ]);
    }

    /**
     * Hapus Resep
     *
     * @param string $noSjp
     * @param string $refAsalSjp
     * @param string $noResep
     */
    public function hapusResep(string $noSjp, string $refAsalSjp, string $noResep)
    {
        return $this->delete('/hapusresep', [
            "nosjp" => "$noSjp",
            "refasalsjp" => "$refAsalSjp",
            "noresep" => "$noResep"
        ]);
    }

    /**
     * Daftar Resep
     *
     * @param string $kodePpk
     * @param integer $kdJenisObat
     * @param string $jenisTgl valid format (TGLPELSJP,TGLRSP)
     * @param Carbon $tglMulai
     * @param Carbon $tglAkhir
     */
    public function daftarResep(string $kodePpk, int $kdJenisObat, string $jenisTgl, Carbon $tglMulai, Carbon $tglAkhir)
    {
        return $this->post('/daftarresep', [
            "kdppk" => $kodePpk,
            "KdJnsObat" => $kdJenisObat,
            "JnsTgl" => $jenisTgl,
            "TglMulai" => $tglMulai->isoFormat("YYYY-MM-DD hh:mm:ss"),
            "TglAkhir" => $tglAkhir->isoFormat("YYYY-MM-DD hh:mm:ss"),
        ]);
    }

    /**
     * Data No Kunjungan/SEP
     *
     * @param string $noSep
     */
    public function cariSep(string $noSep) {
        return $this->get("/sep/$noSep");
    }

    /**
     * Data Klaim
     *
     * @param integer $bulan
     * @param integer $tahun
     * @param integer $jenisObat (0. Semua 1. Obat PRB 2. Obat Kronis Blm Stabil 3. Obat Kemoterapi)
     * @param boolean $status terverifikasi
     */
    public function dataKlaim(int $bulan, int $tahun, int $jenisObat, bool $status) {
        return $this->get("/monitoring/klaim/$bulan/$tahun/$jenisObat/" . ($status ? "2" : "1"));
    }
}
