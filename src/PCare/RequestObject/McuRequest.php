<?php

namespace BpjsBridging\PCare\RequestObject;

use BpjsBridging\RequestObject;
use Carbon\Carbon;

class McuRequest implements RequestObject
{

    private $kdMCU;
    private $noKunjungan;
    private $kdProvider;
    private $tglPelayanan;
    private $tekananDarahSistole;
    private $tekananDarahDiastole;
    private $radiologiFoto;
    private $darahRutinHemo;
    private $darahRutinLeu;
    private $darahRutinErit;
    private $darahRutinLaju;
    private $darahRutinHema;
    private $darahRutinTrom;
    private $lemakDarahHDL;
    private $lemakDarahLDL;
    private $lemakDarahChol;
    private $lemakDarahTrigli;
    private $gulaDarahSewaktu;
    private $gulaDarahPuasa;
    private $gulaDarahPostPrandial;
    private $gulaDarahHbA1c;
    private $fungsiHatiSGOT;
    private $fungsiHatiSGPT;
    private $fungsiHatiGamma;
    private $fungsiHatiProtKual;
    private $fungsiHatiAlbumin;
    private $fungsiGinjalCrea;
    private $fungsiGinjalUreum;
    private $fungsiGinjalAsam;
    private $fungsiJantungABI;
    private $fungsiJantungEKG;
    private $fungsiJantungEcho;
    private $funduskopi;
    private $pemeriksaanLain;
    private $keterangan;

    public function __construct(
        int $kdMCU = 0,
        string $noKunjungan = null,
        string $kdProvider = null,
        Carbon $tglPelayanan = null,
        int $tekananDarahSistole = 0,
        int $tekananDarahDiastole = 0,
        string $radiologiFoto = null,
        int $darahRutinHemo = 0,
        int $darahRutinLeu = 0,
        int $darahRutinErit = 0,
        int $darahRutinLaju = 0,
        int $darahRutinHema = 0,
        int $darahRutinTrom = 0,
        int $lemakDarahHDL = 0,
        int $lemakDarahLDL = 0,
        int $lemakDarahChol = 0,
        int $lemakDarahTrigli = 0,
        int $gulaDarahSewaktu = 0,
        int $gulaDarahPuasa = 0,
        int $gulaDarahPostPrandial = 0,
        int $gulaDarahHbA1c = 0,
        int $fungsiHatiSGOT = 0,
        int $fungsiHatiSGPT = 0,
        int $fungsiHatiGamma = 0,
        int $fungsiHatiProtKual = 0,
        int $fungsiHatiAlbumin = 0,
        int $fungsiGinjalCrea = 0,
        int $fungsiGinjalUreum = 0,
        int $fungsiGinjalAsam = 0,
        int $fungsiJantungABI = 0,
        string $fungsiJantungEKG = null,
        string $fungsiJantungEcho = null,
        string $funduskopi = null,
        string $pemeriksaanLain = null,
        string $keterangan = null
    ) {
        $this->kdMCU = $kdMCU;
        $this->noKunjungan = $noKunjungan;
        $this->kdProvider = $kdProvider;
        $this->tglPelayanan = $tglPelayanan->isoFormat('DD-MM-YYYY');
        $this->tekananDarahSistole = $tekananDarahSistole;
        $this->tekananDarahDiastole = $tekananDarahDiastole;
        $this->radiologiFoto = $radiologiFoto;
        $this->darahRutinHemo = $darahRutinHemo;
        $this->darahRutinLeu = $darahRutinLeu;
        $this->darahRutinErit = $darahRutinErit;
        $this->darahRutinLaju = $darahRutinLaju;
        $this->darahRutinHema = $darahRutinHema;
        $this->darahRutinTrom = $darahRutinTrom;
        $this->lemakDarahHDL = $lemakDarahHDL;
        $this->lemakDarahLDL = $lemakDarahLDL;
        $this->lemakDarahChol = $lemakDarahChol;
        $this->lemakDarahTrigli = $lemakDarahTrigli;
        $this->gulaDarahSewaktu = $gulaDarahSewaktu;
        $this->gulaDarahPuasa = $gulaDarahPuasa;
        $this->gulaDarahPostPrandial = $gulaDarahPostPrandial;
        $this->gulaDarahHbA1c = $gulaDarahHbA1c;
        $this->fungsiHatiSGOT = $fungsiHatiSGOT;
        $this->fungsiHatiSGPT = $fungsiHatiSGPT;
        $this->fungsiHatiGamma = $fungsiHatiGamma;
        $this->fungsiHatiProtKual = $fungsiHatiProtKual;
        $this->fungsiHatiAlbumin = $fungsiHatiAlbumin;
        $this->fungsiGinjalCrea = $fungsiGinjalCrea;
        $this->fungsiGinjalUreum = $fungsiGinjalUreum;
        $this->fungsiGinjalAsam = $fungsiGinjalAsam;
        $this->fungsiJantungABI = $fungsiJantungABI;
        $this->fungsiJantungEKG = $fungsiJantungEKG;
        $this->fungsiJantungEcho = $fungsiJantungEcho;
        $this->funduskopi = $funduskopi;
        $this->pemeriksaanLain = $pemeriksaanLain;
        $this->keterangan = $keterangan;
    }

