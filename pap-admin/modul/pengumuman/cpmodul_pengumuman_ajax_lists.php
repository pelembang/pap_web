<?php
$modulubah = $koneksi_db->prepare("SELECT ".$namadepan."syshakakses.modul FROM ".$namadepan."modul, ".$namadepan."syshakakses WHERE ".$namadepan."modul.published = 'y' AND ".$namadepan."modul.nama = ".$namadepan."syshakakses.modul AND ".$namadepan."syshakakses.kelompok = $rusercp[kelompok] AND ".$namadepan."syshakakses.aktif = 'y' AND ".$namadepan."modul.nama = '$_GET[ajax]' AND ".$namadepan."syshakakses.ubah = 'y'");
$modulubah->execute();
$modulubah->setFetchMode(PDO::FETCH_ASSOC);
$modulhapus = $koneksi_db->prepare("SELECT ".$namadepan."syshakakses.modul FROM ".$namadepan."modul, ".$namadepan."syshakakses WHERE ".$namadepan."modul.published = 'y' AND ".$namadepan."modul.nama = ".$namadepan."syshakakses.modul AND ".$namadepan."syshakakses.kelompok = $rusercp[kelompok] AND ".$namadepan."syshakakses.aktif = 'y' AND ".$namadepan."modul.nama = '$_GET[ajax]' AND ".$namadepan."syshakakses.hapus = 'y'");
$modulhapus->execute();
$modulhapus->setFetchMode(PDO::FETCH_ASSOC);

	$aColumns = array("'aksi' aksi","pb.id","concat('<p><b>ID |</b> ',judul_id,'</p><p><b>EN |</b> ',judul_en,'</p>') judul","p.nama pengirim","if(pb.prodi=0,'-', pd.singkatan) prodi","concat_ws('<br/>',if(pb.published=1,'Dipublikasi','Konsep'),date_format(pb.whenentri, '%d %b %Y %H:%i')) waktu","pb.hits" );	
	$bColumns = array("aksi","id","judul","pengirim","prodi","waktu","hits" ); //columns for order
	$cColumns = array("pb.judul_id","pb.judul_en","p.nama","k.kat" ); //columns for where

	$sIndexColumn = "pb.id";
	
	$sTable = $namadepan."pengumuman pb";
	$sJoin = "left join ".$namadepan."prodi pd on pd.id = pb.prodi left join ".$namadepan."syspemakai p on p.id = pb.whoentri";
	/* 
	 * Paging
	 */
	$sLimit = "";
	if ( isset( $_GET['iDisplayStart'] ) && $_GET['iDisplayLength'] != '-1' )
	{
		$sLimit = "LIMIT ".( $_GET['iDisplayStart'] ).", ".
			( $_GET['iDisplayLength'] );
	}
	
	
	/*
	 * Ordering
	 */
	if ( isset( $_GET['iSortCol_0'] ) )
	{
		$sOrder = "ORDER BY  ";
		for ( $i=0 ; $i<intval( $_GET['iSortingCols'] ) ; $i++ )
		{
			if ( $_GET[ 'bSortable_'.intval($_GET['iSortCol_'.$i]) ] == "true" )
			{
				$sOrder .= $bColumns[ intval( $_GET['iSortCol_'.$i] ) ]."
				 	".( $_GET['sSortDir_'.$i] ) .", ";
			}
		}
		
		$sOrder = substr_replace( $sOrder, "", -2 );
		if ( $sOrder == "ORDER BY" )
		{
			$sOrder = "";
		}
	}
	
	
	/* 
	 * Filtering
	 * NOTE this does not match the built-in DataTables filtering which does it
	 * word by word on any field. It's possible to do here, but concerned about efficiency
	 * on very large tables, and MySQL's regex functionality is very limited
	 */
	$sWhere = "";
	if ( $_GET['sSearch'] != "" )
	{
		if(!empty($sWhere))
		$sWhere = $sWhere." AND (";
		else
		$sWhere = "WHERE (";
		for ( $i=0 ; $i<count($cColumns) ; $i++ )
		{
			$sWhere .= $cColumns[$i]." LIKE '%".( $_GET['sSearch'] )."%' OR ";
		}
		$sWhere = substr_replace( $sWhere, "", -3 );
		$sWhere .= ')';
	}
	
	/* Individual column filtering */
	for ( $i=0 ; $i<count($cColumns) ; $i++ )
	{
		if ( $_GET['bSearchable_'.$i] == "true" && $_GET['sSearch_'.$i] != '' )
		{
			if ( $sWhere == "" )
			{
				$sWhere = "WHERE ";
			}
			else
			{
				$sWhere .= " AND ";
			}
			$sWhere .= $cColumns[$i]." LIKE '%".($_GET['sSearch_'.$i])."%' ";
		}
	}
	
	
	/*
	 * SQL queries
	 * Get data to display
	 */
	$sQuery = "
		SELECT SQL_CALC_FOUND_ROWS ".str_replace(" , ", " ", implode(", ", $aColumns))."
		FROM   $sTable
		$sJoin
		$sWhere
		$sOrder
		$sLimit
	";
	
	//echo $sQuery;
	$rResult = $koneksi_db->prepare( $sQuery );
	$rResult->execute();
	$rResult->setFetchMode(PDO::FETCH_ASSOC);
	
	/* Data set length after filtering */
	$sQuery = "
		SELECT FOUND_ROWS()
	";
	$rResultFilterTotal = $koneksi_db->prepare( $sQuery );
	$rResultFilterTotal->execute();
	$rResultFilterTotal->setFetchMode(PDO::FETCH_NUM);
	$aResultFilterTotal = $rResultFilterTotal->fetch();
	$iFilteredTotal = $aResultFilterTotal[0];
	
	/* Total data set length */
	$sQuery = "
		SELECT COUNT(".$sIndexColumn.")
		FROM   $sTable
		$sJoin
	";

	$rResultTotal = $koneksi_db->prepare( $sQuery );
	$rResultTotal->execute();
	$rResultTotal->setFetchMode(PDO::FETCH_NUM);
	$aResultTotal = $rResultTotal->fetch();
	$iTotal = $aResultTotal[0];
	//echo $aResultTotal[0];
	
	/*
	 * Output
	 */
	$output = array(
		"sEcho" => intval($_GET['sEcho']),
		"iTotalRecords" => $iTotal,
		"iTotalDisplayRecords" => $iFilteredTotal,
		"aaData" => array()
	);
	
	while ( $aRow = $rResult->fetch() )
	{
		$row = array();
		end($bColumns);
		$lastcol = key($bColumns);
		for ( $i=0 ; $i<count($bColumns) ; $i++ )
		{
			
		if ($i == 0)
		{
				if ($modulubah->rowCount() > 0)
{

$ubah = "<a href=\"?cpmodul=$_GET[ajax]&aksi=ubah&id=".$aRow['id']."\" class=\"btn\" rel=\"tooltip\" title=\"Edit\"><i class=\"icon-edit\"></i></a>";
if (isset($aRow['published']) && $aRow['published'] == 'y')
$publish = "<a href=\"?cpmodul=$_GET[ajax]&aksi=published&id=".$aRow['id']."\"><span class=\"label label-satgreen\">Active</span></a>";
else if (isset($aRow['published']) && $aRow['published'] == 't')
$publish = "<a href=\"?cpmodul=$_GET[ajax]&aksi=published&id=".$aRow['id']."\"><span class=\"label label-lightred\">Inactive</span></a>";
}
else
{
$ubah = "<img src=\"img/lock.png\" border=\"0\" alt=\""._UBAH_."\"/>";
if (isset($aRow['published']) && $aRow['published'] == 'y')
$publish = "<img src=\"img/ya.png\" border=\"0\" alt=\""._YA_."\"/>";
else if (isset($aRow['published']) && $aRow['published'] == 't')
$publish = "<img src=\"img/tidak.png\" border=\"0\" alt=\""._TIDAK_."\"/>";

}
if ($modulhapus->rowCount() > 0)
$hapus = "<a href=\"?cpmodul=$_GET[ajax]&aksi=hapus&id=".$aRow['id']."\" class=\"btn\" rel=\"tooltip\" title=\"Delete\" onclick=\"return confirm('Hapus data ini ?')\"><i class=\"icon-remove\"></i></a>";
else
{
$matikepilih = "disabled";
$hapus = "<img src=\"img/lock.png\" border=\"0\" alt=\""._HAPUS_."\"/>";
}
$row[] = $ubah.$hapus;
		}

		else
		{
			if ( $bColumns[$i] == "version" )
			{
				/* Special output formatting for 'version' column */
				$row[] = ($aRow[ $bColumns[$i] ]=="0") ? '-' : $aRow[ $bColumns[$i] ];
			}
			else if ( $bColumns[$i] != ' ' )
			{
				/* General output */
				$row[] = $aRow[ $bColumns[$i] ];
			}
		}
		}
		$output['aaData'][] = $row;
	}
	
	echo json_encode( $output );
?>