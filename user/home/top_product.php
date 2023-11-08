<style>
  #img {
    height: 300px;
    width: 100%;
  }
</style>
<!-- Products Start -->
<div class="container-fluid pt-5">
  <!-- Title -->
  <div class="text-center mb-4">
    <h2 class="section-title px-5">
      <span class="px-2">Top Products</span>
    </h2>
  </div>

  <!-- Search & sort -->
  <div class="row px-xl-5 pb-3">
    <!-- Search & sort -->
    <div class="col-12 pb-1">
      <div class="d-flex align-items-center justify-content-between mb-4">
        <!-- Search -->
        <form action="">
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Search by name" />
            <div class="input-group-append">
              <span class="input-group-text bg-transparent text-primary">
                <i class="fa fa-search"></i>
              </span>
            </div>
          </div>
        </form>
        <!-- Sort -->
        <div class="dropdown ml-4">
          <button class="btn border dropdown-toggle" type="button" id="triggerId" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            Sort by
          </button>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="triggerId">
            <a class="dropdown-item" href="#">Latest</a>
            <a class="dropdown-item" href="#">Popularity</a>
            <a class="dropdown-item" href="#">Best Rating</a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="row px-xl-5 pb-3">
    <!-- Product -->
    <?php
    foreach ($dst8 as $sp) {
      extract($sp);
      $linksp = "index.php?act=pro_detail&id_pro=" . $id_pro;
      $tt = $price - (($price * $discount) / 100);
      $hinh = $img_path . $img;
      echo '<div class="col-lg-3 col-md-6 col-sm-12 pb-1">
     <div class="card product-item border-0 mb-4">
       <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
       <a href="' . $linksp . '">  <img class="img-fluid w-300" src="' . $hinh . '" alt="" id="img" /></a>
       </div>
       <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
         <h6 class="text-truncate mb-3">' . $name_pro . '</h6>
         <div class="d-flex justify-content-center">
           <h6>' . number_format($tt, 0, ",", ".") . '$' . '</h6>
           <h6 class="text-muted ml-2"><del>' . number_format($price, 0, ",", ".") . '$' . '</del></h6>
         </div>
       </div>
       <div class="card-footer d-flex justify-content-between bg-light border">
         <a href="' . $linksp . '" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>View Detail</a>
         <a href="" class="btn btn-sm text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>Add To
           Cart</a>
       </div>
     </div>
   </div>';
    }
    ?>
  </div>
</div>
<!-- Products End -->