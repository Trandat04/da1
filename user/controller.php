  <?php
  // Navbar
  ob_start();
  include_once("_navbar.php");
  include_once("./global.php");
  include_once "./model/pdo.php";
  include_once "./model/cat.php";
  include_once "./model/product.php";
  include_once "./model/size.php";
  include_once "./model/slider.php";
  //phpMailer
  // require_once '../vendor/PHPMailer/src/Exception.php';
  // require_once '../vendor/PHPMailer/src/PHPMailer.php';
  // require_once '../vendor/PHPMailer/src/SMTP.php';

  $spnew = loadall_pro_home();
  $dsdm = loadall_cat();
  $dst8 = loadall_pro_top8();
  $dssl = loadall_slider();
  // Controller
  if (isset($_GET['act']) && ($_GET['act']) != "") {
    $act = $_GET['act'];
    switch ($act) {
      case 'home':
        include_once("user/home/index.php");
        break;
      case 'pro_detail':
        if (isset($_GET['id_pro']) && ($_GET['id_pro']) > 0) {
          $onesp = loadone_pro($_GET['id_pro']);
          $dss = loadall_size();
          extract($onesp);
          $spcl = loadone_sp_cungloai($_GET['id_pro'], $id_cat);
          tangluotxem($_GET['id_pro']);
          include "detail.php";
        } else {
          include "user/home/index.php";
        }
        break;
      case 'shop':
        include_once("shop.php");
        break;
      case 'contact':
        include_once("contact.php");
        break;
      case 'cart':
        include_once("cart.php");
        break;
      case 'checkout':
        include_once("checkout.php");
        break;
      case 'login':
        include_once("login.php");
        break;
      case 'reset_password':
        include_once("pages-reset-password.php");
        break;
      case 'sign_up':
        include_once("pages-sign-up.php");
        break;
        // case 'send_mail_form':
        //   require_once("./model/mail.php");
        //   email_form();
        // break;
      default:
        include_once("user/home/index.php");
        break;
    }
  } else {
    include_once("user/home/index.php");
  }

  // Footer
  include_once("_footer.php");
  ?>

