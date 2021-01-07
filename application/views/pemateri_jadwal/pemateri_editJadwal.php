<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// $id_materi = $this->uri->segment(3);
$id_jadwal = $this->uri->segment(4);
?>

<div class="main-content">
	<section class="section">
		<div class="section-header">
			<a href="javascript:window.history.go(-1);" class="fas fa-chevron-left text-dark" style="font-size:20px; margin-left:25px;"></a>
			<h1><?=$title?></h1>
			<div class="msg" style="display:none;">
				<?php echo @$this->session->flashdata('msg'); ?>
			</div>
		</div>
		<div class="section-body">
			<div class="row">
				<div class="col-12">
					<div class="card">
						<div class="card-body">
							<div class="col col-md-12">
								<div class="col col-md-12">
									<table>
										<tr>
											<td style="width:70px;"><label class="">Pelatihan</label></td>
											<th style="width:50px;">:</th>
											<th><h6 class=""><a class="" href="<?php echo base_url("Pelatihan/detailPelatihan/$detail->id_pelatihan"); ?>"><?=($detail)?$detail->nama_pelatihan:''?></h6></a></th>
										</tr>
										<tr>
											<td style="width:70px;"><label class="">Kelas</label></td>
											<th style="width:50px;">:</th>
											<th><h6 class=""><a href="<?=base_url("Kelas/detailKelas/$detail->id_kelas")?>"> <?=($detail)?$detail->nama_kelas:''?></a></h6></th>
										</tr>
										<tr>
											<td style="width:70px;"><label class="">Materi</label></td>
											<th style="width:50px;">:</th>
											<th><h6 class=""><a href="<?=base_url("Materi/detailMateri/$detail->id_materi")?>"><?=($detail)?$detail->judul_materi:''?></a></h6></th>
										</tr>
										<!-- <tr>
											<td style="width:70px;"><label class="">Pemateri</label></td>
											<th style="width:50px;">:</th>
											<th><h6 class=""><?=($detail)?$detail->namalengkap:''?></h6></th>
										</tr> -->
									</table>
									<br>
									<form action="<?=base_url("PemateriJadwal/ubahJadwal/$id_jadwal")?>" method="post">
										<div class="form-horizontal">
											<div class="form-group">
												<label class="col-md-2 control-label" for="inputNamaPelatihan">Link Meeting</label>
												<div class="row" style="margin:auto;">
													<input style="width:75%;" type="text" name="link" class="form-control" id="link" value="<?=(!empty($detail->link_meet)?$detail->link_meet:'')?>">
													<button style="width:15%;" type="button" name="button" class="btn btn-secondary" onclick="copyClipboard('link')"><i class="fas fa-copy"></i> </button>
												</div>
											</div>

											<div class="form-group">
												<label class="col-md-2 control-label" for="inputNamaPelatihan">Password Meeting</label>
												<div class="row" style="margin:auto;">
													<input style="width:75%;" type="text" name="password" class="form-control" id="pass" value="<?=(!empty($detail->password_meet)?$detail->password_meet:'')?>">
													<button style="width:15%;" type="button" name="button" class="btn btn-secondary" onclick="copyClipboard('pass')"><i class="fas fa-copy"></i></button>
												</div>
											</div>
											<div class="form-group">
												<input type="submit" name="submit" value="Simpan" class="btn btn-success col-md-8">
											</div>
										</div>
									</form>
									<br><br>
									<div class="table-responsive">
										<table id="" class="table table-bordered table-striped">
											<thead>
												<tr>
													<th>#</th>
													<th>Judul</th>
													<th>Deksripsi</th>
												</tr>
											</thead>
											<tbody id="data-pegawai">
												<?php $i=1; foreach ($submateri as $s): ?>
													<tr>
														<td><?=$i++?></td>
														<td><a href="<?=base_url("SubMateri/detailSubMateri/$s->id_sub")?>"><?=$s->subbab?></a></td>
														<td><?=$s->deskripsi_subbab?></td>
													</tr>
												<?php endforeach; ?>
											</tbody>
										</table>
									</div>
								</div>
								<br>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
</div>
<script type="text/javascript">
function copyClipboard(id){
	var copyText = document.getElementById(id);
	copyText.select();
	copyText.setSelectionRange(0, 99999); /* For mobile devices */
	document.execCommand("copy");
}
</script>
