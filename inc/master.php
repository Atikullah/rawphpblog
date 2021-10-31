

 <style type="text/css">
.pagination{
  display: block;
  font-size: 20px;
  margin-top: 10px;
  text-align: center;
  padding: 10px;
}
.pagination a{
 background: #e6af4b none repeat scroll 0 0;
 border: 1px solid #a7700c;
 border-radius: 3px;
 color:#a7700c;
 margin-left: 2px;
 padding: 2px 10px;
 text-decoration: none;
}
.pagination a:hover{
  background: #be8723 none repeat scroll 0 0;
  color: #fff;
}

  </style>
     



<?php 
    include 'config/config.php';
    include 'lib/Database.php';
    include 'helpers/formate.php';
 ?>
 <?php 
    $db = new Database();
    $formate = new DateFormate();

 ?>
<div class="contentsection contemplete clear">
        <div class="maincontent clear">
        <!--  pagination -->
        <?php
            $perpage =2   ;
            if (isset($_GET["page"])) {
               $page = $_GET["page"];
            }else{
                $page = 1;
            }

            $start_form = ($page-1)*$perpage;

        ?>

        <!--  pagination -->

        <?php 

        $quary = "select * from  tbl_post limit $start_form, $perpage" ;
        $post = $db->select($quary);

        if($post){
            while ( $result = $post->fetch_assoc()) {
        ?>


        <div class="samepost clear">
            <h2><a href="post.php?id=<?php echo $result['id']; ?>"><?php echo $result['title']; ?></a></h2>
                <h4><?php echo $formate->date_formate($result['date']); ?>, By -> <a href="post.php?id=<?php echo $result['id']; ?>"><?php echo $result['author']; ?></a></h4>
                 <a href="#"><img src="images/<?php echo $result['images']; ?>" alt="post image"/></a>
               <?php echo $formate->ReadMore($result['body']); ?>
                <div class="readmore clear">
                    <a href="post.php?id=<?php echo  $result['id']; ?>">Read More</a>
                </div>
         </div>
            
            <?php } ?>

           <!--  pagination -->

           <?php 
                $quary = "select * from  tbl_post" ;
                $result = $db->select($quary);
                $total_rows = mysqli_num_rows($result);
                $total_page =  ceil($total_rows/$perpage);

              echo "<span class='pagination'> <a href='index.php?page=1'>".'First'."</a>";

                for ($i=1; $i <=$total_page ; $i++) { 
                    echo "<a href='index.php?page=".$i."'>".$i."</a>";
                };

              echo "<a href='index.php?page=total_page'>".'Last'."</a></span"; 
             

            ?> 

           <!--  pagination -->


            <?php }else{ header("Location:404.php");} ?>

        </div>
