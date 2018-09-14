<?php
require_once "view/header.php";

$company_obj = new Company();
$exchange_obj = new Exchange();
$stocks_obj = new Stocks();
?>

<h1>Dashboard!</h1>

<h4>Report 1: An overview of all companies and what stock they have on which markets</h4>
<?php
	echo '
	<div class="row" style="font-weight:bold;" >
  <div class="col-sm-2" style="background-color:lavender;">Company</div>
  <div class="col-sm-2" style="background-color:lavenderblush;">Exchange</div>
  <div class="col-sm-2" style="background-color:lavenderblush;">stock_type</div>
  <div class="col-sm-2" style="background-color:lavenderblush;">unit_count</div>
  <div class="col-sm-2" style="background-color:lavenderblush;">unit_price</div>
  <div class="col-sm-2" style="background-color:lavender;">Created-date</div>
</div>

	';
foreach($stocks_obj->getAllStocks() as $one){
	echo '
	<div class="row">
  <div class="col-sm-2" style="background-color:lavender;">'.$one['company_name'].'</div>
  <div class="col-sm-2" style="background-color:lavenderblush;">'.$one['exchange_name'].'</div>
  <div class="col-sm-2" style="background-color:lavenderblush;">'.$one['stock_type'].'</div>
  <div class="col-sm-2" style="background-color:lavenderblush;">'.$one['unit_count'].'</div>
  <div class="col-sm-2" style="background-color:lavenderblush;">'.$one['unit_price'].'</div>  
  <div class="col-sm-2" style="background-color:lavender;">'.$one['created_date'].'</div>
</div>

	';
}

?>

<h4>Report 2: An overview of all stock exchanges and what company’s stock is traded there</h4>
<?php
	echo '
	<div class="row" style="font-weight:bold;" >
  <div class="col-sm-2" style="background-color:lavender;">Stock Exchanges</div>
  <div class="col-sm-2" style="background-color:lavenderblush;">Companies Stock traded</div>
</div>

	';
foreach($exchange_obj->getAllExchangesCompany() as $one){
	echo '
	<div class="row">
  <div class="col-sm-2" style="background-color:lavender;">'.$one['exchange_name'].'</div>
  <div class="col-sm-2" style="background-color:lavenderblush;">'.$one['company_name'].'</div>
</div>

	';
}

?>


<h4>Report 3: Highest trade value of each company stock</h4>
<?php
	echo '
	<div class="row" style="font-weight:bold;" >
  <div class="col-sm-2" style="background-color:lavender;">Company</div>
  <div class="col-sm-2" style="background-color:lavenderblush;">Top Stock</div>
  <div class="col-sm-2" style="background-color:lavenderblush;">Price</div>
</div>

	';
foreach($company_obj->getAllCompanies() as $one){
	$highest_Stock_price = $stocks_obj->getTopStockCompanyWise($one['company_id']);
	echo '
	<div class="row">
  <div class="col-sm-2" style="background-color:lavender;">'.$one['company_name'].'</div>
  <div class="col-sm-2" style="background-color:lavenderblush;">'.$highest_Stock_price['stock_id'].'</div>
  <div class="col-sm-2" style="background-color:lavenderblush;">'.$highest_Stock_price['unit_price'].'</div>
</div>

	';
}

require_once "view/footer.php";
?>
