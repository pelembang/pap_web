<?php
if(!defined("INCLUDE_FILE_INI")) { die ("Access denied"); }


if (isset($_POST[submit]))
{
$koneksi_db->sql_query("INSERT INTO ".$namadepan."video (judul, ytid, ket, whoentri, whereentri, whenentri) VALUES ('$_POST[judul]', '$_POST[ytid]', '".addslashes($_POST[ket])."', '$_SESSION[sesi_user]', '$ipnyo', now())");
header ("Location: ?cpmodul=$namamodul");
}
?>
<div class="row-fluid">
						<div class="span12">
							<div class="box">
								<div class="box-title">
									<h3><i class="icon-th-list"></i> Ubah Password</h3>
								</div>
								<div class="box-content nopadding">
								
									<form action="#" method="POST" class='form-horizontal form-bordered form-validate' enctype='multipart/form-data' id="formentri">
										
									
										
										<div class="control-group">
											<label for="judul" class="control-label">Judul</label>
											<div class="controls">
												<div class="input-append input-prepend">
													
													<input type="text" name="judul" id="judul" size="83" value="" class="span30" data-rule-required="true" title="Judul Harus diisi."/>
													
												</div>
											
											</div>
										</div>
										
										
										<div class="control-group">
											<label for="ytid" class="control-label">Link Video</label>
											<div class="controls">
												
													
													<span class="help-inline">
												https://www.youtube.com/watch?v=
											</span> <input type="text" name="ytid" id="ytid" size="10" value="" class="span4" data-rule-required="true" title="Link Video Harus diisi."/>
											
												
											
											</div>
										</div>
										
									
										
										
										
										
										
										
										
											<div class="form-actions">
											
											<button type="submit" class="btn btn-primary" name="submit" value="<?=_SIMPAN_?>"><?=_SIMPAN_?></button>
											
											<button type="button" class="btn" onclick="window.location.href='index.php?cpmodul=<?=$namamodul?>'">Batal</button>
										</div>
									</form>
									


																					</div>
										
										
										
									
								</div>
							</div>
						</div>
						