<?php 

class Appmodel extends CI_Model {

	public function __construct()
	{
			parent::__construct();
	}
	public function getVenueTypes(){
	    $query = "SELECT DISTINCT(venue_type) AS venue_type				
					FROM 
					venues	 ";
		$query = $this->db->query($query);
		return $query->result_array();
	}
	public function getPackagesByVendor($venue_id){

		//$query = "SELECT max(id) as id,service_name,venue_id,service_price,(SELECT * FROM gallery g WHERE g.pkg_id = services.id LIMIT 1) as img_name FROM services WHERE venue_id = '".$venue_id."'  GROUP BY service_name";
		$query = "SELECT s.id, s.service_name,
s.service_name_ar,
s.venue_id,s.service_price,g.image_name 
FROM 
services s
INNER JOIN gallery g
ON g.pkg_id = s.id
WHERE s.venue_id = '".$venue_id."'";
		$query = $this->db->query($query);
		if($query->num_rows()>0){

		    $results = $query->result_array();

           // echo '<pre>'; print_r($results);
		    $packages = [];
		    foreach($results as $result){

		        $row = $result;
		       $row['includes'] = $this->db->select('*')
                    ->from('service_includes')
                    ->where('service_id',$result['id'])
                    ->get()->result_array();

		        $packages[] = $row;
            }
          //  echo '<pre>'; print_r($packages); exit;
			return $packages;
		}else{
			return false;
		}
	}
	
	public function userConnect($email,$password){
		$query = "SELECT u.*					
					FROM 
					users u
					WHERE u.email = '".$email."' AND u.password = '".md5($password)."' 
					AND u.status = '1' ";
		$query = $this->db->query($query);
		if($query->num_rows()>0){
			return array("type"=>1,"val"=>$query->row_array());
		}else{
			return array("type"=>0,"val"=>"Wrong Email or Password!");
		}
	}
	public function userInfo($id,$fbid,$gid,$email,$status = true){
		$subQuery = "";
		if($id!=""){
			$subQuery = " AND u.id = '".$id."' ";
		}/*elseif($fbid!=""){
			$subQuery = " AND u.user_fbid = '".$fbid."' ";
		}elseif($gid!=""){
			$subQuery = " AND u.user_googleid = '".$gid."' ";
		}*/elseif($email!=""){
			$subQuery = " AND u.email = '".$email."' ";
		}


		if($status){
		    $subQuery .= ' AND u.status = 1';
        }
		else{
		    $subQuery .= ' AND u.status = 0';
        }

		 $query = "SELECT 	
					u.*
					FROM 
					users u
					WHERE  1= 1
					 $subQuery  ";
		$query = $this->db->query($query);
		if($query->num_rows()>0){
			return $query->row_array();
		}else{
			return FALSE;
		}
	}

	public function checkSocialUser($platform_type,$platform_id)
    {
        $subQuery = " AND platform_type = '".$platform_type."' AND platform_id = '".$platform_id."'";
         $query = "SELECT 	
					u.*
					FROM 
					users u
					WHERE  u.status = '1' 
					 $subQuery  ";
        $query = $this->db->query($query);
        if($query->num_rows()>0){
            return $query->row_array();
        }else{
            return FALSE;
        }
    }

	public function userInfoByGmailId($gmailid,$firstname,$lastname,$email,$picture){
		$query = "SELECT 	
					u.*
					
					FROM 
					dofr_users u
					WHERE u.user_googleid = '".$gmailid."' ";
		$query = $this->db->query($query);
		$data = array(
			'user_firstname'=>$firstname,
			'user_lastname'	=>$lastname,
			//'user_username'	=>$username,
			'user_email'	=>$email,
			//'user_gender'	=>$gender,
			'user_picture'	=>$picture,
			'user_lastlogin'=>date('Y-m-d H:i:s')
				);
		if($query->num_rows()>0){
			$this->db->where('user_googleid',$gmailid);
			$this->db->update('seedos_users',$data);
			return array("1",$query->row_array());
		}else{
			$data['user_googleid']	=	$gmailid;
			$this->db->insert('seedos_users',$data);
			$query1 = $this->db->query($query);
			return array("1",$query1->row_array());
		}
	}
	
