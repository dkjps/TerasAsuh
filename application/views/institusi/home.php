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
							</div>
							</div>
							<div class="card-body">
							<form class="" action="<?=base_url("master/Institusi/tambahinstitusi")?>" method="post" id="forminstitusi">
								<div class="row" style="">
									<input style="width:60%; margin-left:10%;" class="form-control border-secondary" type="text" id="txtinstitusi" name="institusi" value="" placeholder="Tambah Kategori">
									<button style="width:10%; margin-left:10px;" class="form-control btn btn-success" type="submit" name="submit" value="true" id="btnsave">Tambah</button>
									<button style="width:10%; margin-left:10px; display:none;" class="form-control btn btn-secondary" type="reset" id="btnclear" onclick="batal()">Batal</button>
								</div>
							</form><br>
								<div class="table-responsive">
									<table id="" class="table table-bordered table-striped">
										<thead>
											<tr>
												<th>#</th>
												<th>Institusi</th>
												<th style="text-align: center;">Aksi</th>
											</tr>
										</thead>
										<tbody id="">
											<?php $i=1; foreach ($institusi as $s): ?>
												<tr>
													<th><?=$i?></th>
													<td>
														<?=$s->nama?>
													</td>
													<td>
														<button type="button" onclick="konfirmasiHapus('<?=base_url("master/Institusi/hapusinstitusi/$s->id")?>')" class="float-right btn btn-danger text-white"><i class="fas fa-trash"></i></button>
														<button type="button" onclick="editInstitusi('<?=$s->id?>','<?=$s->nama?>')" class="float-right btn btn-primary text-white mr-3"><i class="fas fa-edit"></i></button>
													</td>
												</tr>
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
	function editInstitusi(id, institusi){
			$('#txtinstitusi').val(institusi);
			$('#forminstitusi').attr('action', '<?=base_url("master/Institusi/ubahInstitusi/")?>'+id);
			$('#btnsave').html('Ubah');
			$('#btnsave').attr('class', 'form-control btn btn-primary');
			$('#btnclear').show();
	}

	function batal(){
		$('#forminstitusi').attr('action', '<?=base_url("master/Institusi/tambahinstitusi/")?>');
		$('#btnsave').attr('class', 'form-control btn btn-success');
		$('#btnsave').html('Tambah');
		$('#btnclear').hide();
	}
</script>
