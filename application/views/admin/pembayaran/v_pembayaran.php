<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view("admin/_partials/head.php"); ?>
</head>

<script type="text/javascript">
    var totalBayar = 0;
    var totalPinjam = 0;
    var tglpinjam = 0;
    var tglkembali = 0;

    if (document.readyState == 'loading') {
        document.addEventListener('DOMContentLoaded', ready)
    } else {
        ready()
    }

    function ready() {
        totalBayar = JSON.parse(localStorage.getItem('transaksi')).total_bayar;
        totalPinjam = JSON.parse(localStorage.getItem('transaksi')).total_pinjam;
        tglpinjam = JSON.parse(localStorage.getItem('transaksi')).tanggal_pinjam;
        tglkembali = JSON.parse(localStorage.getItem('transaksi')).tanggal_kembali;

        if (totalBayar != 0 && totalPinjam != 0 ) {
            document.getElementById('totalPembayaran').innerHTML = totalBayar;
            document.getElementById('totaldipinjam').innerHTML = totalPinjam;
            document.getElementById('formtotalPembayaran').value = totalBayar;
            document.getElementById('formtotaldipinjam').value = totalPinjam;
            document.getElementById('tanggalPinjam').value = tglpinjam;
            document.getElementById('tanggalKembali').value = tglkembali;
        } else {
            document.getElementById('totalPembayaran').innerHTML = totalBayar;
            document.getElementById('totaldipinjam').innerHTML = totalPinjam;
            document.getElementById('formtotalPembayaran').value = totalBayar;
            document.getElementById('formtotaldipinjam').value = totalPinjam;
        }
    }

    function clear(){
        window.localStorage.clear();
    }

    function hitungKembalian() {
        var uang = document.getElementById('inputUang').value;
        var kembalian = uang - totalBayar;
        document.getElementById('kembalian').value = kembalian;
    }
</script>

<body class="sb-nav-fixed">
    <?php $this->load->view("admin/_partials/navbar.php"); ?>

    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <?php $this->load->view("admin/_partials/sidebar.php"); ?>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid">
                    <h1 class="mt-4">Transaksi Pembayaran</h1>
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
                                        <h4>Total Barang : <br> <span id="totaldipinjam">0</span> buah</br> </h2><b><!-- <span data-total="total" style="font-size:35pt">Rp. <?= $total ?>,-</span> --></b>
                                    </div>
                                    <div class="mt-4">
                                        <h4>Total Bayar : <br>Rp. <span id="totalPembayaran">0</span>,-</br> </h2><b><!-- <span data-total="total" style="font-size:35pt">Rp. <?= $total ?>,-</span> --></b>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-5">
                            <form method="post" action="<?php echo base_url ('/admin/pembayaran/insert'); ?>" name='autoSumForm'>
                                 <div class="form-group">
                                    <div class="row">
                                        <!-- <label for="title" class="col-sm-4 control-label">Tanggal Peminjaman</label> -->
                                        <div class="col-sm-8">
                                             <input type="hidden" class="form-control" id="tanggalPinjam" name="tanggalPinjam">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <!-- <label for="title" class="col-sm-4 control-label">Tanggal Kembali</label> -->
                                        <div class="col-sm-8">
                                             <input type="hidden" class="form-control" id="tanggalKembali" name="tanggalKembali">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <label for="title" class="perhitungan col-sm-4 control-label">Cash</label>
                                        <div class="col-sm-8">
                                            <input type="hidden" id="formtotaldipinjam" class="form-control" name='total_pinjam'/>
                                            <input type="hidden" id="formtotalPembayaran" class="form-control" name='total_bayar'/>
                                            <input type="number" id="inputUang" class="form-control" name='Uang_Pembayaran' size='23' onchange="hitungKembalian()" />
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <label for="title" class="col-sm-4 control-label">Change</label>
                                        <div class="col-sm-8">
                                            <input type="text" id="kembalian" class="form-control" value="" name="Kembalian" readonly>
                                        </div>
                                    </div>
                                </div>
                            
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
                                <input class="process_payment btn btn-flat btn-lg btn-success float-right" value="Process payment" type="submit">
                           <!--  <button class="process_payment btn btn-flat btn-lg btn-success float-right" data-kode_sewa="<?=$kode_sewa;?>">
                                Process Payment
                            </button> -->
                            </form>
                            <input type="submit" onClick="clear()" class="btn btn-flat btn-lg btn-warning" value="Cancel">
                        </div>
                    </div>

                    <div class="col-sm-13 mt-5">
                        <div class="box-body table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Id Penyewaan</th>
                                        <th>Total</th>
                                        <th>Jumlah Sewa</th>
                                        <th>Uang bayar</th>
                                        <th>Uang kembalian</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>


                                <!--Prototype-->
                                <tbody id="detail_carts">
                                <?php
                                        $x=1;
                                        foreach($detailpemb->result_array() as $i) :
                                            $idpembayaran = $i ['iddetailpemb'];
                                            $total = $i['totalpembayaran'];
                                            $jumlah = $i ['jumlahsewa'];
                                            $bayar = $i['bayar'];
                                            $kembali = $i['kembalian'];
                                            ?>
                                            <tr>
                                                <td><?php echo $idpembayaran; ?></td>
                                                <td><?php echo $total; ?></td>
                                                <td><?php echo $jumlah; ?></td>
                                                <td><?php echo $bayar; ?></td>
                                                <td><?php echo $kembali; ?></td>
                                                <td>
                                                <!-- <form action="" method="post">
                                                  <input class="btn btn-primary" value="Kembalikan" type="submit">
                                                </form> -->
                                                    <a class="btn btn-primary" data-toggle="modal" data-target="#pengembalian<?php echo $idpembayaran; ?>">Kembalikan</a>
                                                    <!-- <a type="button" data-toggle="modal" data-target="#deletebarang<?php echo $idpenyewaan; ?>" class="btn btn-danger">Delete</a> -->
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

                </div>
            </main>
        </div>
    </div><br>

    <?php $this->load->view("admin/_partials/footer.php"); ?>
    <!-- The Modal -->
    <div>
        <?php $this->load->view("admin/pembayaran/modal_pembayaran.php") ?>
        <?php $this->load->view("admin/_partials/modal.php"); ?>
        <?php $this->load->view("admin/_partials/jss.php"); ?>
    </div>
</body>
</html>