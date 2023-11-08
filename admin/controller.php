<?php
ob_start();
include "../model/pdo.php";
include "../model/cat.php";
include "../model/product.php";
include "../model/slider.php";

if (isset($_GET['act'])) {
  $act = $_GET['act'];
  switch ($act) {
    case 'dashboard':
      include("dashboard.php");
      break;
      // Category
    case 'listCategory':
      $dslh = loadall_cat();
      include "category/list-category.php";
      break;
    case 'add_cat':
      if (isset($_POST['them']) && ($_POST['them'])) {
        $name = $_POST['name_cat'];
        $file = $_FILES['image']['name'];
        $target_dir = "../upload/";
        $target_file = $target_dir . basename($_FILES['image']["name"]);
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
          // echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
        } else {
          // echo "Sorry, there was an error uploading your file.";
        }
        if ($name != "") {
          insert_cat($name, $file);
          header("location:index.php?act=listCategory");
          $tbao = 'Them data thanh cong';
        }
      }
      include("category/add-category.php");
      break;
    case 'delete_cat':
      if (isset($_GET['id_cat']) && ($_GET['id_cat']) > 0) {
        delete_cat($_GET['id_cat']);
      }
      $dslh = loadall_cat();

      include "category/list-category.php";
      break;
    case 'edit_cat':
      if (isset($_GET['id_cat']) && ($_GET['id_cat']) > 0) {

        $suadm = loadone_cat($_GET['id_cat']);
      }

      include "category/update-category.php";
      break;
    case 'update_cat':
      if (isset($_POST['edit']) && ($_POST['edit'])) {
        $name_cat = $_POST['name_cat'];
        $id_cat = $_POST['id_cat'];
        $file = $_FILES['image']['name'];
        $target_dir = "../upload/";
        $target_file = $target_dir . basename($_FILES['image']["name"]);
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
          // echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
        } else {
          // echo "Sorry, there was an error uploading your file.";
        }
        update_cat($name_cat, $file, $id_cat);
        $tbao = 'Sua data thanh cong';
      }
      $dslh = loadall_cat();
      include "category/list-category.php";
      break;

      //Product
    case 'list_pro':
      if (isset($_POST['listok']) && ($_POST['listok'])) {
        $id_cat = $_POST['id_cat'];
      } else {
        $id_cat = 0;
      }
      $dslh = loadall_cat();
      $dssp = loadall_pro($id_cat);
      include("product/list-product.php");
      break;
    case 'add_pro':
      if (isset($_POST['them']) && ($_POST['them'])) {
        $id_cat = $_POST['id_cat'];
        $name_pro = $_POST['name_pro'];
        $price = $_POST['price'];
        $dis = $_POST['discount'];
        $des = $_POST['des'];
        $size = $_POST['size'];
        $file = $_FILES['image']['name'];
        $target_dir = "../upload/";
        $target_file = $target_dir . basename($_FILES['image']["name"]);
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
          // echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
        } else {
          // echo "Sorry, there was an error uploading your file.";
        }
        if ($name_pro != "") {
          insert_pro($name_pro, $file, $des, $dis, $price, $size, $id_cat);
          $tbao = 'Them data thanh cong';
          header("location:index.php?act=list_pro");
        }
      }
      $dslh = loadall_cat();
      include("product/add-product.php");
      break;
    case 'delete_pro':
      if (isset($_GET['id_pro']) && ($_GET['id_pro']) > 0) {
        delete_pro($_GET['id_pro']);
      }
      $dssp = loadall_pro();

      include "product/list-product.php";
      break;
    case 'edit_pro':
      if (isset($_GET['id_pro']) && ($_GET['id_pro']) > 0) {

        $suasp = loadone_pro($_GET['id_pro']);
      }
      $dslh = loadall_cat();
      include("product/update-product.php");
      break;
    case 'update_pro':
      if (isset($_POST['edit']) && ($_POST['edit'])) {
        $name_pro = $_POST['name_pro'];
        $id_pro = $_POST['id_pro'];
        $description = $_POST['description'];
        $discount = $_POST['discount'];
        $price = $_POST['price'];
        $size = $_POST['size'];
        $id_cat = $_POST['id_cat'];
        $file = $_FILES['image']['name'];
        $target_dir = "../upload/";
        $target_file = $target_dir . basename($_FILES['image']["name"]);
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
          // echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
        } else {
          // echo "Sorry, there was an error uploading your file.";
        }
        update_pro($id_pro, $name_pro, $file, $description, $discount, $price, $size, $id_cat);
        $tbao = 'Sua data thanh cong';
      }
      $dslh = loadall_cat();
      $dssp = loadall_pro();
      include "product/list-product.php";
      break;

      // slider
    case 'list_slider':
      $dssl = loadall_slider();
      include "slider/list-slider.php";
      break;
    case 'add_slider':
      if (isset($_POST['them']) && ($_POST['them'])) {
        $name_slider = $_POST['name_slider'];
        $file = $_FILES['image']['name'];
        $target_dir = "../upload/";
        $target_file = $target_dir . basename($_FILES['image']["name"]);
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
          // echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
        } else {
          // echo "Sorry, there was an error uploading your file.";
        }
        if ($name_slider != "") {
          insert_slider($file, $name_slider);
          $tbao = 'Them data thanh cong';
          header("location:index.php?act=list_slider");
        }
      }
      include("slider/add-slider.php");
      break;
    case 'delete_slider':
      if (isset($_GET['id_slider']) && ($_GET['id_slider']) > 0) {
        delete_slider($_GET['id_slider']);
      }
      $dssl = loadall_slider();

      include "slider/list-slider.php";
      break;

    case 'edit_slider':
      if (isset($_GET['id_slider']) && ($_GET['id_slider']) > 0) {

        $suasl = loadone_slider($_GET['id_slider']);
      }

      include "slider/update-slider.php";
      break;
    case 'update_slider':
      if (isset($_POST['edit']) && ($_POST['edit'])) {
        $name_slider = $_POST['name_slider'];
        $id_slider = $_POST['id_slider'];
        $file = $_FILES['image']['name'];
        $target_dir = "../upload/";
        $target_file = $target_dir . basename($_FILES['image']["name"]);
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
          // echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
        } else {
          // echo "Sorry, there was an error uploading your file.";
        }
        update_slider($name_slider, $file, $id_slider);
        $tbao = 'Sua data thanh cong';
      }
      $dssl = loadall_slider();
      include "slider/list-slider.php";
      break;
  }
} else {
  include("dashboard.php");
}
