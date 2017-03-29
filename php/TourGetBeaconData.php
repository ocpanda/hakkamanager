<?php
  include("connDB.php");
  $sql = "SELECT * FROM `beacon` WHERE 1";
  $resultArray = array('uuid' => array(),
                        'locationX' => array(),
                        'locationY' => array());
  $result = mysqli_query($conn, $sql);
  while($row = mysqli_fetch_array($result)){
    array_push($resultArray['uuid'], $row['uuid']);
    array_push($resultArray['locationX'], $row['locationX']);
    array_push($resultArray['locationY'], $row['locationY']);
  }

  echo json_encode($resultArray);
  exit();
