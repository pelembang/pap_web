<?php
if(!defined("INCLUDE_FILE_INI")) { die ("Access denied"); }

if ($modulubah->rowCount() > 0)
{
$jumdata = $dbh->prepare("SELECT id, waktu, waktuawal, waktuakhir, judul,aktif FROM ".$namadepan."tulisanberjalan WHERE id = $_GET[id]");
$jumdata->execute();
$jumdata->setFetchMode(PDO::FETCH_ASSOC);


if ($jumdata->rowCount() > 0)
{
$rjumdata = $jumdata->fetch();
$id = $rjumdata[id];
$waktu = $rjumdata[waktu];
if ($rjumdata[waktuawal] == "0000-00-00"  or is_null($rjumdata[waktuawal]))
{
	
	$tgawal = date("d");
$blawal = date("m");
$thawal = date("Y");
}
	else
{
$waktuawal = $rjumdata[waktuawal];
$tgawal = substr($waktuawal,8,2);
$blawal = substr($waktuawal,5,2);
$thawal = substr($waktuawal,0,4);
}
if ($rjumdata[waktuakhir] == "0000-00-00"  or is_null($rjumdata[waktuakhir]))
{
	
		$tgakhir = date("d",strtotime("tomorrow"));
$blakhir = date("m",strtotime("tomorrow"));
$thakhir = date("Y",strtotime("tomorrow"));
}
	else
{
$waktuakhir = $rjumdata[waktuakhir];
$tgakhir = substr($waktuakhir,8,2);
$blakhir = substr($waktuakhir,5,2);
$thakhir = substr($waktuakhir,0,4);
}


$judul = $rjumdata[judul];
$aktif = $rjumdata[aktif];
if (isset($_POST[submit]))
{
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
$waktuq = ",waktu = 'y', waktuawal = '$thawal-$blawal-$tgawal', waktuakhir='$thakhir-$blakhir-$tgakhir'";
}
else
{
$waktuq = ",waktu = 't' , waktuawal = '0000-00-00', waktuakhir='0000-00-00'";
}


	$ubahgambardepan = $dbh->prepare("UPDATE ".$namadepan."tulisanberjalan SET judul = '".addslashes($_POST[judul])."', whoubah = '$_SESSION[sesi_user]' , whereubah = '$ipnyo', whenubah = now(), aktif = '$_POST[aktif]' $waktuq WHERE id = '$_POST[id]'");
	$ubahgambardepan->execute();



header ("Location: ?cpmodul=$namamodul");

}
?>
<div class="row-fluid">
						<div class="span12">
							<div class="box">
								<div class="box-title">
									<h3><i class="icon-th-list"></i> Edit <?=$rmodul[lengkap]?></h3>
								</div>
								<div class="box-content nopadding">
								
									<form action="#" method="POST" class='form-horizontal form-bordered form-validate' enctype='multipart/form-data' id="formentri">
										
									
										
										<div class="control-group">
											<label for="judul" class="control-label">Tulisan</label>
											<div class="controls">
												<div class="input-append input-prepend">
													
													<input type="text" name="judul" id="judul" size="83" value="<?=$judul?>" class="span30" data-rule-required="true" title="Judul Harus diisi."/>
													
												</div>
											
											</div>
										</div>
										
										<div class="control-group">
											<label for="waktu" class="control-label">Waktu Tayang</label>
											<div class="controls">
												<div class="input-append input-prepend">
													<?=$cekwaktu=($waktu=='y'?"checked":"")?>
													<input type="checkbox" class='waktu' name='waktu' id="waktu" <?=$cekwaktu?>></div>
											
											</div>
										</div>
										
										<div class="control-group">
											<label for="tanggal" class="control-label">Tanggal Tayang</label>
											<div class="controls">
												<div class="input-append input-prepend">
													
													<input type="text" name="tanggal" id="tanggal" class="input-large daterangepick" autocomplete="off" value="<?=$tgawal."/".$blawal."/".$thawal?> s.d. <?=$tgakhir."/".$blakhir."/".$thakhir?>" readonly>
													
												</div>
											
											</div>
										</div>
								
								
										
										
										
										
										<div class="control-group">
											<label for="aktif" class="control-label">Publikasi</label>
											<div class="controls">
												<div class="input-append input-prepend">
													<div class="input-append input-prepend">
													<?php
													if ($aktif == 'y')
{
$checkedY = 'checked';
$checkedT = '';
}
else
{
$checkedY = '';
$checkedT = 'checked';
}
													?>
													<label class='radio'>
												<input type="radio" name="aktif" value="y" <?=$checkedY?>> Ya
											</label>
											<label class='radio'>
												<input type="radio" name="aktif" value="t" <?=$checkedT?>> Tidak
											</label>
											
													
												</div>
													
													
												</div>
											
											</div>
										</div>
										
										
										
											<div class="form-actions">
											<input type="hidden" name="id" value="<?=$id?>" />
											<button type="submit" class="btn btn-primary" name="submit" value="<?=_SIMPAN_?>"><?=_SIMPAN_?></button>
											
											<button type="button" class="btn" onclick="window.location.href='index.php?cpmodul=<?=$namamodul?>'">Kembali</button>
										</div>
									</form>
									


																					</div>
										
										
										
									
								</div>
							</div>
						</div>

<?php
}
else
{
header ("Location: ?cpmodul=$namamodul");
}
}
else
header ("Location: ?cpmodul=$namamodul");
?>