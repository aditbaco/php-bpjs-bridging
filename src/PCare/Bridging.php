<?php

namespace BpjsBridging\PCare;

use BpjsBridging\Bridge;
use BpjsBridging\PCare\RequestObject\KegiatanKelompokRequest;
use BpjsBridging\PCare\RequestObject\KunjunganRequest;
use BpjsBridging\PCare\RequestObject\McuRequest;
use BpjsBridging\PCare\RequestObject\ObatRequest;
use BpjsBridging\PCare\RequestObject\PendaftaranRequest;
use BpjsBridging\PCare\RequestObject\TindakanRequest;
use Carbon\Carbon;

class Bridging extends Bridge
{
    public const KELOMPOK_DIABETES_MELITUS = '01';
    public const KELOMPOK_HIPERTENSI = '02';

    public const KEGIATAN_KELOMPOK_SENAM = '01';
    public const KEGIATAN_KELOMPOK_PENYULUHAN = '10';
    public const KEGIATAN_KELOMPOK_PENYULUHAN_DAN_SENAM = '11';

    public const TKP_RJTP = '10';
    public const TKP_RITP = '20';
    public const TKP_PROMOTIF = '50';

    public const JENIS_KARTU_NIK = 'nik';
    public const JENIS_KARTU_BPJS = 'noka';

    public const ALERGI_MAKANAN = '01';
    public const ALERGI_UDARA = '02';
    public const ALERGI_OBAT = '03';

    public const TACC_TANPA_TACC = [
        'kode' => '-1',
        'nama' => 'Tanpa TACC',
        'alasan' => []
    ];
    public const TACC_TIME = [
        'kode' => '1',
        'nama' => 'Time',
        'alasan' => ['< 3 Hari', '>= 3 - 7 Hari', '>= 7 Hari']
    ];
    public const TACC_AGE = [
        'kode' => '2',
        'nama' => 'Age',
        'alasan' => ['< 1 Bulan', '>= 1 Bulan s/d < 12 Bulan', '>= 1 Tahun s/d < 5 Tahun', '>= 5 Tahun s/d < 12 Tahun', '>= 12 Tahun s/d < 55 Tahun', '>= 55 Tahun']
    ];
    public const TACC_COMPLICATION = [
        'kode' => '3',
        'nama' => 'Complication',
        'alasan' => []
    ];
    public const TACC_COMORBIDITY = [
        'kode' => '4',
        'nama' => 'Comorbidity',
        'alasan' => ['< 3 Hari', '>= 3 - 7 Hari', '>= 7 Hari']
    ];

    /**
     * Mengambil data diagnosa berdasarkan kode diagnosa.
     *
     * @param string $kodeDiagnosa Kode diagnosa.
     * @param int $start Batas awal data.
     * @param int $limit Jumlah data yang diambil.
     */
    public function diagnosa(string $kodeDiagnosa, int $start, int $limit)
    {
        return $this->get("/diagnosa/$kodeDiagnosa/$start/$limit");
    }

    /**
     * Mengambil data dokter.
     *
     * @param int $start Batas awal data.
     * @param int $limit Jumlah data yang diambil.
     */
    public function dokter(int $start, int $limit)
    {
        return $this->get("/dokter/$start/$limit");
    }

    /**
     * Mengambil data kesadaran.
     */
    public function kesadaran() {
        return $this->get("/kesadaran");
    }

    /**
     * Mengambil data kelompok berdasarkan jenis kelompok
     *
     * @param int $kdJenisKelompok (01 : Diabetes Melitus, 02 : Hipertensi)
     * @see \BpjsBridging\PCare\Bridging::KELOMPOK_DIABETES_MELITUS
     * @see \BpjsBridging\PCare\Bridging::KELOMPOK_HIPERTENSI
     */
    public function clubProlanis(int $kdJenisKelompok)
    {
        return $this->get("/kelompok/club/$kdJenisKelompok");
    }

