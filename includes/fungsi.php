<?php
defined('_JCMS_') or header('Location: ../');
include("includes/database.$extfile");
function kotakblokkiri($judulblok, $isiblok, $kepala, $namablok, $iconblok, $bgblok) {
    global  $theme, $extfile, $urlfront;
	if ($bgblok == 1)
		$bgb = "m-has-bg";
	else
		$bgb = "";
	if ($kepala == 1)
    $thefile = addslashes(file_get_contents("skins/blokkiri.tpl"));
	else
	$thefile = addslashes(file_get_contents("skins/blokkiri_potel.tpl"));	
    $thefile = "\$r_file=\"".$thefile."\";";
    eval($thefile);
    echo $r_file;
}
function kotakblokkanan($judulblok, $isiblok, $kepala) {
    global  $theme, $extfile, $urlfront;
    if ($kepala == 1)
    $thefile = addslashes(file_get_contents("skins/blokkanan.tpl"));
	else
	$thefile = addslashes(file_get_contents("skins/blokkanan_potel.tpl"));	
    $thefile = "\$r_file=\"".$thefile."\";";
    eval($thefile);
    echo $r_file;
}

function kotakblokkananmodul($judulblok, $isiblok, $kepala) {
    global  $theme, $extfile, $urlfront;
    if ($kepala == 1)
    $thefile = addslashes(file_get_contents("skins/blokkananmodul.tpl"));
	else
	$thefile = addslashes(file_get_contents("skins/blokkananmodul_potel.tpl"));	
    $thefile = "\$r_file=\"".$thefile."\";";
    eval($thefile);
    echo $r_file;
}

function kotakblokkananberita($judulblokkananberita, $isiblokkananberita) {
    global  $theme, $extfile, $urlfront;
    $thefile = addslashes(file_get_contents("skins/blokkananberita.tpl"));
    $thefile = "\$r_file=\"".$thefile."\";";
    eval($thefile);
    echo $r_file;
}

function kotakbloktengah($judulblok, $isiblok, $kepala, $namablok, $iconblok, $subclass,$judulblok2, $namamodul) {
    global  $theme, $extfile, $urlfront;
	if ($kepala == 1)
    $thefile = addslashes(file_get_contents("skins/bloktengah.tpl"));
	else
	$thefile = addslashes(file_get_contents("skins/bloktengah_potel.tpl"));	
    $thefile = "\$r_file=\"".$thefile."\";";
    eval($thefile);
    echo $r_file;
}
function kotakgambardepan($isiblok) {
    global  $theme, $extfile, $urlfront;
    $thefile = addslashes(file_get_contents("skins/gambardepan.tpl"));
    $thefile = "\$r_file=\"".$thefile."\";";
    eval($thefile);
    echo $r_file;
}
function kotaklinkinternal($isiblok) {
    global  $theme, $extfile, $urlfront;
    $thefile = addslashes(file_get_contents("skins/linkinternal.tpl"));
    $thefile = "\$r_file=\"".$thefile."\";";
    eval($thefile);
    echo $r_file;
}

function kotakbanner($isiblok) {
    global  $theme, $extfile, $urlfront;
    $thefile = addslashes(file_get_contents("skins/banner.tpl"));
    $thefile = "\$r_file=\"".$thefile."\";";
    eval($thefile);
    echo $r_file;
}
function kotakblokmodul($home, $judul, $isiblok, $modul, $oleh, $waktu, $kategori) {
    global  $theme, $extfile, $urlfront, $pathurl, $isi;
    if(isset($_GET['pid']))	
    $thefile = addslashes(file_get_contents("skins/blokmodulpengumuman.tpl"));
    else if(isset($_GET['aid']))	
    $thefile = addslashes(file_get_contents("skins/blokmodulagenda.tpl"));
	else
    $thefile = addslashes(file_get_contents("skins/blokmodul.tpl"));
    $thefile = "\$r_file=\"".$thefile."\";";
    eval($thefile);
    echo $r_file;
}
function kotakblokmodulprodi($home, $nama, $akreditasi,$singkatan,$lama,$pengantar,$visimisi,$sejarah,$so,$infoakreditasi,$dosen,$mhs,$alumni,$kurikulum,$pengumuman) {
    global  $theme, $extfile, $urlfront, $pathurl, $isi;
    if(isset($_GET['pdid']))	
    $thefile = addslashes(file_get_contents("skins/blokmodulprodi.tpl"));
    else
    $thefile = addslashes(file_get_contents("skins/blokmoduldaftarprodi.tpl"));
    $thefile = "\$r_file=\"".$thefile."\";";
    eval($thefile);
    echo $r_file;
}
function kotakblokmodulpengumuman($home, $judul, $judulbesak, $isiblok, $modul) {
    global  $theme, $extfile, $urlfront;
    $thefile = addslashes(file_get_contents("skins/blokmodulpengumuman.tpl"));
    $thefile = "\$r_file=\"".$thefile."\";";
    eval($thefile);
    echo $r_file;
}

function kotakblokmodulhalaman($home, $judul, $isibloknyo) {
    global  $theme, $extfile, $urlfront, $pathurl;
    $thefile = addslashes(file_get_contents("skins/blokmodulhalaman.tpl"));
    $thefile = "\$r_file=\"".$thefile."\";";
    eval($thefile);
    echo $r_file;
}
function kotakblokmodulberita($home, $judul, $isi, $oleh, $waktu,$file,$sumber,$kutipan,$kategori,$kategoriid, $katid,$pathurl) {
    global  $theme, $extfile, $urlfront;
	if(isset($_GET['bid']))	
    $thefile = addslashes(file_get_contents("skins/blokmodulberita.tpl"));
	else
	$thefile = addslashes(file_get_contents("skins/blokmoduldaftarberita.tpl"));
    $thefile = "\$r_file=\"".$thefile."\";";
    eval($thefile);
    echo $r_file;
}

function blokberitatengah($judulberita, $kutipan, $tanggal, $gambarkecik, $topik, $id, $judulid,$urut) {
    global  $theme, $extfile, $urlfront, $pathurl;
    $thefile = addslashes(file_get_contents("skins/blokberita.tpl"));
    
    $thefile = "\$r_file=\"".$thefile."\";";
    eval($thefile);
    echo $r_file;
}
function blokpengumumantengah($judul, $tanggal, $id, $judulid) {
    global  $theme, $extfile, $urlfront;
    
    $thefile = addslashes(file_get_contents("skins/blokpengumuman.tpl"));
    
    $thefile = "\$r_file=\"".$thefile."\";";
    eval($thefile);
    echo $r_file;
}
function blokagendatengah($acara, $tempat, $tanggal, $bulan, $pukul, $tahun) {
    global  $theme, $extfile, $urlfront;
    $thefile = addslashes(file_get_contents("skins/blokagenda.tpl"));
    $thefile = "\$r_file=\"".$thefile."\";";
    eval($thefile);
    echo $r_file;
}
function blokmodulagenda($acara, $tempat, $tanggal, $bulan, $pukul) {
    global  $theme, $extfile, $urlfront;
    $thefile = addslashes(file_get_contents("skins/blokmodulagenda.tpl"));
    $thefile = "\$r_file=\"".$thefile."\";";
    eval($thefile);
    echo $r_file;
}

function blokkehadiran($pejabat, $waktu, $status, $stylehadir) {
    $thefile = addslashes(file_get_contents("skins/blokkehadiran.tpl"));
    $thefile = "\$r_file=\"".$thefile."\";";
    eval($thefile);
    echo $r_file;
}

function blokkolom($id, $kolom, $nama, $jabatan, $activekolom, $file) {
    $thefile = addslashes(file_get_contents("skins/blokkolom.tpl"));
    $thefile = "\$r_file=\"".$thefile."\";";
    eval($thefile);
    echo $r_file;
}

