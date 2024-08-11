<?php

namespace BpjsBridging\PCare\RequestObject;

use BpjsBridging\RequestObject;
use Carbon\Carbon;

class KunjunganRequest implements RequestObject
{
    private $noKunjungan;
    private $noKartu;
    private $tglDaftar;
    private $kdPoli;
    private $keluhan;
    private $kdSadar;
    private $sistole;
    private $diastole;
    private $beratBadan;
    private $tinggiBadan;
    private $respRate;
    private $heartRate;
    private $lingkarPerut;
    private $kdStatusPulang;
    private $tglPulang;
    private $kdDokter;
    private $kdDiag1;
    private $kdDiag2;
    private $kdDiag3;
    private $kdPoliRujukInternal;
    private $kdTacc;
    private $alasanTacc;
    private $anamnesa;
    private $alergiMakan;
    private $alergiUdara;
    private $alergiObat;
    private $kdPrognosa;
    private $terapiObat;
    private $terapiNonObat;
    private $bmhp;
    private $suhu;
    private RujukLanjut $rujukLanjut;

    public function __construct(
        string $noKunjungan = null,
        string $noKartu,
        Carbon $tglDaftar,
        string $kdPoli = null,
        string $keluhan,
        string $kdSadar,
        int $sistole,
        int $diastole,
        int $beratBadan,
        int $tinggiBadan,
        int $respRate,
        int $heartRate,
        int $lingkarPerut,
        string $kdStatusPulang,
        Carbon $tglPulang,
        string $kdDokter,
        string $kdDiag1,
        string $kdDiag2 = null,
        string $kdDiag3 = null,
        string $kdPoliRujukInternal = null,
        int $kdTacc = 0,
        string $alasanTacc = null,
        string $anamnesa,
        string $alergiMakan,
        string $alergiUdara,
        string $alergiObat,
        string $kdPrognosa,
        string $terapiObat,
        string $terapiNonObat,
        string $bmhp,
        string $suhu
    ){
        $this->noKunjungan = $noKunjungan;
        $this->noKartu = $noKartu;
        $this->tglDaftar = $tglDaftar->isoFormat('DD-MM-YYYY');
        $this->kdPoli = $kdPoli;
        $this->keluhan = $keluhan;
        $this->kdSadar = $kdSadar;
        $this->sistole = $sistole;
        $this->diastole = $diastole;
        $this->beratBadan = $beratBadan;
        $this->tinggiBadan = $tinggiBadan;
        $this->respRate = $respRate;
        $this->heartRate = $heartRate;
        $this->lingkarPerut = $lingkarPerut;
        $this->kdStatusPulang = $kdStatusPulang;
        $this->tglPulang = $tglPulang->isoFormat('DD-MM-YYYY');
        $this->kdDokter = $kdDokter;
        $this->kdDiag1 = $kdDiag1;
        $this->kdDiag2 = $kdDiag2;
        $this->kdDiag3 = $kdDiag3;
        $this->kdPoliRujukInternal = $kdPoliRujukInternal;
        $this->kdTacc = $kdTacc;
        $this->alasanTacc = $alasanTacc;
        $this->anamnesa = $anamnesa;
        $this->alergiMakan = $alergiMakan;
        $this->alergiUdara = $alergiUdara;
        $this->alergiObat = $alergiObat;
        $this->kdPrognosa = $kdPrognosa;
        $this->terapiObat = $terapiObat;
        $this->terapiNonObat = $terapiNonObat;
        $this->bmhp = $bmhp;
        $this->suhu = $suhu;
    }

    public function setNoKunjungan(string $value){
        $this->noKunjungan = $value;
        return $this;
    }

    public function setNoKartu(string $value){
        $this->noKartu = $value;
        return $this;
    }

    public function setTglDaftar(Carbon $value){
        $this->tglDaftar = $value->isoFormat('DD-MM-YYYY');
        return $this;
    }

    public function setKdPoli(string $value){
        $this->kdPoli = $value;
        return $this;
    }

    public function setKeluhan(string $value){
        $this->keluhan = $value;
        return $this;
    }

    public function setKdSadar(string $value){
        $this->kdSadar = $value;
        return $this;
    }

    public function setSistole(int $value){
        $this->sistole = $value;
        return $this;
    }

    public function setDiastole(int $value){
        $this->diastole = $value;
        return $this;
    }

    public function setBeratBadan(int $value){
        $this->beratBadan = $value;
        return $this;
    }

    public function setTinggiBadan(int $value){
        $this->tinggiBadan = $value;
        return $this;
    }

    public function setRespRate(int $value){
        $this->respRate = $value;
        return $this;
    }

    public function setHeartRate(int $value){
        $this->heartRate = $value;
        return $this;
    }

    public function setLingkarPerut(int $value){
        $this->lingkarPerut = $value;
        return $this;
    }

    public function setKdStatusPulang(string $value){
        $this->kdStatusPulang = $value;
        return $this;
    }

