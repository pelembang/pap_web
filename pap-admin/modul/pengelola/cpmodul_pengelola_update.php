<?php
if(!defined("INCLUDE_FILE_INI")) { die ("Access denied"); }

if ($modulubah->rowCount() > 0)
{
$jumdata = $koneksi_db->prepare("SELECT id,nama, jabatan_en, jabatan_id, urut FROM ".$namadepan."pengelola WHERE id = ?");
$jumdata->execute(array($_GET['id']));
$jumdata->setFetchMode(PDO::FETCH_ASSOC);
$editpemakai = $jumdata->fetch();
$id = $editpemakai['id'];
$nama = clean($editpemakai['nama']);
$jabatan_id = clean($editpemakai['jabatan_id']);
$jabatan_en = clean($editpemakai['jabatan_en']);
$urut = $editpemakai['urut'];

if(file_exists('../userfiles/images/pengelola/'.$id.'.jpg'))
$fotopengelola = '<img src="../userfiles/images/pengelola/'.$id.'.jpg" alt="">';
else
$fotopengelola = '';

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


	$jabatan_id = $_POST['jabatan_id'];
	$nama = $_POST['nama'];
	
		if($_POST['jabatan_en'] == '')
		{
		$jabatan_en = $jabatan_id;
		
		}
		else {
	
			$jabatan_en = $_POST['jabatan_en'];
			
		}
		
		
	
	



		$editq = $koneksi_db->prepare("UPDATE ".$namadepan."pengelola SET nama=?,jabatan_id=?, jabatan_en=?,urut=? WHERE id = ?");
$editq->execute(array($nama, $jabatan_id, $jabatan_en,$urut,$id));

		
		
	
	
		if(!empty($_POST['uploadhidden']))
		{
			if($_POST['uploadhidden'] != $_POST['uploadhiddenlamo'])
			{
		$folder = __DIR__."../../../../userfiles/images/pengelola/";
		
		$filebaru = $folder."/".$id.".jpg";
	
		
		rename("tmp/pengelola/".$_POST['uploadhidden'], $filebaru);
		
			}
		
		}
		
		
		
		if($editq->rowCount() > 0 || $_POST['uploadhidden'] != $_POST['uploadhiddenlamo'] )
{
	

$_SESSION['session_berhasil'] = "Pengelola berhasil diubah";
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
											<input type="text" name="nama" id="nama" class="span12" placeholder="Nama Pengelola" value="<?=$nama?>" />
											
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
																
																	
																	<input type="text" name="jabatan_id" id="jabatan_id" value="<?=$jabatan_id?>" class="span12" placeholder="Jabatan Pengelola" data-rule-required="true" data-msg-required="Jabatan Pengelola harus diisi."/>
																	
																
															
															</div>
														</div>

														


				
													
													</div>
													<div class="tab-pane" id="bhs_en">
														<div class="control-group">
															
															<div class="controls">
																
																	
																	<input type="text" name="jabatan_en" id="jabatan_en" value="<?=$jabatan_en?>" class="span12" placeholder="Management Position"/>
																	
																
															
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
													
													Urutan Pengelola 
												</h3>
												
											</div>
											<div class="box-content">
												
											
												
													
													<div class="controls">
														
														<input type="text" name="urut" value="<?=$urut?>" id="urut" class="span6" />
															
															
														
													
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

				<li class="berhasil"><?=$fotopengelola?></li>


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