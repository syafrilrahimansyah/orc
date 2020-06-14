<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TC extends CI_Controller {

	public function __construct()
    {
            parent::__construct();
            // Your own constructor code
            $this->load->model('Q_Engine');

    }
    // LOOKUP
	public function n_lookup()
	{
        $generic = $_POST['generic'];
        $title = $_POST['title'];
        $value = $_POST['value'];

        $data = [
            'generic' => $generic,
            'title' => $title,
            'value' => $value
        ];
        $this->Q_Engine->tc_new('tc_lookup',$data,'tcl-');
        redirect(base_url().'main/template_config/lookup');
    }
    public function u_lookup()
    {
        $uid = $_POST['uid'];
        $generic = $_POST['generic'];
        $title = $_POST['title'];
        $value = $_POST['value'];

        $data = [
            'generic' => $generic,
            'title' => $title,
            'value' => $value
        ];
        $this->Q_Engine->tc_updt('tc_lookup',$data,$uid);
        redirect(base_url().'main/template_config/lookup');
    }
    public function d_lookup()
    {
        $uid = $_POST['uid'];   
        $this->Q_Engine->tc_del('tc_lookup', $uid);
        redirect(base_url().'main/template_config/lookup');
    }
    // FORM GROUP (COMPONENT)
    public function n_fgroup()
    {
        $generic = $_POST['generic'];
        $type = $_POST['type'];
        $title = $_POST['title']; 
        $name = $_POST['name']; 
        $value = $_POST['value']; 
        $note = $_POST['note']; 
        $gen_opt = $_POST['gen_opt']; 
        $gen_lookup = $_POST['gen_lookup']; 
        $option_c2lrtb = (isset($_POST['option_c2lrtb']))?1:0; 
        $template_c2trtb = (isset($_POST['template_c2trtb']))?1:0; 
        
        $check_dupl_name = $this->db->get_where('tc_fgroup',['name'=>$name])->num_rows();
        if($check_dupl_name==0){
            $data = [
                'generic' => $generic,
                'type' => $type,
                'title' => $title,
                'name' => $name,
                'value' => $value,
                'note' => $note,
                'gen_opt' => $gen_opt,
                'gen_lookup' => $gen_lookup,
                'option_c2lrtb' => $option_c2lrtb,
                'template_c2trtb' => $template_c2trtb
            ];
            $uid = $this->Q_Engine->tc_new('tc_fgroup',$data,'tcfg-');

            if(isset($_POST['option_c2lrtb']) && is_array($_POST['option_c2lrtb'])){
                foreach($_POST['option_c2lrtb'] as $l_uid){
                    $datac2l = [
                        'c_uid' => $uid,
                        'l_uid' => $l_uid
                    ];
                    $this->Q_Engine->tc_new('tc_rtb_c2l',$datac2l,'tcc2l-');    
                }
            }
            if(isset($_POST['template_c2trtb']) && is_array($_POST['template_c2trtb'])){
                foreach($_POST['template_c2trtb'] as $t_uid){
                    $datac2t = [
                        'c_uid' => $uid,
                        't_uid' => $t_uid
                    ];
                    $this->Q_Engine->tc_new('tc_rtb_c2t',$datac2t,'tcc2t-');    
                }
            }
            redirect(base_url().'main/template_config/form_group');
        }
        else{redirect(base_url().'main/template_config/form_group');}

        
    }
    public function u_fgroup(){
        $uid = $_POST['uid'];
        $generic = $_POST['generic'];
        $type = $_POST['type'];
        $title = $_POST['title'];
        $name = $_POST['name'];
        $value = $_POST['value'];
        $note = $_POST['note'];
        $gen_opt = $_POST['gen_opt'];
        $gen_lookup = $_POST['gen_lookup'];
        $option_c2lrtb = (isset($_POST['option_c2lrtb']))?1:0;
        $template_c2trtb = (isset($_POST['template_c2trtb']))?1:0;

        $check_dupl_name = $this->db->get_where('tc_fgroup',['name'=>$name]);

        if($check_dupl_name->num_rows()<=1){
            $data = [
                'generic' => $generic, 
                'type' => $type, 
                'title' => $title, 
                'name' => $name, 
                'value' => $value, 
                'note' => $note, 
                'gen_opt' => $gen_opt, 
                'gen_lookup' => $gen_lookup, 
                'option_c2lrtb' => $option_c2lrtb, 
                'template_c2trtb' => $template_c2trtb, 
            ];

            $this->Q_Engine->tc_updt('tc_fgroup',$data,$uid);

            if(isset($_POST['option_c2lrtb']) && is_array($_POST['option_c2lrtb'])){
                $this->Q_Engine->tcrtb_del('tc_rtb_c2l', $uid, 'c_uid');
                foreach($_POST['option_c2lrtb'] as $l_uid){
                    $datac2l = [
                        'c_uid' => $uid,
                        'l_uid' => $l_uid
                    ];
                    $this->Q_Engine->tc_new('tc_rtb_c2l',$datac2l,'tcc2l-');    
                }
            }else{
                $this->Q_Engine->tcrtb_del('tc_rtb_c2l', $uid, 'c_uid');
            }
            if(isset($_POST['template_c2trtb']) && is_array($_POST['template_c2trtb'])){
                $this->Q_Engine->tcrtb_del('tc_rtb_c2t', $uid, 'c_uid');
                foreach($_POST['template_c2trtb'] as $t_uid){
                    $datac2t = [
                        'c_uid' => $uid,
                        't_uid' => $t_uid
                    ];
                    $this->Q_Engine->tc_new('tc_rtb_c2t',$datac2t,'tcc2t-');    
                }
            }else{
                $this->Q_Engine->tcrtb_del('tc_rtb_c2t', $uid, 'c_uid');
            }
            redirect(base_url().'main/template_config/form_group');
        }else{redirect(base_url().'main/template_config/form_group');}
        
    }
    public function d_fgroup()
    {
        $uid = $_POST['uid'];   
        $this->Q_Engine->tc_del('tc_fgroup', $uid);
        $this->Q_Engine->tcrtb_del('tc_rtb_c2t', $uid, 'c_uid');
        $this->Q_Engine->tcrtb_del('tc_rtb_c2l', $uid, 'c_uid');
        redirect(base_url().'main/template_config/form_group');
    }
    // TEMPLATE
    public function n_template()
    {
        $name = $_POST['name'];
        $component_t2crtb = (isset($_POST['component_t2crtb']))?1:0;
        $gen_opt = $_POST['gen_opt'];
        $gen_component = $_POST['gen_component'];

        $data = [
            'name' => $name,
            'component_t2crtb' => $component_t2crtb,
            'gen_opt' => $gen_opt,
            'gen_component' => $gen_component
        ];

        $uid = $this->Q_Engine->tc_new('tc_template',$data,'tct-');
        
        if(isset($_POST['component_t2crtb']) && is_array($_POST['component_t2crtb'])){
            $this->Q_Engine->tcrtb_del('tc_rtb_t2c', $uid, 't_uid');
            foreach($_POST['component_t2crtb'] as $c_uid){
                $datat2c = [
                    't_uid' => $uid,
                    'c_uid' => $c_uid
                ];
                $this->Q_Engine->tc_new('tc_rtb_t2c',$datat2c,'tct2c-');    
            }
        }else{
            $this->Q_Engine->tcrtb_del('tc_rtb_t2c', $uid, 't_uid');
        }
        redirect(base_url().'main/template_config/template');
    }
    public function u_template()
    {
        $uid = $_POST['uid'];
        $name = $_POST['name'];
        $component_t2crtb = (isset($_POST['component_t2crtb']))?1:0;
        $gen_opt = $_POST['gen_opt'];
        $gen_component = $_POST['gen_component'];

        $data = [
            'name' => $name,
            'component_t2crtb' => $component_t2crtb,
            'gen_opt' => $gen_opt,
            'gen_component' => $gen_component
        ];

        $this->Q_Engine->tc_updt('tc_template',$data, $uid);
        
        if(isset($_POST['component_t2crtb']) && is_array($_POST['component_t2crtb'])){
            $this->Q_Engine->tcrtb_del('tc_rtb_t2c', $uid, 't_uid');
            foreach($_POST['component_t2crtb'] as $c_uid){
                $datat2c = [
                    't_uid' => $uid,
                    'c_uid' => $c_uid
                ];
                $this->Q_Engine->tc_new('tc_rtb_t2c',$datat2c,'tct2c-');    
            }
        }else{
            $this->Q_Engine->tcrtb_del('tc_rtb_t2c', $uid, 't_uid');
        }
        redirect(base_url().'main/template_config/template');
    }
    public function d_template()
    {
        $uid = $_POST['uid'];   
        $this->Q_Engine->tc_del('tc_template', $uid);
        $this->Q_Engine->tcrtb_del('tc_rtb_t2c', $uid, 't_uid');
        redirect(base_url().'main/template_config/template');
    }
}
