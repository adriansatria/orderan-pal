<!-- CREATE -->
<div class="modal fade" id="addpromo" role="dialog">
    <div class="modal-dialog">
        <form class="form" action="<?php echo base_url('/admin/promo/add'); ?>" method="post">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">Add promo</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                </div>

                <div class="modal-body">
                    <div class="form-group">
                        <div class="row">
                            <label for = "title" class = "col-sm-2 control-label"> Promo's Price </label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" name="i_harga" placeholder="" required>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <label for="title" class="col-sm-2 control-label"> Promo's Name </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="i_nama" placeholder="" required>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <label for="title" class="col-sm-2 control-label"> Promo's Type </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="i_jenis" placeholder="" required>
                            </div>
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
foreach ($promo -> result_array () as $i) :
    $id = $i ['idpromo'];
    $harga = $i ['harga'];
    $nama = $i ['nama'];
    $jenis = $i ['jenis'];
    ?>
    <div class="modal fade" id="editpromo<?php echo $id; ?>"
        role="dialog">
        <div class="modal-dialog">
            <form class="form-horizontal" action="<?php echo base_url ('admin/promo/edit/' . $id); ?> "method = "post" >
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"> Edit promo </h5>
                        <button type="button" class="close" data-dismiss="modal"> &times; </button>
                    </div>

                    <div class="modal-body">
                        <div class="form-group">
                            <div class="row">
                                <label for="title" class="col-sm-2 control-label"> Promo's Price </label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" name="i_harga" placeholder="" value=" <?php echo $harga ; ?> ">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <label for="title" class="col-sm-2 control-label"> Promo's Name </label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="i_nama" placeholder="" value="<?php echo $nama ; ?> ">
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div class="row">
                                <label for="title" class="col-sm-2 control-label"> Promo's Type </label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="i_jenis" placeholder="" value="<?php echo $jenis ; ?> ">
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
foreach ($promo->result_array () as $i ) :
    $id = $i ['idpromo'];
    $b = $i ['harga'];
    $c = $i ['nama'];
    $f = $i ['jenis'];
    ?>
    <div class="modal fade" id ="deletepromo<?php echo $id; ?>" role = "dialog">
        <div class="modal-dialog">
            <form class="form-horizontal" action="<?php echo base_url('index.php/admin/promo/delete/' .$id); ?>" method = "post">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"> Ready to Delete? </h5>
                        <button class="close" type="button" data-dismiss = "modal" aria-label ="Close">
                            <span aria-hidden ="true"> x </span>
                        </button>
                    </div>
                    <div class="modal-body"> Pilih "Delete" untuk menghapus promo dengan nama <?php echo $b ; ?> </div>
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