
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Offer extends CI_Controller {

	public function detail(){
		$this->load->model('FormRender');
        $uid = $this->input->get('offer_uid');
		$meta = $this->db->get_where('offer_meta',['uid'=>$uid])->row();
		
		$metadata = [
			'navstyle' => [
				0 => 'color: #fff;
				background-color: #242849;
				border-radius: 2px;'],
			'content' => [
				'header' => $meta->name,
				'icon' => 'fas fa-cube',
				'tmplt' => $this->db->get_where('tc_template',['uid'=>$meta->template])->row()->name,
				'status' => $meta->status,
				'version' => $meta->version
			],
			'module' => 'offer_detail',
			'offer_uid' => $uid,
			'form' => $this->FormRender->detail_offer($uid)
		]; 
		
		$this->load->view('offer',$metadata);	
	}
	public function config(){
		$this->load->model('FormRender');
		$uid = $this->input->get('offer_uid');
		$meta = $this->db->get_where('offer_meta',['uid'=>$uid])->row();
		
		
		$metadata = [
			'navstyle' => [
				0 => 'color: #fff;
				background-color: #242849;
				border-radius: 2px;'],
			'content' => [
				'header' => 'Offer0001',
				'icon' => 'fas fa-cube',
				'tmplt' => $this->db->get_where('tc_template',['uid'=>$meta->template])->row()->name,
				'status' => $meta->status,
				'version' => $meta->version
			],
			'of_uid' => $uid,
			'module' => 'offer_config',
			'tmplt_uid' => $meta->template,
			'form' => $this->FormRender->config_offer($uid)
		];

		$this->load->view('offer',$metadata);	
	}
	
	public function alert(){
		
		$uid = $this->input->get('UniqID');
		
		$metadata = [
			'navstyle' => [
				0 => 'color: #fff;
				background-color: #242849;
				border-radius: 2px;'],
			'content' => [
				'header' => 'Offer0001',
				'icon' => 'fas fa-cube',
				'tmplt' => 'offer_tmp_1'
			],
			'module' => 'offer_alert',
			'message' => 'this offer is on configure by user1'
			
		];

		$this->load->view('offer',$metadata);	
	}

	public function new(){
		$this->load->model('FormRender');

		$template = $this->input->get('template');
		$uid = $this->input->get('UniqID');
		
		$metadata = [
			'navstyle' => [
				0 => 'color: #fff;
				background-color: #242849;
				border-radius: 2px;'],
			'content' => [
				'header' => 'New Offer',
				'icon' => 'fas fa-cube',
				'tmplt' => $this->db->get_where('tc_template',['uid'=>$template])->row()->name,
				'status' => 'draft',
				'version' => 1,
			],
			'module' => 'offer_new',
			'tmplt_uid' => $template,
			'form' => $this->FormRender->new_offer($template)
			
		];

		$this->load->view('offer',$metadata);
	}

	public function add(){
		$this->load->model('Q_Engine');
				
		if(isset($_POST['save'])){
			$template = $_POST['template'];
			unset($_POST['template']);
			unset($_POST['save']);
			$of_uid = uniqid('of-');
			foreach($_POST as $name => $value){
				if(is_array($value)) $value = implode('|',$value);
				$this->Q_Engine->offer_new($of_uid,$name,$value);
			}
			$meta = [
				'uid' => $of_uid,
				'name' => $_POST['default_name'],
				'template' => $template,
				'status' => 'draft',
				'version' => 1
			];
			$this->db->insert('offer_meta', $meta);
			redirect(base_url().'/offer/config?offer_uid='.$of_uid);
		}
		else if(isset($_POST['approve'])){
			$template = $_POST['template'];
			unset($_POST['template']);
			unset($_POST['approve']);
			$of_uid = uniqid('of-');
			foreach($_POST as $name => $value){
				if(is_array($value)) $value = implode('|',$value);
				$this->Q_Engine->offer_new($of_uid,$name,$value);
			}
			$meta = [
				'uid' => $of_uid,
				'name' => $_POST['default_name'],
				'template' => $template,
				'status' => 'approved',
				'version' => 1
			];
			$this->db->insert('offer_meta', $meta);
			redirect(base_url().'/offer/detail?offer_uid='.$of_uid);
		}
			
	}
	
	public function changes(){
		$this->load->model('Q_Engine');
				
		if(isset($_POST['save'])){
			$template = $_POST['template'];
			unset($_POST['template']);
			unset($_POST['save']);
			$of_uid = $_GET['offer_uid'];
			$this->db->where('of_uid',$of_uid);
			$this->db->delete('offer_data');
			foreach($_POST as $name => $value){
				if(is_array($value)) $value = implode('|',$value);
				$this->Q_Engine->offer_new($of_uid,$name,$value);
			}
			$meta = [
				'uid' => $of_uid,
				'name' => $_POST['default_name'],
				'template' => $template,
				'status' => 'draft',
				'version' => $this->db->get_where('offer_meta',['uid'=>$of_uid])->row()->version
			];
			$this->db->set($meta);
			$this->db->where('uid',$of_uid);
			$this->db->update('offer_meta');
			redirect(base_url().'/offer/config?offer_uid='.$of_uid);
		}
		else if(isset($_POST['approve'])){
			$template = $_POST['template'];
			unset($_POST['template']);
			unset($_POST['approve']);
			$of_uid = $_GET['offer_uid'];
			$this->db->where('of_uid',$of_uid);
			$this->db->delete('offer_data');
			foreach($_POST as $name => $value){
				if(is_array($value)) $value = implode('|',$value);
				$this->Q_Engine->offer_new($of_uid,$name,$value);
			}
			$meta = [
				'uid' => $of_uid,
				'name' => $_POST['default_name'],
				'template' => $template,
				'status' => 'approved',
				'version' => $this->db->get_where('offer_meta',['uid'=>$of_uid])->row()->version
			];
			$this->db->set($meta);
			$this->db->where('uid',$of_uid);
			$this->db->update('offer_meta');
			redirect(base_url().'/offer/detail?offer_uid='.$of_uid);
		}
	}
	public function delete(){
		$offer = $_POST['uid'];
		$this->db->where('of_uid',$offer);
		$this->db->delete('offer_data');
		$this->db->where('uid',$offer);
		$this->db->delete('offer_meta');
		redirect(base_url());
	}
}


