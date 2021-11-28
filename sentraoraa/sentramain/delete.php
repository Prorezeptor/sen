<?php
require 'fungsi.php';

$id = $_GET["id"];

if( delete($id) > 0) {
    echo "
    <script>
        document.location.href = 'index.php';
    </script>
    ";
}

?>