	function userRegister($data){
        $uinfo = $this->userInfo("","","",$data['email']);
        #var_dump($uinfo);
        if($uinfo === FALSE){
		$date = date("Y-m-d H:i:s");
		$data = array(
				'user_type'	=> $data['type'],
				'fullname' => $data['fullname'],
				'password' => md5($data['password']),
				'email' => $data['email'],
				'phone' => $data['phone'],
				'status' => 1,//($type == 2)?0:1,
				'package' => (isset($data['package']) && $data['package'] != "")?$data['package']:0,
				'created_at' => $date,
				'activation_code' => $data['activation_code'],
				'status' => 0,
				'created_at' => $date,
			);
			$this->db->insert("users",$data);
			$UserId = $this->db->insert_id();
			$user = $this->userInfo($UserId,"","","",false);

			//if($type == 2)
		    //	return array("0","Your request has been received, you will be notified via email when admin approved your account.");
		//	else
		    	return array("type"=>"1","val"=>$user);
        }else{
            return array("type"=>"0","val"=>"User already registered");
        }
			
	}
	function insertListing($data){
		//$service = $data['service'];
		//$servicedesc = $data['servicedesc'];
	//	$serviceprice = $data['serviceprice'];
		$date = date("Y-m-d H:i:s");

        $day_prices = '';
		if(count($data['day'])> 0 && count($data['day_price'])> 0 && count($data['price_unit'])){

            $day_prices = [];
		    foreach($data['day'] as $day_key => $day){

                $row = array(
                    'day' => $day,
                    'price' => $data['day_price'][$day_key],
                    'price_unit' => $data['price_unit'][$day_key]
                );

                $day_prices[] = $row;
            }
           // $day_prices = array_combine($data['day'],$data['day_price']);
            $day_prices = json_encode($day_prices);
        }

		//echo $day_prices; exit;

		$dataArray = array(
				'venue_name'	=> $data['title'],
				'venue_name_ar'	=> $data['title_ar'],
				'type'	=> 'venue',
				'description' => $data['desc'],
				'description_ar' => $data['desc_ar'],
				'amenities' => implode(",",$data['amenities']),
				'suitable' => implode(",",$data['suitable']),
				'capacity_from' => $data['from'],
				'capacity_to' => $data['to'],
				'price' => $data['price'],
				'unit_price' => $data['unitprice'],
				'location' => $data['location'],
				'venue_services' => (isset($data['services']))?implode(",",$data['services']):"",
				'longitude' => $data['longitude'],
				'latitude' => $data['latitude'],
				'venue_type' => $data['venuetype'],
				'vendor_id' => $this->session->userdata('user_id'),
                'day_prices' => $day_prices
			);

		//echo '<pre>'; print_r($dataArray); exit;
			if($data['serviceid']!=""){
			    $this->db->where('id',$data['serviceid']);
			    $this->db->update('venues',$dataArray);
			    $venuesId = $data['serviceid'];
			}else{
				$data['created_at'] = $date;
    			$this->db->insert("venues",$dataArray);
    			$venuesId = $this->db->insert_id();

			}
			return $venuesId;
	}
	function insertServiceListing($data){
		$date = date("Y-m-d H:i:s");
		$dataArray = array(
				'cat_id'	=> $data['category'],
				'venue_name'	=> $data['title'],
				'type'	=> 'service',
				'description' => $data['desc'],
				'vendor_id' => $this->session->userdata('user_id'),
                'venue_name_ar' => $data['title_ar'],
                'description_ar' => $data['desc_ar']
 			);
			if($data['serviceid']!=""){
			    $this->db->where('id',$data['serviceid']);
			    $this->db->update('venues',$dataArray);
			    $venuesId = $data['serviceid'];
			}else{
				$data['venue_status'] = 1;
				$data['created_at'] = $date;
    			$this->db->insert("venues",$dataArray);
    			$venuesId = $this->db->insert_id();

			}
			return $venuesId;
	}
    public function get_bookings($type,$vendor_id,$id,$getr)
    {
        $subQuery = " 1=1 ";
        $groupBy = "";
        $join = '';
        if($id != ""){
            $join .= " LEFT JOIN booking_items bi ON bi.booking_id = b.id";
            $subQuery .= " AND b.id  = '".$id."' ";
        }else{
            if($type== "bookings"){

                $join .= 'LEFT JOIN booking_items bi ON bi.booking_id = b.id ';
                $subQuery .= "  AND bi.vendor_id  = '".$vendor_id."' ";
                $groupBy = ' GROUP BY bi.booking_id';

        	    if(isset($getr['type']) && $getr['type'] != ""){
        	        $subQuery .= " AND bi.type = '".$getr['type']."' ";
        	    }
         	    if(isset($getr['user']) && $getr['user'] != ""){
        	        $subQuery .= " AND ((b.email LIKE '%".$getr['user']."%') OR (b.fullname LIKE '%".$getr['user']."%') OR (b.phone LIKE '%".$getr['user']."%') ) ";
        	    }
         	    if(isset($getr['date']) && $getr['date'] != ""){
        	        $subQuery .= " AND bi.eventdate = '".$getr['date']."' ";
        	    }

            }
            else{
                $subQuery .= "  AND b.user_id  = '".$vendor_id."' ";
            }
        }
 
		$query = "SELECT b.* FROM `bookings` b
                $join
            /*LEFT JOIN venues v ON v.id = b.venue_id*/
            LEFT JOIN users u ON u.id = b.user_id
            WHERE $subQuery
            $groupBy
            ORDER BY b.id DESC ";
		$query = $this->db->query($query);
		if($query->num_rows()>0){
			return $query->result_array();
		}else{
			return FALSE;
		}
    }