    public function setKdMCU(int $value): self { $this->kdMCU = $value; return $this; }
    public function setNoKunjungan(string $value): self { $this->noKunjungan = $value; return $this; }
    public function setKdProvider(string $value): self { $this->kdProvider = $value; return $this; }
    public function setTglPelayanan(Carbon $value): self { $this->tglPelayanan = $value->isoFormat('DD-MM-YYYY'); return $this; }
    public function setTekananDarahSistole(int $value): self { $this->tekananDarahSistole = $value; return $this; }
    public function setTekananDarahDiastole(int $value): self { $this->tekananDarahDiastole = $value; return $this; }
    public function setRadiologiFoto(string $value): self { $this->radiologiFoto = $value; return $this; }
    public function setDarahRutinHemo(int $value): self { $this->darahRutinHemo = $value; return $this; }
    public function setDarahRutinLeu(int $value): self { $this->darahRutinLeu = $value; return $this; }
    public function setDarahRutinErit(int $value): self { $this->darahRutinErit = $value; return $this; }
    public function setDarahRutinLaju(int $value): self { $this->darahRutinLaju = $value; return $this; }
    public function setDarahRutinHema(int $value): self { $this->darahRutinHema = $value; return $this; }
    public function setDarahRutinTrom(int $value): self { $this->darahRutinTrom = $value; return $this; }
    public function setLemakDarahHDL(int $value): self { $this->lemakDarahHDL = $value; return $this; }
    public function setLemakDarahLDL(int $value): self { $this->lemakDarahLDL = $value; return $this; }
    public function setLemakDarahChol(int $value): self { $this->lemakDarahChol = $value; return $this; }
    public function setLemakDarahTrigli(int $value): self { $this->lemakDarahTrigli = $value; return $this; }
    public function setGulaDarahSewaktu(int $value): self { $this->gulaDarahSewaktu = $value; return $this; }
    public function setGulaDarahPuasa(int $value): self { $this->gulaDarahPuasa = $value; return $this; }
    public function setGulaDarahPostPrandial(int $value): self { $this->gulaDarahPostPrandial = $value; return $this; }
    public function setGulaDarahHbA1c(int $value): self { $this->gulaDarahHbA1c = $value; return $this; }
    public function setFungsiHatiSGOT(int $value): self { $this->fungsiHatiSGOT = $value; return $this; }
    public function setFungsiHatiSGPT(int $value): self { $this->fungsiHatiSGPT = $value; return $this; }
    public function setFungsiHatiGamma(int $value): self { $this->fungsiHatiGamma = $value; return $this; }
    public function setFungsiHatiProtKual(int $value): self { $this->fungsiHatiProtKual = $value; return $this; }
    public function setFungsiHatiAlbumin(int $value): self { $this->fungsiHatiAlbumin = $value; return $this; }
    public function setFungsiGinjalCrea(int $value): self { $this->fungsiGinjalCrea = $value; return $this; }
    public function setFungsiGinjalUreum(int $value): self { $this->fungsiGinjalUreum = $value; return $this; }
    public function setFungsiGinjalAsam(int $value): self { $this->fungsiGinjalAsam = $value; return $this; }
    public function setFungsiJantungABI(int $value): self { $this->fungsiJantungABI = $value; return $this; }
    public function setFungsiJantungEKG(string $value): self { $this->fungsiJantungEKG = $value; return $this; }
    public function setFungsiJantungEcho(string $value): self { $this->fungsiJantungEcho = $value; return $this; }
    public function setFunduskopi(string $value): self { $this->funduskopi = $value; return $this; }
    public function setPemeriksaanLain(string $value): self { $this->pemeriksaanLain = $value; return $this; }
    public function setKeterangan(string $value): self { $this->keterangan = $value; return $this; }

    public function toData() {
        return [
            'kdMCU' => $this->kdMCU,
            'noKunjungan' => $this->noKunjungan,
            'kdProvider' => $this->kdProvider,
            'tglPelayanan' => $this->tglPelayanan,
            'tekananDarahSistole' => $this->tekananDarahSistole,
            'tekananDarahDiastole' => $this->tekananDarahDiastole,
            'radiologiFoto' => $this->radiologiFoto,
            'darahRutinHemo' => $this->darahRutinHemo,
            'darahRutinLeu' => $this->darahRutinLeu,
            'darahRutinErit' => $this->darahRutinErit,
            'darahRutinLaju' => $this->darahRutinLaju,
            'darahRutinHema' => $this->darahRutinHema,
            'darahRutinTrom' => $this->darahRutinTrom,
            'lemakDarahHDL' => $this->lemakDarahHDL,
            'lemakDarahLDL' => $this->lemakDarahLDL,
            'lemakDarahChol' => $this->lemakDarahChol,
            'lemakDarahTrigli' => $this->lemakDarahTrigli,
            'gulaDarahSewaktu' => $this->gulaDarahSewaktu,
            'gulaDarahPuasa' => $this->gulaDarahPuasa,
            'gulaDarahPostPrandial' => $this->gulaDarahPostPrandial,
            'gulaDarahHbA1c' => $this->gulaDarahHbA1c,
            'fungsiHatiSGOT' => $this->fungsiHatiSGOT,
            'fungsiHatiSGPT' => $this->fungsiHatiSGPT,
            'fungsiHatiGamma' => $this->fungsiHatiGamma,
            'fungsiHatiProtKual' => $this->fungsiHatiProtKual,
            'fungsiHatiAlbumin' => $this->fungsiHatiAlbumin,
            'fungsiGinjalCrea' => $this->fungsiGinjalCrea,
            'fungsiGinjalUreum' => $this->fungsiGinjalUreum,
            'fungsiGinjalAsam' => $this->fungsiGinjalAsam,
            'fungsiJantungABI' => $this->fungsiJantungABI,
            'fungsiJantungEKG' => $this->fungsiJantungEKG,
            'fungsiJantungEcho' => $this->fungsiJantungEcho,
            'funduskopi' => $this->funduskopi,
            'pemeriksaanLain' => $this->pemeriksaanLain,
            'keterangan' => $this->keterangan,
        ];
    }

    public function validate() {
        return true;
    }

}
