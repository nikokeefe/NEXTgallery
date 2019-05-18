<?php
if ( ! defined( 'ABSPATH' ) ) exit;
class MSFPluginOps_Ajax_Requests {

	function __construct(){

		$this->_init();
		$this->_hooks();
		$this->_filters();

	}

	function _init(){
	}

	function _hooks(){

		//add_action( 'wp_ajax_nopriv_smfb_admin_data', array( $this,'ulpb_admin_ajax')  );
		add_action( 'wp_ajax_smfb_admin_data', array( $this,'smfb_admin_ajax') );

		add_action( 'wp_ajax_smfb_settings_data', array( $this,'smfb_settings_page_ajax') );

		add_action( 'wp_ajax_nopriv_smfb_subscribeForm_data', array( $this,'smfb_subscribeForm_ajax')  );
		add_action( 'wp_ajax_smfb_subscribeForm_data', array( $this,'smfb_subscribeForm_ajax') );

		add_action( 'wp_ajax_nopriv_smfb_formBuilderEmail_ajax', array( $this,'smfb_formBuilderEmail_ajax')  );
		add_action( 'wp_ajax_smfb_formBuilderEmail_ajax', array( $this,'smfb_formBuilderEmail_ajax') );

		add_action( 'wp_ajax_nopriv_smfb_subscribeForm_mailchimp_data', array( $this,'smfb_subscribeForm_mailchimp_ajax')  );
		add_action( 'wp_ajax_smfb_subscribeForm_mailchimp_data', array( $this,'smfb_subscribeForm_mailchimp_ajax') );

		add_action( 'wp_ajax_nopriv_smfb_cta_click_conversion_record', array( $this,'smfb_cta_click_conversion_record')  );
		add_action( 'wp_ajax_smfb_cta_click_conversion_record', array( $this,'smfb_cta_click_conversion_record') );

		//add_action( 'wp_ajax_nopriv_smfb_loadShortcode_content', array( $this,'smfb_loadShortcode_content')  );
		add_action( 'wp_ajax_smfb_loadShortcode_content', array( $this,'smfb_loadShortcode_content') );

		//add_action( 'wp_ajax_nopriv_smfb_get_global_row_content', array( $this,'smfb_get_global_row_content')  );
		add_action( 'wp_ajax_smfb_get_global_row_content', array( $this,'smfb_get_global_row_content') );

		//add_action( 'wp_ajax_nopriv_smfb_insert_template', array( $this,'smfb_insert_template')  );
		add_action( 'wp_ajax_smfb_insert_template', array( $this,'smfb_insert_template') );

		//add_action( 'wp_ajax_nopriv_smfb_subscribe_list_empty', array( $this,'smfb_subscribe_list_empty_wp_ajax')  );
		add_action( 'wp_ajax_smfb_subscribe_list_empty', array( $this,'smfb_subscribe_list_empty_wp_ajax') );

		//add_action( 'wp_ajax_nopriv_smfb_activate_pb_request', array( $this,'smfb_update_pagebuilder_active_option')  );
		add_action( 'wp_ajax_smfb_activate_pb_request', array( $this,'smfb_update_pagebuilder_active_option') );

		add_action( 'wp_ajax_smfb_empty_form_builder_data', array( $this,'smfb_empty_form_builder_data') );

		add_action( 'wp_ajax_smfb_delete_form_builder_entry', array( $this,'smfb_delete_form_builder_entry') );
		add_action( 'wp_ajax_smfb_delete_optin_analytics', array( $this,'smfb_delete_optin_analytics') );

		add_action( 'wp_ajax_nopriv_smfb_popup_closed', array( $this,'smfb_popup_closed')  );
		add_action( 'wp_ajax_smfb_popup_closed', array( $this,'smfb_popup_closed') );

		add_action( 'wp_ajax_smfb_send_user_feedback', array( $this, 'smfb_send_user_feedback' ) );

		add_action( 'wp_ajax_smfb_aweber_connect', array( $this, 'smfb_aweber_connect' ) );
		add_action( 'wp_ajax_smfb_aweber_connection_check', array( $this, 'smfb_aweber_connection_check' ) );

	}

