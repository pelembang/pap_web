<?php
if(!defined("INCLUDE_FILE_INI")) { die ("Access denied"); }

if ($modulubah->rowCount() > 0)
{
$jumdata = $koneksi_db->prepare("SELECT a.sd_selesai, a.wak_awal, a.wak_akhir, a.id,p.nama_id prodi,a.prodi prodiid,a.judul_id, a.isi_id,a.slug_id, a.permalink_id, a.judul_en, a.isi_en, a.slug_en, a.permalink_en, a.folder, a.file, a.hits, sp.nama whoentri, a.whereentri, date_format(a.whenentri,'%d-%b-%Y %H:%i') whenentri, if(a.published=1,'Dipublikasi','Konsep') published FROM ".$namadepan."agenda a left join ".$namadepan."prodi p on p.id = a.prodi left join ".$namadepan."syspemakai sp on sp.id = a.whoentri WHERE a.id = ?");
$jumdata->execute(array($_GET['id']));
$jumdata->setFetchMode(PDO::FETCH_ASSOC);
$editpemakai = $jumdata->fetch();
$id = $editpemakai['id'];
$namaprodi = $editpemakai['prodi'];
$prodiid = $editpemakai['prodiid'];
$judul_id = clean($editpemakai['judul_id']);
$isi_id = ($editpemakai['isi_id']);
$slug_id = clean($editpemakai['slug_id']);
$permalink_id = clean($editpemakai['permalink_id']);
$judul_en = clean($editpemakai['judul_en']);
$isi_en = ($editpemakai['isi_en']);
$slug_en = clean($editpemakai['slug_en']);
$permalink_en = clean($editpemakai['permalink_en']);
$folder = clean($editpemakai['folder']);
$file = clean($editpemakai['file']);

if(!empty($file))
$fotoagenda = '<img src="../userfiles/images/agenda/'.$folder.$file.'" alt="">';
else
$fotoagenda = '';
$hits = clean($editpemakai['hits']);
$whoentri = clean($editpemakai['whoentri']);
$whenentri = clean($editpemakai['whenentri']);
$published = clean($editpemakai['published']);

$tgl_awal = baliktgl($editpemakai['wak_awal']);
$jam_awal = substr($editpemakai['wak_awal'],11,5);

if($editpemakai['sd_selesai'] == 1)
{
$tgl_akhir = "";
$jam_akhir = "";
$disabletgl = "disabled";
$disablejam = "disabled";
$ceksdselesai = "checked";
}
else
{
$tgl_akhir = baliktgl($editpemakai['wak_akhir']);
$jam_akhir = substr($editpemakai['wak_akhir'],11,5);
$disabletgl = "";
$disablejam = "";
$ceksdselesai = "";
}

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

		if($_POST['uploadhidden'] != $_POST['uploadhiddenlamo'])
		{

	$folder = __DIR__."../../../../userfiles/images/agenda/".date("Y")."/".date("m")."/".date("d");
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
	
	rename("tmp/agenda/".$_POST['uploadhidden'], $filebaru);
	
	//echo $filebaru."<br/>".$filethumb1."<br/>".$filethumb2;
	
	thumb(700,500,$filebaru,$filethumb1);
	thumb(1000,600,$filebaru,$filethumb2);
	$folderlamo = date("Y")."/".date("m")."/".date("d")."/";
	$filelamo = $_POST['uploadhidden'];	
}
else
{
	$folderlamo = $folder;
$filelamo = $file;
}
	
	}
	else {
		$folderlamo = "";
	$filelamo = $_POST['uploadhidden'];
	}
	$slug_id = sanitizeFilename($_POST['judul_id']);
	

	$cekpermalink = $koneksi_db->prepare("SELECT slug_id, permalink_id from ".$namadepan."agenda where slug_id = ?");
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
	
	$prodid = $_POST['prodi'];

	$wak_awal = baliktglkeDB($_POST['tgl_awal'])." ".$_POST['jam_awal'];

	if(isset($_POST['sd_selesai']) && $_POST['sd_selesai'] == 1)
	{ 
		$wak_akhir = NULL;	
		$sd_selesai = 1;
	}
	else {
	
	$wak_akhir = baliktglkeDB($_POST['tgl_akhir'])." ".$_POST['jam_akhir'];
	$sd_selesai = 0;
	}

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

		$cekpermalinke = $koneksi_db->prepare("SELECT slug_en, permalink_en from ".$namadepan."agenda where slug_en = ?");
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
	

