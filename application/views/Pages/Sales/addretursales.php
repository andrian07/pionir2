<?php 
define('DOC_ROOT_PATH', $_SERVER['DOCUMENT_ROOT'].'/');
require DOC_ROOT_PATH . $this->config->item('header');
?>
</div>

<style>
  .sales-page-wrap { padding: 20px 24px; }
  .sales-section {
    background: #fff;
    border-radius: 16px;
    border: 1px solid #e8edf3;
    box-shadow: 0 2px 12px rgba(0,0,0,0.06);
    margin-bottom: 20px;
    overflow: hidden;
  }
  .sales-section-header {
    display: flex;
    align-items: center;
    gap: 10px;
    padding: 14px 22px;
    border-bottom: 1px solid #f0f4f8;
    background: #f8fafc;
  }
  .sales-section-header .section-icon {
    width: 34px;
    height: 34px;
    border-radius: 9px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 0.85rem;
    flex-shrink: 0;
  }
  .sales-section-header h6 {
    font-size: 0.82rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.7px;
    color: #64748b;
    margin: 0;
  }
  .sales-section-body { padding: 20px 22px; }
  .sales-field-label {
    font-size: 0.8rem;
    font-weight: 600;
    color: #6b7280;
    margin-bottom: 5px;
    display: flex;
    align-items: center;
    gap: 5px;
  }
  .sales-field-label i { font-size: 0.72rem; color: #9ca3af; }
  .sales-section-body .form-control,
  .sales-section-body .select2-container--default .select2-selection--single {
    border-radius: 9px !important;
    border-color: #dce3ec;
    font-size: 0.88rem;
    background: #fafbfc;
  }
  .sales-section-body .form-control[readonly] {
    background: #f1f5f9;
    color: #64748b;
  }
  .sales-page-header {
    background: linear-gradient(135deg, #6861ce 0%, #48abf7 100%);
    border-radius: 16px;
    padding: 20px 26px;
    margin-bottom: 20px;
    margin-top: 76px;
    box-shadow: 0 6px 24px rgba(104,97,206,0.16);
    display: flex;
    align-items: center;
    gap: 14px;
  }
  .sales-page-header .header-icon {
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
  .sales-page-header h5 { color:#fff; font-weight:700; margin:0; font-size:1.1rem; }
  .sales-page-header small { color: rgba(255,255,255,0.68); font-size:0.8rem; }
  .sales-btn-add {
    width: 42px;
    height: 38px;
    border-radius: 10px;
    background: linear-gradient(135deg, #6861ce, #48abf7);
    border: none;
    color: #fff;
    font-size: 1rem;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
    box-shadow: 0 3px 10px rgba(104,97,206,0.24);
    transition: transform 0.15s, box-shadow 0.15s;
  }
  .sales-btn-add:hover {
    transform: translateY(-1px);
    box-shadow: 0 5px 14px rgba(104,97,206,0.32);
  }
  .sales-divider {
    border: none;
    border-top: 1px dashed #e5ebf2;
    margin: 16px 0;
  }
  .sales-summary-card {
    background: #f7f8ff;
    border-radius: 12px;
    border: 1px solid #e4e7ff;
    padding: 16px 20px;
    margin-top: 24px;
    height: 170px;
  }
  .sales-summary-row {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 8px 0;
    border-bottom: 1px solid #ececff;
    font-size: 0.88rem;
  }
  .sales-summary-row:last-child { border-bottom: none; }
  .sales-summary-row .s-label { font-weight: 600; color: #6b7280; }
  .sales-summary-row .s-input { width: 180px; }
  @media (max-width: 768px) { .sales-page-wrap { padding: 14px 12px; } }
</style>

<div class="container-fluid">
  <div class="sales-page-wrap">
    <div class="sales-page-header">
      <div class="header-icon"><i class="fas fa-undo-alt"></i></div>
      <div>
        <h5>Tambah Retur Penjualan</h5>
        <small>Silahkan isi data retur penjualan dengan lengkap</small>
      </div>
    </div>

    <div class="row mb-4">
      <div class="col-md-4 mb-3 mb-md-0 d-flex">
        <div class="sales-section mb-0 flex-fill">
          <div class="sales-section-header">
            <div class="section-icon" style="background:#ffedd5; color:#c2410c;"><i class="fas fa-file-alt"></i></div>
            <h6>Informasi Dokumen</h6>
          </div>
          <div class="sales-section-body">
            <div class="mb-3">
              <div class="sales-field-label"><i class="fas fa-hashtag"></i> No Invoice</div>
              <input id="purchase_order_invoice" name="purchase_order_invoice" type="text" class="form-control" value="AUTO" readonly="">
              <input id="purchase_order_id" name="purchase_order_id" type="hidden" class="form-control">
            </div>
            <div class="mb-0">
              <div class="sales-field-label"><i class="fas fa-calendar-day"></i> Tanggal</div>
              <input id="retur_sales_date" name="retur_sales_date" type="date" class="form-control" value="<?php echo date('Y-m-d'); ?>">
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-4 mb-3 mb-md-0 d-flex" style="padding-left:10px; padding-right:10px;">
        <div class="sales-section mb-0 flex-fill">
          <div class="sales-section-header">
            <div class="section-icon" style="background:#fce7f3; color:#be185d;"><i class="fas fa-users"></i></div>
            <h6>Pelanggan</h6>
          </div>
          <div class="sales-section-body">
            <div class="mb-3">
              <div class="sales-field-label"><i class="fas fa-building"></i> Customer</div>
              <select class="form-control js-example-basic-single" id="sales_customer" name="sales_customer">
                <option value="">-- Pilih Customer --</option>
                <?php foreach ($data['customer_list'] as $row) { ?>
                  <option value="<?php echo $row->customer_id; ?>"><?php echo $row->customer_name; ?></option>
                <?php } ?>
              </select>
            </div>
            <div class="mb-0">
              <div class="sales-field-label"><i class="fas fa-user"></i> User</div>
              <input id="po_user_id" name="po_user_id" type="text" class="form-control" value="<?php echo $_SESSION['user_name']; ?>" readonly="">
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-4 d-flex">
        <div class="sales-section mb-0 flex-fill">
          <div class="sales-section-header">
            <div class="section-icon" style="background:#dcfce7; color:#16a34a;"><i class="fas fa-info-circle"></i></div>
            <h6>Informasi Retur</h6>
          </div>
          <div class="sales-section-body">
            <div class="text-muted small">Pilih customer dan invoice penjualan untuk menambahkan item retur yang ingin dikembalikan.</div>
          </div>
        </div>
      </div>
    </div>

    <div class="sales-section">
      <div class="sales-section-header">
        <div class="section-icon" style="background:#ede9fe; color:#7c3aed;"><i class="fas fa-boxes"></i></div>
        <h6>Input Item Retur</h6>
      </div>
      <div class="sales-section-body">
        <form id="formaddtemp">
          <div class="row mb-3">
            <div class="col-md-3 mb-2">
              <div class="sales-field-label"><i class="fas fa-file-invoice"></i> No Invoice Penjualan</div>
              <input id="sales_inv" name="sales_inv" type="text" class="form-control ui-autocomplete-input" placeholder="Ketikkan No Invoice" value="" required="" autocomplete="off" data-parsley-required data-parsley-required-message="*Masukan Nama Produk">
              <input id="sales_id" type="hidden" name="sales_id">
            </div>
            <div class="col-md-3 mb-2">
              <div class="sales-field-label"><i class="fas fa-box"></i> Produk</div>
              <input id="product_name" name="product_name" type="text" class="form-control ui-autocomplete-input" placeholder="Ketikkan Nama Produk" value="" required="" autocomplete="off" data-parsley-required data-parsley-required-message="*Masukan Nama Produk">
              <input id="product_id" type="hidden" name="product_id">
            </div>
            <div class="col-md-2 mb-2">
              <div class="sales-field-label"><i class="fas fa-tag"></i> Harga Jual</div>
              <input id="temp_price" name="temp_price" type="text" class="form-control text-right" value="0" required="">
            </div>
            <div class="col-md-2 mb-2">
              <div class="sales-field-label"><i class="fas fa-sort-numeric-up"></i> Qty Retur</div>
              <input id="temp_qty" name="temp_qty" type="text" class="form-control" value="0" data-parsley-min="1" data-parsley-min-message="*qty harus lebih besar dari 0" required="">
            </div>
            <div class="col-md-2 mb-2">
              <div class="sales-field-label"><i class="fas fa-boxes-stacked"></i> Qty Jual</div>
              <input id="temp_qty_sell" name="temp_qty_sell" type="text" class="form-control" value="0" data-parsley-min="1" data-parsley-min-message="*qty harus lebih besar dari 0" required="" readonly>
            </div>
          </div>

          <hr class="sales-divider">

          <div class="row mb-3">
            <div class="col-md-4 mb-2">
              <div class="sales-field-label"><i class="fas fa-calculator"></i> Total</div>
              <input id="temp_total" name="temp_total" type="text" class="form-control text-right" value="0" required="" readonly>
            </div>
            <div class="col-md-6 mb-2">
              <div class="sales-field-label"><i class="fas fa-sticky-note"></i> Catatan</div>
              <input id="temp_note" name="temp_note" type="text" class="form-control text-left">
            </div>
            <div class="col-md-2 d-flex align-items-end">
              <button id="btnadd_temp" type="submit" class="sales-btn-add btn-add-temp" title="Tambah Item Retur">
                <i class="fas fa-plus"></i>
              </button>
            </div>
          </div>
        </form>

        <hr class="sales-divider" style="margin-top:20px;">

        <div class="table-responsive">
          <table id="temp-retur-sales-list" class="display table table-striped table-hover">
            <thead>
              <tr>
                <th>SKU</th>
                <th>Produk</th>
                <th>Satuan</th>
                <th>Qty</th>
                <th>Total</th>
                <th>Catatan</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody></tbody>
          </table>
        </div>
      </div>
    </div>

    <div class="sales-section">
      <div class="sales-section-header">
        <div class="section-icon" style="background:#fef3c7; color:#d97706;"><i class="fas fa-receipt"></i></div>
        <h6>Catatan &amp; Total</h6>
      </div>
      <div class="sales-section-body">
        <div class="row">
          <div class="col-lg-6 mb-3">
            <div class="sales-field-label"><i class="fas fa-sticky-note"></i> Catatan Retur</div>
            <textarea id="sales_retur_remark" name="sales_retur_remark" class="form-control" placeholder="Catatan untuk retur penjualan ini..." maxlength="500" rows="8" style="border-radius:9px; resize:none;"></textarea>
          </div>
          <div class="col-lg-6">
            <div class="sales-summary-card">
              <div class="sales-summary-row">
                <span class="s-label">Total Retur</span>
                <input id="footer_total_invoice" name="footer_total_invoice" type="text" class="form-control text-right s-input" value="0" readonly="" style="border-radius:8px; font-size:0.88rem;">
              </div>
              <div class="d-flex justify-content-end gap-2 mt-4">
                <button id="btncancel" class="btn btn-danger" style="border-radius:9px; font-weight:600; padding:8px 22px;"><i class="fas fa-times-circle mr-1"></i> Batal</button>
                <button id="btnsave" class="btn btn-success button-header-custom-save" style="border-radius:9px; font-weight:600; padding:8px 22px;"><i class="fas fa-save mr-1"></i> Simpan Retur</button>
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

  let temp_price = new AutoNumeric('#temp_price', {
    currencySymbol : 'Rp. ',
    decimalCharacter : ',',
    decimalPlaces: 0,
    decimalPlacesShownOnFocus: 0,
    digitGroupSeparator : '.',
  });



  let temp_total = new AutoNumeric('#temp_total', {
    currencySymbol : 'Rp. ',
    decimalCharacter : ',',
    decimalPlaces: 0,
    decimalPlacesShownOnFocus: 0,
    digitGroupSeparator : '.',
  });

  let footer_total_invoice = new AutoNumeric('#footer_total_invoice', {
    currencySymbol : 'Rp. ',
    decimalCharacter : ',',
    decimalPlaces: 0,
    decimalPlacesShownOnFocus: 0,
    digitGroupSeparator : '.',
  });


  $(document).ready(function() {
    temp_retur_purchase_table();
  });

  $('#sales_inv').autocomplete({ 
    minLength: 2,
    source: function(req, add) {
      $.ajax({
        url: '<?php echo base_url(); ?>/Sales/search_sales_inv?id='+$('#sales_customer').val(),
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
            $("#sales_inv").val("");
          }
        },
      });
    },
    select: function(event, ui) {
      let id = ui.item.id;
      $("#sales_inv").val(id);
      $("#sales_id").val(id);
    },
  });


  $('#product_name').autocomplete({ 
    minLength: 2,
    source: function(req, add) {
      $.ajax({
        url: '<?php echo base_url(); ?>/Sales/search_product_retur?id='+$('#sales_id').val(),
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
      sales_price     = ui.item.sales_price;
      sales_qty       = ui.item.sales_qty;
      $("#product_id").val(id);
      temp_price.set(sales_price);
      $('#temp_qty_sell').val(sales_qty);
    },
  });


  $('#temp_qty').on('input', function (event) {
    calculation_temp();
  })

  $('#temp_price').on('input', function (event) {
    calculation_temp();
  })


  function calculation_temp()
  {
    let temp_price_val  = parseInt(temp_price.get());
    let temp_qty_val    = $('#temp_qty').val();
    let temp_total_val  = temp_price_val * temp_qty_val ;
    temp_total.set(temp_total_val);
  }

  $('#btnadd_temp').click(function(e){
    e.preventDefault();
    var sales_id             = $("#sales_id").val();
    var sales_inv            = $("#sales_inv").val();
    var product_id           = $("#product_id").val();
    var product_name         = $("#product_name").val();
    var temp_price_submit    = parseInt(temp_price.get());
    var temp_qty             = $("#temp_qty").val();
    var temp_qty_sell        = $("#temp_qty_sell").val();
    var temp_total_submit    = parseInt(temp_total.get());
    var temp_note            = $("#temp_note").val();
    var customer_id          = $('#sales_customer').val();

    if($('#formaddtemp').parsley().validate({force: true})){
      $.ajax({
        type: "POST",
        url: "<?php echo base_url(); ?>Sales/add_temp_retur_sales",
        dataType: "json",
        data: {sales_id:sales_id, sales_inv:sales_inv, product_id:product_id, product_name:product_name, temp_price_submit:temp_price_submit, temp_qty:temp_qty, temp_qty_sell:temp_qty_sell, temp_total_submit:temp_total_submit, temp_note:temp_note, customer_id:customer_id},
        success : function(data){
          if (data.code == "200"){
            let title = 'Tambah Data';
            let message = 'Data Berhasil Di Tambah';
            let state = 'info';
            notif_success(title, message, state);
            $('#temp-retur-sales-list').DataTable().ajax.reload();
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
      url: "<?php echo base_url(); ?>Sales/check_temp_retur_sales",
      dataType: "json",
      data: {},
      success : function(data){
        if (data.code == "200"){
          let row = data.data[0];
          footer_total_invoice.set(row.sub_total);
          $('#sales_customer').val(row.customer);
          $('#sales_customer').trigger('change');
        }
      }
    });
  }

  function clear_input()
  {
    $("#sales_id").val("");
    $("#sales_inv").val("");
    $("#product_id").val("");
    $("#product_name").val("");
    temp_price.set(0);
    $("#temp_qty").val(0);
    $("#temp_qty_sell").val(0);
    temp_total.set(0);
    $("#temp_note").val("");
  }

  function edit_temp(id, sales_id)
  {
    $.ajax({
      type: "POST",
      url: "<?php echo base_url(); ?>Sales/get_edit_temp_retur_sales",
      dataType: "json",
      data: {id:id, sales_id:sales_id},
      success : function(data){
        console.log("asdasd");
        if (data.code == "200"){
          let row = data.result[0];
          $("#sales_inv").val(row.temp_retur_sales_b_inv);
          $("#sales_id").val(row.temp_retur_sales_b_id);
          $("#product_name").val(row.temp_retur_sales_product_name);
          $("#product_id").val(row.temp_retur_sales_product_id);
          temp_price.set(row.temp_retur_sales_price);
          $("#temp_qty").val(row.temp_retur_sales_qty);
          $("#temp_qty_sell").val(row.temp_retur_sales_qty_sales);
          temp_total.set(row.temp_retur_sales_total);
          $("#temp_note").val(row.temp_retur_sales_note);
        }
      }
    });
  }

  function temp_retur_purchase_table(){
    $('#temp-retur-sales-list').DataTable( {
      serverSide: true,
      search: true,
      processing: true,
      ordering: false,
      retrieve: true,
      ajax: {
        url: '<?php echo base_url(); ?>Sales/temp_retur_sales_list',
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
          url: "<?php echo base_url(); ?>Sales/delete_temp_retur_sales",
          dataType: "json",
          data: {id:id},
          success : function(data){
            if (data.code == "200"){
              let title = 'Hapus Data';
              let message = 'Data Berhasil Di Hapus';
              let state = 'danger';
              notif_success(title, message, state);
              check_tempt_data();
              $('#temp-retur-sales-list').DataTable().ajax.reload();
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
    var retur_sales_customer                     = $("#sales_customer").val();
    var retur_sales_date                         = $("#retur_sales_date").val();
    var footer_total_invoice_val                 = parseInt(footer_total_invoice.get());
    var sales_retur_remark                       = $("#sales_retur_remark").val();
    $.ajax({
      type: "POST",
      url: "<?php echo base_url(); ?>Sales/save_retur_sales",
      dataType: "json",
      data: {retur_sales_customer:retur_sales_customer, retur_sales_date:retur_sales_date, footer_total_invoice_val:footer_total_invoice_val, sales_retur_remark:sales_retur_remark},
      success : function(data){
        if (data.code == "200"){
          window.location.href = "<?php echo base_url(); ?>/Sales/retursales";
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

</script>