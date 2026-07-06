<?php 
define('DOC_ROOT_PATH', $_SERVER['DOCUMENT_ROOT'].'/');
require DOC_ROOT_PATH . $this->config->item('header');
?>
</div>
<style>
  .purchase-page-wrap { padding: 20px 24px; }
  .purchase-section {
    background: #fff;
    border-radius: 16px;
    border: 1px solid #e8edf3;
    box-shadow: 0 2px 12px rgba(0,0,0,0.06);
    margin-bottom: 20px;
    overflow: hidden;
  }
  .purchase-section-header {
    display: flex;
    align-items: center;
    gap: 10px;
    padding: 14px 22px;
    border-bottom: 1px solid #f0f4f8;
    background: #f8fafc;
  }
  .purchase-section-header .section-icon {
    width: 34px;
    height: 34px;
    border-radius: 9px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 0.85rem;
    flex-shrink: 0;
  }
  .purchase-section-header h6 {
    font-size: 0.82rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.7px;
    color: #64748b;
    margin: 0;
  }
  .purchase-section-body { padding: 20px 22px; }
  .field-group { margin-bottom: 0; }
  .field-label {
    font-size: 0.8rem;
    font-weight: 600;
    color: #6b7280;
    margin-bottom: 5px;
    display: flex;
    align-items: center;
    gap: 5px;
  }
  .field-label i { font-size: 0.72rem; color: #9ca3af; }
  .purchase-section-body .form-control,
  .purchase-section-body .select2-container--default .select2-selection--single {
    border-radius: 9px !important;
    border-color: #dce3ec;
    font-size: 0.88rem;
    background: #fafbfc;
  }
  .purchase-section-body .form-control[readonly] {
    background: #f1f5f9;
    color: #64748b;
  }
  .purchase-section-body .select2-container--default .select2-selection--single {
    height: 38px;
  }
  .purchase-section-body .select2-container--default .select2-selection--single .select2-selection__rendered {
    line-height: 36px;
    color: #374151;
    font-size: 0.88rem;
  }
  .purchase-section-body .select2-container--default .select2-selection--single .select2-selection__arrow {
    height: 36px;
  }
  .page-header-bar {
    background: linear-gradient(135deg, #1e3a5f 0%, #2d6a9f 100%);
    border-radius: 16px;
    padding: 20px 26px;
    margin-bottom: 20px;
    box-shadow: 0 6px 24px rgba(30,58,95,0.15);
    display: flex;
    align-items: center;
    gap: 14px;
  }
  .page-header-bar .header-icon {
    width: 46px;
    height: 46px;
    border-radius: 12px;
    background: rgba(255,255,255,0.15);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.2rem;
    color: #fff;
    flex-shrink: 0;
  }
  .page-header-bar h5 { color:#fff; font-weight:700; margin:0; font-size:1.1rem; }
  .page-header-bar small { color: rgba(255,255,255,0.65); font-size:0.8rem; }
  .item-input-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 14px 20px;
    margin-bottom: 16px;
  }
  .item-input-grid.three-col { grid-template-columns: 1fr 1fr 1fr; }
  .item-row-note {
    display: grid;
    grid-template-columns: 1fr auto;
    gap: 12px;
    align-items: end;
  }
  .btn-add-item {
    width: 42px;
    height: 38px;
    border-radius: 10px;
    background: linear-gradient(135deg, #2d6a9f, #1e3a5f);
    border: none;
    color: #fff;
    font-size: 1rem;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
    box-shadow: 0 3px 10px rgba(45,106,159,0.3);
    transition: transform 0.15s, box-shadow 0.15s;
  }
  .btn-add-item:hover {
    transform: translateY(-1px);
    box-shadow: 0 5px 14px rgba(45,106,159,0.4);
  }
  .section-divider {
    border: none;
    border-top: 1px dashed #e5ebf2;
    margin: 16px 0;
  }
  .summary-row {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 8px 0;
    border-bottom: 1px solid #f1f5f9;
    font-size: 0.88rem;
  }
  .summary-row:last-child { border-bottom: none; }
  .summary-row .s-label { font-weight: 600; color: #6b7280; }
  .summary-row .s-input { width: 180px; }
  .summary-row.grand .s-label { color: #1e293b; font-size: 0.95rem; font-weight: 700; }
  @media (max-width: 768px) {
    .item-input-grid, .item-input-grid.three-col { grid-template-columns: 1fr 1fr; }
    .purchase-page-wrap { padding: 14px 12px; }
  }
  @media (max-width: 480px) {
    .item-input-grid, .item-input-grid.three-col { grid-template-columns: 1fr; }
  }
</style>

<div class="container-fluid" style="margin-top: 70px;">
  <div class="purchase-page-wrap">
    <div class="page-header-bar">
      <div class="header-icon"><i class="fas fa-shopping-cart"></i></div>
      <div>
        <h5>Tambah Pembelian</h5>
        <small>Isi semua data pembelian, tambahkan item, lalu simpan.</small>
      </div>
    </div>

    <div class="row mb-4 gx-3">
      <div class="col-md-3 mb-3 mb-md-0 d-flex">
        <div class="purchase-section mb-0 flex-fill">
          <div class="purchase-section-header">
            <div class="section-icon" style="background:#e0f2fe; color:#0369a1;"><i class="fas fa-file-alt"></i></div>
            <h6>Dokumen & Tanggal</h6>
          </div>
          <div class="purchase-section-body">
            <div class="mb-3">
              <div class="field-label"><i class="fas fa-hashtag"></i> No Invoice</div>
              <input id="purchase_order_invoice" name="purchase_order_invoice" type="text" class="form-control" value="AUTO" readonly="">
              <input id="purchase_order_id" name="purchase_order_id" type="hidden">
            </div>
            <div class="mb-3">
              <div class="field-label"><i class="fas fa-file-invoice"></i> No Faktur</div>
              <input id="no_faktur_supplier" name="no_faktur_supplier" type="text" class="form-control">
            </div>
            <div class="mb-0">
              <div class="field-label"><i class="fas fa-calendar-day"></i> Tanggal Nota</div>
              <input id="purchase_date" name="purchase_date" type="date" class="form-control" value="<?php echo date('Y-m-d'); ?>">
            </div>
          </div>
        </div>
      </div>

          <div class="col-md-3 d-flex">
        <div class="purchase-section mb-0 flex-fill">
          <div class="purchase-section-header">
            <div class="section-icon" style="background:#e0f7fa; color:#0c4a6e;"><i class="fas fa-handshake"></i></div>
            <h6>Supplier</h6>
          </div>
          <div class="purchase-section-body">
            <div class="mb-3">
              <div class="field-label"><i class="fas fa-building"></i> Supplier</div>
              <select class="form-control js-example-basic-single" id="purchase_supplier" name="purchase_supplier">
                <option value="">-- Pilih Supplier --</option>
                <?php foreach ($data['supplier_list'] as $row) { ?>
                  <option value="<?php echo $row->supplier_id; ?>"><?php echo $row->supplier_name; ?></option>  
                <?php } ?>
              </select>
            </div>
            <div class="mb-3">
              <div class="field-label"><i class="fas fa-tags"></i> Golongan</div>
              <select class="form-control" id="purchase_tax" name="purchase_tax">
                <option value="PPN">BKP</option>
                <option value="NON PPN">NON BKP</option>
              </select>
            </div>
            <div class="mb-3">
              <div class="field-label"><i class="fas fa-user"></i> User</div>
              <input id="po_user_id" name="po_user_id" type="text" class="form-control" value="<?php echo $_SESSION['user_name']; ?>" readonly="">
            </div>
        
          </div>
        </div>
      </div>

      <div class="col-md-3 mb-3 mb-md-0 d-flex">
        <div class="purchase-section mb-0 flex-fill">
          <div class="purchase-section-header">
            <div class="section-icon" style="background:#fef3c7; color:#d97706;"><i class="fas fa-truck"></i></div>
            <h6>Data Pembelian</h6>
          </div>
          <div class="purchase-section-body">
            <div class="mb-3">
              <div class="field-label"><i class="fas fa-hashtag"></i> No PO</div>
              <input id="po_inv" name="po_inv" type="text" class="form-control ui-autocomplete-input" placeholder="Pilih PO">
              <input id="po_id" type="hidden" name="po_id">
            </div>
            <div class="mb-3">
              <div class="field-label"><i class="fas fa-calendar-alt"></i> Tgl Faktur</div>
              <input id="faktur_date" name="faktur_date" type="date" class="form-control" value="<?php echo date('Y-m-d'); ?>" />
            </div>
            <div class="mb-3">
              <div class="field-label"><i class="fas fa-truck"></i> Ekspedisi</div>
              <select class="form-control js-example-basic-single" id="purchase_ekspedisi" name="purchase_ekspedisi">
                <option value="">-- Pilih Ekspedisi --</option>
                <?php foreach ($data['ekspedisi_list'] as $row) { ?>
                  <option value="<?php echo $row->ekspedisi_id; ?>"><?php echo $row->ekspedisi_name; ?></option>  
                <?php } ?>
              </select>
            </div>
            <div class="mb-0">
              <div class="field-label"><i class="fas fa-warehouse"></i> Gudang</div>
              <select class="form-control js-example-basic-single" id="purchase_warehouse" name="purchase_warehouse">
                <option value="">-- Pilih Gudang --</option>
                <?php foreach ($data['warehouse_list'] as $row) { ?>
                  <option value="<?php echo $row->warehouse_id; ?>"><?php echo $row->warehouse_name; ?></option>  
                <?php } ?>
              </select>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-3 mb-3 mb-md-0 d-flex">
        <div class="purchase-section mb-0 flex-fill">
          <div class="purchase-section-header">
            <div class="section-icon" style="background:#dcfce7; color:#16a34a;"><i class="fas fa-wallet"></i></div>
            <h6>Pembayaran</h6>
          </div>
          <div class="purchase-section-body">
            <div class="mb-3">
              <div class="field-label"><i class="fas fa-clock"></i> T.O.P</div>
              <select class="form-control js-example-basic-single" onchange="duedate_cal()" id="purchase_top" name="purchase_top">
                <option value="">-- Pilih T.O.P --</option>
                <option value="0">CBD</option>
                <option value="7">JT7</option>
                <option value="15">JT15</option>
                <option value="30">JT30</option>
                <option value="45">JT45</option>
                <option value="60">JT60</option>
                <option value="90">JT90</option>
              </select>
            </div>
            <div class="mb-3">
              <div class="field-label"><i class="fas fa-calendar-times"></i> Jatuh Tempo</div>
              <input id="purchase_due_date" name="purchase_due_date" type="date" class="form-control" value="" readonly="">
            </div>
            <div class="mb-0">
              <div class="field-label"><i class="fas fa-credit-card"></i> Metode Bayar</div>
              <select class="form-control js-example-basic-single" id="purchase_payment_method" name="purchase_payment_method">
                <option value="">-- Pilih Metode Bayar --</option>
                <?php foreach ($data['payment_list'] as $row) { ?>
                  <option value="<?php echo $row->payment_id; ?>"><?php echo $row->payment_name; ?></option>  
                <?php } ?>
              </select>
            </div>
          </div>
        </div>
      </div>

  
    </div>

    <div class="purchase-section">
      <div class="purchase-section-header">
        <div class="section-icon" style="background:#ede9fe; color:#7c3aed;"><i class="fas fa-boxes"></i></div>
        <h6>Input Item</h6>
      </div>
      <div class="purchase-section-body">
        <form id="formaddtemp">
          <div class="row mb-3">
            <div class="col-md-6 mb-3">
              <div class="field-label"><i class="fas fa-box"></i> Produk</div>
              <input id="product_name" name="product_name" type="text" class="form-control ui-autocomplete-input" placeholder="Ketikkan nama produk..." value="" required="" autocomplete="off" data-parsley-required data-parsley-required-message="*Masukan Nama Produk">
              <input id="product_id" type="hidden" name="product_id">
            </div>
            <div class="col-md-3 mb-3">
              <div class="field-label"><i class="fas fa-tag"></i> Harga Beli / Unit</div>
              <input id="temp_price" name="temp_price" class="form-control text-right" value="0" required="">
              <input id="temp_dpp" name="temp_dpp" type="hidden" value="Rp 0.00">
              <input id="temp_tax" name="temp_tax" type="hidden" value="Rp 0.00">
            </div>
            <div class="col-md-3 mb-3">
              <div class="field-label"><i class="fas fa-sort-numeric-up"></i> Qty</div>
              <input id="temp_qty" name="temp_qty" type="text" class="form-control text-right" value="0" data-parsley-min="1" data-parsley-min-message="*qty harus lebih besar dari 0" required="">
            </div>

            <div class="col-md-3 mb-3">
              <div class="field-label"><i class="fas fa-weight"></i> Berat (GR)</div>
              <input id="temp_weight" name="temp_weight" type="text" class="form-control text-right" value="0">
            </div>
            <div class="col-md-3 mb-3">
              <div class="field-label"><i class="fas fa-motorcycle"></i> Ongkir / KG</div>
              <input id="temp_delivery_price" name="temp_delivery_price" type="text" class="form-control text-right" value="0">
              <input id="temp_total_weight" name="temp_total_weight" type="hidden" value="0">
            </div>
            <div class="col-md-3 mb-3">
              <div class="field-label"><i class="fas fa-cubes"></i> Ongkir / PCS</div>
              <input id="temp_ongkir" name="temp_ongkir" type="text" class="form-control text-right" value="0" readonly>
            </div>
            <div class="col-md-3 mb-3">
              <div class="field-label"><i class="fas fa-calculator"></i> Total</div>
              <input id="temp_total" name="temp_total" type="text" class="form-control text-right" value="0" readonly="">
            </div>
          </div>

          <div class="row align-items-end">
            <div class="col-md-9 mb-3">
              <div class="field-label"><i class="fas fa-sticky-note"></i> Catatan Item</div>
              <input id="temp_note" name="temp_note" type="text" class="form-control" placeholder="Catatan tambahan untuk item ini...">
            </div>
            <div class="col-md-1 mb-3 d-flex">
              <button id="btnadd_temp" type="submit" class="btn-add-item" title="Tambah Item"><i class="fas fa-plus"></i></button>
            </div>
          </div>
        </form>

        <hr class="section-divider" style="margin-top:20px;">

        <div class="table-responsive">
          <table id="temp-purchase-list" class="display table table-striped table-hover">
            <thead>
              <tr>
                <th>SKU</th>
                <th>Produk</th>
                <th>Satuan</th>
                <th>Harga</th>
                <th>Harga Jual (Toko)</th>
                <th>Qty</th>
                <th>Ongkir</th>
                <th>Total</th>
                <th>Catatan</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <div class="purchase-section">
      <div class="purchase-section-header">
        <div class="section-icon" style="background:#fce7f3; color:#be185d;"><i class="fas fa-receipt"></i></div>
        <h6>Catatan & Total</h6>
      </div>
      <div class="purchase-section-body">
        <div class="row">
          <div class="col-lg-6 mb-3">
            <div class="field-label"><i class="fas fa-sticky-note"></i> Catatan Pembelian</div>
            <textarea id="purchase_order_remark" name="purchase_order_remark" class="form-control" placeholder="Catatan untuk purchase ini..." maxlength="500" rows="8" style="border-radius:9px; border-color:#dce3ec; font-size:0.88rem; resize:none;"></textarea>
          </div>
          <div class="col-lg-6">
            <div style="background:#f8fafc; border-radius:12px; border:1px solid #e5ebf2; padding:16px 20px;">
              <div class="summary-row">
                <span class="s-label">Sub Total</span>
                <input id="footer_sub_total" name="footer_sub_total" type="text" class="form-control text-right s-input" value="0" readonly="" style="border-radius:8px; font-size:0.88rem;">
              </div>
              <div class="summary-row">
                <span class="s-label">Discount</span>
                <div class="s-input">
                  <input id="footer_discount1" name="footer_discount1" type="hidden" value="Rp 0.00">
                  <input id="footer_discount2" name="footer_discount2" type="hidden" value="Rp 0.00">
                  <input id="footer_discount3" name="footer_discount3" type="hidden" value="Rp 0.00">
                  <input id="footer_discount_percentage1" name="footer_discount_percentage1" type="hidden" value="0.00%">
                  <input id="footer_discount_percentage2" name="footer_discount_percentage2" type="hidden" value="0.00%">
                  <input id="footer_discount_percentage3" name="footer_discount_percentage3" type="hidden" value="0.00%">
                  <input id="footer_total_discount" name="footer_total_discount" data-bs-toggle="modal" data-bs-target="#footerdiscount" type="text" class="form-control text-right" value="0" readonly="" style="border-radius:8px; font-size:0.88rem; cursor:pointer;">
                </div>
              </div>
              <div class="summary-row">
                <span class="s-label">DPP</span>
                <input id="footer_dpp" name="footer_dpp" type="text" class="form-control text-right s-input" value="0" readonly="" style="border-radius:8px; font-size:0.88rem;">
              </div>
              <div class="summary-row">
                <span class="s-label">PPN 11%</span>
                <input id="footer_total_ppn" name="footer_total_ppn" type="text" class="form-control text-right s-input" value="0" readonly="" style="border-radius:8px; font-size:0.88rem;">
              </div>
              <div class="summary-row">
                <span class="s-label">Ongkir</span>
                <input id="footer_total_ongkir" name="footer_total_ongkir" type="text" class="form-control text-right s-input" value="0" readonly="" style="border-radius:8px; font-size:0.88rem;">
              </div>
              <div class="summary-row grand" style="margin-top:8px; padding-top:12px; border-top:2px solid #e2e8f0; border-bottom:none;">
                <span class="s-label">Grand Total</span>
                <input id="footer_total_invoice" name="footer_total_invoice" type="text" class="form-control text-right s-input" value="0" readonly="" style="border-radius:8px; font-size:0.95rem; font-weight:700; background:#e0f2fe; border-color:#7dd3fc; color:#0369a1;">
              </div>
              <div class="d-flex justify-content-end gap-2 mt-4">
                <button id="btncancel" class="btn btn-danger" style="border-radius:9px; font-weight:600; padding:8px 22px;"><i class="fas fa-times-circle mr-1"></i> Batal</button>
                <button id="btnsave" class="btn btn-success button-header-custom-save" style="border-radius:9px; font-weight:600; padding:8px 22px;"><i class="fas fa-save mr-1"></i> Simpan</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="footerdiscount" tabindex="-1" aria-labelledby="exampleModaleditLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" id="title-frmfooterdiscount">Diskon</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form id="frmfooterdiscount" class="form-horizontal">
            <div class="modal-body">
              <div class="form-group">
                <div class="row">
                  <label for="edit_footer_discount1_lbl" class="col-sm-12">Diskon 1</label>
                  <div class="col-md-6">
                    <input type="text" class="form-control" id="edit_footer_discount_percentage1" name="edit_footer_discount_percentage1" value="0">
                  </div>
                  <div class="col-md-6">
                    <input type="text" class="form-control" id="edit_footer_discount1" name="edit_footer_discount1" value="0" readonly>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="row">
                  <label for="edit_footer_discount2_lbl" class="col-sm-12">Diskon 2</label>
                  <div class="col-md-6">
                    <input type="text" class="form-control" id="edit_footer_discount_percentage2" name="edit_footer_discount_percentage2" value="0">
                  </div>
                  <div class="col-md-6">
                    <input type="text" class="form-control" id="edit_footer_discount2" name="edit_footer_discount2" value="0" readonly>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="row">
                  <label for="edit_footer_discount3_lbl" class="col-sm-12">Diskon 3</label>
                  <div class="col-md-6">
                    <input type="text" class="form-control" id="edit_footer_discount_percentage3" name="edit_footer_discount_percentage3" value="0">
                  </div>
                  <div class="col-md-6">
                    <input type="text" class="form-control" id="edit_footer_discount3" name="edit_footer_discount3" value="0" readonly>
                  </div>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="fas fa-times-circle"></i> Batal</button>
              <button type="button" id="btneditdisc"  class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
            </div>
          </form>
        </div>
      </div>
    </div>

  </div>
</div>

<?php 
require DOC_ROOT_PATH . $this->config->item('footer');
?>

<script>

  //$('#purchase_top').prop('disabled', true);
  //$('#purchase_payment_method').prop('disabled', true);
  //$('#purchase_ekspedisi').prop('disabled', true);
  $('#purchase_tax').prop('disabled', true);
  //$('#purchase_warehouse').prop('disabled', true);
  $('#purchase_due_date').prop('disabled', true);
  $('#po_user_id').prop('disabled', true);
  //$('#purchase_supplier').prop('disabled', true);
  

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

  
  let footer_sub_total = new AutoNumeric('#footer_sub_total', {
    currencySymbol : 'Rp. ',
    decimalCharacter : ',',
    decimalPlaces: 0,
    decimalPlacesShownOnFocus: 0,
    digitGroupSeparator : '.',
  });

  let footer_total_discount = new AutoNumeric('#footer_total_discount', {
    currencySymbol : 'Rp. ',
    decimalCharacter : ',',
    decimalPlaces: 0,
    decimalPlacesShownOnFocus: 0,
    digitGroupSeparator : '.',
  });

  let footer_dpp = new AutoNumeric('#footer_dpp', {
    currencySymbol : 'Rp. ',
    decimalCharacter : ',',
    decimalPlaces: 0,
    decimalPlacesShownOnFocus: 0,
    digitGroupSeparator : '.',
  });

  let footer_total_ppn = new AutoNumeric('#footer_total_ppn', {
    currencySymbol : 'Rp. ',
    decimalCharacter : ',',
    decimalPlaces: 0,
    decimalPlacesShownOnFocus: 0,
    digitGroupSeparator : '.',
  });

  let footer_total_ongkir = new AutoNumeric('#footer_total_ongkir', {
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

  let edit_footer_discount1 = new AutoNumeric('#edit_footer_discount1', {
    currencySymbol : 'Rp. ',
    decimalCharacter : ',',
    decimalPlaces: 0,
    decimalPlacesShownOnFocus: 0,
    digitGroupSeparator : '.',
  });

  let edit_footer_discount2 = new AutoNumeric('#edit_footer_discount2', {
    currencySymbol : 'Rp. ',
    decimalCharacter : ',',
    decimalPlaces: 0,
    decimalPlacesShownOnFocus: 0,
    digitGroupSeparator : '.',
  });

  let edit_footer_discount3 = new AutoNumeric('#edit_footer_discount3', {
    currencySymbol : 'Rp. ',
    decimalCharacter : ',',
    decimalPlaces: 0,
    decimalPlacesShownOnFocus: 0,
    digitGroupSeparator : '.',
  });
  

  let edit_footer_discount_percentage1 = new AutoNumeric('#edit_footer_discount_percentage1', {
    allowDecimalPadding: "floats",
    alwaysAllowDecimalCharacter: true,
    suffixText: "%"
  });

  let edit_footer_discount_percentage2 = new AutoNumeric('#edit_footer_discount_percentage2', {
    allowDecimalPadding: "floats",
    alwaysAllowDecimalCharacter: true,
    suffixText: "%"
  });

  let edit_footer_discount_percentage3 = new AutoNumeric('#edit_footer_discount_percentage3', {
    allowDecimalPadding: "floats",
    alwaysAllowDecimalCharacter: true,
    suffixText: "%"
  });


  $(document).ready(function() {
    temppurchase_table();
  });

  function temppurchase_table(){
    $('#temp-purchase-list').DataTable( {
      serverSide: true,
      search: true,
      processing: true,
      ordering: false,
      retrieve: true,
      ajax: {
        url: '<?php echo base_url(); ?>Purchase/temp_purchase_list',
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


  $('#po_inv').autocomplete({ 
    minLength: 2,
    source: function(req, add) {
      $.ajax({
        url: '<?php echo base_url(); ?>/Purchase/search_po_purchase',
        dataType: 'json',
        type: 'GET',
        data: req,
        success: function(res) {
          if (res.success == true) {
            add(res.data);
          }else{
            $('#po_inv').val('');
          }
        },
      });
    },
    select: function(event, ui) {
      var po_id = ui.item.id;
      $.ajax({
        type: "POST",
        url: "<?php echo base_url(); ?>Purchase/copy_po_to_temp_purchase",
        dataType: "json",
        data: {po_id:po_id},
        success : function(data){
          if (data.code == "200"){
            let title = 'Tambah Data';
            let message = 'Berhasil Pilih PO';
            let state = 'info';
            notif_success(title, message, state);
            $('#temp-purchase-list').DataTable().ajax.reload();
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

  function deletes(id)
  {
    Swal.fire({
      title: 'Konfirmasi?',
      text: "Apakah Anda Yakin Menghapus Data?",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Hapus'
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
          type: "POST",
          url: "<?php echo base_url(); ?>Purchase/delete_temp_purchase",
          dataType: "json",
          data: {id:id},
          success : function(data){
            if (data.code == "200"){
              $('#temp-purchase-list').DataTable().ajax.reload();
              let title = 'Hapus Data';
              let message = 'Data Berhasil Di Hapus';
              let state = 'danger';
              notif_success(title, message, state);
            } else {
              Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: data.msg,
              })
            }
          }
        });
      }
    })
  }

  $('#product_name').autocomplete({ 
    minLength: 2,
    source: function(req, add) {
      $.ajax({
        url: '<?php echo base_url(); ?>/Purchase/search_product_po?sup_id='+$('#po_supplier').val(),
        dataType: 'json',
        type: 'GET',
        data: req,
        success: function(res) {
          if (res.success == true) {
            add(res.data);
          }else{
            $('#submission_inv').val('');
          }
        },
      });
    },
    select: function(event, ui) {
      let id = ui.item.id;
      let product_name = ui.item.product_name;
      let product_id = ui.item.product_id;
      let product_price = ui.item.product_price;
      let product_weight = ui.item.product_weight;
      $('#product_name').val(product_name);
      $('#product_id').val(product_id);
      temp_price.set(product_price);
      $('#temp_weight').val(product_weight);
    },
  });


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

  $('#temp_qty').on('input', function (event) {
    let temp_price_val = parseInt(temp_price.get());
    let temp_qty_val = $('#temp_qty').val();
    let temp_weight_val = $('#temp_weight').val();
    let temp_total_weight_val = temp_qty_val * temp_weight_val;
    $('#temp_total_weight').val(temp_total_weight_val);
    let temp_ongkir_val = parseInt(temp_ongkir.get());
    let temp_total_val = temp_price_val * temp_qty_val + temp_ongkir_val;
    temp_total.set(temp_total_val);
  })



  /*$('#temp_delivery_price').on('input', function (event) {
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
      let temp_total_weight_val = $('#temp_total_weight').val();
      let temp_ongkir_val = temp_delivery_price_val * temp_total_weight_val;
      temp_ongkir.set(temp_ongkir_val);
      let temp_total_val = temp_price_val * temp_qty_val + temp_ongkir_val;
      temp_total.set(temp_total_val);
    }
  })*/

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
      let temp_total_val = temp_price_val * temp_qty_val + temp_ongkir_val * temp_qty_val;
      temp_total.set(temp_total_val);
    }
  })

  $('#edit_footer_discount_percentage1').on('input', function (event) {
    let footer_sub_total_val = parseInt(footer_sub_total.get());
    let edit_footer_discount_percentage1_val = parseInt(edit_footer_discount_percentage1.get());
    let edit_footer_discount1_val = footer_sub_total_val * edit_footer_discount_percentage1_val / 100;
    edit_footer_discount1.set(edit_footer_discount1_val);
  })

  $('#edit_footer_discount_percentage2').on('input', function (event) {
    let footer_sub_total_val = parseInt(footer_sub_total.get());
    let edit_footer_discount_percentage2_val = parseInt(edit_footer_discount_percentage2.get());
    let edit_footer_discount1_val = parseInt(edit_footer_discount1.get());
    let edit_footer_discount2_val = (footer_sub_total_val - edit_footer_discount1_val) * edit_footer_discount_percentage2_val / 100;
    edit_footer_discount2.set(edit_footer_discount2_val);
  })

  $('#edit_footer_discount_percentage3').on('input', function (event) {
    let footer_sub_total_val = parseInt(footer_sub_total.get());
    let edit_footer_discount_percentage3_val = parseInt(edit_footer_discount_percentage3.get());
    let edit_footer_discount1_val = parseInt(edit_footer_discount1.get());
    let edit_footer_discount2_val = parseInt(edit_footer_discount2.get());
    let edit_footer_discount3_val = (footer_sub_total_val - edit_footer_discount1_val - edit_footer_discount2_val) * edit_footer_discount_percentage3_val / 100;
    edit_footer_discount3.set(edit_footer_discount3_val);
  })

   $('#btneditdisc').click(function(e){
      e.preventDefault();

      var edit_footer_discount_percentage1_pop  = parseInt(edit_footer_discount_percentage1.get());
      var edit_footer_discount_percentage2_pop  = parseInt(edit_footer_discount_percentage2.get());
      var edit_footer_discount_percentage3_pop  = parseInt(edit_footer_discount_percentage3.get());

      var edit_footer_discount1_pop  = parseInt(edit_footer_discount1.get());
      var edit_footer_discount2_pop  = parseInt(edit_footer_discount2.get());
      var edit_footer_discount3_pop  = parseInt(edit_footer_discount3.get());

      var footer_sub_total_val  = parseInt(footer_sub_total.get());
      var footer_total_ongkir_val = parseInt(footer_total_ongkir.get());
      var purchase_tax = $('#purchase_tax').val();

      var total_disc = edit_footer_discount1_pop + edit_footer_discount2_pop + edit_footer_discount3_pop;
      footer_total_discount.set(total_disc);

      let dpp = footer_sub_total_val - total_disc;
      footer_dpp.set(dpp);

      console.log(purchase_tax);

      let ppn = 0; // deklarasi di luar if

      if(purchase_tax == 'PPN'){
          ppn = dpp * 11 / 100;
      }

      footer_total_ppn.set(ppn);

      let total_all_invoice = dpp + ppn + footer_total_ongkir_val;
      footer_total_invoice.set(total_all_invoice);

      $('#footerdiscount').modal('hide');
  });
   
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

  function edit_temp(id)
  {
    $.ajax({
      type: "POST",
      url: "<?php echo base_url(); ?>Purchase/get_edit_temp_purchase",
      dataType: "json",
      data: {id:id},
      success : function(data){
        if (data.code == "200"){
          var row = data.result[0];
          $("#product_name").val(row.product_name);
          $("#product_id").val(row.temp_product_id);
          temp_price.set(row.temp_purchase_price);
          $("#temp_qty").val(row.temp_purchase_qty);
          $("#temp_weight").val(row.temp_purchase_weight);
          temp_delivery_price.set(row.temp_purchase_ongkir);
          $("#temp_total_weight").val(row.temp_purchase_total_weight);
          temp_ongkir.set(row.temp_purchase_total_ongkir);
          temp_total.set(row.temp_purchase_total);
          $("#temp_note").val(row.temp_purchase_note);
        }
      }
    });  
  }

  function check_tempt_data()
  {
    $.ajax({
      type: "POST",
      url: "<?php echo base_url(); ?>Purchase/check_temp_purchase",
      dataType: "json",
      data: {},
      success : function(data){
        if (data.code == "200"){
          let row = data.data[0];
          footer_sub_total.set(row.sub_total);
          $('#po_inv').val(row.hd_po_invoice);
          $('#po_id').val(row.hd_po_id);
          $('#purchase_top').val(data.hd_po_top_val);
          $('#purchase_top').trigger('change');
          $('#purchase_payment_method').val(row.hd_po_payment);
          $('#purchase_payment_method').trigger('change');
          $('#purchase_ekspedisi').val(row.hd_po_ekspedisi);
          $('#purchase_ekspedisi').trigger('change');
          $('#purchase_tax').val(row.hd_po_tax);
          $('#purchase_warehouse').val(row.hd_po_warehouse);
          $('#purchase_warehouse').trigger('change');
          $('#purchase_supplier').val(row.hd_po_supplier);
          $('#purchase_supplier').trigger('change');
          edit_footer_discount_percentage1.set(row.hd_po_disc_percentage1);
          edit_footer_discount_percentage2.set(row.hd_po_disc_percentage2);
          edit_footer_discount_percentage3.set(row.hd_po_disc_percentage3);
          edit_footer_discount1.set(row.hd_po_disc_1);
          edit_footer_discount2.set(row.hd_po_disc_2);
          edit_footer_discount3.set(row.hd_po_disc_3);
          footer_total_discount.set(row.hd_po_total_discount);
          footer_dpp.set(row.hd_po_dpp);
          footer_total_ppn.set(row.hd_po_ppn);
          footer_total_ongkir.set(row.hd_po_ongkir);
          footer_total_invoice.set(row.hd_po_grand_total);
        }
      }
    });
  }

  function duedate_cal()
  {
    var purchase_top = document.getElementById("purchase_top").value;
    $.ajax({
      type: "POST",
      url: "<?php echo base_url(); ?>Purchase/cal_due_date",
      dataType: "json",
      data: {po_top:purchase_top},
      success : function(data){
        if (data.code == "200"){
          $('#purchase_due_date').val(data.result);
          $('#purchase_due_date').trigger('change');
        }
      }
    });
  }

  $('#btnadd_temp').click(function(e){
    e.preventDefault();
    var product_id              = $("#product_id").val();
    var temp_price_val          = parseInt(temp_price.get());
    var temp_qty                = $("#temp_qty").val();
    var temp_weight             = $("#temp_weight").val();
    var temp_delivery_price_val = parseInt(temp_delivery_price.get());
    var temp_total_weight       = $("#temp_total_weight").val();
    var temp_ongkir_val         = parseInt(temp_ongkir.get());
    var temp_total_val          = parseInt(temp_total.get());
    var temp_note               = $("#temp_note").val();

    if($('#formaddtemp').parsley().validate({force: true})){
      $.ajax({
        type: "POST",
        url: "<?php echo base_url(); ?>Purchase/add_temp_purchase",
        dataType: "json",
        data: {product_id:product_id, temp_price_val:temp_price_val, temp_qty:temp_qty, temp_weight:temp_weight, temp_delivery_price_val:temp_delivery_price_val, temp_total_weight:temp_total_weight, temp_ongkir_val:temp_ongkir_val, temp_total_val:temp_total_val, temp_note:temp_note},
        success : function(data){
          if (data.code == "200"){
            let title = 'Tambah Data';
            let message = 'Data Berhasil Di Tambah';
            let state = 'info';
            notif_success(title, message, state);
            $('#temp-purchase-list').DataTable().ajax.reload();
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

  $('#btnsave').click(function(e){
    e.preventDefault();
    var po_inv                                   = $("#po_inv").val();
    var po_id                                    = $("#po_id").val();
    var purchase_top                             = $("#purchase_top option:selected" ).text();
    var purchase_top_id                          = $("#purchase_top").val();
    var purchase_payment_method                  = $("#purchase_payment_method").val();
    var purchase_supplier                        = $("#purchase_supplier").val();
    var no_faktur_supplier                       = $("#no_faktur_supplier").val();
    var faktur_date                              = $("#faktur_date").val();
    var purchase_ekspedisi                       = $("#purchase_ekspedisi").val();
    var purchase_tax                             = $("#purchase_tax").val();
    var purchase_date                            = $("#purchase_date").val();
    var purchase_warehouse                       = $("#purchase_warehouse").val();
    var purchase_due_date                        = $("#purchase_due_date").val();
    var footer_sub_total_submit                  = parseInt(footer_sub_total.get());
    var footer_total_discount_submit             = parseInt(footer_total_discount.get());
    var edit_footer_discount_percentage1_submit  = parseInt(edit_footer_discount_percentage1.get());
    var edit_footer_discount_percentage2_submit  = parseInt(edit_footer_discount_percentage2.get());
    var edit_footer_discount_percentage3_submit  = parseInt(edit_footer_discount_percentage3.get());
    var edit_footer_discount1_submit             = parseInt(edit_footer_discount1.get());
    var edit_footer_discount2_submit             = parseInt(edit_footer_discount2.get());
    var edit_footer_discount3_submit             = parseInt(edit_footer_discount3.get());
    var footer_dpp_val                           = parseInt(footer_dpp.get());
    var footer_total_ppn_val                     = parseInt(footer_total_ppn.get());
    var footer_total_ongkir_val                  = parseInt(footer_total_ongkir.get());
    var footer_total_invoice_val                 = parseInt(footer_total_invoice.get());
    var purchase_remark                         = $("#purchase_remark").val();
    $.ajax({
      type: "POST",
      url: "<?php echo base_url(); ?>Purchase/save_purchase",
      dataType: "json",
      data: {po_inv:po_inv, po_id:po_id, purchase_top:purchase_top, purchase_top_id:purchase_top_id, purchase_payment_method:purchase_payment_method, purchase_supplier:purchase_supplier, no_faktur_supplier:no_faktur_supplier, faktur_date:faktur_date, purchase_ekspedisi:purchase_ekspedisi, purchase_tax:purchase_tax, purchase_date:purchase_date, purchase_warehouse:purchase_warehouse, purchase_due_date:purchase_due_date, footer_sub_total_submit:footer_sub_total_submit, footer_total_discount_submit:footer_total_discount_submit, edit_footer_discount_percentage1_submit:edit_footer_discount_percentage1_submit, edit_footer_discount_percentage2_submit:edit_footer_discount_percentage2_submit, edit_footer_discount_percentage3_submit:edit_footer_discount_percentage3_submit, edit_footer_discount1_submit:edit_footer_discount1_submit, edit_footer_discount2_submit:edit_footer_discount2_submit, edit_footer_discount3_submit:edit_footer_discount3_submit, footer_dpp_val:footer_dpp_val, footer_total_ppn_val:footer_total_ppn_val, footer_total_ongkir_val:footer_total_ongkir_val, footer_total_invoice_val:footer_total_invoice_val, purchase_remark:purchase_remark},
      success : function(data){
        if (data.code == "200"){
          window.location.href = "<?php echo base_url(); ?>/Purchase";
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
        url: "<?php echo base_url(); ?>Purchase/clear_temp_purchase",
        dataType: "json",
        data: {},
        success : function(data){
          if (data.code == "200"){
           window.location.href = "<?php echo base_url(); ?>/Purchase";
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

  new bootstrap.Modal(document.getElementById('footerdiscount'), {backdrop: 'static', keyboard: false})  
  
</script>