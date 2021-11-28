<?php
//untuk koneksi ke database
$db = mysqli_connect("localhost", "root", "",  "latihan");

function query($query) {
    global $db;
    $result = mysqli_query($db, $query);
    $rows = [];
    while( $row = mysqli_fetch_assoc($result) ) {
        $rows[] = $row;
    }
    return $rows;
}

function regist($data) {
    global $db;

    $fname = htmlspecialchars($data["fname"]);
    $username = mysqli_real_escape_string($db, $data["username"]);
    $password = mysqli_real_escape_string($db, $data["password"]);
    $password2 = mysqli_real_escape_string($db, $data["password2"]);

    //cek konfirmasi password
    if ( $password !== $password2 ) {
        echo "<script>
        alert('konfirmasi password tidak sesuai')
        </script>";
        return false;
    }
    $password = password_hash($password, PASSWORD_DEFAULT);

    mysqli_query($db, "INSERT INTO lgn VALUES
    ('','$fname', '$username','$password')");
}
?>