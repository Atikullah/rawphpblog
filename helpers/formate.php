<?php 

/**
* date formate
*/
class DateFormate{
	public function date_formate($date){
		return  date('F j,Y, g:i a',strtotime($date));

	}


	public function ReadMore($massage, $limit = 100){
			// $massage = $text. " ";
			// $massage = substr($text,0,$limit);
			// $massage = $text."....";
			// return $massage;


		if (strlen($massage) > $limit){
      $read = substr($massage, 0, strrpos(substr($massage, 0, $limit), ' ')) . ' ...';
      	echo $read;
      }
		
	}


	public function validation($data){
		$data = trim($data);
		$data = stripcslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

	public function title(){
		$path = $_SERVER['SCRIPT_FILENAME'];
		$title = basename($path,'.php');
		//$title = str_replace('_', ' ', $title);
		if ($title == 'index') {
			$title = 'home';
		}elseif ($title =='contact') {
			$title = 'contace';
		}
		return $title =ucfirst($title );
	}


	
	

}

 ?>