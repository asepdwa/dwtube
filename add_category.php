<form method="POST">
  <div class="form-group row">
    <label for="inputJudul" class="col-sm-2 col-form-label">Category</label>
    <div class="col-sm-10">
      <input type="text" name="category" class="form-control" id="category" placeholder="Category">
    </div>
  </div>
  <div class="form-group row">
  <label for="inputJudul" class="col-sm-2 col-form-label"></label>
    <div class="col-sm-10">
      <input type="submit" name="submit" class="btn btn-sm btn-warning mr-sm-2" id="submit" value="Tambah">
    </div>
  </div>
</form>
<?php
if(isset($_POST['category']) && isset($_POST['submit'])){
    include "dbconfig.php";
    $category = $_POST['category'];
    $sql 	= 'SELECT * FROM category_tb';
    $query 	= mysqli_query($connection, $sql);
    $jumlah_query = mysqli_num_rows($query);
    $jumlah_query++;
    if(mysqli_query($connection, "INSERT INTO category_tb VALUES('$jumlah_query', '$category')")) { echo "<script>alert('Tambah Category Berhasil ...'); javascript:location.replace('index.php?add_category');</script>"; }
    else { echo "<script>alert('Tambah Category Gagal ...'); avascript:location.replace('index.php?add_category');</script>"; }
}
?>