function blokkiri($posisi,$modul){
    global $koneksi_db, $namadepan,$extfile,$dbh;
	
	$q = "SELECT  `modulaktif` FROM `".$namadepan."blok` WHERE `published`='y' AND `posisi`='$posisi' and `modulaktif` = '$modul' ";
	$sth = $dbh->prepare($q);
	$sth->execute();
	$sth->setFetchMode(PDO::FETCH_ASSOC);
	if($sth->rowCount() > 0)
	{
	$q = "SELECT `nama`, `modul`, `content`, `tipe`, `kepala`, `class`,`bg` FROM `".$namadepan."blok` WHERE `published`='y' AND `posisi`='$posisi' and modulaktif = '$modul' ORDER BY `ordering` ASC";
	

	}
	else
	{
	if(!is_null($modul))
	$queryblok = " and modul <> '$modul' ";
else
	$queryblok = "";

                $q =  "SELECT `nama`, `modul`, `content`, `tipe`, `kepala`, `class`,`bg` FROM `".$namadepan."blok` WHERE `published`='y' AND `posisi`='$posisi' $queryblok and modulaktif is null ORDER BY `ordering` ASC";
	}               
		
$sth = $dbh->prepare($q);
	$sth->execute();
	$sth->setFetchMode(PDO::FETCH_ASSOC);
	while($blok = $sth->fetch()) {	
					
					
                

                 if ($blok['tipe'] == 'c')
                 $isiblok = $blok['content'];
                 else
                 {
                 ob_start();
                 include ("modules/".$blok['modul']."/blok.$extfile");
                 $isiblok = ob_get_contents();
                 ob_end_clean();

                 }
                  kotakblokkiri($blok['nama'], $isiblok, $blok['kepala'], $blok['modul'],$blok['class'],$blok['bg']);


                
	}
				

}
function blokkanan($posisi){
    global $koneksi_db, $namadepan,$extfile;
	
	$sth = $dbh->prepare("SELECT `nama`, `modul`, `content`, `tipe`, `kepala` FROM `".$namadepan."blok` WHERE `published`='y' AND `posisi`='$posisi' ORDER BY `ordering` ASC");
	$sth->execute();
	$sth->setFetchMode(PDO::FETCH_ASSOC);
	

	echo " <div class=\"col-md-3\">\n";
while($blok = $sth->fetch()) {               
			   

                 if ($blok['tipe'] == 'c')
                 $isiblok = $blok['content'];
                 else
                 {
                 ob_start();
                 include ("modules/".$blok['modul']."/blok.$extfile");
                 $isiblok = ob_get_contents();
                 ob_end_clean();

                 }
                  kotakblokkanan($blok['nama'], $isiblok, $blok['kepala']);


                }
echo "</div>\n";
}

function blokkananmodul(){
    global $koneksi_db, $namadepan,$extfile, $isiblok, $pathurl;

echo " <aside class=\"page-sidebar  col-md-3 col-md-offset-1 col-sm-4 col-sm-offset-1\"> \n";
               
			   
			      if($_GET['plgmodul'] == "berita")
				  {
				  
				  ob_start();
                 include ("modules/pengumuman/blok.$extfile");
                 $isiblok = ob_get_contents();
                 ob_end_clean();
                  kotakblokkananmodul("Pengumuman", $isiblok, 1);
				  
				  }
				  else if ($_GET['plgmodul'] == "pengumuman")
				  {
					   ob_start();
                 include ("modules/berita/blok.$extfile");
                 $isiblok = ob_get_contents();
                 ob_end_clean();
                  kotakblokkananmodul("berita Terkini", $isiblok."<p align=\"right\"><b><a href=\"".$pathurl."/berita\">Indeks berita</a></b></p>", 1);
				  
				  }
				  else
				  {
					  
					   ob_start();
                 include ("modules/berita/blok.$extfile");
                 $isiblok = ob_get_contents();
                 ob_end_clean();
                  kotakblokkananmodul("berita Terkini", $isiblok."<p align=\"right\"><b><a href=\"".$pathurl."/berita\">Indeks berita</a></b></p>", 1);
				  
					  
				  }

                
echo "</aside>\n";
}

function blokkananberita(){
    global $koneksi_db, $namadepan,$extfile, $kategori, $katid, $kategoriid, $pathurl;

					ob_start();
                 include ("modules/waktusekarang/blok.$extfile");
                 $isiblok = ob_get_contents();
                 ob_end_clean();
                 kotakblokkanan("", $isiblok,0);  
	
	
				ob_start();
                 include ("modules/jadwalsholat/blok.$extfile");
                 $isiblok = ob_get_contents();
                 ob_end_clean();
                 kotakblokkananberita("Jadwal Sholat", $isiblok);          
 $sth = $dbh->prepare("select `b`.`judul`,`b`.`id`, `b`.`file`  from `".$namadepan."berita` `b`,`".$namadepan."beritakategori` `k`, `".$namadepan."kategoriberita` `kb` where `kb`.`berita` = `b`.`id` and `k`.`id` = `kb`.`kategori` and `b`.`id` <> '".$_GET['bid']."' and `b`.`published` = 'y' and `k`.`id` = $katid order by `b`.`tanggal` desc limit 5");
	$sth->execute();
	$sth->setFetchMode(PDO::FETCH_ASSOC);
	              

if ($sth->rowCount() > 0)
{
	while($rsql_berita = $sth->fetch()) {

	if(empty($rsql_berita['file']))
$filex = $pathurl."/gbr/berita.jpg";
else
$filex = $pathurl."/assets/images/berita/kecik/".$rsql_berita['file'];	
               $isiblokkananberita .= "<article class=\"news-item row\">       
                                    <figure class=\"thumb col-md-2 col-sm-3 col-xs-3\">
                                        <img src=\"$filex\" alt=\"\" />
                                    </figure>
                                    <div class=\"details col-md-10 col-sm-9 col-xs-9\">
                                        <h4 class=\"title\"><a href=\"".$pathurl."/berita/".$rsql_berita['id']."/".sanitize_title_with_dashes($rsql_berita['judul'])."\">".$rsql_berita['judul']."</a></h4>
                                    </div>
                                </article><p align=\"right\"><!--//news-item-->";

}

}	
else
{
	
$isiblokkananberita .= "<p><i>Belum ada berita lainnya untuk kategori $kategori yang sama dengan kategori berita ini.</i></p>\n";
}					

		
								
kotakblokkananberita("berita $kategori Lainnya", $isiblokkananberita."<b><a href=\"".$pathurl."/berita/kategori/$katid/$kategoriid\">Indeks berita $kategori</a></b></p>");
$sth = $dbh->prepare("select `b`.`judul`,`b`.`id`, `b`.`file` , `k`.`kategori` from `".$namadepan."berita` `b`,`".$namadepan."beritakategori` `k`, `".$namadepan."kategoriberita` `kb` where `kb`.`berita` = `b`.`id` and `k`.`id` = `kb`.`kategori` and `b`.`id` <> '".$_GET['bid']."' and `b`.`published` = 'y' and `k`.`id` <> $katid order by `b`.`tanggal` desc limit 5");
	$sth->execute();
	$sth->setFetchMode(PDO::FETCH_ASSOC);
		
	
if ($sth->rowCount() > 0)
{
	while($rsql_berita2 = $sth->fetch()) {

	if(empty($rsql_berita2['file']))
$filex = $pathurl."/gbr/berita.jpg";
else
$filex = $pathurl."/assets/images/berita/kecik/".$rsql_berita2['file'];	
               $isiblokkananberita2 .= "<article class=\"news-item row\">       
                                    <figure class=\"thumb col-md-2 col-sm-3 col-xs-3\">
                                        <img src=\"$filex\" alt=\"\" />
                                    </figure>
                                    <div class=\"details col-md-10 col-sm-9 col-xs-9\">
                                        <h4 class=\"title\"><a href=\"".$pathurl."/berita/".$rsql_berita2['id']."/".sanitize_title_with_dashes($rsql_berita2['judul'])."\">".$rsql_berita2['judul']."</a></h4>
                                    </div>
                                </article><!--//news-item-->";

}

}	
else
{
	
$isiblokkananberita2 .= "<p><i>Belum ada berita lainnya untuk kategori lainnya.</i></p>\n";
}					

		
								
                  kotakblokkananberita("Berita Kategori Lainnya", $isiblokkananberita2."<p align=\"right\"><b><a href=\"".$pathurl."/berita\">Indeks berita</a></b></p>");			

}
function bloktengah(){
    global $koneksi_db, $namadepan,$extfile, $pathurl,$dbh;

                
$sth = $dbh->prepare("SELECT `kepala`, `nama`, `modul`, `content`, `tipe`, `nama2`, `subclass`, `class`, `link` FROM `".$namadepan."blok` WHERE `published`='y' AND `posisi`='t' ORDER BY `ordering` ASC" );
	$sth->execute();
	$sth->setFetchMode(PDO::FETCH_ASSOC);
	       
while($bloktengah = $sth->fetch()) {	
				
                 if ($bloktengah['tipe'] == 'c')
                 $isiblok = $bloktengah['content'];
                 else
                 {
                 ob_start();
				 
                 include ("modules/".$bloktengah['modul']."/bloktengah.$extfile");
                 $isiblok = ob_get_contents();
                 ob_end_clean();

                 }

                 kotakbloktengah($bloktengah['nama'], $isiblok, $bloktengah['kepala'],$bloktengah['modul'],$bloktengah['class'],$bloktengah['subclass'],$bloktengah['nama2'],$bloktengah['modul']);



                }

				}
