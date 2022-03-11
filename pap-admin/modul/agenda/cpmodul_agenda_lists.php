<?php
if(!defined("INCLUDE_FILE_INI")) { die ("Access denied"); }
?>
<div class="row-fluid">
					<div class="span12">
					<?php
							
							if (isset($_SESSION['session_berhasil']))
							{
								
						?>
						<div class="alert alert-success">
											<button type="button" class="close" data-dismiss="alert">&times;</button>
											<?=$_SESSION['session_berhasil']?>
										</div>
						<?php
						unset($_SESSION['session_berhasil']);
							}
							
							?>
<div class="box box-bordered box-color">
								<div class="box-title">
									<h3>
										<i class="icon-table"></i>
										Daftar <?=$rmodul['lengkap']?><a name="tablecontent"></a>
									</h3>
									
									<?php
									if ($modultambah->rowCount() > 0)
									?>
										<div class="actions"><a href="?cpmodul=<?=$namamodul?>&aksi=tambah" class="btn"><i class="icon-plus-sign"></i> Tambah Baru</a></div>
										
								</div>
								
								
								<div class="box-content nopadding">


					<table id="table__<?=$namamodul?>" class="table table-hover table-nomargin table-bordered dataTable dataTable-sorting dataTable-hidden dataTable-ajax" data-ajax-modul="<?=$namamodul?>" data-hidden="1" data-sorting="1,desc" >
								
									<thead>
										<tr>
												<th>Aksi</th>
												<th>ID</th>
											
												<th>Nama Agenda</th>
												
												<th>Waktu Agenda</th>
												<th>Informasi Agenda</th>
												
												
												
												
												
												
											
										</tr>
									</thead>
									
										</table>

									 </div>
									
								</div></div></div>
								