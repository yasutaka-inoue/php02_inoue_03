<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>Book search and Wish list</title>
  <link href="css/reset.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
  <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>

<!-- Main[Start] -->

<div class="search_area">
<label><input type="text" name="key" id="key" placeholder="search" class="key"></label><span id="search" class="search">検索</span>
</div>

<div id="result" class="result"></div>


<form method="post" action="insert.php">
  <div class="wanted" id="wanted">
   <fieldset>
     <label>タイトル：<br><input type="text" name="title" id="form_title"></label><br>
     <label>著者：<br><input type="text" name="author" id="form_author"></label><br>
     <label class="hide">書籍URL：<input type="text" name="url" id="form_page"></label>
     <label class="hide">画像URL：<input type="text" name="img" id="form_img"></label>
     <label>コメント：<br><textArea name="comment" rows="4" cols="40" id="comment" placeholder="Write your comment"></textArea></label><br>
     <input type="submit" value="リストに追加" class="button" id="add">
    </fieldset>
  </div>
</form>

<div><a href="select.php" class="link">ほしい本リスト</a></div>
<!-- Main[End] -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
// // ボタンクリックイベント
$("#search").on("click", function(){
  const key = $("#key").val();
  //Ajax（非同期通信）
  axios.get("https://www.googleapis.com/books/v1/volumes?q=" + key).then(function (response) {
  //データ受信成功！！showData関数にデータを渡す
  showData(response.data);
  }).catch(function (error) {
  console.log(error);//通信Error
  alert("検索条件にマッチする本がありません");
  });
  });

// keydownによるイベント(enter)
$("#key").on("keydown", function(e){
    // console.log(e);
    if(e.keyCode == 13){
      $("#result").empty();
      const key = $("#key").val();
      //Ajax（非同期通信）
      axios.get("https://www.googleapis.com/books/v1/volumes?q=" + key).then(function (response) {
      //データ受信成功！！showData関数にデータを渡す
      showData(response.data);
      }).catch(function (error) {
      console.log(error);//通信Error
      alert("検索条件にマッチする本がありません");
      });
    }
});

// googlebooksapiで受け取ったデータの処理を書く
function showData(data){
  console.log(data.items);
  const len  = data.items.length; //データ数を取得
  console.log(len);
  for( let i=0; i<len; i++){
    // // データをとって、表示させる
    $("#result").append('<div class="block"><div class="block_content"><div id="img'+ i +'" class="img_card"><img src='+ data.items[i].volumeInfo.imageLinks.thumbnail +'/></div><ul class="info_list"><li class="label">タイトル:</li><li class="title" id="title'+ i +'">'+ data.items[i].volumeInfo.title + '</li><li class="label">著者:</li><li class="author" id="author'+ i +'">'+ data.items[i].volumeInfo.authors + '</li><li class="page" id="page'+ i +'"><a class="detail" href="'+ data.items[i].volumeInfo.previewLink + '">詳しく見る (Google books)</a></li><li><button class="getinfo" onclick="'+ i +'">ほしい本リストに追加する</button></li></ul></div></div>');
  };
  // 「この本が欲しい」を押したら、テーブルが閉じて、フォームに情報が入る
  $(".getinfo").on("click", function(){
    // 番号を取得
    const n =$(this).attr("onclick");
    console.log(n);
    // その列のその他の値を取得
    const img = $('#img' +n).html();
    const title = $('#title'+n).html();
    const author = $('#author'+n).html();
    const page = $('#page'+n).html();
    $("#form_title").val(title);
    $("#form_author").val(author);
    $("#form_page").val(page);
    $("#form_img").val(img);
    $("#result").empty();
    $("#wanted").css("display", "block");
  });
}
// validation
$("#add").on("click", function(){
  const comment= $("#comment").val();
  if (comment=="") {
    $("#comment").val("None");
    }
});

</script>

</body>
</html>
