<?php
if(!defined("INCLUDE_FILE_INI")) { die ("Access denied"); }

if ($modultambah->rowCount() > 0)
{

if (isset($_POST['submit']))
{

$jabatan_id = $_POST['jabatan_id'];
$nama = $_POST['nama'];

	if($_POST['jabatan_en'] == '')
	{
	$jabatan_en = $jabatan_id;
	
	}
	else {

		$jabatan_en = $_POST['jabatan_en'];
		
	}
	
	$maxurut = $koneksi_db->prepare("SELECT max(urut) urut FROM ".$namadepan."pengelola");
	$maxurut->execute();
	$maxurut->setFetchMode(PDO::FETCH_ASSOC);
	$rmaxurut = $maxurut->fetch();

	$urut = $rmaxurut['urut']+1;


	$tmbhpengelola = $koneksi_db->prepare("INSERT INTO ".$namadepan."pengelola (nama, jabatan_id, jabatan_en, urut) VALUES (?,?,?,?)");
	$tmbhpengelola->execute(array($nama, $jabatan_id, $jabatan_en,$urut));
	$tmbhpengelola->setFetchMode(PDO::FETCH_ASSOC);
	
	
	$lastid = $koneksi_db->lastInsertId();


	if(!empty($_POST['uploadhidden']))
	{

	$folder = __DIR__."../../../../userfiles/images/pengelola/";
	
	$filebaru = $folder."/".$lastid.".jpg";

	
	rename("tmp/pengelola/".$_POST['uploadhidden'], $filebaru);
	
	
	
	}
	
	
	
	if($tmbhpengelola->rowCount() > 0)
	{
		
	
	$_SESSION['session_berhasil'] = "Pengelola berhasil dismpan";
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

											<div class="tab-content padding  tab-content-bottom">
												<div class="control-group">
										
										<div class="controls">
											<input type="text" name="nama" id="nama" class="span12" placeholder="Nama Pengelola" />
											
										</div>
									</div>
										

												<ul class="tabs tabs-inline tabs-top">
													<li class='active'>
														<a href="#bhs_id" data-toggle='tab'><img src="img/id.gif"> Bahasa Indonesia</a>
													</li>
													<li>
														<a href="#bhs_en" data-toggle='tab'><img src="img/en.gif"> Bahasa Inggris</a>
													</li>
													
												</ul>
												
												</div>
												<div class="tab-content padding tab-content-inline tab-content-bottom">
													<div class="tab-pane  active" id="bhs_id">
														<div class="control-group">
															
															<div class="controls">
																
																	
																	<input type="text" name="jabatan_id" id="jabatan_id" value="" class="span12" placeholder="Jabatan Pengelola" data-rule-required="true" data-msg-required="Jabatan Pengelola harus diisi."/>
																	
																
															
															</div>
														</div>

														


				
													
													</div>
													<div class="tab-pane" id="bhs_en">
														<div class="control-group">
															
															<div class="controls">
																
																	
																	<input type="text" name="jabatan_en" id="jabatan_en" value="" class="span12" placeholder="Management Position"/>
																	
																
															
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

										


										<div class="box box-color">
											<div class="box-title">
												<h3>
													
													Foto/Gambar
												</h3>
												
											</div>
											<div class="box-content">
												
												
													
													<div class="controls">
														<div class="input-append input-prepend">
															
															<a name="uploadfile"><input type="file" name="uploadslideshow" id="upload" style="color:transparent;"><input type="hidden" name="uploadhidden" id="uploadhidden"></a>
															
														</div>
														<div id="status" ></div>
				
				
				<ul id="filelist"></ul>
				
													
													</div>
												
												
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