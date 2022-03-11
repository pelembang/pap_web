<?php
if(!defined("INCLUDE_FILE_INI")) { die ("Access denied"); }
?>
<div class="row-fluid">
					<div class="span12">
<div class="box box-bordered box-color">
								<div class="box-title">
									<h3>
										<i class="icon-table"></i>
										Daftar <?=$rmodul['lengkap']?><a name="tablecontent"></a>
									</h3>
									
									<?php
									if ($modultambah->rowCount() > 0)
									?>
										<div class="actions"><a href="?cpmodul=<?=$namamodul?>&aksi=tambah" class="btn"><i class="icon-plus-sign"></i> Masukan Tulisan Berjalan Baru</a></div>
										
								</div>
								
								
								<div class="box-content nopadding">
<?php



$gambardepancp = $dbh->prepare("SELECT id, ordering, waktu, waktuawal, waktuakhir, judul, whoentri, whereentri, whenentri, whoubah, whereubah, whenubah, aktif FROM ".$namadepan."tulisanberjalan ORDER BY ordering ASC");
$gambardepancp->execute();
$gambardepancp->setFetchMode(PDO::FETCH_ASSOC);

if ($gambardepancp->rowCount() > 0)
{
?>	

					<table id="tabelkegiatan" class="table table-hover table-nomargin table-bordered dataTable dataTable-noheader dataTable-sorting dataTable-hidden" data-hidden="0" data-sorting="0,asc" >
								
									<thead>
										<tr>
												<th><?=_ORDER_?></th>
												<th><?=_ORDER_?></th>
												
												<th><?=_JUDUL_?></th>
												
												<th>Tayang</th>
												<th>Aksi</th>
												
												
												
											
										</tr>
									</thead>
									<tbody>
									
									<?php
$no = 1;;

									while($rgambardepancp = $gambardepancp->fetch())
{

									?>
										<tr>
												<td><?=$rgambardepancp['ordering']?></td>
												<?php
												$orderup = $rgambardepancp['ordering'] - 1;
$orderdown = $rgambardepancp['ordering'] + 1;

$targetup = $dbh->prepare("select id from ".$namadepan."tulisanberjalan where ordering=$orderup"); 
$targetup->execute();
$targetup->setFetchMode(PDO::FETCH_ASSOC);
$rtargetup = $targetup->fetch();

$targetdown = $dbh->prepare("select id from ".$namadepan."tulisanberjalan where ordering=$orderdown");
$targetdown->execute();
$targetdown->setFetchMode(PDO::FETCH_ASSOC);
$rtargetdown = $targetdown->fetch();
												
												if ($modulubah->rowCount() > 0)
{
echo "<td align=\"center\">";
if ($rtargetup['id'])
echo "<a href=\"?cpmodul=$namamodul&aksi=ngurutke&idt=$rtargetup[id]&id=$rgambardepancp[id]&order=$rgambardepancp[ordering]&ordert=$orderup\" class=\"btn\"><i class=\"icon-caret-up\"></i></a>\n";
if ($rtargetdown['id'])
echo "<a href=\"?cpmodul=$namamodul&aksi=ngurutke&idt=$rtargetdown[id]&id=$rgambardepancp[id]&order=$rgambardepancp[ordering]&ordert=$orderdown\" class=\"btn\"><i class=\"icon-caret-down\"></i></a></td>\n";
}
else
{
echo "<td align=\"center\">";
if ($rtargetup['id'])
echo "<img src=\"gambar/pucuk.png\" border=\"0\" alt=\""._UP_."\" title=\""._UP_."\">\n";
if ($rtargetdown['id'])
echo "<img src=\"gambar/bawah.png\" border=\"0\" alt=\""._DOWN_."\" title=\""._DOWN_."\"></td>\n";
}
?>
												
												
												<td><?=$rgambardepancp['judul']?></td>
												
												
												<?php
												if ($modulubah->rowCount() > 0)
{

$ubah = "<a href=\"?cpmodul=$namamodul&aksi=ubah&id=$rgambardepancp[id]\" class=\"btn\" rel=\"tooltip\" title=\"Edit\"><i class=\"icon-edit\"></i></a>";
if ($rgambardepancp['aktif'] == 'y')
$publish = "<a href=\"?cpmodul=$namamodul&aksi=published&id=$rgambardepancp[id]\"><span class=\"label label-satgreen\">Active</span></a>";
else if ($rgambardepancp['aktif'] == 't')
$publish = "<a href=\"?cpmodul=$namamodul&aksi=published&id=$rgambardepancp[id]\"><span class=\"label label-lightred\">Inactive</span></a>";
}
else
{
$ubah = "<img src=\"gambar/lock.png\" border=\"0\" alt=\""._UBAH_."\"/>";
if ($rgambardepancp['aktif'] == 'y')
$publish = "<img src=\"gambar/ya.png\" border=\"0\" alt=\""._YA_."\"/>";
else if ($rgambardepancp['aktif'] == 't')
$publish = "<img src=\"gambar/tidak.png\" border=\"0\" alt=\""._TIDAK_."\"/>";

}
if ($modulhapus->rowCount() > 0)
$hapus = "<a href=\"?cpmodul=$namamodul&aksi=hapus&id=$rgambardepancp[id]\" class=\"btn\" rel=\"tooltip\" title=\"Delete\" onclick=\"return confirm('Yakin hapus Tulisan berjalan : \\n$rgambardepancp[judul] ?')\"><i class=\"icon-remove\"></i></a>";
else
{
$matikepilih = "disabled";
$hapus = "<img src=\"gambar/lock.png\" border=\"0\" alt=\""._HAPUS_."\"/>";
}



?>
												
												
												<td><?=$publish?></td>
												<td><?=$ubah?></a>
												<?=$hapus?></td>
												
												
												
										</tr>
<?php
$no++;
}
?></tbody>
										</table>
<?php
}
else
{
?>
<div class="alert alert-danger alert-nomargin">
										
										
										Tulisan Berjalan belum ada.
									</div>
<?php

}
									?>
									 </div>
									
								</div></div></div>
								