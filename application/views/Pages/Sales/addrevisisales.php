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
  .sales-help-trigger {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 18px;
    height: 18px;
    border-radius: 50%;
    border: 1px solid #94a3b8;
    color: #475569;
    font-size: 0.7rem;
    font-weight: 700;
    background: #ffffff;
    cursor: pointer;
    margin-left: 4px;
    line-height: 1;
  }
  .sales-help-trigger:hover {
    background: #f8fafc;
    border-color: #64748b;
    color: #1e293b;
  }
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
    background: linear-gradient(120deg, #0f766e 0%, #0ea5e9 100%);
    border-radius: 16px;
    padding: 20px 26px;
    margin-bottom: 20px;
    margin-top: 76px;
    box-shadow: 0 6px 24px rgba(15,118,110,0.22);
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
  .sales-page-header small { color: rgba(255,255,255,0.78); font-size:0.8rem; }
  .sales-btn-add {
    width: 42px;
    height: 38px;
    border-radius: 10px;
    background: linear-gradient(120deg, #0f766e, #0ea5e9);
    border: none;
    color: #fff;
    font-size: 1rem;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
    box-shadow: 0 3px 10px rgba(14,165,233,0.24);
    transition: transform 0.15s, box-shadow 0.15s;
  }
  .sales-btn-add:hover {
    transform: translateY(-1px);
    box-shadow: 0 5px 14px rgba(15,118,110,0.3);
  }
  .sales-divider {
    border: none;
    border-top: 1px dashed #e5ebf2;
    margin: 16px 0;
  }
  .sales-summary-card {
    background: #fffaf7;
    border-radius: 12px;
    border: 1px solid #f6d7c8;
    padding: 16px 20px;
  }
  .sales-summary-row {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 8px 0;
    border-bottom: 1px solid #f7e1d4;
    font-size: 0.88rem;
  }
  .sales-summary-row:last-child { border-bottom: none; }
  .sales-summary-row .s-label { font-weight: 600; color: #6b7280; }
  .sales-summary-row .s-input { width: 180px; }
  .sales-summary-row.grand .s-label { color: #1f2937; font-size: 0.95rem; font-weight: 700; }
  @media (max-width: 768px) { .sales-page-wrap { padding: 14px 12px; } }
</style>

<div class="container-fluid">
  <div class="sales-page-wrap">
    <div class="sales-page-header">
      <div class="header-icon"><i class="fas fa-pen-square"></i></div>
      <div>
        <h5>Tambah Revisi Penjualan</h5>
        <small>Silahkan isi data revisi penjualan dengan lengkap</small>
      </div>
    </div>

    <div class="row mb-4">
      <div class="col-md-4 mb-3 mb-md-0 d-flex">
        <div class="sales-section mb-0 flex-fill">
          <div class="sales-section-header">
            <div class="section-icon" style="background:#ccfbf1; color:#0f766e;"><i class="fas fa-file-alt"></i></div>
            <h6>Informasi Dokumen</h6>
          </div>
          <div class="sales-section-body">
            <div class="mb-3">
              <div class="sales-field-label"><i class="fas fa-hashtag"></i> No Invoice</div>
              <input id="sales_invoice" name="sales_invoice" type="text" class="form-control" value="AUTO" readonly="">
              <input id="sales_id" name="sales_id" type="hidden" class="form-control">
            </div>
            <div class="mb-3">
              <div class="sales-field-label">
                <i class="fas fa-file-import"></i> Sales Invoice
                <span
                  class="sales-help-trigger"
                  data-bs-toggle="tooltip"
                  data-bs-placement="top"
                  data-bs-trigger="click"
                  title="Revisi penjualkan hanya untuk penjualan yang sudah di cancel"
                  tabindex="0"
                  role="button"
                >?</span>
              </div>
              <input id="sales_inv_sales" name="sales_inv_sales" type="text" class="form-control ui-autocomplete-input" placeholder="No Penjualan" value="" required="" autocomplete="off">
              <input id="sales_inv_id" type="hidden" name="sales_inv_id">
              <input id="hd_sales_type" name="hd_sales_type" type="hidden" value="REVISI">
            </div>
            <div class="mb-3">
              <div class="sales-field-label"><i class="fas fa-calendar-day"></i> Tanggal</div>
              <input id="sales_date" name="sales_date" type="date" class="form-control" value="<?php echo date('Y-m-d'); ?>" readonly>
            </div>
            <div class="mb-0">
              <div class="sales-field-label"><i class="fas fa-user"></i> User</div>
              <input id="po_user_id" name="po_user_id" type="text" class="form-control" value="<?php echo $_SESSION['user_name']; ?>" readonly="">
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-4 mb-3 mb-md-0 d-flex" style="padding-left:10px; padding-right:10px;">
        <div class="sales-section mb-0 flex-fill">
          <div class="sales-section-header">
            <div class="section-icon" style="background:#fce7f3; color:#be185d;"><i class="fas fa-users"></i></div>
            <h6>Pelanggan &amp; Sales</h6>
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
            <div class="mb-3">
              <div class="sales-field-label"><i class="fas fa-user-tie"></i> Sales</div>
              <select class="form-control js-example-basic-single" id="sales_salesman" name="sales_salesman">
                <option value="">-- Pilih Sales --</option>
                <?php foreach ($data['salesman_list'] as $row) { ?>
                  <option value="<?php echo $row->salesman_id; ?>"><?php echo $row->salesman_name; ?></option>
                <?php } ?>
              </select>
            </div>
            <div class="mb-3">
              <div class="sales-field-label"><i class="fas fa-percent"></i> Rate Customer</div>
              <input id="sales_rate_customer" name="sales_rate_customer" type="text" class="form-control" readonly="">
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-4 d-flex">
        <div class="sales-section mb-0 flex-fill">
          <div class="sales-section-header">
            <div class="section-icon" style="background:#dcfce7; color:#16a34a;"><i class="fas fa-truck"></i></div>
            <h6>Logistik &amp; Pembayaran</h6>
          </div>
          <div class="sales-section-body">
            <div class="mb-3">
              <div class="sales-field-label"><i class="fas fa-warehouse"></i> Gudang</div>
              <select class="form-control js-example-basic-single" id="sales_warehouse" name="sales_warehouse">
                <option value="">-- Pilih Gudang --</option>
                <?php foreach ($data['warehouse_list'] as $row) { ?>
                  <option value="<?php echo $row->warehouse_id; ?>"><?php echo $row->warehouse_name; ?></option>
                <?php } ?>
              </select>
            </div>
            <div class="mb-3">
              <div class="sales-field-label"><i class="fas fa-shipping-fast"></i> Ekspedisi</div>
              <select class="form-control js-example-basic-single" id="sales_ekspedisi" name="sales_ekspedisi">
                <option value="">-- Pilih Ekspedisi --</option>
                <?php foreach ($data['ekspedisi_list'] as $row) { ?>
                  <option value="<?php echo $row->ekspedisi_id; ?>"><?php echo $row->ekspedisi_name; ?></option>
                <?php } ?>
              </select>
            </div>
            <div class="mb-3">
              <div class="sales-field-label"><i class="fas fa-credit-card"></i> Metode Bayar</div>
              <select class="form-control js-example-basic-single" id="sales_payment" name="sales_payment">
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

    <div class="row mb-4">
      <div class="col-md-8 mb-3 mb-md-0 d-flex">
        <div class="sales-section mb-0 flex-fill">
          <div class="sales-section-header">
            <div class="section-icon" style="background:#ede9fe; color:#7c3aed;"><i class="fas fa-clock"></i></div>
            <h6>Termin &amp; Informasi Tambahan</h6>
          </div>
          <div class="sales-section-body">
            <div class="row">
              <div class="col-md-6 mb-3">
                <div class="sales-field-label"><i class="fas fa-calendar-times"></i> T.O.P</div>
                <select class="form-control js-example-basic-single" onchange="duedate_cal()" id="sales_top" name="sales_top">
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
              <div class="col-md-6 mb-3">
                <div class="sales-field-label"><i class="fas fa-calendar-alt"></i> Jatuh Tempo</div>
                <input id="sales_due_date" name="sales_due_date" type="date" class="form-control">
              </div>
            </div>
            <div class="row">
              <div class="col-md-6 mb-3">
                <div class="sales-field-label"><i class="fas fa-clipboard-list"></i> Disiapkan Oleh</div>
                <input id="sales_prepare" name="sales_prepare" type="text" class="form-control">
              </div>
              <div class="col-md-6 mb-3">
                <div class="sales-field-label"><i class="fas fa-box-open"></i> Jumlah Colly</div>
                <input id="sales_colly" name="sales_colly" type="text" class="form-control">
              </div>
            </div>
            <div class="mb-0">
              <div class="sales-field-label"><i class="fas fa-truck-loading"></i> Dropship</div>
              <select class="form-control js-example-basic-single" id="drop_ship" name="drop_ship">
                <option value="N">Tidak</option>
                <option value="Y">Ya</option>
              </select>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-4 d-flex">
        <div class="sales-section mb-0 flex-fill">
          <div class="sales-section-header">
            <div class="section-icon" style="background:#fee2e2; color:#dc2626;"><i class="fas fa-shipping-fast"></i></div>
            <h6>Dropship</h6>
          </div>
          <div class="sales-section-body">
            <div id="dropship-container" style="display:none;">
              <div class="mb-3">
                <div class="sales-field-label"><i class="fas fa-user"></i> Nama</div>
                <input id="dropship_name" name="dropship_name" type="text" class="form-control" placeholder="Nama Dropship Pelanggan">
              </div>
              <div class="mb-3">
                <div class="sales-field-label"><i class="fas fa-phone"></i> No Telp</div>
                <input id="dropship_phone" name="dropship_phone" type="text" class="form-control" placeholder="Telp Dropship Pelanggan">
              </div>
              <div class="mb-0">
                <div class="sales-field-label"><i class="fas fa-map-marker-alt"></i> Alamat</div>
                <textarea id="dropship_address" name="dropship_address" class="form-control" placeholder="Alamat Dropship" maxlength="500" rows="4"></textarea>
              </div>
            </div>
            <div class="text-muted small">Pilih opsi dropship untuk menampilkan detail penerima.</div>
          </div>
        </div>
      </div>
    </div>

    <div class="sales-section">
      <div class="sales-section-header">
        <div class="section-icon" style="background:#ede9fe; color:#7c3aed;"><i class="fas fa-boxes"></i></div>
        <h6>Input Item</h6>
      </div>
      <div class="sales-section-body">
        <form id="formaddtemp">
          <div class="row mb-3">
            <div class="col-md-4 mb-2">
              <div class="sales-field-label"><i class="fas fa-box"></i> Produk</div>
              <input id="product_name" name="product_name" type="text" class="form-control ui-autocomplete-input" placeholder="Ketikkan nama produk..." value="" required="" autocomplete="off" data-parsley-required data-parsley-required-message="*Masukan Nama Produk">
              <input id="product_id" type="hidden" name="product_id">
            </div>
            <div class="col-md-2 mb-2">
              <div class="sales-field-label"><i class="fas fa-tags"></i> Rate Produk</div>
              <select class="form-control js-example-basic-single" id="temp_rate" name="temp_rate">
                <option value="Umum">Umum</option>
                <option value="Toko">Toko</option>
                <option value="Sales">Sales</option>
                <option value="Khusus">Khusus</option>
              </select>
            </div>
            <div class="col-md-2 mb-2">
              <div class="sales-field-label"><i class="fas fa-tag"></i> Harga Jual / Unit</div>
              <input id="temp_price" name="temp_price" class="form-control text-right" value="0" required="">
            </div>
            <div class="col-md-2 mb-2">
              <div class="sales-field-label"><i class="fas fa-boxes-stacked"></i> Current Stock</div>
              <input id="curent_stock" name="curent_stock" class="form-control text-right" value="0" required="" readonly>
            </div>
            <div class="col-md-2 mb-2">
              <div class="sales-field-label"><i class="fas fa-sort-numeric-up"></i> Qty</div>
              <input id="temp_qty" name="temp_qty" type="text" class="form-control text-right" value="0" required="">
            </div>
          </div>

          <hr class="sales-divider">

          <div class="row mb-3">
            <div class="col-md-2 mb-2">
              <div class="sales-field-label"><i class="fas fa-percentage"></i> Discount</div>
              <input id="temp_discount" name="temp_discount" type="text" class="form-control text-right" value="0">
            </div>
            <div class="col-md-4 mb-2">
              <div class="sales-field-label"><i class="fas fa-sticky-note"></i> Keterangan</div>
              <input id="desc_item" name="desc_item" type="text" class="form-control text-left">
            </div>
            <div class="col-md-4 mb-2">
              <div class="sales-field-label"><i class="fas fa-calculator"></i> Total</div>
              <input id="temp_total" name="temp_total" type="text" class="form-control text-right" value="0" readonly="">
            </div>
            <div class="col-md-2 d-flex align-items-end">
              <button id="btnadd_temp" type="submit" class="sales-btn-add btn-add-temp" title="Tambah Item">
                <i class="fas fa-plus"></i>
              </button>
            </div>
          </div>
        </form>

        <hr class="sales-divider" style="margin-top:20px;">

        <div class="table-responsive">
          <table id="temp-sales-list" class="display table table-striped table-hover">
            <thead>
              <tr>
                <th>SKU</th>
                <th>Produk</th>
                <th>Rate</th>
                <th>Qty</th>
                <th>Harga Satuan</th>
                <th>Discount</th>
                <th>Ket</th>
                <th>Total</th>
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
            <div class="sales-field-label"><i class="fas fa-sticky-note"></i> Catatan Penjualan</div>
            <textarea id="sales_remark" name="sales_remark" class="form-control" placeholder="Catatan revisi penjualan..." maxlength="500" rows="8" style="border-radius:9px; resize:none;"></textarea>
          </div>
          <div class="col-lg-6">
            <div class="sales-summary-card">
              <div class="sales-summary-row">
                <span class="s-label">Sub Total</span>
                <input id="footer_sub_total" name="footer_sub_total" type="text" class="form-control text-right s-input" value="0" readonly="" style="border-radius:8px; font-size:0.88rem;">
              </div>
              <div class="sales-summary-row">
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
              <div class="sales-summary-row">
                <span class="s-label">PPN 11%</span>
                <div class="d-flex align-items-center gap-2">
                  <input id="footer_total_ppn" name="footer_total_ppn" type="text" class="form-control text-right s-input" value="0" readonly="" style="border-radius:8px; font-size:0.88rem;">
                  <input class="form-check-input" type="checkbox" id="ppnchecked" style="width: 30px; height: 30px;">
                </div>
              </div>
              <div class="sales-summary-row grand" style="margin-top:8px; padding-top:12px; border-top:2px solid #f6d7c8; border-bottom:none;">
                <span class="s-label">Grand Total</span>
                <input id="footer_total_invoice" name="footer_total_invoice" type="text" class="form-control text-right s-input" value="0" readonly="" style="border-radius:8px; font-size:0.95rem; font-weight:700; background:#ffedd5; border-color:#fdba74; color:#9a2c0f;">
              </div>
              <div class="sales-summary-row">
                <span class="s-label">DP</span>
                <input id="footer_dp" name="footer_dp" type="text" class="form-control text-right s-input" value="0" style="border-radius:8px; font-size:0.88rem;">
              </div>
              <div class="sales-summary-row">
                <span class="s-label">Kredit</span>
                <input id="footer_remaining_debt" name="footer_remaining_debt" type="text" class="form-control text-right s-input" value="0" readonly="" style="border-radius:8px; font-size:0.88rem;">
              </div>
              <div class="d-flex justify-content-end gap-2 mt-4">
                <button id="btncancel" class="btn btn-danger" style="border-radius:9px; font-weight:600; padding:8px 22px;"><i class="fas fa-times-circle mr-1"></i> Batal</button>
                <button id="btnsave" class="btn btn-success button-header-custom-save" style="border-radius:9px; font-weight:600; padding:8px 22px;"><i class="fas fa-save mr-1"></i> Simpan Revisi</button>
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
              <button type="button" id="btneditdisc" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <div class="modal fade" id="descItemConfirmModal" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Konfirmasi</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            deskripsi item tidak di isi apakah akan tetap di lanjutkan?
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
            <button type="button" id="btn-desc-item-continue" class="btn btn-primary">Lanjutkan</button>
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

  $('#purchase_top').prop('disabled', true);
  $('#purchase_payment_method').prop('disabled', true);
  $('#purchase_ekspedisi').prop('disabled', true);
  $('#purchase_tax').prop('disabled', true);
  $('#purchase_warehouse').prop('disabled', true);
  $('#purchase_due_date').prop('disabled', true);
  $('#po_user_id').prop('disabled', true);
  $('#purchase_supplier').prop('disabled', true);
  

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


  let temp_discount = new AutoNumeric('#temp_discount', {
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

  let footer_total_ppn = new AutoNumeric('#footer_total_ppn', {
    currencySymbol : 'Rp. ',
    decimalCharacter : ',',
    decimalPlaces: 0,
    decimalPlacesShownOnFocus: 0,
    digitGroupSeparator : '.',
  });

  let footer_dp = new AutoNumeric('#footer_dp', {
    currencySymbol : 'Rp. ',
    decimalCharacter : ',',
    decimalPlaces: 0,
    decimalPlacesShownOnFocus: 0,
    digitGroupSeparator : '.',
  });

  let footer_remaining_debt = new AutoNumeric('#footer_remaining_debt', {
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
    tempsales_table();
    //check_So_data();
  });

  function tempsales_table(){
    $('#temp-sales-list').DataTable( {
      serverSide: true,
      search: true,
      processing: true,
      ordering: false,
      retrieve: true,
      ajax: {
        url: '<?php echo base_url(); ?>Sales/temp_sales_list',
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
            $('#temp-salesorder-list').DataTable().ajax.reload();
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

  $('#product_name').autocomplete({ 
    minLength: 2,
    source: function(req, add) {
      $.ajax({
        url: '<?php echo base_url(); ?>/Sales/search_product',
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
      $('#product_name').val(product_name);
      $('#product_id').val(id);
      $('#temp_rate').val('Umum');
      /*if(curent_stock == null){
        $('#curent_stock').val(0);
      }else{
        $('#curent_stock').val(curent_stock);
      }*/
      $('#temp_rate').trigger('change');
      temp_price.set(product_price);
    },
  });

  $('#sales_inv_sales').autocomplete({ 
    minLength: 2,
    source: function(req, add) {
      $.ajax({
        url: '<?php echo base_url(); ?>/Sales/search_sales_inv_ref',
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
      let id = ui.item.id;
      $.ajax({
        type: "POST",
        url: "<?php echo base_url(); ?>Sales/get_header_sales",
        dataType: "json",
        data: {id:id},
        success : function(data){
          if (data.code == "200"){
            var row = data.data[0];
            $('#sales_inv_id').val(row.hd_sales_id);
            $('#sales_customer').val(row.hd_sales_customer);
            $('#sales_customer').trigger('change');
            $('#sales_rate_customer').val(row.customer_rate);
            $('#sales_payment').val(row.hd_sales_payment);
            $('#sales_payment').trigger('change');
            $('#sales_top').val(row.hd_sales_top_id);
            $('#sales_top').trigger('change');
            //$('#sales_due_date').val(row.hd_sales_top);
            $('#sales_salesman').val(row.hd_sales_salesman);
            $('#sales_salesman').trigger('change');
            $('#sales_prepare').val(row.hd_sales_prepare);
            $('#sales_colly').val(row.hd_sales_colly);
            $('#drop_ship').val(row.hd_sales_dropship);
            $('#drop_ship').trigger('change');
            if(row.hd_sales_dropship == 'Y'){
              $('#dropship_name').val(row.hd_sales_dropship_name);
              $('#dropship_phone').val(row.hd_sales_dropship_phone);
            	$('#dropship_address').val(row.hd_sales_dropship_address);
            }else{
              $('#dropship_name').val("");
              $('#dropship_phone').val("");
            	$('#dropship_address').val("");
            }

            $('#sales_warehouse').val(row.hd_sales_warehouse);
            $('#sales_warehouse').trigger('change');
            $('#sales_ekspedisi').val(row.hd_sales_ekspedisi);
            $('#sales_ekspedisi').trigger('change');
            $('#footerdiscount').on('show.bs.modal', function (event) {
              edit_footer_discount_percentage1.set(row.hd_sales_percentage1);
              edit_footer_discount_percentage2.set(row.hd_sales_percentage2);
              edit_footer_discount_percentage3.set(row.hd_sales_percentage3);
              edit_footer_discount1.set(row.hd_sales_disc1);
              edit_footer_discount2.set(row.hd_sales_disc2);
              edit_footer_discount3.set(row.hd_sales_disc3);
            })
            footer_total_discount.set(row.hd_sales_total_discount);
            footer_total_ppn.set(row.hd_sales_ppn);
            if(row.hd_sales_ppn > 0){
              $("#ppnchecked").prop("checked", true);
            }
            footer_total_invoice.set(row.hd_sales_total);
            footer_dp.set(row.hd_sales_dp);
            footer_remaining_debt.set(row.hd_sales_remaining_debt);
            $('#sales_remark').val(row.hd_sales_note);
            let title = 'Pilih Sales Order';
            let message = 'Sales Order Berhasil Di Pilih';
            let state = 'info';
            notif_success(title, message, state);
            $('#temp-sales-list').DataTable().ajax.reload();
            check_tempt_data();
            clear_input();


          }else{
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

  function change_rate()
  {
    let product_id = $("product_id").val(); 
    $.ajax({
      type: "POST",
      url: "<?php echo base_url(); ?>Sales/get_rate",
      dataType: "json",
      data: {product_id:product_id},
      success : function(data){
        if (data.code == "200"){
          var row = data.result[0];
        }else{
          Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: data.result,
          })
        }
      }
    });
  }


  $('#temp_rate').on('change', function (event) {
    let product_id = $("#product_id").val();
    let rate_val   = $(this).val();  
    $.ajax({
      type: "POST",
      url: "<?php echo base_url(); ?>Sales/get_rate",
      dataType: "json",
      data: {product_id:product_id},
      success : function(data){
        if (data.code == "200"){
          var row = data.result[0];
          if(rate_val == 'Umum'){
            temp_price.set(row.Normal);
            calculation_total_temp();
          }else if(rate_val == 'Toko'){
            temp_price.set(row.Toko);
            calculation_total_temp();
          }else if(rate_val == 'Sales'){
            temp_price.set(row.Sales);
            calculation_total_temp();
          }else{
            temp_price.set(row.Khusus);
            calculation_total_temp();
          }
        }else{
          Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: data.result,
          })
        }
      }
    });  
  })

  $('#temp_price').on('input', function (event) {
    calculation_total_temp();
  })

  $('#temp_qty').on('input', function (event) {
    calculation_total_temp();
  })

  $('#temp_discount').on('input', function (event) {
    calculation_total_temp();
  })

  $('#drop_ship').on('change', function() {
		var value = $(this).val();
		if (value == 'Y') {
			$('#dropship-container').show();
		}else{
			$('#dropship-container').hide();
      $('#dropship_name').val("");
      $('#dropship_phone').val("");
			$('#dropship_address').val("");
		}
	});

  function calculation_total_temp()
  {
    let temp_price_val     = parseInt(temp_price.get());
    let temp_qty_val       = $('#temp_qty').val();
    let temp_discount_val  = parseInt(temp_discount.get());
    let temp_total_val = temp_price_val * temp_qty_val - temp_discount_val;
    temp_total.set(temp_total_val);
  }


  function edit_temp(id)
  {
    $.ajax({
      type: "POST",
      url: "<?php echo base_url(); ?>Sales/get_edit_temp_sales",
      dataType: "json",
      data: {id:id},
      success : function(data){
        if (data.code == "200"){
          var row = data.result[0];
          console.log(data);
          $("#product_name").val(row.product_name);
          $("#product_id").val(row.temp_product_id);
          $('#temp_rate').val(row.temp_sales_rate);
          $('#temp_rate').trigger('change');
          temp_price.set(row.temp_sales_price);
          $("#temp_qty").val(row.temp_sales_qty);
          $("#desc_item").val(row.temp_desc_item);
          temp_discount.set(row.temp_sales_discount);
          temp_total.set(row.temp_sales_total);
        }
      }
    });  
  }


  function duedate_cal()
  {
    var purchase_top = document.getElementById("sales_top").value;
    $.ajax({
      type: "POST",
      url: "<?php echo base_url(); ?>Purchase/cal_due_date",
      dataType: "json",
      data: {po_top:purchase_top},
      success : function(data){
        if (data.code == "200"){
          $('#sales_due_date').val(data.result);
          check_tempt_data();
        }
      }
    });
  }

  function clear_input()
  {
    $('#product_name').val("");
    $('#product_id').val("");
    $('#temp_rate').val('Umum');
    $('#temp_rate').trigger('change');
    temp_price.set(0);
    $('#temp_qty').val(0);
    temp_discount.set(0);
    temp_total.set(0);
    $('#desc_item').val("");
  }

  function submit_temp_sales_item()
  {
    var warehouse_id            = $("#sales_warehouse").val();
    var product_id              = $("#product_id").val();
    var temp_rate               = $("#temp_rate").val();
    var temp_price_val          = parseInt(temp_price.get());
    var temp_qty                = $("#temp_qty").val();
    var temp_discount_val       = parseInt(temp_discount.get());
    var temp_total_val          = parseInt(temp_total.get());
    var desc_item               = $("#desc_item").val();

    $.ajax({
      type: "POST",
      url: "<?php echo base_url(); ?>Sales/add_temp_sales",
      dataType: "json",
      data: {warehouse_id:warehouse_id, product_id:product_id, temp_rate:temp_rate, temp_price_val:temp_price_val, temp_qty:temp_qty, temp_discount_val:temp_discount_val, temp_total_val:temp_total_val, desc_item:desc_item},
      success : function(data){
        if (data.code == "200"){
          let title = 'Tambah Data';
          let message = 'Data Berhasil Di Tambah';
          let state = 'info';
          notif_success(title, message, state);
          $('#temp-sales-list').DataTable().ajax.reload();
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

  $('#btnadd_temp').click(function(e){
    e.preventDefault();
    if($('#formaddtemp').parsley().validate({force: true})){
      var desc_item = ($("#desc_item").val() || '').trim();
      if(desc_item === ''){
        const descItemConfirmModal = new bootstrap.Modal(document.getElementById('descItemConfirmModal'), {backdrop: 'static', keyboard: false});
        descItemConfirmModal.show();
        return;
      }

      submit_temp_sales_item();
    }
  });

  $('#btn-desc-item-continue').on('click', function(){
    const modalElement = document.getElementById('descItemConfirmModal');
    const modalInstance = bootstrap.Modal.getInstance(modalElement);
    if(modalInstance){
      modalInstance.hide();
    }
    submit_temp_sales_item();
  });

  $('#btnsave').click(function(e){
    e.preventDefault();
    var sales_customer                           = $("#sales_customer").val();
    var sales_type                               = $("#hd_sales_type").val();
    var sales_inv_sales                          = $("#sales_inv_sales").val();
    var sales_inv_id                             = $("#sales_inv_id").val();       
    var sales_rate_customer                      = $("#sales_rate_customer").val();
    var sales_payment                            = $("#sales_payment").val();
    var sales_top_id                             = $("#sales_top").val();
    var drop_ship                                = $("#drop_ship").val();
    var dropship_name                            = $("#dropship_name").val();
    var dropship_phone                           = $("#dropship_phone").val();
    var dropship_address                         = $("#dropship_address").val();
    var sales_top                                = $("#sales_top option:selected").text();
    var sales_salesman                           = $("#sales_salesman").val();
    var sales_prepare                            = $("#sales_prepare").val();
    var sales_colly                              = $("#sales_colly").val();
    var sales_warehouse                          = $("#sales_warehouse").val();
    var sales_ekspedisi                          = $("#sales_ekspedisi").val();
    var footer_sub_total_submit                  = parseInt(footer_sub_total.get());
    var footer_total_discount_submit             = parseInt(footer_total_discount.get());
    var edit_footer_discount_percentage1_submit  = parseInt(edit_footer_discount_percentage1.get());
    var edit_footer_discount_percentage2_submit  = parseInt(edit_footer_discount_percentage2.get());
    var edit_footer_discount_percentage3_submit  = parseInt(edit_footer_discount_percentage3.get());
    var edit_footer_discount1_submit             = parseInt(edit_footer_discount1.get());
    var edit_footer_discount2_submit             = parseInt(edit_footer_discount2.get());
    var edit_footer_discount3_submit             = parseInt(edit_footer_discount3.get());
    var footer_total_ppn_val                     = parseInt(footer_total_ppn.get());
    var footer_total_invoice_val                 = parseInt(footer_total_invoice.get());
    var footer_dp_val                            = parseInt(footer_dp.get());
    var footer_remaining_debt_val                = parseInt(footer_remaining_debt.get());
    var sales_remark                             = $("#sales_remark").val();
    var sales_due_date                           = $("#sales_due_date").val();
    var sales_date                               = $("#sales_date").val();
    $.ajax({
      type: "POST",
      url: "<?php echo base_url(); ?>Sales/save_sales_revisi",
      dataType: "json",
      data: {sales_customer:sales_customer, sales_type:sales_type, sales_inv_sales:sales_inv_sales, sales_inv_id:sales_inv_id, sales_rate_customer:sales_rate_customer, sales_payment:sales_payment, sales_top_id:sales_top_id, sales_top:sales_top, drop_ship:drop_ship, dropship_name:dropship_name, dropship_phone:dropship_phone, dropship_address:dropship_address, sales_salesman:sales_salesman, sales_prepare:sales_prepare, sales_colly:sales_colly, sales_warehouse:sales_warehouse, sales_ekspedisi:sales_ekspedisi, footer_sub_total_submit:footer_sub_total_submit, footer_total_discount_submit:footer_total_discount_submit, edit_footer_discount_percentage1_submit:edit_footer_discount_percentage1_submit, edit_footer_discount_percentage2_submit:edit_footer_discount_percentage2_submit, edit_footer_discount_percentage3_submit:edit_footer_discount_percentage3_submit, edit_footer_discount1_submit:edit_footer_discount1_submit, edit_footer_discount2_submit:edit_footer_discount2_submit, edit_footer_discount3_submit:edit_footer_discount3_submit, footer_total_ppn_val:footer_total_ppn_val, footer_total_invoice_val:footer_total_invoice_val, footer_dp_val:footer_dp_val, footer_remaining_debt_val:footer_remaining_debt_val, sales_remark:sales_remark, sales_due_date:sales_due_date, sales_date:sales_date},
      success : function(data){
        if (data.code == "200"){
          window.location.href = "<?php echo base_url(); ?>/Sales/revisisalespage";
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
  var edit_footer_discount1_pop             = parseInt(edit_footer_discount1.get());
  var edit_footer_discount2_pop             = parseInt(edit_footer_discount2.get());
  var edit_footer_discount3_pop             = parseInt(edit_footer_discount3.get());
  var footer_sub_total_val                  = parseInt(footer_sub_total.get());
  var total_disc = parseInt(edit_footer_discount1_pop + edit_footer_discount2_pop + edit_footer_discount3_pop);
  footer_total_discount.set(total_disc);
  footer_total_invoice.set(footer_sub_total_val - total_disc);
  footer_remaining_debt.set(footer_sub_total_val - total_disc);
  $('#footerdiscount').modal('hide')
});

$('#ppnchecked').on('change', function (event) {
  const checked = $(this).is(':checked');
  if (checked == true) {
    let footer_sub_total_val = parseInt(footer_sub_total.get());
    let footer_total_discount_val = parseInt(footer_total_discount.get());
    let footer_dp_val = parseInt(footer_dp.get());
    let ppn = (footer_sub_total_val - footer_total_discount_val) * 11 / 100;
    footer_total_ppn.set(ppn);
    footer_total_invoice.set(footer_sub_total_val - footer_total_discount_val + ppn);
    footer_remaining_debt.set(footer_sub_total_val - footer_total_discount_val + ppn - footer_dp_val);
  }else{
    footer_total_ppn.set(0);
  }
})

$('#footer_dp').on('input', function (event) {
 let footer_dp_val =  parseInt(footer_dp.get());
 let footer_total_invoice_val = parseInt(footer_total_invoice.get());
 footer_remaining_debt.set(footer_total_invoice_val - footer_dp_val);
})


$('#sales_customer').on('change', function (event) {
  let customer_id = this.value;
  $.ajax({
    type: "POST",
    url: "<?php echo base_url(); ?>Sales/get_customer_rate",
    dataType: "json",
    data: {customer_id:customer_id},
    success : function(data){
      if (data.code == "200"){
        $('#sales_rate_customer').val(data.result[0].customer_rate)
      }
    }
  });
})



function check_tempt_data()
{
  $.ajax({
    type: "POST",
    url: "<?php echo base_url(); ?>Sales/check_temp_sales",
    dataType: "json",
    data: {},
    success : function(data){
      if (data.code == "200"){
        let sub_total = data.data[0].sub_total;
        footer_sub_total.set(sub_total);
        footer_total_invoice.set(sub_total);
        footer_remaining_debt.set(sub_total);
        if($('#sales_top').val() == '0'){
						footer_dp.set(sub_total);
						footer_remaining_debt.set(0);
					}else{
						footer_dp.set(0);
						footer_remaining_debt.set(sub_total);
					}
      }
    }
  });
}

 /* function check_So_data()
  {
    var id = $("#sales_id").val();
    if(id != null){
      $.ajax({
        type: "POST",
        url: "<?php echo base_url(); ?>Sales/refresh_header_so",
        dataType: "json",
        data: {id:id},
        success : function(data){
          if (data.code == "200"){
            var row = data.data[0];
            $('#sales_id').val(row.hd_sales_order_id );
            $('#sales_inv_order').val(row.hd_sales_order_inv);
            $('#sales_customer').val(row.hd_sales_order_customer);
            $('#sales_customer').trigger('change');
            $('#sales_rate_customer').val(row.customer_rate);
            $('#sales_payment').val(row.hd_sales_order_payment);
            $('#sales_payment').trigger('change');
            $('#sales_top').val(row.hd_sales_order_top_id);
            $('#sales_top').trigger('change');
            //$('#sales_due_date').val(row.hd_sales_order_top);
            $('#sales_salesman').val(row.hd_sales_order_salesman);
            $('#sales_salesman').trigger('change');
            $('#sales_prepare').val(row.hd_sales_order_prepare_id);
            $('#sales_prepare').trigger('change');
            $('#sales_colly').val(row.hd_sales_order_colly);
            $('#sales_warehouse').val(row.hd_sales_order_warehouse);
            $('#sales_warehouse').trigger('change');
            $('#sales_ekspedisi').val(row.hd_sales_order_ekspedisi);
            $('#sales_ekspedisi').trigger('change');
            $('#footerdiscount').on('show.bs.modal', function (event) {
              edit_footer_discount_percentage1.set(row.hd_sales_order_percentage1);
              edit_footer_discount_percentage2.set(row.hd_sales_order_percentage2);
              edit_footer_discount_percentage3.set(row.hd_sales_order_percentage3);
              edit_footer_discount1.set(row.hd_sales_order_disc1);
              edit_footer_discount2.set(row.hd_sales_order_disc2);
              edit_footer_discount3.set(row.hd_sales_order_disc3);
            })
            footer_total_discount.set(row.hd_sales_order_total_discount);
            footer_total_ppn.set(row.hd_sales_order_ppn);
            if(row.hd_sales_order_ppn > 0){
              $("#ppnchecked").prop("checked", true);
            }
            footer_total_invoice.set(row.hd_sales_order_total);
            footer_dp.set(row.hd_sales_order_dp);
            footer_remaining_debt.set(row.hd_sales_order_remaining_debt);
            $('#sales_remark').val(row.hd_sales_order_note)
            $('#temp-sales-list').DataTable().ajax.reload();
            check_tempt_data();
            clear_input();
          }else{
            Swal.fire({
              icon: 'error',
              title: 'Oops...',
              text: data.result,
            })
          }
        }
      });
    }
  }*/

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
        url: "<?php echo base_url(); ?>Sales/delete_temp_sales",
        dataType: "json",
        data: {id:id},
        success : function(data){
          if (data.code == "200"){
            $('#temp-sales-list').DataTable().ajax.reload();
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
      url: "<?php echo base_url(); ?>Sales/clear_temp",
      dataType: "json",
      data: {},
      success : function(data){
        if (data.code == "200"){
         window.location.href = "<?php echo base_url(); ?>/Sales/salesorder";
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

const salesInvoiceHelpTooltip = document.querySelectorAll('[data-bs-toggle="tooltip"]');
salesInvoiceHelpTooltip.forEach(function (el) {
  new bootstrap.Tooltip(el);
});

</script>