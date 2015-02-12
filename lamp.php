



<?php 

require_once 'classLedLamp.php';


$lamp = new LedLamp('192.168.1.100','50000');



$ctrl = $_GET['cmd'];
$color = $_GET['color'];

switch($ctrl){

// White
	case 'whiteon':
		$lamp->whiteLamp('on');
		echo $lamp->msg;
		break;
	
	case 'whiteoff':
		$lamp->whiteLamp('off');
		echo $lamp->msg;
		break;	
			
	case 'brancaBrilhoMais':
		$lamp->whiteLamp('brightup');;
		echo $lamp->msg;
		break;
		
	case 'brancaBrilhoMenos':
		$lamp->whiteLamp('brightdown');
		echo $lamp->msg;
		break;	

	case 'quente':
		$lamp->whiteLamp('warm');
		echo $lamp->msg;
		break;
		
	case 'frio':
		$lamp->whiteLamp('cold');
		echo $lamp->msg;
		break;
		
	case 'zone1on':
		$lamp->whiteLamp('zone1on');
		echo $lamp->msg;
		break;	
		
	case 'zone1off':
		$lamp->whiteLamp('zone1off');
		echo $lamp->msg;
		break;		

	case 'zone2on':
		$lamp->whiteLamp('zone2on');
		echo $lamp->msg;
		break;
		
	case 'zone2off':
		$lamp->whiteLamp('zone2off');
		echo $lamp->msg;
		break;		

	case 'zone3on':
		$lamp->whiteLamp('zone3on');
		echo $lamp->msg;
		break;
		
	case 'zone3off':
		$lamp->whiteLamp('zone3off');
		echo $lamp->msg;
		break;

	case 'zone4on':
		$lamp->whiteLamp('zone4on');
		echo $lamp->msg;
		break;
		
	case 'zone4off':
		$lamp->whiteLamp('zone4off');
		echo $lamp->msg;
		break;		
		
// RGB		
	
	case 'liga':
		$lamp->rgbOn();
		echo $lamp->msg;
		break;
		
	case 'desliga':
		$lamp->rgbOff();
		echo $lamp->msg;
		break;
		
	case 'brilhomais':
		$lamp->rgbBrightnessUp();
		echo $lamp->msg;
		break;
		
	case 'brilhomenos':
		$lamp->rgbBrightnessDown();
		echo $lamp->msg;
		break;

	case 'modomais':
		$lamp->rgbModeUp();
		echo $lamp->msg;
		break;
		
	case 'modomenos':
		$lamp->rgbModeDown();
		echo $lamp->msg;
		break;
		
	case 'cor':
		$lamp->rgbColor($color);
		echo $lamp->msg;
		break;
		
	default:
		$lamp->rgbOn();
		break;
		
}





?>
