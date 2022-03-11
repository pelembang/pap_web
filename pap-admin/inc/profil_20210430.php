<?php
if(!defined("INCLUDE_FILE_INI")) { die ("Access denied"); }
// $jumdata = $koneksi_db->prepare("SELECT p.id, p.nama, p.email, p.jabatan, p.jabatan_pendek,if(s.induk=0,s.nama,concat(s.nama,' ',s2.nama)) subunitkerja FROM ".$namadepan."syspemakai p left join ".$namadepan."subunitkerja s on s.id = p.subunitkerja left join ".$namadepan."subunitkerja s2 on s2.id = s.induk WHERE p.id = '".$_SESSION['sesi_user']."'");
$jumdata = $koneksi_db->prepare("SELECT p.hp,p.id, p.nama, p.email, p.jabatan, if(s.induk=0,s.nama,concat(s.nama,' ',s2.nama)) subunitkerja,s.nama namasubunitkerja, p.kelompok FROM ".$namadepan."syspemakai p left join ".$namadepan."subunitkerja s on s.id = p.subunitkerja left join ".$namadepan."subunitkerja s2 on s2.id = s.induk WHERE p.id = ?");

$jumdata->execute(array($_SESSION['sesi_user']));
$jumdata->setFetchMode(PDO::FETCH_ASSOC);
$editpemakai = $jumdata->fetch();
$id = $editpemakai['id'];
$nama = $editpemakai['nama'];
$email = $editpemakai['email'];
$jabatan = $editpemakai['jabatan'];
$hp = $editpemakai['hp'];
// $jabatan_pendek = $editpemakai['jabatan_pendek'];
$subunitkerja = $editpemakai['subunitkerja'];
$namasubunitkerja = $editpemakai['namasubunitkerja'];
$kelompok = $editpemakai['kelompok'];



?>
<div class="row-fluid">
						<div class="span12">
							<div class="box">
							<?php
							
							if (isset($_GET['berhasil']))
							{
						?>
						<div class="alert alert-success">
											<button type="button" class="close" data-dismiss="alert"></button>
											Data berhasil diubah.
										</div>
						<?php
						
							}
							?>
								<div class="box-title">
									<h3><i class="glyphicon-user"></i> Profil Pengguna</h3>
								</div>
								<div class="box-content nopadding">
								
									<form action="#" method="POST" class='form-horizontal form-bordered form-validate' enctype='multipart/form-data' id="formentri">
										
									

											<div class="alert alert-info">
											
											Untuk mengubah data profil silahkan menghubungi admin/super admin.
										</div>
										
										
										
										<div class="control-group">
											<label for="nama" class="control-label">Nama</label>
											<div class="controls">
												
													
													<?=$nama?>
													
												
											
											</div>
										</div>

										<div class="control-group">
											<label for="email" class="control-label">Email</label>
											<div class="controls">
												
													
													<?=$email?>
													
												
											
											</div>
										</div>

										<!-- <div class="control-group">
											<label for="jabatan_pendek" class="control-label">Jabatan Pendek</label>
											<div class="controls">
												
													
													<input type="text" name="jabatan_pendek" id="jabatan_pendek" value="<?=$jabatan_pendek?>" class="span12" data-rule-required="true" title="Jabatan Pendek Harus diisi."/>
													
												
											
											</div>
										</div> -->


										<div class="control-group">
											<label for="hp" class="control-label">Nomor HP</label>
											<div class="controls">
												
													
													<?=$hp?>
													
												
											
											</div>
										</div>

										<div class="control-group">
											<label for="jabatan" class="control-label">Jabatan</label>
											<div class="controls">
												
													
													<?=$jabatan?>
													
												
											
											</div>
										</div>

<?php
if(file_exists(pathasset."/qrcode/pengguna/".$id.".png"))
{
	?>
										<div class="control-group">
											<label for="qrcode" class="control-label">QR Code Tanda Tangan</label>
											<div class="controls">
												
													
													<img src="<?="qrcode/".$id.".png"?>" width="150"/>
													
												
											
											</div>
										</div>


<?php
}
?>


										
										
										

										



											
										
										

										
										
										
									
										
										
										
										
										
										
										
											
									</form>
									


																					</div>

																				
										
										
									
								</div>
							</div>
						</div>
