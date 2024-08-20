<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Complaint extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	public function __construct() {
        parent::__construct();
	    ob_start();
		$this->load->database();
		error_reporting(0);
	
		date_default_timezone_set('Asia/Karachi');
		set_time_limit(0);
		ini_set("memory_limit","512M");
		///////////////////////////////////////////
		
		
	 }
	public function index(){
		$this->load->view('login');	
	}
	public function dashboard(){
		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('Complaint/dashboard');
		$this->load->view('footer');
		
	}
	
	public function home(){
	   
		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('body');
		$this->load->view('footer');
		
	///	$this->load->view('new_body');
	}
	public function general_setting(){
		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('Complaint/dashboard');
		$this->load->view('footer');
		
	}
	public function report(){
		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('Complaint/dashboard');
		$this->load->view('footer');
		
	}
	public function progress(){
		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('Complaint/progress');
		$this->load->view('footer');
		
	}
    public function resolved(){
		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('Complaint/resolved');
		$this->load->view('footer');
		
	}
	public function rejected(){
		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('Complaint/rejected');
		$this->load->view('footer');
		
	}
	// public function complaint(){
	// 	$this->load->view('header');
	// 	$this->load->view('Complaint/complaint');
	// 	$this->load->view('footer');
		
	// }
	public function tier_one()
	{
		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('Complaint/tier_one');
		$this->load->view('footer');
	}
	public function tier_two()
	{
		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('Complaint/tier_two');
		$this->load->view('footer');
	}
	public function tier_three()
	{
		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('Complaint/tier_three');
		$this->load->view('footer');
	}
	public function login(){
		$this->load->view('login');	
	}
	public function logout()
 {
	 $this->session->sess_destroy();
	 redirect(base_url());
	 
 }
	
	// public function add_complaint(){
	// 	$this->load->view('header');
	// 	$this->load->view('Complaint/add_complaint');
	// 	$this->load->view('footer');
		
	// }
	public function complaint_insert()
	{
		extract($_POST);
	

	$ss=$this->session->userdata('userid');
	$done=$this->db->query("insert into gre_applicant set applicant_name='$applicant_name',applicant_address='$applicant_address',applicant_mobile='$applicant_mobile',applicant_cnic='$applicant_cnic'");	
	$id = $this->db->insert_id();
	$done1=$this->db->query("insert into gre_complaint_detail set applicant_id=$id,complaint_date='$complaint_date',complaint_category_id=$cc_id,source_id=$source_id,sub_project_id=$subproject_id,complaint_title='$complaint_title',complaint_detail='$complaint_detail',uc_id='$uc_id',nc_id='$nc_id',zone_id='$zone_id',tier_id=4,status_id=1,user_id=$ss");
	$id = $this->db->insert_id();
////////////////////////////////////////////////////////////////////
$count = count($_FILES['files']['name']);
		
			
		
			  for($i=0;$i<$count;$i++){
		
			
		
				if(!empty($_FILES['files']['name'][$i])){
		
			
		
				  $_FILES['file']['name'] = $_FILES['files']['name'][$i];
		
				  $_FILES['file']['type'] = $_FILES['files']['type'][$i];
		
				  $_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][$i];
		
				  $_FILES['file']['error'] = $_FILES['files']['error'][$i];
		
				  $_FILES['file']['size'] = $_FILES['files']['size'][$i];
		
		  
		
				  $config['upload_path'] = 'img/'; 
		
				  $config['allowed_types'] = 'jpg|jpeg|png|gif';
		
				  $config['max_size'] = '5000';
		
				  $config['file_name'] = $_FILES['files']['name'][$i];
		
		   
		
				  $this->load->library('upload',$config); 
		
			
		
				  if($this->upload->do_upload('file')){
		
					$uploadData = $this->upload->data();
		
					$insert_image = $uploadData['file_name'];
		
					$donee="insert into complaint_file set complaint_id=$id,file='$insert_image'";
					 $done=$this->db->query($donee);

		
		
				  }
		
				}
		
		   
		
			  }
			  /////////////////////////
			  $subProjectss=$this->db->query("select c.city_name from ppms_subproject as pp,city as c where pp.city_id=c.city_id and pp.subproject_id=$subproject_id")->row();
			   $subProjectss->city_name;
			  //echo "<br>";
			    $fstchar = substr($subProjectss->city_name, 0, 1);
			   //substr($subProjectss->city_name, 1);
			   //echo "<br>";
			   $id1=$fstchar."-".$id;
			  // echo "<br>";
