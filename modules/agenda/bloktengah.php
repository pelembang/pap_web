<?php
defined('_JCMS_') or header('Location: ../../');
global $dbh,$namadepan;

?>
<!-- Latest From Blog -->
<div class="section-full content-inner-2 bg-white">
				<div class="container">
					<div class="section-head text-center">
						<h2 class="title">Agenda Kampus</h2>
						
					</div>
					<div class="row">
		<?php

$modul = $dbh->prepare("SELECT slug_".$bhs." slug FROM `".$namadepan."modul` WHERE nama = ?");
$modul->execute(array('agenda'));
$modul->setFetchMode(PDO::FETCH_ASSOC);
$rmod = $modul->fetch();
$mod = $rmod['slug'];

$q = "SELECT id,judul_".$bhs." judul,slug_".$bhs." slug,permalink_".$bhs." permalink,date_format(whenentri,'%d %M') tglbln,date_format(whenentri,'%Y') thn FROM `".$namadepan."agenda` WHERE `published` = ? ORDER BY `whenentri` DESC limit 3";


$pengu = $dbh->prepare($q);
$pengu->execute(array('y'));
$pengu->setFetchMode(PDO::FETCH_ASSOC);

if ($pengu->rowCount() > 0) {
	while($rpengu = $pengu->fetch())
	{
		

		?>
					
						<div class="col-lg-4 col-md-6 m-b30">
							<div class="event-post post-grid shadow radius">
								<div class="dlab-post-media">
									<a href="<?=$pathurl?>/<?=$bhs?>/<?=$mod?>/<?=$rpengu['permalink']?>"><img src="<?=$pathurl?>/images/agenda/700x500.jpg" alt=""></a>
								</div>
								<div class="dlab-post-info">
									<div class="dlab-post-meta">
										<ul>
											<li class="post-date"> <strong>10 June</strong> <span> 2022</span> </li>
											<li class="post-author"> <i class="la la-clock"></i> 05:00 PM </li>
											<li class="post-tag"> <i class="ti-location-pin"></i> Marmora Road </li>
										</ul>
									</div>
									<div class="dlab-post-title">
										<h4 class="post-title text-truncate-2"><a href="<?=$pathurl?>/<?=$bhs?>/<?=$mod?>/<?=$rpengu['permalink']?>"><?=$rpengu['judul']?></a></h4>
									</div>
								</div>
							</div>
						</div>
						

						
						
						
					
<?php
	}
}
else {
	?>
	<div class="col-lg-12 col-md-12 col-sm-12 m-b30 wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.3s">
	<div class="alert alert-warning no-bg text-center"> <strong>Mohon maaf,</strong> agenda kampus belum ada. </div>
	</div>
	<?php

}
?>
</div>
				</div>
			</div>
			<!-- Latest From Blog End -->