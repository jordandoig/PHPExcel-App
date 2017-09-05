<?php
require_once "./vendor/phpoffice/phpexcel/Classes/PHPExcel.php";



$fileName = $argv[1];
$excelReader = PHPExcel_IOFactory::createReaderForFile($fileName);
$excelObj = $excelReader->load($fileName);
$worksheet = $excelObj->getSheet(0);
$worksheet->setCellValue('C4', 50);
$arr = $worksheet->toArray(null,true,true,true);

print $arr[1]['A'];

$args = array();

for ($i = 2; $i < count($argv); $i = $i + 1) {
  array_push($args, $argv[$i]);
};

$worksheet->fromArray($args, NULL, 'C1');

$objWriter = new PHPExcel_Writer_Excel2007($excelObj);
$objWriter->save(substr($fileName, 0, strlen($filename) - 5) . "_Editted.xlsx");
?>
