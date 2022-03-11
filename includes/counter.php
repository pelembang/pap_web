<?php
$ipcount      = $_SERVER['REMOTE_ADDR']; // Mendapatkan IP komputer user
$tglcount = date("Ymd"); // Mendapatkan tanggal sekarang
$pkncount = date("W"); // Mendapatkan pekan sekarang
$blncount = date("m"); // Mendapatkan bulan sekarang
$wakcount   = time(); // 
$bataswaktu = $wakcount - 300;



$count = $dbh->prepare("SELECT id FROM ".$namadepan."statistik WHERE ip=? AND tanggal=?");
$count->execute(array($ipcount,$tglcount));

$count->setFetchMode(PDO::FETCH_ASSOC);

if ($count->rowCount() > 0) {
	
    $dbh->prepare("UPDATE ".$namadepan."statistik SET hits=hits+1, online=? WHERE ip=? AND tanggal=?")->execute(array($wakcount,$ipcount,$tglcount));
    
}
else
{
    
    $dbh->prepare("INSERT INTO ".$namadepan."statistik (ip, tanggal, hits, online) VALUES(?,?,?,?)")->execute(array($ipcount,$tglcount,1,$wakcount));
   
}


//$hrin = $dbh->prepare("SELECT * FROM ".$namadepan."statistik WHERE tanggal=? GROUP BY ip");
$hrin = $dbh->prepare("SELECT count(hits) total FROM ".$namadepan."statistik WHERE tanggal=?");
$hrin->execute(array($tglcount));
$hrin->setFetchMode(PDO::FETCH_ASSOC);
$hriini = $hrin->fetch();
//$hrini = $hrin->rowCount();
$hrini = $hriini['total'];

$pkin = $dbh->prepare("SELECT count(hits) total FROM ".$namadepan."statistik WHERE week(tanggal)=?");
$pkin->execute(array($pkncount));
$pkin->setFetchMode(PDO::FETCH_ASSOC);
$pknini = $pkin->fetch();
$pkini = $pknini['total'];

$blin = $dbh->prepare("SELECT count(hits) total FROM ".$namadepan."statistik WHERE month(tanggal)=?");
$blin->execute(array($blncount));
$blin->setFetchMode(PDO::FETCH_ASSOC);
$blini = $blin->fetch();
$blnini = $blini['total'];

$totl = $dbh->prepare("SELECT count(hits) total FROM ".$namadepan."statistik");
$totl->execute();
$totl->setFetchMode(PDO::FETCH_ASSOC);
$rtotl = $totl->fetch();
$total = $rtotl['total'];

$onln = $dbh->prepare("SELECT * FROM ".$namadepan."statistik WHERE online > ?");
$onln->execute(array($bataswaktu));
$onln->setFetchMode(PDO::FETCH_ASSOC);
$online = $onln->rowCount();

 ?> 