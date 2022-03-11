<?php
defined('_JCMS_') or header('Location: ../../');
global $pathurl,$dbh,$namadepan, $bhs;

$q = "SELECT `file`,`video`,`id`, `waktu`, `waktuawal`, `waktuakhir`, `judul_".$bhs."` judul,`logo`,`ket_".$bhs."` ket FROM `".$namadepan."slider` WHERE `aktif` = 'y' ORDER BY `ordering` ASC";

$sth = $dbh->prepare($q);
$sth->execute();
	$sth->setFetchMode(PDO::FETCH_ASSOC);
$harini =  date("Y-m-d");

if ($sth->rowCount() > 0)
{
	?>
<!-- Slider -->
<div class="main-slider style-two default-banner" id="home">
            <div class="tp-banner-container">
                <div class="tp-banner">
					<div id="rev_slider_1175_1_wrapper" class="rev_slider_wrapper fullscreen-container" data-alias="duotone192" data-source="gallery" style="background-color:transparent;padding:0px;">
						<!-- START REVOLUTION SLIDER 5.3.0.2 fullscreen mode -->
						<div id="rev_slider_1175_1" class="rev_slider fullscreenbanner" style="display:none;" data-version="5.3.0.2">
							<ul>	

	<?php
$no = 1;
while ($rgdp = $sth->fetch())
{
if($no == 1)
$active = 'active';
else
$active = "";

$lipucuk = '<!-- SLIDE  -->
<li data-index="rs-'.$no.'" data-transition="fade" data-slotamount="default" data-hideafterloop="0" data-hideslideonmobile="off"  data-easein="default" data-easeout="default" data-masterspeed="default"  data-thumb="'.$pathurl.'/images/main-slider/slide20.jpg"  data-rotate="0"  data-fstransition="fade" data-fsmasterspeed="300" data-fsslotamount="7" data-saveperformance="off"  data-title="Slide" data-param1="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="">';
$gambarnyo = '<!-- MAIN IMAGE -->
<img src="'.$pathurl.'/images/main-slider/'.$rgdp['file'].'"  alt=""  data-lazyload="'.$pathurl.'/images/main-slider/'.$rgdp['file'].'" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="3" class="rev-slidebg" data-no-retina>';

$opacity = '<!-- LAYERS -->
<div class="tp-caption tp-shape tp-shapewrapper " id="slide-100-layer" 
	data-x="[\'center\',\'center\',\'center\',\'center\']" 
	data-hoffset="[\'0\',\'0\',\'0\',\'0\']" 
	data-y="[\'middle\',\'middle\',\'middle\',\'middle\']" 
	data-voffset="[\'0\',\'0\',\'0\',\'0\']" 
	data-width="full" data-height="full" 
	data-whitespace="nowrap" 
	data-type="shape" 
	data-basealign="slide" 
	data-responsive_offset="off" 
	data-responsive="off" 
	data-frames=\'[{"from":"opacity:0;","speed":1000,"to":"o:1;","delay":0,"ease":"Power4.easeOut"},{"delay":"wait","speed":1000,"to":"opacity:0;","ease":"Power4.easeOut"}]\' 
	data-textAlign="[\'left\',\'left\',\'left\',\'left\']" 
	data-paddingtop="[0,0,0,0]" 
	data-paddingright="[0,0,0,0]" 
	data-paddingbottom="[0,0,0,0]" 
	data-paddingleft="[0,0,0,0]" 
	style="z-index: 2;background-color:rgba(0, 0, 0, 0.1);border-color:rgba(0, 0, 0, 0);border-width:0px; background-image:url('.$pathurl.'/images/overlay/opacity.png)"> </div>';


if(!is_null($rgdp['video']) or $rgdp['video'] != '')
{
$video = '<!-- BACKGROUND VIDEO LAYER -->
<div class="rs-background-video-layer" 
	data-forcerewind="on" 
	data-volume="mute" 
	data-videowidth="100%" 
	data-videoheight="100%" 
	data-videomp4="'.$pathurl.'/video/'.$rgdp['video'].'" 
	data-videopreload="auto" 
	data-videoloop="loop" 
	data-aspectratio="16:9" 
	data-autoplay="true" 
	data-autoplayonlyfirsttime="false" 
></div>';
}
else
{
	$video = '';
}

if(!is_null($rgdp['logo']) or $rgdp['logo'] != '')
{
$logo = '<div class="tp-caption tp-resizeme" 
id="slide-3015-layer-7" 
data-x="[\'center\',\'center\',\'center\',\'center\']" 
data-hoffset="[\'0\',\'0\',\'0\',\'0\']" 
data-y="[\'middle\',\'middle\',\'middle\',\'middle\']" 
data-voffset="[\'-190\',\'-180\',\'-158\',\'-110\']" 
data-width="none"
data-height="none"
data-whitespace="nowrap"
data-type="text" 
data-responsive_offset="on" 
data-frames=\'[{"from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","speed":2000,"to":"o:1;","delay":1500,"ease":"Power2.easeInOut"},{"delay":"wait","speed":300,"to":"opacity:0;","ease":"nothing"}]\'
data-textAlign="[\'center\',\'center\',\'center\',\'center\']"
data-paddingtop="[0,0,0,0]"
data-paddingright="[0,0,0,0]"
data-paddingbottom="[0,0,0,0]"
data-paddingleft="[0,0,0,0]"
style="z-index: 9; white-space: nowrap; font-size: 100px; line-height: 100px;">
	<img src="'.$pathurl.'/images/pap-akreditasi.png" class="img-fluid" alt=""/>
</div>';

}
else 
{
	$logo = '';
}

$judul = '<!-- LAYER NR. 1 -->
<div class="tp-caption   rs-parallaxlevel-4" 
	id="slide-'.$no.'-layer-1" 
	data-x="[\'center\',\'center\',\'center\',\'center\']" data-hoffset="[\'0\',\'0\',\'0\',\'0\']" 
	data-y="[\'middle\',\'middle\',\'middle\',\'middle\']" data-voffset="[\'-120\',\'-100\',\'-80\',\'-80\']" 
	data-fontsize="[\'60\',\'40\',\'30\',\'20\']"
	data-lineheight="[\'75\',\'50\',\'40\',\'25\']"
	data-width="[\'1000\',\'640\',\'480\',\'300\']"
	data-height="none"
	data-whitespace="normal"

	data-type="text" 
	data-responsive_offset="off" 
	data-responsive="off"
	data-frames=\'[{"from":"y:20px;sX:0.9;sY:0.9;opacity:0;","speed":1000,"to":"o:1;","delay":500,"ease":"Power4.easeOut"},{"delay":"wait","speed":300,"to":"opacity:0;","ease":"nothing"}]\'
	data-textAlign="[\'center\',\'center\',\'center\',\'center\']"
	data-paddingtop="[0,0,0,0]"
	data-paddingright="[0,0,0,0]"
	data-paddingbottom="[0,0,0,0]"
	data-paddingleft="[0,0,0,0]"

	style="z-index: 5; min-width: 720px; max-width: 720px; white-space: normal; font-size: 60px; line-height: 70px;  color: rgba(255, 255, 255, 1.00);font-family:\'Merriweather\', serif;border-width:0px; font-weight:600;">'.$rgdp['judul'].'
</div>';


if(!is_null($rgdp['ket']) or $rgdp['ket'] != '')
{
$ket = '<div class="tp-caption   rs-parallaxlevel-4" 
id="slide-'.$no.'-layer-2" 
data-x="[\'center\',\'center\',\'center\',\'center\']" data-hoffset="[\'0\',\'0\',\'0\',\'0\']" 
data-y="[\'middle\',\'middle\',\'middle\',\'middle\']" data-voffset="[\'60\',\'100\',\'100\',\'80\']" 
data-fontsize="[\'22\',\'22\',\'20\',\'16\']"
data-lineheight="[\'32\',\'32\',\'30\',\'24\']"
data-width="[\'1000\',\'640\',\'480\',\'300\']"
data-height="none"
data-whitespace="normal"
data-type="text" 
data-responsive_offset="off" 
data-responsive="off"
data-frames=\'[{"from":"y:20px;sX:0.9;sY:0.9;opacity:0;","speed":1000,"to":"o:1;","delay":500,"ease":"Power4.easeOut"},{"delay":"wait","speed":300,"to":"opacity:0;","ease":"nothing"}]\'
data-textAlign="[\'center\',\'center\',\'center\',\'center\']"
data-paddingtop="[0,0,0,0]"
data-paddingright="[0,0,0,0]"
data-paddingbottom="[0,0,0,0]"
data-paddingleft="[0,0,0,0]"
style="z-index: 5; min-width: 720px; max-width: 720px; white-space: normal; font-size: 60px; line-height: 70px;  color: rgba(255, 255, 255, 1.00);font-family:Roboto;border-width:0px; font-weight:400;">'.$rgdp['ket'].'
</div>';

}
else 
{
	$ket = '';
}

$libawah = '</li>';

if ($rgdp['waktu'] == 'y')
{
if ($harini >= $rgdp['waktuawal'] AND  $harini <= $rgdp['waktuakhir'])
{

echo '<div class="slide">

	<img src="'.$pathurl.'/userfiles/images/'.$gambarnyo.'" alt="'.$pathurl.'/userfiles/images/'.$gambarnyo.'">


</div>';


}
}
else
{
	?>
<?=$lipucuk?>
									<?=$gambarnyo?>
									<?=$opacity?>
									        <?=$video?>
											
									<?=$judul?>
									<?=$ket?>
									
								<?=$libawah?>
								<!-- SLIDE  -->
	<?php
}
$no++;
}
?>

</ul>
							<div class="tp-bannertimer" style="height: 8px; background-color: rgba(255, 255, 255, 0.25);"></div>	
						</div>
					</div>        
				</div>        
			</div>        
		</div>        
		<!-- Slider END -->
<?php


}
?>		