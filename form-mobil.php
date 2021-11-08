<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form mobil</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="card-header bg-info">
                <h4 class="text-white">Form mobil</h4>
            </div>

            <div class="card-body">
                <?php
                if (isset($_GET["id_mobil"])) {
                  
                    include "connect.php";
                    $id_mobil = $_GET["id_mobil"];
                    $sql = "select * from mobil where id_mobil='$id_mobil'";
                    # eksekusi perintah sql
                    $hasil = mysqli_query($connect, $sql);
                    # konversi hasil query ke bentuk array
                    $mobil = mysqli_fetch_array($hasil);
                    ?>

                <form action="proses-mobil.php" method="post">
                    ID mobil
                    <input type="text" name="id_mobil"
                    class="form-control mb-2" required
                    value="<?=$mobil["id_mobil"] ?>" readonly>

                    Nomor Mobil
                    <input type="text" name="nomor_mobil"
                    class="form-control mb-2" required
                    value="<?=$mobil["nomor_mobil"] ?>">

                    Merk
                    <input type="date" name="merk"
                    class="form-control mb-2" required
                    value="<?=$mobil["merk"] ?>">

                    Jenis 
                    <input type="text" name="jenis"
                    class="form-control mb-2" required
                    value="<?=$mobil["jenis"] ?>">

                    Warna
                    <input type="text" name="warna"
                    class="form-control mb-2" required
                    value="<?=$mobil["warna"] ?>">

                    Tahun Pembuatan
                    <input type="text" name="tahun_pembuatan"
                    class="form-control mb-2" required
                    value="<?=$mobil["tahun_pembuatan"] ?>">

                    Biaya Sewa Perhari
                    <input type="text" name="biaya_sewa_per_hari"
                    class="form-control mb-2" required
                    value="<?=$mobil["biaya_sewa_per_hari"] ?>">
                    

                    <button type="submit" class="btn btn-primary btn-block"
                    name="edit_anggota" onclick="return confirm('Apakah anda yakin?')">
                        Save
                    </button>
                </form>

                    <?php
                }else {
                    // jika false, maka form anggota digunakan utk insert
                    ?>

                <form action="proses-mobil.php" method="post">
                     ID Mobil
                    <input type="text" name="id_mobil"
                    class="form-control mb-2" required>

                    Nomor Mobil
                    <input type="text" name="nomor_mobil"
                    class="form-control mb-2" required>
                    
                    
                    Merk
                    <input type="text" name="merk"
                    class="form-control mb-2" required>
                   
                   
                    Jenis 
                    <input type="text" name="jenis"
                    class="form-control mb-2" required>


                    Tanggal pembuatan
                    <input type="date" name="tahun_pembuatan"
                    class="form-control mb-2" required>

                    Biaya Perhari
                    <input type="text" name="biaya_sewa_per_hari"
                    class="form-control mb-2" required>

                    Foto Mobil
                    <input type="file" name="image"
                    class="form-control mb-2" required>
                    

                    <button type="submit" class="btn btn-primary btn-block"
                    name="simpan_mobil" onclick="return confirm('Apakah anda yakin?')">
                        Save
                    </button>
                </form>

                    <?php
                }
                ?>
                
            </div>
        </div>
    </div>
</body>
</html>
