<?php
if(!defined("INCLUDE_FILE_INI")) { die ("Access denied"); }
$jumdata = $koneksi_db->prepare("SELECT p.id, p.nama, p.email, p.authapp,p.tg, p.jabatan, p.jabatan_pendek,if(s.induk=0,s.nama,concat(s.nama,' ',s2.nama)) subunitkerja FROM ".$namadepan."syspemakai p left join ".$namadepan."subunitkerja s on s.id = p.subunitkerja left join ".$namadepan."subunitkerja s2 on s2.id = s.induk WHERE p.id = ?");
$jumdata->execute(array($_SESSION['sesi_user']));
$jumdata->setFetchMode(PDO::FETCH_ASSOC);
$editpemakai = $jumdata->fetch();
$id = $editpemakai['id'];
$nama = $editpemakai['nama'];
$email = $editpemakai['email'];
$authapp = $editpemakai['authapp'];
$tg = $editpemakai['tg'];
$jabatan = $editpemakai['jabatan'];
$jabatan_pendek = $editpemakai['jabatan_pendek'];
$subunitkerja = $editpemakai['subunitkerja'];

if($authapp == 1)
$tblaktif2fa = '<a role="button" class="btn btn-success" id="tblaktif2fa">Aktif</a>';
else
$tblaktif2fa = '<a href="#create2fa" role="button" class="btn btn-danger" data-toggle="modal" id="tblaktif2fa">Non-Aktif</a>';

if($tg == 1)
$tbltg = '<a role="button" class="btn btn-success" id="tbltg">Aktif</a>';
else
$tbltg = '<a href="#createtg" role="button" class="btn btn-danger" data-toggle="modal" id="tbltg">Non-Aktif</a>';


