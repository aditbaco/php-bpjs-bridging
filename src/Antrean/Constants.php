<?php
namespace BpjsBridging\Antrean;

interface Constants {
    public const YA = 1;
    public const TIDAK = 0;

    public const RUJUKAN_FKTP = 1;
    public const RUJUKAN_INTERNAL = 2;
    public const KONTROL = 3;
    public const RUJUKAN_ANTAR_RS = 4;

    public const JENIS_IDENTITAS_NIK = 'NIK';
    public const JENIS_IDENTITAS_NO_BPJS = 'NOKA';

    public const SENIN = 1;
    public const SELASA = 2;
    public const RABU = 3;
    public const KAMIS = 4;
    public const JUMAT = 5;
    public const SABTU = 6;
    public const MINGGU = 7;
    public const LIBUR_NASIONAL = 8;

    public const RESEP_RACIKAN = 'racikan';
    public const RESEP_NON_RACIKAN = 'non racikan';

    public const TASK_MULAI_WAKTU_TUNGGU_ADMISI = 1;
    public const TASK_AKHIR_WAKTU_TUNGGU_ADMISI = 2;
    public const TASK_MULAI_WAKTU_LAYAN_ADMISI = 2;
    public const TASK_AKHIR_WAKTU_LAYAN_ADMISI = 3;
    public const TASK_MULAI_WAKTU_TUNGGU_POLI = 3;
    public const TASK_AKHIR_WAKTU_TUNGGU_POLI = 4;
    public const TASK_MULAI_WAKTU_LAYAN_POLI = 4;
    public const TASK_AKHIR_WAKTU_LAYAN_POLI = 5;
    public const TASK_MULAI_WAKTU_TUNGGU_FARMASI = 5;
    public const TASK_AKHIR_WAKTU_TUNGGU_FARMASI = 6;
    public const TASK_MULAI_WAKTU_LAYAN_FARMASI = 6;
    public const TASK_AKHIR_WAKTU_LAYAN_FARMASI = 7;
    public const TASK_TIDAK_HADIR = 99;
    public const TASK_BATAL = 99;
}
