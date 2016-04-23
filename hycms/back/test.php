<meta http-equiv="Content-Type" content="text/html; charset=" utf-8" />
<?php
use hybase\Manager\ProductManager;
use hybase\Manager\BackMenu;

require_once __DIR__ . '/../src/manager/product/ProductManager.php';
require_once __DIR__ . '/../src/manager/product/BackMenu.php';
header ( "Content-Type: text/html;charset=utf-8" );
class test {
	public function __construct() {
		// print "In BaseClass constructor\n";
	}
	public function testfunction() {
		$productManager = new ProductManager ();
		$results = $productManager->findProductProperties ( 66 );
		// echo $results->getCode();
		echo $results [0]->getProductId ();
	}
	public function testmenu() {
		$backMenu = new BackMenu ();
		$results = $backMenu->makeSysMenu ();
		// echo json_encode($results[0]);
		foreach ( $results as $result ) {
			echo implode ( $result );
		}
		$level = 1;
		$itemoper = '';
		echo '<h1>PHPTree树形结构</h1>';
		echo '<ul  style="width:300px;">';
		foreach ( $results as $item ) {
			if ($level > $item ['level']) {
				$level=$item ['level'];
				echo '</ul></li><li>';
				echo str_repeat ( '', $item ['level'] );
				echo $item ['name'];
				echo '</li>';
			}else if ($level < $item ['level']) {
				$level=$item ['level'];
				echo '<li><ul><li>';
				echo str_repeat ( '', $item ['level'] );
				echo $item ['name'];
				echo '</li>';
			} else{
				$level=$item ['level'];
				echo '<li>';
				echo str_repeat ( '', $item ['level'] );
				echo $item ['name'];
				echo '</li>';
			}
		}
		echo '</ul>';
// 	/echo time();
		echo date('Ymd');
	}
	public function testArray(){
		$testArray=array();
		$testArray[1][2]='aa';
// 		$testArray[]=1|'bb';
// 		$testArray[]=1|'cc';
		$testArray[3]='dd';
		echo json_encode($testArray);
		echo $testArray[1][2];
	}
	public function testUploadHtml(){
		echo '<input type="file">';
	}
	
}

$test = new test();
$test->testUploadHtml();
