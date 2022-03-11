<?php
defined('_JCMS_') or header('Location: ../../');
$potonganroti = $dbh->prepare("select judul from ".$namadepan."halaman where id = '$_GET[hid]'");
$potonganroti->execute();
$potonganroti->setFetchMode(PDO::FETCH_ASSOC);
if ($potonganroti->rowCount() > 0)
{
$bc = $potonganroti->fetch();
$judulsubmodul = $bc[judul];
}
else
{
$judulsubmodul = "404 - NEWS NOT FOUND";
}
?>