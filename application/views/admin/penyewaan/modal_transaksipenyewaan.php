<?php
foreach ($penyewaan -> result_array () as $i) :
    $id = $i ['idbarang'];
    $nama = $i ['nama_barang'];
    $harga = $i ['harga'];
    $jumlah = $i ['quantity'];
    ?>
    <div class="modal fade" id="editpenyewaan<?php echo $id; ?>"
        role="dialog">
        <div class="modal-dialog">
           <?php echo form_open_multipart(base_url('admin/penyewaan/edit/'. $id)); ?>
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"> Data Barang Pinjaman </h5>
                        <button type="button" class="close" data-dismiss="modal"> &times; </button>
                    </div>
                    
                        <div class="form-group">
                        <div class="row">
                                <div class="col-sm-10">
                                    <input type="hidden" class="form-control" name="id" placeholder="" value="<?php echo $id ; ?> ">
                            </div>
                        </div>
                    </div>

                     <div class="modal-body">
                    <div class="form-group">
                        <div class="row">
                            <label for = "title" class = "col-sm-2 control-label"> Barang's Name </label>
                            <div class="col-sm-10">
                               <input type="text" class="form-control" name="i_nama" placeholder="" value="<?php echo $nama ; ?> " readonly>
                            </div>
                        </div>
                    </div>

                <div class="form-group">
                    <div class="row">
                            <label for = "title" class = "col-sm-2 control-label"> Barang's Price </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="i_harga" placeholder="" value="<?php echo $harga ; ?> " readonly>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                        <div class="row">
                            <label for="title" class="col-sm-2 control-label"> Jumlah dipinjam  </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="i_jumlah" placeholder="" value="<?php echo $jumlah ; ?> ">
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss = "modal"> Cancel </button>
                        <button type="submit" class="btn btn-primary"> Edit </button>
                    </div>
                    </div>
                </div>
            <?php echo form_close(); ?>
        </div>
    </div>
    <?php
endforeach;
?>
