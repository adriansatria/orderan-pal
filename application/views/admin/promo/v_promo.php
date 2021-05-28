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
                    <h3> Promo </h3>
                    <?php $this->load->view('admin/_partials/breadcrumb.php')?>
                    <!---/.box header --->
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table mr-1"></i>
                            List promo
                            <a type="button" data-toggle="modal" data-target="#addpromo" class="btn btn-primary" href="">Add (+)</a>
                        </div> 
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th width="10%">ID</th>
                                            <th width="15%">Price</th>
                                            <th width="20%">Name</th>
                                            <th width="20%">Type</th>
                                            <th width="20%">Action</th>    
                                        </tr>
                                    </thead>  
                                    <tbody> 
                                        <?php
                                        $x=1;
                                        foreach($promo->result_array() as $i) :
                                            $id = $i['idpromo'];
                                            $harga = $i['harga'];
                                            $nama = $i['nama'];
                                            $jenis = $i['jenis'];
                                            ?>
                                            <tr>
                                                <td><?php echo $x; ?></td>
                                                <td><?php echo $harga; ?></td>
                                                <td><?php echo $nama; ?></td>
                                                <td><?php echo $jenis; ?></td>
                                                <td>
                                                    <a class="btn btn-primary" data-toggle="modal" data-target="#editpromo<?php echo $id; ?>">Edit</a>
                                                    <a type="button" data-toggle="modal" data-target="#deletepromo<?php echo $id; ?>" class="btn btn-danger">Delete</a>
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
        </div>
        <?php $this->load->view("admin/promo/modal_promo.php") ?>
    </div>
     


</body>
<?php $this->load->view('admin/_partials/modal.php')?>
<?php $this->load->view('admin/_partials/jss.php')?>
</html>