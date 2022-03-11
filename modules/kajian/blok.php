<?php
defined('_JCMS_') or header('Location: ../../');
global $koneksi_db, $namadepan,$extfile, $dbh;
$sth = $dbh->prepare("select `b`.`judul`,`b`.`id`, `b`.`file`  from `".$namadepan."berita` `b` where `b`.`published` = 'y' order by `b`.`tanggal` desc limit 5");
	$sth->execute();
	$sth->setFetchMode(PDO::FETCH_ASSOC);
		
	
	
if ($sth->rowCount() > 0)
{
while ($rsql_berita = $sth->fetch())
{
	if(empty($rsql_berita[file]))
$filex = "/assets/img/berita.png";
else
$filex = "/userfiles/images/thumb/$rsql_berita[file]";	
               echo "<article class=\"news-item row\">       
                                    <figure class=\"thumb col-md-2 col-sm-3 col-xs-3\">
                                        <img src=\"$filex\" alt=\"\" />
                                    </figure>
                                    <div class=\"details col-md-10 col-sm-9 col-xs-9\">
                                        <h4 class=\"title\"><a href=\"/kajian/$rsql_berita[id]/".sanitize_title_with_dashes($rsql_berita[judul])."\">$rsql_berita[judul]</a></h4>
                                    </div>
                                </article><p align=\"right\"><!--//news-item-->";

}

}	
else
{
	
echo "<p><i>Kajian belum ada.</i></p>\n";
}