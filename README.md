# php-blog-template

このプロジェクトは、PHPとMySQLを使用したシンプルなブログシステムです。

記事の一覧表示、詳細表示が可能で、HTMLテンプレートを使って柔軟にレイアウトを設定できるようにしています。

# ファイル詳細

* config.php

  データベースの接続情報を定義するファイルです。DB_HOST, DB_USER, DB_PASS, DB_NAMEを設定してください。

* system.php

  カスタムタグ（|p、|h2など）をHTMLタグに変換するための関数 convertText() を定義しています。

* template.class.php

  テンプレート表示用のクラスです。HTMLテンプレートファイルを読み込み、変数を使用して内容を表示します。

* template/index.tpl.html

  テンプレートファイルです。$v->title と $v->content を利用してページタイトルとコンテンツを表示します。

* articles/index.php

  記事の詳細ページを表示するためのファイルです。id パラメータに基づいて記事を取得し、内容を convertText() 関数でHTMLに変換します。

# 注意事項

* config.php には、データベース接続情報を含めるため、外部に公開する際は注意してください。

* テーブル構造は事前にデータベースで設定が必要です。
