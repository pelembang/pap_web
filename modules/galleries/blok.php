<?php
defined('_JCMS_') or header('Location: ../../');
global $namadepan, $koneksi_db, $btsgaleri;
$kolom = $koneksi_db->sql_query("SELECT `f`.`file`,`g`.`judul`, `g`.`whenentri` , `f`.`ket`, g.id, g.whenentri FROM `".$namadepan."foto` `f`, `".$namadepan."fotogaleri` `g` where `g`.`id` = `f`.`galeri` and `g`.`published` = 'y' group by g.id  ORDER BY rand() limit $btsgaleri");


$totalfoto = $koneksi_db->sql_numrows($kolom);

if ($totalfoto > 0)
{
echo "<ul>";
while($foto = $koneksi_db->sql_fetchrow($kolom))
{

?>

                       
<li class="gallery">
													<div class="gallery-inner">
														<a href="gallery-detail.html" class="gallery-image"><img src="/assets/images/fotogaleri/kecik/<?=$foto[file]?>" alt="<?=$foto[ket]?>"></a>
														<h4 class="gallery-title">
															<a href="/galeri-foto/<?=$foto[id]?>/<?=sanitize_title_with_dashes($foto[judul])?>"><?=$foto[judul]?></a>
														</h4>
														<div class="gallery-date"><?=baliktgljam($foto[whenentri]).' '._WIB_.''?></div>
													</div>
												</li>
								
                                 
<?php
}
echo "</ul>";
echo '<p class="show-all-btn"><a href="/galeri-foto">Semua Galeri Foto</a></p>
            							';
}
else
{
	echo '<p class="show-all-btn"><a href="gallery-list.html">Galeri foto belum ada.</a></p>';
}	
?>


 