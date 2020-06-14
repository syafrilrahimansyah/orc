<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Item extends CI_Model {

	public function pagination($tbl,$url,$uri_seg,$search='')
	{
		if($search==''){
			$num_rows = $this->db->get($tbl)->num_rows();
		}else{
			$this->db->like('uid',$search);
			$this->db->or_like('name',$search);
			$num_rows = $this->db->get('offer_meta')->num_rows();
		}
		$config['base_url'] = base_url().$url;
		$config['total_rows'] = $num_rows;
		$config['per_page'] = 10;
		$config['uri_segment'] = $uri_seg;
		$config['full_tag_open'] = '<ul class="pagination">';
		$config['full_tag_close'] ='</ul>';
		$config['num_tag_open'] = '<li class="page-item page-link">';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="page-item page-link" style="background-color: #5969ff;
    border-color: #5969ff;color:white">';
		$config['cur_tag_close'] = '<span class="sr-only"></span></a></li>';
		$config['next_tag_open'] = '<li class="page-item page-link">';
		$config['next_tag_close'] = '</li>';
		$config['prev_tag_open'] = '<li class="page-item page-link">';
		$config['prev_tag_close'] = '</li>';
		$config['first_tag_open'] = '<li class="page-item page-link">';
		$config['first_tag_close'] = '</li>';
		$config['last_tag_open'] = '<li class="page-item page-link">';
        $config['last_tag_close'] = '</li>';
        
        return $config;
	}
	public function offer_browse($search='', $start_index)
	{
		if($search==''){
            return $this->db->get('offer_meta',10,$start_index)->result();
        }else{
            $this->db->like('uid',$search);
            $this->db->or_like('name',$search);
            return $this->db->get('offer_meta',10,$start_index)->result();
        }
	}
}
