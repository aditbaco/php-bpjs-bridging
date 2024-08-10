<?php
namespace BpjsBridging\Antrean;

use BpjsBridging\Antrean\RequestObject\AntreanRequest;
use BpjsBridging\Antrean\RequestObject\JadwalDokterRequest;
use BpjsBridging\Bridge;
use Carbon\Carbon;

class Bridging extends Bridge {

    /**
     * Referensi Poli
     *
     * Melihat referensi poli yang ada pada Aplikasi HFIS
     */
    public function referensiPoli()
    {
        return $this->get('/ref/poli');
    }

    /**
     * Referensi Dokter
     *
     * Melihat referensi dokter yang ada pada Aplikasi HFIS
     */
    public function referensiDokter()
    {
        return $this->get('/ref/dokter');
    }

    /**
     * Referensi Jadwal Dokter
     *
     * Melihat referensi jadwal dokter yang ada pada Aplikasi HFIS
     *
     * @param string $poli kode poli BPJS
     * @param string|Carbon $date tanggal dalam format yyyy-mm-dd cth: 2022-17-02
     */
    public function referensiJadwalDokter($poli, $date)
    {
        if ($date instanceof Carbon) {
            $date = $date->toDateString();
        }
        return $this->get("/jadwaldokter/kodepoli/$poli/tanggal/$date");
    }

    /**
     * Referensi Poli Finger Print
     *
     * Melihat referensi poli finger print
     *
     */
    public function referensiPoliFingerPrint()
    {
        return $this->get('/ref/poli/fp');
    }

    /**
     * Referensi Pasien Finger Print
     *
     * Melihat referensi pasien finger print
     *
     * @param string $jenisIdentitas jenis identitas (NIK/NOKA)
     * @param string $noidentitas nomor identitas
     */
    public function referensiPasienFingerPrint($jenisIdentitas, $noidentitas)
    {
        if (!in_array($jenisIdentitas, ['NIK', 'NOKA'])) {
            throw new \Exception('Jenis identitas harus NIK atau NOKA');
        }
        $jenisIdentitas = strtolower($jenisIdentitas);
        return $this->get("/ref/pasien/fp/identitas/$jenisIdentitas/noidentitas/$noidentitas");
    }

    /**
     * Update Jadwal Dokter
     *
     * Update jadwal dokter yang ada pada Aplikasi HFIS
     *
     * @param JadwalDokterRequest $jadwalRequest
     */
    public function updateJadwalDokter(JadwalDokterRequest $jadwalRequest)
    {
        return $this->post('/jadwaldokter/updatejadwaldokter', $jadwalRequest->toData());
    }

    /**
     * Tambah Antrean
     *
     * Tambah antrean
     *
     * @param AntreanRequest $antrean
     */
    public function tambahAntrean(AntreanRequest $antrean)
    {
        return $this->post('/antrean/add', $antrean->toData());
    }

    /**
     * Tambah Antrean Farmasi
     *
     * @param string $kodebooking kode booking
     * @param int $jenisresep jenis resep (racikan/non racikan)
     * @param string $nomorantrean nomor antrean
     * @param string $keterangan keterangan
     * @return void
     */
    public function tambahAntreanFarmasi($kodebooking, $jenisresep, $nomorantrean, $keterangan)
    {
        if (!in_array($jenisresep, ['racikan', 'non racikan'])) {
            throw new \Exception('Jenis resep harus racikan atau nonracikan');
        }
        return $this->post('/antrean/farmasi/add', [
            'kodebooking' => $kodebooking,
            'jenisresep' => $jenisresep,
            'nomorantrean' => $nomorantrean,
            'keterangan' => $keterangan
        ]);
    }

    /**
     * Update Waktu Antrean
     *
     * Mengirimkan waktu tunggu/waktu layan
     *
     * @param string $kodebooking
     * @param int $taskid
     * @param Carbon $waktu
     * @param string $jenisresep jenis resep (Tidak ada/Racikan/Non racikan)
     * @return void
     */
    public function updateWaktuAntrean($kodebooking, $taskid, Carbon $waktu, $jenisresep = null)
    {
        $data = [
            'kodebooking' => $kodebooking,
            'taskid' => $taskid,
            'waktu' => $waktu->unix() * 1000,
        ];
        if ($jenisresep) {
            if (!in_array($jenisresep, ['Tidak ada', 'Racikan', 'Non racikan'])) {
                throw new \Exception('Jenis resep harus racikan atau nonracikan');
            }
            $data['jenisresep'] = $jenisresep;
        }
        return $this->post('/antrean/updatewaktu', $data);
    }

    /**
     * Batal Antrean
     *
     * Membatalkan antrean pasien
     * @param mixed $kodeBooking
     * @param mixed $keterangan
     */
    public function batalAntrean($kodeBooking, $keterangan)
    {
        return $this->post('/antrean/batal', [
            'kodebooking' => $kodeBooking,
            'keterangan' => $keterangan
        ]);
    }

    /**
     * List Waktu Task Id
     *
     * Melihat waktu task id yang telah dikirim ke BPJS
     *
     * @param mixed $kodeBooking
     */
    public function listWaktuTaskId($kodeBooking)
    {
        return $this->post('/antrean/getlisttask', [
            'kodebooking' => $kodeBooking
        ]);
    }

    /**
     * Dashboard Per Tanggal
     *
     * Dashboard waktu per tanggal
     *
     * @param mixed $tanggal
     * @param mixed $waktu (rs/server)
     */
    public function dashboardPerTanggal($tanggal, $waktu)
    {
        return $this->get("/dashboard/waktutunggu/tanggal/$tanggal/waktu/$waktu");
    }

    /**
     * Dashboard Per Bulan
     *
     * Dashboard waktu per bulan
     *
     * @param string $tahun tahun
     * @param string $bulan bulan
     * @param string $waktu waktu (rs/server)
     */
    public function dashboardPerBulan($tahun, $bulan, $waktu)
    {
        return $this->get("/dashboard/waktutunggu/bulan/$bulan/tahun/$tahun/waktu/$waktu");
    }

    /**
     * Dashboard Per Tahun
     *
     * Dashboard waktu per tahun
     *
     * @param Carbon $tanggal
     */
    public function antreanPerTanggal(Carbon $tanggal)
    {
        return $this->get("/antrean/pendaftaran/tanggal/" . $tanggal->format('Y-m-d'));
    }

    /**
     * Antrean Per Kode Booking
     *
     * Melihat pendaftaran antrean per kode booking
     *
     * @param mixed $kodeBooking
     */
    public function antreanPerKodeBooking($kodeBooking)
    {
        return $this->get("/antrean/pendaftaran/kodebooking/$kodeBooking");
    }

    /**
     * Antrean Belum Dilayani
     *
     * Melihat pendaftaran antrean yang belum dilayani
     */
    public function antreanBelumDilayani()
    {
        return $this->get("/antrean/pendaftaran/aktif");
    }

    /**
     * Antrean Belum Dilayani Per Poli Per Dokter Per Hari Per Jam Praktek
     *
     * Melihat pendaftaran antrean belum dilayani per poli per dokter per hari per jam praktek
     *
     * @param string $kodePoli
     * @param int $kodedokter
     * @param int $hari
     * @param mixed $jamPraktek
     * @return void
     */
    public function antreanPerPoliPerDokterPerHariPerJamPraktek($kodePoli, $kodedokter, $hari, $jamPraktek)
    {
        return $this->get("/antrean/pendaftaran/kodepoli/$kodePoli/kodedokter/$kodedokter/hari/$hari/jampraktek/$jamPraktek");
    }
}
