<?php include('partials-front/menu.php'); ?>

    


    <!-- Product sEARCH Section Starts Here -->
    <section class="product-search text-center">
        <div class="container">
            
            <form action="<?php echo SITEURL; ?>product-search.php" method="POST">
                <input type="search" name="search" placeholder="Search for your desired product.." required>
                <input type="submit" name="submit" value="Search" class="btn btn-primary">
            </form>

        </div>
    </section>
    <!--Product sEARCH Section Ends Here -->

    <?php
        if(isset($_SESSION['order']))
        {
            echo $_SESSION['order'];
            unset($_SESSION['order']);
        }
    ?>

    <!-- CAtegories Section Starts Here -->
    <section class="categories">
        <div class="container">
            <h2 class="text-center">Explore Products</h2>

            <?php 
                //Create SQL< Query to display categories from database
                $sql= "SELECT * FROM tbl_catagory";
                //Execute query
                $query = mysqli_query($conn, $sql);
                //Count rows to check wwhether the category is available or not
                $count = mysqli_num_rows($query);
                
                if($count > 0 )
                {
                    //categories available
                    while($row= mysqli_fetch_assoc($query))
                    {
                        //Get the values like title, image_name and ID
                        $id =$row['id'];
                        $title= $row['title'];
                        $image_name = $row['image_name'];
                        ?>
                            <a href="<?php echo ORDERURL; ?>  "> 
                                <div class="box-3 float-container">
                                    <?php
                                        //Check whether image available or not
                                        if($image_name=="")
                                        {
                                            echo "<div class='error'>Image not available</div> ";
                                        }
                                        else{
                                            //available
                                            ?>

                                            <img src="<?php echo SITEURL; ?>images/category/<?php echo $image_name; ?>"  class="img-responsive img-curve">
                                            <?php
                                        }
                                    ?>
                                    

                                    <h3 class="float-text text-white"><?php echo $title; ?></h3>
                                </div>
                            </a>



                        <?php
                    }
                }
                else{
                    //categories not available
                    echo "<div class='error'>Category not added! </div>";
                }

            ?>

            
        
          

            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Categories Section Ends Here -->



    <!-- Product MEnu Section Starts Here -->
    <section class="product-menu">
        <div class="container">
            <h2 class="text-center">Product List</h2>

            <?php
                //Getting products from database that are active and fetured
                $sql2 = "SELECT * FROM tbl_food WHERE active='Yes' AND featured='Yes' LIMIT 8";
                //Execute the qery
                $res2= mysqli_query($conn, $sql2);

                //Count rows
                $count2 =mysqli_num_rows($res2);

                //Check whether products available or not 
                if($count2>0)
                {
                    //available
                    while($row = mysqli_fetch_assoc($res2))
                    {
                        //Get all the values 
                        $id = $row['id'];
                        $title = $row['title'];
                        $price = $row['price'];
                        $description = $row['description'];
                        $image_name = $row['image_name'];
                        ?>

                            <div class="product-menu-box">
                            <div class="product-menu-img">
                                <?php
                                    //check image available or not
                                    if($image_name== "")
                                    {
                                        //not available
                                        echo "<div class='error'>Image not available</div>";
                                    }
                                    else{
                                        //available
                                        ?>
                                        <img src="<?php echo SITEURL; ?>images/food/<?php echo $image_name; ?>"  class="img-responsive img-curve">
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

                                <a href="<?php echo SITEURL; ?>order.php?food_id=<?php echo $id; ?>" class="btn btn-primary">Order Now</a> <!--Alada kore ? er por id likhi karon alada order er jonno alada id thaka uchit--->
                            </div>
                        </div>

                        <?php
                    }

                }
                else{
                    //not available
                    echo "<div class='error'>Productnot available ! </div>";
                }


            ?>

                



            <div class="clearfix"></div>

            

        </div>

        <p class="text-center">
            <a href="<?php SITEURL;?>products.php">See All products</a>
        </p>
    </section>
    <!-- Product Menu Section Ends Here -->

    <?php include('partials-front/footer.php'); ?>