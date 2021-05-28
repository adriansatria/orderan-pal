<div class="modal fade" id="addUser" role="dialog">
    <div class="modal-dialog">
        <form class="form" action="<?php echo base_url('/admin/user/add'); ?>" method="post">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">Add User</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">
                    <div class="form-group">
                        <div class="row">
                            <label for="title" class="col-sm-2 control-label">Username</label>
                            <div class="col-sm-10">
                                <input type="text" class=form-control name="i_username" placeholder="" required>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <label for="title" class="col-sm-2 control-label">Password</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="i_password" placeholder="" required>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-body">
                    <div class="form-group">
                        <div class="row">
                            <label for="title" class="col-sm-2 control-label">Role</label>
                            <div class="col-sm-10">
                                <input type="text" class=form-control name="i_role" placeholder="" required>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </div>
        </form>
    </div>
</div>

<?php
foreach ($user->result_array() as $i) :
    $id = $i['iduser'];
    $username = $i['username'];
    $password = $i['password'];
    $role = $i['role'];

?>

    <div class="modal fade" id="editUser<?php echo $id; ?>" role="dialog">
        <div class="modal-dialog">
            <form class="form" action="<?php echo base_url('/admin/user/edit/' . $id); ?>" method="post">
                <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">Edit User</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">
                    <div class="form-group">
                        <div class="row">
                            <label for="title" class="col-sm-2 control-label">Username</label>
                            <div class="col-sm-10">
                                <input type="text" class=form-control name="i_username" placeholder="Nikon DSLR D5600 Kit 18-55mm VR" required>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <label for="title" class="col-sm-2 control-label">Password</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="i_password" placeholder="DSLR" required>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-body">
                    <div class="form-group">
                        <div class="row">
                            <label for="title" class="col-sm-2 control-label">Role</label>
                            <div class="col-sm-10">
                                <input type="text" class=form-control name="i_role" placeholder="Nikkon" required>
                            </div>
                        </div>
                    </div>
                </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Edit</button>
                    </div>

                </div>
            </form>
        </div>
    </div>
<?php
endforeach;
?>

<?php
foreach ($user->result_array() as $i) :
    $id = $i['iduser'];
    $username = $i['username'];
    $password = $i['password'];
    $role = $i['role'];

?>
    <div class="modal fade" id="deleteUser<?php echo $id; ?>" role="dialog">
    <div class="modal-dialog">
        <form class="form" action="<?php echo base_url('/admin/user/delete/' . $id); ?>" method="post">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Delete?</h5>
                    <button type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">x</span>
                    </button>
                </div>

                <div class="modal-body">Pilih "Delete" untuk menghapus author dengan nama <?php echo $username; ?> </div>

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