$editq = $koneksi_db->prepare("UPDATE ".$namadepan."agenda SET wak_awal =?, wak_akhir=?, sd_selesai= ?, prodi=?,judul_id=?, isi_id=?,slug_id=?, permalink_id=?, judul_en=?, isi_en=?, slug_en=?, permalink_en=?, folder=?, file=?, published=? WHERE id = ?");
$editq->execute(array($wak_awal, $wak_akhir, $sd_selesai, $prodid, $judul_id, $isi_id,$slug_id, $permalink_id, $judul_en, $isi_en, $slug_en, $permalink_en, $folderlamo, $filelamo, $published,$id));
if($editq->rowCount() > 0)
{
	$koneksi_db->prepare("UPDATE ".$namadepan."agenda SET whoubah=?, whereubah=?, whenubah=now() WHERE id = ?")->execute(array($whoubah, $whereubah,$id));

$_SESSION['session_berhasil'] = "Agenda berhasil diubah";
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
																
																	
																	<input type="text" name="judul_id" id="judul_id" value="<?=$judul_id?>" class="span12" placeholder="Judul Agenda" data-rule-required="true" data-msg-required="Judul Agenda harus diisi."/>
																	
																
															
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
													
													Informasi Agenda Kampus
												</h3>


												
											</div>

											<div class="box-content form-horizontal">

<div class="control-group">
	<label class="control-label">Kategori</label>
	<div class="controls">
		<label><?=$namaprodi?></label>
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
		
		$prodi = $koneksi_db->prepare("SELECT singkatan,id,nama_id from ".$namadepan."prodi order by id asc");
		$prodi->execute();
		$prodi->setFetchMode(PDO::FETCH_ASSOC);
		if ($prodi->rowCount() > 0)
		{
		while($rprodi = $prodi->fetch()) {
		if($prodiid == $rprodi['id'])
		$selprodi = "selected";
		else
		$selprodi = "";
		?>
		<option value="<?=$rprodi['id']?>" <?=$selprodi?>><?=$rprodi['singkatan']?> - <?=$rprodi['nama_id']?></option>
		
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
													
													Waktu Agenda
												</h3>
												
											</div>
											<div class="box-content">
												
											
												
													
													<div class="controls">
												
															
													<input type="text" name="tgl_awal" id="tgl_awal" class="span4 datepick" value="<?=$tgl_awal?>"> <input type="text" name="jam_awal" id="jam_awal" value="<?=$jam_awal?>" class="span2 timepick">
													
													</div>

													<div class="controls">
												
															
													<label>s.d.</label>
													
													</div>

													<div class="controls">
												
															
													<input type="text" name="tgl_akhir" id="tgl_akhir" class="span4 datepick" value="<?=$tgl_akhir?>" <?=$disabletgl?>> <input type="text" name="jam_akhir" id="jam_akhir" value="<?=$jam_akhir?>" class="span2 timepick" <?=$disablejam?>>
													
													</div>

													<div class="controls">
											<label class="checkbox">
											<input type="checkbox" name="sd_selesai" id="sd_selesai" value="1" class="inline" <?=$ceksdselesai?> /> s.d. selesai
												
											</label>
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
				
				
				<ul id="filelist">

				<li class="berhasil"><?=$fotoagenda?></li>


				</ul>
				
													
													</div>
												
												
											</div>
										</div>




									</div>
								</div>	
							</form>		
										
									
								</div>
							</div>
						</div>
						
<script>
	$(document).ready(function() {
    //set initial state.
    

    $('#sd_selesai').change(function() {
        if(this.checked) {
			
			$('#tgl_akhir').prop("disabled",true);
			$('#jam_akhir').prop("disabled",true);
			$('#tgl_akhir').val("");
			$('#jam_akhir').val("");
        }
		else {
			
			$('#tgl_akhir').prop("disabled",false);
			$('#jam_akhir').prop("disabled",false);
			$('#tgl_akhir').val("<?=$tgl_awal?>");
			$('#jam_akhir').val("<?=date("H:i",strtotime("+1 hour",strtotime($jam_awal) ))?>");
		}
    });
});
</script>

<?php

}
else
header ("Location: ?cpmodul=$namamodul");
?>