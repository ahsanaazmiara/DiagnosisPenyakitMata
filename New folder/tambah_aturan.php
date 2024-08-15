<?php

if(isset($_POST['simpan'])){
    //menganmbil data dari form
    $nama_penyakit=$_POST['nama_penyakit'];
	
    // validasi nama penyakit
    $sql = "SELECT basis_aturan.id_aturan, basis_aturan.id_penyakit, penyakit.nama_penyakit
            FROM basis_aturan INNER JOIN penyakit 
            ON basis_aturan.id_penyakit=penyakit.id_penyakit WHERE nama_penyakit='$nama_penyakit'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        ?>
            <div class="alert alert-danger alert-dismissible fade show">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>Data basis aturan penyakit sudah ada!</strong>
            </div>
        <?php
    }else{
        
        //mengambil data penyakit
        $sql = "SELECT * FROM penyakit WHERE nama_penyakit='$nama_penyakit'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $id_penyakit =$row['id_penyakit'];

	    //proses simpan basis_aturan
        $sql = "INSERT INTO basis_aturan VALUES (Null,'$id_penyakit')";
        mysqli_query($conn,$sql);

        //mengambil id_gejala
        $id_gejala=$_POST['id_gejala'];

        //mengambil data aturan
        $sql = "SELECT * FROM basis_aturan ORDER BY id_aturan DESC";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $id_aturan=$row['id_aturan'];

        //proses simpan detail_basis_aturan
        $jumlah = count($id_gejala);
        $i=0;
        while($i<$jumlah){
            $id_gejalanya = $id_gejala[$i];
            $sql = "INSERT INTO detail_basis_aturan VALUES ($id_aturan,'$id_gejalanya')";
            mysqli_query($conn,$sql);
            $i++;
        }

            header("Location:?page=aturan");
    }
}
?>

<div class="row">
    <div class="col-sm-12">
        <form action="" method="POST" name="Form" onsubmit="return validasiForm()">
            <div class="card border-dark">
                <div class="card">
                <div class="card-header bg-primary text-white border-dark"><strong>Tambah Data Basis Aturan</strong></div>
                <div class="card-body">
                    <div class="form-group">
                      <label for="">Nama Penyakit</label>
                      <select class="form-control chosen" data-placeholder="Pilih Nama Penyakit" name="nama_penyakit">
                        <option value=""></option>
                        <?php
                            $sql = "SELECT * FROM penyakit ORDER BY nama_penyakit ASC";
                            $result = $conn->query($sql);
                            while($row = $result->fetch_assoc()) {
                        ?>
                            <option value="<?php echo $row['nama_penyakit']; ?>"><?php echo $row['nama_penyakit']; ?></option>
                        <?php
                            }
                        ?>
                      </select>
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
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $no=1;
                                    $sql = "SELECT*FROM gejala ORDER BY id_gejala ASC";
                                    $result = $conn->query($sql);
                                    while($row = $result->fetch_assoc()) {
                                ?>
                                <tr>
                                    <td align="center"><input type="checkbox" class="check-item" name="<?php echo 'id_gejala[]'; ?>" value="<?php echo $row['id_gejala']; ?>"></td>
                                    <td><?php echo $no++ ?></td>
                                    <td><?php echo $row['nama_gejala']; ?></td>
                                    
                                </tr>
                                <?php
                                    }
                                    $conn->close();
                                ?>
                            </tbody>
                        </table>
                    </div>

                    <input class="btn btn-primary" type="submit" name="simpan" value="Simpan">
                    <a class="btn btn-danger" href="?page=aturan">Batal</a>
                </div>
            </div>
        </form>
    </div>
</div>

<script type="text/javascript"> 
    function validasiForm(){
        //validasi nama penyakit
        var nama_penyakit = document.forms["Form"]["nama_penyakit"].value;

        if(nama_penyakit==""){
            alert("Pilih nama penyakit!");
            return false;
        }

        //validasi gejala yang belum dipilih
        var checkbox=document.getElementsByName('<?php echo 'id_gejala[]'; ?>');

        var isChecked=false;

        for(var i=0;i<checkbox.length;i++){
            if(checkbox[i].checked){
                isChecked =true;
                break;
            }
        }

        // jika belum ada yang dicheck
        if(!isChecked){
            alert("Pilih nama gejala!");
            return false;
        }

        return true;
    }
</script>