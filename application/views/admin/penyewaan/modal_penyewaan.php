<div class="modal fade" id="show_barang" role="dialog">
	<div class="modal-dialog modal-lg">
		<form class="form-horizontal" action="" method="post">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Pilih Barang</h5>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<div class="modal-body">
					<div div class="table-responsive">
						<table class="table table-bordered display" id="dataTable" width="100%" cellspacing="0">
							<thead>
								<tr>
									<th>ID</th>
									<th>Nama Barang</th>
									<th>Price</th>
									<th>Qty</th>
									<th>Total</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php
								foreach ($barang->result_array() as $i):
									$id = $i['idbarang'];
									$nama = $i['nama'];
									$price = $i['prices'];
									$quantity = $i['quantity'];
									?>
									<tr>
										<td><?php echo $id; ?></td>
										<td><?php echo $nama; ?></td>
										<?php
										$temp = "";
										foreach ($barang1->result_array() as $i):
											$id1 = $i['idbarang'];
											$nama = $i['fullname'];
											if ($id == $id1) {
												if ($temp != "") {
													$temp = $temp . ',&nbsp' . $author;
												} else {
													$temp = $author;
												}
											}
										endforeach;
										?>
										<td> <?php echo $temp; ?></td>
										<?php
										$temp = "";
										foreach ($book2->result_array() as $i):
											$id1 = $i['book_id'];
											$book_category = $i['name']
											;
											if ($id == $id1) {
												if ($temp != "") {
													$temp = $temp . ',&nbsp' . $book_category;
												} else {
													$temp = $book_category;
												}
											}
										endforeach;
										?>
										<td><?php echo $temp; ?></td>
										<td>
											<input type="number" name="quantity" id="<?php echo $id; ?>" value="1" class="form-control" style="width: 65px;">
										</td>
										<td>
											<div style="width: 78px;">
												<button class="add_cart btn btn-success btn-block" data-productid="<?php echo $id; ?>" data-productname="<?php echo $title; ?>" data-productprice="<?php echo $price; ?>" data-productdiscount="<?php echo $discount; ?>">
													<i class="fa fa-cart-plus"></i> Add
												</button>
											</div>
										</td>
									</tr>
								<?php endforeach; ?>

							</tbody>
						</table>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>
<!-- Modal Search Customer-->
<div class="modal fade" id="showCustomer" role="dialog">
	<div class="modal-dialog modal-lg">
		<form class="form-horizontal" action="" method="post">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Pilih Customer</h5>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<div class="modal-body">
					<div div class="table-responsive">
						<table class="table table-bordered display" id="table" width="100%" cellspacing="0">
							<thead>
								<tr>
									<th width="25%">No.Member</th>
									<td style="display:none;">id</td>
									<th width="30%">Name</th>
									<th width="25%">Phone</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$x = 1;
								foreach ($customer->result_array() as $i):
									$id = $i['customer_id'];
									$name = $i['name'];
									$phone = $i['phone'];
									$no_member = $i['no_member'];
									?>
									<tr>
										<td><?php echo $no_member; ?></td>
											<td style="display:none;"><?php echo $id; ?></td>
											<td><?php echo $name; ?></td>
											<td> <?php echo $phone; ?></td
												>
											</tr>
											<?php
											$x++;
										endforeach; ?>

									</tbody>
								</table>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
<!-- End Modal Search Customer-->