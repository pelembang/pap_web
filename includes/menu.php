<?php
defined('_JCMS_') or header('Location: ../');




function loop($id) {
        global $koneksi_db, $menu, $namadepan, $pathurl,$dbh, $bhs;
$sth3 = $dbh->prepare("SELECT `id`,`tipe`,`judul_".$bhs."` judul  ,`modul`,`link`, `parameter_".$bhs."` parameter FROM `".$namadepan."menu` WHERE `subid` = '$id' and `published` = 'y' ORDER BY `ordering`");
	$sth3->execute();
	$sth3->setFetchMode(PDO::FETCH_ASSOC);
		
	
	
	
        
        if ($sth3->rowCount() > 0) {
			
                $menu .= "<ul class=\"sub-menu\">\n";
				while($rwsub = $sth3->fetch()) {
                
                if ($rwsub['tipe'] == 'l')
				{
                $links = $rwsub['link'];
                $classmild = "";
				}
				else if ($rwsub['tipe'] == 'm')
                {
                if ($rwsub['modul'] == 'halaman')
				{
                $parameter = $rwsub['parameter'];
                $links = $pathurl."/".$parameter;
				$classmild = "";
                }
				else
				{
				$parameter = $rwsub['parameter'];
				$links = $pathurl."/".$parameter;
				$classmild = "";
				}
				}
                else if ($rwsub['tipe'] == 'p')
				{
                $links = $rwsub['link'];
				$classmild = "<i class=\"fas fa-angle-right\"></i>";
				}
                        $menu .= "<li><a href=\"$links\" class=\"text-truncate\" title=\"".($rwsub['judul'])."\">".($rwsub['judul'])." $classmild</a>";
						
						$sth = $dbh->prepare("SELECT `id`,`tipe`,`judul_".$bhs."` judul,`modul`,`link`, `parameter_".$bhs."` parameter FROM `".$namadepan."menu` WHERE `id` = '$id' and `published` = 'y' ORDER BY `ordering`");
	$sth->execute();
	$sth->setFetchMode(PDO::FETCH_ASSOC);
	
	
	
	
						
                        
                        if ($sth->rowCount() > 0) {
							while($rwsub2 = $sth->fetch()) {	
                                
                                       loop($rwsub['id']);
                                }
                        }
                        $menu .= "</li>\n";
                }
                $menu .= "</ul>\n";
        }
        else
        {
        $menu .= "";
        }
       
}

$sth2 = $dbh->prepare("SELECT `id`,`tipe`,`judul_".$bhs."` judul,`modul`,`link`, `parameter_".$bhs."` parameter FROM `".$namadepan."menu` WHERE `subid` = '0' and `published` = 'y' ORDER BY `ordering`");
	$sth2->execute();
	$sth2->setFetchMode(PDO::FETCH_ASSOC);
	
	
	
	


$menu = "<ul class=\"nav navbar-nav\">	\n";
$jrsmenu = $sth2->rowCount();
if ($sth2->rowCount() > 0)
{
	while($rwmenu = $sth2->fetch()) {
		

	
if ($rwmenu['tipe'] == 'l')
{
$links = $rwmenu['link'];
$lisub = "<li><a href=\"$links\">";
$dropdownli = " ";
}
else if ($rwmenu['tipe'] == 'm')
{
                if ($rwmenu['modul'] == 'halaman')
				{
                $parameter = $rwmenu['parameter'];
                $links = $pathurl."/".$parameter;
				}
				else
				{
				$parameter = $rwmenu['parameter'];
				$links = $pathurl."/".$parameter;
				}
				
$lisub = "<li><a href=\"$links\">";
$dropdownli = " ";
				}
else if ($rwmenu['tipe'] == 'p')
{
$links = $rwmenu['link'];
$lisub = "<li><a href=\"#\">";
$dropdownli = " <i class=\"fas fa-chevron-down\"></i> ";
}


        $menu .= $lisub.($rwmenu['judul']);
        $menu .= "$dropdownli </a>\n";
       loop($rwmenu['id']);
       $menu .= "</li>\n";
}

$menu .= "</ul>\n";
}
else
{
$menu .= "";
}






