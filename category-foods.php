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
            $catagory_title = $row['title'];
        }
        else
        {
            
            //Redirection to Home page
            header('location:'.SITEURL);
            
        }
        
    ?>


    <!-- Product sEARCH Section Starts Here -->
    <section class="product-search text-center">
        <div class="container">
            
            <h2>Products on <a href="#" class="text-black">"Category"</a></h2>

        </div>
    </section>
    <!-- Product sEARCH Section Ends Here -->



    <!-- Product MEnu Section Starts Here -->
    <section class="product-menu">
        <div class="container">
            <h2 class="text-center">Product Menu</h2>

            <?php
                //Create SQL n
                $sql2 = "SELECT * FROM tbl_food WHERE catagory_id = $catagory_id";

                //Execute query
                $res2 = mysqli_query($conn, $sql2);

                //count rows
                $count2 = mysqli_num_rows($res2);

                //Check Product available or nott
                if($count2>0)
                {
                    //Product available
                    while($row2 = mysqli_fetch_assoc($res2))
                    {
                        $id = $row2['id'];
                        $title = $row2['title'];
                        $price = $row2['price'];
                        $description = $row2['description'];
                        $image_name = $row['image_name'];
                        ?>
                            <div class="product-menu-box">
                                <div class="fooproductd-menu-img">
                                    <?php
                                    if($image_name=="")
                                    {
                                        //not available
                                        echo "<div class='error'>Image not available </div>";
                                    }
                                    else{
                                        //avilable
                                        ?>
                                        <img src="<?php echo SITEURL; ?>images/food<?php echo $image_name;?>"  class="img-responsive img-curve">

                                        <?php
                                    }

                                    ?>  
                                    
                                </div>

                                <div class="product-menu-desc">
                                    <h4><?php echo $title ?></h4>
                                    <p class="product-price">৳<?php echo $price ?></p>
                                    <p class="product-detail">
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
                    //Product not available
                    echo "<div class= 'error'>Food not Available.</div>";
                }
            ?>
            

           


            <div class="clearfix"></div>

            

        </div>

    </section>
    <!-- Product Menu Section Ends Here -->

    <?php include('partials-front/footer.php'); ?>