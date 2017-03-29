<?php include("view/layoutmaster/header.template.php"); ?>
<?php include("view/layout/beacon.header.php"); ?>
  <?php
    $sql = "SELECT * FROM `beacon` WHERE 1";
    $resultArray = array('uuid' => array(),
							 'locationX' => array(),
               'locationY' => array());
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_array($result)) {
			array_push($resultArray['uuid'], $row['uuid']);
			array_push($resultArray['locationX'], $row['locationX']);
      array_push($resultArray['locationY'], $row['locationY']);
		}
    //$dataNum = mysqli_num_rows($result);
  ?>
  <ul class="nav nav-tabs">
    <li role="presentation"><a href="sellect.php">選擇頁面</a></li>
    <li role="presentation" class="active"><a href="#">地圖資料</a></li>
  </ul>
  <div id="showData" class="panel panel-default">
    <div class="panel-heading">場館beacon資料</div>
    <table class="table">
      <thead>
        <tr>
            <th>#</th>
            <th>UUID</th>                   
            <th>座標X</th>              
            <th>座標Y</th>                    
            <th>編輯</th>
        </tr>                                        
      </thead>                                                    
      <tbody id="bdata"></tbody>
    </table>
  </div>
  <div>
    <center>
      <div class="input-group" id="input1">
        <span class="input-group-addon">輸入</span>
        <input name="UUID" type="text" class="form-control" placeholder="UUID"></div>
      <div class="input-group" id="input2">
        <span class="input-group-addon">輸入</span>
        <input name="locationX" type="text" class="form-control" placeholder="座標X"></div>
      <div class="input-group" id="input3">
        <span class="input-group-addon">輸入</span>
        <input name="locationY" type="text" class="form-control" placeholder="座標Y"></div>
      <button class="btn btn-default" id="submitdata">加入資料</button>
      設定格線間隔<input type="number" name="yy" value="10">
    </center>

    <canvas id="myCanvas" width="800" height="600">
      如果你看不到Canvas會看到我。
    </canvas>
  </div>
  <script type="text/javascript">
    $(document).ready(function(){
      drawBeaconData();
    });

    $("#submitdata").on("click", function(){
      let uuid = $("input[name='UUID']").val();
      let locationX = $("input[name='locationX']").val();
      let locationY = $("input[name='locationY']").val();
      addDataToDataBase(uuid, locationX, locationY);
    });

    function addDataToDataBase(uuid, locationX, locationY){
      let data = {state: 0,uuid: uuid, locationX: locationX, locationY: locationY};
      console.log(data);
      $.ajax({
        url: "php/sentBeaconData.php",
        type: "POST",
        data: data,
        dataType: "text",
        success: function(result){
          if(result === "成功!"){
            drawBeaconData();
            //alert("建立成功!");
            location.reload();
          }
          else if(result === "已有此beacon")
            alert("已有此beacon!");
          else
            alert("發生錯誤!");
        }
      });
    }

    var dataNum = 0;
    var beaconData = [];
    function drawBeaconData(){
      dataNum = "<?php echo mysqli_num_rows($result); ?>";
      beaconData[0] = <?php echo json_encode($resultArray['uuid']); ?>;
      beaconData[1] = <?php echo json_encode($resultArray['locationX']); ?>;
      beaconData[2] = <?php echo json_encode($resultArray['locationY']); ?>;
      $("#bdata").empty();
      for(let i=0; i<dataNum; i++){
        $("#bdata").append("<tr id=data"+(i)+"><th>"+(i+1)+"</th><th>"+beaconData[0][i]+"</th><th><input type='number' name='dlocationX"+i+"' value="+beaconData[1][i]+"></input></th><th><input type='number' name='dlocationY"+i+"' value="+beaconData[2][i]+"></input></th><th><button type='button' class='btn btn-default' id=beaconfix"+(i+1)+">修改</button><button type='button' class='btn btn-default' id=beacondel"+(i+1)+">刪除</button></th></tr>");
        //drawDot(parseInt(beaconData[1][i]), parseInt(beaconData[2][i]));
        $("#beaconfix"+(i+1)).on("click",function(){
          let data = {state: 1, uuid: beaconData[0][i], locationX: parseInt($("input[name='dlocationX"+i+"']").val()), locationX: parseInt($("input[name='dlocationY"+i+"']").val())};
          console.log(data);
          $.ajax({
            url: "php/sentBeaconData.php",
            type: "POST",
            data: data
          });
          location.reload();
        });
        $("#beacondel"+(i+1)).on("click",function(){
          let data = {state: 2, uuid: beaconData[0][i]};
          console.log(data);
          $.ajax({
            url: "php/sentBeaconData.php",
            type: "POST",
            data: data,
            success: function(){
              $("#data"+i).remove();
              location.reload();
            }
          });
        });
      }
      drawDot();
      mapInitialize();
    }

    $("input[name='yy']").change(function(){
      ctx.clearRect(0, 0, canvas.width, canvas.height);
      drawDot();
      mapInitialize();
    });

    var canvas = document.getElementById('myCanvas');
    var ctx = canvas.getContext('2d');
    ctx.globalCompositeOperation = "destination-over";
    var y = 10;
    var SCREEN_WIDTH = canvas.width;	// 畫面寬度
    var SCREEN_HEIGHT = canvas.height;	// 畫面高度
    function mapInitialize(){
      for(i = 1 ; i <= SCREEN_WIDTH/y-1 ; i++)
      {
        ctx.beginPath();
        ctx.moveTo(y*i, SCREEN_HEIGHT);
        ctx.lineTo(y*i, 0);
        ctx.stroke();
      }

      for(i = 1; i <= SCREEN_HEIGHT/y-1; i++){
        ctx.beginPath();
        ctx.moveTo(SCREEN_WIDTH, y*i);
        ctx.lineTo(0, y*i);
        ctx.stroke();
      }
    }

    function drawDot(){
      y = $("input[name='yy']").val();
      for(let i=0; i<dataNum; i++){
        ctx.fillStyle = 'red';
  			ctx.beginPath();
  			ctx.arc(parseInt(beaconData[1][i])*y, parseInt(beaconData[2][i])*y, (y/2), 0, 2 * Math.PI);
  			ctx.fill();
      }
    }
  </script>
  <?php include("view/layout/beacon.footer.php"); ?>
<?php include("view/layout/footer.template.php"); ?>