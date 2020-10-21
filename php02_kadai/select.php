<?php
//XSS対応（ echoする場所で使用！それ以外はNG ）
function h($str)
{
    return htmlspecialchars($str, ENT_QUOTES);
}

//1.  DB接続します
try {
  //ID MAMP ='root'
  //Password:MAMP='root',XAMPP=''
  $pdo = new PDO('mysql:dbname=gs_bm;charset=utf8;host=localhost','root','root');
} catch (PDOException $e) {
  exit('DBConnectError:'.$e->getMessage());
  // 接続できなかった時の文字列↑
}

//２．データ取得SQL作成
$stmt = $pdo->prepare("SELECT * FROM gs_bm_table");
$status = $stmt->execute();

//３．データ表示
$view="";
if ($status==false) {
    //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("ErrorQuery:".$error[2]);

}else{
  //Selectデータの数だけ自動でループしてくれる
  //FETCH_ASSOC=http://php.net/manual/ja/pdostatement.fetch.php
  while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){
    // どっとをつけないと、上書きされる。ドットをつけると、追加になる。
    $view .= '<div class="block">';
    $view .= '<div class="block_content">';
    $view .= '<div class="img_card">';
    $view .= $result['img'];
    $view .= '</div><ul class="info_list"><li class="label">タイトル:</li><li class="title">';
    $view .= $result['title'];
    $view .= '</li><li class="label">著者:</li><li class="author">';
    $view .= $result['author'];
    $view .= '</li><li class="label">コメント:</li><li class="other">';
    $view .= h($result['comment']);
    $view .= '</li><li class="date">';
    $view .= $result['date'];
    $view .= '</li><li class="page">';
    $view .= $result['url'];
    $view .= '</li><li><form method="post" action="select.php"><button class="getinfo" name="delete" value='.$result['id'].'>削除する</button></form></li></ul></div></div>';
  }
}
?>


<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Wish List</title>
<link href="css/reset.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<style>div{padding: 10px;font-size:16px;}</style>
</head>
<body id="main">
<h1>Wish List</h1>
<!-- Main[Start] -->
  <div class="result"><?= $view ?></div>
<!-- Main[End] -->
  <div><a href="index.php" class="link">Search books</a></div>

<script>
// 「Delete」を押したら、データが消えて更新
  $(".getinfo").on("click", function(){
    if(!confirm("削除してよろしいですか？")){
      return false;
    }else{
      //データ削除SQL作成
      <?php
      $delete_key= $_POST["delete"];
      $delete = $pdo->prepare("DELETE FROM gs_bm_table WHERE id=$delete_key");
      $status_d = $delete->execute();
      ?>
      location.reload();
    }    
   });

</script>
</body>
</html>
