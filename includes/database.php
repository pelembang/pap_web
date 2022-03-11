<?php
defined('_JCMS_') or header('Location: ../');
include_once("includes/config.php");

try{ 
    $dbh = new PDO('mysql:host='.$host_db.';port='.$port_db.';dbname='.$nama_db, $pengguna_db, $sandi_db);
    //$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e){
// error_log('PDOException - ' . $e->getMessage(), 0);
// http_response_code(500);
 die('Error establishing connection with database');
}
?>