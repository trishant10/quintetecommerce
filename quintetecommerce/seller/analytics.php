<?php include '../seller/seller.php';
 $post_at = "";
  $post_at_to_date = "";
  
?>

<?php

  $get_cart="SELECT * FROM products INNER JOIN transaction_detail ON products.PID=transaction_detail.Order_ID";
      $cart_items = mysqli_query($con, $get_cart);
      $total_price =0;  
      $totalbk_qty=0;
      $bk_qty=0;
      $single_price=0;
  
      while($bk = mysqli_fetch_array($cart_items))
      {
       if($bk['Vendor_ID']==$vendor)
       {
        $single_price = $bk['Price'];
        $bk_qty=$bk['Book_Quantity'];
      }
      $totalbk_qty += $bk_qty;
      $total_price += $single_price*$bk_qty;
    }
?>


	<div class="main">

		<!-- order book -->
    <div class="row">
      <div class="container">
<div class="main" style="background: none;">
        <form action="" method="POST">
          
          <div class="category">
            <h2>Transaction History</h2>
          <button class="subCategory btn" name="week" value="week">Week</button>
          <button class="subCategory btn" name="month" value="month"> Month </button>
          <button class="subCategory btn" name="year" value="year"> Year </button>
        </div>


   <div class="form-style" style="padding: 1px 40px;">
    <ul>
      <li style="width:100%;">
   <p class="search_input">
    <input type="text" placeholder="From Date"  name="search[Purchased_Date]"  value="<?php echo $post_at; ?>" class="field-split align-left" />
      <input type="text" placeholder="To Date"  name="search[post_at_to_date]" value="<?php echo $post_at_to_date; ?>"  class="field-split align-left" />

    <input type="submit" name="submit" value="Search" class="" />
  </p>
  </li>
  </ul>
</div>
</div>
</form>
</div>
<div class="container">
<div class="side">
  <div class="form-style">
  <h2> ANALYTICS OVERVIEW </h2>
  <span>Total Books Sold : <?php echo $totalbk_qty; ?></span><br><br>
  <span> Total Earning : Rs. <?php echo $total_price; ?></span>
</div>
  </div>
</div>
</div> <!-- row -->

<div class="form-style" style="padding: 0px; margin: 10px 5px;">
        <table class="table" >
          <tr>
            <th>#</th>
            <th colspan="2">Product </th>
            <th>Quantity</th>
            <th>Order Date</th>
            <th>Price</th>
            <th>Customer</th>
          </tr>
          <tbody>




<?php
    
    if(isset($_POST['week']))
    {
      $get_cart="SELECT * FROM products INNER JOIN transaction_detail ON products.PID=transaction_detail.Order_ID WHERE YEARWEEK(Purchased_Date) = YEARWEEK(NOW()) ORDER BY Purchased_Date DESC";

      $count = 1;

      $cart_items = mysqli_query($con, $get_cart);
      $total_price =0;    
      while($bk = mysqli_fetch_array($cart_items))
      {
       if($bk['Vendor_ID']==$vendor)
       {
        $price_arr = array($bk['Price']);
        $single_price = $bk['Price'];
        $total_price += $single_price;  
        $bk_title = $bk['Title'];
        $productid = $bk['PID'];
        $bk_order_date=$bk['Purchased_Date'];
        $bk_qty=$bk['Book_Quantity'];
        $customer=$bk['Customer_ID'];
        echo "<tr>
        <td scope='row'><h3>".$count++."</h3></td>

        <td><img src='../img/books/".$bk['PID'].".jpg' width='60px' height='80px'></td>    
        <td><p>".$bk_title."</p></td>
        <td><p>".$bk_qty."</p></td>
        <td><p>".$bk_order_date."</p></td>
        <td><p>Rs.".$single_price."</p></td>
        <td><p style='text-transform:uppercase;'>".$customer."</p></td>

        </tr>";

      }
    }
  }
?>

