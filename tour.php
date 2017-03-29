<?php include("view/layoutmaster/header.template.php"); ?>
  <?php include("view/layout/tour.header.php"); ?>
    <center>
        <?php
            /*
            假設我們的網址是 http://www.wibibi.com/test.php?tid=333

            則以上 $_SERVER 分別顯示結果會是

            echo $_SERVER['HTTP_HOST'];　   //顯示 www.wibibi.com
            echo $_SERVER['REQUEST_URI'];　 //顯示 /test.php?tid=333
            echo $_SERVER['PHP_SELF'];　    //顯示 /test.php
            echo $_SERVER['QUERY_STRING'];　//顯示 tid=333
            */
            $urlType = preg_split("/[\W]/", $_SERVER['QUERY_STRING']);
            if($urlType[1] === 'map'){
                include_once("tour_map.php");
            }
            else{
                include_once("tour_exhibit.php");
            }
        ?>
    </center>
  <?php include("view/layout/tour.footer.php"); ?>
<?php include("view/layoutmaster/footer.template.php"); ?>