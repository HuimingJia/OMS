<?php 
include_once(dirname(dirname(__FILE__))."/PHPExcel/PHPExcel/IOFactory.php");//引入读取excel的类文件
include_once(dirname(dirname(__FILE__))."/PHPExcel/PHPExcel.php");

class myphpexcel{
	private static $objPHPExcel;

	public static function getphpexcelsheet($title){
		//实例化PHPExcel类， 等同于在桌面上新建一个excel
		self::$objPHPExcel->createSheet();
		self::$objPHPExcel->setActiveSheetIndex(0);
		$objSheet=self::$objPHPExcel->getActiveSheet();
		$objSheet->getDefaultStyle()->getFont()->setSize(15);
		$objSheet->getStyle('A')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
		$objSheet->getStyle('B')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
		$objSheet->getStyle('C')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
		$objSheet->getStyle('D')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
		$objSheet->getStyle('E')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
		$objSheet->getStyle('F')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
		$objSheet->setTitle($title);
		return $objSheet;
	}	

	public static function getphpexcel(){
		self::$objPHPExcel=new PHPExcel();
		return self::$objPHPExcel;
	}
}
?>