<?php
if(!defined("INCLUDE_FILE_INI")) { die ("Access denied"); }

if ($modultambah->rowCount() > 0)
{

if (isset($_POST['submit']))
{



	if(!empty($_POST['uploadhidden']))
	{

	$folder = __DIR__."../../../../userfiles/images/berita/".date("Y")."/".date("m")."/".date("d");
	$folderthumb1 = $folder."/besak";
	$folderthumb2 = $folder."/kecik";
if(!is_dir($folder) && !file_exists($folder)) 
{
mkdir($folder, '755', true);
mkdir($folderthumb1);
mkdir($folderthumb2);
}
	$filebaru = $folder."/".sanitizeFilename($_POST['uploadhidden']);

	$filethumb1 = $folderthumb1."/".sanitizeFilename($_POST['uploadhidden']);
	$filethumb2 = $folderthumb2."/".sanitizeFilename($_POST['uploadhidden']);
	
	rename("tmp/berita/".$_POST['uploadhidden'], $filebaru);
	
	//echo $filebaru."<br/>".$filethumb1."<br/>".$filethumb2;
	
	thumb(700,500,$filebaru,$filethumb1);
	thumb(1000,600,$filebaru,$filethumb2);

	$folder = date("Y")."/".date("m")."/".date("d")."/";
	$file = $_POST['uploadhidden'];
	
	}
	else {
$folder = "";
	$file = $_POST['uploadhidden'];
	}
	$slug_id = sanitizeFilename($_POST['judul_id']);
	

	$cekpermalink = $koneksi_db->prepare("SELECT slug_id, permalink_id from ".$namadepan."berita where slug_id = ?");
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
	
	$kat = $_POST['kat'];
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

		$cekpermalinke = $koneksi_db->prepare("SELECT slug_en, permalink_en from ".$namadepan."berita where slug_en = ?");
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
	

	$tmbhberita = $koneksi_db->prepare("INSERT INTO ".$namadepan."berita (kat,judul_id, isi_id,slug_id, permalink_id, judul_en, isi_en, slug_en, permalink_en, folder, file, hits, whoentri, whereentri, whenentri, published) VALUES (?,?,?,?,?, ?, ?, ?, ?, ?, ?,?, ?, ?, now(),?)");
	$tmbhberita->execute(array($kat, $judul_id, $isi_id,$slug_id, $permalink_id, $judul_en, $isi_en, $slug_en, $permalink_en, $folder, $file, $hits, $whoentri, $whereentri, $published));
	$tmbhberita->setFetchMode(PDO::FETCH_ASSOC);
	
	
	$lastid = $koneksi_db->lastInsertId();
	
	//$lastid[0];
	
	//$tambahkategori = $koneksi_db->prepare("insert into ".$namadepan."kategoriberita (berita, kategori) values ('$lastid','$_POST[kategori]');");
	//$tambahkategori->execute();
	//$tambahkategori->setFetchMode(PDO::FETCH_ASSOC);
	
	
	if($tmbhberita->rowCount() > 0)
	{
		
	
	$_SESSION['session_berhasil'] = "Berita berhasil dismpan";
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
																
																	
																	<input type="text" name="judul_id" id="judul_id" value="" class="span12" placeholder="Judul Berita" data-rule-required="true" data-msg-required="Judul Berita harus diisi."/>
																	
																
															
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
																
																	
																	<input type="text" name="judul_en" id="judul_en" value="" class="span12" placeholder="News Title"/>
																	
																
															
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
														
														<select name="kat" id="kat" class="chosen-select span12">
															
		<?php
		
		$kat = $koneksi_db->prepare("SELECT id,kat_id kat from ".$namadepan."kategori order by id asc");
		$kat->execute();
		$kat->setFetchMode(PDO::FETCH_ASSOC);
		if ($kat->rowCount() > 0)
		{
		while($rkat = $kat->fetch()) {
		
		?>
		<option value="<?=$rkat['id']?>"><?=$rkat['kat']?></option>
		
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