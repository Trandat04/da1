<main>
  <div class="container-fluid px-4">
    <h1 class="mt-4">List categories</h1>
    <ol class="breadcrumb mb-4">
      <li class="breadcrumb-item active">Dashboard</li>
    </ol>

    <!-- Data -->
    <div class="card mb-4">
      <div class="card-header">
        <i class="fas fa-table me-1"></i>
        List categories
      </div>
      <div class="card-body">
        <table id="datatablesSimple">
          <thead>
            <tr>
              <th>ID</th>
              <th>Category name</th>
              <th>Image</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($dslh as $d) {
              extract($d);

              $suadm = "index.php?act=edit_cat&id_cat=" . $id_cat;
              $xoadm = "index.php?act=delete_cat&id_cat=" . $id_cat;
              $hinhpath = "../upload/" . $img_cat;
              if (is_file($hinhpath)) {
                $hinh = "<img src='" . $hinhpath . "' height='100' width='300'>";
              } else {
                $hinh = "No photo";
              }

              echo ' 
          <tr>
            <td>' . $id_cat . '</td>
            <td>' . $name_cat . '</td>
            <td>' . $hinh . '</td>
            <td class="text-center">
              <a href="' . $suadm . '" class="btn btn-warning"><input type="button" value="UPDATE" /></a>
              <a href="' . $xoadm . '" class="btn btn-danger"><input type="button" value="DELETE" onclick ="return confirm(\'ban co chac chan muon xoa?\')" /></a>
            </td>
          </tr>
     ';
            }
            ?>
          </tbody>
        </table>
        <a href="?act=add_cat">
          <input type="submit" class="btn btn-primary" name="them" value="ADD">
        </a>

      </div>
    </div>
  </div>
</main>