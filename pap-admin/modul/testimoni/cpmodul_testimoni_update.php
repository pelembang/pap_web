<?php
if(!defined("INCLUDE_FILE_INI")) { die ("Access denied"); }

if ($modulubah->rowCount() > 0)
{
$jumdata = $koneksi_db->prepare("SELECT t.id, t.nama,t.alumni,t.kerja,t.prodi prodiid, p.nama_id prodi,t.testimoni_id,t.testimoni_en,t.urut,t.publish FROM ".$namadepan."testimonial t left join ".$namadepan."prodi p on p.id = t.prodi WHERE t.id = ?");
$jumdata->execute(array($_GET['id']));
$jumdata->setFetchMode(PDO::FETCH_ASSOC);
$editpemakai = $jumdata->fetch();
$id = $editpemakai['id'];
$prodi = clean($editpemakai['prodi']);
$prodiid = $editpemakai['prodiid'];
$nama = $editpemakai['nama'];
$testimoni_id = clean($editpemakai['testimoni_id']);
$testimoni_en = clean($editpemakai['testimoni_en']);

$kerja = clean($editpemakai['kerja']);
$alumni = $editpemakai['alumni'];
$published = clean($editpemakai['publish']);

$urut = $editpemakai['urut'];

if(file_exists('../userfiles/images/testimoni/'.$id.'.jpg'))
$fototestimoni = '<img src="../userfiles/images/testimoni/'.$id.'.jpg" alt="">';
else
$fototestimoni = '';

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

	
	
	

	
	
	$prodi = $_POST['prodi'];
	$nama = $_POST['nama'];
	$testimoni_id = $_POST['testimoni_id'];
	
	if($_POST['testimoni_en'] == '')
	{
	$testimoni_en = $testimoni_id;
		}
	else {

		$testimoni_en = $_POST['testimoni_en'];
		
	}


		
	
		
	$alumni = $_POST['alumni'];
	$prodi = $_POST['prodi'];
	if($_POST['submit'] == '1')
	$published = 1;
	else
	$published = 0;
	$urut = $_POST['urut'];
	$kerja = $_POST['kerja'];
	

	$editq = $koneksi_db->prepare("UPDATE ".$namadepan."testimonial SET nama=?,testimoni_id=?, testimoni_en=?,urut=?,alumni=?,kerja=?, prodi=?, publish=?  WHERE id = ?");
	$editq->execute(array($nama, $testimoni_id, $testimoni_en,$urut, $alumni,$kerja,$prodi,$published,$id));
	
			
			
		
		
			if(!empty($_POST['uploadhidden']))
			{
				if($_POST['uploadhidden'] != $_POST['uploadhiddenlamo'])
				{
			$folder = __DIR__."../../../../userfiles/images/testimoni/";
			
			$filebaru = $folder."/".$id.".jpg";
		
			
			rename("tmp/testimoni/".$_POST['uploadhidden'], $filebaru);
			
				}
			
			}
			
			
			
			if($editq->rowCount() > 0 || $_POST['uploadhidden'] != $_POST['uploadhiddenlamo'] )
	{
		
	
	$_SESSION['session_berhasil'] = "Testimonial berhasil diubah";
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

											<div class="tab-content padding  tab-content-bottom">
												<div class="control-group">
										
										<div class="controls">
											<input type="text" name="nama" id="nama" class="span12" placeholder="Nama Alumni" value="<?=$nama?>" data-rule-required="true" data-msg-required="Nama Alumni harus diisi." />
											
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
																
																	
																	<textarea name="testimoni_id" id="testimoni_id" rows="50" class="span12 ckeditor"><?=$testimoni_id?></textarea>
																	
																
															
															</div>
														</div>


				
													
													</div>
													<div class="tab-pane" id="bhs_en">
														<div class="control-group">
															
															<div class="controls">
																
																	
															<textarea name="testimoni_en" id="testimoni_en" rows="50" class="span12 ckeditor"><?=$testimoni_en?></textarea>
																	
																
															
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
		
		$prd = $koneksi_db->prepare("SELECT singkatan,id,nama_id from ".$namadepan."prodi order by id asc");
		$prd->execute();
		$prd->setFetchMode(PDO::FETCH_ASSOC);
		if ($prd->rowCount() > 0)
		{
		while($rprodi = $prd->fetch()) {
			if($rprodi['id'] == $prodiid)
			$cekprd = "selected";
			else
			$cekprd = "";
		?>
		<option value="<?=$rprodi['id']?>" <?=$cekprd?>><?=$rprodi['singkatan']?> - <?=$rprodi['nama_id']?></option>
		
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
															
															<input type="text" name="kerja" id="kerja" class="span12" value="<?=$kerja?>" />
															
																
																
															
														
														</div>
													
													
												</div>

												<div class="control-group">
												
											
												<label for="alumni" class="control-label"><strong>Alumni Tahun</strong></label>
														
														<div class="controls">
															
															<input type="text" name="alumni" id="alumni" class="span2" value="<?=$alumni?>"/>
															
																
																
															
														
														</div>
													
													
												</div>

												<div class="control-group">
												
											
												<label for="urut" class="control-label"><strong>Urutan Testimonial</strong></label>
														
														<div class="controls">
															
														<input type="text" name="urut" value="<?=$urut?>" id="urut" class="span2" />
															
																
																
															
														
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
															
															<a name="uploadfile"><input type="file" name="uploadslideshow" id="upload" style="color:transparent;"><input type="hidden" name="uploadhiddenlamo" id="uploadhiddenlamo" value="<?=$file?>"><input type="hidden" name="uploadhidden" id="uploadhidden" value="<?=$file?>"></a>
															
														</div>
														<div id="status" ></div>
				
				
				<ul id="filelist">

				<li class="berhasil"><?=$fototestimoni?></li>


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

<?php

}
else
header ("Location: ?cpmodul=$namamodul");
?>