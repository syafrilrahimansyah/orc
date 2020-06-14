<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('lookup_data'))
{
    function lookup_data()
    {
        $CI =& get_instance();
        return $CI->db->get('tc_lookup')->result_array();
    }
}
if (!function_exists('template_data'))
{
    function template_data()
    {
        $CI =& get_instance();
        return $CI->db->get('tc_template')->result_array();
    }
}
if (!function_exists('count_component'))
{
    function count_component($uid)
    {
        $CI =& get_instance();
        return $CI->db->get_where('tc_rtb_t2c',['t_uid'=>$uid])->num_rows();
    }
}
if (!function_exists('component_data'))
{
    function component_data()
    {
        $CI =& get_instance();
        return $CI->db->get('tc_fgroup')->result_array();
    }
}