<?php
if(!defined("INCLUDE_FILE_INI")) { die ("Access denied"); }

if ($modultambah->rowCount() > 0)
{

if (isset($_POST['submit']))
{



	if(!empty($_POST['uploadhidden']))
	{

	$folder = __DIR__."../../../../userfiles/images/prodi";
	
	$filebaru = $folder."/".sanitizeFilename($_POST['uploadhidden']);

	
	rename("tmp/prodi/".$_POST['uploadhidden'], $filebaru);
	

	


	$file = $_POST['uploadhidden'];
	
	}
	else {

	$file = NULL;
	}


	if(!empty($_POST['uploadhidden_pd']))
	{

	$folder = __DIR__."../../../../userfiles/images/prodi";
	
	$filebaru = $folder."/".sanitizeFilename($_POST['uploadhidden_pd']);

	
	rename("tmp/prodi/".$_POST['uploadhidden_pd'], $filebaru);
	

	


	$file_pd = $_POST['uploadhidden_pd'];
	
	}
	else {

	$file_pd = NULL;
	}



	$slug_id = sanitizeFilename($_POST['nama_id']);
	
	$nama_id = $_POST['nama_id'];
	$pengantar_id = $_POST['pengantar_id'];
	$visimisi_id = $_POST['visimisi_id'];
	$sejarah_id = $_POST['sejarah_id'];
	$kurikulum_id = $_POST['kurikulum_id'];

	
	if($_POST['nama_en'] == '')
	{
	$nama_en = $nama_id;
	$slug_en = $slug_id;
	
	}
	else {

		$nama_en = $_POST['nama_en'];
	$slug_en = sanitizeFilename($_POST['nama_en']);
	


		
	
	}
	if($_POST['pengantar_en'] == '')
	{
	$pengantar_en = $_POST['pengantar_id'];
	}
	else {
	$pengantar_en = $_POST['pengantar_en'];
	}

	if($_POST['pengantar_en'] == '')
	{
	$pengantar_en = $_POST['pengantar_id'];
	}
	else {
	$pengantar_en = $_POST['pengantar_en'];
	}

	if($_POST['visimisi_en'] == '')
	{
	$visimisi_en = $_POST['visimisi_id'];
	}
	else {
	$visimisi_en = $_POST['visimisi_en'];
	}

	if($_POST['sejarah_en'] == '')
	{
	$sejarah_en = $_POST['sejarah_id'];
	}
	else {
	$sejarah_en = $_POST['sejarah_en'];
	}

	if($_POST['kurikulum_en'] == '')
	{
	$kurikulum_en = $_POST['kurikulum_id'];
	}
	else {
	$kurikulum_en = $_POST['kurikulum_en'];
	}
	$singkatan = $_POST['singkatan'];
	$kaprodi = $_POST['kaprodi'];
	$lama = $_POST['lama'];
	$strata = $_POST['strata'];
	$dosen = $_POST['dosen'];
	$mhs = $_POST['mhs'];
	$alumni = $_POST['alumni'];
	$akreditasi = $_POST['akreditasi'];


	
	

	$tmbhprodi = $koneksi_db->prepare("INSERT INTO ".$namadepan."prodi (nama_id, pengantar_id,slug_id,akreditasi, singkatan, kaprodi, lama, strata, nama_en,  slug_en, visimisi_id, sejarah_id, so, info_akreditasi, dosen, mhs, alumni, kurikulum_id, pengantar_en, visimisi_en, sejarah_en, kurikulum_en) VALUES (?, ?,?,?, ?, ?, ?, ?,  ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?)");					
	$tmbhprodi->execute(array($nama_id, $pengantar_id,$slug_id, $akreditasi, $singkatan,$kaprodi, $lama, $strata, $nama_en,  $slug_en, $visimisi_id, $sejarah_id, $file, $file_pd, $dosen, $mhs, $alumni, $kurikulum_id, $pengantar_en, $visimisi_en, $sejarah_en, $kurikulum_en));
	$tmbhprodi->setFetchMode(PDO::FETCH_ASSOC);
	
	
	$lastid = $koneksi_db->lastInsertId();
	
	
	
	if($tmbhprodi->rowCount() > 0)
	{
		
	
	$_SESSION['session_berhasil'] = "Program Studi berhasil dismpan";
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
																
																	
																	<input type="text" name="nama_id" id="nama_id" value="" class="span12" placeholder="Nama Prodi" data-rule-required="true" data-msg-required="Nama Prodi harus diisi."/>
																	
																
															
															</div>
														</div>

														<div class="control-group">

														<label for="pengantar_id" class="control-label"><strong>Sambutan Kaprodi</strong></label>
															
															<div class="controls">
																
																	
																	<textarea name="pengantar_id" id="pengantar_id" rows="50" class="span12 ckeditor"></textarea>
																	
																
															
															</div>
														</div>

														<div class="control-group">

														<label for="visimisi_id" class="control-label"><strong>Visi dan Misi Prodi</strong></label>
															
															<div class="controls">
																
																	
																	<textarea name="visimisi_id" id="visimisi_id" rows="50" class="span12 ckeditor"></textarea>
																	
																
															
															</div>
														</div>


														<div class="control-group">

<label for="sejarah_id" class="control-label"><strong>Sejarah Prodi</strong></label>
	
	<div class="controls">
		
			
			<textarea name="sejarah_id" id="sejarah_id" rows="50" class="span12 ckeditor"></textarea>
			
		
	
	</div>
</div>

<div class="control-group">

<label for="kurikulum_id" class="control-label"><strong>Kurikulum</strong></label>
	
	<div class="controls">
		
			
			<textarea name="kurikulum_id" id="kurikulum_id" rows="50" class="span12 ckeditor"></textarea>
			
		
	
	</div>
</div>


				
													
													</div>
													<div class="tab-pane" id="bhs_en">
														<div class="control-group">
															
															<div class="controls">
																
																	
																	<input type="text" name="nama_en" id="nama_en" value="" class="span12" placeholder="Name of Study Program"/>
																	
																
															
															</div>
														</div>

														<div class="control-group">

														<label for="pengantar_id" class="control-label"><strong>Greeting</strong></label>
															
															<div class="controls">
																
																	
																	<textarea name="pengantar_en" id="pengantar_en" rows="50" class="span12 ckeditor"></textarea>
																	
																
															
															</div>
														</div>


														<div class="control-group">

														<label for="visimisi_en" class="control-label"><strong>Vision and Mission</strong></label>
															
															<div class="controls">
																
																	
																	<textarea name="visimisi_en" id="visimisi_en" rows="50" class="span12 ckeditor"></textarea>
																	
																
															
															</div>
														</div>


														<div class="control-group">

<label for="sejarah_en" class="control-label"><strong>History</strong></label>
	
	<div class="controls">
		
			
			<textarea name="sejarah_en" id="sejarah_en" rows="50" class="span12 ckeditor"></textarea>
			
		
	
	</div>
</div>

<div class="control-group">

<label for="kurikulum_en" class="control-label"><strong>Curriculum</strong></label>
	
	<div class="controls">
		
			
			<textarea name="kurikulum_en" id="kurikulum_en" rows="50" class="span12 ckeditor"></textarea>
			
		
	
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
													
													Informasi Program Studi
												</h3>
												
											</div>
											<div class="box-content nopadding">
											<div class="control-group">
												
											
												<label for="kaprodi" class="control-label"><strong>Nama Kaprodi</strong></label>
														
														<div class="controls">
															
															<input type="text" name="kaprodi" id="kaprodi" class="span12" />
															
																
																
															
														
														</div>
													
													
												</div>
											<div class="control-group">
												
											
											<label for="singkatan" class="control-label"><strong>Singkatan</strong></label>
													
													<div class="controls">
														
														<input type="text" name="singkatan" id="singkatan" class="span6" />
														
															
															
														
													
													</div>
												
												
											</div>

											<div class="control-group">
												
											
											<label for="akreditasi" class="control-label"><strong>Akreditasi</strong></label>
													
													<div class="controls">
														
														<input type="text" name="akreditasi" id="akreditasi" class="span6" />
														
															
															
														
													
													</div>
												
												
											</div>


											<div class="control-group">
										<label for="lama" class="control-label"><strong>Lama Pendidikan</strong></label>
										<div class="controls">
											<input type="text" name="lama" id="lama" class="span6">
											<span class="help-inline">
												tahun
											</span>
										</div>
									</div>

									<div class="control-group">
										<label for="strata" class="control-label"><strong>Strata</strong></label>
										<div class="controls">
											<input type="text" name="strata" id="strata" class="span6">
											
										</div>
									</div>
										</div>
										</div>


										<div class="box box-color">
											<div class="box-title">
												<h3>
													
													Statistik Program Studi
												</h3>
												
											</div>
											<div class="box-content nopadding">
											<div class="control-group">
												
											
											<label for="dosen" class="control-label"><strong>Jumlah Dosen</strong></label>
													
													<div class="controls">
														
														<input type="text" name="dosen" id="dosen" class="span6" />
														
															
															
														
													
													</div>
												
												
											</div>

											<div class="control-group">
										<label for="mhs" class="control-label"><strong>Jumlah Mahasiswa Aktif</strong></label>
										<div class="controls">
											<input type="text" name="mhs" id="mhs" class="span6">
											
										</div>
									</div>

									<div class="control-group">
										<label for="alumni" class="control-label"><strong>Jumlah Alumni</strong></label>
										<div class="controls">
											<input type="text" name="alumni" id="alumni" class="span6">
											
										</div>
									</div>
										</div>
										</div>


										<div class="box box-color">
											<div class="box-title">
												<h3>
													
													Struktur Organisasi
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


										<div class="box box-color">
											<div class="box-title">
												<h3>
													
													Sertifikat Akreditasi
												</h3>
												
											</div>
											<div class="box-content">
												
												
													
													<div class="controls">
														<div class="input-append input-prepend">
															
															<a name="uploadfile"><input type="file" name="uploadslideshow" id="upload_pd" style="color:transparent;"><input type="hidden" name="uploadhidden_pd" id="uploadhidden_pd"></a>
															
														</div>
														<div id="status_pd" ></div>
				
				
				<ul id="filelist_pd"></ul>
				
													
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