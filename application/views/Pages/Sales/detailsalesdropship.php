<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title></title>

  <link rel="stylesheet" href="<?php echo base_url(); ?>dist/css/bootstrap.min.css" />
  <link rel="stylesheet" href="<?php echo base_url(); ?>dist/css/plugins.min.css" />
  <link rel="stylesheet" href="<?php echo base_url(); ?>dist/css/kaiadmin.min.css" />
  <link rel="stylesheet" href="<?php echo base_url(); ?>dist/css/style.css" />
  <style type="text/css">
    :root {
      --ds-bg: #f5f7fb;
      --ds-card: #ffffff;
      --ds-border: #e6ebf2;
      --ds-text: #223049;
      --ds-muted: #6f7d95;
      --ds-primary: #0ea5e9;
      --ds-primary-soft: #e0f2fe;
      --ds-success-soft: #dcfce7;
      --ds-danger-soft: #fee2e2;
    }

    body {
      background: radial-gradient(circle at top right, #e8f3ff 0%, var(--ds-bg) 38%, #f8fbff 100%);
      color: var(--ds-text);
      padding: 20px;
      font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
    }

    .fancybox__content,
    .fancybox__iframe,
    #fancybox__iframe_1_0 {
      height: 518px !important;
    }

    .page-shell {
      max-width: 1280px;
      margin: 0 auto;
    }

    .hero-card {
      background: linear-gradient(135deg, #0f172a 0%, #0ea5e9 100%);
      color: #fff;
      border-radius: 14px;
      padding: 22px 24px;
      box-shadow: 0 14px 30px rgba(15, 23, 42, 0.2);
      margin-bottom: 18px;
    }

    .hero-card h2 {
      margin: 0;
      font-size: 26px;
      font-weight: 700;
    }

    .hero-card .invoice-number {
      margin-top: 6px;
      font-size: 14px;
      opacity: 0.9;
    }

    .info-card {
      background: var(--ds-card);
      border: 1px solid var(--ds-border);
      border-radius: 12px;
      padding: 16px;
      height: 100%;
      box-shadow: 0 6px 18px rgba(10, 37, 64, 0.06);
      margin-bottom: 14px;
    }

    .info-card h4 {
      font-size: 15px;
      margin-bottom: 10px;
      color: #0f172a;
      font-weight: 700;
      letter-spacing: 0.2px;
    }

    .info-line {
      margin-bottom: 7px;
      font-size: 13px;
      color: var(--ds-muted);
      line-height: 1.4;
    }

    .info-line strong {
      color: var(--ds-text);
      font-weight: 600;
    }

    .status-pill {
      display: inline-block;
      border-radius: 999px;
      padding: 4px 10px;
      font-size: 12px;
      font-weight: 700;
    }

    .status-pending {
      background: var(--ds-primary-soft);
      color: #0369a1;
    }

    .status-success {
      background: var(--ds-success-soft);
      color: #166534;
    }

    .status-cancel {
      background: var(--ds-danger-soft);
      color: #991b1b;
    }

    .table-card {
      background: var(--ds-card);
      border: 1px solid var(--ds-border);
      border-radius: 12px;
      padding: 14px;
      margin-top: 4px;
      box-shadow: 0 6px 18px rgba(10, 37, 64, 0.06);
    }

    .table-card .table {
      margin-bottom: 0;
      font-size: 13px;
    }

    .table-card .table thead th {
      border-top: none;
      border-bottom: 1px solid var(--ds-border);
      background: #f8fbff;
      color: #1e293b;
      font-weight: 700;
      text-transform: uppercase;
      font-size: 12px;
      letter-spacing: 0.3px;
    }

    .table-card .table td {
      vertical-align: middle;
      color: #334155;
      border-color: #eef2f7;
    }

    .section-title {
      margin: 16px 0 10px;
      font-size: 14px;
      font-weight: 700;
      color: #0f172a;
      text-transform: uppercase;
      letter-spacing: 0.35px;
    }

    .logs-card,
    .summary-card {
      background: var(--ds-card);
      border: 1px solid var(--ds-border);
      border-radius: 12px;
      box-shadow: 0 6px 18px rgba(10, 37, 64, 0.06);
      padding: 14px;
      height: 100%;
      margin-bottom: 14px;
    }

    .logs-card .table,
    .summary-card .table {
      margin-bottom: 0;
      font-size: 13px;
    }

    .summary-card .table td {
      border-top: 1px dashed #e6ebf2;
      padding: 10px 8px;
    }

    .summary-card .table tr:first-child td {
      border-top: none;
    }

    .summary-card .grand-total {
      font-weight: 800;
      color: #0f172a;
      background: #eff6ff;
    }

    .summary-card .remaining {
      color: #0b4a6f;
      font-weight: 700;
    }

    @media (max-width: 767.98px) {
      body {
        padding: 12px;
      }

      .hero-card {
        padding: 16px;
      }

      .hero-card h2 {
        font-size: 20px;
      }
    }
  </style>
</head>
<body>
  <div class="page-shell">
    <?php foreach($data['header_sales_dropship'] as $row){ ?>
      <div class="hero-card">
        <h2>Detail Penjualan Dropship</h2>
        <div class="invoice-number">
          Invoice: <strong><?php echo $row->hd_dropship_sales_inv; ?></strong>
        </div>
      </div>

      <div class="row">
        <div class="col-md-3 col-sm-6">
          <div class="info-card">
            <h4>Customer</h4>
            <div class="info-line">Nama: <strong><?php echo $row->customer_name; ?></strong></div>
            <div class="info-line">Alamat: <strong><?php echo $row->customer_address; ?></strong></div>
            <div class="info-line">Telepon: <strong><?php echo $row->customer_phone; ?></strong></div>
          </div>
        </div>

        <div class="col-md-3 col-sm-6">
          <div class="info-card">
            <h4>Dropship</h4>
            <div class="info-line">Nama: <strong><?php echo $row->hd_dropship_sales_dropship_name; ?></strong></div>
            <div class="info-line">Alamat: <strong><?php echo $row->hd_dropship_sales_dropship_address; ?></strong></div>
            <div class="info-line">Telepon: <strong><?php echo $row->hd_dropship_sales_dropship_phone; ?></strong></div>
          </div>
        </div>

        <div class="col-md-3 col-sm-6">
          <div class="info-card">
            <h4>Pengiriman & Pembayaran</h4>
            <div class="info-line">Ekspedisi: <strong><?php echo $row->ekspedisi_name; ?></strong></div>
            <div class="info-line">Disiapkan: <strong><?php echo $row->hd_dropship_sales_prepare; ?></strong></div>
            <div class="info-line">Jumlah Colly: <strong><?php echo $row->hd_dropship_sales_colly; ?></strong></div>
            <div class="info-line">Metode Bayar: <strong><?php echo $row->payment_name; ?></strong></div>
          </div>
        </div>

        <div class="col-md-3 col-sm-6">
          <div class="info-card">
            <h4>Status Transaksi</h4>
            <div class="info-line">T.O.P: <strong><?php echo $row->hd_dropship_sales_top; ?></strong></div>
            <div class="info-line">
              Status:
              <?php
              if($row->hd_dropship_sales_status == 'Pending'){
                echo '<span class="status-pill status-pending">Pending</span>';
              }else if($row->hd_dropship_sales_status == 'Success'){
                echo '<span class="status-pill status-success">Success</span>';
              }else{
                echo '<span class="status-pill status-cancel">Cancel</span>';
              }
              ?>
            </div>
            <div class="info-line">Gudang: <strong><?php echo $row->warehouse_name; ?></strong></div>
          </div>
        </div>
      </div>

      <div class="section-title">Detail Produk</div>
      <div class="table-card">
        <div class="table-responsive">
          <table class="table table-hover">
            <thead>
              <tr>
                <th scope="col">SKU</th>
                <th scope="col">Produk</th>
                <th scope="col">Qty</th>
                <th scope="col">Harga</th>
                <th scope="col">Diskon</th>
                <th scope="col">Total</th>
                <th scope="col">Catatan</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach($data['detail_sales_dropship'] as $detail){ ?>
                <tr>
                  <td><?php echo $detail->product_code; ?></td>
                  <td><?php echo $detail->product_name; ?></td>
                  <td><?php echo $detail->dt_dropship_sales_qty; ?></td>
                  <td>Rp. <?php echo number_format($detail->dt_dropship_sales_price); ?></td>
                  <td>Rp. <?php echo number_format($detail->dt_dropship_sales_discount); ?></td>
                  <td><strong>Rp. <?php echo number_format($detail->dt_dropship_sales_total); ?></strong></td>
                  <td><?php echo $detail->dt_dropship_sales_desc; ?></td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>

      <div class="section-title">Logs & Ringkasan</div>
      <div class="row">
        <div class="col-md-6">
          <div class="logs-card">
            <table class="table table-sm">
              <tbody>
                <tr>
                  <td><strong>Action</strong></td>
                  <td><strong>User</strong></td>
                  <td><strong>Created At</strong></td>
                </tr>
                <tr>
                  <td>Dibuat</td>
                  <td><strong><?php echo $row->user_name; ?></strong></td>
                  <td>
                    <?php
                    $date = date_create($row->created_at);
                    echo date_format($date, "d-M-Y");
                    ?>
                  </td>
                </tr>
                <tr>
                  <td><strong>Catatan</strong></td>
                  <td colspan="2"><?php echo $row->hd_dropship_sales_note; ?></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>

        <div class="col-md-6">
          <div class="summary-card">
            <table class="table table-sm text-right">
              <tbody>
                <tr>
                  <td><strong>Sub Total</strong></td>
                  <td>Rp. <?php echo number_format($row->hd_dropship_sales_sub_total); ?></td>
                </tr>
                <tr>
                  <td><strong>Diskon 1 (<?php echo $row->hd_dropship_sales_percentage1; ?>)</strong></td>
                  <td>Rp. <?php echo number_format($row->hd_dropship_sales_disc1); ?></td>
                </tr>
                <tr>
                  <td><strong>Diskon 2 (<?php echo $row->hd_dropship_sales_percentage2; ?>)</strong></td>
                  <td>Rp. <?php echo number_format($row->hd_dropship_sales_disc2); ?></td>
                </tr>
                <tr>
                  <td><strong>Diskon 3 (<?php echo $row->hd_dropship_sales_percentage3; ?>)</strong></td>
                  <td>Rp. <?php echo number_format($row->hd_dropship_sales_disc3); ?></td>
                </tr>
                <tr>
                  <td><strong>PPN 11%</strong></td>
                  <td>Rp. <?php echo number_format($row->hd_dropship_sales_ppn); ?></td>
                </tr>
                <tr class="grand-total">
                  <td><strong>Grand Total</strong></td>
                  <td><strong>Rp. <?php echo number_format($row->hd_dropship_sales_total); ?></strong></td>
                </tr>
                <tr>
                  <td><strong>DP</strong></td>
                  <td>Rp. <?php echo number_format($row->hd_dropship_sales_dp); ?></td>
                </tr>
                <tr class="remaining">
                  <td><strong>Sisa Piutang</strong></td>
                  <td><strong>Rp. <?php echo number_format($row->hd_dropship_sales_total - $row->hd_dropship_sales_dp); ?></strong></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    <?php } ?>
  </div>

</body>

</html>