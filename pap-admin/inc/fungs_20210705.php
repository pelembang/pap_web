<?php
function uploadgambarnormal($sumber, $target)
{
$fullsize=imagecreatefromjpeg("$sumber");
$fullsize_height=imagesy($fullsize);
$fullsize_width=imagesx($fullsize);
$thumb_width=$fullsize_width;
$thumb_height=$fullsize_height;
$thumb=imagecreatetruecolor($thumb_width,$thumb_height);
imagecopyresampled($thumb,$fullsize,0,0,0,0,$thumb_width,$thumb_height,$fullsize_width,$fullsize_height);
imagedestroy($fullsize);
imagejpeg($thumb,"$target",100);
imagedestroy($thumb);
}
function uploadfotobesak($sumber, $target)
{
$fullsize=imagecreatefromjpeg("$sumber");
$fullsize_height=imagesy($fullsize);
$fullsize_width=imagesx($fullsize);
$thumb_width=200;
$perbandingan_width = $fullsize_width/$thumb_width;
$thumb_height=round($fullsize_height/$perbandingan_width);
$thumb=imagecreatetruecolor($thumb_width,$thumb_height);
imagecopyresampled($thumb,$fullsize,0,0,0,0,$thumb_width,$thumb_height,$fullsize_width,$fullsize_height);
imagedestroy($fullsize);
imagejpeg($thumb,"$target",100);
imagedestroy($thumb);
}
function uploadfotokecik($sumber, $target)
{
$fullsize=imagecreatefromjpeg("$sumber");
$fullsize_height=imagesy($fullsize);
$fullsize_width=imagesx($fullsize);
$thumb_width=70;
$perbandingan_width = $fullsize_width/$thumb_width;
$thumb_height=round($fullsize_height/$perbandingan_width);
$thumb=imagecreatetruecolor($thumb_width,$thumb_height);
imagecopyresampled($thumb,$fullsize,0,0,0,0,$thumb_width,$thumb_height,$fullsize_width,$fullsize_height);
imagedestroy($fullsize);
imagejpeg($thumb,"$target",100);
imagedestroy($thumb);
}

function pasfotobiodata($sumber, $target)
{
$fullsize=imagecreatefromjpeg("$sumber");
$fullsize_height=imagesy($fullsize);
$fullsize_width=imagesx($fullsize);
$thumb_width=100;
$perbandingan_width = $fullsize_width/$thumb_width;
$thumb_height=round($fullsize_height/$perbandingan_width);
$thumb=imagecreatetruecolor($thumb_width,$thumb_height);
imagecopyresampled($thumb,$fullsize,0,0,0,0,$thumb_width,$thumb_height,$fullsize_width,$fullsize_height);
imagedestroy($fullsize);
imagejpeg($thumb,"$target",100);
imagedestroy($thumb);
}
function fotogaleri($sumber, $target)
{
$fullsize=imagecreatefromjpeg("$sumber");
$fullsize_height=imagesy($fullsize);
$fullsize_width=imagesx($fullsize);
$thumb_width=450;
$perbandingan_width = $fullsize_width/$thumb_width;
$thumb_height=round($fullsize_height/$perbandingan_width);
$thumb=imagecreatetruecolor($thumb_width,$thumb_height);
imagecopyresampled($thumb,$fullsize,0,0,0,0,$thumb_width,$thumb_height,$fullsize_width,$fullsize_height);
imagedestroy($fullsize);
imagejpeg($thumb,"$target",100);
imagedestroy($thumb);
}
function fotohalaman($sumber, $target)
{
$fullsize=imagecreatefromjpeg("$sumber");
$fullsize_height=imagesy($fullsize);
$fullsize_width=imagesx($fullsize);
$thumb_width=450;
if ($fullsize_height > $thumb_width)
{
$perbandingan_width = $fullsize_width/$thumb_width;
$thumb_height=round($fullsize_height/$perbandingan_width);
}
else
{
$thumb_width = $fullsize_width;
$thumb_height = $fullsize_height;
}
$thumb=imagecreatetruecolor($thumb_width,$thumb_height);
imagecopyresampled($thumb,$fullsize,0,0,0,0,$thumb_width,$thumb_height,$fullsize_width,$fullsize_height);
imagedestroy($fullsize);
imagejpeg($thumb,"$target",100);
imagedestroy($thumb);
}
function fotoblok($sumber, $target)
{
$fullsize=imagecreatefromjpeg("$sumber");
$fullsize_height=imagesy($fullsize);
$fullsize_width=imagesx($fullsize);
$thumb_width=190;
if ($fullsize_height > $thumb_width)
{
$perbandingan_width = $fullsize_width/$thumb_width;
$thumb_height=round($fullsize_height/$perbandingan_width);
}
else
{
$thumb_width = $fullsize_width;
$thumb_height = $fullsize_height;
}
$thumb=imagecreatetruecolor($thumb_width,$thumb_height);
imagecopyresampled($thumb,$fullsize,0,0,0,0,$thumb_width,$thumb_height,$fullsize_width,$fullsize_height);
imagedestroy($fullsize);
imagejpeg($thumb,"$target",100);
imagedestroy($thumb);
}
function fotohalamankecik($sumber, $target)
{
$fullsize=imagecreatefromjpeg("$sumber");
$fullsize_height=imagesy($fullsize);
$fullsize_width=imagesx($fullsize);
$thumb_height=67;
$perbandingan_height = $fullsize_height/$thumb_height;
$thumb_width=round($fullsize_width/$perbandingan_height);
$thumb=imagecreatetruecolor($thumb_width,$thumb_height);
imagecopyresampled($thumb,$fullsize,0,0,0,0,$thumb_width,$thumb_height,$fullsize_width,$fullsize_height);
imagedestroy($fullsize);
imagejpeg($thumb,"$target",100);
imagedestroy($thumb);
}
function fotogalerikecik($sumber, $target)
{
$fullsize=imagecreatefromjpeg("$sumber");
$fullsize_height=imagesy($fullsize);
$fullsize_width=imagesx($fullsize);
$thumb_width=60;
$thumb_height=60;
$rap=($thumb_width/$thumb_height);
$rapfoto = ($fullsize_width/$fullsize_height);
if(($rapfoto>$rap)){
$qtaglx=(($fullsize_width)*($rap/$rapfoto))-($fullsize_width);
$qtaglx= $qtaglx*($thumb_width/$fullsize_width);
$qtagly=(0);
$fittix=$thumb_height*$rapfoto;
$fittiy=$thumb_height;
}
elseif(($rapfoto<$rap)){
$qtaglx=(0);
$qtagly= (($fullsize_height)/($rap/$rapfoto))-($fullsize_height);
$qtagly= $qtagly*($thumb_height/$fullsize_height);
$fittix=$thumb_width;
$fittiy=$thumb_width/$rapfoto;
}
else{
$qtaglx=0;
$qtagly=0;
}
$allix=($qtaglx/2);
$alliy=($qtagly/2);
$thumb=imagecreatetruecolor($thumb_width,$thumb_height);
imagecopyresampled($thumb,$fullsize,$qtaglx,$qtagly,$allix,$alliy,$fittix,$fittiy,$fullsize_width,$fullsize_height);
imagedestroy($fullsize);
imagejpeg($thumb,"$target",100);
imagedestroy($thumb);
}
function uploadgambadepan($sumber, $target)
{
$fullsize=imagecreatefromjpeg("$sumber");
$fullsize_height=imagesy($fullsize);
$fullsize_width=imagesx($fullsize);
$thumb_width=786;
$thumb_height=270;
$thumb=imagecreatetruecolor($thumb_width,$thumb_height);
imagecopyresampled($thumb,$fullsize,0,0,0,0,$thumb_width,$thumb_height,$fullsize_width,$fullsize_height);
imagedestroy($fullsize);
imagejpeg($thumb,"$target",100);
imagedestroy($thumb);
}
function uploadbannerpucuk($sumber, $target)
{
$fullsize=imagecreatefromjpeg("$sumber");
$fullsize_height=imagesy($fullsize);
$fullsize_width=imagesx($fullsize);
$thumb_width=1000;
$thumb_height=100;
$thumb=imagecreatetruecolor($thumb_width,$thumb_height);
imagecopyresampled($thumb,$fullsize,0,0,0,0,$thumb_width,$thumb_height,$fullsize_width,$fullsize_height);
imagedestroy($fullsize);
imagejpeg($thumb,"$target",100);
imagedestroy($thumb);
}

