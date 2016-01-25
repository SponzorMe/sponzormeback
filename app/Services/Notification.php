<?php namespace App\Services;
use Weblee\Mandrill\Mail;
use Log;
class Notification {
  public function sendEmail($template, $lang, $to, $vars){
    try {
      $template_name = $template."-".$lang;
	    $template_content = array(
        array('name' => '', 'content' => '')
	    );
	    $message = array(
        'to' => array(
            array(
                'email' =>	$to['email'],
                'name' 	=> 	$to['name'],
                'type' 	=> 'to'
            )
        ),
        'global_merge_vars' => $vars,
	    );
	    $result = \MandrillMail::messages()->sendTemplate($template_name, $template_content, $message);
        \Log::info("Email Info: Template ".$template_name." Status: ".$result[0]["status"]." To: ".$to['email']);
		}
		catch(Exeption $e){
			\Log::info("Email ".$template_name." NO sent to: ".$to['email']." error:".$e->getMessage());
		}
  }
}
