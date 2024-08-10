<?php

namespace BpjsBridging\Antrean\RequestObject;

use BpjsBridging\RequestObject;
use Carbon\Carbon;

class AntreanRequest implements RequestObject
{
    /**
     * @var string kodebooking yang dibuat unik
     */
    public $kodebooking;
    /**
     * @var string JKN / NON JKN
     */
    public $jenispasien;
    /**
     * @var string noka pasien BPJS,diisi kosong jika NON JKN
     */
    public $nomorkartu;
    /**
     * @var string nik pasien
     */
    public $nik;
    /**
     * @var string no hp pasien
     */
    public $nohp;
    /**
     * @var string memakai kode subspesialis BPJS
     */
    public $kodepoli;
    /**
     * @var string nama poli
     */
    public $namapoli;
    /**
     * @var string 1(Ya), 0(Tidak)
     */
    public $pasienbaru;
    /**
     * @var string no rekam medis pasien
     */
    public $norm;
    /**
     * @var string tanggal periksa
     */
    public $tanggalperiksa;
    /**
     * @var string|Carbon kode dokter BPJS
     */
    public $kodedokter;
    /**
     * @var string nama dokter
     */
    public $namadokter;
    /**
     * @var string jam praktek dokter
     */
    public $jampraktek;
    /**
     * @var string 1 (Rujukan FKTP), 2 (Rujukan Internal), 3 (Kontrol), 4 (Rujukan Antar RS)
     */
    public $jeniskunjungan;
    /**
     * @var string norujukan/kontrol pasien JKN,diisi kosong jika NON JKN
     */
    public $nomorreferensi;
    /**
     * @var string nomor antrean pasien
     */
    public $nomorantrean;
    /**
     * @var string angka antrean
     */
    public $angkaantrean;
    /**
     * @var string|Carbon waktu estimasi dilayani dalam miliseconds
     */
    public $estimasidilayani;
    /**
     * @var string sisa kuota JKN
     */
    public $sisakuotajkn;
    /**
     * @var string kuota JKN
     */
    public $kuotajkn;
    /**
     * @var string sisa kuota non JKN
     */
    public $sisakuotanonjkn;
    /**
     * @var string kuota non JKN
     */
    public $kuotanonjkn;
    /**
     * @var string informasi untuk pasien
     */
    public $keterangan;

    public function __construct(
        $kodebooking = null,
        $jenispasien = null,
        $nomorkartu = null,
        $nik = null,
        $nohp = null,
        $kodepoli = null,
        $namapoli = null,
        $pasienbaru = null,
        $norm = null,
        string|Carbon $tanggalperiksa = null,
        $kodedokter = null,
        $namadokter = null,
        $jampraktek = null,
        $jeniskunjungan = null,
        $nomorreferensi = null,
        $nomorantrean = null,
        $angkaantrean = null,
        string|Carbon $estimasidilayani = null,
        $sisakuotajkn = null,
        $kuotajkn = null,
        $sisakuotanonjkn = null,
        $kuotanonjkn = null,
        $keterangan = null
    ) {
        $this->kodebooking = $kodebooking;
        $this->jenispasien = $jenispasien;
        $this->nomorkartu = $nomorkartu;
        $this->nik = $nik;
        $this->nohp = $nohp;
        $this->kodepoli = $kodepoli;
        $this->namapoli = $namapoli;
        $this->pasienbaru = $pasienbaru;
        $this->norm = $norm;
        $this->tanggalperiksa = $tanggalperiksa;
        $this->kodedokter = $kodedokter;
        $this->namadokter = $namadokter;
        $this->jampraktek = $jampraktek;
        $this->jeniskunjungan = $jeniskunjungan;
        $this->nomorreferensi = $nomorreferensi;
        $this->nomorantrean = $nomorantrean;
        $this->angkaantrean = $angkaantrean;
        $this->estimasidilayani = $estimasidilayani;
        $this->sisakuotajkn = $sisakuotajkn;
        $this->kuotajkn = $kuotajkn;
        $this->sisakuotanonjkn = $sisakuotanonjkn;
        $this->kuotanonjkn = $kuotanonjkn;
        $this->keterangan = $keterangan;
    }

    public function validate() {
        // make sure none of the required fields are empty
        $requiredFields = [
            'kodebooking',
            'jenispasien',
            'nomorkartu',
            'nik',
            'nohp',
            'kodepoli',
            'namapoli',
            'pasienbaru',
            'norm',
            'tanggalperiksa',
            'kodedokter',
            'namadokter',
            'jampraktek',
            'jeniskunjungan',
            'nomorreferensi',
            'nomorantrean',
            'angkaantrean',
            'estimasidilayani',
            'sisakuotajkn',
            'kuotajkn',
            'sisakuotanonjkn',
            'kuotanonjkn',
            'keterangan',
        ];
        foreach ($requiredFields as $field) {
            if (empty($this->$field)) {
                throw new \Exception("Field $field is required");
            }
        }
    }

