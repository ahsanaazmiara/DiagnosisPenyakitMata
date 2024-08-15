<div class="card">
  <div class="card-header bg-primary text-white border-dark"><strong>Data Basis Aturan</strong></div>
  <div class="card-body">
    <a class="btn btn-primary mb-2" href="?page=aturan&action=tambah">Tambah</a>
    <table class="table table-bordered" id="myTable">
    <thead>
      <tr>
        <th width="50px">No.</th>
        <th width="200px">Nama Penyakit</th>
        <th width="300px">Keterangan</th>
        <th width="100px"></th>
      </tr>
    </thead>
    <tbody>
    <?php
        $no=1;
        $sql = "SELECT basis_aturan.id_aturan, basis_aturan.id_penyakit, penyakit.nama_penyakit, 
                penyakit.keterangan FROM basis_aturan INNER JOIN penyakit 
                ON basis_aturan.id_penyakit = penyakit.id_penyakit ORDER BY id_penyakit ASC";
        $result = $conn->query($sql);
        while($row = $result->fetch_assoc()) {
     ?>
        <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo $row['nama_penyakit']; ?></td>
            <td><?php echo $row['keterangan']; ?></td>
            <td align="center">
                <a class="btn btn-primary" href="?page=aturan&action=detail&id=<?php echo $row['id_aturan']; ?>">
                    <i class="fas fa-list"></i>
                </a>
                <a class="btn btn-warning" href="?page=aturan&action=update&id=<?php echo $row['id_aturan']; ?>">
                    <i class="fas fa-edit"></i>
                </a>
                <a onclick="return confirm('Yakin menghapus data ini ?')" class="btn btn-danger" href="?page=aturan&action=hapus&id=<?php echo $row['id_aturan']; ?>">
                    <i class="fas fa-window-close"></i>
                </a>
            </td>
       </tr>
    <?php
        }
        $conn->close();
    ?>
    </tbody>
</table>
</div>
</div>