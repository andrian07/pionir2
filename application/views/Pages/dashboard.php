<?php 
define('DOC_ROOT_PATH', $_SERVER['DOCUMENT_ROOT'].'/');
require DOC_ROOT_PATH . $this->config->item('header');
?>
</div>

<style>
:root {
  --red:#f25961; --red-dk:#c0392b; --green:#2ecc71; --blue:#3b82f6; --amber:#f59e0b;
  --dark:#1e2a3a; --slate:#64748b; --border:#e8edf5; --bg:#f0f3f9; --white:#fff;
  --card-sh:0 2px 16px rgba(30,42,58,.08);
}
body{background:var(--bg)!important; font-size: 15.5px !important;}
.page-inner{padding-top:0!important;}
.container{max-width:1400px;}
.dash-banner{background:linear-gradient(135deg,#1e2a3a 0%,#2c3e60 55%,#1a3a5c 100%);border-radius:20px;padding:1.8rem 2rem;margin-bottom:1.6rem;position:relative;overflow:hidden;color:#fff;}
.dash-banner::before{content:"";position:absolute;width:300px;height:300px;border-radius:50%;background:radial-gradient(circle,rgba(242,89,97,.2) 0%,transparent 70%);right:-60px;top:-80px;}
.dash-banner h2{font-size:1.65rem;font-weight:700;margin:0 0 .25rem;color:#fff;position:relative;z-index:1;}
.dash-banner p{font-size:.95rem;color:rgba(255,255,255,.6);margin:0;position:relative;z-index:1;}
.branch-pill{display:inline-flex;align-items:center;gap:.45rem;background:rgba(242,89,97,.85);color:#fff;border-radius:30px;padding:.4rem 1rem;font-size:.92rem;font-weight:600;box-shadow:0 4px 14px rgba(242,89,97,.4);margin-bottom:.4rem;position:relative;z-index:1;}
.date-text{font-size:.88rem;color:rgba(255,255,255,.5);display:block;text-align:right;position:relative;z-index:1;}
.stat-card{border:none!important;border-radius:18px!important;overflow:hidden;margin-bottom:1.4rem;position:relative;transition:transform .22s,box-shadow .22s;}
.stat-card:hover{transform:translateY(-4px);}
.stat-card .card-body{padding:1.5rem!important;}
.sc-top{display:flex;align-items:flex-start;justify-content:space-between;gap:1rem;margin-bottom:1.1rem;}
.sc-icon{width:54px;height:54px;border-radius:15px;display:flex;align-items:center;justify-content:center;font-size:1.5rem;flex-shrink:0;background:rgba(255,255,255,.2);color:#fff;}
.sc-label{font-size:.82rem;font-weight:700;text-transform:uppercase;letter-spacing:.8px;opacity:.8;margin-bottom:.3rem;color:#fff;}
.sc-value{font-size:1.7rem;font-weight:800;color:#fff;line-height:1;letter-spacing:-.5px;}
.sc-divider{border:none;border-top:1px solid rgba(255,255,255,.18);margin:0 0 .85rem;}
.sc-meta{display:flex;justify-content:space-between;font-size:.87rem;color:rgba(255,255,255,.75);}
.sc-meta strong{color:#fff;font-weight:700;}
.sc-ring1,.sc-ring2{position:absolute;border-radius:50%;border:1px solid rgba(255,255,255,.08);pointer-events:none;}
.sc-ring1{width:130px;height:130px;right:-30px;top:-30px;}
.sc-ring2{width:80px;height:80px;right:20px;bottom:-25px;}
.sc-red{background:linear-gradient(135deg,#f25961,#c0392b);box-shadow:0 8px 28px rgba(242,89,97,.35);}
.sc-green{background:linear-gradient(135deg,#2ecc71,#16a34a);box-shadow:0 8px 28px rgba(46,204,113,.28);}
.sc-blue{background:linear-gradient(135deg,#3b82f6,#1d4ed8);box-shadow:0 8px 28px rgba(59,130,246,.28);}
.panel{border:none!important;border-radius:18px!important;box-shadow:var(--card-sh)!important;margin-bottom:1.4rem;overflow:hidden;}
.panel>.card-header{background:var(--white)!important;border-bottom:1px solid var(--border)!important;padding:.95rem 1.4rem!important;}
.ph-title{display:flex;align-items:center;gap:.55rem;font-size:.9rem;font-weight:700;text-transform:uppercase;letter-spacing:.7px;color:var(--dark);}
.ph-icon{width:30px;height:30px;border-radius:8px;display:flex;align-items:center;justify-content:center;font-size:.88rem;flex-shrink:0;}
.ph-badge{font-size:.83rem;font-weight:700;padding:.2rem .65rem;border-radius:20px;}
.panel>.card-body{background:var(--white);padding:1.1rem 1.4rem!important;}
#comment{border:1.5px solid var(--border);border-radius:10px;resize:none;font-size:.97rem;color:var(--dark);transition:border-color .2s,box-shadow .2s;background:#fafbfd;}
#comment:focus{border-color:var(--red);box-shadow:0 0 0 3px rgba(242,89,97,.1);outline:none;background:#fff;}
.btn-save{background:linear-gradient(135deg,var(--red),var(--red-dk));border:none;color:#fff;border-radius:8px;padding:.52rem 1.3rem;font-size:.94rem;font-weight:600;margin-top:.85rem;cursor:pointer;box-shadow:0 4px 12px rgba(242,89,97,.3);transition:opacity .2s,transform .15s;}
.btn-save:hover{opacity:.88;} .btn-save:active{transform:scale(.97);}
.t-feed{list-style:none;padding:0;margin:0;}
.t-item{display:flex;gap:.85rem;padding:.65rem 0;border-bottom:1px solid var(--border);}
.t-item:last-child{border-bottom:none;}
.t-dot{width:32px;height:32px;border-radius:10px;display:flex;align-items:center;justify-content:center;font-size:.85rem;flex-shrink:0;margin-top:.05rem;}
.t-dot-red{background:rgba(242,89,97,.1);color:var(--red);} .t-dot-blue{background:rgba(59,130,246,.1);color:var(--blue);}
.t-body{flex:1;min-width:0;}
.t-title{font-size:1rem;color:var(--dark);font-weight:500;line-height:1.45;margin-bottom:.18rem;}
.t-title a{color:var(--red);font-weight:700;text-decoration:none;} .t-title a:hover{text-decoration:underline;}
.t-time{font-size:.81rem;color:var(--slate);display:flex;align-items:center;gap:.25rem;}
.l-row{display:flex;align-items:flex-start;justify-content:space-between;gap:.8rem;padding:.65rem 0;border-bottom:1px solid var(--border);}
.l-row:last-child{border-bottom:none;}
.lr-name{font-size:.92rem;font-weight:700;color:var(--dark);margin-bottom:.1rem;}
.lr-sub{font-size:.84rem;color:var(--slate);}
.lr-end{text-align:right;flex-shrink:0;}
.lr-end small{font-size:.82rem;color:var(--slate);display:block;}
.lr-end a{font-size:.83rem;color:var(--red);font-weight:600;text-decoration:none;} .lr-end a:hover{text-decoration:underline;}
.rank-num{width:26px;height:26px;border-radius:8px;display:flex;align-items:center;justify-content:center;font-size:.82rem;font-weight:800;flex-shrink:0;margin-top:.1rem;}
.rank-1{background:rgba(245,158,11,.15);color:#d97706;} .rank-2{background:rgba(100,116,139,.12);color:#475569;} .rank-3{background:rgba(146,64,14,.12);color:#92400e;} .rank-n{background:var(--bg);color:var(--slate);}
.qty-pill{background:rgba(59,130,246,.1);color:var(--blue);border-radius:20px;padding:.18rem .65rem;font-size:.83rem;font-weight:700;white-space:nowrap;display:inline-block;}
.inv-pill{background:rgba(242,89,97,.08);color:var(--red);border-radius:6px;padding:.15rem .5rem;font-size:.82rem;font-weight:700;display:inline-block;margin-bottom:.2rem;}
.debt-val{font-size:.92rem;font-weight:700;color:var(--red-dk);}
.due-date{font-size:.82rem;color:var(--slate);}
.scroll-body{max-height:300px;overflow-y:auto;}
.scroll-body::-webkit-scrollbar{width:4px;} .scroll-body::-webkit-scrollbar-track{background:transparent;} .scroll-body::-webkit-scrollbar-thumb{background:var(--border);border-radius:4px;}
.panel{height:350px;}
</style>

<div class="container">
  <div class="page-inner" style="padding-top:1.4rem;">

    <!-- WELCOME BANNER -->
    <div class="dash-banner">
      <div class="d-flex align-items-center justify-content-between flex-wrap" style="gap:1rem;">
        <div>
          <h2><i class="fas fa-bolt" style="color:#f25961;margin-right:.5rem;"></i>Selamat Datang!</h2>
          <p>Berikut ringkasan operasional bisnis Pionir Elektronik hari ini.</p>
        </div>
        <div style="text-align:right;">
          <div class="branch-pill">
            <i class="fas fa-store"></i>
            Pionir <?php echo htmlspecialchars($_SESSION['user_branch']); ?>
          </div>
          <span class="date-text"><?php echo date('l, d F Y'); ?></span>
        </div>
      </div>
    </div>

    <!-- STAT CARDS -->
    <div class="row">
      <div class="col-12 col-sm-6 col-xl-4">
        <div class="card stat-card sc-red">
          <span class="sc-ring1"></span><span class="sc-ring2"></span>
          <div class="card-body">
            <div class="sc-top">
              <div>
                <div class="sc-label">Penjualan Hari Ini</div>
                <div class="sc-value">Rp <?php echo number_format($data['get_transaction_today'][0]['total_today'] ?? 0); ?></div>
              </div>
              <div class="sc-icon"><i class="fas fa-shopping-bag"></i></div>
            </div>
            <hr class="sc-divider">
            <div class="sc-meta">
              <span><strong><?php echo number_format($data['get_transaction_today'][0]['total_transaction'] ?? 0); ?></strong> Transaksi</span>
              <span><strong><?php echo number_format($data['get_transaction_today_item'][0]['total_item'] ?? 0); ?></strong> Item Terjual</span>
            </div>
          </div>
        </div>
      </div>
      <div class="col-12 col-sm-6 col-xl-4">
        <div class="card stat-card sc-green">
          <span class="sc-ring1"></span><span class="sc-ring2"></span>
          <div class="card-body">
            <div class="sc-top">
              <div>
                <div class="sc-label">Penjualan Bulan Ini</div>
                <div class="sc-value">Rp <?php echo number_format($data['get_transaction_month'][0]['total_month'] ?? 0); ?></div>
              </div>
              <div class="sc-icon"><i class="fas fa-chart-line"></i></div>
            </div>
            <hr class="sc-divider">
            <div class="sc-meta">
              <span><strong><?php echo number_format($data['get_transaction_month'][0]['total_transaction'] ?? 0); ?></strong> Transaksi</span>
              <span><strong><?php echo number_format($data['get_transaction_month_item'][0]['total_item'] ?? 0); ?></strong> Item Terjual</span>
            </div>
          </div>
        </div>
      </div>
      <div class="col-12 col-sm-6 col-xl-4">
        <div class="card stat-card sc-blue">
          <span class="sc-ring1"></span><span class="sc-ring2"></span>
          <div class="card-body">
            <div class="sc-top">
              <div>
                <div class="sc-label">Total Aset</div>
                <div class="sc-value">Rp <?php echo number_format($data['get_total_asset'][0]['total_omzet'] ?? 0); ?></div>
              </div>
              <div class="sc-icon"><i class="fas fa-layer-group"></i></div>
            </div>
            <hr class="sc-divider">
            <div class="sc-meta">
              <span><strong><?php echo number_format($data['get_total_asset_item'][0]['total_item'] ?? 0); ?></strong> Item dalam Stok</span>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- ROW 2: Catatan | Aktifitas Terakhir | Aktifitas Mendatang -->
    <div class="row">

      <div class="col-md-4">
        <div class="card panel">
          <div class="card-header">
            <div class="d-flex align-items-center justify-content-between">
              <div class="ph-title">
                <div class="ph-icon" style="background:rgba(242,89,97,.1);color:var(--red);"><i class="fas fa-sticky-note"></i></div>
                Catatan
              </div>
            </div>
          </div>
          <div class="card-body">
            <textarea class="form-control" id="comment" rows="9"><?php echo $data['get_note'][0]['ms_note_text']; ?></textarea>
            <button class="btn-save" id="save_note">
              <i class="fas fa-save" style="margin-right:.35rem;"></i>Simpan Catatan
            </button>
          </div>
        </div>
      </div>

      <div class="col-md-4">
        <div class="card panel">
          <div class="card-header">
            <div class="d-flex align-items-center justify-content-between">
              <div class="ph-title">
                <div class="ph-icon" style="background:rgba(242,89,97,.1);color:var(--red);"><i class="fas fa-history"></i></div>
                Aktifitas Terakhir
              </div>
              <span class="ph-badge" style="background:rgba(242,89,97,.1);color:var(--red);"><?php echo date('d M'); ?></span>
            </div>
          </div>
          <div class="card-body scroll-body">
            <ul class="t-feed">
              <?php foreach($data['get_last_activity'] as $row): ?>
              <li class="t-item">
                <div class="t-dot t-dot-red"><i class="fas fa-circle-dot"></i></div>
                <div class="t-body">
                  <div class="t-title">
                    <?php
                      $desc = explode('Ref:', $row['activity_table_desc'])[0];
                      echo trim(htmlspecialchars($desc));
                    ?> &mdash; <a href="#">"<?php echo htmlspecialchars($row['activity_table_ref']); ?>"</a>
                  </div>
                  <div class="t-time"><i class="fas fa-clock" style="font-size:.75rem;"></i> <?php echo date('d M Y, H:i', strtotime($row['created_at'])); ?></div>
                </div>
              </li>
              <?php endforeach; ?>
            </ul>
          </div>
        </div>
      </div>

      <div class="col-md-4">
        <div class="card panel">
          <div class="card-header">
            <div class="d-flex align-items-center justify-content-between">
              <div class="ph-title">
                <div class="ph-icon" style="background:rgba(59,130,246,.1);color:var(--blue);"><i class="fas fa-calendar-check"></i></div>
                Aktifitas Mendatang
              </div>
              <span class="ph-badge" style="background:rgba(59,130,246,.1);color:var(--blue);"><?php echo date('d M', strtotime('+1 day')); ?></span>
            </div>
          </div>
          <div class="card-body scroll-body">
            <ul class="t-feed">
              <?php foreach($data['get_next_activity'] as $row): ?>
              <li class="t-item">
                <div class="t-dot t-dot-blue"><i class="fas fa-bell"></i></div>
                <div class="t-body">
                  <div class="t-title">
                    <?php echo ($row['keterangan'] === 'purchase') ? 'Jatuh Tempo Pembelian' : 'Jatuh Tempo Penjualan'; ?>
                    &mdash; <a href="#">"<?php echo htmlspecialchars($row['inv']); ?>"</a>
                  </div>
                  <div class="t-time"><i class="fas fa-calendar" style="font-size:.75rem;"></i> <?php echo date('d M Y', strtotime($row['due_date'])); ?></div>
                </div>
              </li>
              <?php endforeach; ?>
            </ul>
          </div>
        </div>
      </div>

    </div>

    <!-- ROW 3: Transfer Stok | Top Products | Faktur Terlewat -->
    <div class="row">

      <div class="col-md-4">
        <div class="card panel">
          <div class="card-header">
            <div class="d-flex align-items-center justify-content-between">
              <div class="ph-title">
                <div class="ph-icon" style="background:rgba(245,158,11,.1);color:var(--amber);"><i class="fas fa-exchange-alt"></i></div>
                History Transfer Stok
              </div>
              <a href="<?php echo base_url(); ?>Transferstock" style="font-size:.85rem;color:var(--red);font-weight:600;text-decoration:none;">Lihat Semua &rarr;</a>
            </div>
          </div>
          <div class="card-body scroll-body">
            <?php foreach($data['transfer_stock'] as $row): ?>
            <div class="l-row">
              <div style="flex:1;min-width:0;">
                <div class="lr-name"><?php echo htmlspecialchars($row['warehouse_from_name']); ?> <span style="color:var(--slate);font-weight:400;">&rarr;</span> <?php echo htmlspecialchars($row['warehouse_to_name']); ?></div>
                <div class="lr-sub">Transfer antar cabang</div>
              </div>
              <div class="lr-end">
                <small><?php echo date('d M, H:i', strtotime($row['created_at'])); ?></small>
                <a href="#"><?php echo htmlspecialchars($row['hd_transfer_stock_code']); ?></a>
              </div>
            </div>
            <?php endforeach; ?>
          </div>
        </div>
      </div>

      <div class="col-md-4">
        <div class="card panel">
          <div class="card-header">
            <div class="ph-title">
              <div class="ph-icon" style="background:rgba(245,158,11,.1);color:var(--amber);"><i class="fas fa-trophy"></i></div>
              Top Products 3 Bulan
            </div>
          </div>
          <div class="card-body">
            <?php
              $rankClasses = ['rank-1','rank-2','rank-3'];
              $ri = 0;
              foreach($data['top_product_3_month'] as $row):
                $cls = isset($rankClasses[$ri]) ? $rankClasses[$ri] : 'rank-n';
                $ri++;
            ?>
            <div class="l-row">
              <div class="rank-num <?php echo $cls; ?>"><?php echo $ri; ?></div>
              <div style="flex:1;min-width:0;">
                <div class="lr-name"><?php echo htmlspecialchars($row['product_name']); ?></div>
                <div class="lr-sub"><?php echo htmlspecialchars($row['product_code']); ?></div>
              </div>
              <span class="qty-pill"><?php echo $row['total_transaction']; ?> item</span>
            </div>
            <?php endforeach; ?>
          </div>
        </div>
      </div>

      <div class="col-md-4">
        <div class="card panel">
          <div class="card-header">
            <div class="ph-title">
              <div class="ph-icon" style="background:rgba(242,89,97,.1);color:var(--red);"><i class="fas fa-file-invoice-dollar"></i></div>
              Faktur Terlewat
            </div>
          </div>
          <div class="card-body scroll-body">
            <?php foreach($data['lost_faktur'] as $row): ?>
            <div class="l-row">
              <div style="flex:1;min-width:0;">
                <div><span class="inv-pill"><?php echo htmlspecialchars($row['hd_sales_inv']); ?></span></div>
                <div class="debt-val">Rp <?php echo number_format($row['hd_sales_remaining_debt']); ?></div>
              </div>
              <div class="lr-end" style="margin-top:.2rem;">
                <span class="due-date">
                  <i class="fas fa-calendar-times" style="color:var(--red);margin-right:.2rem;font-size:.78rem;"></i>
                  <?php echo date('d-m-Y', strtotime($row['hd_sales_due_date'])); ?>
                </span>
              </div>
            </div>
            <?php endforeach; ?>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>

<?php require DOC_ROOT_PATH . $this->config->item('footer'); ?>

<script>
  $('#save_note').on('click', function(e) {
    e.preventDefault();
    var $btn = $(this);
    $btn.prop('disabled', true).html('<i class="fas fa-spinner fa-spin" style="margin-right:.35rem;"></i>Menyimpan...');
    $.ajax({
      type: 'POST',
      url: '<?php echo base_url(); ?>Dashboard/save_comment',
      dataType: 'json',
      data: { comment: $('#comment').val() },
      success: function(res) {
        if (res.code == '200') {
          Swal.fire({ icon: 'success', title: 'Tersimpan!', text: 'Catatan berhasil disimpan.', confirmButtonColor: '#f25961', timer: 1800, showConfirmButton: false });
        } else {
          Swal.fire({ icon: 'error', title: 'Gagal', text: res.result, confirmButtonColor: '#f25961' });
        }
        $btn.prop('disabled', false).html('<i class="fas fa-save" style="margin-right:.35rem;"></i>Simpan Catatan');
      },
      error: function() {
        Swal.fire({ icon: 'error', title: 'Kesalahan Server', text: 'Tidak dapat terhubung.', confirmButtonColor: '#f25961' });
        $btn.prop('disabled', false).html('<i class="fas fa-save" style="margin-right:.35rem;"></i>Simpan Catatan');
      }
    });
  });
</script>