function medsos(){
    global $koneksi_db, $namadepan,$extfile,$dbh;
$mds = $dbh->prepare("SELECT id, medsos, label, link, icon, colorstyle FROM ".$namadepan."medsos order by urut asc");
	$mds->execute();
	$mds->setFetchMode(PDO::FETCH_ASSOC);
		
	
	
	
	
                
                if ($mds->rowCount() > 0)
                {
                    echo '<ul class="section-content box-sort-in  button-example m-b30">';
               while($rmds = $mds->fetch()) {
               echo '<li><button class="site-button '.$rmds['colorstyle'].' k m-r15 btn-lg btn-block" type="button" onclick="window.open(\''.$rmds['link'].'\',\'_blank\')"><i class="fab fa-'.$rmds['icon'].'"></i> '.$rmds['label'].' </button></li>';
                }
               echo '</ul>';   
           
                 }




}

function errorhandling() {

             
    ob_start();
    include ("includes/404.php");
    $isiblok = ob_get_contents();
    ob_end_clean();
    kotakgambardepan($isiblok);
    
                




}

function gambardepan(){
    global $koneksi_db, $namadepan,$extfile,$dbh;
$sth = $dbh->prepare("SELECT `nama` FROM `".$namadepan."modul` WHERE `nama` = 'gambardepan' AND `published` = 'y'");
	$sth->execute();
	$sth->setFetchMode(PDO::FETCH_ASSOC);
		
	                
                if ($sth->rowCount() > 0)
                {
                 ob_start();
                 include ("modules/slider/bloktengah.$extfile");
                 $isiblok = ob_get_contents();
                 ob_end_clean();
                 kotakgambardepan($isiblok);
                 }




}

function linkinternal(){
    global $koneksi_db, $namadepan,$extfile;

               
                 ob_start();
                 $isiblok = ob_get_contents();
                 ob_end_clean();
                 kotaklinkinternal($isiblok);
                 




}
function bstatiskecik(){
    global $koneksi_db, $namadepan,$extfile,$dbh;
$sth = $dbh->prepare("SELECT `nama` FROM `".$namadepan."modul` WHERE `nama` = 'bannerkecikstatis' AND `published` = 'y'");
	$sth->execute();
	$sth->setFetchMode(PDO::FETCH_ASSOC);
	            if ($sth->rowCount() > 0)
                {
                 ob_start();
                 include ("modules/bannerkecikstatis/blok.$extfile");
                 $isiblok = ob_get_contents();
                 ob_end_clean();
                 kotakbanner($isiblok);
                 }
}

function bannerbesak(){
    global $koneksi_db, $namadepan,$extfile,$dbh;
$sth = $dbh->prepare("SELECT `nama` FROM `".$namadepan."modul` WHERE `nama` = 'bannerbesak' AND `published` = 'y'");
	$sth->execute();
	$sth->setFetchMode(PDO::FETCH_ASSOC);
	if ($sth->rowCount() > 0)
                {
                 ob_start();
                 include ("modules/bannerbesak/blokmodul.$extfile");
                 $isiblok = ob_get_contents();
                 ob_end_clean();
                 kotakbanner($isiblok);
                 }
}
function bacakkecik(){
    global $koneksi_db, $namadepan,$extfile,$dbh;
$sth = $dbh->prepare("SELECT `nama` FROM `".$namadepan."modul` WHERE `nama` = 'bannerkecikacak' AND `published` = 'y'");
	$sth->execute();
	$sth->setFetchMode(PDO::FETCH_ASSOC);
                if ($sth->rowCount() > 0)
                {
                 ob_start();
                 include ("modules/bannerkecikacak/blokmodul.$extfile");
                 $isiblok = ob_get_contents();
                 ob_end_clean();
                 kotakbanner($isiblok);
                 }
}



function tulisanberjalan() {
global $koneksi_db, $namadepan, $extfile;
include ("modules/tulisanberjalan/bloktengah.$extfile");
}
function testimoni() {
global $koneksi_db, $namadepan, $extfile;
include ("modules/testimoni/bloktengah.$extfile");
}
function blokmodul($modul) {

global $extfile;
if (!file_exists("modules/".$_GET['plgmodul']."/blokmodul.$extfile"))
header("Location:.");
else
{
    
ob_start();
include ("modules/".$_GET['plgmodul']."/blokmodul.$extfile");
$isiblok = ob_get_contents();
ob_end_clean();
if($modul == 'halaman') {
kotakblokmodulhalaman($home, $judul, $isibloknyo);
}
else if($modul == 'pengumuman') {
kotakblokmodulpengumuman($home, $judul, $judulbesak, $isibloknyo, $modul);
}
else {
//kotakblokmodul($home, $judul, $isibloknyo, $modul, $judulbesak);
kotakblokmodul($home, $judul, $isibloknyo, $modul, $oleh, $waktu, $kategori);
 }

}
}

function blokmodulprodi() {

    global $extfile;
    if (!file_exists("modules/".$_GET['plgmodul']."/blokmodul.$extfile"))
    header("Location:.");
    else
    {
        
    ob_start();
    include ("modules/".$_GET['plgmodul']."/blokmodul.$extfile");
    $isiblok = ob_get_contents();
    ob_end_clean();
    
    kotakblokmodulprodi($home, $nama, $akreditasi,$singkatan,$lama,$pengantar,$visimisi,$sejarah,$so,$infoakreditasi,$dosen,$mhs,$alumni,$kurikulum,$pengumuman);
    
    
    }
    }


function blokmodulberita() {
global $extfile;
if (!file_exists("modules/berita/blokmodul.$extfile"))
header("Location:.");
else
{
ob_start();
include ("modules/berita/blokmodul.$extfile");
$isiblok = ob_get_contents();
ob_end_clean();
kotakblokmodulberita($home, $judul, $isi, $oleh, $waktu, $file,$sumber,$kutipan, $kategori, $kategoriid, $katid,$pathurl);
}
}


/* modul kalender */
function createMonth($date) {
        $date = split("\-", $date);
        $year = $date[0];
        $month = $date[1];
        $this_month_date = makeDate($year, $month, 1);
        $last_month_date = makeDate($year, $month - 1, 1);
        $next_month_date = makeDate($year, $month + 1, 1);

        $this_month_first_day = trim(date("w", $this_month_date));

        $this_month_days = trim(date("t", $this_month_date));
        $last_month_days = trim(date("t", $last_month_date));

        $this_month_number = trim(date("n", $this_month_date));
        $last_month_number = trim(date("n", $last_month_date));
        $next_month_number = trim(date("n", $next_month_date));

        $this_month_year = trim(date("Y", $this_month_date));
        $last_month_year = trim(date("Y", $last_month_date));
        $next_month_year = trim(date("Y", $next_month_date));


                if($this_month_first_day == 0) {
                        $this_month_first_day = 7;
                }




        for($I = 1; $I < $this_month_first_day; $I++) {
                $temp = $last_month_days - $this_month_first_day + $I + 1;
                $monthArray['"$last_month_year-$last_month_number-$temp"'] = array(0, "$last_month_year-$last_month_number-$temp");
        }

        for($I = 1; $I <= $this_month_days; $I++) {
                $monthArray['"$this_month_year-$this_month_number-$I"'] = array(1, "$this_month_year-$this_month_number-$I");
        }

        for($I = 1; $I <= 43 - $this_month_days - $this_month_first_day; $I++) {
                $monthArray['"$next_month_year-$next_month_number-$I"'] = array(0, "$next_month_year-$next_month_number-$I");
        }
return $monthArray;
};

