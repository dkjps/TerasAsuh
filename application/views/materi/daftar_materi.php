<?php $i=1; foreach ($materi as $m): ?>
  <tr>
    <td><?=$i++?></td>
    <td> <a href="<?=base_url("Materi/detailMateri/$m->id_materi")?>"><?=$m->judul?></a> </td>
    <td style="min-widtd:200px;"><?=$m->nama?></td>
    <td style="min-widtd:150px;">
      <a href="<?=base_url("Materi/ubahMateri/$m->id_materi")?>" class="btn btn-primary update-dataPegawai"><i class="fas fa-pen"></i></a>
      <button class="btn btn-danger konfirmasiHapus-pegawai" onclick="konfirmasiHapus('<?=base_url("Materi/hapusMateri/$m->id_materi")?>')"><i class="fas fa-trash"></i></button>
    </td>
  </tr>
<?php endforeach; ?>
