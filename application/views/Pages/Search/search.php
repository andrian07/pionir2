<?php 
define('DOC_ROOT_PATH', $_SERVER['DOCUMENT_ROOT'].'/');
require DOC_ROOT_PATH . $this->config->item('header');
?>
<style type="text/css">
  .image-td{
    width: 15%;
  }

  @media only screen and (max-width: 600px) {
    .image-td{
      width: 35%;
    }
  }
</style>
</div>

<div class="container">
  <div class="page-inner">
    <div class="page-header">
      <h3 class="fw-bold mb-3" style="padding-left: 20px;">Informasi Produk</h3>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <div class="row" style="margin-top:10px;">
               <div class="col-md-3">
                <label style="font-weight: 700; margin-bottom: 5px;">Unit:</label>
                <select id="filter_unit" class="form-control input-full js-example-basic-single">
                  <option value="">-- Semua Unit --</option>
                  <?php foreach($data['unit_list'] as $u){ ?>
                    <option value="<?= $u->unit_id ?>"><?= $u->unit_name ?></option>
                  <?php } ?>
                </select>
              </div>

              <div class="col-md-3">
                <label style="font-weight: 700; margin-bottom: 5px;">Kategori:</label>
                <select id="filter_category" class="form-control input-full js-example-basic-single">
                  <option value="">-- Semua Kategori --</option>
                  <?php foreach($data['category_list'] as $c){ ?>
                    <option value="<?= $c->category_id ?>"><?= $c->category_name ?></option>
                  <?php } ?>
                </select>
              </div>

              <div class="col-md-3">
                
                <label style="font-weight: 700; margin-bottom: 5px;">Brand:</label>
                <select id="filter_brand" class="form-control input-full js-example-basic-single">
                  <option value="">-- Semua Brand --</option>
                  <?php foreach($data['brand_list'] as $b){ ?>
                    <option value="<?= $b->brand_id ?>"><?= $b->brand_name ?></option>
                  <?php } ?>
                </select>
              </div>

              <div class="col-md-3">
                <label style="font-weight: 700; margin-bottom: 5px;">Supplier:</label>
                <select id="filter_supplier" class="form-control input-full js-example-basic-single">
                  <option value="">-- Semua Supplier --</option>
                  <?php foreach($data['supplier_list'] as $s){ ?>
                    <option value="<?= $s->supplier_name ?>"><?= $s->supplier_name ?></option>
                  <?php } ?>
                </select>
              </div>

              <div class="col-md-3">
                <label style="font-weight: 700; margin-bottom: 5px;">Status:</label>
                <select id="filter_status" class="form-control input-full js-example-basic-single">
                  <option value="">-- Semua Status --</option>
                    <option value="Aktif">Aktif</option>
                    <option value="Discontinue">Discontinue</option>
                </select>
              </div>

              <div class="col-md-3">
                <label style="font-weight: 700; margin-bottom: 5px;">Paket:</label>
                <select id="filter_paket" class="form-control input-full js-example-basic-single">
                  <option value="">-- Semua --</option>
                    <option value="N">Bukan Paket</option>
                    <option value="Y">Paket</option>
                </select>
              </div>

               <div class="col-md-3">
                <label style="font-weight: 700; margin-bottom: 5px;">PPN:</label>
                <select id="filter_ppn" class="form-control input-full js-example-basic-single">
                  <option value="">-- Semua --</option>
                    <option value="N">Bukan PPN</option>
                    <option value="Y">PPN</option>
                </select>
              </div>

              <div class="col-md-3">
                <button type="button" class="btn btn-sm btn-info" id="toggle_select_btn" onclick="toggle_select_mode()" style="margin-top: 25px;">Pilih</button>
                <button type="button" class="btn btn-sm btn-primary" onclick="show_summary()" style="margin-top: 25px;">Rangkuman</button>
              </div>


            </div>
          </div>

          <div class="card-header">
            <div class="row">
              <div id="info" class="col-12"></div>

              <div class="col-12">
                <label style="font-weight: 700; margin-bottom: 5px; margin-left:5px;">Barcode / Nama Produk</label>
              </div>
              <div class="col-sm-10">
                <!-- text input -->
                <div class="form-group">
                  <input id="key" name="key" type="text" class="form-control ui-autocomplete-input" placeholder="Barcode atau Nama Produk" value="" autocomplete="off">
                </div>
              </div>
            </div>
          </div>

          
          <div class="card-body">
            <div class="row mb-3">
              <div class="col-md-3">
                <label style="font-weight: 700; margin-bottom: 5px;">Items Per Page:</label>
                <select id="items_per_page" class="form-control">
                  <option value="20">20 item</option>
                  <option value="30">30 item</option>
                  <option value="50" selected>50 item</option>
                  <option value="100">100 item</option>
                  <option value="200">200 item</option>
                  <option value="500">500 item</option>
                </select>
              </div>
              <div class="col-md-6 text-center">
                <div id="pagination_info" style="padding-top: 32px; font-weight: 700;">Menampilkan 0 hasil</div>
              </div>
              
            </div>

            <div class="table-responsive">
              <table class="table table-hover">
                <tbody id="product_list">

                </tbody>
              </table>
            </div>

            <div class="row mt-3">
              <div class="col-md-12">
                <nav aria-label="Page navigation">
                  <ul class="pagination justify-content-center" id="pagination_controls">
                  </ul>
                </nav>
              </div>
            </div>
          </div>
        </div>
      </div>
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
      <div class="modal-body">
        <textarea id="summary_textarea" class="form-control" rows="10" readonly></textarea>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" onclick="close_and_clear()">Batal</button>
        <button type="button" class="btn btn-primary" data-dismiss="modal">Tutup</button>
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