function addToday($date, $monthArray) {
        $date = split("\-", $date);
        $year = $date[0];
        $month = $date[1];
        $this_year = date("Y");
        $this_month = date("n");

        if($year == $this_year && $month == $this_month) {
			$tanggalx = date("Y-n-j");
                $monthArray[$tanggalx][0] +=2;
        }
        return $monthArray;
};

function displayMonth($date, $monthArray) {

        global $weeknumber, $monthName, $dayName, $daysBGColor, $koneksi_db, $namadepan;

        $date = split("\-", $date);
        $year = $date[0];
        $month = $date[1];

        $this_month = mktime(0, 0, 0, $month, 1,  $year);





echo "<table border=\"0\" width=\"100%\" cellpadding=\"0\" cellspacing=\"0\">\n<tr>\n";
echo "<td align=\"center\"><b>\n";
echo $monthName[$month-1]." ".$year;
echo "</b></td></tr>\n";

echo "<tr><td colspan=\"3\">\n        <table width=\"100%\" cellpadding=\"3\">\n<tr>\n";

foreach ($dayName as $key) {
        echo "<td class=\"namaharikalblok\">$key</b></td>\n";
}
if($weeknumber) {
        echo "<td bgcolor=\"$daysBGColor\">v.</td>\n";
}

echo "</tr>\n\n<tr>\n";



        $day = 0;

        if($weeknumber) {
                $week = date("W", $this_month);
        }


        foreach ($monthArray as $key) {
                $date = split("\-", $key[1]);
                if ($day == 6)
                $warnahari = "#FA0427";
                else if ($day == 4)
                $warnahari = "#276224";
                else
                $warnahari = "#000000";
$bln = date("m");
$thn = date("Y");

                if (strlen($date[2]) == 1)
                $tg = "0".$date[2];
                else
                $tg = $date[2];

                $bgcolor = "";
                
               $sth = $dbh->prepare("SELECT right(`tglmulai`,2) as `tglnian` FROM `".$namadepan."kalender` WHERE month(`tglmulai`) = '$bln' AND year(`tglmulai`) = '$thn' AND `tipe` = 'p' AND `published` = 'y' AND day(`tglmulai`) = '$tg' OR month(`tglmulai`) = '$bln' AND year(`tglmulai`) = '$thn' AND `tipe` = 'p' AND `published` = 'y' AND day(`tglakhir`) >= '$tg' AND day(`tglmulai`) <= '$tg' GROUP by `tglmulai`");
	$sth->execute();
	$sth->setFetchMode(PDO::FETCH_ASSOC);
	
	if ($sth->rowCount() > 0)
                                           {
                                         $rmodkalblnp = $sth->fetch();
                                              if($key[0] == 1 or $key[0] == 3) {
                                          $bgcolor = "#A9C6F6";
                                               }
                                           }
                $sth = $dbh->prepare("SELECT day(`tglmulai`) as tglmulai, day(`tglakhir`) as tglakhir, acara FROM `".$namadepan."kalender` WHERE month(`tglmulai`) = '$bln' AND year(`tglmulai`) = '$thn' AND `tipe` = 'h' AND `published` = 'y' AND day(`tglmulai`) = '$tg' OR month(`tglmulai`) = '$bln' AND year(`tglmulai`) = '$thn' AND `tipe` = 'h' AND `published` = 'y' AND day(`tglakhir`) >= '$tg' AND day(`tglmulai`) <= '$tg' GROUP by `tglmulai`");
	$sth->execute();
	$sth->setFetchMode(PDO::FETCH_ASSOC);
		
	
	
	
               



                                           if ($sth->rowCount() > 0)
                                           {
											   $rmodkalblnh = $sth->fetch();
                                          
                                              if($key[0] == 1 or $key[0] == 3) {
                                          $warnahari = "#FA0427";

                                               }
                                           }
                                              $linkawal = "";
                                              $linkahir = "";
											  $sth = $dbh->prepare("SELECT `tipe`, `tglmulai`, `tglakhir` FROM `".$namadepan."kalender` WHERE month(`tglmulai`) = '$bln' AND year(`tglmulai`) = '$thn' AND `tipe` <> 'h' AND `published` = 'y' AND day(`tglmulai`) = '$tg' OR month(`tglmulai`) = '$bln' AND year(`tglmulai`) = '$thn' AND `tipe` <> 'h' AND `published` = 'y' AND day(`tglakhir`) >= '$tg' AND day(`tglmulai`) <= '$tg' GROUP by `tglmulai`");
	$sth->execute();
	$sth->setFetchMode(PDO::FETCH_ASSOC);
	
		if ($sth->rowCount() > 0)
                                           {
											   $rmodkalblnlk = $sth->fetch();
                                          
                                              if($key[0] == 1 or $key[0] == 3) {
                                              
                                         
                                           $tabs="";
                                             if ($rmodkalblnlk['tglakhir'] <> "")
                                           {
                                        $linkawal = "<a href=\"?plgmodul=kalender&tg=$tg&bl=$bln&th=$thn$tabs\">";
                                          $linkahir = "</a>";


                                           


                                            }
                                            else
                                            {
                                                $tg = substr($rmodkalblnlk['tglmulai'], 8, 2);
                                                $bl = substr($rmodkalblnlk['tglmulai'], 5, 2);
                                                $th = substr($rmodkalblnlk['tglmulai'], 0, 4);
                                            $linkawal = "<a href=\"?plgmodul=kalender&tg=$tg&bl=$bl&th=$th$tabs\">";
                                          $linkahir = "</a>";
                                           }
                                               }
                                           }


                if($key[0] == 0) {
                        echo "<td>&nbsp;</td>\n";
                }

                else if($key[0] == 1) {



                      echo "<td align=\"center\" bgcolor=\"$bgcolor\">$linkawal<span style=\"color: $warnahari;\"><b>".$date[2]."</b></span>$linkahir</td>\n";


                } else if ($key[0] == 3) {
                        echo "<td align=\"center\" bgcolor=\"$bgcolor\" style=\"border: solid #000000;border-width: 1px;\">$linkawal<b><span style=\"color: $warnahari;\">".$date[2]."</span></b>$linkahir</td>\n";
                }


        $day++;
        if($day >= 7) {
                if($weeknumber) {
                        echo "<td>$week</td>\n";
                        if($week >= 53) {
                                $week = 0;
                        }
                        $week++;
                }
                echo "</tr>\n<tr>\n";
                $day = 0;
        }

}
echo "</tr>\n</table>\n";
echo "<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">\n";

$sth = $dbh->prepare("SELECT day(`tglmulai`) as tglmulai, day(`tglakhir`) as tglakhir, `acara` FROM `".$namadepan."kalender` WHERE month(`tglmulai`) = '$bln' AND year(`tglmulai`) = '$thn' AND `tipe` = 'h' AND `published` = 'y' ORDER BY `tglmulai`");
	$sth->execute();
	$sth->setFetchMode(PDO::FETCH_ASSOC);
	if ($sth->rowCount() > 0)
                                           {
                                         while($rmodkalblnhk = $sth->fetch())
                                         {
if (empty($rmodkalblnhk['tglakhir']) or $rmodkalblnhk['tglakhir'] == "")
$tglnya = $rmodkalblnhk['tglmulai'];
else
$tglnya = $rmodkalblnhk['tglmulai']."-".$rmodkalblnhk['tglakhir'];
$blnya = ucfirst(strtolower($monthName['$month-1']));
$keterangan .= "<tr><td valign=\"top\" align=\"right\" width=\"40%\"><span class=\"tulisankecik\">$tglnya $blnya</span></td>\n";
$keterangan .= "<td valign=\"top\"><span class=\"tulisankecik\">&nbsp;:&nbsp;</span></td>\n";
$keterangan .= "<td valign=\"top\" width=\"60%\"><span class=\"tulisankecik\">".$rmodkalblnhk['acara']."</span></td></tr>\n";



}
echo "$keterangan\n";
}
echo "</table>\n";



echo "</td></tr></table>\n";



};



