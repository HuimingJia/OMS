<?php
class orderModel{
	public $_table = "orderlist";

	public function count(){
		$sql = 'select count(*) from '.$this->_table;
		return DB::findResult($sql,0,0);
	}

	public function getOrderInfo($id){
		if (empty($id)) {
			return array();
			# code...
		}else{
			$id = intval($id);
			$sql = 'select * from '.$this->_table.' where id = '.$id;
			return DB::findOne($sql);
		}
	}

	public function addOrder($data, $tableid){
		extract($data);
		if(empty($client)){
			return 0;
		}
		if($factory==null || $factory==""){
			$factory='未指定';
		}

		if($clerk==null || $clerk==""){
			$clerk='未指定';
		}

		$client = addslashes($client);
		$receivetime = str_replace('"', "", $receivetime);
		$receivetime = addslashes($receivetime);

		$ihtime = str_replace('"', "", $ihtime);
		$ihtime = addslashes($ihtime);
		$factory = addslashes($factory);
		$clerk = addslashes($clerk);
		$po = addslashes($po);
		$stylenumber = addslashes($stylenumber);
		$shop = addslashes($shop);
		$color = addslashes($color);
		$amount = addslashes($amount);
		$unitprice = addslashes($unitprice);
		$amount = str_replace(',', "",$amount);
		$unitprice = str_replace(',', "",$unitprice);
		$totalprice = str_replace(',', "",$totalprice);
		$totalprice = addslashes($totalprice);
		$remark = addslashes($remark);
		$type = addslashes($type);

		$data = array(
			'tableid' => $tableid,
			'client' => $client,
			'receivetime' => $receivetime,
			'factory' => $factory,
			'clerk' => $clerk,
			'po' => $po,
			'stylenumber' => $stylenumber,
			'shop' => $shop,
			'color' => $color,
			'amount' => $amount,
			'unitprice' => $unitprice,
			'totalprice' => $totalprice,
			'leavetime' => $leavetime,
			'ihtime' => $ihtime,
			'remark' => $remark,
			'type' => $type,
			);
		return DB::insert($this->_table, $data);
	}
	
	public function findClientAndType($tableid){
		$sql = 'set @n=0;';
		DB::query($sql);

		$sql = "select (@n:=@n+1) as no,a.client,b.sum_amount as sum_amount_1,c.sum_amount as sum_amount_2,a.sum_price from (
		select client, sum(totalprice) as sum_price from ".$this->_table." where tableid = '".$tableid."' group by client) a  left join (
		select client,sum(amount) as sum_amount from ".$this->_table." where type = '针织' and  tableid = '".$tableid."' group by client) b on a.client=b.client left join (
		select client,sum(amount) as sum_amount from ".$this->_table." where type = '梭织' and  tableid = '".$tableid."' group by client) c on a.client=c.client";

		return DB::findAll($sql);
	} 

	public function findClientAndClerk($tableid){
		$sql = 'select client,clerk,sum(amount) as sum_amount,sum(totalprice) as sum_totalprice from '.$this->_table.' where tableid = '.$tableid.' group by client,clerk';
		return DB::findAll($sql);
	}

	public function findFactoryAndSum($tableid){

		$sql = 'set @n=0;';
		DB::query($sql);
		$sql = 'select (@n:=@n+1) as no,factory,sum(amount) as sum_amount from '.$this->_table.' where tableid = '.$tableid.' group by factory order by no';
		return DB::findAll($sql);
	}

	public function findAllbyTableId($tableid){
		$sql = 'select * from '.$this->_table.' where tableid = '.$tableid.'';
		return DB::findAll($sql);
	}

	public function delAllbyTableId($tableid){
		return DB::del($this->_table, 'tableid='.$tableid);
	}

	public function getOrderList($tableid){
		$data = $this->findAllbyTableid($tableid);
		foreach ($data as $k => $value) {
			$data[$k]['remark'] = mb_substr((strip_tags($data[$k]['remark'])), 0,200);
		}
		return $data;
	}

	public function delOrderByTableId($tableid){
		return DB::del($this->_table, 'tableid='.$tableid);
	}

	public function delById($id){
		return DB::del($this->_table, 'id='.$id);
	}

}
?>