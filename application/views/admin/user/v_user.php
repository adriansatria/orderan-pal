<!DOCTYPE html>
<html lang="en">
<head>
    <?php $this->load->view('admin/_partials/head.php');?>
</head>

<body class="sb-nav-fixed">
    <?php $this->load->view('admin/_partials/navbar.php');?>

    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <?php $this->load->view('admin/_partials/sidebar.php')?>
        </div>

        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid">
                    <h3> User </h3>
                    <?php $this->load->view('admin/_partials/breadcrumb.php')?>
                    <!---/.box header --->
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table mr-1"></i>
                            List User
                            <a type="button" data-toggle="modal" data-target="#addUser" class="btn btn-primary" href="">Add (+)</a>
                        </div> 
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th width="10%">ID</th>
                                            <th width="20%">Username</th>
                                            <th width="20%">Role</th>
                                            <th width="15%">Action</th>    
                                        </tr>
                                    </thead>  
                                    <tbody> 
                                        <?php
                                        $x=1;
                                        foreach($user->result_array() as $i) :
                                            $id = $i['iduser'];
                                            $username = $i['username'];
                                            $password = $i['password'];
                                            $role = $i['role'];
                                            ?>
                                            <tr>
                                                <td><?php echo $x; ?></td>
                                                <td><?php echo $username; ?></td>
                                                <td><?php echo $role; ?></td>
                                                <td>
                                                    <a class="btn btn-primary" data-toggle="modal" data-target="#editUser<?php echo $id; ?>">Edit</a>
                                                    <a type="button" data-toggle="modal" data-target="#deleteUser<?php echo $id; ?>" class="btn btn-danger">Delete</a>
                                                </td>
                                            </tr>
                                            <?php
                                            $x++;
                                        endforeach; ?>          
                                    </tbody>
                                </table>                    
                            </div>
                        </div>
                    </div>
                </div>
            </main>    
            <?php $this->load->view('admin/_partials/footer.php')?>        
            <?php $this->load->view("admin/user/modal_user.php"); ?>
        </div>
    </div>
</body>
<?php $this->load->view('admin/_partials/modal.php')?>
<?php $this->load->view('admin/_partials/jss.php')?>
</html> 