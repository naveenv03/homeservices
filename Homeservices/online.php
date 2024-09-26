<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
    <title>Service Finder</title>
 
</head>
<body>
    

    
    <style>
      .navbar {
        background-color: #333;
        overflow: hidden;
        font-size: 16px;
      }
      body {
        background-color: paleturquoise;
      }
      .navbar a {
        float: left;
        display: block;
        color: #f2f2f2;
        text-align: center;
        padding: 14px 16px;
        text-decoration: none;
      }
      .message {
        margin-top: 20px;
        padding: 10px;
        border-radius: 4px;
        background-color: #f4f4f4;
        width: 50%;
      }
      .navbar a:hover {
        background-color: #ddd;
        color: black;
      }
      /* Style the active link */
      .active {
        background-color: #4caf50;
        color: white;
      }
    </style>
  </head>
  <body>
    <div class="navbar">
      <a class="#" href="index4.html"><u>EasyServe</u></a>
      <a href="contact_us.html">Contact</a>
      <a href="about.html">About</a>
      <a href="online.php">Find</a>
      <a href="index4.html">Register</a>
    </div>

    <!-- Page content -->
    <div style="padding:20px">
      <h1 align="center">SERVICE FINDER</h1>
      <p align="center">Service at your doorstep!!</p>
    </div>

    <div class="container">
      <div class="row col-md-6 col-md-offset-3">
        <div class="panel panel-primary">
          <div class="panel-heading text-center">
            <h1>Search at ease</h1>
          </div>
          <div class="panel-body">
            
                        <form action="" method="GET">
                            <div class="form-group">
                                <div class="col-md-8">
                                    <input type="text" name="service" value="<?php if(isset($_GET['service'])){echo $_GET['service'];} ?>" class="form-control" placeholder="Enter the Service Required">
                                    <br>
                                    <input type="text" name="city" value="<?php if(isset($_GET['city'])){echo $_GET['city'];} ?>" class="form-control" placeholder="Enter the Location">
                                </div>
                                <div class="col-md-4">
                                    <button type="submit" class="btn btn-primary" >Search</button>
                                </div>
                            </div>
                        </form>
    </div>

                        <div class="row">
                            <div class="col-md-12">
                                <hr>
                                <?php 
                                    $con = mysqli_connect("localhost","root","12345","test");

                                    if(isset($_GET['service']) && isset($_GET['city']))
                                    {
                                        $service = $_GET['service'];
                                        $city = $_GET['city'];

                                        $query = "SELECT * FROM registration WHERE profession='$service' and city='$city'";
                                        $query_run = mysqli_query($con, $query);

                                        if(mysqli_num_rows($query_run) > 0)
                                        {
                                            foreach($query_run as $row)
                                            {
                                                ?>
                                                <div class="form-group mb-3">
                                                    <label for="">Name</label>
                                                    <input type="text" value="<?= $row['firstName']; ?>" class="form-control">
                                                    <label for="">Phone Number:</label>
                                                    <input type="text" value="<?= $row['number']; ?>" class="form-control">
                                                </div>
                                                <?php
                                            }
                                        }
                                        else
                                        {
                                            echo "No Service Provider found at this location ";
                                        }
                                    }
                                   
                                ?>

                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>