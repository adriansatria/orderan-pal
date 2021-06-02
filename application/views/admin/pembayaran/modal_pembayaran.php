
<?php
foreach ($detailpemb -> result_array () as $i) :
    $id = $i ['iddetailpemb'];
    $total = $i ['totalpembayaran'];
    $jumlah = $i ['jumlahsewa'];
    $bayar = $i ['bayar'];
    $kembali = $i ['kembalian'];
    $tglpinjam = $i ['tanggalpeminjaman'];
    $tglkembali = $i ['tanggalpengembalian'];
	$ketdenda = @$_POST['keterangandenda'];
	$totaldenda = @$_POST['totaldenda'];

    ?>
<div class="modal fade" id="pengembalian<?php echo $id; ?>" role="dialog">
	<div class="modal-dialog">
		<?php echo form_open_multipart(base_url('admin/pembayaran/insertinto/'. $id)); ?>
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title"> Detail Transaksi Pembayaran </h5>
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
						<label for="title" class="col-md-5  control-label"> Total </label>
						<div class="col-md">
							<input type="hidden" class="form-control" name="i_total" value="<?php echo $total ; ?> " readonly>
                            <span>: <?php echo $total ; ?></span>
						</div>
					</div>
				</div>

				<div class="form-group">
					<div class="row">
						<label for="title" class="col-md-5  control-label"> Jumlah Sewa </label>
						<div class="col-md">
							<input type="hidden" class="form-control" name="i_jumlah" value="<?php echo $jumlah ; ?> " readonly>
                            <span>: <?php echo $jumlah ; ?></span>
						</div>
					</div>
				</div>

				<div class="form-group">
					<div class="row">
						<label for="title" class="col-md-5  control-label"> Uang bayar </label>
						<div class="col-md">
							<input type="hidden" class="form-control" name="i_bayar" value="<?php echo $bayar ; ?> " readonly>
                            <span>: <?php echo $bayar ; ?></span>
						</div>
					</div>
				</div>

                <div class="form-group">
					<div class="row">
						<label for="title" class="col-md-5  control-label"> kembalian </label>
						<div class="col-md">
							<input type="hidden" class="form-control" name="i_kembali" value="<?php echo $kembali ; ?> " readonly>
                            <span>: <?php echo $kembali ; ?></span>
						</div>
					</div>
				</div>

                <div class="form-group">
					<div class="row">
						<label for="title" class="col-md-5  control-label"> Tanggal Pinjam </label>
						<div class="col-md">
							<input type="hidden" class="form-control" name="i_pinjam" value="<?php echo $tglpinjam ; ?> " readonly>
                            <span>: <?php echo $tglpinjam ; ?></span>
						</div>
					</div>
				</div>

                <div class="form-group">
					<div class="row">
						<label for="title" class="col-md-5 control-label"> Tanggal Pengembalian </label>
						<div class="col-md">
							<input type="hidden" class="form-control" name="i_pengembali" value="<?php echo $tglkembali ; ?> " readonly>
                            <span>: <?php echo $tglkembali ; ?></span>
						</div>
					</div>
				</div>

				<div class="form-group">
					<div class="row">
						<label for="title" class="col-md-5 control-label"> Keterangan Denda </label>
						<div class="col-md">
							<textarea type="text" placeholder="Jika tidak ada isi dengan ' - '" class="form-control" name="i_ketdenda"></textarea>
						</div>
					</div>
				</div>

				<div class="form-group">
					<div class="row">
						<label for="title" class="col-md-5 control-label"> Total denda </label>
						<div class="col-md">
							<input type="text" value="0" class="form-control" name="i_totaldenda">
						</div>
					</div>
				</div>

				<div class="modal-footer">
					<button type="button" class="btn btn-danger" data-dismiss="modal"> Cancel </button>
					<button type="submit" class="btn btn-primary"> Kembalikan </button>
				</div>
			</div>
		</div>
		<?php echo form_close(); ?>
	</div>
</div>
<?php
endforeach;
?>