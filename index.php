<?php
session_start();

// Require Class
require 'controller/config.php';

// Signing access to all file
define('akses', TRUE);

// URL Modification
$res = preg_replace("/ \//", '', $link);
$page = preg_replace("/admin\//", '', $link);
$page = preg_replace("/\//", "", $page);
$page = ucfirst($page);
$res = parse_url($res, PHP_URL_PATH);
// echo $res." ".$page;
if($res=="/403"){require __DIR__ . '/404.html';die;}
if(!isset($_SESSION['level'])){
    switch ($res) {
        case '' :
            require __DIR__ . '/dashboard.php';
            break;
        case '/' :
            require __DIR__ . '/dashboard.php';
            break;
        case '/dashboard' :
            require __DIR__ . '/dashboard.php';
            break;
        // If the page is unavailable, then redirect user to error page 404
        // If the user access the file directly, user will be redirected to error page 403
        default:
            http_response_code(404);
            require __DIR__. '/404.html';
            break;
    }
    // header('location:../403.php');
}elseif($_SESSION['level']=="admeen"){
    // Routing Admin
    switch ($res) {
        case '' :
            header('location:/dashboard');
            break;
        case '/' :
            header('location:/dashboard');
            break;
        case '/dashboard' :
            require __DIR__ . '/admins/dashboard.php';
            break;
        case '/transaksi':
            require __DIR__. '/admins/transaksis/index.php';
            break;
        case '/transaksi/tambah':
            require __DIR__. '/admins/transaksis/tambah_transaksi.php';
            break;
        case '/transaksi/detail':
            require __DIR__. '/admins/transaksis/detailorder.php';
            break;
        case '/paket':
            require __DIR__. '/admins/pakets/index.php';
            break;
        case '/paket/edit':
            require __DIR__. '/admins/pakets/edit.php';
            break;
        case '/paket/tambah':
            require __DIR__. '/admins/pakets/tambah_paket.php';
            break;
        case '/paket/hapus':
            require __DIR__. '/admins/pakets/hapus.php';
            break;
        case '/customer':
            require __DIR__. '/admins/customers/index.php';
            break;
        case '/customer/edit':
            require __DIR__. '/admins/customers/edit.php';
            break;
        case '/customer/tambah':
            require __DIR__. '/admins/customers/tambah_customer.php';
            break;
        case '/admin':
            require __DIR__. '/admins/daftar_admin.php';
            break;
        case '/admin/tambah':
            require __DIR__. '/admins/tambah_admin.php';
            break;
        case '/admin/edit':
            require __DIR__. '/admins/edit_akun.php';
            break;
        case '/transaksi/print':
            require __DIR__. '/controller/print_peminjaman.php';
            break;
        case '/laporan':
            require __DIR__. '/admins/laporan.php';
            break;
        case '/laporan/print':
            require __DIR__. '/admins/print_laporan.php';
            break;
        case '/logout':
            session_destroy();
            header('location:/');
            break;
        // If the page is unavailable, then redirect user to error page 404
        // If the user access the file directly, user will be redirected to error page 403
        default:
            http_response_code(404);
            require __DIR__. '/404.html';
            break;
    }
}