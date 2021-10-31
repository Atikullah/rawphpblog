    <div class="headersection templete clear">
        <a href="index.php">
            <div class="logo">
                <?php 
                    $quary = "select * from  title where id='1' " ;
                    $data = $db->select($quary);

                    if($data){
                               
                    while ( $result = $data->fetch_assoc()) {

                ?>       

                <img src="admin/<?php echo $result['image']; ?>" alt="Logo"/>
                <h2><?php echo $result['title']; ?></h2>
                <p><?php echo $result['slogan']; ?></p>
                <?php }} ?>
            </div>
        </a>
        <div class="social clear">

        <?php 
            $quary = "select * from   social_media where id='1' " ;
            $data = $db->select($quary);

            if($data){
                       
            while ( $result = $data->fetch_assoc()) {

        ?>      
            <div class="icon clear">
                <a href="<?php echo $result['fb']; ?>" target="_blank"><i class="fa fa-facebook"></i></a>
                <a href="<?php echo $result['tw']; ?>" target="_blank"><i class="fa fa-twitter"></i></a>
                <a href="<?php echo $result['ln']; ?>" target="_blank"><i class="fa fa-linkedin"></i></a>
                <a href="<?php echo $result['gp']; ?>" target="_blank"><i class="fa fa-google-plus"></i></a>
            </div>
        <?php }} ?>

            <div class="searchbtn clear">
            <form action="search.php" method="get">
                <input type="text" name="search" placeholder="Search keyword..."/>
                <input type="submit" name="submit" value="Search"/>
            </form>
            </div>
        </div>
    </div>

   
<div class="navsection templete">
 <?php 
        $path = $_SERVER['SCRIPT_FILENAME'];
        $currentpage = basename($path,'.php');

 ?>
<ul>
        <li><a 

            <?php if($currentpage =='index') { echo 'id="active"'; }?>
                href="index.php">Home</a>
         </li>


                                <?php 
                                        $quary = "select * from  pages" ;
                                        $categoris = $db->select($quary);
                                        if($categoris){
                                            while ( $result = $categoris->fetch_assoc()) {
                                ?>
                               
                                         
                                        <li>
											<a 
												<?php 
											         if (isset($_GET['pageid']) && $_GET['pageid'] == $result['id'] ) {
												     echo 'id="active"';
											}
											    ?>


												href="page.php?pageid=<?php echo $result['id']; ?>"> <?php echo $result['name']; ?>
										  </a>
										  
										  
										</li>

                                   <?php }}  ?>
                                
         <li><a
                 <?php if ($currentpage =='contact') { echo 'id="active"'; }?>
          href="contact.php">Contact</a></li> 
        
    </ul>
    
</div>