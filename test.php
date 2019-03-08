<?php

$enitemname = $_POST["name"];
$jpitemname = "";
//読み取った商品名に対して日本語に変換
switch($enitemname){
    case "TULLY's TULLY's COFFEE": $jpitemname="伊藤園　タリーズコーヒー　バリスタズブラック ";
    break;
    case "suntory water": $jpitemname="サントリーフーズ サントリー天然水　５５０ｍｌ";
    break;
    case "itoen o-i ocha": $jpitemname="【HOT用】お～いお茶 緑茶 345mlペットボトル";
    break;
    case "asahi FRUIT SPARKLING": $jpitemname="三ツ矢 微糖スパークリング グレープフルーツ＆ベリー";
    break;
    //商品が存在しないエラー処理
    default:
    printf("指定した商品が登録されていません!");
    exit(1);
    break;
}

//楽天APIへのhttpリクエスト
$rakutencurl = curl_init("https://app.rakuten.co.jp/services/api/IchibaItem/Search/20170706?applicationId=1019748553383705799&keyword=". $jpitemname);
curl_setopt($rakutencurl, CURLOPT_CUSTOMREQUEST, 'GET'); // メソッド指定
curl_setopt($rakutencurl, CURLOPT_SSL_VERIFYPEER, false); // 証明書の検証を行わない
curl_setopt($rakutencurl, CURLOPT_RETURNTRANSFER, true); // レスポンスを文字列で受け取る
$rakutendata = curl_exec($rakutencurl);
curl_close($rakutencurl);

echo $rakutendata;
?>
