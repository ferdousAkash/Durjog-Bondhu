<?php include ('partials/menu.php'); ?>

    <div class= "main-content">
        <div class= "wrapper"> 
            <h1> Update Admin </h1>
            <br> <br>
            <?php
                //display details of current admin

                //1. Get the id of selected Admin
                $id= $_GET['id'];

                //2. Create SQL Query to get The Details
                $sql="SELECT * FROM tbl_admin WHERE id=$id";

                //Execute the query
                $res= mysqli_query($conn, $sql);

                //Check whethter the query is executed or not
                if($res==TRUE)
                {
                    //check whether the data is available or not
                    $count= mysqli_num_rows($res);
                    //check whether we have Admin Data or Not
                    if($count==1)
                    {
                        //Get the Details
                        //echo "admin available";
                        $row=mysqli_fetch_assoc($res);

                        $full_name = $row['full_name'];
                        $username = $row['username'];
                    }
                    else{
                        //Redirect to manage admin page
                        header('location' .SITEURL. 'admin/manage-admin.php');
                    }
                }
            
            ?>


            <form action="" method= "POST">

                <table class ="tbl-30">
                    <tr>
                        <td> Full Name: </td>
                        <td>
                            <input type="text" name = "full_name" value="<?php echo $full_name; ?>">
                        </td>
                    </tr>

                    <tr>
                        <td> Username: </td>
                        <td>
                            <input type="text" name = "username" value="<?php echo $username; ?>">
                        </td>
                    </tr>

                    <tr>
                        <td colspan="2">
                            <!---id hide korar jonno barbar ashbe ota-->
                            <input type="hidden" name ="id" value= "<?php echo $id ?> ">   
                            <input type="Submit" name ="submit" value = "Update admin"class = "btn-secondary">
                        </td>
                    </tr>

                </table>

            </form>
        </div>
    </div>

    <?php
        //Check whether the submit button is Clicked or Not
        if(isset($_POST['submit']))
        {
            //echo "Button Clicked";
            //Get all the values from form to update
            $id =$_POST['id'];
            $full_name =$_POST['full_name'];
            $username =$_POST['username'];
            
            //Create a SQL Query to update admin
            $sql = "UPDATE tbl_admin SET 
            full_name ='$full_name',
            username = '$username'
            WHERE id='$id'
            ";

            //Execute the query
            $res = mysqli_query($conn, $sql);

            //Check whether thae query executed succesfully or not
            if($res==TRUE)
            {
                //Query to execute and Admin Updated
                $_SESSION['update'] = "<div class= 'success' >Admin updated successfully</div>";
                //redirect to Manage Admin page
                header('location'. SITEURL. 'admin/manage-admin.php');
            }
            else{
                //Failed to Update Admin
                $_SESSION['update'] = "<div class= 'error' >Failed to delete admin!! </div>";
                //redirect to Manage Admin page
                header('location'. SITEURL. 'admin/manage-admin.php');
            }

        }


                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                  
    ?>
<?php   include ('partials/footer.php'); ?>

