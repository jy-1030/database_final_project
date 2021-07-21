<?php
header("Content-Type:text/html; charset=utf-8");
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>9*9文具</title>
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
    
        <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
            <div class="container">
                <div class="logodiv">
            <a href="index.html" class="navbar-brand logo">九乘九文具</a>
        </div>
            <button data-target="#menu" class="navbar-toggler" data-toggle="collapse">
                <span class="navbar-toggler-icon"></span>
            </button> 

            <div class="collapse navbar-collapse" id="menu">
                <ul class="navbar-nav ml-auto" >
                <li class="nav-items"><a href="#product_search" class="nav-link">產品</a></li>
                <li class="nav-items"><a href="#order_search" class="nav-link">訂單</a></li>
                <li class="nav-items"><a href="analysis.php" class="nav-link">分析</a></li>
                </ul>
            </div>
        </div>
        </nav>

        <!-- -------------------navi end------------------ -->

<title>訂單新增結果</title>
<link href="style.css" rel="stylesheet" type="text/css">
</head>

<body id="wrapper-02">
  <div id="header">
    <h1>訂單新增結果</h1>
  </div>
<div id="contents">
<h2> <a href="index.html">首頁</a> </h2>

<?php
        include "db_connect.php";

        $product_data = [
            "原子筆" => "1",
            "螢光筆" => "2",
            "立可帶" => "3",
            "鉛筆" => "4",
            "橡皮擦" => "5"
        ];


        $customer_id=$_POST['customer_id'];
        $product_name=$_POST['product_name'];
        $payment=$_POST['payment'];
        $quantity=$_POST['quantity'];
        $order_date=$_POST['order_date'];
        $require_address=$_POST['require_address'];
        $sql_price = "SELECT * FROM dbo.product WHERE product_name = '$product_name';";
        $price_result=sqlsrv_query($conn,$sql_price) or die("sql error".print_r(sqlsrv_errors()));

        while($row = sqlsrv_fetch_array($price_result))
        {
            $product_price = $row['price'];
        }

        $sum = $product_price * $quantity;

        foreach($product_data as $name => $id)
        {
            if (strcmp($product_name, $name) == 0)
            {
                $product_name = $id;
            }
        }

        // $sum=$_POST['sum'];

       $sql="INSERT INTO dbo.Orders (customer_id, product_id, payment, quantity,order_date, require_address, sum)
      VALUES('$customer_id','$product_name','$payment','$quantity','$order_date','$require_address', '$sum')";
       $query=sqlsrv_query($conn,$sql) or die("sql error".print_r(sqlsrv_errors()));
?>
</div>

</body>
</html>        