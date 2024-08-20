<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

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
	public function index(){
		
		$this->load->view('login');
		
	}
	
	
	
	public function get_zone($projectID=NULL) { 
extract($_POST);

 $result = $this->db->where("subproject_id",$projectID)->get("grc_zone_tbl")->result();
       echo "<option value=''>Select Zone</option>";
       foreach($result as $result){
           
         echo "<option value='".$result->zone_id."'>".$result->zone_name."</option><br>";  
           
           
           
       }

       //echo json_encode($result);
       
       
       
       
       
       

   }
	
	public function get_uc($id) { 
extract($_POST);

       /*$result = $this->db->where("zone_id",$id)->get("grm_uc_tbl")->result();

       echo json_encode($result);*/
       
       
       $result = $this->db->where("zone_id",$zone_id)->get("grm_uc_tbl")->result();
       echo "<option value=''>Select UC</option>";
       foreach($result as $result){
           
         echo "<option value='".$result->uc_id."'>".$result->uc_name."</option><br>";  
           
           
           
       }


   }
   
   public function new_body(){
		
		
		$this->load->view('new_body');
		
		
	}
   
   public function get_uc_new() { 
		extract($_POST);
		
		$nc_det = $this->db->query("select * from  grm_nc_tbl where nc_id=$id")->row();
		$uc_idddd=$nc_det->uc_id;
		
		 $result = $this->db->query("select * from  grm_uc_tbl where uc_id=$uc_idddd")->result();
			   echo "<option value=''>Select UC</option>";
			   foreach($result as $result){
				   
				 echo "<option value='".$result->uc_id."'>".$result->uc_name."</option><br>";  
				   
				   
				   
			   }
		
			   //echo json_encode($result);
			   
}
  public function get_uc_new2($id=NULL) { 
		extract($_POST);
		
		$nc_det = $this->db->query("select * from  grm_nc_tbl where nc_id=$id")->row();
		$uc_idddd=$nc_det->uc_id;
		
		 $result = $this->db->query("select * from  grm_uc_tbl where uc_id=$uc_idddd")->result();
			   echo "<option value=''>Select UC</option>";
			   foreach($result as $result){
				   
				 echo "<option value='".$result->uc_id."'>".$result->uc_name."</option><br>";  
				   
				   
				   
			   }
		
			   //echo json_encode($result);
	}

public function get_nc_new1($id=NULL) { 
		extract($_POST);
		

$result = $this->db->query("select * from  grm_nc_tbl where city_id=$id")->result();
			   echo "<option value=''>Select NC</option>";
			   foreach($result as $result){
				   
				 echo "<option value='".$result->nc_id."'>".$result->nc_name."</option><br>";  
				   
				   
				   
			   }
		
			   //echo json_encode($result);
			   
}	 
	public function get_zone_new() { 
		extract($_POST);
		
$nc_det = $this->db->query("select * from  grm_uc_tbl where uc_id=$id")->row();
		$zone_idddd=$nc_det->zone_id;
		
		 $result = $this->db->query("select * from  grc_zone_tbl where zone_id=$zone_idddd")->result();
			   echo "<option value=''>Select Zone</option>";
			   foreach($result as $result){
				   
				 echo "<option value='".$result->zone_id."'>".$result->zone_name."</option><br>";  
				   
				   
				   
			   }
		
			   //echo json_encode($result);
			   
}	 

	/*	public function get_zone($id) { 
extract($_POST);

       $result = $this->db->where("city_id",$id)->get(" grc_zone_tbl")->result();

       echo json_encode($result);

   }
   */
	
		public function get_zone_new1($id=NULL) { 
		extract($_POST);
		

$result = $this->db->query("select * from  grc_zone_tbl where city_id=$id")->result();
			   echo "<option value=''>Select Zone</option>";
			   foreach($result as $result){
				   
				 echo "<option value='".$result->zone_id."'>".$result->zone_name."</option><br>";  
				   
				   
				   
			   }
		
			   //echo json_encode($result);
			   
}	 
	
		public function get_uc_new1($id=NULL) { 
		extract($_POST);
		

$result = $this->db->query("select * from  grm_uc_tbl where zone_id=$id")->result();
			   echo "<option value=''>Select UC</option>";
			   foreach($result as $result){
				   
				 echo "<option value='".$result->uc_id."'>".$result->uc_name."</option><br>";  
				   
				   
				   
			   }
		
			   //echo json_encode($result);
			   
}	 	   
   	public function get_nc($id) { 
extract($_POST);

       $result = $this->db->where("uc_id",$id)->get("grm_nc_tbl")->result();

       echo json_encode($result);

   }
	
	
	
	public function logout()
 {
	 $this->session->sess_destroy();
	 redirect(base_url('login'));
	 
 }
	public function progress(){
		$this->load->view('header');
		$this->load->view('Complaint/progress');
		$this->load->view('footer');
		
	}
    public function resolved(){
		$this->load->view('header');
		$this->load->view('Complaint/resolved');
		$this->load->view('footer');
		
	}

    public function checkUsers()
 {
	 extract($_POST);
	 $this->load->model('Welcome_model');
/////////////////////////////////////////////////////////////////////////////////////////

        // $this->form_validation->set_rules('username', 'username', 'required');
        // $this->form_validation->set_rules('password', 'password', 'required');
 
        // $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        // $this->form_validation->set_message('required', 'Enter %s');
 
        // if ($this->form_validation->run() === FALSE)
        // {  
        //     ///$this->load->view('login');
        // }
        // else
        // {   
		   ///echo md5;
		   ///echo $passee;
		   ///exit;

		  $passee1=$this->input->post('password');
		  $passee=md5($passee1);
            $data = array(
               'user_name' => $this->input->post('username'),
               'user_password' => $passee,
 
             );
   
            $check = $this->Welcome_model->auth_check($data);
            //print_r($check);
			//exit;
            /// $this->load->view('login');
			 if($check){
		  $this->session->set_userdata('username',$check->user_name);
		  $this->session->set_userdata('userid', $check->user_id);
		  $this->session->set_userdata('tierid', $check->tier_id);
		  $this->session->set_userdata('cityid', $check->city_id);
		  $this->session->set_userdata('groupid', $check->group_id);
		  $this->session->set_userdata('password', $check->user_password);

		  
		   ///echo 1;
		  redirect(base_url('Complaint/dashboard/'.$check->user_id));
	}else{
		///echo 0;
	redirect(base_url());
	 }
        }	 
	 
	 //////////////////////////////////////////////////////////////////////////////////////////////////
	
	
	 
 }	
	
// }