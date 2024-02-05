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
        padding: 30px;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
    }

    h4 {
        color: #007bff;
    }

    .btn-secondary {
        background-color: #6c757d;
        color: #ffffff;
        border: none;
        transition: background-color 0.3s ease;
    }

    .btn-secondary.active {
        background-color: #58D68D;
    }

    .form-group {
        margin-bottom: 25px;
    }

    .form-control {
        border-radius: 5px;
        padding-left: 40px; 
    }

    .form-control-icon {
        position: absolute;
        top: 50%;
        left: 15px;
        transform: translateY(-50%);
        color: #007bff;
    }

    .btn-primary {
        background-color: #007bff;
        color: #ffffff;
        border: none;
        transition: background-color 0.3s ease;
    }

    .btn-primary:hover {
        background-color: #0056b3;
    }

    .mt-3 {
        margin-top: 20px;
    }

    a {
        color: #007bff;
    }
</style>

<div class="row">
    <div class="col-md-6 offset-md-3 text-center">

        <h2 class="mb-4">Who you are?</h2>

        <button class="btn btn-secondary mb-3" onclick="showDealerLoginForm()" id="dealerButton">I Am a Dealer</button>
        <button class="btn btn-secondary mb-3" onclick="showEmployeeLoginForm()" id="employeeButton">I Am an Employee</button>

        <!-- Dealer Login Form -->
        <form method="post" action="<?php echo base_url('auth/login'); ?>" id="dealerLoginForm" style="display: none;">
            <h4 class="mb-4">Dealer Login</h4>
            <input type="hidden" name="user_type" value="Dealer">
            <div class="form-group">
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
                <i class="fas fa-envelope form-control-icon"></i>
            </div>
            <div class="form-group">
                <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>
                <i class="fas fa-lock form-control-icon"></i>
            </div>

            <button type="submit" class="btn btn-primary btn-block">Login as Dealer</button>

            <p class="mt-3">Don't have an account? <a href="<?php echo base_url('auth/register'); ?>">Register here</a></p>
        </form>

     
        <form method="post" action="<?php echo base_url('auth/login'); ?>" id="employeeLoginForm" style="display: none;">
            <h4 class="mb-4">Employee Login</h4>
            <input type="hidden" name="user_type" value="Employee">
            <div class="form-group">
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
                <i class="fas fa-envelope form-control-icon"></i>
            </div>
            <div class="form-group">
                <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>
                <i class="fas fa-lock form-control-icon"></i>
            </div>

            <button type="submit" class="btn btn-primary btn-block">Login as Employee</button>

            <p class="mt-3">Don't have an account? <a href="<?php echo base_url('auth/register'); ?>">Register here</a></p>
        </form>

    </div>
</div>

<script>
    function showDealerLoginForm() {
        document.getElementById('dealerLoginForm').style.display = 'block';
        document.getElementById('employeeLoginForm').style.display = 'none';
        document.getElementById('dealerButton').style.backgroundColor = '#58D68D';
        document.getElementById('employeeButton').style.backgroundColor = '#6c757d';
    }

    function showEmployeeLoginForm() {
        document.getElementById('employeeLoginForm').style.display = 'block';
        document.getElementById('dealerLoginForm').style.display = 'none';
        document.getElementById('employeeButton').style.backgroundColor = '#58D68D';
        document.getElementById('dealerButton').style.backgroundColor = '#6c757d';
    }
</script>


<?php $this->load->view('includes/footer'); ?>
