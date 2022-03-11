<?php
defined('_JCMS_') or header('Location: ../../');
global $dbh,$namadepan;
?>
 <!-- Courses -->
 <div class="section-full content-inner bg-white wow fadeIn" data-wow-duration="2s" data-wow-delay="0.6s" style="background-image:url(images/overlay/brilliant.png);">
				<div class="container">
					<div class="section-head text-black text-center">
						<h2 class="title">Program Studi</h2>
						<p>Politeknik Akamigas Palembang, memiliki 4 (empat) Program Studi yang terdiri dari : </p>
					</div>	
					<?php

$modul = $dbh->prepare("SELECT slug_".$bhs." slug FROM `".$namadepan."modul` WHERE nama = ?");
						$modul->execute(array('prodi'));
						$modul->setFetchMode(PDO::FETCH_ASSOC);
						$rmod = $modul->fetch();
						$mod = $rmod['slug'];


$q = "SELECT id,nama_".$bhs." nama,slug_".$bhs." slug,singkatan,akreditasi,lama,strata FROM `".$namadepan."prodi` ORDER BY `id` ASC";


$pengu = $dbh->prepare($q);
$pengu->execute();
$pengu->setFetchMode(PDO::FETCH_ASSOC);

if ($pengu->rowCount() > 0) {
	?>
<div class="clearfix" id="lightgallery">
<ul id="masonry" class="portfolio-ic row dlab-gallery-listing gallery-grid-4 lightgallery">
	<?php
	while($rpengu = $pengu->fetch())
	{
		

		?>
					
						
							<li class="card-container col-lg-3 col-md-6 col-sm-6 web">
								<div class="courses-bx style1">
									<div class="courses-media"> 
										<a href="<?=$pathurl?>/<?=$bhs?>/<?=$mod?>/<?=$rpengu['slug']?>"><img src="<?=$pathurl?>/images/prodi/<?=$rpengu['id']?>.jpg" alt=""></a> 
										<div class="post-meta">
											<ul>
												<li class="post-date text-primary"> <i class="fas fa-calendar-alt"></i> <span> <?=$rpengu['lama']?> Tahun </span> </li>
												<!-- <li class="post-author"><i class="fas fa-comment"></i> <span> 1</span></li> -->
												<li class="post-comment float-end text-primary"><i class="fas fa-graduation-cap"></i> <?=$rpengu['strata']?></li>
											</ul>
										</div>
									</div>
									<div class="dlab-info">
										<div class="course-author">
											<div class="author">
												<img src="<?=$pathurl?>/images/prodi/<?=$rpengu['akreditasi']?>.jpg" alt="">
											</div>
										</div>
										<div class="author-contain">
											<span>TERAKREDITASI "<?=$rpengu['akreditasi']?>" BAN-PT</span>
										</div>
										<div class="dlab-title"><a href="<?=$pathurl?>/<?=$bhs?>/<?=$mod?>/<?=$rpengu['slug']?>"><?=$rpengu['nama']?> (<?=$rpengu['singkatan']?>)</a></div>
									</div>
								</div>
							</li>
							
							
							
						

<?php
				}
				?>
</ul>
					</div>
				<?php
			}
?>

				</div>
			</div>
			<!-- Courses End -->