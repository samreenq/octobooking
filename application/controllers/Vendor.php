<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vendor extends CI_Controller {

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
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

    /**
     * @var array
     */
    public $data = [];

    /**
     * Vendor constructor.
     */
    public function __construct(){
        parent::__construct();
        if($this->session->userdata('role') == 1){
            redirect(base_url());
        }
        if($this->session->userdata('user_id') == ""){
            redirect(base_url());
        }

        $site_lang = $this->session->get_userdata('site_lang');
        $this->data['site_lang'] =  $site_lang = isset($site_lang['site_lang']) ? $site_lang['site_lang'] : 'ar';
        $lang_file = (isset($site_lang) && ($site_lang == 'ar')) ? 'arabic' : 'english';
        $this->data['lang'] = $this->lang->load('web',$lang_file,true);
        $this->data['user']  = ($this->session->userdata('user')) ? (array)$this->session->userdata('user') : [];
    }
	public function index()
	{
	    redirect(base_url());
		$data['active']		=	'vendor';
		$data['mainView'] 	= 	'index';
		$all_data = array_merge($data,$this->data);
		$this->load->vars($all_data);
		$this->load->view(MASTERVIEW);
	}
	public function addvenue()
	{
        $user = $this->session->userdata('user');
        if($user->package != ''){
           $package_raw =  $this->db->select('*')->from('packages')->where('id',$user->package)->get()->result_array();
            if(isset($package_raw[0]['id'])){
                //check no of venues
                $this->db->where('vendor_id',$user->id);
                $this->db->where('type','venue');
                $total_venue = $this->db->get('venues')->num_rows();

                if($total_venue < $package_raw[0]['total_venue']){
                    $data['add_limit_package'] = 1;
                }
                else{
                    $data['add_limit_package'] = 0;
                    $data['add_limit_message'] = "Your limit of venue has exceed, upgrade your package.";
                    redirect(base_url().'vendor/my-venues');
                }

            }
        }
	    if(isset($_GET['venue']) && is_numeric($_GET['venue'])){
    		$data['venue']		=	$this->db->get_where('venues', array('id' => $_GET['venue']))->row_array();
    		//$data['packages']		=	$this->db->get_where('venue_services', array('venue_id' => $_GET['venue']))->result_array();
    		$data['gallery']		=	$this->db->get_where('gallery', array('venue_id' => $_GET['venue'],'pkg_id'=>0))->result_array();
	    }else{
    		$data['venue']		=	"";
    		//$data['packages']		=	"";
    		$data['gallery']		=	"";
	    }
		$data['locations']		=	$this->db->get_where('categories', array('type' => 'location','status'=>1))->result_array();
		$data['suitables']		=	$this->db->get_where('categories', array('type' => 'suitables','status'=>1))->result_array();
		$data['amenities']		=	$this->db->get_where('categories', array('type' => 'amenity','status'=>1))->result_array();
		$data['services']		=	$this->db->get_where('venues', array('vendor_id' => $this->session->userdata('user_id'),'type'=>'service'))->result_array();

        $data['day_prices'] = [];
		if(isset($data['venue']['day_prices'])){
		    $data['day_prices'] = json_decode($data['venue']['day_prices'],true);
        }

		$data['days'] = array(
		    'monday'    => $this->data['lang']['monday'],
            'tuesday'   => $this->data['lang']['tuesday'],
            'wednesday' => $this->data['lang']['wednesday'],
            'thursday'  =>$this->data['lang']['thursday'],
            'friday'    =>$this->data['lang']['friday'],
            'saturday'  =>$this->data['lang']['saturday'],
            'sunday'    =>$this->data['lang']['sunday']);

		$data['active']		=	'addvenue';
		$data['mainView'] 	= 	'vendor/addvenue';
		$all_data = array_merge($data,$this->data);
		$this->load->vars($all_data);
		$this->load->view(MASTERVIEW);
	}
	public function listvenues()
	{
		$data['venues']		=	$this->db->get_where('venues', array('vendor_id' => $this->session->userdata('user_id'),'type'=>'venue'))->result_array();
        $services  =	$this->db->get_where('venues', array('vendor_id' => $this->session->userdata('user_id'),'type'=>'service'))->result_array();
        $data['add_venue_limit'] = 1;
        $data['add_limit_package'] = 1;

        $user = $this->session->userdata('user');
        if($user->package != ''){
            $package_raw =  $this->db->select('*')->from('packages')->where('id',$user->package)->get()->result_array();

            if(isset($package_raw[0]['id'])){
                //check no of venues
                $this->db->where('vendor_id',$user->id);
                $this->db->where('type','service');
                $total_service = $this->db->get('venues')->num_rows();

                if($total_service < $package_raw[0]['total_service']){
                    $data['add_limit_package'] = 1;
                }
                else{
                    $data['add_limit_package'] = 0;
                    $data['add_limit_message'] = "Your limit of service has exceed, upgrade your package.";
                }

                $this->db->where('vendor_id',$user->id);
                $this->db->where('type','venue');
                $total_venue = $this->db->get('venues')->num_rows();


                if($total_venue < $package_raw[0]['total_venue']){
                    $data['add_venue_limit'] = 1;
                }
                else{
                    $data['add_venue_limit'] = 0;
                    $data['add_venue_message'] = "Your limit of venue has exceed, upgrade your package.";
                }

            }
        }

        $services_arr = array();

        if(count($services)>0){
            foreach($services as $service){

                $arr = $service;

                $packages = $this->db->select('COUNT("id") as total_package')
                    ->from('services')
                    ->where('venue_id',$service['id'])
                    ->get()->result_array();

                $arr['total_package'] = $packages[0]['total_package'];

                $services_arr[] = $arr;
            }
        }

      // echo '<pre>'; print_r($services_arr); exit;

        $data['services'] = $services_arr;
        $data['active']		=	'listvenues';
		$data['mainView'] 	= 	'vendor/listvenues';
		$all_data = array_merge($data,$this->data);
		$this->load->vars($all_data);
		$this->load->view(MASTERVIEW);
	}
	public function addservice()
	{
	    if(!isset($_GET['service'])) {
            $user = $this->session->userdata('user');
            if ($user->package != '') {
                $package_raw = $this->db->select('*')->from('packages')->where('id', $user->package)->get()->result_array();
                if (isset($package_raw[0]['id'])) {
                    //check no of venues
                    $this->db->where('vendor_id', $user->id);
                    $this->db->where('type', 'service');
                    $total_venue = $this->db->get('venues')->num_rows();

                    if ($total_venue < $package_raw[0]['total_service']) {
                        $data['add_limit_package'] = 1;
                    } else {
                        $data['add_limit_package'] = 0;
                        $data['add_limit_message'] = "Your limit of service has exceed, upgrade your package.";

                        redirect(base_url().'vendor/my-venues');
                    }

                }
            }
        }
	    if(isset($_GET['service']) && is_numeric($_GET['service'])){
    		$data['service']		=	$this->db->get_where('venues', array('id' => $_GET['service']))->row_array();
    		$data['packages']		=	$this->appmodel->getPackagesByVendor($_GET['service']);

    		$data['gallery']		=	$this->db->get_where('gallery', array('venue_id' => $_GET['service'],'pkg_id'=>0))->result_array();
	    }else{
    		$data['service']		=	"";
    		$data['packages']		=	"";
    		$data['gallery']		=	"";
	    }


		$data['categories']		=	$this->db->get_where('categories', array('type' => 'category','status'=>1))->result_array();
		$data['active']		=	'addservice';
		$data['mainView'] 	= 	'vendor/addservice';
		$all_data = array_merge($data,$this->data);
		$this->load->vars($all_data);
		$this->load->view(MASTERVIEW);
	}
	public function listservices()
	{
		$data['venues']		=	$this->db->get_where('venues', array('vendor_id' => $this->session->userdata('user_id'),'type'=>'service'))->result_array();
		$data['active']		=	'listservices';
		$data['mainView'] 	= 	'vendor/listservices';
		$all_data = array_merge($data,$this->data);
		$this->load->vars($all_data);
		$this->load->view(MASTERVIEW);
	}
	public function listbookings()
	{
		$data['bookings']		=	$this->appmodel->get_bookings('bookings',$this->session->userdata('user_id'),"",$_GET);
		$data['active']		=	'listbookings';
		$data['mainView'] 	= 	'vendor/listbookings';
		$all_data = array_merge($data,$this->data);
		$this->load->vars($all_data);
		$this->load->view(MASTERVIEW);
	}
	public function bookingdetail($id)
	{
		//$data['booking']		=	$this->appmodel->get_bookings('bookings',$this->session->userdata('user_id'),$id,"")[0];
        $data	=	$this->appmodel->getBookingDetail('booking',$this->session->userdata('user_id'),$id);
        $data['user']		=	$this->db->get_where('users', array('id' => $data['booking']['user_id']))->row_array();
        #var_dump($data);exit;
		$data['active']		=	'bookingdetail';
		$data['mainView'] 	= 	'vendor/bookingdetail';
		$all_data = array_merge($data,$this->data);
		$this->load->vars($all_data);
		$this->load->view(MASTERVIEW);
	}
	public function addVenueSubmit()
	{
	    $user = $this->session->userdata('user');
	    if($user->package != ''){
	        $this->db->select('*')->from('packages')->where('id',$user->package)->get()->result_array();
        }

		$id = $this->appmodel->insertListing($this->input->post());
		$imgs = $this->upload_files('./upload/',url_title($this->input->post('title'), 'dash', true),$_FILES);
		$date = date("Y-m-d H:i:s");
		foreach($imgs as $img){
			$data = array('venue_id'=>$id,'image_name'=>$img,'create_at'=>$date);
			$this->db->insert('gallery',$data);
		}
		redirect(base_url().'vendor/my-venues');
	}
	public function addServiceSubmit()
	{
	  //  print_r('sam');
		$id = $this->appmodel->insertServiceListing($this->input->post());
		redirect(base_url().'vendor/add-service?service='.$id);
	}
	public function submitpackages()
	{
	    extract($_POST);
	   // echo "<pre>";
	  //  print_r($_POST);exit;
	    $service_id = 0;
	    $j=0;

        $service = array(
            'service_name'	=> $pkgname,
            'service_name_ar'	=> $pkgname_ar,
           // 'service_desc' => $inc,
          //  'service_desc_ar' => $pkgincludes_ar[$j],
            'service_price' => $pkgprice,
            'venue_id' => $serviceid,
           // 'created_at' =>date('Y-m-d H:i:s')
        );
        $this->db->insert("services",$service);
        $service_id = $this->db->insert_id();

		foreach($pkgincludes as $key =>$inc){
		   // $i=0;
			$service = array(
				'service_desc' => $inc,
				'service_desc_ar' => $pkgincludes_ar[$key],
				'service_id' => $service_id,
                'created_at' =>date('Y-m-d H:i:s')
			);
			$this->db->insert("service_includes",$service);
			//if($i==0)
    		//	$service_id = $this->db->insert_id();
    		//$i++;
    		//$j++;
		}

	    $config = array(
            'upload_path'   => './upload/',
            'allowed_types' => 'jpg|gif|png|JPEG|jpeg',
            //'overwrite'     => 1,                       
        );

        $this->load->library('upload', $config);
        $fileName = uniqid().$pkgname ;

        $config['file_name'] = $fileName;
        
        $this->upload->initialize($config);
        $images = "";
        if ($this->upload->do_upload('pkgfiles')) {
            $d = $this->upload->data();
			$images = $d['file_name'];
			
        } 
		$date = date("Y-m-d H:i:s");
		$data = array('venue_id'=>$serviceid,'pkg_id'=>$service_id,'image_name'=>$images,'create_at'=>$date);
		$this->db->insert('gallery',$data);
	    
		redirect(base_url().'vendor/add-service?service='.$serviceid);
	}
	function removephoto(){
	    $this->db->where('id',$_POST['id']);
	    $this->db->delete('gallery');
	}
	function submitgallery(){
	    extract($_POST);
//	    $serviceid;
		$imgs = $this->upload_files('./upload/',uniqid(),$_FILES);
		$date = date("Y-m-d H:i:s");
		foreach($imgs as $img){
			$data = array('venue_id'=>$serviceid,'image_name'=>$img,'create_at'=>$date);
			$this->db->insert('gallery',$data);
		}
		redirect(base_url().'vendor/add-service?service='.$serviceid);
	}
	private function upload_files($path, $title, $files)
    {
		//print_r($files);
        $config = array(
            'upload_path'   => $path,
            'allowed_types' => 'jpg|gif|png',
            'overwrite'     => 1,                       
        );

        $this->load->library('upload', $config);

        $images = array();

        foreach ($files['files']['name'] as $key => $image) {
            $_FILES['files[]']['name']= $files['files']['name'][$key];
            $_FILES['files[]']['type']= $files['files']['type'][$key];
            $_FILES['files[]']['tmp_name']= $files['files']['tmp_name'][$key];
            $_FILES['files[]']['error']= $files['files']['error'][$key];
            $_FILES['files[]']['size']= $files['files']['size'][$key];

            $fileName = $title .'_'. $image;

            $config['file_name'] = $fileName;

            $this->upload->initialize($config);

            if ($this->upload->do_upload('files[]')) {
                $d = $this->upload->data();
				$images[] = $d['file_name'];
            } else {
               // return false;
            }
        }

        return $images;
    }

    /**
     * Update Venue as request of inactive
     */
    public function updateVenueStatus()
        {
        $venue_id = isset($_GET['venue']) ? $_GET['venue'] : '';
        $status = (isset($_GET['status']) && in_array($_GET['status'],array(1,3))) ? $_GET['status'] : 1;
        $this->db->where('id', $venue_id);
        if($this->db->update("venues",array('venue_status'=>$status,'modified_at'=>date('Y-m-d h:i:s')))){
            $this->session->flashdata('success',$this->data['lang']['inactive_venue']);
        }
        else{
            $this->session->flashdata('success',$this->data['lang']['inactive_venue_not_updated']);
        }

        redirect(base_url().'vendor/my-venues');

    }

    /**
     * Walking Customer Booking
     */
    public function walkingBookingSubmit()
    {
        $venue_id = $this->input->post('venue_id');
        $event_date = $this->input->post('event_date');

        $chkBooking = $this->db->select('id')
            ->from('booking_items')
            ->where('venue_id',$venue_id)
            ->where('eventdate',$event_date)
            ->get()->result_array();

        $chkWalkingBooking = $this->db->select('id')
            ->from('walking_bookings')
            ->where('venue_id',$venue_id)
            ->where('event_date',$event_date)
            ->get()->result_array();

        //echo $this->db->last_query(); die;

        if(count($chkBooking)>0 || count($chkWalkingBooking)>0 ){

            $arr = array(
                'error' => 1,
                'message' => 'This event date is already booked'
            );
            echo json_encode($arr);
            exit();
        }
        else{
            $data = array(
                'venue_id' => $this->input->post('venue_id'),
                'vendor_id' => $this->session->userdata('user_id'),
                'event_date' => $this->input->post('event_date'),
                'created_at' => date('Y-m-d h:i:s')
            );
            // echo '<pre>'; print_r($data); exit;
            $this->db->insert("walking_bookings",$data);
            $arr = array(
                'error' => 0,
                'message' => 'Your booking has saved successfully.'
            );
            echo json_encode($arr);
            exit();
        }
    }

    public function walkingBooking()
    {
        $bookings = $this->db->select('w.*,v.venue_name,v.venue_name_ar')
            ->from('walking_bookings w')
            ->join('venues v','v.id = w.venue_id')
            ->where('w.vendor_id',$this->session->userdata('user_id'))
            ->get()->result_array();

        $data['bookings'] = $bookings;
        $data['active']		=	'listwalkingbookings';
        $data['mainView'] 	= 	'vendor/listwalkingbookings';
        $all_data = array_merge($data,$this->data);
        $this->load->vars($all_data);
        $this->load->view(MASTERVIEW);
    }



}