    /**
     * Mengambil data kegiatan kelompok berdasarkan tanggal.
     *
     * @param Carbon $tanggal Tanggal untuk mengambil data kegiatan kelompok.
     */
    public function kegiatanKelompok(Carbon $tanggal)
    {
        return $this->get("/kelompok/kegiatan/" . $tanggal->isoFormat('DD-MM-YYYY'));
    }

    /**
     * Mengambil data kegiatan kelompok berdasarkan tanggal.
     *
     * @param Carbon $tanggal Tanggal untuk mengambil data kegiatan kelompok.
     */
    public function pesertaKegiatanKelompok(string $eduId)
    {
        return $this->get("/kelompok/peserta/" . $eduId);
    }

    /**
     * Tambah kegiatan kelompok.
     *
     * @param KegiatanKelompokRequest $request Kegiatan kelompok request object.
     */
    public function tambahKegiatanKelompok(KegiatanKelompokRequest $request)
    {
        return $this->post("/kelompok/kegiatan", $request->toData());
    }

    /**
     * Tambah peserta ke kegiatan kelompok.
     *
     * @param string $eduId ID edukasi.
     * @param string $noKartu Nomor kartu peserta.
     */
    public function tambahPesertaKegiatanKelompok(string $eduId, string $noKartu) {
        return $this->post("/kelompok/peserta", [
            "eduId" => $eduId,
            "noKartu" => $noKartu
        ]);
    }

    /**
     * Menghapus kegiatan kelompok.
     *
     * @param string $eduId ID edukasi.
     */
    public function hapusKegiatanKelompok(string $eduId) {
        return $this->delete("/kelompok/kegiatan/$eduId", []);
    }

    /**
     * Hapus peserta dari kegiatan kelompok.
     *
     * @param string $eduId ID edukasi.
     * @param string $noKartu Nomor kartu peserta.
     */
    public function hapusPesertaKegiatanKelompok(string $eduId, string $noKartu) {
        return $this->delete("/kelompok/peserta/$eduId/$noKartu", []);
    }

    //==============================================
    // Kunjungan

    /**
     * Mengambil data rujukan berdasarkan nomor kunjungan.
     *
     * @param string $noKunjungan Nomor kunjungan.
     */
    public function rujukan(string $noKunjungan) {
        return $this->get("/kunjungan/rujukan/$noKunjungan");
    }

    /**
     * Mengambil riwayat kunjungan peserta berdasarkan nomor kartu.
     *
     * @param string $noKartu Nomor kartu peserta.
     */
    public function riwayatKunjungan(string $noKartu) {
        return $this->get("/kunjungan/peserta/$noKartu");
    }

    /**
     * Tambah kunjungan baru.
     *
     * @param KunjunganRequest $request Objek KunjunganRequest yang berisi data kunjungan.
     */
    public function tambahKunjungan(KunjunganRequest $request) {
        return $this->post("/kunjungan/V1", $request->toData());
    }

    /**
     * Mengedit kunjungan yang sudah ada.
     *
     * @param KunjunganRequest $request Objek KunjunganRequest yang berisi data untuk diperbarui.
     */
    public function editKunjungan(KunjunganRequest $request) {
        return $this->put("/kunjungan/V1", $request->toData());
    }

    /**
     * Menghapus data kunjungan berdasarkan nomor kunjungan.
     *
     * @param string $noKunjungan Nomor kunjungan yang akan dihapus.
     */
    public function hapusKunjungan(string $noKunjungan) {
        return $this->delete("/kunjungan/$noKunjungan", []);
    }

    //==============================================
    // MCU

    /**
     * Mengambil data MCU berdasarkan nomor kunjungan.
     *
     * @param string $noKunjungan Nomor kunjungan.
     */
    public function mcu(string $noKunjungan) {
        return $this->get("/MCU/kunjungan/$noKunjungan");
    }

    /**
     * Menambahkan MCU baru.
     *
     * @param McuRequest $request Objek permintaan yang berisi data untuk MCU baru.
     */
    public function tambahMcu(McuRequest $request) {
        return $this->post("/MCU", $request->toData());
    }

