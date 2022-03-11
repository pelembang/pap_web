<?php
//error_reporting(~E_NOTICE);
session_name(md5("keypap_web"));
session_start();
define('_JCMS_', 1);

$extfile = "php";
include "includes/fungsi.$extfile";
include "includes/pengaturan.$extfile";
include "includes/counter.php";








$linktargeturl = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
if (isset($_GET['ajax']))
{
if (isset($_GET['aksi']))
include ("modules/".$_GET['ajax']."/ajax_blokmodul_".$_GET['aksi'].".$extfile");
else
include ("modules/".$_GET['ajax']."/ajax_blokmodul.$extfile");
}
else if (isset($_GET['upload']))
{
include ("modules/$_GET[upload]/upload_blokmodul.$extfile");
}
else if (isset($_GET['captcha']))
{
include ("includes/newCaptcha.php");
}
else
{

	if(isset($_SERVER['QUERY_STRING']))
	$querystring = "/?".$_SERVER['QUERY_STRING'];
	else
	$querystring = "";
	
	if (isset($_GET['bhs']))
	{
		
	$bhs = $_GET['bhs'];
	//setcookie('bhs', $bhs);
	setcookie('bhs', $bhs, 0, $pathurl);
	$_COOKIE['bhs'] = $bhs;
	//header("Location: ?bhs=".$bhs);
	//echo "xyz";
	}
	else {
		if (isset($_GET['error']))
{
//include ("includes/".$_GET['error'].".php");
}
else {
	if(isset($_COOKIE['bhs']))
	{
	$bhs = $_COOKIE['bhs'];
	//header("Location: ".$bhs.$querystring);
	//header("Location : ?");
	if($bhs != $languange)
	header("Location: ".$bhs);
	}
	else {
	$bhs = $languange;
	setcookie('bhs', $bhs);
	//header("Location: ".$bhs.$querystring);
	//header("Location : ?");
	if($bhs != $languange)
	header("Location: ".$bhs);
	}
}
	}

ob_start();
include ("includes/header.$extfile");
$palak = ob_get_contents();
ob_end_clean();

ob_start();
tulisanberjalan();
$tulisanberjalan = ob_get_contents();
ob_end_clean();

ob_start();
testimoni();
$testimoni = ob_get_contents();
ob_end_clean();


ob_start();
include ("includes/sikil.$extfile");
$sikil = ob_get_contents();
ob_end_clean();

ob_start();
medsos();
$medsos = ob_get_contents();
ob_end_clean();

if (isset($_GET['plgmodul']))
{
ob_start();
blokkiri('i',$_GET['plgmodul']);
$blokkiri = ob_get_contents();
ob_end_clean();

ob_start();
blokkiri('a',$_GET['plgmodul']);
$blokkanan = ob_get_contents();
ob_end_clean();


if ($_GET['plgmodul'] == 'berita')
{
ob_start();
blokmodulberita();
$bloktengah = ob_get_contents();
ob_end_clean();

ob_start();
blokkiri('a',$_GET['plgmodul']);
$blokkanan = ob_get_contents();
ob_end_clean();

ob_start();
blokkananmodul();
$blokkananmodul = ob_get_contents();
ob_end_clean();

}
else if ($_GET['plgmodul'] == 'prodi')
{
ob_start();
blokmodulprodi();
$bloktengah = ob_get_contents();
ob_end_clean();


}
else
{	

ob_start();
blokmodul($_GET['plgmodul']);
$bloktengah = ob_get_contents();
ob_end_clean();


ob_start();
blokkananmodul();
$blokkananmodul = ob_get_contents();
ob_end_clean();


}


}
else if (isset($_GET['error']))
{
	ob_start();
	errorhandling();
	$errorhandling = ob_get_contents();
	ob_end_clean();
}

else
{
$judulmodul = "Beranda";
ob_start();
gambardepan();
$gambardepan = ob_get_contents();
ob_end_clean();

ob_start();
blokkiri('i',NULL);
$blokkiri = ob_get_contents();
ob_end_clean();

ob_start();
bloktengah();
$bloktengah = ob_get_contents();
ob_end_clean();

ob_start();
blokkiri('a',NULL);
$blokkanan = ob_get_contents();
ob_end_clean();

ob_start();
bstatiskecik();
$bstatiskecik = ob_get_contents();
ob_end_clean();

ob_start();
bannerbesak();
$bannerbesak = ob_get_contents();
ob_end_clean();

ob_start();
bacakkecik();
$bacakkecik = ob_get_contents();
ob_end_clean();



}



include "includes/menu.$extfile";


$judulkepala = !isset($judulkepala) ? '' : $judulkepala;

if (!isset($judulmodul))
{
	$judulmodul='';

}

if (!isset($menuh))
{
$menuh='';

}

if (!isset($menu))
{
$menu='';

}

if (!isset($judulmodul))
{
	$judulmodul='';

}



if (!isset($palak))
{
	$palak='';

}
if (!isset($jam))
{
	$jam='';

}

if (!isset($body))
{
	$body='';

}
if (!isset($judulwebsite))
{
	$judulwebsite='';

}
if (!isset($metatitle))
{
	$metatitle='';

}
if (!isset($metadesc))
{
	$metadesc='';

}
if (!isset($metakeyword))
{
	$metakeyword='';

}
if (!isset($linkimgsrc))
{
$linkimgsrc='';
}
if (!isset($linktargeturl))
{
$linktargeturl='';
}
if (!isset($blokkiri))
{
$blokkiri='';
}
if (!isset($bloktengah))
{
$bloktengah='';
}
// if (!isset($bloktengahberita))
// {
// $bloktengahberita='';
// }
if (!isset($gambardepan))
{
$gambardepan='';

}
if (!isset($errorhandling))
{
$errorhandling='';

}
if (!isset($medsos))
{
$medsos='';

}
if (!isset($linkinternal))
{
$linkinternal='';

}
if (!isset($bstatiskecik))
{
$bstatiskecik='';

}
if (!isset($bannerbesak))
{
$bannerbesak='';

}
if (!isset($bacakkecik))
{
$bacakkecik='';

}
if (!isset($tulisanberjalan))
{
$tulisanberjalan='';

}
if (!isset($testimoni))
{
$testimoni='';

}
if (!isset($sikil))
{
$sikil='';

}

if (!isset($banner))
{
$banner='';

}

if (!isset($blokkanan))
{
$blokkanan='';

}
if (!isset($blokkananmodul))
{
$blokkananmodul='';

}
if (!isset($languange))
{
$languange='';

}


$fotometa = $pathurl."/assets/img/berita.png";

$judulmeta = $metadesc;

$judulmodulbesak = '';
$judulmodulbreadcumbs = '';
$berita = '';
$blokkananberita = '';
if(isset($_GET['c']))
$c = $_GET['c'];
else
$c = '';
$thariskrg = '';
$ttotalskrg = '';
$tpekanskrg  = '';
$tbulanskrg  = '';
$ttahunskrg  = '';
$wktskrg  = '';

if(isset($pengaturan['telpweb']))
$telpweb = $pengaturan['telpweb'];
else
$telpweb = '';



$define = array ('judulmodul' => $judulmodul,'judulmodulbesak' => $judulmodulbesak,'judulmodulbreadcumbs' => $judulmodulbreadcumbs, 'menuh' => $menuh, 'menu' => $menu,  'palak' => $palak, 'jam' => $jam, 'body' => $body, 'judulwebsite' => $judulwebsite, 'metatitle' => $metatitle, 'metadesc' => $metadesc, 'metakeyword' => $metakeyword, 'linkimgsrc' => $linkimgsrc , 'linktargeturl' => $linktargeturl, 'blokkiri' => $blokkiri, 'bloktengah' => $bloktengah, 'gambardepan' => $gambardepan, 'errorhandling' => $errorhandling,'medsos' => $medsos,'linkinternal' => $linkinternal, 'bstatiskecik' => $bstatiskecik,'bannerbesak' => $bannerbesak,'bacakkecik' => $bacakkecik, 'tulisanberjalan' => $tulisanberjalan,'testimoni' => $testimoni, 'banner' => $banner,'berita' => $berita,'sikil' => $sikil, 'blokkanan' => $blokkanan, 'blokkananmodul' => $blokkananmodul,'blokkananberita' => $blokkananberita,  'languange' => $languange,
 'pilihbahasa20' => pilihbahasa('-20'),
  'pilihbahasa' => pilihbahasa(), 'valuesearch' => $c , 'thariskrg' => $thariskrg , 'ttotalskrg' => $ttotalskrg, 'tpekanskrg' => $tpekanskrg, 'tbulanskrg' => $tbulanskrg, 'ttahunskrg' => $ttahunskrg, 'ttotalskrg' => $ttotalskrg, 'wktskrg' => baliktgljam(substr($wktskrg,0,10)), 'fotometa' => $fotometa, 'judulmeta' => $judulmeta, 'pathurl' => $pathurl, 'telpweb' => $telpweb,'online'=> $online,'hrini'=> $hrini,'pknini'=> $pkini,'blnini'=> $blnini,'total'=> $total, 'bhs' => $bhs);
$skinheader = cms_template($define,'skins/header.tpl');
$skinfooter = cms_template($define,'skins/footer.tpl');

$skinbottom = cms_template($define,'skins/bottom.tpl');
if (isset($_GET['plgmodul']))
{

$skin = cms_template($define,'skins/skin_modul.tpl');

	
}
else if (isset($_GET['error']))
{

$skin = cms_template($define,'skins/skin_error.tpl');

	
}
	else
$skin = cms_template($define,'skins/skin.tpl');
gz_output($skinheader);
gz_output($skin);

gz_output($skinfooter);
gz_output($skinbottom);



}
?>
