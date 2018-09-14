<?php
class Stocks extends Common {

	public function getStocksData($name){
		$q = DB::mquery("select * from stocks where status=1");
		return DB::fetch($q);
	}
	
	public function add_Stocks(){
		$company_id = clean(Input::fetch('company_id'));
		$exchange_id = clean(Input::fetch('exchange_id'));
		$stock_type = clean(Input::fetch('stock_type'));
		$unit_count = clean(Input::fetch('unit_count'));
		$unit_price = clean(Input::fetch('unit_price'));
		
		if(empty($company_id) || empty($exchange_id) || empty($stock_type) || empty($unit_count) || empty($unit_price) ){
			response("Please fill all fields");
		}
		else{
			
			Company::validateCompanyById($company_id);
			Exchange::validateExchangeById($company_id);
			
			if(!in_array($stock_type, array('common', 'preferred')) ){
				response("Stock-type is invalid");
			}
			
			if(!is_numeric($unit_count)){
				response("Unit-count is invalid");
			}
			if(!is_numeric($unit_price)){	
				response("Unit-price is invalid");
			}
			
			$insert = array(
				'company_id' => $company_id,
				'exchange_id' => $exchange_id,
				'stock_type' => $stock_type,
				'unit_count' => $unit_count,
				'unit_price' => $unit_price,
			);
			DB::insertData("stocks", $insert);	
			response("Stock added successfully", false);
		
			
		}
	}
	
	public function getAllStocks(){
		$q = DB::mquery("select b.company_name,c.exchange_name,a.* from stocks as a 
		inner join company as b on a.company_id=b.company_id 
		inner join exchanges as c on a.exchange_id=c.exchange_id 
		where a.status=1 order by b.company_name asc");
		return DB::fetchAll($q);
	}

	public function getTopStockCompanyWise($company_id){
		$q = DB::mquery("select * from stocks where company_id=$company_id and status=1 order by unit_price desc limit 1");
		return DB::fetch($q);	
	}
	
}

?>
