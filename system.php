<?php
// カスタムテキスト変換関数
function convertText($text) {
    // 開始タグの変換
    $text = preg_replace('/\|p/', '<p>', $text);
    $text = preg_replace('/\|h2/', '<h2>', $text);
    $text = preg_replace('/\|h3/', '<h3>', $text);
    $text = preg_replace('/\|h4/', '<h4>', $text);

    // 閉じタグの変換
    $text = preg_replace('/\|\/p/', '</p>', $text);
    $text = preg_replace('/\|\/h2/', '</h2>', $text);
    $text = preg_replace('/\|\/h3/', '</h3>', $text);
    $text = preg_replace('/\|\/h4/', '</h4>', $text);

    return $text; // 変換後のテキストを返す
}
?>
