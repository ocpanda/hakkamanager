  <?php
    session_start();
    include("php/connDB.php");
    header("Content-type: text/html; charset=utf-8");
    session_start();
    $sql = "SELECT * FROM `server_login` WHERE `account`='".$_SESSION['user']."'";
    $result = mysqli_query($conn, $sql);
    if(!isset($_SESSION['user']['account'])){
      header("Location: index.php");
    }
  ?>
  <title>Tour_System_server tour data</title>
</head>
<body>
