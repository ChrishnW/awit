<?php include('../include/header.php'); include('code.php'); include('modal.php'); ?>
  <div id="wrapper">
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">G-TMS <sup>v?</sup></div>
      </a>
      <hr class="sidebar-divider my-0">
      <li class="nav-item">
        <a class="nav-link" href="index.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>
      <hr class="sidebar-divider">
      <?php include('../include/navside.php'); ?>
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>
    </ul>
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>
          <div class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100">
            <div class="input-group">
              Account
            </div>
          </div>
          <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-bell fa-fw"></i>
                <span class="badge badge-danger badge-counter">0</span>
              </a>
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                <h6 class="dropdown-header">
                  Notifications
                </h6>
                <a class="dropdown-item text-center small text-gray-500" href="#">No notifications</a>
              </div>
            </li>
            <div class="topbar-divider d-none d-sm-block"></div>
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $employee_name ?></span>
                <img class="img-profile rounded-circle" src="<?php echo $imageURL?>">
              </a>
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Settings
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                  Activity Log
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>
          </ul>
        </nav>
        <div class="container-fluid">
          <?php if(isset($_SESSION['result']) && $_SESSION['result'] != ''){ ?>
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?php echo $_SESSION['result']; ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
            <?php unset($_SESSION['result']);
          } ?>
          <div class="card">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between bg-primary">
              <h6 class="m-0 font-weight-bold text-white">Registered Accounts</h6>
                <div class="dropdown no-arrow">
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#accountRegister">
                    <i class="fas fa-plus fa-sm fa-fw text-gray-400"></i> Register New Account
                  </button>
                </div>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr class='table-success'>
                      <th>Action</th>
                      <th>Name</th>
                      <th>UserID</th>
                      <th>Section</th>
                      <th>Department</th>
                      <th>Access</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr class='table-success'>
                      <th>Action</th>
                      <th>Name</th>
                      <th>UserID</th>
                      <th>Section</th>
                      <th>Department</th>
                      <th>Access</th>
                      <th>Status</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <?php
                      $con->next_result();
                      $result = mysqli_query($con,"SELECT accounts.fname, accounts.lname, accounts.file_name, accounts.username, accounts.email, section.sec_name, access.access, accounts.status, accounts.id, department.dept_name, accounts.card, accounts.employee_id FROM accounts JOIN section ON accounts.sec_id=section.sec_id JOIN access on accounts.access=access.id JOIN department ON department.dept_id=section.dept_id");
                      if (mysqli_num_rows($result)>0) { 
                        while ($row = $result->fetch_assoc()) {
                          if ($row['status'] == 1){
                            $label = "<button type='button' class='btn btn-success'>Active</button>";
                          }
                          else if ($row['status'] == 0){
                            $label = "<button type='button' class='btn btn-danger'>Deactive</button>";
                          }
                          echo "
                          <tr>
                            <td class='account_id' hidden>".$row['id']."</td>
                            <td><a href='#' class='btn btn-primary btn-sm account_edit'><i class='fas fa-edit fa-fw'></i> Edit</a></td>
                            <td>".$row['fname'].' '.$row['lname']."</td>
                            <td>".$row['username']."</td>
                            <td>".$row['sec_name']."</td>
                            <td>".$row['dept_name']."</td>
                            <td><center/>".strtoupper($row['access'])."</td>
                            <td><center/>".$label."</td>
                          </tr>";
                        }
                      }
                    ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; ICT - Information System 2024</span>
          </div>
        </div>
      </footer>
    </div>
  </div>
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>
<?php include('../include/footer.php'); ?>