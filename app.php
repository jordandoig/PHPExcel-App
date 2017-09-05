<?php
  require_once "./vendor/phpoffice/phpexcel/Classes/PHPExcel.php";

  $fileName = $argv[1];
  $excelReader = PHPExcel_IOFactory::createReaderForFile($fileName);
  $excelObj = $excelReader->load($fileName);
  $worksheet = $excelObj->getSheet(0);
  $worksheet->setCellValue('C1', "Editted!");

  $objWriter = new PHPExcel_Writer_Excel2007($excelObj);
  $objWriter->save(substr($fileName, 0, strlen($filename) - 5) . "_Editted.xlsx");
?>
