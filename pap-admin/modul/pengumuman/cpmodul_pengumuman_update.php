<?php
if(!defined("INCLUDE_FILE_INI")) { die ("Access denied"); }

if ($modulubah->rowCount() > 0)
{
$jumdata = $koneksi_db->prepare("SELECT pb.id,pd.nama_id prodi ,pd.singkatan,pb.prodi prodiid,pb.judul_id, pb.isi_id,pb.slug_id, pb.permalink_id, pb.judul_en, pb.isi_en, pb.slug_en, pb.permalink_en, pb.hits, p.nama whoentri, pb.whereentri, date_format(pb.whenentri,'%d-%b-%Y %H:%i') whenentri, if(pb.published=1,'Dipublikasi','Konsep') published FROM ".$namadepan."pengumuman pb left join ".$namadepan."prodi pd on pd.id = pb.prodi left join ".$namadepan."syspemakai p on p.id = pb.whoentri WHERE pb.id = ?");
$jumdata->execute(array($_GET['id']));
$jumdata->setFetchMode(PDO::FETCH_ASSOC);
$editpemakai = $jumdata->fetch();
$id = $editpemakai['id'];
$prodid = clean($editpemakai['prodi']);
$prodiid = $editpemakai['prodiid'];
$singkatan = $editpemakai['singkatan'];
$judul_id = clean($editpemakai['judul_id']);
$isi_id = ($editpemakai['isi_id']);
$slug_id = clean($editpemakai['slug_id']);
$permalink_id = clean($editpemakai['permalink_id']);
$judul_en = clean($editpemakai['judul_en']);
$isi_en = ($editpemakai['isi_en']);
$slug_en = clean($editpemakai['slug_en']);
$permalink_en = clean($editpemakai['permalink_en']);



$hits = clean($editpemakai['hits']);
$whoentri = clean($editpemakai['whoentri']);
$whenentri = clean($editpemakai['whenentri']);
$published = clean($editpemakai['published']);

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

	if(!empty($_POST['flupload']))
	{
		$flupload = $_POST['flupload'];
		$fluploadtype = $_POST['fluploadtype'];

		$folder = __DIR__."../../../../userfiles/images/pengumuman/".date("Y")."/".date("m")."/".date("d");

		if(!is_dir($folder) && !file_exists($folder)) 
	{
	mkdir($folder, '755', true);
	}

	$cekurut = $koneksi_db->prepare("SELECT max(urut) urut from ".$namadepan."pengumuman_file where pengumuman = ?");
	$cekurut->execute(array($id));
	$cekurut->setFetchMode(PDO::FETCH_ASSOC);
	$rcekurut  = $cekurut->fetch();
if(is_null($rcekurut))
		$urut = 1;
		else
		$urut = $rcekurut['urut']+1;
foreach($flupload as $x => $filear) {


	$filebaru = $folder."/".sanitizeFilename($filear);

		
	$folderx = date("Y")."/".date("m")."/".date("d")."/";
	$filex = $filear;
	
	 
	$koneksi_db->prepare("INSERT INTO ".$namadepan."pengumuman_file (pengumuman, urut,folder, file, tipefile) VALUES (?, ?,?, ?, ?)")->execute(array($id, $urut, $folderx, $filex, $fluploadtype[$x]));
	rename("tmp/pengumuman/".$filear, $filebaru);
	


	


$urut++;

}
	}
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
	//$permalink_en = $_POST['permalink_en'];

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



	
	$whoubah = $_SESSION['sesi_user'];
	$whereubah = ipnyo();
	if($_POST['submit'] == '1')
	$published = 'y';
	else
	$published = 't';
	

$editq = $koneksi_db->prepare("UPDATE ".$namadepan."pengumuman SET prodi=?,judul_id=?, isi_id=?,slug_id=?, permalink_id=?, judul_en=?, isi_en=?, slug_en=?, permalink_en=?, published=? WHERE id = ?");
$editq->execute(array($prodi, $judul_id, $isi_id,$slug_id, $permalink_id, $judul_en, $isi_en, $slug_en, $permalink_en, $published,$id));
if($editq->rowCount() > 0 || !empty($_POST['flupload']))
{
	$koneksi_db->prepare("UPDATE ".$namadepan."pengumuman SET whoubah=?, whereubah=?, whenubah=now() WHERE id = ?")->execute(array($whoubah, $whereubah,$id));

$_SESSION['session_berhasil'] = "Pengumuman berhasil diubah";
header ("Location: ?cpmodul=$namamodul&aksi=ubah&id=$id");
}
else {
	
	header ("Location: ?cpmodul=$namamodul&aksi=ubah&id=$id");	
}

}
?>

							<div class="box">
							
							
							
								
								<div class="box-title">
									<h3><i class="icon-th-list"></i> Ubah <?=$rmodul['lengkap']?></h3>
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
																
																	
																	<input type="text" name="judul_id" id="judul_id" value="<?=$judul_id?>" class="span12" placeholder="Judul Pengumuman" data-rule-required="true" data-msg-required="Judul Pengumuman harus diisi."/>
																	
																
															
															</div>
														</div>

														<div class="control-group">
															
															<div class="controls">
																
																	
																	<textarea name="isi_id" id="isi_id" rows="50" class="span12 ckeditor"><?=$isi_id?></textarea>
																	
																
															
															</div>
														</div>


				
													
													</div>
													<div class="tab-pane" id="bhs_en">
														<div class="control-group">
															
															<div class="controls">
																
																	
																	<input type="text" name="judul_en" id="judul_en" value="<?=$judul_en?>" class="span12" placeholder="News Title"/>
																	
																
															
															</div>
														</div>

														<div class="control-group">
															
															<div class="controls">
																
																	
																	<textarea name="isi_en" id="isi_en" rows="50" class="span12 ckeditor"><?=$isi_en?></textarea>
																	
																
															
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
													
													Informasi Pengumuman
												</h3>
												
											</div>
											
											<div class="box-content form-horizontal">

											<div class="control-group">
												<label class="control-label">Kategori</label>
												<div class="controls">
													<label><?=$singkatan?> - <?=$prodid?></label>
												</div>

											</div>

											<div class="control-group">
												<label class="control-label">Waktu</label>
												<div class="controls">
													<label><?=$whenentri?></label>
												</div>

											</div>

											<div class="control-group">
												<label class="control-label">Pengirim</label>
												<div class="controls">
													<label><?=$whoentri?></label>
												</div>

											</div>

											<div class="control-group">
												<label class="control-label">Status</label>
												<div class="controls">
													<label><?=$published?></label>
												</div>

											</div>
												
											
													<button type="submit" class="btn btn-primary" name="submit" value="0">Simpan</button> 
													<button type="submit" class="btn btn-green" name="submit" value="1">Publikasi</button>
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
													
													Kategori
												</h3>
												
											</div>
											<div class="box-content">
												
											
												
													
													<div class="controls">
														
														<select name="prodi" id="prodi" class="chosen-select span12">
															
														<option value="0">PAP - Politeknik Akamigas Palembang</option>
		<?php
		
		$prd = $koneksi_db->prepare("SELECT id,nama_id,singkatan from ".$namadepan."prodi order by id asc");
		$prd->execute();
		$prd->setFetchMode(PDO::FETCH_ASSOC);
		if ($prd->rowCount() > 0)
		{
		while($rprd = $prd->fetch()) {
		if($rprd['id'] == $prodiid)
		$cekprd = "selected";
		else
		$cekprd = "";
		?>
		<option value="<?=$rprd['id']?>" <?=$cekprd?>><?=$rprd['singkatan']?> - <?=$rprd['nama_id']?></option>
		
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
															
															<a name="uploadfile"><input type="file" name="uploadslideshow" id="upload" style="color:transparent;"><input type="hidden" name="uploadhiddenlamo" id="uploadhiddenlamo" value="<?=$file?>"><input type="hidden" name="uploadhidden" id="uploadhidden" value="<?=$file?>"></a>
															
														</div>
														<div id="status" ></div>
				
				
				<table id="filelist">
					<?php
					
				$filelist = $koneksi_db->prepare("SELECT id,folder,file,tipefile from ".$namadepan."pengumuman_file where pengumuman = ? order by urut asc");
				$filelist->execute(array($id));
				$filelist->setFetchMode(PDO::FETCH_ASSOC);
		if ($filelist->rowCount() > 0)
		{
		while($rfilelist = $filelist->fetch()) {
?>
				<tr filename="<?=$rfilelist['file']?>" id="file_<?=$rfilelist['id']?>">
					<td valign="top"><img border="0" src="./img/plugins/ajaxupload/circle.png"> </td>
					<td valign="top"><a href="../userfiles/images/pengumuman/<?=$rfilelist['folder']?>/<?=$rfilelist['file']?>" target="_blank"><?=$rfilelist['file']?></a><input type="hidden" name="fluploadlamo[]" value=""><input type="hidden" name="fluploadtypelamo[]" value=""></td>
					<td valign="top"> <a href="#uploafile" id="<?=$rfilelist['id']?>" class="deleteimagelamo">&nbsp;&nbsp;&nbsp;<img border="0" src="./img/plugins/ajaxupload/trash.png"></a></td>
				
				</tr>
<?php
		}
	}
?>

</table>
				
													
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