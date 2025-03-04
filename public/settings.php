<?php 
session_start();

if (isset($_SESSION['username'])) {
  include "head.php";
include "topandsidenav.php"; ?>


<div class="col-xxl-8">
    <div class="card rounded-3 overflow-hidden h-100 mb-3">
        <div class="card-body  d-flex flex-column justify-content-between">
            <div class="row align-items-center g-0">
                <div class="col light">
                    <h4 class="text-black mb-0">Settings</h4>
                    <p class="fs--1 fw-semi-bold text-black">Set your own customized style</span></p>
                </div>

            </div>
            <div class="offcanvas-body scrollbar-overlay px-card" id="themeController">
                <!-- <h5 class="fs-0">Color Scheme</h5>
    <p class="fs--1">Choose the perfect color mode for your app.</p>
    <div class="btn-group d-block w-100 btn-group-navbar-style">
      <div class="row gx-2">
        <div class="col-6">
          <input class="btn-check" id="themeSwitcherLight" name="theme-color" type="radio" value="light" data-theme-control="theme" />
          <label class="btn d-inline-block btn-navbar-style fs--1" for="themeSwitcherLight"> <span class="hover-overlay mb-2 rounded d-block"><img class="img-fluid img-prototype mb-0" src="assets/img/generic/falcon-mode-default.jpg" alt="" /></span><span class="label-text">Light</span></label>
        </div>
        <div class="col-6">
          <input class="btn-check" id="themeSwitcherDark" name="theme-color" type="radio" value="dark" data-theme-control="theme" />
          <label class="btn d-inline-block btn-navbar-style fs--1" for="themeSwitcherDark"> <span class="hover-overlay mb-2 rounded d-block"><img class="img-fluid img-prototype mb-0" src="assets/img/generic/falcon-mode-dark.jpg" alt="" /></span><span class="label-text"> Dark</span></label>
        </div>
      </div>
    </div>
    <hr /> -->

                
    <div class="d-flex justify-content-between">
          <div class="d-flex align-items-start"><img class="me-2" src="assets/img/icons/arrows-h.svg"  alt="" style="width:20px!important;"/>
            <div class="flex-1">
              <h5 class="fs-0">Fluid Layout</h5>
              <!-- <p class="fs--1 mb-0">Toggle container layout system </p><a class="fs--1" href="documentation/customization/configuration.html">Fluid Documentation</a> -->
            </div>
          </div>
          <div class="form-check form-switch">
            <input class="form-check-input ms-0" id="mode-fluid" type="checkbox" data-theme-control="isFluid" />
          </div>
        </div>

    <hr /> 
                <h5 class="fs-0 d-flex align-items-center">Vertical Navbar Style</h5>
                <p class="fs--1 mb-0">Switch between styles for your vertical navbar </p>
                <!-- <p> <a class="fs--1" href="modules/components/navs-and-tabs/vertical-navbar.html#navbar-styles">See Documentation</a></p> -->
                <div class="btn-group d-block w-100 btn-group-navbar-style mt-2">
                    <div class="row gx-2">
                        <div class="col-6">
                            <input class="btn-check" id="navbar-style-transparent" type="radio" name="navbarStyle" value="transparent" data-theme-control="navbarStyle" />
                            <label class="btn d-block w-100 btn-navbar-style fs--1" for="navbar-style-transparent"> <img class="img-fluid img-prototype" src="assets/img/generic/default.png" alt="" /><br><span class="label-text"> Transparent</span></label>
                        </div>
                        <div class="col-6">
                            <input class="btn-check" id="navbar-style-inverted" type="radio" name="navbarStyle" value="inverted" data-theme-control="navbarStyle" />
                            <label class="btn d-block w-100 btn-navbar-style fs--1" for="navbar-style-inverted"> <img class="img-fluid img-prototype" src="assets/img/generic/inverted.png" alt="" /><br><span class="label-text"> Inverted</span></label>
                        </div>
                        <div class="col-6">
                            <input class="btn-check" id="navbar-style-card" type="radio" name="navbarStyle" value="card" data-theme-control="navbarStyle" />
                            <label class="btn d-block w-100 btn-navbar-style fs--1" for="navbar-style-card"> <img class="img-fluid img-prototype" src="assets/img/generic/card.png" alt="" /><br><span class="label-text"> Card</span></label>
                        </div>
                        <div class="col-6">
                            <input class="btn-check" id="navbar-style-vibrant" type="radio" name="navbarStyle" value="vibrant" data-theme-control="navbarStyle" />
                            <label class="btn d-block w-100 btn-navbar-style fs--1" for="navbar-style-vibrant"> <img class="img-fluid img-prototype" src="assets/img/generic/vibrant.png" alt="" /><br><span class="label-text"> Vibrant</span></label>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>






    <?php include "footer.php"; }?>