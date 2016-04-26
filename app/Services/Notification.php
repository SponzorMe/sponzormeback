<?php 

namespace App\Services;
use Log;
use SparkPost\SparkPost;
use GuzzleHttp\Client;
use Ivory\HttpAdapter\Guzzle6HttpAdapter;
class Notification {
  public function sendEmail($template, $lang, $to, $vars){
      
    $template_name = $template."-".$lang;  
    $httpAdapter = new Guzzle6HttpAdapter(new Client());
    $sparky = new SparkPost($httpAdapter, ['key'=>'ac0a731b2afe9707d3319cc8d0d288ed369d0649']);
    try {
        $results = $sparky->transmission->send([
            'from'=>'SponzorMe <noreply@sponzor.me>',
            'recipients'=>[
            [
                'address'=>[
                'email'=>$to['email'], 'name'=>$to['name']
                ]
            ]
            ],
            'template'=>$template_name,
            'substitutionData' => $vars
        ]);
        \Log::info("Email Info: Template ".$template_name." SENT id_tx: ".$results[0]["id"]." total_accepted_recipients: ".$results[0]["total_accepted_recipients"]." To: ".$to['email']);
    } catch (\Exception $exception) {
        Log::info("Email ".$template_name." NO SENT to: ".$to['email']." error:".$e->getMessage());
    }
}
}
