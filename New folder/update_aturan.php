<?php
// proses menampilkan data penyakit berdasarkan basis aturan yang dipilih

//mengambil id dari parameter
$id_aturan=$_GET['id'];

$sql = "SELECT  basis_aturan.id_aturan, basis_aturan.id_penyakit, penyakit.nama_penyakit 
        FROM  basis_aturan INNER JOIN penyakit 
        ON basis_aturan.id_penyakit= penyakit.id_penyakit
        WHERE id_aturan='$id_aturan'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

//proses update
if(isset($_POST['update'])){
    $id_gejala=$_POST['id_gejala'];

     //proses simpan detail_basis_aturan
     if($id_gejala!=Null){
         $jumlah = count($id_gejala);
         $i=0;
         while($i < $jumlah){
             $id_gejalanya = $id_gejala[$i];
             $sql = "INSERT INTO detail_basis_aturan VALUES ($id_aturan,'$id_gejalanya')";
             mysqli_query($conn,$sql);
             $i++;
        }
     }
    header("Location:?page=aturan");
}
?>

<div class="row">
    <div class="col-sm-12">
        <form action="" method="POST" >
            <div class="card border-dark">
                <div class="card">
                <div class="card-header bg-primary text-white border-dark"><strong>Update Data Basis Aturan</strong></div>
                <div class="card-body">
                    <div class="form-group">
                      <label for="">Nama Penyakit</label>
                      <input type="text" class="form-control" value="<?php echo $row['nama_penyakit']; ?> " name="nama_penyakit" readonly>
                    </div>

                    <!-- tabel data gejala -->
                    <div class="form-group">
                    <label for="">Pilih gejala-gejala berikut :</label>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th width="20px"></th>
                                    <th width="30px">No.</th>
                                    <th width="700px">Nama Gejala</th>
                                    <th width="50px"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $no=1;
                                    $sql = "SELECT*FROM gejala ORDER BY id_gejala ASC";
                                    $result = $conn->query($sql);
                                    while($row = $result->fetch_assoc()) {

                                        $id_gejala=$row['id_gejala'];

                                        //cek ke tabel detail basis aturannya
                                        $sql2 = "SELECT * FROM detail_basis_aturan  WHERE id_aturan='$id_aturan' AND id_gejala='$id_gejala'";
                                         $result2 = $conn->query($sql2);
                                        if ($result2->num_rows > 0) {
                                            //jika ditemukan maka tampilkan datanya checklist mati hapus aktif

                                ?>
                                    <tr>
                                        <td align="center"><input type="checkbox" class="check-item" disabled="disabled"></td>
                                        <td><?php echo $no++ ?></td>
                                        <td><?php echo $row['nama_gejala']; ?></td>
                                        <td  align="center">
                                        <a onclick="return confirm('Yakin menghapus data ini ?')" class="btn btn-danger" href="?page=aturan&action=hapus_gejala&id_aturan=<?php echo $id_aturan ?>&id_gejala=<?php echo $id_gejala ?>">
                                            <i class="fas fa-window-close"></i>
                                        </a>
                                        </td>
                                        
                                    </tr>
                                <?php
                                    }else{
                                        //jika tidak ditemukan maka checklist nya aktif, hapus mati
                                ?>
                                    <tr>
                                        <td align="center"><input type="checkbox" class="check-item" name="<?php echo 'id_gejala[]'; ?>" value="<?php echo $row['id_gejala']; ?>"></td>
                                        <td><?php echo $no++ ?></td>
                                        <td><?php echo $row['nama_gejala']; ?></td>
                                        <td align="center">
                                            <i class="fas fa-window-close"></i>
                                        </a>
                                        </td>
                                    </tr>
                                <?php
                                    }
                                }
                                    $conn->close();
                                ?>
                            </tbody>
                        </table>
                    </div>

                    <input class="btn btn-primary" type="submit" name="update" value="update">
                    <a class="btn btn-danger" href="?page=aturan">Batal</a>
                </div>
                                </div>
            </div>
        </form>
    </div>
</div>