<main>
  <div class="container-fluid px-4">
    <h1 class="mt-4">List products</h1>
    <ol class="breadcrumb mb-4">
      <li class="breadcrumb-item active">Dashboard</li>
    </ol>

    <!-- Data -->
    <div class="card mb-4">
      <div class="card-header">
        <i class="fas fa-table me-1"></i>
        List categories
      </div>
      <form action="index.php?act=list_pro" method="post">
        <select class="form-select" name="id_cat" id="">
          <option value="0" selected>TAT CA</option>
          <?php
          foreach ($dslh as $ds) {
            extract($ds);
            echo '<option value="' . $id_cat . '">' . $name_cat . '</option>';
          }
          ?>
        </select>
        <input class="btn btn-primary" type="submit" name="listok" value="GO">
      </form>
      <div class="card-body">
        <table id="datatablesSimple">
          <thead>
            <tr>
              <th>ID</th>
              <th>Category name</th>
              <th>Product name</th>
              <th>Image</th>
              <th>Price</th>
              <th>Discount</th>
              <th>Description</th>
              <th>Size</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($dssp as $d) {
              extract($d);
              $suasp = "index.php?act=edit_pro&id_pro=" . $id_pro;
              $xoasp = "index.php?act=delete_pro&id_pro=" . $id_pro;
              $hinhpath = "../upload/" . $img;
              if (is_file($hinhpath)) {
                $hinh = "<img src='" . $hinhpath . "' height='70'>";
              } else {
                $hinh = "No photo";
              }

              echo '  <tr>
                  <td>' . $id_pro . '</td>
                  <td>' . $name_cat . '</td>
                  <td>' . $name_pro . '</td>
                  <td>' . $hinh . '</td>
                  <td>' .  number_format($price, 0, ",", ".") . '$' . '</td>
                  <td>' . $discount . '</td>
                  <td>' . $description . '</td>
                  <td>' . $name_size . '</td>
                  <td>
                  <a href="' . $suasp . '" class="btn btn-warning"><input type="button" value="UPDATE" /></a>
                  <a href="' . $xoasp . '" class="btn btn-danger"><input type="button" value="DELETE" onclick ="return confirm(\'ban co chac chan muon xoa?\')" /></a>
                  </td>
                </tr>';
            }
            ?>
          </tbody>
        </table>
        <a href="?act=add_pro">
          <input type="submit" class="btn btn-primary" name="them" value="ADD">
        </a>
      </div>
    </div>
  </div>
</main>