<?php
defined('_JCMS_') or header('Location: ../../');
global $dbh,$namadepan, $bhs;
?>

<!-- Features -->
<div class="section-full content-inner bg-gray">
	<div class="container">
		<div class="section-head text-black text-center">
			<h2 class="title">Pengumuman</h2>
			
		</div>
		<div class="row">
<?php
	$modul = $dbh->prepare("SELECT slug_".$bhs." slug FROM `".$namadepan."modul` WHERE nama = ?");
	$modul->execute(array('pengumuman'));
	$modul->setFetchMode(PDO::FETCH_ASSOC);
	$rmod = $modul->fetch();
	$mod = $rmod['slug'];

$q = "SELECT id,judul_".$bhs." judul,slug_".$bhs." slug,permalink_".$bhs." permalink,date_format(whenentri,'%d %M') tglbln,date_format(whenentri,'%Y') thn FROM `".$namadepan."pengumuman` WHERE `published` = ? ORDER BY `whenentri` DESC limit 6";


$pengu = $dbh->prepare($q);
$pengu->execute(array('y'));
$pengu->setFetchMode(PDO::FETCH_ASSOC);

if ($pengu->rowCount() > 0) {
	while($rpengu = $pengu->fetch())
	{
		
?>

					
					
						<div class="col-lg-6 col-md-12 col-sm-12 wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.3s">
							<div class="dlab-box service-box-2 m-2">
								
								<div class="dlab-info">
									<h4 class="title text-truncate-2"><a href="<?=$pathurl?>/<?=$bhs?>/<?=$mod?>/<?=$rpengu['permalink']?>" title="<?=$rpengu['judul']?>"><?=$rpengu['judul']?></a></h4>
									<div class="dlab-post-meta">
									<ul>
										<li class="post-date"> <strong><?=$rpengu['tglbln']?></strong> <span> <?=$rpengu['thn']?></span> </li>
										
									</ul>
								</div>
								</div>
							
							</div>
						</div>
					
				
			<?php
	}
	?>
	<div class="col-lg-12 m-3 text-center wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.3s">
						<a href="<?=$pathurl?>/pengumuman/" class="site-button button-md btnhover12 radius-xl">Pengumuman Lainnya</a>
	</div>
<?php
}
else {
	?>
	<div class="col-lg-12 col-md-12 col-sm-12 m-b30 wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.3s">
	<div class="alert alert-warning no-bg text-center"> <strong>Mohon maaf,</strong> Pengumuman belum ada. </div>
	</div>
	<?php

}
			?>
		</div>
		</div>
	</div>
	<!-- Features End -->