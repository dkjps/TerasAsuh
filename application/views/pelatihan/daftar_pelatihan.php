<?php
  $warna = array('danger', 'warning', 'primary', 'success');

  $i = 1;
  foreach ($pelatihan as $p) {
    ?>
    <tr>
      <td><?=$i++?></td>
      <td style="min-width:0;"><a class="" href="<?php echo base_url("Pelatihan/detailPelatihan/$p->id"); ?>"><?php echo $p->nama; ?></a></td>
      <td style="min-width:0;"><?php echo $p->deskripsi; ?></td>
      <td class="text-center">
        <a href="<?=base_url("pelatihan/ubahPelatihan/$p->id")?>" class="btn btn-primary update-dataPegawai" data-id="<?php echo $p->id; ?>"><i class="fas fa-pen"></i></a>
        <?php if ($cont->is_delete($p->id)): ?>
          <button class="btn btn-danger konfirmasiHapus-pegawai" onclick="konfirmasiHapus('<?=base_url("Pelatihan/hapusPelatihan/$p->id")?>')"><i class="fas fa-trash"></i></button>
        <?php endif; ?>
      </td>
    </tr>
    <?php
  }
?>

<script type="text/javascript">
  function konfirmasiHapus(link){
    $('#btnYa').attr('href', link);
    $('#konfirmasiHapus').modal('show');
  }
</script>
