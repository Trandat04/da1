<style>
  #img {
    height: 300px;
    width: 100%;
  }

  h2 {
    color: red;
  }
</style>
<!-- Shop Detail Start -->
<div class="container-fluid py-5">
  <div class="row px-xl-5">
    <div class="col-lg-5 pb-5">
      <!-- List img -->
      <div id="product-carousel" class="carousel slide" data-ride="carousel">
        <?php
        extract($onesp);
        ?>
        <?php
        $tt = $price - (($price * $discount) / 100);
        $hinh = $img_path . $img;
        echo ' <div class="carousel-inner border">
        <div class="carousel-item active">
          <img class="w-100 h-100" src="' . $hinh . '" alt="Image" />
        </div>
        <div class="carousel-item">
          <img class="w-100 h-100" src="' . $hinh . '" alt="Image" />
        </div>
        <div class="carousel-item">
          <img class="w-100 h-100" src="' . $hinh . '" alt="Image" />
        </div>
        <div class="carousel-item">
          <img class="w-100 h-100" src="' . $hinh . '" alt="Image" />
        </div>
      </div>';
        ?>

        <a class="carousel-control-prev" href="#product-carousel" data-slide="prev">
          <i class="fa fa-2x fa-angle-left text-dark"></i>
        </a>
        <a class="carousel-control-next" href="#product-carousel" data-slide="next">
          <i class="fa fa-2x fa-angle-right text-dark"></i>
        </a>
      </div>
    </div>

    <!-- Product information -->
    <div class="col-lg-7 pb-5">
      <h3 class="font-weight-semi-bold"><?= $name_pro ?></h3>
      <div class="d-flex mb-3">
        <div class="text-primary mr-2">
          <small class="fas fa-star"></small>
          <small class="fas fa-star"></small>
          <small class="fas fa-star"></small>
          <small class="fas fa-star-half-alt"></small>
          <small class="far fa-star"></small>
        </div>
        <small class="pt-1">(50 Reviews)</small>
      </div>
      <h3 class="font-weight-semi-bold mb-4"><?= number_format($tt, 0, ",", ".") . '$' ?></h3>
      <p class="mb-4">
      <h2><del><?= number_format($price, 0, ",", ".") . '$' ?></del></h2>

      </p>

      <!-- Size -->
      <div class="d-flex mb-3">
        <p class="text-dark font-weight-medium mb-0 mr-3">Sizes:</p>
        <select class="form-select" name="id_size">
          <?php
          if (isset($dss)) {
            foreach ($dss as $ds) {
              if ($ds['id_size'] == $id_size) $s = "selected";
              else $s = "";
              echo ' <div class="custom-control custom-radio custom-control-inline">
              <option value="' . $ds['id_size'] . '" ' . $s . '>' . $ds['name_size'] . '</option>
            </div>';
            }
          } else {
            // Xử lý khi biến $dss chưa được khởi tạo
          }
          ?>
          <!-- <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" class="custom-control-input" id="size-2" name="size" />
            <label class="custom-control-label" for="size-2">S</label>
          </div> -->
        </select>
      </div>

      <!-- Color -->
      <div class="d-flex mb-4">
        <p class="text-dark font-weight-medium mb-0 mr-3">Colors:</p>
        <form>
          <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" class="custom-control-input" id="color-1" name="color" />
            <label class="custom-control-label" for="color-1">Black</label>
          </div>
          <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" class="custom-control-input" id="color-2" name="color" />
            <label class="custom-control-label" for="color-2">White</label>
          </div>
          <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" class="custom-control-input" id="color-3" name="color" />
            <label class="custom-control-label" for="color-3">Red</label>
          </div>
          <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" class="custom-control-input" id="color-4" name="color" />
            <label class="custom-control-label" for="color-4">Blue</label>
          </div>
          <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" class="custom-control-input" id="color-5" name="color" />
            <label class="custom-control-label" for="color-5">Green</label>
          </div>
        </form>
      </div>
      <div class="d-flex align-items-center mb-4 pt-2">
        <div class="input-group quantity mr-3" style="width: 130px">
          <div class="input-group-btn">
            <button class="btn btn-primary btn-minus">
              <i class="fa fa-minus"></i>
            </button>
          </div>
          <input type="text" class="form-control bg-secondary text-center" value="1" />
          <div class="input-group-btn">
            <button class="btn btn-primary btn-plus">
              <i class="fa fa-plus"></i>
            </button>
          </div>
        </div>
        <button class="btn btn-primary px-3">
          <i class="fa fa-shopping-cart mr-1"></i> Add To Cart
        </button>
      </div>
      <div class="d-flex pt-2">
        <p class="text-dark font-weight-medium mb-0 mr-2">Share on:</p>
        <div class="d-inline-flex">
          <a class="text-dark px-2" href="">
            <i class="fab fa-facebook-f"></i>
          </a>
          <a class="text-dark px-2" href="">
            <i class="fab fa-twitter"></i>
          </a>
          <a class="text-dark px-2" href="">
            <i class="fab fa-linkedin-in"></i>
          </a>
          <a class="text-dark px-2" href="">
            <i class="fab fa-pinterest"></i>
          </a>
        </div>
      </div>
    </div>
  </div>

  <!-- Description & Review -->
  <div class="row px-xl-5">
    <div class="col">
      <div class="nav nav-tabs justify-content-center border-secondary mb-4">
        <a class="nav-item nav-link active" data-toggle="tab" href="#tab-pane-1">Description</a>
        <a class="nav-item nav-link" data-toggle="tab" href="#tab-pane-3">Reviews (0)</a>
      </div>
      <div class="tab-content">

        <!-- Description -->
        <div class="tab-pane fade show active" id="tab-pane-1">
          <h4 class="mb-3">Product Description</h4>
          <p>
            <?= $description ?>
          </p>
        </div>

        <!-- Review -->
        <div class="tab-pane fade" id="tab-pane-3">
          <div class="row">
            <div class="col-md-6">
              <h4 class="mb-4">1 review for "Colorful Stylish Shirt"</h4>
              <div class="media mb-4">
                <img src="user/img/user.jpg" alt="Image" class="img-fluid mr-3 mt-1" style="width: 45px" />
                <div class="media-body">
                  <h6>
                    John Doe<small> - <i>01 Jan 2045</i></small>
                  </h6>
                  <div class="text-primary mb-2">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                    <i class="far fa-star"></i>
                  </div>
                  <p>
                    Diam amet duo labore stet elitr ea clita ipsum, tempor
                    labore accusam ipsum et no at. Kasd diam tempor rebum magna
                    dolores sed sed eirmod ipsum.
                  </p>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <h4 class="mb-4">Leave a review</h4>
              <small>Your email address will not be published. Required fields are
                marked *</small>
              <div class="d-flex my-3">
                <p class="mb-0 mr-2">Your Rating * :</p>
                <div class="text-primary">
                  <i class="far fa-star"></i>
                  <i class="far fa-star"></i>
                  <i class="far fa-star"></i>
                  <i class="far fa-star"></i>
                  <i class="far fa-star"></i>
                </div>
              </div>
              <form>
                <div class="form-group">
                  <label for="message">Your Review *</label>
                  <textarea id="message" cols="30" rows="5" class="form-control"></textarea>
                </div>
                <div class="form-group">
                  <label for="name">Your Name *</label>
                  <input type="text" class="form-control" id="name" />
                </div>
                <div class="form-group">
                  <label for="email">Your Email *</label>
                  <input type="email" class="form-control" id="email" />
                </div>
                <div class="form-group mb-0">
                  <input type="submit" value="Leave Your Review" class="btn btn-primary px-3" />
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Shop Detail End -->

