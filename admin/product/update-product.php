<?php
if (is_array($suasp)) {
  extract($suasp);
}
$hinhpath = "../upload/" . $img;
if (is_file($hinhpath)) {
  $hinh = "<img src='" . $hinhpath . "' height='70'>";
} else {
  $hinh = "No photo";
}
?>
<div class="container-fluid mt-4 px-4">
  <h1 class="mt-4">Update product</h1>
  <form action="?act=update_pro" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id_pro" value="<?= $id_pro ?>">
    <div class="mb-3">
      <label class="form-label">Name</label>
      <input type="text" class="form-control" name="name_pro" value="<?= $name_pro ?>">
    </div>

    <div class="mb-3">
      <label class="form-label">Category</label>
      <select class="form-select" name="id_cat">
        <option value="0" selected>All</option>
        <?php
        foreach ($dslh as $ds) {
          if ($ds['id_cat'] == $id_cat) $s = "selected";
          else $s = "";
          echo '<option value="' . $ds['id_cat'] . '" ' . $s . '>' . $ds['name_cat'] . '</option>';
        }
        ?>
      </select>
    </div>

    <div class="mb-3">
      <label class="form-label">Image</label>
      <input type="file" class="form-control" name="image">
      <?= $hinh ?>
    </div>

    <div class="mb-3">
      <label class="form-label">Price</label>
      <input type="number" class="form-control" name="price" value="<?= $price ?>">
    </div>

    <div class="mb-3">
      <label class="form-label">Discount</label>
      <input type="number" class="form-control" name="discount" value="<?= $discount ?>">
    </div>

    <div class="mb-3">
      <label class="form-label">Id_Size</label>
      <input type="number" class="form-control" name="size" value="<?= $id_size ?>">
    </div>

    <div class="mb-3">
      <label class="form-label">Description</label>
      <textarea class="form-control" placeholder="Leave a description product here" style="height: 100px" name="description"><?= $description ?></textarea>
    </div>
    <input type="submit" class="btn btn-primary" value="Update" name="edit">
    <a href="?act=list_pro">
      <input type="button" class="btn btn-primary" value="LIST_PRO">
    </a>
  </form>
</div>