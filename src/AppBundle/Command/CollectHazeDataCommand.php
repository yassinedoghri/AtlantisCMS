<?php
namespace AppBundle\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Doctrine\ORM\EntityManager;
use AppBundle\Entity\Haze;

class CollectHazeDataCommand extends ContainerAwareCommand {

    protected function configure() {
       $this
        // the name of the command (the part after "bin/console")
        ->setName('command:haze-data-update')

        // the short description shown while running "php bin/console list"
        ->setDescription('Collects haze data from NEA\'s data with API link.')

        // the full command description shown when running the command with
        // the "--help" option
        ->setHelp('This command allows you to collect haze data from NEA.') ;
    }
    protected function updateTable($id, $lat, $lng, $timestamp, $readings){
		$em = $this->getContainer()->get('doctrine.orm.entity_manager');
		$region = $em->getRepository('AppBundle:Haze')->findOneBy(array('regionId' => $id));
		//$region = $em->getRepository('AppBundle:Haze')->findBy(array('region_id' => 'abc'));
		if(!$region){
			//throw $this->createNotFoundException('No haze found for id '.$id);
			//$output->writeln('ID: '.$id.' not found');
			return;
		}
		// Update cols here
		$region->setLat($lat);
		$region->setLng($lng);
		$region->setTimestamp($timestamp);
		foreach($readings as $reading){
			switch((string) $reading['type']){
				case 'NPSI':
					$region->setNpsi($reading['value']);
					break;
				case 'NO2_1HR_MAX':
					$region->setNo21hrMax($reading['value']);
					break;
				case 'PM10_24HR':
					$region->setPm1024hr($reading['value']);
					break;
				case 'PM25_24HR':
					$region->setPm2524hr($reading['value']);
					break;
				case 'SO2_24HR':
					$region->setSo224hr($reading['value']);
					break;
				case 'CO_8HR_MAX':
					$region->setCo8hrMax($reading['value']);
					break;
				case 'O3_8HR_MAX':
					$region->setO38hrMax($reading['value']);
					break;
				case 'NPSI_CO':
					$region->setNpsiCo($reading['value']);
					break;
				case 'NPSI_O3':
					$region->setNpsiO3($reading['value']);
					break;
				case 'NPSI_PM10':
					$region->setNpsiPm10($reading['value']);
					break;
				case 'NPSI_PM25':
					$region->setNpsiPm25($reading['value']);
					break;
				case 'NPSI_SO2':
					$region->setNpsiSo2($reading['value']);
					break;
				default: echo 'ERROR. No such type.';
			}
		}

		// Flush to update database
		$em->flush();
    }

    protected function execute(InputInterface $input, OutputInterface $output) {
        // Creating a CURL Request to access the API
        // uri --> xml
        //$this->oi = $output;
        $uri = 'http://api.nea.gov.sg/api/WebAPI/?dataset=psi_update&keyref=781CF461BB6606AD80A87393DAFA402A9EE5E2584A52B519';

        // usage: use correct URI with API key in keyref
        $myRequest = curl_init();
        curl_setopt($myRequest, CURLOPT_URL, $uri);
		curl_setopt($myRequest, CURLOPT_RETURNTRANSFER, 1);

        // Getting a response from API call
        $myResponse = curl_exec($myRequest);

        // Returned data is in XML format, so xml_parse? first
        libxml_use_internal_errors(true);
        //$data = new SimpleXMLElement($myResponse);
        $data = simplexml_load_string($myResponse);
        if($data === false){
            echo "Failed to load XML";
            foreach(libxml_get_errors() as $error){
                echo "<br>", $error->message;
            }
        }else{
            foreach($data->item[0]->region as $region){
                $id = $region->id;
                $lat = $region->latitude;
                $lng = $region->longitude;
                $timestamp = $region->record['timestamp'];
                $output->writeln('==='.$id.'===');
                foreach($region->record[0]->reading as $reading){
                    $type = $reading['type'];
                    $val = $reading['value'];
                    $output->writeln('type-'.$type.'-val-'.$val);
                }

				$this->updateTable($id, $lat, $lng, $timestamp, $region->record[0]->reading);
            }
        }
        //$data = json_decode($myResponse);
    }
}

?>
