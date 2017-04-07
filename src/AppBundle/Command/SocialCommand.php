<?php
namespace AppBundle\Command;

use AppBundle\Entity\Crisis;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Facebook;

class SocialCommand extends Command
{
    protected function configure()
    {
       $this
        // the name of the command (the part after "bin/console")
        ->setName('command:social-media-update')

        // the short description shown while running "php bin/console list"
        ->setDescription('Publish a new post.')

        // the full command description shown when running the command with
        // the "--help" option
        ->setHelp('This command allows you to publish a post on social media...') ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
    	$length = 10;
    	$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    	$characterLength = strlen($characters);
    	$randomString = '';

    	for($i = 0; $i < $length; $i++)
    	{
    		$randomString .= $characters[rand(0, $characterLength -1)];
    	}

    	$fb = new Facebook\Facebook([
		 'app_id' => '151027518757598',
		 'app_secret' => '3cb475b7e36144a15e2bb1080131d262',
		 'default_graph_version' => 'v2.8',
		]);

     	//Post property to Facebook
		$linkData = [
		 /*'link' => 'http://127.0.0.1:8000',*/
		 'message' => $randomString
		];

		$pageAccessToken ='EAACJW9WbWt4BAImmdLUaBgSM2t3RlSd0ugdf3TKwXy5AenOYGK41X7eSMsFtAnpccMcrwhWAo3MaUpYCRisgr5T4U1ZAucgDNQZBCls4gqlz7ZAehq3EXWmHwNiEvyD37z7SZBGU69fTExZAGMQ7T9z7GZC31Qz7uiZCiqs0OVxxqsyodUZA1iORn3aRZB956zymst2uppgbpkQZDZD';

		try{
			$fb = new Facebook\Facebook([
			 'app_id' => '151027518757598',
			 'app_secret' => '3cb475b7e36144a15e2bb1080131d262',
			 'default_graph_version' => 'v2.8',
			]);

			$response = $fb->post('/1130942967017998/feed', $linkData, $pageAccessToken);
						} catch(Facebook\Exceptions\FacebookResponseException $e) {
						 echo 'Graph returned an error: '.$e->getMessage();
						 exit;
						} catch(Facebook\Exceptions\FacebookSDKException $e) {
						 echo 'Facebook SDK returned an error: '.$e->getMessage();
						 exit;
						}
						$graphNode = $response->getGraphNode(); 
		}

			
	}

?>