    public function setTglPulang(Carbon $value){
        $this->tglPulang = $value->isoFormat('DD-MM-YYYY');
        return $this;
    }

    public function setKdDokter(string $value){
        $this->kdDokter = $value;
        return $this;
    }

    public function setKdDiag1(string $value){
        $this->kdDiag1 = $value;
        return $this;
    }

    public function setKdDiag2(string $value){
        $this->kdDiag2 = $value;
        return $this;
    }

    public function setKdDiag3(string $value){
        $this->kdDiag3 = $value;
        return $this;
    }

    public function setKdPoliRujukInternal(string $value){
        $this->kdPoliRujukInternal = $value;
        return $this;
    }

    /**
     * Menetapkan nilai dari properti kdTacc.
     *
     * @param int $value Nilai baru untuk properti kdTacc.
     * @return $this Instance objek saat ini.
     * @see \BpjsBridging\PCare\Bridging::TACC_TANPA_TACC
     * @see \BpjsBridging\PCare\Bridging::TACC_TIME
     * @see \BpjsBridging\PCare\Bridging::TACC_AGE
     * @see \BpjsBridging\PCare\Bridging::TACC_COMPLICATION
     * @see \BpjsBridging\PCare\Bridging::TACC_COMORBIDITY
     */
    public function setKdTacc(int $value){
        $this->kdTacc = $value;
        return $this;
    }

    /**
     * Mengatur nilai dari properti alasanTacc.
     *
     * @param string $value Nilai baru untuk properti alasanTacc.
     * @return $this Instance dari objek saat ini.
     * @see \BpjsBridging\PCare\Bridging::TACC_TANPA_TACC
     * @see \BpjsBridging\PCare\Bridging::TACC_TIME
     * @see \BpjsBridging\PCare\Bridging::TACC_AGE
     * @see \BpjsBridging\PCare\Bridging::TACC_COMPLICATION
     * @see \BpjsBridging\PCare\Bridging::TACC_COMORBIDITY
     */
    public function setAlasanTacc(string $value){
        $this->alasanTacc = $value;
        return $this;
    }

    public function setAnamnesa(string $value){
        $this->anamnesa = $value;
        return $this;
    }

    public function setAlergiMakan(string $value){
        $this->alergiMakan = $value;
        return $this;
    }

    public function setAlergiUdara(string $value){
        $this->alergiUdara = $value;
        return $this;
    }

    public function setAlergiObat(string $value){
        $this->alergiObat = $value;
        return $this;
    }

    public function setKdPrognosa(string $value){
        $this->kdPrognosa = $value;
        return $this;
    }

    public function setTerapiObat(string $value){
        $this->terapiObat = $value;
        return $this;
    }

    public function setTerapiNonObat(string $value){
        $this->terapiNonObat = $value;
        return $this;
    }

    public function setBmhp(string $value){
        $this->bmhp = $value;
        return $this;
    }

    public function setSuhu(string $value){
        $this->suhu = $value;
        return $this;
    }

    public function setRujukLanjut(RujukLanjut $value) {
        $this->rujukLanjut = $value;
        return $this;
    }

    public function toData() {
        return [
            'tglDaftar' => $this->tglDaftar,
            'noKunjungan' => $this->noKunjungan,
            'noKartu' => $this->noKartu,
            'kdPoli' => $this->kdPoli,
            'keluhan' => $this->keluhan,
            'kdSadar' => $this->kdSadar,
            'sistole' => $this->sistole,
            'diastole' => $this->diastole,
            'beratBadan' => $this->beratBadan,
            'tinggiBadan' => $this->tinggiBadan,
            'respRate' => $this->respRate,
            'heartRate' => $this->heartRate,
            'lingkarPerut' => $this->lingkarPerut,
            'kdStatusPulang' => $this->kdStatusPulang,
            'tglPulang' => $this->tglPulang,
            'kdDokter' => $this->kdDokter,
            'kdDiag1' => $this->kdDiag1,
            'kdDiag2' => $this->kdDiag2,
            'kdDiag3' => $this->kdDiag3,
            'kdPoliRujukInternal' => $this->kdPoliRujukInternal,
            'kdTacc' => $this->kdTacc,
            'alasanTacc' => $this->alasanTacc,
            'anamnesa' => $this->anamnesa,
            'alergiMakan' => $this->alergiMakan,
            'alergiUdara' => $this->alergiUdara,
            'alergiObat' => $this->alergiObat,
            'kdPrognosa' => $this->kdPrognosa,
            'terapiObat' => $this->terapiObat,
            'terapiNonObat' => $this->terapiNonObat,
            'bmhp' => $this->bmhp,
            'suhu' => $this->suhu,
            'rujukLanjut' => $this->rujukLanjut->toData(),
        ];
    }

    public function validate() {
        if (!$this->rujukLanjut) return false;

        return true;
    }
}
