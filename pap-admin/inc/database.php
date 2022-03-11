<?php
#defined('_JCMS_') or header('Location: ../');
include_once("inc/config.php");
$koneksi_db = new PDO('mysql:host='.$host_db.';port='.$port_db.';dbname='.$nama_db, $pengguna_db, $sandi_db);
try{ 
$koneksi_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e){
error_log('PDOException - ' . $e->getMessage(), 0);
http_response_code(500);
die('Error establishing connection with database');
}
$koneksi_db->prepare("SET lc_time_names = ?")->execute(array('id_ID'));
?>