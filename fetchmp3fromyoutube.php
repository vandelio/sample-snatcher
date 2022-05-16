<?php
//include('init.php');
//calling youtube-dl directly on the local path where its installed - should be in /usr/local/Cellar/youtube-dl/..

if(isset($_POST['url'])){ // && isset($_POST['nonce'])
    $url = $_POST['url'];
    ////do check on url, is it from youtube, does it contain ?v= , how long is it.
    $parts = explode('v=',$url);
        //got id
        $id = $parts[1];

//        $url = "https://www.youtube.com/watch?v=5-nAk27ibrw";
        //$cmd = '/usr/local/Cellar/youtube-dl/2018.02.26/bin/youtube-dl -x -o --audio-format mp3 "/Users/eak/Desktop/Desktop_shit/tmp/%(id)s.%(ext)s" ' . escapeshellarg($url);
        $cmd = "/usr/local/Cellar/youtube-dl/2018.02.26/bin/youtube-dl --extract-audio --audio-format m4a -o '/Users/eak/Desktop/Desktop_shit/WebStuff/yt-downloader/input/%(id)s.m4a' ". escapeshellarg($url);

        $descriptorspec = array(
           0 => array("pipe", "r"),  // stdin
           1 => array("pipe", "w"),  // stdout
           2 => array("pipe", "w"),  // stderr
        );

//        //Debug mode
//        $process = proc_open($cmd, $descriptorspec, $pipes);
//        echo "\nstdout: \n";
//        var_export(stream_get_contents($pipes[1]));
//        fclose($pipes[1]);
//        echo "\nstderr: \n";
//        var_export(stream_get_contents($pipes[2]));
//        fclose($pipes[2]);
//        $ret = proc_close($process);
//        echo "\nret: ";
//        var_export($ret);
//        echo "\n";

    
    //production mode
    $process = proc_open($cmd, $descriptorspec, $pipes);
    stream_get_contents($pipes[1]);
    fclose($pipes[1]);
    stream_get_contents($pipes[2]);
    fclose($pipes[2]);
    $ret = proc_close($process);

    if(file_exists('/Users/eak/Desktop/Desktop_shit/WebStuff/yt-downloader/input/'.$id.'.m4a')){
        //Check if success - does file exist
        //do convert
        exec('/usr/local/bin/ffmpeg -i /Users/eak/Desktop/Desktop_shit/WebStuff/yt-downloader/input/'.$id.'.m4a /Users/eak/Desktop/Desktop_shit/WebStuff/yt-downloader/input/'.$id.'.mp3 2>&1', $output);
         
        echo 'input/'.$id.'.mp3';

    }



}else{
    echo "What you trying to do.";
}

//$ffmpeg = trim(shell_exec('which ffmpeg'));
////$ffmpeg = trim(shell_exec('type -P usr/local/bin/ffmpeg'));
//if (empty($ffmpeg))
//{
//    die('ffmpeg not available');
//}
//
//shell_exec($ffmpeg . ' -i ...');




//    echo 'in';
//    require('youtube-dl.class.php');
//    echo 'loaded';
//    try
//    {
//        $url = $_POST['samplepath'];
//        $mytube = new yt_downloader($url);
//        $mytube->set_audio_format("wav");        # Change default audio output filetype.
//        $mytube->set_ffmpegLogs_active(FALSE);   # Disable Ffmpeg process logging.
//        $mytube->download_audio();
//    echo 'download';
//    }
//    catch (Exception $e) {
//            die($e->getMessage());
//    }
//  


