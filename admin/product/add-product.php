<div class="container-fluid mt-4 px-4">
  <h1 class="mt-4">Add product</h1>
  <form action="?act=add_pro" method="post" enctype="multipart/form-data">
    <div class="mb-3">
      <label class="form-label">Name</label>
      <input type="text" class="form-control" name="name_pro">
    </div>

    <div class="mb-3">
      <label class="form-label">Category</label>
      <select class="form-select" name="id_cat">
        <?php
        foreach ($dslh as $ds) {
          extract($ds);
          echo '<option value="' . $id_cat . '">' . $name_cat . '</option>';
        }
        ?>

      </select>
    </div>

    <div class="mb-3">
      <label class="form-label">Image</label>
      <input type="file" class="form-control" name="image">
    </div>

    <div class="mb-3">
      <label class="form-label">Price</label>
      <input type="number" class="form-control" name="price">
    </div>

    <div class="mb-3">
      <label class="form-label">Discount</label>
      <input type="number" class="form-control" name="discount">
    </div>

    <div class="mb-3">
      <label class="form-label">ID_Size</label>
      <input type="number" class="form-control" name="size">
    </div>

    <div class="mb-3">
      <label class="form-label">Description</label>
      <textarea class="form-control" placeholder="Leave a description product here" style="height: 100px" name="des"></textarea>
    </div>
    <input type="submit" class="btn btn-primary" value="Add" name="them">
    <a href="?act=list_pro">
      <input type="button" class="btn btn-primary" value="LIST_PRO">
    </a>
  </form>
</div>