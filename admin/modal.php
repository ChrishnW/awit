<div class="modal fade" id="accountRegister" tabindex="-1" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog modal-dialog-centered modal-xl">
    <div class="modal-content border-info">
      <div class="modal-header bg-info">
        <h5 class="modal-title text-white">Account Registration</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="code.php" method="POST">
        <div class="modal-body">
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label>User Name:</label>
                <div class="input-group mb-2">
                  <div class="input-group-prepend">
                    <div class="input-group-text"><i class="fas fa-user-circle"></i></div>
                  </div>
                  <input type="text" placeholder="Enter User Name" class="form-control" name="accounts_username" id="accounts_username" required>
                </div>
              </div>
            </div>
            <div class="col-md-4"> 
              <div class="form-group">
                <label>First Name:</label>
                <div class="input-group mb-2">
                  <div class="input-group-prepend">
                    <div class="input-group-text"><i class="fas fa-font"></i></div>
                  </div>
                  <input type="text" placeholder="Enter First Name" class="form-control" name="accounts_fname" id="accounts_fname" required>
                </div>
              </div>
            </div>
            <div class="col-md-4"> 
              <div class="form-group">
                <label>Last Name:</label>
                <div class="input-group mb-2">
                  <div class="input-group-prepend">
                    <div class="input-group-text"><i class="fas fa-font"></i></div>
                  </div>
                  <input type="text" placeholder="Enter Last Name" class="form-control" name="accounts_lname" id="accounts_lname" required>
                </div>
              </div>
            </div>
            <div class="col-md-4"> 
              <div class="form-group">
                <label>Employee ID:</label>
                <div class="input-group mb-2">
                  <div class="input-group-prepend">
                    <div class="input-group-text"><i class="fas fa-id-card"></i></div>
                  </div>
                  <input type="text" placeholder="Enter Employee ID" class="form-control" name="accounts_number" id="accounts_number" required>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label>ID Number:</label>
                <div class="input-group mb-2">
                  <div class="input-group-prepend">
                    <div class="input-group-text"><i class="fas fa-qrcode"></i></div>
                  </div>
                  <input type="text" placeholder="Enter ID Number" class="form-control" name="accounts_card" id="accounts_card" required>
                </div>
              </div>
            </div>
            <div class="col-md-4"> 
              <div class="form-group">
                <label>Access:</label>
                <div class="input-group mb-2">
                  <div class="input-group-prepend">
                    <div class="input-group-text"><i class="fas fa-key"></i></div>
                  </div>
                  <select class="form-control custom-select" name="accounts_access" id="accounts_access">
                    <?php
                      $con->next_result();
                      $sql = mysqli_query($con, "SELECT * FROM access");
                      if (mysqli_num_rows($sql) > 0) {
                        while ($row = mysqli_fetch_assoc($sql)) {
                          if (strtoupper($row['access']) == $account_access) { $label = '[Current]'; $select = 'selected'; } else { $label = ''; $select = '';}?>
                          <option value='<?php echo $row['id'] ?>' <?php echo $select ?>><?php echo strtoupper($row['access']).' '.$label ?></option>
                        <?php }
                      } ?>
                  </select>
                </div>
              </div>
            </div>
            <div class="col-md-4"> 
              <div class="form-group">
                <label>Section:</label>
                <div class="input-group mb-2">
                  <div class="input-group-prepend">
                    <div class="input-group-text"><i class="fas fa-users"></i></div>
                  </div>
                  <select name="accounts_section" id="accounts_section" class="form-control custom-select">
                    <?php
                      $con->next_result();
                      $sql = mysqli_query($con,"SELECT * FROM section WHERE status='1'"); 
                      if(mysqli_num_rows($sql)>0){
                        while($row=mysqli_fetch_assoc($sql)){
                          if ($row['sec_name'] == $account_section) { $label = '[Current]'; $select = 'selected'; } else { $label = ''; $select = '';}?>
                          <option value='<?php echo $row['sec_id'] ?>' <?php echo $select ?>><?php echo $row['sec_name'].' '.$label ?></option>
                        <?php }
                      } ?>
                  </select>
                </div>
              </div>
            </div>
            <div class="col-md-4"> 
              <div class="form-group">
                <label>E-mail:</label>
                <div class="input-group mb-2">
                  <div class="input-group-prepend">
                    <div class="input-group-text"><i class="fas fa-solid fa-at"></i></div>
                  </div>
                  <input type="text" placeholder="Enter E-mail" class="form-control" name="accounts_email" id="accounts_email" required>
                </div>
              </div>
            </div>
            <div class="col-md-4"> 
              <div class="form-group">
                <label>Password:</label>
                <div class="input-group mb-2">
                  <div class="input-group-prepend">
                    <div class="input-group-text"><i class="fas fa-solid fa-lock"></i></div>
                  </div>
                  <input type="text" placeholder="Enter Password" class="form-control" name="accounts_password" id="accounts_password">
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-primary" name="accounts_create">Register Account</button>
        </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="accountUpdate" tabindex="-1" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog modal-dialog-centered modal-xl">
    <div class="modal-content border-warning">
      <div class="modal-header bg-warning">
        <h5 class="modal-title text-white">Account Update</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="code.php" method="POST">
        <div class="modal-body">
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label>User Name:</label>
                <div class="input-group mb-2">
                  <div class="input-group-prepend">
                    <div class="input-group-text"><i class="fas fa-user-circle"></i></div>
                  </div>
                  <input type="hidden" class="form-control" name="accounts_id_edit" id="accounts_id_edit" required>
                  <input type="text" placeholder="Enter User Name" class="form-control" name="accounts_username_edit" id="accounts_username_edit" required>
                </div>
              </div>
            </div>
            <div class="col-md-4"> 
              <div class="form-group">
                <label>First Name:</label>
                <div class="input-group mb-2">
                  <div class="input-group-prepend">
                    <div class="input-group-text"><i class="fas fa-font"></i></div>
                  </div>
                  <input type="text" placeholder="Enter First Name" class="form-control" name="accounts_fname_edit" id="accounts_fname_edit" required>
                </div>
              </div>
            </div>
            <div class="col-md-4"> 
              <div class="form-group">
                <label>Last Name:</label>
                <div class="input-group mb-2">
                  <div class="input-group-prepend">
                    <div class="input-group-text"><i class="fas fa-font"></i></div>
                  </div>
                  <input type="text" placeholder="Enter Last Name" class="form-control" name="accounts_lname_edit" id="accounts_lname_edit" required>
                </div>
              </div>
            </div>
            <div class="col-md-4"> 
              <div class="form-group">
                <label>Employee ID:</label>
                <div class="input-group mb-2">
                  <div class="input-group-prepend">
                    <div class="input-group-text"><i class="fas fa-id-card"></i></div>
                  </div>
                  <input type="text" placeholder="Enter Employee ID" class="form-control" name="accounts_number_edit" id="accounts_number_edit" required>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label>ID Number:</label>
                <div class="input-group mb-2">
                  <div class="input-group-prepend">
                    <div class="input-group-text"><i class="fas fa-qrcode"></i></div>
                  </div>
                  <input type="text" placeholder="Enter ID Number" class="form-control" name="accounts_card_edit" id="accounts_card_edit" required>
                </div>
              </div>
            </div>
            <div class="col-md-4"> 
              <div class="form-group">
                <label>Access:</label>
                <div class="input-group mb-2">
                  <div class="input-group-prepend">
                    <div class="input-group-text"><i class="fas fa-key"></i></div>
                  </div>
                  <select class="form-control custom-select" name="accounts_access_edit" id="accounts_access_edit">
                    <?php
                      $con->next_result();
                      $sql = mysqli_query($con, "SELECT * FROM access");
                      if (mysqli_num_rows($sql) > 0) {
                        while ($row = mysqli_fetch_assoc($sql)) { ?>
                          <option value='<?php echo $row['id'] ?>'><?php echo strtoupper($row['access'])?></option>
                        <?php }
                      } ?>
                  </select>
                </div>
              </div>
            </div>
            <div class="col-md-4"> 
              <div class="form-group">
                <label>Section:</label>
                <div class="input-group mb-2">
                  <div class="input-group-prepend">
                    <div class="input-group-text"><i class="fas fa-users"></i></div>
                  </div>
                  <select name="accounts_section_edit" id="accounts_section_edit" class="form-control custom-select">
                    <?php
                      $con->next_result();
                      $sql = mysqli_query($con,"SELECT * FROM section WHERE status='1'"); 
                      if(mysqli_num_rows($sql)>0){
                        while($row=mysqli_fetch_assoc($sql)){
                          if ($row['sec_name'] == $account_section) { $label = '[Current]'; $select = 'selected'; } else { $label = ''; $select = '';}?>
                          <option value='<?php echo $row['sec_id'] ?>' <?php echo $select ?>><?php echo $row['sec_name'].' '.$label ?></option>
                        <?php }
                      } ?>
                  </select>
                </div>
              </div>
            </div>
            <div class="col-md-4"> 
              <div class="form-group">
                <label>E-mail:</label>
                <div class="input-group mb-2">
                  <div class="input-group-prepend">
                    <div class="input-group-text"><i class="fas fa-solid fa-at"></i></div>
                  </div>
                  <input type="text" placeholder="Enter E-mail" class="form-control" name="accounts_email_edit" id="accounts_email_edit" required>
                </div>
              </div>
            </div>
            <div class="col-md-2"> 
              <div class="form-group">
                <label>Password:</label>
                <button type="button" class="btn btn-danger input-group-append" onclick='resetPassword()'>Reset Password</button>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" onclick="location.reload();" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-primary" name="accounts_update">Update Account</button>
        </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="accountPasschange" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content border-danger">
      <div class="modal-header bg-danger">
        <h5 class="modal-title text-white">Account Reset Password</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <form action="code.php" method="post">
        <input type="text" id="account_ID1" hidden> 
        <div class="modal-body">
          <div class="modal-body">You're about to reset this account password to default. <br> Do you wish to contiue?</div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <button type="submit" name="account_reset_submit" class="btn btn-danger">Confirm</button>
        </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content border-danger">
      <div class="modal-header bg-danger">
        <h5 class="modal-title text-white">Ready to Leave?</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
        <a class="btn btn-danger" href="login.html">Logout</a>
      </div>
    </div>
  </div>
</div>