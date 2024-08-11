<?php

namespace BpjsBridging\ICare;

use BpjsBridging\Bridge;
use Carbon\Carbon;

class Bridging extends Bridge
{
    public function validate(string $noKartu, string $kdDokter = null)
    {
        $body = [
            'param' => $noKartu,
        ];

        if ($kdDokter) {
            $body['kodedokter'] = $kdDokter;
        }
        return $this->post('/api/rs/validate', $body);
    }
}
