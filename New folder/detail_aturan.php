<!-- proses menampilkan data basis aturan-->
<?php 
//mengambil id dari parameternya
$id_aturan=$_GET['id'];

$sql = "SELECT basis_aturan.id_aturan, basis_aturan.id_penyakit, penyakit.nama_penyakit,
               penyakit.keterangan
        FROM basis_aturan INNER JOIN penyakit ON basis_aturan.id_penyakit= penyakit.id_penyakit
         WHERE basis_aturan.id_aturan='$id_aturan'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>


<!--tampilan halaman detail -->
<div class="row">
    <div class="col-sm-12">
        <form action="" method="POST">
            <div class="card border-dark">
                <div class="card">
                    <div class="card-header bg-primary text-white border-dark"><strong>Detail Halaman Basis Aturan</strong></div>
                    <div class="card-body">

                        <div class="form-group">
                            <label for="">Nama Penyakit</label>
                            <input type="text" class="form-control" value="<?php echo $row['nama_penyakit'] ?>" name="nama" readonly>
                        </div>
                        <div class="form-group">
                            <label for="">Keterangan</label>
                            <input type="text" class="form-control" value="<?php echo $row['keterangan'] ?>" name="ket" readonly>
                        </div>

                        <!-- tabel gejala-gejala-->
                        <label for="">Gejala-Gejala Penyakit :</label>
                        <table class="table table-bordered">
                            <thead class="thead-light">
                                <tr>
                                    <th width="40px">No.</th>
                                    <th width="700px">Nama Gejala</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                $no=1;
                                $sql = "SELECT detail_basis_aturan.id_aturan, detail_basis_aturan.id_gejala, gejala.nama_gejala 
                                    FROM  detail_basis_aturan INNER JOIN gejala 
                                    ON detail_basis_aturan.id_gejala= gejala.id_gejala
                                    WHERE detail_basis_aturan.id_aturan='$id_aturan'";
                                $result = $conn->query($sql);
                                while($row = $result->fetch_assoc()) {
                            ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $row['nama_gejala']; ?></td>
                            </tr>
                            <?php
                                }
                                $conn->close();
                            ?>
                            </tbody>
                        </table>

                    <a class="btn btn-danger" href="?page=aturan">Kembali</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>