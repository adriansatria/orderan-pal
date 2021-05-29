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
                    <h1 class="mt-4">Transaksi Penyewaan</h1>
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
                        <div class="col-sm-1">
                        </div>
                        <div class="col-sm-2">
                            <button class="col-sm-12 btn btn-info btn-flat" data-toggle="modal" data-target="#show_barang">
                                <i class="fa fa-search"></i>Pilih barang
                            </button>
                        </div>
                    </div>

                    <div class="col-sm-13">
                        <div class="box-body table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Barang Id</th>
                                        <th>Nama Barang</th>
                                        <th>Price</th>
                                        <th>Qty</th>
                                        <th>Total</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>


                                <!--Prototype-->
                                <tbody id="detail_carts">
                                <?php
                                        $x=1;
                                        $totalpembayaran=0;
                                        foreach($penyewaan->result_array() as $i) :
                                            $id = $i ['idbarang'];
                                            $nama = $i ['nama_barang'];
                                            $harga = $i ['harga'];
                                            $jumlah = $i ['quantity'];
                                            $total = $jumlah * $harga;
                                            $totalpembayaran = $totalpembayaran + $total;
                                            ?>
                                            <tr>
                                                <td><?php echo $id; ?></td>
                                                <td><?php echo $nama; ?></td>
                                                <td><?php echo $harga; ?></td>
                                                <td><?php echo $jumlah; ?></td>
                                                <td><?php echo $total; ?></td>
                                                <td>
                                                    <a class="btn btn-primary" data-toggle="modal" data-target="#editpenyewaan<?php echo $id; ?>">Edit</a>
                                                    <a type="button" data-toggle="modal" data-target="#deletebarang<?php echo $id; ?>" class="btn btn-danger">Delete</a>
                                                </td>
                                            </tr>
                                            <?php
                                            $x++;
                                        endforeach; ?>  
                                </tbody>
                                <!--END Prototype-->
                            </table>
                        </div>
                    </div>

                    <div class="row">
                        <div class="card col-sm-3">
                            <div class="card-body">
                                <div class="box-body">
                                    <div>
                                        <h4>Nomor Nota : <br>PNY00000001</br> <b><!-- <span data-invoice="invoice"><?= $kode_sewa; ?></span> --></b></h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card col-sm-4">
                            <div class="card-body">
                                <div class="box-body">
                                    <div>
                                        <h2>Total Bayar : <br>Rp. <?php echo $totalpembayaran; ?>,-</br> </h2><b><!-- <span data-total="total" style="font-size:35pt">Rp. <?= $total ?>,-</span> --></b>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-5">
                            <Form method="post" name='autoSumForm'>
                                <div class="form-group">
                                    <div class="row">
                                        <label for="title" class="perhitungan col-sm-4 control-label">Cash</label>
                                        <div class="col-sm-8">
                                            <input type="number" class="form-control" name='Uang_Pembayaran' size='23' onFocus="startCalc();" onBlur="stopCalc();" />
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <label for="title" class="col-sm-4 control-label">Change</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" value="" name="Kembalian" onchange='tryNumberFormat(this.form);' readonly>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <div class="form-group">
                                <table>
                                    <tr>
                                        <td width="38%">
                                            <label for="title">Pegawai</label>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" name="nama_pegawai" id="nama_pegawai">
                                            <input type="hidden" class="form-control" name="id_pegawai" id="id_pegawai">
                                        </td>
                                        <td>
                                            <button class="add_pegawai btn btn-info btn-flat" data-toggle="modal" data-target="#showpegawai">
                                                <i class="fa fa-search"></i>
                                            </button>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <a class="btn btn-flat btn-lg btn-warning" href="<?php echo base_url('admin/penyewaan/clear_carts'); ?>">
                                Cancel
                            </a>
                           <!--  <button class="process_payment btn btn-flat btn-lg btn-success float-right" data-kode_sewa="<?=$kode_sewa;?>">
                                Process Payment
                            </button> -->
                            <button class="process_payment btn btn-flat btn-lg btn-success float-right">
                                Process Payment
                            </button>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div><br>

    <?php $this->load->view("admin/_partials/footer.php"); ?>
    <!-- The Modal -->
    <div>
        <?php $this->load->view("admin/penyewaan/modal_transaksipenyewaan.php"); ?>
        <?php $this->load->view("admin/_partials/modal.php"); ?>
        <?php $this->load->view("admin/_partials/jss.php"); ?>
    </div>
</body>
</html>