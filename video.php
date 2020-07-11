<?php
     include "dbconfig.php";
     $id_video = $_GET['video'];
     $query = mysqli_query($connection, "SELECT * FROM video_tb WHERE id = ".$id_video."");
     $data = mysqli_fetch_assoc($query);
     $query2 = mysqli_query($connection, "SELECT * FROM category_tb WHERE id = ".$data['category_id']."");
     $data2 = mysqli_fetch_assoc($query2);
     echo '<div class="embed-responsive embed-responsive-16by9" >
     <iframe class="embed-responsive-item" src="'.$data['attache'].'" allowfullscreen></iframe>
   </div></br><h3>'.$data['title'].'</h3><h4>Category : <b>'.$data2['name'].'</b></p><br/>';
?>