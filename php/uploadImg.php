<?php
    /*
    code by C.H Chiang
    function: 處理上傳檔案至server

    $_FILES["file"]["name"]：上傳檔案的原始名稱。
    $_FILES["file"]["type"]：上傳的檔案類型。
    $_FILES["file"]["size"]：上傳的檔案原始大小。
    $_FILES["file"]["tmp_name"]：上傳檔案後的暫存資料夾位置。
    $_FILES["file"]["error"]：如果檔案上傳有錯誤，可以顯示錯誤代碼。
    */
    
    // echo "因為上天看到你幫助學長打捲，所以上天幫你搞定上傳系統了，不要太羨慕我，我是個傳說~~~"
    if($_FILES["file"]["error"] == UPLOAD_ERROR_OK)
    {
        $file=$_FILES["file"]["name"];
        $upload_file = "../base/img/" . $file;
        echo "file is $file<br />";
        echo "upload_file is $upload_file<br />";

        $tmpname = $_FILES["file"]["tmp_name"];
        echo "tmp_name is $tmpname<br />";

        move_uploaded_file($_FILES["file"]["tmp_name"],$upload_file);
        echo $_FILES["file"]["error"];
    }
    else echo $_FILES["file"]["error"];
?>
