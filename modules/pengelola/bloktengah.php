<?php
defined('_JCMS_') or header('Location: ../../');
?>
 <!-- Team member -->
 <div class="section-full bg-gray content-inner">
				<div class="container">
					<div class="section-head text-center ">
						<h2 class="title">Pengelola Politeknik Akamigas Palembang</h2>
						
					</div>
					<div class="row">
						<div class="col-lg-4 col-md-12 col-sm-12 wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.2s">
							
						</div>
						<?php
$qd = "SELECT id,nama,jabatan_".$bhs." jabatan FROM `".$namadepan."pengelola` where id = 1";


$dir = $dbh->prepare($qd);
$dir->execute();
$dir->setFetchMode(PDO::FETCH_ASSOC);

if ($dir->rowCount() > 0) {
$rdir = $dir->fetch();
?>
					
						<div class="col-lg-4 col-md-12 col-sm-12 wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.8s">
							<div class="dlab-box m-b30 dlab-team3">
								<div class="dlab-media">
									<a href="teachers-profile.html">
										<img width="358" height="460" alt="" src="<?=$pathurl?>/userfiles/images/pengelola/<?=$rdir['id']?>.jpg" class="lazy" data-src="<?=$pathurl?>/userfiles/images/pengelola/<?=$rdir['id']?>.jpg">
									</a>
								</div>
								<div class="dlab-info">
									<h4 class="dlab-title"><a href="teachers-profile.html"><?=$rdir['nama']?></a></h4>
									<span class="dlab-position"><?=$rdir['jabatan']?></span>
									<!-- <ul class="dlab-social-icon dez-border">
										<li><a class="fab fa-facebook-f" href="javascript:void(0);"></a></li>
										<li><a class="fab fa-twitter" href="javascript:void(0);"></a></li>
										<li><a class="fab fa-linkedin-in" href="javascript:void(0);"></a></li>
										<li><a class="fab fa-pinterest-p" href="javascript:void(0);"></a></li>
									</ul> -->
								</div>
							</div>
						</div>

						<div class="col-lg-4 col-md-12 col-sm-12 wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.8s">
							
						</div>

						
					</div>
<?php
				}

$q = "SELECT id,nama,jabatan_".$bhs." jabatan FROM `".$namadepan."pengelola` where id > 1 order by urut asc";


$pengelola = $dbh->prepare($q);
$pengelola->execute();
$pengelola->setFetchMode(PDO::FETCH_ASSOC);

if ($pengelola->rowCount() > 0) {


?>

<div class="img-carousel-dots-nav owl-carousel owl-btn-2 primary owl-btn-center-lr wow fadeInUp" data-wow-duration="2s" data-wow-delay="1.6s">

<?php
while($rpengelola = $pengelola->fetch()) {
		

		?>

<div class="item">

							<div class="dlab-box m-b30 dlab-team3">
								<div class="dlab-media">
									
										<img width="358" height="460" alt="" class="lazy" src="<?=$pathurl?>/userfiles/images/pengelola/<?=$rpengelola['id']?>.jpg">
									
								</div>
								<div class="dlab-info">
									<h4 class="dlab-title text-height-2"><?=$rpengelola['nama']?></h4>
									<span class="dlab-position text-height-small-3"><?=$rpengelola['jabatan']?></span>
									
								</div>
							
						</div>
</div>



<?php
}

?>
</div>
<?php
}
else {
?>
<div class="col-lg-12 col-md-12 col-sm-12 m-b30 wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.3s">
<div class="alert alert-warning no-bg text-center"> <strong>Mohon maaf,</strong> berita belum ada. </div>
</div>
<?php

}
?>


</div>



















					


















					
				</div>
			</div>
			<!-- Team member End -->