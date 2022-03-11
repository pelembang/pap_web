<?php
defined('_JCMS_') or header('Location: ../../');
global $dbh,$namadepan, $bhs;
?>
 <!-- Latests News -->
 <div class="section-full content-inner bg-gray wow fadeIn" data-wow-duration="2s" data-wow-delay="0.6s">
				<div class="container">
					<div class="section-head text-black text-center">
						<h2 class="title">Berita Terkini</h2>
						
					</div>
					

						<?php


						
						
						$modul = $dbh->prepare("SELECT slug_".$bhs." slug FROM `".$namadepan."modul` WHERE nama = ?");
						$modul->execute(array('berita'));
						$modul->setFetchMode(PDO::FETCH_ASSOC);
						$rmod = $modul->fetch();
						$mod = $rmod['slug'];

						$q = "SELECT id,judul_".$bhs." judul ,slug_".$bhs." slug ,permalink_".$bhs." permalink,date_format(whenentri,'%d %M') tglbln,date_format(whenentri,'%Y') thn FROM `".$namadepan."berita` WHERE `published` = ? ORDER BY `whenentri` DESC limit 6";
						
						
						$pengu = $dbh->prepare($q);
						$pengu->execute(array('y'));
						$pengu->setFetchMode(PDO::FETCH_ASSOC);
						
						if ($pengu->rowCount() > 0) {
?>
<div id="masonry" class="dlab-blog-grid-3 row">
<?php
							while($rpengu = $pengu->fetch())
							{
								
						
								?>

<div class="post card-container col-lg-4 col-md-6 col-sm-12">
                            <div class="blog-post blog-grid blog-rounded blog-effect1">
                                <div class="dlab-post-media dlab-img-effect"> 
								<img src="<?=$pathurl?>/images/berita/1000x600.jpg" alt="">
								</div>
								<div class="dlab-info p-a20">
                                    <div class="dlab-post-meta">
										<ul>
											
											<li class="post-tag"> Berita PAP </li>
										</ul>
									</div>
									<div class="dlab-post-title ">
									<h4 class="post-title text-truncate-2"><a href="<?=$pathurl?>/<?=$bhs?>/<?=$mod?>/<?=$rpengu['permalink']?>" title="<?=$rpengu['judul']?>"><?=$rpengu['judul']?></a></h4>
                                    </div>
                                    
									<div class="post-footer">
										<div class="dlab-post-meta">
											<ul>
											<li class="post-date"> <i class="la la-clock"></i> <strong><?=$rpengu['tglbln']?></strong> <span> <?=$rpengu['thn']?></span> </li>
											</ul>
										</div>
										
									</div>
                                </div>
                            </div>
                        </div>
























						
						


						<?php
					}

					?>
<div class="col-lg-12 m-3 text-center wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.3s">
						<a href="<?=$pathurl?>/berita/" class="site-button button-md btnhover12 radius-xl">Berita Lainnya</a>
	</div>
					
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
			<!-- Latest News End -->