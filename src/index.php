<?php
$upload_Timestamp = $upload_Timezone = $author_Ip = $author_Hostname = $author_Port = $author_Name =  $file_Timeperiod = "";

if( $_SERVER['REQUEST_METHOD'] == "POST"){

    $upload_Timestamp = $_COOKIE["timestamp"];
    echo $upload_Timestamp;
    echo "<br>";
    $upload_Timezone = date_default_timezone_get();
    echo $upload_Timezone;
    echo "<br>";
    $author_Ip = $_SERVER['REMOTE_ADDR'];
    echo $author_Ip;
    echo "<br>";
    $author_Hostname = gethostbyaddr($_SERVER["REMOTE_ADDR"]);
    echo $author_Hostname;
    echo "<br>";
    $author_Port = $_SERVER['REMOTE_PORT'];
    echo $author_Port;
    echo "<br>";
    $author_Name = $_POST["name"];
    echo $author_Name;
    echo "<br>";
    $file_Timeperiod = $_POST["timeperiod"];
    echo $file_Timeperiod;
    echo "<br>";

    $target_dir = "Uploads/";
    $foldername = $author_Name . "_" . $upload_Timestamp;
    $target_folder = $target_dir . $foldername;
    

    if (file_exists($target_folder)) {
    }
    else{
    chdir("Uploads");
    mkdir($foldername,0755,TRUE);
    }

    // $target_file = $target_dir . $foldername . "/" . basename($_FILES["upload_file"]["name"]);
    $uploadOk = 1;

    // if (file_exists($target_file)) {
    //     echo "Sorry, file already exists.";
    //     $uploadOk = 0;
    // }

    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
      // if everything is ok, try to upload file
    } 
    else {
            $files = array_filter($_FILES['upload_file']['name']);
            $total_count = count($_FILES['upload_file']['name']);
            for( $i=0 ; $i < $total_count ; $i++ ) {
                $tmpFilePath = $_FILES['upload_file']['tmp_name'][$i];
                if ($tmpFilePath != ""){
                    $newFilePath = $target_dir . $foldername . "/" . basename($_FILES["upload_file"]["name"][$i]);
                    if(move_uploaded_file($tmpFilePath, $newFilePath)) {

                    }
                }
            }
        }
    

}
?>