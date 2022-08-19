<?php include('partials-front/menu.php'); ?>

    <?php
    //Check food is set or not jate kew random id use kore  access na pay   
    if(isset($_GET['food_id']))
    {
        //Get food id and detail of selected food
        $food_id = $_GET['food_id'];

        //Geting details of the selected food
        $sql = "SELECT * FROM tbl_food WHERE id=$food_id";
        //Execute the query
        $res = mysqli_query($conn, $sql);
        //Count rowws
        $count = mysqli_num_rows($res);
        //Check the data available or not
        if($count==1)
        {
            //data exists
            //Get data from database
            $row = mysqli_fetch_assoc($res);
            $title = $row['title'];
            $price = $row['price'];
            $image_name = $row['image_name'];
        }
        else{
            //data doesnt exists
            //redirect to homepage
            header('location:' .SITEURL);
        }
    }
    else
    {
        //Redirect to homepage
        header('location:' .SITEURL);
    }

    ?>
    
    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-orderbg">
        <div class="container">
            
            <h2 class="text-center text-white">Fill this form to confirm your order.</h2>

            <form action="" method="POST" class="order">
                <fieldset>
                    <legend>Selected Food</legend>

                    <div class="food-menu-img">
                        <?php
                            //Check image avaiilable or not
                            if($image_name== "")
                            {
                                //image noot available
                                echo "<div class= 'error'> Image not available </div";
                            }
                            else{
                                //Image available
                                ?>
                                <img src="<?php echo SITEURL; ?>images/food/<?php echo $image_name; ?>" alt="Chicke Hawain Pizza" class="img-responsive img-curve">


                                <?php
                            }

                        ?>
                        
                    </div>
    
                    <div class="food-menu-desc">
                        <h3><?php echo $title;?></h3>
                        <input type="hidden" name = "food" value ="<?php echo $title ; ?>">;

                        <p class="food-price">৳<?php echo $price;?></p>
                        <input type="hidden" name= "price" value = "<?php echo $price?>">;

                        <div class="order-label">Quantity</div>
                        <input type="number" name="qty" class="input-responsive" value="1" required>
                        
                    </div>

                </fieldset>
                
                <fieldset>
                    <legend>Delivery Details</legend>
                    <div class="order-label">Full Name</div>
                    <input type="text" name="full-name" placeholder="E.g. Afsara Afrose Aorna" class="input-responsive" required>

                    <div class="order-label">Phone Number</div>
                    <input type="tel" name="contact" placeholder="E.g. 015xxxxxxx" class="input-responsive" required>

                    <div class="order-label">Email</div>
                    <input type="email" name="email" placeholder="E.g. afsara@mail.com" class="input-responsive" required>

                    <div class="order-label">Address</div>
                    <textarea name="address" rows="10" placeholder="E.g. Street, City, Country" class="input-responsive" required></textarea>

                    <input type="submit" name="submit" value="Confirm Order" class="btn btn-primary">
                </fieldset>

            </form>

            <?php
                //submit button clicked or not
                if(isset($_POST['submit']))
                {
                    //Get all the details from the form 

                    $food = $_POST['food'];
                    $price = $_POST['price'];
                    $qty = $_POST['qty'];

                    $total = $price * $qty;

                    $order_date = date("Y-m-d h:i:sa"); //date function use korsi date generate korar jonno hour:minit:second am/pm
                    $status = "Ordered";// oredered , On delivery , delivered , cancel

                    $customer_name =$_POST['full-name'];
                    $customer_contact = $_POST['contact'];
                    $customer_email = $_POST['email'];
                    $customer_address = $_POST['address'];


                    //SAve the order in database
                    //Create SQL to save data
                    $sql2= "INSERT INTO tbl_order SET 
                        food = '$food',
                        price = $price,
                        qty = $qty,
                        total = $total,
                        order_date = '$order_date',
                        status = '$status', 
                        customer_name = '$customer_name',
                        customer_contact ='$customer_contact',
                        customer_address ='$customer_address'
                    ";

                    //echo $sql2 ; die ();

                    //Execute query
                    $res2 = mysqli_query($conn, $sql2);

                    //Check 
                    if($res2==true)
                    {
                        //Query executed and order saved
                       
                        $_SESSION['order'] = "<div class='order-confirm text-center bold'><br> <br>----Order placed !---- <br> Please keep patience.<br> It wont take more than 10-12 hours </div>  ";
                        //Redirecct home
                        header('location:'.SITEURL);
                    }
                    else{
                        //failed to save order
                        

                        $_SESSION['order'] = "<div class= 'error text-center'>----Failed to place the Order! Try again after a while---- </div> ";
                        //Redirecct home
                        header('location:'.SITEURL);

                    }
                }
            ?>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->

    <?php include('partials-front/footer.php'); ?>