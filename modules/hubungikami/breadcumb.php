<?php
defined('_JCMS_') or header('Location: ../../');
$potonganroti = sql_query("select judul from ".$namadepan."halaman where id = '$_GET[hid]'");
if (sql_numrows($potonganroti)>0)
{
$bc = sql_fetchrow($potonganroti);
$judulsubmodul = $bc[judul];
}
else
{
$judulsubmodul = "404 - NEWS NOT FOUND";
}
?>