<?php
    
    if(isset($_POST['month']))
    {
      $get_cart="SELECT * FROM products INNER JOIN transaction_detail ON products.PID=transaction_detail.Order_ID WHERE MONTH(Purchased_Date) = MONTH(NOW()) ORDER BY Purchased_Date DESC";

      $count = 1;

      $cart_items = mysqli_query($con, $get_cart);
      $total_price =0;    
      while($bk = mysqli_fetch_array($cart_items))
      {
       if($bk['Vendor_ID']==$vendor)
       {
        $price_arr = array($bk['Price']);
        $single_price = $bk['Price'];
        $total_price += $single_price;  
        $bk_title = $bk['Title'];
        $productid = $bk['PID'];
        $bk_order_date=$bk['Purchased_Date'];
        $bk_qty=$bk['Book_Quantity'];
        $customer=$bk['Customer_ID'];
        echo "<tr>
        <td scope='row'><h3>".$count++."</h3></td>

        <td><img src='../img/books/".$bk['PID'].".jpg' width='60px' height='80px'></td>    
        <td><p>".$bk_title."</p></td>
        <td><p>".$bk_qty."</p></td>
        <td><p>".$bk_order_date."</p></td>
        <td><p>Rs.".$single_price."</p></td>
        <td><p>".$customer."</p></td>

        </tr>";

      }
    }
  }
?>

<?php
    
    if(isset($_POST['year']))
    {
      $get_cart="SELECT * FROM products INNER JOIN transaction_detail ON products.PID=transaction_detail.Order_ID WHERE YEAR(Purchased_Date) = YEAR(NOW()) ORDER BY Purchased_Date DESC";

      $count = 1;

      $cart_items = mysqli_query($con, $get_cart);
      $total_price =0;    
      while($bk = mysqli_fetch_array($cart_items))
      {
       if($bk['Vendor_ID']==$vendor)
       {
        $price_arr = array($bk['Price']);
        $single_price = $bk['Price'];
        $total_price += $single_price;  
        $bk_title = $bk['Title'];
        $productid = $bk['PID'];
        $bk_order_date=$bk['Purchased_Date'];
        $bk_qty=$bk['Book_Quantity'];
        $customer=$bk['Customer_ID'];
        echo "<tr>
        <td scope='row'><h3>".$count++."</h3></td>

        <td><img src='../img/books/".$bk['PID'].".jpg' width='60px' height='80px'></td>    
        <td><p>".$bk_title."</p></td>
        <td><p>".$bk_qty."</p></td>
        <td><p>".$bk_order_date."</p></td>
        <td><p>Rs.".$single_price."</p></td>
        <td><p>".$customer."</p></td>

        </tr>";

      }
    }
  }
?>


<?php

  if(isset($_POST['submit']))
  {
     $post_at = "";
  $post_at_to_date = "";
 
  
  $queryCondition = "";
  if(!empty($_POST["search"]["Purchased_Date"])) {     
    $post_at = $_POST["search"]["Purchased_Date"];
    list($fiy,$fim,$fid) = explode("-",$post_at);
    
    $post_at_todate = date('Y-m-d');
    if(!empty($_POST["search"]["post_at_to_date"])) {
      $post_at_to_date = $_POST["search"]["post_at_to_date"];
      list($tiy,$tim,$tid) = explode("-",$_POST["search"]["post_at_to_date"]);
      $post_at_todate = "$tiy-$tim-$tid";
    }
    
    $queryCondition .= "WHERE Purchased_Date BETWEEN '$fiy-$fim-$fid' AND '" . $post_at_todate . "'";
  }


  $sql = "SELECT * from products INNER JOIN transaction_detail ON products.PID=transaction_detail.Order_ID " . $queryCondition . " ORDER BY Purchased_Date DESC";
      $count = 1;
      $cart_items = mysqli_query($con, $sql);
      $total_price =0;    
      while($bk = mysqli_fetch_array($cart_items))
      {
       if($bk['Vendor_ID']==$vendor)
       {
        $price_arr = array($bk['Price']);
        $single_price = $bk['Price'];
        $total_price += $single_price;  
        $bk_title = $bk['Title'];
        $productid = $bk['PID'];
        $bk_order_date=$bk['Purchased_Date'];
        $bk_qty=$bk['Book_Quantity'];
        $customer=$bk['Customer_ID'];
        echo "<tr>
        <td scope='row'><h3>".$count++."</h3></td>

        <td><img src='../img/books/".$bk['PID'].".jpg' width='60px' height='80px'></td>    
        <td><p>".$bk_title."</p></td>
        <td><p>".$bk_qty."</p></td>
        <td><p>".$bk_order_date."</p></td>
        <td><p>Rs.".$single_price."</p></td>
        <td><p>".$customer."</p></td>
        </tr>";
      }
    }
}
?>


      
        </tbody>

      </table>
      
    </div>
  </div>

	</div>  <!-- main div -->

</div> <!-- row div -->


</body>
</html>