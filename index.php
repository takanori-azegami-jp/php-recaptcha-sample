<?php
// reCAPTCHA サイトキー
$sitekey = "サイトキー";
?>
<html lang="ja">

<head>

	<script src="https://www.google.com/recaptcha/enterprise.js?render=<?php echo $sitekey ?>"></script>
	<title>reCAPTCHAサンプル</title>
	<script>
		var verifyCallback = function(response) { //コールバック関数
			//#warning の p 要素のテキストを空で設定
			document.getElementById("warning").textContent = '';
			//#send の button 要素の disabled 属性を解除
			document.getElementById("send").disabled = false;
			console.log("recaptcha-有効化");
			console.log(response);
		};
		var expiredCallback = function() { //コールバック関数
			//#warning の p 要素のテキストに文字列を設定
			document.getElementById("warning").textContent = '送信するにはチェックを入れてください。';
			//#send の button 要素に disabled 属性を設定
			document.getElementById("send").disabled = true;
		};
	</script>
</head>

<body>
	<h1>g-recaptcha タグを使って表示</h1>
	<form method="post" action="recaptcha_post.php">
		<div class="g-recaptcha" data-sitekey=<?php echo $sitekey ?> data-callback="verifyCallback" data-expired-callback="expiredCallback"></div>
		<p id="warning">送信するにはチェックを入れてください。</p>
		<button id="send" type="submit" disabled>送信</button>
	</form>
	<script src="https://www.google.com/recaptcha/api.js" async defer></script>
	<script>
		function callback_recaptcha(token) {
			console.log("recaptcha_token");
			console.log(token);
		}
	</script>
</body>

</html>