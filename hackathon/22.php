<div class="comment">
  <h4><?php echo $data['name']; ?></h4>
  
  <p><?php echo $data['comment']; ?></p>
  <?php $reply_id = $data['id']; ?>
  <button class="reply" onclick = "reply(<?php echo $reply_id; ?>, '<?php echo $data['name']; ?>');">Reply</button>
  <?php
  unset($datas);
  $datas = mysqli_query($conn, "SELECT * FROM tb_data2 WHERE reply_id = $reply_id");
  if(mysqli_num_rows($datas) > 0) {
    foreach($datas as $data){
      require '32.php';
    }
  }
  ?>
</div>