<?php
if(!defined("INCLUDE_FILE_INI")) { die ("Access denied"); }
$namamodul = basename(dirname(__FILE__));
$modulread = $koneksi_db->prepare("SELECT ".$namadepan."syshakakses.modul FROM ".$namadepan."modul, ".$namadepan."syshakakses WHERE ".$namadepan."modul.published = 'y' AND ".$namadepan."modul.end = 'y' AND ".$namadepan."modul.nama = ".$namadepan."syshakakses.modul AND ".$namadepan."syshakakses.kelompok = $rusercp[kelompok] AND ".$namadepan."syshakakses.aktif = 'y' AND ".$namadepan."modul.nama = '$_GET[cpmodul]'");
$modulread->execute();
$modulread->setFetchMode(PDO::FETCH_ASSOC);
if ($modulread->rowCount() > 0)
{

$modultambah = $koneksi_db->prepare("SELECT ".$namadepan."syshakakses.modul FROM ".$namadepan."modul, ".$namadepan."syshakakses WHERE ".$namadepan."modul.published = 'y' AND ".$namadepan."modul.end = 'y' AND ".$namadepan."modul.nama = ".$namadepan."syshakakses.modul AND ".$namadepan."syshakakses.kelompok = $rusercp[kelompok] AND ".$namadepan."syshakakses.aktif = 'y' AND ".$namadepan."modul.nama = '$_GET[cpmodul]' AND ".$namadepan."syshakakses.tambah = 'y'");
$modultambah->execute();
$modultambah->setFetchMode(PDO::FETCH_ASSOC);

$modulubah = $koneksi_db->prepare("SELECT ".$namadepan."syshakakses.modul FROM ".$namadepan."modul, ".$namadepan."syshakakses WHERE ".$namadepan."modul.published = 'y' AND ".$namadepan."modul.end = 'y' AND ".$namadepan."modul.nama = ".$namadepan."syshakakses.modul AND ".$namadepan."syshakakses.kelompok = $rusercp[kelompok] AND ".$namadepan."syshakakses.aktif = 'y' AND ".$namadepan."modul.nama = '$_GET[cpmodul]' AND ".$namadepan."syshakakses.ubah = 'y'");
$modulubah->execute();
$modulubah->setFetchMode(PDO::FETCH_ASSOC);

$modulhapus = $koneksi_db->prepare("SELECT ".$namadepan."syshakakses.modul FROM ".$namadepan."modul, ".$namadepan."syshakakses WHERE ".$namadepan."modul.published = 'y' AND ".$namadepan."modul.end = 'y' AND ".$namadepan."modul.nama = ".$namadepan."syshakakses.modul AND ".$namadepan."syshakakses.kelompok = $rusercp[kelompok] AND ".$namadepan."syshakakses.aktif = 'y' AND ".$namadepan."modul.nama = '$_GET[cpmodul]' AND ".$namadepan."syshakakses.hapus = 'y'");
$modulhapus->execute();
$modulhapus->setFetchMode(PDO::FETCH_ASSOC);

if (isset($_GET['aksi']))
{
if ($_GET['aksi'] == 'tambah')
{
if ($modultambah->rowCount() > 0)
{
if (isset($_POST['submit']))
{
if (empty($_POST['judul']))
$error1 = _ERRORMENU1_;
if ($_POST['submit'] == _SIMPAN_ AND !empty($_POST['judul'])AND $errorfile <> 1)
{
if ($_POST['tipe'] == 'p')
{
$query = "tipe, link";
$values = "'p', '#'";
}
else if ($_POST['tipe'] == 'm')
{
if ($_POST['modul'] == 'halaman')
{
$query = "tipe, modul, parameter";
$values = "'m', '$_POST[modul]', '$_POST[submodul]'";
}
else
{
$query = "tipe, modul";
$values = "'m', '$_POST[modul]'";
}
}
else if ($_POST['tipe'] == 'l')
{
$query = "tipe, link";
$values = "'l', '$_POST[link]'";
}
$max = $koneksi_db->prepare("SELECT max(ordering) as maxmenu FROM ".$namadepan."menu WHERE subid = $_POST[subid]");
$max->execute();
$max->setFetchMode(PDO::FETCH_ASSOC);
$rmax = $max->fetch();
$maxmenu = $rmax['maxmenu'] + 1;

$menuin = $koneksi_db->prepare("INSERT INTO ".$namadepan."menu (subid, ordering, judul_id judul, judul_en, $query, whoentri, whereentri, whenentri, published) VALUES ('$_POST[subid]', $maxmenu, '$_POST[judul]', $values, '$_SESSION[sesi_user]', '$ipnyo', now(), 'y')");
$menuin->execute();

header ("Location: ?cpmodul=$namamodul");
}
}
echo "<form action=\"\" method=\"post\" name=\"entrimenu\">\n";
echo "<font size=\"2\" face=\"arial\"><b>"._INDUKMENU_." :</b> </font><br />";
echo "<select name=\"subid\">\n";
echo "<option value=\"0\">-</option>\n";
$subid = $koneksi_db->prepare("SELECT id, judul_id judul , judul_en , subid FROM ".$namadepan."menu WHERE tipe = 'p' ORDER BY id");
$subid->execute();
$subid->setFetchMode(PDO::FETCH_ASSOC);

while ($rsubid = $subid->fetch())
{
if ($rsubid['subid'] == '0')
$judul = $rsubid['judul'];
else
$judul = "$rsubid[judul] ["._INDUK_." : $rsubid[subid]]";
echo "<option value=\"$rsubid[id]\">(id : $rsubid[id]) $judul</option>\n";
}
echo "</select><p/>\n";
echo "<font size=\"2\" face=\"arial\"><b>"._JUDULMENU_.":</b> <font color=\"#ff0000\">$error1</font></font><br />";
echo "<input type=\"text\" name=\"judul\" size=\"50\" maxlength=\"100\" value=\"$_POST[judul]\"/><p />\n";

echo "<font size=\"2\" face=\"arial\"><b>"._TIPEMENU_." :</b> </font><br />";
echo "<input type=\"radio\" name=\"tipe\" value=\"p\" checked/> "._TIPEMENU1_."<p />\n";
echo "<input type=\"radio\" name=\"tipe\" value=\"m\" /> ";
echo _TIPEMENU2_." : \n";


echo "<script language=\"javascript\" type=\"text/javascript\">\n";
echo "function dropdownlist(listindex)\n";
echo "{\n";

echo "document.entrimenu.submodul.options.length = 0;\n";
echo "switch (listindex)\n";
echo "{\n";

echo "case \"halaman\" :\n";
echo "document.entrimenu.submodul.options[0]=new Option(\"Pilih Halaman\",\"\");\n";
$hal = $koneksi_db->prepare("SELECT id, judul_id judul, judul_en FROM ".$namadepan."halaman WHERE  published = 'y'");
$hal->execute();
$hal->setFetchMode(PDO::FETCH_ASSOC);

$x = 1;
while ($rhal  = $hal->fetch())
{
echo "document.entrimenu.submodul.options[$x]=new Option(\"$rhal[judul]\", \"$rhal[id]/".sanitize_title_with_dashes($rhal['judul'])."\");\n";
$x++;
}
echo "break;\n";

echo "default :\n";
echo "document.entrimenu.submodul.options[0]=new Option(\"-\",\"\");\n";
echo "break;\n";

echo "}\n";
echo "return true;\n";
echo "}\n";
echo "</script>\n";




echo "<select name=\"modul\" id=\"modul\" onchange=\"javascript: dropdownlist(this.options[this.selectedIndex].value);\">\n";
//echo "<select name=\"modul\">\n";

echo "<option value=\"0\">"._PILIHMODUL_."</option>\n";
$mod=$koneksi_db->prepare("SELECT ketmenu nama, lengkap_id FROM ".$namadepan."modul WHERE menu = 'y' AND front = 'y' AND published = 'y'");
$mod->execute();
$mod->setFetchMode(PDO::FETCH_ASSOC);
while($rmod = $mod->fetch())
{
echo "<option value=\"$rmod[nama]\">$rmod[lengkap_id]</option>\n";
}

echo "</select> \n";

echo "<script type=\"text/javascript\" language=\"JavaScript\">\n";
echo "document.write('<select name=\"submodul\"><option value=\"\">-</option></select>')\n";
echo "</script>\n";
echo "<noscript><select name=\"submodul\" id=\"submodul\" >\n";
echo "<option value=\"\">Parameter</option>\n";
echo "</select>\n";
echo "</noscript>\n";

echo "<p />\n";
echo "<input type=\"radio\" name=\"tipe\" value=\"l\" /> ";
echo _TIPEMENU3_."\n";
echo "<input type=\"text\" name=\"link\" size=\"50\" />\n";
echo "<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font size=\"1\" face=\"arial\">"._TIPEMENU3KET_."</font><p/>";

echo "<input type=\"submit\" name=\"submit\" value=\""._SIMPAN_."\" /> <input type=\"button\" name=\"batal\" value=\""._BATAL_."\" />\n";

echo "</form>\n";

}
else
header ("Location: ?cpmodul=$namamodul");

}
else if ($_GET['aksi'] == 'ubah')
{
if ($modulubah->rowCount() > 0)
{
$jumdata = $koneksi_db->prepare("SELECT id, modid, subid, ordering, judul_id judul, judul_en, tipe, modul, parameter_id parameter,parameter_en, link FROM ".$namadepan."menu WHERE id = $_GET[id]");
$jumdata->execute();
$jumdata->setFetchMode(PDO::FETCH_ASSOC);
if ($jumdata->rowCount() > 0)
{
$rjumdata = $jumdata->fetch();
$id = $rjumdata['id'];
$subidnyo = $rjumdata['subid'];
$ordering = $rjumdata['ordering'];
$judulnyo = $rjumdata['judul'];
$judulnyo_en = $rjumdata['judul_en'];
$tipe = $rjumdata['tipe'];
$modul = $rjumdata['modul'];
$parameter = $rjumdata['parameter'];
$link = $rjumdata['link'];



$idhal = $rjumdata['modid'];
$error1 = "";

if (isset($_POST['submit']))
{
if (empty($_POST['judul']))
$error1 = _ERRORMENU1_;
if ($_POST['submit'] == _UBAH_ AND !empty($_POST['judul'])AND $errorfile <> 1)
{
if ($_POST['tipe'] == 'p')
{
$query = "tipe = 'p', link = '#'";
}
else if ($_POST['tipe'] == 'm')
{
  $cekmod = $koneksi_db->prepare("select slug_id, slug_en from ".$namadepan."modul where nama = ?");
  $cekmod->execute(array($_POST['modul']));
  $cekmod->setFetchMode(PDO::FETCH_ASSOC);
  $rcekmod = $cekmod->fetch();


  if ($_POST['modul'] == 'halaman')
{
    $cekhal = $koneksi_db->prepare("select permalink_id, permalink_en from ".$namadepan."halaman where id = ?");
    $cekhal->execute(array($_POST['submodul']));
    $cekhal->setFetchMode(PDO::FETCH_ASSOC);
    $rcekhal = $cekhal->fetch();

$query = "tipe = 'm', modul='$_POST[modul]', parameter_id='id/$rcekhal[permalink_id]', parameter_en='en/$rcekhal[permalink_en]', modid = ".$_POST['submodul'];
}
else if ($_POST['modul'] == 'prodi')
{

  
    $cekprd = $koneksi_db->prepare("select slug_id, slug_en from ".$namadepan."prodi where id = ?");
    $cekprd->execute(array($_POST['submodul']));
    $cekprd->setFetchMode(PDO::FETCH_ASSOC);
    $rcekprd = $cekprd->fetch();

$query = "tipe = 'm', modul='$_POST[modul]', parameter_id='id/$rcekmod[slug_id]/$rcekprd[slug_id]', parameter_en='en/$rcekmod[slug_en]/$rcekprd[slug_en]', modid = ".$_POST['submodul'];
}
else
{
$query = "tipe = 'm', modul = '$_POST[modul]', parameter_id = '$rcekmod[slug_id]', parameter_en = '$rcekmod[slug_en]'";
}
}
else if ($_POST['tipe'] == 'l')
{
$query = "tipe = 'l', link = '$_POST[link]'";
}
$max = $koneksi_db->prepare("SELECT max(ordering) as maxmenu FROM ".$namadepan."menu WHERE subid = $_POST[subid]");
$max->execute();
$max->setFetchMode(PDO::FETCH_ASSOC);
$rmax = $max->fetch();
$maxmenu = $rmax['maxmenu'] + 1;
if ($_POST['subidlamo'] <> $_POST['subid'])
{
$orderbesak = $koneksi_db->prepare("select id from ".$namadepan."menu where ordering > $_POST[orderinglamo] AND subid = $_POST[subidlamo]");
$orderbesak->execute();
$orderbesak->setFetchMode(PDO::FETCH_ASSOC);
while ($robesak = $orderbesak->fetch())
{
$ubahorder = $koneksi_db->prepare("update ".$namadepan."menu set ordering= $_POST[orderinglamo] where id = '$robesak[id]' AND subid = $_POST[subidlamo]");
$ubahorder->execute();

$_POST['orderinglamo']++;
}

$subidordering = "subid = $_POST[subid], ordering = $maxmenu,";
}
if(empty($_POST['judul_en']))
$judul_en = $_POST['judul'];
else
$judul_en = $_POST['judul_en'];
$updt = $koneksi_db->prepare("UPDATE ".$namadepan."menu SET $subidordering judul_id = '$_POST[judul]',judul_en = '$judul_en', $query, whoubah = '$_SESSION[sesi_user]', whereubah = '$ipnyo', whenubah = now() WHERE id = $_POST[id] ");
$updt->execute();
$updt->setFetchMode(PDO::FETCH_ASSOC);
header ("Location: ?cpmodul=$namamodul");
}
}
echo "<form action=\"\" method=\"post\" name=\"ubahmenu\">\n";
echo "<font size=\"2\" face=\"arial\"><b>"._INDUKMENU_." :</b> </font><br />";
echo "<input type=\"hidden\" name=\"subidlamo\" value=\"$subidnyo\" /><input type=\"hidden\" name=\"orderinglamo\" value=\"$ordering\" /><input type=\"hidden\" name=\"id\" value=\"$id\" /><select name=\"subid\">\n";
echo "<option value=\"0\">-</option>\n";
$subid = $koneksi_db->prepare("SELECT id, judul_id judul, juduL_en, subid FROM ".$namadepan."menu WHERE tipe = 'p' AND id <> $id ORDER BY id");
$subid->execute();
$subid->setFetchMode(PDO::FETCH_ASSOC);

while ($rsubid = $subid->fetch())
{
if ($rsubid['subid'] == '0')
$judul = $rsubid['judul'];
else
$judul = "$rsubid[judul] ["._INDUK_." : $rsubid[subid]]";
if ($subidnyo == $rsubid['id'])
$selected = "SELECTED";
else
$selected = "";
echo "<option value=\"$rsubid[id]\" $selected>(id : $rsubid[id]) $judul</option>\n";
}
echo "</select><p/>\n";
echo "<font size=\"2\" face=\"arial\"><b>"._JUDULMENU_.":</b> <font color=\"#ff0000\">$error1</font></font><br />";
echo "<input type=\"text\" name=\"judul\" size=\"50\" maxlength=\"100\" value=\"$judulnyo\"/> \n";
echo "<input type=\"text\" name=\"judul_en\" size=\"50\" maxlength=\"100\" value=\"$judulnyo_en\"/><p />\n";

echo "<font size=\"2\" face=\"arial\"><b>"._TIPEMENU_." :</b> </font><br />";
if ($tipe == 'p')
$checkedP = "checked";
else
$checkedP = "";

if ($tipe == 'm')
$checkedM = "checked";
else
$checkedM = "";


if ($tipe == 'l')
$checkedL = "checked";
else
$checkedL = "";

echo "<input type=\"radio\" name=\"tipe\" value=\"p\" $checkedP/> "._TIPEMENU1_."<p />\n";
echo "<input type=\"radio\" name=\"tipe\" value=\"m\" $checkedM/> ";
echo _TIPEMENU2_." : \n";




echo "<select name=\"modul\" id=\"modul\">\n";
//echo "<select name=\"modul\">\n";

echo "<option value=\"0\">"._PILIHMODUL_."</option>\n";
$mod=$koneksi_db->prepare("SELECT ketmenu, nama, lengkap_id FROM ".$namadepan."modul WHERE menu = 'y' AND front = 'y' AND published = 'y'");
$mod->execute();
$mod->setFetchMode(PDO::FETCH_ASSOC);

while($rmod = $mod->fetch())
{
if ($tipe == 'm' AND $modul == $rmod['nama'])
$selected = "SELECTED";
else
$selected = "";
echo "<option value=\"$rmod[nama]\" $selected>$rmod[lengkap_id]</option>\n";
}

echo "</select> \n";

echo "<script type=\"text/javascript\" language=\"JavaScript\">\n";

echo '(function() {
    $("#modul").change(function() {
      if($(this).val() === "halaman")
      {
        $("#submodul").append("';
 
      
        $halsubmodul = $koneksi_db->prepare("SELECT id, judul_id judul, permalink_id permalink FROM ".$namadepan."halaman WHERE published = 'y'");
        $halsubmodul->execute();
        $halsubmodul->setFetchMode(PDO::FETCH_ASSOC);
        
        $y = 1;
        while ($rhalsbmd  = $halsubmodul->fetch())
        {
        
        if ($idhal == $rhalsbmd['id'])
        $selectedPAR = "SELECTED";
        else
        $selectedPAR = "";
        echo "<option value=\\\"".$rhalsbmd['id']."\\\" $selectedPAR>$rhalsbmd[judul]</option>";
        $y++;
        }
       

      
        echo '")}
        if($(this).val() === "prodi")
      {
        $("#submodul").append("';


        $prdsubmodul = $koneksi_db->prepare("SELECT id, nama_id nama, singkatan FROM ".$namadepan."prodi");
        $prdsubmodul->execute();
        $prdsubmodul->setFetchMode(PDO::FETCH_ASSOC);
        
        $y = 1;
        while ($rprdsbmd  = $prdsubmodul->fetch())
        {
        
        if ($idhal == $rprdsbmd['id'])
        $selectedPAR = "SELECTED";
        else
        $selectedPAR = "";
        echo "<option value=\\\"".$rprdsbmd['id']."\\\" $selectedPAR>$rprdsbmd[singkatan] - $rprdsbmd[nama]</option>";
        $y++;
        }
       


        echo '")}
      else
      {
        
            
            $("#submodul").empty().append("<option value=\"\">Parameter</option>");
        
    }
    });
    
    }());';

echo "</script>\n";
echo "<select name=\"submodul\" id=\"submodul\" >\n";
echo "<option value=\"\">Parameter</option>\n";

if ($tipe == 'm' AND $modul == 'halaman')
{
$halsubmodul = $koneksi_db->prepare("SELECT id, judul_id judul, permalink_id permalink FROM ".$namadepan."halaman WHERE published = 'y'");
$halsubmodul->execute();
$halsubmodul->setFetchMode(PDO::FETCH_ASSOC);

$y = 1;
while ($rhalsbmd  = $halsubmodul->fetch())
{
$halpar = $rhalsbmd['id'];
if ($idhal == $halpar)
$selectedPAR = "SELECTED";
else
$selectedPAR = "";
echo '<option value="'.$rhalsbmd['id'].'" '.$selectedPAR.'>'.$rhalsbmd['judul'].'</option>';
$y++;
}
}
else if ($tipe == 'm' AND $modul == 'prodi')
{
$prdsubmodul = $koneksi_db->prepare("SELECT id, nama_id judul, singkatan FROM ".$namadepan."prodi");
$prdsubmodul->execute();
$prdsubmodul->setFetchMode(PDO::FETCH_ASSOC);

$y = 1;
while ($rprdsbmd  = $prdsubmodul->fetch())
{
$halpar = $rprdsbmd['id'];
if ($idhal == $halpar)
$selectedPAR = "SELECTED";
else
$selectedPAR = "";
echo '<option value="'.$rprdsbmd['id'].'" '.$selectedPAR.'>'.$rprdsbmd['singkatan'].' - '.$rprdsbmd['judul'].'</option>';
$y++;
}
}
echo "</select>\n";


echo "<p />\n";
echo "<input type=\"radio\" name=\"tipe\" value=\"l\" $checkedL/> ";
echo _TIPEMENU3_."\n";
echo "<input type=\"text\" name=\"link\" size=\"50\" value=\"$link\" />\n";
echo "<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font size=\"1\" face=\"arial\">"._TIPEMENU3KET_."</font><p/>";

echo "<input type=\"submit\" name=\"submit\" value=\""._UBAH_."\" /> <input type=\"button\" name=\"batal\" value=\""._BATAL_."\" />\n";

echo "</form>\n";
}
else
header ("Location: ?cpmodul=$namamodul");
}
else
header ("Location: ?cpmodul=$namamodul");

}
else if ($_GET['aksi'] == 'hapus')
{
if ($modulhapus->rowCount() > 0)
{
$jumdata = $koneksi_db->prepare("SELECT id, subid, ordering FROM ".$namadepan."menu WHERE id = $_GET[id] ");
$jumdata->execute();
$jumdata->setFetchMode(PDO::FETCH_ASSOC);

$hpsmenu = $jumdata->fetch();
if ($jumdata->rowCount() > 0)
{
$orderbesak = $koneksi_db->prepare("select id from ".$namadepan."menu where ordering > $hpsmenu[ordering] AND subid = $hpsmenu[subid]");
$orderbesak->execute();
$orderbesak->setFetchMode(PDO::FETCH_ASSOC);

while ($robesak = $orderbesak->fetch())
{
$ubahorder = $koneksi_db->prepare("update ".$namadepan."menu set ordering= '$hpsmenu[ordering]' where id = '$robesak[id]' AND subid = $hpsmenu[subid]");
$ubahorder->execute();


$hpsmenu['ordering']++;
}

$hpsmenunian = $koneksi_db->prepare("DELETE FROM ".$namadepan."menu WHERE id = '$_GET[id]'");
$hpsmenunian->execute();



header ("Location: ?cpmodul=$namamodul");
}
else
{
header ("Location: ?cpmodul=$namamodul");
}
}
else
header ("Location: ?cpmodul=$namamodul");
}
else if ($_GET['aksi'] == 'ngurutke')
{
if ($modulubah->rowCount() > 0)
{
$jumdata = $koneksi_db->prepare("SELECT id, ordering FROM ".$namadepan."menu WHERE id = '$_GET[id]' ");
$jumdata->execute();
$jumdata->setFetchMode(PDO::FETCH_ASSOC);

if ($jumdata->rowCount() > 0)
{
$ordermenu1 = $koneksi_db->prepare("UPDATE ".$namadepan."menu set ordering = '$_GET[ordert]' WHERE id = '$_GET[id]'");
$ordermenu1->execute();


$ordermenu2 = $koneksi_db->prepare("UPDATE ".$namadepan."menu set ordering = '$_GET[order]' WHERE id = '$_GET[idt]'");
$ordermenu2->execute();



header ("Location: ?cpmodul=$namamodul");
}
else
{
header ("Location: ?cpmodul=$namamodul");
}
}
else
header ("Location: ?cpmodul=$namamodul");
}
else if ($_GET['aksi'] == 'published')
{
if ($modulubah->rowCount() > 0)
{
$jumdata = $koneksi_db->prepare("SELECT id, published FROM ".$namadepan."menu WHERE id = '$_GET[id]'");
$jumdata->execute();
$jumdata->setFetchMode(PDO::FETCH_ASSOC);

if ($jumdata->rowCount() > 0)
{
$rjumdata = $jumdata->fetch();
if ($rjumdata['published'] == 'y')
{
$pubmenu = $koneksi_db->prepare("UPDATE ".$namadepan."menu SET published = 't', whoubah = '$_SESSION[sesi_user]' , whereubah = '$ipnyo', whenubah = now() WHERE id = $_GET[id]");
$pubmenu->execute();


}
else
{
$pubmenu = $koneksi_db->prepare("UPDATE ".$namadepan."menu SET published = 'y', whoubah = '$_SESSION[sesi_user]' , whereubah = '$ipnyo', whenubah = now() WHERE id = $_GET[id]");
$pubmenu->execute();


}
header ("Location: ?cpmodul=$namamodul");
}
else
{
header ("Location: ?cpmodul=$namamodul");
}
}
else
header ("Location: ?cpmodul=$namamodul");
}
else
{
header ("Location: ?cpmodul=$namamodul");
}
}
else
{


if ($modultambah->rowCount() > 0)
echo "<p><a href=\"?cpmodul=$namamodul&aksi=tambah\"><img src=\"gambar/new.png\" border=\"0\" alt=\""._MASUKANMENUBARU_."\" title=\""._MASUKANMENUBARU_."\" /></a></p>\n";

$linkurut1 = "<font face=\"arial\" size=\"2\" color=\"#ffffff\">Order</font>";
$linkurut2 = "<font face=\"arial\" size=\"2\" color=\"#ffffff\">"._JUDULMENU_."</font>";
$linkurut3 = "<font face=\"arial\" size=\"2\" color=\"#ffffff\">"._INDUKMENU_."</font>";
$linkurut4 = "<font face=\"arial\" size=\"2\" color=\"#ffffff\">"._PEMAKAI_."</font>";
$linkurut5 = "<font face=\"arial\" size=\"2\" color=\"#ffffff\">"._ALAMATIP_."</font>";
$linkurut6 = "<font face=\"arial\" size=\"2\" color=\"#ffffff\">"._WAKTU_."</font>";
$linkurut7 = "<font face=\"arial\" size=\"2\" color=\"#ffffff\">"._PEMAKAI_."</font>";
$linkurut8 = "<font face=\"arial\" size=\"2\" color=\"#ffffff\">"._ALAMATIP_."</font>";
$linkurut9 = "<font face=\"arial\" size=\"2\" color=\"#ffffff\">"._WAKTU_."</font>";
$linkurut10 = "<font face=\"arial\" size=\"2\" color=\"#ffffff\">"._PUBLIKASI_."</font>";

$menucp = $koneksi_db->prepare("SELECT id, ordering, judul_id judul, judul_en,subid, whoentri, whereentri, whenentri, whoubah, whereubah, whenubah, published FROM ".$namadepan."menu WHERE subid = 0  ORDER BY ordering");
$menucp->execute();
$menucp->setFetchMode(PDO::FETCH_ASSOC);

if ($menucp->rowCount() > 0)
{
echo "<form name=\"tampilmenu\" method=\"post\">\n";
echo "<table border=\"0\" bgcolor=\"#000000\" cellpadding=\"5\" cellspacing=\"1\">\n";
while($rmenucp = $menucp->fetch())
{
echo "<tr bgcolor=\"#CCCC00\" valign=\"top\">";

$orderup = $rmenucp['ordering'] - 1;
$orderdown = $rmenucp['ordering'] + 1;
$targetup = $koneksi_db->prepare("select id from ".$namadepan."menu where ordering=$orderup AND subid=0");
$targetup->execute();
$targetup->setFetchMode(PDO::FETCH_ASSOC);

$rtargetup = $targetup->fetch();

$targetdown = $koneksi_db->prepare("select id from ".$namadepan."menu where ordering=$orderdown AND subid=0");
$targetdown->execute();
$targetdown->setFetchMode(PDO::FETCH_ASSOC);

$rtargetdown = $targetdown->fetch();




echo "<td><b>$rmenucp[judul]</b> \n";
if (isset($rtargetup['id']))
echo "<a href=\"?cpmodul=$namamodul&aksi=ngurutke&idt=$rtargetup[id]&id=$rmenucp[id]&order=$rmenucp[ordering]&ordert=$orderup\"><i class=\"icon-arrow-up btn btn-darkblue\"></i></a>\n";
if (isset($rtargetdown['id']))
echo "<a href=\"?cpmodul=$namamodul&aksi=ngurutke&idt=$rtargetdown[id]&id=$rmenucp[id]&order=$rmenucp[ordering]&ordert=$orderdown\"><i class=\"icon-arrow-down btn btn-darkblue\"></i></a>\n";

if ($modulubah->rowCount() > 0)
{
if ($rmenucp['id'] == "root")
{
$publish = $rmenucp['published'];
$ubah = "Ubah";
}
else
{
if ($rmenucp['published'] == 'y')
$publish = "<a href=\"?cpmodul=$namamodul&aksi=published&id=$rmenucp[id]\"><i class=\"icon-ok btn btn-green\"></i></a>";
else if ($rmenucp['published'] == 't')
$publish = "<a href=\"?cpmodul=$namamodul&aksi=published&id=$rmenucp[id]\"><i class=\"icon-remove btn btn-red\"></i></a>";
$ubah = "<a href=\"?cpmodul=$namamodul&aksi=ubah&id=$rmenucp[id]\"><i class=\"icon-pencil btn btn-grey\"></i></a>";
}
}
else
{
$ubah = "<img src=\"gambar/lock.png\" border=\"0\" alt=\""._UBAH_."\"/>";
if ($rmenucp['published'] == 'y')
$publish = "<img src=\"gambar/ya.png\" border=\"0\" alt=\""._YA_."\"/>";
else if ($rmenucp['published'] == 't')
$publish = "<img src=\"gambar/tidak.png\" border=\"0\" alt=\""._TIDAK_."\"/>";
}
if ($modulhapus->rowCount() > 0)
{




$hapus = "<a href=\"?cpmodul=$namamodul&aksi=hapus&id=$rmenucp[id]\" onclick=\"return confirm('Yakin hapus Menu : \\n$rmenucp[judul] ?')\"><i class=\"icon-trash btn btn-red\"></i></a>";

}
else
{

$hapus = "<img src=\"gambar/lock.png\" border=\"0\" alt=\""._HAPUS_."\"/>";
}
echo " $publish $ubah $hapus</td></tr>\n";
loopmenucp($rmenucp['id'],1);

}
echo "</table>\n";
echo "</form>\n";
}
else
{
echo "<p>"._ERRORMENU2_."</p>";
}




}
}
else
{
header ("Location: .");
}
?>
