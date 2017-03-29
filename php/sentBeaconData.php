<?php
  include("php/connDB.php");
  header("Content-type: text/html; charset=utf8");
  $state = $_POST['state'];
  switch($state){
    case 0:
      $sql = "SELECT `uuid` FROM `beacon` WHERE `uuid`='".$_POST['uuid']."'";
      $result = mysqli_query($conn, $sql);
      $row_result = mysqli_fetch_assoc($result);

      if(isset($row_result)){
        echo "已有此beacon";
        exit();
      }

      $sql = "INSERT INTO `beacon` (`uuid`, `locationX`, `locationY`) VALUES ('".$_POST['uuid']."',".$_POST['locationX'].",".$_POST['locationY'].")";
      $result = mysqli_query($conn, $sql);
      break;

    case 1:
      $sql = "UPDATE `beacon` SET `locationX`=".$_POST['locationX'].",`locationY`=".$_POST['locationY']." WHERE `uuid`='".$_POST['uuid']."'";
      $result = mysqli_query($conn, $sql);
      break;

    case 2:
      $sql = "DELETE FROM `beacon` WHERE `uuid`='".$_POST['uuid']."'";
      $result = mysqli_query($conn, $sql);
      break;
  }
  if(mysqli_affected_rows($conn)){
    echo "成功!";
  }
  else{
    echo "失敗!";
  }
  exit();
?>
