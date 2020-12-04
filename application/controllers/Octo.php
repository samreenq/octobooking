<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Octo extends CI_Controller {

    /**
     * @var array
     */
    public $data = [];

    /**
     * Octo constructor.
     */
    public function __construct()
    {
        parent::__construct();

        $site_lang = $this->session->get_userdata('site_lang');
        $this->data['site_lang'] =  $site_lang = isset($site_lang['site_lang']) ? $site_lang['site_lang'] : 'ar';
        $lang_file = (isset($site_lang) && ($site_lang == 'ar')) ? 'arabic' : 'english';
        $this->data['lang'] = $this->lang->load('web',$lang_file,true);
        $this->data['user']  = ($this->session->userdata('user')) ? (array)$this->session->userdata('user') : [];
        //$this->session->set_userdata('lang_keyword',$site_lang);

    }

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
	public function index()
	{
        //echo '<pre>'; print_r($this->data); exit;
		$data['venue_types']=	$this->appmodel->getVenueTypes();
		$data['locations']		=	$this->db->get_where('categories', array('type'=>'location','status' => 1),10)->result_array();
		$data['suitables']		=	$this->db->get_where('categories', array('type'=>'suitables','status' => 1),6)->result_array();

		$popular = $this->db->get_where('venues', array('venue_status' => 1,'type'=>'venue'))->result_array();
        $pop_rows = array();
		if(count($popular) > 0){

		    foreach($popular as $pop_product){

		        $product = $pop_product;
		        $image_raw = $this->db->get_where('gallery',array('venue_id'=>$pop_product['id']))->result_array();
		        $product['image'] = isset($image_raw[0]['image_name']) ? base_url().'upload/'.$image_raw[0]['image_name'] : base_url()."assets/images/image-57.png";
		        $pop_rows[] = $product;
            }
        }

		$data['popular']		=	$pop_rows;
		$data['categories']		=	$this->db->get_where('categories', array('type'=>'category','status' => 1))->result_array();

        $query_data['page'] = 'home';
        $records = $this->db->get_where('options',$query_data)->result_array();

        $return = array();
        if(count($records)>0){
            foreach($records as $record){

                $option = $record['option_name'];
                $return[$record['option_name']] = $record['option_value'];
                $return[$option.'_ar'] = $record['option_value_ar'];
            }
        }
        $data['home_content'] = $return;


		$data['active']		=	'home';
		$data['mainView'] 	= 	'index';

		$all_data = array_merge($data,$this->data);
		$this->load->vars($all_data);
		$this->load->view(MASTERVIEW);
	}
	public function aboutus()
	{
		$data['active']		=	'aboutus';
		$data['mainView'] 	= 	'index';
        $all_data = array_merge($data,$this->data);
		  $this->load->vars($all_data);
		$this->load->view(MASTERVIEW);
	}
	public function ourservices()
	{
        $this->load->helper('url');
        $this->load->library("pagination");
        //print_r($_GET);
        $page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
        //$page = isset($_GET['page']) ? $_GET['page'] : 1;
        $services		=	$this->appmodel->get_search_service($_GET,'',PAGE_LIMIT,$page);
        $config = array();
        $config["base_url"] = base_url() . "our-services";
        $config["total_rows"] = $services['total'];
        $config["per_page"] = PAGE_LIMIT;
        $config["uri_segment"] = 2;
        $config['reuse_query_string'] = true;

        $this->pagination->initialize($config);

        $data["links"] = $this->pagination->create_links();
        $data['services'] = $services['results'];
       // $data['services']		=	$this->appmodel->get_search_service($_GET);
		$data['categories']		=	$this->db->get_where('categories', array('type'=>'category','status' => 1))->result_array();
		$data['topcategories']		=	$this->db->get_where('categories', array('type'=>'category','status' => 1,'is_featured'=>1),6)->result_array();
		$data['active']		=	'ourservices';
		$data['mainView'] 	= 	'our_services';
        $all_data = array_merge($data,$this->data);
          $this->load->vars($all_data);
		$this->load->view(MASTERVIEW);
	}
	public function serviceDetail($service)
	{
	    $service_data = $this->appmodel->get_search_service("",$service,false,false);
	   // echo '<pre>'; print_r($service_data); exit;
		$data['service']		=	$service_data['results'][0];
		$data['gallery']		=	$this->db->get_where('gallery', array('venue_id' => $service,'pkg_id'=>0))->result_array();
		//$packages		=	$this->appmodel->getPackagesByVendor($service);
		$data['packages']		=	$this->appmodel->getPackagesByVendor($service);

		$data['category'] = $this->db->get_where('categories',array('id'=>$data['service']['cat_id']))->result_array();
        $data['cart']		= $this->cart->contents();

		$data['active']		=	'ourservices';
		$data['mainView'] 	= 	'service_detail';

        // echo '<pre>'; print_r($data['packages']); exit;
        $all_data = array_merge($data,$this->data);
          $this->load->vars($all_data);
        
		$this->load->view(MASTERVIEW);
	}
	public function becomevendor()
	{
		$data['packages']		=	$this->db->get_where('packages', array('status' => 1))->result_array();
        $query_data['page'] = 'become-vendor';
        $records = $this->db->get_where('options',$query_data)->result_array();

        $return = array();
        if(count($records)>0){
            foreach($records as $record){

                $option = $record['option_name'];
                $return[$record['option_name']] = $record['option_value'];
                $return[$option.'_ar'] = $record['option_value_ar'];
            }
        }
        $data['static_content'] = $return;

       // echo '<pre>'; print_r($data); exit;

        $data['active']		=	'becomevendor';
		$data['mainView'] 	= 	'becomavendor';
		
        $all_data = array_merge($data,$this->data);
          $this->load->vars($all_data);
        
		$this->load->view(MASTERVIEW);
	}
	public function contactus()
	{
		$data['active']		=	'contact_us';
		$data['mainView'] 	= 	'contact_us';

		if($this->input->post('is_post')){

		    $this->db->insert('contact_us',array(
		        'full_name' => $this->input->post('full_name'),
		        'email' => $this->input->post('contact_email'),
		        'subject' => $this->input->post('subject'),
		        'message' => $this->input->post('message'),
                'created_at' => date('Y-m-d h:i:s'),
                'status' => 1
            ));

		    //Send Email
            $message = "Dear Admin<br /><br />
                The following is the detail of user that contact you<br /><br> />
                Full name: ".$this->input->post('full_name')."<br /> 
                Email: ".$this->input->post('email')."<br /> 
                Subject: ".$this->input->post('subject')."<br /> 
                Message: ".$this->input->post('message')."<br /> 
                <br /><br />If you didn't rqeuest this, kindly contact at info@octobooking.com urgently.";
            email_holder(ADMIN_EMAIL,"Contact Us - Octo Booking",$message);

            $this->session->set_flashdata('success',$this->data['lang']['contact_email_sent']);
            redirect('contact-us');
        }

        $all_data = array_merge($data,$this->data);
          $this->load->vars($all_data);
        
		$this->load->view(MASTERVIEW);
	}
	public function productList()
	{
        $this->load->helper('url');
        $this->load->library("pagination");
	    //print_r($_GET);
        $page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
        //$page = isset($_GET['page']) ? $_GET['page'] : 1;
	    $venues		=	$this->appmodel->get_search($_GET,PAGE_LIMIT,$page);
        $config = array();
        $config["base_url"] = base_url() . "products";
        $config["total_rows"] = isset($venues['total']) ? $venues['total'] : 0;
        $config["per_page"] = PAGE_LIMIT;
        $config["uri_segment"] = 2;
        $config['reuse_query_string'] = true;

        $this->pagination->initialize($config);

        $data["links"] = $this->pagination->create_links();
        $data['venues'] = isset($venues['results']) ? $venues['results'] : [];

        $data['active']		=	'productlist';
		$data['mainView'] 	= 	'productlist';

        $all_data = array_merge($data,$this->data);
          $this->load->vars($all_data);
		$this->load->view(MASTERVIEW);
	}
	public function product($product)
	{
		$data['product']		=	$this->db->get_where('venues', array('id' => $product))->row_array();

		$this->db->select('*')->from('venues')->where('id', $product);
        $query =  $this->db->get();
        $venue = $query->result_array();

        $services_arr = [];

        if($venue){
            if(count($venue)>0){
              $services =  $this->db->select('*')
                  ->from('venues')->where_in('id ',explode(',',$venue[0]['venue_services']))->get()->result_array();
              // echo '<pre>'; print_r($services_cat_ids); exit;
               if(count($services)>0){
                   foreach($services as $venue_service){
                      // $cat_arr[] = $venue_service;

                       $services_cat = $this->db->select('id as cat_id, cat_name ,cat_image, cat_name_ar')
                           ->from('categories')
                           ->where_in('id',$venue_service['cat_id'])
                           ->get()->result_array();

                       $services_arr[] = array_merge($venue_service,$services_cat[0]);

                   }

               }
              //  echo '<pre>'; print_r($services_arr); exit;
            }
        }

        $data['media_url'] = MEDIAURL;
        $data['services_cat'] = $services_arr;
		$data['services']		=	$this->db->get_where('services', array('venue_id' => $product))->result_array();
		$data['gallery']		=	$this->db->get_where('gallery', array('venue_id' => $product,'pkg_id'=>0))->result_array();
		$isBookable = false;
		//echo $product;
		//echo '<pre>'; print_r($this->cart->contents());

		if(sizeof($this->cart->contents()) > 0){
            foreach ($this->cart->contents() as $items){
                $o = $items['options'];
               // echo $items['id'];
                if($items['id'] == $product){
                    $isBookable = true;
                    break;
                }
            }
	    }

	//var_dump($isBookable); exit;
		//exit;

        $popular = $this->db->get_where('venues', array('venue_status' => 1,'type'=>'venue'))->result_array();
        $pop_rows = array();
        if(count($popular) > 0){

            foreach($popular as $pop_product){

                $product = $pop_product;
                $image_raw = $this->db->get_where('gallery',array('venue_id'=>$pop_product['id']))->result_array();
                $product['image'] = isset($image_raw[0]['image_name']) ? base_url().'upload/'.$image_raw[0]['image_name'] : base_url()."assets/images/image-57.png";
                $pop_rows[] = $product;
            }
        }

        $data['popular']		=	$pop_rows;

		$data['bookable']		=	($isBookable) ? 1 : 0;
		//$rating_reviews = $this->db->order_by('id','desc')->get_where('rating_reviews')->result_array();

        $this->db->select('rating_reviews.id as rating_id,rating_reviews.*,users.*');
        $this->db->from('rating_reviews');
        $this->db->join('users', 'users.id = rating_reviews.user_id')
        ->order_by('rating_reviews.id','desc');
        $data['rating_reviews'] = $this->db->get()->result_array();

        $data['day_prices'] = [];
        if(isset($data['product']['day_prices'])){
            $data['day_prices'] = json_decode($data['product']['day_prices'],true);
        }

        $data['active']		=	'product';
		$data['mainView'] 	= 	'product_detail';

       //echo '<pre>'; print_r($data['rating_reviews']); exit;
            $all_data = array_merge($data,$this->data);
          $this->load->vars($all_data);
		$this->load->view(MASTERVIEW);
	}

	public function checkout()
	{
      //  echo '<pre>'; print_r($this->session->userdata('user')); exit;
	    //$this->cart->destroy();
	    if($this->session->userdata('user_id')== "")
	    	$data['user']		=	array();
	    else
    		$data['user']		=	$this->db->get_where('users', array('id' => $this->session->userdata('user_id')))->row_array();
		$data['cart']		=	$this->cart->contents();

		//echo '<pre>'; print_r($data['cart']); exit;
		$data['active']		=	'checkout';
		$data['mainView'] 	= 	'checkout';
		
        $all_data = array_merge($data,$this->data);
          $this->load->vars($all_data);
        
		$this->load->view(MASTERVIEW);
	}
	public function myOrdersList()
	{
	    if($this->session->userdata('user_id')== "")
	        redirect(base_url());
		$data['bookings']		=	$this->appmodel->get_bookings('orders',$this->session->userdata('user_id'),"","");

		//echo '<pre>'; print_r($data['bookings']); exit;
		$data['active']		=	'myorders';
		$data['mainView'] 	= 	'myorders';

        $all_data = array_merge($data,$this->data);
          $this->load->vars($all_data);
		$this->load->view(MASTERVIEW);
	}
	public function orderdetail($id)
	{
	   // die($id);
		$data	=	$this->appmodel->getBookingDetail('orders',$this->session->userdata('user_id'),$id);
        $data['user']		=	$this->db->get_where('users', array('id' => $data['booking']['user_id']))->row_array();

        //	echo '<pre>';	print_r($data);exit;
		$data['active']		=	'bookingdetail';
		$data['mainView'] 	= 	'orderdetail';
        $all_data = array_merge($data,$this->data);
          $this->load->vars($all_data);
		$this->load->view(MASTERVIEW);
	}
	public function myWishlist()
	{
	    if($this->session->userdata('user_id')== ""){
            redirect(base_url());
        }

        $this->load->helper('url');
        $this->load->library("pagination");
        //print_r($_GET);
        $page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;

        $this->db->select('v.*,g.image_name as image');
        $this->db->from('wishlist w');
        $this->db->join('venues v','v.id = w.venue_id');
        $this->db->join('gallery g','v.id = g.venue_id');
        $this->db->where('w.user_id',$this->session->userdata('user_id'));
        $this->db->where('v.venue_status',1);

        $filtered_count = $this->db->count_all_results('', false);
        $this->db->limit(PAGE_LIMIT, $page);
        $query = $this->db->get()->result_array();

       // echo $this->db->last_query();
        $config = array();
        $config["base_url"] = base_url() . "my-wishlist";
        $config["total_rows"] = isset($filtered_count) ? $filtered_count : 0;
        $config["per_page"] = PAGE_LIMIT;
        $config["uri_segment"] = 2;
        $config['reuse_query_string'] = true;

        $this->pagination->initialize($config);

        $data["links"] = $this->pagination->create_links();

		$data['venues']		=	$query;//$this->db->get_where('wishlist', array('user_id' => $this->session->userdata('user_id')))->result_array();

       // echo '<pre>'; print_r($data['venues']); exit;
        $data['active']		=	'wishlist';
		$data['mainView'] 	= 	'wishlist';
        $all_data = array_merge($data,$this->data);
          $this->load->vars($all_data);
		$this->load->view(MASTERVIEW);
	}
	public function myprofile()
	{
	    if($this->session->userdata('user_id')== "")
	        redirect(base_url());
		$data['user']		=	$this->db->get_where('users', array('id' => $this->session->userdata('user_id')))->row_array();
		$data['active']		=	'myprofile';
		$data['mainView'] 	= 	'myprofile';
        $all_data = array_merge($data,$this->data);
          $this->load->vars($all_data);
		$this->load->view(MASTERVIEW);
	}
	public function changepassword()
	{
	    if($this->session->userdata('user_id')== "")
	        redirect(base_url());
		$data['user']		=	$this->db->get_where('users', array('id' => $this->session->userdata('user_id')))->row_array();
		$data['active']		=	'changepassword';
		$data['mainView'] 	= 	'changepassword';
        $all_data = array_merge($data,$this->data);
          $this->load->vars($all_data);
		$this->load->view(MASTERVIEW);
	}
	public function thankyou()
	{
		$data['active']		=	'thankyou';
		$data['mainView'] 	= 	'thankyou';
		$data['booking_no'] = $_GET['booking_no'];
        $all_data = array_merge($data,$this->data);
          $this->load->vars($all_data);
		$this->load->view(MASTERVIEW);
	}
	public function addtocart(){
	    #$this->cart->destroy();
	    $type  = $_POST['type'];
        $venue_price  = isset($_POST['price']) ? $_POST['price'] : 0;
        $seat  = isset($_POST['seat'])?$_POST['seat']:"";
        $price_unit = isset($_POST['price_unit']) ? $_POST['price_unit'] : '';

	    if($type == 'service'){
            $sku = isset($_POST['package_id']) ? $_POST['package_id'] : '';
            $price = $venue_price;
        }else{
            $sku = isset($_POST['venue_id']) ? $_POST['venue_id'] : '';
            if($price_unit == 'perseat'){
                $price = ($seat!="") ? $venue_price*$seat : $venue_price;
            }
            else{
                $price = $venue_price;
            }
        }
	   // echo '<pre>'; print_r($_POST);

	    $name  = $_POST['name'];
	    $pkgname  = isset($_POST['pkgname'])?$_POST['pkgname']:"";
	    $event_date  = isset($_POST['event_date']) ? $_POST['event_date']:"";
	    $cart = $this->cart->contents();
        $position = array_search($sku, array_column(array_values($cart), 'id'));
        $package_id = isset($_POST['package_id']) ? $_POST['package_id'] : '';
       // $venue_name = isset($_POST['name']) ? $_POST['name'] : '';
         $package_name = isset($_POST['package_name']) ? $_POST['package_name'] : '';
         $type = isset($_POST['type']) ? $_POST['type'] : '';
         $venue_id = isset($_POST['venue_id']) ? $_POST['venue_id'] : '';
         $vendor_id = isset($_POST['vendor_id']) ? $_POST['vendor_id'] : '';
         $latitude = isset($_POST['latitude']) ? $_POST['latitude'] : '';
         $longitude = isset($_POST['longitude']) ? $_POST['longitude'] : '';


          $image_raw = $this->db->select('image_name')->from('gallery')
              ->where('venue_id',$venue_id);

          if(!empty($package_id)){
            $image_raw =   $image_raw->where('pkg_id',$package_id);
          }

         $venue_gallery = $image_raw->get()->result_array();
          $image = isset($venue_gallery[0]['image_name']) ? $venue_gallery[0]['image_name'] : '';

          $venue = $this->db->select('venue_name,venue_name_ar')
              ->from('venues')
              ->where('id',$venue_id)->get()->result_array();

          $venue_name_ar = (isset($venue[0]['venue_name_ar']) && !empty($venue[0]['venue_name_ar'])) ? $venue[0]['venue_name_ar'] : $venue[0]['venue_name'];

        $service = $this->db->select('service_name,service_name_ar')
            ->from('services')
            ->where('id',$package_id)->get()->result_array();

        $service_name_ar = (isset($service[0]['service_name_ar']) && !empty($service[0]['service_name_ar'])) ? $service[0]['service_name_ar'] : $service[0]['service_name'];

        // echo '<pre>'; print_r($service);

        if($position === false){
    		$data = array(
    				'id'      => $sku,
    				'qty'     => 1,
    				'price_unit' => $price_unit,
    				'price_per_unit' => $venue_price,
    				'price'   => $price,
    				'total_price' => $price,
    				'venue_id' => $venue_id,
    				'vendor_id' => $vendor_id,
    				'package_id' => isset($package_id) ? $package_id : ' ',
    				'name'    => $name,
    				'venue_name' => $name,
    				'venue_name_ar' => $venue_name_ar,
    				'package_name' => isset($package_name) ? $package_name : '',
    				'package_name_ar' => isset($service_name_ar) ? $service_name_ar : '',
    				'type' => $type,
    				'eventdate' => $event_date,
    				'total_seats' => $seat,
    				'latitude' =>$latitude,
    				'longitude' =>$longitude,
    				'options' => array($pkgname,$seat,$event_date,$type),
                    'image' => $image
    		);
            //echo '<pre>'; print_r($data); exit;

    		$this->cart->insert($data);

    		return array(
    		    'error' => 0,
                'message' => $this->data['lang']['item_added_in_cart'],
                'data' => $data
            );
        }

        return array(
            'error' => 1,
            'message' => $this->data['lang']['item_not_in_cart']
        );
	}
    public function switchLanguage($language = "") {
        $language = ($language != "") ? $language : "en";
        $this->session->set_userdata('site_lang', $language);
        redirect($_SERVER['HTTP_REFERER']);
    }
    public function logout()
	{
		$this->session->unset_userdata('user_id');
		$this->session->unset_userdata('name');
		$this->session->unset_userdata('role');
        $this->session->unset_userdata('platform_type');
		$this->cart->destroy();
		redirect(base_url());
	}
	public function submitCheckout()
	{

       // echo '<pre>'; print_r($_POST);
      //  echo '<pre>'; print_r($this->cart->contents());
      //  exit;
      //  exit;
        $user_id = ($this->session->userdata('user_id')== "")?0:$this->session->userdata('user_id');

        $booking_no = $user_id.time();
		$date = date("Y-m-d H:i:s");

		$total = 0;
        $order_items = array();

        if(sizeof($this->cart->contents()) > 0){
            foreach ($this->cart->contents() as $items) {

                $total = $total + $items['total_price'];

                $data = array(
                  //  'booking_no' => $booking_no,
                    //'fullname'=>$this->input->post('fullname'),
                    //'event_name'=>$this->input->post('event'),
                    //'email'=>$this->input->post('email'),
                    //'phone'=>$this->input->post('phone'),
                    'eventdate'=> isset($items['eventdate']) ? $items['eventdate']  : "",
                    //'description'=>$this->input->post('desc'),
                    'vendor_id' => isset($items['vendor_id']) ? $items['vendor_id'] : "",
                    'created_at' => $date,
                    'modified_at' => $date,
                    'price_per_unit' => isset($items['price_per_unit']) ? $items['price_per_unit'] : 0,
                    'subtotal' => $items['price'],
                    'total' => $items['total_price'],
                    /*'status'=>0,
                    'user_id'=>($this->session->userdata('user_id')== "")?0:$this->session->userdata('user_id'),*/
                    'venue_id' => isset($items['venue_id']) ? $items['venue_id'] : "",
                    'package_id' => isset($items['package_id']) ? $items['package_id'] : "",
                    'type' => isset($items['type']) ? $items['type'] : "",
                    'venue_name' => isset($items['venue_name']) ? $items['venue_name'] : "",
                    'package_name' => isset($items['package_name']) ? $items['package_name'] : "",
                    'total_seats' => isset($items['total_seats']) ? $items['total_seats'] : "",
                    'latitude' => isset($items['latitude']) ? $items['latitude'] : "",
                    'longitude' => isset($items['longitude']) ? $items['longitude'] : "",
                    'price_unit' => isset($items['price_unit']) ? $items['price_unit'] : "",

                );
                // $data['venue_id']   = $items['id'];
                if ($items['options'] > 0) {
                    $ops = ($items['options']);
                    $options = [];
                    if ($ops[0] != "") {
                        $option[] = "Package: " . $ops[0];
                    }
                    if ($ops[1] != "") {
                        $option[] = "No of Seats: " . $ops[1];
                    }
                    if ($ops[2] != "") {
                        $option[] = "Event on: " . $ops[2];
                    }
                    if (isset($option)) {
                        $data['addons'] = json_encode($option);
                    } else {
                        $data['addons'] = "";
                    }

                }

                     $order_items[] = $data;
                }

            }

            $order = array(
                'booking_no' => $booking_no,
                'fullname'=>$this->input->post('fullname'),
                'event_name'=>$this->input->post('event'),
                'email'=>$this->input->post('email'),
                'phone'=>$this->input->post('phone'),
                'description'=>$this->input->post('desc'),
                'status'=>0,
                'user_id'=>($this->session->userdata('user_id')== "")?0:$this->session->userdata('user_id'),
                'total' => $total,
                'created_at'=>$date,
                'modified_at'=>$date,
            );

         //   echo '<pre>'; print_r($order);
           // echo '<pre>'; print_r($order_items); exit;

            $this->db->insert('bookings',$order);
            $booking_id =  $this->db->insert_id();

            if(count($order_items) > 0) {
                foreach ($order_items as $item){
                    $item['booking_id'] = $booking_id;
                    $this->db->insert('booking_items', $item);
                }
            }

            //send email
            $user_name = $this->session->userdata('name');
            /*$message = "Dear $user_name"."<br /><br />
                Thank you for your booking, your booking # is $booking_no
                    <br /><br />If you didn't rqeuest this, kindly contact at info@octobooking.com urgently.";*/

            $order['booking_id'] = $booking_id;
            $message =   $this->load->view('emails/order',['order'=>$order,'booking_items'=>$order_items],true);
            email_holder($this->input->post('email'),"Octo Booking - You have order successfully ",$message,true);

		$this->cart->destroy();
		redirect(base_url('thankyou?booking_no='.$booking_no));
		//echo "<script>alert('your booking request has been received'); window.location = 'http://couponcodeoutlet.com/octobooking';</script>";

	}
	public function loginSubmit()
	{

	   // echo '<pre>'; print_r($_POST); exit;
		$ret = $this->appmodel->userConnect($this->input->post('email'),$this->input->post('password'));
		$type = $ret['type'];
		$val = $ret['val'];
        //echo '<pre>'; print_r($val); exit;
		if($type == 1){
		    $user = $val;
		    unset($user['password']);
		    $this->session->set_userdata('user',(object)$user);
			$this->session->set_userdata('user_id',$val['id']);
			$this->session->set_userdata('role',$val['user_type']);
			$this->session->set_userdata('name',$val['fullname']);
			$this->session->set_userdata('platform_type',$val['platform_type']);

           // echo '<pre>'; print_r($this->session); exit;
			$response =  array(
			  'error' => 0,
              'message' => 'success',
            );
			echo json_encode($response); exit;
		}else{
		   //$this->session->set_flashdata('serror',$val);
            $response = array(
                'error' => 1,
                'message' => $val,
            );
            echo json_encode($response); exit;
		}
		//redirect(base_url());
	}
	public function registerSubmit()
	{
       $phone = $this->input->post('phone');
        $phone = substr_replace($phone, '-', 3, 0);
         $phone_converted = substr_replace($phone, '-', 7, 0);

        $this->load->helper('string');
        $random_str =  random_string('alnum', 10);

	    $role = $this->input->post('type');

	    $user_data = array(
            'fullname'  =>$this->input->post('fullname'),
            'email'      =>$this->input->post('email'),
            'password'  =>$this->input->post('password'),
            'phone'     =>$phone_converted,
            'type'      => $this->input->post('type'),
            'package'   =>$this->input->post('package'),
            'activation_code'=>$random_str
        );

	    $ret = $this->appmodel->userRegister($user_data);
        $type = $ret['type'];
        $val = $ret['val'];
       // print_r($ret);
        if($type == 1){

	       /* $link = base_url().'activate-user?code='.$random_str;
            $message = "Dear ".$this->input->post('fullname')."<br /><br />
            Welcome to octobooking, Thank you for joining us. We will surely provide you the place where you have your all desireable things.<br />
           <br/> Please click <a href='".$link."' >here</a> to activate your account.
            <br />If you didn't rqeuest this, kindly contact at info@octobooking.com urgently.";*/
            //$this->load->vars(['data'=>$val]);

           // $data['user'] = $val;
            //print_r($data);
            $message = $this->load->view('emails/verify-email',['data'=>$val],true);
           //echo $message; exit;
            email_holder($this->input->post('email'),"Octo Booking - Welcome",$message,true);

               // $user = $val;
                /*unset($user['password']);
    			$this->session->set_userdata('user',(object)$user);
    			$this->session->set_userdata('user_id',$val['id']);
    			$this->session->set_userdata('platform_type','custom');
    			$this->session->set_userdata('role',$val['user_type']);
    			$this->session->set_userdata('name',$val['fullname']);*/

            $response =  array(
                'error' => 0,
                'message' => $this->data['lang']['activate_account'],
            );
            echo json_encode($response); exit;
        }else{
            //$this->session->set_flashdata('serror',$val);
            $response = array(
                'error' => 1,
                'message' => $val,
            );
            echo json_encode($response); exit;
        }
		#echo $this->session->flashdata('serror');
	//	redirect(base_url());
	}
	public function resetSubmit()
	{
      //  echo '<pre>'; print_r($this->input->post('email')); exit;
	    $uinfo = $this->appmodel->checkUserExistByEmail($this->input->post('email'),'custom');

        //echo '<pre>'; print_r($uinfo); exit;
	    if($uinfo!= FALSE){

           $this->load->helper('string');
            $random_str =  random_string('alnum', 8);
            $this->db->where('id', $uinfo['id']);
            $this->db->update('users', array('forget_pass_code'=>$random_str,'modified_at'=>date('Y-m-d h:i:s')));

           /* $link = base_url().'reset-password?request_code='.$random_str;
            $link_anchor = '<a href="'.$link.'">here</a>';*/

            // $message = "Dear ".$uinfo['fullname']."<br /><br />We've recieved the reset password request from your account, kindly click $link_anchor to continue reset your password.<br /><br />If you didn't rqeuest this, kindly contact at info@octobooking.com urgently.";

            $user = $uinfo;
            $user['forget_pass_code'] = $random_str;
             $message = $this->load->view('emails/reset-password',['data'=>$user],true);
	         email_holder($this->input->post('email'),"Reset Password - Octo Booking",$message,true);
	       // $this->session->set_flashdata('serror',"An email has been sent to your account to reset your password.");
	        $response = array(
	            'error' => 0,
                'message' => $this->data['lang']['reset_your_password']
             );

	        echo json_encode($response); exit;

	    }else{
            $response = array(
                'error' => 1,
                'message' => $this->data['lang']['email_not_found']
            );

            echo json_encode($response); exit;
	      //  $this->session->set_flashdata('serror',"Email not found!");
	    }
		//redirect(base_url());
	}
	public function SubmitPasswordChange()
	{
	    //Check if old password is correct
        $where = array(
            'id' => $this->session->userdata('user_id'),
            'password' =>  md5($this->input->post('oldpassword'))
        );

       $check_user = $this->db->select('id')
            ->from('users')
            ->where($where)
            ->get()
            ->result_array();

        if(count($check_user)>0){
            $this->db->where('id',$this->session->userdata('user_id'));
            $this->db->update('users',array('password'=>md5($this->input->post('password'))));
            $this->session->set_flashdata('success','Password has changed successfully');
            redirect(base_url().'profile');
        }
        else{
            $this->session->set_flashdata('error','Old Password is wrong');
            redirect(base_url().'profile');
        }

	}
	public function confirm_current_password(){
		$user		=	$this->db->get_where('users', array('password' => md5($this->input->post('p')),'id'=>$this->session->userdata('user_id')))->row_array();
		if($user)
		echo  1;
		else
		echo  -1;
		#echo json_encode($data);
    }
	public function addtowishlist()
	{
	    $data = array(
                'venue_id' => $_POST['id'],
                'user_id'   => $this->session->userdata('user_id'),
        );
	    $is = $this->db->get_where('wishlist',$data)->row_array();
        if($is){
            $this->db->delete('wishlist',$data);
        }else{
            $data['created_at'] = date('Y-m-d h:i:s');
            $this->db->insert('wishlist',$data);
        }
	}
	public function removecart()
	{
	    $data = array(
                'rowid' => $_POST['id'],
                'qty'   => 0
        );

        $this->cart->update($data);
	}
	public function changepic(){

	    $file_name = strtolower($this->session->userdata('name')).'-'.$this->session->userdata('user_id').'-'.time();
	    $img = $this->upload_files('./upload/',$file_name,$_FILES);

	    if(isset($img['error'])){
	        $this->session->set_flashdata('error',$img['message']);
        }
	    else{
            $this->db->where('id',$this->session->userdata('user_id'));
            $this->db->update('users',array('user_img'=>$img));

            $user_data = $this->db->select('*')->from('users')->where('id',$this->session->userdata('user_id'))
                ->get()->result_array();

            $user = isset($user_data[0]) ? $user_data[0] : [];

            //echo '<pre>'; print_r($user_data); exit;
            $this->session->set_userdata('user',(object)$user);

        }
	    $redirect_url = ($this->input->post('redirect_url') ? $this->input->post('redirect_url') : 'profile');
    	redirect(base_url().$redirect_url);
	}

    private function upload_files($path, $title, $files)
    {
        $config = array(
            'upload_path'   => $path,
            'allowed_types' => 'jpg|gif|png|JPEG|jpeg',
            //'overwrite'     => 1,
        );

        $this->load->library('upload', $config);
        $fileName = $title ;

            $config['file_name'] = $fileName;

            $this->upload->initialize($config);
        $images = "";
        if ($this->upload->do_upload('picture')) {
            $d = $this->upload->data();
			$images = $d['file_name'];
			return $images;
        } else {
           // return false;
            return array(
                'error' => 1,
                'message' =>$this->upload->display_errors()
            );

        }
       // die();

    }

    public function getServicePackage()
    {
      $packages =  $this->db->select('*')
            ->from('services')
            ->where('venue_id',$_GET['venue_id'])
            ->get()->result_array();

        $venue =  $this->db->select('vendor_id,venue_name,venue_name_ar')
            ->from('venues')
            ->where('id',$_GET['venue_id'])
            ->get()->result_array();

        //echo '<pre>'; print_r($venue);
        $vendor_id = isset($venue[0]['vendor_id']) ? $venue[0]['vendor_id'] : '';


      $response = [];
      $event_date = '';
      if(count($packages) >0){

       //   echo '<pre>'; print_r($this->cart->contents()); exit;
          foreach($packages as $pack){

             $package_image =  $this->db->select('image_name')->from('gallery')
                  ->where('venue_id',$_GET['venue_id'])
                  ->where('pkg_id',$pack['id'])
                  ->get()->result_array();

              $pack['image'] = isset($package_image[0]['image_name']) ? $package_image[0]['image_name'] : '';
              $isBookable = false;


              if(sizeof($this->cart->contents()) > 0){
                  foreach ($this->cart->contents() as $items){

                      if(isset($_GET['parent_id'])){
                          if($items['id'] == $_GET['parent_id']){
                                $event_date = $items['eventdate'];
                            }
                      }
                     // echo 'cart-id'.$items['id'];
                      if($items['id'] == $pack['id']){
                          $isBookable = true;
                      }
                  }
              }


              $pack['includes'] = $this->db->select('*')
                  ->from('service_includes')
                  ->where('service_id',$pack['id'])
                  ->get()->result_array();

              $pack['is_bookable'] = $isBookable;
              $pack['vendor_id'] = $vendor_id;
              $response[] = $pack;
          }



      }

        $data['service_name'] = isset($venue[0]['venue_name']) ? displayLangText($venue[0],'venue_name') : '';
        $data['packages'] =  $response;
        $data['event_date'] = $event_date;
        //$data['venue'] = $venue;

      //echo '<pre>'; print_r($data); exit;
     // echo '<pre>'; print_r($this->cart->contents()); exit;
        $data = array_merge($data,$this->data);
        $this->load->view('service_packages',$data);
    }

    public function resetPassword()
    {
        $data['mainView'] = 'reset_password';
        $code = isset($_GET['request_code']) ? $_GET['request_code'] : '';
        $data['code'] = $code;

        if($this->input->post('is_post') && $this->input->post('forget_pass_code')){

           $user = $this->db->select('id')->from('users')->where('forget_pass_code',$this->input->post('forget_pass_code'))
            ->get()->result_array();

           //echo '<pre>'; print_r($user); exit;
           if(isset($user[0]['id'])){
               $this->db->where('id',$user[0]['id']);
               $this->db->update('users',array('password'=>md5($this->input->post('password')),
                   'forget_pass_code'=>'','modified_at'=>date('Y-m-d h:i:s'))
               );
               $this->session->set_flashdata('success', $this->data['lang']['password_reset']);
           }
           else{
               $this->session->set_flashdata('error', $this->data['lang']['invalid_user']);
           }
           // echo '<pre>'; print_r($user); exit;
            redirect('reset-password?request_code='.$this->input->post('forget_pass_code'));
        }

        //echo '<pre>'; print_r($data); exit
        $all_data = array_merge($data,$this->data);
          $this->load->vars($all_data);
        $this->load->view(MASTERVIEW);
    }

    public function editProfile()
    {
        $user = $this->session->userdata('user');

        if($this->input->post('is_post')){

            $name = $this->input->post('fullname');
            $phone = $this->input->post('phone');
            $email = $this->input->post('email');

            if($name == ''){
                $this->session->set_flashdata('error', $this->data['lang']['full_name_required']);
                redirect('edit-profile','refresh');
            }

            if($email == ''){
                $this->session->set_flashdata('error', $this->data['lang']['email_required']);
                redirect('edit-profile','refresh');
            }


            if($phone == ''){
                $this->session->set_flashdata('error', $this->data['lang']['phone_required']);
                redirect('edit-profile','refresh');
            }

           // var_dump(preg_match('/^[2-9]\d{2}[2-9]\d{2}\d{4}$/',$phone)); exit;

            if(!preg_match("/^[0-9]{3}-[0-9]{3}-[0-9]{4}$/", $phone)) {
                $this->session->set_flashdata('error', $this->data['lang']['invalid_phone']);
                redirect('edit-profile','refresh');
            }

            if($this->input->post('email') != $user->email){

                //Check email is unique or not
                $form_email = $this->input->post('email');
                $count_email = $this->db->select('id')->from('users')
                    ->where('email',$this->input->post('email'))
                    ->where('id !=',$user->id)
                ->get()->num_rows();

                if($count_email > 0) {
                    $this->session->set_flashdata('error', $this->data['lang']['email_exist']);
                    redirect('edit-profile','refresh');
                 }
            }

            //echo '<pre>'; print_r($user); exit;
           //  $this->db->where('id',$user->id);
                /*$this->db->update('users',
                    array('email'=> $form_email,
                    'phone'=>$this->input->post('phone'),
                        'fullname'=>$this->input->post('fullname'),
                        'modified_at'=>date('Y-m-d h:i:s'))
                );*/

                $date_updated = date('Y-m-d h:i:s');
                $id = $user->id;

                $q = "update users SET fullname='$name',email='$email',phone='$phone', `modified_at` = '".$date_updated."' where id='".$id."'";
             // die($q);
                $this->db->query($q);
                $this->session->set_flashdata('success', $this->data['lang']['profile_updated']);

                $user_data = $this->db->select('*')->from('users')
                    ->where('id',$user->id)->get()->result_array();


                $val = $user_data[0];
                unset($val['password']);
         //   echo '<pre>'; print_r($user_data); exit;

               $this->session->set_userdata('user',(object)$val);
                $this->session->set_userdata('user_id',$val['id']);
                $this->session->set_userdata('platform_type',$val['platform_type']);
                $this->session->set_userdata('role',$val['user_type']);
                $this->session->set_userdata('name',$val['fullname']);
                redirect('profile');
            }


        $data['user'] = $user;
        $data['active']		=	'edit_profile';
        $data['mainView'] 	= 	'edit_profile';
        $all_data = array_merge($data,$this->data);
          $this->load->vars($all_data);
        $this->load->view(MASTERVIEW);
    }

    public function cmsPage($slug)
    {
       $cms_page =  $this->db->select('*')->from('cms_pages')->where('slug',$slug)
           ->where('status',1)->get()->result_array();

       if(isset($cms_page[0])){
           $data['data'] = $cms_page[0];
       }else{
           redirect(base_url());
       }
       // die($slug);
        $data['active']		=	'cms-page';
        $data['mainView'] 	= 	'cms-page';
        $all_data = array_merge($data,$this->data);
        $this->load->vars($all_data);
        $this->load->view(MASTERVIEW);
    }

    public function subscribe()
    {
        if($this->input->post('subscribe_email') != ''){
            $email = $this->input->post('subscribe_email');
           // echo $email;
            $check_exist = $this->db->select('*')
                ->from('subscribers')
                ->where('email',trim($email))
                ->get()->num_rows();

           // echo $check_exist; exit;

            if($check_exist >0){
                $return = array('error'=>1,
                    'message' => 'you have already subscribed');
            }
            else{
                $data = array(
                    'email' => $email,
                    'created_at' => date('Y-m-d h:i:s'),
                    'status' => 1
                );
                $this->db->insert('subscribers',$data);
                $return = array('error'=>0,
                    'message' => $this->data['lang']['success_subscribe']);
            }
            echo json_encode($return); exit;
        }
    }

    public function activateUser()
    {
       $activation_code = $this->input->get('code', TRUE);

       $data['page_title'] = $this->data['lang']['sorry'];
       $data['page_text'] = $this->data['lang']['hit_wrong_url'];

       if(!empty($activation_code)) {

           $val = $this->db->select('*')
               ->from('users')
               ->where('activation_code', trim($activation_code))
               ->get()->result_array();

           if (isset($val[0])) {

               $user = $val[0];
               $this->db->where('id', $user['id']);
               $this->db->update('users', array('activation_code'=>'',
                   'status' => 1,
                   'modified_at'=>date('Y-m-d h:i:s')));

               unset($user['password']);
               $user['activation_code'] = '';
               $this->session->set_userdata('user', (object)$user);
               $this->session->set_userdata('user_id', $user['id']);
               $this->session->set_userdata('platform_type', 'custom');
               $this->session->set_userdata('role', $user['user_type']);
               $this->session->set_userdata('name', $user['fullname']);

               $data['page_title'] = $this->data['lang']['welcome'];
               $data['page_text'] = $this->data['lang']['welcome_text'];
           }
       }

        $data['active']		=	'activate-user';
        $data['mainView'] 	= 	'activate-user';
        $all_data = array_merge($data,$this->data);
         $this->load->vars($all_data);
        $this->load->view(MASTERVIEW);


      //  redirect(base_url(),'refresh');

    }

    public function getVenuePrice()
    {
        if($this->input->post('venue_id')){

            $venue = $this->db->select('price,day_prices,unit_price')
                ->from('venues')
                ->where('id',$this->input->post('venue_id'))
                ->get()->row_array();

           //echo '<pre>'; print_r($venue);
            $price = $venue['price'];
            $data = array('price'=>$price,'unit_price'=>$venue['unit_price']);

            $day = date('l',strtotime($this->input->post('event_date')));
            $day = strtolower($day);

            if(isset($venue['day_prices']) && !empty($venue['day_prices'])){
                $day_prices = json_decode($venue['day_prices'],true);

                foreach($day_prices as $day_price){
                    if($day_price['day'] == $day){
                        $data = $day_price;
                        break;
                    }
                }

               // $price = isset($day_prices[$day]) ? $day_prices[$day] : $venue['day_prices'];
            }

            echo json_encode($data);
            exit;

        }
    }

    /**
     * Rating Review
     */
    public function ratingSubmit()
    {
        //echo '<pre>'; print_r($this->input->post()); exit;
        $data = array(
            'venue_id' => $this->input->post('venue_id'),
            'user_id' => $this->session->userdata('user_id'),
            'rating' => $this->input->post('rating'),
            'review' => $this->input->post('review'),
            'created_at' => date('Y-m-d h:i:s')
        );
       // echo '<pre>'; print_r($data); exit;
        $this->db->insert("rating_reviews",$data);
        $arr = array(
            'error' => 0,
            'message' => 'your rating has saved successfully.'
        );
        echo json_encode($arr);
        exit;
    }
}
