<?php
 $uploadpath_thumbnail = 'upload/thumbnail/';
 $uploadpath_video = 'upload/video/';
 $max_size_thumbnail = 5;
 $allowtype_thumbnail = array('bmp', 'gif', 'jpg', 'jpe', 'png');
 $allowtype_video = array('mp4', 'mkv', 'avi', 'webm', 'flv', 'mpeg');
 $jumlah_query = mysqli_num_rows(mysqli_query($connection, 'SELECT * FROM video_tb'));
 $jumlah_query++;

 if(isset($_FILES['thumbnail']) && isset($_FILES['video']) && strlen($_FILES['thumbnail']['name']) > 1 && strlen($_FILES['video']['name']) > 1) {
     $uploadpath2_thumbnail = $uploadpath_thumbnail . basename($_FILES['thumbnail']['name']);
     $uploadpath2_video = $uploadpath_video . basename($_FILES['video']['name']);
     $sepext = explode('.', strtolower($_FILES['thumbnail']['name']));
     $sepext2 = explode('.', strtolower($_FILES['video']['name']));
     $type_thumbnail = end($sepext);
     $type_video = end($sepext2);
     $err = '';

     $judul = $_POST["judul"];
     $category = $_POST["category"];
 
     $query2 = mysqli_query($connection, "INSERT INTO video_tb VALUES('$jumlah_query', '$judul', '$category', '$uploadpath2_video', '$uploadpath2_thumbnail')");

     if(!in_array($type_thumbnail, $allowtype_thumbnail)) $err = "<script>alert('Tipe File: $file_name Bukanlah Tipe File Berupa Gambar.'); javascript:location.replace('index.php?addvideo');</script>";
     if(!in_array($type_video, $allowtype_video)) $err = "<script>alert('Tipe File: $file_name Bukanlah Tipe File Berupa Video.'); javascript:location.replace('index.php?addvideo');</script>";
     if($_FILES['thumbnail']['size'] > $max_size_thumbnail*1000000) $err = "<script>alert('Maximum File Size Thumbnail Adalah: $max_size_thumbnail MB.'); javascript:location.replace('index.php?addvideo');</script>";
     if($err == '')
     {
         if(move_uploaded_file($_FILES['thumbnail']['tmp_name'], $uploadpath2_thumbnail) && move_uploaded_file($_FILES['video']['tmp_name'], $uploadpath2_video) && $query2){
             echo "<script>alert('Add Video Berhasil ....'); javascript:location.replace('index.php');</script>";
         }
         else echo "<script>alert('Error Upload Thumbnail Foto ....'); javascript:location.replace('index.php?add_video');</script>";
     }
     else echo $err;
 }
?>