function uploadbannerkecik($sumber, $target)
{
$fullsize=imagecreatefromjpeg("$sumber");
$fullsize_height=imagesy($fullsize);
$fullsize_width=imagesx($fullsize);
$thumb_width=150;
$thumb_height=35;
$thumb=imagecreatetruecolor($thumb_width,$thumb_height);
imagecopyresampled($thumb,$fullsize,0,0,0,0,$thumb_width,$thumb_height,$fullsize_width,$fullsize_height);
imagedestroy($fullsize);
imagejpeg($thumb,"$target",100);
imagedestroy($thumb);
}


/* Fungsi dari Worpress */
function utf8_uri_encode( $utf8_string, $length = 0 ) {
        $unicode = '';
        $values = array();
        $num_octets = 1;
        $unicode_length = 0;

        $string_length = strlen( $utf8_string );
        for ($i = 0; $i < $string_length; $i++ ) {

                $value = ord( $utf8_string[ $i ] );

                if ( $value < 128 ) {
                        if ( $length && ( $unicode_length >= $length ) )
                                break;
                        $unicode .= chr($value);
                        $unicode_length++;
                } else {
                        if ( count( $values ) == 0 ) $num_octets = ( $value < 224 ) ? 2 : 3;

                        $values[] = $value;

                        if ( $length && ( $unicode_length + ($num_octets * 3) ) > $length )
                                break;
                        if ( count( $values ) == $num_octets ) {
                                if ($num_octets == 3) {
                                        $unicode .= '%' . dechex($values[0]) . '%' . dechex($values[1]) . '%' . dechex($values[2]);
                                        $unicode_length += 9;
                                } else {
                                        $unicode .= '%' . dechex($values[0]) . '%' . dechex($values[1]);
                                        $unicode_length += 6;
                                }

                                $values = array();
                                $num_octets = 1;
                        }
                }
        }

        return $unicode;
}
function seems_utf8($Str) { # by bmorel at ssi dot fr
        $length = strlen($Str);
        for ($i=0; $i < $length; $i++) {
                if (ord($Str[$i]) < 0x80) continue; # 0bbbbbbb
                elseif ((ord($Str[$i]) & 0xE0) == 0xC0) $n=1; # 110bbbbb
                elseif ((ord($Str[$i]) & 0xF0) == 0xE0) $n=2; # 1110bbbb
                elseif ((ord($Str[$i]) & 0xF8) == 0xF0) $n=3; # 11110bbb
                elseif ((ord($Str[$i]) & 0xFC) == 0xF8) $n=4; # 111110bb
                elseif ((ord($Str[$i]) & 0xFE) == 0xFC) $n=5; # 1111110b
                else return false; # Does not match any model
                for ($j=0; $j<$n; $j++) { # n bytes matching 10bbbbbb follow ?
                        if ((++$i == $length) || ((ord($Str[$i]) & 0xC0) != 0x80))
                        return false;
                }
        }
        return true;
}
function remove_accents($string) {
        if ( !preg_match('/[\x80-\xff]/', $string) )
                return $string;

        if (seems_utf8($string)) {
                $chars = array(
                // Decompositions for Latin-1 Supplement
                chr(195).chr(128) => 'A', chr(195).chr(129) => 'A',
                chr(195).chr(130) => 'A', chr(195).chr(131) => 'A',
                chr(195).chr(132) => 'A', chr(195).chr(133) => 'A',
                chr(195).chr(135) => 'C', chr(195).chr(136) => 'E',
                chr(195).chr(137) => 'E', chr(195).chr(138) => 'E',
                chr(195).chr(139) => 'E', chr(195).chr(140) => 'I',
                chr(195).chr(141) => 'I', chr(195).chr(142) => 'I',
                chr(195).chr(143) => 'I', chr(195).chr(145) => 'N',
                chr(195).chr(146) => 'O', chr(195).chr(147) => 'O',
                chr(195).chr(148) => 'O', chr(195).chr(149) => 'O',
                chr(195).chr(150) => 'O', chr(195).chr(153) => 'U',
                chr(195).chr(154) => 'U', chr(195).chr(155) => 'U',
                chr(195).chr(156) => 'U', chr(195).chr(157) => 'Y',
                chr(195).chr(159) => 's', chr(195).chr(160) => 'a',
                chr(195).chr(161) => 'a', chr(195).chr(162) => 'a',
                chr(195).chr(163) => 'a', chr(195).chr(164) => 'a',
                chr(195).chr(165) => 'a', chr(195).chr(167) => 'c',
                chr(195).chr(168) => 'e', chr(195).chr(169) => 'e',
                chr(195).chr(170) => 'e', chr(195).chr(171) => 'e',
                chr(195).chr(172) => 'i', chr(195).chr(173) => 'i',
                chr(195).chr(174) => 'i', chr(195).chr(175) => 'i',
                chr(195).chr(177) => 'n', chr(195).chr(178) => 'o',
                chr(195).chr(179) => 'o', chr(195).chr(180) => 'o',
                chr(195).chr(181) => 'o', chr(195).chr(182) => 'o',
                chr(195).chr(182) => 'o', chr(195).chr(185) => 'u',
                chr(195).chr(186) => 'u', chr(195).chr(187) => 'u',
                chr(195).chr(188) => 'u', chr(195).chr(189) => 'y',
                chr(195).chr(191) => 'y',
                // Decompositions for Latin Extended-A
                chr(196).chr(128) => 'A', chr(196).chr(129) => 'a',
                chr(196).chr(130) => 'A', chr(196).chr(131) => 'a',
                chr(196).chr(132) => 'A', chr(196).chr(133) => 'a',
                chr(196).chr(134) => 'C', chr(196).chr(135) => 'c',
                chr(196).chr(136) => 'C', chr(196).chr(137) => 'c',
                chr(196).chr(138) => 'C', chr(196).chr(139) => 'c',
                chr(196).chr(140) => 'C', chr(196).chr(141) => 'c',
                chr(196).chr(142) => 'D', chr(196).chr(143) => 'd',
                chr(196).chr(144) => 'D', chr(196).chr(145) => 'd',
                chr(196).chr(146) => 'E', chr(196).chr(147) => 'e',
                chr(196).chr(148) => 'E', chr(196).chr(149) => 'e',
                chr(196).chr(150) => 'E', chr(196).chr(151) => 'e',
                chr(196).chr(152) => 'E', chr(196).chr(153) => 'e',
                chr(196).chr(154) => 'E', chr(196).chr(155) => 'e',
                chr(196).chr(156) => 'G', chr(196).chr(157) => 'g',
                chr(196).chr(158) => 'G', chr(196).chr(159) => 'g',
                chr(196).chr(160) => 'G', chr(196).chr(161) => 'g',
                chr(196).chr(162) => 'G', chr(196).chr(163) => 'g',
                chr(196).chr(164) => 'H', chr(196).chr(165) => 'h',
                chr(196).chr(166) => 'H', chr(196).chr(167) => 'h',
                chr(196).chr(168) => 'I', chr(196).chr(169) => 'i',
                chr(196).chr(170) => 'I', chr(196).chr(171) => 'i',
                chr(196).chr(172) => 'I', chr(196).chr(173) => 'i',
                chr(196).chr(174) => 'I', chr(196).chr(175) => 'i',
                chr(196).chr(176) => 'I', chr(196).chr(177) => 'i',
                chr(196).chr(178) => 'IJ',chr(196).chr(179) => 'ij',
                chr(196).chr(180) => 'J', chr(196).chr(181) => 'j',
                chr(196).chr(182) => 'K', chr(196).chr(183) => 'k',
                chr(196).chr(184) => 'k', chr(196).chr(185) => 'L',
                chr(196).chr(186) => 'l', chr(196).chr(187) => 'L',
                chr(196).chr(188) => 'l', chr(196).chr(189) => 'L',
                chr(196).chr(190) => 'l', chr(196).chr(191) => 'L',
                chr(197).chr(128) => 'l', chr(197).chr(129) => 'L',
                chr(197).chr(130) => 'l', chr(197).chr(131) => 'N',
                chr(197).chr(132) => 'n', chr(197).chr(133) => 'N',
                chr(197).chr(134) => 'n', chr(197).chr(135) => 'N',
                chr(197).chr(136) => 'n', chr(197).chr(137) => 'N',
                chr(197).chr(138) => 'n', chr(197).chr(139) => 'N',
                chr(197).chr(140) => 'O', chr(197).chr(141) => 'o',
                chr(197).chr(142) => 'O', chr(197).chr(143) => 'o',
                chr(197).chr(144) => 'O', chr(197).chr(145) => 'o',
                chr(197).chr(146) => 'OE',chr(197).chr(147) => 'oe',
                chr(197).chr(148) => 'R',chr(197).chr(149) => 'r',
                chr(197).chr(150) => 'R',chr(197).chr(151) => 'r',
                chr(197).chr(152) => 'R',chr(197).chr(153) => 'r',
                chr(197).chr(154) => 'S',chr(197).chr(155) => 's',
                chr(197).chr(156) => 'S',chr(197).chr(157) => 's',
                chr(197).chr(158) => 'S',chr(197).chr(159) => 's',
                chr(197).chr(160) => 'S', chr(197).chr(161) => 's',
                chr(197).chr(162) => 'T', chr(197).chr(163) => 't',
                chr(197).chr(164) => 'T', chr(197).chr(165) => 't',
                chr(197).chr(166) => 'T', chr(197).chr(167) => 't',
                chr(197).chr(168) => 'U', chr(197).chr(169) => 'u',
                chr(197).chr(170) => 'U', chr(197).chr(171) => 'u',
                chr(197).chr(172) => 'U', chr(197).chr(173) => 'u',
                chr(197).chr(174) => 'U', chr(197).chr(175) => 'u',
                chr(197).chr(176) => 'U', chr(197).chr(177) => 'u',
                chr(197).chr(178) => 'U', chr(197).chr(179) => 'u',
                chr(197).chr(180) => 'W', chr(197).chr(181) => 'w',
                chr(197).chr(182) => 'Y', chr(197).chr(183) => 'y',
                chr(197).chr(184) => 'Y', chr(197).chr(185) => 'Z',
                chr(197).chr(186) => 'z', chr(197).chr(187) => 'Z',
                chr(197).chr(188) => 'z', chr(197).chr(189) => 'Z',
                chr(197).chr(190) => 'z', chr(197).chr(191) => 's',
                // Euro Sign
                chr(226).chr(130).chr(172) => 'E',
                // GBP (Pound) Sign
                chr(194).chr(163) => '');

                $string = strtr($string, $chars);
        } else {
                // Assume ISO-8859-1 if not UTF-8
                $chars['in'] = chr(128).chr(131).chr(138).chr(142).chr(154).chr(158)
                        .chr(159).chr(162).chr(165).chr(181).chr(192).chr(193).chr(194)
                        .chr(195).chr(196).chr(197).chr(199).chr(200).chr(201).chr(202)
                        .chr(203).chr(204).chr(205).chr(206).chr(207).chr(209).chr(210)
                        .chr(211).chr(212).chr(213).chr(214).chr(216).chr(217).chr(218)
                        .chr(219).chr(220).chr(221).chr(224).chr(225).chr(226).chr(227)
                        .chr(228).chr(229).chr(231).chr(232).chr(233).chr(234).chr(235)
                        .chr(236).chr(237).chr(238).chr(239).chr(241).chr(242).chr(243)
                        .chr(244).chr(245).chr(246).chr(248).chr(249).chr(250).chr(251)
                        .chr(252).chr(253).chr(255);

                $chars['out'] = "EfSZszYcYuAAAAAACEEEEIIIINOOOOOOUUUUYaaaaaaceeeeiiiinoooooouuuuyy";

                $string = strtr($string, $chars['in'], $chars['out']);
                $double_chars['in'] = array(chr(140), chr(156), chr(198), chr(208), chr(222), chr(223), chr(230), chr(240), chr(254));
                $double_chars['out'] = array('OE', 'oe', 'AE', 'DH', 'TH', 'ss', 'ae', 'dh', 'th');
                $string = str_replace($double_chars['in'], $double_chars['out'], $string);
        }

        return $string;
}
function sanitize_title_with_dashes($title) {
        $title = strip_tags($title);
        // Preserve escaped octets.
        $title = preg_replace('|%([a-fA-F0-9][a-fA-F0-9])|', '---$1---', $title);
        // Remove percent signs that are not part of an octet.
        $title = str_replace('%', '', $title);
        // Restore octets.
        $title = preg_replace('|---([a-fA-F0-9][a-fA-F0-9])---|', '%$1', $title);

        $title = remove_accents($title);
        if (seems_utf8($title)) {
                if (function_exists('mb_strtolower')) {
                        $title = mb_strtolower($title, 'UTF-8');
                }
                $title = utf8_uri_encode($title, 200);
        }

        $title = strtolower($title);
        $title = preg_replace('/&.+?;/', '', $title); // kill entities
        $title = preg_replace('/[^%a-z0-9 _-]/', '', $title);
        $title = preg_replace('/\s+/', '-', $title);
        $title = preg_replace('|-+|', '-', $title);
        $title = trim($title, '-');

        return $title;
}

