<?php
$db=pg_connect('host=localhost dbname=wash user=postgres password=.');
if( !$db ){
    // die("Gagal terhubung dengan database: " . pg_last_error());
    echo "Disconnect";
}
?>
