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
                    <h3> Katalog </h3>
                    <?php $this->load->view('admin/_partials/breadcrumb.php')?>
                    <!---/.box header --->
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table mr-1"></i>
                            List barang
                            <!-- <a type="button" data-toggle="modal" data-target="#addbarang" class="btn btn-primary" href="">Add (+)</a> -->
                        </div> 
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th width="15%">Name</th>
                                            <th width="20%">Merek</th>
                                            <th width="20%">Tipe </th>
                                            <th width="20%">Harga</th>
                                            <th width="20%">Jumlah</th>
                                            <th width="20%">Foto</th>   
                                        </tr>
                                    </thead>  
                                    <tbody> 
                                        <?php
                                        $x=1;
                                        foreach($barang->result_array() as $i) :
                                            $id = $i ['idbarang'];
                                            $nama = $i ['nama'];
                                            $merek = $i ['merek'];
                                            $tipe = $i ['tipe'];
                                            $harga = $i ['harga'];
                                            $jumlah = $i ['jumlah'];
                                            $foto = $i ['foto'];
                                            ?>
                                            <tr>
                                                <td><?php echo $nama; ?></td>
                                                <td><?php echo $merek; ?></td>
                                                <td><?php echo $tipe; ?></td>
                                                <td><?php echo $harga; ?></td>
                                                <td><?php echo $jumlah; ?></td>
                                                <td><img src="<?= base_url('assets/foto/'.$foto)?>" width="100"></td>
                                                <td>
                                                    <a class="btn btn-primary" data-toggle="modal" data-target="#pinjambarang<?php echo $id; ?>">PINJAM</a>
                                                    <!-- <a type="button" data-toggle="modal" data-target="#deletebarang<?php echo $id; ?>" class="btn btn-danger">Delete</a> -->
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
        <?php $this->load->view("admin/barang/modal_barang.php") ?>
    </div>



</body>
<?php $this->load->view('admin/_partials/modal.php')?>
<?php $this->load->view('admin/_partials/jss.php')?>
</html>