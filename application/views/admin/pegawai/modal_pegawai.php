<!-- CREATE -->
<div class="modal fade" id="addpegawai" role="dialog">
    <div class="modal-dialog">
        <form class="form" action="<?php echo base_url('/admin/pegawai/add'); ?>" method="post">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">Add Pegawai</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                </div>

                <div class="modal-body">
                    <div class="form-group">
                        <div class="row">
                            <label for = "title" class = "col-sm-2 control-label"> Pegawai's Name </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="i_nama" placeholder="siape lu?" required>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <label for="title" class="col-sm-2 control-label"> Pegawai's Address </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="i_alamat" placeholder="" required>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <label for = "title" class = "col-sm-2 control-label"> Pegawai's Phone </label>
                        <div class="col-sm-10">
                           <input type="number" class="form-control" name="i_notelp" placeholder="" required>
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
foreach ($pegawai -> result_array () as $i) :
    $id = $i ['idpegawai'];
    $nama = $i ['nama'];
    $alamat = $i ['alamat'];
    $notelp = $i ['notelp'];
    ?>
    <div class="modal fade" id="editpegawai<?php echo $id; ?>"
        role="dialog">
        <div class="modal-dialog">
            <form class="form-horizontal" action="<?php echo base_url ('admin/pegawai/edit/' . $id); ?> "method = "post" >
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"> Edit pegawai </h5>
                        <button type="button" class="close" data-dismiss="modal"> &times; </button>
                    </div>

                    <div class="modal-body">
                        <div class="form-group">
                            <div class="row">
                                <label for="title" class="col-sm-2 control-label"> Pegawai's Name </label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="i_nama" placeholder="siape lu?" value=" <?php echo $nama ; ?> ">
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div class="row">
                                <label for="title" class="col-sm-2 control-label"> Pegawai's Address </label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="i_alamat" placeholder="dimane lu?" value="<?php echo $alamat ; ?> ">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <label for="title" class="col-sm-2 control-label"> Pegawai's Phone </label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" name="i_notelp" placeholder="" value="<?php echo $notelp ; ?> ">
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
foreach ($pegawai->result_array () as $i ) :
    $id = $i ['idpegawai'];
    $b = $i ['nama'];
    $g = $i ['alamat'];
    $f = $i ['notelp'];
    ?>
    <div class="modal fade" id ="deletepegawai<?php echo $id; ?>" role = "dialog">
        <div class="modal-dialog">
            <form class="form-horizontal" action="<?php echo base_url('index.php/admin/pegawai/delete/' .$id); ?>" method = "post">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"> Ready to Delete? </h5>
                        <button class="close" type="button" data-dismiss = "modal" aria-label ="Close">
                            <span aria-hidden ="true"> x </span>
                        </button>
                    </div>
                    <div class="modal-body"> Pilih "Delete" untuk menghapus pegawai dengan nama <?php echo $b ; ?> </div>
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