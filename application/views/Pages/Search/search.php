<?php 
define('DOC_ROOT_PATH', $_SERVER['DOCUMENT_ROOT'].'/');
require DOC_ROOT_PATH . $this->config->item('header');
?>
<style>
  /* ===== SEARCH PAGE REDESIGN ===== */
  .search-hero {
    background: linear-gradient(135deg, #1e3a5f 0%, #2d6a9f 100%);
    border-radius: 18px;
    padding: 28px 32px 24px;
    margin-bottom: 24px;
    box-shadow: 0 8px 32px rgba(30,58,95,0.18);
        margin-top: 76px;
  }
  .search-hero h4 {
    color: #fff;
    font-weight: 700;
    font-size: 1.25rem;
    margin-bottom: 4px;
    letter-spacing: 0.3px;
  }
  .search-hero small {
    color: rgba(255,255,255,0.65);
    font-size: 0.82rem;
  }
  .search-input-wrap {
    position: relative;
    margin-top: 18px;
  }
  .search-input-wrap .search-icon {
    position: absolute;
    left: 16px;
    top: 50%;
    transform: translateY(-50%);
    color: #6b8db5;
    font-size: 1rem;
    pointer-events: none;
  }
  .search-input-wrap input {
    border-radius: 12px !important;
    padding-left: 44px !important;
    height: 50px;
    font-size: 1rem;
    border: none;
    box-shadow: 0 2px 12px rgba(0,0,0,0.10);
    background: #fff;
  }
  .search-input-wrap input:focus {
    box-shadow: 0 0 0 3px rgba(45,106,159,0.25);
    outline: none;
  }

  /* ===== FILTER SECTION ===== */
  .filter-card {
    background: #fff;
    border-radius: 16px;
    border: 1px solid #e8edf3;
    padding: 20px 24px;
    margin-bottom: 20px;
    box-shadow: 0 2px 12px rgba(0,0,0,0.06);
  }
  .filter-card .filter-title {
    font-size: 0.78rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.8px;
    color: #8ca0b8;
    margin-bottom: 16px;
    display: flex;
    align-items: center;
    gap: 8px;
  }
  .filter-label {
    font-size: 0.82rem;
    font-weight: 600;
    color: #4a5568;
    margin-bottom: 6px;
    display: flex;
    align-items: center;
    gap: 5px;
  }
  .filter-label i {
    color: #6b8db5;
    font-size: 0.75rem;
  }
  .filter-card .form-control,
  .filter-card .select2-container--default .select2-selection--single {
    border-radius: 10px !important;
    border-color: #dce3ec;
    font-size: 0.88rem;
    height: 38px;
    background: #f8fafc;
  }
  .filter-card .select2-container--default .select2-selection--single {
    height: 38px;
    line-height: 36px;
    padding-top: 1px;
  }
  .filter-card .select2-container--default .select2-selection--single .select2-selection__rendered {
    line-height: 36px;
    color: #4a5568;
  }
  .filter-card .select2-container--default .select2-selection--single .select2-selection__arrow {
    height: 36px;
  }

  /* ===== TOOLBAR ===== */
  .toolbar-bar {
    display: flex;
    align-items: center;
    justify-content: space-between;
    flex-wrap: wrap;
    gap: 12px;
    background: #fff;
    border-radius: 12px;
    border: 1px solid #e8edf3;
    padding: 12px 20px;
    margin-bottom: 16px;
    box-shadow: 0 1px 6px rgba(0,0,0,0.05);
  }
  .toolbar-bar .toolbar-left,
  .toolbar-bar .toolbar-right {
    display: flex;
    align-items: center;
    gap: 12px;
    flex-wrap: wrap;
  }
  .toolbar-select-wrap {
    display: flex;
    align-items: center;
    gap: 8px;
  }
  .toolbar-select-wrap label {
    font-size: 0.82rem;
    font-weight: 600;
    color: #6b7280;
    white-space: nowrap;
    margin: 0;
  }
  .toolbar-select-wrap select {
    border-radius: 8px;
    border-color: #dce3ec;
    font-size: 0.85rem;
    height: 34px;
    background: #f8fafc;
    padding: 0 10px;
    color: #374151;
  }
  #pagination_info {
    font-size: 0.85rem;
    font-weight: 600;
    color: #6b7280;
    background: #f1f5f9;
    padding: 6px 14px;
    border-radius: 8px;
  }
  .btn-select-mode {
    border-radius: 8px;
    font-size: 0.83rem;
    font-weight: 600;
    padding: 6px 14px;
  }

  /* ===== PRODUCT TABLE ===== */
  .product-table-wrap {
    background: #fff;
    border-radius: 16px;
    border: 1px solid #e8edf3;
    box-shadow: 0 2px 12px rgba(0,0,0,0.06);
    overflow: hidden;
    margin-bottom: 16px;
  }
  .product-table-wrap table {
    margin: 0;
  }
  .product-table-wrap table thead th {
    background: #f1f5f9;
    font-size: 0.78rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.7px;
    color: #64748b;
    border-bottom: 2px solid #e2e8f0;
    padding: 12px 16px;
  }
  .product-table-wrap table tbody tr {
    border-bottom: 1px solid #f1f5f9;
    transition: background 0.15s;
    cursor: pointer;
  }
  .product-table-wrap table tbody tr:last-child {
    border-bottom: none;
  }
  .product-table-wrap table tbody tr:hover {
    background: #f0f7ff;
  }
  .product-table-wrap table tbody td {
    padding: 12px 16px;
    vertical-align: middle;
  }
  .product-img-cell {
    width: 72px;
  }
  .product-img-cell img {
    width: 60px;
    height: 60px;
    object-fit: cover;
    border-radius: 10px;
    border: 1px solid #e2e8f0;
  }
  .product-name {
    font-weight: 600;
    color: #1e293b;
    font-size: 0.9rem;
    line-height: 1.4;
    margin-bottom: 4px;
  }
  .product-price-badge {
    display: inline-block;
    background: linear-gradient(90deg,#e0f2fe,#bae6fd);
    color: #0369a1;
    border-radius: 6px;
    padding: 2px 10px;
    font-size: 0.8rem;
    font-weight: 700;
    letter-spacing: 0.2px;
  }
  .product-stock {
    font-size: 0.85rem;
    font-weight: 600;
    color: #374151;
    background: #f0fdf4;
    border: 1px solid #bbf7d0;
    border-radius: 7px;
    padding: 4px 10px;
    white-space: nowrap;
    display: inline-block;
  }
  .product-stock.low {
    background: #fff7ed;
    border-color: #fed7aa;
    color: #c2410c;
  }

  /* ===== PAGINATION ===== */
  .pagination-wrap {
    display: flex;
    justify-content: center;
    padding: 12px 0 4px;
  }
  .pagination .page-link {
    border-radius: 8px !important;
    margin: 0 3px;
    font-size: 0.85rem;
    font-weight: 600;
    color: #374151;
    border-color: #e2e8f0;
    padding: 6px 12px;
  }
  .pagination .page-item.active .page-link {
    background: #2d6a9f;
    border-color: #2d6a9f;
    color: #fff;
    box-shadow: 0 2px 8px rgba(45,106,159,0.25);
  }
  .pagination .page-item.disabled .page-link {
    color: #cbd5e1;
    background: #f8fafc;
  }
  .pagination .page-link:hover {
    background: #eff6ff;
    border-color: #93c5fd;
    color: #1d4ed8;
  }

  /* ===== SUMMARY OPTIONS ===== */
  .summary-option-list {
    display: flex;
    flex-direction: column;
    gap: 8px;
  }
  .summary-option {
    display: flex;
    align-items: center;
    gap: 12px;
    padding: 10px 14px;
    border-radius: 10px;
    background: #f8fafc;
    border: 1px solid #e2e8f0;
    cursor: pointer;
    transition: all .15s ease;
    margin: 0;
    width: 100%;
  }
  .summary-option:hover {
    background: #eff6ff;
    border-color: #93c5fd;
    transform: translateY(-1px);
  }
  .summary-option input {
    width: 17px;
    height: 17px;
    cursor: pointer;
    flex-shrink: 0;
    accent-color: #2d6a9f;
  }
  .summary-option span {
    font-weight: 600;
    color: #334155;
    font-size: 0.87rem;
  }

  @media (max-width: 600px) {
    .product-img-cell img { width: 48px; height: 48px; }
    .search-hero { padding: 18px 16px; }
    .filter-card { padding: 14px 12px; }
  }
</style>
</div>

<div class="container-fluid">
  <div class="page-inner" style="padding: 20px 24px;">

    <!-- HERO SEARCH BAR -->
    <div class="search-hero">
      <div class="d-flex align-items-start justify-content-between flex-wrap gap-2">
        <div>
          <h4><i class="fas fa-boxes mr-2"></i>Informasi Produk</h4>
          <small>Cari, filter, dan lihat detail produk secara real-time</small>
        </div>
        <div class="d-flex gap-2">
          <button type="button" class="btn btn-sm btn-warning btn-select-mode" id="toggle_select_btn" onclick="toggle_select_mode()">
            <i class="fas fa-check-square mr-1"></i> Pilih
          </button>
          <button type="button" class="btn btn-sm btn-success btn-select-mode" onclick="show_summary()">
            <i class="fas fa-file-alt mr-1"></i> Rangkuman
          </button>
        </div>
      </div>
      <div id="info"></div>
      <div class="search-input-wrap">
        <i class="fas fa-search search-icon"></i>
        <input id="key" name="key" type="text" class="form-control ui-autocomplete-input" placeholder="Ketik barcode atau nama produk..." value="" autocomplete="off">
      </div>
    </div>

    <!-- FILTER SECTION -->
    <div class="filter-card">
      <div class="filter-title">
        <i class="fas fa-sliders-h"></i> Filter Produk
      </div>
      <div class="row">
        <div class="col-md-3 col-sm-6 mb-3">
          <div class="filter-label"><i class="fas fa-store"></i> Unit</div>
          <select id="filter_unit" class="form-control js-example-basic-single">
            <option value="">-- Semua Unit --</option>
            <?php foreach($data['unit_list'] as $u){ ?>
              <option value="<?= $u->unit_id ?>"><?= $u->unit_name ?></option>
            <?php } ?>
          </select>
        </div>
        <div class="col-md-3 col-sm-6 mb-3">
          <div class="filter-label"><i class="fas fa-tags"></i> Kategori</div>
          <select id="filter_category" class="form-control js-example-basic-single">
            <option value="">-- Semua Kategori --</option>
            <?php foreach($data['category_list'] as $c){ ?>
              <option value="<?= $c->category_id ?>"><?= $c->category_name ?></option>
            <?php } ?>
          </select>
        </div>
        <div class="col-md-3 col-sm-6 mb-3">
          <div class="filter-label"><i class="fas fa-trademark"></i> Brand</div>
          <select id="filter_brand" class="form-control js-example-basic-single">
            <option value="">-- Semua Brand --</option>
            <?php foreach($data['brand_list'] as $b){ ?>
              <option value="<?= $b->brand_id ?>"><?= $b->brand_name ?></option>
            <?php } ?>
          </select>
        </div>
        <?php if($_SESSION['user_role'] == 'Superadmin'){ ?>
        <div class="col-md-3 col-sm-6 mb-3">
          <div class="filter-label"><i class="fas fa-truck"></i> Supplier</div>
          <select id="filter_supplier" class="form-control js-example-basic-single">
            <option value="">-- Semua Supplier --</option>
            <?php foreach($data['supplier_list'] as $s){ ?>
              <option value="<?= $s->supplier_name ?>"><?= $s->supplier_name ?></option>
            <?php } ?>
          </select>
        </div>
        <?php } ?>
        <div class="col-md-3 col-sm-6 mb-2">
          <div class="filter-label"><i class="fas fa-toggle-on"></i> Status</div>
          <select id="filter_status" class="form-control js-example-basic-single">
            <option value="">-- Semua Status --</option>
            <option value="Aktif">Aktif</option>
            <option value="Discontinue">Discontinue</option>
          </select>
        </div>
        <div class="col-md-3 col-sm-6 mb-2">
          <div class="filter-label"><i class="fas fa-box-open"></i> Paket</div>
          <select id="filter_paket" class="form-control js-example-basic-single">
            <option value="">-- Semua --</option>
            <option value="N">Bukan Paket</option>
            <option value="Y">Paket</option>
          </select>
        </div>
        <div class="col-md-3 col-sm-6 mb-2">
          <div class="filter-label"><i class="fas fa-percent"></i> PPN</div>
          <select id="filter_ppn" class="form-control js-example-basic-single">
            <option value="">-- Semua --</option>
            <option value="NON PPN">Bukan PPN</option>
            <option value="PPN">PPN</option>
          </select>
        </div>
      </div>
    </div>

    <!-- TOOLBAR -->
    <div class="toolbar-bar">
      <div class="toolbar-left">
        <div class="toolbar-select-wrap">
          <label><i class="fas fa-list-ol mr-1"></i>Per Halaman:</label>
          <select id="items_per_page" class="form-control" style="width:auto;">
            <option value="20">20</option>
            <option value="30">30</option>
            <option value="50" selected>50</option>
            <option value="100">100</option>
            <option value="200">200</option>
            <option value="500">500</option>
          </select>
        </div>
        <div class="toolbar-select-wrap">
          <label><i class="fas fa-sort-amount-down mr-1"></i>Urutkan:</label>
          <select id="sort_order" class="form-control" style="width:auto;">
            <option value="name_asc">Nama A - Z</option>
            <option value="name_desc">Nama Z - A</option>
            <option value="price_asc">Harga Terendah</option>
            <option value="price_desc">Harga Tertinggi</option>
            <option value="stock_asc">Stock Terendah</option>
            <option value="stock_desc">Stock Tertinggi</option>
          </select>
        </div>
      </div>
      <div class="toolbar-right">
        <div id="pagination_info">Menampilkan 0 hasil</div>
      </div>
    </div>

    <!-- PRODUCT TABLE -->
    <div class="product-table-wrap">
      <table class="table table-hover mb-0">
        <thead>
          <tr>
            <th id="col_check" style="display:none; width:40px;"></th>
            <th style="width:80px;">Foto</th>
            <th>Nama Produk</th>
            <th style="width:130px;">Stok</th>
          </tr>
        </thead>
        <tbody id="product_list"></tbody>
      </table>
    </div>

    <!-- PAGINATION -->
    <div class="pagination-wrap">
      <nav aria-label="Page navigation">
        <ul class="pagination" id="pagination_controls"></ul>
      </nav>
    </div>

  </div>
</div>

<!-- Modal Rangkuman -->
<div class="modal fade" id="rangkumanModal" tabindex="-1" role="dialog" aria-labelledby="rangkumanModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="rangkumanModalLabel">Rangkuman Item Pilihan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="background: #f8fafc;">
        <div class="row">

          <!-- LEFT SIDE -->
          <div class="col-md-4 mb-3">

            <div class="card border-0 shadow-sm h-100"
                style="border-radius: 18px;">

              <div class="card-body">

                <div class="mb-4">
                  <small class="text-muted">
                    Pilih informasi yang ingin ditampilkan!
                  </small>
                </div>

                <!-- HARGA -->
                <div class="mb-4">

                  <label class="font-weight-bold mb-2 d-block">
                    Jenis Harga
                  </label>

                  <select id="summary_field_price"
                          class="form-control form-control-md"
                          style="
                            border-radius: 12px;
                            height: 45px;
                            border: 1px solid #dbe2ea;
                          ">

                    <option value="1" selected>Harga Umum</option>
                    <option value="2">Harga Toko</option>
                    <option value="3">Harga Sales</option>
                    <option value="4">Harga Khusus</option>

                  </select>

                </div>

                <!-- CHECKBOX -->
                <div class="summary-option-list">

                  <label class="summary-option">
                    <input class="form-check-input"
                          type="checkbox"
                          id="summary_field_sku"
                          checked>

                    <span>SKU</span>
                  </label>

                  <label class="summary-option">
                    <input class="form-check-input"
                          type="checkbox"
                          id="summary_field_kategori">

                    <span>Kategori</span>
                  </label>

                  <label class="summary-option">
                    <input class="form-check-input"
                          type="checkbox"
                          id="summary_field_status">

                    <span>Status</span>
                  </label>

                  <label class="summary-option">
                    <input class="form-check-input"
                          type="checkbox"
                          id="summary_field_stock_total">

                    <span>Stock Total</span>
                  </label>

                  <label class="summary-option">
                    <input class="form-check-input"
                          type="checkbox"
                          id="summary_field_stock_per_warehouse">

                    <span>Stok Per Gudang</span>
                  </label>

                  <label class="summary-option">
                    <input class="form-check-input"
                          type="checkbox"
                          id="summary_field_lokasi_stock">

                    <span>Lokasi Stock</span>
                  </label>

                  <label class="summary-option">
                    <input class="form-check-input"
                          type="checkbox"
                          id="summary_field_supplier">

                    <span>Supplier</span>
                  </label>

                  <label class="summary-option">
                    <input class="form-check-input"
                          type="checkbox"
                          id="summary_field_berat">

                    <span>Berat (gram)</span>
                  </label>

                  <label class="summary-option">
                    <input class="form-check-input"
                          type="checkbox"
                          id="summary_field_deskripsi">

                    <span>Deskripsi</span>
                  </label>

                  <label class="summary-option">
                    <input class="form-check-input"
                          type="checkbox"
                          id="summary_field_satuan">

                    <span>Satuan</span>
                  </label>

                  <!-- HIDDEN -->
                  <div class="form-check" style="display:none;">
                    <input class="form-check-input"
                          type="checkbox"
                          id="summary_field_foto">

                    <label class="form-check-label"
                          for="summary_field_foto">
                      Foto
                    </label>
                  </div>

                </div>

              </div>
            </div>

          </div>

          <!-- RIGHT SIDE -->
          <div class="col-md-8">

            <div class="card border-0 shadow-sm h-100"
                style="border-radius: 18px;">

              <div class="card-header bg-white border-0 pt-4">

                <div class="d-flex align-items-center">

                  <div style="
                    width: 42px;
                    height: 42px;
                    border-radius: 12px;
                    background: #dcfce7;
                    display:flex;
                    align-items:center;
                    justify-content:center;
                    margin-right: 12px;
                  ">
                    <i class="fas fa-file-alt text-success"></i>
                  </div>

                  <div>
                    <h5 class="mb-0 fw-bold">
                      Preview Text
                    </h5>

                    <small class="text-muted">
                      Hasil rangkuman produk otomatis
                    </small>
                  </div>

                </div>

              </div>

              <div class="card-body">

                <textarea id="summary_textarea"
                          class="form-control"
                          rows="18"
                          readonly
                          style="
                            border-radius: 14px;
                            background: #0f172a;
                            border: none;
                            padding: 20px;
                            font-size: 13px;
                            line-height: 1.7;
                            font-family: monospace;
                            resize: none;
                          "></textarea>

              </div>

            </div>

          </div>

        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" onclick="copyText()">Copy Text</button>
        <button type="button" class="btn btn-secondary" onclick="close_and_clear()">Batal</button>
      </div>
    </div>
  </div>
</div>


<?php 
require DOC_ROOT_PATH . $this->config->item('footer');
?>

<script>

 $(document).ready(function() {
  product_list_table();

  $('#rangkumanModal .form-check-input').on('change', function() {
    if(summaryCache.length > 0) {
      renderSummaryText();
    }
  });
});


 let formatter = new Intl.NumberFormat('id-ID', {
  style: 'currency',
  currency: 'IDR',
  minimumFractionDigits: 0
});

let current_page = 1;
let items_per_page = 50;
let select_mode = false;
let selected_items = {};
let summaryCache = [];

$('#filter_unit, #filter_category, #filter_brand, #filter_supplier, #filter_status, #filter_paket, #filter_ppn')
.on('change', function () {
  current_page = 1;
  let key = $('#key').val();
  product_list_table(key);
});

$('#items_per_page, #sort_order').on('change', function() {
  current_page = 1;
  items_per_page = $('#items_per_page').val();
  let key = $('#key').val();
  product_list_table(key);
});


function product_list_table(key = '') {

  let unit      = $('#filter_unit').val();
  let category  = $('#filter_category').val();
  let brand     = $('#filter_brand').val();
  let supplier  = $('#filter_supplier').val();
  let status    = $('#filter_status').val();
  let paket     = $('#filter_paket').val();
  let ppn       = $('#filter_ppn').val();
  let sort      = $('#sort_order').val();

  $.ajax({
    type: "POST",
    url: "<?php echo base_url(); ?>Search/product_list",
    dataType: "json",
    data: {
      key: key,
      unit: unit,
      category: category,
      brand: brand,
      supplier: supplier,
      status: status,
      paket: paket,
      ppn: ppn,
      sort: sort,
      limit: items_per_page,
      page: current_page
    },
    success : function(response){

      let text = "";
      for (let i = 0; i < response.data.length; i++) {

        let stocks = response.data[i].total_stock ?? 0;
        let product_id = response.data[i].product_id;
        let checkedAttr = selected_items[product_id] ? 'checked' : '';
        let checkbox_html = select_mode
          ? `<input type="checkbox" class="product-checkbox" data-id="${product_id}" data-name="${response.data[i].product_name}" data-price="${response.data[i].product_sell_price_1}" onchange="toggle_item_selection(this)" ${checkedAttr} style="width:18px;height:18px;accent-color:#2d6a9f;cursor:pointer;">`
          : '';
        let row_click = select_mode ? '' : `onclick="popupOpen(${product_id})"`;
        let stockClass = stocks <= 0 ? 'low' : '';

        text += `
        <tr ${row_click}>
          ${select_mode ? `<td style="text-align:center;vertical-align:middle;">${checkbox_html}</td>` : ''}
          <td class="product-img-cell">
            <img src="<?php echo base_url(); ?>assets/products/${response.data[i].product_image}" alt="">
          </td>
          <td>
            <div class="product-name">${response.data[i].product_name}</div>
            <span class="product-price-badge">${formatter.format(response.data[i].product_sell_price_1)}</span>
          </td>
          <td><span class="product-stock ${stockClass}">${stocks} ${response.data[i].unit_name}</span></td>
        </tr>`;
      }

      document.getElementById("product_list").innerHTML = text;
      
      // Update pagination info
      let start = (response.current_page - 1) * response.items_per_page + 1;
      let end = Math.min(response.current_page * response.items_per_page, response.total_items);
      document.getElementById("pagination_info").innerHTML = `Menampilkan ${start} - ${end} dari ${response.total_items} hasil`;
      
      // Generate pagination controls
      generate_pagination(response.total_pages, response.current_page);
    }
  });
}

function generate_pagination(total_pages, current_page) {
  let pagination_html = '';
  
  // Previous button
  if(current_page > 1) {
    pagination_html += `<li class="page-item"><a class="page-link" href="javascript:void(0)" onclick="go_to_page(${current_page - 1})">Previous</a></li>`;
  } else {
    pagination_html += `<li class="page-item disabled"><span class="page-link">Previous</span></li>`;
  }
  
  // Page numbers
  let start_page = Math.max(1, current_page - 2);
  let end_page = Math.min(total_pages, current_page + 2);
  
  if(start_page > 1) {
    pagination_html += `<li class="page-item"><a class="page-link" href="javascript:void(0)" onclick="go_to_page(1)">1</a></li>`;
    if(start_page > 2) {
      pagination_html += `<li class="page-item disabled"><span class="page-link">...</span></li>`;
    }
  }
  
  for(let i = start_page; i <= end_page; i++) {
    if(i === current_page) {
      pagination_html += `<li class="page-item active"><span class="page-link">${i}</span></li>`;
    } else {
      pagination_html += `<li class="page-item"><a class="page-link" href="javascript:void(0)" onclick="go_to_page(${i})">${i}</a></li>`;
    }
  }
  
  if(end_page < total_pages) {
    if(end_page < total_pages - 1) {
      pagination_html += `<li class="page-item disabled"><span class="page-link">...</span></li>`;
    }
    pagination_html += `<li class="page-item"><a class="page-link" href="javascript:void(0)" onclick="go_to_page(${total_pages})">${total_pages}</a></li>`;
  }
  
  // Next button
  if(current_page < total_pages) {
    pagination_html += `<li class="page-item"><a class="page-link" href="javascript:void(0)" onclick="go_to_page(${current_page + 1})">Next</a></li>`;
  } else {
    pagination_html += `<li class="page-item disabled"><span class="page-link">Next</span></li>`;
  }
  
  document.getElementById("pagination_controls").innerHTML = pagination_html;
}

function go_to_page(page) {
  current_page = page;
  let key = $('#key').val();
  product_list_table(key);
}

$('#key').on('input', function (event) {
  current_page = 1;
  var key = this.value;
  product_list_table(key);
})


function popupOpen(id) {
  let link = window.location.origin + window.location.pathname + '/detailsearch?id='+id;
  Fancybox.show([
    {
      src: link,
      type: "iframe",
      preload: false,
      top:0,
    },
  ]);
}

function toggle_select_mode() {
  select_mode = !select_mode;
  let btn = document.getElementById('toggle_select_btn');
  let colCheck = document.getElementById('col_check');
  
  if(select_mode) {
    btn.classList.remove('btn-warning');
    btn.classList.add('btn-danger');
    btn.innerHTML = '<i class="fas fa-times mr-1"></i> Batal';
    colCheck.style.display = '';
  } else {
    btn.classList.remove('btn-danger');
    btn.classList.add('btn-warning');
    btn.innerHTML = '<i class="fas fa-check-square mr-1"></i> Pilih';
    colCheck.style.display = 'none';
    selected_items = {};
    document.getElementById('summary_textarea').value = '';
  }
  
  // Refresh table
  let key = $('#key').val();
  product_list_table(key);
}

function toggle_item_selection(checkbox) {
  let product_id = checkbox.getAttribute('data-id');
  let product_name = checkbox.getAttribute('data-name');
  let product_price = checkbox.getAttribute('data-price');
  
  if(checkbox.checked) {
    selected_items[product_id] = {
      id: product_id,
      name: product_name,
      price: product_price
    };
  } else {
    delete selected_items[product_id];
  }
}

function show_summary() {
  if(Object.keys(selected_items).length === 0) {
    Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Silahkan Pilih Item Terlebih Dahulu!',
              })
    return;
  }

  let requests = [];
  for(let product_id in selected_items) {
    requests.push(new Promise((resolve, reject) => {
      $.ajax({
        type: "POST",
        url: "<?php echo base_url(); ?>Search/search_item_selected_details",
        dataType: "json",
        data: {item_id: product_id},
        success: function(data) {
          resolve(data);
        },
        error: function(xhr, status, error) {
          reject(error);
        }
      });
    }));
  }

  Promise.all(requests)
    .then(results => {
      summaryCache = results;
      renderSummaryText();
      $('#rangkumanModal').modal('show');
    })
    .catch(error => {
      console.error(error);
      alert('Gagal mengambil data item. Coba lagi.');
    });
}

