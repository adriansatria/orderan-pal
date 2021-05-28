<!DOCTYPE html>
<html lang="en">
    <head>
        <?php $this->load->view("admin/_partials/head.php") ?>  
    </head>

    <body class="sb-nav-fixed">
        <?php $this->load->view("admin/_partials/navbar.php"); ?>

        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <?php $this->load->view("admin/_partials/sidebar.php") ?> 
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h3>Detail Pembelian</h3>
                        <?php $this->load->view("admin/_partials/breadcrumb.php") ?>
                        <!-------Author-----> 
                            <div class="card mb-4">
                                <div class="card-header"><i class="fas fa-table mr-1"></i>List Detail Pembelian
                            
                                    <a type="button" class="btn btn-primary"data-toggle="modal"data-target="#adddetailpemb">Add (+)
                                    </a>
                                </div>


                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th width="10%">ID</th>
                                                    <th width="10%">ID PNY</th>
                                                    <th width="10%">ID PMB</th>
                                                    <th width="10%">ID Promo</th>
                                                    <th width="20%">Total Pembayaran</th>
                                                    <th width="15%">Jumlah Sewa</th>
                                                    <th width="15%">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $x = 1;
                                                foreach($detailpemb->result_array() as $i) :
                                            $id = $i['iddetailpemb'];
                                            $idpenyewaan = $i['idpenyewaan'];
                                            $idpembayaran = $i['idpembayaran'];
                                            $idpromo = $i['idpromo'];
                                            $totalpembayaran = $i['totalpembayaran'];
                                            $jumlahsewa = $i['jumlahsewa'];                                            ?>
                                            <tr>
                                                <td><?php echo $x; ?></td>
                                                <td><?php echo $idpenyewaan; ?></td>
                                                <td><?php echo $idpembayaran; ?></td>
                                                <td><?php echo $idpromo; ?></td>
                                                <td><?php echo $totalpembayaran; ?></td>
                                                <td><?php echo $jumlahsewa; ?></td>
                                                <td>
                                                    <a class="btn btn-primary" data-toggle="modal" data-target="#editdetailpemb<?php echo $id; ?>">Edit</a>
                                                    <a type="button" data-toggle="modal" data-target="#deletedetailpemb<?php echo $id; ?>" class="btn btn-danger">Delete</a>
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
                <?php $this->load->view("admin/_partials/footer.php") ?>
            </div>
            
        </div>
        <?php $this->load->view("admin/detailpemb/modal_detailpemb.php") ?>
        <?php $this->load->view("admin/_partials/modal.php") ?>

        <?php $this->load->view("admin/_partials/jss.php") ?>
        
    </body>
</html>
