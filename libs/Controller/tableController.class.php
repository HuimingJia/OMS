<?php
include_once(dirname(dirname(__FILE__))."/util/reporter.class.php");	
include_once(dirname(dirname(__FILE__))."/util/myphpexcel.class.php");
include_once(dirname(dirname(__FILE__))."/PHPExcel/PHPExcel/IOFactory.php");//引入读取excel的类文件
include_once(dirname(dirname(__FILE__))."/PHPExcel/PHPExcel.php");

class tableController{

	public function insertTable(){
		$time = time();		
		return M('table')->addTable($time);
	}

	public function insertOrder($sheet, $tableid)
	{
		$orderobj = M('order');
		$row_data = $sheet->toArray();

		foreach ($row_data as $key_r => $value_r) {
				if($value_r[0]==null || $value_r[0]=="客户" ){
					continue;
				}

			$data = array(
				'client' => $value_r[0],
				'receivetime' => $value_r[1],
				'factory' => $value_r[2],
				'clerk' => $value_r[3],
				'po' => $value_r[4],
				'stylenumber' => $value_r[5],
				'shop' => $value_r[6],
				'color' => $value_r[7],
				'amount' => $value_r[8],
				'unitprice' => $value_r[9],
				'totalprice' => $value_r[10],
				'leavetime' => $value_r[11],
				'ihtime' => $value_r[12],
				'remark' => $value_r[13],
				'type' => $value_r[14],
				);
			$orderobj->addOrder($data, $tableid);
		}
	}

	public function downloadTable(){
		$tableid=$_GET['tableid'];
		echo $tableid;
		//$tabletype=$_GET['id']
		//
		//$data = M('order')->getOrderList($_GET['id']);
		VIEW::assign(array('data'=> $data));
		VIEW::display('admin/tabledetail.html');

	}

	public function addTable(){
		$tempname= $_FILES['importTable']['tmp_name'];
		$filename= dirname(dirname(dirname(__FILE__)))."/data/cache/".date('Y-m-d H:I:s', time());
		$result=move_uploaded_file($tempname,$filename);
		if($_FILES['importTable']['error']==0 && $result==true)
		{
			try{
				$fileType=PHPExcel_IOFactory::identify($filename);//自动获取文件的类型提供给phpexcel用
				$objReader=PHPExcel_IOFactory::createReader($fileType);//获取文件读取操作对象ype($filename);
				$objPHPExcel=$objReader->load($filename);//加载文件007();
				$sheet = $objPHPExcel->getSheet(0);
				$tableid = $this->insertTable();
				$this->insertOrder($sheet, $tableid);

				Reporter::showmessage('上传成功','index.php?controller=table&method=showTableList');
				}
				catch (Exception $e){
					Reporter::showmessage('文件报错，请确认文件保存方式正确','index.php?controller=table&method=showTableList');
				}
		}else{
			Reporter::showmessage('上传失败','index.php?controller=table&method=showTableList');
		}
		unlink($filename);

	}


	public function getTable(){

	}

	public function delTable(){			
		if(intval($_GET['tableid'])){
			if(M('table')->delById($_GET['tableid']) && M('order')->delOrderByTableId($_GET['tableid'])){
				Reporter::showmessage('删除成功','index.php?controller=table&method=showTableList');
			}else{
				Reporter::showmessage('删除失败','index.php?controller=table&method=showTableList');
			}	
		}
	}

	public function showTable(){
		$data = M('order')->getOrderList($_GET['tableid']);
		VIEW::assign(array('data'=> $data));
		VIEW::display('admin/tabledetail.html');
	}

	public function showTableList(){
		if(($data = M('table')->getTableList())==null)
		{
			$data=array();
		}

		foreach ($data as $key => $value) {
			# code...
		}
		VIEW::assign(array('data'=> $data));
		VIEW::display('admin/tablelist.html');
	}


	public function showTableByClient(){
		$data = M('order')->findClientAndType($_GET['tableid']);
		//var_dump($data);
		VIEW::assign(array('data'=> $data));
		VIEW::display('admin/tablebyclient.html');
	}

	public function showTableByClerk(){
		$data = M('order')->findClientAndClerk($_GET['tableid']);
		VIEW::assign(array('data'=> $data));
		VIEW::display('admin/tablebyclerk.html');
	}

