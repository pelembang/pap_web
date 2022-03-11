<?php
defined('_JCMS_') or header('Location: ../../');
?>
 <!-- Client logo -->
 <div class="section-full dlab-we-find bg-img-fix p-t20 p-b20 bg-white wow fadeIn" data-wow-duration="2s" data-wow-delay="0.6s">
				<div class="container">
					<div class="section-content">
						<div class="client-logo-carousel mfp-gallery gallery owl-btn-center-lr owl-carousel owl-btn-3">

						<?php
$q= "SELECT id, nama, url from ".$namadepan."link order by urut asc";


$link = $dbh->prepare($q);
$link->execute();
$link->setFetchMode(PDO::FETCH_ASSOC);

if ($link->rowCount() > 0) {
while($rlink = $link->fetch()) {

	?>						
							<div class="item">
								<div class="ow-client-logo">
									<div class="client-logo"><a href="<?=$rlink['url']?>" target="_blank"><img src="<?=$pathurl?>/images/link/<?=$rlink['id']?>.jpg" alt="<?=$rlink['nama']?>"></a></div>
								</div>
							</div>
							<?php
}
}
							?>
						</div>
					</div>
				</div>
			</div>
			<!-- Client logo END -->