<?php
  foreach ($dataPegawai as $pegawai) {
    ?>
    <tr>
      <td style="min-width:230px;"><?php echo $pegawai->pegawai; ?></td>
      <td><?php echo $pegawai->telp; ?></td>
      <td><?php echo $pegawai->kota; ?></td>
      <td><?php echo $pegawai->kelamin; ?></td>
      <td><?php echo $pegawai->posisi; ?></td>
      <td class="text-center" style="min-width:230px;">
        <button class="btn btn-warning update-dataPegawai" data-id="<?php echo $pegawai->id; ?>"><i class="glyphicon glyphicon-repeat"></i></button>
        <button class="btn btn-danger konfirmasiHapus-pegawai" data-id="<?php echo $pegawai->id; ?>" data-toggle="modal" data-target="#konfirmasiHapus"><i class="glyphicon glyphicon-remove-sign"></i></button>
      </td>
    </tr>
    <?php
  }
?>