function makeDate($year, $month, $day) {
        return mktime(0, 0, 0, $month, $day,  $year);
};
function baliktgljam($waktu) {
$thn = substr($waktu,0,4);
$bln = substr($waktu,5,2);
$tgl = substr($waktu,8,2);
$jam = substr($waktu,11,8);
return "$tgl/$bln/$thn $jam";
}
function baliktgl($waktu) {
$thn = substr($waktu,0,4);
$bln = substr($waktu,5,2);
$tgl = substr($waktu,8,2);
return "$tgl/$bln/$thn";
}

function get_boundary($data, $awal, $akhir){
$start = strpos($data,$awal) + strlen($awal);
$end = strpos($data,$akhir);
return substr($data,$start,$end-$start);
}

function sign($z) {
        if ($z == 0) {
                return 0;
        } else {
                return $z/abs($z);
        }
}

function degree($num) {
  $hour = floor($num);
  $min = floor(($num-$hour)*60);
  $sec = floor((($num-$hour)*3600)-($min*60));
  $hour = $hour<10 ? '0'.$hour:$hour;
  $min = $min<10?'0'.$min:$min;
  $sec = $sec<10?'0'.$sec:$sec;
  return $hour.':'.$min." "._WIB_;
}
function ipnyo()
{
if(isset($_SERVER['HTTP_X_FORWARDED_FOR'])){
$ipnyo = $_SERVER['HTTP_X_FORWARDED_FOR']." Proxy: ".$_SERVER['REMOTE_ADDR']." ".($_SERVER['HTTP_VIA'])." ";
}else{
$ipnyo = $_SERVER['REMOTE_ADDR'];
}
return $ipnyo;
}
function RandomPassword()
		{
				$randomPassword = "";
				srand((double)microtime()*1000000);
				for($i=0;$i<8;$i++)
				{
						$randnumber = rand(48,120);

						while (($randnumber >= 58 && $randnumber <= 64) || ($randnumber >= 91 && $randnumber <= 96))
						{
								$randnumber = rand(48,120);
						}

						$randomPassword .= chr($randnumber);
				}
				return strtoupper($randomPassword);
		}
function zerofill($num, $length) {
    return str_pad($num, $length, '0', STR_PAD_LEFT);
}
function angkaromawi($N){
        $c='IVXLCDM';
        for($a=5,$b=$s='';$N;$b++,$a^=7)
                for($o=$N%$a,$N=$N/$a^0;$o--;$s=$c[$o>2?$b+$N-($N&=-2)+$o=1:$b].$s);
        return $s;
}
function namabulan($m)
{
if ($m == '01')
return "Januari";
else if ($m == '02')
return "Februari";
else if ($m == '03')
return "Maret";
else if ($m == '04')
return "April";
else if ($m == '05')
return "Mei";
else if ($m == '06')
return "Juni";
else if ($m == '07')
return "Juli";
else if ($m == '08')
return "Agustus";
else if ($m == '09')
return "September";
else if ($m == '10')
return "Oktober";
else if ($m == '11')
return "November";
else if ($m == '12')
return "Desember";
}
function namahari($N)
{
if ($N == '1')
return "Senin";
else if ($N == '2')
return "Selasa";
else if ($N == '3')
return "Rabu";
else if ($N == '4')
return "Kamis";
else if ($N == '5')
return "Jum'at";
else if ($N == '6')
return "Sabtu";
else if ($N == '7')
return "Ahad";
}
function namaharisingkat($N)
{
if ($N == '1')
return "Sen";
else if ($N == '2')
return "Sel";
else if ($N == '3')
return "Rab";
else if ($N == '4')
return "Kam";
else if ($N == '5')
return "Jum";
else if ($N == '6')
return "Sab";
else if ($N == '7')
return "Ahd";
}
function namabulansingkat($m)
{
if ($m == '01')
return "Jan";
else if ($m == '02')
return "Feb";
else if ($m == '03')
return "Mar";
else if ($m == '04')
return "Apr";
else if ($m == '05')
return "Mei";
else if ($m == '06')
return "Jun";
else if ($m == '07')
return "Jul";
else if ($m == '08')
return "Agu";
else if ($m == '09')
return "Sep";
else if ($m == '10')
return "Okt";
else if ($m == '11')
return "Nov";
else if ($m == '12')
return "Des";
}

	function makeInt($angka)
{
	if ($angka < -0.0000001)
	{
		return ceil($angka-0.0000001);
	}
	else 
	{ 
		return floor($angka+0.0000001); 
	}
}

function konvhijriah($tanggal)
{

		
	$array_bulan = array("Muharram", "Safar", "Rabiul Awwal", "Rabiul Akhir",
						 "Jumadil Awwal","Jumadil Akhir", "Rajab", "Sya'ban", 
						 "Ramadhan","Syawwal", "Zulqaidah", "Zulhijjah");
					 
$date = makeInt(substr($tanggal,8,2));
$month = makeInt(substr($tanggal,5,2));
$year = makeInt(substr($tanggal,0,4));

if (($year>1582)||(($year == "1582") && ($month > 10))||(($year == "1582") && ($month=="10")&&($date >14)))
{
	$jd = makeInt((1461*($year+4800+makeInt(($month-14)/12)))/4)+
	makeInt((367*($month-2-12*(makeInt(($month-14)/12))))/12)-
	makeInt( (3*(makeInt(($year+4900+makeInt(($month-14)/12))/100))) /4)+
	$date-32075; 
} 
else
{
	$jd = 367*$year-makeInt((7*($year+5001+makeInt(($month-9)/7)))/4)+
	makeInt((275*$month)/9)+$date+1729777;
}

$wd = $jd%7;
$l = $jd-1948440+10632;
$n=makeInt(($l-1)/10631);
$l=$l-10631*$n+354;
$z=(makeInt((10985-$l)/5316))*(makeInt((50*$l)/17719))+(makeInt($l/5670))*(makeInt((43*$l)/15238));
$l=$l-(makeInt((30-$z)/15))*(makeInt((17719*$z)/50))-(makeInt($z/16))*(makeInt((15238*$z)/43))+29;
$m=makeInt((24*$l)/709);
$d=$l-makeInt((709*$m)/24);
$y=30*$n+$z-30;

$g = $m-1;
$final = "$d $array_bulan[$g] $y H";

return $final;
}

