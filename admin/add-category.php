<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Catergory</h1>

        <br> <br>

        <?php
            if(isset($_SESSION['add']))
            {
                echo $_SESSION['add'];
                unset($_SESSION['add']);
            }

            if(isset($_SESSION['upload']))
            {
                echo $_SESSION['upload'];
                unset($_SESSION['upload']);
            }

        

        ?>

        <br><br>

        

        <!--Add category starts -->
        <form action="" method="POST" enctype="multipart/form-data">
            
            <table class = "tbl-30">
                <tr>
                    <td>Title: </td>
                    <td>
                        <input type="text" name="title" placeholder="Category Title">
                    </td>
                </tr>

                <tr>
                    <td>Select Image: </td>
                    <td>
                        <input type="file" name="image">
                    </td>
                </tr>


                <tr>
                    <td>Featured: </td>
                    <td>
                        <input type="radio" name= "featured" value ="Yes"> Yes
                        <input type="radio" name= "featured" value ="No"> No
                    </td>
                </tr>   
                
                <tr>
                    <td>Active: </td>
                    <td>
                        <input type="radio" name="active" value="Yes">Yes
                        <input type="radio" name="active" value="No">No
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add-Category" class="btn-secondary">
                    </td>
                </tr>
        
            </table>
        </form>
        <!--Add category ends  -->

        <?php
        //Check whether  the submit btton clicked or Not
        if(isset($_POST['submit']))
        {
            //Clicked
            echo "Clicked! ";
            //GEt the value from  catergory form
            $title= $_POST['title'];

            //For Radio input, we need to check whether the button selected or not
            if(isset($_POST['featured']))
            {
                //Get the value from Form
                $featured = $_POST['featured'];
            }
            else
            {
                //Set the default value
                $featured = "No";
            }
            if(isset($_POST['active']))
            {
                $active= $_POST['active'];

            }
            else{
                $active = "No";
            } 

            //Check whetheer image is selected or not and set the value for image accodingly
            
            // *** == print_r($_FILES['image']);

            // *** die(); //Break the code here

            if(isset($_FILES['image'] ['name'] ))
            {
                //Upload the image
                //To upload image we need iamga name. source path and destination path
                $image_name = $_FILES['image'] ['name'];

                //Upload the image only if image is selected
                if($image_name!="") // ei line ta liksi jate image chara upload korleo data add hoy
                    {
                    // jate same name er phooto duibar upload korle ager ta replace na hoye shob unique thake 
                    //oijonnno auto rename image
                    //Get the extension of our image(jpg,png.gif, etc) special.food1.jpg

                    $ext= end(explode('.' ,$image_name));

                    //Rename the Image
                    $image_name = "Food_Category" .rand(000, 999). "." .$ext;   // (.) full stop means string concatinate ar rand function use korsi random value generate korar jonno
                    
                    $source_path = $_FILES['image'] ['tmp_name'];

                    $destination_path = "../images/category/".$image_name;

                    //Finally upload the image
                    $upload = move_uploaded_file($source_path, $destination_path);

                    //check image uploaded or not
                    //And if immage not uploaded then we will stop the process and redirect with error message
                    if($upload==FALSE)
                    {
                        //set Message
                        $_SESSION['upload'] = "<div class='error'>Failed to upload image! </div>";
                        //redirect to add-category
                        header('location:'.SITEURL. 'admin/add-category.php'); 
                        //stop the process
                        die();
                    }

                }
            }
            else{
                //Dont upload Image and set the image_name value as Blank
                $image_name = "";
            }

            //2. Create SQL Queery to insert Into Database
            $sql = "INSERT INTO tbl_catagory SET
                title = '$title',
                image_name = '$image_name',
                featured = '$featured',
                active = '$active'
            
            ";

            //3. Execute Query and save in database
            $res = mysqli_query($conn, $sql);

            //4. Check the query executed or not and data added or not
            if($res==TRUE)
            {
                //Query Executed and category Added
                $_SESSION['add']= "<div class='success'> Category added Successfully </div>";
                //redirect to manage category page
                header('location:' .SITEURL. 'admin/manage-category.php');
                
            }
            else{
                //Failed to add Category
                $_SESSION['add']= "<div class='error'>Failed to add Category </div>";
                //redirect to manage category page
                header('location:' .SITEURL. 'admin/manage-category.php');
            }



        }



        ?>

    </div>
</div>





<?php include('partials/footer.php'); ?>