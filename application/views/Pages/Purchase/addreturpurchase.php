<?php 
define('DOC_ROOT_PATH', $_SERVER['DOCUMENT_ROOT'].'/');
require DOC_ROOT_PATH . $this->config->item('header');
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
      <div class="header-icon"><i class="fas fa-undo-alt"></i></div>
      <div><h5>Tambah Retur Pembelian</h5><small>Kembalikan barang ke supplier</small></div>
    </div>

    <!-- HEADER SECTIONS -->
    <div class="row mb-4">
      <div class="col-md-4 mb-3 mb-md-0 d-flex">
        <div class="po-section mb-0 flex-fill">
          <div class="po-section-header">
            <div class="section-icon" style="background:#e0f2fe;color:#0369a1;"><i class="fas fa-file-alt"></i></div>
            <h6>Informasi Dokumen</h6>
          </div>
          <div class="po-section-body">
            <div class="mb-3">
              <div class="field-label"><i class="fas fa-hashtag"></i> No Invoice</div>
              <input id="retur_purchase_invoice" name="retur_purchase_invoice" type="text" class="form-control" value="AUTO" readonly="">
              <input id="retur_purchase_id" name="retur_purchase_id" type="hidden">
            </div>
            <div class="mb-3">
              <div class="field-label"><i class="fas fa-calendar-day"></i> Tanggal</div>
              <input id="retur_purchase_date" name="retur_purchase_date" type="date" class="form-control" value="<?php echo date('Y-m-d'); ?>">
            </div>
            <div class="mb-0">
              <div class="field-label"><i class="fas fa-user"></i> User</div>
              <input id="po_user_id" name="po_user_id" type="text" class="form-control" value="<?php echo $_SESSION['user_name']; ?>" readonly="">
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-8 d-flex" style="padding-left:10px;">
        <div class="po-section mb-0 flex-fill">
          <div class="po-section-header">
            <div class="section-icon" style="background:#fef3c7;color:#d97706;"><i class="fas fa-truck"></i></div>
            <h6>Supplier</h6>
          </div>
          <div class="po-section-body">
            <div class="mb-0">
              <div class="field-label"><i class="fas fa-building"></i> Supplier</div>
              <select class="form-control js-example-basic-single" id="purchase_supplier" name="purchase_supplier">
                <option value="">-- Pilih Supplier --</option>
                <?php foreach ($data['supplier_list'] as $row) { ?>
                  <option value="<?php echo $row->supplier_id; ?>"><?php echo $row->supplier_name; ?></option>
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
        <h6>Input Item Retur</h6>
      </div>
      <div class="po-section-body">
        <form id="formaddtemp">
          <div class="row mb-3">
            <div class="col-md-5">
              <div class="field-label"><i class="fas fa-file-invoice"></i> No Invoice Pembelian</div>
              <input id="purchase_inv" name="purchase_inv" type="text" class="form-control ui-autocomplete-input" placeholder="Ketikkan No Invoice Pembelian" value="" required="" autocomplete="off" data-parsley-required data-parsley-required-message="*Masukan No Invoice">
              <input id="purchase_id" type="hidden" name="purchase_id">
            </div>
            <div class="col-md-7">
              <div class="field-label"><i class="fas fa-box"></i> Produk</div>
              <input id="product_name" name="product_name" type="text" class="form-control ui-autocomplete-input" placeholder="Ketikkan Nama Produk..." value="" required="" autocomplete="off" data-parsley-required data-parsley-required-message="*Masukan Nama Produk">
              <input id="product_id" type="hidden" name="product_id">
            </div>
          </div>
          <hr class="section-divider">
          <div class="row mb-3">
            <div class="col-md-3 mb-2">
              <div class="field-label"><i class="fas fa-warehouse"></i> Gudang</div>
              <select class="form-control js-example-basic-single" id="purchase_warehouse" name="purchase_warehouse">
                <option value="">-- Pilih Gudang --</option>
                <?php foreach ($data['warehouse_list'] as $row) { ?>
                  <option value="<?php echo $row->warehouse_id; ?>"><?php echo $row->warehouse_name; ?></option>
                <?php } ?>
              </select>
            </div>
            <div class="col-md-3 mb-2">
              <div class="field-label"><i class="fas fa-tag"></i> Harga</div>
              <input id="temp_price" name="temp_price" type="text" class="form-control text-right" value="0" required="">
            </div>
            <div class="col-md-2 mb-2">
              <div class="field-label"><i class="fas fa-sort-numeric-up"></i> Qty Retur</div>
              <input id="temp_qty" name="temp_qty" type="text" class="form-control text-right" value="0" data-parsley-min="1" data-parsley-min-message="*qty harus lebih besar dari 0" required="">
            </div>
            <div class="col-md-2 mb-2">
              <div class="field-label"><i class="fas fa-shopping-cart"></i> Qty Beli</div>
              <input id="temp_qty_buy" name="temp_qty_buy" type="text" class="form-control text-right" value="0" required="" readonly>
            </div>
            <div class="col-md-2 mb-2">
              <div class="field-label"><i class="fas fa-weight"></i> Berat (GR)</div>
              <input id="temp_weight" name="temp_weight" type="text" class="form-control text-right" value="0">
            </div>
            <div class="col-md-3 mb-2">
              <div class="field-label"><i class="fas fa-motorcycle"></i> Ongkir / KG</div>
              <input id="temp_delivery_price" name="temp_delivery_price" type="text" class="form-control text-right" value="0">
              <input id="temp_total_weight" name="temp_total_weight" type="hidden" value="0">
            </div>
            <div class="col-md-3 mb-2">
              <div class="field-label"><i class="fas fa-cubes"></i> Ongkir / PCS</div>
              <input id="temp_ongkir" name="temp_ongkir" type="text" class="form-control text-right" value="0" readonly>
            </div>
            <div class="col-md-3 mb-2">
              <div class="field-label"><i class="fas fa-calculator"></i> Total</div>
              <input id="temp_total" name="temp_total" type="text" class="form-control text-right" value="0" required="" readonly>
            </div>
          </div>
          <hr class="section-divider">
          <div class="item-row-note">
            <div>
              <div class="field-label"><i class="fas fa-sticky-note"></i> Catatan Item</div>
              <input id="temp_note" name="temp_note" type="text" class="form-control" placeholder="Catatan...">
            </div>
            <div>
              <button id="btnadd_temp" type="submit" class="btn-add-item btn-add-temp" title="Tambah"><i class="fas fa-plus"></i></button>
            </div>
          </div>
        </form>
        <hr class="section-divider" style="margin-top:20px;">
        <div class="table-responsive">
          <table id="temp-retur-purchase-list" class="display table table-striped table-hover">
            <thead>
              <tr><th>SKU</th><th>Produk</th><th>Satuan</th><th>Harga Beli</th><th>Qty Retur</th><th>Ongkir Per Pcs</th><th>Total</th><th>Catatan</th><th>Aksi</th></tr>
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
            <textarea id="purchase_retur_remark" name="purchase_retur_remark" class="form-control" placeholder="Catatan..." maxlength="500" rows="6" style="border-radius:9px;border-color:#dce3ec;font-size:0.88rem;resize:none;"></textarea>
          </div>
          <div class="col-lg-6">
            <div style="background:#f8fafc;border-radius:12px;border:1px solid #e5ebf2;padding:16px 20px;">
              <div class="summary-row grand" style="padding-top:12px;border-bottom:none;">
                <span class="s-label">Total</span>
                <input id="footer_total_invoice" name="footer_total_invoice" type="text" class="form-control text-right s-input" value="0" readonly="" style="border-radius:8px;font-size:0.95rem;font-weight:700;background:#e0f2fe;border-color:#7dd3fc;color:#0369a1;">
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

                <div class="col-sm-2">
                  <div class="form-group">
                    <label>Harga</label>
                    <input id="temp_price" name="temp_price" type="text" class="form-control text-right" value="0" required="">
                  </div>
                </div>


                <div class="col-sm-1">
                  <div class="form-group">
                    <label>Qty Retur</label>
                    <input id="temp_qty" name="temp_qty" type="text" class="form-control" value="0" data-parsley-min="1" data-parsley-min-message="*qty harus lebih besar dari 0" required="">
                  </div>
                </div>

                <div class="col-sm-1">
                  <div class="form-group">
                    <label>Qty Beli</label>
                    <input id="temp_qty_buy" name="temp_qty_buy" type="text" class="form-control" value="0" data-parsley-min="1" data-parsley-min-message="*qty harus lebih besar dari 0" required="" readonly>
                  </div>
                </div>

                <div class="col-sm-2">
                  <div class="form-group">
                    <label>Berat(GR)</label>
                    <input id="temp_weight" name="temp_weight" type="text" class="form-control text-right" value="0">
                  </div>
                </div>

                <div class="col-sm-2">
                  <div class="form-group">
                    <label>Ongkir / KG</label>
                    <input id="temp_delivery_price" name="temp_delivery_price" type="text" class="form-control text-right" value="0">
                    <input id="temp_total_weight" name="temp_total_weight" type="hidden" class="form-control text-right" value="0" readonly>
                  </div>
                </div>

                <div class="col-sm-2">
                  <div class="form-group">
                    <label>Ongkir / PCS</label>
                    <input id="temp_ongkir" name="temp_ongkir" type="text" class="form-control text-right" value="0" readonly>
                  </div>
                </div>

                <div class="col-sm-2">
                  <div class="form-group">
                    <label>Total</label>
                    <input id="temp_total" name="temp_total" type="text" class="form-control text-right" value="0" required="" readonly>
                  </div>
                </div>

                <div class="col-sm-5">
                  <div class="form-group">
                    <label>Catatan</label>
                    <input id="temp_note" name="temp_note" type="text" class="form-control text-left">
                  </div>
                </div>

                <div class="col-sm-1" style="padding-right: 62px;">

                  <!-- text input -->

                  <label>&nbsp;</label>

                  <div class="form-group">

                    <button id="btnadd_temp" class="btn btn-md btn-primary rounded-circle float-right btn-add-temp"><i class="fas fa-plus"></i></button>

                  </div>

                </div>

              </div>
            </form>

            <div class="table-responsive">
              <table id="temp-retur-purchase-list" class="display table table-striped table-hover" >
                <thead>
                  <tr>
                    <th>SKU</th>
                    <th>Produk</th>
                    <th>Satuan</th>
                    <th>Harga Beli</th>
                    <th>Qty Retur</th>
                    <th>Ongkir Per Pcs</th>
                    <th>Total</th>
                    <th>Catatan</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                </tbody>
              </table>
            </div>

            <div class="row form-space">
              <div class="col-lg-6">
                <div class="form-group">
                  <div class="col-sm-12">
                    <textarea id="purchase_retur_remark" name="purchase_retur_remark" class="form-control" placeholder="Catatan" maxlength="500" rows="8"></textarea>
                  </div>
                </div>
              </div>

              <div class="col-lg-6 text-right">
                <div class="form-group row">
                  <label for="footer_total_invoice" class="col-sm-7 col-form-label text-right:">Total :</label>
                  <div class="col-sm-5">
                    <input id="footer_total_invoice" name="footer_total_invoice" type="text" class="form-control text-right" value="0" readonly="">
                  </div>
                </div>
                <div class="form-group row" style="margin-top: 20px;">
                  <div class="col-sm-12">
                    <button id="btncancel" class="btn btn-danger"><i class="fas fa-times-circle"></i> Batal</button>
                    <button id="btnsave" class="btn btn-success button-header-custom-save"><i class="fas fa-save"></i> Simpan</button>
                  </div>
                </div>
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



  $('#purchase_warehouse').prop('disabled', false);

  let temp_price = new AutoNumeric('#temp_price', {
    currencySymbol : 'Rp. ',
    decimalCharacter : ',',
    decimalPlaces: 0,
    decimalPlacesShownOnFocus: 0,
    digitGroupSeparator : '.',
  });

  let temp_delivery_price = new AutoNumeric('#temp_delivery_price', {
    currencySymbol : 'Rp. ',
    decimalCharacter : ',',
    decimalPlaces: 0,
    decimalPlacesShownOnFocus: 0,
    digitGroupSeparator : '.',
  });

  

  let temp_ongkir = new AutoNumeric('#temp_ongkir', {
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

  $('#purchase_inv').autocomplete({ 
    minLength: 2,
    source: function(req, add) {
      $.ajax({
        url: '<?php echo base_url(); ?>/Purchase/search_purchase_inv?id='+$('#purchase_supplier').val(),
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
            $("#purchase_inv").val("");
          }
        },
      });
    },
    select: function(event, ui) {
      let id = ui.item.id;
      $("#purchase_id").val(id);
    },
  });


  $('#product_name').autocomplete({ 
    minLength: 2,
    source: function(req, add) {
      $.ajax({
        url: '<?php echo base_url(); ?>/Purchase/search_product_retur?id='+$('#purchase_id').val(),
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
      purchase_warehouse        = ui.item.warehouse;
      purchase_price            = ui.item.purchase_price;
      purchase_qty_buy          = ui.item.purchase_qty;
      purchase_ongkir           = ui.item.purchase_ongkir;
      purchase_weight           = ui.item.purchase_weight;
      purchase_total_weight     = ui.item.purchase_total_weight;
      purchase_total_ongkir     = ui.item.purchase_total_ongkir;
      $("#product_id").val(id);
      $('#purchase_warehouse').val(purchase_warehouse);
      $('#purchase_warehouse').trigger('change');
      temp_price.set(purchase_price);
      $('#temp_qty_buy').val(purchase_qty_buy);
      $('#temp_weight').val(purchase_weight);
      temp_delivery_price.set(purchase_ongkir);
      temp_ongkir.set(purchase_total_ongkir);
    },
  });


  $('#temp_qty').on('input', function (event) {
    let temp_price_val = parseInt(temp_price.get());
    let temp_qty_val = $('#temp_qty').val();
    let temp_weight_val = $('#temp_weight').val();
    let temp_total_weight_val = temp_qty_val * temp_weight_val;
    $('#temp_total_weight').val(temp_total_weight_val);
    let temp_ongkir_val = parseInt(temp_ongkir.get());
    let temp_total_val = temp_price_val * temp_qty_val + temp_ongkir_val;
    temp_total.set(temp_total_val)
  })

  $('#temp_price').on('input', function (event) {
    let temp_price_val = parseInt(temp_price.get());
    let temp_qty_val = $('#temp_qty').val();
    let temp_weight_val = $('#temp_weight').val();
    let temp_total_weight_val = temp_qty_val * temp_weight_val;
    $('#temp_total_weight').val(temp_total_weight_val);
    let temp_ongkir_val = parseInt(temp_ongkir.get());
    let temp_total_val = temp_price_val * temp_qty_val + temp_ongkir_val;
    temp_total.set(temp_total_val);
  })

  /*$('#temp_ongkir').on('input', function (event) {
    calculation_temp();
  })*/

  $('#temp_weight').on('input', function (event) {
    let temp_qty_val = $('#temp_qty').val();
    if(temp_qty_val == 0){
      temp_delivery_price.set(0);
      Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: "Silahakn Isi Qty Terlebih Dahulu",
      })
    }else{
      let temp_price_val = parseInt(temp_price.get());
      let temp_delivery_price_val = parseInt(temp_delivery_price.get());
      let temp_weight = $('#temp_weight').val();
      let temp_ongkir_val = temp_delivery_price_val / 1000 * temp_weight;
      temp_ongkir.set(temp_ongkir_val);
      let temp_total_val = temp_price_val * temp_qty_val + temp_ongkir_val * temp_qty_val;
      temp_total.set(temp_total_val);
    }
  })

  $('#temp_delivery_price').on('input', function (event) {
    let temp_qty_val = $('#temp_qty').val();
    if(temp_qty_val == 0){
      temp_delivery_price.set(0);
      Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: "Silahakn Isi Qty Terlebih Dahulu",
      })
    }else{
      let temp_price_val = parseInt(temp_price.get());
      let temp_delivery_price_val = parseInt(temp_delivery_price.get());
      let temp_weight = $('#temp_weight').val();
      let temp_ongkir_val = temp_delivery_price_val / 1000 * temp_weight;
      temp_ongkir.set(temp_ongkir_val);
      let temp_total_val = temp_price_val * temp_qty_val + temp_ongkir_val;
      temp_total.set(temp_total_val);
    }
  })

  function calculation_temp()
  {
    let temp_price_val  = parseInt(temp_price.get());
    let temp_qty_val    = $('#temp_qty').val();
    let temp_ongkir_val = parseInt(temp_ongkir.get());
    let temp_total_val  = temp_price_val * temp_qty_val + temp_ongkir_val;
    temp_total.set(temp_total_val);
  }

  $('#btnadd_temp').click(function(e){
    e.preventDefault();
    var purchase_id          = $("#purchase_id").val();
    var purchase_inv         = $("#purchase_inv").val();
    var product_id           = $("#product_id").val();
    var product_name         = $("#product_name").val();
    var purchase_warehouse   = $("#purchase_warehouse").val();
    var temp_price_submit    = parseInt(temp_price.get());
    var temp_qty             = $("#temp_qty").val();
    var temp_qty_buy         = $("#temp_qty_buy").val();
    var temp_ongkir_submit   = parseInt(temp_ongkir.get());
    var temp_total_submit    = parseInt(temp_total.get());
    var temp_note            = $("#temp_note").val();
    var supplier_id          = $('#purchase_supplier').val();

    if($('#formaddtemp').parsley().validate({force: true})){
      $.ajax({
        type: "POST",
        url: "<?php echo base_url(); ?>Purchase/add_temp_retur_purchase",
        dataType: "json",
        data: {purchase_id:purchase_id, purchase_inv:purchase_inv, product_id:product_id, product_name:product_name, purchase_warehouse:purchase_warehouse, temp_price_submit:temp_price_submit, temp_qty:temp_qty, temp_qty_buy:temp_qty_buy, temp_ongkir_submit:temp_ongkir_submit, temp_total_submit:temp_total_submit, temp_note:temp_note, supplier_id:supplier_id},
        success : function(data){
          if (data.code == "200"){
            let title = 'Tambah Data';
            let message = 'Data Berhasil Di Tambah';
            let state = 'info';
            notif_success(title, message, state);
            $('#temp-retur-purchase-list').DataTable().ajax.reload();
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
      url: "<?php echo base_url(); ?>Purchase/check_temp_retur_purchase",
      dataType: "json",
      data: {},
      success : function(data){
        if (data.code == "200"){
          let row = data.data[0];
          footer_total_invoice.set(row.sub_total);
          $('#purchase_supplier').val(row.supplier);
          $('#purchase_supplier').trigger('change');
        }
      }
    });
  }

  function clear_input()
  {
    $("#purchase_id").val("");
    $("#purchase_inv").val("");
    $("#product_id").val("");
    $("#product_name").val("");
    $("#purchase_warehouse").val("");
    temp_price.set(0);
    $("#temp_qty").val(0);
    $("#temp_qty_buy").val(0);
    temp_ongkir.set(0);
    temp_total.set(0);
    $("#temp_note").val("");
  }

  function edit_temp(id, purchase_id)
  {
    $.ajax({
      type: "POST",
      url: "<?php echo base_url(); ?>Purchase/get_edit_temp_retur_purchase",
      dataType: "json",
      data: {id:id, purchase_id:purchase_id},
      success : function(data){
        if (data.code == "200"){
          let row = data.result[0];
          $("#purchase_inv").val(row.temp_retur_purchase_b_inv);
          $("#purchase_id").val(row.temp_retur_purchase_b_id);
          $("#product_name").val(row.temp_retur_purchase_product_name);
          $("#product_id").val(row.temp_retur_purchase_product_id);
          $("#purchase_warehouse").val(row.temp_retur_purchase_warehouse_id);
          $('#purchase_warehouse').trigger('change');
          temp_price.set(row.temp_retur_purchase_price);
          $("#temp_qty").val(row.temp_retur_purchase_qty);
          $("#temp_qty_buy").val(row.temp_retur_purchase_qty_buy);
          temp_ongkir.set(row.temp_retur_purchase_ongkir);
          temp_total.set(row.temp_retur_purchase_total);
          $("#temp_note").val(row.temp_retur_purchase_note);
        }
      }
    });
  }

  function temp_retur_purchase_table(){
    $('#temp-retur-purchase-list').DataTable( {
      serverSide: true,
      search: true,
      processing: true,
      ordering: false,
      retrieve: true,
      ajax: {
        url: '<?php echo base_url(); ?>Purchase/temp_retur_purchase_list',
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
        {data: 8}
      ]
    });
    check_tempt_data();
  }

  function deletes(id, purchase_id)
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
          url: "<?php echo base_url(); ?>Purchase/delete_temp_retur_purchase",
          dataType: "json",
          data: {id:id, purchase_id:purchase_id},
          success : function(data){
            if (data.code == "200"){
              let title = 'Hapus Data';
              let message = 'Data Berhasil Di Hapus';
              let state = 'danger';
              notif_success(title, message, state);
              check_tempt_data();
              $('#temp-retur-purchase-list').DataTable().ajax.reload();
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
    var retur_purchase_supplier                  = $("#purchase_supplier").val();
    var retur_purchase_date                      = $("#retur_purchase_date").val();
    var footer_total_invoice_val                 = parseInt(footer_total_invoice.get());
    var purchase_retur_remark                    = $("#purchase_retur_remark").val();
    $.ajax({
      type: "POST",
      url: "<?php echo base_url(); ?>Purchase/save_retur_purchase",
      dataType: "json",
      data: {retur_purchase_supplier:retur_purchase_supplier, retur_purchase_date:retur_purchase_date, footer_total_invoice_val:footer_total_invoice_val, purchase_retur_remark:purchase_retur_remark},
      success : function(data){
        if (data.code == "200"){
          window.location.href = "<?php echo base_url(); ?>/Purchase/returpurchase";
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