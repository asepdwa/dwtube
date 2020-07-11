<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DWTube - Streaming Video Online</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <!-- JS, Popper.js, and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <b><a class="navbar-brand" href="#">DW<span style="color: orange;">Tube</span></a></b>
  <ul class="navbar-nav ml-auto">
  <li class="nav-item">
  <?php if(isset($_GET['video'])){ ?>
  <a href="?delete=<?php echo $_GET['video']; ?>" class="btn btn-sm btn-danger my-2 my-sm-0">Delete This Video</a>
  <?php } else { ?>
  <a href="?add_video" class="btn btn-sm btn-warning mr-sm-2">Add Video</a>
  <a href="?add_category" class="btn btn-sm btn-warning my-2 my-sm-0">Add Category</a>
  <?php } ?>
  </li>
  </ul>
</nav><br/>
<div class="container">
<?php
    if(isset($_GET['add_video']))
    {   include_once "add_video.php"; }
    else if(isset($_GET['add_category']))
    {   include_once "add_category.php"; }
    else if(isset($_GET['video']))
    {   include_once "video.php"; }
    else if(isset($_GET['delete']))
    {   include_once "delete.php"; }
    else
    {
?>
<div class="dropdown">
  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Sort By Category
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <?php
        include_once "dbconfig.php";
        $query3 = mysqli_query($connection, "SELECT * FROM category_tb");
        while($row2 = mysqli_fetch_assoc($query3)){
            echo '<a class="dropdown-item" href="?category='.$row2['id'].'">'.$row2['name'].'</a>';
        }
        echo "</div></div><br>";
        
        if(isset($_GET['category']))  $sql = 'SELECT * FROM video_tb WHERE category_id = '.$_GET['category'].'';
        else $sql 	= 'SELECT * FROM video_tb';

            $query 	= mysqli_query($connection, $sql);
            $jumlah_query = mysqli_num_rows($query);
            $i = 0;
            if(!$jumlah_query) { echo "<br/><center><h4><em>Kagak ada video yang di upload ....</em></h4></center>"; }
            else
            {
                while($row = mysqli_fetch_assoc($query)){
                    $i++;
                    $sql_cat = 'SELECT * FROM category_tb WHERE id = '.$row['category_id'].'';
                    $query2 = mysqli_query($connection, $sql_cat);
                    $category = mysqli_fetch_assoc($query2)['name'];
                    if($i == 1){ echo '<div class="row">'; }
                    echo '<a class="col-sm-4" href="index.php?video='.$row["id"].'" style="color: #343a40;">
                    <img src="'.$row["thumbnail"].'" class="img-fluid" alt="'.$row["title"].'">
                    <h4 class="font-weight-bold">'.$row["title"].'</h4>
                    <p>Category: '.$category.'</p>
                    </a>';
                }
            if($i == 3){ echo '</div>'; $i = 0; }
        }
?>
<?php } ?>

</div>
</body>
</html>