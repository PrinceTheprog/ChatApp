<?php 
  session_start();
  include_once "php/config.php";
  if(!isset($_SESSION['unique_id'])){
    header("location: login.php");
  }
?>
<?php include_once "header_default.php"; ?>
<body>
  <div class="wrapper">
    <section class="users">
      <header>
        <div class="content">
          <?php 
            $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$_SESSION['unique_id']}");
            if(mysqli_num_rows($sql) > 0){
              $row = mysqli_fetch_assoc($sql);
            }
          ?>
          <a href='info.php'><img src="php/images/<?php echo $row['img']; ?>" alt=""></a>
          <div class="details">
            <span><?php echo "<a href='info.php'>".$row['fname']. " " . $row['lname']."</a>"?></span>
            <p><?php echo $row['status']; ?></p>
          </div>
        </div>
        <a href="php/logout.php?logout_id=<?php echo $row['unique_id']; ?>" class="logout">Déconnecter</a>
      </header>
      <div class="search">
        <span class="text">Selectionner un utilisateur pour commencer à chatter</span>
        <input type="text" placeholder="Enter name to search...">
        <button><i class="fas fa-search"></i></button>
      </div>
      <div>
        <span class="text"><b>Les inscrits sur la plateformes :</b></span>
      </div>
      <br>
      <div class="users-list">
  
      </div>
    </section>
  </div>

  <script src="javascript/users.js"></script>

</body>
</html>