if (isset($_POST['submit']))
{

if($_POST['submit'] == 2)
{

}
else
{
if (!empty($_POST['password1']) AND !empty($_POST['password2']))
{
$password2 = md5($_POST['password2']);
$ubahpemakai = $koneksi_db->prepare("UPDATE ".$namadepan."syspemakai SET kode = '$password2', nama = '".$_POST['nama']."', email = '".$_POST['email']."', hp = '".isset($_POST['hp'])."' , jabatan= '".$_POST['jabatan']."', jabatan_pendek = '".$_POST['jabatan_pendek']."', whoubah = '".$_SESSION['sesi_user']."' , whereubah = '$ipnyo', whenubah = now() WHERE id = '".$_SESSION['sesi_user']."'");
$ubahpemakai->execute();
}
else
{
$ubahpemakai = $koneksi_db->prepare("UPDATE ".$namadepan."syspemakai SET nama = '".$_POST['nama']."', email = '".$_POST['email']."', hp = '".isset($_POST['hp'])."' ,jabatan= '".$_POST['jabatan']."', jabatan_pendek = '".$_POST['jabatan_pendek']."',  whoubah = '".$_SESSION['sesi_user']."' , whereubah = '$ipnyo', whenubah = now() WHERE id = '".$_SESSION['sesi_user']."'");
$ubahpemakai->execute();
}

include "3rdpartyapps/phpqrcode/qrlib.php"; 
  $tempdir = pathtmp."qrcode/"; //Nama folder tempat menyimpan file qrcode
    if (!file_exists($tempdir)) //Buat folder bername temp
    mkdir($tempdir);

    //ambil logo
    $logopath="img/logoqrcode.jpg";

 //isi qrcode jika di scan
 $codeContents = namaperusahaan."\n".$subunitkerja."\n".$nama."\n".$jabatan_pendek; 

 //simpan file qrcode
 QRcode::png($codeContents, $tempdir.$id.".png", QR_ECLEVEL_L, 5,1);


 // ambil file qrcode
 $QR = imagecreatefrompng($tempdir.$id.".png");

 // memulai menggambar logo dalam file qrcode
 $logo = imagecreatefromstring(file_get_contents($logopath));
 
 imagecolortransparent($logo , imagecolorallocatealpha($logo , 0, 0, 0, 127));
 imagealphablending($logo , false);
 imagesavealpha($logo , true);

 $QR_width = imagesx($QR);
 $QR_height = imagesy($QR);

 $logo_width = imagesx($logo);
$logo_height = imagesy($logo);
 
 

 // Scale logo to fit in the QR Code
 $logo_qr_width = $QR_width/2;
 $scale = $logo_width/$logo_qr_width;
 $logo_qr_height = $logo_height/$scale;



 imagecopyresampled($QR, $logo, ($QR_width/2)-($logo_width/4),  ($QR_height/2)-($logo_height/4), 0, 0, ($logo_width/2), ($logo_height/2), $logo_width, $logo_height);

 // Simpan kode QR lagi, dengan logo di atasnya
 imagepng($QR,pathasset.'qrcode/pengguna/'.$id.".png");




header ("Location: ?profil&berhasil");
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
											<button type="button" class="close" data-dismiss="alert">&times;</button>
											Data berhasil diubah.
										</div>
						<?php
						
							}
							?>
								<div class="box-title">
									<h3><i class="icon-gear"></i> Pengaturan Pengguna</h3>
								</div>
								<div class="box-content nopadding">
								
									<form action="#" method="POST" class='form-horizontal form-bordered form-validate' enctype='multipart/form-data' id="formentri">
										
									

										<div class="box-title">
								<h3>
									<i class="glyphicon-user"></i>
									Profil
								</h3>
							</div>
										
										
										
										<div class="control-group">
											<label for="nama" class="control-label">Nama</label>
											<div class="controls">
												
													
													<input type="text" name="nama" id="nama" value="<?=$nama?>" class="span12" data-rule-required="true" title="Nama Harus diisi."/>
													
												
											
											</div>
										</div>

										<div class="control-group">
											<label for="email" class="control-label">Email</label>
											<div class="controls">
												
													
													<input type="text" name="email" id="email" value="<?=$email?>" class="span12" data-rule-required="true" title="Email Harus diisi."/>
													
												
											
											</div>
										</div>

										<div class="control-group">
											<label for="jabatan_pendek" class="control-label">Jabatan Pendek</label>
											<div class="controls">
												
													
													<input type="text" name="jabatan_pendek" id="jabatan_pendek" value="<?=$jabatan_pendek?>" class="span12" data-rule-required="true" title="Jabatan Pendek Harus diisi."/>
													
												
											
											</div>
										</div>

										<div class="control-group">
											<label for="jabatan" class="control-label">Jabatan Panjang</label>
											<div class="controls">
												
													
													<input type="text" name="jabatan" id="jabatan" size="12" value="<?=$jabatan?>" class="span12" data-rule-required="true" title="Jabatan Panjang Harus diisi."/>
													
												
											
											</div>
										</div>

										<div class="box-title">
								<h3>
									<i class="icon-key"></i>
									Password
								</h3>
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



											<div class="box-title">
								<h3>
									<i class="icon-lock"></i>
									Two-Factor Authentication
								</h3>
							</div>
										
										<div class="control-group">
											<label for="auth" class="control-label">Authenticator App</label>
											<div class="controls">
												<div class="input-append input-prepend">
													
													<?=$tblaktif2fa?>
													
												</div>
											
											</div>
										</div>

										<div class="control-group">
											<label for="tg" class="control-label">Telegram</label>
											<div class="controls">
												<div class="input-append input-prepend">
													
													<?=$tbltg?>
													
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

<div id="createtg" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
				<h3 id="myModalLabel">Aktivasi Telegram</h3>
			</div>
			<div class="modal-body">
				
				<div class="textleft text-center" style="padding-bottom: 15px;">
<p class="text-center">Silahkan pasang aplikasi <b>Telegram</b> pada perangkat telepon pintar Anda, lalu pindai kode QR di bawah dengan menggunakan aplikasi pindai kode QR. Lalu buka dengan aplikasi Telegram dan memulai percakapan dengan <b>Digital Sign BSB Telegram</b>.</p>
<p class="text-center"></p>
					<?php
require_once '3rdpartyapps/PHPGangsta/GoogleAuthenticator.php';

// inisilisasi PHPGangsta_GoogleAuthenticator() class
$authenticator = new PHPGangsta_GoogleAuthenticator();

// Mendapatkan secret code 
$secret = $authenticator->createSecret();

$website   = $_SESSION['sesi_user']; // Replace dengan url website anda
$title     = $namaapp; // Title yang akan ditampilkan
$tolerance = $timeout2fa/30; // Memberi waktu lebih sebelum kode expired.

// Generate! Booyah B| wkwkwk
$QRCode    = $authenticator->getQRCodeGoogleUrl($title,$secret,$website);

// Tampilkan QR Code untuk di scan
echo "<img src='" . $QRCode . "' />";

					?>
<h4 class="text-center">
	<b>atau</b>

</h4>

<p class="text-center">Anda dapat melakukan manual dengan mencari di pencarian pada Aplikasi Telegram : <b>Digital Sign BSB Telegram</b> atau <b>DigitalSignBSB_bot</b> lalu klik user bot Telegram tersebut untuk memulai percakapan. Klik tombol <b>Lanjut</b> untuk melanjutkan proses aktivasi.</p>



			</div>
			
		</div>
		<div class="modal-footer">
				<button class="btn" data-dismiss="modal" aria-hidden="true">Batal</button>
				<button class="btn btn-primary" data-dismiss="modal" data-toggle="modal" href="#aktiftg">Lanjut</button>
			</div>
		</div>



		<div id="aktiftg" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
				<h3 id="myModalLabel">Konfirmasi Akun Telegram</h3>
			</div>
			<div class="modal-body">
				
				<div class="textleft text-center" style="padding-bottom: 15px;">
<p class="text-center">Silahkan ketik nama pengguna dan kode <i>request</i>, seperti pada di bawah</p>
					<h4 style="padding-bottom: 15px;" class="text-center" id="h4request"></h4> <input type="hidden" class="reqCopy" id="targetCopy" value=""><div style="position: absolute;right: 22%;margin-top: -45px;"><label style="background: transparent;border: 1px solid #CCC;padding: 2px 8px;" class="btn" id="buttonCopyText" onclick="copyToClipboard()">Copy</label><label style="background: transparent;border: 1px solid #CCC;padding: 2px 8px;" class="btn hidden" id="buttonCopyedText" onclick="copyToClipboard()">Copied</label>
				</div>

<p class="text-center">Lalu akan mendapatkan balasan yaitu kode <i>response</i> dan silahkan masukan kode tersebut.</p>


<p class="text-center"><input type="hidden" name="requestkey" value="<?=$secret?>" id="requestkey" /><input type="text" class="span3" name="responsekey" id="responsekey"/></p>
<p class="text-center">
	<input type="button" value="Mulai Aktivasi" class="btn btn-primary large" id="savetg">

</p>
					



				</div>
			</div>
			
		</div>



						<div id="create2fa" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
				<h3 id="myModalLabel">Scan QR Code</h3>
			</div>
			<div class="modal-body">
				
				<div class="textleft text-center" style="padding-bottom: 15px;">
<p class="text-center">Dapatkan Kode Keamanan dengan Pindai Kode QR di bawah menggunakan aplikasi autentikator.</p>
<p class="text-center"></p>
					<?php
require_once '3rdpartyapps/PHPGangsta/GoogleAuthenticator.php';

// inisilisasi PHPGangsta_GoogleAuthenticator() class
$authenticator = new PHPGangsta_GoogleAuthenticator();

// Mendapatkan secret code 
$secret = $authenticator->createSecret();

$website   = $_SESSION['sesi_user']; // Replace dengan url website anda
$title     = $namaapp; // Title yang akan ditampilkan
$tolerance = $timeout2fa/30; // Memberi waktu lebih sebelum kode expired.

// Generate! Booyah B| wkwkwk
$QRCode    = $authenticator->getQRCodeGoogleUrl($title,$secret,$website);

// Tampilkan QR Code untuk di scan
echo "<img src='" . $QRCode . "' />";

					?>
<h4 class="text-center">
	<b>atau</b>

</h4>

<p class="text-center">Anda juga bisa memasukkan Kunci Rahasia ini secara manual, di aplikasi autentikator.</p>

<h4 style="padding-bottom: 15px;" class="text-center"><?=$secret?></h4><input type="hidden" id="targetCopy" value="<?=$secret?>"><div style="position: absolute;right: 22%;margin-top: -45px;"><label style="background: transparent;border: 1px solid #CCC;padding: 2px 8px;" class="btn" id="buttonCopyText" onclick="copyToClipboard()">Copy</label><label style="background: transparent;border: 1px solid #CCC;padding: 2px 8px;" class="btn hidden" id="buttonCopyedText" onclick="copyToClipboard()">Copied</label>
				</div>
			</div>
			
		</div>
		<div class="modal-footer">
				<button class="btn" data-dismiss="modal" aria-hidden="true">Batal</button>
				<button class="btn btn-primary" data-dismiss="modal" data-toggle="modal" href="#kode2fa">Aktifkan</button>
			</div>
		</div>


		<div id="kode2fa" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
				<h3 id="myModalLabel">Konfirmasi Kode Keamanan</h3>
			</div>
			<div class="modal-body">
				
				<div class="textleft text-center" style="padding-bottom: 15px;">
<p class="text-center">Masukkan kode keamanan yang Anda dapatkan setelah pindai Kode QR / memasukkan kode rahasia, dari autentikator.</p>
<p class="text-center"><input type="hidden" name="secretkey" value="<?=$secret?>" id="secretkey" /><input type="text" class="span3" name="verifykey" id="verifykey"/></p>
<p class="text-center">
	<input type="button" value="Mulai Aktivasi" class="btn btn-primary large" id="save2fa">

</p>
					



				</div>
			</div>
			
		</div>
		
		</div>


		<script type="text/javascript">

			$( "#aktiftg" ).on('shown', function(){
    $.post("?ajax=profil&aksi=ajaxaktivtg", {request:1}).done(function(msg){ 
    	
    		
    		$('#h4request').text(msg);
    		$('.reqCopy').val(msg);
    		// $('#tblaktif2fa').attr('class','btn btn-success');
    		// $('#tblaktif2fa').text('Aktif');
    		// $('#tblaktif2fa').removeAttr('data-toggle');
    		// $('#tblaktif2fa').removeAttr('href');
    	
    })
});
			
			function copyToClipboard() {
    /* Select the text field */
    var input = $('#targetCopy');
    $('#buttonCopyText').addClass('hidden');
    $('#buttonCopyedText').removeClass('hidden');

    var success   = true,
        range     = document.createRange(),
        selection;

    // For IE.
    if (window.clipboardData) {
        window.clipboardData.setData("Text", input.val());
    } else {
        // Create a temporary element off screen.
        var tmpElem = $('<div>');
        tmpElem.css({
            position: "absolute",
            left:     "-1000px",
            top:      "-1000px",
        });
        // Add the input value to the temp element.
        tmpElem.text(input.val());
        $("body").append(tmpElem);
        // Select temp element.
        range.selectNodeContents(tmpElem.get(0));
        selection = window.getSelection ();
        selection.removeAllRanges ();
        selection.addRange (range);
        // Lets copy.
        try {
            success = document.execCommand ("copy", false, null);
        }
        catch (e) {
            // copyToClipboardFF(input.val());
        }
        if (success) {
            console.log("The text is on the clipboard, try to paste it!");
            // remove temp element.
            tmpElem.remove();
        }
    }
}

$("#save2fa").click(function(){
  $.post("?ajax=profil&aksi=ajaxaktiv2fa", {secretkey:$("#secretkey").val(),verifykey:$("#verifykey").val()})
    .done(function(msg){ 
    	if(msg==1)
    	{
    		alert('Aktivasi berhasil');
    		$('#kode2fa').modal('toggle');
    		$('#tblaktif2fa').attr('class','btn btn-success');
    		$('#tblaktif2fa').text('Aktif');
    		$('#tblaktif2fa').removeAttr('data-toggle');
    		$('#tblaktif2fa').removeAttr('href');
    	}
    	else
    		alert('Kode yang Anda masukan tidak valid, silahkan coba lagi.');
    })
    .fail(function(xhr, status, error) {
 alert("Error and please try again.")
    });
});
		</script>
						