    /**
     * Mengedit MCU yang sudah ada.
     *
     * @param McuRequest $request Objek permintaan yang berisi data untuk MCU yang akan diedit.
     */
    public function editMcu(McuRequest $request) {
        return $this->put("/MCU", $request->toData());
    }

    /**
     * Menghapus MCU berdasarkan kode MCU dan nomor kunjungan.
     *
     * @param string $kodeMcu Kode MCU yang akan dihapus.
     * @param string $noKunjungan Nomor kunjungan yang terkait dengan MCU.
     */
    public function hapusMcu(string $kodeMcu, string $noKunjungan) {
        return $this->delete("/MCU/$kodeMcu/kunjungan/$noKunjungan", []);
    }

    //==============================================
    // Obat

    /**
     * Cari dalam Daftar dan Plafon Harga Obat
     *
     * @param string $search kode dpho atau nama
     * @param int $start
     * @param int $limit
     */
    public function dpho(string $search, int $start, int $limit) {
        return $this->get("/obat/dpho/$search/$start/$limit");
    }

    /**
     * Mengambil data obat berdasarkan nomor kunjungan.
     *
     * @param string $noKunjungan Nomor kunjungan yang terkait dengan obat.
     */
    public function obatByKunjungan(string $noKunjungan) {
        return $this->get("/obat/kunjungan/$noKunjungan");
    }

    /**
     * Tambah obat ke kunjungan.
     *
     * @param ObatRequest $request Objek permintaan yang berisi data untuk obat yang akan ditambahkan ke kunjungan.
     */
    public function tambahObatKeKunjungan(ObatRequest $request) {
        return $this->post("/obat/kunjungan", $request->toData());
    }

    /**
     * Menghapus obat dari kunjungan berdasarkan kode obat dan nomor kunjungan.
     *
     * @param string $kdObat Kode obat yang akan dihapus.
     * @param string $noKunjungan Nomor kunjungan yang terkait dengan obat.
     */
    public function hapusObatDariKunjungan(string $kdObat, string $noKunjungan) {
        return $this->delete("/obat/$kdObat/kunjungan/$noKunjungan", []);
    }

    //==============================================
    // Pendaftaran

    /**
     * Mengambil data pendaftaran berdasarkan nomor urut dan tanggal pendaftaran.
     *
     * @param string $noUrut Nomor urut yang terkait dengan pendaftaran.
     * @param Carbon $tglPendaftaran Tanggal pendaftaran yang terkait dengan pendaftaran.
     */
    public function noUrutPendaftaran(string $noUrut, Carbon $tglPendaftaran) {
        return $this->get("/pendaftaran/noUrut/$noUrut/tglDaftar/" . $tglPendaftaran->isoFormat('DD-MM-YYYY'));
    }

    /**
     * Mengambil data pendaftaran berdasarkan tanggal pendaftaran.
     *
     * @param Carbon $date Tanggal pendaftaran yang terkait dengan data.
     * @param int $start Batas awal data.
     * @param int $limit Jumlah data yang diambil.
     */
    public function pendaftaran(Carbon $date, int $start, int $limit) {
        return $this->get("/pendaftaran/tglDaftar/" . $date->isoFormat('DD-MM-YYYY') . "/$start/$limit");
    }

    /**
     * Tambah pendaftaran baru.
     *
     * @param PendaftaranRequest $request Objek permintaan yang berisi data untuk pendaftaran yang akan ditambahkan.
     */
    public function tambahPendaftaran(PendaftaranRequest $request) {
        return $this->post("/pendaftaran", $request->toData());
    }

    /**
     * Menghapus pendaftaran berdasarkan nomor kartu, tanggal pendaftaran, nomor urut, dan kode poli.
     *
     * @param string $noKartu Nomor kartu peserta yang terkait dengan pendaftaran.
     * @param Carbon $tglPendaftaran Tanggal pendaftaran peserta yang terkait dengan pendaftaran.
     * @param string $noUrut Nomor urut yang terkait dengan pendaftaran.
     * @param string $kdPoli Kode poli yang terkait dengan pendaftaran.
     */
    public function hapusPendaftaran(string $noKartu, Carbon $tglPendaftaran, string $noUrut, string $kdPoli) {
        return $this->delete("/pendaftaran/peserta/$noKartu/tglDaftar/" . $tglPendaftaran->isoFormat('DD-MM-YYYY') . "/noUrut/$noUrut/kdPoli/$kdPoli", []);
    }

