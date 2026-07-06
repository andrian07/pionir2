<?php 
define('DOC_ROOT_PATH', $_SERVER['DOCUMENT_ROOT'].'/');
require DOC_ROOT_PATH . $this->config->item('header');
?>
</div>

<style>
  .transfer-page-wrap { padding: 20px 24px; }
  .transfer-section {
    background: #fff;
    border-radius: 16px;
    border: 1px solid #e8edf3;
    box-shadow: 0 2px 12px rgba(0,0,0,0.06);
    margin-bottom: 20px;
    overflow: hidden;
  }
  .transfer-section-header {
    display: flex;
    align-items: center;
    gap: 10px;
    padding: 14px 22px;
    border-bottom: 1px solid #f0f4f8;
    background: #f8fafc;
  }
  .transfer-section-header .section-icon {
    width: 34px;
    height: 34px;
    border-radius: 9px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 0.85rem;
    flex-shrink: 0;
  }
  .transfer-section-header h6 {
    font-size: 0.82rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.7px;
    color: #64748b;
    margin: 0;
  }
  .transfer-section-body { padding: 20px 22px; }
  .transfer-field-label {
    font-size: 0.8rem;
    font-weight: 600;
    color: #6b7280;
    margin-bottom: 5px;
    display: flex;
    align-items: center;
    gap: 5px;
  }
  .transfer-field-label i { font-size: 0.72rem; color: #9ca3af; }
  .transfer-section-body .form-control,
  .transfer-section-body .select2-container--default .select2-selection--single {
    border-radius: 9px !important;
    border-color: #dce3ec;
    font-size: 0.88rem;
    background: #fafbfc;
  }
  .transfer-section-body .form-control[readonly] {
    background: #f1f5f9;
    color: #64748b;
  }
  .transfer-page-header {
    background: linear-gradient(135deg, #7c2d12 0%, #f59e0b 100%);
    border-radius: 16px;
    padding: 20px 26px;
    margin-bottom: 20px;
    margin-top: 76px;
    box-shadow: 0 6px 24px rgba(124,45,18,0.16);
    display: flex;
    align-items: center;
    gap: 14px;
  }
  .transfer-page-header .header-icon {
    width: 46px;
    height: 46px;
    border-radius: 12px;
    background: rgba(255,255,255,0.16);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.2rem;
    color: #fff;
    flex-shrink: 0;
  }
  .transfer-page-header h5 { color:#fff; font-weight:700; margin:0; font-size:1.1rem; }
  .transfer-page-header small { color: rgba(255,255,255,0.68); font-size:0.8rem; }
  .transfer-btn-add {
    width: 42px;
    height: 38px;
    border-radius: 10px;
    background: linear-gradient(135deg, #b45309, #f59e0b);
    border: none;
    color: #fff;
    font-size: 1rem;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
    box-shadow: 0 3px 10px rgba(245,158,11,0.24);
    transition: transform 0.15s, box-shadow 0.15s;
  }
  .transfer-btn-add:hover {
    transform: translateY(-1px);
    box-shadow: 0 5px 14px rgba(245,158,11,0.32);
  }
  .transfer-summary-card {
    background: #fff7ed;
    border-radius: 12px;
    border: 1px solid #fed7aa;
    padding: 16px 20px;
  }
  .transfer-summary-row {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 8px 0;
    border-bottom: 1px solid #ffedd5;
    font-size: 0.88rem;
  }
  .transfer-summary-row:last-child { border-bottom: none; }
  .transfer-summary-row .s-label { font-weight: 600; color: #6b7280; }
  .transfer-summary-row .s-input { width: 180px; }
  .transfer-divider {
    border: none;
    border-top: 1px dashed #e5ebf2;
    margin: 16px 0;
  }
  @media (max-width: 768px) { .transfer-page-wrap { padding: 14px 12px; } }
</style>

<div class="container-fluid">
	<div class="transfer-page-wrap">
		<div class="transfer-page-header">
			<div class="header-icon"><i class="fas fa-exchange-alt"></i></div>
			<div>
				<h5>Tambah Transfer Stok</h5>
				<small>Kelola perpindahan stok antar gudang dengan tampilan yang lebih terstruktur</small>
			</div>
		</div>

		<div class="row mb-4">
			<div class="col-md-4 mb-3 mb-md-0 d-flex">
				<div class="transfer-section mb-0 flex-fill">
					<div class="transfer-section-header">
						<div class="section-icon" style="background:#ffedd5; color:#c2410c;"><i class="fas fa-file-alt"></i></div>
						<h6>Informasi Dokumen</h6>
					</div>
					<div class="transfer-section-body">
						<div class="mb-3">
							<div class="transfer-field-label"><i class="fas fa-hashtag"></i> Kode Transfer</div>
							<input id="transfer_stock_code" name="transfer_stock_code" type="text" class="form-control" value="AUTO" readonly="">
						</div>
						<div class="mb-0">
							<div class="transfer-field-label"><i class="fas fa-calendar-day"></i> Tanggal</div>
							<input id="transfer_stock_date" name="transfer_stock_date" type="date" class="form-control" value="<?php echo date('Y-m-d'); ?>" readonly>
						</div>
					</div>
				</div>
			</div>

			<div class="col-md-4 mb-3 mb-md-0 d-flex" style="padding-left:10px; padding-right:10px;">
				<div class="transfer-section mb-0 flex-fill">
					<div class="transfer-section-header">
						<div class="section-icon" style="background:#ede9fe; color:#7c3aed;"><i class="fas fa-warehouse"></i></div>
						<h6>Gudang &amp; Pengguna</h6>
					</div>
					<div class="transfer-section-body">
						<div class="mb-3">
							<div class="transfer-field-label"><i class="fas fa-signature"></i> Inisial</div>
							<input id="transfer_stock_inisial" name="transfer_stock_inisial" type="text" class="form-control">
						</div>
						<div class="mb-0">
							<div class="transfer-field-label"><i class="fas fa-user"></i> User</div>
							<input id="transfer_stock_user" name="transfer_stock_user" type="text" class="form-control" value="<?php echo $_SESSION['user_name']; ?>" readonly>
						</div>
					</div>
				</div>
			</div>

			<div class="col-md-4 d-flex">
				<div class="transfer-section mb-0 flex-fill">
					<div class="transfer-section-header">
						<div class="section-icon" style="background:#fef3c7; color:#d97706;"><i class="fas fa-info-circle"></i></div>
						<h6>Informasi Transfer</h6>
					</div>
					<div class="transfer-section-body">
						<div class="text-muted small">Pilih produk, gudang asal dan tujuan, lalu tambahkan item transfer untuk mencatat perpindahan stok secara rapi.</div>
					</div>
				</div>
			</div>
		</div>

		<div class="transfer-section">
			<div class="transfer-section-header">
				<div class="section-icon" style="background:#ede9fe; color:#7c3aed;"><i class="fas fa-boxes"></i></div>
				<h6>Input Item Transfer</h6>
			</div>
			<div class="transfer-section-body">
				<form id="formaddtemp">
					<div class="row mb-3">
						<div class="col-md-4 mb-2">
							<div class="transfer-field-label"><i class="fas fa-box"></i> Produk</div>
							<input id="product_name" name="product_name" type="text" class="form-control ui-autocomplete-input" placeholder="Ketikkan Nama Produk" value="" required="" autocomplete="off" data-parsley-required data-parsley-required-message="*Masukan Nama Produk">
							<input id="product_id" type="hidden" name="product_id">
						</div>
						<div class="col-md-2 mb-2">
							<div class="transfer-field-label"><i class="fas fa-warehouse"></i> Dari</div>
							<select class="form-control input-full js-example-basic-single" id="transfer_from" name="transfer_from">
								<option value="">-- Pilih Gudang --</option>
								<?php foreach ($data['warehouse_list'] as $row) { ?>
									<option value="<?php echo $row->warehouse_id; ?>"><?php echo $row->warehouse_name; ?></option>
								<?php } ?>
							</select>
						</div>
						<div class="col-md-2 mb-2">
							<div class="transfer-field-label"><i class="fas fa-warehouse"></i> Tujuan</div>
							<select class="form-control input-full js-example-basic-single" id="transfer_to" name="transfer_to">
								<option value="">-- Pilih Gudang --</option>
								<?php foreach ($data['warehouse_list'] as $row) { ?>
									<option value="<?php echo $row->warehouse_id; ?>"><?php echo $row->warehouse_name; ?></option>
								<?php } ?>
							</select>
						</div>
						<div class="col-md-2 mb-2">
							<div class="transfer-field-label"><i class="fas fa-sort-numeric-up"></i> Qty</div>
							<input id="temp_qty" name="temp_qty" type="text" class="form-control text-right" value="0" required="">
						</div>
						<div class="col-md-2 mb-2">
							<div class="transfer-field-label"><i class="fas fa-boxes"></i> Stok Gudang Dari</div>
							<input id="temp_stock_from" name="temp_stock_from" type="text" class="form-control text-right" value="0" required="" readonly>
						</div>
					</div>

					<hr class="transfer-divider">

					<div class="row mb-3">
						<div class="col-md-8 mb-2">
							<div class="transfer-field-label"><i class="fas fa-sticky-note"></i> Catatan</div>
							<input id="temp_note" name="temp_note" type="text" class="form-control text-left">
						</div>
						<div class="col-md-1 d-flex align-items-end justify-content-end">
							<button id="btnadd_temp" type="button" class="transfer-btn-add btn-add-temp" title="Tambah Item Transfer" style="margin-bottom: 8px;">
								<i class="fas fa-plus"></i>
							</button>
						</div>
					</div>
				</form>

				<hr class="transfer-divider" style="margin-top:20px;">

				<div class="table-responsive">
					<table id="temp-transfer-stock-list" class="display table table-striped table-hover">
						<thead>
							<tr>
								<th>SKU</th>
								<th>produk</th>
								<th>Satuan</th>
								<th>Qty</th>
								<th>Dari</th>
								<th>Ke</th>
								<th>Stok Akhir dari</th>
								<th>Stok Akhir ke</th>
								<th>Catatan</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody></tbody>
					</table>
				</div>
			</div>
		</div>

		<div class="transfer-section">
			<div class="transfer-section-header">
				<div class="section-icon" style="background:#fef3c7; color:#d97706;"><i class="fas fa-receipt"></i></div>
				<h6>Catatan &amp; Ringkasan</h6>
			</div>
			<div class="transfer-section-body">
				<div class="row">
					<div class="col-lg-6 mb-3">
						<div class="transfer-field-label"><i class="fas fa-sticky-note"></i> Catatan Transfer</div>
						<textarea id="transfer_stock_remark" name="transfer_stock_remark" class="form-control" placeholder="Catatan untuk transfer stok ini..." maxlength="500" rows="8" style="border-radius:9px; resize:none;"></textarea>
					</div>
					<div class="col-lg-6">
						<div class="transfer-summary-card" style="height: 170px; margin-top: 24px;">
							<div class="transfer-summary-row">
								<span class="s-label">Total Item</span>
								<input id="footer_total" name="footer_total" type="text" class="form-control text-right s-input" value="0" readonly="" style="border-radius:8px; font-size:0.88rem;">
							</div>
							<div class="d-flex justify-content-end gap-2 mt-4">
								<button id="btncancel" class="btn btn-danger" style="border-radius:9px; font-weight:600; padding:8px 22px;"><i class="fas fa-times-circle mr-1"></i> Batal</button>
								<button id="btnsave" class="btn btn-success button-header-custom-save" style="border-radius:9px; font-weight:600; padding:8px 22px;"><i class="fas fa-save mr-1"></i> Simpan Transfer</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php 
require DOC_ROOT_PATH . $this->config->item('footer');
?>

<script>



	$('#purchase_warehouse').prop('disabled', true);



	$(document).ready(function() {
		temp_retur_purchase_table();
	});

	$('#product_name').autocomplete({ 
		minLength: 2,
		source: function(req, add) {
			$.ajax({
				url: '<?php echo base_url(); ?>/Transferstock/search_product',
				dataType: 'json',
				type: 'GET',
				data: req,
				success: function(res) {
					if (res.success == true) {
						add(res.data);
					}else{
						Swal.fire({
							icon: 'error',
							title: 'Oops...',
							text: res.message,
						})
					}
				},
			});
		},
		select: function(event, ui) {
			let id = ui.item.id;
			$("#product_id").val(id);
		},
	});

	$('#btnadd_temp').click(function(e){
		e.preventDefault();
		var product_id           = $("#product_id").val();
		var transfer_from        = $("#transfer_from").val();
		var transfer_to          = $("#transfer_to").val();
		var qty                  = $("#temp_qty").val();
		var temp_note            = $("#temp_note").val();

		if($('#formaddtemp').parsley().validate({force: true})){
			$.ajax({
				type: "POST",
				url: "<?php echo base_url(); ?>Transferstock/add_temp_transferstock",
				dataType: "json",
				data: {product_id:product_id, transfer_from:transfer_from, transfer_to:transfer_to, qty:qty, temp_note:temp_note},
				success : function(data){
					if (data.code == "200"){
						let title = 'Tambah Data';
						let message = 'Data Berhasil Di Tambah';
						let state = 'info';
						notif_success(title, message, state);
						$('#temp-transfer-stock-list').DataTable().ajax.reload();
						check_tempt_data();
						clear_input();
					} else {
						Swal.fire({
							icon: 'error',
							title: 'Oops...',
							text: data.result,
						})
					}
				}
			});
		}
	});

	function check_tempt_data()
	{
		$.ajax({
			type: "POST",
			url: "<?php echo base_url(); ?>Transferstock/check_temp_transfer_stock",
			dataType: "json",
			data: {},
			success : function(data){
				if (data.code == "200"){
					let row = data.data[0];
					$('#footer_total').val(row.total);
				}
			}
		});
	}

	function clear_input()
	{
		$("#product_name").val("");
		$("#product_id").val("");
		$("#transfer_from").val("");
		$('#transfer_from').trigger('change');
		$("#transfer_to").val("");
		$('#transfer_to').trigger('change');
		$("#temp_note").val("");
		$('#temp_qty').val("0");
	}

	function edit_temp(product_id, user_id)
	{
		$.ajax({
			type: "POST",
			url: "<?php echo base_url(); ?>Transferstock/get_edit_temp_transfer_stock",
			dataType: "json",
			data: {product_id:product_id, user_id:user_id},
			success : function(data){
				if (data.code == "200"){
					let row = data.result[0];
					$("#product_name").val(row.product_name);
					$("#product_id").val(row.temp_transfer_stock_product_id);
					$('#transfer_from').val(row.temp_transfer_stock_warehouse_from);
					$('#transfer_from').trigger('change');
					$('#transfer_to').val(row.temp_transfer_stock_warehouse_to);
					$('#transfer_to').trigger('change');
					$('#temp_qty').val(row.temp_transfer_stock_qty);
					$('#temp_note').val(row.temp_transfer_stock_note);
				}
			}
		});
	}

	function temp_retur_purchase_table(){
		$('#temp-transfer-stock-list').DataTable( {
			serverSide: true,
			search: true,
			processing: true,
			ordering: false,
			retrieve: true,
			ajax: {
				url: '<?php echo base_url(); ?>Transferstock/temp_transfer_stock_list',
				type: 'POST',
				data:  {},
			},
			columns: 
			[
			{data: 0},
			{data: 1},
			{data: 2},
			{data: 3},
			{data: 4},
			{data: 5},
			{data: 6},
			{data: 7},
			{data: 8},
			{data: 9}
			]
		});
		check_tempt_data();
	}

	function deletes(product_id, user_id)
	{
		Swal.fire({
			title: 'Konfirmasi?',
			text: "Apakah Anda Yakin Menghapus Data ?",
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Hapus'
		}).then((result) => {
			if (result.isConfirmed) {
				$.ajax({
					type: "POST",
					url: "<?php echo base_url(); ?>Transferstock/delete_temp_transfer_stock",
					dataType: "json",
					data: {product_id:product_id},
					success : function(data){
						if (data.code == "200"){
							let title = 'Hapus Data';
							let message = 'Data Berhasil Di Hapus';
							let state = 'danger';
							notif_success(title, message, state);
							check_tempt_data();
							$('#temp-transfer-stock-list').DataTable().ajax.reload();
						} else {
							Swal.fire({
								icon: 'error',
								title: 'Oops...',
								text: data.result,
							})
						}
					}
				});
			}
		})
	}

	$('#btnsave').click(function(e){
		e.preventDefault();
		var footer_total                  = $("#footer_total").val();
		var transfer_stock_date           = $("#transfer_stock_date").val();
		var transfer_stock_remark         = $("#transfer_stock_remark").val();
		var transfer_stock_inisial        = $("#transfer_stock_inisial").val();
		$.ajax({
			type: "POST",
			url: "<?php echo base_url(); ?>Transferstock/save_transfer_stock",
			dataType: "json",
			data: {footer_total:footer_total, transfer_stock_remark:transfer_stock_remark, transfer_stock_date:transfer_stock_date, transfer_stock_inisial:transfer_stock_inisial},
			success : function(data){
				if (data.code == "200"){
					window.location.href = "<?php echo base_url(); ?>/Transferstock";
				} else {
					Swal.fire({
						icon: 'error',
						title: 'Oops...',
						text: data.result,
					})
				}
			}
		});
	});


	$('#transfer_from').on('change', function() {
	var product_name = $('#product_name').val();
    var product_id = $('#product_id').val();
			var transfer_from = $(this).val();
			$.ajax({
				type: "POST",
				url: "<?php echo base_url(); ?>Transferstock/get_stock_from_warehouse",
				dataType: "json",
				data: {product_id:product_id, warehouse_id:transfer_from},
				success : function(data){
					if (data.code == "200"){
						$('#temp_stock_from').val(data.result);
					}
				}
			});
	});

</script>