/* Fungsi dari Worpress */
function utf8_uri_encode( $utf8_string, $length = 0 ) {
        $unicode = '';
        $values = array();
        $num_octets = 1;
        $unicode_length = 0;

        $string_length = strlen( $utf8_string );
        for ($i = 0; $i < $string_length; $i++ ) {

                $value = ord( $utf8_string[ $i ] );

                if ( $value < 128 ) {
                        if ( $length && ( $unicode_length >= $length ) )
                                break;
                        $unicode .= chr($value);
                        $unicode_length++;
                } else {
                        if ( count( $values ) == 0 ) $num_octets = ( $value < 224 ) ? 2 : 3;

                        $values[] = $value;

                        if ( $length && ( $unicode_length + ($num_octets * 3) ) > $length )
                                break;
                        if ( count( $values ) == $num_octets ) {
                                if ($num_octets == 3) {
                                        $unicode .= '%' . dechex($values[0]) . '%' . dechex($values[1]) . '%' . dechex($values[2]);
                                        $unicode_length += 9;
                                } else {
                                        $unicode .= '%' . dechex($values[0]) . '%' . dechex($values[1]);
                                        $unicode_length += 6;
                                }

                                $values = array();
                                $num_octets = 1;
                        }
                }
        }

        return $unicode;
}
function seems_utf8($Str) { # by bmorel at ssi dot fr
        $length = strlen($Str);
        for ($i=0; $i < $length; $i++) {
                if (ord($Str[$i]) < 0x80) continue; # 0bbbbbbb
                elseif ((ord($Str[$i]) & 0xE0) == 0xC0) $n=1; # 110bbbbb
                elseif ((ord($Str[$i]) & 0xF0) == 0xE0) $n=2; # 1110bbbb
                elseif ((ord($Str[$i]) & 0xF8) == 0xF0) $n=3; # 11110bbb
                elseif ((ord($Str[$i]) & 0xFC) == 0xF8) $n=4; # 111110bb
                elseif ((ord($Str[$i]) & 0xFE) == 0xFC) $n=5; # 1111110b
                else return false; # Does not match any model
                for ($j=0; $j<$n; $j++) { # n bytes matching 10bbbbbb follow ?
                        if ((++$i == $length) || ((ord($Str[$i]) & 0xC0) != 0x80))
                        return false;
                }
        }
        return true;
}
function remove_accents($string) {
        if ( !preg_match('/[\x80-\xff]/', $string) )
                return $string;

        if (seems_utf8($string)) {
                $chars = array(
                // Decompositions for Latin-1 Supplement
                chr(195).chr(128) => 'A', chr(195).chr(129) => 'A',
                chr(195).chr(130) => 'A', chr(195).chr(131) => 'A',
                chr(195).chr(132) => 'A', chr(195).chr(133) => 'A',
                chr(195).chr(135) => 'C', chr(195).chr(136) => 'E',
                chr(195).chr(137) => 'E', chr(195).chr(138) => 'E',
                chr(195).chr(139) => 'E', chr(195).chr(140) => 'I',
                chr(195).chr(141) => 'I', chr(195).chr(142) => 'I',
                chr(195).chr(143) => 'I', chr(195).chr(145) => 'N',
                chr(195).chr(146) => 'O', chr(195).chr(147) => 'O',
                chr(195).chr(148) => 'O', chr(195).chr(149) => 'O',
                chr(195).chr(150) => 'O', chr(195).chr(153) => 'U',
                chr(195).chr(154) => 'U', chr(195).chr(155) => 'U',
                chr(195).chr(156) => 'U', chr(195).chr(157) => 'Y',
                chr(195).chr(159) => 's', chr(195).chr(160) => 'a',
                chr(195).chr(161) => 'a', chr(195).chr(162) => 'a',
                chr(195).chr(163) => 'a', chr(195).chr(164) => 'a',
                chr(195).chr(165) => 'a', chr(195).chr(167) => 'c',
                chr(195).chr(168) => 'e', chr(195).chr(169) => 'e',
                chr(195).chr(170) => 'e', chr(195).chr(171) => 'e',
                chr(195).chr(172) => 'i', chr(195).chr(173) => 'i',
                chr(195).chr(174) => 'i', chr(195).chr(175) => 'i',
                chr(195).chr(177) => 'n', chr(195).chr(178) => 'o',
                chr(195).chr(179) => 'o', chr(195).chr(180) => 'o',
                chr(195).chr(181) => 'o', chr(195).chr(182) => 'o',
                chr(195).chr(182) => 'o', chr(195).chr(185) => 'u',
                chr(195).chr(186) => 'u', chr(195).chr(187) => 'u',
                chr(195).chr(188) => 'u', chr(195).chr(189) => 'y',
                chr(195).chr(191) => 'y',
                // Decompositions for Latin Extended-A
                chr(196).chr(128) => 'A', chr(196).chr(129) => 'a',
                chr(196).chr(130) => 'A', chr(196).chr(131) => 'a',
                chr(196).chr(132) => 'A', chr(196).chr(133) => 'a',
                chr(196).chr(134) => 'C', chr(196).chr(135) => 'c',
                chr(196).chr(136) => 'C', chr(196).chr(137) => 'c',
                chr(196).chr(138) => 'C', chr(196).chr(139) => 'c',
                chr(196).chr(140) => 'C', chr(196).chr(141) => 'c',
                chr(196).chr(142) => 'D', chr(196).chr(143) => 'd',
                chr(196).chr(144) => 'D', chr(196).chr(145) => 'd',
                chr(196).chr(146) => 'E', chr(196).chr(147) => 'e',
                chr(196).chr(148) => 'E', chr(196).chr(149) => 'e',
                chr(196).chr(150) => 'E', chr(196).chr(151) => 'e',
                chr(196).chr(152) => 'E', chr(196).chr(153) => 'e',
                chr(196).chr(154) => 'E', chr(196).chr(155) => 'e',
                chr(196).chr(156) => 'G', chr(196).chr(157) => 'g',
                chr(196).chr(158) => 'G', chr(196).chr(159) => 'g',
                chr(196).chr(160) => 'G', chr(196).chr(161) => 'g',
                chr(196).chr(162) => 'G', chr(196).chr(163) => 'g',
                chr(196).chr(164) => 'H', chr(196).chr(165) => 'h',
                chr(196).chr(166) => 'H', chr(196).chr(167) => 'h',
                chr(196).chr(168) => 'I', chr(196).chr(169) => 'i',
                chr(196).chr(170) => 'I', chr(196).chr(171) => 'i',
                chr(196).chr(172) => 'I', chr(196).chr(173) => 'i',
                chr(196).chr(174) => 'I', chr(196).chr(175) => 'i',
                chr(196).chr(176) => 'I', chr(196).chr(177) => 'i',
                chr(196).chr(178) => 'IJ',chr(196).chr(179) => 'ij',
                chr(196).chr(180) => 'J', chr(196).chr(181) => 'j',
                chr(196).chr(182) => 'K', chr(196).chr(183) => 'k',
                chr(196).chr(184) => 'k', chr(196).chr(185) => 'L',
                chr(196).chr(186) => 'l', chr(196).chr(187) => 'L',
                chr(196).chr(188) => 'l', chr(196).chr(189) => 'L',
                chr(196).chr(190) => 'l', chr(196).chr(191) => 'L',
                chr(197).chr(128) => 'l', chr(197).chr(129) => 'L',
                chr(197).chr(130) => 'l', chr(197).chr(131) => 'N',
                chr(197).chr(132) => 'n', chr(197).chr(133) => 'N',
                chr(197).chr(134) => 'n', chr(197).chr(135) => 'N',
                chr(197).chr(136) => 'n', chr(197).chr(137) => 'N',
                chr(197).chr(138) => 'n', chr(197).chr(139) => 'N',
                chr(197).chr(140) => 'O', chr(197).chr(141) => 'o',
                chr(197).chr(142) => 'O', chr(197).chr(143) => 'o',
                chr(197).chr(144) => 'O', chr(197).chr(145) => 'o',
                chr(197).chr(146) => 'OE',chr(197).chr(147) => 'oe',
                chr(197).chr(148) => 'R',chr(197).chr(149) => 'r',
                chr(197).chr(150) => 'R',chr(197).chr(151) => 'r',
                chr(197).chr(152) => 'R',chr(197).chr(153) => 'r',
                chr(197).chr(154) => 'S',chr(197).chr(155) => 's',
                chr(197).chr(156) => 'S',chr(197).chr(157) => 's',
                chr(197).chr(158) => 'S',chr(197).chr(159) => 's',
                chr(197).chr(160) => 'S', chr(197).chr(161) => 's',
                chr(197).chr(162) => 'T', chr(197).chr(163) => 't',
                chr(197).chr(164) => 'T', chr(197).chr(165) => 't',
                chr(197).chr(166) => 'T', chr(197).chr(167) => 't',
                chr(197).chr(168) => 'U', chr(197).chr(169) => 'u',
                chr(197).chr(170) => 'U', chr(197).chr(171) => 'u',
                chr(197).chr(172) => 'U', chr(197).chr(173) => 'u',
                chr(197).chr(174) => 'U', chr(197).chr(175) => 'u',
                chr(197).chr(176) => 'U', chr(197).chr(177) => 'u',
                chr(197).chr(178) => 'U', chr(197).chr(179) => 'u',
                chr(197).chr(180) => 'W', chr(197).chr(181) => 'w',
                chr(197).chr(182) => 'Y', chr(197).chr(183) => 'y',
                chr(197).chr(184) => 'Y', chr(197).chr(185) => 'Z',
                chr(197).chr(186) => 'z', chr(197).chr(187) => 'Z',
                chr(197).chr(188) => 'z', chr(197).chr(189) => 'Z',
                chr(197).chr(190) => 'z', chr(197).chr(191) => 's',
                // Euro Sign
                chr(226).chr(130).chr(172) => 'E',
                // GBP (Pound) Sign
                chr(194).chr(163) => '');

                $string = strtr($string, $chars);
        } else {
                // Assume ISO-8859-1 if not UTF-8
                $chars['in'] = chr(128).chr(131).chr(138).chr(142).chr(154).chr(158)
                        .chr(159).chr(162).chr(165).chr(181).chr(192).chr(193).chr(194)
                        .chr(195).chr(196).chr(197).chr(199).chr(200).chr(201).chr(202)
                        .chr(203).chr(204).chr(205).chr(206).chr(207).chr(209).chr(210)
                        .chr(211).chr(212).chr(213).chr(214).chr(216).chr(217).chr(218)
                        .chr(219).chr(220).chr(221).chr(224).chr(225).chr(226).chr(227)
                        .chr(228).chr(229).chr(231).chr(232).chr(233).chr(234).chr(235)
                        .chr(236).chr(237).chr(238).chr(239).chr(241).chr(242).chr(243)
                        .chr(244).chr(245).chr(246).chr(248).chr(249).chr(250).chr(251)
                        .chr(252).chr(253).chr(255);

                $chars['out'] = "EfSZszYcYuAAAAAACEEEEIIIINOOOOOOUUUUYaaaaaaceeeeiiiinoooooouuuuyy";

                $string = strtr($string, $chars['in'], $chars['out']);
                $double_chars['in'] = array(chr(140), chr(156), chr(198), chr(208), chr(222), chr(223), chr(230), chr(240), chr(254));
                $double_chars['out'] = array('OE', 'oe', 'AE', 'DH', 'TH', 'ss', 'ae', 'dh', 'th');
                $string = str_replace($double_chars['in'], $double_chars['out'], $string);
        }

        return $string;
}
function sanitize_title_with_dashes($title) {
        $title = strip_tags($title);
        // Preserve escaped octets.
        $title = preg_replace('|%([a-fA-F0-9][a-fA-F0-9])|', '---$1---', $title);
        // Remove percent signs that are not part of an octet.
        $title = str_replace('%', '', $title);
        // Restore octets.
        $title = preg_replace('|---([a-fA-F0-9][a-fA-F0-9])---|', '%$1', $title);

        $title = remove_accents($title);
        if (seems_utf8($title)) {
                if (function_exists('mb_strtolower')) {
                        $title = mb_strtolower($title, 'UTF-8');
                }
                $title = utf8_uri_encode($title, 200);
        }

        $title = strtolower($title);
        $title = preg_replace('/&.+?;/', '', $title); // kill entities
        $title = preg_replace('/[^%a-z0-9 _-]/', '', $title);
        $title = preg_replace('/\s+/', '-', $title);
        $title = preg_replace('|-+|', '-', $title);
        $title = trim($title, '-');

        return $title;
}

