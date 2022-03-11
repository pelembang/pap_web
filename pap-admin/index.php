<?php
ob_start();
session_set_cookie_params(null,null,null,true,true);
session_name(md5("eoffice_pis"));
session_start();
define("INCLUDE_FILE_INI", TRUE);
header('Content-Type: text/html; charset=UTF-8');

if (isset($_SESSION['sesi_user']))
{
include ("inc/database.php");
include ("inc/fungsi.php");


$ipnyo = ipnyo();
$usercp = $koneksi_db->prepare("SELECT p.`nama`, p.`kelompok`, p.`hp`, p.`email`, p.`id`, k.nama grup, p.whenentri sejak FROM `".$namadepan."syspemakai` p inner join ".$namadepan."syskelompok k on k.id = p.kelompok WHERE p.`id` = ? AND p.`aktif` = ?");
$usercp->execute(array($_SESSION['sesi_user'],'y'));
$usercp->setFetchMode(PDO::FETCH_ASSOC);
$rusercp = $usercp->fetch();





include("kamus/bhs_id.php");

if (isset($_GET['logout']))
{
$koneksi_db->prepare("delete from ".$namadepan."login_aktif where username = ?")->execute(array($_SESSION['sesi_user']));	
$koneksi_db->prepare("update ".$namadepan."log set logout = now() where id = ?")->execute(array($_SESSION['sesi_id']));
session_destroy();
header("Location: ?");
}
else if (isset($_GET['ajax']) && isset($_GET['aksi']))
{
include("modul/".$_GET['ajax']."/cpmodul_".$_GET['ajax']."_ajax_".$_GET['aksi'].".php");
}
else if (isset($_GET['pdf']) && isset($_GET['aksi']) && isset($_GET['id']))
{
include("modul/".$_GET['pdf']."/cpmodul_".$_GET['pdf']."_pdf_".$_GET['aksi'].".php");
}
else if (isset($_GET['lastactive']))
{
	$koneksi_db->prepare("update ".$namadepan."login_aktif set last_active=now() where username = ?;")->execute(array($_SESSION['sesi_user']));
}
else if (isset($_GET['tmp']))
{
header("Content-type:application/pdf");
header("Content-Disposition: inline; filename=".$_GET['tmp']);
readfile(pathtmp.$_GET['tmp']);
}
else if (isset($_GET['qrcode']))
{
header("Content-type:image/png");
header("Content-Disposition: inline; filename=".$_GET['qrcode']);
readfile(pathasset."/qrcode/pengguna/".$_GET['qrcode']);
}
else if (isset($_GET['assets']))
{
header("Content-type:application/pdf");
header("Content-Disposition: inline; filename=".$_GET['assets']);
readfile(pathasset.$_GET['assets']);
}
else if (isset($_GET['download']))
{
header("Content-type:application/pdf");
header("Content-Disposition: attachment; filename=".$_GET['download']);
readfile(pathasset.$_GET['download']);
}
else
{
?>
<!doctype html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<!-- Apple devices fullscreen -->
	<meta name="apple-mobile-web-app-capable" content="yes" />
	<!-- Apple devices fullscreen -->
	<meta names="apple-mobile-web-app-status-bar-style" content="black-translucent" />
	
	<title><?=$namaapp?></title>

	<!-- Bootstrap -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!-- Bootstrap responsive -->
	<link rel="stylesheet" href="css/bootstrap-responsive.min.css">
	<!-- jQuery UI -->
	<link rel="stylesheet" href="css/plugins/jquery-ui/smoothness/jquery-ui.css">
	<link rel="stylesheet" href="css/plugins/jquery-ui/smoothness/jquery.ui.theme.css">
	<!-- Theme CSS -->
	<link rel="stylesheet" href="css/style.css">
	<!-- Color CSS -->
	<link rel="stylesheet" href="css/themes.css">
	<!-- Datepicker -->
	<link rel="stylesheet" href="css/plugins/datepicker/datepicker.css">
	<!-- dataTables -->
	<link rel="stylesheet" href="css/plugins/datatable/TableTools.css">
	<!-- Tagsinput -->
	<link rel="stylesheet" href="css/plugins/tagsinput/jquery.tagsinput.css">
	<!-- chosen -->
	<link rel="stylesheet" href="css/plugins/chosen/chosen.css">
	<!-- timepicker -->
	<link rel="stylesheet" href="css/plugins/timepicker/bootstrap-timepicker.min.css">
	<!-- Datepicker -->
	<link rel="stylesheet" href="css/plugins/daterangepicker/daterangepicker.css">
	<!-- select2 -->
	<link rel="stylesheet" href="css/plugins/select2/select2.css">

	<!-- jQuery -->
	<script src="js/jquery.min.js"></script>
	<!-- Mobile nav swipe -->
	<script src="js/plugins/touchwipe/touchwipe.min.js"></script>
	<!-- Nice Scroll -->
	<script src="js/plugins/nicescroll/jquery.nicescroll.min.js"></script>
	<!-- imagesLoaded -->
	<script src="js/plugins/imagesLoaded/jquery.imagesloaded.min.js"></script>
	<!-- jQuery UI -->
	<script src="js/plugins/jquery-ui/jquery.ui.core.min.js"></script>
	<script src="js/plugins/jquery-ui/jquery.ui.widget.min.js"></script>
	<script src="js/plugins/jquery-ui/jquery.ui.mouse.min.js"></script>
	<script src="js/plugins/jquery-ui/jquery.ui.resizable.min.js"></script>
	<script src="js/plugins/jquery-ui/jquery.ui.sortable.min.js"></script>
	<!-- slimScroll -->
	<script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
	<!-- Bootstrap -->
	<script src="js/bootstrap.min.js"></script>
	<!-- Bootbox -->
	<script src="js/plugins/bootbox/jquery.bootbox.js"></script>
	<!-- Bootbox -->
	<script src="js/plugins/form/jquery.form.min.js"></script>
	<!-- Masked inputs -->
	<script src="js/plugins/maskedinput/jquery.maskedinput.min.js"></script>
	<!-- dataTables -->
	<script src="js/plugins/datatable/jquery.dataTables.min.js"></script>
	<script src="js/plugins/datatable/TableTools.min.js"></script>
	<script src="js/plugins/datatable/ColReorderWithResize.js"></script>
	<script src="js/plugins/datatable/ColVis.min.js"></script>
	<script src="js/plugins/datatable/jquery.dataTables.columnFilter.js"></script>
	<script src="js/plugins/datatable/jquery.dataTables.grouping.js"></script>
	<!-- Chosen -->
	<script src="js/plugins/chosen/chosen.jquery.min.js"></script>
	<!-- Validation -->
	<script src="js/plugins/validation/jquery.validate.min.js"></script>
	<script src="js/plugins/validation/additional-methods.min.js"></script>
	<!-- TagsInput -->
	<script src="js/plugins/tagsinput/jquery.tagsinput.min.js"></script>
	<!-- Datepicker -->
	<script src="js/plugins/datepicker/bootstrap-datepicker.js"></script>
	<!-- Timepicker -->
	<script src="js/plugins/timepicker/bootstrap-timepicker.min.js"></script>
	<!-- CKEditor -->
	<script src="js/plugins/ckeditor/ckeditor.js"></script>
	<!-- Daterangepicker -->
	<script src="js/plugins/daterangepicker/moment.min.js"></script>
	<script src="js/plugins/daterangepicker/daterangepicker.js"></script>
	
	<!-- select2 -->
	<script src="js/plugins/select2/select2.min.js"></script>
	
	<!-- Ajaxupload -->
	<script src="js/plugins/ajaxupload/ajaxupload.3.5.js"></script>
	<!-- Google Maps -->
	<script src="https://maps.google.com/maps/api/js?sensor=false&.js&key=AIzaSyCjkssBA3hMeFtClgslO2clWFR6bRraGz0" type="text/javascript"></script>

	<!-- Theme framework -->
	<script src="js/eakroko.min.js"></script>
	<!-- Theme scripts -->
	<script src="js/application.min.js"></script>
	<!-- Just for demonstration -->
	<script src="js/demonstration.min.js"></script>
	<!-- Input Mask Date -->
	<script src="js/plugins/inputmask/jquery.inputmask.js"></script>
	<script src="js/plugins/inputmask/jquery.inputmask.date.extensions.js"></script>
	<script src="js/lastactive.js"></script>
	


	<!--[if lte IE 9]>
		<script src="js/plugins/placeholder/jquery.placeholder.min.js"></script>
		<script>
			$(document).ready(function() {
				$('input, textarea').placeholder();
			});
		</script>
	<![endif]-->
	
	
	
	<!-- Favicon -->
	<link rel="shortcut icon" href="favicon.ico" />
	<!-- Apple devices Homescreen icon -->
	<link rel="apple-touch-icon-precomposed" href="img/apple-touch-icon-precomposed.png" />
	
	
	

</head>

<body class='theme-orange' data-mobile-sidebar="button" onload="countdown()" onmousemove="timer=start" onclick="timer=start" onkeyup="timer=start" onblur="timer=start" onchange="timer=start">





	<div id="navigation">
		<div class="container-fluid">
			<a href="#" class="mobile-sidebar-toggle"><i class="icon-reorder"></i></a>
			<a href="?" id="brand"><b><?=$namaapp?></b></a>
			
			
			<div class="user">
				
				<div class="dropdown">

					
					<a href="#" class='dropdown-toggle' data-toggle="dropdown"><?=$rusercp['nama']?> - <?=$rusercp['grup']?> <img src="img/user-avatar.jpg" alt=""></a>
						<ul class="dropdown-menu pull-right">
							<li>
								<a href="?profil"><i class="glyphicon-user"></i> Profil Pengguna</a>
							</li>
							<li>
								<a href="?password"><i class="icon-key"></i> Password</a>
							</li>
							<li>
							 <a href="?otp"><i class="icon-lock"></i> OTP</a>
							</li>
							<li>
							 <a href="#"><i class="icon-bell"></i> Notifikasi</a>
							</li>
							<li>
								<a href="?logout"><i class="icon-signout"></i> Logout</a>
							</li>
						</ul>
				</div>
			</div>
		</div>
		</div>
	
	<?php
	if(isset($_GET['file']) && isset($_GET['cpmodul']) || isset($_GET['popup']) && isset($_GET['cpmodul']))
		$navhidden = "nav-hidden";
		else if(!isset($_GET['cpmodul']) && !isset($_GET['profil']) && !isset($_GET['password']) && !isset($_GET['otp']) && !isset($_GET['notif']))	
		$navhidden = "nav-hidden";
	else
		$navhidden = "";
	?>
	<div class="container-fluid <?=$navhidden?>" id="content">
		<?php
		

		
	//	if(isset($_GET['cpmodul']) || isset($_GET['profil']))	
			
		include "inc/menu.php";
?>


<div id="main" >
<div class="container-fluid">
<?php		
		if(isset($_GET['cpmodul']))
{
if (!file_exists("modul/".$_GET['cpmodul']."/cpmodul.php"))
{
header("Location: ?");
}
else
{
$modul = $koneksi_db->prepare("select lengkap_id lengkap from ".$namadepan."modul where nama = ?");
$modul->execute(array($_GET['cpmodul']));
$modul->setFetchMode(PDO::FETCH_ASSOC);
$rmodul = $modul->fetch();
//echo "<a href=\".\">"._BERANDA_."</a> > ";
?>

				
			
						
							
							
								<?php 
								include ("modul/".$_GET['cpmodul']."/cpmodul.php");
								?>
								
								
							
						
					
		
<?php

}
}
else if (isset($_GET['profil']))
{
include "inc/profil.php";;
}
else if (isset($_GET['password']))
{
include "inc/password.php";;
}
else if (isset($_GET['otp']))
{
include "inc/otp.php";;
}
else if (isset($_GET['notif']))
{
include "inc/notif.php";;
}
else if (isset($_GET['log']))
{
include "modul/log/cpmodul.php";;
}
else
{

include("inc/dashboard.php");

}
		?>
		</div>
		</div>
		
		
		
		
		
			
		
		
		</div>
		
		<script type='text/javascript'>//<![CDATA[
		
		$(document).on('click', '.popupimage', function(){
  
   $('.imagepreview').attr('src', $(this).find('img').attr('src'));
   $('.popupimage').css('overflow','hidden');
 
    $('#imagemodal').modal('show');
	
    
   
 
 });


//]]> 

function addPilihan(){
var date = new Date();
var pilihantime = date.getTime();
var no = $('.section_pilihan').length+1;
var data = '<div class="section_pilihan" id="section_pilihan'+pilihantime+'"><div class="control-group"><label for="pilihan'+pilihantime+'" class="control-label">Pilihan '+no+'</label><div class="controls"><input type="text" id="pilihan'+pilihantime+'" name="pilihan['+no+']" size="83" value="" class="span30"></div></div><div class="control-group"><label for="textfield" class="control-label"><a name="#tambahpilihan" rel="tooltip" title="Tambah Pilihan" onclick="addPilihan();"><i class="icon-plus-sign"></i></a>&nbsp;&nbsp;&nbsp;<a name="#hapuspilihan" rel="tooltip" title="Hapus Pilihan" onclick="deletePilihan('+pilihantime+');return false;"><i class="icon-trash"></i></a></label><input type="hidden" name="pilihantime[]" value="'+pilihantime+'" /></div></div>';

$('#controls_pilihan').append(data);
}
function deletePilihan(time){
if(time){
$('#section_pilihan'+time).remove();
}
}




</script>
<script>

$('#baco').on( "click",function() {
//$('#tanggapan').removeAttr('data-rule-required');
//$('#tanggapan').removeAttr('title');
//$('#tanggapan').parents(".help-block.error").attr("for","tanggapan").remove();
//$('#tanggapan').parents(".control-group").removeClass("error");

//$('.tanggapan').parent().next().html("<i class='icon-ok'></i> Username is available!");
//$('.tanggapan').parents(".control-group").removeClass("error").addClass("success");

$('#tanggapan').removeAttr('required');


});
$('#hapuspesan').on( "click",function() {
//$('#tanggapan').removeAttr('data-rule-required');
//$('#tanggapan').removeAttr('title');
//$('#tanggapan').parents(".help-block.error").attr("for","tanggapan").remove();
//$('#tanggapan').parents(".control-group").removeClass("error");

//$('.tanggapan').parent().next().html("<i class='icon-ok'></i> Username is available!");
//$('.tanggapan').parents(".control-group").removeClass("error").addClass("success");

$('#tanggapan').removeAttr('required');


});

$('#tanggapi').on( "click",function() {
//$('#tanggapan').attr('data-rule-required', 'true');
$('#tanggapan').attr('required', 'required');
$('#tanggapan').attr('title','Tanggapan harus diisi.');

});


</script>


	</body>

	</html>



<?php
}
}
else
{
if (isset($_POST['login']))
{
include "inc/polpp.php";
if (!otentikasi(clean($_POST['pemakai']), clean($_POST['sandi'])) || !isset($_SESSION['token']) || !isset($_POST['token']) || Token::generate($_POST['token']) == FALSE)
{
setcookie("pemakai",$_POST['pemakai'],null,null,null,true,true);
$_SESSION['error_login'] = 'Login Anda tidak valid.';

$cekuser = $koneksi_db->prepare("select id from ".$namadepan."syspemakai where id = ?");
$cekuser->execute(array($_POST['pemakai']));
$cekuser->setFetchMode(PDO::FETCH_ASSOC);
if($cekuser->rowCount() > 0)
{
$cekfailed = $koneksi_db->prepare("select attempt,id from ".$namadepan."login_failed  where user_id = ?");
$cekfailed->execute(array($_POST['pemakai']));
$cekfailed->setFetchMode(PDO::FETCH_ASSOC);
if($cekfailed->rowCount() > 0)
{
$ckfailed = $cekfailed->fetch(); 

$koneksi_db->prepare("update ".$namadepan."login_failed set sesi_id=?,attempt=?,waktu=now() where id = ?;")->execute(array(session_id(),$ckfailed['attempt']+1,$ckfailed['id']));

$_SESSION['login_failed'] = $_POST['pemakai'];
}
else
{
$koneksi_db->prepare("insert into ".$namadepan."login_failed (sesi_id,user_id,attempt,waktu) values (?,?,?,now());")->execute(array(session_id(),$_POST['pemakai'],1));
$_SESSION['login_failed'] = $_POST['pemakai'];

}

}

$cekattempt = $koneksi_db->prepare("select attempt,id from ".$namadepan."login_attempt where ip = ?");
	$cekattempt->execute(array(ipnyo()));
$cekattempt->setFetchMode(PDO::FETCH_ASSOC);
if($cekattempt->rowCount() > 0)
{
$ckattempt = $cekattempt->fetch(); 

$koneksi_db->prepare("update ".$namadepan."login_attempt set sesi_id=?,attempt=?,waktu=now() where id = ?;")->execute(array(session_id(),$ckattempt['attempt']+1,$ckattempt['id']));


}
else
{
$koneksi_db->prepare("insert into ".$namadepan."login_attempt (sesi_id,ip,attempt,waktu) values (?,?,?,now());")->execute(array(session_id(),ipnyo(),1));

}

header("Location: ?");

}
else
{
//include ("inc/fungsi.php");

	

$cekaktifada = $koneksi_db->prepare("select username from ".$namadepan."login_aktif where username = ?");
$cekaktifada->execute(array($_POST['pemakai']));
$cekaktifada->setFetchMode(PDO::FETCH_ASSOC);
if($cekaktifada->rowCount() > 0)
{

$cekaktif = $koneksi_db->prepare("select username from ".$namadepan."login_aktif where username = ? and TIME_TO_SEC(timediff(now(),last_active) > 300)");
$cekaktif->execute(array($_POST['pemakai']));
$cekaktif->setFetchMode(PDO::FETCH_ASSOC);
if($cekaktif->rowCount() > 0)
{
setcookie("pemakai","",null,null,null,true,true);
$_SESSION['sesi_user'] = clean($_POST['pemakai']);
if(!empty($_POST["remember"])) {
	setcookie ("member_login",$_POST["pemakai"],time()+ (10 * 365 * 24 * 60 * 60),null,null,null,true,true);
	setcookie ("member_password",$_POST["sandi"],time()+ (10 * 365 * 24 * 60 * 60),null,null,null,true,true);
} else {
	if(isset($_COOKIE["member_login"])) {
		setcookie ("member_login","",null,null,null,true,true);
	}
	if(isset($_COOKIE["member_password"])) {
		setcookie ("member_password","",null,null,null,true,true);
	}
}
$koneksi_db->prepare("insert into ".$namadepan."log (user,ip,login) values (?,?,now());")->execute(array($_SESSION['sesi_user'],ipnyo()));

$_SESSION['sesi_id'] = $koneksi_db->lastInsertId();

$koneksi_db->prepare("update ".$namadepan."login_aktif set ip=?,login=now(),last_active=now(),sesi_id=? where username = ?;")->execute(array(ipnyo(),session_id(),$_SESSION['sesi_user']));
$koneksi_db->prepare("delete from ".$namadepan."login_failed where user_id = ?")->execute(array($_SESSION['sesi_user']));
unset($_SESSION['login_failed']);
$koneksi_db->prepare("delete from ".$namadepan."login_attempt where ip = ?")->execute(array(ipnyo()));

header("location: ?");
}
else
{
$_SESSION['error_sesi'] = 'Sesi akun Anda telah aktif.';
header("location: ?");
}

}
else
{

	setcookie("pemakai","",null,null,null,true,true);
$_SESSION['sesi_user'] = clean($_POST['pemakai']);
if(!empty($_POST["remember"])) {
	setcookie ("member_login",$_POST["pemakai"],time()+ (10 * 365 * 24 * 60 * 60),null,null,null,true,true);
	setcookie ("member_password",$_POST["sandi"],time()+ (10 * 365 * 24 * 60 * 60),null,null,null,true,true);
} else {
	if(isset($_COOKIE["member_login"])) {
		setcookie ("member_login","",null,null,null,true,true);
	}
	if(isset($_COOKIE["member_password"])) {
		setcookie ("member_password","",null,null,null,true,true);
	}
}
$koneksi_db->prepare("insert into ".$namadepan."log (user,ip,login) values (?,?,now());")->execute(array($_SESSION['sesi_user'],ipnyo()));

$_SESSION['sesi_id'] = $koneksi_db->lastInsertId();

$koneksi_db->prepare("insert into ".$namadepan."login_aktif (username,sesi_id,ip,login,last_active) values (?,?,?,now(),now());")->execute(array($_SESSION['sesi_user'],session_id(),ipnyo()));
$koneksi_db->prepare("delete from ".$namadepan."login_failed where user_id = ?")->execute(array($_SESSION['sesi_user']));
unset($_SESSION['login_failed']);
$koneksi_db->prepare("delete from ".$namadepan."login_attempt where ip = ?")->execute(array(ipnyo()));
header("location: ?");

}




}
}
else
{
include ("inc/database.php");
include ("inc/fungsi.php");




$unlock_login_failed = $koneksi_db->prepare("select id from ".$namadepan."login_failed where TIME_TO_SEC(timediff(now(),waktu)) > ? and attempt >= ?");

$unlock_login_failed->execute(array($lockout_time_failed, $bad_login_limit_failed));
$unlock_login_failed->setFetchMode(PDO::FETCH_ASSOC);
if($unlock_login_failed->rowCount() > 0)
{
	
	$ulock_login_failed=$unlock_login_failed->fetch();
$koneksi_db->prepare("delete from ".$namadepan."login_failed where id = ?")->execute(array($ulock_login_failed['id']));
	unset($_SESSION['login_failed']);
	//echo $ulock_login['id'];

	
}

 $unlock_login = $koneksi_db->prepare("select id from ".$namadepan."login_attempt where ip = ? and TIME_TO_SEC(timediff(now(),waktu)) > ? and attempt >= ?");

$unlock_login->execute(array(ipnyo(),$lockout_time, $bad_login_limit));
$unlock_login->setFetchMode(PDO::FETCH_ASSOC);
if($unlock_login->rowCount() > 0)
{
	
	//$ulock_login=$unlock_login->fetch();
$koneksi_db->prepare("delete from ".$namadepan."login_attempt where ip = ?")->execute(array(ipnyo()));
	//echo $ulock_login['id'];

	
}

?>
<!doctype html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<!-- Apple devices fullscreen -->
	<meta name="apple-mobile-web-app-capable" content="yes" />
	<!-- Apple devices fullscreen -->
	<meta names="apple-mobile-web-app-status-bar-style" content="black-translucent" />
	
	<title><?=$namaapp?> - Login</title>

	<!-- Bootstrap -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!-- Bootstrap responsive -->
	<link rel="stylesheet" href="css/bootstrap-responsive.min.css">
	<!-- icheck -->
	<link rel="stylesheet" href="css/plugins/icheck/all.css">
	<!-- Theme CSS -->
	<link rel="stylesheet" href="css/style.css">
	<!-- Color CSS -->
	<link rel="stylesheet" href="css/themes.css">


	<!-- jQuery -->
	<script src="js/jquery.min.js"></script>
	
	<!-- Nice Scroll -->
	<script src="js/plugins/nicescroll/jquery.nicescroll.min.js"></script>
	<!-- Validation -->
	<script src="js/plugins/validation/jquery.validate.min.js"></script>
	<script src="js/plugins/validation/additional-methods.min.js"></script>
	<!-- icheck -->
	<script src="js/plugins/icheck/jquery.icheck.min.js"></script>
	<!-- Bootstrap -->
	<script src="js/bootstrap.min.js"></script>
	<script src="js/eakroko.js"></script>

	<!--[if lte IE 9]>
		<script src="js/plugins/placeholder/jquery.placeholder.min.js"></script>
		<script>
			$(document).ready(function() {
				$('input, textarea').placeholder();
			});
		</script>
	<![endif]-->
	

	<!-- Favicon -->
	<link rel="shortcut icon" href="favicon.ico" />
	<!-- Apple devices Homescreen icon -->
	<link rel="apple-touch-icon-precomposed" href="img/apple-touch-icon-precomposed.png" />

</head>


<body class='login theme-orange'>


	<div class="wrapper">
	
	
		
		<div class="login-body">
			&nbsp;<br/>
			<div class="text-center"><h2><img src="img/images.png" style="height:75px;"/><br/><b><?=$namaapp?></b></h2></div>

			<form action="" method='post' class='form-validate' id="test" name="logincp">
				<div class="control-group">
					<div class="email controls">

<?php
if(!isset($pemakai))
	$pemakai = '';

if(isset($_SESSION['login_failed']))
{

$lock_login_failed = $koneksi_db->prepare("select id from ".$namadepan."login_failed where user_id = ? and attempt > ? and TIME_TO_SEC(timediff(now(),waktu)) <= ?");

$lock_login_failed->execute(array($_SESSION['login_failed'],$bad_login_limit_failed,$lockout_time_failed));
$lock_login_failed->setFetchMode(PDO::FETCH_ASSOC);
if($lock_login_failed->rowCount() > 0)
{
$lock_input_failed = "disabled";
$pesan_lock_failed = "<div class=\"alert alert-error\">User Anda dikunci sementara dikarenakan terlalu sering kesasalahan memasukan password, silahkan hubungi admin aplikasi atau coba beberapa saat lagi.</div>";
}
else
{
$lock_input_failed = "";
$pesan_lock_failed = "";
}
}
else
$lock_input_failed = "";
 $lock_login = $koneksi_db->prepare("select id from ".$namadepan."login_attempt where ip = ? and attempt > ? and TIME_TO_SEC(timediff(now(),waktu)) <= ?");

$lock_login->execute(array(ipnyo(),$bad_login_limit,$lockout_time));
$lock_login->setFetchMode(PDO::FETCH_ASSOC);
if($lock_login->rowCount() > 0)
{
$lock_input = "disabled";
$pesan_lock = "<div class=\"alert alert-error\">Akses Anda dikunci sementara dikarenakan terlalu sering kesasalahan memasukan username/password, silahkan coba lagi nanti.</div>";
}
else
{
$lock_input = "";
$pesan_lock = "";
}


?>
<input type="hidden" name="token" value="<?=Token::generate();?>" />
<input type="text" name='pemakai' placeholder="Username" class='input-block-level' data-rule-required="true" data-rule-required="true" value="<?=$pemakai ?>" <?=$lock_input?>  <?=$lock_input_failed?> autocomplete="username">
					</div>
				</div>
				<div class="control-group">
					<div class="pw controls">
						<input type="password" name="sandi" placeholder="Password" class='input-block-level' data-rule-required="true" <?=$lock_input?> <?=$lock_input_failed?> autocomplete="current-password">
					</div>
				</div>
				<div class="submit">
					<div class="remember">
					<input type="checkbox" name="remember" class='icheck-me' data-skin="square" data-color="blue" id="remember" <?php if(isset($_COOKIE["member_login"])) { ?> checked <?php } ?> <?=$lock_input?> <?=$lock_input_failed?>> <label for="remember">Remember me</label>
					
					
			
		
						</div>
					
					
					<input type="submit" value="Login" class='btn btn-primary' name="login" <?=$lock_input?> <?=$lock_input_failed?>>
				</div>
				<p>&nbsp;</p>
				<?php
			if (isset($_SESSION['error_login']))
{
$errorlogin = "
				<div class=\"alert alert-error\">".$_SESSION['error_login']."</div>
			";
			unset($_SESSION['error_login']);
}
else if (isset($_SESSION['error_sesi']))
{
$errorlogin = "
				<div class=\"alert alert-error\">".$_SESSION['error_sesi']."</div>
			";
			unset($_SESSION['error_sesi']);
}
else
$errorlogin = "&nbsp;";

			echo $errorlogin;

if(isset($_SESSION['login_failed']))
echo $pesan_lock_failed
			?>
			
							<?=$pesan_lock?>
			</form>

			
			<div class="errorlogin">
			<?php
if (!isset($namasitusini))
	$namasitusini = '';
if (!isset($versijcms))
	$versijcms = '';
echo "<span>&copy; ".date("Y")." ".$judulwebsite."</span>\n";
?>
			
		</div>


		</div>

		
		
	<?php
	echo "<script type=\"text/javascript\">\n";
//if (isset($pemakai))
//echo "document.logincp.sandi.focus();\n";
//else
echo "document.logincp.pemakai.focus();\n";
echo "</script>\n";
?>
</body>
	
	
	

</html>

<?php
}
}
?>