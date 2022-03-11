<?php
defined('_JCMS_') or header('Location: ../../');
global $namadepan, $koneksi_db, $btsberita;
$kolom = $koneksi_db->sql_query("SELECT `f`.`file`,`f`.`ket` FROM `".$namadepan."foto` `f`, `".$namadepan."fotogaleri` `g` where `g`.`id` = `f`.`galeri` and `g`.`published` = 'y' ORDER BY `f`.`whenentri` DESC limit 12");


$totalfoto = $koneksi_db->sql_numrows($kolom);

if ($totalfoto > 0)
{
echo "<div class=\"row page-row\">";
while($foto = $koneksi_db->sql_fetchrow($kolom))
{

?>

                        <a class="prettyphoto col-md-3 col-sm-3 col-xs-6" rel="prettyPhoto[gallery]" title="<?=$foto[ket]?>" href="/assets/images/fotogaleri/besak/<?=$foto[file]?>"><img class="img-responsive img-thumbnail" src="/assets/images/fotogaleri/kecik/<?=$foto[file]?>" alt="<?=$foto[ket]?>" /></a>
                                 
<?php
}
echo "</div><p align=\"right\"><a href=\"/galerifoto\"><b>Galeri Foto Lainnya</b></a></p>";
}
else
{
	echo "<p align=\"center\"><i>Foto belum ada.</i></p> ";
}	
?>


 