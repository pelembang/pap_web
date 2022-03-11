<?php
// mysql 
set_time_limit(1000);
$host_db = "localhost";
$nama_db = "akamigas_wpbin";

$nama_dbh = "pap_web";

$pengguna_db = "root";
$sandi_db = "";
$port_db = 3307;

$koneksi_db = new PDO('mysql:host='.$host_db.';port='.$port_db.';dbname='.$nama_db, $pengguna_db, $sandi_db);
try{ 
$koneksi_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e){
error_log('PDOException - ' . $e->getMessage(), 0);
http_response_code(500);
die('Error establishing connection with database');
}
$koneksi_db->prepare("SET lc_time_names = 'id_ID'")->execute();


$dbh = new PDO('mysql:host='.$host_db.';port='.$port_db.';dbname='.$nama_dbh, $pengguna_db, $sandi_db);
try{ 
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e){
error_log('PDOException - ' . $e->getMessage(), 0);
http_response_code(500);
die('Error establishing connection with database');
}
$dbh->prepare("SET lc_time_names = 'id_ID'")->execute();


//akhir mysql

$hitung = 0;

        $usercp = $dbh->prepare( 'select id,judul from pap_pengumuman ' );

$usercp->execute(array());
$usercp->setFetchMode(PDO::FETCH_ASSOC);
while($rusercp = $usercp->fetch())
{



        $usrcp = $dbh->prepare( 'select id,judul from pap_berita_lain  where id = ?' );

$usrcp->execute(array($rusercp['id']));
$usrcp->setFetchMode(PDO::FETCH_ASSOC);
if($usrcp->rowCount()>0)
{
$rusrcp = $usrcp->fetch();
    
echo $rusrcp['id']." ".$rusrcp['judul']."<br/>\n";
}


}
//echo $hitung;
//echo "done!";


?>

