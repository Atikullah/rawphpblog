	<link rel="stylesheet" href="font-awesome-4.5.0/css/font-awesome.css">	
	<link rel="stylesheet" href="css/nivo-slider.css" type="text/css" media="screen" />
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="css/index.css">



                <?php 
                    $quary = "select * from theme where id='1' " ;
                    $data = $db->select($quary);

                    if($data){
                               
                    while ( $result = $data->fetch_assoc()) {


		                     if ($result['theme'] == 'default') {?>
		                     	<link rel="stylesheet" type="text/css" href="script/default.css">
		                    <?php }  elseif ($result['theme'] == 'red') {?>
		                        <link rel="stylesheet" type="text/css" href="script/red.css">
		                     <?php }elseif (($result['theme'] == 'green')){?>
		                       <link rel="stylesheet" type="text/css" href="script/green.css">
		                   <?php }else{?>
		                     	 echo "<span class='error'>User not deleted...!</span>";

		                     <?php }}} ?>



                





