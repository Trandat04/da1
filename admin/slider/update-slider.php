<?php
if (is_array($suasl)) {
  extract($suasl);
}
$hinhpath = "../upload/" . $img_slider;
if (is_file($hinhpath)) {
  $hinh = "<img src='" . $hinhpath . "' height='70'>";
} else {
  $hinh = "No photo";
}
?>
<div class="container-fluid mt-4 px-4">
  <h1 class="mt-4">Update category</h1>
  <form action="?act=update_slider" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id_slider" value="<?= $id_slider ?>">
    <div class="mb-3">
      <label class="form-label">Name</label>
      <input type="text" class="form-control" name="name_slider" value="<?= $name_slider ?>">
    </div>

    <div class="mb-3">
      <label class="form-label">Image</label>
      <input type="file" class="form-control" name="image">
      <?= $hinh ?>
    </div>
    <input type="submit" class="btn btn-primary" value="Update" name="edit">
    <a href="?act=listslider">
      <input type="button" class="btn btn-primary" value="LIST_SLIDER">
    </a>
  </form>
</div>