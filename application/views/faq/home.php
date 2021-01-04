<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$id = $this->uri->segment(3);
?>

<div class="main-content" id="halaman_subbab">
	<section class="section">
		<div class="section-header">
			<h1><?=$title?></h1>
		</div>
		<div class="section-body">
			<div class="row">
				<div class="col-12">
					<div class="card">
						<div class="card-header">
							<div class="col-md-12">
								<?php echo @$this->session->flashdata('msg'); ?>
								<a href="<?php echo base_url('master/Faq/tambahPertanyaan/'); ?>" class="btn btn-info float-right"
									role="button" aria-pressed="true"><i class="fas fa-plus" style="padding-right:3px"></i> Tambah FAQ</a>
								</div>
							</div>
							<div class="card-body">
							<form class="" action="<?=base_url("master/Faq/tambahKategori")?>" method="post" id="formfaq">
								<div class="row" style="">
									<input style="width:60%; margin-left:10%;" class="form-control border-secondary" type="text" id="txtkategori" name="kategori" value="" placeholder="Tambah Kategori">
									<button style="width:10%; margin-left:10px;" class="form-control btn btn-success" type="submit" name="submit" value="true" id="btnsave">Tambah</button>
									<button style="width:10%; margin-left:10px; display:none;" class="form-control btn btn-secondary" type="reset" id="btnclear" onclick="batal()">Batal</button>
								</div>
							</form><br>
								<div class="table-responsive">
									<table id="" class="table table-bordered table-striped">
										<thead>
											<tr>
												<th>#</th>
												<th>Kategori</th>
												<th style="text-align: center;">Aksi</th>
											</tr>
										</thead>
										<tbody id="">
											<?php $i=1; foreach ($kategori as $s): ?>
												<tr>
													<th><?=$i?></th>
													<td>
														<button class="btn btn-link" type="button" data-toggle="collapse" data-target=".pertanyaan<?=$i?>" aria-expanded="false" aria-controls="pertanyaan<?=$i?>">
														<?=$s->kategori?>
														</button>
													</td>
													<td>
														<button type="button" onclick="konfirmasiHapus('<?=base_url("master/Faq/hapusKategori/$s->id")?>')" class="float-right btn btn-danger text-white"><i class="fas fa-trash"></i></button>
														<button type="button" onclick="editKategori('<?=$s->id?>','<?=$s->kategori?>')" class="float-right btn btn-primary text-white mr-3"><i class="fas fa-edit"></i></button>
													</td>
												</tr>
												<?php
													$pertanyaan = $cont->listPertanyaan($s->id);
													$j = 1;
													foreach ($pertanyaan as $p) { ?>
														<tr id="pertanyaan<?=$i?>" class="collapse pertanyaan<?=$i?>">
														<!-- <tr> -->
																<td>&ensp;&ensp;<?=$i?>.<?=$j++?></td>
																<td>&ensp;&ensp;<?=$p->pertanyaan?></td>
																<td>
																	<button type="button" onclick="konfirmasiHapus('<?=base_url("master/Faq/hapusPertanyaan/$p->id")?>')" class="float-right btn btn-danger text-white"><i class="fas fa-trash"></i></button>
																	<a href="<?=base_url("master/Faq/ubahPertanyaan/$p->id")?>" class="float-right btn btn-primary text-white mr-3"><i class="fas fa-edit"></i></a>
																</td>
														</tr>
												<?php } ?>
											<?php $i++; endforeach; ?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>
<script type="text/javascript">
	function editKategori(id, kategori){
			$('#txtkategori').val(kategori);
			$('#formfaq').attr('action', '<?=base_url("master/Faq/ubahKategori/")?>'+id);
			$('#btnsave').html('Ubah');
			$('#btnsave').attr('class', 'form-control btn btn-primary');
			$('#btnclear').show();
	}

	function batal(){
		$('#formfaq').attr('action', '<?=base_url("master/Faq/tambahKategori/")?>');
		$('#btnsave').attr('class', 'form-control btn btn-success');
		$('#btnsave').html('Tambah');
		$('#btnclear').hide();
	}
</script>
