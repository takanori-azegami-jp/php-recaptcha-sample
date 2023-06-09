<?php
// reCAPTCHA シークレットキー
$secretKey = "シークレットキー";

$result_status = '';  // 結果を表示する文字列を初期化
// トークンが送信されたら
if (isset($_POST['g-recaptcha-response'])) {

	//API Request URL（リクエストを送る API の URL）
	$url = 'https://www.google.com/recaptcha/api/siteverify';
	//パラメータを指定
	$data = array(
		'secret' => $secretKey, //シークレットキー
		'response' =>  $_POST['g-recaptcha-response']
	);
	//POST メソッドを使用
	$context = array(
		'http' => array(
			'method'  => 'POST',
			'header'  => implode("\r\n", array('Content-Type: application/x-www-form-urlencoded',)),
			'content' => http_build_query($data)
		)
	);
	//上記パラメータを指定して file_get_contents で API Response を取得
	$api_response = file_get_contents($url, false, stream_context_create($context));

	// JSON をデコード
	$result = json_decode($api_response);
	// トークンが有効な場合
	if ($result->success) {
		$result_status = '成功';
		echo "<script>console.log('Console: " . $result_status  . "' );</script>";
	} else { // トークンが無効な場合
		$result_status = '失敗： ';
		// error-codes は配列（以下は最初のエラーを取得）
		$result_status .= $result->{'error-codes'}[0];
		echo "<script>console.log('Console: " . $result_status . "' );</script>";
	}
}
?>
<HTML>

<head>
</head>

<body>
	<h3>PHPを使った検証</h3>
	<p><?php echo $result_status; ?></p>
</body>

</html>