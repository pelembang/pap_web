<?php
if(!defined("INCLUDE_FILE_INI")) { die ("Access denied"); }

if ($modulubah->rowCount() > 0)
{
$jumdata = $koneksi_db->prepare("SELECT id, kat_id, slug_id,kat_en, slug_en FROM ".$namadepan."kategori WHERE id = ?");
$jumdata->execute(array($_GET['id']));
$jumdata->setFetchMode(PDO::FETCH_ASSOC);
$editpemakai = $jumdata->fetch();

$id = $editpemakai['id'];
$kat_id = $editpemakai['kat_id'];
$slug_id = $editpemakai['slug_id'];
$slug_en = $editpemakai['slug_en'];
$kat_en = $editpemakai['kat_en'];

?>

<div class="row-fluid">
						<div class="span12">

						<?php
							
							if (isset($_SESSION['session_berhasil']))
							{
								
						?>
						<div class="alert alert-success">
											<button type="button" class="close" data-dismiss="alert">&times;</button>
											<?=$_SESSION['session_berhasil']?>
										</div>
						<?php
						unset($_SESSION['session_berhasil']);
							}
							
							
						


if (isset($_POST['submit']))
{


	$slug_id = sanitizeFilename($_POST['kat_id']);
	
	$kat_id = $_POST['kat_id'];
	
	
	if($_POST['kat_en'] == '')
	{
	$kat_en = $kat_id;
	$slug_en = $slug_id;
	
	}
	else {

		$kat_en = $_POST['kat_en'];
	$slug_en = sanitizeFilename($_POST['kat_en']);
	


		
	
	}
	


	
	

	
$editq = $koneksi_db->prepare("UPDATE ".$namadepan."kategori SET kat_id=?, slug_id=?,kat_en=?,  slug_en=? WHERE id = ?");
$editq->execute(array($kat_id, $slug_id, $kat_en,  $slug_en, $id));
if($editq->rowCount() > 0)
{
	
$_SESSION['session_berhasil'] = "Kategori berita berhasil diubah";
header ("Location: ?cpmodul=$namamodul&aksi=ubah&id=$id");
}
else {
	header ("Location: ?cpmodul=$namamodul&aksi=ubah&id=$id");	
}

}
?>

<div class="row-fluid">
						<div class="span12">
											
							<div class="box">
							
							
								
								<div class="box-title">
									<h3><i class="icon-th-list"></i> Ubah <?=$rmodul['lengkap']?> Baru</h3>
								</div>
								<form action="#" method="POST" class='form-vertical form-validate' enctype='multipart/form-data' id="formentri">
								<div class="row-fluid">
									<div class="span9">
										<div class="box">
											
											<div class="box-content nopadding">
												<ul class="tabs tabs-inline tabs-top">
													<li class='active'>
														<a href="#bhs_id" data-toggle='tab'><img src="img/id.gif"> Bahasa Indonesia</a>
													</li>
													<li>
														<a href="#bhs_en" data-toggle='tab'><img src="img/en.gif"> Bahasa Inggris</a>
													</li>
													
												</ul>
												<div class="tab-content padding tab-content-inline tab-content-bottom">
													<div class="tab-pane  active" id="bhs_id">
														<div class="control-group">
															
															<div class="controls">
																
																	
																	<input type="text" name="kat_id" id="kat_id" value="<?=$kat_id?>" class="span12" placeholder="Kategori Berita" data-rule-required="true" data-msg-required="Kategori Berita harus diisi."/>
																	
																
															
															</div>
														</div>

														




				
													
													</div>
													<div class="tab-pane" id="bhs_en">
														<div class="control-group">
															
															<div class="controls">
																
																	
																	<input type="text" name="kat_en" id="kat_en" value="<?=$kat_en?>" class="span12" placeholder="News Category"/>
																	
																
															
															</div>
														</div>


													</div>
													
												</div>
											</div>
										</div>
									</div>
									<div class="span3">
										<div class="box box-color">
											<div class="box-title">
												<h3>
													
													Simpan / Publikasi
												</h3>
												
											</div>
											<div class="box-content">
												
											
													<button type="submit" class="btn btn-primary" name="submit" value="0">Simpan</button> 
													
													<button type="button" class="btn" onclick="window.location.href='index.php?cpmodul=<?=$namamodul?>'">Kembali</button>
													<?php
if ($modulhapus->rowCount() > 0)
{
													?>
													<button type="button" class="btn btn-red" onclick="if(confirm('Hapus data ini ?') == true){window.location.href='?cpmodul=<?=$namamodul?>&aksi=hapus&id=<?=$id?>'}"><i class="icon-trash"></i> Hapus</button>
													<?php
}
													?>
											</div>
										</div>

										


										


										

										




									</div>
								</div>	
							</form>		
										
									
								</div>
							</div>
						</div>
<?php

}
else
header ("Location: ?cpmodul=$namamodul");
?>