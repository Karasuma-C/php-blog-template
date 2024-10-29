<?php
require 'config.php';

// データベース接続
$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$c = ''; // コンテンツの初期化

// データベースから記事のIDとタイトルを取得
$sql = "SELECT id, title FROM articles";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // 記事が見つかった場合、リンク付きでタイトルを表示
    while ($row = $result->fetch_assoc()) {
        $c .= '<a href="/articles/?q=' . $row['id'] . '">' . htmlspecialchars($row['title']) . '</a><br>';
    }
} else {
    $c = '記事が見つかりませんでした。';
}

$conn->close(); // データベース接続を閉じる
?>

<?php
// テンプレートをロードして、コンテンツを表示
include(__DIR__ . "/class/template.class.php");
$tpl = new template();
$tpl->title = 'Your Blog';
$tpl->content = $c;
$tpl->show('/template/index.tpl.html');
?>
