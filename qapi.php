<?php

// if(isset($_POST['input_symbol'])){
//    $symbol = $_POST['input_symbol'];
//     echo $symbol;
// } else {
//   echo "post is null";
// }
//

  error_reporting(E_ALL);
	//--------------------------------------------------------------
	// Examples: Quandl API
	//--------------------------------------------------------------
	require_once "Quandl.php";
  $api_key = "Y8Jemth3AeYngSuoEi3r";
  // $symbol = "";

    if(isset($_POST['input_symbol'])) { //check symbol is not empty
      // echo "POST VALUE = ".$_POST['input_symbol'];
      // echo $_POST['input_symbol'];
      $symbol = "GOOG/NASDAQ_".trim($_POST['input_symbol']); //fixed concatenation
      // echo "SYMBOL = ".$symbol;
    }

    // $symbol="GOOG/NASDAQ_AAPL";

    // echo "SYMBOL = $symbol";
    // echo "API KEY = $api_key";

  // Modify this call to any `exampleN` to check different samples
  // echo $api_key.' '.$symbol;
  $data = example1($api_key, $symbol);
  // echo '<pre>';
  // print_r($data);
  // echo '</pre>';


  foreach($data as $obj){
    echo $obj->name;
    echo $obj->description;
    echo $obj->refreshed_at;
  }








  // Example 1: Hello Quandl
	function example1($api_key, $symbol) {
		$quandl = new Quandl($api_key);
    // $quandl->format = "json";
    return $quandl->getSymbol($symbol, [
			"trim_start" => "today-5 days",
			"trim_end"   => "today",
		]);
	}


	// Example 2: API Key + JSON
	function example2($api_key, $symbol) {
		$quandl = new Quandl($api_key);
		$quandl->format = "json";
		return $quandl->getSymbol($symbol);
	}

	// Example 3: Date Range + Last URL
	function example3($api_key, $symbol) {
		$quandl = new Quandl($api_key);
		print $quandl->last_url;
		return $quandl->getSymbol($symbol, [
			"trim_start" => "today-30 days",
			"trim_end"   => "today",
		]);
	}

	// Example 4: CSV + More parameters
	function example4($api_key, $symbol) {
		$quandl = new Quandl($api_key, "csv");
		return $quandl->getSymbol($symbol, [
			"sort_order"      => "desc", // asc|desc
			"exclude_headers" => true,
			"rows"            => 10,
			"column"          => 4, // 4 = close price
		]);
	}

	// Example 5: XML + Frequency
	function example5($api_key, $symbol) {
		$quandl = new Quandl($api_key, "xml");
		return $quandl->getSymbol($symbol, [
			"collapse" => "weekly" // none|daily|weekly|monthly|quarterly|annual
		]);
	}

	// Example 6: Search
	function example6($api_key, $symbol) {
		$quandl = new Quandl($api_key);
		return $quandl->getSearch("crude oil");
	}

	// Example 7: Symbol Lists
	function example7($api_key, $symbol) {
		$quandl = new Quandl($api_key, "csv");
		return $quandl->getList("WIKI", 1, 10);
	}

	// Example 8: Meta Data
	function example8($api_key, $symbol) {
		$quandl = new Quandl($api_key);
		return $quandl->getMeta($symbol);
	}

	// Example 9: List of Databases
	function example9($api_key, $symbol=null) {
		$quandl = new Quandl($api_key);
		return $quandl->getDatabases();
	}

	// Example 10: Direct Call (access any Quandl endpoint)
	function example10($api_key, $symbol=null) {
		$quandl = new Quandl($api_key);
		return $quandl->get('databases/WIKI');
	}

	// Example 11: Error Handling
	function example11($api_key, $symbol) {
		$quandl = new Quandl($api_key, "csv");
		$result = $quandl->getSymbol("DEBUG/INVALID");
		if($quandl->error and !$result)
			return $quandl->error . " - " . $quandl->last_url;
		return $result;
	}



// if(isset($_POST['input_symbol'])){
//    $symbol = $_POST['input_symbol'];
//     echo $symbol;
// } else {
//   echo "post is null";
// }
// echo "hello";


?>
