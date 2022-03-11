<?php
defined('_JCMS_') or header('Location: ../../');
?>
 <!-- Company staus -->
 <div class="section-full text-white bg-img-fix content-inner overlay-black-dark counter-staus-box" style="background-image:url(<?=$pathurl?>/images/background/bg4.jpg);">
				<div class="container">
					<div class="row">

					<?php
$q = "SELECT id, label, value FROM `".$namadepan."datamaster` where kat = 'statistik' order by urut asc";


$statistik = $dbh->prepare($q);
$statistik->execute();
$statistik->setFetchMode(PDO::FETCH_ASSOC);

if ($statistik->rowCount() > 0) {
while($rstatistik = $statistik->fetch()) {
	if($rstatistik['id'] == 1)
	$valuestat = date("Y")-$rstatistik['value'];
	else
	$valuestat = $rstatistik['value'];
?>					
						<div class="col-md-3 col-lg-3 col-sm-6 col-6 m-b30 wow fadeInUp counter-style-5" data-wow-duration="2s" data-wow-delay="0.2s">
							<div class="icon-bx-wraper center">
								<div class="icon-content">
									<h2 class="dlab-tilte counter"><?=$valuestat?></h2>
									<p><?=$rstatistik['label']?></p>
								</div>
							</div>
						</div>
						

<?php
}
}
?>
					</div>
				</div>
			</div>
			<!-- Company staus End -->