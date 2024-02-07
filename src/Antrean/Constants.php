<?php
namespace BpjsBridging\Antrean;

interface Constants {
    public static const YA = 1;
    public static const TIDAK = 0;

    public static const RUJUKAN_FKTP = 1;
    public static const RUJUKAN_INTERNAL = 2;
    public static const KONTROL = 3;
    public static const RUJUKAN_ANTAR_RS = 4;

    public static const JENIS_IDENTITAS_NIK = 'NIK';
    public static const JENIS_IDENTITAS_NO_BPJS = 'NOKA';

    public static const SENIN = 1;
    public static const SELASA = 2;
    public static const RABU = 3;
    public static const KAMIS = 4;
    public static const JUMAT = 5;
    public static const SABTU = 6;
    public static const MINGGU = 7;
    public static const LIBUR_NASIONAL = 8;

    public static const RESEP_RACIKAN = 'racikan';
    public static const RESEP_NON_RACIKAN = 'non racikan';

    public static const TASK_MULAI_WAKTU_TUNGGU_ADMISI = 1;
    public static const TASK_AKHIR_WAKTU_TUNGGU_ADMISI = 2;
    public static const TASK_MULAI_WAKTU_LAYAN_ADMISI = 2;
    public static const TASK_AKHIR_WAKTU_LAYAN_ADMISI = 3;
    public static const TASK_MULAI_WAKTU_TUNGGU_POLI = 3;
    public static const TASK_AKHIR_WAKTU_TUNGGU_POLI = 4;
    public static const TASK_MULAI_WAKTU_LAYAN_POLI = 4;
    public static const TASK_AKHIR_WAKTU_LAYAN_POLI = 5;
    public static const TASK_MULAI_WAKTU_TUNGGU_FARMASI = 5;
    public static const TASK_AKHIR_WAKTU_TUNGGU_FARMASI = 6;
    public static const TASK_MULAI_WAKTU_LAYAN_FARMASI = 6;
    public static const TASK_AKHIR_WAKTU_LAYAN_FARMASI = 7;
    public static const TASK_TIDAK_HADIR = 99;
    public static const TASK_BATAL = 99;
}
