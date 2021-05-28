<div class = "modal fade" id = "adddetailpemb" role = "dialog" >
	<div class = "modal-dialog" >
		<form class = "form" action = " <?php echo base_url ('/admin/detailpemb/add'); ?> "method = "post">
			<div class = "modal-content">

				<div class = "modal-header">
					<h5 class = "modal-idpenyewaan" > Add Detail Pembelian </h5>
					<button type = "button" class = "close" data-dismiss = "modal" > &times; </button>
				</div>

				<div class = "modal-body">
					<div class = "form-group">
						<div class = "row">
							<label for = "idpenyewaan" class = "col-sm-2 control-label" > ID Penyewaan </label>
							<div class = "col-sm-10">
								<input type = "text" class = "form-control" name = "i_idpenyewaan" placeholder="Mark Zurkerburg" required>
							</div>
						</div>
					</div>

					<div class = "form-group">
						<div class = "row" >
							<label for = "idpenyewaan" class = "col-sm-2 control-label" > ID Pembayaran </label>
							<div class = "col-sm-10">
								<input type = "text" class = "form-control" name = "i_idpembayaran" placeholder = "markzurkerburg" required>
							</div>
						</div>
					</div>

					<div class = "form-group">
						<div class = "row" >
							<label for = "idpenyewaan" class = "col-sm-2 control-label" > ID Promo </label>
							<div class = "col-sm-10">
								<input type = "text" class = "form-control" name = "i_release_year" placeholder = "-" required>
							</div>
						</div>
					</div>

					<div class = "form-group">
						<div class = "row" >
							<label for = "idpenyewaan" class = "col-sm-2 control-label" > Total Pembayaran </label>
							<div class = "col-sm-10">
								<input type = "text" class = "form-control" name = "i_totalpembayaran" placeholder = "-" required>
							</div>
						</div>
					</div>

					<div class = "form-group">
						<div class = "row" >
							<label for = "idpenyewaan" class = "col-sm-2 control-label" > Jumlah Sewa </label>
							<div class = "col-sm-10">
								<input type = "text" class = "form-control" name = "i_jumlahsewa" placeholder = "-" required>
							</div>
						</div>
					</div>
				</div>

				<div class = "modal-footer">
					<button type = "button" class = "btn btn-danger" data-dismiss = "modal" > Cancel </button>
					<button type = "submit" class ="btn btn-primary" > Add </button>
				</div>
			</div>
		</form>
	</div>
</div>

<?php
foreach ($detailpemb -> result_array () as $i ) :
	$id =$i ['iddetailpemb'];
	$idpenyewaan = $i ['idpenyewaan'];
	$idpembayaran = $i ['idpembayaran'];
	$idpromo = $i ['idpromo'];
	$totalpembayaran = $i ['totalpembayaran'];
	$jumlahsewa = $i ['jumlahsewa'];
	?>
	<div class = "modal fade" id ="editdetailpemb<?php echo $id; ?>"
		role="dialog">
		<div class = "modal-dialog">
			<form class = "form-horizontal" action= "<?php echo base_url ('admin/detailpemb/edit/' . $id ); ?>" method="post">
				<div class ="modal-content">
					<div class = "modal-header">
						<h5 class = "modal-idpenyewaan"> Edit detailpemb </h5>
						<button type = "button" class = "close" data-dismiss = "modal" > &times; </button>
					</div>

					<div class = "modal-body">
						<div class = "form-group">
							<div class = "row">
								<label for = "title" class = "col-sm-2 control-label" > ID Penyewaan </label>
								<div class ="col-sm-10">
									<input type ="number" class ="form-control" name = "i_idpenyewaan" placeholder = "Mark Zurkerburg" value ="<?php echo $idpenyewaan ; ?>">
								</div>
							</div>
						</div>
						<div class ="form-group">
							<div class ="row">
								<label for ="title" class = "col-sm-2-control-label"> ID Pembayaran</label>
								<div class ="col-sm-10">
									<input type ="number" class ="form-control" name = "i_idpembayaran" placeholder = "markzurkerburg@gmail.com" value ="<?php echo $idpembayaran ; ?>">
								</div>
							</div>
						</div>
						<div class ="form-group">
							<div class ="row">
								<label for ="title" class = "col-sm-2-control-label"> ID Promo</label>
								<div class ="col-sm-10">
									<input type ="number" class ="form-control" name = "i_idpromo" placeholder = "markzurkerburg@gmail.com" value ="<?php echo $idpromo ; ?>">
								</div>
							</div>
						</div>
						<div class ="form-group">
							<div class ="row">
								<label for ="title" class = "col-sm-2-control-label"> Total Pembayaran</label>
								<div class ="col-sm-10">
									<input type ="number" class ="form-control" name = "i_totalpembayaran" placeholder = "markzurkerburg@gmail.com" value ="<?php echo $totalpembayaran ; ?>">
								</div>
							</div>
						</div>
						<div class ="form-group">
							<div class ="row">
								<label for ="title" class = "col-sm-2-control-label"> Jumlah Sewa</label>
								<div class ="col-sm-10">
									<input type ="number" class ="form-control" name = "i_jumlahsewa" placeholder = "markzurkerburg@gmail.com" value ="<?php echo $jumlahsewa ; ?>">
								</div>
							</div>
						</div>

					<div class ="modal-footer">
						<button type = "button" class = "btn btn-danger" data-dismiss = "modal"> Cancel </button>
						<button type = "submit" class = "btn btn-primary" > Edit </button>
					</div>
				</div>
			</form>
		</div>
	</div>
	<?php
endforeach;
?>

<?php
foreach ($detailpemb ->result_array () as $i ) :
	$id = $i ['iddetailpemb' ];
	$b = $i ['idpenyewaan' ];
	$e = $i ['idpembayaran' ];
	$f = $i ['idpromo' ];
	$h = $i ['totalpembayaran' ];
	$i = $i ['jumlahsewa' ];

	?>
	<div class ="modal fade" id = "deletedetailpemb<?php echo $id; ?>" role = "dialog" >
		<div class ="modal-dialog" >
			<form class = "form-horizontal" action = "<?php echo base_url('index.php/admin/detailpemb/delete/' . $id); ?>" method ="post" >
				<div class ="modal-content">
					<div class = "modal-header">
						<h5 class = "modal-idpenyewaan" id ="exampleModalLabel" > Ready to Delete? </h5>
						<button class = "close" type ="button" data-dismiss = "modal" aria-label = "Close" >
							<span aria-hidden = "true" > x </span>
						</button>
					</div>
					<div class = "modal-body" > Pilih "Delete" untuk menghapus detailpemb dengan idpenyewaan <?php echo $b ; ?> </div>
					<div class = "modal-footer" >
						<button class = "btn btn-secondary" type = "button" data-dismiss = "modal" > Cancel </button>
						<button class = "submit" class = "btn btn-danger" > Delete </button>
					</div>
				</div>
			</form>
		</div>
	</div>
	<?php
endforeach ;
?>
}