<?php include('partials/menu.php'); ?>

        <!-- Main Content Section Starts -->
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
                    <h1>5</h1>
                    <br/>
                    Catagories
                </div>

                <div class="col-4 text-center">
                    <h1>5</h1>
                    <br/>
                    Catagories
                </div>

                <div class="col-4 text-center">
                    <h1>5</h1>
                    <br/>
                    Catagories
                </div>

                <div class="col-4 text-center">
                    <h1>5</h1>
                    <br/>
                    Catagories
                </div>                
                <div class ="clearfix"></div>
           
        <!-- Main Content Section Ends -->

        <?php include('partials/footer.php')?> 
        