

				<div class="page-header">
					<div class="pull-left">
						<h1>Dashboard</h1>
					</div>

				</div>
				
				

					<div class="row-fluid">
						<div class="span12">

							


								
								
							
								<ul class="tiles">
									<?php
$modul = $koneksi_db->prepare("select judul,modulink,parameter,icon,color,tipe from ".$namadepan."menu_admin where tipe != ? and kelompok = ? order by urut_dashboard asc");
$modul->execute(array('p',$rusercp['kelompok']));
$modul->setFetchMode(PDO::FETCH_ASSOC);
while($rmodul = $modul->fetch())
{

	if ($rmodul['tipe'] == 'm') {
					
					$modulink = "?cpmodul=".$rmodul['modulink'].$rmodul['parameter'];
				}
				else if ($rmodul['tipe'] == 'l') {
					
					$modulink = $rmodul['modulink'];
				}

									?>
								 
<li class="<?=$rmodul['color']?> long high">

								<a href="<?=$modulink?>"><span class='count'><i class="<?=$rmodul['icon']?>"></i></span><span class='name'><?=$rmodul['judul']?></span></a>
							</li>
								
								  <?php
}
								  ?>
								 
								  <li class="red long high">

								<a href="?logout"><span class='count'><i class="icon-signout"></i></span><span class='name'>Logout</span></a>
							</li>
								</ul>
							 

									

									

								

					</div>

					

					
					</div>


					

					

					
					
	
	
				
				
		