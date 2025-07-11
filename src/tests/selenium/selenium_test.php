<?php

require_once __DIR__ . '/../../vendor/autoload.php';

use Facebook\WebDriver\Remote\RemoteWebDriver;
use Facebook\WebDriver\Remote\DesiredCapabilities;
use Facebook\WebDriver\WebDriverBy;

try {
    // SeleniumサーバーのURL（docker-composeのサービス名を使う）
    $host = 'http://selenium:4444/wd/hub';

    // Chromeを指定
    $capabilities = DesiredCapabilities::chrome();

    // Seleniumサーバーに接続
    $driver = RemoteWebDriver::create($host, $capabilities);

    // テスト対象のURLにアクセス
    // $driver->get('http://app:80');
    $driver->get('http://app:80/articles');

    // ページタイトルの確認
    $title = $driver->getTitle();
    echo "ページタイトル: " . $title . "\n";

    // 要素の検索と操作の例
    try {
        // 例：h1タグを探す
        $h1Element = $driver->findElement(WebDriverBy::tagName('h1'));
        echo "H1要素のテキスト: " . $h1Element->getText() . "\n";
    } catch (Exception $e) {
        echo "H1要素が見つかりませんでした: " . $e->getMessage() . "\n";
    }

    // スクリーンショットの取得
    $driver->takeScreenshot('/var/www/laravel/storage/logs/screenshot.png');
    echo "スクリーンショットを保存しました\n";

    // ブラウザを閉じる
    $driver->quit();
    echo "テスト完了\n";

} catch (Exception $e) {
    echo "エラーが発生しました: " . $e->getMessage() . "\n";
}
