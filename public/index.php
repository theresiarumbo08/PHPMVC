<?php
//halaman utama
//di dalam file ini, kita akan memanggil aplikasi mvc
//init memanggil semua file yang kita butuhkan

if(!session_id()) 
    session_start();


require_once '../app/init.php';

$app = new App;