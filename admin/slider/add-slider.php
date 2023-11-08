<div class="container-fluid mt-4 px-4">
  <h1 class="mt-4">Add Slider</h1>
  <form action="?act=add_slider" method="POST" enctype="multipart/form-data">
    <div class="mb-3">
      <label class="form-label">Name</label>
      <input type="text" class="form-control" name="name_slider">
    </div>

    <div class="mb-3">
      <label class="form-label">Image</label>
      <input type="file" class="form-control" name="image">
    </div>
    <input type="submit" class="btn btn-primary" name="them" value="ADD">
    <a href="?act=list_slider">
    <input type="button" class="btn btn-primary" value="LIST_SLIDER">
      </a>
  </form>
</div>