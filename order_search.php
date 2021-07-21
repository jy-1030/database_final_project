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
                <li class="nav-items"><a href="#product_search" class="nav-link">產品</a></li>
                <li class="nav-items"><a href="#order_search" class="nav-link">訂單</a></li>
                <li class="nav-items"><a href="analysis.php" class="nav-link">分析</a></li>
                </ul>
            </div>
        </div>
        </nav>

        <!--navi-->

<title>訂單查詢結果</title>
<link href="style.css" rel="stylesheet" type="text/css">
</head>
<body id="wrapper-02">
<div id="contents">
<?php   		
		include"db_connect.php";
		if($_POST['order_id']!=''){
        $order_id=$_POST['order_id'];
		$sql="SELECT order_id,customer_id,product_name,quantity,order_date,require_address,payment
        FROM dbo.Orders,dbo.product
        where dbo.Orders.product_id = dbo.Product.product_id AND
        dbo.Orders.order_id = $order_id";
		}
		else{
			$sql="SELECT order_id,customer_id,product_name,quantity,order_date,require_address,payment
            FROM dbo.Orders,dbo.product
            where dbo.Orders.product_id = dbo.Product.product_id;";
		}

		$qury=sqlsrv_query($conn,$sql) or die("sql error".sqlsrv_errors());

		while($row=sqlsrv_fetch_array($qury))
		{
			

echo 
"訂單編號:".$row['order_id'].
",會員帳號:".$row['customer_id'].
",商品名稱:".$row['product_name'].
",數量:".$row['quantity'].
",下單日期:".$row['order_date'].
",地址:".$row['require_address'].
",付款方式:".$row['payment'].

// ",總金額:".$row['sum'].
"<br/>";
}
?>
</div>

</body></html>
