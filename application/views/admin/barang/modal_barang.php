<!-- CREATE -->
<div class="modal fade" id="addbarang" role="dialog">
    <div class="modal-dialog">
        <?php echo form_open_multipart(base_url('admin/barang/add')); ?>
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">Add barang</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                </div>

                <div class="modal-body">
                    <div class="form-group">
                        <div class="row">
                            <label for = "title" class = "col-sm-2 control-label"> Barang's Name </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="i_nama" placeholder="" required>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <label for="title" class="col-sm-2 control-label"> Barang's Merk </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="i_merek" placeholder="" required>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <label for="title" class="col-sm-2 control-label"> Barang's Type </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="i_tipe" placeholder="" required>
                            </div>
                        </div>
                    </div>
              

                <div class="form-group">
                    <div class="row">
                            <label for = "title" class = "col-sm-2 control-label"> barang's Price </label>
                            <div class="col-sm-10">
                                 <input type="number" class="form-control" name="i_harga" placeholder="" required>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                        <div class="row">
                            <label for="title" class="col-sm-2 control-label"> Barang's Stock  </label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" name="i_jumlah" placeholder="" required>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <label for="title" class="col-sm-2 control-label">Upload Image</label>
                            <div class="col-sm-10">
                                <input type="file" name="i_foto" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class = "btn btn-danger" data-dismiss = "modal"> Cancel </button>
                    <button type="submit" class = "btn btn-primary"> Add </button>
                </div>
            </div>  
        <?php echo form_close(); ?>
    </div>
</div>

<!----EDIT---->
<?php
foreach ($barang -> result_array () as $i) :
    $id = $i ['idbarang'];
    $nama = $i ['nama'];
    $merek = $i ['merek'];
    $tipe = $i ['tipe'];
    $harga = $i ['harga'];
    $jumlah = $i ['jumlah'];
    $foto = $i ['foto'];
    ?>
    <div class="modal fade" id="editbarang<?php echo $id; ?>"
        role="dialog">
        <div class="modal-dialog">
           <?php echo form_open_multipart(base_url('admin/barang/edit/'. $id)); ?>
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"> Edit Barang </h5>
                        <button type="button" class="close" data-dismiss="modal"> &times; </button>
                    </div>

                     <div class="modal-body">
                    <div class="form-group">
                        <div class="row">
                            <label for = "title" class = "col-sm-2 control-label"> Barang's Name </label>
                            <div class="col-sm-10">
                               <input type="text" class="form-control" name="i_nama" placeholder="" value=" <?php echo $nama ; ?> ">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <label for="title" class="col-sm-2 control-label"> Barang's Merk </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="i_merek" placeholder="" value="<?php echo $merek ; ?> ">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <label for="title" class="col-sm-2 control-label"> Barang's Type </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="i_tipe" placeholder="" value="<?php echo $tipe ; ?> ">
                            </div>
                        </div>
                    </div>

                <div class="form-group">
                    <div class="row">
                            <label for = "title" class = "col-sm-2 control-label"> barang's Price </label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" name="i_harga" placeholder="" value="<?php echo $harga ; ?> ">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                        <div class="row">
                            <label for="title" class="col-sm-2 control-label"> Barang's Stock  </label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" name="i_jumlah" placeholder="" value="<?php echo $jumlah ; ?> ">
                            </div>
                        </div>
                    </div>

                <div class="form-group">
                        <div class="row">
                            <label for="title" class="col-sm-2 control-label">Upload Image</label>
                            <div class="col-sm-10">
                                <input type="file" name="i_foto" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>


                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss = "modal"> Cancel </button>
                        <button type="submit" class="btn btn-primary" > Edit </button>
                    </div>
                </div>
            <?php echo form_close(); ?>
        </div>
    </div>
    <?php
endforeach;
?>

<!----PINJAM---->

<?php
foreach ($barang -> result_array () as $i) :
    $id = $i ['idbarang'];
    $nama = $i ['nama'];
    $harga = $i ['harga'];
    $jumlah = @$_POST['i_jumlah'];
    ?>
    <div class="modal fade" id="pinjambarang<?php echo $id; ?>"
        role="dialog">
        <div class="modal-dialog">
           <?php echo form_open_multipart(base_url('admin/katalog/insertinto/'. $id)); ?>
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"> Data Barang Pinjaman </h5>
                        <button type="button" class="close" data-dismiss="modal"> &times; </button>
                    </div>
                    
                    <div class="modal-body">
                    <div class="form-group">
                        <div class="row">
                            <label for = "title" class = "col-sm-2 control-label"> </label>
                            <div class="col-sm-10">
                               <input type="hidden" class="form-control" name="id" placeholder="" value=" <?php echo $id ; ?> ">
                            </div>
                        </div>
                    </div>

                     <div class="modal-body">
                    <div class="form-group">
                        <div class="row">
                            <label for = "title" class = "col-sm-2 control-label"> Barang's Name </label>
                            <div class="col-sm-10">
                               <input type="text" class="form-control" name="i_nama" placeholder="" value=" <?php echo $nama ; ?> ">
                            </div>
                        </div>
                    </div>

                <div class="form-group">
                    <div class="row">
                            <label for = "title" class = "col-sm-2 control-label"> barang's Price </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="i_harga" placeholder="" value="<?php echo $harga ; ?> ">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                        <div class="row">
                            <label for="title" class="col-sm-2 control-label"> jumlah dipinjam  </label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" name="i_jumlah" placeholder="" value="<?php echo $jumlah ; ?> ">
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss = "modal"> Cancel </button>
                        <button type="submit" class="btn btn-primary"> Pinjam </button>
                    </div>
                </div>
            <?php echo form_close(); ?>
        </div>
    </div>
    <?php
endforeach;
?>

<!----Delete---->
<?php
foreach ($barang->result_array () as $i ) :
    $id = $i ['idbarang'];
    $b = $i ['nama'];
    $c = $i ['merek'];
    $f = $i ['tipe'];
    $g = $i ['harga'];
    $h = $i ['jumlah'];
    ?>
    <div class="modal fade" id ="deletebarang<?php echo $id; ?>" role = "dialog">
        <div class="modal-dialog">
            <form class="form-horizontal" action="<?php echo base_url('index.php/admin/barang/delete/' .$id); ?>" method = "post">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"> Ready to Delete? </h5>
                        <button class="close" type="button" data-dismiss = "modal" aria-label ="Close">
                            <span aria-hidden ="true"> x </span>
                        </button>
                    </div>
                    <div class="modal-body"> Pilih "Delete" untuk menghapus barang dengan nama <?php echo $b ; ?> </div>
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

                    