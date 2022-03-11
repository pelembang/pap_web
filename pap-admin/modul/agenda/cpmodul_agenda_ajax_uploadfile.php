<?php
$finfo = finfo_open(FILEINFO_MIME_TYPE);
$uploaddir = 'tmp/agenda/'; 
$skrg = date("YmdHis");
$typefile = finfo_file($finfo, $_FILES['uploadfile']['tmp_name']);
list($lebar, $tinggi) = getimagesize($_FILES['uploadfile']['tmp_name']);
$file = $uploaddir . $skrg.'-'.sanitizeFilename(basename($_FILES['uploadfile']['name'])); 

 
if (move_uploaded_file($_FILES['uploadfile']['tmp_name'], $file)) { 
  echo "success|$skrg|$typefile|$lebar|$tinggi|".sanitizeFilename(basename($_FILES['uploadfile']['name'])); 
} else {
	echo "error";
}
finfo_close($finfo);
?>