///exit;
//////////////////////sms send///////////////////////////////
$mobileNumber = $applicant_mobile;

// Remove leading zeros
$mobileNumber = ltrim($mobileNumber, '0');

// Output the modified mobile number
 $mobileNumber1="92".$mobileNumber;
//echo 92.$mobileNumber;
				$management_mobile_numbers = "";

				$date = date('m/d/Y h:i:s a', time());
				$complaint_user_msg = "Dear ".$applicant_name." Your Complaint has Been Registered Your Complaint No ".$id1;
				//echo $date;exit;
				/*$number_list = '3335965225,3005888936,3005888936,3313536909,3335200071,3005859786,3005930021,3369222280,3429780078,3049002589,3355531565,3339267672,3329230940,3339266708,3009393343,3448960628,
						3456897453,3005915005,3005967076,3155068666,3471195505,3459373729,3453992590,3349074118,3339116396,3009016466,3455255310,3335012044,3339671723,3459060134,3149774287,3219337133,
						3345424030,3005963868,3349133760,3459193545,3456012210,3449859833,3339701670,3139209052,3035252162,3339293263,3152244336,3479595954,3325897557,3135660004,3459582423,3005879479,
						3073983023,938221205,3005914682,3459357779,3009801249,3345783237,3345120567,3339656166,3469402575,3339316062,3160190451,03318221355,034585816293459023880,3219054021,3469333775,
						3339130956,3119490820,3059121833,3459164665';*/
						
				//echo $number_list = $mobileNumber1;	


				ini_set("soap.wsdl_cache_enabled", 0);
				$url         = 'http://cbs.zong.com.pk/ReachCWSv2/CorporateSmsV2.svc?wsdl';
				$client     = new SoapClient($url, array("trace" => 1, "exception" => 0)); 
				 
				$resultBulkSMS = $client->BulkSmsv2(
								array('objBulkSms' => 
												array(	'LoginId'=>  '923159749585', //here type your account name
														'LoginPassword'=>'Hen@9598', //here type your password
														'Mask'=>'KPCIP', //here set allowed mask against your account or you will get invalid mask
														'Message'=> $complaint_user_msg,
														'UniCode'=>'0',
														'CampaignName'=>uniqid(), // Any random name or type uniqid() to generate random number, you can also specify campaign name here if want to send no to any existing campaign, numberCSV parameter will be ignored
														'CampaignDate'=> $date, // data from where sms will start sending, if not sure type current date in m/d/y hh:mm:ss tt format.
														'ShortCodePrefered'=>'n',
														'NumberCsv'=>'923369205958,'.$mobileNumber1.''
													)));
				//echo "<pre>";
				//echo "<br>REQUEST:\n" . htmlentities($client->__getLastRequest()) . "\n"; 
			//	print_r($resultBulkSMS);
			
			//exit;
		
	
	
	
