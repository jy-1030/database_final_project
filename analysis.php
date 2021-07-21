<!DOCTYPE html>
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
            <a href="admin.html" class="navbar-brand logo">九乘九文具</a>
        </div>
            <button data-target="#menu" class="navbar-toggler" data-toggle="collapse">
                <span class="navbar-toggler-icon"></span>
            </button> 

            <div class="collapse navbar-collapse" id="menu">
                <ul class="navbar-nav ml-auto" >
                <li class="nav-items"><a href="admin.html" class="nav-link">首頁</a></li>
                <li class="nav-items"><a href="product.html" class="nav-link">產品</a></li>
                <li class="nav-items"><a href="order.html" class="nav-link">訂單</a></li>
                <li class="nav-items"><a href="analysis.php" class="nav-link">分析</a></li>
                </ul>
            </div>
        </div>
        </nav>
        <!-- navbar end here -->

        <title>顧客購買總額</title>
        <h1 class="text-center text-bold text-gray m-5">每位顧客購買總額</h1>
        <link href="style.css" rel="stylesheet" type="text/css">
        <body id="wrapper-02">
        <div id="contents">
        <?php

            include "db_connect.php";
            $sql = "SELECT customer_id, SUM(sum) as total FROM dbo.Orders
            GROUP BY dbo.Orders.customer_id;";
            $qury=sqlsrv_query($conn,$sql) or die("sql error".sqlsrv_errors());
            while($row=sqlsrv_fetch_array($qury))
		    {
                echo "客戶id：".$row['customer_id'] . '<br>';
                echo "消費金額：".$row['total'] . '<br>';
            }
        ?>
        </div>
        </body>
        </link>


        <title>商品銷售排行</title>
        <h1 class="text-center text-bold text-gray m-5">各項商品銷售總額</h1>
        <link href="style.css" rel="stylesheet" type="text/css">
        <body id="wrapper-02">
        <div id="contents">
        <?php

            include "db_connect.php";
            $sql = "SELECT product_id, SUM(sum) as total FROM dbo.Orders
            GROUP BY dbo.Orders.product_id;";
            $qury=sqlsrv_query($conn,$sql) or die("sql error".sqlsrv_errors());
            while($row=sqlsrv_fetch_array($qury))
		    {
                echo "產品id：".$row['product_id'] . '<br>';
                echo "銷售金額：".$row['total'] . '<br>';
            }
        ?>
        </div>
        </body>
        </link>
 
</body>
</html>