$('#filter_unit, #filter_category, #filter_brand, #filter_supplier, #filter_status, #filter_paket, #filter_ppn')
.on('change', function () {
  current_page = 1;
  let key = $('#key').val();
  product_list_table(key);
});

$('#items_per_page').on('change', function() {
  current_page = 1;
  items_per_page = $(this).val();
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
      limit: items_per_page,
      page: current_page
    },
    success : function(response){

      let text = "";
      for (let i = 0; i < response.data.length; i++) {

        let stocks = response.data[i].total_stock ?? 0;
        let product_id = response.data[i].product_id;
        let checkedAttr = selected_items[product_id] ? 'checked' : '';
        let checkbox_html = select_mode ? `<input type="checkbox" class="product-checkbox" data-id="${product_id}" data-name="${response.data[i].product_name}" data-price="${response.data[i].product_sell_price_1}" onchange="toggle_item_selection(this)" ${checkedAttr}>` : '';
        let row_click = select_mode ? '' : `onclick="popupOpen(${product_id})"`;

        text+= `
        <tr ${row_click}>
          ${checkbox_html ? `<td style="width: 5%; text-align: center;">${checkbox_html}</td>` : ''}
          <td class="image-td">
            <img src="<?php echo base_url(); ?>assets/products/${response.data[i].product_image}" width="100%">
          </td>
          <td>
            ${response.data[i].product_name}<br>
            <span class="badge badge-primary">${formatter.format(response.data[i].product_sell_price_1)}</span>
          </td>
          <td>${stocks} ${response.data[i].unit_name}</td>
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
  
  if(select_mode) {
    btn.classList.remove('btn-info');
    btn.classList.add('btn-warning');
    btn.textContent = 'Batal';
  } else {
    btn.classList.remove('btn-warning');
    btn.classList.add('btn-info');
    btn.textContent = 'Pilih';
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
    alert('Pilih minimal 1 item terlebih dahulu!');
    return;
  }

  let requests = [];
  for(let product_id in selected_items) {
    requests.push(new Promise((resolve, reject) => {
      $.ajax({
        type: "POST",
        url: "<?php echo base_url(); ?>Search/search_item_selected",
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
      let summary = '';
      let total_price = 0;
      let item_count = 1;

      results.forEach(data => {
        if(Array.isArray(data) && data.length > 0) {
          let item = data[0];
          let price = parseInt(item.product_sell_price_1) || 0;
          summary += item_count + '. ' + item.product_name + ' \n ' + formatter.format(price) + '\n\n';
          total_price += price;
          item_count++;
        }
      });


      document.getElementById('summary_textarea').value = summary;
      $('#rangkumanModal').modal('show');
    })
    .catch(error => {
      console.error(error);
      alert('Gagal mengambil data item. Coba lagi.');
    });
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
  alert('Pilihan telah dihapus!');
}

function close_and_clear() {
  clear_selection();
  $('#rangkumanModal').modal('hide');
}

</script>