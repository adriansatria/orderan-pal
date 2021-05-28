<!-- CREATE -->
<div class="modal fade" id="addcustomer" role="dialog">
    <div class="modal-dialog">
        <form class="form" action="<?php echo base_url('/admin/customer/add'); ?>" method="post">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">Add Customer</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                </div>

                <div class="modal-body">
                    <div class="form-group">
                        <div class="row">
                            <label for = "title" class = "col-sm-2 control-label"> Customer's Name </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="i_nama" placeholder="siape lu?" required>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <label for="title" class="col-sm-2 control-label"> Customer's NIK </label>
                            <div class="col-sm-10">
                                <input type="NIK" class="form-control" name="i_NIK" placeholder="0000000000" required>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <label for="title" class="col-sm-2 control-label"> Customer's Address </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="i_alamat" placeholder="dimana lu?" required>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                            <label for = "title" class = "col-sm-2 control-label"> Customer's Phone </label>
                            <div class="col-sm-10">
                                 <input type="number" class="form-control" name="i_notelp" placeholder="00000000" required>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class = "btn btn-danger" data-dismiss = "modal"> Cancel </button>
                    <button type="submit" class = "btn btn-primary"> Add </button>
                </div>
            </div>  
        </form>
    </div>
</div>

<!----EDIT---->
<?php
foreach ($customer -> result_array () as $i) :
    $id = $i ['idcustomer'];
    $nama = $i ['nama'];
    $NIK = $i ['NIK'];
    $notelp = $i ['notelp'];
    $alamat = $i ['alamat'];
    ?>
    <div class="modal fade" id="editcustomer<?php echo $id; ?>"
        role="dialog">
        <div class="modal-dialog">
            <form class="form-horizontal" action="<?php echo base_url ('admin/customer/edit/' . $id); ?> "method = "post" >
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"> Edit Customer </h5>
                        <button type="button" class="close" data-dismiss="modal"> &times; </button>
                    </div>

                    <div class="modal-body">
                        <div class="form-group">
                            <div class="row">
                                <label for="title" class="col-sm-2 control-label"> Customer's Name </label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="i_nama" placeholder="siape lu?" value=" <?php echo $nama ; ?> ">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <label for="title" class="col-sm-2 control-label"> Customer's NIK </label>
                                <div class="col-sm-10">
                                    <input type="NIK" class="form-control" name="i_NIK" placeholder="00000000" value="<?php echo $NIK ; ?> ">
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div class="row">
                                <label for="title" class="col-sm-2 control-label"> Customer's Phone </label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" name="i_notelp" placeholder="00000000" value="<?php echo $notelp ; ?> ">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <label for="title" class="col-sm-2 control-label"> Customer's Address </label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="i_alamat" placeholder="dimane lu?" value="<?php echo $alamat ; ?> ">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss = "modal"> Cancel </button>
                        <button type="submit" class="btn btn-primary" > Edit </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <?php
endforeach;
?>

<!----Delete---->
<?php
foreach ($customer->result_array () as $i ) :
    $id = $i ['idcustomer'];
    $b = $i ['nama'];
    $c = $i ['NIK'];
    $f = $i ['notelp'];
    $g = $i ['alamat'];
    ?>
    <div class="modal fade" id ="deletecustomer<?php echo $id; ?>" role = "dialog">
        <div class="modal-dialog">
            <form class="form-horizontal" action="<?php echo base_url('index.php/admin/customer/delete/' .$id); ?>" method = "post">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"> Ready to Delete? </h5>
                        <button class="close" type="button" data-dismiss = "modal" aria-label ="Close">
                            <span aria-hidden ="true"> x </span>
                        </button>
                    </div>
                    <div class="modal-body"> Pilih "Delete" untuk menghapus customer dengan nama <?php echo $b ; ?> </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss = "modal"> Cancel </button>
                      <button type="submit" class ="btn btn-danger"> Delete</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <?php
endforeach;
?>