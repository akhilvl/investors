<?php
/**
 * Exchange -> To manipulate with Exchange information
 * 
 * 
 * @package    Exchange
 * @subpackage Common
 * @author     Akhil
 */
 
class Exchange extends Common {

  /**
   * To get all active exchanges
   *
   * @return Array -> All exchanges info
   */	
	public function getAllExchanges(){
		$q = DB::mquery("select * from exchanges where status=1");
		return DB::fetchAll($q);
	}

  /**
   * To validate by exchange-id. Check is ID exists in exchange table or not
   *
   * @param Int - $exchange_id -> Id of the exchange
   * @return Array -> exchange info
   */	
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
	
  /**
   * To get the output of Report 2: An overview of all stock exchanges and what company’s stock is traded there
   *
   * @return Array -> Report
   */	
	public function getAllExchangesCompany(){
		$q = DB::mquery("select a.exchange_name, c.company_name from exchanges as a 
		inner join stocks as b on a.exchange_id=b.exchange_id 		
		inner join company as c on b.company_id=c.company_id 		
		where a.status=1 order by a.exchange_name asc");
		return DB::fetchAll($q);
	}
	
}

?>
