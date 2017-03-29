<?php
    include("php/connDB.php");
    header("Content-type: text/html; charset=utf8");
    session_start();
    $sql = "SELECT * FROM `server_login` WHERE `account`='".$_SESSION['user']."'";
    $result = mysqli_query($conn, $sql);
    if(!isset($_SESSION['user']['account'])){
        header("Location: index.php");
    }
?>
<title>Tour_System server selecter</title>
<link rel="stylesheet" type="text/css" href="css/select.css">
<script src="js/sellect.js"></script>

</head>
<body>