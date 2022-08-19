<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Change Password</h1>
        <br> <br>

        <?php
            if(isset($_GET['id']))
            {
                $id=$_GET['id'];   
            }
        ?>

        <form action="" method ="POST">

            <table class= "tbl-30">
                <tr>
                    <td>Current Password</td>
                    <td>
                        <input type="password" name ="current_password" placeholder="Current Password">
                    </td>
                </tr>
                <tr>
                    <td>New Password</td>
                    <td>
                        <input type="password" name="new_password" placeholder="New Password">
                    </td>
                </tr>

                <tr>
                    <td>Confiirm Password</td>
                    <td>
                        <input type="password" name="confirm_password" placeholder="Confirm Password">
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id" value = "<?php echo $id; ?>">
                        <input type="submit" name="submit" value="Change Password" class="btn-secondary">
                    </td>
                </tr>

            </table>

        </form>
    </div>
<?php
        //Check whether the submit button is Clicked or not
        if(isset($_POST['submit']))
        {
            //echo "Clicked";

            //1. Get the data from Form
            $id = $_POST['id'];
            $current_password = md5($_POST['current_password']);
            $new_password = md5($_POST['confirm_password']);
            $confirm_password = md5($_POST['confirm_password']);

            //2. Check whether the user with current ID and Password Exists or not 
            $sql = "SELECT * FROM tbl_admin WHERE id=$id AND password ='$current_password'";

            //Execute the query
            $res = mysqli_query($conn, $sql);

            if($res==TRUE)
            {
                //Check whether data is available or not
                $count=mysqli_num_rows($res);

                if($count==1)// there will only have one id and one password
                {
                    //user exists and password can be changed 
                    echo "User Found !(password changed!)";
                    //Check whether the new password and confirm pass matches or not
                    if($new_password==$confirm_password)
                    {
                        //Update the password
                        echo "Pasword Matched! ";
                        $sql2 = "UPDATE tbl_admin SET
                        password ='$new_password'
                        WHERE id= $id
                        ";
                        //Execute the query
                        $res2 = mysqli_query($conn, $sql2);

                        //Check executed or not
                        if($res2==TRUE)
                        {
                            //display suceess message
                            echo "Success ";
                            //redirect to manage admin with error message
                            $_SESSION['change-pwd'] = "<div class='success'>Password changed sucessfully !! </div>";
                            //Redirect the user 
                            header('location:' .SITEURL . 'admin/manage-admin.php');

                        }
                        else{
                            //Display error message
                            $_SESSION['change-pwd'] = "<div class='error'>Failed to Password change !! </div>";
                            //Redirect the user 
                            header('location:' .SITEURL . 'admin/manage-admin.php');
                        }
                    }
                    else{
                        //redirect to manage admin with error message
                        $_SESSION['pwd-not-match'] = "<div class='error'>Password not mathced!! </div>";
                        //Redirect the user 
                        header('location:' .SITEURL . 'admin/manage-admin.php');
                    }
                }
                else{
                    //user doesnt exists
                    $_SESSION['user-not-found'] = "<div class='error'>User not found</div>";
                    //Redirect the user 
                    header('location:' .SITEURL . 'admin/manage-admin.php');
                }
            }

            //3. Check whether the New Password and Confirm Password Match or not
            
            //4. Change Password if all above is true




        }

?>



<?php include('partials/footer.php'); ?>