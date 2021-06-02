<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view("admin/_partials/head.php"); ?>
</head>

<body class="sb-nav-fixed">
    <?php $this->load->view("admin/_partials/navbar.php"); ?>

    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <?php $this->load->view("admin/_partials/sidebar.php"); ?>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid">
                    <h1 class="mt-4">Data Pengembalian Barang</h1>
                    <?php $this->load->view("admin/_partials/breadcrumb.php"); ?>

                    <div class="row">
                        <div class="col-sm-9">
                            <form class="form-horizontal" action="" method="post">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <div class="row">
                                                <label for="title" class="col-sm-3 control-label">Date</label>
                                                <div class="col-sm-8">
                                                    <input type="text" data-sale_date="sale_date" class="form-control" value="<?php echo date("d-m-Y") ?>" readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-1">
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <div class="row">
                                                <label for="title" class="col-sm-5 control-label">Nama User</label>
                                                <div class="col-sm-6">
                                                    <!-- <input type="text" class="form-control" data-employee="employee" value="<?php echo $this->session->userdata('name'); ?>" readonly> -->
                                                    <input type="text" class="form-control" data-employee="employee" value="wilson" readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-1">
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    
                    <div class="col-sm-13 mt-5">
                        <div class="box-body table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Id Pembayaran</th>
                                        <th>Total</th>
                                        <th>Jumlah Sewa</th>
                                        <th>Uang bayar</th>
                                        <th>Uang kembalian</th>
                                        <th>Tanggal Pinjam</th>
                                        <th>Tanggal Pengembalian</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>


                                <!--Prototype-->
                                <tbody id="detail_carts">
                                <?php
                                        $x=1;
                                        foreach($pengembalian->result_array() as $i) :
                                            $idpembayaran = $i ['iddetailpemb'];
                                            $total = $i['totalpembayaran'];
                                            $jumlah = $i ['jumlahsewa'];
                                            $bayar = $i['bayar'];
                                            $kembali = $i['kembalian'];
                                            $tglpinjam = $i['tanggalpeminjaman'];
                                            $tglpengembalian = $i['tanggalpengembalian'];
                                            
                                            ?>
                                            <tr>
                                                <td><?php echo $idpembayaran; ?></td>
                                                <td><?php echo $total; ?></td>
                                                <td><?php echo $jumlah; ?></td>
                                                <td><?php echo $bayar; ?></td>
                                                <td><?php echo $kembali; ?></td>
                                                <td><?php echo $tglpinjam; ?></td>
                                                <td><?php echo $tglpengembalian; ?></td>
                                                <td>
                                                    <!-- <a class="btn btn-primary" data-toggle="modal" data-target="#editpenyewaan<?php echo $id; ?>">Edit</a>
                                                    <a type="button" data-toggle="modal" data-target="#deletebarang<?php echo $idpenyewaan; ?>" class="btn btn-danger">Delete</a> -->
                                                </td>
                                            </tr>
                                        <?php
                                            $x++;
                                        endforeach; ?>  
                                </tbody>
                                <!--END Prototype -->
                            </table>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div><br>

    <?php $this->load->view("admin/_partials/footer.php"); ?>
    <!-- The Modal -->
    <div>
        <?php $this->load->view("admin/_partials/modal.php"); ?>
        <?php $this->load->view("admin/_partials/jss.php"); ?>
    </div>
</body>
</html>