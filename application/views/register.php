<?php $this->load->view('includes/header'); ?>

<style>
    body {
        background-color: #384654;
    }

    .row {
        margin-top: 50px;
    }

    .col-md-6 {
        background-color: #ffffff;
        border-radius: 8px;
        padding: 20px;
       
    }

    h4 {
        color: #007bff;
    }

    label {
        color: #495057;
    }

    .btn-success {
        background-color: #28a745;
        color: #ffffff;
        border: none;
        width: 100%;
    }

    .btn-success:hover {
        background-color: #218838;
    }

    .form-group {
        margin-bottom: 2px;
    }

    .mt-3 {
        margin-top: 20px;
    }

    a {
        color: #007bff;
    }

    .success_message{
        color: green;
        font-weight: 600;
        padding-bottom: 10px;
    }

</style>

<div class="row">



    <div class="col-md-6 offset-md-3">

    <div class="success_message" id="registrationMessage"></div>

    <div class="">
            <h4>Create an account</h4>
        </div>

        

        <form id="registrationForm" method="post" action="#">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="first_name">First Name</label>
                    <input type="text" class="form-control" id="first_name" name="first_name" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="last_name">Last Name</label>
                    <input type="text" class="form-control" id="last_name" name="last_name" required>
                </div>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email">
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="user_type">User Type</label>
                    <select class="form-control" id="user_type" name="user_type" required>
                        <option value="Employee">Employee</option>
                        <option value="Dealer">Dealer</option>
                    </select>
                </div>
            </div>

        
            <div id="dealerFields" style="display: none;">
                <div class="form-group">
                    <label for="city">City</label>
                    <input type="text" class="form-control" id="city" name="city">
                </div>
                <div class="form-group">
                    <label for="state">State</label>
                    <input type="text" class="form-control" id="state" name="state">
                </div>
                <div class="form-group">
                    <label for="zip_code">Zip Code</label>
                    <input type="text" class="form-control" id="zip_code" name="zip_code">
                </div>
            </div>

            <button type="button" class="btn btn-success" id="btnRegister">Register</button>

            <div class="mt-3">
                <p>Already have an account? <a href="<?php echo base_url('auth'); ?>">Login here</a></p>
            </div>
        </form>

       

    </div>
</div>


<script>
          
          document.getElementById('user_type').addEventListener('change', function() {
              var dealerFields = document.getElementById('dealerFields');
              dealerFields.style.display = (this.value === 'Dealer') ? 'block' : 'none';
          });
 
      </script>

      <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>


      <script>
    $(document).ready(function() {
        $("#btnRegister").click(function() {
            var firstName = $("#first_name").val();
            var lastName = $("#last_name").val();
            var nameRegex = /^[a-zA-Z ]+$/;

            if (!nameRegex.test(firstName) || !nameRegex.test(lastName)) {
                alert("Invalid Name. Please enter valid first and last names.");
                return;
            }

            $.ajax({
                type: "POST",
                url: "<?php echo base_url('auth/register'); ?>",
                data: $("#registrationForm").serialize(),
                success: function(response) {
                    if (response === 'success') {
                        alert("Registration Successful! Please login to continue.");
                        window.location.href = "<?php echo base_url('auth'); ?>";
                    } else if (response === 'email_exists') {
                        alert("This email already exists. Please use a different email.");
                    } else {
                        alert("An error occurred during registration. Please try again later.");
                    }
                },
                error: function() {
                    alert("An error occurred during registration. Please try again later.");
                }
            });
        });
    });
</script>


<?php $this->load->view('includes/footer'); ?>
