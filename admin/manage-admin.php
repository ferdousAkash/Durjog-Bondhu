<?php include('partials/menu.php'); ?>
                        

        <!-- Main Content Section Starts -->
        <div class ="Main Content main-content">
            <div class= "wrapper">
                <h1>Manage Admin</h1>
                <br/> <br/> <br/> 
                <?php
                    if(isset($_SESSION['add'])) //Used isset to see the message is set or not on add admin 
                    {
                        echo $_SESSION['add']; //Displaying Session Message
                        unset($_SESSION['add']); //removing Seession message Only if we refresh
                    }

                    if(isset($_SESSION['delete']))
                    {
                        echo $_SESSION['delete'];
                        unset($_SESSION['delete']);
                    }
                    if(isset($_SESSION['update']))
                    {
                        echo $_SESSION['update'];
                        unset($_SESSION['update']);
                    }
                    if(isset($_SESSION['user-not-found']))
                    {
                        echo $_SESSION['user-not-found'];
                        unset($_SESSION['user-not-found']);
                    }
                    if(isset($_SERVER['pwt-not-match']))
                    {
                        echo $_SESSION['pwt-not-match'];
                        unset($_SESSION['pwt-not-match']);
                    }
                    if(isset($_SESSION['change-pwd']))
                    {
                        echo $_SESSION['change-pwd'];
                        unset($_SESSION['change-pwd']);
                    }

                ?>  

                <br> <br> <br>
                <!-- Button to add Admin -->
                <a href="add-admin.php" class="btn-primary">Add Admin</a>
               
                <br/> <br/> <br/> <br/> 
                <table class="tbl-full">
                    <tr>
                        <th>S.N.</th>
                        <th>Full Name</th>
                        <th>Username</th>
                        <th>Actions</th>
                    </tr>

                    <?php 
                        //Query  to get our admin
                        $sql = "SELECT * FROM tbl_admin";
                        //Execute query
                        $res =mysqli_query($conn, $sql);

                        //Check whethet the query executed 
                        if($res==TRUE)
                        {
                            // COunt Rows to check whether we have data in database or not
                            $count =mysqli_num_rows($res); //Function to get all rows in database

                            $sn=1 ;//Create Varriable and assign value to Index of ID, barabar delete korle ager index thake jaito ota 
                            //check the number of rows
                            if($count>0)
                            {
                                //we have data in database
                                while($rows=mysqli_fetch_assoc($res)) // mysqli_fetch_assoc($res) will get all the rows from database and store in $ res
                                {
                                    //using while loop to get all data from our database will run until we have data in DB


                                    //Get individual data
                                    $id=$rows['id'];
                                    $full_name=$rows['full_name'];
                                    $username=$rows['username'];
                                    
                                    //display value in table
                                    ?>  
                                    <tr>
                                        <td><?php echo$sn++?>.</td>
                                        <td><?php echo $full_name ?></td>
                                        <td><?php echo $username ?></td>
                                        <td>
                                            <a href="<?php echo SITEURL; ?>admin/update-password.php?id=<?php echo $id; ?>" class="btn-primary">Change Password</a>
                                            <a href="<?php echo SITEURL; ?>admin/update-admin.php?id=<?php echo $id; ?>" class="btn-secondary">Update Admin</a>
                                            <a href="<?php echo SITEURL; ?>admin/delete-admin.php?id=<?php echo $id; ?> " class="btn-danger">Delete Admin</a>
                                        </td>
                                    </tr>

                                <?php

                                    
                                }
                            }
                            {
                                //we dont have data in database
                            }
                        }

                    ?>


                   
                    
                </table>
            </div>
        </div>
        <!-- Main Content Section Ends -->
<?php include('partials/footer.php'); ?>