/* akhir fungsi dari Wordpress */
function zerofill($num, $length) {
    return str_pad($num, $length, '0', STR_PAD_LEFT);
}

function namabulan($m)
{
if ($m == '01')
return "Januari";
else if ($m == '02')
return "Februari";
else if ($m == '03')
return "Maret";
else if ($m == '04')
return "April";
else if ($m == '05')
return "Mei";
else if ($m == '06')
return "Juni";
else if ($m == '07')
return "Juli";
else if ($m == '08')
return "Agustus";
else if ($m == '09')
return "September";
else if ($m == '10')
return "Oktober";
else if ($m == '11')
return "November";
else if ($m == '12')
return "Desember";
}
function namabulansingkat($m)
{
if ($m == '01')
return "Jan";
else if ($m == '02')
return "Feb";
else if ($m == '03')
return "Mar";
else if ($m == '04')
return "Apr";
else if ($m == '05')
return "Mei";
else if ($m == '06')
return "Jun";
else if ($m == '07')
return "Jul";
else if ($m == '08')
return "Agu";
else if ($m == '09')
return "Sep";
else if ($m == '10')
return "Okt";
else if ($m == '11')
return "Nov";
else if ($m == '12')
return "Des";
}
function namahari($N)
{
if ($N == '1')
return "Senin";
else if ($N == '2')
return "Selasa";
else if ($N == '3')
return "Rabu";
else if ($N == '4')
return "Kamis";
else if ($N == '5')
return "Jum'at";
else if ($N == '6')
return "Sabtu";
else if ($N == '7')
return "Minggu";
}

