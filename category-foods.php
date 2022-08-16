<?php include('partials-front/menu.php'); ?>

<?php 
        //CHeck whether id is passed or not
        if(isset($_GET['category_id']))
        {
            //Category id is set and get the id
            $category_id = $_GET['category_id'];
            // Get the CAtegory Title Based on Category ID
            $sql = "SELECT title FROM tbl_catagory WHERE id=$category_id";

            //Execute the Query
            $res = mysqli_query($conn, $sql);

            //Get the value from Database
            $row = mysqli_fetch_assoc($res);
            //Get the TItle
            $category_title = $row['title'];
        }
        else
        {
            //CAtegory not passed
            //Redirect to Home page
            
        }
        
    ?>


    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">
            
            <h2>Foods on <a href="#" class="text-white">"Category"</a></h2>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->



    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>

            <?php
                //Create SQL n
                $sql2 = "SELECT * FROM tbl_food WHERE catagory_id = $category_id";

                //Execute query
                $res2 = mysqli_query($conn, $sql2);

                //count rows
                $count2 = mysqli_num_rows($res2);

                //Check food available or nott
                if($count2>0)
                {
                    //food available
                    while($row2 = mysqli_fetch_assoc($res2))
                    {
                        $id = $row2['id'];
                        $title = $row2['title'];
                        $price = $row2['price'];
                        $description = $row2['description'];
                        $image_name = $row['image_name'];
                        ?>
                            <div class="food-menu-box">
                                <div class="food-menu-img">
                                    <?php
                                    if($image_name=="")
                                    {
                                        //not available
                                        echo "<div class='error'>Image not available </div>";
                                    }
                                    else{
                                        //avilable
                                        ?>
                                        <img src="<?php echo SITEURL; ?>images/food<?php echo $image_name;?>" alt="Chicke Hawain Pizza" class="img-responsive img-curve">

                                        <?php
                                    }

                                    ?>  
                                    
                                </div>

                                <div class="food-menu-desc">
                                    <h4><?php echo $title ?></h4>
                                    <p class="food-price">৳<?php echo $price ?></p>
                                    <p class="food-detail">
                                    <?php echo $description ?>
                                    </p>
                                    <br>

                                    <a href="<?php echo SITEURL;?>order.php?food_id=<?php echo $id;?> " class="btn btn-primary">Order Now</a>
                                </div>
                            </div>
                        <?php
                    }
                }
                else{
                    //food not available
                    echo "<div class= 'error'>Food not Available.</div>";
                }
            ?>
            

           


            <div class="clearfix"></div>

            

        </div>

    </section>
    <!-- fOOD Menu Section Ends Here -->

    <?php include('partials-front/footer.php'); ?>