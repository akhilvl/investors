<?php
class Company extends Common {

	public function getCompanyData($name){
		$q = DB::mquery("select * from company where company_name='$name' and status=1");
		return DB::fetch($q);
	}
	
	public function add_Company(){
		$name = clean(Input::fetch('company_name'));
		$location = clean(Input::fetch('location'));
		
		if(empty($name) || empty($location) ){
			response("Name/location cannot be empty");
		}
		else{
			$c_data = $this->getCompanyData($name);
			if($c_data){
				response("Company-name already exists");
			}
			else{
				$insert = array(
					'company_name' => $name,
					'location' => $location
				);
				DB::insertData("company", $insert);	
				response("Company added successfully", false);
			}
			
		}
	}
	
	public function getAllCompanies(){
		$q = DB::mquery("select * from company where status=1");
		return DB::fetchAll($q);
	}
	
	public static function validateCompanyById($company_id){
		$company_id = (int)$company_id;
		$q = DB::mquery("select * from company where company_id=$company_id and status=1");
		$data = DB::fetchAll($q);
		if($data){
			return $data;
		}
		else{
			response("Company-id invalid");
		}
	}
	
	public function getReport3(){
		$q = DB::mquery("select b.company_name,c.exchange_name,a.* from stocks as a 
		inner join company as b on a.company_id=b.company_id 
		inner join exchanges as c on a.exchange_id=c.exchange_id 
		where a.status=1 order by b.company_name asc");
		return DB::fetchAll($q);
	}
	

}

?>
