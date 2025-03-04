<!-- ===============================================-->
<!--    Main Content-->
<!-- ===============================================-->
<main class="main" id="top">
  <div class="container" data-layout="container">
    <script>
      var isFluid = JSON.parse(localStorage.getItem('isFluid'));
      if (isFluid) {
        var container = document.querySelector('[data-layout]');
        container.classList.remove('container');
        container.classList.add('container-fluid');
      }
    </script>
    <nav class="navbar navbar-light navbar-vertical navbar-expand-xl">
      <script>
        var navbarStyle = localStorage.getItem("navbarStyle");
        if (navbarStyle && navbarStyle !== 'transparent') {
          document.querySelector('.navbar-vertical').classList.add(`navbar-${navbarStyle}`);
        }
      </script>
      <div class="d-flex align-items-center">
        <div class="toggle-icon-wrapper">

          <button class="btn navbar-toggler-humburger-icon navbar-vertical-toggle" data-bs-toggle="tooltip" data-bs-placement="left" title="Toggle Navigation"><span class="navbar-toggle-icon"><span class="toggle-line"></span></span></button>

        </div><a class="navbar-brand" href="index.php">
          <div class="d-flex align-items-center py-3" style="width: 150px;"><img class="me-2" src="logo.png" alt="" width="90" /> <!-- <span class="font-sans-serif">K.V.M. EYE HOSPITAL</span> -->
          </div>
        </a>
      </div>
      <div class="collapse navbar-collapse" id="navbarVerticalCollapse">
        <div class="navbar-vertical-content scrollbar">
          <ul class="navbar-nav flex-column mb-3" id="navbarVerticalNav">
            <li class="nav-item">

              <div class="row navbar-vertical-label-wrapper mt-3 mb-2">
                <div class="col-auto navbar-vertical-label">Navigation
                </div>
                <div class="col ps-0">
                  <hr class="mb-0 navbar-vertical-divider" />
                </div>
              </div>
                <!-- parent pages--><a class="nav-link" href="index.php" role="button" aria-expanded="false">
                <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-home"></span></span><span class="nav-link-text ps-1">Dashboard</span>
                </div>
              </a>
              <!-- parent pages--><a class="nav-link" href="list.php" role="button" aria-expanded="false">
              <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-table"></span></span><span class="nav-link-text ps-1">Patient List</span>
                </div>
              </a>
           


              <div class="row navbar-vertical-label-wrapper mt-3 mb-2">
                <div class="col-auto navbar-vertical-label">Consultation
                </div>
                <div class="col ps-0">
                  <hr class="mb-0 navbar-vertical-divider" />
                </div>
              </div>
            
              <!-- parent pages--><a class="nav-link" href="patientdetail.php" role="button" aria-expanded="false">
                <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-user-edit"></span></span><span class="nav-link-text ps-1">Add Patient</span>
                </div>
              </a>
              <!-- parent pages--><a class="nav-link" href="patient.php" role="button" aria-expanded="false">
                <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-table"></span></span><span class="nav-link-text ps-1">Patient Detail</span>
                </div>
              </a>
              


              <div class="row navbar-vertical-label-wrapper mt-3 mb-2">
                <div class="col-auto navbar-vertical-label">Treatement
                </div>
                <div class="col ps-0">
                  <hr class="mb-0 navbar-vertical-divider" />
                </div>
              </div>
              <!-- parent pages--><a class="nav-link" href="pa_treat_add.php" role="button" aria-expanded="false">
                <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-user-edit"></span></span><span class="nav-link-text ps-1">Add Patient</span>
                </div>
              </a>
              <!-- parent pages--><a class="nav-link" href="pa_treat.php" role="button" aria-expanded="false">
                <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-table"></span></span><span class="nav-link-text ps-1">Patient Detail</span>
                </div>
              </a>

              <div class="row navbar-vertical-label-wrapper mt-3 mb-2">
                <div class="col-auto navbar-vertical-label">Operations
                </div>
                <div class="col ps-0">
                  <hr class="mb-0 navbar-vertical-divider" />
                </div>
              </div>
              <!-- parent pages--><a class="nav-link" href="o_patient_add.php" role="button" aria-expanded="false">
                <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-user-edit"></span></span><span class="nav-link-text ps-1">Add Patient</span>
                </div>
              </a>
              <!-- parent pages--><a class="nav-link" href="o_table.php" role="button" aria-expanded="false">
                <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-table"></span></span><span class="nav-link-text ps-1">Patient Detail</span>
                </div>
              </a>
              <!-- parent pages--><a class="nav-link" href="o_bill_list.php" role="button" aria-expanded="false">
                <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-table"></span></span><span class="nav-link-text ps-1">Bill List</span>
                </div>
              </a>
              <!-- parent pages--><a class="nav-link" href="o_discharge_list.php" role="button" aria-expanded="false">
                <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-table"></span></span><span class="nav-link-text ps-1">Discharge List</span>
                </div>
              </a>
            


              <?php if ($_SESSION['access_level'] == 'admin'){
              ?>
                  <div class="row navbar-vertical-label-wrapper mt-3 mb-2">
                <div class="col-auto navbar-vertical-label">Other Navigation
                </div>
                <div class="col ps-0">
                  <hr class="mb-0 navbar-vertical-divider" />
                </div>
              </div>
                <!-- parent pages--><a class="nav-link" href="fee.php" role="button" aria-expanded="false">
                  <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-rupee-sign"></span></span><span class="nav-link-text ps-1">fee</span>
                  </div>
                </a>

              <?php
              }
              ?>


              <div class="row navbar-vertical-label-wrapper mt-3 mb-2">
                <div class="col-auto navbar-vertical-label">User
                </div>
                <div class="col ps-0">
                  <hr class="mb-0 navbar-vertical-divider" />
                </div>
              </div>
              <?php if ($_SESSION['access_level'] == 'admin') {
              ?>
                <!-- parent pages--><a class="nav-link" href="users.php" role="button" aria-expanded="false">
                  <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="far fa-user"></span></span><span class="nav-link-text ps-1">Users</span>
                  </div>
                </a>

              <?php
              }
              ?>
              <!-- parent pages--><a class="nav-link" href="settings.php" role="button" aria-expanded="false">
                <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="far fa-sun"></span></span><span class="nav-link-text ps-1">Settings</span>
                </div>
              </a>
              <!-- parent pages--><a class="nav-link" href="changepass.php" role="button" aria-expanded="false">
                <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-key"></span></span><span class="nav-link-text ps-1">Change Password</span>
                </div>
              </a>
              <!-- parent pages--><a class="nav-link" href="../logout.php" role="button" aria-expanded="false">
                <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-sign-out-alt"></span></span><span class="nav-link-text ps-1">Logout</span>
                </div>
              </a>


            </li>
          </ul>
          </li>
          </ul>

        </div>
      </div>
    </nav>
    <div class="content">
      <nav class="navbar navbar-light navbar-glass navbar-top navbar-expand">

        <button class="btn navbar-toggler-humburger-icon navbar-toggler me-1 me-sm-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarVerticalCollapse" aria-controls="navbarVerticalCollapse" aria-expanded="false" aria-label="Toggle Navigation"><span class="navbar-toggle-icon"><span class="toggle-line"></span></span></button>
        <a class="navbar-brand me-1 me-sm-3" href="index.php">
          <div class="d-flex align-items-center">
            <!-- <img class="me-2" src="assets/img/icons/spot-illustrations/falcon.png" alt="" width="40" /> --><span class="font-sans-serif">K.V.M. EYE HOSPITAL</span>
          </div>
        </a>

        <ul class="navbar-nav navbar-nav-icons ms-auto flex-row align-items-center">
          <!-- <li class="nav-item">
            <div class="theme-control-toggle fa-icon-wait px-2">
              <input class="form-check-input ms-0 theme-control-toggle-input" id="themeControlToggle" type="checkbox" data-theme-control="theme" value="dark" />
              <label class="mb-0 theme-control-toggle-label theme-control-toggle-light" for="themeControlToggle" data-bs-toggle="tooltip" data-bs-placement="left" title="Switch to light theme"><span class="fas fa-sun fs-0"></span></label>
              <label class="mb-0 theme-control-toggle-label theme-control-toggle-dark" for="themeControlToggle" data-bs-toggle="tooltip" data-bs-placement="left" title="Switch to dark theme"><span class="fas fa-moon fs-0"></span></label>
            </div>
          </li> -->


          <li class="nav-item dropdown"><a class="nav-link pe-0" id="navbarDropdownUser" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <div class="avatar avatar-xl">
                <img class="rounded-circle" src="user.png" alt="" />

              </div>
            </a>
            <div class="dropdown-menu dropdown-menu-end py-0" aria-labelledby="navbarDropdownUser">
              <div class="bg-white dark__bg-1000 rounded-2 py-2">
                <!-- <a class="dropdown-item fw-bold text-warning" href="#!"><span class="fas fa-crown me-1"></span><span>Go Pro</span></a>

                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#!">Set status</a>
                    <a class="dropdown-item" href="pages/user/profile.html">Profile &amp; account</a>
                    <a class="dropdown-item" href="#!">Feedback</a>

                    <div class="dropdown-divider"></div> -->
                <a class="dropdown-item" href="settings.php">Settings</a>
                <a class="dropdown-item" href="../logout.php">Logout</a>
              </div>
            </div>
          </li>
        </ul>
      </nav>