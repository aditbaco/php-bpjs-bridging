# PHP BPJS Bridging

Implementasi sederhana untuk bridging BPJS dengan PHP

## Instalasi

Instalasi dilakukan menggunakan [Composer](https://getcomposer.org/). Pastikan Composer telah terpasang di environment Anda sebelum melanjutkan.

```bash
composer require susutawar/php-bpjs-bridging
```

## Penggunaan

```php
<?php

require_once __DIR__ . '/vendor/autoload.php';

use BpjsBridging\Antrean\Bridging as AntreanRs;
use BpjsBridging\Config;

$konfigurasi = new Config();
$bridging = new AntreanRs($konfigurasi);
```

Jika tidak di isi, Konfigurasi akan otomatis membaca environment variable yang telah diset pada environment Anda.

```dotenv
BPJS_URL=
BPJS_CONSUMER_ID=
BPJS_CONSUMER_SECRET=
BPJS_USER_KEY=
```

### PCare

untuk penggunaan pada PCare lakukan perubahan seperti dibawah sebelum membuat briding

```php
use BpjsBridging\PCare\Bridging as PCare;
use BpjsBridging\Config;

$konfigurasi = new Config();
$konfigurasi->setPCare('username', 'password', 'kodeAplikasi');
$bridging = new PCare($konfigurasi);
```

> pastikan untuk **menyimpan semua kredensial anda dengan aman dalam sistem**

### Hasil Request

Hasil request dapat langsung diakses dari property body

```php
$reqPoli = $bridging->referensiPoli();

foreach ($reqPoli->body->list as $poli) {
    echo $poli->kdpoli . ' - ' . $poli->nmpoli;
}
```

### Event

Setiap request dilakukan, bridging akan menjalankan event yang telah didaftarkan. Anda dapat mendaftarkan function untuk mencatat request yang pernah dilakukan. Event listener dapat didaftarkan saat membuat konfigurasi.

```php
<?php

require_once __DIR__ . '/vendor/autoload.php';

use BpjsBridging\Antrean\Bridging as AntreanRs;
use BpjsBridging\EventBridging;
use BpjsBridging\Config;

function log(EventBridging $event) {
    $file = 'log.txt';
    $handle = fopen($file, 'a');
    $data = $event->url + " pada " + $startAt;
    fwrite($handle, $data);
    fclose($handle);
}

$konfigurasi = new Config();
$konfigurasi->addListener(log)
$bridging = new AntreanRs($konfigurasi);
```

## Kontribusi

Your contribution is very welcome!
