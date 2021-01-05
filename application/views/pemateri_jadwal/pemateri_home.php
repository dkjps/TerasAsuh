<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$id = $this->uri->segment(3);
?>

<style>
	ul.horizontal-slide {
		margin: 0;
		padding: 0;
		width: 100%;
		white-space: nowrap;
		overflow-x: auto;
	}

	ul.horizontal-slide li[class*="span"] {
		padding: 8px;
		display: inline-block;
		float: none;
	}

	ul.horizontal-slide li[class*="span"]:first-child {
		margin-left: 0;
	}

	ul.horizontal-slide li.active {
		color: #f4ba51;
		border-style: solid;
		border-width: 1px;
	}

</style>

<script>

  document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
      // initialDate: '<?=date('yyyy')?>-<?=date('m')?>-<?=date('d')?>',
      initialDate: '<?=date('Y-m-d')?>',

      // initialView: 'timeGridMonth',
      headerToolbar: {
        // left: 'prev,next today',
				// right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
        center: 'title',
        left: 'prev,next',
				right: 'dayGridMonth,timeGridWeek'
      },
      height: 'auto',
      width: 'auto',
      // navLinks: true, // can click day/week names to navigate views
      // editable: true,
      // selectable: true,
      // selectMirror: true,
      nowIndicator: true,
			events: <?=json_encode($jadwal)?>
    });

    calendar.render();
  });

</script>

<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1><?=$title?></h1>
			<div class="msg" style="display:none;">
				<?php echo @$this->session->flashdata('msg'); ?>
			</div>
		</div>

		<div class="section-body">
			<div class="body">
				<div class="box-body">
					<!-- <pre>
						<?php //var_dump($jadwal); ?>
					</pre> -->
					<div class="col-md-12 ml-3">
						<li class="text-success">Sudah Dimulai</li>
						<li class="text-dark">Akan Datang</li>
						<li class="text-danger">Link Meet Belum Ada</li>
					</div><br>
					<div class="table-responsive">
						<div id='calendar'></div>
					</div>
					<!-- <div class="container-fluid">
						<ul class="horizontal-slide">

							<li class="span2 col-xs-3 text-center active" style="margin-right:4px; margin-right:4px;">
								<h4><strong>Rabu</strong></h1>
									<span>01 Juni</span>
							</li>

							<li class="span2 col-xs-3 text-center" style="margin-right:4px; margin-right:4px;">
								<h4><strong>Kamis</strong></h1>
									<span>02 Juni</span>
							</li>

							<li class="span2 col-xs-3 text-center" style="margin-right:4px; margin-right:4px;">
								<h4><strong>Jumat</strong></h1>
									<span>03 Juni</span>
							</li>

							<li class="span2 col-xs-3 text-center" style="margin-right:4px; margin-right:4px;">
								<h4><strong>Sabtu</strong></h1>
									<span>04 Juni</span>
							</li>

							<li class="span2 col-xs-3 text-center" style="margin-right:4px; margin-right:4px;">
								<h4><strong>Minggu</strong></h1>
									<span>05 Juni</span>
							</li>

							<li class="span2 col-xs-3 text-center" style="margin-right:4px; margin-right:4px;">
								<h4><strong>Senin</strong></h1>
									<span>06 Juni</span>
							</li>

							<li class="span2 col-xs-3 text-center" style="margin-right:4px; margin-right:4px;">
								<h4><strong>Selasa</strong></h1>
									<span>07 Juni</span>
							</li>

							<li class="span2 col-xs-3 text-center" style="margin-right:4px; margin-right:4px;">
								<h4><strong>Rabu</strong></h1>
									<span>08 Juni</span>
							</li>

							<li class="span2 col-xs-3 text-center" style="margin-right:4px; margin-right:4px;">
								<h4><strong>Kamis</strong></h1>
									<span>09 Juni</span>
							</li>
						</ul>

					</div>
					<br>

					<div class="col-md-6 text-center">
						<h4>Daftar Jadwal</h4>
					</div>


					<ul class="list-group list-group-flush">

						<li class="list-group-item" onclick="location.href='<?php echo base_url(); ?>PemateriJadwal/detailJadwal'">
							<div class="card text-white bg-success mb-3">
								<div class="card-header">

									<div class="col-12">
										<a class="far fa-bookmark"></a>
										<span>Nama Pelatihan</span>
									</div>
									<div class="col-12">
										<a class="far fa-clock"></a>
										<span>16:30:00</span>
									</div>

								</div>
								<div class="card-body">
									<h5 class="card-title">Judul Jadwal</h5>
									<div class="row">
										<div class="col-10">
											<span>Link Meeting Ready</span>
										</div>
										<div class="col-2">
											<a id="linkAda" class="fas fa-check"></a>
											<a id="linkTidakAda" class="fas fa-exclamation" hidden></a>
										</div>
									</div>
									<i>kelas selesai</i>
								</div>
							</div>
						</li>

						<li class="list-group-item">
							<div class="card text-white bg-info mb-3">
								<div class="card-header">

									<div class="col-12">
										<a class="far fa-bookmark"></a>
										<span>Nama Pelatihan</span>
									</div>
									<div class="col-12">
										<a class="far fa-clock"></a>
										<span>16:30:00</span>
									</div>

								</div>
								<div class="card-body">
									<h5 class="card-title">Lorem ipsum dolor sit, amet consectetur adipisicing elit.
										Sequi, quibusdam consectetur delectus provident, nam quisquam, amet voluptate
										repellendus nisi reprehenderit totam. Quasi officiis optio sint blanditiis
										soluta illum ut labore!</h5>
									<div class="row">
										<div class="col-10">
											<span>Link Meeting Ready</span>
										</div>
										<div class="col-2">
											<a id="linkAda" class="fas fa-check"></a>
											<a id="linkTidakAda" class="fas fa-exclamation" hidden></a>
										</div>
									</div>
									<i>kelas belum mulai</i>
								</div>
							</div>
						</li>
						<li class="list-group-item">
							<div class="card text-white bg-info mb-3">
								<div class="card-header">

									<div class="col-12">
										<a class="far fa-bookmark"></a>
										<span>Nama Pelatihan</span>
									</div>
									<div class="col-12">
										<a class="far fa-clock"></a>
										<span>16:30:00</span>
									</div>

								</div>
								<div class="card-body">
									<h5 class="card-title">Judul Jadwal</h5>
									<div class="row">
										<div class="col-10">
											<span>Kurang Link Meeting</span>
										</div>
										<div class="col-2">
											<a id="linkAda" class="fas fa-check" hidden></a>
											<a id="linkTidakAda" class="fas fa-exclamation"></a>
										</div>
									</div>
									<i>kelas belum mulai</i>
								</div>
							</div>
						</li>
					</ul> -->

				</div>
			</div>

		</div>
	</section>
</div>
