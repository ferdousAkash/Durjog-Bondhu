<?php include('partials-front/menu.php'); ?>



    <!-- CAtegories Starts Here -->

    <section class="categories">
        <div class="container">
            <h2 class="text-center">Explore Products</h2>

            <?php 
                //Display all the categories that are active
                //Sql Query 
                $sql = "SELECT * FROM tbl_catagory WHERE active='Yes'";

                //Execut query
                $res = mysqli_query($conn, $sql);

                //count rows
                $count = mysqli_num_rows($res);

                //Check  categories available or not
                if($count>0)
                {
                    //Categories Available  
                    while($row=mysqli_fetch_assoc($res)) //Get all the data from databas in our row
                    {
                        //Get value
                        $id = $row['id'];
                        $title = $row['title'];
                        $image_name = $row['image_name'];
                        ?>
                            <a href="<?php echo ORDERURL; ?>">
                                <div class="box-3 float-container">
                                    <?php 
                                        if($image_name== "")
                                        {
                                            //Image not available
                                            echo "<div class= 'error'>Image not found ! </div>";
                                        }
                                        else{
                                            //image available
                                            ?>
                                            <img src="<?php echo SITEURL; ?>images/category/<?php echo $image_name; ?>"  class="img-responsive img-curve">
                                            <?php
                                        }
                                    ?>
                                   

                                    <h3 class="float-text text-white"><?php echo $title;?></h3>
                                </div>
                            </a>

                        <?php
                    }
                }
                else{
                    //Not available
                    echo "<div class= 'error'>Category not found ! </div>";
                }

            ?>
            
                      <div class="clearfix"></div>
        </div>
    </section>
    <!-- Categories  Ends  -->


    <?php include('partials-front/footer.php'); ?>