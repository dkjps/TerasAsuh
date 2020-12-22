<?php
  $warna = array('danger', 'warning', 'primary', 'success');
  $caption = array('Belum Buka', 'Daftar', 'Jalan', 'Selesai');
  $i = 1;
  foreach ($detail as $d) {
    $statusPelatihan = rand(0,3);
    ?>
    <tr>
      <td><?=$i++?></td>
      <td><a href="<?=base_url("PemateriKelas/detailKelas/$d->id_kelas")?>"><?php echo $d->nama_kelas; ?></a></td>
      <td><?php echo $d->nama_pelatihan; ?></td>
      <td><?php echo ($d->jumlah_peserta?$d->jumlah_peserta:0); ?></td>
      <td><?php echo ($d->jumlah_pemateri?$d->jumlah_pemateri:0); ?></td>
      <td><?php echo $d->tgl_buka; ?></td>
      <td><?php echo $d->tgl_selesai; ?></td>
      <td class="text-center">
        <span>
        <?php echo $statusPelatihan; ?>
        </span>
      </td>
      <td class="text-center">
        <span class="btn btn-<?=$warna[$d->status_kelas]?>">
        <?php echo $caption[$d->status_kelas]; ?>
        </span>
      </td>
      <!-- <td class="text-center" style="min-width:150px;">
        <button class="btn btn-warning update-dataPegawai" data-id="<?php echo $d->id_kelas; ?>"><i class="fas fa-share"></i></button>
        <a href="<?=base_url("Kelas/ubahKelas/$d->id_kelas")?>" class="btn btn-primary update-data" ><i class="fas fa-pen"></i></a>
        <button class="btn btn-danger" onclick="konfirmasiHapus('<?=base_url("Kelas/hapusKelas/$d->id_kelas")?>')"><i class="fas fa-trash"></i></button>
      </td> -->
    </tr>
    <?php
  }
?>