	function _filters(){

	}





function smfb_admin_ajax(){


	if( current_user_can('editor') || current_user_can('administrator') ) {

		$nonce = $_REQUEST['POPB_nonce'];
		if ( ! wp_verify_nonce( $nonce, 'POPB_data_nonce' ) ) {
			die( 'Security check' ); 
		}else{

			if($_SERVER['REQUEST_METHOD'] == 'GET') {

		    	$page_id = intval($_GET['page_id']);
		    	$data = get_post_meta( $page_id, 'ULPB_DATA', true );
		   		echo json_encode( $data );
		   		
		   		exit();
			} elseif($_SERVER['REQUEST_METHOD'] == 'PUT') {
			} elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {

				$data = json_decode( file_get_contents( 'php://input' ), true );
				$page_id  = intval($data['pageID']);
				$postType  = $data['postType'];
				$pageStatus = $data['pageStatus'];
				$pageCurrentStep = $data['currentStep'];
				$pageTitle    = $data['pageOptions']['pageSeoName'];
				$pageLink    = $data['pageOptions']['pageLink'];
				$setFrontPage    = $data['pageOptions']['setFrontPage'];
				$loadWpHead    = $data['pageOptions']['loadWpHead'];
				$loadWpFooter    = $data['pageOptions']['loadWpFooter'];
				$campaignPlacement = $data['campaignPlacement'];
				$MultiVariantTesting    = $data['pageOptions']['MultiVariantTesting'];

				$user_id = get_current_user_id();
				$post = array(
					'ID'		=> wp_strip_all_tags($page_id),
					'post_title' => wp_strip_all_tags($pageTitle),
					'post_name' => wp_strip_all_tags($pageLink),
					'post_status' => wp_strip_all_tags($pageStatus),           
					'post_type' => "$postType"  
				);

				$checkIfPostExists = get_post_status($page_id);

				if ($checkIfPostExists != false) {
					$post_id =  wp_update_post($post);
				} else{
				 	$post_id =  wp_insert_post($post);
				}
				

				update_post_meta( $page_id, 'ULPB_DATA', $data );
				update_post_meta( $page_id, 'ULPB_CurrentStep', $pageCurrentStep);
				update_post_meta( $page_id, 'ULPB_FrontPage', $setFrontPage);
				update_post_meta( $page_id, 'ULPB_loadWpHead', $loadWpHead);
				update_post_meta( $page_id, 'ULPB_loadWpFooter', $loadWpFooter);
				update_post_meta( $page_id, 'ULPB_MultiVariantTesting', $MultiVariantTesting);
				$dataTest = get_post_meta( $page_id, 'ULPB_DATA', true );
				if (!empty($dataTest)) {
					echo json_encode( 'Data Saved' );
				}

				$prev_autoPlacement_vals = get_option( 'smfb_autoplacement_options' );

				if (!is_array($prev_autoPlacement_vals)) {
					$prev_autoPlacement_vals = array();
				}
				$prev_autoPlacement_vals[$page_id] = $campaignPlacement;

				update_option( 'smfb_autoplacement_options', $prev_autoPlacement_vals );
		   		exit();
			}
		}

	}

} //  ulpb_admin_ajax() ends here . 


function smfb_settings_page_ajax(){

	$plugOps_pageBuilder_settings_nonce = $_REQUEST['POPB_settings_page_nonce'];
	if ( ! wp_verify_nonce( $plugOps_pageBuilder_settings_nonce, 'POPB_settings_nonce' ) ) {
		die( 'Security check' ); 
	}else{

		$selectedPostTypes = $_POST['selectedPostTypes'];

		$selectedPostTypes = array_map( 'esc_attr', $selectedPostTypes );
		$ulpb_setting_option =	update_option( 'page_builder_SupportedPostTypes',$selectedPostTypes);
		

		if ($ulpb_setting_option == true) {
			echo "Data Saved Successfully";
			//var_dump($selectedPostTypes);
		}else{
			echo "Some Error Occurred!";
		}
		exit();
	}
}



function smfb_subscribeForm_ajax($post){

	function check_input($data){
	    $data = trim($data);
	    $data = stripslashes($data);
	    $data = htmlspecialchars($data);
	    return $data;
	}


	if ( 
	    ! isset( $_POST['POPB_SubsForm_Nonce'] ) 
	    || ! wp_verify_nonce( $_POST['POPB_SubsForm_Nonce'], 'POPB_send_Subsform_data' ) 
	) {

	   $returnSuccessArray['database'] = 'Sorry, Security error.';
	   echo json_encode($returnSuccessArray);
	   exit;

	} else {

	   	function ssm_send_to_db() {

			$ssm_post_id = filter_var($_REQUEST['sm_pID'],FILTER_SANITIZE_STRING);
			$s_name = filter_var($_REQUEST['sm_name'],FILTER_SANITIZE_STRING);
			$s_email = filter_var($_REQUEST['sm_email'],FILTER_SANITIZE_EMAIL);
			
			$PSdata = get_post_meta( $ssm_post_id, 'ULPB_DATA', true );

			if (!filter_var($s_email, FILTER_VALIDATE_EMAIL)) {
		      echo  "Invalid email format"; 
		      exit;
		    }
			
			$ssm_Name = wp_strip_all_tags($s_name);
			$ssm_Email = wp_strip_all_tags($s_email);

			$ssm_subscribers_list = get_post_meta($ssm_post_id,'ssm_subscribers_list',true);
			$array_size_prev = count($ssm_subscribers_list); 

			$ssm_conversion_count = get_post_meta($ssm_post_id,'ssm_conversion_count',true);
			$ssm_conversion_count++;


			if ( ! is_array( $ssm_subscribers_list ) )
				$ssm_subscribers_list = array();


			$userTimeZone = get_option('timezone_string');
			date_default_timezone_set($userTimeZone);
			$todaysDate = date("d-m-Y");

			$newSubscriber = array(
					'name' => $ssm_Name,
					'email' => $ssm_Email,
					'date' =>  $todaysDate,
				);


			$ssm_subscribers_list_pid = $ssm_subscribers_list;

			$subscriberExists = false;
			foreach ($ssm_subscribers_list_pid as $key => $value) {
				if ($value['email'] == $ssm_Email) {
					$subscriberExists = true;
				}
			}
			if ($subscriberExists == true) {
			}else{
				array_push($ssm_subscribers_list_pid, $newSubscriber);
				update_post_meta( $ssm_post_id, 'ssm_subscribers_list', $ssm_subscribers_list_pid, $unique = false);
				$updateResultConversionCount = update_post_meta( $ssm_post_id, 'ssm_conversion_count', $ssm_conversion_count, $unique = false);

				$ssm_subscribers_list2 = get_post_meta($ssm_post_id,'ssm_subscribers_list',true);
				$array_size_aft = count($ssm_subscribers_list2);
			}
			
			
			return true;
		}

		function send_data_to_gr_api_sub_form($apikey,$accountName, $name, $email){
			
			require SMFB_PLUGIN_PATH.'/integrations/jsonRPCClient.php';

			$api_key = $apikey;

			$api_url = 'http://api2.getresponse.com';

			$client = new jsonRPCClient($api_url);

			$campaign_name_wp = $accountName;
			$user_given_campaign_name = array ( 'EQUALS' => $campaign_name_wp);


			try {
				$campaigns = $client->get_campaigns(
				    $api_key,
				    array (
				        'name' => $user_given_campaign_name
				    )
				);

				$campaign_keys = array_keys($campaigns);
				$CAMPAIGN_ID = array_pop($campaign_keys);

				if (empty($name)) {
					$name = ' ';
				}
				$result = $client->add_contact(
				    $api_key,
				    array (
				        'campaign'  => $CAMPAIGN_ID,
				        'name'      => "$name",
				        'email'     => "$email",
				    )
				);

				return "success";
			} catch (Exception $e) {
				$gr_contact_exists = "Contact already added to target campaign";
				$gr_contact_queue = "Contact already queued for target campaign";
				$gr_invalid_params = "Request have return error: Invalid params";
				$gr_invalid_api = "Request have return error: API key verification failed";
				$gr__invalid_param_result = strstr($e, $gr_invalid_params, $before_needle = true);
				$gr__invalid_api_result = strstr($e, $gr_invalid_api, $before_needle = true);
				$gr__c_exists_result = strstr($e, $gr_contact_exists, $before_needle = true);
				$gr_contact_queue_results = strstr($e, $gr_contact_queue, $before_needle = true);
				if($gr__invalid_param_result == true){
					return "Invalid Parameters Supplied";
				} else if($gr__invalid_api_result == true){
					return "Invalid API Key Or List Name";
				} else if ($gr__c_exists_result == true) {
					return 'Subscriber Already Exists';
				} else if ($gr_contact_queue_results == true) {
					return 'Subscriber Already Exists';
				} else{
					return "Unknown error occurred!".$e;
				}
			}
		}

		function ssm_send_to_campaign_monitor($apikey, $listID, $name,$email){
			require_once SMFB_PLUGIN_PATH.'/integrations/createsend/csrest_subscribers.php';

			$auth = array('api_key' => $apikey);
			$wrap = new CS_REST_Subscribers($listID,$auth);

			$result = $wrap->add(
				array(
					'EmailAddress' => $email,
					'Name'		   => $name, 
					'Resubscribe' => true,
				)
			);
			
			if($result->was_successful()) {
			    return "success";
			} else {
			    return $result->response;
			}
		}

		function ssm_send_to_active_campaign($apikey,$apiAddress, $listID, $name,$email){

			$url = $apiAddress;
			$params = array(
			    'api_key'      => $apikey,
			    'api_action'   => 'contact_add',
			    'api_output'   => 'serialize',
			);

			$post = array(
			    'email'                    => $email,
			    'first_name'               => $name,
			    'tags'                     => 'PluginOps Forms',
			    'p['.$listID.']'           => $listID,
			    'status['.$listID.']'      => 1, 
			    'instantresponders[123]'   => 1, 
			);

			$query = "";
			foreach( $params as $key => $value ) $query .= urlencode($key) . '=' . urlencode($value) . '&';
			$query = rtrim($query, '& ');

			$data = "";
			foreach( $post as $key => $value ) $data .= urlencode($key) . '=' . urlencode($value) . '&';
			$data = rtrim($data, '& ');

			$url = rtrim($url, '/ ');

			if ( !function_exists('curl_init') ) return('CURL not supported. (introduced in PHP 4.0.2)');

			if ( $params['api_output'] == 'json' && !function_exists('json_decode') ) {
			    return('JSON not supported. (introduced in PHP 5.2.0)');
			}

			$api = $url . '/admin/api.php?' . $query;

			$request = curl_init($api); 
			curl_setopt($request, CURLOPT_HEADER, 0); 
			curl_setopt($request, CURLOPT_RETURNTRANSFER, 1); 
			curl_setopt($request, CURLOPT_POSTFIELDS, $data); 
			curl_setopt($request, CURLOPT_FOLLOWLOCATION, true);

			$response = (string)curl_exec($request); 

			curl_close($request); 

			if ( !$response ) {
			    return('Nothing was returned. Do you have a connection to Email Marketing server?');
			}

			
			$result = unserialize($response);


			if ($result['result_code']) {
				return 'success';
			}else{
				return $result['result_message'];
			}
		}

		function ssm_send_to_mailchimp($apikey, $listID,$name, $email) {
			    
			    list(, $dataCenter) = explode('-', $apikey);
	            $auth = base64_encode( 'user:'.$apikey );
	            $merge_vars = Array( 
			        'EMAIL' => $email,
			        'FNAME' => $name
			    );
	            $data = array(
	                'apikey'        => $apikey,
	                'email_address' => $email,
	                'status'        => 'subscribed',
	                'merge_fields'  => $merge_vars
	            );
	            $json_data = json_encode($data);

	            $ch = curl_init();
	            curl_setopt($ch, CURLOPT_URL, 'https://'.$dataCenter.'.api.mailchimp.com/3.0/lists/'.$listID.'/members/');
	            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json',  'Authorization: Basic '.$auth));
	            curl_setopt($ch, CURLOPT_USERAGENT, 'PHP-MCAPI/2.0');
	            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	            curl_setopt($ch, CURLOPT_TIMEOUT, 10);
	            curl_setopt($ch, CURLOPT_POST, true);
	            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	            curl_setopt($ch, CURLOPT_POSTFIELDS, $json_data);                                         
	            $result = curl_exec($ch);

	            $returnResult = "$result";
	            if ($result != false && $result != '') {
	            	$exists = "Member Exists";
	            	$Wlist = "Resource Not Found";
	            	$Wapi = "API Key Invalid";
	            	$Rsuccess = 'subscribed';

	            	if (strpos($result, $exists) !== false) {
					    $returnResult = 'Subscriber Already Exists';
					}
					if (strpos($result, $Wlist) !== false) {
					    $returnResult = 'Invalid List ID';
					}
					if (strpos($result, $Wapi) !== false) {
					    $returnResult = 'Invalid API Key';
					}
					if (strpos($result, $Rsuccess) !== false) {
					    $returnResult = 'success';
					}
	            }

	            return $returnResult;
		}

		function ssm_send_to_drip($apikey,$apiAddress, $name,$email,$formName,$customs){
			require_once SMFB_PLUGIN_PATH.'/integrations/drip/Drip.php';
			require_once SMFB_PLUGIN_PATH.'/integrations/drip/Dataset.php';
			require_once SMFB_PLUGIN_PATH.'/integrations/drip/Response.php';
			require_once SMFB_PLUGIN_PATH.'/integrations/drip/Batch.php';
			
			$Drip = new Drip($apikey, $apiAddress);

			$data = new Dataset('subscribers', [
				'email' => $email,
				'custom_fields'=> [
					'name' => "$name"
				],
				'tags' => [
					"$formName"
				]
			]);

			$Response = $Drip->post('subscribers', $data);

			if ($Response->status == 200) {
			  return "success";
			} else {
			  return $Response->message;
			}
		}

		$ssm_post_id = filter_var($_REQUEST['sm_pID'],FILTER_SANITIZE_STRING);

		$PSdata = get_post_meta( $ssm_post_id, 'ULPB_DATA', true );

		$multiOptionFieldValues = explode("\n", sanitize_textarea_field($_POST['pbFormTargetInfo']) );

		$currRow = (int)$multiOptionFieldValues[0];
		$currCol = trim($multiOptionFieldValues[1]);
		$currWidget = (int)$multiOptionFieldValues[2];

		$SubscribeFormBuilder = $PSdata['Rows'][$currRow][$currCol]['colWidgets'][$currWidget]['widgetSubscribeForm'];
		if (isset($SubscribeFormBuilder['formIntegrations'])) {
			$formIntegrations = $SubscribeFormBuilder['formIntegrations'];
			$getResponse = $formIntegrations['getResponse'];
			$isGrActive = $getResponse['isGrActive'];
			$GrApiKey = $getResponse['GrApiKey'];
			$GrAccountName = $getResponse['GrAccountName'];

			$campaignMonitor = $formIntegrations['campaignMonitor'];
			$isCmActive = $campaignMonitor['isCmActive'];
			$CmApiKey = $campaignMonitor['CmApiKey'];
			$CmAccountName = $campaignMonitor['CmAccountName'];

			$activeCampaign = $formIntegrations['activeCampaign'];
			$isAcActive = $activeCampaign['isAcActive'];
			$AcApiKey = $activeCampaign['AcApiKey'];
			$AcApiURL = $activeCampaign['AcApiURL'];
			$AcAccountName = $activeCampaign['AcAccountName'];

			$isDripActive = '';

			if (isset($formIntegrations['drip'])) {
				$drip = $formIntegrations['drip'];
				$isDripActive = $drip['isDripActive'];
				$DripApiKey = $drip['DripApiKey'];
				$DripAccountName = $drip['DripAccountName'];
			}

			if (!isset($_SERVER['HTTPS']) || $_SERVER['HTTPS'] != 'on') {
			   $AcApiURL = str_replace('https', 'http', $AcApiURL);
			}
		}

		if (isset($SubscribeFormBuilder['formDataMailChimpApi'])) {
			$dataApiKeyMC = $SubscribeFormBuilder['formDataMailChimpApi'];
			$dataListIdMC = $SubscribeFormBuilder['formDataMailChimpListId'];
		}else{
			$dataApiKeyMC = $PSdata['formMailchimp']['apiKey'];
			$dataListIdMC = $PSdata['formMailchimp']['listId'];
		}
		if (isset($SubscribeFormBuilder['isMcActive'])) {
			$isMcActive = $SubscribeFormBuilder['isMcActive'];
		}

		$data = check_input($_REQUEST['sm_name']);
		$data .= check_input($_REQUEST['sm_email']);
		$data_lower = strtolower($data);
		$data_spaces = str_replace(' ','',$data_lower);

		$pattern = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/";
		if (!preg_match($pattern,$data_spaces))
		{
		    echo ("Invalid Input");
		    exit;
		}
		else{

			$checkss = ssm_send_to_db();
			$ssm_post_id = filter_var($_REQUEST['sm_pID'],FILTER_SANITIZE_STRING);
			$sub_url ='';

			$submitterName  = check_input($_REQUEST['sm_name']);
			$submitterEmail = check_input($_REQUEST['sm_email']);

			$is_extensionActive = true;

			$returnSuccessArray = array();

			$getResponseResult = 'Inactive';
			if ($isGrActive == 'true' && $is_extensionActive == true) {
				$getResponseResult = send_data_to_gr_api_sub_form($GrApiKey,$GrAccountName, $submitterName, $submitterEmail, $GR_customs_array);
			}

			$campaignMonitorResult = 'Inactive';
			if ($isCmActive == 'true' && $is_extensionActive == true) {
				$campaignMonitorResult = ssm_send_to_campaign_monitor($CmApiKey,$CmAccountName,$submitterName, $submitterEmail);
			}

			$activeCampaignResult = 'Inactive';
			if ($isAcActive == 'true' && $is_extensionActive == true) {
				$activeCampaignResult = ssm_send_to_active_campaign($AcApiKey,$AcApiURL, $AcAccountName, $submitterName,$submitterEmail);
			}

			$mailChimpResult = 'Inactive';
			if ($isMcActive == 'true' && $is_extensionActive == true) {
				$mailChimpResult = ssm_send_to_mailchimp($dataApiKeyMC,$dataListIdMC,$submitterName, $submitterEmail);
			}

			$dripResult = 'Inactive';
			if ($isDripActive == 'true' && $is_extensionActive == true) {
				$customs = array();
				$dripResult = ssm_send_to_drip($DripApiKey,$DripAccountName,$submitterName, $submitterEmail, 'PluginOps Subscribe Form',$customs);
			}
			
			$returnSuccessArray['activeCampaign'] = $activeCampaignResult;

			$returnSuccessArray['campaignMonitor'] = $campaignMonitorResult;

			$returnSuccessArray['getResponse'] = $getResponseResult;

			$returnSuccessArray['drip'] = $dripResult;
				
			if ($checkss > 0) {
				$returnSuccessArray['database'] = 'success';
			}
			else{
				$returnSuccessArray['database'] = $checkss;
				
			}
			$returnSuccessArray['mailchimp'] = $mailChimpResult;

			echo json_encode($returnSuccessArray);
			exit();
		}
	}
} // ulpb_subscribeForm_ajax ENDS HERE




function smfb_subscribeForm_mailchimp_ajax(){
	function check_input($data)
	{
	    $data = trim($data);
	    $data = stripslashes($data);
	    $data = htmlspecialchars($data);
	    return $data;
	}

	if ( 
	    ! isset( $_POST['POPB_SubsForm_Nonce'] ) 
	    || ! wp_verify_nonce( $_POST['POPB_SubsForm_Nonce'], 'POPB_send_Subsform_data' ) 
	) {

	   $returnSuccessArray['database'] = 'Sorry, Security error.';
	   echo json_encode($returnSuccessArray);
	   exit;

	} else {

		$ssm_post_id = check_input($_POST['sm_pID']);
		$PSdata = get_post_meta( $ssm_post_id, 'ULPB_DATA', true );

		$multiOptionFieldValues = explode("\n", sanitize_textarea_field($_POST['pbFormTargetInfo']) );

		$currRow = (int)$multiOptionFieldValues[0];
		$currCol = trim($multiOptionFieldValues[1]);
		$currWidget = (int)$multiOptionFieldValues[2];

		$SubscribeFormBuilder = $PSdata['Rows'][$currRow][$currCol]['colWidgets'][$currWidget]['widgetSubscribeForm'];

		if (isset($SubscribeFormBuilder['formDataMailChimpApi'])) {
			$dataApiKey = $SubscribeFormBuilder['formDataMailChimpApi'];
			$dataListId = $SubscribeFormBuilder['formDataMailChimpListId'];
		}else{
			$dataApiKey = $PSdata['formMailchimp']['apiKey'];
			$dataListId = $PSdata['formMailchimp']['listId'];
		}
		
		include SMFB_PLUGIN_PATH.'/integrations/MCAPI.class.php';
		$sm_api_key = $dataApiKey;
		$api = new MCAPI($sm_api_key);

		$ssm_post_id = check_input($_REQUEST['sm_pID']);
		$smf_fName = check_input($_REQUEST['sm_name']);
		$smf_email = check_input($_REQUEST['sm_email']);

			$merge_vars = Array( 
		        'EMAIL' => $smf_email,
		        'FNAME' => $smf_fName
		    );
			
		$data = check_input($_REQUEST['sm_name']);
		$data .= check_input($_REQUEST['sm_email']);
		$data_lower = strtolower($data);
		$data_spaces = str_replace(' ','',$data_lower);

		$pattern = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/";
		if (!preg_match($pattern,$data_spaces))
		{
		    echo ("Invalid Input");
		    exit; 
		}
		else{
			$list_id = $dataListId;
			$ssm_post_id = check_input($_REQUEST['sm_pID']);
			$retval = $api->listSubscribe($list_id, $smf_email,$merge_vars,'html',false,false);

			$s_name = $smf_fName;
			$s_email = $smf_email;

			if (!filter_var($s_email, FILTER_VALIDATE_EMAIL)) {
			    echo  "Invalid email format"; 
			    exit;
			}
				
			$ssm_Name = wp_strip_all_tags($s_name);
			$ssm_Email = wp_strip_all_tags($s_email);

			$ssm_subscribers_list = get_post_meta($ssm_post_id,'ssm_subscribers_list',true);

			$ssm_conversion_count = get_post_meta($ssm_post_id,'ssm_conversion_count',true);

			$ssm_conversion_count++;
			$array_size_prev = count($ssm_subscribers_list); 

			if ( ! is_array( $ssm_subscribers_list ) ){
				$ssm_subscribers_list = array();
			}

			$array_size_prev = count($ssm_subscribers_list);

			$userTimeZone = get_option('timezone_string');
			date_default_timezone_set($userTimeZone);
			$todaysDate = date("d-m-Y");

			$newSubscriber = array(
						'name' => $ssm_Name,
						'email' => $ssm_Email,
						'date' => $todaysDate,
					);


			$ssm_subscribers_list_pid = $ssm_subscribers_list;

			array_push($ssm_subscribers_list_pid, $newSubscriber);
			
			$updateResultSubsList = update_post_meta( $ssm_post_id, 'ssm_subscribers_list', $ssm_subscribers_list_pid, $unique = false);

			$updateResultConversionCount = update_post_meta( $ssm_post_id, 'ssm_conversion_count', $ssm_conversion_count, $unique = false);


			$returnSuccessArray = array();
				
			if ($retval == true) {
				$returnSuccessArray['mailchimp'] = 'success';
			} else{
				$McErr = '';
				if($api->errorCode) {
					if((string)$api->errorCode == '-99'){
						$McErr = "Connection Blocked - Error code = -99";
					} elseif ((string)$api->errorCode == '214') {
						$McErr = "Subscriber Already Exists";

					} elseif ((string)$api->errorCode == '104') {
						$McErr = "Invalid API Key Or List Name - Error code = 104";
									
					} elseif ((string)$api->errorCode == '200') {
						$McErr = "Invalid API Key Or List Name - Error code = 200";
						
					}  else {
						$McErr = "Unknown Error Occurred";
									
					}
				}
				$returnSuccessArray['mailchimp'] = $McErr;
			}

			$returnSuccessArray['database'] = $updateResultSubsList;

			echo json_encode($returnSuccessArray);
			exit();
			
		}
		
	}
}



function smfb_formBuilderEmail_ajax(){


	if ( 
	    ! isset( $_POST['POPB_Form_Nonce'] ) 
	    || ! wp_verify_nonce( $_POST['POPB_Form_Nonce'], 'POPB_send_form_data' ) 
	) {

	   $returnSuccessArray['database'] = 'Sorry, Security error.';
	   echo json_encode($returnSuccessArray);
	   exit;

	} else {

		if ( sanitize_text_field($_POST['messageFBHP']) ) {
			print 'Sorry, Something went wrong.';
			exit;
		}else{

			$ssm_post_id = sanitize_text_field( $_POST['psID'] );

			$PSdata = get_post_meta( $ssm_post_id, 'ULPB_DATA', true );

			$multiOptionFieldValues = explode("\n", sanitize_textarea_field($_POST['pbFormTargetInfo']) );

			$currRow = (int)$multiOptionFieldValues[0];
			$currCol = trim($multiOptionFieldValues[1]);
			$currWidget = (int)$multiOptionFieldValues[2];

			$formBuilder = $PSdata['Rows'][$currRow][$currCol]['colWidgets'][$currWidget]['widgetFormBuilder'];
			$thisFormEmailOptions = $formBuilder['widgetPbFbFormEmailOptions'];



			$formBuilderEnableMailChimp ='';
			$api = '';
			$list_id = '';
			$merge_vars = Array();
			$mc_submitterEmail = '';
			$merge_vars = Array();

			$is_MCextensionActive = true;
			$formBuilderEnableGetResponse = '';
			if (isset($formBuilder['widgetPbFbFormMailChimp']) && $is_MCextensionActive == true ) {

				$widgetPbFbFormMailChimp = $formBuilder['widgetPbFbFormMailChimp'];
				$formBuilderEnableMailChimp = $widgetPbFbFormMailChimp['formBuilderEnableMailChimp'];

				if ($formBuilderEnableMailChimp == 'true') {
					$formBuilderMCAccountName = $widgetPbFbFormMailChimp['formBuilderMCAccountName'];
					$formBuilderMCApiKey = $widgetPbFbFormMailChimp['formBuilderMCApiKey'];

					/*
					include SMFB_PLUGIN_PATH.'/integrations/MCAPI.class.php';

					$api = new MCAPI($formBuilderMCApiKey);
					$list_id = $formBuilderMCAccountName;
					*/
					if (!isset($widgetPbFbFormMailChimp['formBuilderMCDoubleOptin'])) {
						$widgetPbFbFormMailChimp['formBuilderMCDoubleOptin'] = 'false';
					}

					if ($widgetPbFbFormMailChimp['formBuilderMCDoubleOptin'] == 'false') {
						$dblOptin = 'subscribed';
					}
					if ($widgetPbFbFormMailChimp['formBuilderMCDoubleOptin'] == 'true') {
						$dblOptin = 'pending';
					}
					$merge_vars = Array();
					$mc_submitterEmail = '';
				}

				if(isset($widgetPbFbFormMailChimp['formBuilderEnableGetResponse'])){
					$formBuilderEnableGetResponse = $widgetPbFbFormMailChimp['formBuilderEnableGetResponse'];
					$formBuilderGRAccountName = $widgetPbFbFormMailChimp['formBuilderGRAccountName'];
					$formBuilderGRApiKey = $widgetPbFbFormMailChimp['formBuilderGRApiKey'];
				}
				if(isset($widgetPbFbFormMailChimp['formBuilderEnableCM'])){
					$formBuilderEnableCM = $widgetPbFbFormMailChimp['formBuilderEnableCM'];
					$formBuilderCMAccountName = $widgetPbFbFormMailChimp['formBuilderCMAccountName'];
					$formBuilderCMApiKey = $widgetPbFbFormMailChimp['formBuilderCMApiKey'];
				}
				if(isset($widgetPbFbFormMailChimp['formBuilderEnableAC'])){
					$formBuilderEnableAC = $widgetPbFbFormMailChimp['formBuilderEnableAC'];
					$formBuilderACAccountName = $widgetPbFbFormMailChimp['formBuilderACAccountName'];
					$formBuilderACApiKey = $widgetPbFbFormMailChimp['formBuilderACApiKey'];
					$formBuilderACApiUrl = $widgetPbFbFormMailChimp['formBuilderACApiUrl'];

					if (!isset($_SERVER['HTTPS']) || $_SERVER['HTTPS'] != 'on') {
					   $formBuilderACApiUrl = str_replace('https', 'http', $formBuilderACApiUrl);
					}
				}
				$formBuilderEnableDrip = '';
				if(isset($widgetPbFbFormMailChimp['formBuilderEnableDrip'])){
					$formBuilderEnableDrip = $widgetPbFbFormMailChimp['formBuilderEnableDrip'];
					$formBuilderDripAccountName = $widgetPbFbFormMailChimp['formBuilderDripAccountName'];
					$formBuilderDripApiKey = $widgetPbFbFormMailChimp['formBuilderDripApiKey'];
				}

				$formBuilderEnableAweber = '';
				if(isset($widgetPbFbFormMailChimp['formBuilderEnableAweber'])){
					$formBuilderEnableAweber = $widgetPbFbFormMailChimp['formBuilderEnableAweber'];
					$formBuilderAweberList = $widgetPbFbFormMailChimp['formBuilderAweberList'];
				}

				$formBuilderEnableConvertKit = '';
				if(isset($widgetPbFbFormMailChimp['formBuilderEnableConvertKit'])){
					$formBuilderEnableConvertKit = $widgetPbFbFormMailChimp['formBuilderEnableConvertKit'];
					$formBuilderConvertKitAccountName = $widgetPbFbFormMailChimp['formBuilderConvertKitAccountName'];
					$formBuilderConvertKitApiKey = $widgetPbFbFormMailChimp['formBuilderConvertKitApiKey'];
				}

			}

			$widgetPbFbFormAllowDuplicates = 'true';
			if (isset($formBuilder['widgetPbFbFormAllowDuplicates'])) {
				$widgetPbFbFormAllowDuplicates = $formBuilder['widgetPbFbFormAllowDuplicates'];
			}



			$pbAllFormData = '';
			$fieldCount = 0;
			$submitterEmail = '';
			$submitterName = '';
			$formNameText = $thisFormEmailOptions['formEmailformName'];

			if ($formNameText == '') {
				$formNameText = 'PluginOps Form';
			}

			$GR_customs_array = array();
			$CM_customs_array = array();
			$drip_customs_array = array();
			$aweber_customs_array = array();

			foreach ($_POST as $key => $value) {

				$thisFieldName =  sanitize_text_field( str_replace("field-$fieldCount-","" ,$key) );
				if ($thisFieldName == 'psID' || $thisFieldName == 'pbFormTargetInfo' || $thisFieldName == 'POPB_Form_Nonce' || $thisFieldName == '_wp_http_referer' || $thisFieldName == 'messageFBHP') {
				}else{

					if (is_array($value)) {
						$valueArray = $value;
						$value = '';
						foreach ($valueArray as $k => $v) {
							$newVal = ($k+1) . " : ". $v. ", \n";
							$value = $value. $newVal;
						}
					}
					if ($thisFormEmailOptions['formEmailFormat'] == 'plain') {


						$pbAllFormDataPlainThisValue = $thisFieldName." : \n ". sanitize_text_field($value) .' ' ;
						$pbAllFormDataPrevValues = $pbAllFormData;
						$pbAllFormData = $pbAllFormDataPrevValues."\n \n".$pbAllFormDataPlainThisValue;
						$formName = $thisFormEmailOptions['formEmailformName']."\n \n";

						if (strtolower($thisFieldName) == 'email' || strtolower($thisFieldName) == 'enter email' || strtolower($thisFieldName) == 'your email' || strtolower($thisFieldName) == 'email here') {
							$submitterEmail = sanitize_text_field($value);
						}
						if (strtolower($thisFieldName) == 'name' || strtolower($thisFieldName) == 'first name' || strtolower($thisFieldName) == 'firstname') {
							$submitterName = sanitize_text_field($value);
						}

					} else{
						$pbAllFormDataHTMLThisValue = "<p><b>".$thisFieldName." : </b>  ". sanitize_text_field($value) ."</p>  <br> <hr>" ;
						$pbAllFormDataPrevValues = $pbAllFormData;
						$pbAllFormData = $pbAllFormDataPrevValues."<br>".$pbAllFormDataHTMLThisValue;
						$formName = '<br> <h3>'.$thisFormEmailOptions['formEmailformName'].'</h3> <br>';

						if (strtolower($thisFieldName) == 'email' || strtolower($thisFieldName) == 'enter email' || strtolower($thisFieldName) == 'your email' || strtolower($thisFieldName) == 'email here') {
							$submitterEmail = sanitize_text_field($value);
						}
						if (strtolower($thisFieldName) == 'name' || strtolower($thisFieldName) == 'first name' || strtolower($thisFieldName) == 'firstname') {
							$submitterName = sanitize_text_field($value);
						}
					}


						$merge_vars[strtoupper($thisFieldName)] = sanitize_text_field($value);

						if (strtolower($thisFieldName) != 'email' && strtolower($thisFieldName) != 'name') { // customs fields without name & email keys.
							$currentFieldToAddInCustoms = array('name' => strtolower($thisFieldName), 'content' =>  sanitize_text_field($value) );
							$currentFieldToAddInCustomsCM = array('key' => strtolower($thisFieldName), 'value' =>  sanitize_text_field($value) );

							$thisFieldNameAweber = str_replace("_"," ",$thisFieldName);

							$drip_customs_array[ strtolower($thisFieldName) ] = preg_replace("/[^ \w]+/", "", sanitize_text_field($value) ) ;

							$aweber_customs_array[ strtolower($thisFieldNameAweber) ] = preg_replace("/[^ \w]+/", "", sanitize_text_field($value) ) ;

							array_push($GR_customs_array, $currentFieldToAddInCustoms);
							array_push($CM_customs_array, $currentFieldToAddInCustomsCM);
						}

						if (strtolower($thisFieldName) == 'email' || strtolower($thisFieldName) == 'enter email' || strtolower($thisFieldName) == 'your email' || strtolower($thisFieldName) == 'email here') { 
							$mc_submitterEmail = sanitize_text_field($value);
						}
						if (strtolower($thisFieldName) == 'name' || strtolower($thisFieldName) == 'first name' || strtolower($thisFieldName) == 'firstname') {
							$submitterName = sanitize_text_field($value);
						}
					
				}

				
				

				$fieldCount++;
			}


			if ($thisFormEmailOptions['formEmailFormat'] == 'HTML') {

				$pbAllEmailData =  "<html>
				<head>
				    <title> New Form Submission </title>
				</head>
				<body> 
				<div style='font-family:Helvetica,Arial,sans-serif;box-sizing:border-box;font-size:14px;width:100%!important;height:100%;line-height:1.6em;background-color:#f6f6f6;margin:0; padding:2% 10%;'>
				<div style='padding:2% 10%; background: #fff; margin:3% 10%;'>  ".$formName.$pbAllFormData." </div> </div>
				</body> </html>";

				add_filter( 'wp_mail_content_type', 'pb_form_email_set_html_mail_content_type' );
				function pb_form_email_set_html_mail_content_type() {
				    	return 'text/html';
				}
			}
			else{
				$pbAllEmailData =  $formName.$pbAllFormData;
			}

			$fromEmailAddress = home_url();
			$fromEmailAddress = trim($fromEmailAddress, '/');

			if (!preg_match('#^http(s)?://#', $fromEmailAddress)) {
			    $fromEmailAddress = 'http://' . $fromEmailAddress;
			}

			$urlParts = parse_url($fromEmailAddress);

			$OnlyDomain = preg_replace('/^www\./', '', $urlParts['host']);

			$fromEmailAddress =  "pluginOpsForm@".$OnlyDomain;

			if ($submitterName == '') {
				$submitterName = $thisFormEmailOptions['formEmailName'];
			}
			
			$headers[]= "From: ".$submitterName." <".$fromEmailAddress.">";

			if (!empty($submitterEmail)) {
				$headers[] = "Reply-To: ".$submitterName." <".$submitterEmail.">";
			}

			if ($thisFormEmailOptions['formEmailSubject'] == '') {
				$formEmailSubject = 'PluginOps Form Submission';
			}else{
				$formEmailSubject = $thisFormEmailOptions['formEmailSubject'];
			}


			$pb_sendMail = wp_mail( $thisFormEmailOptions['formEmailTo'], $formEmailSubject, $pbAllEmailData, $headers );


			remove_filter( 'wp_mail_content_type', 'pb_form_email_set_html_mail_content_type' );

			if ($submitterName == '' || $submitterName == 'PluginOps') {
				$submitterName = 'Not Set ';
			}

			function send_data_to_gr_api($apikey,$accountName, $name, $email, $customs ){
				require SMFB_PLUGIN_PATH.'/integrations/jsonRPCClient.php';

				$api_key = $apikey;

				$api_url = 'http://api2.getresponse.com';

				$client = new jsonRPCClient($api_url);

				$campaign_name_wp = $accountName;
				$user_given_campaign_name = array ( 'EQUALS' => $campaign_name_wp);


				try {
					$campaigns = $client->get_campaigns(
					    $api_key,
					    array (
					        'name' => $user_given_campaign_name
					    )
					);

					$campaign_keys = array_keys($campaigns);
					$CAMPAIGN_ID = array_pop($campaign_keys);

					if (empty($name)) {
						$name = ' ';
					}
					$result = $client->add_contact(
					    $api_key,
					    array (
					        'campaign'  => $CAMPAIGN_ID,
					        'name'      => "$name",
					        'email'     => "$email",
					        'customs'	=> $customs
					    )
					);

					return "success";
				} catch (Exception $e) {
					$gr_contact_exists = "Contact already added to target campaign";
					$gr_contact_queue = "Contact already queued for target campaign";
					$gr_invalid_params = "Request have return error: Invalid params";
					$gr_invalid_api = "Request have return error: API key verification failed";
					$gr__invalid_param_result = strstr($e, $gr_invalid_params, $before_needle = true);
					$gr__invalid_api_result = strstr($e, $gr_invalid_api, $before_needle = true);
					$gr__c_exists_result = strstr($e, $gr_contact_exists, $before_needle = true);
					$gr_contact_queue_results = strstr($e, $gr_contact_queue, $before_needle = true);
					if($gr__invalid_param_result == true){
						return "Invalid Parameters Supplied";
					} else if($gr__invalid_api_result == true){
						return "Invalid API Key Or List Name";
					} else if ($gr__c_exists_result == true) {
						return 'Subscriber Already Exists';
					} else if ($gr_contact_queue_results == true) {
						return 'Subscriber Already Exists';
					} else{
						return "Unknown error occurred!".$e;
					}
				}
			}


			function ssm_send_to_campaign_monitor_formBuilder($apikey, $listID, $name,$email, $customs){
				require_once SMFB_PLUGIN_PATH.'/integrations/createsend/csrest_subscribers.php';

				$auth = array('api_key' => $apikey);
				$wrap = new CS_REST_Subscribers($listID,$auth);

				$result = $wrap->add(
					array(
						'EmailAddress' => $email,
						'Name'		   => $name, 
						'Resubscribe'  => true,
						'CustomFields' => $customs,
					)
				);
				
				if($result->was_successful()) {
				    return "success";
				} else {
				    return $result->response;
				}
			}


			function ssm_send_to_active_campaign_formBuilder($apikey,$apiAddress, $listID, $name,$email,$customs){

				$url = $apiAddress;
				$params = array(
				    'api_key'      => $apikey,
				    'api_action'   => 'contact_add',
				    'api_output'   => 'serialize',
				);

				$post = array(
				    'email'                    => $email,
				    'first_name'               => $name,
				    'tags'                     => 'PluginOps Form',
				    'p['.$listID.']'           => $listID,
				    'status['.$listID.']'      => 1,
				    'instantresponders[123]'   => 1,
				);

				foreach ($customs as $key => $value) {
					$fieldName = strtoupper($value['name']);

					if ($fieldName == 'NAME' || $fieldName == 'EMAIL') {
						
					}else{
						$post['field[%'.$fieldName.'%,0]'] = $value['content'];
					}
				}
				$query = "";
				foreach( $params as $key => $value ) $query .= urlencode($key) . '=' . urlencode($value) . '&';
				$query = rtrim($query, '& ');

				$data = "";
				foreach( $post as $key => $value ) $data .= urlencode($key) . '=' . urlencode($value) . '&';
				$data = rtrim($data, '& ');

				$url = rtrim($url, '/ ');

				if ( !function_exists('curl_init') ) return('CURL not supported. (introduced in PHP 4.0.2)');

				if ( $params['api_output'] == 'json' && !function_exists('json_decode') ) {
				    return('JSON not supported. (introduced in PHP 5.2.0)');
				}

				$api = $url . '/admin/api.php?' . $query;

				$request = curl_init($api); 
				curl_setopt($request, CURLOPT_HEADER, 0); 
				curl_setopt($request, CURLOPT_RETURNTRANSFER, 1); 
				curl_setopt($request, CURLOPT_POSTFIELDS, $data); 
				curl_setopt($request, CURLOPT_FOLLOWLOCATION, true);

				$response = (string)curl_exec($request); 

				curl_close($request); 

				if ( !$response ) {
				    return('Nothing was returned. Do you have a connection to Email Marketing server?');
				}

				
				$result = unserialize($response);


				if ($result['result_code']) {
					return 'success';
				}else{
					return $result['result_message'];
				}
			}

			function ssm_send_to_drip_formBuilder($apikey,$apiAddress, $name,$email,$formName,$customs){
				require_once SMFB_PLUGIN_PATH.'/integrations/drip/Drip.php';
				require_once SMFB_PLUGIN_PATH.'/integrations/drip/Dataset.php';
				require_once SMFB_PLUGIN_PATH.'/integrations/drip/Response.php';
				require_once SMFB_PLUGIN_PATH.'/integrations/drip/Batch.php';

				$Drip = new Drip($apikey, $apiAddress);

				$data = new Dataset('subscribers', [
					'email' => $email,
					'custom_fields'=> $customs,
					'tags' => [
						"$formName"
					]
				]);

				$Response = $Drip->post('subscribers', $data);

				if ($Response->status == 200) {
				  return "success";
				} else {
				  return $Response->message;
				}
			}


			function ssm_send_to_aweber_formBuilder($listUrl,$name,$submitterEmail,$formName,$customs){
					$authCode = get_option( 'ulpb_aweber_auth_code' );
					if ($authCode != '' && $authCode != null) {
						try{

					    	require(SMFB_PLUGIN_PATH.'/integrations/aweber_api/aweber_api.php');
							$authCode = get_option( 'ulpb_aweber_auth_code' );

							list( $auth_key, $auth_token, $req_key, $req_token, $oauth ) = explode( '|', $authCode );

							$aweber = new AWeberAPI( $auth_key, $auth_token );


						    $aweber->user->tokenSecret = $req_token;
						    $aweber->user->requestToken = $req_key;
						    $aweber->user->verifier = $oauth;

					      $account = $aweber->getAccount( get_option( 'ulpb_aweber_accessToken'), get_option( 'ulpb_aweber_accessTokenSecret') );

					      if ( empty($customs) ) {
					      	$customs = array('key' => 'value' );
					      }

					      try {
					      	$list = $account->loadFromUrl($listUrl);

						      $params = array(
							        'email' => "$submitterEmail",
							        'name' => "$name",
							        'custom_fields' => $customs,
							        'tags' => array("$formName"),
							    );
						      $subscribers = $list->subscribers;
						      $new_subscriber = $subscribers->create($params);

						     return "success";
					      }catch(AWeberAPIException $exc){
						      if ($exc->message == 'email: Subscriber already subscribed.') {
						      	return "Subscriber Already Exists";
						      }else{
						      	return "$exc->message ";
						      }
					      }
					      
					    } catch(Exception $e){
					      return "$e";
					    }
					}else{
						return "Inactive";
					}

			} // aweber function 


			function ssm_send_to_convertkit_formBuilder($apikey,$listID,$name,$email,$customs){

				$url = "https://api.convertkit.com/v3/courses/$listID/subscribe?api_key=$apikey";
				$response = wp_remote_post( $url, array(
				  'method' => 'POST',
				  'timeout' => 45,
				  'redirection' => 5,
				  'httpversion' => '1.0',
				  'blocking' => true,
				  'headers' => array(),
				  'body' => array('email' => "$email" , 'name'=>"$name", 'fields' => $customs ),
				  )
				);


				if ( is_wp_error( $response ) ) {
				   $error_message = $response->get_error_message();
				   return "Something went wrong: $error_message";
				} else {

					if ($response['response']['message'] == 'OK' || $response['response']['code'] == '200') {
						return 'success';
					}else{
						return $response['response']['message'];
					}
				   
				}
			}

			function ssm_send_to_mailchimp_formBuilder($apikey, $listId,$name, $email,$customs,$dblOptin) {
			    
			    list(, $dataCenter) = explode('-', $apikey);
	            $auth = base64_encode( 'user:'.$apikey );

	            $data = array(
	                'apikey'        => $apikey,
	                'email_address' => $email,
	                'status'        => $dblOptin,
	                'merge_fields'  => $customs
	            );
	            $json_data = json_encode($data);

	            $ch = curl_init();
	            curl_setopt($ch, CURLOPT_URL, 'https://'.$dataCenter.'.api.mailchimp.com/3.0/lists/'.$listId.'/members/');
	            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json',  'Authorization: Basic '.$auth));
	            curl_setopt($ch, CURLOPT_USERAGENT, 'PHP-MCAPI/2.0');
	            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	            curl_setopt($ch, CURLOPT_TIMEOUT, 10);
	            curl_setopt($ch, CURLOPT_POST, true);
	            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	            curl_setopt($ch, CURLOPT_POSTFIELDS, $json_data);                                         
	            $result = curl_exec($ch);

	            $returnResult = "$result";
	            if ($result != false && $result != '') {
	            	$exists = "Member Exists";
	            	$Wlist = "Resource Not Found";
	            	$Wapi = "API Key Invalid";
	            	$Rsuccess = 'subscribed';
	            	$RsuccessTwo = 'pending';

	            	if (strpos($result, $exists) !== false) {
					    $returnResult = 'Subscriber Already Exists';
					}
					if (strpos($result, $Wlist) !== false) {
					    $returnResult = 'Invalid List ID';
					}
					if (strpos($result, $Wapi) !== false) {
					    $returnResult = 'Invalid API Key';
					}
					if (strpos($result, $Rsuccess) !== false) {
					    $returnResult = 'success';
					}
					if (strpos($result, $RsuccessTwo) !== false) {
					    $returnResult = 'success';
					}
	            }

	            return $returnResult;
			}

			$MCreturnVal = '';
			if ($formBuilderEnableMailChimp == 'true') {
				$MCreturnVal = ssm_send_to_mailchimp_formBuilder($formBuilderMCApiKey, $formBuilderMCAccountName,$submitterName, $mc_submitterEmail,$merge_vars, $dblOptin);
			}


				$prevFBallSubmissions = get_post_meta( $ssm_post_id, 'ulpb_formBuilder_data_submission', true );

				$ssm_conversion_count = get_post_meta($ssm_post_id,'ssm_conversion_count',true);
				$ssm_conversion_count++;

				$userTimeZone = get_option('timezone_string');
				date_default_timezone_set($userTimeZone);
				$todaysDate = date("d-m-Y");

				$submissionPostMetaValue = array('Form_Name'=> $formNameText, 'Form_Fields' => $merge_vars, 'date' => $todaysDate);

				if (!is_array($prevFBallSubmissions)) {
					$prevFBallSubmissions = array();
				}


				
				if ($widgetPbFbFormAllowDuplicates == 'false') {

					$subExists = false;
					foreach ($prevFBallSubmissions as $key => $value) {

						if ($value["Form_Fields"]['EMAIL'] == $mc_submitterEmail) {
							$subExists = true;
						}
					}
					if ($subExists == true) {
						$updateSubmissions = 'Subscriber Already Exists';
					}else{
						array_push($prevFBallSubmissions, $submissionPostMetaValue);

						$updateSubmissions = update_post_meta( $ssm_post_id, 'ulpb_formBuilder_data_submission', $prevFBallSubmissions, $unique = false );
					}
				}else{
					array_push($prevFBallSubmissions, $submissionPostMetaValue);

					$updateSubmissions = update_post_meta( $ssm_post_id, 'ulpb_formBuilder_data_submission', $prevFBallSubmissions, $unique = false );
				}
				
				
				$updateResultConversionCount = update_post_meta( $ssm_post_id, 'ssm_conversion_count', $ssm_conversion_count, $unique = false);

				$returnSuccessArray = array();

				
				if ($pb_sendMail == true) {
					$returnSuccessArray['email'] = 'success';
					if ($updateSubmissions === 'Subscriber Already Exists') {
						$returnSuccessArray['email'] = 'Subscriber Already Exists';
					}
				} else{
					$returnSuccessArray['email'] = 'Some Error Occured while sending the request!';
				}

				if ($formBuilderEnableGetResponse == 'true') {
					$getResponseResult = send_data_to_gr_api($formBuilderGRApiKey,$formBuilderGRAccountName, $submitterName, $submitterEmail, $GR_customs_array);
				}else{
					$getResponseResult = 'Inactive';
				}

				if ($formBuilderEnableCM == 'true') {
					$CMResult = ssm_send_to_campaign_monitor_formBuilder($formBuilderCMApiKey,$formBuilderCMAccountName, $submitterName, $submitterEmail, $CM_customs_array);
				}else{
					$CMResult = 'Inactive';
				}


				if ($formBuilderEnableAC == 'true') {
					$ACResult = ssm_send_to_active_campaign_formBuilder($formBuilderACApiKey,$formBuilderACApiUrl, $formBuilderACAccountName, $submitterName,$submitterEmail,$GR_customs_array);
				}else{
					$ACResult = 'Inactive';
				}


				if ($formBuilderEnableDrip == 'true') {
					$DripResult = ssm_send_to_drip_formBuilder($formBuilderDripApiKey,$formBuilderDripAccountName, $submitterName,$submitterEmail,$formNameText,$drip_customs_array);
				}else{
					$DripResult = 'Inactive';
				}

				if ($formBuilderEnableAweber == 'true') {
					$AweberResult = ssm_send_to_aweber_formBuilder($formBuilderAweberList,$submitterName,$submitterEmail,$formName,$aweber_customs_array);
				}else{
					$AweberResult = 'Inactive';
				}

				if ($formBuilderEnableConvertKit == 'true') {
					$ConvertKitResult =  ssm_send_to_convertkit_formBuilder($formBuilderConvertKitApiKey,$formBuilderConvertKitAccountName,$submitterName, $submitterEmail,$aweber_customs_array );
				}else{
					$ConvertKitResult = 'Inactive';
				}

				$returnSuccessArray['convertkit'] = $ConvertKitResult;
				
				$returnSuccessArray['drip'] = $DripResult;

				$returnSuccessArray['activeCampaign'] = $ACResult;

				$returnSuccessArray['campaignMonitor'] = $CMResult;
				
				$returnSuccessArray['getResponse'] = $getResponseResult;

				$returnSuccessArray['aweber'] = $AweberResult;



				if ($formBuilderEnableMailChimp == 'true') {

					$returnSuccessArray['mailchimp'] = $MCreturnVal;
						
				} else{
					$returnSuccessArray['mailchimp'] = 'Inactive';
				}

				$returnSuccessArray['database'] = $updateSubmissions;

				echo json_encode($returnSuccessArray);


			
			exit();


		} // honeypot field check.

		   	
	}// nonce check.

		
}//  smfb_formBuilderEmail_ajax funtion end.



function smfb_cta_click_conversion_record(){
	if ( 
	    ! isset( $_GET['POPB_CTA_Nonce'] ) 
	    || ! wp_verify_nonce( $_GET['POPB_CTA_Nonce'], 'POPB_verify_clicked_el' ) 
	) {
	   echo 'Sorry, Security error.';
	   exit;
	}else{
		$ssm_post_id = sanitize_text_field( $_GET['pID'] );

		$ssm_clickThrough_count = get_post_meta($ssm_post_id,'ssm_clickThrough_count',true);
		$ssm_clickThrough_count++;

		$updateResultConversionCount = update_post_meta( $ssm_post_id, 'ssm_clickThrough_count', $ssm_clickThrough_count, $unique = false);

		echo 'success';
	   	exit;
	}
}





function smfb_loadShortcode_content(){

	function check_input($data){
	    $data = trim($data);
	    $data = stripslashes($data);
	    $data = htmlspecialchars($data);
	    return $data;
	}

	
	if( current_user_can('editor') || current_user_can('administrator') ) {
		$shortCodeRenderWidgetNO = $_REQUEST['POPB_Shortcode_nonce'];
		if ( ! wp_verify_nonce( $shortCodeRenderWidgetNO, 'POPB_data_nonce' ) ){
			die( 'Security check' ); 
		}else{

			$ulpb_entered_shortcode = check_input($_REQUEST['ulpb_shortcode']);
			if ( function_exists( 'load_smuzform_public_classes' ) ) {

				smuzform_public( 'core/class/class-smuzform-public.php' );
			

				$Public = new SmuzForm_Public();

				$Public->loadClasses();

				$Public->createUI();

			}
			
			echo do_shortcode( $ulpb_entered_shortcode );
		}
	}
	
	exit();
}




function smfb_get_global_row_content(){

	if( current_user_can('editor') || current_user_can('administrator') ) {

		 $POPB_GRG_Nonce = $_REQUEST['POPB_GRG_Nonce'];
		 if ( ! wp_verify_nonce( $POPB_GRG_Nonce, 'POPB_data_nonce' ) ) {
		 	die( 'Security check' ); 
		 }else{
			function check_input($data){
			    $data = trim($data);
			    $data = stripslashes($data);
			    $data = htmlspecialchars($data);
			    return $data;
			}

			$GlobalRowPId = check_input($_POST['globalRowID']);

			$globalRowPostData = get_post_meta( $GlobalRowPId, ULPB_DATA, true );

			echo json_encode( $globalRowPostData['Rows'][0]);
		} 
	}

exit();
}




function smfb_insert_template(){

	function check_input($data){

	    $data = trim($data);
	    $data = stripslashes($data);
	    $data = htmlspecialchars($data);
	    return $data;
	}
	if( current_user_can('editor') || current_user_can('administrator') ) {

		$insertTemplateNonce = $_REQUEST['insertTemplateNonce'];
		if ( ! wp_verify_nonce( $insertTemplateNonce, 'POPB_data_nonce' ) ) {
			die( 'Security check' ); 
		}else{
			$selectPostToInsert = check_input($_REQUEST['selectPostToInsert']);
			$pageToUpdate = check_input($_REQUEST['pageToUpdate']);
			$pageToUpdatePostType = check_input($_REQUEST['pageToUpdatePostType']);

			$dataToInsert = get_post_meta( $selectPostToInsert, 'ULPB_DATA', true );

		 	$returnSuccessArray  = array();

		 	if ($dataToInsert['Rows']) {
		 		$returnSuccessArray['Rows'] = $dataToInsert['Rows'];
		 		$returnSuccessArray['Message'] = 'Success';
		 	}else{
		 		$returnSuccessArray['Rows'] = 'Empty';
		 		$returnSuccessArray['Message'] = 'Failed';
		 	}
			//$dataToInsert["pageID"] = $pageToUpdate;
			//$dataToInsert["postType"] = $pageToUpdatePostType;

			//update_post_meta( $pageToUpdate, 'ULPB_DATA', $dataToInsert );
		 	echo json_encode($returnSuccessArray);
		}
	}
	exit();
}




function smfb_subscribe_list_empty_wp_ajax(){

	if (current_user_can('activate_plugins' )) {

		$subsListEmpty = $_REQUEST['subsListEmpty'];
		if ( ! wp_verify_nonce( $subsListEmpty, 'POPB_data_nonce' ) ) {
			die( 'Security check' ); 
		}else{
			$post_ID = $_REQUEST['ps_ID'];

			 update_post_meta( $post_ID, 'ssm_subscribers_list', '', $unique = false);

			if ($result === 0) {
				echo "No records found!";
			}else if($result === false){
				echo "Some error occurred";
			}
			else{
				echo 'Success';
				exit();
			}
		}

	}

}





function smfb_update_pagebuilder_active_option(){
	if( current_user_can('editor') || current_user_can('administrator') ) {

		$POPB_Switch_Nonce = $_REQUEST['POPB_Switch_Nonce'];
		if ( ! wp_verify_nonce( $POPB_Switch_Nonce, 'POPB_switch_nonce' ) ) {
			die( 'Security check' ); 
		}else{
			$page_id = intval($_GET['page_id']);
			$sentData = sanitize_text_field($_GET['ulpbActivate']);

			if ($sentData === 'ActivatePB') {
				update_post_meta($page_id, 'ulpb_page_builder_active','true');
			}else{
				update_post_meta($page_id, 'ulpb_page_builder_active','false');
			}

			echo "Switched";
		}
	}
	exit();
}


function smfb_empty_form_builder_data(){
	$POPB_data_Nonce = $_REQUEST['submitNonce'];
		if ( ! wp_verify_nonce( $POPB_data_Nonce, 'POPB_data_nonce' ) ) {
			die( 'Security check' ); 
		}else{
			$this_postID = sanitize_text_field($_POST['ps_ID']);

			$updateData = update_post_meta( $this_postID, 'ulpb_formBuilder_data_submission', '', $unique = false );

			if ($updateData == true) {
				echo 'Success';
			} else{
				echo "Already empty";
			}
		}

		exit();
}

function smfb_delete_form_builder_entry(){

	$POPB_data_Nonce = $_REQUEST['submitNonce'];
		if ( ! wp_verify_nonce( $POPB_data_Nonce, 'POPB_data_nonce' ) ) {
			die( 'Security check' ); 
		}else{
			
			$postID = sanitize_text_field($_POST['ps_ID']);
			$dataEntryIndex = sanitize_text_field($_GET['dataEntryIndex']);
			$allFormData = get_post_meta( $postID, 'ulpb_formBuilder_data_submission');

			unset($allFormData[0][$dataEntryIndex]);

			$allFormDataAfter = array_values($allFormData[0]);
			$updateAfterDeleting = update_post_meta( $postID, 'ulpb_formBuilder_data_submission', $allFormDataAfter, $unique = false );

			if ($updateAfterDeleting == true) {
				echo "success";
			}else{
				echo "Some error occurred!";
			}



		}
		exit();
}


function smfb_delete_optin_analytics(){

		$POPB_data_Nonce = $_REQUEST['submitNonce'];
		if ( ! wp_verify_nonce( $POPB_data_Nonce, 'POPB_data_nonce' ) ) {
			die( 'Security check' ); 
		}else{
			
			$postID = sanitize_text_field($_GET['postID']);
			$actionConfirmed = sanitize_text_field($_GET['actionConfirmed']);

			if ($actionConfirmed == 'true') {
				update_post_meta( $postID, 'ulpb_page_hit_counter', '0' );
				update_post_meta( $postID, 'ulpb_page_views_counter', '0' );
				update_post_meta( $postID, 'ssm_conversion_count', '0' );
				update_post_meta( $postID, 'popb_closed_popup_count', '0' );
				update_post_meta($postID,'ssm_clickThrough_count','0');
				for ($i=0; $i <=30 ; $i++) {
				    $thisDate = date('d-m-Y',strtotime("-$i days"));
				    delete_post_meta($postID,"ulpb_page_views_counter_$thisDate");
				}
				
				echo 'success';
			}

		}
		exit();
}






function smfb_send_user_feedback(){

	if ( ! check_ajax_referer() ) {
		die( 'security error' );
	}

	$other_input = '';
	if (isset($_POST['other_input']) ) {
		$other_input = sanitize_text_field( $_POST['other_input']);
	}
	$postedFeedbackReason = sanitize_text_field( $_POST['reason'] ) . "  :  ". $other_input."\n";

	if (isset($_POST['followUpEmail'])) {
		$followUpEmail  = sanitize_text_field($_POST['followUpEmail']);
		$postedFeedbackReason = $postedFeedbackReason."\n".$followUpEmail;
	}

	$emailContents = $postedFeedbackReason;
	if ( isset( $_POST['support'] ) ) {
		$postedFeedbackSupportEmail = sanitize_email( $_POST['support']['email'] );
		$postedFeedbackSupportTitle = sanitize_text_field( $_POST['support']['title'] );
		$postedFeedbackSupportMessage = sanitize_textarea_field( $_POST['support']['text'] );

		$emailContents = "Support Email : $postedFeedbackSupportEmail \n". 
						 "Support Title : $postedFeedbackSupportTitle \n".
						 "Support Message : $postedFeedbackSupportMessage \n";
	}

			$fromEmailAddress = home_url();
			$fromEmailAddress = trim($fromEmailAddress, '/');

			if (!preg_match('#^http(s)?://#', $fromEmailAddress)) {
			    $fromEmailAddress = 'http://' . $fromEmailAddress;
			}

			$urlParts = parse_url($fromEmailAddress);

			$OnlyDomain = preg_replace('/^www\./', '', $urlParts['host']);

			$fromEmailAddress =  "pluginopsfeedbackform@".$OnlyDomain;

			
			$headers[]= "From: "."Feedback Form"." <".$fromEmailAddress.">";


	$sendFeedback =  wp_mail( 'feedback@pluginops.com', "Uninstall FeedBack", $emailContents, $headers);

	if ($sendFeedback  == true) {
		echo "success";
	}
	exit();

}


function smfb_popup_closed(){

	$POPB_data_Nonce = $_REQUEST['smfb_close_confirm'];
	if ( ! wp_verify_nonce( $POPB_data_Nonce, 'MSFB_close_confirmation' ) ) {
		die( 'Security check' ); 
	}else{
		$postID = sanitize_text_field( $_GET['ps_ID'] );

		$prev_closed_val = get_post_meta( $postID, 'popb_closed_popup_count', true);

		$prev_closed_val++;

		$updateCount = update_post_meta( $postID, 'popb_closed_popup_count', $prev_closed_val, $unique = false);
	}

	

	exit();

}



function smfb_aweber_connect(){

	$POPB_data_Nonce = $_REQUEST['POPB_nonce'];
	if ( ! wp_verify_nonce( $POPB_data_Nonce, 'POPB_data_nonce' ) ) {
		die( 'Security check' ); 
	}else{
		$authCode = sanitize_text_field( $_POST['aweberAuthCode'] );

		update_option( 'ulpb_aweber_auth_code', $authCode );

		$returnArray = array();

		try{
			$authCode = get_option( 'ulpb_aweber_auth_code' );

			require(SMFB_PLUGIN_PATH.'/integrations/aweber_api/aweber_api.php');
			list( $auth_key, $auth_token, $req_key, $req_token, $oauth ) = explode( '|', $authCode );

			$aweber = new AWeberAPI( $auth_key, $auth_token );

			$aweber->user->tokenSecret = $req_token;
			$aweber->user->requestToken = $req_key;
			$aweber->user->verifier = $oauth;
		    list($accessToken, $accessTokenSecret) = $aweber->getAccessToken();   //to get access token & token secret.
		    update_option( 'ulpb_aweber_accessToken', $accessToken );
		    update_option( 'ulpb_aweber_accessTokenSecret', $accessTokenSecret );

		    $account = $aweber->getAccount(get_option( 'ulpb_aweber_accessToken'), get_option( 'ulpb_aweber_accessTokenSecret') );
		    
		    $returnArray['allLists'] = '';
		    foreach ($account->lists as $list) {
		    	$returnArray['allLists'] = $returnArray['allLists'].'<option value="'.$list->url.'">'.$list->name.'</option>';
			}

			$returnArray['allLists'] = ' '.$returnArray['allLists'].' ';
			$returnArray['queryMessage'] = 'success';

			echo json_encode($returnArray);

		}catch(exception $e){
			$returnArray['queryMessage'] = $e;
	    	echo json_encode($returnArray);
		}


		exit();


	}

}


function smfb_aweber_connection_check(){

	$POPB_data_Nonce = $_REQUEST['POPB_nonce'];
	if ( ! wp_verify_nonce( $POPB_data_Nonce, 'POPB_data_nonce' ) ) {
		die( 'Security check' );
	}else{

		$returnArray = array();

		try{
			$authCode = get_option( 'ulpb_aweber_auth_code' );
			require(SMFB_PLUGIN_PATH.'/integrations/aweber_api/aweber_api.php');
			list( $auth_key, $auth_token, $req_key, $req_token, $oauth ) = explode( '|', $authCode );

			$aweber = new AWeberAPI( $auth_key, $auth_token );

			$aweber->user->tokenSecret = $req_token;
			$aweber->user->requestToken = $req_key;
			$aweber->user->verifier = $oauth;

		    $account = $aweber->getAccount(get_option( 'ulpb_aweber_accessToken'), get_option( 'ulpb_aweber_accessTokenSecret') );
		    
		    $returnArray['allLists'] = '';
		    foreach ($account->lists as $list) {
		    	$returnArray['allLists'] = $returnArray['allLists'].'<option value="'.$list->url.'">'.$list->name.'</option>';
			}

			$returnArray['allLists'] = ' '.$returnArray['allLists'].' ';
			$returnArray['queryMessage'] = 'success';

			echo json_encode($returnArray);

		}catch(exception $e){
			$returnArray['queryMessage'] = $e;
	    	echo json_encode($returnArray);
		}


		exit();


	}

}




}