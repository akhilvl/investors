<?php

class Common {

	/**
	 * Gets the task requested by user, check if method exist in child class and call it
	 *
	 */	
	public function dotask(){
	
		$task = Input::fetch("task");
		
		if(method_exists ( $this , $task )){
			$this->$task();
		}
		else{
			response('Task not found');
		}
	
	}
	
}
