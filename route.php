<?php
// Required configuration file
require '../config.php';

// Require Class
require 'Model/pengumuman.php';
require 'Model/pengaturan.php';
require 'Model/tingkat.php';
require 'Model/jurusan.php';
require 'Model/kelas.php';
require 'Model/siswa.php';
require 'Model/absensi.php';

// Signing access to all file
define('akses', TRUE);

// URL Modification
$res = preg_replace("/admin\//", '', $link);
$page = preg_replace("/admin\//", '', $link);
$page = preg_replace("/\//", "", $page);
$page = ucfirst($page);
$res = parse_url($res, PHP_URL_PATH);

// Routing
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
    case '/pengumuman':
        $pengumumans = $pengumuman->select_all($connection);
        require __DIR__. '/top.php';
        require __DIR__. '/pengumuman.php';
        require __DIR__. '/bottom.php';
        break;
    case "/pengumuman/delete/all":
        $pengumuman->delete_all($connection,"DELETE");
        header("location:$url/admin/pengumuman");
        break;
    case "/pengumuman/delete":
        $id = $_GET['id'];
        $pengumuman->delete($connection,$id);
        header("location:$url/admin/pengumuman");
        break;
    case "/pengumuman/post":
        $data = $_POST['data'];
        $pengumuman->insert($connection,$data);
        header("location:$url/admin/pengumuman");
        break;
    case '/pengaturan':
        $pengaturans = $pengaturan->all($connection);
        require __DIR__. '/top.php';
        require __DIR__. '/pengaturan.php';
        require __DIR__. '/bottom.php';
        break;
    case '/pengaturan/edit':
        $variable = $_POST['variable'];
        $value = $_POST['value'];
        $pengaturan->edit($connection,$variable,$value);
        header("location:$url/admin/pengaturan");
    case '/kelas':
        $tingkats = $tingkat->select_all($connection);
        $jurusans = $jurusan->select_all($connection);
        $kelass = $kelas->select_all($connection);
        require __DIR__. '/top.php';
        require __DIR__. '/kelas.php';
        require __DIR__. '/bottom.php';
        break;
    case '/kelas/tingkat/post':
        $tk_baru = $_POST['tingkat'];
        $tingkat->insert($connection,$tk_baru);
        header("location:$url/admin/kelas");
        break;
    case '/kelas/tingkat/delete':
        $id = $_GET['id'];
        $tingkat->delete($connection,$id);
        header("location:$url/admin/kelas");
        break;
    case '/kelas/jurusan/post':
        $jr_baru = $_POST['jurusan'];
        $jurusan->insert($connection,$jr_baru);
        header("location:$url/admin/kelas");
        break;
    case '/kelas/jurusan/delete':
        $id = $_GET['id'];
        $jurusan->delete($connection,$id);
        header("location:$url/admin/kelas");
        break;
    case '/kelas/kelas/post':
        $kl_baru = $_POST['kelas'];
        $kelas->insert($connection,$kl_baru);
        header("location:$url/admin/kelas");
        break;
    case '/kelas/kelas/delete':
        $id = $_GET['id'];
        $kelas->delete($connection,$id);
        header("location:$url/admin/kelas");
        break;
    case '/siswa':
        $siswas = $siswa->select_all($connection);
        $tingkats = $tingkat->select_all($connection);
        $jurusans = $jurusan->select_all($connection);
        $kelass = $kelas->select_all($connection);
        require __DIR__. '/top.php';
        require __DIR__. '/siswa.php';
        require __DIR__. '/bottom.php';
        break;
    case '/siswa/post':
        $siswas = array('nis' => $_POST['nis'],
                        'nama' => $_POST['nama'],
                        'tingkat' => $_POST['tingkat'],
                        'jurusan' => $_POST['jurusan'],
                        'kelas' => $_POST['kelas'],
                        'email_ortu' => $_POST['email']);
        $siswa->insert($connection,$siswas);
        header("location:$url/admin/siswa");
        break;
    case '/siswa/update':
        $siswas = array('id' => $_POST['id'],
                        'nis' => $_POST['nis'],
                        'nama' => $_POST['nama'],
                        'tingkat' => $_POST['tingkat'],
                        'jurusan' => $_POST['jurusan'],
                        'kelas' => $_POST['kelas'],
                        'email_ortu' => $_POST['email']);
        $siswa->update($connection,$siswas);
        header("location:$url/admin/siswa");
        break;
    case '/siswa/delete':
        $siswas = $_GET['id'];
        $siswa->delete($connection,$siswas);
        header("location:$url/admin/siswa");
        break;
    case '/siswa/delete/all':
        $siswa->delete_all($connection);
        header("location:$url/admin/siswa");
        break;
    case '/absensi':
        $siswas = $siswa->select_all($connection);
        $tingkats = $tingkat->select_all($connection);
        $jurusans = $jurusan->select_all($connection);
        $kelass = $kelas->select_all($connection);
        $absens = $absen->select_all($connection);
        $today = $absen->today($connection);
        require __DIR__. '/top.php';
        require __DIR__. '/absensi.php';
        require __DIR__. '/bottom.php';
        break;
    // If the page is unavailable, then redirect user to error page 404
    // If the user access the file directly, user will be redirected to error page 403
    default:
        http_response_code(404);
        require '../404/index.html';
        break;
}