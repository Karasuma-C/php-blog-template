<?php
// テンプレート表示用のクラス
class template {
    // 指定されたテンプレートファイルを読み込んで表示
    function show($tpl_file) {
        $v = $this;
        include(__DIR__ . "/..{$tpl_file}");
    }
}
?>
