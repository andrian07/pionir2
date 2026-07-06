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

class Reportsales extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('global_model');
		$this->load->model('reportsales_model');
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

	private function write_grouped_excel_rows($sheet, $rows, $groupColumns, $detailColumns, $groupKey, $startRow = 4, $lastColumn = 'V'){
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

	public function index(){
		echo 'Report Pembelian';die();
	}

	// Report Sales Order
	public function reportsalesorder()
	{
		$modul = 'Report';
		$check_auth = $this->check_auth($modul);
		if($check_auth['check_access'][0]->view == 'Y'){
			$customer_list['customer_list'] = $this->masterdata_model->customer_list();
            $salesman_list['salesman_list'] = $this->masterdata_model->salesman_list();
            $warehouse_list['warehouse_list'] = $this->masterdata_model->warehouse_list();
			$check_auth['check_auth'] = $check_auth;
			$data['data'] = array_merge($customer_list, $salesman_list, $warehouse_list, $check_auth);
			$this->load->view('Pages/Report/Sales/reportsalesorder', $data);
		}else{
			$msg = "No Access";
			echo json_encode(['code'=>0, 'result'=>$msg]);die();
		}
	}
    
    public function reportsalesorderpdf()
    {
        $start_date       = $this->input->get('start_date');
		$end_date 	      = $this->input->get('end_date');
		$customer_report  = $this->input->get('customer_report');
        $salesman_report  = $this->input->get('salesman_report');
        $warehouse_report = $this->input->get('warehouse_report');

		$data['data'] = $this->reportsales_model->get_report_sales_order($start_date, $end_date, $customer_report, $salesman_report, $warehouse_report)->result_array();
		$htmlView   = $this->load->view('Pages/Report/Sales/reportsalesorderpdf', $data, true);
		$dompdf = new Dompdf();
		$dompdf->loadHtml($htmlView);
		$dompdf->setPaper('A4', 'landscape');
		$dompdf->render();
		$dompdf->stream('salesorder.pdf', array("Attachment" => false));
		exit();
    }

    public function reportsalesorder_excell()
	{
		$modul = 'Report';
		$check_auth = $this->check_auth($modul);
		if($check_auth['check_access'][0]->view == 'Y'){
			$start_date       = $this->input->get('start_date');
			$end_date 	      = $this->input->get('end_date');
		    $customer_report  = $this->input->get('customer_report');
            $salesman_report  = $this->input->get('salesman_report');
            $warehouse_report = $this->input->get('warehouse_report');

			$excel = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
			$sheet = $excel->getActiveSheet();
			$this->apply_excel_report_theme($sheet, 'Laporan Sales Order', 'V', 'Periode: ' . $start_date . ' s/d ' . $end_date);
			$sheet->setCellValue('A3', 'Invoice');
			$sheet->setCellValue('B3', 'Tanggal');
			$sheet->setCellValue('C3', 'Pelanggan');
			$sheet->setCellValue('D3', 'Rate');
			$sheet->setCellValue('E3', 'Pembayaran');
			$sheet->setCellValue('F3', 'Ekspedisi');
			$sheet->setCellValue('G3', 'Nama Barang');
			$sheet->setCellValue('H3', 'Satuan');
			$sheet->setCellValue('I3', 'Qty');
			$sheet->setCellValue('J3', 'Harga');
			$sheet->setCellValue('K3', 'Total Harga Barang');
			$sheet->setCellValue('L3', 'TOP');
			$sheet->setCellValue('M3', 'Salesman');
			$sheet->setCellValue('N3', 'Prepare By');
			$sheet->setCellValue('O3', 'Koli');
			$sheet->setCellValue('P3', 'Cabang');
			$sheet->setCellValue('Q3', 'Subtotal');
			$sheet->setCellValue('R3', 'Diskon');
			$sheet->setCellValue('S3', 'PPN');
			$sheet->setCellValue('T3', 'Total');
			$sheet->setCellValue('U3', 'Catatan');
			$sheet->setCellValue('V3', 'Di Buat Oleh');
			$this->apply_excel_header_style($sheet, 'A3:V3');

			$data = $this->reportsales_model->get_report_sales_order($start_date, $end_date, $customer_report, $salesman_report, $warehouse_report)->result_array();
			$this->write_grouped_excel_rows($sheet, $data, ['A' => 'hd_sales_order_inv', 'B' => 'hd_sales_order_date', 'C' => 'customer_name', 'D' => 'customer_rate', 'E' => 'payment_name', 'F' => 'ekspedisi_name', 'L' => 'hd_sales_order_top', 'M' => 'salesman_name', 'N' => 'hd_sales_order_prepare', 'O' => 'hd_sales_order_colly', 'P' => 'warehouse_name', 'Q' => 'hd_sales_order_sub_total', 'R' => 'hd_sales_order_total_discount', 'S' => 'hd_sales_order_ppn', 'T' => 'hd_sales_order_total', 'U' => 'hd_sales_order_note', 'V' => 'user_name'], ['G' => 'product_name', 'H' => 'unit_name', 'I' => 'dt_so_qty', 'J' => 'dt_so_price', 'K' => 'dt_so_total'], 'hd_sales_order_inv', 4, 'V');

			$sheet->getColumnDimension('A')->setWidth(20);
			$sheet->getColumnDimension('B')->setWidth(15);
			$sheet->getColumnDimension('C')->setWidth(20);
			$sheet->getColumnDimension('D')->setWidth(12);
			$sheet->getColumnDimension('E')->setWidth(18);
			$sheet->getColumnDimension('F')->setWidth(18);
			$sheet->getColumnDimension('G')->setWidth(40);
			$sheet->getColumnDimension('H')->setWidth(12);
			$sheet->getColumnDimension('I')->setWidth(12);
			$sheet->getColumnDimension('J')->setWidth(15);
			$sheet->getColumnDimension('K')->setWidth(18);
			$sheet->getColumnDimension('L')->setWidth(12);
			$sheet->getColumnDimension('M')->setWidth(15);
			$sheet->getColumnDimension('N')->setWidth(15);
			$sheet->getColumnDimension('O')->setWidth(10);
			$sheet->getColumnDimension('P')->setWidth(18);
			$sheet->getColumnDimension('Q')->setWidth(15);
			$sheet->getColumnDimension('R')->setWidth(15);
			$sheet->getColumnDimension('S')->setWidth(12);
			$sheet->getColumnDimension('T')->setWidth(15);
			$sheet->getColumnDimension('U')->setWidth(25);
			$sheet->getColumnDimension('V')->setWidth(15);

			$sheet->getStyle('J')->getNumberFormat()->setFormatCode('#,##0');
			$sheet->getStyle('K')->getNumberFormat()->setFormatCode('#,##0');
			$sheet->getStyle('Q')->getNumberFormat()->setFormatCode('#,##0');
			$sheet->getStyle('R')->getNumberFormat()->setFormatCode('#,##0');
			$sheet->getStyle('S')->getNumberFormat()->setFormatCode('#,##0');
			$sheet->getStyle('T')->getNumberFormat()->setFormatCode('#,##0');

			$sheet->freezePane('A4');
			$sheet->getPageSetup()->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);
			$sheet->setTitle('Excell');
			ob_end_clean();
			header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
			header('Content-Disposition: attachment;filename="sales_order_' .date('Y-m-d') . '.xlsx"');
			header('Cache-Control: max-age=0');

			$xlsxWriter = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($excel, 'Xlsx');
			$xlsxWriter = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($excel);
			exit($xlsxWriter->save('php://output'));
		}else{
			$msg = "No Access";
			echo json_encode(['code'=>0, 'result'=>$msg]);die();
		}
	}
	// End Report sales Order 



    // Report Sales
    public function reportsaless()
	{
		$modul = 'Report';
		$check_auth = $this->check_auth($modul);
		if($check_auth['check_access'][0]->view == 'Y'){
			$customer_list['customer_list'] = $this->masterdata_model->customer_list();
            $salesman_list['salesman_list'] = $this->masterdata_model->salesman_list();
            $warehouse_list['warehouse_list'] = $this->masterdata_model->warehouse_list();
			$check_auth['check_auth'] = $check_auth;
			$data['data'] = array_merge($customer_list, $salesman_list, $warehouse_list, $check_auth);
			$this->load->view('Pages/Report/Sales/reportsaless', $data);
		}else{
			$msg = "No Access";
			echo json_encode(['code'=>0, 'result'=>$msg]);die();
		}
	}
    
    public function reportsalesspdf()
    {
        $start_date       = $this->input->get('start_date');
		$end_date 	      = $this->input->get('end_date');
		$customer_report  = $this->input->get('customer_report');
        $salesman_report  = $this->input->get('salesman_report');
        $warehouse_report = $this->input->get('warehouse_report');

		$data['data'] = $this->reportsales_model->get_report_sales($start_date, $end_date, $customer_report, $salesman_report, $warehouse_report)->result_array();
		$htmlView   = $this->load->view('Pages/Report/Sales/reportsalespdf', $data, true);
		$dompdf = new Dompdf();
		$dompdf->loadHtml($htmlView);
		$dompdf->setPaper('A4', 'landscape');
		$dompdf->render();
		$dompdf->stream('penjualan.pdf', array("Attachment" => false));
		exit();
    }

	public function reportsaless_excell()
	{
		$modul = 'Report';
		$check_auth = $this->check_auth($modul);
		if($check_auth['check_access'][0]->view == 'Y'){
			$start_date       = $this->input->get('start_date');
			$end_date 	      = $this->input->get('end_date');
		    $customer_report  = $this->input->get('customer_report');
            $salesman_report  = $this->input->get('salesman_report');
            $warehouse_report = $this->input->get('warehouse_report');

			$excel = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
			$sheet = $excel->getActiveSheet();
			$this->apply_excel_report_theme($sheet, 'Laporan Penjualan', 'V', 'Periode: ' . $start_date . ' s/d ' . $end_date);
			$sheet->setCellValue('A3', 'Invoice');
			$sheet->setCellValue('B3', 'Tanggal');
			$sheet->setCellValue('C3', 'Pelanggan');
			$sheet->setCellValue('D3', 'Rate');
			$sheet->setCellValue('E3', 'Pembayaran');
			$sheet->setCellValue('F3', 'Ekspedisi');
			$sheet->setCellValue('G3', 'Nama Barang');
			$sheet->setCellValue('H3', 'Satuan');
			$sheet->setCellValue('I3', 'Qty');
			$sheet->setCellValue('J3', 'Harga');
			$sheet->setCellValue('K3', 'Total Harga Barang');
			$sheet->setCellValue('L3', 'TOP');
			$sheet->setCellValue('M3', 'Salesman');
			$sheet->setCellValue('N3', 'Prepare By');
			$sheet->setCellValue('O3', 'Koli');
			$sheet->setCellValue('P3', 'Cabang');
			$sheet->setCellValue('Q3', 'Subtotal');
			$sheet->setCellValue('R3', 'Diskon');
			$sheet->setCellValue('S3', 'PPN');
			$sheet->setCellValue('T3', 'Total');
			$sheet->setCellValue('U3', 'Catatan');
			$sheet->setCellValue('V3', 'Di Buat Oleh');
			$this->apply_excel_header_style($sheet, 'A3:V3');

			$data = $this->reportsales_model->get_report_sales($start_date, $end_date, $customer_report, $salesman_report, $warehouse_report)->result_array();
			$this->write_grouped_excel_rows($sheet, $data, ['A' => 'hd_sales_inv', 'B' => 'hd_sales_date', 'C' => 'customer_name', 'D' => 'customer_rate', 'E' => 'payment_name', 'F' => 'ekspedisi_name', 'L' => 'hd_sales_top', 'M' => 'salesman_name', 'N' => 'hd_sales_prepare', 'O' => 'hd_sales_colly', 'P' => 'warehouse_name', 'Q' => 'hd_sales_sub_total', 'R' => 'hd_sales_total_discount', 'S' => 'hd_sales_ppn', 'T' => 'hd_sales_total', 'U' => 'hd_sales_note', 'V' => 'user_name'], ['G' => 'product_name', 'H' => 'unit_name', 'I' => 'dt_sales_qty', 'J' => 'dt_sales_price', 'K' => 'dt_sales_total'], 'hd_sales_inv', 4, 'V');

			$sheet->getColumnDimension('A')->setWidth(20);
			$sheet->getColumnDimension('B')->setWidth(15);
			$sheet->getColumnDimension('C')->setWidth(20);
			$sheet->getColumnDimension('D')->setWidth(12);
			$sheet->getColumnDimension('E')->setWidth(18);
			$sheet->getColumnDimension('F')->setWidth(18);
			$sheet->getColumnDimension('G')->setWidth(40);
			$sheet->getColumnDimension('H')->setWidth(12);
			$sheet->getColumnDimension('I')->setWidth(12);
			$sheet->getColumnDimension('J')->setWidth(15);
			$sheet->getColumnDimension('K')->setWidth(18);
			$sheet->getColumnDimension('L')->setWidth(12);
			$sheet->getColumnDimension('M')->setWidth(15);
			$sheet->getColumnDimension('N')->setWidth(15);
			$sheet->getColumnDimension('O')->setWidth(10);
			$sheet->getColumnDimension('P')->setWidth(18);
			$sheet->getColumnDimension('Q')->setWidth(15);
			$sheet->getColumnDimension('R')->setWidth(15);
			$sheet->getColumnDimension('S')->setWidth(12);
			$sheet->getColumnDimension('T')->setWidth(15);
			$sheet->getColumnDimension('U')->setWidth(25);
			$sheet->getColumnDimension('V')->setWidth(15);

			$sheet->getStyle('J')->getNumberFormat()->setFormatCode('#,##0');
			$sheet->getStyle('K')->getNumberFormat()->setFormatCode('#,##0');
			$sheet->getStyle('Q')->getNumberFormat()->setFormatCode('#,##0');
			$sheet->getStyle('R')->getNumberFormat()->setFormatCode('#,##0');
			$sheet->getStyle('S')->getNumberFormat()->setFormatCode('#,##0');
			$sheet->getStyle('T')->getNumberFormat()->setFormatCode('#,##0');

			$sheet->freezePane('A4');
			$sheet->getPageSetup()->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);
			$sheet->setTitle('Excell');
			ob_end_clean();
			header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
			header('Content-Disposition: attachment;filename="sales_' .date('Y-m-d') . '.xlsx"');
			header('Cache-Control: max-age=0');

			$xlsxWriter = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($excel, 'Xlsx');
			$xlsxWriter = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($excel);
			exit($xlsxWriter->save('php://output'));
		}else{
			$msg = "No Access";
			echo json_encode(['code'=>0, 'result'=>$msg]);die();
		}
	}
    // End Report Sales


	// Report Revisi Sales
    public function reportrevisisales()
	{
		$modul = 'Report';
		$check_auth = $this->check_auth($modul);
		if($check_auth['check_access'][0]->view == 'Y'){
			$customer_list['customer_list'] = $this->masterdata_model->customer_list();
            $salesman_list['salesman_list'] = $this->masterdata_model->salesman_list();
            $warehouse_list['warehouse_list'] = $this->masterdata_model->warehouse_list();
			$check_auth['check_auth'] = $check_auth;
			$data['data'] = array_merge($customer_list, $salesman_list, $warehouse_list, $check_auth);
			$this->load->view('Pages/Report/Sales/reportsalesrevisi', $data);
		}else{
			$msg = "No Access";
			echo json_encode(['code'=>0, 'result'=>$msg]);die();
		}
	}
    
    public function reportsalesrevisipdf()
    {
        $start_date       = $this->input->get('start_date');
		$end_date 	      = $this->input->get('end_date');
		$customer_report  = $this->input->get('customer_report');
        $salesman_report  = $this->input->get('salesman_report');
        $warehouse_report = $this->input->get('warehouse_report');

		$data['data'] = $this->reportsales_model->get_report_revisi_sales($start_date, $end_date, $customer_report, $salesman_report, $warehouse_report)->result_array();
		$htmlView   = $this->load->view('Pages/Report/Sales/reportsalesrevisipdf', $data, true);
		$dompdf = new Dompdf();
		$dompdf->loadHtml($htmlView);
		$dompdf->setPaper('A4', 'landscape');
		$dompdf->render();
		$dompdf->stream('revisisales.pdf', array("Attachment" => false));
		exit();
    }

	public function reportrevisisales_excell()
	{
		$modul = 'Report';
		$check_auth = $this->check_auth($modul);
		if($check_auth['check_access'][0]->view == 'Y'){
			$start_date       = $this->input->get('start_date');
			$end_date 	      = $this->input->get('end_date');
		    $customer_report  = $this->input->get('customer_report');
            $salesman_report  = $this->input->get('salesman_report');
            $warehouse_report = $this->input->get('warehouse_report');

			$excel = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
			$sheet = $excel->getActiveSheet();
			$this->apply_excel_report_theme($sheet, 'Laporan Revisi Penjualan', 'V', 'Periode: ' . $start_date . ' s/d ' . $end_date);
			$sheet->setCellValue('A3', 'Invoice');
			$sheet->setCellValue('B3', 'Tanggal');
			$sheet->setCellValue('C3', 'Pelanggan');
			$sheet->setCellValue('D3', 'Rate');
			$sheet->setCellValue('E3', 'Pembayaran');
			$sheet->setCellValue('F3', 'Ekspedisi');
			$sheet->setCellValue('G3', 'Nama Barang');
			$sheet->setCellValue('H3', 'Satuan');
			$sheet->setCellValue('I3', 'Qty');
			$sheet->setCellValue('J3', 'Harga');
			$sheet->setCellValue('K3', 'Total Harga Barang');
			$sheet->setCellValue('L3', 'TOP');
			$sheet->setCellValue('M3', 'Salesman');
			$sheet->setCellValue('N3', 'Prepare By');
			$sheet->setCellValue('O3', 'Koli');
			$sheet->setCellValue('P3', 'Cabang');
			$sheet->setCellValue('Q3', 'Subtotal');
			$sheet->setCellValue('R3', 'Diskon');
			$sheet->setCellValue('S3', 'PPN');
			$sheet->setCellValue('T3', 'Total');
			$sheet->setCellValue('U3', 'Catatan');
			$sheet->setCellValue('V3', 'Di Buat Oleh');
			$this->apply_excel_header_style($sheet, 'A3:V3');

			$data = $this->reportsales_model->get_report_revisi_sales($start_date, $end_date, $customer_report, $salesman_report, $warehouse_report)->result_array();
			$this->write_grouped_excel_rows($sheet, $data, ['A' => 'hd_sales_inv', 'B' => 'hd_sales_date', 'C' => 'customer_name', 'D' => 'customer_rate', 'E' => 'payment_name', 'F' => 'ekspedisi_name', 'L' => 'hd_sales_top', 'M' => 'salesman_name', 'N' => 'hd_sales_prepare', 'O' => 'hd_sales_colly', 'P' => 'warehouse_name', 'Q' => 'hd_sales_sub_total', 'R' => 'hd_sales_total_discount', 'S' => 'hd_sales_ppn', 'T' => 'hd_sales_total', 'U' => 'hd_sales_note', 'V' => 'user_name'], ['G' => 'product_name', 'H' => 'unit_name', 'I' => 'dt_sales_qty', 'J' => 'dt_sales_price', 'K' => 'dt_sales_total'], 'hd_sales_inv', 4, 'V');

			$sheet->getColumnDimension('A')->setWidth(20);
			$sheet->getColumnDimension('B')->setWidth(15);
			$sheet->getColumnDimension('C')->setWidth(20);
			$sheet->getColumnDimension('D')->setWidth(12);
			$sheet->getColumnDimension('E')->setWidth(18);
			$sheet->getColumnDimension('F')->setWidth(18);
			$sheet->getColumnDimension('G')->setWidth(40);
			$sheet->getColumnDimension('H')->setWidth(12);
			$sheet->getColumnDimension('I')->setWidth(12);
			$sheet->getColumnDimension('J')->setWidth(15);
			$sheet->getColumnDimension('K')->setWidth(18);
			$sheet->getColumnDimension('L')->setWidth(12);
			$sheet->getColumnDimension('M')->setWidth(15);
			$sheet->getColumnDimension('N')->setWidth(15);
			$sheet->getColumnDimension('O')->setWidth(10);
			$sheet->getColumnDimension('P')->setWidth(18);
			$sheet->getColumnDimension('Q')->setWidth(15);
			$sheet->getColumnDimension('R')->setWidth(15);
			$sheet->getColumnDimension('S')->setWidth(12);
			$sheet->getColumnDimension('T')->setWidth(15);
			$sheet->getColumnDimension('U')->setWidth(25);
			$sheet->getColumnDimension('V')->setWidth(15);

			$sheet->getStyle('J')->getNumberFormat()->setFormatCode('#,##0');
			$sheet->getStyle('K')->getNumberFormat()->setFormatCode('#,##0');
			$sheet->getStyle('Q')->getNumberFormat()->setFormatCode('#,##0');
			$sheet->getStyle('R')->getNumberFormat()->setFormatCode('#,##0');
			$sheet->getStyle('S')->getNumberFormat()->setFormatCode('#,##0');
			$sheet->getStyle('T')->getNumberFormat()->setFormatCode('#,##0');

			$sheet->freezePane('A4');
			$sheet->getPageSetup()->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);
			$sheet->setTitle('Excell');
			ob_end_clean();
			header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
			header('Content-Disposition: attachment;filename="sales_revisi_' .date('Y-m-d') . '.xlsx"');
			header('Cache-Control: max-age=0');

			$xlsxWriter = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($excel, 'Xlsx');
			$xlsxWriter = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($excel);
			exit($xlsxWriter->save('php://output'));
		}else{
			$msg = "No Access";
			echo json_encode(['code'=>0, 'result'=>$msg]);die();
		}
	}
    // End Report Sales


	// Report Revisi Sales
    public function reportretursales()
	{
		$modul = 'Report';
		$check_auth = $this->check_auth($modul);
		if($check_auth['check_access'][0]->view == 'Y'){
			$customer_list['customer_list'] = $this->masterdata_model->customer_list();
            $salesman_list['salesman_list'] = $this->masterdata_model->salesman_list();
            $warehouse_list['warehouse_list'] = $this->masterdata_model->warehouse_list();
			$check_auth['check_auth'] = $check_auth;
			$data['data'] = array_merge($customer_list, $salesman_list, $warehouse_list, $check_auth);
			$this->load->view('Pages/Report/Sales/reportretursales', $data);
		}else{
			$msg = "No Access";
			echo json_encode(['code'=>0, 'result'=>$msg]);die();
		}
	}
    
    public function reportretursalespdf()
    {
        $start_date       = $this->input->get('start_date');
		$end_date 	      = $this->input->get('end_date');
		$customer_report  = $this->input->get('customer_report');

		$data['data'] = $this->reportsales_model->get_report_retur_sales($start_date, $end_date, $customer_report)->result_array();
		$htmlView   = $this->load->view('Pages/Report/Sales/reportretursalespdf', $data, true);
		$dompdf = new Dompdf();
		$dompdf->loadHtml($htmlView);
		$dompdf->setPaper('A4', 'landscape');
		$dompdf->render();
		$dompdf->stream('retursales.pdf', array("Attachment" => false));
		exit();
    }

	public function reportretursales_excell()
	{
		$modul = 'Report';
		$check_auth = $this->check_auth($modul);
		if($check_auth['check_access'][0]->view == 'Y'){
			$start_date       = $this->input->get('start_date');
			$end_date 	      = $this->input->get('end_date');
		    $customer_report  = $this->input->get('customer_report');

			$excel = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
			$sheet = $excel->getActiveSheet();
			$this->apply_excel_report_theme($sheet, 'Laporan Retur Penjualan', 'O', 'Periode: ' . $start_date . ' s/d ' . $end_date);
			$sheet->setCellValue('A3', 'Invoice');
			$sheet->setCellValue('B3', 'Tanggal');
			$sheet->setCellValue('C3', 'Pelanggan');
			$sheet->setCellValue('D3', 'Rate');
			$sheet->setCellValue('E3', 'Nama Barang');
			$sheet->setCellValue('F3', 'Satuan');
			$sheet->setCellValue('G3', 'Qty');
			$sheet->setCellValue('H3', 'Harga');
			$sheet->setCellValue('I3', 'Total Harga Barang');
			$sheet->setCellValue('J3', 'Catatan Barang');
			$sheet->setCellValue('K3', 'Total');
			$sheet->setCellValue('L3', 'Status Retur');
			$sheet->setCellValue('M3', 'Jenis Pembayaran');
			$sheet->setCellValue('N3', 'Catatan');
			$sheet->setCellValue('O3', 'Di Buat Oleh');
			$this->apply_excel_header_style($sheet, 'A3:O3');

			$data = $this->reportsales_model->get_report_retur_sales($start_date, $end_date, $customer_report)->result_array();
			
			// For return sales, we need custom logic since payment type has conditional values
			$groupColumns = ['A' => 'hd_retur_sales_inv', 'B' => 'hd_retur_sales_date', 'C' => 'customer_name', 'D' => 'customer_rate', 'K' => 'hd_retur_sales_total', 'L' => 'hd_retur_sales_status', 'N' => 'hd_retur_sales_note', 'O' => 'user_name'];
			$detailColumns = ['E' => 'product_name', 'F' => 'unit_name', 'G' => 'dt_retur_sales_qty', 'H' => 'dt_retur_sales_price', 'I' => 'dt_retur_sales_total', 'J' => 'dt_retur_sales_note'];
			
			$this->write_grouped_excel_rows($sheet, $data, $groupColumns, $detailColumns, 'hd_retur_sales_inv', 4, 'O');

			// Set payment type column with conditional values
			$rowIndex = 4;
			$prevInvoice = null;
			foreach($data as $row) {
				$currentInvoice = $row['hd_retur_sales_inv'];
				if($currentInvoice !== $prevInvoice) {
					$paymentType = ($row['hd_retur_sales_payment_type'] === 'PN') ? 'Potong Nota' : (($row['hd_retur_sales_payment_type'] === 'Cash') ? 'Cash' : 'Garansi');
					$sheet->setCellValue('M' . $rowIndex, $paymentType);
				}
				$prevInvoice = $currentInvoice;
				$rowIndex++;
			}

			$sheet->getColumnDimension('A')->setWidth(20);
			$sheet->getColumnDimension('B')->setWidth(15);
			$sheet->getColumnDimension('C')->setWidth(35);
			$sheet->getColumnDimension('D')->setWidth(35);
			$sheet->getColumnDimension('E')->setWidth(65);
			$sheet->getColumnDimension('F')->setWidth(20);
			$sheet->getColumnDimension('G')->setWidth(30);
			$sheet->getColumnDimension('H')->setWidth(30);
			$sheet->getColumnDimension('I')->setWidth(45);
			$sheet->getColumnDimension('J')->setWidth(30);
			$sheet->getColumnDimension('K')->setWidth(30);
			$sheet->getColumnDimension('L')->setWidth(30);
			$sheet->getColumnDimension('M')->setWidth(45);
			$sheet->getColumnDimension('N')->setWidth(30);
			$sheet->getColumnDimension('O')->setWidth(15);

			$sheet->getStyle('H')->getNumberFormat()->setFormatCode('#,##0');
			$sheet->getStyle('I')->getNumberFormat()->setFormatCode('#,##0');
			$sheet->getStyle('K')->getNumberFormat()->setFormatCode('#,##0');

			$sheet->freezePane('A4');
			$sheet->getPageSetup()->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);
			$sheet->setTitle('Excell');
			ob_end_clean();
			header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
			header('Content-Disposition: attachment;filename="laporan_retur_sales_' .date('Y-m-d') . '.xlsx"');
			header('Cache-Control: max-age=0');

			$xlsxWriter = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($excel, 'Xlsx');
			$xlsxWriter = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($excel);
			exit($xlsxWriter->save('php://output'));
		}else{
			$msg = "No Access";
			echo json_encode(['code'=>0, 'result'=>$msg]);die();
		}
	}
    // End Report Sales

	// Report Retur Sales

	
	// End report Retur Sales

}

?>