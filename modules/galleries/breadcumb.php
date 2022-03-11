<?php
defined('_JCMS_') or header('Location: ../../');



$potonganroti = $dbh->prepare("select judul from ".$namadepan."fotogaleri where id = '$_GET[fid]'");
$potonganroti->execute();
$potonganroti->setFetchMode(PDO::FETCH_ASSOC);
if ($potonganroti->rowCount() > 0)
{
$bc = $potonganroti->fetch();
$judulsubmodul = $bc[judul];
}
else
{
$judulsubmodul = "404 - PHOTO NOT FOUND";
}
?>