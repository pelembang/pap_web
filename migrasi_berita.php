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



        $usercp = $koneksi_db->prepare( 'select p.ID id,p.post_title judul,  p.post_name slug,  p.post_name permalink, p.post_content isi, u.user_login whoentri, p.post_date whenentri  from wp_posts p left join wp_term_relationships tr on p.ID = tr.object_id left join wp_users u on u.ID = p.post_author where p.post_status = ? and term_taxonomy_id = ? ORDER BY `p`.`post_date` DESC' );

$usercp->execute(array('publish',295));
$usercp->setFetchMode(PDO::FETCH_ASSOC);
while($rusercp = $usercp->fetch())
{

        
    
    

$dbh->prepare("

insert into pap_berita (id, judul, slug, permalink, isi, whoentri, whenentri, whereentri) values (?,?,?,?,?,?,?,?);


")->execute(array(
         $rusercp['id'] , $rusercp['judul'] , $rusercp['slug'] ,$rusercp['permalink'] , $rusercp['isi'] , $rusercp['whoentri'] , $rusercp['whenentri'] , '127.0.0.1'));





}
echo "done!";


?>

