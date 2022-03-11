<?php
if(!defined("INCLUDE_FILE_INI")) { die ("Access denied"); }

if ($modultambah->rowCount() > 0)
{
if (isset($_POST['submit']))
{




	
	$slug_id = sanitizeFilename($_POST['judul_id']);
	

	$cekpermalink = $koneksi_db->prepare("SELECT slug_id, permalink_id from ".$namadepan."pengumuman where slug_id = ?");
		$cekpermalink->execute(array($slug_id));
		$cekpermalink->setFetchMode(PDO::FETCH_ASSOC);
		$jumpermalink = $cekpermalink->rowCount();
		if ($jumpermalink > 0)
		{
			$nextjum = $jumpermalink+1;
		$rcekperm = $cekpermalink->fetch(); 
		$pjgjum = strlen($jumpermalink);
		$pjgslug = strlen($slug_id);
		if($pjgslug > 195) {
		$permalink_id = substr($slug_id,0,195)."-".$nextjum;
		}
		else
		{
			$permalink_id = $slug_id."-".$nextjum;
		}
		
	}
	else {
		$permalink_id = $slug_id;
	}
	
	$prodi = $_POST['prodi'];
	$judul_id = $_POST['judul_id'];
	$isi_id = $_POST['isi_id'];
	
	if($_POST['judul_en'] == '')
	{
	$judul_en = $judul_id;
	$slug_en = $slug_id;
	$permalink_en = $permalink_id;
	}
	else {

		$judul_en = $_POST['judul_en'];
	$slug_en = sanitizeFilename($_POST['judul_en']);
	//$permalink_en = $slug_en;

		$cekpermalinke = $koneksi_db->prepare("SELECT slug_en, permalink_en from ".$namadepan."pengumuman where slug_en = ?");
		$cekpermalinke->execute(array($slug_en));
		$cekpermalinke->setFetchMode(PDO::FETCH_ASSOC);
		$jumpermalinke = $cekpermalinke->rowCount();
		if ($jumpermalinke > 0)
		{
			$nextjume = $jumpermalinke+1;
		$rcekperme = $cekpermalinke->fetch(); 
		$pjgjume = strlen($jumpermalinke);
		$pjgsluge = strlen($slug_en);
		if($pjgsluge > 195) {
		$permalink_en = substr($slug_en,0,195)."-".$nextjume;
		}
		else
		{
			$permalink_en = $slug_en."-".$nextjume;
		}
		
	}
	else {
		$permalink_en = $slug_en;
	}


		
	
	}
	if($_POST['isi_en'] == '')
	{
	$isi_en = $_POST['isi_id'];
	}
	else {
	$isi_en = $_POST['isi_en'];
	}



	$hits = 0; 
	$whoentri = $_SESSION['sesi_user'];
	$whereentri = ipnyo();
	if($_POST['submit'] == '1')
	$published = 'y';
	else
	$published = 't';
	

	$tmbhpengumuman = $koneksi_db->prepare("INSERT INTO ".$namadepan."pengumuman (prodi,judul_id, isi_id,slug_id, permalink_id, judul_en, isi_en, slug_en, permalink_en, hits, whoentri, whereentri, whenentri, published) VALUES (?,?,?,?, ?, ?, ?, ?, ?,?, ?, ?, now(),?)");
	$tmbhpengumuman->execute(array($prodi, $judul_id, $isi_id,$slug_id, $permalink_id, $judul_en, $isi_en, $slug_en, $permalink_en,  $hits, $whoentri, $whereentri, $published));
	$tmbhpengumuman->setFetchMode(PDO::FETCH_ASSOC);

	$lastid = $koneksi_db->lastInsertId();
	
	
	if(!empty($_POST['flupload']))
	{
		$flupload = $_POST['flupload'];
		$fluploadtype = $_POST['fluploadtype'];

		$folder = __DIR__."../../../../userfiles/images/pengumuman/".date("Y")."/".date("m")."/".date("d");

		if(!is_dir($folder) && !file_exists($folder)) 
	{
	mkdir($folder, '755', true);
	}

		$urut = 1;
foreach($flupload as $x => $filear) {


	$filebaru = $folder."/".sanitizeFilename($filear);

		
	$folderx = date("Y")."/".date("m")."/".date("d")."/";
	$filex = $filear;
	
	 
	$koneksi_db->prepare("INSERT INTO ".$namadepan."pengumuman_file (pengumuman, urut,folder, file, tipefile) VALUES (?, ?,?, ?, ?)")->execute(array($lastid, $urut, $folderx, $filex, $fluploadtype[$x]));
	rename("tmp/pengumuman/".$filear, $filebaru);
	


	


$urut++;

}
	}


	
	if($tmbhpengumuman->rowCount() > 0)
	{
		
	
	$_SESSION['session_berhasil'] = "Pengumuman berhasil dismpan";
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
																
																	
																	<input type="text" name="judul_id" id="judul_id" value="" class="span12" placeholder="Judul Pengumuman" data-rule-required="true" data-msg-required="Judul Pengumuman harus diisi."/>
																	
																
															
															</div>
														</div>

														<div class="control-group">
															
															<div class="controls">
																
																	
																	<textarea name="isi_id" id="isi_id" rows="50" class="span12 ckeditor"></textarea>
																	
																
															
															</div>
														</div>


				
													
													</div>
													<div class="tab-pane" id="bhs_en">
														<div class="control-group">
															
															<div class="controls">
																
																	
																	<input type="text" name="judul_en" id="judul_en" value="" class="span12" placeholder="Announcement Title"/>
																	
																
															
															</div>
														</div>

														<div class="control-group">
															
															<div class="controls">
																
																	
																	<textarea name="isi_en" id="isi_en" rows="50" class="span12 ckeditor"></textarea>
																	
																
															
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
												
											
													<button type="submit" class="btn btn-primary" name="submit" value="0">Konsep</button> 
													<button type="submit" class="btn btn-green" name="submit" value="1">Publikasi</button>
													<button type="button" class="btn" onclick="window.location.href='index.php?cpmodul=<?=$namamodul?>'">Batal</button>
												
											</div>
										</div>

										<div class="box box-color">
											<div class="box-title">
												<h3>
													
													Kategori
												</h3>
												
											</div>
											<div class="box-content">
												
											
												
													
													<div class="controls">
														
														<select name="prodi" id="prodi" class="chosen-select span12">
														<option value="0">PAP - Politeknik Akamigas Palembang</option>
															
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
				
				
				<table id="filelist"></table>
				
													
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