/* akhir fungsi dari Wordpress */
function tgllengkapbalik($tglnyo)
{
$thn = substr($tglnyo,0,4);
$bln = substr($tglnyo,5,2);
switch ($bln)
{
case 1: $bulan = "Januari"; break;
case 2: $bulan = "Februari"; break;
case 3: $bulan = "Maret"; break;
case 4: $bulan = "April"; break;
case 5: $bulan = "Mei"; break;
case 6: $bulan = "Juni"; break;
case 7: $bulan = "Juli"; break;
case 8: $bulan = "Agustus"; break;
case 9: $bulan = "September"; break;
case 10: $bulan = "Oktober"; break;
case 11: $bulan = "November"; break;
case 12: $bulan = "Desember"; break;
}

$tgl = substr($tglnyo,8,2);
return $tgl." ".$bulan." ".$thn;
}

function duit($rp) {
  return number_format($rp, '2',',','.');
}

function secure_string( $string ) {
		$string = strip_tags( $string );
		$string = htmlspecialchars( $string, ENT_QUOTES );
		$string = trim( $string );
		return $string;
	}
function cms_template($key,$tempath) {
	global $main,$cfgTemplate,$subpath,$dirJS,$baseURL;
	
	$filename = $tempath;
	if (!$fd = fopen($filename,"r")) {
		die("Template not found.");
	} else {
		if(filesize($filename)>0)
			//echo $filename.filesize($filename)."<br/>";
{
        $template = fread($fd,filesize($filename));
        
		$template = stripslashes($template);
    
		foreach($key as $id=>$val) {
			$template = str_replace("<% $id %>","$val",$template);
		}
		
		//$template = preg_replace('/="images/', '="' . $subpath . 'templates/' . $cfgTemplate . '/images',$template);
		return $template;
    }
	}
}
function getBrowser() { $st = $_SERVER['HTTP_USER_AGENT']; $browserName = array ('Chrome','chromeframe','Firefox','Opera','MAXTHON','MSIE','Safari','SeaMonkey','Prism'); $browserFullName = array ('Google Chrome','Chrome Frame','Mozilla Firefox','Opera','Maxthon','Internet Explorer','Safari','SeaMonkey','Mozilla Prism'); $browserUrl = array ('http://www.google.com/chrome/', 'http://www.google.com/chrome/', 'http://www.mozilla.com/firefox/', 'http://www.opera.com/download/', 'http://www.maxthon.com/download.htm', 'http://www.microsoft.com/windows/internet-explorer/', 'http://www.apple.com/safari/download/', 'http://prism.mozillalabs.com/'); for ($a=0; $a<count($browserName); $a++) { $pos = strpos($st,$browserName[$a]); if ($pos !== false) { $out['name'] = $browserName[$a]; $out['fullname'] = $browserFullName[$a]; $out['url'] = $browserUrl[$a]; if ($browserName[$a] == 'Chrome') { $stsplit = explode(' ',substr($st,$pos+(strlen($browserName[$a])+1))); $versplit = explode('.',$stsplit[0]); $out['version'] = $versplit[0] . '.' . $versplit[1]; break; } else if ($browserName[$a] == 'chromeframe') { $out['name'] = 'Chrome'; $out['version'] = '4'; break; } else if ($browserName[$a] == 'Firefox') { $out['version'] = substr($st,$pos+(strlen($browserName[$a])+1),(strlen($st)-$pos)+strlen($browserName[$a])); $embel = strpos($out['version'],' (.NET'); if ($embel !== false) $out['version'] = substr($out['version'],0,$embel); break; } else if ($browserName[$a] == 'Opera') { $newopr = strpos($st,'Version'); if ($newopr === false) { $out['version'] = substr($st,$pos+(strlen($browserName[$a])+1),strpos($st,' ') - ($pos+(strlen($browserName[$a])+1))); } else { $out['version'] = substr($st,$newopr+8,10); } break; } else if ($browserName[$a] == 'MAXTHON') { $out['version'] = substr($st,$pos+(strlen($browserName[$a])+1),3); break; } else if ($browserName[$a] == 'MSIE') { $out['version'] = substr($st,$pos+(strlen($browserName[$a])+1),1); if (intval($out['version'] <=3)) $out['version'] = substr($st,$pos+(strlen($browserName[$a])+1),2); break; } else if ($browserName[$a] == 'Safari') { $out['version'] = substr($st,(strpos($st,'Version')+8),(strpos($st,$browserName[$a])-1)-(strpos($st,'Version')+8)); break; } else if ($browserName[$a] == 'SeaMonkey') { $out['version'] = substr($st,$pos+(strlen($browserName[$a])+1),(strlen($st)-$pos)+strlen($browserName[$a])); break; } } } if ($out['name'] == '') { $out['name'] = 'unknown'; $out['fullname'] = 'Unknown browser'; } return $out; }

function is_accept_gzip() { $HTTP_ACCEPT_ENCODING = $_SERVER["HTTP_ACCEPT_ENCODING"]; $browser = getBrowser(); if ($browser['name'] == 'MSIE' && $browser['version'] <= 6) $encoding = false; else if(strpos($HTTP_ACCEPT_ENCODING, 'x-gzip') !== false) $encoding = 'x-gzip'; else if( strpos($HTTP_ACCEPT_ENCODING,'gzip') !== false ) $encoding = 'gzip'; else $encoding = false; return $encoding; }

