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

        <!--navi-->

<title>訂單查詢結果</title>
<link href="style.css" rel="stylesheet" type="text/css">
</head>
<body id="wrapper-02">
<div id="contents">
<?php   		
		include"db_connect.php";

		if(empty($_POST['order_id']))	
		{
			echo "!!!! 請輸入訂單代號 !!!<br />";
		}
		else
		{        
	    $order_id=$_POST['order_id'];
		$sql="SELECT * FROM dbo.Orders WHERE order_id='$order_id'";
		$qury=sqlsrv_query($conn,$sql) or die("sql error".sqlsrv_errors());
        $row=sqlsrv_fetch_array($qury);
		if(empty($row['order_id']))	
		{
			echo "!!! 無此訂單代號 !!!<br />";
		}
		else
		{	
?>
        <form name="form" action="http://127.0.0.1/final_project/update_data.php" method="POST" accept-charset="UTF-8" align ="center">
		<div class="detail_box clearfix">
        <div class="link_box">
        <h3>修改訂單資料</h3>
        <table height="2">

        <tr>
           <th>訂單編號:</th><td><input id="order_id" type="text" name="order_id" size="30" /></td>
           <th>會員id:</th><td><input id="customer_id" type="text" name="customer_id" size="30" /></td>
        </tr>
        <tr>
            <th>購買商品:</th><td ><input id="product_name" type="text" name="product_name" size="30" /></td>
            <th>購買數量:</th><td ><input id="quantity" type="text" name="quantity" size="30" /></td
        </tr>
        <tr>
            <th>下單日期:</th><td><input id="order_date" type="date" name="order_date" size="30" /></td>      
            <th>地址:</th><td><input id="require_address" type="text" name="require_address" size="30" /></td>
        </tr>
        <tr>
        <th>付款方式:</th><td><input id="payment" type="text" name="payment" size="30" /></td>
        </tr>
            
            </table>
            <input type="reset" value="清除表單"/>
            <input id="submit" name="submit" type="submit" value="送出" />
        </form>	</div></div>	
		<?php	} }?>
</div>

</body></html>
