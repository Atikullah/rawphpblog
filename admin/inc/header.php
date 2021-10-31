<?php 
    include '../lib/Session.php'; 
    Session::checksession();
?>


<?php include '../config/config.php'; ?>
<?php include '../lib/Database.php'; ?>
<?php include '../helpers/formate.php'; ?>


 
 <?php 
    $db = new Database();
    $formate = new DateFormate();

 ?>



<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <title> Admin</title>
    <link rel="stylesheet" type="text/css" href="css/reset.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/text.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/grid.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/layout.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/nav.css" media="screen" />
    <link href="css/table/demo_page.css" rel="stylesheet" type="text/css" />
    <!-- BEGIN: load jquery -->
    <script src="js/jquery-1.6.4.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="js/jquery-ui/jquery.ui.core.min.js"></script>
    <script src="js/jquery-ui/jquery.ui.widget.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.ui.accordion.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.effects.core.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.effects.slide.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.ui.mouse.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.ui.sortable.min.js" type="text/javascript"></script>
    <script src="js/table/jquery.dataTables.min.js" type="text/javascript"></script>
    <!-- END: load jquery -->
    <script type="text/javascript" src="js/table/table.js"></script>
    <script src="js/setup.js" type="text/javascript"></script>
	 <script type="text/javascript">
        $(document).ready(function () {
            setupLeftMenu();
		    setSidebarHeight();
        });
    </script>

</head>
<body>
    <div class="container_12">
        <div class="grid_12 header-repeat">
            <div id="branding">
                <div class="floatleft logo">
                    <img src="img/livelogo.png" alt="Logo" />
				</div>
				<div class="floatleft middle">
					<h1>Training with live project</h1>
					<p>www.trainingwithliveproject.com</p>
				</div>

                    <?php 
                        $userId = Session::get('userid');
                        $UserStatus = Session::get('userstatus');
                     ?>

                <div class="floatright">
                <?php 
                     $quary = "SELECT * from tbl_user where id='$userId' AND status=' $UserStatus'" ;
                        $post = $db->select($quary);
                        if($post){
                        while ( $result = $post->fetch_assoc()) {

                 ?>    
                    <div class="floatleft">
                        <img src="<?php echo $result['image'];?>" height="40px" width="80px" alt="Profile Pic" /></div>
                        <?php }} ?>

                        <?php 
                            if (isset($_GET['action']) && $_GET['action'] == logout) {
                               Session::destroy();
                            }

                         ?>
                    <div class="floatleft marginleft10 ">
                        <ul class="inline-ul floatleft">
                            <li style="font-size: 25px;color: #A6D1DD;"><?php echo Session::get('username'); ?> || </li>
                            <li ><a class="btn btn-denger" style="font-size: 17px;font-size: larger;font-family: cursive;color: black;" href="?action=logout">Logout</a></li>
                        </ul>
                    </div>
                </div>
                <div class="clear">
                </div>
            </div>
        </div>
        <div class="clear">
        </div>
        <div class="grid_12">
            <ul class="nav main">
                <li class="ic-dashboard"><a href="index.php"><span>Dashboard</span></a> </li>
                <li class="ic-dashboard"><a href="themes.php"><span>Themes</span></a> </li>
                <!-- <li class="ic-form-style"><a href="profile.php"><span>User Profile</span></a></li> -->
                <li class="ic-typography"><a href="profile.php"><span>Update Profile</span></a></li>
                <li class="ic-typography"><a href="viewprofile.php"><span>View Profile</span></a></li>
				<li class="ic-typography"><a href="changepassword.php"><span>Change Password</span></a></li>
                 <li class="ic-charts"><a href="postlist.php"><span>post list</span></a></li>

                <li class="ic-grid-tables" style="float: right;"><a href="inbox.php"><span>Inbox

                    <?php 
                        $quary = "select * from  contact where status='0' order by id desc " ;
                        $data = $db->select($quary);

                        if($data){ 
                            $count = mysqli_num_rows($data);
                            echo "(".$count.")";
                           }else{
                            echo "(0)";
                           }
                   
                    ?>

                </span></a></li>


            
				
               
            </ul>
        </div>
 