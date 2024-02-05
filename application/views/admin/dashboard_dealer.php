<?php $this->load->view('includes/header'); ?>

<style>
    body {
        background-color: #1e6c61;
    }

    .navbar {
        background-color: #007bff;
        color: #ffffff;
    }

    .navbar-brand {
        font-size: 1.5rem;
    }

    .navbar-nav .nav-link {
        color: #ffffff;
    }

    .navbar-nav .nav-item.dropdown:hover .dropdown-menu {
        display: block;
    }

    .row {
        margin-top: 20px;
    }

    .col-md-12 {
        background-color: #ffffff;
        border-radius: 8px;
        padding: 20px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        margin-bottom: 20px;
    }

    h3 {
        color: #007bff;
    }

    p {
        margin-bottom: 10px;
        color: #495057;
    }

    .btn-primary {
        background-color: #007bff;
        border: none;
    }

    .btn-primary:hover {
        background-color: #0056b3;
    }

    .modal-content {
        background-color: #ffffff;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .modal-title {
        color: #007bff;
    }

    .modal-body {
        padding: 20px;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .btn-primary-modal {
        background-color: #007bff;
        border: none;
    }

    .btn-primary-modal:hover {
        background-color: #0056b3;
    }

    .box-container {
        display: flex;
        justify-content: space-between;
        flex-wrap: wrap;
    }

    .info-box {
        width: 30%;
        margin-bottom: 20px;
        padding: 15px;
        border: 1px solid #dee2e6;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .info-box strong {
        display: block;
        margin-bottom: 5px;
        color: #007bff;
    }

    .edit-btn-container {
        text-align: center;
        margin-top: 20px;
    }
</style>


<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <?php if ($this->session->userdata('logged_in')): ?>
            <span class="navbar-brand">
                Hi, <?php echo $this->session->userdata('first_name'); ?>!
            </span>
        <?php endif; ?>

        <div class="navbar-collapse justify-content-end">
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Logout
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="<?php echo base_url('auth/logout'); ?>">Logout</a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div id="successMessage">
    <?php
    $successMessage = $this->session->flashdata('success_message');
    if (!empty($successMessage)) {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">';
        echo $successMessage;
        echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close">';
        echo '<span aria-hidden="true">&times;</span></button></div>';
    }
    ?>
</div>

<div id="loginMessage">
    <?php
    $loginMessage = $this->session->flashdata('login_message');
    if (!empty($loginMessage)) {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">';
        echo $loginMessage;
        echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close">';
        echo '<span aria-hidden="true">&times;</span></button></div>';
    }
    ?>
</div>

<div class="row">
    <div class="col-md-12">
        <h3>Your Details</h3>
        <div class="box-container">
            <?php if (!empty($dealer_user)): ?>
                <div class="info-box">
                    <strong>User ID:</strong> <?php echo $dealer_user->id; ?>
                </div>
                <div class="info-box">
                    <strong>First Name:</strong> <?php echo $dealer_user->first_name; ?>
                </div>
                <div class="info-box">
                    <strong>Last Name:</strong> <?php echo $dealer_user->last_name; ?>
                </div>
                <div class="info-box">
                    <strong>Email:</strong> <?php echo $dealer_user->email; ?>
                </div>
                <div class="info-box">
                    <strong>City:</strong> <?php echo $dealer_user->city; ?>
                </div>
                <div class="info-box">
                    <strong>State:</strong> <?php echo $dealer_user->state; ?>
                </div>
                <div class="info-box">
                    <strong>Zip Code:</strong> <?php echo $dealer_user->zip_code; ?>
                </div>
                <div class="edit-btn-container">
                    <button class="btn btn-primary" onclick="openEditModal('<?php echo $dealer_user->id; ?>', '<?php echo $dealer_user->city; ?>', '<?php echo $dealer_user->state; ?>', '<?php echo $dealer_user->zip_code; ?>')">Edit</button>
                </div>
            <?php else: ?>
                <p>No data found for the logged-in dealer user.</p>
            <?php endif; ?>
        </div>
    </div>
</div>


<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editForm" action="<?= base_url('dashboard/update_dealer'); ?>" method="post">
                    <input type="hidden" name="userId" id="editUserId">
                    <div class="form-group">
                        <label for="editCity">City</label>
                        <input type="text" class="form-control" id="editCity" name="editCity" required>
                    </div>
                    <div class="form-group">
                        <label for="editState">State</label>
                        <input type="text" class="form-control" id="editState" name="editState" required>
                    </div>
                    <div class="form-group">
                        <label for="editZipCode">Zip Code</label>
                        <input type="text" class="form-control" id="editZipCode" name="editZipCode" required>
                    </div>
                    <div class="edit-btn-container">
                        <button type="submit" class="btn btn-primary-modal">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script>
    
    function openEditModal(userId, city, state, zipCode) {
        
        $('#editUserId').val(userId);
        $('#editCity').val(city);
        $('#editState').val(state);
        $('#editZipCode').val(zipCode);
        
        $('#editModal').modal('show');
    }
</script>

<script>
    // Hide the success message after 3 seconds
    $(document).ready(function () {
        setTimeout(function () {
            $("#successMessage, #loginMessage").fadeOut("slow");
        }, 3000);
    });
</script>

<?php $this->load->view('includes/footer'); ?>
