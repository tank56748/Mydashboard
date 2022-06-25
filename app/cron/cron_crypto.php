<?
include ("/var/www/qwert136/data/www/minebtc.ru".'/app/database/connect.php');
$rub_json = file_get_contents('https://min-api.cryptocompare.com/data/price?fsym=RUB&tsyms=USD,EUR,RUB,JPY,BTC,ETH,UAH,CHF,CNY,ILS,GBP,INR&api_key=52d5b28e4bb92174269c4ad936feea3da9fb957467a2c88cc45123717837795b');
$usd_json = file_get_contents('https://min-api.cryptocompare.com/data/price?fsym=USD&tsyms=USD,EUR,RUB,JPY,BTC,ETH,UAH,CHF,CNY,ILS,GBP,INR&api_key=52d5b28e4bb92174269c4ad936feea3da9fb957467a2c88cc45123717837795b');

$rub_arr = json_decode($rub_json, true);
$usd_arr = json_decode($usd_json, true);
$rub_sql = '';
$usd_sql = '';
$i = 0;
foreach($rub_arr as $cur => $value){
	$value = 1 / $value;
	if($i === 0){
		$rub_sql .= "$cur = '$value'";
	}else{
		$rub_sql .= ", $cur = '$value'";
	}
	$i++;
}
$i = 0;
foreach($usd_arr as $cur => $value){
	$value = 1 / $value;
	if($i === 0){
		$usd_sql .= "$cur = '$value'";
	}else{
		$usd_sql .= ", $cur = '$value'";
	}
	$i++;
}
global $pdo;
$sql_rub = "UPDATE crypto SET $rub_sql WHERE currency = 'RUB'";
$sql_usd = "UPDATE crypto SET $usd_sql WHERE currency = 'USD'";
$query_rub = $pdo->prepare($sql_rub);
$query_rub->execute();
$query_usd = $pdo->prepare($sql_usd);
$query_usd->execute()
?>
