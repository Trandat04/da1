<?php
ob_start();
?>
<div id="layoutSidenav_nav">
  <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
    <div class="sb-sidenav-menu">
      <div class="nav">
        <div class="sb-sidenav-menu-heading">Core</div>
        <a class="nav-link" href="?act=dashboard">
          <div class="sb-nav-link-icon">
            <i class="fas fa-tachometer-alt"></i>
          </div>
          Dashboard
        </a>

        <!--  -->
        <div class="sb-sidenav-menu-heading">Interface</div>

        <!-- Category -->
        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseCate" aria-expanded="false" aria-controls="collapseLayouts">
          <div class="sb-nav-link-icon">
            <i class="fas fa-columns"></i>
          </div>
          Category
          <div class="sb-sidenav-collapse-arrow">
            <i class="fas fa-angle-down"></i>
          </div>
        </a>

        <div class="collapse" id="collapseCate" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
          <nav class="sb-sidenav-menu-nested nav">
            <a class="nav-link" href="?act=listCategory">List categories</a>
            <a class="nav-link" href="?act=add_cat">Add categories</a>
          </nav>
        </div>

        <!-- Product -->
        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseProduct" aria-expanded="false" aria-controls="collapseLayouts">
          <div class="sb-nav-link-icon">
            <i class="fas fa-columns"></i>
          </div>
          Product
          <div class="sb-sidenav-collapse-arrow">
            <i class="fas fa-angle-down"></i>
          </div>
        </a>

        <div class="collapse" id="collapseProduct" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
          <nav class="sb-sidenav-menu-nested nav">
            <a class="nav-link" href="?act=list_pro">List product</a>
            <a class="nav-link" href="?act=add_pro">Add product</a>
          </nav>
        </div>

        <!-- back to web -->
        <a class="nav-link collapsed" href="../index.php">
          <div class="sb-nav-link-icon">
            <i class="fas fa-columns"></i>
          </div>
          Back Website
          <div class="sb-sidenav-collapse-arrow">
            <i class="fas fa-angle-down"></i>
          </div>
        </a>

        <!-- slider -->
        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseSlider" aria-expanded="false" aria-controls="collapseLayouts">
          <div class="sb-nav-link-icon">
            <i class="fas fa-columns"></i>
          </div>
          Slider
          <div class="sb-sidenav-collapse-arrow">
            <i class="fas fa-angle-down"></i>
          </div>
        </a>

        <div class="collapse" id="collapseSlider" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
          <nav class="sb-sidenav-menu-nested nav">
            <a class="nav-link" href="?act=list_slider">List Slider</a>
            <a class="nav-link" href="?act=add_slider">Add Slider</a>
          </nav>
        </div>

        <!-- brand -->
        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseBrand" aria-expanded="false" aria-controls="collapseLayouts">
          <div class="sb-nav-link-icon">
            <i class="fas fa-columns"></i>
          </div>
          Brand
          <div class="sb-sidenav-collapse-arrow">
            <i class="fas fa-angle-down"></i>
          </div>
        </a>

        <div class="collapse" id="collapseBrand" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
          <nav class="sb-sidenav-menu-nested nav">
            <a class="nav-link" href="?act=list_brand">List Slider</a>
            <a class="nav-link" href="?act=add_brand">Add Slider</a>
          </nav>
        </div>

      </div>

  </nav>
</div>