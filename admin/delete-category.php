
<?php
//include constants files
    include('../config/constants.php');
    
    //Check whether id and imagename value set or not
    if(isset($_GET['id']) AND isset($_GET['image_name']))
    {
        //GEt the value and Delete 
        $id = $_GET['id'];
        $image_name = $_GET['image_name'];

        //remove the image file if available
        if($image_name!= "")
        {
            //Image available , So remove it
            $path = "../images/category/". $image_name;
            //remove the image
            $remove = unlink($path); //unlink is built in function to remove file 
            
            //If failed to remove image then add and error message and stop the process
            if($remove ==FALSE)
            {
                //Set session Message 
                $_SESSION['remove'] = "<div class='error'> Failed to remove Category Image </div>";
                
                //Redirect to manage category page
                header('location:'.SITEURL.'admin/manage-category.php');

                //Stop the process
                die();
            }
        }
       
        //Delete DAta from database
        //SQL Query delete data from DATABASE
        $sql =  "DELETE FROM tbl_catagory WHERE id=$id";

        //Execute the Query 
        $res = mysqli_query($conn , $sql);

        //check whether the data is deleted from database or not
        if($res= true)
        {
            //Set Success message and redirect
            $_SESSION['delete'] = "<div class= 'success'> Category deteled Successfully</div>";
            //redirect to manage category
            header('location:' .SITEURL. 'admin/manage-category.php'); 
        }
        else{
            //Set fail mmessage and redirect
            $_SESSION['delete'] = "<div class= 'error'> failed to detele category</div>";
            //redirect to manage category
            header('location:' .SITEURL. 'admin/manage-category.php'); 
        }
        //Redirecet ot 
         


    }
    else{
        //Redirect to  MAnage category page
        header('location:' .SITEURL . 'admin/manage-category.php');
    }

?>