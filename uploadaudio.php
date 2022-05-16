<?php
if(isset($_FILES['file']) && $_FILES['file']['error'] === 0 && $_FILES['file']['size'] < 10000000) // 10 mb
{      
$path = "input/"; //file to place within the server
$valid_formats1 = array("mp3", "ogg", "flac"); 
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST")
    {

        $file1 = $_FILES['file']['name']; //input file name in this code is file1
        $size = $_FILES['file']['size'];


                $fileInfo=pathinfo($file1);
                $ext=$fileInfo['extension'];

                    if(in_array($ext,$valid_formats1))
                    {
                        $originalFileName = str_replace('.mp3','',str_replace(array("'","-","´","`","?","!","#",'/'), '_', $file1));
                        $actual_image_name = $originalFileName.'_'.uniqid(4).".".$ext;
                        $tmp = $_FILES['file']['tmp_name'];
                        if(move_uploaded_file($tmp, $path.$actual_image_name))
                        {
                            $pathtonewaudio = $path.$actual_image_name;
                        //success upload
                            header('Location:interface.php?samplepath='.$pathtonewaudio);
                        }
                        else{
                            header('Location:interface.php?error=upload');
                        }
                                     
                    }else{
                            header('Location:interface.php?error=filenotsupported');
                    }

    }
}else{
    header('Location:interface.php?error=nothingtoupload');
}