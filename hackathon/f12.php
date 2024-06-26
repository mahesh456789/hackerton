<?php
$conn = mysqli_connect("localhost", "root", "", "data2");

if(isset($_POST["submit"])){
  $name = $_POST["name"];
  $comment = $_POST["comment"];
  $reply_id = $_POST["reply_id"];

  $query = "INSERT INTO tb_data2 VALUES('', '$name', '$comment', '$reply_id')";
  mysqli_query($conn, $query);
}
?>
<html>
  <head></head>
  <style>
    *{
      margin: 0px;
      padding: 0px;
    }
    body{
      background: antiquewhite;
    }
    .container{
      background: white;
      width: 700px;
      margin: 0 auto;
      padding-top: 1px;
      padding-bottom: 5px;
    }
    .comment, .reply{
      margin-top: 5px;
      padding: 10px;
      border-bottom: 1px solid black;
    }
    .reply{
      border: 1px solid #ccc;
    }
    p{
      margin-top: 5px;
      margin-bottom: 5px;
    }
    form{
      margin: 10px;
    }
    form h3{
      margin-bottom: 5px;
    }
    form input, form textarea{
      width: 100%;
      padding: 5px;
      margin-bottom: 10px;
    }
    form button.submit, button{
      background: #4CAF50;
      color: white;
      border: none;
      cursor: pointer;
      padding: 10px 10px;
      height: 5%;
      width: 10%;
    }
    button.reply{
      background:orange;
    }
  </style>
  <body>
    <div class="container">
      <?php
      $datas = mysqli_query($conn, "SELECT * FROM tb_data2 WHERE reply_id = 0"); // only select comment and not select reply
      foreach($datas as $data) {
        require '22.php';
      }
      ?>
      <form action = "" method = "post">
        <h3 id = "title">Leave a Comment</h3>
        <input type="hidden" name="reply_id" id="reply_id">
        <input type="text" name="name" placeholder="Your name">
        <textarea name="comment" placeholder="Your comment"></textarea>
        <button class = "submit" type="submit" name="submit">Submit</button>
      </form>
    </div>

    <script>
      function reply(id, name){
        title = document.getElementById('title');
        title.innerHTML = "Reply to " + name;
        document.getElementById('reply_id').value = id;
      }
    </script>
  </body>
</html>
