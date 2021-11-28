<?php
//untuk koneksi ke database
$db = mysqli_connect("localhost", "root", "",  "menu");

function query($query) {
    global $db;
    $result = mysqli_query($db, $query);
    $rows = [];
    while( $row = mysqli_fetch_assoc($result) ) {
        $rows[] = $row;
    }
    return $rows;
}

function tambah($data) {
    global $db;
    $imge = htmlspecialchars($data["imge"]);
    $nama = htmlspecialchars($data["nama"]);
    $harga = htmlspecialchars($data["harga"]);

    //query buat nambah data
    $query = "INSERT INTO menu VALUES
             ('', '$imge', '$nama', '$harga')
             ";
    mysqli_query ($db, $query);
    return mysqli_affected_rows($db);
}

function delete($id) {
    global $db;
    mysqli_query($db, "DELETE FROM menu WHERE id= $id");
    return mysqli_affected_rows($db);
}

function ubah($data) {
    global $db;
    $id = $data["id"];
    $imge = htmlspecialchars($data["imge"]);
    $nama = htmlspecialchars($data["nama"]);
    $harga = htmlspecialchars($data["harga"]);

    //query buat edit data
    $query = "UPDATE menu SET
             imge = '$imge', 
             nama = '$nama', 
             harga = '$harga'
            WHERE id = $id
        ";
    mysqli_query ($db, $query);
    return mysqli_affected_rows($db);
}

function cari($keyword) {
    $query = "SELECT * FROM menu WHERE nama LIKE '%$keyword%'";
    return query($query);
}
?>



