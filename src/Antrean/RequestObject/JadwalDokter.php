<?php

namespace BpjsBridging\Antrean\RequestObject;

use BpjsBridging\Antrean\Constants;
use BpjsBridging\RequestObject;
use Exception;

/**
 * Jadwal Dokter
 *
 * @package BpjsBridge\Antrean
 * @property int $hari
 * @property string $buka format hh:mm
 * @property string $tutup format hh:mm
 */
class JadwalDokter implements RequestObject
{
    public $hari;
    public $buka;
    public $tutup;

    public function __construct(int $hari, string $buka, string $tutup)
    {
        if ($hari < 1 || $hari > 8) {
            throw new Exception("Hari tidak valid");
        }
        $time_regex = "/\d{2}:\d{2}/";
        if (!preg_match($time_regex, $buka) || self::checkValidHour($buka)) {
            throw new Exception("Waktu Buka tidak valid");
        }
        if (!preg_match($time_regex, $tutup) || self::checkValidHour($tutup)) {
            throw new Exception("Waktu Tutup tidak valid");
        }

        $this->hari = $hari;
        $this->buka = $buka;
        $this->tutup = $tutup;
    }

    public function validate() {
        // validation done in constructor
        return true;
    }

    public function toData()
    {
        return [
            "hari" => $this->hari,
            "buka" => $this->buka,
            "tutup" => $this->tutup
        ];
    }

    public static function create(int $hari, string $buka, string $tutup)
    {
        return new JadwalDokter($hari, $buka, $tutup);
    }

    private static function checkValidHour($time)
    {
        $time = explode(":", $time);
        $hour = (int) $time[0];
        $minute = (int) $time[1];
        return ($hour >= 0 && $hour < 24 &&
            $minute >= 0 && $minute < 60
        );
    }
}
