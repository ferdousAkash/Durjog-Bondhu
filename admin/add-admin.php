<?php include ('partials/menu.php') ?>

<div class="main-content">
    <div class = "wrapper">
        <h1> Add Admin </h1>

        <br> <br>

        <?php
            if(isset($_SESSION['add']))
            {
                echo $_SESSION['add']; //Display session Messege
                unset($_SESSION['add']); //Remove session Messege
            }

        ?>

        <form action="" method="POST">
            <table class = "tbl-30">
                <tr>
                    <td>Full Name: </td>
                    <td><input type="text" name="full_name" placeholder="Enter Your Name"></td>
                </tr>

                <tr>
                    <td>Username: </td>
                    <td>
                        <input type="text" name ="username" placeholder="Your Username ">
                    </td>
                </tr>

                <tr>
                    <td>Password: </td>
                    <td>
                        <input type="password" name ="password" placeholder="Your password/">
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Admin" class= "btn-secondary">


                    </td>


                </tr>

            </table>
        </form>
    </div>
</div>

<?php include('partials/footer.php') ?>

<?php
    //process the value from FORM And save it in Database
    //Check whether the submit button is clicked or not

    if(isset($_POST['submit']))
    {
        //Button clicked
        //echo "Button Clicked";

        //1. Get the data from Form
        $full_name = $_POST['full_name'];
        $username = $_POST['username'];
        $password = md5($_POST['password']); //pasword encryption with MD5

        //2. SQL Querry to save the data into database
        $sql = "INSERT INTO tbl_admin SET 
            full_name='$full_name',
            username='$username',
            password='$password'
        ";
        
        //3.Excuting query and saving into data base
        $res = mysqli_query($conn, $sql) or die(mysqli_error());
        
        //4.Check whether executed or not
        if($res==TRUE)
        {
            //echo "data inserted";
            //Created Session Variable to display messege
            $_SESSION['add'] = "Admin Added Successfully" ;
            
            //Redirect Page to Manage Admin 
            header("location:". SITEURL. 'admin/manage-admin.php'); //string concatanation with (location. SITEURL. restpart)
        }
        else
        {
            //echo "data not inserted";
            //Created Session Variable to display messege
            $_SESSION['add'] = "Failed to add admin ! " ;
            
            //Redirect Page to Manage Admin 
            header("location:". SITEURL. 'admin/add-admin.php');
        }
    }
   

?>