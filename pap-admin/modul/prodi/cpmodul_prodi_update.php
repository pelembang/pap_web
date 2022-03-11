<?php
if(!defined("INCLUDE_FILE_INI")) { die ("Access denied"); }

if ($modulubah->rowCount() > 0)
{
$jumdata = $koneksi_db->prepare("SELECT id, nama_id, pengantar_id,slug_id,akreditasi, singkatan, kaprodi, lama, strata, nama_en,  slug_en, visimisi_id, sejarah_id, so, info_akreditasi, dosen, mhs, alumni, kurikulum_id, pengantar_en, visimisi_en, sejarah_en, kurikulum_en FROM ".$namadepan."prodi WHERE id = ?");
$jumdata->execute(array($_GET['id']));
$jumdata->setFetchMode(PDO::FETCH_ASSOC);
$editpemakai = $jumdata->fetch();

$id = $editpemakai['id'];
$nama_id = $editpemakai['nama_id'];
$pengantar_id = $editpemakai['pengantar_id'];
$slug_id = $editpemakai['slug_id'];
$akreditasi = $editpemakai['akreditasi'];
$singkatan = $editpemakai['singkatan'];
$kaprodi = $editpemakai['kaprodi'];
$lama = $editpemakai['lama'];
$strata = $editpemakai['strata'];
$nama_en = $editpemakai['nama_en'];
$slug_en = $editpemakai['slug_en'];
$visimisi_id = $editpemakai['visimisi_id'];
$sejarah_id = $editpemakai['visimisi_id'];
$dosen = $editpemakai['dosen'];
$mhs = $editpemakai['mhs'];
$alumni = $editpemakai['alumni'];
$kurikulum_id = $editpemakai['kurikulum_id'];
$pengantar_en = $editpemakai['pengantar_en'];
$visimisi_en = $editpemakai['visimisi_en'];
$sejarah_en = $editpemakai['sejarah_en'];
$kurikulum_en =  $editpemakai['kurikulum_en'];
$so = $editpemakai['so'];
$info_akreditasi = $editpemakai['info_akreditasi'];



if(!empty($so))
$fotoso = '<img src="../userfiles/images/prodi/'.$so.'" alt="">';
else
$fotoso = '';

if(!empty($info_akreditasi))
$fotoak = '<img src="../userfiles/images/prodi/'.$info_akreditasi.'" alt="">';
else
$fotoak = '';


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


	
	

	
$editq = $koneksi_db->prepare("UPDATE ".$namadepan."prodi SET nama_id=?, pengantar_id=?,slug_id=?,akreditasi=?, singkatan=?, kaprodi=?, lama=?, strata=?, nama_en=?,  slug_en=?, visimisi_id=?, sejarah_id=?, so=?, info_akreditasi=?, dosen=?, mhs=?, alumni=?, kurikulum_id=?, pengantar_en=?, visimisi_en=?, sejarah_en=?, kurikulum_en=? WHERE id = ?");
$editq->execute(array($nama_id, $pengantar_id,$slug_id, $akreditasi, $singkatan,$kaprodi, $lama, $strata, $nama_en,  $slug_en, $visimisi_id, $sejarah_id, $file, $file_pd, $dosen, $mhs, $alumni, $kurikulum_id, $pengantar_en, $visimisi_en, $sejarah_en, $kurikulum_en, $id));
if($editq->rowCount() > 0)
{
	
$_SESSION['session_berhasil'] = "Program Studi berhasil diubah";
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
																
																	
																	<input type="text" name="nama_id" id="nama_id" value="<?=$nama_id?>" class="span12" placeholder="Nama Prodi" data-rule-required="true" data-msg-required="Nama Prodi harus diisi."/>
																	
																
															
															</div>
														</div>

														<div class="control-group">

														<label for="pengantar_id" class="control-label"><strong>Sambutan Kaprodi</strong></label>
															
															<div class="controls">
																
																	
																	<textarea name="pengantar_id" id="pengantar_id" rows="50" class="span12 ckeditor"><?=$pengantar_id?></textarea>
																	
																
															
															</div>
														</div>

														<div class="control-group">

														<label for="visimisi_id" class="control-label"><strong>Visi dan Misi Prodi</strong></label>
															
															<div class="controls">
																
																	
																	<textarea name="visimisi_id" id="visimisi_id" rows="50" class="span12 ckeditor"><?=$pengantar_id?></textarea>
																	
																
															
															</div>
														</div>


														<div class="control-group">

<label for="sejarah_id" class="control-label"><strong>Sejarah Prodi</strong></label>
	
	<div class="controls">
		
			
			<textarea name="sejarah_id" id="sejarah_id" rows="50" class="span12 ckeditor"><?=$sejarah_id?></textarea>
			
		
	
	</div>
</div>

<div class="control-group">

<label for="kurikulum_id" class="control-label"><strong>Kurikulum</strong></label>
	
	<div class="controls">
		
			
			<textarea name="kurikulum_id" id="kurikulum_id" rows="50" class="span12 ckeditor"><?=$kurikulum_id?></textarea>
			
		
	
	</div>
</div>


				
													
													</div>
													<div class="tab-pane" id="bhs_en">
														<div class="control-group">
															
															<div class="controls">
																
																	
																	<input type="text" name="nama_en" id="nama_en" value="<?=$nama_en?>" class="span12" placeholder="Name of Study Program"/>
																	
																
															
															</div>
														</div>

														<div class="control-group">

														<label for="pengantar_id" class="control-label"><strong>Greeting</strong></label>
															
															<div class="controls">
																
																	
																	<textarea name="pengantar_en" id="pengantar_en" rows="50" class="span12 ckeditor"><?=$pengantar_en?></textarea>
																	
																
															
															</div>
														</div>


														<div class="control-group">

														<label for="visimisi_en" class="control-label"><strong>Vision and Mission</strong></label>
															
															<div class="controls">
																
																	
																	<textarea name="visimisi_en" id="visimisi_en" rows="50" class="span12 ckeditor"><?=$visimisi_en?></textarea>
																	
																
															
															</div>
														</div>


														<div class="control-group">

<label for="sejarah_en" class="control-label"><strong>History</strong></label>
	
	<div class="controls">
		
			
			<textarea name="sejarah_en" id="sejarah_en" rows="50" class="span12 ckeditor"><?=$sejarah_en?></textarea>
			
		
	
	</div>
</div>

<div class="control-group">

<label for="kurikulum_en" class="control-label"><strong>Curriculum</strong></label>
	
	<div class="controls">
		
			
			<textarea name="kurikulum_en" id="kurikulum_en" rows="50" class="span12 ckeditor"><?=$kurikulum_en?></textarea>
			
		
	
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
															
															<input type="text" name="kaprodi" id="kaprodi" class="span12" value="<?=$kaprodi?>"/>
															
																
																
															
														
														</div>
													
													
												</div>
											<div class="control-group">
												
											
											<label for="singkatan" class="control-label"><strong>Singkatan</strong></label>
													
													<div class="controls">
														
														<input type="text" name="singkatan" id="singkatan" class="span6" value="<?=$singkatan?>"/>
														
															
															
														
													
													</div>
												
												
											</div>

											<div class="control-group">
												
											
											<label for="akreditasi" class="control-label"><strong>Akreditasi</strong></label>
													
													<div class="controls">
														
														<input type="text" name="akreditasi" id="akreditasi" class="span6" value="<?=$akreditasi?>"/>
														
															
															
														
													
													</div>
												
												
											</div>


											<div class="control-group">
										<label for="lama" class="control-label"><strong>Lama Pendidikan</strong></label>
										<div class="controls">
											<input type="text" name="lama" id="lama" class="span6" value="<?=$lama?>" />
											<span class="help-inline">
												tahun
											</span>
										</div>
									</div>

									<div class="control-group">
										<label for="strata" class="control-label"><strong>Strata</strong></label>
										<div class="controls">
											<input type="text" name="strata" id="strata" class="span6" value="<?=$strata?>" />
											
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
														
														<input type="text" name="dosen" id="dosen" class="span6" value="<?=$dosen?>" />
														
															
															
														
													
													</div>
												
												
											</div>

											<div class="control-group">
										<label for="mhs" class="control-label"><strong>Jumlah Mahasiswa Aktif</strong></label>
										<div class="controls">
											<input type="text" name="mhs" id="mhs" class="span6" value="<?=$mhs?>">
											
										</div>
									</div>

									<div class="control-group">
										<label for="alumni" class="control-label"><strong>Jumlah Alumni</strong></label>
										<div class="controls">
											<input type="text" name="alumni" id="alumni" class="span6" value="<?=$alumni?>">
											
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


														<a name="uploadfile"><input type="file" name="uploadslideshow" id="upload" style="color:transparent;"><input type="hidden" name="uploadhiddenlamo" id="uploadhiddenlamo" value="<?=$so?>"><input type="hidden" name="uploadhidden" id="uploadhidden" value="<?=$so?>"></a>
															
														
															
														</div>
														<div id="status" ></div>
				
				
				<ul id="filelist">

				<li class="berhasil"><?=$fotoso?></li>
				</ul>
				
													
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

															<a name="uploadfile"><input type="file" name="uploadslideshow" id="upload_pd" style="color:transparent;"><input type="hidden" name="uploadhiddenlamo_pd" id="uploadhiddenlamo_pd" value="<?=$info_akreditasi?>"><input type="hidden" name="uploadhidden_pd" id="uploadhidden_pd" value="<?=$info_akreditasi?>"></a>
															
															
															
														</div>
														<div id="status_pd" ></div>
				
				
				<ul id="filelist_pd"><li class="berhasil_pd"><?=$fotoak?></li></ul>
				
													
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