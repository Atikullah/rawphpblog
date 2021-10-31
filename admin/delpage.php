 <?php 
    include '../lib/Session.php'; 
    Session::checksession();
?>


<?php include '../config/config.php'; ?>
<?php include '../lib/Database.php'; ?>



 
 <?php 
    $db = new Database();
 ?>


                <?php 

                   if (!isset($_GET['deletepost']) || $_GET['deletepost'] == NULL) {
                        header("Location:index.php");
                    }else{
                      $delid = $_GET['deletepost'];
                        $delquery = " DELETE  FROM  pages WHERE id='$delid' ";
                        $deldata = $db->delete($delquery);
                        if ($deldata) {
                                echo "<span class='success'>Data deleted is successfully...!</span>";
                                 header("Location:index.php");
                        }
                          else{
                              echo "<span class='error'>Category not deleted...!</span>";
                               header("Location:index.php");
                          }

                   }

                ?>