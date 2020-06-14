<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FormRender extends CI_Model {

	public function offer_dummy()
	{
		$form = [
			'inptxt' => [
				'title' => 'offer name',
				'name' => 'offer1',
				'value' => 'offer1',
				'note' => 'input with offer name'
			],
			'areatxt' => [
				'title' => 'offer detail',
				'name' => 'offer_det1',
				'value' => 'offer_det1',
			],
			'sglselect' => [
				'title' => 'offer select',
				'name' => 'offer_sel',
				'opt' => [
					['value' => 'uniqid0001', 'title'=>'offer select 1'],
					['value' => 'uniqid0002', 'title'=>'offer select 2'],
					['value' => 'uniqid0003', 'title'=>'offer select 3']
				]
			],
			'mltselect' => [
				'title' => 'offer multi select',
				'name' => 'offer_multisel',
				'opt' => [
					['value' => 'uniqid0001multi', 'title'=>'offer multi select 1'],
					['value' => 'uniqid0002multi', 'title'=>'offer multi select 2'],
					['value' => 'uniqid0003multi', 'title'=>'offer multi select 3']
				]
			]
		];
		return $form;
	}
	public function detail_offer($uid){
		
		$raw_data = $this->db->get_where('offer_data',['of_uid'=>$uid])->result_array();
		foreach($raw_data as $row){
			if($row['name']=='default_name'){
				$form[] = [
				'detail_sgl' => [
					'title' => '<b>'.'Default Name'.' :'.'</b>',
					'value' => $row['value']
					]
				];
			}else{
				$fgroup = $this->db->get_where('tc_fgroup',['name'=>$row['name']])->row();
				switch($fgroup->type){
					case('input' || 'textarea' || 'singleselect'):
						$form[] = [
						'detail_sgl' => [
							'title' => '<b>'.$fgroup->title.' :'.'</b>',
							'value' => $row['value']	
							]
						];
						break;
					case('multiselect'):
						$opt_raw = explode('|',$row['value']);
						foreach($opt_raw as $opt_val){
							$opt[] = ['value' => $opt_val]; 
						}
						$form[] = [
						'detail_mlt' => [
							'title' => '<b>'.$fgroup->title.' :'.'</b>',
							'opt' => $opt	
							]
						];
						break;
				}
			}
		}
		return $form;
	}
	public function config_offer($uid){
		$raw_data = $this->db->get_where('offer_data',['of_uid'=>$uid])->result_array();
		foreach($raw_data as $row){
			if($row['name']=='default_name'){
				$form[] = [
					'inptxt' => [
						'title' => 'Default Name',
						'name' => 'default_name',
						'value' => $row['value'],
						'note' => 'input with offer name'
					]
				];
			}else{
				$fgroup = $this->db->get_where('tc_fgroup',['name'=>$row['name']])->row();
				switch($fgroup->type){
					case('input'):
						$form[] = [
							'inptxt' => [
								'title' => $fgroup->title,
								'name' => $fgroup->name,
								'value' => $row['value'],
								'note' => $fgroup->note
							]
						];
						break;
					case('textarea'):
						$form[] = [
							'areatxt' => [
								'title' => $fgroup->title,
								'name' => $fgroup->name,
								'value' => $row['value'],
								'note' => $fgroup->note
							]
						];
						break;
					case('singleselect'):
						if($fgroup->option_c2lrtb==1){
							$raw_option = $this->db->get_where('tc_rtb_c2l',['c_uid'=>$fgroup->uid])->result_array();
							foreach($raw_option as $option_rtb){
								$option = $this->db->get_where('tc_lookup',['uid'=>$option_rtb['l_uid']])->row_array();
								if($option['value']==$row['value']){
									$option_final[] = ['value'=>$option['value'],'title'=>$option['title'],'selected'=>1];
								}
								else{
									$option_final[] = ['value'=>$option['value'],'title'=>$option['title']];
								}
							}
						}else{
							$option_final[] = ['value'=>'n/a','title'=>'n/a'];
						}
						$form[] = ['sglselect' => [
										'title' => $fgroup->title,
										'name' => $fgroup->name,
										'opt' => $option_final
									]
								];
						unset($option_final);
						break;
					case('multiselect'):
						if($fgroup->option_c2lrtb==1){
							$raw_option = $this->db->get_where('tc_rtb_c2l',['c_uid'=>$fgroup->uid])->result_array();
							foreach($raw_option as $option_rtb){
								$option = $this->db->get_where('tc_lookup',['uid'=>$option_rtb['l_uid']])->row_array();
								$row_multi = explode('|',$row['value']);
								if(in_array($option['value'],$row_multi)){
									$option_final[] = ['value'=>$option['value'],'title'=>$option['title'],'selected'=>1];
								}
								else{
									$option_final[] = ['value'=>$option['value'],'title'=>$option['title']];
								}
							}
						}else{
							$option_final[] = ['value'=>'n/a','title'=>'n/a'];
						}
						$form[] = ['mltselect' => [
										'title' => $fgroup->title,
										'name' => $fgroup->name,
										'opt' => $option_final
									]
								];
						unset($option_final);
						break;
					case('association'):
						if($fgroup->template_c2trtb==1){
							$raw_option = $this->db->get_where('tc_rtb_c2t',['c_uid'=>$fgroup->uid])->result_array();
								foreach ($raw_option as $option_rtb) {
									$option = $this->db->get_where('offer_meta',['template'=>$option_rtb['t_uid']])->result_array();
									
									foreach($option as $final){
										$row_multi = explode('|',$row['value']);
										if(in_array($final['uid'],$row_multi)){
											$option_final[] = ['value'=>$final['uid'],'title'=>$final['name'],'selected'=>1];
										}
										else{
											$option_final[] = ['value'=>$final['uid'],'title'=>$final['name']];
										}
									}
								}
						}else{
							$option_final[] = ['value'=>'n/a','title'=>'n/a'];
						}
						$form[] = ['mltselect' => [
										'title' => $fgroup->title,
										'name' => $fgroup->name,
										'opt' => $option_final
									]
								];
						unset($option_final);
						break;
					
				}
			}
		}
		return $form;
	}

	public function new_offer($template){
		$raw_template = $this->db->get_where('tc_template',['uid'=>$template])->row_array();
		if($raw_template != null){
			if(isset($raw_template['component_t2crtb']) && $raw_template['component_t2crtb']==1){
				//deafult offer name
				$form[] =  ['inptxt' => [
								'title' => 'Default Name',
								'name' => 'default_name',
								'value' => '',
								'note' => 'offer deafult name'
								]
							];

				$raw_component = $this->db->get_where('tc_rtb_t2c',['t_uid'=>$template])->result_array();
				foreach($raw_component as $rtb){
					
					$component = $this->db->get_where('tc_fgroup', ['uid'=>$rtb['c_uid']])->row_array();
					switch($component['type']){
						case('input'):
							$form[] =  ['inptxt' => [
												'title' => $component['title'],
												'name' => $component['name'],
												'value' => $component['value'],
												'note' => $component['note']
												]
											];
							break;	
						case('textarea'):
							$form[] = 	['areatxt' => [
											'title' => $component['title'],
											'name' => $component['name'],
											'value' => $component['value'],
											]
										];
							break;
						case('singleselect'):
							if($component['option_c2lrtb']==1){
								$raw_option = $this->db->get_where('tc_rtb_c2l',['c_uid'=>$component['uid']])->result_array();
								foreach($raw_option as $option_rtb){
									$option = $this->db->get_where('tc_lookup',['uid'=>$option_rtb['l_uid']])->row_array();
									$option_final[] = ['value'=>$option['value'],'title'=>$option['title']];
								}
							}else{
								$option_final[] = ['value'=>'n/a','title'=>'n/a'];
							}
							$form[] = ['sglselect' => [
											'title' => $component['title'],
											'name' => $component['name'],
											'opt' => $option_final
										]
									];
							unset($option_final);
							break;
						case('multiselect'):
							if($component['option_c2lrtb']==1){
								$raw_option = $this->db->get_where('tc_rtb_c2l',['c_uid'=>$component['uid']])->result_array();
								foreach($raw_option as $option_rtb){
									$option = $this->db->get_where('tc_lookup',['uid'=>$option_rtb['l_uid']])->row_array();
									$option_final[] = ['value'=>$option['value'],'title'=>$option['title']];
								}
							}else{
								$option_final[] = ['value'=>'n/a','title'=>'n/a'];
							}
							$form[] = ['mltselect' => [
											'title' => $component['title'],
											'name' => $component['name'],
											'opt' => $option_final
										]
									];
							unset($option_final);
							break;
						case('association'):
							if($component['template_c2trtb']==1){
								$raw_option = $this->db->get_where('tc_rtb_c2t',['c_uid'=>$component['uid']])->result_array();
								foreach ($raw_option as $option_rtb) {
									$option = $this->db->get_where('offer_meta',['template'=>$option_rtb['t_uid']])->result_array();
									foreach($option as $final){
										$option_final[] = ['value'=>$final['uid'],'title'=>$final['name']];
									}
								}
							}else{
								$option_final[] = ['value'=>'n/a','title'=>'n/a'];
							}
							$form[] = ['mltselect' => [
											'title' => $component['title'],
											'name' => $component['name'],
											'opt' => $option_final
										]
									];
							unset($option_final);
							break;
					}
				}
				return $form;
			}
			return null;
		}
		return null;
	}

	public function tc_display($sub,$limit,$start_index)
	{
		switch($sub){
			case 'lookup':
				$data = $this->db->get('tc_lookup',$limit,$start_index)->result_array();
				return (isset($data))?$data:[];
				break;
			case 'form_group' :
				$raw = $this->db->get('tc_fgroup',$limit,$start_index)->result_array();
				foreach($raw as $value){
					if($value['option_c2lrtb']==1){
						$value['option_c2lrtb'] = $this->db->get_where('tc_rtb_c2l',['c_uid'=>$value['uid']])->result_array();
						$opt_idx = 0;
						foreach($value['option_c2lrtb'] as $opt_row){
							$value['option_c2lrtb'][$opt_idx]['opt_title'] = $this->db->get_where('tc_lookup',['uid'=>$opt_row['l_uid']])->row()->title;
							$opt_idx+=1;
						}
					}else{
						$value['option_c2lrtb'] = [];
					}
					if($value['template_c2trtb']==1){
						$value['template_c2trtb'] = $this->db->get_where('tc_rtb_c2t',['c_uid'=>$value['uid']])->result_array();
						$tmp_idx = 0;
						foreach($value['template_c2trtb'] as $tmp_row){
							$value['template_c2trtb'][$tmp_idx]['tmp_title'] = $this->db->get_where('tc_template',['uid'=>$tmp_row['t_uid']])->row()->name;
							$tmp_idx+=1;
						}
					}else{
						$value['template_c2trtb'] = [];
					}
					$data[] = $value;
				}
				return (isset($data))?$data:[];
				break;
			case 'template' :
				$raw = $this->db->get('tc_template',$limit,$start_index)->result_array();
				foreach($raw as $value){
					if($value['component_t2crtb']==1){
						$value['component_t2crtb'] = $this->db->get_where('tc_rtb_t2c',['t_uid'=>$value['uid']])->result_array();
					}else{
						$value['component_t2crtb'] = [];
					}
					$data[] = $value;
				}
				return (isset($data))?$data:[];
				break;
			default :
				return null;
		}
	}
}
