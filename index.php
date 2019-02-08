<?php
ini_set('display_errors', 'On');
error_reporting(E_ALL);

require_once 'vendor/autoload.php';
require_once 'helpers.php';
use App\Main;

// $dsn = 'mysql:host=localhost;dbname=cards;charset=utf8';
// $usr = 'root';
// $pwd = 'jkartem';
//
// $pdo = new \Slim\PDO\Database($dsn, $usr, $pwd);

// SELECT * FROM users WHERE id = ?
// $selectStatement = $pdo->select()
//                        ->from('cards')
//                        ->where('id', '>', 1);
//
// $stmt = $selectStatement->execute();
// $data =$stmt->fetchAll();
// foreach($data as $row){
//   echo '<br>';
//   print_r($row);
// }
// $html = file_get_contents('http://trademag.com.ua');

//xprint($html,'$html');
// phpQuery::newDocument($html);
// $title = pq('title')->html();
//
// xd($title);
// php_query::unloadDocuments();

// $post = [
//   'username'=>'jkalex',
//   'password'=>'jkalex1979',
//   'submit'=>'Войти'
//
// ];
$post = [
  'username'=>'info@domplitki.com.ua',
  'password'=>'jkalex1979',
  'singin'=>''
];
$coockiefile= 'tmp/coockiefile.txt';
//$url = "http://trademag.com.ua/login";
$url = "http://webshop2.agromat.ua/login/index";
$ch = curl_init($url);
curl_setopt($ch,CURLOPT_URL, $url);
curl_setopt($ch,CURLOPT_POST, true);
curl_setopt($ch,CURLOPT_POSTFIELDS, $post);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST,false);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
curl_setopt($ch, CURLOPT_COOKIEJAR, $coockiefile);
//curl_setopt($ch, CURLOPT_COOKIEFILE, $coockiefile);
curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:13.0) Gecko/20100101 Firefox/13.0.1");
curl_setopt($ch,CURLOPT_REFERER, $url);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION,true);

// curl_exec($ch);
//
// curl_setopt($ch,CURLOPT_URL, $url);
// curl_setopt($ch, CURLOPT_COOKIEJAR, $coockiefile);
// curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:13.0) Gecko/20100101 Firefox/13.0.1");
// curl_setopt($ch, CURLOPT_SSL_VERIFYHOST,false);
// curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,false);

curl_exec($ch);

curl_close($ch);



function request($url, $post=null, $coockiefile= 'tmp/coockiefile.txt')
{

  $ch = curl_init($url);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION,true);
  curl_setopt($ch,CURLOPT_URL, $url);




  //curl_setopt($ch, CURLOPT_HEADER,true);
  // curl_setopt($ch, CURLOPT_NOBODY,true);
  // curl_setopt($ch, CURLOPT_SSL_VERIFYHOST,false);
  // curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,false);
  // curl_setopt($ch, CURLOPT_COOKIESESSION, true);

  curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:13.0) Gecko/20100101 Firefox/13.0.1");
  curl_setopt($ch, CURLOPT_COOKIEJAR, $coockiefile);
  curl_setopt($ch, CURLOPT_COOKIEFILE, $coockiefile);
  //curl_setopt($ch, CURLOPT_COOKIE, "PHPSESSID=cd6e513ce939d6395f2d484a46f39a08bac26322");

  // curl_setopt($ch, CURLOPT_PROXY, '127.0.0.1');
  // curl_setopt($ch, CURLOPT_PROXYTYPE, CURLPROXY_HTTP);
  // curl_setopt($ch, CURLOPT_PROXYTYPE, CURLPROXY_SOCKS4);
  // curl_setopt($ch, CURLOPT_TIMEOUT,6);
  // curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 9);


  if($post){
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
  }

  $html = curl_exec($ch);
  curl_close($ch);
  return $html;
}
//file_put_contents('tmp/coockiefile.txt', '');
// $post = [
//   'username'=>'info@domplitki.com.ua',
//   'password'=>'jkalex1979',
//   'singin'=>''
// ];
//
// $url = "http://webshop2.agromat.ua/catalog";
// $html = request($url,$post);
//
// print_r($html); die;


$data = [
'url'=> "http://webshop2.agromat.ua/catalog?ajax_req=1&warehouse=61053&CODE=400726&table_length=10",
'is_edit'=>0,
'is_order'=>0

];
$url = "http://webshop2.agromat.ua/catalog";
$html = request($url,$data);
$datahtml = json_decode($html);
//echo $html;
print_r($datahtml);
// echo '<br>';
// phpQuery::newDocument($datahtml->search);
// $price = pq('td');
// foreach($price as $p)
// {
//   echo pq($p)->text() .'<br>';
// }


// xprint($html);


















//
