<?php
class Exchange extends Common {

	public function getAllExchanges(){
		$q = DB::mquery("select * from exchanges where status=1");
		return DB::fetchAll($q);
	}


	public static function validateExchangeById($exchange_id){
		$exchange_id = (int)$exchange_id;
		$q = DB::mquery("select * from exchanges where exchange_id=$exchange_id and status=1");
		$data = DB::fetchAll($q);
		if($data){
			return $data;
		}
		else{
			response("exchange-id invalid");
		}
	}
	
	public function getAllExchangesCompany(){
		$q = DB::mquery("select a.exchange_name, c.company_name from exchanges as a 
		inner join stocks as b on a.exchange_id=b.exchange_id 		
		inner join company as c on b.company_id=c.company_id 		
		where a.status=1 order by a.exchange_name asc");
		return DB::fetchAll($q);
	}
	
}

?>
