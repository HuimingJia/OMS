<?php
class orderController{

	public function tableImport($path,$sheet){
		require_once(dirname(dirname(__FILE__))."/PHPExcel/PHPExcel/IOFactory.php");
		$objPHPExcel = PHPExcel_IOFactory::load("php://output");
		$data = $objPHPExcel->getSheet($sheet)->toArray();
		print_r($data);
	}

	public function ImportTable(){
		$this->tableImport(dirname(dirname(dirname(__FILE__)))."/data/cache/ex.xlsm",0);
	}



	public function orderImport(){
		if (empty($_POST)) {
			if ($_GET['id']) {
				$data = M('news')->getnewsinfo($_GET['id']);
				# code...
			}else{
				$data = array();
			}
			VIEW::assign(array('data'=> $data));
			VIEW::display('admin/orderimport.html');
			# code...
		}else{
			//$result = M('news')->newssumbit($_POST);
			$this->newssumbit();
			print_r($_POST);

		}
	}

	public function updateOrder(){

	}

	public function insertOrder(){

	}


	public function delOrderByTableId($tableid){

	}

	public function delOrderById($id){

	}
}

?>