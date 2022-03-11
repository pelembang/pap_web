<div id="left">

<div class="subnav">
				<div class="subnav-title">
									<a href="?" class='toggle-subnav2'><i class="icon-angle-down"></i><span>Dashboard</span></a>
				</div>
			
								
			</div>	

			
			
<?php

$kmodul = $koneksi_db->prepare ("select id,judul,modulink,parameter,icon,tipe,collapse from ".$namadepan."menu_admin where induk = ? and kelompok = ? order by urut asc");


$kmodul->execute(array(0,$rusercp['kelompok']));
$kmodul->setFetchMode(PDO::FETCH_ASSOC);

	while($rkmodul = $kmodul->fetch())
	{
		
$cekmodul = $koneksi_db->prepare("select id from ".$namadepan."menu_admin where induk = ? and concat('cpmodul=',modulink,parameter) = ?");
$cekmodul->execute(array($rkmodul['id'],$_SERVER['QUERY_STRING']));
if($cekmodul->rowCount())
{
$collapse = "";
}
else
{
if($rkmodul['collapse'] == 0)
$collapse = "subnav-hidden";
else
$collapse = "";
}
//$cekmodul->setFetchMode(PDO::FETCH_ASSOC);
?>		
			<div class="subnav <?=$collapse?>">
				<div class="subnav-title">
				<?php 
				if ($rkmodul['tipe'] == 'p')
				{
					$togglesubnav = "";
					$icondown = "<i class=\"icon-angle-down\"></i>";
					$modulink = "#";
					
				}
				else if ($rkmodul['tipe'] == 'm') {
					$togglesubnav = "2";
					$icondown = "";
					$modulink = "?cpmodul=".$rkmodul['modulink'].$rkmodul['parameter'];
				}
				else if ($rkmodul['tipe'] == 'l') {
					$togglesubnav = "2";
					$icondown = "";
					$modulink = $rkmodul['modulink'];
				}
				?>
					<a href="<?=$modulink?>" class='toggle-subnav<?=$togglesubnav?>'><?=$icondown?><span><?=$rkmodul['judul'];?></span></a>
				</div>
			
				<?php
$modul = $koneksi_db->prepare("select judul,modulink,parameter,icon,tipe, concat('cpmodul=',modulink,parameter) active from ".$namadepan."menu_admin where induk = ? and kelompok = ? order by urut asc");
$modul->execute(array($rkmodul['id'],$rusercp['kelompok']));
$modul->setFetchMode(PDO::FETCH_ASSOC);
while($rmodul = $modul->fetch())
{
	 if ($rmodul['tipe'] == 'm') {
					
				if($rmodul['active'] == $_SERVER['QUERY_STRING'])
$active = "class='active'";
else
$active = "";
					$submodulink = "?cpmodul=".$rmodul['modulink'].$rmodul['parameter'];
				}
				else if ($rmodul['tipe'] == 'l') {
					
					
					$submodulink = $rkmodul['modulink'];
				}			
?>			

			<ul class="subnav-menu">
					
					<li <?=$active?>>
						<a href="<?=$submodulink?>" title="<?=$rmodul['judul']?>"><i class="<?=$rmodul['icon']?>"></i> <?=$rmodul['judul']?></a>
					</li>
					
				</ul>
				<?php
}
				?>
				
			</div>
	<?php
	}
?>	
		
			<div class="subnav">
				<div class="subnav-title">
									<a href="?logout" class='toggle-subnav2'><span>Logout</span></a>
				</div>
			
								
			</div>	

				
			
		</div>
