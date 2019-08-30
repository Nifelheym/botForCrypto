<?php
	require_once('phpQuery/phpQuery.php');
	require_once('curl.php');
// 	$ch = curl_init('http://bestchange.ru/'); 
// 	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// 	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
	
// 	curl_setopt($ch, CURLOPT_PROXY, '159.89.83.24:3128');
// 	curl_setopt($ch, CURLOPT_PROXYTYPE, CURLPROXY_HTTP);

//  	 $output = curl_exec($ch);
// 	curl_close($ch);
//     echo $output;


	$links = array( 'http://www.bestchange.ru/qiwi-to-bitcoin-cash.html', 'http://www.bestchange.ru/qiwi-to-bitcoin-cash.html' ,'http://www.bestchange.ru/qiwi-to-dash.html','http://www.bestchange.ru/qiwi-to-dash.html','http://www.bestchange.ru/qiwi-to-bitcoin.html','http://www.bestchange.ru/qiwi-to-dogecoin.html','http://www.bestchange.ru/qiwi-to-dogecoin.html','http://www.bestchange.ru/qiwi-to-ethereum-classic.html','http://www.bestchange.ru/qiwi-to-ethereum-classic.html','http://www.bestchange.ru/qiwi-to-ethereum.html','http://www.bestchange.ru/qiwi-to-ethereum.html','http://www.bestchange.ru/qiwi-to-ripple.html','http://www.bestchange.ru/qiwi-to-ripple.html','http://www.bestchange.ru/qiwi-to-zcash.html','http://www.bestchange.ru/qiwi-to-zcash.html');

	$tables = array( 'bch3k', 'bch5k', 'dash3k', 'dash5k','btc5k','doge3k','doge5k','etc3k','etc5k','eth3k','eth5k','xrp3k','xrp5k','zcash3k','zcash5k');
    
    $db = mysqli_connect('p541762.mysql.ihc.ru', 'p541762_cr','68944HayNf','p541762_cr');
	mysqli_query($db,"set names utf8");

	for($l = 0; $l < count($links); $l++){
		$curl = new Curl();

		$res = $curl->get($links[$l]);
		$doc = phpQuery::newDocument($res->body);
		$changes = $doc->find('div#rates_block table#content_table tr');
		foreach ($changes as $change) {
			$pq = pq($change);
			
			$exchangers = array(
				"bch3k" => array("60сек","Xchange","ProstoCash","YChanger","MultiChange","NiceChange","4ange","365Cash","Банкомат"),
				"bch5k" => array("60сек","Xchange","ProstoCash","YChanger","MultiChange","NiceChange","4ange","YoChange","Банкомат","BaksMan","24PayBank","Platov","RamonCash","PayGet","AllCash","FastChange","El-Change","FlashObmen","Top-Exchange","F-Change","FastExchange","365Cash","Papa-Change"),
				"dash3k" => array("60сек","Xchange","ProstoCash","YChanger","MultiChange","NiceChange","4ange","YoChange","365Cash"),
				"dash5k" => array("60сек","Xchange","ProstoCash","YChanger","MultiChange","NiceChange","4ange","YoChange","Банкомат","BaksMan","24PayBank","Platov","RamonCash","PayGet","AllCash","FastChange","HoBit","N-Change","Bchange","F-Change","365Cash"),
				"btc5k" => array("60сек","Xchange","ProstoCash","YChanger","MultiChange","NiceChange","4ange","YoChange","Банкомат","BaksMan","24PayBank","Platov","RamonCash","PayGet","AllCash","FastChange","HoBit","N-Change","Bchange","El-Change","FlashObmen","Top-Exchange","F-Change","FastExchange","Шахта","WW-Pay","365Cash","Papa-Change"),
				"doge3k" => array("60сек","Xchange","ProstoCash","YChanger","MultiChange","NiceChange","4ange","YoChange","Банкомат"),
				"doge5k" => array("60сек","Xchange","ProstoCash","YChanger","MultiChange","NiceChange","4ange","YoChange","Банкомат","BaksMan","24PayBank","Platov","El-Change","FlashObmen","Top-Exchange","F-Change","Papa-Change","FastExchange"),
				"etc3k" => array("60сек","YChanger","MultiChange","NiceChange","4ange","YoChange"),
				"etc5k" => array("60сек","ProstoCash","YChanger","MultiChange","NiceChange","4ange","YoChange","BaksMan","24PayBank","Platov","RamonCash","AllCash","FastChange"),
				"eth3k" => array("4ange","YoChange","365Cash"),
				"eth5k" => array("60сек","Xchange","ProstoCash","YChanger","MultiChange","NiceChange","4ange","YoChange","Банкомат","BaksMan","24PayBank","Platov","RamonCash","PayGet","AllCash","FastChange","HoBit","N-Change","Bchange","El-Change","FlashObmen","Top-Exchange","FastExchange","WW-Pay","365Cash","Papa-Change"),
				"xrp3k" => array("60сек","Xchange","ProstoCash","YChanger","MultiChange","NiceChange","4ange","YoChange","Банкомат"),
				"xrp5k" => array("60сек","Xchange","ProstoCash","YChanger","MultiChange","NiceChange","4ange","YoChange","Банкомат","BaksMan","24PayBank","Platov","RamonCash","AllCash","FastChange","HoBit","N-Change","Bchange"),
				"zcash3k" => array("60сек","Xchange","ProstoCash","YChanger","MultiChange","NiceChange","4ange","YoChange","365Cash","Банкомат"),
				"zcash5k" => array("60сек","Xchange","ProstoCash","YChanger","MultiChange","NiceChange","4ange","YoChange","Банкомат","BaksMan","24PayBank","Platov","RamonCash","PayGet","AllCash","FastChange","HoBit","7Money","365Cash")
			);

			$f = count($exchangers);
			$name = $pq->find('td.bj div.pc')->text();
			if( $tables[$l] == "bch3k" || $tables[$l] == "bch5k"){
				$am = $pq->find('td.bi div.fs')->text()." = 1BCH";
			}elseif($tables[$l] == "dash3k" || $tables[$l] == "dash5k"){
				$am = $pq->find('td.bi div.fs')->text()." = 1DASH";
			}elseif($tables[$l] == "doge3k" || $tables[$l] == "doge5k"){
				$am = $pq->find('td.bi div.fs')->text()." = 1DOGE";
			}elseif($tables[$l] == "btc5k"){
				$am = $pq->find('td.bi div.fs')->text()." = 1BTC";
			}elseif($tables[$l] == "etc3k" || $tables[$l] == "etc5k"){
				$am = $pq->find('td.bi div.fs')->text()." = 1ETC";
			}elseif($tables[$l] == "xrp3k" || $tables[$l] == "xrp5k"){
				$am = $pq->find('td.bi div.fs')->text()." = 1XRP";
			}elseif($tables[$l] == "zcash3k" || $tables[$l] == "zcash5k"){
				$am = $pq->find('td.bi div.fs')->text()." = 1ZEC";
			}elseif($tables[$l] == "eth3k" || $tables[$l] == "eth5k"){
				$am = $pq->find('td:nth-child(3)')->text();
				$am = explode("от", $am);
				$am = $am[0]." = 1ETH";
			}
			
			$k = $pq->find('td.bi div.fm div.fm1')->text();
			if ($k == "от 3 000"){
				$k = "3k";
			}else{
				$k = "5k";
			}
			$rez = $pq->find('td.ar.arp')->text();


			$t = count($exchangers[$tables[$l]]);
			for($i = 0; $i < $t; $i++){
				if($name == $exchangers[$tables[$l]][$i]){
					$get = mysqli_query($db, "SELECT * FROM ".$tables[$l]." WHERE name = '$name' ");
					$row = mysqli_fetch_array($get);
					$id = $row['id'];
					mysqli_query($db, "UPDATE ".$tables[$l]." SET name = '$name',course = '$am', k = '$k',reserv = '$rez' WHERE id= '$id'");
				}
			}

		}
       
	}
	
?>