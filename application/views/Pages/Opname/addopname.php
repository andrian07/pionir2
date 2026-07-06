<?php 
define('DOC_ROOT_PATH', $_SERVER['DOCUMENT_ROOT'].'/');
require DOC_ROOT_PATH . $this->config->item('header');
?>
</div>

<style>
  .opname-page-wrap { padding: 20px 24px; }
  .opname-section {
    background: #fff;
    border-radius: 16px;
    border: 1px solid #e8edf3;
    box-shadow: 0 2px 12px rgba(0,0,0,0.06);
    margin-bottom: 20px;
    overflow: hidden;
  }
  .opname-section-header {
    display: flex;
    align-items: center;
    gap: 10px;
    padding: 14px 22px;
    border-bottom: 1px solid #f0f4f8;
    background: #f8fafc;
  }
  .opname-section-header .section-icon {
    width: 34px;
    height: 34px;
    border-radius: 9px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 0.85rem;
    flex-shrink: 0;
  }
  .opname-section-header h6 {
    font-size: 0.82rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.7px;
    color: #64748b;
    margin: 0;
  }
  .opname-section-body { padding: 20px 22px; }
  .opname-field-label {
    font-size: 0.8rem;
    font-weight: 600;
    color: #6b7280;
    margin-bottom: 5px;
    display: flex;
    align-items: center;
    gap: 5px;
  }
  .opname-field-label i { font-size: 0.72rem; color: #9ca3af; }
  .opname-section-body .form-control,
  .opname-section-body .select2-container--default .select2-selection--single {
    border-radius: 9px !important;
    border-color: #dce3ec;
    font-size: 0.88rem;
    background: #fafbfc;
  }
  .opname-section-body .form-control[readonly] {
    background: #f1f5f9;
    color: #64748b;
  }
  .opname-page-header {
    background: linear-gradient(135deg, #0f766e 0%, #14b8a6 100%);
    border-radius: 16px;
    padding: 20px 26px;
    margin-bottom: 20px;
    margin-top: 76px;
    box-shadow: 0 6px 24px rgba(15,118,110,0.16);
    display: flex;
    align-items: center;
    gap: 14px;
  }
  .opname-page-header .header-icon {
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
  .opname-page-header h5 { color:#fff; font-weight:700; margin:0; font-size:1.1rem; }
  .opname-page-header small { color: rgba(255,255,255,0.68); font-size:0.8rem; }
  .opname-btn-add {
    width: 42px;
    height: 38px;
    border-radius: 10px;
    background: linear-gradient(135deg, #0f766e, #14b8a6);
    border: none;
    color: #fff;
    font-size: 1rem;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
    box-shadow: 0 3px 10px rgba(20,184,166,0.24);
    transition: transform 0.15s, box-shadow 0.15s;
  }
  .opname-btn-add:hover {
    transform: translateY(-1px);
    box-shadow: 0 5px 14px rgba(20,184,166,0.32);
  }
  .opname-summary-card {
    background: #f0fdfa;
    border-radius: 12px;
    border: 1px solid #b9f5e8;
    padding: 16px 20px;
  }
  .opname-summary-row {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 8px 0;
    border-bottom: 1px solid #daf8f2;
    font-size: 0.88rem;
  }
  .opname-summary-row:last-child { border-bottom: none; }
  .opname-summary-row .s-label { font-weight: 600; color: #6b7280; }
  .opname-summary-row .s-input { width: 180px; }
  .opname-divider {
    border: none;
    border-top: 1px dashed #e5ebf2;
    margin: 16px 0;
  }
  @media (max-width: 768px) { .opname-page-wrap { padding: 14px 12px; } }
</style>

<div class="container-fluid">
  <div class="opname-page-wrap">
    <div class="opname-page-header">
      <div class="header-icon"><i class="fas fa-clipboard-list"></i></div>
      <div>
        <h5>Tambah Opname</h5>
        <small>Kelola stok fisik dan selisih opname dengan layout yang lebih terstruktur</small>
      </div>
    </div>

    <div class="row mb-4">
      <div class="col-md-4 mb-3 mb-md-0 d-flex">
        <div class="opname-section mb-0 flex-fill">
          <div class="opname-section-header">
            <div class="section-icon" style="background:#ecfeff; color:#0f766e;"><i class="fas fa-file-alt"></i></div>
            <h6>Informasi Dokumen</h6>
          </div>
          <div class="opname-section-body">
            <div class="mb-3">
              <div class="opname-field-label"><i class="fas fa-hashtag"></i> No Opname</div>
              <input id="opname_invoice" name="opname_invoice" type="text" class="form-control" value="AUTO" readonly="">
            </div>
            <div class="mb-0">
              <div class="opname-field-label"><i class="fas fa-calendar-day"></i> Tanggal</div>
              <input id="opname_date" name="opname_date" type="date" class="form-control" value="<?php echo date('Y-m-d'); ?>">
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-4 mb-3 mb-md-0 d-flex" style="padding-left:10px; padding-right:10px;">
        <div class="opname-section mb-0 flex-fill">
          <div class="opname-section-header">
            <div class="section-icon" style="background:#f0fdf4; color:#16a34a;"><i class="fas fa-warehouse"></i></div>
            <h6>Gudang</h6>
          </div>
          <div class="opname-section-body">
            <div class="mb-3">
              <div class="opname-field-label"><i class="fas fa-boxes"></i> Gudang</div>
              <select class="form-control js-example-basic-single" id="warehouse" name="warehouse">
                <option value="">-- Pilih Gudang --</option>
                <?php foreach ($data['warehouse_list'] as $row) { ?>
                  <option value="<?php echo $row->warehouse_id; ?>"><?php echo $row->warehouse_name; ?></option>
                <?php } ?>
              </select>
            </div>
            <div class="mb-0">
              <div class="opname-field-label"><i class="fas fa-user"></i> User</div>
              <input id="po_user_id" name="po_user_id" type="text" class="form-control" value="<?php echo $_SESSION['user_name']; ?>" readonly="">
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-4 d-flex">
        <div class="opname-section mb-0 flex-fill">
          <div class="opname-section-header">
            <div class="section-icon" style="background:#fef3c7; color:#d97706;"><i class="fas fa-info-circle"></i></div>
            <h6>Informasi Opname</h6>
          </div>
          <div class="opname-section-body">
            <div class="text-muted small">Pilih gudang dan tambahkan item yang akan di-check untuk mencatat stok fisik dan selisih.</div>
          </div>
        </div>
      </div>
    </div>

    <div class="opname-section">
      <div class="opname-section-header">
        <div class="section-icon" style="background:#ede9fe; color:#7c3aed;"><i class="fas fa-boxes"></i></div>
        <h6>Input Item Opname</h6>
      </div>
      <div class="opname-section-body">
        <form id="formaddtemp">
          <div class="row mb-3">
            <div class="col-md-3 mb-2">
              <div class="opname-field-label"><i class="fas fa-box"></i> Produk</div>
              <input id="product_name" name="product_name" type="text" class="form-control ui-autocomplete-input" placeholder="Ketikkan Nama Produk" value="" required="" autocomplete="off">
              <input id="product_id" type="hidden" name="product_id">
            </div>
            <div class="col-md-2 mb-2">
              <div class="opname-field-label"><i class="fas fa-cubes"></i> Stok Sistem</div>
              <input id="system_stock" name="system_stock" type="text" class="form-control text-right" value="0" readonly>
            </div>
            <div class="col-md-2 mb-2">
              <div class="opname-field-label"><i class="fas fa-balance-scale"></i> Stok Fisik</div>
              <input id="fisik_stock" name="fisik_stock" type="text" class="form-control text-right" value="0" required="">
            </div>
            <div class="col-md-2 mb-2">
              <div class="opname-field-label"><i class="fas fa-arrows-alt-h"></i> Selisih Stok</div>
              <input id="stock_diferent" name="stock_diferent" type="text" class="form-control text-right" value="0" readonly>
            </div>
            <div class="col-md-3 mb-2">
              <div class="opname-field-label"><i class="fas fa-money-bill-wave"></i> Selisih HPP</div>
              <input id="hpp" name="hpp" type="hidden" class="form-control text-right" value="0" readonly>
              <input id="hpp_diferent" name="hpp_diferent" type="text" class="form-control text-right" value="0" readonly>
            </div>
          </div>

          <hr class="opname-divider">

          <div class="row mb-3">
            <div class="col-md-8 mb-2">
              <div class="opname-field-label"><i class="fas fa-sticky-note"></i> Catatan</div>
              <input id="temp_note" name="temp_note" type="text" class="form-control text-left">
            </div>
            <div class="col-md-1 d-flex align-items-end justify-content-end" style="margin-bottom: 8px;">
              <button id="btnadd_temp" type="submit" class="opname-btn-add btn-add-temp" title="Tambah Item Opname">
                <i class="fas fa-plus"></i>
              </button>
            </div>
          </div>
        </form>

        <hr class="opname-divider" style="margin-top:20px;">

        <div class="table-responsive">
          <table id="temp-opname" class="display table table-striped table-hover">
            <thead>
              <tr>
                <th>Produk</th>
                <th>SKU</th>
                <th>Stok Sistem</th>
                <th>Stok Fisik</th>
                <th>Selisih</th>
                <th>Selisih Rupiah</th>
                <th>Catatan</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody></tbody>
          </table>
        </div>
      </div>
    </div>

    <div class="opname-section">
      <div class="opname-section-header">
        <div class="section-icon" style="background:#fef3c7; color:#d97706;"><i class="fas fa-receipt"></i></div>
        <h6>Catatan &amp; Total</h6>
      </div>
      <div class="opname-section-body">
        <div class="row">
          <div class="col-lg-6 mb-3">
            <div class="opname-field-label"><i class="fas fa-sticky-note"></i> Catatan Opname</div>
            <textarea id="opname_remark" name="opname_remark" class="form-control" placeholder="Catatan untuk opname ini..." maxlength="500" rows="8" style="border-radius:9px; resize:none;"></textarea>
          </div>
          <div class="col-lg-6">
            <div class="opname-summary-card" style="height: 170px; margin-top: 24px;">
              <div class="opname-summary-row">
                <span class="s-label">Total Selisih</span>
                <input id="total_opname" name="total_opname" type="text" class="form-control text-right s-input" value="0" readonly="" style="border-radius:8px; font-size:0.88rem;">
              </div>
              <div class="d-flex justify-content-end gap-2 mt-4">
                <button id="btncancel" class="btn btn-danger" style="border-radius:9px; font-weight:600; padding:8px 22px;"><i class="fas fa-times-circle mr-1"></i> Batal</button>
                <button id="btnsave" class="btn btn-success button-header-custom-save" style="border-radius:9px; font-weight:600; padding:8px 22px;"><i class="fas fa-save mr-1"></i> Simpan Opname</button>
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

  let hpp_diferent = new AutoNumeric('#hpp_diferent', {
    currencySymbol : 'Rp. ',
    decimalCharacter : ',',
    decimalPlaces: 0,
    decimalPlacesShownOnFocus: 0,
    digitGroupSeparator : '.',
  });

  let hpp = new AutoNumeric('#hpp', {
    currencySymbol : 'Rp. ',
    decimalCharacter : ',',
    decimalPlaces: 0,
    decimalPlacesShownOnFocus: 0,
    digitGroupSeparator : '.',
  });

  let total_opname = new AutoNumeric('#total_opname', {
    currencySymbol : 'Rp. ',
    decimalCharacter : ',',
    decimalPlaces: 0,
    decimalPlacesShownOnFocus: 0,
    digitGroupSeparator : '.',
  });

  $(document).ready(function() {
    check_tempt_data();
    temp_opname();
  });

  $('#product_name').autocomplete({ 
    minLength: 2,
    source: function(req, add) {
      $.ajax({
        url: '<?php echo base_url(); ?>/Opname/search_product_opname?id='+$('#warehouse').val(),
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
      let stock = ui.item.stock;
      let hpp_val = ui.item.product_hpp;
      $("#product_id").val(id);
      $('#system_stock').val(stock);
      hpp.set(hpp_val);
    },
  });


  $('#fisik_stock').on('input', function (event) {
    let system_stock_val    = $("#system_stock").val();
    let fisik_stock_val     = $("#fisik_stock").val();
    let hpp_val_cal         = parseInt(hpp.get());
    let stock_diferent_val  = Number(fisik_stock_val) - Number(system_stock_val);
    $("#stock_diferent").val(stock_diferent_val);
    hpp_diferent.set(hpp_val_cal * Number(stock_diferent_val));
  })

  function temp_opname(){
    $('#temp-opname').DataTable( {
      serverSide: true,
      search: true,
      processing: true,
      ordering: false,
      retrieve: true,
      ajax: {
        url: '<?php echo base_url(); ?>Opname/temp_opname',
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
        {data: 7}
      ]
    });
    check_tempt_data();
  }


  $('#btnadd_temp').click(function(e){
    e.preventDefault();
    var warehouse               = $("#warehouse").val();
    var product_id              = $("#product_id").val();
    var system_stock            = $("#system_stock").val();
    var fisik_stock             = $("#fisik_stock").val();
    var stock_diferent          = $("#stock_diferent").val();
    var hpp_submit              = parseInt(hpp.get());
    var hpp_diferent_submit     = parseInt(hpp_diferent.get());
    var temp_note               = $("#temp_note").val();
    $.ajax({
      type: "POST",
      url: "<?php echo base_url(); ?>Opname/add_temp_opname",
      dataType: "json",
      data: {warehouse:warehouse, product_id:product_id, system_stock:system_stock, fisik_stock:fisik_stock, stock_diferent:stock_diferent, hpp_submit:hpp_submit, hpp_diferent_submit:hpp_diferent_submit, temp_note:temp_note},
      success : function(data){
        if (data.code == "200"){
          let title = 'Tambah Data';
          let message = 'Data Berhasil Di Tambah';
          let state = 'info';
          notif_success(title, message, state);
          $('#temp-opname').DataTable().ajax.reload();
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
  });

  function clear_input()
  {
    $("#product_name").val("");
    $("#product_id").val("");
    $("#system_stock").val(0);
    $("#fisik_stock").val(0);
    $("#stock_diferent").val(0);
    hpp.set(0);
    hpp_diferent.set(0);
    $("#temp_note").val("");
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
          url: "<?php echo base_url(); ?>Opname/delete_temp_opname",
          dataType: "json",
          data: {id:id},
          success : function(data){
            if (data.code == "200"){
              let title = 'Hapus Data';
              let message = 'Data Berhasil Di Hapus';
              let state = 'danger';
              notif_success(title, message, state);
              $('#temp-opname').DataTable().ajax.reload();
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
    })
  }

  function edit_temp(id, sales_id)
  {
    $.ajax({
      type: "POST",
      url: "<?php echo base_url(); ?>Opname/get_edit_temp_opname",
      dataType: "json",
      data: {id:id, sales_id:sales_id},
      success : function(data){
        if (data.code == "200"){
          let row = data.result[0];
          $("#product_name").val(row.product_name);
          $("#product_id").val(row.temp_opname_product_id);
          $("#system_stock").val(row.temp_opname_system_stock);
          $("#fisik_stock").val(row.temp_opname_fisik_stock);
          $("#stock_diferent").val(row.temp_opname_diferent_stock);
          hpp.set(row.product_hpp);;
          hpp_diferent.set(row.temp_opname_diferent_hpp);
          $("#temp_note").val(row.temp_opname_note);
        }
      }
    });
  }

  function check_tempt_data()
  {
    $.ajax({
      type: "POST",
      url: "<?php echo base_url(); ?>Opname/check_temp_opname",
      dataType: "json",
      data: {},
      success : function(data){
        if (data.code == "200"){
          console.log(data.data);
          if(data.data.length > 0){
            let row = data.data[0];
            $("#warehouse").val(row.temp_opname_warehouse_id);
            $('#warehouse').trigger('change');            
            total_opname.set(row.total_diff);
          }else{
            $("#warehouse").val("");
            $('#warehouse').trigger('change');
            total_opname.set(0);
          }
        }
      }
    });
  }

  $('#btnsave').click(function(e){
    e.preventDefault();
    var warehouse               = $("#warehouse").val();
    var opname_date             = $("#opname_date").val();
    var total_opname_val        = parseInt(total_opname.get());
    var opname_remark           = $("#opname_remark").val();
    $.ajax({
      type: "POST",
      url: "<?php echo base_url(); ?>Opname/save_opname",
      dataType: "json",
      data: {warehouse:warehouse, opname_date:opname_date, total_opname:total_opname_val, opname_remark:opname_remark},
      success : function(data){
        if (data.code == "200"){
          window.location.href = "<?php echo base_url(); ?>/Opname";
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