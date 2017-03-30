<?php
class tableModel{
	public $_table = "tablelist";

	public function addTable($dateline){
		$data = array(
			'dateline' => $dateline
			);
		return DB::insert($this->_table, $data);
	}

	public function findAllOrderByDateline(){ 
		$sql = 'set @n=0;';
		DB::query($sql);
		$sql = 'select (@n:=@n+1) as no,dateline,id from '.$this->_table;
		return DB::findAll($sql);
	}

	public function delById($id){
		return DB::del($this->_table, 'id='.$id);
	}

	public function getTableList(){
		$data = $this->findAllOrderByDateline();
		if($data!=null)
		{
		foreach ($data as $k => $value) {
			$data[$k]['dateline'] = date('Y-m-d H:i:s', $data[$k]['dateline']);
		}}
		return $data;
	}

	public	function count(){
		$sql = 'select count(*) from '.$this->_table;
		return DB::findResult($sql,0,0);
	}
}
?>