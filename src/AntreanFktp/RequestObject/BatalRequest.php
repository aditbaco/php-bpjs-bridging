<?php

namespace BpjsBridging\AntreanFktp\RequestObject;

use BpjsBridging\RequestObject;
use Carbon\Carbon;

class BatalRequest implements RequestObject
{
    private $tanggalperiksa;
    private $kodepoli;
    private $nomorkartu;
    private $alasan;

    public function __construct(
        Carbon $tanggalperiksa = null,
        string $kodepoli = '',
        string $nomorkartu = '',
        string $alasan = ''
    ) {
        $this->tanggalperiksa = $tanggalperiksa->isoFormat('YYYY-MM-DD');
        $this->kodepoli = $kodepoli;
        $this->nomorkartu = $nomorkartu;
        $this->alasan = $alasan;
    }

    public function setTanggalPeriksa(Carbon $value): self
    {
        $this->tanggalperiksa = $value->isoFormat('YYYY-MM-DD');
        return $this;
    }

    public function setKodePoli(string $value): self
    {
        $this->kodepoli = $value;
        return $this;
    }

    public function setNomorKartu(string $value): self
    {
        $this->nomorkartu = $value;
        return $this;
    }

    public function setAlasan(string $value): self
    {
        $this->alasan = $value;
        return $this;
    }

    public function toData(): array
    {
        return [
            'tanggalperiksa' => $this->tanggalperiksa,
            'kodepoli' => $this->kodepoli,
            'nomorkartu' => $this->nomorkartu,
            'alasan' => $this->alasan
        ];
    }

    public function validate(): bool
    {
        return true;
    }
}
