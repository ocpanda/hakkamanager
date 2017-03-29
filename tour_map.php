<style>
    .mapData{
        height: 30px;
        overflow: hidden;
    }
</style>
<ul class="nav nav-tabs">
    <li role="presentation"><a href="sellect.php">選擇頁面</a></li>
    <li role="presentation" class="active"><a href="?page=map">地圖資料</a></li>
    <li role="presentation"><a href="?page=exhibition">展物資料</a></li>
</ul>
<form action="php/uploadImg.php" method="post" enctype="multipart/form-data">
    <div class="input-group">
        <span class="input-group-addon"><input type="submit"  name="submit" value="上傳地圖"></span>
        <input type="file" name="file" class="form-control" aria-describedby="file">
    </div>
</form>
<div class="panel panel-default">
    <div class="panel-heading">地圖資訊</div>
    <table class="mapTab"></table>
</div>
<script src="js/showmap.js" type="text/javascript"></script>
