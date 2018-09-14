<?php
require_once "view/header.php";

$company_obj = new Company();
$exchange_obj = new Exchange();
$stocks_obj = new Stocks();
?>

<h1>Stocks</h1>

<form id='addStocksForm'  action="?v=grid" target="_blank" method="post" >
	<div class="row">
		<label  class="col-sm-2" >Company name<span style="color:red;">*</span></label>
		<div class="form-group col-sm-5">
		
			<select class="form-control" name="company_id" required>
				<?php
				foreach($company_obj->getAllCompanies() as $one){
					echo "<option value='".$one['company_id']."'>".$one['company_name']."</option>";
				}
				?>	
			</select>
			
		</div>
	</div>
	<div class="row">
		<label  class="col-sm-2" >Exchange<span style="color:red;">*</span></label>
		<div class="form-group col-sm-5">
		
			<select class="form-control" name="exchange_id" required>
				<?php
				foreach($exchange_obj->getAllExchanges() as $one){
					echo "<option value='".$one['exchange_id']."'>".$one['exchange_name']."</option>";
				}
				?>	
			</select>
			
		</div>
	</div>

	<div class="row">
		<label  class="col-sm-2" >Type<span style="color:red;">*</span></label>
		<div class="form-group col-sm-5">
		
			<select class="form-control" name="stock_type" required>
				<option value='common'>Common</option>
				<option value='preferred'>Preferred</option>	
			</select>
			
		</div>
	</div>
	
	<div class="row">
		<label  class="col-sm-2" >Unit count<span style="color:red;">*</span></label>
		<div class="form-group col-sm-5"><input type="number" value="" class="form-control" name="unit_count" required /></div>
	</div>

	<div class="row">
		<label  class="col-sm-2" >Unit price<span style="color:red;">*</span></label>
		<div class="form-group col-sm-5"><input type="number" value="" class="form-control" name="unit_price" required /></div>
	</div>
	
	
	<div class="row">
		<div class="form-group col-sm-5">
			<button type="submit" class="btn btn-primary" style="float:right;" onclick='syncNewAjax("addStocksForm", "add_Stocks", "Stocks","refresh");return false;' >Add Stock</button>
		</div>
	</div>

</form>

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

<?php
require_once "view/footer.php";
?>
