<?php
  require_once "./vendor/phpoffice/phpexcel/Classes/PHPExcel.php";

  $fileName = $argv[1];
  $excelReader = new PHPExcel_Reader_Excel2007();
  $excelObj = $excelReader->load($fileName);
  $worksheet = $excelObj->getSheet(0);
  $worksheet->setCellValue('C1', "Editted!");

  $objWriter = new PHPExcel_Writer_Excel2007($excelObj);
  $objWriter->save($argv[2]);
?>
