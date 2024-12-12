<!--ToDoリストのデータをデータベースに保存したり、
取得したり、更新したりする -->

<?php

require_once('config.php');
function connectPdo()
{
    try {
        return new PDO(DSN, DB_USER, DB_PASSWORD);
    } catch (PDOException $e) {
        echo $e->getMessage();
        exit();
    }
// $e は例外オブジェクトを格納する変数
// エラーが発生した場合にその場で処理を終了させる
// exit()でスクリプトを終了する）設計にしているため
// PDOクラス調べる
}
function createTodoData($todoText)
{
    $dbh = connectPdo();
    $sql = 'INSERT INTO todos (content) VALUES (:todoText)'; //追記
    $stmt = $dbh->prepare($sql); //追記
    $stmt->bindValue(':todoText', $todoText, PDO::PARAM_STR); //追記
    $stmt->execute(); //追記
}
//content カラムに $todoText の値を格納する

function getAllRecords()
{
    $dbh = connectPdo();
    $sql = 'SELECT * FROM todos WHERE deleted_at IS NULL';
    return $dbh->query($sql)->fetchAll();
}
function updateTodoData($post)
{
    $dbh = connectPdo();
    $sql = 'UPDATE todos SET content = :todoText WHERE id = :id';//追記
    $stmt= $dbh->prepare($sql);
    $stmt->bindValue(':todoText', $post['content'], PDO::PARAM_STR); //編集
    $stmt->bindValue(':id', (int) $post['id'], PDO::PARAM_INT); //編集
    $stmt->execute(); //編集
}

function getTodoTextById($id)
{
    $dbh = connectPdo();
    $sql = 'SELECT * FROM todos WHERE deleted_at IS NULL AND id = :id ';
    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(':id', (int) $id, PDO::PARAM_INT);
    $stmt->execute();
    $data= $stmt->fetch(PDO::FETCH_ASSOC);
    return $data ? $data['content'] : null;

}
function deleteTodoData($id)
{
    $dbh = connectPdo();
    $now = date('Y-m-d H:i:s');
    $sql = "UPDATE todos SET deleted_at=:now WHERE id = :id";
    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(':now', $now,PDO::PARAM_STR);
    $stmt->bindValue(':id',$id,PDO::PARAM_INT);
    $stmt->execute();

}
?>