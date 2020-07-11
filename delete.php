<?php
    include "dbconfig.php";
    $id_video = $_GET['delete'];
    if(mysqli_query($connection, "DELETE FROM video_tb WHERE id = ".$id_video."")) { echo "<script>alert('Delete Video Berhasil ...'); javascript:location.replace('index.php');</script>"; }
    else { echo "<script>alert('Delete Video Gagal ...'); </script>"; }
?>