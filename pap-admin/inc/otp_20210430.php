<?php
if(!defined("INCLUDE_FILE_INI")) { die ("Access denied"); }
$jumdata = $koneksi_db->prepare("SELECT p.id, p.email, p.authapp, p.hp FROM ".$namadepan."syspemakai p WHERE p.id = ?");
$jumdata->execute(array($_SESSION['sesi_user']));
$jumdata->setFetchMode(PDO::FETCH_ASSOC);
$editpemakai = $jumdata->fetch();
$id = $editpemakai['id'];
$email = $editpemakai['email'];
$hp = $editpemakai['hp'];
$authapp = $editpemakai['authapp'];


if(is_null($authapp))
$tblaktif2fa = '<span class="btn btn-danger" data-toggle="modal">Belum Aktif</span>';
else if($authapp == 1)
$tblaktif2fa = '<a role="button" class="btn btn-success" id="tblaktif2fa">Aktif</a>';
else if($authapp == 0)
$tblaktif2fa = '<a href="#create2fa" role="button" class="btn btn-danger" data-toggle="modal" id="tblaktif2fa">Non-Aktif</a>';


?>
<div class="row-fluid">
						<div class="span12">
							<div class="box">

								
								<div class="box-title">
									<h3><i class="icon-lock"></i> OTP / Two-Factor Authentication</h3>
								</div>
								<div class="box-content nopadding">
								
									<form action="#" method="POST" class='form-horizontal form-bordered form-validate' enctype='multipart/form-data' id="formentri">
										
									

								<div class="alert alert-info">
											
											Untuk mengaktifkan Email/HP/Authencator App silahkan menghubungi admin/super admin.
										</div>
									
										
										<div class="control-group">
											<label for="email" class="control-label">Email</label>
											<div class="controls">
												
													
													<?=$email?>
													
												
											
											</div>
										</div>

										<div class="control-group">
											<label for="hp" class="control-label">HP</label>
											<div class="controls">
												
													
													<?=$hp?>
													
												
											
											</div>
										</div>
										
										




											
										
										<div class="control-group">
											<label for="auth" class="control-label">Authenticator App</label>
											<div class="controls">
												<div class="input-append input-prepend">
													
													<?=$tblaktif2fa?>
													
												</div>
											
											</div>
										</div>

										
										
									
										
										
										
										
										
										
										
											<div class="form-actions">
											
											
										</div>
									</form>
									


																					</div>

																				
										
										
									
								</div>
							</div>
						</div>





		

<?php
if($authapp == 0)
{
?>

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
						

						<?php
}
						?>