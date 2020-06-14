<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Q_Engine extends CI_Model {

	public function tc_new($tbl, $data, $pref)
	{
        $uid = uniqid($pref);
        $this->db->insert($tbl, ['uid'=>$uid]);
        while($this->db->affected_rows()<0){
            $uid = uniqid($pref);
            $this->db->insert($tbl, $uid);
        }
        $this->db->set($data);
        $this->db->where('uid', $uid);
        $this->db->update($tbl);

        return $uid;
    }
    public function tc_updt($tbl, $data, $uid)
    {
        $this->db->set($data);
        $this->db->where('uid', $uid);
        $this->db->update($tbl);
    }
    public function tc_del($tbl, $uid)
    {
        $this->db->where('uid', $uid);
        $this->db->delete($tbl);
    }
    public function tcrtb_del($tbl, $rtuid, $rtcol)
    {
        $this->db->where($rtcol, $rtuid);
        $this->db->delete($tbl);
    }
    public function offer_new($of_uid, $name, $value)
	{
        $uid = uniqid('ofrow-');
        $this->db->insert('offer_data', ['uid'=>$uid]);
        while($this->db->affected_rows()<0){
            $uid = uniqid($pref);
            $this->db->insert($tbl, $uid);
        }
        $this->db->set('of_uid',$of_uid);
        $this->db->set('name',$name);
        $this->db->set('value',$value);
        $this->db->where('uid', $uid);
        $this->db->update('offer_data');

        return $uid;
    } 
}