    /**
     * @param $id
     * @return bool
     */
    public function getBookingDetail($type,$user_id,$id)
    {
       //$join = " LEFT JOIN booking_items bi ON bi.booking_id = b.id";
        $subQuery = " b.id  = '".$id."' ";
       $groupBy = $join = '';

        /*if($type == 'booking'){
            $join .= ' LEFT JOIN booking_items bi ON b.id = bi.booking_id';
            $groupBy = 'GROUP BY bi.booking_id';
            $subQuery .= ' AND bi.vendor_id = '.$user_id;
        }
        else{
            $subQuery .= ' AND b.user_id = '.$user_id;
        }*/

         $query = "SELECT b.*
                    FROM `bookings` b
                    $join
            /*LEFT JOIN venues v ON v.id = b.venue_id*/
            LEFT JOIN users u ON u.id = b.user_id
            WHERE $subQuery
            $groupBy
            ORDER BY b.id DESC ";
        $query = $this->db->query($query);
        if($query->num_rows()>0){
            $booking =  $query->result_array();

           // echo $booking[0]['id']
         $order_items  = $this->db->select('*')
                ->from('booking_items')
                ->where('booking_id',$booking[0]['id'])
            ->get()->result_array();

         $booking_items = [];
         if(count($order_items)>0){
             foreach($order_items as $order_item)
             {
                 $venue = $this->db->select('venue_name,venue_name_ar')
                     ->from('venues')
                     ->where('id',$order_item['venue_id'])->get()->result_array();

                 $order_item['venue_name_ar'] = (isset($venue[0]['venue_name_ar']) && !empty($venue[0]['venue_name_ar'])) ? $venue[0]['venue_name_ar'] : $venue[0]['venue_name'];

                 if(!empty($order_item['package_id'])) {
                     $service = $this->db->select('service_name,service_name_ar')
                         ->from('services')
                         ->where('id', $order_item['package_id'])->get()->result_array();
                 }

                // echo '<pre>'; print_r($service);

                 $order_item['package_name_ar'] = (isset($service[0]['service_name_ar']) && !empty($service[0]['service_name_ar'])) ? $service[0]['service_name_ar'] : $service[0]['service_name'];

                 $booking_items[] = $order_item;
             }
         }

        // var_dump($order_items); exit;
         return array('booking'=> $booking[0],
             'booking_items'=>$booking_items);

        }else{
            return FALSE;
        }
    }

