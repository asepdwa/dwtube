<form method="POST" enctype="multipart/form-data">
  <div class="form-group row">
    <label for="inputJudul" class="col-sm-2 col-form-label">Judul</label>
    <div class="col-sm-10">
      <input type="text" name="judul" class="form-control" id="judul" placeholder="Judul">
    </div>
  </div>
  <div class="form-group row">
    <label for="Category" class="col-sm-2 col-form-label">Category</label>
    <div class="col-sm-10">
    <select class="form-control" id="category" name="category">
    <?php
        include "dbconfig.php";
        $sql 	= 'SELECT * FROM category_tb';
        $query 	= mysqli_query($connection, $sql);
        while($row = mysqli_fetch_assoc($query)){
            echo "<option value='".$row['id']."'>".$row['name']."</option>";
        }
    ?>
    </select>
    </div>
  </div>
  <div class="form-group row">
    <label for="inputJudul" class="col-sm-2 col-form-label">Upload Video</label>
    <div class="col-sm-10">
      <input type="file" name="video" class="form-control-file" id="video" accept="video/*">
      <small id="help" class="form-text text-muted">Supported Files: mp4, mkv, avi, webm, flv, mpeg</small>
    </div>
  </div>
  <div class="form-group row">
    <label for="inputJudul" class="col-sm-2 col-form-label">Upload Thumbnail</label>
    <div class="col-sm-10">
      <input type="file" name="thumbnail" class="form-control-file" id="thumbnail" accept="image/*">
      <small id="help" class="form-text text-muted">Gambar maximal berukuran 5MB.<br/>Supported Files: bmp, gif, jpg, jpe, png</small>
    </div>
  </div>
  <div class="form-group row">
  <label for="inputJudul" class="col-sm-2 col-form-label"></label>
    <div class="col-sm-10">
      <input type="submit" name="upload" class="btn btn-sm btn-warning mr-sm-2" id="upload" value="Upload">
    </div>
  </div>
<?php
if(isset($_POST['judul']) && isset($_POST['upload'])){
   include_once "upload.php";
}
?>
</form>