function baliktgljam($waktu) {
$thn = substr($waktu,0,4);
$bln = substr($waktu,5,2);
$tgl = substr($waktu,8,2);
$jam = substr($waktu,11,8);
return "$tgl/$bln/$thn $jam";
}
function baliktgl($waktu) {
$thn = substr($waktu,0,4);
$bln = substr($waktu,5,2);
$tgl = substr($waktu,8,2);
return "$tgl/$bln/$thn";
}
function baliktglkeDB($waktu) {
$thn = substr($waktu,6,4);
$bln = substr($waktu,3,2);
$tgl = substr($waktu,0,2);
return "$thn-$bln-$tgl";
}
function pukul($waktu) {
$jamnt = substr($waktu,0,5);
return "$jamnt";
}
function degree($num) {
  $hour = floor($num);
  $min = floor(($num-$hour)*60);
  $sec = floor((($num-$hour)*3600)-($min*60));
  $hour = $hour<10 ? '0'.$hour:$hour;
  $min = $min<10?'0'.$min:$min;
  $sec = $sec<10?'0'.$sec:$sec;
  return $hour.':'.$min." WIB";
}
function ipnyo()
{
if(isset($_SERVER['HTTP_X_FORWARDED_FOR'])){
$ipnyo = "$_SERVER[HTTP_X_FORWARDED_FOR] Proxy: $_SERVER[REMOTE_ADDR] ($_SERVER[HTTP_VIA]) ";
}else{
$ipnyo = "$_SERVER[REMOTE_ADDR]";
}
return $ipnyo;
}
function userlengkap($namanyo)
{
global $koneksi_db, $namadepan;
$user = $koneksi_db->sql_query("SELECT `nama` FROM `".$namadepan."syspemakai` WHERE `id` = '$namanyo'");
$ruser = $koneksi_db->sql_fetchrow($user);
return $ruser[nama];
}


