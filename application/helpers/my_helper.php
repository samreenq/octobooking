<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('get_stripcats'))
{
    function get_stripcats($var = '')
    {
        $ci=& get_instance();
        $data['type'] = $var;
        $data['status'] = 1;
        $query = $ci->db->get_where('categories', $data)->result_array();
        return $query;
    }   
}
if ( ! function_exists('get_categoryname'))
{
    function get_categoryname($var = '')
    {
        $ci=& get_instance();
        $data['id'] = $var;
        $query = $ci->db->get_where('categories', $data)->row_array();
        return $query;
    }   
}
if ( ! function_exists('get_my_wishlist'))
{
    function get_my_wishlist($id = '')
    {
        $ci=& get_instance();
        $data['user_id'] = $id;
        $query = $ci->db->get_where('wishlist', $data)->result_array();
        return array_column($query,'venue_id');
    }   
}
if ( ! function_exists('getCatInfoByType'))
{
    function getCatInfoByType($type,$name)
    {
        $ci=& get_instance();
        $data['cat_name'] = $name;
        $data['type'] = $type;
        $query = $ci->db->get_where('categories', $data)->row_array();
        return $query;
    }   
}

if ( ! function_exists('getVenueCountByCat'))
{
    function getVenueCountByCat($event_name)
    {
        $ci=& get_instance();
       // $data['cat_id'] = $id;
        $query = $ci->db->select('count(id) as total')->from('venues')
           // ->where('cat_id',$id)
            ->like('suitable', $event_name, 'both')
            ->get()
            ->row_array();

       //echo '<pre>'; print_r($query); exit;
        return (isset($query['total']) && $query['total'] >0) ? $query['total']-1 : 0;
    }
}
if ( ! function_exists('get_reviews'))
{
    function get_reviews()
    {
        $ci=& get_instance();
        $data['status'] = 1;
        $query = $ci->db->get_where('reviews', $data)->result_array();
        return $query;
    }   
}
if ( ! function_exists('get_counts'))
{
    function get_counts($type,$value)
    {
        $ci=& get_instance();
        if($type == "suitable"){
            $ci->db->select('id');
            $ci->db->from('venues');
            $ci->db->where('venue_status',1);
            $ci->db->like('suitable',$value);
            return count($ci->db->get()->result_array());
        }else{
		    $data		=	$ci->db->get_where('venues', array($type => $value,'venue_status' => 1))->result_array();
        }
        return count($data);
    }   
}
if ( ! function_exists('get_pkg_includes'))
{
    function get_pkg_includes($name)
    {
        $ci=& get_instance();
		$data		=	$ci->db->get_where('services', array('service_name' => $name))->result_array();
        return $data;
    }   
}
if ( ! function_exists('showAsLang'))
{
    function showAsLang($type,$field)
    {
        $ci=& get_instance();
        #$ci->load->library('session');
        if($ci->session->userdata('site_lang') =="ar"){
            if($type=="name"){
                return ($field['venue_name_ar'] == "")?$field['venue_name']:$field['venue_name_ar'];
            }
            if($type=="desc"){
                return ($field['description_ar'] == "")?$field['description']:$field['description_ar'];
            }
        }else{
            if($type=="name"){
                return ($field['venue_name'] == "")?$field['venue_name_ar']:$field['venue_name'];
            }
            if($type=="desc"){
                return ($field['description'] == "")?$field['description_ar']:$field['description'];
            }
        }
		$data		=	$ci->db->get_where('services', array('service_name' => $name))->result_array();
        return $data;
    }   
}
if ( ! function_exists('email_holder'))
{
    function email_holder($to,$subject,$message,$template = false)
    {
        $ci=& get_instance();
        if(!$template) {
            $html = '<table class="wrapper" style="border-collapse: collapse;table-layout: fixed;min-width: 320px;width: 100%;background-color: #fff;" cellpadding="0" cellspacing="0" role="presentation"><tbody><tr><td>
      <div role="banner">
        <div class="preheader" style="Margin: 0 auto;max-width: 560px;min-width: 280px; width: 280px;width: calc(28000% - 167440px);">
          <div style="border-collapse: collapse;display: table;width: 100%;">
          <!--[if (mso)|(IE)]><table align="center" class="preheader" cellpadding="0" cellspacing="0" role="presentation"><tr><td style="width: 280px" valign="top"><![endif]-->
            <div class="snippet" style="display: table-cell;Float: left;font-size: 12px;line-height: 19px;max-width: 280px;min-width: 140px; width: 140px;width: calc(14000% - 78120px);padding: 10px 0 5px 0;color: #adb3b9;font-family: sans-serif;">
              
            </div>
          <!--[if (mso)|(IE)]></td><td style="width: 280px" valign="top"><![endif]-->
            <div class="webversion" style="display: table-cell;Float: left;font-size: 12px;line-height: 19px;max-width: 280px;min-width: 139px; width: 139px;width: calc(14100% - 78680px);padding: 10px 0 5px 0;text-align: right;color: #adb3b9;font-family: sans-serif;">
              <p style="Margin-top: 0;Margin-bottom: 0;">No images? <a style="text-decoration: underline;transition: opacity 0.1s ease-in;color: #adb3b9;" href="http://preview20030902.createsend1.com/t/t-e-nhldrtl-l-r/" target="_blank">Click here</a></p>
            </div>
          <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
          </div>
        </div>
        <div class="header" style="Margin: 0 auto;max-width: 600px;min-width: 320px; width: 320px;width: calc(28000% - 167400px);" id="emb-email-header-container">
        <!--[if (mso)|(IE)]><table align="center" class="header" cellpadding="0" cellspacing="0" role="presentation"><tr><td style="width: 600px"><![endif]-->
          <div class="logo emb-logo-margin-box" style="font-size: 26px;line-height: 32px;Margin-top: 6px;Margin-bottom: 20px;color: #c3ced9;font-family: Roboto,Tahoma,sans-serif;Margin-left: 20px;Margin-right: 20px;" align="center">
            <div class="logo-center" align="center" id="emb-email-header"><img style="display: block;height: auto;width: 100%;border: 0;max-width: 171px;" src="https://i1.createsend1.com/ei/t/D1/CDD/37D/012115/csfinal/logo.png" alt="" width="171"></div>
          </div>
        <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
        </div>
      </div>
      <div>
      <div class="layout one-col fixed-width stack" style="Margin: 0 auto;max-width: 600px;min-width: 320px; width: 320px;width: calc(28000% - 167400px);overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;">
        <div class="layout__inner" style="border-collapse: collapse;display: table;width: 100%;background-color: #ffffff;">
        <!--[if (mso)|(IE)]><table align="center" cellpadding="0" cellspacing="0" role="presentation"><tr class="layout-fixed-width" style="background-color: #ffffff;"><td style="width: 600px" class="w560"><![endif]-->
          <div class="column" style="text-align: left;color: #8e959c;font-size: 14px;line-height: 21px;font-family: sans-serif;">
        
            <div style="Margin-left: 20px;Margin-right: 20px;">
      <div style="mso-line-height-rule: exactly;line-height: 50px;font-size: 1px;">&nbsp;</div>
    </div>
        
            <div style="Margin-left: 20px;Margin-right: 20px;">
      <div style="mso-line-height-rule: exactly;mso-text-raise: 11px;vertical-align: middle;">
        ' . $message . '
      </div>
    </div>
        
          </div>
        <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
        </div>
      </div>
  
      <div style="mso-line-height-rule: exactly;line-height: 20px;font-size: 20px;">&nbsp;</div>
  
      
      <div role="contentinfo">
        <div class="layout email-footer stack" style="Margin: 0 auto;max-width: 600px;min-width: 320px; width: 320px;width: calc(28000% - 167400px);overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;">
          <div class="layout__inner" style="border-collapse: collapse;display: table;width: 100%;">
          <!--[if (mso)|(IE)]><table align="center" cellpadding="0" cellspacing="0" role="presentation"><tr class="layout-email-footer"><td style="width: 400px;" valign="top" class="w360"><![endif]-->
            <div class="column wide" style="text-align: left;font-size: 12px;line-height: 19px;color: #adb3b9;font-family: sans-serif;Float: left;max-width: 400px;min-width: 320px; width: 320px;width: calc(8000% - 47600px);">
              <div style="Margin-left: 20px;Margin-right: 20px;Margin-top: 10px;Margin-bottom: 10px;">
                
                <div style="font-size: 12px;line-height: 19px;">
                  
                </div>
                <div style="font-size: 12px;line-height: 19px;Margin-top: 18px;">
                  
                </div>
                <!--[if mso]>&nbsp;<![endif]-->
              </div>
            </div>
          <!--[if (mso)|(IE)]></td><td style="width: 200px;" valign="top" class="w160"><![endif]-->
            <div class="column narrow" style="text-align: left;font-size: 12px;line-height: 19px;color: #adb3b9;font-family: sans-serif;Float: left;max-width: 320px;min-width: 200px; width: 320px;width: calc(72200px - 12000%);">
              <div style="Margin-left: 20px;Margin-right: 20px;Margin-top: 10px;Margin-bottom: 10px;">
                
              </div>
            </div>
          <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
          </div>
        </div>
        <div class="layout one-col email-footer" style="Margin: 0 auto;max-width: 600px;min-width: 320px; width: 320px;width: calc(28000% - 167400px);overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;">
          <div class="layout__inner" style="border-collapse: collapse;display: table;width: 100%;">
          <!--[if (mso)|(IE)]><table align="center" cellpadding="0" cellspacing="0" role="presentation"><tr class="layout-email-footer"><td style="width: 600px;" class="w560"><![endif]-->
            <div class="column" style="text-align: left;font-size: 12px;line-height: 19px;color: #adb3b9;font-family: sans-serif;">
              <div style="Margin-left: 20px;Margin-right: 20px;Margin-top: 10px;Margin-bottom: 10px;">
                <div style="font-size: 12px;line-height: 19px;">
                  
                </div>
              </div>
            </div>
          <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
          </div>
        </div>
      </div>
      <div style="line-height:40px;font-size:40px;">&nbsp;</div>
    </div></td></tr></tbody></table>';
        }
        else{
            $html = $message;
        }
        $from_email = "info@octobooking.com";
        $to_email = $to;
        //$to_email = 'samreenquyyum17@gmail.com';
        //Load email library
        $ci->load->library('email');
        $config['protocol'] = 'sendmail';
        $config['mailpath'] = '/usr/sbin/sendmail';
        $config['charset'] = 'iso-8859-1';
        $config['wordwrap'] = TRUE;
        $config['mailtype'] = 'html';

     //   $config['smtp_host'] = 'smtp.googlemail.com';
      //  $config['smtp_user'] = 'developers.silicongraphics@gmail.com';
      //  $config['smtp_pass'] = 'Salsoft@123';
      //  $config['smtp_port'] = 587;
      // $config['smtp_crypto'] = 'tls';
       // echo $html; exit;

        $ci->email->initialize($config);
        $ci->email->from($from_email, 'Octo Booking');
        $ci->email->to($to_email);
        $ci->email->subject($subject);
        $ci->email->message($html);
        //Send mail
        $c = $ci->email->send(false);
        //var_dump($c);
      // echo $ci->email->print_debugger();exit;
    }

     function displayLangText($array,$index,$ucword = false)
     {
        // print_r($array); echo $index;
         $CI = get_instance();
         $CI->load->library('session');
         $site_lang = $CI->session->userdata('site_lang');

         if($site_lang == 'ar'){
             return isset($array[$index.'_'.$site_lang]) ? $array[$index.'_'.$site_lang] : $array[$index];
         }
         else{
             return ($ucword) ? ucwords($array[$index]) : $array[$index];
         }

     }

    function modifyText($str) {
        $CI = get_instance();
        $CI->load->library('session');
        $site_lang = $CI->session->userdata('site_lang');

        if($site_lang == 'ar'){
            return $str;
        }
         return ucwords(str_replace("_", " ", $str));
    }

    function langText($str,$lang)
    {
        $CI = get_instance();
        $CI->load->library('session');
        $site_lang = $CI->session->userdata('site_lang');

        if($site_lang == 'ar'){
            return $lang[$str];
        }
        return ucwords($str);
    }

     function packageBookedOrNot($cart,$package_id)
     {
         if(count($cart)>0){
             foreach($cart as $item){
                 if($item['package_id'] == $package_id){
                     return true;
                 }
             }
         }
         return false;
     }


}