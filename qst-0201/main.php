<?php
//コマンドライン引数のチェック
if( $argc < 2 ){
    echo "コマンドライン引数を指定してください\n";
    exit(0);
}

//データベースの接続検証
$dbfile = './app.db';
try{
    $db = new PDO('sqlite:' . $dbfile);
    }
catch (PDOException $e){
    echo'DB接続エラー:実行前にphp-cli php-sqlite3はインストールしましたか'. $e->getMessage();
    }

//ユーザーの一覧確認用の処理
try{
    if( strcmp($argv[1], "list-users") == 0 ){
        $records = $db -> query('SELECT * FROM users');
        while($record = $records->fetch()){
            echo $record['name']. " ". $record['age']. " ". str_repeat("*",strlen($record['password'])) . "\n";
        }
    }
    }
catch (PDOException $e){
    echo'ユーザーの一覧表示に失敗しました。'. $e->getMessage();
}

//ユーザーの追加用処理
try{
    if( $argc==5 && strcmp($argv[1], "add-user") == 0 ){
    $passwordsha1 = sha1($argv[4]);
    $db->exec("INSERT INTO users(name,age,password) values('$argv[2]', '$argv[3]', '$passwordsha1')");
    echo'ユーザーの追加に成功しました。'."\n";
    }
}
catch (PDOException $e){
    echo'ユーザーの追加に失敗しました。'. $e->getMessage()."\n";
}

//ユーザーの削除用処理
try{
    if( $argc==3 && strcmp($argv[1], "delete-user") == 0 ){
    $request_id = $argv[2];
    $tmp = $db->prepare("DELETE FROM users WHERE id=?");
    $tmp->execute(array($request_id));
    echo'ユーザーの削除に成功しました。'."\n";
    }
}
catch (PDOException $e){
    echo'ユーザーの削除に失敗しました。'. $e->getMessage()."\n";
}

?>