function loopmenucp($id,$level) {
global $koneksi_db, $menu, $namadepan, $modulubah, $modulhapus, $namamodul;
$rssub = $koneksi_db->sql_query("SELECT `id`,`ordering`,`tipe`, `judul`, `whoentri`, `whereentri`, `whenentri`, `whoubah`, `whereubah`, `whenubah`, `published` FROM `".$namadepan."menu` WHERE `subid` = $id ORDER BY `ordering`");
if ($koneksi_db->sql_numrows($rssub) > 0) {
echo "\n";
while ($rwsub = $koneksi_db->sql_fetchrow($rssub)) {
$orderup = $rwsub[ordering] - 1;
$orderdown = $rwsub[ordering] + 1;
$rtargetup = $koneksi_db->sql_fetchrow($koneksi_db->sql_query("select `id` from `".$namadepan."menu` where `ordering`=$orderup AND `subid`=$id"));
$rtargetdown = $koneksi_db->sql_fetchrow($koneksi_db->sql_query("select `id` from `".$namadepan."menu` where `ordering`=$orderdown AND `subid`=$id"));

$levelsub = $level + 1;

$background = hexdec("CCCC00") + (50 * $levelsub);
echo "<tr bgcolor=\"#".dechex($background)."\">";



if ($rwsub[tipe] == 'p')
	$judulmenu = "<b>$rwsub[judul]</b>";
else
	$judulmenu = "$rwsub[judul]";
echo "<td style=\"padding-left:".(20*$levelsub)."px;\">$judulmenu ";

if ($rtargetup[id])
echo "<a href=\"?cpmodul=$namamodul&aksi=ngurutke&idt=$rtargetup[id]&id=$rwsub[id]&order=$rwsub[ordering]&ordert=$orderup\"><img src=\"img/pucuk-sub.png\" border=\"0\" alt=\""._UP_."\" title=\""._UP_."\"></a>\n";
if ($rtargetdown[id])
echo "<a href=\"?cpmodul=$namamodul&aksi=ngurutke&idt=$rtargetdown[id]&id=$rwsub[id]&order=$rwsub[ordering]&ordert=$orderdown\"><img src=\"img/bawah-sub.png\" border=\"0\" alt=\""._DOWN_."\" title=\""._DOWN_."\"></a>\n";


if ($koneksi_db->sql_numrows($modulubah) > 0)
{
if ($rwsub[published] == 'y')
$publish = "<a href=\"?cpmodul=$namamodul&aksi=published&id=$rwsub[id]\"><img src=\"img/ya.png\" border=\"0\" alt=\""._YA_."\"/></a>";
if ($rwsub[published] == 't')
$publish = "<a href=\"?cpmodul=$namamodul&aksi=published&id=$rwsub[id]\"><img src=\"img/tidak.png\" border=\"0\" alt=\""._TIDAK_."\"/></a>";
$ubah = "<a href=\"?cpmodul=$namamodul&aksi=ubah&id=$rwsub[id]\"><img src=\"img/edit.png\" alt=\""._UBAH_."\" border=\"0\" /></a>";

}
else
{
$ubah = "<img src=\"img/lock.png\" border=\"0\" alt=\""._UBAH_."\"/>";
if ($rwsub[published] == 'y')
$publish = "<img src=\"img/ya.png\" border=\"0\" alt=\""._YA_."\"/>";
if ($rwsub[published] == 't')
$publish = "<img src=\"img/tidak.png\" border=\"0\" alt=\""._TIDAK_."\"/>";
}


if ($koneksi_db->sql_numrows($modulhapus) > 0)
{



$hapus = "<a href=\"?cpmodul=$namamodul&aksi=hapus&id=$rwsub[id]\" onclick=\"return confirm('"._YAKINHAPUSMENU_." : \\n$rwsub[judul] ?')\"><img src=\"img/trash.png\" alt=\""._HAPUS_."\" border=\"0\" /></a>";

}
else
{

$hapus = "<img src=\"img/lock.png\" border=\"0\" alt=\""._HAPUS_."\"/>";
}
echo "$publish $ubah $hapus</td></tr>\n";

$rssub2 = $koneksi_db->sql_query("SELECT `id`,`judul` FROM `".$namadepan."menu` WHERE `id` = $id ORDER BY `ordering`");
if ($koneksi_db->sql_numrows($rssub) > 0) {
while ($rwsub2 = $koneksi_db->sql_fetchrow($rssub2)) {
loopmenucp($rwsub[id],$levelsub);
}
}
}
}
}
function sanitizeFilename($f) {
 $replace_chars = array(
     'Š'=>'S', 'š'=>'s', 'Ð'=>'Dj','Ž'=>'Z', 'ž'=>'z', 'À'=>'A', 'Á'=>'A', 'Â'=>'A', 'Ã'=>'A', 'Ä'=>'A',
     'Å'=>'A', 'Æ'=>'A', 'Ç'=>'C', 'È'=>'E', 'É'=>'E', 'Ê'=>'E', 'Ë'=>'E', 'Ì'=>'I', 'Í'=>'I', 'Î'=>'I',
     'Ï'=>'I', 'Ñ'=>'N', 'Ò'=>'O', 'Ó'=>'O', 'Ô'=>'O', 'Õ'=>'O', 'Ö'=>'O', 'Ø'=>'O', 'Ù'=>'U', 'Ú'=>'U',
     'Û'=>'U', 'Ü'=>'U', 'Ý'=>'Y', 'Þ'=>'B', 'ß'=>'Ss','à'=>'a', 'á'=>'a', 'â'=>'a', 'ã'=>'a', 'ä'=>'a',
     'å'=>'a', 'æ'=>'a', 'ç'=>'c', 'è'=>'e', 'é'=>'e', 'ê'=>'e', 'ë'=>'e', 'ì'=>'i', 'í'=>'i', 'î'=>'i',
     'ï'=>'i', 'ð'=>'o', 'ñ'=>'n', 'ò'=>'o', 'ó'=>'o', 'ô'=>'o', 'õ'=>'o', 'ö'=>'o', 'ø'=>'o', 'ù'=>'u',
     'ú'=>'u', 'û'=>'u', 'ý'=>'y', 'ý'=>'y', 'þ'=>'b', 'ÿ'=>'y', 'ƒ'=>'f'
 );
 $f = strtr($f, $replace_chars);
 // convert & to "and", @ to "at", and # to "number"
 $f = preg_replace(array('/[\&]/', '/[\@]/', '/[\#]/'), array('-and-', '-at-', '-number-'), $f);
 $f = preg_replace('/[^(\x20-\x7F)]*/','', $f); // removes any special chars we missed
 $f = str_replace(' ', '-', $f); // convert space to hyphen 
 $f = str_replace('\'', '', $f); // removes apostrophes
 $f = preg_replace('/[^\w\-\.]+/', '', $f); // remove non-word chars (leaving hyphens and periods)
 $f = preg_replace('/[\-]+/', '-', $f); // converts groups of hyphens into one
 return strtolower($f);
}
function thumb($w,$h,$source,$target) 
{
include_once('3rdpartyapps/phpthumb/phpthumb.class.php');
$phpThumb = new phpthumb();
$phpThumb->setSourceFilename($source);
if ($w > 0) {
    $phpThumb->setParameter('w', $w);
}
if ($h > 0) {
    $phpThumb->setParameter('h', $h);
}
if ($h > 0 && $w > 0) {
    $phpThumb->setParameter('zc', 1);
} else {
    $phpThumb->setParameter('aoe', 1);
    $phpThumb->setParameter('far', 1);
}
if ($h > 100 || $w > 100) {
    $phpThumb->setParameter('f', 'jpg');
    $phpThumb->setParameter('q', 100);
} else {
    $phpThumb->setParameter('f', 'png');
}
$phpThumb->GenerateThumbnail();
$phpThumb->RenderToFile($target);
}

