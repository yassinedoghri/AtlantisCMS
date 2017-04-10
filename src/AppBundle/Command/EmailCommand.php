<?php
namespace AppBundle\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\HttpFoundation\Session\Session;
use PHPMailer;


       
class EmailCommand extends ContainerAwareCommand
{
    protected function configure()
    {
         $this
        // the name of the command (the part after "bin/console")
        ->setName('command:email')

        // the short description shown while running "php bin/console list"
        ->setDescription('Creates a new user.')

        // the full command description shown when running the command with
        // the "--help" option
        ->setHelp('This command allows you to create a user...')
    ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        if($this->getContainer()->get('session')->isStarted()){
            $session->start();
            $previousID = $this->getContainer()->get('session')->get('id');
            $output-> writeln($previousID);
        }
        else
        {
            $session = new Session();
        }

    	$data = $this->getContainer()->get('doctrine')->getManager()->getRepository('AppBundle:Crisis')->findAll();
    	dump($data);

    	$name='SummaryReport_'.date('m-d-Y_hia').'.txt';
    	$pmSummary = fopen($name,"w");
    	$dateC = date("Y/m/d H:i:s");
    	$messageLine = 'This report is generated on: '. $dateC ."\n";
    	$dCase = 0;
    	$hCase = 0;
    	$fCase = 0;
     	$vCase = 0;
        $progressCount = 0;
        $requestCount = 0;
        $doneCount = 0;
        $totalCase = count($data);


    	fwrite($pmSummary, $messageLine);

    	for($i = 0; $i<count($data); $i++)
    	{
    		$category = "";
            if($data[$i]->getStatus() == "in_progress"){
                $progressCount++;
            }
            else if($data[$i]->getStatus() == "request"){
                $requestCount++;
            }
            else if($data[$i]->getStatus() == "done"){
                $doneCount++;
            }


    		switch($data[$i]->getCategory()->getId()){
    			
    			case 1:
    				$category = "Vehicle Accident";
                    $vCase++;
                    break;
    			case 2:
                    $category = "Fire";
                    $fCase++;
                    break;
    			case 3:
    				$category = "Dengue";
                    $dCase++;
                    break;
    				
    		}
    		//$output->writeln($data[$i]->getAddressLine1());
    		$dateS = ($data[$i]->getSubmittedOn())-> format('d-m-Y H:i:s');
    		$dateU = ($data[$i]->getLastModification())-> format('d-m-Y H:i:s');
    		
    		$messageLine = " \n Category: ". $category ."\n Address: ". $data[$i]->getAddressLine1() . " \n Message: ". $data[$i]->getMessage() . " \n Status: " . $data[$i]->getStatus() ." \n Submitted On: ". $dateS ." \n Last Update: " . $dateU . "\n ----------------------------------------------------------------------------------------------------------";

            
    		fwrite($pmSummary, $messageLine);
            $this->getContainer()->get('session')->set('id', $data[$i]->getId());   
    	}

        $lastID = $this->getContainer()->get('session')->get('id');
        
        //$output-> writeln($lastID);
    	$messageLine ="\n Total Dengue Cases: ".$dCase."\n Total Fire Cases: ".$fCase."\n Total Vehicle Accident Cases: ".$vCase."\n Total Number of Cases: ".$totalCase."\n Total Cases in progress: ".$progressCount."\n Total Cases in request: ".$requestCount."\n Total Cases done: ".$doneCount;
    	fwrite($pmSummary, $messageLine);

    	fclose($pmSummary);

        $mail = new PHPMailer; //From email address and name 
        $mail->IsSMTP(); // enable SMTP
		$mail->SMTPDebug = 2; // debugging: 1 = errors and messages, 2 = messages only
		$mail->SMTPAuth = true; // authentication enabled
		$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
		$mail->Host = "smtp.gmail.com";
		$mail->Port = 465; // or 587
		$mail->Username = "alantisCMS@gmail.com";
		$mail->Password = "alantisCMS123";
		$mail->FromName = "AtlantisCMS"; //To address and name 
		$mail->addAddress("alantisCMS@gmail.com", "Prime Minister's Office");//Recipient name is optional
		$mail->isHTML(true); 
		$mail->Subject = "Crisis Summary Report <DO-NOT-REPLY>"; 
		$mail->addAttachment($name);
		$mail->Body = "Good Day PM, <br/><br/>Attatched is the compiled report. <br/><br/><i>This message is auto-generated from Atlantis CMS.</i>";
		$mail->AltBody = "This is the plain text version of the email content"; 
		
		if(!$mail->send()) 
		{
		echo "Mailer Error: " . $mail->ErrorInfo; 
		} 
		else { echo "Message has been sent successfully"; 
		}
	}
}

?>