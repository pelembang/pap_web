<?php
defined('_JCMS_') or header('Location: ../../');
global $namadepan, $languange, $koneksi_db, $urlfotogalerikecik, $urlfotogaleri, $judulsubmodul;
$namamodul = basename(dirname(__FILE__));
if (isset($_GET['fid']) or isset($_GET[hal]))
{
$queryfid = " and g.id = '$_GET[fid]' ";
$urlgaleri = "/galeri-foto/".$_GET[fid]."/halaman/";

}
else
{
	$queryfid = "";
$urlgaleri = "/galeri-foto/halaman/";	
}
// paging mulai
$PAGE_DEFAULT = 1;
$PAGESIZE_DEFAULT = 9;
$PAGESIZE_LOWER_LIMIT = 9;
$PAGESIZE_UPPER_LIMIT = 100;
$page = $_GET[hal];
if (!isset($page)) $page = $PAGE_DEFAULT;
if ($page < 1 ) $page = 1;
if (!isset($pagesize)) $pagesize = $PAGESIZE_DEFAULT;
if ($pagesize < $PAGESIZE_LOWER_LIMIT)
$pagesize = $PAGESIZE_LOWER_LIMIT;
if ($pagesize > $PAGESIZE_UPPER_LIMIT)
$pagesize = $PAGESIZE_UPPER_LIMIT;

$countberita = sql_query("select count(id) from ".$namadepan."fotogaleri where published = 'y' $queryfid");

list($total_rows) = sql_fetchrow($countberita);

$count = $pagesize;
$offset = ($page-1) * $pagesize;
$last_page      = ceil($total_rows/$pagesize);
if ($_GET[hal] > $last_page){
$page = $last_page;
$offset = ($page-1) * $pagesize;
}

$adjacent_pages_links = ($page > 6 ? "<li><a href=\"".$urlgaleri."1\">1</a></li><li> <a>...</a> </li>" : "");
for ($i=$page-5; $i<$page; $i++) {
if ($i < 1) continue;
$adjacent_pages_links .= " ".
"<li><a href=\"".$urlgaleri."$i\">$i</a></li>";
}
$adjacent_pages_links .= "<li class=\"m-active\"><a>$page</a></li>";
for ($i=$page+1; $i<($page+6); $i++) {
if ($i > $last_page) break;
$adjacent_pages_links .= " ".
"<li><a href=\"".$urlgaleri."$i\">$i</a></li>";
}
$adjacent_pages_links .= ($page+5 < $last_page ? "<li> <a>...</a> </li><li><a href=\"/jadwal-dokter/$last_page\">$last_page</a></li>" : "");
$navigasi = "<div><ul class=\"pagination\">" .
($page == 1 ? "" : "<li><a href=\"".$urlgaleri."1\"><<</a></li>").
($page == 1 ? "" : "<li><a href=\"".$urlgaleri."".($page-1)."\"><</a></li>").
"<li>$adjacent_pages_links</li>".($page == $last_page ? "" : "<li><a href=\"".$urlgaleri."".($page+1)."\">></a></li>").
($page == $last_page ? "" : "<li><a href=\"".$urlgaleri."$last_page\">>></a></li>")."</ul></div>";
	

