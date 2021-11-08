<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CAR LIST</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="card-header bg-info">
                <h4 class ="text white">
                    Car List
                </h4>
            </div>
            <div class="card-body">
                <form action="list-buku.php" method="get">
                    <input type="text" name="search" 
                    class="form-control mb-2"
                    placeholder="Masukan Keyword Pencarian" />
                </form>

                <ul class="list-group">
                    <?php
                    include "connect.php";
                    if(isset($_GET["search"])){
                        $cari = $_GET["search"];
                        $sql = "select * from mobil
                        where nomor_mobil like '%$cari%'
                        or merk like '%$cari%'
                        or jenis like '%$cari%'
                        or warna like '%$cari%'
                        or tahun_pembuatan like '%$cari%'
                        or biaya_sewa_per_hari like '%$cari%'";       }
                    else {
                        $sql = "select * from mobil";    
                    }
                    $hasil = mysqli_query($connect,$sql);
                    while ($mobil = mysqli_fetch_array($hasil)){
                        ?>
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-lg-4">
                                    <img src="image/<?=$buku['image']?>"
                                    width="300">
                                </div>
                                <div class="col-lg-6">
                                <h6>nomor_mobil :<?=$mobil["penerbit"]?></h6>
                                <h6>merk :<?=$mobil["penulis"]?></h6>
                                    <h6>jenis :<?=$mobil["genre_buku"]?></h6>
                                    <h6>warna :<?=$mobil["isbn"]?></h6>
                                    <h6>tahun_pembuatan :<?=$mobil["jumlah_halaman"]?></h6>
                                    <h6>biaya_sewa_per_hari :<?=$mobil["isbn"]?></h6>

                                </div>
                                <div class="col-lg-2">
                                    <a href="form_mobil.php?id_mobil=<?=$mobil["id_mobil"]?>">
                                    
                                    <button class="btn btn-info btn-block">
                                        Edit
                                    </button>
                                 </a>
                                   
                                    <a href="proses-mobil.php?id_mobil=<?=$mobil["id_mobil"]?>"
                                    onclick="return confirm('are u sure?')">
                                    <button class="btn btn-danger btn-block">
                                        Delete
                                    </button>
                                </a>
                                    

                                </div>
                            </div>

                        </li>
                    <?php
                    }
                    ?>
                </ul>
            </div>
        </div>
    </div>
</body>
</html>