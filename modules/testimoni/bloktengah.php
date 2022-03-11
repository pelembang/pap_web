<?php
defined('_JCMS_') or header('Location: ../../');
global $dbh, $bhs;
?>
 <!-- Testimonials blog -->
 <div class="section-full overlay-black-middle bg-secondry content-inner-2 wow fadeIn" data-wow-duration="2s" data-wow-delay="0.2s" style="background-image:url(<?=$pathurl?>/images/background/map-bg.png);">
				<div class="container">
					<div class="section-head text-white text-center">
						<h2 class="title">Testimonial Alumni</h2>
						
					</div>
					<div class="section-content">
						<div class="testimonial-two-dots owl-carousel owl-none owl-theme owl-dots-primary-full owl-loaded owl-drag">

						
					<?php
$q= "SELECT t.id, t.nama, t.alumni, t.kerja, p.singkatan prodi, t.testimoni_".$bhs." testimoni FROM `".$namadepan."testimonial` t left join ".$namadepan."prodi p on p.id = t.prodi where t.publish = 1 order by urut asc";


$testi = $dbh->prepare($q);
$testi->execute();
$testi->setFetchMode(PDO::FETCH_ASSOC);

if ($testi->rowCount() > 0) {
while($rtesti = $testi->fetch()) {

	?>
							<div class="item">
								<div class="testimonial-15 quote-right">
									<div class="testimonial-text ">
										<p><?=$rtesti['testimoni']?></p>
									</div>
									<div class="testimonial-detail clearfix">
										<div class="testimonial-pic radius"><img src="<?=$pathurl?>/userfiles/images/testimoni/<?=$rtesti['id']?>.jpg" width="100" height="100" alt=""></div>
										<strong class="testimonial-name"><?=$rtesti['nama']?> (<?=$rtesti['alumni']?> - <?=$rtesti['prodi']?>)</strong> <span class="testimonial-position"><?=$rtesti['kerja']?></span> 
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
			</div>
			<!-- Testimonials blog End -->