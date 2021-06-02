<h1>Halo</h1>

<?php
foreach ($pengembalian->result_array () as $i ) :
    $id = $i ['idpengembalian'];
    ?>
<div class="modal fade" id="deletebarang<?php echo $id; ?>" role="dialog">
	<div class="modal-dialog">
		<form class="form-horizontal" action="<?php echo base_url('index.php/admin/pengembalian/delete/' .$id); ?>"
			method="post">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel"> Ready to Delete? </h5>
					<button class="close" type="button" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true"> x </span>
					</button>
				</div>
				<div class="modal-body"> Pilih "Delete" untuk menghapus data ini </div>
				<div class="modal-footer">
					<button class="btn btn-secondary" type="button" data-dismiss="modal"> Cancel </button>
					<button type="submit" class="btn btn-danger"> Delete</button>
				</div>
			</div>
		</form>
	</div>
</div>
<?php
endforeach;
?>
