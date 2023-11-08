<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">List Slider</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>

        <!-- Data -->
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                List slider
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Img_slider</th>
                            <th>Name_slider</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($dssl as $d) {
                            extract($d);

                            $suasl = "index.php?act=edit_slider&id_slider=" . $id_slider;
                            $xoasl = "index.php?act=delete_slider&id_slider=" . $id_slider;
                            $hinhpath = "../upload/" . $img_slider;
                            if (is_file($hinhpath)) {
                                $hinh = "<img src='" . $hinhpath . "' height='90' width='300'>";
                            } else {
                                $hinh = "No photo";
                            }

                            echo ' 
          <tr>
            <td>' . $id_slider . '</td>
            <td>' . $hinh . '</td>
            <td>' . $name_slider . '</td>
            <td class="text-center">
              <a href="' . $suasl . '" class="btn btn-warning"><input type="button" value="UPDATE" /></a>
              <a href="' . $xoasl . '" class="btn btn-danger"><input type="button" value="DELETE" onclick ="return confirm(\'ban co chac chan muon xoa?\')" /></a>
            </td>
          </tr>
     ';
                        }
                        ?>
                    </tbody>
                </table>
                <a href="?act=add_slider">
                    <input type="submit" class="btn btn-primary" name="them" value="ADD">
                </a>

            </div>
        </div>
    </div>
</main>