    //==============================================
    // Peserta

    /**
     * Mengambil data peserta berdasarkan nomor kartu.
     *
     * @param string $noKartu Nomor kartu peserta.
     */
    public function peserta(string $noKartu) {
        return $this->get("/peserta/$noKartu");
    }

    /**
     * Mengambil detail peserta berdasarkan jenis identitas dan nomor identitas.
     *
     * @param string $jnsKartu Jenis identitas peserta.
     * @param string $noKartu Nomor identitas peserta.
     * @see \BpjsBridging\PCare\Bridging::JENIS_IDENTITAS_NIK
     * @see \BpjsBridging\PCare\Bridging::JENIS_IDENTITAS_NOKARTU
     */
    public function pesertaByJenisIdentitas(string $jnsKartu, string $noKartu) {
        return $this->get("/peserta/$jnsKartu/$noKartu");
    }

    //==============================================
    // Poli

    /**
     * Mengambil daftar poli.
     *
     * @param int $start Batas awal data.
     * @param int $limit Jumlah data yang diambil.
     */
    public function poliFktp(int $start, int $limit) {
        return $this->get("/poli/fktp/$start/$limit");
    }

    //==============================================
    // Provider

    /**
     * Mengambil data provider
     *
     * @param int $start Batas awal data.
     * @param int $limit Jumlah data yang diambil.
     * @return mixed
     */
    public function providerRayon(int $start, int $limit) {
        return $this->get("/provider/$start/$limit");
    }

    //==============================================
    // Spesialis

    /**
     * Mengambil daftar spesialis.
     */
    public function spesialis() {
        return $this->get("/spesialis");
    }

    /**
     * Mengambil daftar sub spesialis berdasarkan kode spesialis.
     *
     * @param string $kdSpesialis Kode spesialis
     */
    public function subSpesialis(string $kdSpesialis) {
        return $this->get("/spesialis/$kdSpesialis/subSpesialis");
    }

    /**
     * Mengambil daftar sarana.
     */
    public function sarana() {
        return $this->get("/spesialis/sarana");
    }

    /**
     * Mengambil daftar spesialis khusus.
     */
    public function spesialisKhusus() {
        return $this->get("/spesialis/khusus");
    }

    /**
     * Mengambil daftar faskes rujukan berdasarkan ketersediaan praktik sub spesialis dan sarana.
     *
     * @param string $kdSubSpesialis Kode sub spesialis
     * @param string $kdSarana Kode sarana
     * @param Carbon $tanggalRujuk Perkiraan tanggal rujukan
     * @return mixed
     */
    public function faskesRujukanSubSpesialis(string $kdSubSpesialis, string $kdSarana, Carbon $tanggalRujuk) {
        return $this->get("/spesialis/rujuk/subspesialis/$kdSubSpesialis/sarana/$kdSarana/tglEstRujuk/" . $tanggalRujuk->isoFormat('DD-MM-YYYY'));
    }

    /**
     * Mengambil daftar rujukan khusus berdasarkan parameter yang diberikan.
     * Khusus untuk rujukan ALIH RAWAT, HEMODIALISA, JIWA, KUSTA, TB-MDR, SARANA KEMOTERAPI, SARANA RADIOTERAPI, HIV-ODHA
     *
     * @param string $kdKhusus Kode rujukan khusus. "IGD / HDL / JIW / KLT / PAR / KEM / RAT / HIV"
     * @param string $noKartu Nomor kartu pasien.
     * @param Carbon $tanggalRujuk Perkiraan tanggal rujukan.
     */
    public function faskesRujukanKhusus(string $kdKhusus, string $noKartu, Carbon $tanggalRujuk) {
        return $this->get("/spesialis/rujuk/khusus/$kdKhusus/noKartu/$noKartu/tglEstRujuk/" . $tanggalRujuk->isoFormat('DD-MM-YYYY'));
    }

