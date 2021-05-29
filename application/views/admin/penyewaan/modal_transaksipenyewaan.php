<?php
foreach ($penyewaan -> result_array () as $i) :
    $idpenyewaan = $i ['idpenyewaan'];
    $id = $i ['idbarang'];
    $nama = $i ['nama_barang'];
    $harga = $i ['harga'];
    $jumlah = $i ['quantity'];
    ?>
    <div class="modal fade" id="editpenyewaan<?php echo $id; ?>"
        role="dialog">
        <div class="modal-dialog">
           <?php echo form_open_multipart(base_url('admin/penyewaan/edit/'. $idpenyewaan)); ?>
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
                                <input type="text" class="form-control" name="i_jumlah" placeholder="" value="<?php echo $jumlah ; ?>">
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



<?php
foreach ($penyewaan->result_array() as $i) :
    $id = $i['idpenyewaan'];
    $nama = $i ['nama_barang'];

?>
    <div class="modal fade" id="deletebarang<?php echo $id; ?>" role="dialog">
    <div class="modal-dialog">
        <form class="form" action="<?php echo base_url('/admin/penyewaan/delete/' . $id); ?>" method="post">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Delete?</h5>
                    <button type="button" class="close" data-dismiss="modal"> &times; </button>
                </div>

                <div class="modal-body">Pilih "Delete" untuk menghapus author dengan nama <?php echo $nama; ?> </div>

                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger">Delete</button>
                </div>

            </div>
        </form>
    </div>
</div>
<?php
endforeach;
?>