<!-- Products Start -->
<div class="container-fluid py-5">
  <div class="text-center mb-4">
    <h2 class="section-title px-5">
      <span class="px-2">You May Also Like</span>
    </h2>
  </div>
  <div class="row px-xl-5">
    <!-- Realted Products -->
    <div class="col">
      <div class="owl-carousel related-carousel">
        <?php
        foreach ($spcl as $cl) {
          extract($cl);
          $linksp = "index.php?act=pro_detail&id_pro=" . $id_pro;
          $tt = $price - (($price * $discount) / 100);
          $hinh = $img_path . $img;
          echo '<div class="card product-item border-0">
          <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
          <a href="' . $linksp . '"><img class="img-fluid w-100" src="' . $hinh . '" alt="" id="img"/></a>
          </div>
          <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
          <a href="' . $linksp . '"><h6 class="text-truncate mb-3">' . $name_pro . '</h6></a>
            <div class="d-flex justify-content-center">
              <h6>' .  number_format($tt, 0, ",", ".") . '$' . '</h6>
              <h6 class="text-muted ml-2"><del>' . number_format($price, 0, ",", ".") . '$' . '</del></h6>
            </div>
          </div>
          <div class="card-footer d-flex justify-content-between bg-light border">
            <a href="' . $linksp . '" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>View Detail</a>
            <a href="" class="btn btn-sm text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>Add To
              Cart</a>
          </div>
        </div>';
        }
        ?>


        <div class="card product-item border-0">
          <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
            <img class="img-fluid w-100" src="user/img/product-2.jpg" alt="" />
          </div>
          <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
            <h6 class="text-truncate mb-3">Colorful Stylish Shirt</h6>
            <div class="d-flex justify-content-center">
              <h6>$123.00</h6>
              <h6 class="text-muted ml-2"><del>$123.00</del></h6>
            </div>
          </div>
          <div class="card-footer d-flex justify-content-between bg-light border">
            <a href="" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>View Detail</a>
            <a href="" class="btn btn-sm text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>Add To
              Cart</a>
          </div>
        </div>
        <div class="card product-item border-0">
          <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
            <img class="img-fluid w-100" src="user/img/product-3.jpg" alt="" />
          </div>
          <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
            <h6 class="text-truncate mb-3">Colorful Stylish Shirt</h6>
            <div class="d-flex justify-content-center">
              <h6>$123.00</h6>
              <h6 class="text-muted ml-2"><del>$123.00</del></h6>
            </div>
          </div>
          <div class="card-footer d-flex justify-content-between bg-light border">
            <a href="" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>View Detail</a>
            <a href="" class="btn btn-sm text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>Add To
              Cart</a>
          </div>
        </div>
        <div class="card product-item border-0">
          <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
            <img class="img-fluid w-100" src="user/img/product-4.jpg" alt="" />
          </div>
          <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
            <h6 class="text-truncate mb-3">Colorful Stylish Shirt</h6>
            <div class="d-flex justify-content-center">
              <h6>$123.00</h6>
              <h6 class="text-muted ml-2"><del>$123.00</del></h6>
            </div>
          </div>
          <div class="card-footer d-flex justify-content-between bg-light border">
            <a href="" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>View Detail</a>
            <a href="" class="btn btn-sm text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>Add To
              Cart</a>
          </div>
        </div>
        <div class="card product-item border-0">
          <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
            <img class="img-fluid w-100" src="user/img/product-5.jpg" alt="" />
          </div>
          <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
            <h6 class="text-truncate mb-3">Colorful Stylish Shirt</h6>
            <div class="d-flex justify-content-center">
              <h6>$123.00</h6>
              <h6 class="text-muted ml-2"><del>$123.00</del></h6>
            </div>
          </div>
          <div class="card-footer d-flex justify-content-between bg-light border">
            <a href="" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>View Detail</a>
            <a href="" class="btn btn-sm text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>Add To
              Cart</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Products End -->