function duit($rp) {
  return number_format($rp, '2',',','.');
}
function tgllengkapbalik($tglnyo)
{
$thn = substr($tglnyo,0,4);
$bln = substr($tglnyo,5,2);
switch ($bln)
{
case 1: $bulan = "Januari"; break;
case 2: $bulan = "Februari"; break;
case 3: $bulan = "Maret"; break;
case 4: $bulan = "April"; break;
case 5: $bulan = "Mei"; break;
case 6: $bulan = "Juni"; break;
case 7: $bulan = "Juli"; break;
case 8: $bulan = "Agustus"; break;
case 9: $bulan = "September"; break;
case 10: $bulan = "Oktober"; break;
case 11: $bulan = "November"; break;
case 12: $bulan = "Desember"; break;
}

$tgl = substr($tglnyo,8,2);
return $tgl." ".$bulan." ".$thn;
}
function tglengkapbalik($tglnyo)
{
//0123 45 67
$thn = substr($tglnyo,0,4);
$bln = substr($tglnyo,4,2);
switch ($bln)
{
case 1: $bulan = "Januari"; break;
case 2: $bulan = "Februari"; break;
case 3: $bulan = "Maret"; break;
case 4: $bulan = "April"; break;
case 5: $bulan = "Mei"; break;
case 6: $bulan = "Juni"; break;
case 7: $bulan = "Juli"; break;
case 8: $bulan = "Agustus"; break;
case 9: $bulan = "September"; break;
case 10: $bulan = "Oktober"; break;
case 11: $bulan = "November"; break;
case 12: $bulan = "Desember"; break;
}

$tgl = substr($tglnyo,6,2);
return $tgl." ".$bulan." ".$thn;
}
function cekuniqid($length, $id) {
global $koneksi_db, $namadepan;
// 26 diambil dari jumlan A-Z
$tot = pow(26, $length);
 $random = '';
    for ($i = 0; $i < $length; $i++) {
        $random .= chr(rand(ord('A'), ord('Z')));
    }
    $qq = $koneksi_db->prepare("select uniqID from ".$namadepan."suratkeluar");
	$qq->execute();
$qq->setFetchMode(PDO::FETCH_ASSOC);
if($qq->rowCount() < $tot)
{
do {
	
$q = $koneksi_db->prepare("select uniqID from ".$namadepan."suratkeluar where uniqID = ?");
$q->execute(array($random));
$q->setFetchMode(PDO::FETCH_ASSOC);
$ado = $q->fetch();
	} 
	while ($ado==1);
$koneksi_db->prepare("update ".$namadepan."suratkeluar set uniqID = ? where id = ?")->execute(array($random,$id));;
return $random;
}
else
return false;
}



function reqresTG($length) {
        // 26 diambil dari jumlan A-Z
        $tot = pow(10, $length);
         $random = '';
            for ($i = 0; $i < $length; $i++) {
                $random .= chr(rand(ord('0'), ord('9')));
            }
            
        return $random;
        
        }

function trackid($length, $id) {
        global $koneksi_db, $namadepan;
        // 26 diambil dari jumlan A-Z
        $tot = pow(26, $length);
         $random = '';
            for ($i = 0; $i < $length; $i++) {
                $random .= chr(rand(ord('A'), ord('Z')));
            }
            $qq = $koneksi_db->prepare("select trackid from ".$namadepan."suratkeluar");
                $qq->execute();
        $qq->setFetchMode(PDO::FETCH_ASSOC);
        if($qq->rowCount() < $tot)
        {
        do {
                
        $q = $koneksi_db->prepare("select trackid from ".$namadepan."suratkeluar where uniqID = ?");
        $q->execute(array($random));
        $q->setFetchMode(PDO::FETCH_ASSOC);
        $ado = $q->fetch();
                } 
                while ($ado==1);
        $koneksi_db->prepare("update ".$namadepan."suratkeluar set trackid = ? where id = ?")->execute(array($random,$id));;
        return $random;
        }
        else
        return false;
        }

        function destid($length, $id) {
        global $koneksi_db, $namadepan;
        // 26 diambil dari jumlan A-Z
        $tot = pow(26, $length);
         $random = '';
            for ($i = 0; $i < $length; $i++) {
                $random .= chr(rand(ord('A'), ord('Z')));
            }
            $qq = $koneksi_db->prepare("select destID from ".$namadepan."suratkeluar_tujuan");
                $qq->execute();
        $qq->setFetchMode(PDO::FETCH_ASSOC);
        if($qq->rowCount() < $tot)
        {
        do {
                
        $q = $koneksi_db->prepare("select destID from ".$namadepan."suratkeluar_tujuan where destID = ?");
        $q->execute(array($random));
        $q->setFetchMode(PDO::FETCH_ASSOC);
        $ado = $q->fetch();
                } 
                while ($ado==1);
        $koneksi_db->prepare("update ".$namadepan."suratkeluar_tujuan set destID = ? where id = ?")->execute(array($random,$id));;
        return $random;
        }
        else
        return false;
        }

        function recursive_unitkerja($id,$level = 1,$selected = null) {


//$q1 = select * from simortal_subunitkerja where induk = $id;
// $q2 = "select * from simortal_subunitkerja where induk = ".$rwsub['id']
               
//echo ("select id,nama from ".$GLOBALS['namadepan']."unitkerja where induk = ".$id." order by id asc");
     $uk = $GLOBALS['koneksi_db']->prepare("select id,nama from ".$GLOBALS['namadepan']."unitkerja where induk = ? and aktif = 1 order by urut asc");
     //           $uk = $GLOBALS['koneksi_db']->prepare("select id,nama from simortal_unitkerja where induk = 1 order by id asc");
    $uk->execute(array($id));
    $uk->setFetchMode(PDO::FETCH_ASSOC);
   
  if ($uk->rowCount() > 0) {
                        
               
                                while($rwsub =$uk->fetch()) {
                if(!is_null($selected))
                {
    if($rwsub['id'] == $selected)
        $selx = "selected";
else
        $selx = "";
   }
   else
        $selx = "";
                        echo '<option value="'.$rwsub['id'].'" '.$selx.'>'.str_repeat("", $level).($rwsub['nama'])."</option>\n";

$th = $GLOBALS['koneksi_db']->prepare("select id,nama from ".$GLOBALS['namadepan']."unitkerja where id = ".$rwsub['id']." and aktif = 1 order by id asc");
                                               

        
if ($th->rowCount() > 0) {
                                                        while($rwsub2 = $th->fetch()) {      
                                
                                  echo recursive_unitkerja($rwsub['id'], $level+1, $selected);
                                }
                        }
                       
                }
                
        }
        else
        {
        echo "";
        }
        $level++;
}


