<?php

class aots {
	public $db;
	public function __construct()  
    {
    	$hostServer = "localhost";
     	$UserName = 'root';
		$PassWord = 'password';   		
    	
		$this->db = mysql_connect($hostServer, $UserName,$PassWord );
		mysql_select_db("AOTS") or die("could not connect to db");
    }
    
	public function createAotsTicket($attuid){
		$ticket_number = mt_rand(10000, 99999);
		$query = "INSERT INTO AOTS (ticket_number,status,created_date,severity,ticketOwner) VALUES ('$ticket_number','Open',NOW(),1,'$attuid')";
		$result = mysql_query($query);
		if(!$result)
			{
				echo "Cant insert the ticket";
			} else 
			return $ticket_number;
	}
	
	public function updateAotsTicket($ticketNumber){
		$query= "update AOTS set status='In Progress'  where ticket_number='$ticketNumber'";
		$objQuery = mysql_query($query);
		if(!$objQuery)
			{
				echo "Cant update the ticket";
			}else 
				return true;
		
	}
	
	public function closeAotsTicket($ticketNumber){
		$query= "update AOTS set status='completed'  where ticket_number='$ticketNumber'";
		$objQuery = mysql_query($query);
		if(!$objQuery)
			{
				echo "Cant close the ticket";
			}else 
				return true;
	}
	
	public function excecuteCommand($cmd,$ticketNumber,$attuid)
	{
		if($ticketNumber)
		{
			switch ($cmd) {
			case "Create":
				$ret = self::createAotsTicket($attuid);
				echo $ret;
			break;
			case "Update":
				$ret = self::updateAotsTicket($ticketNumber);
				echo $ret;
			break;
			case "Close":
				$ret = self::closeAotsTicket($ticketNumber);
				echo $ret;
			break;
			
			}
			
		}
		
	}
}
 $ob = new aots();
 //$cmd=$_GET['cmd'];
 //$ticketNumber = $_GET['ticketNumber'];
// $attuid = $_GET['attuid'];

 $cmd='Create';
 $ticketNumber = '7987';
 $attuid = 'bg4730';
 
$ob->excecuteCommand($cmd,$ticketNumber,$attuid);
