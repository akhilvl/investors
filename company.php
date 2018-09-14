<?php
require_once "view/header.php";
?>

<h1>Company</h1>

<form id='addCompanyForm'  action="?v=grid" target="_blank" method="post" >
	<div class="row">
		<label  class="col-sm-2" >Company name<span style="color:red;">*</span></label>
		<div class="form-group col-sm-5"><input type="text" value="" class="form-control" name="company_name" required /></div>
	</div>
	<div class="row">
		<label  class="col-sm-2" >Location<span style="color:red;">*</span></label>
		<div class="form-group col-sm-5"><input type="text" value="" class="form-control" name="location" required /></div>
	</div>
	
	<div class="row">
		<div class="form-group col-sm-5">
			<button type="submit" class="btn btn-primary" style="float:right;" onclick='syncNewAjax("addCompanyForm", "add_Company", "Company","refresh");return false;' >Add Company</button>
		</div>
	</div>

</form>

<?php
$company_obj = new Company();
$all_companies = $company_obj->getAllCompanies();

	echo '
	<div class="row" style="font-weight:bold;" >
  <div class="col-sm-4" style="background-color:lavender;">Name</div>
  <div class="col-sm-4" style="background-color:lavenderblush;">Location</div>
  <div class="col-sm-4" style="background-color:lavender;">Created-date</div>
</div>

	';

foreach($all_companies as $one){
	echo '
	<div class="row">
  <div class="col-sm-4" style="background-color:lavender;">'.$one['company_name'].'</div>
  <div class="col-sm-4" style="background-color:lavenderblush;">'.$one['location'].'</div>
  <div class="col-sm-4" style="background-color:lavender;">'.$one['created_date'].'</div>
</div>

	';
}
?>

<?php
require_once "view/footer.php";
?>
