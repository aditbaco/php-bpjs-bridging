<?php

namespace BpjsBridging\ICare;

use BpjsBridging\Bridge;
use Carbon\Carbon;

class Bridging extends Bridge
{
    public function validate(bool $pcare, string $noKartu, string $kdDokter = null)
    {
        $body = [
            'param' => $noKartu,
        ];
        $module = 'pcare';

        if (!$pcare) {
            $body['kodedokter'] = $kdDokter;
            $module = 'rs';
        }
        return $this->post("/api/$module/validate", $body);
    }
}
