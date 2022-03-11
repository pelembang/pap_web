<?php
if(!defined("INCLUDE_FILE_INI")) { die ("Access denied"); }

if ($modultambah->rowCount() > 0)
{

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
	
	

	$tmbhkat = $koneksi_db->prepare("INSERT INTO ".$namadepan."kategori (kat_id, kat_en, slug_id, slug_en) VALUES (?, ?,?,?)");					
	$tmbhkat->execute(array($kat_id, $kat_en, $slug_id, $slug_en));
	$tmbhkat->setFetchMode(PDO::FETCH_ASSOC);
	
	
	$lastid = $koneksi_db->lastInsertId();
	
	
	
	if($tmbhkat->rowCount() > 0)
	{
		
	
	$_SESSION['session_berhasil'] = "Kategori Berita berhasil dismpan";
	header ("Location: ?cpmodul=$namamodul&aksi=ubah&id=".$lastid);
	}

	


}
?>
<div class="row-fluid">
						<div class="span12">
											
							<div class="box">
							
							
								
								<div class="box-title">
									<h3><i class="icon-th-list"></i> Tambah <?=$rmodul['lengkap']?> Baru</h3>
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
																
																	
																	<input type="text" name="kat_id" id="kat_id" value="" class="span12" placeholder="Kategori Berita" data-rule-required="true" data-msg-required="Kategori Berita harus diisi."/>
																	
																
															
															</div>
														</div>

					

				
													
													</div>
													<div class="tab-pane" id="bhs_en">
														<div class="control-group">
															
															<div class="controls">
																
																	
																	<input type="text" name="kat_en" id="kat_en" value="" class="span12" placeholder="News Category"/>
																	
																
															
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
													
													<button type="button" class="btn" onclick="window.location.href='index.php?cpmodul=<?=$namamodul?>'">Batal</button>
												
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