function recursive_subunitkerja($id,$level = 1,$selected = null) {



     $suk = $GLOBALS['koneksi_db']->prepare("select id,nama from ".$GLOBALS['namadepan']."subunitkerja where induk = ? order by id asc");
    
    $suk->execute(array($id));
    $suk->setFetchMode(PDO::FETCH_ASSOC);
   
  if ($suk->rowCount() > 0) {
                        
               
                                while($rwsub =$suk->fetch()) {
                 if(!is_null($selected))
                {
    if($rwsub['id'] == $selected)
        $selz = "selected";
else
        $selz = "";
   }
   else
        $selz = "";
           
                       echo  '<option value="'.$rwsub['id'].'" '.$selz.'>'.str_repeat("&nbsp;&nbsp;", $level).($rwsub['nama'])."</option>\n";
                       //                 $sub .= '<option>select id,nama,induk from '.$GLOBALS['namadepan'].'subunitkerja where induk = '.$rwsub['id'].'  order by id asc</option>';

$th = $GLOBALS['koneksi_db']->prepare("select id,nama from ".$GLOBALS['namadepan']."subunitkerja where id = ?  order by id asc");
                                               
 $th->execute(array($id));
    $th->setFetchMode(PDO::FETCH_ASSOC);
        
if ($th->rowCount() > 0) {
                                                        while($rwsub2 = $th->fetch()) {      
                                
                                      echo recursive_subunitkerja($rwsub['id'], $level+1, $selected);
                                }
                        }
                           
                       
                }
                
        }
      

       
        $level++;
        // if(isset($sub)) return  $sub ;
}


function recursive_table_subunitkerja($id,$level = 1,$pengguna = NULL) {



     $suk = $GLOBALS['koneksi_db']->prepare("select unitkerja,id,nama,induk,kode from ".$GLOBALS['namadepan']."subunitkerja where induk = ? order by kode asc");
    
    $suk->execute(array($id));
    $suk->setFetchMode(PDO::FETCH_ASSOC);
   
  
                        $sub = "";
               
                                while($rwsub =$suk->fetch()) {
                 
                
  
           if($pengguna == 1)
           {
                       $sub .= '<tr class="treegrid-'.$rwsub['id'].'  treegrid-parent-'.$rwsub['induk'].'"><td>'.$rwsub['kode'].' - '.$rwsub['nama'].'</td><td><a href="?cpmodul=pengguna&aksi=daftarpengguna&id='.$rwsub['id'].'" class="btn" rel="tooltip" title="Daftar Pengguna"><i class="icon-group"></i></a> 
                       </td></tr>';
           }
           else
           {
                       $sub .= '<tr class="treegrid-'.$rwsub['id'].'  treegrid-parent-'.$rwsub['induk'].'"><td>'.$rwsub['kode'].' - '.$rwsub['nama'].'</td><td><a href="?cpmodul=subunitkerja&aksi=tambah&id='.$rwsub['unitkerja'].'&induk='.$rwsub['id'].'" class="btn" rel="tooltip" title="Tambah"><i class="icon-plus"></i></a> <a href="?cpmodul=subunitkerja&aksi=ubah&id='.$rwsub['id'].'" class="btn" rel="tooltip" title="Edit"><i class="icon-edit"></i></a> 
           
<a href="?cpmodul=subunitkerja&aksi=hapus&id='.$rwsub['id'].'" class="btn" rel="tooltip" title="Delete" onclick="return confirm(\'Hapus data ini ?\')"><i class="icon-remove"></i></a>
                       </td></tr>';
           }           

$th = $GLOBALS['koneksi_db']->prepare("select id,nama from ".$GLOBALS['namadepan']."subunitkerja where id = ?  order by kode asc");
                                               
 $th->execute(array($id));
    $th->setFetchMode(PDO::FETCH_ASSOC);
        
if ($th->rowCount() > 0) {
                                                        while($rwsub2 = $th->fetch()) {      
                                
                                      $sub .= recursive_table_subunitkerja($rwsub['id'], $level+1, $pengguna);
                                }
                        }
                           
                       
                
                
        }
      

       
        $level++;
        return $sub;
}
function secondsToHms($d) {
    
    $h = floor($d / 3600);
    $m = floor($d % 3600 / 60);
    $s = floor($d % 3600 % 60);

      $s = ($s < 10) ? '0' . $s : $s;
  $m = ($m < 10) ?  '0' . $m : $m;

    return $m .':'. $s; 
}
//$_SERVER['DOCUMENT_ROOT'].'banksumsel/'.$GLOBALS['filecmps'],$_SERVER['DOCUMENT_ROOT'].'banksumsel/'.$GLOBALS['filedraft'] 
function kopsurat($source, $output) {
        require_once("3rdpartyapps/tcpdf/tcpdf.php");
require_once("3rdpartyapps/fpdi/fpdi.php");



class MergePdf{
        
        const DESTINATION__INLINE = "I";
        const DESTINATION__DOWNLOAD = "D";
        const DESTINATION__DISK = "F";
        const DESTINATION__DISK_INLINE = "FI";
        const DESTINATION__DISK_DOWNLOAD = "FD";
        const DESTINATION__BASE64_RFC2045 = "E";
        
        const DEFAULT_DESTINATION = self::DESTINATION__INLINE;
        const DEFAULT_MERGED_FILE_NAME = pathtmp."merged-files.pdf";
        
        public static function merge($files, $destination = null, $outputPath = null){

                if(empty($destination)){
                        $destination = self::DEFAULT_DESTINATION;
                }
                
                if(empty($outputPath)){
                        $outputPath = self::DEFAULT_MERGED_FILE_NAME;
                }
                
                $pdf = new FPDI();
                

                $pdf->setPrintHeader(false);
                $pdf->setPrintFooter(false);
                // set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, 5, PDF_MARGIN_RIGHT);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, 0);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

$pdf->SetFont('helvetica', '', 20, '', false);          
// add a page


//$pdf->writeHTMLCell(0,0,0,0,$text);
                self::join($pdf, $files);
                //$pdf->Output();

                
                $pdf->Output($output,'F');
                //$pdf->Output($outputPath, $destination);
        }
        
        private static function join($pdf, $fileList){
                if(empty($fileList) || !is_array($fileList)){
                        die("invalid file list");
                }
                
                foreach($fileList as $file){
                        self::addFile($pdf, $file);
                }
        }
        
        private static function addFile($pdf, $file){
                $numPages = $pdf->setSourceFile($file);
                
                if(empty($numPages) || $numPages < 1){
                        return;
                }
                
                for($x = 1; $x <= $numPages; $x++){
                        $pdf->AddPage();
                        
        $pdf->useTemplate($pdf->importPage($x), 0, 0, 0, 0, true);
                        $pdf->Image(pathasset.'kopsurat/header.png',20,0,'',25);
                        $pdf->Image(pathasset.'kopsurat/footer.png',0,$pdf->GetPageHeight()-10,'',10);
                        $pdf->SetFont('Helvetica','',7.5); // Font Name, Font Style (eg. 'B' for Bold), Font Size
                $pdf->SetTextColor(0,0,0); // RGB 
                $pdf->SetXY(20, ($pdf->GetPageHeight()-20));
                $text = '<b><span style="color:#4289CE">'.namaperusahaan.'</span></b><br/>';
                if($GLOBALS['induk'] == 1)
                $text .= 'Pusat &nbsp;&nbsp;&nbsp;: ';
                else if($GLOBALS['induk'] == 2)
                        $text .= $GLOBALS['namaunitkerja'].' : ';
                else if($GLOBALS['induk'] == 3)
                        $text .= $GLOBALS['namaunitkerja'].' : ';
                $text .=  $GLOBALS['alamatunitkerja'].'<br/>';
                $text .= 'website : http://www.banksumselbabel.com';



        
 $pdf->writeHTMLCell($column_width, '', '', '', $text, 0, 1, 0, true, 'L', true);
$pdf->Image('img/logobsre.png',10,($pdf->GetPageHeight()-20),5,5);

// $pdf->Image("img/tte.png",20,($pdf->GetPageHeight()-42),20,20); // X start, Y start, X width, Y width in mm                     

//                 $pdf->Image('img/logobsre.png',($pdf->GetPageWidth()-30),($pdf->GetPageHeight()-35),10,10); // X start, Y start, X width, Y width in mm
//                 $pdf->SetFont('Helvetica','',5); // Font Name, Font Style (eg. 'B' for Bold), Font Size
//                 $pdf->SetTextColor(0,0,0); // RGB 
//                 $pdf->SetXY(42, ($pdf->GetPageHeight()-40)); // X start, Y start in mm
        
//                 $column_width = ($pdf->GetPageWidth()-30);
//  $text = '<b>CATATAN</b><ul><li>Berdasarkan UU ITE No.11 Tahun 2008 Pasal 5 Ayat 1 :
//  <br/>Informasi Elektronik dan/atau Dokumen Elektronik dan/hasil cetaknya merupakan alat bukti yang sah</li>
//  <li>Dokumen ini telah ditandangani secara elektronik menggunakan sertifikat elektronik yang diterbitkan oleh Balai Sertifikasi Elektronik (BSrE)
//  <br/>sehingga tidak diperlukan tanda tangan dan stempel basah</li>
//  <li>Dokumen ini dapat dibuktikan keasliannya dengan memverifikasi dokumen tanda tangan digital elektronik dengan menggunakan aplikasi Verifikasi Dokumen PDF<br/>
//  (veryDS) yang dibuat oleh BSrE dan dapat di unduh pada Google Play di smartphone Android Anda.</li></ul>';


        
//  $pdf->writeHTMLCell($column_width, '', '', '', $text, 0, 1, 0, true, 'L', true);
        

                //$pdf->setSignatureAppearance($GLOBALS['posx'],$GLOBALS['posy'], $w, $h);
                        $pdf->endPage();
                }
        }
}

MergePdf::merge(
        Array(
                $source
        ),
        MergePdf::DESTINATION__DISK_INLINE
);
}
//'WIN',  $_SERVER['DOCUMENT_ROOT'].'/banksumsel/'.$file  ,$_SERVER['DOCUMENT_ROOT'].'/banksumsel/'.$filecmps
function komprespdf($os,$source,$output) {
if (strtoupper(substr(PHP_OS, 0, 3)) === $os) 
$gs = "D:/Program Files/gs/gs9.53.3/bin/gswin64c.exe";
else
$gs = "gs";

        shell_exec('"'.$gs.'" -sDEVICE=pdfwrite -dCompatibilityLevel=1.4 -dNOPAUSE -dQUIET -dBATCH -sOutputFile="'.$output.'" "'.$source.'"');

}

