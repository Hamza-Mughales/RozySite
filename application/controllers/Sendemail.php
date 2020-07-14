<?php defined('BASEPATH') or exit('No direct script access allowed');

class Sendemail extends CI_Controller
{

	    /**  __construct function  */
    // --------------------------------------------------------------------------------------------------
    public function __construct()
    {
        parent::__construct();
        $this->load->model('About_model', 'aboutModel');
	}
        
        public function sendemail()
        { 
                $this->load->library('email');
                
                $config = array(
                    'protocol' => 'POP3',
                    'smtp_host' => 'mboxhosting.com',    // My host name
                    'smtp_port' => 110,
                    'smtp_user' => 'me@amataddali.myartsonline.com', //  // My username
                    'smtp_pass' => 'amat123456',   // My password
                );
                
                $this->email->initialize($config);
                
                // Get the user email from DB
                $userdata = $this->aboutModel->get_about();
		$toEmail = $userdata->email;
		
		$name = $this->input->post('name');
		$email = $this->input->post('email');
		$message = $this->input->post('message');
		$message = ' الإيميل : ' . $email . ' الرسالة : ' . $message ;
                
                $this->email->from($email);
                $this->email->to($toEmail);
                $this->email->subject($name);
                $this->email->message($message);
        
                if($this->email->send())
                {
                echo "<p class='alert alert-success'>Thank you, your message has been sent successfully.</p>";
                        
                } 
                else
                {
                    echo "<p class='alert alert-error'>Sorry, problem in Sending Mail.</p>";
                }               
                
        }
        
        
        ///////////////////////// AJAX Mail /////////////
	/*
	public function sendemail()
	{
        
		// bringing the reciever name and email        
		$userdata = $this->aboutModel->get_about();
		$toEmail = $userdata->email;
		
		$name = $this->input->post('name');
		$email = $this->input->post('email');
		$message = $this->input->post('message');
		
		$mailHeaders = "From: ".$email . "\r\n";
		$my_message =  "Email: " . $email."  ". $message;
                //var_dump(mail($toEmail, $name, $my_message,$mailHeaders));exit;

		if(mail($toEmail, $name, $my_message, $mailHeaders)) {
                        echo "<p class='success'>Thank you, your message has been sent successfully.</p>";
                        
                } else {
                        echo "<p class='Error'>Sorry, problem in Sending Mail.</p>";
                        }
	} */
}
