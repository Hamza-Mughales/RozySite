<?php
defined('BASEPATH') OR exit("No direct script access allowed");

$config['mail'] = array(
    'protocol' => 'sendemail',
    'smtp_host' => 'http://amataddali.myartsonline.com/',    // My host name
    'smtp_port' => 587,
    'smtp_user' => 'me@amataddali.myartsonline.com', //  // My username
    'smtp_pass' => 'amat123456',   // My password
    'charset' => 'iso-8859-1',
    'wordwrap' => TRUE,
    'smtp_timeout' => 30,
    'newline' => "\r\n",
    'crlf' => "\r\n",
    'mailtype' => "text"
);