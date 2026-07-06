<?php 
define('DOC_ROOT_PATH', $_SERVER['DOCUMENT_ROOT'].'/');
require DOC_ROOT_PATH . $this->config->item('header');
?>
<style>
  .po-page-wrap { padding: 20px 24px; }
  .po-section { background: #fff; border-radius: 16px; border: 1px solid #e8edf3; box-shadow: 0 2px 12px rgba(0,0,0,0.06); margin-bottom: 20px; overflow: hidden; }
  .po-section-header { display: flex; align-items: center; gap: 10px; padding: 14px 22px; border-bottom: 1px solid #f0f4f8; background: #f8fafc; }
  .po-section-header .section-icon { width: 34px; height: 34px; border-radius: 9px; display: flex; align-items: center; justify-content: center; font-size: 0.85rem; flex-shrink: 0; }
  .po-section-header h6 { font-size: 0.82rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.7px; color: #64748b; margin: 0; }
  .po-section-body { padding: 20px 22px; }
  .field-label { font-size: 0.8rem; font-weight: 600; color: #6b7280; margin-bottom: 5px; display: flex; align-items: center; gap: 5px; }
  .field-label i { font-size: 0.72rem; color: #9ca3af; }
  .po-section-body .form-control, .po-section-body .select2-container--default .select2-selection--single { border-radius: 9px !important; border-color: #dce3ec; font-size: 0.88rem; background: #fafbfc; }
  .po-section-body .form-control[readonly] { background: #f1f5f9; color: #64748b; }
  .po-section-body .select2-container--default .select2-selection--single { height: 38px; }
  .po-section-body .select2-container--default .select2-selection--single .select2-selection__rendered { line-height: 36px; color: #374151; font-size: 0.88rem; }
  .po-section-body .select2-container--default .select2-selection--single .select2-selection__arrow { height: 36px; }
  .po-page-header { background: linear-gradient(135deg, #1e3a5f 0%, #2d6a9f 100%); border-radius: 16px; padding: 20px 26px; margin-bottom: 20px; margin-top: 76px; box-shadow: 0 6px 24px rgba(30,58,95,0.15); display: flex; align-items: center; gap: 14px; }
  .po-page-header .header-icon { width: 46px; height: 46px; border-radius: 12px; background: rgba(255,255,255,0.15); display: flex; align-items: center; justify-content: center; font-size: 1.2rem; color: #fff; flex-shrink: 0; }
  .po-page-header h5 { color:#fff; font-weight:700; margin:0; font-size:1.1rem; }
  .po-page-header small { color: rgba(255,255,255,0.65); font-size:0.8rem; }
  .item-row-note { display: grid; grid-template-columns: 1fr auto; gap: 12px; align-items: end; }
  .btn-add-item { width: 42px; height: 38px; border-radius: 10px; background: linear-gradient(135deg, #2d6a9f, #1e3a5f); border: none; color: #fff; font-size: 1rem; display: flex; align-items: center; justify-content: center; flex-shrink: 0; box-shadow: 0 3px 10px rgba(45,106,159,0.3); transition: transform 0.15s, box-shadow 0.15s; }
  .btn-add-item:hover { transform: translateY(-1px); box-shadow: 0 5px 14px rgba(45,106,159,0.4); }
  .section-divider { border: none; border-top: 1px dashed #e5ebf2; margin: 16px 0; }
  .summary-row { display: flex; align-items: center; justify-content: space-between; padding: 8px 0; border-bottom: 1px solid #f1f5f9; font-size: 0.88rem; }
  .summary-row:last-child { border-bottom: none; }
  .summary-row .s-label { font-weight: 600; color: #6b7280; }
  .summary-row .s-input { width: 180px; }
  .summary-row.grand .s-label { color: #1e293b; font-size: 0.95rem; font-weight: 700; }
</style>
</div>

<div class="container-fluid">
  <div class="po-page-wrap">

    <div class="po-page-header">
      <div class="header-icon"><i class="fas fa-boxes"></i></div>
      <div><h5>Input Stock</h5><small>Penerimaan barang dari Purchase Order</small></div>
    </div>

    <!-- HEADER SECTIONS -->
    <div class="row mb-4">
      <div class="col-md-3 mb-3 mb-md-0 d-flex">
        <div class="po-section mb-0 flex-fill">
          <div class="po-section-header">
            <div class="section-icon" style="background:#e0f2fe;color:#0369a1;"><i class="fas fa-file-alt"></i></div>
            <h6>Informasi Dokumen</h6>
          </div>
          <div class="po-section-body">
            <div class="mb-3">
              <div class="field-label"><i class="fas fa-hashtag"></i> No Invoice</div>
              <input id="hd_input_stock_invoice" name="hd_input_stock_invoice" type="text" class="form-control" value="AUTO" readonly="">
            </div>
            <div class="mb-3">
              <div class="field-label"><i class="fas fa-calendar-day"></i> Tanggal</div>
              <input id="warehouseinput_date" name="warehouseinput_date" type="date" class="form-control" value="<?php echo date('Y-m-d'); ?>" readonly="">
            </div>
            <div class="mb-0">
              <div class="field-label"><i class="fas fa-user"></i> User</div>
              <input id="po_user_id" name="po_user_id" type="text" class="form-control" value="<?php echo $_SESSION['user_name']; ?>" readonly="">
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-5 mb-3 mb-md-0 d-flex" style="padding-left:10px;padding-right:10px;">
        <div class="po-section mb-0 flex-fill">
          <div class="po-section-header">
            <div class="section-icon" style="background:#fef3c7;color:#d97706;"><i class="fas fa-truck"></i></div>
            <h6>Supplier &amp; PO</h6>
          </div>
          <div class="po-section-body">
            <div class="mb-3">
              <div class="field-label"><i class="fas fa-file-invoice"></i> No PO</div>
              <input id="po_inv" name="po_inv" type="text" class="form-control ui-autocomplete-input" placeholder="Pilih No PO">
              <input id="po_inv_id" name="po_inv_id" type="hidden">
            </div>
            <div class="mb-0">
              <div class="field-label"><i class="fas fa-building"></i> Supplier</div>
              <select class="form-control js-example-basic-single" id="supplier" name="supplier">
                <option value="">-- Pilih Supplier --</option>
                <?php foreach ($data['supplier_list'] as $row) { ?>
                  <option value="<?php echo $row->supplier_id; ?>"><?php echo $row->supplier_name; ?></option>
                <?php } ?>
              </select>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-4 d-flex">
        <div class="po-section mb-0 flex-fill">
          <div class="po-section-header">
            <div class="section-icon" style="background:#dcfce7;color:#16a34a;"><i class="fas fa-warehouse"></i></div>
            <h6>Logistik</h6>
          </div>
          <div class="po-section-body">
            <div class="mb-3">
              <div class="field-label"><i class="fas fa-warehouse"></i> Gudang</div>
              <select class="form-control js-example-basic-single" id="warehouse" name="warehouse">
                <option value="">-- Pilih Gudang --</option>
                <?php foreach ($data['warehouse_list'] as $row) { ?>
                  <option value="<?php echo $row->warehouse_id; ?>"><?php echo $row->warehouse_name; ?></option>
                <?php } ?>
              </select>
            </div>
            <div class="mb-0">
              <div class="field-label"><i class="fas fa-shipping-fast"></i> Ekspedisi</div>
              <select class="form-control js-example-basic-single" id="ekspedisi" name="ekspedisi">
                <option value="">-- Pilih Ekspedisi --</option>
                <?php foreach ($data['ekspedisi_list'] as $row) { ?>
                  <option value="<?php echo $row->ekspedisi_id; ?>"><?php echo $row->ekspedisi_name; ?></option>
                <?php } ?>
              </select>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- INPUT ITEM -->
    <div class="po-section">
      <div class="po-section-header">
        <div class="section-icon" style="background:#ede9fe;color:#7c3aed;"><i class="fas fa-boxes"></i></div>
        <h6>Input Item</h6>
      </div>
      <div class="po-section-body">
        <form id="formaddtemp">
          <input id="item_id" name="item_id" type="hidden" value="">
          <div class="row mb-3">
            <div class="col-md-5">
              <div class="field-label"><i class="fas fa-barcode"></i> SKU</div>
              <input id="product_code" name="product_code" type="text" class="form-control" required="" readonly>
            </div>
            <div class="col-md-7">
              <div class="field-label"><i class="fas fa-box"></i> Produk</div>
              <input id="product_name" name="product_name" type="text" class="form-control ui-autocomplete-input" placeholder="Ketikkan nama produk..." value="" required="" autocomplete="off" data-parsley-required data-parsley-required-message="*Masukan Nama Produk" readonly>
              <input id="product_id" type="hidden" name="product_id">
            </div>
          </div>
          <div class="row mb-3">
            <div class="col-md-3 mb-2">
              <div class="field-label"><i class="fas fa-sort-numeric-up"></i> Qty Beli</div>
              <input id="temp_qty_po" name="temp_qty_po" type="text" class="form-control text-right" value="0" required="" readonly>
            </div>
            <div class="col-md-3 mb-2">
              <div class="field-label"><i class="fas fa-check-circle"></i> Qty Terima</div>
              <input id="temp_qty_recive" name="temp_qty_recive" type="text" class="form-control text-right" value="0" required="">
            </div>
          </div>
          <div class="item-row-note">
            <div>
              <div class="field-label"><i class="fas fa-sticky-note"></i> Catatan Item</div>
              <input id="input_stock_detail_remark" name="input_stock_detail_remark" type="text" class="form-control" placeholder="Catatan tambahan...">
            </div>
            <div>
              <button id="btnadd_temp" type="submit" class="btn-add-item btn-add-temp" title="Tambah"><i class="fas fa-plus"></i></button>
            </div>
          </div>
        </form>
        <hr class="section-divider" style="margin-top:20px;">
        <div class="table-responsive">
          <table id="temp-input-stock-table" class="display table table-striped table-hover">
            <thead>
              <tr><th>SKU</th><th>Produk</th><th>Satuan</th><th>Qty Beli</th><th>Qty Terima</th><th>Catatan</th><th>Aksi</th></tr>
            </thead>
            <tbody></tbody>
          </table>
        </div>
      </div>
    </div>

    <!-- CATATAN & TOTAL -->
    <div class="po-section">
      <div class="po-section-header">
        <div class="section-icon" style="background:#fce7f3;color:#be185d;"><i class="fas fa-receipt"></i></div>
        <h6>Catatan &amp; Total</h6>
      </div>
      <div class="po-section-body">
        <div class="row">
          <div class="col-lg-6 mb-3">
            <div class="field-label"><i class="fas fa-sticky-note"></i> Catatan</div>
            <textarea id="input_stock_remark" name="input_stock_remark" class="form-control" placeholder="Catatan..." maxlength="500" rows="6" style="border-radius:9px;border-color:#dce3ec;font-size:0.88rem;resize:none;"></textarea>
          </div>
          <div class="col-lg-6">
            <div style="background:#f8fafc;border-radius:12px;border:1px solid #e5ebf2;padding:16px 20px;">
              <div class="summary-row grand" style="padding-top:12px;border-bottom:none;">
                <span class="s-label">Total Qty Terima</span>
                <input id="total_qty_item" name="total_qty_item" type="text" class="form-control text-right s-input" value="0" readonly="" style="border-radius:8px;font-size:0.95rem;font-weight:700;background:#e0f2fe;border-color:#7dd3fc;color:#0369a1;">
              </div>
              <div class="d-flex justify-content-end gap-2 mt-4">
                <button id="btncancel" class="btn btn-danger" style="border-radius:9px;font-weight:600;padding:8px 22px;"><i class="fas fa-times-circle mr-1"></i> Batal</button>
                <button id="btnsave" class="btn btn-success button-header-custom-save" style="border-radius:9px;font-weight:600;padding:8px 22px;"><i class="fas fa-save mr-1"></i> Simpan</button>
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



  $(document).ready(function() {
    temp_input_stock_table();
    $('#supplier').prop('disabled', true);
    $('#warehouse').prop('disabled', true);
    $('#ekspedisi').prop('disabled', true);
  });

  function temp_input_stock_table(){
    $('#temp-input-stock-table').DataTable( {
      serverSide: true,
      search: true,
      processing: true,
      ordering: false,
      retrieve: true,
      ajax: {
        url: '<?php echo base_url(); ?>Purchase/temp_input_stock_list',
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
        {data: 6}
      ]
    });
    check_tempt_data();
  }


  $('#po_inv').autocomplete({ 
    minLength: 2,
    source: function(req, add) {
      $.ajax({
        url: '<?php echo base_url(); ?>/Purchase/search_po',
        dataType: 'json',
        type: 'GET',
        data: req,
        success: function(res) {
          if (res.success == true) {
            add(res.data);
          }
        },
      });
    },
    select: function(event, ui) {
      var po_id = ui.item.id;
      $.ajax({
        type: "POST",
        url: "<?php echo base_url(); ?>Purchase/copy_po_to_temp",
        dataType: "json",
        data: {po_id:po_id},
        success : function(data){
          if (data.code == "200"){
            let title = 'Tambah Data';
            let message = 'Berhasil Pilih PO';
            let state = 'info';
            notif_success(title, message, state);
            $('#temp-input-stock-table').DataTable().ajax.reload();
            check_tempt_data();
          } else {
            Swal.fire({
              icon: 'error',
              title: 'Oops...',
              text: data.result,
            })
          }
        }
      });
    },
  });

  $("#btncancel").click(function (e) {
		Swal.fire({
			title: 'Konfirmasi?',
			text: "Apakah Anda Yakin Membatalkan Inputan",
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Hapus'
		}).then((result) => {
			if (result.isConfirmed) {
				$.ajax({
					type: "POST",
					url: "<?php echo base_url(); ?>Purchase/clear_temp_input_stock",
					dataType: "json",
					data: {},
					success : function(data){
						if (data.code == "200"){
							window.location.href = "<?php echo base_url(); ?>/Purchase/warehouseinput";
						}else {
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
	});

  function check_tempt_data()
  {
    
    $.ajax({
      type: "POST",
      url: "<?php echo base_url(); ?>Purchase/check_temp_input_stock",
      dataType: "json",
      data: {},
      success : function(data){
        if (data.code == "200"){
          console.log(data);
          if(data.po_id == 0){
            $("#po_inv").val("");
            $("#po_inv_id").val("0");
            $("#supplier").select2("val", "");
            $("#warehouse").select2("val", "");
            $("#ekspedisi").select2("val", "");
            $("#total_qty_item").val("0");
            $('#po_inv').prop('disabled', false);
          }else{
            $("#po_inv").val(data.po_code);
            $("#po_inv_id").val(data.po_id);
            $("#supplier").val(data.supplier);
            $('#supplier').trigger('change');
            $('#warehouse').val(data.warehouse);
            $('#warehouse').trigger('change');
            $('#ekspedisi').val(data.ekspedisi);
            $('#ekspedisi').trigger('change');
            $("#total_qty_item").val(data.total_item);
            $('#po_inv').prop('disabled', true);
          }
        }
      }
    });
  }

  function edit_temp(id)
  {
    $.ajax({
      type: "POST",
      url: "<?php echo base_url(); ?>Purchase/get_edit_temp_input_stock",
      dataType: "json",
      data: {id:id},
      success : function(data){
        if (data.code == "200"){
          var row = data.result[0];
          $("#product_code").val(row.product_code);
          $("#product_name").val(row.product_name);
          $("#product_id").val(row.temp_is_product_id);
          $("#temp_qty_po").val(row.temp_is_qty_order);
          $("#temp_qty_recive").val(row.temp_is_qty);
          $("#input_stock_detail_remark").val(row.temp_is_note);
        }
      }
    });  
  }



  $('#btnadd_temp').click(function(e){
    e.preventDefault();
    var product_id                = $("#product_id").val();
    var temp_qty_recive           = $("#temp_qty_recive").val();
    var temp_qty_po               = $("#temp_qty_po").val();
    var input_stock_detail_remark = $("#input_stock_detail_remark").val();
    if(temp_qty_recive > temp_qty_po){
      Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: 'Qty Terima Tidak Bisa Melebih Qty Pesan',
      })
    }else{
      $.ajax({
        type: "POST",
        url: "<?php echo base_url(); ?>Purchase/add_temp_input_stock",
        dataType: "json",
        data: {product_id:product_id, temp_qty_recive:temp_qty_recive, input_stock_detail_remark:input_stock_detail_remark},
        success : function(data){
          if (data.code == "200"){
            let title = 'Tambah Data';
            let message = 'Data Berhasil Di Edit';
            let state = 'info';
            notif_success(title, message, state);
            $('#temp-input-stock-table').DataTable().ajax.reload();
            check_tempt_data();
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

  $('#btnsave').click(function(e){
    e.preventDefault();
    var po_inv_id             = $("#po_inv_id").val();
    var warehouseinput_date   = $("#warehouseinput_date").val();
    var desc                  = $("#input_stock_remark").val();
    var warehouse             = $("#warehouse").val();
    $.ajax({
      type: "POST",
      url: "<?php echo base_url(); ?>Purchase/save_input_stock",
      dataType: "json",
      data: {po_inv_id:po_inv_id, warehouseinput_date:warehouseinput_date, desc:desc, warehouse:warehouse},
      success : function(data){
        if (data.code == "200"){
          window.location.href = "<?php echo base_url(); ?>/Purchase/warehouseinput";
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

  function deletes(id)
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
          url: "<?php echo base_url(); ?>Purchase/delete_temp_input_stock",
          dataType: "json",
          data: {id:id},
          success : function(data){
            if (data.code == "200"){
              let title = 'Hapus Data';
              let message = 'Data Berhasil Di Hapus';
              let state = 'danger';
              notif_success(title, message, state);
              $('#temp-input-stock-table').DataTable().ajax.reload();
              check_tempt_data();
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



  
</script>