# php-recaptcha-sample

Google reCAPTCHA の PHP フォームサンプル

## 環境構築

1. PHP 環境を構築する ※[Docker サンプル](https://github.com/takanori-azegami-jp/docker-rpi-apache-php)

2. [Google reCAPTCHA](https://www.google.com/recaptcha/about/)でサイトキーとシークレットキーを取得

3. `index.php`にサイトキー、`recaptcha_post.php`にシークレットキー埋め込む

4. `http://[IP アドレス]`で接続

## 参考

- [Google reCAPTCHA の使い方（v2/v3）](https://www.webdesignleaves.com/pr/plugins/google_recaptcha.php)
- [reCAPTCHA v3 を最低限の実装で簡単に導入する方法](https://brainlog.jp/programming/post-2567/)
