<?php 
require_once('env.php');
class Dbc {

    protected $table_name;

// データベースに接続する
// 引数：なし
// 戻り値：接続結果を返す
protected function dbConnect(){
    $host   = DB_HOST;
    $dbname = DB_NAME;
    $user   = DB_USER;
    $pass   = DB_PASS;
    $dsn    = "mysql:host=$host;dbname=$dbname;chareset=utf8";
    
    try {
        //PDOを使ってphpとmysqlを繋ぐ↓
        $dbh = new PDO($dsn, $user, $pass,[
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        ]);
    } catch(PDOException $e) {
        echo '接続失敗'. $e->getMessage();
        exit();
    };
    return $dbh;
}

// データを取得する
public function getAll() {
    $dbh = $this->dbConnect();
    //Sql文の準備
    //blogのデータを全部選択
    $sql = "SELECT * FROM $this->table_name";
    $stmt = $dbh->query($sql);
    //
    $result = $stmt->fetchall(PDO::FETCH_ASSOC);
    return $result;
}

public function getById($id) {
    if(empty($id)) {
        exit('IDが不正です。');
    }
    
    $dbh = $this->dbConnect();
    
    //SQLの準備
    $stmt = $dbh->prepare("SELECT * FROM $this->table_name Where id = :id");
    $stmt->bindValue(':id', (int)$id, PDO::PARAM_INT);
    
    //SQLの実行
    $stmt->execute();
    
    //結果を取得
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if(!$result) {
        exit('ブログがありません。');
    }
    return $result;
}

public function delete($id) {
    if(empty($id)) {
        exit('IDが不正です。');
    }
    
    $dbh = $this->dbConnect();
    
    //SQLの準備
    $stmt = $dbh->prepare("DELETE FROM $this->table_name Where id = :id");
    $stmt->bindValue(':id', (int)$id, PDO::PARAM_INT);
    
    //SQLの実行
    $stmt->execute();
    echo 'ブログを削除しました。';
    return $result;
}

}
?>


<!-- 
ハローワールドを読み込んでます。

 -->