function gz_output($str) { global $gzipOutput; $encoding = is_accept_gzip(); if($encoding && $gzipOutput) { $_temp1 = strlen($str); if ($_temp1 < 2048) { print($str); } else { ob_start('ob_gzhandler'); echo $str; } } else echo $str; }

function sanitizeFilename($f) {
 $replace_chars = array(
     'Š'=>'S', 'š'=>'s', 'Ð'=>'Dj','Ž'=>'Z', 'ž'=>'z', 'À'=>'A', 'Á'=>'A', 'Â'=>'A', 'Ã'=>'A', 'Ä'=>'A',
     'Å'=>'A', 'Æ'=>'A', 'Ç'=>'C', 'È'=>'E', 'É'=>'E', 'Ê'=>'E', 'Ë'=>'E', 'Ì'=>'I', 'Í'=>'I', 'Î'=>'I',
     'Ï'=>'I', 'Ñ'=>'N', 'Ò'=>'O', 'Ó'=>'O', 'Ô'=>'O', 'Õ'=>'O', 'Ö'=>'O', 'Ø'=>'O', 'Ù'=>'U', 'Ú'=>'U',
     'Û'=>'U', 'Ü'=>'U', 'Ý'=>'Y', 'Þ'=>'B', 'ß'=>'Ss','à'=>'a', 'á'=>'a', 'â'=>'a', 'ã'=>'a', 'ä'=>'a',
     'å'=>'a', 'æ'=>'a', 'ç'=>'c', 'è'=>'e', 'é'=>'e', 'ê'=>'e', 'ë'=>'e', 'ì'=>'i', 'í'=>'i', 'î'=>'i',
     'ï'=>'i', 'ð'=>'o', 'ñ'=>'n', 'ò'=>'o', 'ó'=>'o', 'ô'=>'o', 'õ'=>'o', 'ö'=>'o', 'ø'=>'o', 'ù'=>'u',
     'ú'=>'u', 'û'=>'u', 'ý'=>'y', 'ý'=>'y', 'þ'=>'b', 'ÿ'=>'y', 'ƒ'=>'f'
 );
 $f = strtr($f, $replace_chars);
 // convert & to "and", @ to "at", and # to "number"
 $f = preg_replace(array('/[\&]/', '/[\@]/', '/[\#]/'), array('-and-', '-at-', '-number-'), $f);
 $f = preg_replace('/[^(\x20-\x7F)]*/','', $f); // removes any special chars we missed
 $f = str_replace(' ', '-', $f); // convert space to hyphen 
 $f = str_replace('\'', '', $f); // removes apostrophes
 $f = preg_replace('/[^\w\-\.]+/', '', $f); // remove non-word chars (leaving hyphens and periods)
 $f = preg_replace('/[\-]+/', '-', $f); // converts groups of hyphens into one
 return strtolower($f);
}

function pilihbahasa($size=NULL) {
	global $namadepan,$dbh,$languange,$pathurl,$bhs;
	
	$pilb = $dbh->prepare("SELECT * FROM `".$namadepan."bahasa` ");
	$pilb->execute();
	$pilb->setFetchMode(PDO::FETCH_ASSOC);
	
if(isset($_GET['plgmodul']))
    $plgmodul = $_GET['plgmodul'];
    else
    $plgmodul = "";

    $pil = '<ul>';
	       
while($pbhs = $pilb->fetch()) {
	$bahasa = $pbhs['bahasa'];
	$bhsx = $pbhs['bhs_'.$languange];

    
	
    $cekmod = $dbh->prepare("SELECT slug_".$bahasa." slug FROM `".$namadepan."modul` where nama = '$plgmodul'");
    $cekmod->execute();
    $cekmod->setFetchMode(PDO::FETCH_ASSOC);
    $rcekmod = $cekmod->fetch();


    if (isset($plgmodul) && $plgmodul == 'halaman')
    {
    $idy = 'hid';
    $getidy = $_GET[$idy];
    
    
 


    $cekbhs = $dbh->prepare("SELECT permalink_".$bahasa." permalink FROM `".$namadepan."halaman` where permalink_$bhs = '$getidy'");
    $cekbhs->execute();
    $cekbhs->setFetchMode(PDO::FETCH_ASSOC);
        
            if($cekbhs->rowCount()>0)       {
    $rcekbhs = $cekbhs->fetch();
    
    $urlbhs =  "/".$rcekbhs["permalink"];
    
    
    }
    else
    {
        $urlbhs = "";
        
    }
    $plgmd = "";
    }
    else  if (isset($plgmodul) && $plgmodul == 'berita')
    {
    $idy = 'bid';
    if(isset($_GET[$idy])) 
    $getidy = $_GET[$idy];
    else
    $getidy = "";

    


    $cekbhs = $dbh->prepare("SELECT permalink_".$bahasa." permalink FROM `".$namadepan."berita` where permalink_$bhs = '$getidy'");
    $cekbhs->execute();
    $cekbhs->setFetchMode(PDO::FETCH_ASSOC);
        
            if($cekbhs->rowCount()>0)       {
    $rcekbhs = $cekbhs->fetch();
    
    $urlbhs =  "/".$rcekbhs["permalink"];
    
    
    }
    else
    {
        $urlbhs = "";
        
    }
    
    $plgmd =  "/".$rcekmod['slug'];
    }
    else  if (isset($plgmodul) && $plgmodul == 'agenda')
    {
    $idy = 'aid';
    if(isset($_GET[$idy])) 
    $getidy = $_GET[$idy];
    else
    $getidy = "";

    


    $cekbhs = $dbh->prepare("SELECT permalink_".$bahasa." permalink FROM `".$namadepan."agenda` where permalink_$bhs = '$getidy'");
    $cekbhs->execute();
    $cekbhs->setFetchMode(PDO::FETCH_ASSOC);
        
            if($cekbhs->rowCount()>0)       {
    $rcekbhs = $cekbhs->fetch();
    
    $urlbhs =  "/".$rcekbhs["permalink"];
    
    
    }
    else
    {
        $urlbhs = "";
        
    }
    
    $plgmd =  "/".$rcekmod['slug'];
    }
    else if (isset($plgmodul) && $plgmodul == 'prodi')	
    {
    $idy = 'pdid';
    $getidy = isset($_GET[$idy]) ? $_GET[$idy] : "";
    


    $cekbhs = $dbh->prepare("SELECT slug_".$bahasa." permalink FROM `".$namadepan."prodi` where slug_$bhs = '$getidy'");
    $cekbhs->execute();
    $cekbhs->setFetchMode(PDO::FETCH_ASSOC);
        
            if($cekbhs->rowCount()>0)       {
    $rcekbhs = $cekbhs->fetch();
    
    $urlbhs =  "/".$rcekbhs["permalink"];
    
    
    }
    else
    {
        $urlbhs = "";
        
    }
    $plgmd = "/".$rcekmod['slug'];
    }
    else if (isset($plgmodul) && $plgmodul == 'pengumuman')	
    {
    $idy = 'pid';
    $getidy = isset($_GET[$idy]) ? $_GET[$idy] : "";
    


    $cekbhs = $dbh->prepare("SELECT permalink_".$bahasa." permalink FROM `".$namadepan."pengumuman` where permalink_$bhs = '$getidy'");
    $cekbhs->execute();
    $cekbhs->setFetchMode(PDO::FETCH_ASSOC);
        
            if($cekbhs->rowCount()>0)       {
    $rcekbhs = $cekbhs->fetch();
    
    $urlbhs =  "/".$rcekbhs["permalink"];
    
    
    }
    else
    {
        $urlbhs = "";
        
    }
    $plgmd = "/".$rcekmod['slug'];
    }
    else {
        
        $getidy = "";
        $urlbhs ="";
        $plgmd = "";
    }


    
							
$pil .= '<li><a href="'.$pathurl.'/'.$bahasa.$plgmd.$urlbhs.'"><img src="'.$pathurl.'/images/'.$bahasa.$size.'.png" alt="'.$bhsx.'"></a></li> ';



   
                                   
}

$pil .= '</ul>';
return $pil;

}
?>