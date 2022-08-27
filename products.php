<?php include('partials-front/menu.php'); ?>

    <!-- Product sEARCH Starts-->
    <section class="product-search text-center">
        <div class="container">
            
            <form action="<?php echo SITEURL; ?>product-search.php" method="POST">
                <input type="search" name="search" placeholder="Search for your Desired Product.." required>
                <input type="submit" name="submit" value="Search" class="btn btn-primary">
            </form>

        </div>
    </section>
    <!-- Product sEARCH  Ends -->



    <!-- Product MEnu  Starts  -->
    <section class="product-menu">
        <div class="container">
            
            <h2 class="text-center">Product Lists</h2>

            <?php
                //Display foods that are Active 
                $sql = "SELECT * FROM tbl_food WHERE active='Yes'";

                //Execute the query 
                $res= mysqli_query($conn, $sql);

                //Count Rows
                $count = mysqli_num_rows($res);

                //Check whether the food available or not 
                if($count>0)
                {   
                    //Food available
                    while($row=mysqli_fetch_assoc($res))
                    {
                        //Get values like ID
                        $id = $row['id'];
                        $title = $row['title'];
                        $description = $row['description'];
                        $price = $row['price'];
                        $image_name = $row['image_name'];
                        ?>

                            <div class="product-menu-box">
                                <div class="product-menu-img">
                                    <?php
                                        //Check image available or not
                                        if($image_name== "")
                                        {
                                            //Not available
                                            echo "<div class='error'> Image not Available ! </div>";
                                        }
                                        else{
                                            //available
                                            ?>
                                            <img src="<?php echo SITEURL; ?>images/food/<?php echo $image_name; ?>" class="img-responsive img-curve">
                                            <?php
                                        }
                                    ?>
                                    
                                </div>

                                <div class="product-menu-desc">
                                    <h4><?php echo $title; ?></h4>
                                    <p class="product-price">৳<?php echo $price; ?></p>
                                    <p class="product-detail">
                                        <?php echo $description; ?>
                                    </p>
                                    <br>

                                    <a href="<?php echo SITEURL;?>order.php?food_id=<?php echo $id;?> " class="btn btn-primary">Order Now</a>
                                </div>
                            </div>

                        <?php
                    }
                }   
                else{
                    //Product not available
                    echo "<div class= 'error'> Item Not Availabe <!DOCTYPE html></div>";
                }
            ?>


           

            

            <div class="clearfix"></div>

            

        </div>

    </section>
    <!-- Product Menu Section Ends Here -->

    <?php include('partials-front/footer.php'); ?>