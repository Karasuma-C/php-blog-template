<?php
include '../system.php';
?>

<?php
require '../config.php';

// データベース接続
$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$id = $_GET['q']; // URLクエリパラメータからidを取得
// idをもとにデータを取得
$sql = "SELECT title, content FROM articles WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

$c = ''; // コンテンツの初期化
if ($result->num_rows > 0) {
    $article_data = $result->fetch_assoc();
    $title = htmlspecialchars($article_data["title"]);
    $c .= convertText($article_data["content"]); // 記事内容を変換して格納
} else {
    $c .= '<p>記事が見つかりませんでした。</p>';
    $title = '404 not found';
}

$conn->close(); // データベース接続を閉じる
?>

<?php
// テンプレートをロードして記事内容を表示
include("../class/template.class.php");
$tpl = new template();
$tpl->title = $title;
$tpl->content = $c;
$tpl->show('/template/index.tpl.html');
?>
