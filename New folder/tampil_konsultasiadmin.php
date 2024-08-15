<div class="card">
  <div class="card-header bg-primary text-white border-dark"><strong>Data Hasil Konsultasi Pasien</strong></div>
  <div class="card-body">
    <table class="table table-bordered" id="myTable">
    <thead>
      <tr>
        <th width="50px">No.</th>
        <th width="100px">Tanggal</th>
        <th width="400px">Nama Pasien</th>
        <th width="300px">Jenis Kelamin</th>
        <th width="100px">Umur</th>
        <th width="100px"></th>
      </tr>
    </thead>
    <tbody>
    <?php
        $no=1;
        $sql = "SELECT * FROM konsultasi ORDER BY tanggal DESC";
        $result = $conn->query($sql);
        while($row = $result->fetch_assoc()) {
     ?>
        <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo $row['tanggal']; ?></td>
            <td><?php echo $row['nama_pasien']; ?></td>
            <td><?php echo $row['jenis_kelamin']; ?></td>
            <td><?php echo $row['umur']; ?></td>
            <td align="center">
                <a class="btn btn-primary" href="?page=konsultasi_admin&action=detail&id=<?php echo $row['id_konsultasi']; ?>">
                    <i class="fas fa-list"></i>
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