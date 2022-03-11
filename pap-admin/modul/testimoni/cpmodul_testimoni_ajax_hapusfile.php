<?php
$uploaddir = 'tmp/pengumuman/'; 
    if(isset($_POST['filenyo']))
    {
        $delfile = $koneksi_db->prepare("SELECT id, folder,file from ".$namadepan."pengumuman_file where id = ? order by urut asc");
	    $delfile->execute(array($_POST['filenyo']));
		$delfile->setFetchMode(PDO::FETCH_ASSOC);
		if ($delfile->rowCount() > 0)
		{
		$rdelfile = $delfile->fetch();

        if(file_exists("../images/pengumuman/".$rdelfile['folder'].$rdelfile['file']))
        unlink("../images/pengumuman/".$rdelfile['folder'].$rdelfile['file']);


        $koneksi_db->prepare("delete from ".$namadepan."pengumuman_file where id = ?")->execute(array($rdelfile['id']));
        

    }
       
    }
?>