<?php include('partials/menu.php'); ?>

        <div class ="Main Content main-content">
            <div class= "wrapper">
                <h1>Dashboard</h1>
                    <br> <br>
                <?php
                    if(isset($_SESSION['login']))
                    {
                        echo $_SESSION['login'];
                        unset($_SESSION['login']);
                    }
                ?>
                <br> <br>
                <div class="col-4 text-center">

                    <?php
                        $sql = "SELECT * FROM tbl_catagory";
                        $res = mysqli_query($conn, $sql);

                        $count = mysqli_num_rows($res);
                        
                    ?>
                    <h1><?php echo $count; ?> </h1>
                    <br/>
                    Total Catagories
                </div>

                <div class="col-4 text-center">
                    <?php
                        $sql2 = "SELECT * FROM tbl_food";
                        $res2 = mysqli_query($conn, $sql2);

                        $count2 = mysqli_num_rows($res2);
                        
                    ?>
                    <h1><?php echo $count2; ?></h1>
                    <br/>
                    Total Products
                </div>

                <div class="col-4 text-center">
                    <?php
                        $sql3 = "SELECT * FROM tbl_order";
                        $res3 = mysqli_query($conn, $sql3);

                        $count3 = mysqli_num_rows($res3);
                        
                    ?>
                    
                    <h1><?php echo $count3; ?></h1>
                    <br/>
                    Total Orders
                </div>

                <div class="col-4 text-center">
                    <?php
                        $sql4 = "SELECT SUM(total) as TOTAL FROM tbl_order";
                        $res4 = mysqli_query($conn, $sql4);
                        //Get  value
                        $row4 = mysqli_fetch_assoc($res4) ;
                        //Get total cash
                        $total_cash = $row4['TOTAL'];
                    ?>
                    <h1><?php echo $total_cash; ?></h1>
                    <br/>
                    Total Cash
                </div>                
                <div class ="clearfix"></div>
           
     

        <?php include('partials/footer.php')?> 
        