<?php
class Welcome_model extends CI_Model{

    public function __construct(){
        parent:: __construct();
    }





public function auth_check($data)
    {
        $query = $this->db->get_where('user', $data);
		///$query = $this->db->get_where('subscribers_tbl',array('status'=> active','email' => 'info@arjun.net.in'));
		///echo $this->db->last_query();
		 ////exit;
        if($query){   
         return $query->row();
		 
        }
        return false;
    }
	public function count_all_inprogress() {
  $this->db->select('COUNT(*) as total_rows');
  $this->db->from('gre_applicant as ga');
  $this->db->join('gre_complaint_detail as gcd', 'ga.applicant_id = gcd.applicant_id');
  $this->db->join('grm_complaint_category as gcc', 'gcc.cc_id = gcd.complaint_category_id');
  $this->db->join('grm_source_tbl as s', 's.source_id = gcd.source_id');
  $this->db->join('ppms_subproject as ps', 'ps.subproject_id = gcd.sub_project_id');
  $this->db->join('grm_tier_tbl as t', 't.tier_id = gcd.tier_id');
  $this->db->join('grc_status_tbl as gs', 'gs.status_id = gcd.status_id');
  $this->db->join('grc_zone_tbl as gzt', 'gcd.zone_id = gzt.zone_id');
  $this->db->join('grm_uc_tbl as gut', 'gcd.uc_id = gut.uc_id');
  $this->db->join('grm_nc_tbl as gnt', 'gcd.nc_id = gnt.nc_id');
  $this->db->join('user as u', 'gcd.user_id = u.user_id');
  $this->db->join('city as c', 'u.city_id = c.city_id');
  if($this->session->userdata('groupid')!=1){
    $this->db->where('u.city_id', $this->session->userdata('cityid'));
  }
  $this->db->where('gcd.status_id', 1);
  $this->db->order_by('gcd.complaint_detail_id', 'DESC');
  $query = $this->db->get();
  $result = $query->row();
  return $result->total_rows;
}

	
	 function Totallist_inprogress($limit,$offset){
	 	$this->db->select('*');
  $this->db->from('gre_applicant as ga');
  $this->db->join('gre_complaint_detail as gcd', 'ga.applicant_id = gcd.applicant_id');
  $this->db->join('grm_complaint_category as gcc', 'gcc.cc_id = gcd.complaint_category_id');
  $this->db->join('grm_source_tbl as s', 's.source_id = gcd.source_id');
  $this->db->join('ppms_subproject as ps', 'ps.subproject_id = gcd.sub_project_id');
  $this->db->join('grm_tier_tbl as t', 't.tier_id = gcd.tier_id');
  $this->db->join('grc_status_tbl as gs', 'gs.status_id = gcd.status_id');
  $this->db->join('grc_zone_tbl as gzt', 'gcd.zone_id = gzt.zone_id');
  $this->db->join('grm_uc_tbl as gut', 'gcd.uc_id = gut.uc_id');
  $this->db->join('grm_nc_tbl as gnt', 'gcd.nc_id = gnt.nc_id');
  $this->db->join('user as u', 'gcd.user_id = u.user_id');
  $this->db->join('city as c', 'u.city_id = c.city_id');
  if($this->session->userdata('groupid')!=1){
    $this->db->where('u.city_id', $this->session->userdata('cityid'));
  }
  $this->db->where('gcd.status_id', 1);
  $this->db->order_by('gcd.complaint_detail_id', 'DESC');
  $this->db->limit($limit, $offset);
  $query = $this->db->get();
  return $query->result();
	 }
	 public function count_all_resolved() {
  $this->db->select('COUNT(*) as total_rows');
  $this->db->from('gre_applicant as ga');
  $this->db->join('gre_complaint_detail as gcd', 'ga.applicant_id = gcd.applicant_id');
  $this->db->join('grm_complaint_category as gcc', 'gcc.cc_id = gcd.complaint_category_id');
  $this->db->join('grm_source_tbl as s', 's.source_id = gcd.source_id');
  $this->db->join('ppms_subproject as ps', 'ps.subproject_id = gcd.sub_project_id');
  $this->db->join('grm_tier_tbl as t', 't.tier_id = gcd.tier_id');
  $this->db->join('grc_status_tbl as gs', 'gs.status_id = gcd.status_id');
  $this->db->join('grc_zone_tbl as gzt', 'gcd.zone_id = gzt.zone_id');
  $this->db->join('grm_uc_tbl as gut', 'gcd.uc_id = gut.uc_id');
  $this->db->join('grm_nc_tbl as gnt', 'gcd.nc_id = gnt.nc_id');
  $this->db->join('user as u', 'gcd.user_id = u.user_id');
  $this->db->join('city as c', 'u.city_id = c.city_id');
  if($this->session->userdata('groupid')!=1){
    $this->db->where('u.city_id', $this->session->userdata('cityid'));
  }
  $this->db->where('gcd.status_id', 2);
  $this->db->order_by('gcd.complaint_detail_id', 'DESC');
  $query = $this->db->get();
  $result = $query->row();
  return $result->total_rows;
}

	
	 function Totallist_resolved($limit,$offset){
	 	$this->db->select('*');
  $this->db->from('gre_applicant as ga');
  $this->db->join('gre_complaint_detail as gcd', 'ga.applicant_id = gcd.applicant_id');
  $this->db->join('grm_complaint_category as gcc', 'gcc.cc_id = gcd.complaint_category_id');
  $this->db->join('grm_source_tbl as s', 's.source_id = gcd.source_id');
  $this->db->join('ppms_subproject as ps', 'ps.subproject_id = gcd.sub_project_id');
  $this->db->join('grm_tier_tbl as t', 't.tier_id = gcd.tier_id');
  $this->db->join('grc_status_tbl as gs', 'gs.status_id = gcd.status_id');
  $this->db->join('grc_zone_tbl as gzt', 'gcd.zone_id = gzt.zone_id');
  $this->db->join('grm_uc_tbl as gut', 'gcd.uc_id = gut.uc_id');
  $this->db->join('grm_nc_tbl as gnt', 'gcd.nc_id = gnt.nc_id');
  $this->db->join('user as u', 'gcd.user_id = u.user_id');
  $this->db->join('city as c', 'u.city_id = c.city_id');
  if($this->session->userdata('groupid')!=1){
    $this->db->where('u.city_id', $this->session->userdata('cityid'));
  }
  $this->db->where('gcd.status_id', 2);
  $this->db->order_by('gcd.complaint_detail_id', 'DESC');
  $this->db->limit($limit, $offset);
  $query = $this->db->get();
  return $query->result();
	 }
	 public function count_all_rejected() {
  $this->db->select('COUNT(*) as total_rows');
  $this->db->from('gre_applicant as ga');
  $this->db->join('gre_complaint_detail as gcd', 'ga.applicant_id = gcd.applicant_id');
  $this->db->join('grm_complaint_category as gcc', 'gcc.cc_id = gcd.complaint_category_id');
  $this->db->join('grm_source_tbl as s', 's.source_id = gcd.source_id');
  $this->db->join('ppms_subproject as ps', 'ps.subproject_id = gcd.sub_project_id');
  $this->db->join('grm_tier_tbl as t', 't.tier_id = gcd.tier_id');
  $this->db->join('grc_status_tbl as gs', 'gs.status_id = gcd.status_id');
  $this->db->join('grc_zone_tbl as gzt', 'gcd.zone_id = gzt.zone_id');
  $this->db->join('grm_uc_tbl as gut', 'gcd.uc_id = gut.uc_id');
  $this->db->join('grm_nc_tbl as gnt', 'gcd.nc_id = gnt.nc_id');
  $this->db->join('user as u', 'gcd.user_id = u.user_id');
  $this->db->join('city as c', 'u.city_id = c.city_id');
  if($this->session->userdata('groupid')!=1){
    $this->db->where('u.city_id', $this->session->userdata('cityid'));
  }
  $this->db->where('gcd.status_id', 3);
  $this->db->order_by('gcd.complaint_detail_id', 'DESC');
  $query = $this->db->get();
  $result = $query->row();
  return $result->total_rows;
}

	
	 function Totallist_rejected($limit,$offset){
	 	$this->db->select('*');
  $this->db->from('gre_applicant as ga');
  $this->db->join('gre_complaint_detail as gcd', 'ga.applicant_id = gcd.applicant_id');
  $this->db->join('grm_complaint_category as gcc', 'gcc.cc_id = gcd.complaint_category_id');
  $this->db->join('grm_source_tbl as s', 's.source_id = gcd.source_id');
  $this->db->join('ppms_subproject as ps', 'ps.subproject_id = gcd.sub_project_id');
  $this->db->join('grm_tier_tbl as t', 't.tier_id = gcd.tier_id');
  $this->db->join('grc_status_tbl as gs', 'gs.status_id = gcd.status_id');
  $this->db->join('grc_zone_tbl as gzt', 'gcd.zone_id = gzt.zone_id');
  $this->db->join('grm_uc_tbl as gut', 'gcd.uc_id = gut.uc_id');
  $this->db->join('grm_nc_tbl as gnt', 'gcd.nc_id = gnt.nc_id');
  $this->db->join('user as u', 'gcd.user_id = u.user_id');
  $this->db->join('city as c', 'u.city_id = c.city_id');
  if($this->session->userdata('groupid')!=1){
    $this->db->where('u.city_id', $this->session->userdata('cityid'));
  }
  $this->db->where('gcd.status_id', 3);
  $this->db->order_by('gcd.complaint_detail_id', 'DESC');
  $this->db->limit($limit, $offset);
  $query = $this->db->get();
  return $query->result();
	 }
	 public function count_all_escalated() {
  $this->db->select('COUNT(*) as total_rows');
  $this->db->from('gre_applicant as ga');
  $this->db->join('gre_complaint_detail as gcd', 'ga.applicant_id = gcd.applicant_id');
  $this->db->join('grm_complaint_category as gcc', 'gcc.cc_id = gcd.complaint_category_id');
  $this->db->join('grm_source_tbl as s', 's.source_id = gcd.source_id');
  $this->db->join('ppms_subproject as ps', 'ps.subproject_id = gcd.sub_project_id');
  $this->db->join('grm_tier_tbl as t', 't.tier_id = gcd.tier_id');
  $this->db->join('grc_status_tbl as gs', 'gs.status_id = gcd.status_id');
  $this->db->join('grc_zone_tbl as gzt', 'gcd.zone_id = gzt.zone_id');
  $this->db->join('grm_uc_tbl as gut', 'gcd.uc_id = gut.uc_id');
  $this->db->join('grm_nc_tbl as gnt', 'gcd.nc_id = gnt.nc_id');
  $this->db->join('user as u', 'gcd.user_id = u.user_id');
  $this->db->join('city as c', 'u.city_id = c.city_id');
  if($this->session->userdata('groupid')!=1){
    $this->db->where('u.city_id', $this->session->userdata('cityid'));
  }
  $this->db->where('gcd.status_id', 4);
  $this->db->order_by('gcd.complaint_detail_id', 'DESC');
  $query = $this->db->get();
  $result = $query->row();
  return $result->total_rows;
}

	
	 function Totallist_escalated($limit,$offset){
	 	$this->db->select('*');
  $this->db->from('gre_applicant as ga');
  $this->db->join('gre_complaint_detail as gcd', 'ga.applicant_id = gcd.applicant_id');
  $this->db->join('grm_complaint_category as gcc', 'gcc.cc_id = gcd.complaint_category_id');
  $this->db->join('grm_source_tbl as s', 's.source_id = gcd.source_id');
  $this->db->join('ppms_subproject as ps', 'ps.subproject_id = gcd.sub_project_id');
  $this->db->join('grm_tier_tbl as t', 't.tier_id = gcd.tier_id');
  $this->db->join('grc_status_tbl as gs', 'gs.status_id = gcd.status_id');
  $this->db->join('grc_zone_tbl as gzt', 'gcd.zone_id = gzt.zone_id');
  $this->db->join('grm_uc_tbl as gut', 'gcd.uc_id = gut.uc_id');
  $this->db->join('grm_nc_tbl as gnt', 'gcd.nc_id = gnt.nc_id');
  $this->db->join('user as u', 'gcd.user_id = u.user_id');
  $this->db->join('city as c', 'u.city_id = c.city_id');
  if($this->session->userdata('groupid')!=1){
    $this->db->where('u.city_id', $this->session->userdata('cityid'));
  }
  $this->db->where('gcd.status_id', 4);
  $this->db->order_by('gcd.complaint_detail_id', 'DESC');
  $this->db->limit($limit, $offset);
  $query = $this->db->get();
  return $query->result();
	 }
public function count_all_total() {
  $city = $this->session->userdata('cityid');

$group = $this->session->userdata('groupid');
       $this->db->select('COUNT(*) as total_rows');
  $this->db->from('gre_applicant as ga');
  $this->db->join('gre_complaint_detail as gcd', 'ga.applicant_id = gcd.applicant_id');
  $this->db->join('grm_complaint_category as gcc', 'gcc.cc_id = gcd.complaint_category_id');
  $this->db->join('grm_source_tbl as s', 's.source_id = gcd.source_id');
  $this->db->join('ppms_subproject as ps', 'ps.subproject_id = gcd.sub_project_id');
  $this->db->join('grm_tier_tbl as t', 't.tier_id = gcd.tier_id');
  $this->db->join('grc_status_tbl as gs', 'gs.status_id = gcd.status_id');
  $this->db->join('grc_zone_tbl as gzt', 'gcd.zone_id = gzt.zone_id');
  $this->db->join('grm_uc_tbl as gut', 'gcd.uc_id = gut.uc_id');
  $this->db->join('grm_nc_tbl as gnt', 'gcd.nc_id = gnt.nc_id');
  $this->db->join('user as u', 'gcd.user_id = u.user_id');
  $this->db->join('city as c', 'u.city_id = c.city_id');
  if($this->session->userdata('groupid')!=1){
    $this->db->where('u.city_id', $this->session->userdata('cityid'));
  }
  $this->db->order_by('gcd.complaint_detail_id', 'DESC');
  $query = $this->db->get();
  $result = $query->row();
  return $result->total_rows;
  
}

  
   function Totallist_total($limit,$offset){
    $city = $this->session->userdata('cityid');

$group = $this->session->userdata('groupid');
  
    $this->db->select('*');
  $this->db->from('gre_applicant as ga');
  $this->db->join('gre_complaint_detail as gcd', 'ga.applicant_id = gcd.applicant_id');
  $this->db->join('grm_complaint_category as gcc', 'gcc.cc_id = gcd.complaint_category_id');
  $this->db->join('grm_source_tbl as s', 's.source_id = gcd.source_id');
  $this->db->join('ppms_subproject as ps', 'ps.subproject_id = gcd.sub_project_id');
  $this->db->join('grm_tier_tbl as t', 't.tier_id = gcd.tier_id');
  $this->db->join('grc_status_tbl as gs', 'gs.status_id = gcd.status_id');
  $this->db->join('grc_zone_tbl as gzt', 'gcd.zone_id = gzt.zone_id');
  $this->db->join('grm_uc_tbl as gut', 'gcd.uc_id = gut.uc_id');
  $this->db->join('grm_nc_tbl as gnt', 'gcd.nc_id = gnt.nc_id');
  $this->db->join('user as u', 'gcd.user_id = u.user_id');
  $this->db->join('city as c', 'u.city_id = c.city_id');
  if($this->session->userdata('groupid')!=1){
    $this->db->where('u.city_id', $this->session->userdata('cityid'));
  }
  $this->db->order_by('gcd.complaint_detail_id', 'DESC');
  $this->db->limit($limit, $offset);
  $query = $this->db->get();
  return $query->result();
}
	function create_record($form_data,$tble)
	{
		$this->db->insert($tble, $form_data);
		
		
		if ($this->db->affected_rows() == '1')
		{
			return TRUE;
		}
		
		return FALSE;
	}
	function edit_record($form_data,$tbl,$field,$id) {
        $this->db->where($field, $id);
		$i = $this->db->update($tbl,$form_data); 	  
		return $i;
	}

   function get_allJsonData()
{
    $arr = array();
    $this->db->from('size');
    $this->db->order_by("size_id", "asc");
    $query = $this->db->get();
    foreach($query->result_object() as $rows )
    {
        $arr[] = $rows;
    }
    return "{\"data\":" .json_encode($arr). "}";
}
///////////////////////////////reporting/////////////////


function display($table,$where = NULL)
	{
		if($where ){
		$this->db->where($where);
		}
		$query = $this->db->get($table);
		
	//echo $this->db->last_query();
	return $query->result();
	}


   function update_about($form_data) {
        ///$this->db->where('web_about_id',$id);
		$i = $this->db->update('web_about_us', $form_data); 	  
		return $i;
	}
	
function update_record($form_data,$tableName) {
        ///$this->db->where('web_about_id',$id);
		$i = $this->db->update($tableName, $form_data); 	  
		return $i;
	}



}
	
	
	

	?>