$galeri = sql_query("SELECT `g`.`id`, `g`.`judul`, `g`.`ket`,`g`.`whoentri`,substr(`g`.`whenentri`,1,4) tahun, substr(`g`.`whenentri`,6,2) bulan,  substr(`g`.`whenentri`,9,2) tanggal FROM `".$namadepan."fotogaleri` g WHERE  `g`.`published` = 'y' $queryfid ORDER BY `g`.`whenentri` DESC LIMIT $offset,$count");
$isibloknyo .= "xxxx $offset,$count";
if (sql_numrows($galeri) > 0)
{

if (isset($_GET['fid']) or isset($_GET['hal']))
{
	$rgaleri = sql_fetchrow($galeri);
	$urlgaleri = "/galeri-foto/".$rgaleri[id]."/".sanitize_title_with_dashes($rgaleri[judul])."/halaman/";

// paging mulai
$PAGE_DEFAULT = 1;
$PAGESIZE_DEFAULT = 9;
$PAGESIZE_LOWER_LIMIT = 9;
$PAGESIZE_UPPER_LIMIT = 100;
$page = $_GET[hal];
if (!isset($page)) $page = $PAGE_DEFAULT;
if ($page < 1 ) $page = 1;
if (!isset($pagesize)) $pagesize = $PAGESIZE_DEFAULT;
if ($pagesize < $PAGESIZE_LOWER_LIMIT)
$pagesize = $PAGESIZE_LOWER_LIMIT;
if ($pagesize > $PAGESIZE_UPPER_LIMIT)
$pagesize = $PAGESIZE_UPPER_LIMIT;

$countberita = sql_query("select count(id) from ".$namadepan."foto where galeri = '$_GET[fid]'");

list($total_rows) = sql_fetchrow($countberita);

$count = $pagesize;
$offset = ($page-1) * $pagesize;
$last_page      = ceil($total_rows/$pagesize);
if ($_GET[hal] > $last_page){
$page = $last_page;
$offset = ($page-1) * $pagesize;
}

$adjacent_pages_links = ($page > 6 ? "<li><a href=\"".$urlgaleri."1\">1</a></li><li> <a>...</a> </li>" : "");
for ($i=$page-5; $i<$page; $i++) {
if ($i < 1) continue;
$adjacent_pages_links .= " ".
"<li><a href=\"".$urlgaleri."$i\">$i</a></li>";
}
$adjacent_pages_links .= "<li class=\"m-active\"><a>$page</a></li>";
for ($i=$page+1; $i<($page+6); $i++) {
if ($i > $last_page) break;
$adjacent_pages_links .= " ".
"<li><a href=\"".$urlgaleri."$i\">$i</a></li>";
}
$adjacent_pages_links .= ($page+5 < $last_page ? "<li> <a>...</a> </li><li><a href=\"/jadwal-dokter/$last_page\">$last_page</a></li>" : "");
$navigasi = "<div><ul class=\"pagination\">" .
($page == 1 ? "" : "<li><a href=\"".$urlgaleri."1\"><<</a></li>").
($page == 1 ? "" : "<li><a href=\"".$urlgaleri."".($page-1)."\"><</a></li>").
"<li>$adjacent_pages_links</li>".($page == $last_page ? "" : "<li><a href=\"".$urlgaleri."".($page+1)."\">></a></li>").
($page == $last_page ? "" : "<li><a href=\"".$urlgaleri."$last_page\">>></a></li>")."</ul></div>";


$foto = sql_query("SELECT `".$namadepan."foto`.`id`,  `".$namadepan."foto`.`ket`, `".$namadepan."foto`.`file`, `".$namadepan."fotogaleri`.`judul` FROM `".$namadepan."foto`,`".$namadepan."fotogaleri` WHERE `".$namadepan."foto`.`galeri` = `".$namadepan."fotogaleri`.`id` and `".$namadepan."foto`.`galeri` = '$_GET[fid]' ORDER BY `".$namadepan."foto`.`whenentri` ASC LIMIT $offset,$count");
$isibloknyo .= '<section id="news">
 <div class="container">
                <div class="row">
                    <!-- Main Title -->
                    
                </div>
                <div class="row">
				
				<style>
.crop{
   height:240px; /*container-width*/
   overflow:hidden; /*hide bounds of image */
   margin:0;   /*reset margin of figure tag*/
   width:auto;
}
.crop img{
   display:block; /*remove inline-block spaces*/
   
   max-width: 100%, height: auto;
}
</style> ';	
                            
                                
if (sql_numrows($foto) > 0)
{

$oleh = sql_query("SELECT `nama` FROM `".$namadepan."syspemakai` WHERE `id` = '$rgaleri[whoentri]'");
$roleh = sql_fetchrow($oleh);

while($rfoto = sql_fetchrow($foto))
{
if(file_exists("userfiles/images/$rfoto[file]"))
	$fotonyo = "/userfiles/images/$rfoto[file]";
else
	$fotonyo = "/images/galerifoto.jpg";

$isibloknyo .= '
									
									<div class="col-xs-12 col-md-4 col-sm-6">
                        <div class="blog-post">
                            <div class="crop">
                                
								<a href="/userfiles/images/'.$rfoto[file].'" title="'.$rfoto[ket].'"><img src="'.$fotonyo.'" title="'.$rfoto[ket].'" alt="'.$rfoto[ket].'" class="img-responsive"></a>
                            </div>
                            <div class="content-box">
                                
                                <div class="post-inner">';
								
								
								$jum = sql_query("select count(id) jumlah from ".$namadepan."foto where galeri = '$rgaleri[id]'");	
                            	$jl = sql_fetchrow($jum);
								$isibloknyo .=	'
								
								
                                    
                                    <h5>'.$rfoto[ket].'</h5>
                                    
                                </div>
                            </div>
                        </div>
                    </div>';

                                                        	
}


}
else
{
$isibloknyo .= "<p align=\"center\"><b>Foto belum ada.</b></p>\n";
}
$isibloknyo .= '<div class="row">
                    <div class="col-xs-12 col-md-12 col-sm-12"><div class="blog-post"><a href="/galeri-foto" class="thm-btn page-scroll">Kembali</a></div></div></div>';

if ($last_page > 1)
$isibloknyo .= _HALAMANPG_." $page "._DARIPG_." $last_page";
						if ($total_rows > $PAGESIZE_LOWER_LIMIT)
$isibloknyo .= $navigasi;
$isibloknyo .= '</div>
                    </div>
                </div>
            </div>
        </section>';	
}
else
{
$isibloknyo .= '<section id="news">
 <div class="container">
                <div class="row">
                    <!-- Main Title -->
                    
                </div>
                <div class="row">
				
				<style>
.crop{
   height:240px; /*container-width*/
   overflow:hidden; /*hide bounds of image */
   margin:0;   /*reset margin of figure tag*/
   width:auto;
}
.crop img{
   display:block; /*remove inline-block spaces*/
   
   max-width: 100%, height: auto;
}
</style> ';	
while($rgaleri = sql_fetchrow($galeri))
{
$filefoto = sql_query("select `file` from ".$namadepan."foto where galeri = '$rgaleri[id]' order by rand() limit 1");
$fifot = sql_fetchrow($filefoto);
//if (sql_numrows($filefoto)>0)
//{
if(file_exists("userfiles/images/$fifot[file]"))
	$filethumb = "/userfiles/images/$fifot[file]";
else
	$filethumb = "/images/galerifoto.jpg";
//}
$isibloknyo .= '
									
									<div class="col-xs-12 col-md-4 col-sm-6">
                        <div class="blog-post">
                            <div class="crop">
                                
								<a href="/galeri-foto/'.$rgaleri[id].'/'.sanitize_title_with_dashes($rgaleri[judul]).'" title="'.$rgaleri[judul].'"><img src="'.$filethumb.'" alt="'.$rgaleri[judul].'" class="img-responsive"></a>
                            </div>
                            <div class="content-box">
                                
                                <div class="post-inner">';
								
								
								$jum = sql_query("select count(id) jumlah from ".$namadepan."foto where galeri = '$rgaleri[id]'");	
                            	$jl = sql_fetchrow($jum);
								$isibloknyo .=	'
								
								
                                    <h3>'.$rgaleri[judul].' ('.$jl[jumlah].')</h3>
                                    <h5>'.$rgaleri[ket].'</h5>
                                    
                                </div>
                            </div>
                        </div>
                    </div>';
					
			
								
                                    	
                                    	
                


}

$isibloknyo .= '</div>
                    
                ';
				
				if ($last_page > 1)
$isibloknyo .= _HALAMANPG_." $page "._DARIPG_." $last_page";
						if ($total_rows > $PAGESIZE_LOWER_LIMIT)
$isibloknyo .= $navigasi;
            
			
        $isibloknyo .= '</div></div></div></section>';	

	

}
$isibloknyo .= '                
                                </div>';



}
else
{
$isibloknyo .= "<p align=\"center\"><b>"._ERRORGAL_."</b></p>\n";
}
?>