	public function showTableByFactory(){
		$data = M('order')->findFactoryAndSum($_GET['tableid']);
		VIEW::assign(array('data'=> $data));
		VIEW::display('admin/tablebyfactory.html');
	}

	public function downloadTableByClient(){
		$title = "未出货定南类别统计表";
		$filename = $title.date('Y-m-d H:i:s', time()).'.xls';
		$data = M('order')->findClientAndType($_GET['tableid']);
		$objPHPExcel = myphpexcel::getphpexcel();
		$objSheet = myphpexcel::getphpexcelsheet($title);
		$objSheet->setCellValue("A1","NO")->setCellValue("B1","客户")->setCellValue("C1","类型")->setCellValue("D1","")->setCellValue("E1","在手量")->setCellValue("F1","");
		$objSheet->setCellValue("A2","")->setCellValue("B2","")->setCellValue("C2","针织件数")->setCellValue("D2","梭织件数")->setCellValue("E2","总数量")->setCellValue("F2","总金额");
		$row =3;
		foreach($data as $key=>$value){
				$objSheet->setCellValue("A".$row,$value['no'])->setCellValue("B".$row,$value['client'])->setCellValue("C".$row,$value['sum_amount_1'])->setCellValue("D".$row,$value['sum_amount_2'])->setCellValue("E".$row,"")->setCellValue("F".$row,$value['sum_price']);
				$row++;
			}

		$objWriter=PHPExcel_IOFactory::createWriter($objPHPExcel,'Excel5');//生成excel文件
		$this->browser_export('Excel5',$filename);//输出到浏览器
		$objWriter->save("php://output");

	}

	public function downloadTableByClerk(){
		$title = "业务员统计表";
		$filename = $title.date('Y-m-d H:i:s', time()).'.xls';
		$data = M('order')->findClientAndClerk($_GET['tableid']);
		$objPHPExcel = myphpexcel::getphpexcel();
		$objSheet = myphpexcel::getphpexcelsheet($title);
		$objSheet->setCellValue("A1","客户")->setCellValue("B1","业务员")->setCellValue("C1","订单数量")->setCellValue("D1","订单金额");

		$row =2;
		foreach($data as $key=>$value){
				$objSheet->setCellValue("A".$row,$value['client'])->setCellValue("B".$row,$value['clerk'])->setCellValue("C".$row,$value['sum_amount'])->setCellValue("D".$row,$value['sum_totalprice']);
				$row++;
			}

		$objWriter=PHPExcel_IOFactory::createWriter($objPHPExcel,'Excel5');//生成excel文件
		$this->browser_export('Excel5',$filename);//输出到浏览器
		$objWriter->save("php://output");
		
	}

	public function downloadTableByFactory(){
		$title = "各工厂现有订单统计表";
		$filename = $title.date('Y-m-d H:i:s', time()).'.xls';
		$data = M('order')->findFactoryAndSum($_GET['tableid']);
		$objPHPExcel = myphpexcel::getphpexcel();
		$objSheet = myphpexcel::getphpexcelsheet($title);
		$objSheet->setCellValue("A1","NO")->setCellValue("B1","工厂")->setCellValue("C1","件数");
		$row =2;
		foreach($data as $key=>$value){
				$objSheet->setCellValue("A".$row,$value['no'])->setCellValue("B".$row,$value['factory'])->setCellValue("C".$row,$value['sum_amount']);
				$row++;
			}

		$objWriter=PHPExcel_IOFactory::createWriter($objPHPExcel,'Excel5');//生成excel文件
		$this->browser_export('Excel5',$filename);//输出到浏览器
		$objWriter->save("php://output");
		
	}

	public function browser_export($type,$filename){
		ob_end_clean();
		if($type=="Excel5"){
				header('Content-Type: application/vnd.ms-excel');//告诉浏览器将要输出excel03文件
		}else{
				header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');//告诉浏览器数据excel07文件
		}
		header('Content-Disposition: attachment;filename="'.$filename.'"');//告诉浏览器将输出文件的名称
		header('Cache-Control: max-age=0');//禁止缓存
	}

}
?>