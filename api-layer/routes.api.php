<?php
// File ini berisi snippet routes untuk API. Salin isi bagian group ke app/Config/Routes.php
// (Tambahkan di bagian akhir atau gabungkan dengan konfigurasi routes yang sudah ada).

$routes->group('api', ['namespace' => 'App\\Controllers\\Api'], function($routes){
    $routes->get('data', 'Data::index');
});