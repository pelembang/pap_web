<?php
if(!defined("INCLUDE_FILE_INI")) { die ("Access denied"); }



if (isset($_POST['submit']))
{

$jumdata = $koneksi_db->prepare("SELECT p.kode, p.id FROM ".$namadepan."syspemakai p WHERE p.id = ?");
$jumdata->execute(array($_SESSION['sesi_user']));
$jumdata->setFetchMode(PDO::FETCH_ASSOC);
$editpemakai = $jumdata->fetch();
$id = $editpemakai['id'];
$kode = $editpemakai['kode'];

if(md5($_POST['password']) == $kode)
{

if (!empty($_POST['password1']) AND !empty($_POST['password2']))
{
$password2 = md5($_POST['password2']);
$ubahpemakai = $koneksi_db->prepare("UPDATE ".$namadepan."syspemakai SET kode = '$password2', whoubah = '".$_SESSION['sesi_user']."' , whereubah = '$ipnyo', whenubah = now() WHERE id = '".$_SESSION['sesi_user']."'");
$ubahpemakai->execute();
}
header ("Location: ?password&berhasil");
}
else
{
header ("Location: ?password&passalah");	
}



}
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
											Password berhasil diubah.
										</div>
						<?php
						
							}
							else if (isset($_GET['passalah']))
							{
						?>
						<div class="alert alert-danger">
											<button type="button" class="close" data-dismiss="alert"></button>
											Password lama salah, silahkan dicoba lagi.
										</div>
						<?php
						
							}
							?>
								<div class="box-title">
									<h3><i class="icon-key"></i> Password Pengguna</h3>
								</div>
								<div class="box-content nopadding">
								
									<form action="#" method="POST" class='form-horizontal form-bordered form-validate' enctype='multipart/form-data' id="formentri">
										
									

									
										
										
										<div class="control-group">
											<label for="password" class="control-label">Password Lama</label>
											<div class="controls">
												
													
													<input type="password" name="password" id="password" value="" class="span12" />
													
												
											</div>
										</div>
										

										
										
										<div class="control-group">
											<label for="password1" class="control-label">Password Baru</label>
											<div class="controls">
												
													
													<input type="password" name="password1" id="password1" value="" class="span12" />
													
												
											</div>
										</div>

										<div class="control-group">
											<label for="password2" class="control-label">Password Baru Lagi</label>
											<div class="controls">
												
													
													<input type="password" name="password2" id="password2" value="" class="span12" data-rule-equalTo="#password1" title="Password tidak dengan diatas, coba lagi."/>
													
											
											</div>
										</div>



											
										
										
									
										
										
										
										
										
										
										
											<div class="form-actions">
											
											<button type="submit" class="btn btn-primary" name="submit" value="<?=_UBAH_?>"><?=_UBAH_?></button>
											
											
										</div>
									</form>
									


																					</div>

																				
										
										
									
								</div>
							</div>
						</div>

						