function buatQRcode($codeContents, $sizeimg = array(), $tempdir, $logocenter = null,$uniqID = 'qrcode',$id = null, $outputqr)
    {
include "3rdpartyapps/phpqrcode/qrlib.php"; 
if (!file_exists($tempdir)) //Buat folder bername temp
mkdir($tempdir);
//simpan file qrcode
QRcode::png($codeContents, $tempdir.$uniqID.".png", $sizeimg[0], $sizeimg[1],$sizeimg[2]);


 // ambil file qrcode
 $QR = imagecreatefrompng($tempdir.$uniqID.".png");

 // memulai menggambar logo dalam file qrcode
 $logo = imagecreatefromstring(file_get_contents($logocenter));
 
 imagecolortransparent($logo , imagecolorallocatealpha($logo , 0, 0, 0, 127));
 imagealphablending($logo , false);
 imagesavealpha($logo , true);

 $QR_width = imagesx($QR);
 $QR_height = imagesy($QR);

 $logo_width = imagesx($logo);
 $logo_height = imagesy($logo);

 // Scale logo to fit in the QR Code
 //$logo_qr_width = $QR_width/2;
 $logo_qr_width = 56;
 //$scale = $logo_width/$logo_qr_width;
 //$logo_qr_height = $logo_height/2;
 $logo_qr_height = 100;

 imagecopyresampled($QR, $logo, ($QR_width/2)-($logo_qr_width/2), ($QR_height/2)-($logo_qr_height/2), 0, 0, $logo_qr_width, $logo_qr_height, $logo_width, $logo_height);

 // Simpan kode QR lagi, dengan logo di atasnya
 imagepng($QR,$outputqr.$uniqID.".png");
 
unlink($tempdir.$uniqID.".png");
    }

    function deleteDirectory($dir) {
    if (!file_exists($dir)) {
        return true;
    }

    if (!is_dir($dir)) {
        return unlink($dir);
    }

    foreach (scandir($dir) as $item) {
        if ($item == '.' || $item == '..') {
            continue;
        }

        if (!deleteDirectory($dir . DIRECTORY_SEPARATOR . $item)) {
            return false;
        }

    }

    return rmdir($dir);
}

function clean($value) {
    return htmlspecialchars(strip_tags($value), ENT_QUOTES);
}
class Token {
        public static function generate() {
        return $_SESSION['token'] = base64_encode(openssl_random_pseudo_bytes(32));

}

public static function check($token) {
if(isset($_SESSION['token']) && $token === $_SESSION['token']) {
unset($_SESSION['token']);
return true;
}
return false;
}
}

?>