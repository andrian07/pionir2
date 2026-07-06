<?php
defined('BASEPATH') OR exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: GET, OPTIONS");
date_default_timezone_set('Asia/Jakarta');
require 'vendor/autoload.php';

use Dompdf\Dompdf;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Color;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Reportpurchase extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('global_model');
		$this->load->model('reportpurchase_model');
		$this->load->model('masterdata_model');
		$this->load->helper(array('url', 'html'));
	}

	private function check_auth($modul){
		if(isset($_SESSION['user_name']) == null){
			redirect('Masterdata', 'refresh');
		}else{
			$user_role_id = $_SESSION['user_role_id'];
			$check_auth_nav = $this->global_model->check_auth_nav($user_role_id);
			$check_access = $this->global_model->check_access($user_role_id, $modul);
			$array = array(
				'check_auth_nav' => $check_auth_nav,
				'check_access' => $check_access
			);
			return($array);
		}
	}

	public function index(){
		echo 'Report Pembelian';die();
	}

	private function apply_excel_report_theme($sheet, $title, $lastColumn, $periodText = null){
		$sheet->setCellValue('A1', $title);
		$sheet->mergeCells('A1:' . $lastColumn . '1');
		$sheet->getStyle('A1')->applyFromArray([
			'font' => ['bold' => true, 'size' => 14, 'color' => ['argb' => 'FFFFFFFF']],
			'fill' => ['fillType' => Fill::FILL_SOLID, 'startColor' => ['argb' => 'FF1F4E79']],
			'alignment' => ['horizontal' => 'left', 'vertical' => 'center'],
		]);
		$sheet->getRowDimension(1)->setRowHeight(32);

		if($periodText !== null){
			$sheet->setCellValue('A2', $periodText);
			$sheet->mergeCells('A2:' . $lastColumn . '2');
			$sheet->getStyle('A2')->applyFromArray([
				'font' => ['italic' => true, 'size' => 10, 'color' => ['argb' => 'FF1F4E79']],
				'alignment' => ['horizontal' => 'left', 'vertical' => 'center'],
				'fill' => ['fillType' => Fill::FILL_SOLID, 'startColor' => ['argb' => 'FFD6E4F0']],
			]);
			$sheet->getRowDimension(2)->setRowHeight(20);
		}
	}

	private function apply_excel_header_style($sheet, $range){
		$sheet->getStyle($range)->applyFromArray([
			'font' => ['bold' => true, 'color' => ['argb' => 'FFFFFFFF']],
			'fill' => ['fillType' => Fill::FILL_SOLID, 'startColor' => ['argb' => 'FF2E75B6']],
			'alignment' => ['horizontal' => 'center', 'vertical' => 'center', 'wrapText' => true],
			'borders' => ['allBorders' => ['borderStyle' => Border::BORDER_THIN, 'color' => ['argb' => 'FFFFFFFF']]],
		]);
		$sheet->getRowDimension(3)->setRowHeight(28);
	}

	private function apply_excel_data_style($sheet, $rowIndex, $lastColumn, $fillColor){
		$sheet->getStyle('A' . $rowIndex . ':' . $lastColumn . $rowIndex)->applyFromArray([
			'fill' => ['fillType' => Fill::FILL_SOLID, 'startColor' => ['argb' => $fillColor]],
			'borders' => ['allBorders' => ['borderStyle' => Border::BORDER_THIN, 'color' => ['argb' => 'FFB8CCE4']]],
			'alignment' => ['vertical' => 'center'],
		]);
		$sheet->getRowDimension($rowIndex)->setRowHeight(18);
	}

	private function write_grouped_excel_rows($sheet, $rows, $groupColumns, $detailColumns, $groupKey, $startRow = 4, $lastColumn = 'R'){
		$rowIndex = $startRow;
		$lastGroupValue = null;
		$groupStartRow = $startRow;
		$colorToggle = true;

		foreach($rows as $row){
			$currentGroupValue = $row[$groupKey];
			if($currentGroupValue !== $lastGroupValue){
				if($lastGroupValue !== null && ($rowIndex - 1) > $groupStartRow){
					foreach(array_keys($groupColumns) as $col){
						$sheet->mergeCells($col . $groupStartRow . ':' . $col . ($rowIndex - 1));
						$sheet->getStyle($col . $groupStartRow . ':' . $col . ($rowIndex - 1))->getAlignment()->setVertical('center');
					}
				}
				$groupStartRow = $rowIndex;
				$colorToggle = !$colorToggle;
				$lastGroupValue = $currentGroupValue;
				foreach($groupColumns as $col => $field){
					$sheet->setCellValue($col . $rowIndex, $row[$field]);
				}
			}

			foreach($detailColumns as $col => $field){
				$sheet->setCellValue($col . $rowIndex, $row[$field]);
			}

			$fillColor = $colorToggle ? 'FFDCE6F1' : 'FFFFFFFF';
			$this->apply_excel_data_style($sheet, $rowIndex, $lastColumn, $fillColor);
			$rowIndex++;
		}

		if($lastGroupValue !== null && ($rowIndex - 1) > $groupStartRow){
			foreach(array_keys($groupColumns) as $col){
				$sheet->mergeCells($col . $groupStartRow . ':' . $col . ($rowIndex - 1));
				$sheet->getStyle($col . $groupStartRow . ':' . $col . ($rowIndex - 1))->getAlignment()->setVertical('center');
			}
		}

		return $rowIndex - 1;
	}

	// Report Submission
	public function reportsubmission()
	{
		$modul = 'Report';
		$check_auth = $this->check_auth($modul);
		if($check_auth['check_access'][0]->view == 'Y'){
			$warehouse_list['warehouse_list'] = $this->masterdata_model->warehouse_list();
			$supplier_list['supplier_list'] = $this->masterdata_model->supplier_list();
			$check_auth['check_auth'] = $check_auth;
			$data['data'] = array_merge($warehouse_list, $supplier_list, $check_auth);
			$this->load->view('Pages/Report/Purchase/reportsubmission', $data);
		}else{
			$msg = "No Access";
			echo json_encode(['code'=>0, 'result'=>$msg]);die();
		}
	}

	public function reportsubmissionpdf()
	{
		$start_date       = $this->input->get('start_date');
		$end_date 	      = $this->input->get('end_date');
		$warehouse_report = $this->input->get('warehouse_report');
		$status  		  = $this->input->get('status');

		$data['data'] = $this->reportpurchase_model->get_report_submission($start_date, $end_date, $warehouse_report, $status)->result_array();
		$htmlView   = $this->load->view('Pages/Report/Purchase/reportsubmissionpdf', $data, true);
		$dompdf = new Dompdf();
		$dompdf->loadHtml($htmlView);
		$dompdf->setPaper('A4', 'landscape');
		$dompdf->render();
		$dompdf->stream('pengajuan.pdf', array("Attachment" => false));
		exit();
	}

	public function reportsubmission_excell(){
		$modul = 'Report';
		$check_auth = $this->check_auth($modul);
		if($check_auth['check_access'][0]->view == 'Y'){
			$start_date       = $this->input->get('start_date');
			$end_date 	      = $this->input->get('end_date');
			$warehouse_report = $this->input->get('warehouse_report');
			$status  		  = $this->input->get('status');

			$excel = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
			$sheet = $excel->getActiveSheet();
			$this->apply_excel_report_theme($sheet, 'Laporan Pengajuan', 'I', 'Periode: ' . $start_date . ' s/d ' . $end_date);
			$sheet->setCellValue('A3', 'Invoice');
			$sheet->setCellValue('B3', 'Tanggal');
			$sheet->setCellValue('C3', 'Kode Produk');
			$sheet->setCellValue('D3', 'Nama Produk');
			$sheet->setCellValue('E3', 'Qty');
			$sheet->setCellValue('F3', 'Stock Terakhir');
			$sheet->setCellValue('G3', 'Status');
			$sheet->setCellValue('H3', 'Urgensi');
			$sheet->setCellValue('I3', 'Keterangan');
			$this->apply_excel_header_style($sheet, 'A3:I3');

			$data = $this->reportpurchase_model->get_report_submission($start_date, $end_date, $warehouse_report, $status)->result_array();
			$this->write_grouped_excel_rows($sheet, $data, ['A' => 'submission_invoice', 'B' => 'submission_date'], ['C' => 'product_code', 'D' => 'product_name', 'E' => 'submission_qty', 'F' => 'last_stock', 'G' => 'submission_status', 'H' => 'submission_desc', 'I' => 'submission_text'], 'submission_invoice', 4, 'I');

			$sheet->getColumnDimension('A')->setWidth(35);
			$sheet->getColumnDimension('B')->setWidth(25);
			$sheet->getColumnDimension('C')->setWidth(25);
			$sheet->getColumnDimension('D')->setWidth(40);
			$sheet->getColumnDimension('E')->setWidth(10);
			$sheet->getColumnDimension('F')->setWidth(10);
			$sheet->getColumnDimension('G')->setWidth(25);
			$sheet->getColumnDimension('H')->setWidth(40);
			$sheet->getColumnDimension('I')->setWidth(60);
			$sheet->freezePane('A4');
			$sheet->getPageSetup()->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);
			$sheet->setTitle('Excell');
			ob_end_clean();
			header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
			header('Content-Disposition: attachment;filename="pengajuan_' .date('Y-m-d') . '.xlsx"');
			header('Cache-Control: max-age=0');

			$xlsxWriter = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($excel, 'Xlsx');
			$xlsxWriter = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($excel);
			exit($xlsxWriter->save('php://output'));
		}else{
			$msg = "No Access";
			echo json_encode(['code'=>0, 'result'=>$msg]);die();
		}
	}
	// End Report Submission

	// Start Report PO
	public function reportpo()
	{
		$modul = 'Report';
		$check_auth = $this->check_auth($modul);
		if($check_auth['check_access'][0]->view == 'Y'){
			$warehouse_list['warehouse_list'] = $this->masterdata_model->warehouse_list();
			$supplier_list['supplier_list'] = $this->masterdata_model->supplier_list();
			$check_auth['check_auth'] = $check_auth;
			$data['data'] = array_merge($warehouse_list, $supplier_list, $check_auth);
			$this->load->view('Pages/Report/Purchase/reportpo', $data);
		}else{
			$msg = "No Access";
			echo json_encode(['code'=>0, 'result'=>$msg]);die();
		}
	}

	public function reportpopdf()
	{
		$start_date       = $this->input->get('start_date');
		$end_date 	      = $this->input->get('end_date');
		$warehouse_report = $this->input->get('warehouse_report');
		$supplier_report  = $this->input->get('supplier_report');
		$status_gudang    = $this->input->get('status_gudang');
		$status_pembelian = $this->input->get('status_pembelian');

		$data['data'] = $this->reportpurchase_model->get_report_hd_po($start_date, $end_date, $warehouse_report, $supplier_report, $status_gudang, $status_pembelian)->result_array();
		$htmlView   = $this->load->view('Pages/Report/Purchase/reportpopdf', $data, true);
		$dompdf = new Dompdf();
		$dompdf->loadHtml($htmlView);
		$dompdf->setPaper('A4', 'landscape');
		$dompdf->render();
		$dompdf->stream('po.pdf', array("Attachment" => false));
		exit();
	}


	public function reportpo_excell()
	{

		$modul = 'Report';
		$check_auth = $this->check_auth($modul);
		if($check_auth['check_access'][0]->view == 'Y'){
			$start_date       = $this->input->get('start_date');
			$end_date 	      = $this->input->get('end_date');
			$warehouse_report = $this->input->get('warehouse_report');
			$supplier_report  = $this->input->get('supplier_report');
			$status_gudang    = $this->input->get('status_gudang');
			$status_pembelian = $this->input->get('status_pembelian');

			$excel = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
			$sheet = $excel->getActiveSheet();
			$this->apply_excel_report_theme($sheet, 'Laporan PO', 'X', 'Periode: ' . $start_date . ' s/d ' . $end_date);
			$sheet->setCellValue('A3', 'Invoice');
			$sheet->setCellValue('B3', 'Tanggal');
			$sheet->setCellValue('C3', 'Gudang');
			$sheet->setCellValue('D3', 'Supplier');
			$sheet->setCellValue('E3', 'Tax');
			$sheet->setCellValue('F3', 'Top');
			$sheet->setCellValue('G3', 'Jatuh Tempo');
			$sheet->setCellValue('H3', 'Payment');
			$sheet->setCellValue('I3', 'Ekspedisi');
			$sheet->setCellValue('J3', 'Sub Total');
			$sheet->setCellValue('K3', 'Total Diskon');
			$sheet->setCellValue('L3', 'DPP');
			$sheet->setCellValue('M3', 'PPN');
			$sheet->setCellValue('N3', 'Status Input Gudang');
			$sheet->setCellValue('O3', 'Status Input Pembelian');
			$sheet->setCellValue('P3', 'Catatan Pengiriman');
			$sheet->setCellValue('Q3', 'Catatan PO');
			$sheet->setCellValue('R3', 'Kode Barang');
			$sheet->setCellValue('S3', 'Nama Barang');
			$sheet->setCellValue('T3', 'Harga');
			$sheet->setCellValue('U3', 'Qty');
			$sheet->setCellValue('V3', 'Ongkir');
			$sheet->setCellValue('W3', 'Total Item');
			$sheet->setCellValue('X3', 'Total Invoice');
			$this->apply_excel_header_style($sheet, 'A3:X3');

			$data = $this->reportpurchase_model->get_report_po($start_date, $end_date, $warehouse_report, $supplier_report, $status_gudang, $status_pembelian)->result_array();
			$this->write_grouped_excel_rows($sheet, $data, ['A' => 'hd_po_invoice', 'B' => 'hd_po_date', 'C' => 'warehouse_name', 'D' => 'supplier_name', 'E' => 'hd_po_tax', 'F' => 'hd_po_top', 'G' => 'hd_po_due_date', 'H' => 'payment_name', 'I' => 'ekspedisi_name', 'J' => 'hd_po_sub_total', 'K' => 'hd_po_total_discount', 'L' => 'hd_po_dpp', 'M' => 'hd_po_ppn', 'N' => 'hd_po_status', 'O' => 'hd_po_purchase_status', 'P' => 'hd_po_status_delivery', 'Q' => 'hd_po_note', 'X' => 'hd_po_grand_total'], ['R' => 'product_code', 'S' => 'product_name', 'T' => 'dt_po_price', 'U' => 'dt_po_qty', 'V' => 'dt_po_ongkir', 'W' => 'dt_po_total'], 'hd_po_invoice', 4, 'X');

			$sheet->getColumnDimension('A')->setWidth(35);
			$sheet->getColumnDimension('B')->setWidth(25);
			$sheet->getColumnDimension('C')->setWidth(25);
			$sheet->getColumnDimension('D')->setWidth(30);
			$sheet->getColumnDimension('E')->setWidth(10);
			$sheet->getColumnDimension('F')->setWidth(10);
			$sheet->getColumnDimension('G')->setWidth(30);
			$sheet->getColumnDimension('H')->setWidth(20);
			$sheet->getColumnDimension('I')->setWidth(30);
			$sheet->getColumnDimension('J')->setWidth(35);
			$sheet->getColumnDimension('K')->setWidth(35);
			$sheet->getColumnDimension('L')->setWidth(25);
			$sheet->getColumnDimension('M')->setWidth(25);
			$sheet->getColumnDimension('N')->setWidth(25);
			$sheet->getColumnDimension('O')->setWidth(25);
			$sheet->getColumnDimension('P')->setWidth(50);
			$sheet->getColumnDimension('Q')->setWidth(50);
			$sheet->getColumnDimension('R')->setWidth(30);
			$sheet->getColumnDimension('S')->setWidth(40);
			$sheet->getColumnDimension('T')->setWidth(30);
			$sheet->getColumnDimension('U')->setWidth(30);
			$sheet->getColumnDimension('V')->setWidth(30);
			$sheet->getColumnDimension('W')->setWidth(30);
			$sheet->getColumnDimension('X')->setWidth(30);

			$sheet->getStyle('J4:J' . $sheet->getHighestRow())->getNumberFormat()->setFormatCode('#,##0');
			$sheet->getStyle('K4:K' . $sheet->getHighestRow())->getNumberFormat()->setFormatCode('#,##0');
			$sheet->getStyle('L4:L' . $sheet->getHighestRow())->getNumberFormat()->setFormatCode('#,##0');
			$sheet->getStyle('M4:M' . $sheet->getHighestRow())->getNumberFormat()->setFormatCode('#,##0');
			$sheet->getStyle('T4:T' . $sheet->getHighestRow())->getNumberFormat()->setFormatCode('#,##0');
			$sheet->getStyle('V4:V' . $sheet->getHighestRow())->getNumberFormat()->setFormatCode('#,##0');
			$sheet->getStyle('W4:W' . $sheet->getHighestRow())->getNumberFormat()->setFormatCode('#,##0');
			$sheet->getStyle('X4:X' . $sheet->getHighestRow())->getNumberFormat()->setFormatCode('#,##0');

			$sheet->freezePane('A4');
			$sheet->getPageSetup()->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);
			$sheet->setTitle('Excell');
			ob_end_clean();
			header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
			header('Content-Disposition: attachment;filename="po_' .date('Y-m-d') . '.xlsx"');
			header('Cache-Control: max-age=0');

			$xlsxWriter = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($excel, 'Xlsx');
			$xlsxWriter = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($excel);
			exit($xlsxWriter->save('php://output'));
		}else{
			$msg = "No Access";
			echo json_encode(['code'=>0, 'result'=>$msg]);die();
		}
	}

	// End Report PO

	// Start Report Input Warehouse
	public function reportinputwarehouse()
	{
		$modul = 'Report';
		$check_auth = $this->check_auth($modul);
		if($check_auth['check_access'][0]->view == 'Y'){
			$warehouse_list['warehouse_list'] = $this->masterdata_model->warehouse_list();
			$po_list['po_list'] = $this->reportpurchase_model->po_list()->result_array();
			$check_auth['check_auth'] = $check_auth;
			$data['data'] = array_merge($warehouse_list, $po_list, $check_auth);
			$this->load->view('Pages/Report/Purchase/reportinputwarehouse', $data);
		}else{
			$msg = "No Access";
			echo json_encode(['code'=>0, 'result'=>$msg]);die();
		}
	}

	public function reportinputwarehousepdf()
	{
		$start_date       = $this->input->get('start_date');
		$end_date 	      = $this->input->get('end_date');
		$warehouse_report = $this->input->get('warehouse_report');
		$po_report  	  = $this->input->get('po_report');
		$status_pembelian = $this->input->get('status_pembelian');

		$data['data'] = $this->reportpurchase_model->get_report_input_warehouse($start_date, $end_date, $warehouse_report, $po_report, $status_pembelian)->result_array();
		$htmlView   = $this->load->view('Pages/Report/Purchase/reportinputwarehousepdf', $data, true);
		$dompdf = new Dompdf();
		$dompdf->loadHtml($htmlView);
		$dompdf->setPaper('A4', 'landscape');
		$dompdf->render();
		$dompdf->stream('inputgudang.pdf', array("Attachment" => false));
		exit();
	}

	public function reportinputwarehouse_excell()
	{
		$modul = 'Report';
		$check_auth = $this->check_auth($modul);
		if($check_auth['check_access'][0]->view == 'Y'){
			$start_date       = $this->input->get('start_date');
			$end_date 	      = $this->input->get('end_date');
			$warehouse_report = $this->input->get('warehouse_report');
			$po_report  	  = $this->input->get('po_report');
			$status_pembelian = $this->input->get('status_pembelian');

			$excel = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
			$sheet = $excel->getActiveSheet();
			$this->apply_excel_report_theme($sheet, 'Laporan Input Gudang', 'H', 'Periode: ' . $start_date . ' s/d ' . $end_date);
			$sheet->setCellValue('A3', 'Invoice');
			$sheet->setCellValue('B3', 'Tanggal');
			$sheet->setCellValue('C3', 'Gudang');
			$sheet->setCellValue('D3', 'Nama Barang');
			$sheet->setCellValue('E3', 'Supplier');
			$sheet->setCellValue('F3', 'Qty Pesan');
			$sheet->setCellValue('G3', 'Qty Terima');
			$sheet->setCellValue('H3', 'Catatan');
			$this->apply_excel_header_style($sheet, 'A3:H3');

			$data = $this->reportpurchase_model->get_report_input_warehouse($start_date, $end_date, $warehouse_report, $po_report, $status_pembelian)->result_array();
			$this->write_grouped_excel_rows($sheet, $data, ['A' => 'hd_input_stock_inv', 'B' => 'hd_input_stock_date', 'C' => 'warehouse_name'], ['D' => 'product_name', 'E' => 'supplier_name', 'F' => 'dt_is_qty_order', 'G' => 'dt_is_qty', 'H' => 'dt_is_note'], 'hd_input_stock_inv', 4, 'H');

			$sheet->getColumnDimension('A')->setWidth(35);
			$sheet->getColumnDimension('B')->setWidth(25);
			$sheet->getColumnDimension('C')->setWidth(30);
			$sheet->getColumnDimension('D')->setWidth(70);
			$sheet->getColumnDimension('E')->setWidth(30);
			$sheet->getColumnDimension('F')->setWidth(10);
			$sheet->getColumnDimension('G')->setWidth(10);
			$sheet->getColumnDimension('H')->setWidth(30);
			$sheet->freezePane('A4');

			$sheet->getPageSetup()->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);
			$sheet->setTitle('Excell');
			ob_end_clean();
			header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
			header('Content-Disposition: attachment;filename="inputstock_' .date('Y-m-d') . '.xlsx"');
			header('Cache-Control: max-age=0');

			$xlsxWriter = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($excel, 'Xlsx');
			$xlsxWriter = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($excel);
			exit($xlsxWriter->save('php://output'));
		}else{
			$msg = "No Access";
			echo json_encode(['code'=>0, 'result'=>$msg]);die();
		}
	}

	// End Report Input Warehouse


	// Start Report purchases
	
	public function reportpurchases()
	{
		$modul = 'Report';
		$check_auth = $this->check_auth($modul);
		if($check_auth['check_access'][0]->view == 'Y'){
			$warehouse_list['warehouse_list'] = $this->masterdata_model->warehouse_list();
			$supplier_list['supplier_list'] = $this->masterdata_model->supplier_list();
			$check_auth['check_auth'] = $check_auth;
			$data['data'] = array_merge($warehouse_list, $supplier_list, $check_auth);
			$this->load->view('Pages/Report/Purchase/reportpurchases', $data);
		}else{
			$msg = "No Access";
			echo json_encode(['code'=>0, 'result'=>$msg]);die();
		}
	}

	public function reportpurchasespdf()
	{
		$start_date       = $this->input->get('start_date');
		$end_date 	      = $this->input->get('end_date');
		$warehouse_report = $this->input->get('warehouse_report');
		$supplier_report  = $this->input->get('supplier_report');

		$data['data'] = $this->reportpurchase_model->get_report_purchases($start_date, $end_date, $warehouse_report, $supplier_report)->result_array();
		$htmlView   = $this->load->view('Pages/Report/Purchase/reportpurchasespdf', $data, true);
		$dompdf = new Dompdf();
		$dompdf->loadHtml($htmlView);
		$dompdf->setPaper('A4', 'landscape');
		$dompdf->render();
		$dompdf->stream('pembelian.pdf', array("Attachment" => false));
		exit();
	}

	public function reportpurchases_excell()
	{
		$modul = 'Report';
		$check_auth = $this->check_auth($modul);
		if($check_auth['check_access'][0]->view == 'Y'){
			$start_date       = $this->input->get('start_date');
			$end_date 	      = $this->input->get('end_date');
			$warehouse_report = $this->input->get('warehouse_report');
			$supplier_report  = $this->input->get('supplier_report');;

			$excel = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
			$sheet = $excel->getActiveSheet();
			$this->apply_excel_report_theme($sheet, 'Laporan Pembelian', 'U', 'Periode: ' . $start_date . ' s/d ' . $end_date);
			$sheet->setCellValue('A3', 'Invoice');
			$sheet->setCellValue('B3', 'Tanggal');
			$sheet->setCellValue('C3', 'Gudang');
			$sheet->setCellValue('D3', 'Supplier');
			$sheet->setCellValue('E3', 'Tax');
			$sheet->setCellValue('F3', 'Top');
			$sheet->setCellValue('G3', 'Jatuh Tempo');
			$sheet->setCellValue('H3', 'Payment');
			$sheet->setCellValue('I3', 'Ekspedisi');
			$sheet->setCellValue('J3', 'Sub Total');
			$sheet->setCellValue('K3', 'Total Diskon');
			$sheet->setCellValue('L3', 'DPP');
			$sheet->setCellValue('M3', 'PPN');
			$sheet->setCellValue('N3', 'Catatan Pembelian');
			$sheet->setCellValue('O3', 'Kode Barang');
			$sheet->setCellValue('P3', 'Nama Barang');
			$sheet->setCellValue('Q3', 'Harga');
			$sheet->setCellValue('R3', 'Qty');
			$sheet->setCellValue('S3', 'Ongkir');
			$sheet->setCellValue('T3', 'Total Item');
			$sheet->setCellValue('U3', 'TotalInvoice');
			$this->apply_excel_header_style($sheet, 'A3:U3');

			$data = $this->reportpurchase_model->get_report_purchases($start_date, $end_date, $warehouse_report, $supplier_report)->result_array();
			$this->write_grouped_excel_rows($sheet, $data, ['A' => 'hd_purchase_invoice', 'B' => 'hd_purchase_date', 'C' => 'warehouse_name', 'D' => 'supplier_name', 'E' => 'hd_purchase_tax', 'F' => 'hd_purchase_top', 'G' => 'hd_purchase_due_date', 'H' => 'payment_name', 'I' => 'ekspedisi_name', 'J' => 'hd_purchase_sub_total', 'K' => 'hd_purchase_total_discount', 'L' => 'hd_purchase_dpp', 'M' => 'hd_purchase_ppn', 'N' => 'hd_purchase_note', 'U' => 'hd_purchase_grand_total'], ['O' => 'product_code', 'P' => 'product_name', 'Q' => 'dt_purchase_price', 'R' => 'dt_purchase_qty', 'S' => 'dt_purchase_ongkir', 'T' => 'dt_purchase_total'], 'hd_purchase_invoice', 4, 'U');

			$sheet->getColumnDimension('A')->setWidth(35);
			$sheet->getColumnDimension('B')->setWidth(25);
			$sheet->getColumnDimension('C')->setWidth(25);
			$sheet->getColumnDimension('D')->setWidth(30);
			$sheet->getColumnDimension('E')->setWidth(10);
			$sheet->getColumnDimension('F')->setWidth(10);
			$sheet->getColumnDimension('G')->setWidth(30);
			$sheet->getColumnDimension('H')->setWidth(20);
			$sheet->getColumnDimension('I')->setWidth(30);
			$sheet->getColumnDimension('J')->setWidth(35);
			$sheet->getColumnDimension('K')->setWidth(35);
			$sheet->getColumnDimension('L')->setWidth(25);
			$sheet->getColumnDimension('M')->setWidth(25);
			$sheet->getColumnDimension('Q')->setWidth(50);
			$sheet->getColumnDimension('R')->setWidth(30);
			$sheet->getColumnDimension('S')->setWidth(40);
			$sheet->getColumnDimension('T')->setWidth(30);
			$sheet->getColumnDimension('U')->setWidth(30);
			$sheet->freezePane('A4');

			$sheet->getStyle('J4:J' . $sheet->getHighestRow())->getNumberFormat()->setFormatCode('#,##0');
			$sheet->getStyle('K4:K' . $sheet->getHighestRow())->getNumberFormat()->setFormatCode('#,##0');
			$sheet->getStyle('L4:L' . $sheet->getHighestRow())->getNumberFormat()->setFormatCode('#,##0');
			$sheet->getStyle('M4:M' . $sheet->getHighestRow())->getNumberFormat()->setFormatCode('#,##0');
			$sheet->getStyle('Q4:Q' . $sheet->getHighestRow())->getNumberFormat()->setFormatCode('#,##0');
			$sheet->getStyle('S4:S' . $sheet->getHighestRow())->getNumberFormat()->setFormatCode('#,##0');
			$sheet->getStyle('T4:T' . $sheet->getHighestRow())->getNumberFormat()->setFormatCode('#,##0');
			$sheet->getStyle('U4:U' . $sheet->getHighestRow())->getNumberFormat()->setFormatCode('#,##0');

			$sheet->getPageSetup()->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);
			$sheet->setTitle('Excell');
			ob_end_clean();
			header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
			header('Content-Disposition: attachment;filename="pembelian_' .date('Y-m-d') . '.xlsx"');
			header('Cache-Control: max-age=0');

			$xlsxWriter = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($excel, 'Xlsx');
			$xlsxWriter = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($excel);
			exit($xlsxWriter->save('php://output'));
		}else{
			$msg = "No Access";
			echo json_encode(['code'=>0, 'result'=>$msg]);die();
		}
	}

	// End Report Purchases

	// start Report Retur Purchase
	public function reportreturpurchase()
	{
		$modul = 'Report';
		$check_auth = $this->check_auth($modul);
		if($check_auth['check_access'][0]->view == 'Y'){
			$warehouse_list['warehouse_list'] = $this->masterdata_model->warehouse_list();
			$supplier_list['supplier_list'] = $this->masterdata_model->supplier_list();
			$check_auth['check_auth'] = $check_auth;
			$data['data'] = array_merge($warehouse_list, $supplier_list, $check_auth);
			$this->load->view('Pages/Report/Purchase/reportreturpurchase', $data);
		}else{
			$msg = "No Access";
			echo json_encode(['code'=>0, 'result'=>$msg]);die();
		}
	}

	public function reportreturpurchasespdf()
	{
		$start_date       = $this->input->get('start_date');
		$end_date 	      = $this->input->get('end_date');
		$supplier_report  = $this->input->get('supplier_report');

		$data['data'] = $this->reportpurchase_model->get_report_retur_purchases($start_date, $end_date, $supplier_report)->result_array();
		$htmlView   = $this->load->view('Pages/Report/Purchase/reportreturpurchasespdf', $data, true);
		$dompdf = new Dompdf();
		$dompdf->loadHtml($htmlView);
		$dompdf->setPaper('A4', 'landscape');
		$dompdf->render();
		$dompdf->stream('returpembelian.pdf', array("Attachment" => false));
		exit();
	}

	public function reportreturpurchases_excell()
	{
		$modul = 'Report';
		$check_auth = $this->check_auth($modul);
		if($check_auth['check_access'][0]->view == 'Y'){
			$start_date       = $this->input->get('start_date');
			$end_date 	      = $this->input->get('end_date');
			$warehouse_report = $this->input->get('warehouse_report');
			$supplier_report  = $this->input->get('supplier_report');;

			$excel = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
			$sheet = $excel->getActiveSheet();
			$this->apply_excel_report_theme($sheet, 'Laporan Retur Pembelian', 'J', 'Periode: ' . $start_date . ' s/d ' . $end_date);
			$sheet->setCellValue('A3', 'Invoice');
			$sheet->setCellValue('B3', 'Tanggal');
			$sheet->setCellValue('C3', 'Gudang');
			$sheet->setCellValue('D3', 'Barang');
			$sheet->setCellValue('E3', 'Qty Retur');
			$sheet->setCellValue('F3', 'Sub Total');
			$sheet->setCellValue('G3', 'Catatan');
			$sheet->setCellValue('H3', 'Supplier');
			$sheet->setCellValue('I3', 'Total Nota');
			$sheet->setCellValue('J3', 'Jensi Retur');
			$this->apply_excel_header_style($sheet, 'A3:J3');

			$data = $this->reportpurchase_model->get_report_retur_purchases($start_date, $end_date, $supplier_report)->result_array();
			$this->write_grouped_excel_rows($sheet, $data, ['A' => 'hd_retur_purchase_inv', 'B' => 'hd_retur_purchase_date', 'C' => 'warehouse_name', 'D' => 'product_name', 'E' => 'dt_retur_purchase_qty', 'F' => 'dt_retur_purchase_total', 'G' => 'dt_retur_purchase_note', 'H' => 'supplier_name', 'I' => 'hd_retur_purchase_total'], ['J' => 'retur_type'], 'hd_retur_purchase_inv', 4, 'J');

			$sheet->getColumnDimension('A')->setWidth(35);
			$sheet->getColumnDimension('B')->setWidth(25);
			$sheet->getColumnDimension('C')->setWidth(25);
			$sheet->getColumnDimension('D')->setWidth(50);
			$sheet->getColumnDimension('E')->setWidth(10);
			$sheet->getColumnDimension('F')->setWidth(10);
			$sheet->getColumnDimension('G')->setWidth(50);
			$sheet->getColumnDimension('H')->setWidth(30);
			$sheet->getColumnDimension('I')->setWidth(30);
			$sheet->getColumnDimension('J')->setWidth(30);
			$sheet->freezePane('A4');

			$sheet->getStyle('F4:F' . $sheet->getHighestRow())->getNumberFormat()->setFormatCode('#,##0');
			$sheet->getStyle('I4:I' . $sheet->getHighestRow())->getNumberFormat()->setFormatCode('#,##0');

			$sheet->getPageSetup()->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);
			$sheet->setTitle('Excell');
			ob_end_clean();
			header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
			header('Content-Disposition: attachment;filename="retur_pembelian_' .date('Y-m-d') . '.xlsx"');
			header('Cache-Control: max-age=0');

			$xlsxWriter = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($excel, 'Xlsx');
			$xlsxWriter = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($excel);
			exit($xlsxWriter->save('php://output'));
		}else{
			$msg = "No Access";
			echo json_encode(['code'=>0, 'result'=>$msg]);die();
		}
	}

	// End Report Retur Purchase

}

?>