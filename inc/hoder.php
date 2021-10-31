<div class="footersection templete clear">
      <div class="footermenu clear">

                          
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
                               
                                         
                                          <li><a 
                                           <?php 
                                                if (isset($_GET['pageid']) && $_GET['pageid'] == $result['id'] ) {
                                                echo 'id="active"';
                                                }
                                            ?>


                                          href="page.php?pageid=<?php echo $result['id']; ?>"> <?php echo $result['name']; ?></a></li>

                                   <?php }}  ?>
                                
         <li><a
                 <?php if ($currentpage =='contact') { echo 'id="active"'; }?>
          href="contact.php">Contact</a></li> 
        
    </ul>
    

      </div>



        <?php 
            $quary = "select * from   copyright where id='1' " ;
            $data = $db->select($quary);

            if($data){
                       
            while ( $result = $data->fetch_assoc()) {

        ?>      

      <p>&copy; <?php echo $result['note']; ?>.<?php  echo date('Y'); ?></p>

      <?php }} ?>
    </div>
        <?php 
            $quary = "select * from  social_media where id='1' " ;
            $data = $db->select($quary);

            if($data){
                       
            while ( $result = $data->fetch_assoc()) {

        ?>      
    <div class="fixedicon clear">
        <a href="<?php echo $result['fb']; ?>" target="_blank"><img src="images/fb.png" alt="Facebook"/></a>
        <a href="<?php echo $result['tw']; ?>" target="_blank"><img src="images/tw.png" alt="Twitter"/></a>
        <a href="<?php echo $result['ln']; ?>" target="_blank"><img src="images/in.png" alt="LinkedIn"/></a>
        <a href="<?php echo $result['gp']; ?>" target="_blank"><img src="images/gl.png" alt="GooglePlus"/></a>
    </div>  
    <?php }} ?>
    </div>

    