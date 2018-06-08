<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notifikasi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//check login
		is_logged_in();
		//Load Dependencies
		$this->load->library('pagination');
        $this->load->model('M_Notifikasi');
		//$this->load->model('m_balai');
		// $this->output->enable_profiler(true);

	}

	public function index()
	{
		// $dat['notif'] = $this->M_Notifikasi->getAllNotif();
		$this->session->set_userdata('page',10);

		$this->load->library('pagination');
		
		$config = array();
        $config["base_url"] = site_url('notifikasi/index');
        $config["total_rows"] = $this->M_Notifikasi->get_jumlah_records();
        $config["per_page"] = 10;
        $config["uri_segment"] = 3;
        $config['num_links'] = 3;
        $config['full_tag_open'] = '<ul class="pagination pagination-sm no-margin pull-right">';
		$config['full_tag_close'] = '</ul>';
		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$config['next_link'] = 'Next';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['prev_link'] = 'Back';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li><a href="#"><b>';
		$config['cur_tag_close'] = '</b></a></li>';

		$this->pagination->initialize($config);
		
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$dat['notif'] = $this->M_Notifikasi->getNotif($config["per_page"],$page);
		
		$dat['paging'] = $this->pagination->create_links();

		//ambil data koleksi
		$dat['pageid'] = 'notifikasi';
		$dat['page_title'] = 'NOTIFIKASI';
		$dat['page_desc'] = 'Halaman untuk melihat laporan asset.';
		$dat['select'] = 10;
		$data['page'] = $this->load->view('notifikasi', $dat, true);

		$this->load->view('layouts/layout',$data);
	}

	public function insertNotif($id)
	{
		$this->M_Notifikasi->insertNotif($id);
	}

	public function printNotifikasi()
	{
		$tabel = "Notifikasi";

		// Load plugin PHPExcel nya
	    // include APPPATH.'third_party/PHPExcel.php';
	    $this->load->library('excel');
	    
	    // Panggil class PHPExcel nya
	    $excel = $this->excel;

	    // Settingan awal fil excel
	    $excel->getProperties()->setCreator('Admin')
	                 ->setLastModifiedBy('Administrator')
	                 ->setTitle($tabel)
	                 ->setSubject("Asset")
	                 ->setDescription("Laporan Semua Data Asset dari ".$tabel)
	                 ->setKeywords("Asset");

	    // Buat sebuah variabel untuk menampung pengaturan style dari header tabel
	    $style_col = array(
	      'font' => array('bold' => true), // Set font nya jadi bold
	      'alignment' => array(
	        'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
	        'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
	      ),
	      'borders' => array(
	        'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
	        'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
	        'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
	        'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
	      )
	    );

	    // Buat sebuah variabel untuk menampung pengaturan style dari isi tabel
	    $style_row = array(
	      'alignment' => array(
	        'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
	        'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
	      ),
	      'borders' => array(
	        'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
	        'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
	        'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
	        'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
	      )
	    );

	    $excel->setActiveSheetIndex(0)->setCellValue('A1', "DATA ".$tabel); // Set kolom A1 dengan tulisan "DATA SISWA"
	    $excel->getActiveSheet()->mergeCells('A1:C1'); // Set Merge Cell pada kolom A1 sampai E1
	    $excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE); // Set bold kolom A1
	    $excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(15); // Set font size 15 untuk kolom A1
	    $excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1

	    // Buat header tabel nya pada baris ke 3
	    $excel->setActiveSheetIndex(0)->setCellValue('A3', "NO"); // Set kolom A3 dengan tulisan "NO"
	    $excel->setActiveSheetIndex(0)->setCellValue('B3', "PESAN"); // Set kolom B3 dengan tulisan "NIS"
	    $excel->setActiveSheetIndex(0)->setCellValue('C3', "WAKTU"); // Set kolom C3 dengan tulisan "NAMA"

	    // Apply style header yang telah kita buat tadi ke masing-masing kolom header
	    $excel->getActiveSheet()->getStyle('A3')->applyFromArray($style_col);
	    $excel->getActiveSheet()->getStyle('B3')->applyFromArray($style_col);
	    $excel->getActiveSheet()->getStyle('C3')->applyFromArray($style_col);

	    // Panggil function view yang ada di SiswaModel untuk menampilkan semua data siswanya
	    $asset = $this->M_Notifikasi->getAllNotif();
	    $no = 1; // Untuk penomoran tabel, di awal set dengan 1
	    $numrow = 4; // Set baris pertama untuk isi tabel adalah baris ke 4

	    foreach($asset as $data){ // Lakukan looping pada variabel asset
	      $excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no);
	      $excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $data->pesan);
	      $excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $data->waktu);
	      
	      // Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
	      $excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
	      $excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
	      $excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_row);
	      
	      $no++; // Tambah 1 setiap kali looping
	      $numrow++; // Tambah 1 setiap kali looping
	    }

	    // Set width kolom
	    $excel->getActiveSheet()->getColumnDimension('A')->setWidth(5); // Set width kolom A
	    $excel->getActiveSheet()->getColumnDimension('B')->setWidth(80); // Set width kolom B
	    $excel->getActiveSheet()->getColumnDimension('C')->setWidth(30); // Set width kolom C
	    
	    // Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
	    $excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);

	    // Set orientasi kertas jadi LANDSCAPE
	    $excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);

	    // Set judul file excel nya
	    $excel->getActiveSheet(0)->setTitle($tabel);
	    $excel->setActiveSheetIndex(0);

	    // Proses file excel
	    ob_clean();
	    header('Content-Type: application/vnd.ms-excel');
	    header('Content-Disposition: attachment; filename="'.$tabel.'.xlsx"'); // Set nama file excel nya
	    header('Cache-Control: max-age=0');
	    $write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
	    $write->save('php://output');

	    redirect('asset/kib_a');
	}
}

/* End of file notifikasi.php */
/* Location: ./application/controllers/notifikasi.php */
