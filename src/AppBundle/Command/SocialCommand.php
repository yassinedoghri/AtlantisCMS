<?php

namespace AppBundle\Command;

use AppBundle\Entity\Crisis;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;

use Facebook;

class SocialCommand extends ContainerAwareCommand
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
    	$fbMessage='';

    	$data = $this->getContainer()->get('doctrine')->getManager()->getRepository('AppBundle:Crisis')->findAll();
    	dump($data);

    	$noOfCrisis = count($data)-1;
    	for($i = $noOfCrisis; $i>0; $i--)
    	{
    		if($data[$i]->getShowToPublic() == 1)
    		{
    			$fbMessage = $data[$i]->getMessage();
    			break;
    		}
    	}

    	if($fbMessage=='')
    	{
    		$fbMessage='Nothing new to update';
    	}

    	
		$fb = new Facebook\Facebook([
		 'app_id' => '151027518757598',
		 'app_secret' => '3cb475b7e36144a15e2bb1080131d262',
		 'default_graph_version' => 'v2.8',
		]);

     	//Post property to Facebook
		$linkData = [
		 //'link' => 'http://127.0.0.1:8000',
		 'message' => $fbMessage

		];

		$pageAccessToken ='EAACJW9WbWt4BAAX9DRXWvXcS1fd38QWgVbFumk0qBrKSpRoAZBzSXGmMTSPvJAFq3a2e2eY9qKkt8X5mp7eXAQaxovjKcwLk6GN4c8eT6cmhDSR3bOQqTj5ricy6IWArljnzepu0vRMDixpBH3pTC48Nerug7HzLpwZBluZCgZDZD';

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