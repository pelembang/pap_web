<?php
defined('_JCMS_') or header('Location: ../');
$host_db = "localhost";
$port_db = "3307";
$pengguna_db = "root";
$sandi_db = "";
$nama_db = "pap_web";

$namadepan = "pap_";

$pathurl = "/2022";




if (substr(phpversion(),0,3) >= 5.1) {
date_default_timezone_set('Asia/Jakarta');
}

setlocale (LC_TIME, 'id_ID');

$thnbuat = "2022";
$namaapp = "Admin Web PAP";
$judulwebsite = "Politeknik Akamigas Palembang";
$timeout2fa = 180;
$iddireksi = 4;
define('namaperusahaan','PT. PUTRIINDAH INFORMATIKA SOLUSI');
//$urlapp = "https://digisign.banksumselbabel.com/";
$urlapp =  "https://".$_SERVER['HTTP_HOST']."/";
$urlapp1 =  "https://digisign.banksumselbabel.com/";
$pathapp = $_SERVER['DOCUMENT_ROOT'].'/';

define('pathapp','/var/www/html/');
define('pathasset','/assets/');
define('pathtmp','/tmpdsign/');

// konfigurasi sms otp

define('protosmsotp','http');
define('urlsmsotp','10.8.3.203');
define('portsmsotp','56245');
define('pathsmsotp','sendsms');
define('useridsmsotpprm','userid');
define('useridsmsotpval','sumselbabel');
define('passwordsmsotpprm','password');
define('passwordsmsotpval','BSB3311');
define('maskingsmsotpprm','masking');
define('maskingsmsotpval','SUMSELBABEL');
define('msisdnsmsotpprm','msisdn');
define('refnosmsotpprm','refno');
define('messagesmsotpprm','message');

define('maksukfile',8);
define('maksuklamp',64);

// untuk blok ip (brute force)
$lockout_time = 600;
$bad_login_limit = 6;

// blok user salah password
$lockout_time_failed = 600;
$bad_login_limit_failed = 3;


?>