	function get_search($getr,$limit = PAGE_LIMIT,$start = 0){

	    $subQuery = "";

        if(isset($getr['category']) && $getr['category'] != ""){
            // $subQuery .= " AND v.id = '".$getr['category']."' ";
            $this->db->select('id');
            $this->db->from('venues');
            $this->db->where('venues.type', 'service');
            $this->db->where('venues.cat_id', $getr['category']);
            $q = $this->db->get();
            $venues = $q->result();
            $this->db->flush_cache();

            $venue_arr = [];
            if(count($venues)>0){
                foreach ($venues as $venue){
                    $venue_arr[] = $venue->id;
                }

                //echo '<pre>'; print_r($venue_arr); exit;
                $venue_str = implode(',',$venue_arr);
                // $venue_str = substr_replace($venue_str ,"",-1);
                 $subQuery .= " AND v.venue_services IN ($venue_str)";
              $this->db->where_in('v.venue_services',$venue_arr);
               // echo $this->db->last_query(); die;
            }

            // echo '<pre>'; print_r($subQuery); exit;
        }

        if(isset($getr['event']) && $getr['event'] != ""){
            $event = $this->db->get_where('categories', array('id' => $getr['event']))->row_array();
            $subQuery .= " AND v.suitable LIKE '%".$event['cat_name']."%' ";
            $this->db->like('v.suitable', $event['cat_name'], 'both');
        }

        if(isset($getr['search']) && $getr['search'] != ""){
	        #$location = $this->db->get_where('categories', array('cat_name' => ($getr['search'])))->row_array();
	        $subQuery .= " AND v.location LIKE '".urldecode($getr['search'])."' ";
            $this->db->like('v.location', urldecode($getr['search']), 'both');
        }

	    if(isset($getr['capacity']) && $getr['capacity'] != ""){
	        
	        if($getr['capacity'] != 501){
	            $subQuery .= " AND v.capacity_from >= '".($getr['capacity']-100)."' AND v.capacity_to <= '".($getr['capacity'])."'  ";
                $this->db->where('v.capacity_from >=',$getr['capacity']-100);
                $this->db->where('v.capacity_to <=',$getr['capacity']);
	        }else{
	            $subQuery .= " AND v.capacity_to >= '".$getr['capacity']."'  ";
                $this->db->where('v.capacity_to >=',$getr['capacity']);
	        }
	    }
	    if(isset($getr['budget']) && $getr['budget'] != ""){
	        if($getr['budget'] != 401){
	            $subQuery .= " AND v.price <= '".$getr['budget']."' ";
                $this->db->where('v.price <=',$getr['budget']);
	        }else{
	            $subQuery .= " AND v.price >= '".$getr['budget']."'  ";
	            $this->db->where('v.price >=',$getr['budget']);

	        }
	    }

        if(isset($getr['venuetype']) && $getr['venuetype'] != ""){
            $subQuery .= " AND v.venue_type = '".$getr['venuetype']."'";
            $this->db->where('v.venue_type', $getr['venuetype']);
        }

        $queryPart = "";
        if(isset($getr['event_date']) && !empty($getr['event_date'])){
            $subQuery .= 'AND v.id not in (select b.venue_id from bookings b where b.eventdate = "'.$getr['event_date'].'")';
            $this->db->where('v.id NOT IN (select distinct b.venue_id from booking_items b where b.eventdate = "'.$getr['event_date'].'")', NULL, FALSE);
        }

        if(!empty($subQuery)) {

          $q =  $this->db->select("v.*,(SELECT image_name FROM gallery g WHERE g.venue_id = v.id LIMIT 1 ) as image ")
                ->from('venues v')
                ->where('v.type','venue')
                ->where('v.venue_status',1)
              ->where('v.id NOT IN (select venue_id from walking_bookings)',NULL,FALSE);

           // $this->db->where_in('v.venue_services',$venue_arr);

             $filtered_count = $this->db->count_all_results('', false);

            //limit your results and get the rows
            $this->db->limit($limit, $start);
            $results = $this->db->get()->result_array();
           //  echo $this->db->last_query(); die;

            return array(
                'results' => ($filtered_count > 0) ? $results : [],
                'total' =>  $filtered_count
            );

           // echo '<pre>'; print_r($results); exit;
           /* $query = "SELECT v.*,(SELECT image_name FROM gallery g WHERE g.venue_id = v.id LIMIT 1 ) as image
                    FROM venues v  WHERE type= 'venue' AND v.venue_status = 1 $subQuery ";*/


           // $query = $this->db->query($query);
           // return $results;
        }else{
            return [];
        }
	}

