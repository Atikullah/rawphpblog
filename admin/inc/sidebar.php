       <div class="clear">
        </div>
        <div class="grid_2">
            <div class="box sidemenu">
                <div class="block" id="section-menu">
                    <ul class="section menu">
                       <li><a class="menuitem">Site Option</a>
                            <ul class="submenu">
                                <li><a href="titleslogan.php">Title & Slogan</a></li>
                                <li><a href="social.php">Social Media</a></li>
                                <li><a href="copyright.php">Copyright</a></li>
                                
                            </ul>
                        </li>

                         <li><a class="menuitem">User </a>

                            <ul class="submenu">
                                <?php 
                                    if (Session::get('userstatus')=='4') {?>
                                        <li><a href="adduser.php">Add User</a></li>
                                         <li><a href="userlist.php"> User List</a></li>
                                   <?php } ?> 

                                
                                
                            </ul>
                        </li>

                        <li><a class="menuitem">Pages</a>
                            <ul class="submenu">
                                <li><a href="addpage.php" style="color: #204562;font-style: italic;font-family: fantasy; ">Add New Pages</a></li>
                                <?php 
                                        $quary = "select * from  pages" ;
                                        $categoris = $db->select($quary);
                                        if($categoris){
                                            while ( $result = $categoris->fetch_assoc()) {
                                ?>
                                         
                                          <li><a href="editpage.php?pageid=<?php echo $result['id']; ?>"> <?php echo $result['name']; ?></a></li>

                                   <?php }}  ?>
                                
                            </ul>
                        </li>
						
                         
                        <li><a class="menuitem">Slider</a>
                            <ul class="submenu">
                                <li><a href="addslider.php">Add Slider</a></li>
                                <li><a href="sliderlist.php">Slider List</a></li>
                            </ul>
                        </li>
                        <li><a class="menuitem">Category Option</a>
                            <ul class="submenu">
                                <li><a href="addcat.php">Add Category</a> </li>
                                <li><a href="catlist.php">Category List</a> </li>
                            </ul>
                        </li>
                        <li><a class="menuitem">Post Option</a>
                            <ul class="submenu">
                                <li><a href="addpost.php">Add Post</a> </li>
                                <li><a href="postlist.php">Post List</a> </li>
                            </ul>
                        </li>
                    </ul>

                </div>


                 <div  class="btn btn-danger" style="margin: 50px;font-size: larger;">

                        <a href="?action=logout">Logout</a>
                       
                    </div>
            </div>
        </div>