    /**
     * Mengambil daftar rujukan khusus berdasarkan parameter yang diberikan.
     * Khusus untuk rujukan THALASEMIA dan HEMOFILI
     *
     * @param string $kdKhusus Kode rujukan khusus. THA / HEM
     * @param string $kdSubSpesialis Kode sub spesialis.
     * @param string $noKartu Nomor kartu pasien.
     * @param Carbon $tanggalRujuk Perkiraan tanggal rujukan.
     */
    public function faskesRujukanKhususThaliaHemofili(string $kdKhusus, string $kdSubSpesialis, string $noKartu, Carbon $tanggalRujuk) {
        return $this->get("/spesialis/rujuk/khusus/$kdKhusus/subspesialis/$kdSubSpesialis/noKartu/$noKartu/tglEstRujuk/" . $tanggalRujuk->isoFormat('DD-MM-YYYY'));
    }

    //==============================================
    // Status Pulang

    public function statusPulang(bool $rawatInap = false) {
        return $this->get("/statuspulang/rawatInap/" . ($rawatInap ? "true" : "false"));
    }

    //==============================================
    // Tindakan

    /**
     * Mengambil daftar tindakan berdasarkan nomor kunjungan yang diberikan.
     *
     * @param string $noKunjungan Nomor kunjungan yang terkait dengan tindakan.
     * @return mixed Respon dari API.
     */
    public function tindakanByKunjungan(string $noKunjungan) {
        return $this->get("/tindakan/kunjungan/$noKunjungan");
    }

    /**
     * Mengambil daftar tindakan berdasarkan kode tindakan.
     *
     * @param string $kdTkp Kode tindakan
     * @param int $start Awal daftar
     * @param int $limit Batas daftar
     * @see \BpjsBridging\PCare\Bridging::TKP_RJTP
     * @see \BpjsBridging\PCare\Bridging::TKP_RITP
     * @see \BpjsBridging\PCare\Bridging::TKP_PROMOTIF
     */
    public function tindakan(string $kdTkp, $start, $limit) {
        return $this->get("/tindakan/kdTkp/$kdTkp/$start/$limit");
    }

    /**
     * Menambahkan tindakan baru.
     *
     * @param TindakanRequest $request Objek permintaan tindakan.
     */
    public function tambahTindakan(TindakanRequest $request) {
        return $this->post("/tindakan", $request->toData());
    }

    /**
     * Mengubah tindakan yang sudah ada.
     *
     * @param TindakanRequest $request Objek permintaan tindakan.
     */
    public function editTindakan(TindakanRequest $request) {
        return $this->put("/tindakan", $request->toData());
    }

    /**
     * Deletes a specific treatment based on the given treatment code and visit number.
     *
     * @param string $kdTindakanSK The code of the treatment to be deleted.
     * @param string $noKunjungan The visit number associated with the treatment.
     */
    public function hapusTindakan(string $kdTindakanSK, string $noKunjungan) {
        return $this->delete("/tindakan/$kdTindakanSK/kunjungan/$noKunjungan", []);
    }

    //==============================================
    // Alergi

    /**
     * Mengambil data alergi berdasarkan jenis alergi.
     *
     * @param string $jenis Jenis alergi.
     * @see \BpjsBridging\PCare\Bridging::ALERGI_MAKANAN
     * @see \BpjsBridging\PCare\Bridging::ALERGI_UDARA
     * @see \BpjsBridging\PCare\Bridging::ALERGI_OBAT
     */
    public function alergi(string $jenis) {
        return $this->get("/alergi/jenis/$jenis");
    }

    //==============================================
    // Prognosa

    /**
     * Mengambil data prognosa.
     */
    public function prognosa() {
        return $this->get("/prognosa");
    }
}
