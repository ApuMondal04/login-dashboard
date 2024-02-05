<?php $this->load->view('includes/header'); ?>

<style>
    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    table, th, td {
        border: 1px solid #ddd;
    }

    th, td {
        padding: 12px;
        text-align: left;
    }

    th {
        background-color: #007bff;
        color: #fff;
    }

    tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    tr:hover {
        background-color: #e0e0e0;
    }

    .modal-content {
        border-radius: 10px;
    }

    .modal-header {
        background-color: #007bff;
        color: #fff;
        border-radius: 10px 10px 0 0;
    }

    .modal-body {
        padding: 20px;
    }

    .btn-primary {
        background-color: #007bff;
        color: #fff;
    }

    .btn-primary:hover {
        background-color: #0056b3;
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


<div class="container mt-3">
    <div class="row">
        <div class="col-md-6">
            <div class="input-group">
                <input type="text" class="form-control" id="filterInput" placeholder="Search by zip">
            </div>
        </div>
    </div>



    <div class="row mt-3">
        <div class="col-md-12">
            <?php if (!empty($dealer_users)): ?>
                <table id="userTable" class="table">
                    <thead>
                        <tr>
                            <th>User ID</th>
                            <th>F Name</th>
                            <th>L Name</th>
                            <th>Email</th>
                            <th>City</th>
                            <th>Z Code</th>
                            <th>State</th>
                            <th>Action</th> 
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($dealer_users as $user): ?>
                            <tr>
                                <td><?php echo $user->id; ?></td>
                                <td><?php echo $user->first_name; ?></td>
                                <td><?php echo $user->last_name; ?></td>
                                <td><?php echo $user->email; ?></td>
                                <td><?php echo $user->city; ?></td>                    
                                <td><?php echo $user->zip_code; ?></td>
                                <td><?php echo $user->state; ?></td>
                                <td>
                                    <a href="javascript:void(0);" onclick="editUser('<?php echo $user->id; ?>', '<?php echo $user->city; ?>', '<?php echo $user->state; ?>', '<?php echo $user->zip_code; ?>')" title="Edit">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <p>No Dealer users found.</p>
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
                <form id="editForm" action="<?= base_url('dashboard/update'); ?>" method="post">
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
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>

<script>
    function editUser(userId, city, state, zipCode) {
        $('#editUserId').val(userId);
        $('#editCity').val(city);
        $('#editState').val(state);
        $('#editZipCode').val(zipCode);
        $('#editModal').modal('show');
    }

    function deleteUser(userId) {
        if (confirm('Are you sure you want to delete this user?')) {
            window.location.href = '<?= base_url('dashboard/delete/'); ?>' + userId;
        }
    }

    $(document).ready(function () {
        $('#filterInput').on('input', function () {
            var searchTerm = $(this).val().toLowerCase();
            $('#userTable tbody tr').filter(function () {
                $(this).toggle($(this).text().toLowerCase().indexOf(searchTerm) > -1);
            });
        });
    });

    
</script>


<script>
    $(document).ready(function () {
        $('#filterInput').on('input', function () {
            var searchTerm = $(this).val().toLowerCase();
            $('#userTable tbody tr').filter(function () {
                $(this).toggle($(this).text().toLowerCase().indexOf(searchTerm) > -1);
            });
        });
    });
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
