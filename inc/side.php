        <div class="sidebar clear">
            <div class="samesidebar clear">
                <h2>Categories</h2>

                    <ul>
                    <?php 
                    $quary = "select * from categoris" ;
                    $categoris = $db->select($quary);

                        if($categoris){
                           while ( $result = $categoris->fetch_assoc()) {
                 ?>

                        <li><a href="postcategoris.php?categoris=<?php echo $result['id']; ?>"><?php echo $result['name']; ?></a></li>

                        <?php }} else{ ?>

                         <li> No Category </li>

                        <?php } ?>                  
                    </ul>
            </div>
            






            <div class="samesidebar clear">
                <h2>Latest articles</h2>

                <?php 
                    $quary = "select * from  tbl_post limit 3 " ;
                    $post = $db->select($quary);

                        if($post){
                           while ( $result = $post->fetch_assoc()) {

                 ?>

                    <div class="popular clear">
                       <h3><a href="post.php?id=<?php echo $result['id']; ?>"><?php echo $result['title']; ?></a></h3>
                        <a href="post.php?id=<?php echo $result['id']; ?>"><img src="admin/<?php echo $result['images']; ?>" alt="post image"/></a>
                        <p><?php echo $formate->ReadMore($result['body'],50); ?></p> 
                    </div>



                    <?php } ?>

                    <?php  }else{ header("Location:404.php");} ?>
                   
    
            </div>
            
        </div>

