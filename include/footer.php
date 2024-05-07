  <?php 
  if(isset($_SESSION['SESS_MEMBER_ID'])){ ?>
  <script src="../vendor/jquery/jquery.min.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="../assets/js/sb-admin-2.min.js"></script>
  <script src="../vendor/chart.js/Chart.min.js"></script>
  <script src="../vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="../vendor/datatables/dataTables.bootstrap4.min.js"></script>
  <script src="../assets/js/demo/datatables-demo.js"></script>
  <script src="../assets/js/demo/chart-area-demo.js"></script>
  <script src="../assets/js/demo/chart-pie-demo.js"></script>
  <script src="../assets/js/demo/chart-bar-demo.js"></script>

  <script>
    (function() {
      'use strict';
      window.addEventListener('load', function() {
        var forms = document.getElementsByClassName('needs-validation');
        var validation = Array.prototype.filter.call(forms, function(form) {
          form.addEventListener('submit', function(event) {
            if (form.checkValidity() === false) {
              event.preventDefault();
              event.stopPropagation();
            }
            form.classList.add('was-validated');
          }, false);
        });
      }, false);
    })();
  </script>

  <script>
    $('.account_edit').click(function (e) {
      e.preventDefault();
      var accounts_id = $(this).closest('tr').find('.account_id').text();
      console.log(accounts_id);
      $.ajax({
        method: "POST",
        url: "code.php",
        data: {
          'accountUpdate': true,
          'accounts_id':accounts_id,
        },
        success: function(response) {
          console.log(response);
          $.each(response, function (Key, value){
            // console.log(value['username']);
            $('#accounts_id_edit').val(value['id']);
            $('#accounts_id_reset').val(value['id']);
            $('#accounts_username_edit').val(value['username']);
            $('#accounts_fname_edit').val(value['fname']);
            $('#accounts_lname_edit').val(value['lname']);
            $('#accounts_number_edit').val(value['employee_id']);
            $('#accounts_card_edit').val(value['card']);
            $('#accounts_number_edit').val(value['employee_id']);
            $('#accounts_access_edit').val(value['access']);
            $('#accounts_section_edit').val(value['sec_id']);
            $('#accounts_email_edit').val(value['email']);
          });
          $('#accountUpdate').modal('show');
        }
      })
    })

    function resetPassword(){
      var accountresetID = document.getElementById('accounts_username_edit').value;
      $(document).ready(function () {
        document.getElementById('account_ID1').value = accountresetID;
        $('#accountUpdate').modal('hide');
        $('#accountPasschange').modal('show');
      });
    }

    $('.department_edit').click(function (e) {
      e.preventDefault();
      var departments_id = $(this).closest('tr').find('.department_id').text();
      console.log(departments_id);
      $.ajax({
        method: "POST",
        url: "code.php",
        data: {
          'departmentUpdate': true,
          'departments_id':departments_id,
        },
        success: function(response) {
          console.log(response);
          $.each(response, function (Key, value){
            console.log(value['dept_name']);
            $('#departments_id_edit').val(value['id']);
            $('#departments_dept_name_edit').val(value['dept_name']);
            $('#departments_dept_id_edit').val(value['dept_id']);
            $('#departments_dept_status_edit').val(value['status']);
          });
          $('#departmentUpdate').modal('show');
        }
      })
    })

    $('.section_edit').click(function (e) {
      e.preventDefault();
      var sections_id = $(this).closest('tr').find('.section_id').text();
      console.log(sections_id);
      $.ajax({
        method: "POST",
        url: "code.php",
        data: {
          'sectionUpdate': true,
          'sections_id':sections_id,
        },
        success: function(response) {
          console.log(response);
          $.each(response, function (Key, value){
            console.log(value['dept_name']);
            $('#sections_id_edit').val(value['id']);
            $('#sections_dept_name_edit').val(value['sec_name']);
            $('#sections_dept_id_edit').val(value['sec_id']);
            $('#sections_dept_edit').val(value['dept_id']);
            $('#sections_dept_status_edit').val(value['status']);
          });
          $('#sectionUpdate').modal('show');
        }
      })
    })
  </script>
  <?php }
  // Session is not Started Scripts
  else { ?>
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="assets/js/sb-admin-2.min.js"></script>
  <script>
    const passwordInput = document.getElementById('password');
    const capsWarning = document.getElementById('password-caps-warning');
    passwordInput.addEventListener('keyup', (event) => {
      if (event.getModifierState('CapsLock')) {
        capsWarning.classList.remove('d-none');
      }
      else {
        capsWarning.classList.add('d-none');
      }
    });
  </script>
  <?php } ?>

</body>

</html>