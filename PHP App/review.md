# PHP App ① レビュー

## 全般

### 以下のaタグのリンクを押下した際にedit.phpの$_GETにどんな値が格納されるか説明してください。
$_GETには、123,焼肉が格納されている


```html
<a href="edit.php?todo_id=123&todo_content=焼肉">更新</a>
```

### 以下のフォームの送信ボタンを押下した際にstore.phpの$_POSTにどんな値が格納されるか説明してください。
$_POST['id']には123が格納
$_POST['content']には焼肉が格納

```html
<form action="store.php" method="post">
    <input type="text" name="id" value="123">
		<textarea　name="content">焼肉</textarea>
    <button type="submit">送信</button>
</form>
```

### `require_once()` は何のために記述しているか説明してください。
requireで別のファイルに保存されているPHPスクリプトを取り込みむことができる
また、同じファイルでも何度も取り込む
require_onceは既に取り込まれたファイルは2回目以降は取り込まない（1度だけ取り込む）

### `savePostedData($post)`は何をしているか説明してください。
savePostedData($post) は投稿されたデータをどこかに保存する機能を持つ

### `header('location: ./index.php')`は何をしているか説明してください。
./index.php ブラウザをリダイレクトしている。

### `getRefererPath()`は何をしているか説明してください。
どのページからリクエストが来たのかを判断
リクエスト元のURLを文字列で取得しそのパスを返す 
getRefererPath関数 を定義し、それを savePostedData関数 で呼び出しています。


### `connectPdo()` の返り値は何か、またこの記述は何をするための記述か説明してください。
connectPdo()` の返り値はPDOインスタンス
データベースへの接続 を行うための記述

### `try catch`とは何か説明してください。
try,catchでそのエラーをキャッチすれば、接続情報を表に出ることなく防げます。
例外処理という処理を実装する際に使用


### Pdoクラスをインスタンス化する際に`try catch`が必要な理由を説明してください。
データベース接続の失敗やSQLエラーなどの例外が発生する可能性があるため

## 新規作成

### `createTodoData($post)`は何をしているか説明してください。
ユーザーから送信された「Todo」の内容（$post['content']）を受け取り、
その内容をデータベースの todos テーブルに挿入する処理を行います

## 一覧

### `getTodoList()`の返り値について説明してください。
getAllRecords() の返り値であるtodosデータ
index.php 内で呼び出して、TODOデータの一覧表示を行う

### `<?= ?>`は何の省略形か説明してください。
echoの省略形
<?php echo $todo['id']; ?>


## 更新

### `getSelectedTodo($_GET['id'])`の返り値は何か、またなぜ`$_GET['id']` を引数に渡すのか説明してください。

### `updateTodoData($post)`は何をしているか説明してください。

## 削除

### `deleteTodoData($id)`は何をしているか説明してください。

### `deleted_at`を現在時刻で更新すると一覧画面からToDoが非表示になる理由を説明してください。

### 今回のように実際のデータを削除せずに非表示にすることで削除されたように扱うことを〇〇削除というか。

### 実際にデータを削除することを〇〇削除というか。

### 前問のそれぞれの削除のメリット・デメリットについて説明してください。
