<?php
if(!defined("INCLUDE_FILE_INI")) { die ("Access denied"); }

if ($modultambah->rowCount() > 0)
{
if (isset($_POST[submit]))
{
$maxgd = $dbh->prepare("SELECT max(ordering) AS maxgd FROM ".$namadepan."tulisanberjalan");
$maxgd->execute();
$maxgd->setFetchMode(PDO::FETCH_ASSOC);

$rmaxgd = $maxgd->fetch();
$maxgdp = $rmaxgd[maxgd] + 1;

//26/12/2015 s.d. 27/12/2015
$tanggal = explode(" s.d. ", $_POST[tanggal]);
$tglawal = explode("/",$tanggal[0]);
$tglakhir = explode("/",$tanggal[1]);

$thawal = $tglawal[2];
$blawal = $tglawal[1];
$tgawal = $tglawal[0];

$thakhir = $tglakhir[2];
$blakhir = $tglakhir[1];
$tgakhir = $tglakhir[0];
if ($_POST[waktu] == true)
{
$waktuq = "waktu, waktuawal, waktuakhir";
$waktuv = "'y', '$thawal-$blawal-$tgawal', '$thakhir-$blakhir-$tgakhir'";
}
else
{
$waktuq = "waktu";
$waktuv = "'t'";
}


$tmbh = $dbh->prepare("INSERT INTO ".$namadepan."tulisanberjalan (ordering, $waktuq, judul, whoentri, whereentri, whenentri, aktif) VALUES ($maxgdp, $waktuv, '$_POST[judul]', '$_SESSION[sesi_user]', '$ipnyo', now(), '$_POST[aktif]')");
$tmbh->execute();



header ("Location: ?cpmodul=$namamodul");


}
?>
<div class="row-fluid">
						<div class="span12">
							<div class="box">
								<div class="box-title">
									<h3><i class="icon-th-list"></i> Entri <?=$rmodul[lengkap]?></h3>
								</div>
								<div class="box-content nopadding">
								
									<form action="#" method="POST" class='form-horizontal form-bordered form-validate' enctype='multipart/form-data' id="formentri">
										
									
										
										<div class="control-group">
											<label for="judul" class="control-label">Tulisan</label>
											<div class="controls">
												<div class="input-append input-prepend">
													
													<input type="text" name="judul" id="judul" size="83" value="" class="span30" data-rule-required="true" title="Judul Harus diisi."/>
													
												</div>
											
											</div>
										</div>
										
										<div class="control-group">
											<label for="waktu" class="control-label">Waktu Tayang</label>
											<div class="controls">
												<div class="input-append input-prepend">
													
													<input type="checkbox" class='waktu' name='waktu' id="waktu" ></div>
											
											</div>
										</div>
										
										<div class="control-group">
											<label for="tanggal" class="control-label">Tanggal Tayang</label>
											<div class="controls">
												<div class="input-append input-prepend">
													
													<input type="text" name="tanggal" id="tanggal" class="input-large daterangepick" autocomplete="off" value="<?=date("d/m/Y")?> s.d. <?=date("d/m/Y",strtotime("tomorrow"))?>" readonly>
													
												</div>
											
											</div>
										</div>
								
								
										
										
										
										
										<div class="control-group">
											<label for="aktif" class="control-label">Publikasi</label>
											<div class="controls">
												<div class="input-append input-prepend">
													<div class="input-append input-prepend">
													
													<label class='radio'>
												<input type="radio" name="aktif" value="y" checked> Ya
											</label>
											<label class='radio'>
												<input type="radio" name="aktif" value="t"> Tidak
											</label>
											
													
												</div>
													
													
												</div>
											
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
						

<?php

}
else
header ("Location: ?cpmodul=$namamodul");
?>