//////////////////////////////////////////////////////////////////////////
	$this->session->set_flashdata('msg','<i>'.'Record Saved Successfully!!'.'</i>');
	redirect(base_url('Complaint/verification_status',$data));
	}
	
	/////////////////////////////////
	
	
	
	
	/////////////////////////////////
	
	public function edit_complaint($id)
	{
		extract($_POST);
        $this->load->view('header');
        $this->load->view('sidebar');
		$data["aid"]=$id;
		$this->load->view('Complaint/edit_complaint',$data);
		$this->load->view('footer');
	}

	public function complaint_update()
	{
		extract($_POST);
	$this->load->library('upload');
	$config['upload_path'] = 'media/books/';
	$config['file_name'] = $_FILES["img"]['name'];
	$file_picture = $config['upload_path'] . $config['file_name'];
	$config['overwrite'] = TRUE;
	$config['allowed_types'] = 'jpg|png|jpeg';
	$this->upload->initialize($config);
	$data_upload = $this->upload->data();
	
	$done=$this->db->query("update gre_applicant set applicant_name='$applicant_name', applicant_address='$applicant_address',applicant_mobile='$applicant_mobile',applicant_cnic='$applicant_cnic' where applicant_id=$applicant_id");	
    
	$done1=$this->db->query("update gre_complaint_detail set applicant_id=$applicant_id, complaint_date='$complaint_date',complaint_category_id=$cc_id,source_id=$source_id,sub_project_id=$subproject_id,zone_id=$zone_id,uc_id=$uc_id,nc_id=$nc_id,complaint_detail='$complaint_detail',complaint_title='$complaint_title',file='$file_picture' where complaint_detail_id=$complaint_detail_id");
	$this->session->set_flashdata('msg','<i>'.'Record Saved Successfully!!'.'</i>');
	redirect(base_url('Complaint/home',$data));
	}
 public function view_complaint_category()
	{
		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('Complaint/view_complaint_category');
		$this->load->view('footer');
	}
    public function view_tier()
	{
		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('Complaint/view_tier');
		$this->load->view('footer');
	}

    public function view_source()
	{
		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('Complaint/view_source');
		$this->load->view('footer');
	}
    public function view_status()
	{
		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('Complaint/view_status');
		$this->load->view('footer');
	}

    public function view_zone()
	{
		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('Complaint/view_zone');
		$this->load->view('footer');
	}
	public function view_uc()
	{
		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('Complaint/view_uc');
		$this->load->view('footer');
	}
	public function view_nc()
	{
		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('Complaint/view_nc');
		$this->load->view('footer');
	}
	public function edit_zone($id)
	{
		extract($_POST);
        $this->load->view('header');
        $this->load->view('sidebar');
		$data["aid"]=$id;
		$this->load->view('Complaint/edit_zone',$data);
		$this->load->view('footer');
	}
	public function edit_tier($id)
	{
		extract($_POST);
        $this->load->view('header');
        $this->load->view('sidebar');
		$data["aid"]=$id;
		$this->load->view('Complaint/edit_tier',$data);
		$this->load->view('footer');
	}
	public function edit_status($id)
	{
		extract($_POST);
        $this->load->view('header');
        $this->load->view('sidebar');
		$data["aid"]=$id;
		$this->load->view('Complaint/edit_status',$data);
		$this->load->view('footer');
	}
	public function edit_cc($id)
	{
		extract($_POST);
        $this->load->view('header');
        $this->load->view('sidebar');
		$data["aid"]=$id;
		$this->load->view('Complaint/edit_complaint_category',$data);
		$this->load->view('footer');
	}
	public function edit_uc($id)
	{
		extract($_POST);
        $this->load->view('header');
        $this->load->view('sidebar');
		$data["aid"]=$id;
		$this->load->view('Complaint/edit_uc',$data);
		$this->load->view('footer');
	}
	public function edit_nc($id)
	{
		extract($_POST);
        $this->load->view('header');
        $this->load->view('sidebar');
		$data["aid"]=$id;
		$this->load->view('Complaint/edit_nc',$data);
		$this->load->view('footer');
	}
	public function edit_source($id)
	{
		extract($_POST);
        $this->load->view('header');
        $this->load->view('sidebar');
		$data["aid"]=$id;
		$this->load->view('Complaint/edit_source',$data);
		$this->load->view('footer');
	}
	public function insert_uc()
	{
		extract($_POST);
	$done=$this->db->query("insert into grm_uc_tbl set uc_name='$uc_name',zone_id=$zone_id,city_id=$city_id");
	$this->session->set_flashdata('msg','<i>'.'Record Saved Successfully!!'.'</i>');
	redirect(base_url('Complaint/view_uc',$data));
	}
	public function insert_nc()
	{
		extract($_POST);
	$done=$this->db->query("insert into grm_nc_tbl set nc_name='$nc_name',uc_id=$uc_id,area='$area',zone_id=$zone_id,city_id=$city_id");
	$this->session->set_flashdata('msg','<i>'.'Record Saved Successfully!!'.'</i>');
	redirect(base_url('Complaint/view_nc',$data));
	}
	public function update_uc()
	{
		extract($_POST);
	$done=$this->db->query("update grm_uc_tbl set uc_name='$uc_name',zone_id=$zone_id,city_id=$city_id where uc_id=$uc_id");
	$this->session->set_flashdata('msg','<i>'.'Record Saved Successfully!!'.'</i>');
	redirect(base_url('Complaint/view_uc',$data));
	}
	public function update_nc()
	{
		extract($_POST);
	$done=$this->db->query("update grm_nc_tbl set nc_name='$nc_name',uc_id=$uc_id,area='$area',zone_id=$zone_id,city_id=$city_id where nc_id=$nc_id");
	$this->session->set_flashdata('msg','<i>'.'Record Saved Successfully!!'.'</i>');
	redirect(base_url('Complaint/view_nc',$data));
	}
	public function applicant_detail($id)
	{
		extract($_POST);
        $this->load->view('header');
        $this->load->view('sidebar');
		$data["aid"]=$id;
		$this->load->view('Complaint/applicant_detail',$data);
		$this->load->view('footer');
	}
	public function complaint_detail($id)
	{
		extract($_POST);
        $this->load->view('header');
        $this->load->view('sidebar');
		$data["aid"]=$id;
		$this->load->view('Complaint/complaint_detail',$data);
		$this->load->view('footer');
	}
	public function complaint_timeline($id)
	{
		extract($_POST);
        $this->load->view('header');
        $this->load->view('sidebar');
		$data["aid"]=$id;
		$this->load->view('Complaint/complaint_timeline',$data);
		$this->load->view('footer');
	}
	public function complaint_tierwise($id)
	{
		extract($_POST);
        $this->load->view('header');
        $this->load->view('sidebar');
		$data["aid"]=$id;
		$this->load->view('Complaint/complaint_tierwise',$data);
		$this->load->view('footer');
	}
   
	public function first_tier($id)
	{
		extract($_POST);
        $this->load->view('header');
        $this->load->view('sidebar');
		$data["aid"]=$id;
		$this->load->view('Complaint/first_tier',$data);
		$this->load->view('footer');
	}
	public function second_tier($id)
	{
		extract($_POST);
        $this->load->view('header');
        $this->load->view('sidebar');
		$data["aid"]=$id;
		$this->load->view('Complaint/second_tier',$data);
		$this->load->view('footer');
	}
	public function third_tier($id)
	{
		extract($_POST);
        $this->load->view('header');
        $this->load->view('sidebar');
		$data["aid"]=$id;
		$this->load->view('Complaint/third_tier',$data);
		$this->load->view('footer');
	}
    public function up_status($id)
	{
	extract($_POST);
	$this->load->library('upload');
	$config['upload_path'] = 'img/';
	$config['file_name'] = $_FILES["image"]['name'];
	$document_new = $config['upload_path'] . $config['file_name'];
	$config['overwrite'] = TRUE;
	$config['allowed_types'] = 'jpg|png|jpeg';
	$this->upload->initialize($config);
	$data_upload = $this->upload->data();

	$data["aid"]=$id; 
     $done=$this->db->query("update gre_complaint_detail set status_id=2,remarks='$remarks',
     	image='$document_new' where complaint_detail_id=$id");
     redirect(base_url('Complaint/applicant_detail/'.$id));
}
public function cancel($id)
	{
	extract($_POST);
	$data["aid"]=$id; 
     $done=$this->db->query("update gre_complaint_detail set status_id=3,remarks='$remarks'
      where complaint_detail_id=$id");
     redirect(base_url('Complaint/applicant_detail/'.$id));
}
public function updt_tier($id)
	{
	extract($_POST);
	$data["aid"]=$id; 
     $done=$this->db->query("update gre_complaint_detail set tier_id=1 
      where complaint_detail_id=$id");
     redirect(base_url('Complaint/verification_status'));
}
public function updt_status($id)
	{
	extract($_POST);
	$data["aid"]=$id; 
     $done=$this->db->query("update gre_complaint_detail set status_id=2 
      where complaint_detail_id=$id");
     redirect(base_url('Complaint/verification_status'));
}
public function cancel_s($id)
	{
	extract($_POST);
	$data["aid"]=$id; 
     $done=$this->db->query("update gre_complaint_detail set status_id=3 AND 
      where complaint_detail_id=$id");
     redirect(base_url('Complaint/verification_status'));
}
public function user_management(){
		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('user_management');
		$this->load->view('footer');
	}
	public function insert_user()
	{
		extract($_POST);
	
	$done1=$this->db->query("insert into user set name='$f_name',user_password='$passwords',
    user_name='$email',city_id=$city_id,organization_id=$organization_id,zone_id=$zone_id,uc_id=$uc_id,nc_id=$nc_id,tier_id=$tier_id,group_id=$group_id");
    $this->session->set_flashdata('msg','<i>'.'Record Saved Successfully!!'.'</i>');
    redirect(base_url('Complaint/user_management',$data));	
}
public function edit_user($id)
	{
		extract($_POST);
        $this->load->view('header');
        $this->load->view('sidebar');
		$data["aid"]=$id;
		$this->load->view('Complaint/edit_user',$data);
		$this->load->view('footer');
	}
	public function update_user()
	{
		extract($_POST);
		
	$done=$this->db->query("update user set name='$f_name',user_name='$email',user_password='$passwords',city_id=$city_id,organization_id=$organization_id,zone_id=$zone_id,uc_id=$uc_id,nc_id=$nc_id,tier_id=$tier_id,group_id=$group_id where user_id=$user_id");
	$this->session->set_flashdata('msg','<i>'.'Record Saved Successfully!!'.'</i>');
	redirect(base_url('Complaint/user_management',$data));
	}
	public function delete_user($user_id){
		$done=$this->db->query("DELETE FROM user where user_id=$user_id");
		$this->session->set_flashdata('msgr','<i>'.'Record Deleted Successfully!!'.'</i>');
	         redirect(base_url('Complaint/user_management',$data));

}
public function page()
	{
		extract($_POST);
        
		$this->load->view('page');
		
	}
	public function verification_status(){
		extract($_POST);
		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('Complaint/verification_status');
		$this->load->view('footer');
	}
	 public function assign_complaint($id)
	{
		extract($_POST);
        $this->load->view('header');
        $this->load->view('sidebar');
		$data["aid"]=$id;
		$this->load->view('Complaint/first_tier',$data);
		$this->load->view('footer');
	}
	public function insert_assign($id)
	{
		extract($_POST);
		$data["aid"]=$id;
	$done1=$this->db->query("insert into assign_tier set tier_id=$tier_id,user_id=$user_id");
	$done2=$this->db->query("update gre_complaint_detail set tier_id=$tier_id,user_id=$user_id where complaint_detail_id=$complaint_detail_id");
	$this->session->set_flashdata('msg','<i>'.'Tier Assigned Successfully!!'.'</i>');
    redirect(base_url('Complaint/assign_complaint/'.$id));	
}
}