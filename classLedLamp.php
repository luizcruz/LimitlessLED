<?php 

/*
 * 
LimitlessLED White
——————
35 00 55 – All On
39 00 55 – All Off
3C 00 55 – Brightness Up
34 00 55 – Brightness Down (There are ten steps between min and max)
3E 00 55 – Warmer
3F 00 55 – Cooler (There are ten steps between warmest and coolest)

38 00 55 – Zone 1 On
3B 00 55 – Zone 1 Off
3D 00 55 – Zone 2 On
33 00 55 – Zone 2 Off
37 00 55 – Zone 3 On
3A 00 55 – Zone 3 Off
32 00 55 – Zone 4 On
36 00 55 – Zone 4 Off

B5 00 55 – All On Full (Send >=100ms after All On)
B8 00 55 – Zone 1 Full (Send >=100ms after Zone 1 On)
BD 00 55 – Zone 2 Full (Send >=100ms after Zone 2 On)
B7 00 55 – Zone 3 Full (Send >=100ms after Zone 3 On)
B2 00 55 – Zone 4 Full (Send >=100ms after Zone 4 On)

B9 00 55 – All Nightlight (Send >=100ms after All Off)
BB 00 55 – Zone 1 Nightlight (Send >=100ms after Zone 1 Off)
B3 00 55 – Zone 2 Nightlight (Send >=100ms after Zone 2 Off)
BA 00 55 – Zone 3 Nightlight (Send >=100ms after Zone 3 Off)
B6 00 55 – Zone 4 Nightlight (Send >=100ms after Zone 4 Off)

LimitlessLED RGB
——————
22 00 55 – Lamps On
21 00 55 – Lamps Off
23 00 55 – Brightness Up
24 00 55 – Brightness Down (There are nine steps between min and max)
27 00 55 – Mode Up
28 00 55 – Mode Down (There are 20 modes. The lowest is constant white)
25 00 55 – Speed Up (Fast)
26 00 55 – Speed Down (Slow)
20 xx 55 – Set Colour to xx

 * 
 */

class LedLamp{

	//Variables
	public $command;
	const end = '55';
	public $ip;
	public $port;
	public $msg;
	
	public $arr_m = array(
			"Lâmpada ligada.",
			"Lâmpada desligada.",
			"Aumentando brilho.",
			"Diminuindo brilho.",
			"Aumentando temperatura.",
			"Diminuindo temperatura.",
			"Zona 1 ligada.",
			"Zona 1 desligada.",
			"Zona 2 ligada.",
			"Zona 2 desligada.",
			"Zona 3 ligada.",
			"Zona 3 desligada.",
			"Zona 4 ligada.",
			"Zona 4 desligada."
			
	);
								
	
	//Constructor for set IP and port for remote control
	public function __construct($ip,$port) {
		$this->ip = $ip;
		$this->port = $port;
	}

	//Public functions
	
	public function whiteLamp($textualcmd){
		
		//Select correct codes
		$index = 0;
		switch($textualcmd){
			case 'on':
				$this->command = '35';
				$index = 0;	
				break;
				
			case 'off':
				$this->command = '39';
				$index = 1;
				break;

			case 'brightup':
				$this->command = '3C';
				$index = 2;
				break;

			case 'brightdown':
				$this->command = '34';
				$index = 3;
				break;	
				
			case 'warm':
				$this->command = '3E';
				$index = 4;
				break;
			
			case 'cold':
				$this->command = '3F';
				$index = 5;				
				break;

			case 'zone1on':
				$this->command = '38';
				$index = 6;
				break;

			case 'zone1off':
				$this->command = '3B';
				$index = 7;
				break;				

			case 'zone2on':
				$this->command = '3D';
				$index = 8;
				break;

			case 'zone2off':
				$this->command = '33';
				$index = 9;
				break;

			case 'zone3on':
				$this->command = '37';
				$index = 10;
				break;
					
			case 'zone3off':
				$this->command = '3A';
				$index = 11;
				break;					

			case 'zone4on':
				$this->command = '32';
				$index = 12;
				break;
						
			case 'zone4off':
				$this->command = '36';
				$index = 13;
				break;
				
		}
		
		//Send command and message
		$this->value = '00';
		if($this->sendUdp()){
			$this->msg = "<div class=\"alert alert-success\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>".$this->arr_m[$index]."</div>";
		}

	}
	


	
	public function rgbOn(){
		$this->command = '22';
		$this->value = '00';
		if($this->sendUdp()){
			$this->msg = "<div class=\"alert alert-success\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>Lâmpada colorida ligada</div>";
		}
		
	}

	public function rgbOff(){
		$this->command = '21';
		$this->value = '00';
		if($this->sendUdp()){
			$this->msg = "<div class=\"alert alert-success\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>Lâmpada colorida desligada</div>";
		}
	}
		
	public function rgbBrightnessUp(){
		$this->command = '23';
		$this->value = '00';
		if($this->sendUdp()){
			$this->msg = "<div class=\"alert alert-success\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>Brilho aumentado</div>";
		}
		
	}	

	public function rgbBrightnessDown(){
		$this->command = '24';
		$this->value = '00';
		if($this->sendUdp()){
			$this->msg = "<div class=\"alert alert-success\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>Brilho diminuido</div>";
		}
	
	}	

	public function rgbModeDown(){
		$this->command = '28';
		$this->value = '00';
		if($this->sendUdp()){
			$this->msg = "<div class=\"alert alert-success\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>Modo alternado para baixo</div>";
		}
	
	}

	public function rgbModeUp(){
		$this->command = '27';
		$this->value = '00';
		if($this->sendUdp()){
			$this->msg = "<div class=\"alert alert-success\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>Modo alternado para cima</div>";
		}
	
	}

	public function rgbColor($color){
		$this->command = '20';
		$this->value = $color;
		if($this->sendUdp()){
			$this->msg = "<div class=\"alert alert-success\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>Cor alterada</div>";
		}
	
	}

	//Private functions
	private function sendUdp()
	{
		$address = 'udp://'.$this->ip.':'.$this->port;
		$fp = stream_socket_client($address, $errno, $errstr);
	
		if (!$fp)
		{
			$this->msg = "ERROR: $errno - $errstr<br />\n";
		}
		else
		{
			$cmd = $this->hexToBin($this->command);
			$vle = $this->hexToBin($this->value);
			$end = $this->hexToBin(LedLamp::end);
		
			fwrite($fp, $cmd);
			fwrite($fp, $vle);
			fwrite($fp, $end);
				
			fclose($fp);	
			return true;		
		}
	
	}
	

	private function hexToBin($hex)
	{
		$n = strlen($hex);
		$sbin="";
		$i=0;
		while($i<$n)
		{
			$a =substr($hex,$i,2);
			$c = pack("H*",$a);
			if ($i==0){$sbin=$c;}
			else {$sbin.=$c;}
			$i+=2;
		}
		return $sbin;

	}

}
?>