    public function toData()
    {
        $this->validate();
        $tglPeriksa = $this->tanggalperiksa;
        if ($tglPeriksa instanceof Carbon) {
            $tglPeriksa = $tglPeriksa->toDateString();
        }
        $estimasiDilayani = $this->estimasidilayani;
        if ($estimasiDilayani instanceof Carbon) {
            $estimasiDilayani = $estimasiDilayani->unix() * 1000;
        }

        return [
            "kodebooking" => $this->kodebooking,
            "jenispasien" => $this->jenispasien,
            "nomorkartu" => $this->nomorkartu,
            "nik" => $this->nik,
            "nohp" => $this->nohp,
            "kodepoli" => $this->kodepoli,
            "namapoli" => $this->namapoli,
            "pasienbaru" => $this->pasienbaru,
            "norm" => $this->norm,
            "tanggalperiksa" => $tglPeriksa,
            "kodedokter" => $this->kodedokter,
            "namadokter" => $this->namadokter,
            "jampraktek" => $this->jampraktek,
            "jeniskunjungan" => $this->jeniskunjungan,
            "nomorreferensi" => $this->nomorreferensi,
            "nomorantrean" => $this->nomorantrean,
            "angkaantrean" => $this->angkaantrean,
            "estimasidilayani" => $this->estimasidilayani,
            "sisakuotajkn" => $this->sisakuotajkn,
            "kuotajkn" => $this->kuotajkn,
            "sisakuotanonjkn" => $this->sisakuotanonjkn,
            "kuotanonjkn" => $this->kuotanonjkn,
            "keterangan" => $this->keterangan,
        ];
    }

    public function setKodeBooking($kodebooking)
    {
        $this->kodebooking = $kodebooking;
        return $this;
    }

    public function setJenisPasien($jenispasien)
    {
        $this->jenispasien = $jenispasien;
        return $this;
    }

    public function setNomorKartu($nomorkartu)
    {
        $this->nomorkartu = $nomorkartu;
        return $this;
    }

    public function setNik($nik)
    {
        $this->nik = $nik;
        return $this;
    }

    public function setNoHp($nohp)
    {
        $this->nohp = $nohp;
        return $this;
    }

    public function setKodePoli($kodepoli)
    {
        $this->kodepoli = $kodepoli;
        return $this;
    }

    public function setNamaPoli($namapoli)
    {
        $this->namapoli = $namapoli;
        return $this;
    }

    public function setPasienBaru($pasienbaru)
    {
        $this->pasienbaru = $pasienbaru;
        return $this;
    }

    public function setNorm($norm)
    {
        $this->norm = $norm;
        return $this;
    }

    public function setTanggalPeriksa(string|Carbon $tanggalperiksa)
    {
        $this->tanggalperiksa = $tanggalperiksa;
        return $this;
    }

    public function setKodeDokter($kodedokter)
    {
        $this->kodedokter = $kodedokter;
        return $this;
    }

    public function setNamaDokter($namadokter)
    {
        $this->namadokter = $namadokter;
        return $this;
    }

    public function setJamPraktek($jampraktek)
    {
        $this->jampraktek = $jampraktek;
        return $this;
    }

    public function setJenisKunjungan($jeniskunjungan)
    {
        $this->jeniskunjungan = $jeniskunjungan;
        return $this;
    }

    public function setNomorReferensi($nomorreferensi)
    {
        $this->nomorreferensi = $nomorreferensi;
        return $this;
    }

    public function setNomorAntrean($nomorantrean)
    {
        $this->nomorantrean = $nomorantrean;
        return $this;
    }

    public function setAngkaAntrean($angkaantrean)
    {
        $this->angkaantrean = $angkaantrean;
        return $this;
    }

    public function setEstimasiDilayani(string|Carbon $estimasidilayani)
    {
        $this->estimasidilayani = $estimasidilayani;
        return $this;
    }

    public function setSisaKuotaJKN($sisakuotajkn)
    {
        $this->sisakuotajkn = $sisakuotajkn;
        return $this;
    }

    public function setKuotaJKN($kuotajkn)
    {
        $this->kuotajkn = $kuotajkn;
        return $this;
    }

    public function setSisaKuotaNonJKN($sisakuotanonjkn)
    {
        $this->sisakuotanonjkn = $sisakuotanonjkn;
        return $this;
    }

    public function setKuotaNonJKN($kuotanonjkn)
    {
        $this->kuotanonjkn = $kuotanonjkn;
        return $this;
    }

    public function setKeterangan($keterangan)
    {
        $this->keterangan = $keterangan;
        return $this;
    }
}
