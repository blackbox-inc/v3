<?php
if (isset($_POST['generate'])) {
    $code = $_POST['barcode'];
    echo "<img alt='testing' src='barcode.php?codetype=code128&size=30&text=" .
        $code .
        "&print=true'/>";
}
?>