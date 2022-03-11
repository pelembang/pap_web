<?php
if(!defined("INCLUDE_FILE_INI")) { die ("Access denied"); }

if ($modultambah->rowCount() > 0)
{
if (isset($_POST['submit']))
{




	
	
	$nama = $_POST['nama'];
	$alumni = $_POST['alumni'];
	$kerja = $_POST['kerja'];
	$prodi = $_POST['prodi'];
	$testimoni_id = $_POST['testimoni_id'];
	
	
	if($_POST['testimoni_en'] == '')
	{
	$testimoni_en = $testimoni_id;
	
	}
	else {

		$testimoni_en = $_POST['testimoni_en'];
		
	}
	
	if($_POST['submit'] == 1)
	$published = 1;
	else
	$published = 0;


	$maxurut = $koneksi_db->prepare("SELECT max(urut) urut FROM ".$namadepan."testimonial");
	$maxurut->execute();
	$maxurut->setFetchMode(PDO::FETCH_ASSOC);
	$rmaxurut = $maxurut->fetch();

	$urut = $rmaxurut['urut']+1;
	

	$tmbhtestimoni = $koneksi_db->prepare("INSERT INTO ".$namadepan."testimonial (nama,alumni,kerja,prodi,testimoni_id,testimoni_en,urut,publish) VALUES (?,?,?,?, ?, ?, ?, ?)");
	$tmbhtestimoni->execute(array($nama, $alumni, $kerja,$prodi, $testimoni_id, $testimoni_en, $urut, $published));
	$tmbhtestimoni->setFetchMode(PDO::FETCH_ASSOC);

	$lastid = $koneksi_db->lastInsertId();


	if(!empty($_POST['uploadhidden']))
	{

	$folder = __DIR__."../../../../userfiles/images/testimoni/";
	
	$filebaru = $folder."/".$lastid.".jpg";

	
	rename("tmp/testimoni/".$_POST['uploadhidden'], $filebaru);
	
	
	
	}


	


	
	if($tmbhtestimoni->rowCount() > 0)
	{
		
	
	$_SESSION['session_berhasil'] = "Testimonial berhasil dismpan";
	header ("Location: ?cpmodul=$namamodul&aksi=ubah&id=$lastid");
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
											<input type="text" name="nama" id="nama" class="span12" placeholder="Nama Alumni" placeholder="Nama Prodi" data-rule-required="true" data-msg-required="Nama Alumni harus diisi."/>
											
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
																
																	
																	<textarea name="testimoni_id" id="testimoni_id" rows="50" class="span12 ckeditor"></textarea>
																	
																
															
															</div>
														</div>


				
													
													</div>
													<div class="tab-pane" id="bhs_en">
														<div class="control-group">
															
															<div class="controls">
																
																	
															<textarea name="testimoni_en" id="testimoni_en" rows="50" class="span12 ckeditor"></textarea>
																	
																
															
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
													<button type="submit" class="btn btn-green" name="submit" value="1">Publikasi</button>
													<button type="button" class="btn" onclick="window.location.href='index.php?cpmodul=<?=$namamodul?>'">Batal</button>
												
											</div>
										</div>

										<div class="box box-color">
											<div class="box-title">
												<h3>
													
													Informasi Alumni
												</h3>
												
											</div>

											<div class="control-group">
												
											<label for="prodi" class="control-label"><strong>Program Studi</strong></label>
												
													
													<div class="controls">
														
														<select name="prodi" id="prodi" class="chosen-select span12">
														<option value="0">Pilih Program Studi</option>
															
		<?php
		
		$prodi = $koneksi_db->prepare("SELECT singkatan,id,nama_id from ".$namadepan."prodi order by id asc");
		$prodi->execute();
		$prodi->setFetchMode(PDO::FETCH_ASSOC);
		if ($prodi->rowCount() > 0)
		{
		while($rprodi = $prodi->fetch()) {
		
		?>
		<option value="<?=$rprodi['id']?>"><?=$rprodi['singkatan']?> - <?=$rprodi['nama_id']?></option>
		
		<?php
		}
		}
		?>
		
														</select>
															
															
														
													
													</div>
												
												
											</div>


											<div class="control-group">
												
											
												<label for="kerja" class="control-label"><strong>Kerja di</strong></label>
														
														<div class="controls">
															
															<input type="text" name="kerja" id="kerja" class="span12" />
															
																
																
															
														
														</div>
													
													
												</div>

												<div class="control-group">
												
											
												<label for="alumni" class="control-label"><strong>Alumni Tahun</strong></label>
														
														<div class="controls">
															
															<input type="text" name="alumni" id="alumni" class="span4" />
															
																
																
															
														
														</div>
													
													
												</div>

												

											
										</div>


										<div class="box box-color">
											<div class="box-title">
												<h3>
													
													Foto Alumni
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