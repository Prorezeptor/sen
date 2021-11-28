<?php require 'fungsi.php'; ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="main.css">
        <!-- font awesome -->
        <script src="https://kit.fontawesome.com/dbed6b6114.js" crossorigin="anonymous"></script>
    </head>
    <body>

        
    
        
        <div class = "products">
            <div class = "container">
                <h1 class = "lg-title">TOKO BARANG ANTIK</h1>
                <a href="register.php"><input type="button" value="add"></a>
                <?php 
                    $i = 1;
                    $result = mysqli_query($db, "SELECT * FROM menu");
                    //[note ! "MAAP YA GADA FITUR CARINYA,SOALNYA UDAH DIAMBANG DEADLINE DAN LAPORAN JUGA BLOM SELESE LAGIAN JADI BEGINI AJA DEH XD]
                    //$mencari = query("SELECT * FROM menu");
                    //if ( isset($_post["cari"])) {
                    //    $mencari = cari($_post["keyword"]);
                    //}
                    while ( $hasil = mysqli_fetch_array($result)){
                ?>
                <div class = "product-items">
                    <!--single produk-->
                    <div class = "product">
                        <div class = "product-content">
                            <div class = "product-img">
                                <img src = "images/<?php echo $hasil['imge']; ?>" alt = "product image">
                            </div>
                            <div class = "product-btns">
                                <a href="change.php?id=<?= $hasil["id"];?>"><button type = "button" class = "btn-cart"> change</button></a>
                                <a href="delete.php?id=<?= $hasil["id"];?>"><button type = "button" class = "btn-buy"> delete</button></a>
                            </div>
                        </div>
                    </div>
                    <div class = "product-info">
                        <p class = "product-name"><?php echo $hasil['nama']; ?></a>
                        <p class = "product-price"><?php echo $hasil['harga']; ?></p>         
                    </div>
                </div>

                    <!-- end of single product -->
                <?php
                    }
                    $i++; 
                ?>
                    
                  
    </body>
</html>