function getSummaryFields() {
  return {
    sku: $('#summary_field_sku').is(':checked'),
    price: $('#summary_field_price option:selected').val(),
    kategori: $('#summary_field_kategori').is(':checked'),
    status: $('#summary_field_status').is(':checked'),
    stock_total: $('#summary_field_stock_total').is(':checked'),
    stock_per_warehouse: $('#summary_field_stock_per_warehouse').is(':checked'),
    lokasi_stock: $('#summary_field_lokasi_stock').is(':checked'),
    supplier: $('#summary_field_supplier').is(':checked'),
    berat: $('#summary_field_berat').is(':checked'),
    deskripsi: $('#summary_field_deskripsi').is(':checked'),
    satuan: $('#summary_field_satuan').is(':checked'),
    foto: $('#summary_field_foto').is(':checked')
  };
}

$('#rangkumanModal .form-check-input, #summary_field_price').on('change', function() {
  if(summaryCache.length > 0) {
    renderSummaryText();
  }
});

function renderSummaryText() {
  if(!summaryCache || summaryCache.length === 0) {
    document.getElementById('summary_textarea').value = '';
    return;
  }

  let fields = getSummaryFields();
  let summary = '';
  let total_price = 0;
  let item_count = 1;

  summaryCache.forEach(result => {
    let itemsToProcess = Array.isArray(result.item) ? result.item : (result.item ? [result.item] : []);
    itemsToProcess.forEach(item => {
      let stocks = Array.isArray(result.stocks) ? result.stocks : [];
      if(fields.price) {
        switch(fields.price) {
          case '1': price = parseInt(item.product_sell_price_1) || 0; break;
          case '2': price = parseInt(item.product_sell_price_2) || 0; break;
          case '3': price = parseInt(item.product_sell_price_3) || 0; break;
          case '4': price = parseInt(item.product_sell_price_4) || 0; break;
          default: price = parseInt(item.product_sell_price_1) || 0;
        }
      } else {
        price = 0;
      }

      summary += item_count + '. ' + item.product_name + '\n';
      if(fields.sku) summary += 'SKU: ' + (item.product_code || '-') + '\n';
      if(fields.price) summary += 'Harga: ' + formatter.format(price) + '\n';
      if(fields.kategori) summary += 'Kategori: ' + (item.category_name || '-') + '\n';
      if(fields.status) summary += 'Status: ' + (item.product_status || '-') + '\n';
      if(fields.supplier) summary += 'Supplier: ' + (item.product_supplier_tag || '-') + '\n';
      if(fields.berat) summary += 'Berat (gram): ' + (item.product_weight || '-') + '\n';
      if(fields.satuan) summary += 'Satuan: ' + (item.unit_name || '-') + '\n';
      if(fields.deskripsi) summary += 'Deskripsi: ' + (item.product_desc || '-') + '\n';
      if(fields.stock_total) {
        let totalStock = stocks.reduce((sum, row) => sum + (parseInt(row.stock) || 0), 0);
        summary += 'Stock Total: ' + totalStock + '\n';
      }
      if(fields.stock_per_warehouse) {
        if(fields.stock_per_warehouse && fields.lokasi_stock) {
          summary += 'Stok Per Gudang:\n';
        } else if(fields.stock_per_warehouse) {
          summary += 'Stok Per Gudang:\n';
        } else {
          summary += 'Lokasi Stock:\n';
        }
        if(stocks.length === 0) {
          summary += '  - Tidak ada data stock\n';
        } else {
          stocks.forEach(row => {
            let warehouseName = row.warehouse_name || row.warehouse_code || '-';
            let stockValue = row.stock || 0;
            let locationText = fields.lokasi_stock ? ' (' + warehouseName + ')' : '';
            summary += '  - ' + (fields.stock_per_warehouse ? stockValue + ' ' + (item.unit_name || '') : '') + ' ' +(warehouseName) + '\n';
          });
        }
      }
      if(fields.lokasi_stock){
             summary += 'Lokasi: ' + (item.product_location) + '\n';
        }
      if(fields.foto) {
        let imageUrl = item.product_image ? '<?php echo base_url(); ?>assets/products/' + item.product_image : '-';
        summary += 'Foto: ' + imageUrl + '\n';
      }
      item_count++;
    });
  });

  document.getElementById('summary_textarea').value = summary;
}

function reset_selection() {
  selected_items = {};
  document.getElementById('summary_textarea').value = '';
  document.querySelectorAll('.product-checkbox').forEach(checkbox => {
    checkbox.checked = false;
  });
}

function clear_selection() {
  reset_selection();
    let title = 'Batal';
    let message = 'Pilihan item telah dibatalkan.';
    let state = 'success';
    notif_success(title, message, state);
     $('#rangkumanModal').modal('hide');

}

function close_and_clear() {
  clear_selection();
  $('#rangkumanModal').modal('hide');
}

function copyText() {
    const textarea = document.getElementById('summary_textarea');
    
    textarea.select();
    textarea.setSelectionRange(0, 99999); // Untuk mobile

    navigator.clipboard.writeText(textarea.value)
        .then(() => {
           $('#rangkumanModal').modal('hide');
            let title = 'Copy Text';
            let message = 'Teks berhasil disalin!';
            let state = 'success';
            notif_success(title, message, state);
            
        })
        .catch(err => {
            console.error('Gagal menyalin teks:', err);
        });
}

</script>