	function get_search_service($getr,$id = "",$limit = false,$start = false){

	    $subQuery = " WHERE type='service' AND v.venue_status = 1  ";
	    $this->db->where('v.type','service');
	    $this->db->where('v.venue_status',1);

	    if(isset($getr['name']) && $getr['name'] != ""){
	        
	        $subQuery .= " AND v.venue_name LIKE '%".urldecode($getr['name'])."%' ";
	        $this->db->like('v.venue_name',urldecode($getr['name']),'both');
	    }
	    if(isset($getr['cat']) && $getr['cat'] != ""){
	        $subQuery .= " AND v.cat_id = '".$getr['cat']."' ";
	        $this->db->where('v.cat_id',$getr['cat']);
	    }
	    if($id != ""){
	        $subQuery .= " AND v.id = '".$id."' ";
            $this->db->where('v.id',$id);
	    }
		//$query = "SELECT v.*,(SELECT image_name FROM gallery g WHERE g.venue_id = v.id AND pkg_id = 0 LIMIT 1 ) as image,(SELECT service_price FROM services s WHERE s.venue_id = v.id ORDER BY s.id ASC LIMIT 1 ) as service_price FROM venues v  $subQuery ";
		$this->db->select('v.*,(SELECT image_name FROM gallery g WHERE g.venue_id = v.id AND pkg_id = 0 LIMIT 1 ) as image,(SELECT service_price FROM services s WHERE s.venue_id = v.id ORDER BY s.id ASC LIMIT 1 ) as service_price')
            ->from('venues v');
        $filtered_count = $this->db->count_all_results('', false);

        //limit your results and get the rows
        if($limit){
            $this->db->limit($limit, $start);
        }

        $results = $this->db->get()->result_array();
        // echo $this->db->last_query(); die;

        return array(
            'results' => ($filtered_count > 0) ? $results : [],
            'total' =>  $filtered_count
        );

       /* $query = $this->db->query($query);
		if($query->num_rows()>0){
			return $query->result_array();
		}*/
	}
	function saveSettings($timefrom,$timeto,$userid,$isreceive){
		$query = "UPDATE dofr_users SET user_timefrom = '".$timefrom."',
		user_timeto = '".$timeto."',user_isreceive = '".$isreceive."'
				WHERE  user_id = '".$userid."' ; ";
		$query = $this->db->query($query);
		return array("1",$this->userInfo($userid,"","",""));
	}
	function getSearchLocations($userid){
		$subQuery = "";
		if($userid != ""){
			$subQuery = " WHERE u.user_id = '".$userid."' ";
		}
		$query = "SELECT 
					a.location_id AS LocationId,
					a.location_name AS LocationName
					
					  FROM dofr_areas a INNER JOIN dofr_users u
					ON u.user_city = a.location_city $subQuery GROUP BY a.location_id; ";
		$query = $this->db->query($query);
		if($query->num_rows()>0){
			return array("1",$query->result_array());
		}
	}

    /**
     * @param $email
     * @param $platform_type
     * @return bool
     */
    public function checkUserExistByEmail($email,$platform_type)
    {
        $subQuery = " AND u.platform_type = '".$platform_type."' AND u.email = '".$email."'";
         $query = "SELECT 	
					u.*
					FROM 
					users u
					WHERE  u.status = '1' 
					 $subQuery  ";
        $query = $this->db->query($query);
        if($query->num_rows()>0){
            return $query->row_array();
        }else{
            return FALSE;
        }
    }

}