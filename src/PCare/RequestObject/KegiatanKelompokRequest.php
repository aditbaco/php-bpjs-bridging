<?php

namespace BpjsBridging\PCare\RequestObject;

use BpjsBridging\RequestObject;
use Carbon\Carbon;

class KegiatanKelompokRequest implements RequestObject
{
    private $eduId;
    private $clubId;
    private $tglPelayanan;
    private $kdKegiatan;
    private $kdKelompok;
    private $materi;
    private $pembicara;
    private $lokasi;
    private $keterangan;
    private $biaya;

    public function __construct(
        string $tglPelayanan = null,
        string $kdKegiatan = null,
        string $kdKelompok = null,
        string $materi = null,
        string $pembicara = null,
        string $lokasi = null,
        string $keterangan = null,
        int $biaya = null
    ) {
        $this->tglPelayanan = $tglPelayanan;
        $this->kdKegiatan = $kdKegiatan;
        $this->kdKelompok = $kdKelompok;
        $this->materi = $materi;
        $this->pembicara = $pembicara;
        $this->lokasi = $lokasi;
        $this->keterangan = $keterangan;
        $this->biaya = $biaya;
    }

    public function setEduId($eduId)
    {
        $this->eduId = $eduId;
        return $this;
    }

    public function setClubId($clubId)
    {
        $this->clubId = $clubId;
        return $this;
    }

    public function setTglPelayanan(string $tglPelayanan)
    {
        $this->tglPelayanan = $tglPelayanan;
        return $this;
    }

    /**
     * Sets the kdKegiatan attribute of the current object.
     *
     * @param mixed $kdKegiatan The value to be set for kdKegiatan.
     * @return self
     * @see \BpjsBridging\PCare\Bridging::KEGIATAN_KELOMPOK_SENAM
     * @see \BpjsBridging\PCare\Bridging::KEGIATAN_KELOMPOK_PENYULUHAN
     * @see \BpjsBridging\PCare\Bridging::KEGIATAN_KELOMPOK_PENYULUHAN_DAN_SENAM
     */
    public function setKdKegiatan($kdKegiatan)
    {
        $this->kdKegiatan = $kdKegiatan;
        return $this;
    }

    /**
     * Sets the kdKelompok attribute of the current object.
     *
     * @param mixed $kdKelompok The value to be set for kdKelompok.
     * @return self
     * @see \BpjsBridging\PCare\Bridging::KELOMPOK_DIABETES_MELITUS
     * @see \BpjsBridging\PCare\Bridging::KELOMPOK_HIPERTENSI
     */
    public function setKdKelompok($kdKelompok)
    {
        $this->kdKelompok = $kdKelompok;
        return $this;
    }

    public function setMateri($materi)
    {
        $this->materi = $materi;
        return $this;
    }

    public function setPembicara($pembicara)
    {
        $this->pembicara = $pembicara;
        return $this;
    }

    public function setLokasi($lokasi)
    {
        $this->lokasi = $lokasi;
        return $this;
    }

    public function setKeterangan($keterangan)
    {
        $this->keterangan = $keterangan;
        return $this;
    }

    public function setBiaya($biaya)
    {
        $this->biaya = $biaya;
        return $this;
    }

    public function toData()
    {
        return [
            'eduId' => $this->eduId,
            'clubId' => $this->clubId,
            'tglPelayanan' => $this->tglPelayanan,
            'kdKegiatan' => $this->kdKegiatan,
            'kdKelompok' => $this->kdKelompok,
            'materi' => $this->materi,
            'pembicara' => $this->pembicara,
            'lokasi' => $this->lokasi,
            'keterangan' => $this->keterangan,
            'biaya' => $this->biaya,
        ];
    }

    public function validate()
    {
        return true;
    }
}
