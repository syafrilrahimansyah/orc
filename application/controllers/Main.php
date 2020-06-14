<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {
	public function __construct()
    {
            parent::__construct();
            // Your own constructor code
            $this->load->model('FormRender');

    }
    public function browse()
	{
		$this->load->library('pagination');
		$this->load->model('Item');

		
		if(isset($_POST['search'])){
			$search = $_POST['search'];
			
		}else{
			if($this->session->userdata('search')!=null){
				$search = $this->session->userdata('search');
			}else{
				$search = '';
			}
		}
		$this->session->set_userdata('search',$search);

		$start_index = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$config = $this->Item->pagination('offer_meta','main/browse/',3,$search);
		$this->pagination->initialize($config);

		$metadata = [
			'navstyle' => [
				0 => 'color: #fff;
				background-color: #242849;
				border-radius: 2px;'],
			'content' => [
				'header' => 'Browse',
				'icon' => 'fas fa-cube',
				'bdcmb' => [
					'Dashboard',
					'Browse'
				]
			],
			'pagination' => $this->pagination->create_links(),
			'data_search' => $this->session->userdata('search'),
			'data' => $this->Item->offer_browse($search,$start_index),
			'module' => 'browse',
			'template' => $this->db->get('tc_template')->result_array()
		];

		$this->load->view('main',$metadata);
	}
	public function monitor($sub)
	{
		$exst_sub = ['activity','process'];
		if(in_array($sub,$exst_sub)){
			$metadata = [
				'navstyle' => [
					1 => 'color: #fff;
					background-color: #242849;
					border-radius: 2px;'],
				'content' => [
					'header' => ucfirst($sub),
					'icon' => 'fas fa-desktop',
					'bdcmb' => [
						'Dashboard',
						'Monitor',
						ucfirst($sub)
					]
				],
				'module' => $sub
			];
			$this->load->view('main',$metadata);
		}else{show_404();}
	}
	public function template_config($sub)
	{
		$exst_sub = ['lookup','form_group','template'];
		if(in_array($sub,$exst_sub)){
			$tbl = [
				'lookup' => 'tc_lookup',
				'form_group' => 'tc_fgroup',
				'template' => 'tc_template'
			];
			$this->load->library('pagination');
			$this->load->model('Item');
			$start_index = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
			$config = $this->Item->pagination($tbl[$sub],'main/template_config/'.$sub.'/',4);
			$this->pagination->initialize($config);

			$data = $this->FormRender->tc_display($sub,10,$start_index);
			$metadata = [
				'navstyle' => [
					2 => 'color: #fff;
					background-color: #242849;
					border-radius: 2px;'],
				'content' => [
					'header' => ucfirst($sub),
					'icon' => 'fas fa-columns',
					'bdcmb' => [
						'Dashboard',
						'Template_Config',
						ucfirst($sub)
					]
				],
				'pagination' => $this->pagination->create_links(),
				'module' => $sub,
				'data' => $data
			];
			$this->load->view('main',$metadata);
		}else{show_404();}
	}
	public function sql_output_config($sub)
	{
		$exst_sub = ['db_target','table_key','table_set'];
		if(in_array($sub,$exst_sub)){
			$metadata = [
				'navstyle' => [
					3 => 'color: #fff;
					background-color: #242849;
					border-radius: 2px;'],
				'content' => [
					'header' => ucfirst($sub),
					'icon' => 'fas fa-database',
					'bdcmb' => [
						'Dashboard',
						'SQL_Output_Config',
						ucfirst($sub)
					]
				],
				'module' => $sub
			];
			$this->load->view('main',$metadata);
		}else{show_404();}
	}
	public function setting()
	{
		$metadata = [
			'navstyle' => [
				4 => 'color: #fff;
				background-color: #242849;
				border-radius: 2px;'],
			'content' => [
				'header' => 'Setting',
				'icon' => 'fas fa-cog',
				'bdcmb' => [
					'Dashboard',
					'Setting'
				]
			],
			'module' => 'Setting'
			
		];
		$this->load->view('main',$metadata);
	}

    public function create()
	{
		$this->load->view('welcome_message');
	}

	//###################################### LAYER 2 ##############################################
	
}
