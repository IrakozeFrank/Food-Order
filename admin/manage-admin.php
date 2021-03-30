<?php include('partials/menu.php'); ?>


    <!---Main Content Section start------->

    <div class="main-content">
        <div class="wrapper">
            <h1>Manage Admin</h1>
            <br><br>  
            
            <?php
                if(isset($_SESSION['add']))
                {
                    echo $_SESSION['add']; // dispalying session message
                    unset($_SESSION['add']);  // removing session message
                }
            ?>
            <br><br><br>
            <a href="add-admin.php" class="btn-primary">Add Admin</a>
            
           <br><br>

           
            <table class="tbl-full">
            <tr>
                <th>S.N</th>
                <th>Full Name</th>
                <th>Username</th>
                <th>Actions</th>
            </tr>


            <?php
                // Query to get all admin
                $sql = "SELECT * FROM tbl_admin";
                // Execute the Query 
                $res = mysqli_query($con, $sql);

                // Check whether the query is executed or not
                if($res == TRUE)
                {
                    // Count rows to check whether we have data in database or not
                    $count = mysqli_num_rows($res);

                    $sn = 1; // create a variable and assingn the value
                    // check thr num of rows
                    if ($count > 0)
                    {
                        // we have data in database
                        while($rows=mysqli_fetch_assoc($res))
                        {
                            //Using while loop to get all the from database
                            // And whilr loo[ woll run as long as we have data in database
                            
                            // get individual data
                            $id = $rows['id'];
                            $full_name = $rows['full_name'];
                            $username = $rows['username'];

                            // display the values in our table
                            
                            ?>

                            <tr>
                                <td><?php echo $sn++; ?></td>
                                <td><?php echo $full_name; ?></td>
                                <td><?php echo $username; ?></td>
                                <td>
                                    <a href="#" class="btn-secondary">Update Admin</a> 
                                    <a href="#" class="btn-danger">Delete Admin</a> 
                                </td>
                            </tr>

                            <?php

                            

                        }
                    }
                    else
                    {
                        // we do not have data in database
                    }
                }

            ?>
        </table>

        </div>
    </div>
    <!---Main Content Section End ------->

    <?php include('partials/footer.php'); ?>