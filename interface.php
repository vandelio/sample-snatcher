<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>
<!DOCTYPE html>
<html class="js">
<head>
    <title></title>
    <!--<link href="https://fonts.googleapis.com/css?family=Montserrat:100,300,500,700|Fira+Mono|Economica" rel="stylesheet">-->
    <link href="/css/localfonts.css" rel="stylesheet">
    <link href="/css/style.css" rel="stylesheet">

</head>
<body <?php if(!isset($_GET['samplepath'])){ echo 'class="upload"';}?>>
    <div id="logo">
        <img id="loader" class="svg" src="assets/spinner.svg"/>
        <img id="logoimg" src="assets/logo-dirty-sample-snatcher.svg" class="svg center img-responsive">
    </div>

    <aside id="sidebar" class="on">
        <nav id="sidebarnav" class="hide">
            <ul>
                <li id="sampleinfo_button" class="nav_btn active">Sampler</li>
                <li id="archive_button" class="nav_btn">Collection</li>
            </ul>
        </nav>
        <div class="sidebar_content_wrap">
            <!--<img src="" id="mirror" width="60">-->
            <div id="sampleinfo" class="sidebar_content sidebar_sampleinfo hide">

                <div data-element="sidebar_sample_info" class="buttonToggler area_definer">
                    WAVE INFORMATION
                </div>
                <div id="songinformation_wrap_mask">
                    <div id="songinformation_wrap" class="sidebarColumn">

                        <div id="wave_alias_change">
                            <p>Change wave ALIAS</p>
                            <img id="editIcon" class="svg" src="assets/edit.svg">
                        </div>
                        <div id="songinformation"></div>
                    </div>
                </div>



                <div class="clearfix"></div>
                <br>
                <br>
                <br>


                <!-- Helper info area -->
<!--
                <div id="wave_identifyer2"></div>-->

            </div>
            <div id="archive" class="sidebar_content sidebar_archive"  rel="archive area">
                <div data-element="sidebar_samples" class="buttonToggler area_definer">
                    YOUR SAMPLES
                </div>
                <div id="sample_collection_wrap_mask">
                    <div id="sample_collection_wrap" class="sidebarColumn">
                        <div id="sample_collection"></div>
                    </div>
                </div>
            </div>
        </div>




        <div class="clearfix"></div>
        <div id="controls" class="hide">
            <div id="coreControls">
                <div class="singleBtn" id="play_pause" ></div>
                <div class="on singleBtn" id="toggleLoop" ></div>
                <div class="singleBtn" id="cutSample" ></div>
            </div>
            <div id="secondaryControls">
                <a class="secondaryControl" id="uploadNewWave" href="/interface.php" >
                    Import new
<!--                <img src="assets/new_wave.svg" width="60px" class="svg center-block"></div>-->
                </a>
                <div class="secondaryControl hide" id="remove_region" >
                    Remove selection
                    <!--<img src="assets/remove_selection.svg" width="60px" class="svg center-block">-->
                </div>


            <br>
            <div id="snatcher_controls"></div>

        <div class="clearfix"></div>

        </div>

    </aside>

    <div id="scene" class="wrapper">




        <?php if(isset($_GET['samplepath']) && file_exists($_GET['samplepath'])){ ?>
        <section id="wave" class="showMe" rel="Original wave area">
            <div class="controls_in_scene">
                <div id="goFullScreen" >Fullscreen</div>
                <div id="innerControls"></div>
                <div class="zoombtn">
                    <div class="slidecontainer">
                        <input id="slider" class="hide" type="range" min="1" max="200" value="1" style="width: 100%;" />
                    </div>
                </div>
            </div>


            <div id="waveform"></div>

            <div id="timerPanel" >
                <div id="leftPanel" class="leftPanel on">
                    <p>START SELECTION</p>
                    <div id="startmark" class="number"></div>
                    <p>END SELECTION</p>
                    <div id="endmark" class="number"></div>
                </div>
                <div class="rightPanel">
                    <p>CURRENT POINTER</p>
                        <div id="currentPointer" class="number"></div>
                    <p>TOTAL DURATION</p>
                    <div id="duration" class="number"></div>
                </div>
            </div>


        </section>
        <?php
        }
    ?>

    <section id="upload" class="showMe" rel="upload area">

        <div class="inner">
            <h2>dirty snatcher</h2>
            <p>
                Grab any song from youtube and cut out a sample.
                "I'll gently remind you that songs can be copyrighted"
            </p>
        <br>
        <br>
            <br>
        <!--<form method="GET" action="#">-->
        <form id="audioform" method="POST" enctype="multipart/form-data" action="/uploadaudio.php">
            <!-- hide this hide in production -->

            <input type="text" name="samplepath" id="samplepath" value="" placeholder="Type an URL for a youtube song">
            <br>
            <br>
            <br>
            <div class="small_line"></div>
            <div class="small_line_p">OR</div>
           <div class="small_line"></div>


           <br>
           <br>
           <div class="box">
                <input type="file" name="file" id="file" class="inputfile inputfile-2">
                <label for="file"><figure><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"></path></svg></figure> <div class="text">Import audio</div></label>
            </div>

            <div class="clearfix"></div>
            <br>
            <br>
            <br>
            <br>
            <input id="wave_from_form" type="submit" value="IMPORT AUDIO">

            <!--<input type="submit" name="submit" id="wave_from_form" value="Import audio">-->
        </form>
        </div>
    </section>

    <section id="userMemoryOptions" class="hide" rel="Wave session in memory">
        <div class="inner">
            <h2>dirty snatcher</h2>
            <h3>You have been here before! Awesome to see you again!</h3>
            <br>
            <p>
                We found a previous wave session in your browser memory. <br>Do you want to continue with that or start over ?
            </p>
            <div class="options">
                <div id="previousSession" class="inlinebtn">Continue ➤</div>
                <br><br>
                <div id="newSession" class="inlinebtn">Go fresh</div>
            </div>



        </div>
    </section>


    <section id="looper">
        <div class="looper_inner_wrap">
<!--            <div id="tracks" class="tracks" data-quantization="16" data-rows="2">
                <div class="track"></div>
                <div class="track"></div>
            </div>-->
            <div id="tracks" class="tracks"></div>

            <div id="newTrack_dropzone" >Add it to the loopstation<br>DROP IT HERE DJ.</div>
            <div class="clearfix"></div>
            <br>
        </div>


        <div id="looperPanel" >
            <div class="innerPanel on">
                <div class="looper_controls" >
                    <div class="looperbtnwrap">BPM <span id="currentBpm">(90)</span> <input type="range" min="20" max="180" value="90" class="looperbtn" id="setBpm"></div>
                    <div class="looperbtnwrap">Quantization <input type="range"  class="looperbtn" id="setQuantization"></div>
                </div>
            </div>
        </div>
    </section>




    </div>
</body>
</html>






<!--
Original waveform - copied to local
<script src="//cdnjs.cloudflare.com/ajax/libs/wavesurfer.js/1.4.0/wavesurfer.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/wavesurfer.js/1.2.3/plugin/wavesurfer.regions.min.js"></script>
-->
<script src="js/local_wavesurfer.min.js"></script>
<script src="js/local_wavesurfer_regions.min.js"></script>
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>-->
<script src="js/moment.min.js"></script>
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/moment-duration-format/1.3.0/moment-duration-format.min.js"></script>-->
<script src="js/moment-duration-format.min.js"></script>
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/wavesurfer.js/1.4.0/plugin/wavesurfer.minimap.min.js"></script>-->
<script src="js/wavesurfer.minimap.min.js"></script>

 <?php
    if(isset($_GET['samplepath'])){
        $audio = filter_var($_GET['samplepath'],FILTER_SANITIZE_URL);
        if(!file_exists($audio)){
            $audio = '';
            ?>
            <script>
                console.log(<?php echo $audio;?>)
                setTimeout(function(){
                    alert('Wave not found');
                }, 10);
             </script>
            <?php
        }
    }else{
        //check if theres a session in the users memory
        //If no session go to upload / snatched from youtube
        $audio = ''; //http://localhost:8888/YouTube-Downloader/input/Portishead-Only-You.mp3
    }
    ?>
<script>
      /*
     *
     *  PROGRESS GOALS FOR THE SNATCHER
     *
     *  ---    If samplepath not set - then dont clear samples - Show the intro page and check if any wave session is in progress
     *  ---  Let user decide to continue with wave session or clear wave session
     *
     *  Intro screen - landing page
     *
     *  New wave page - with upload function
     *
     *  Drop the youtube downloader.
     *
     *  Create an option to clear samples from memory
     *
     *
     *  --- Finish sampler interface
     *
     *  --- Play and loop the collection samples
     *
     *  --- When region is active, then loop only the region
     *
     *  --- Responsive interface
     *
     *  Fix the inital line in the wave., its like theres no sound.
     *
     *  The cut is not correct, it starts and ends to late.
     *
     *  --- Images in collection do not match.
     *
     *  Anonnemize the url, to not point to the mp3
     *
     *
     *  --- Create a sampler loop station - Based on Alex-milanov JSLOOP
     *
     *  Make a design for the loopstation
     *  Implement the design for loopstation.
     *
     *  Loopstation, only every second track can be edited.
     *
     *  When paused, it cannot play again.
     *
     *  _________________________________
     *  |_x_|___|___|___||_x_|___|___|___|  Individual sounds for each row / track
     *  |___|_o_|___|_o_||___|_o_|___|_o_|
     *  |___|___|_k_|___||___|___|_k_|___|
     *  |___|___|___|___||___|___|___|___|
     *  |___|___|___|___||___|___|___|___|
     *
     *
     *  Option to change the bpm - how fast the sounds should be executed
     *
     *  Option to change Quantization (4 x 2  OR 8 x 2 OR 16 x 2 so theres 16th notes available)
     *
     *
     */

    var lengthOfSampleCutName = 4; // number of random charactors used to naming new cutted samples
    var enableDownloadFromSampleCollection = false; // Show or hide the option for downloading
    var wavesurferHeight = window.innerHeight / 3; // set this to half of window height

    var isPlaying = false; // current wave property
    var audioSource = '<?php echo $audio;?>'; // the audiosource loaded
    var playingSounds = []; // Collection of the cutted sounds and play-pause elements
    var waves = {}; // collection data
    var wave; // the current audiosource
    var looper;
    var quantization = 8;
    var loopsections = 8;
    var downloadFromYoutube = true;
    function Looper(){
        //create the notes in the tracks
        this.loopstationcount = 0;
        this.totalcount = 0;
//        this.notes = 32;
        this.loopStationbpm = 120;
        this.loopsectionTakeOverPlaybtns = false;



        /* Set drag and active listners */

        /* Toggle looper scene on drag */
        var flag = 0;

        var looperElement = document.getElementsByClassName('sample_item_img');
        //Create eventlistners
        for (var i = 0; i < looperElement.length; i++) {
            looperElement[i].addEventListener("mousedown", function(){
                flag = 1;
            }, false);
        }



        var dragged, draggedimage;
        document.addEventListener("dragstart", function(event){
            dragged = event.target.dataset.sample;
            var imgsrc = document.querySelectorAll("img[data-sample='"+dragged+"']").src;
            var img = new Image();
            img.src = imgsrc;
            event.dataTransfer.setDragImage(img, 10, 10);

            //make drop area visible
            highlightDroparea();
        });

        function highlightDroparea(){
            toggleClass(document.getElementById('newTrack_dropzone'),'highlight');
        }
        document.addEventListener("dragover", function(event){
            event.preventDefault();
            console.log(event.target.id);
            console.log(dragged);

            if( event.target.className === "sample_item" || event.target.className === "sample_item_img" ){
                console.log('dragging over sidebar');
                flag = 0;
                if(flag === 0){
                    console.log("out");
//                    var looperarea = document.getElementById('looper');
//                        looperarea.classList.remove('showMe');
                }
            }else if( event.target.id === "looper" || event.target.id === "scene" ){
                flag = 1;
                if(flag === 1){
                    console.log("in");
                    document.querySelector('body').classList.add('looper');
                    //activate looper
                    looper.loopsectionTakeOverPlaybtns = true;
                    var looperarea = document.getElementById('looper');
                        looperarea.classList.add('showMe');

                }
            }else if( event.target.className === "droparea" ){
                event.target.style.background = "#689da1";
                event.dataTransfer.dropEffect = 'copy';
            }


        }, false);

        /* DROPPING A SOUND FROM COLLECTION TO LOOPSTATION */
        document.addEventListener("drop", function(event){

            highlightDroparea();

            event.preventDefault();
            if(event.target.id === 'newTrack_dropzone'){
                console.log('THE');

                console.log(event.target.children);

                //add a wave specific track

//                clone = document.querySelectorAll("[data-sample='"+dragged+"']")[0].cloneNode(true);
                var movedsample = document.createElement('div');
                var count = event.target.children.length;
                    movedsample.setAttribute('data-reference','d'+count+'_'+dragged);
                    movedsample.setAttribute('class','track');
                    movedsample.innerHTML = '<p>'+dragged+'</p>';
                document.getElementById('tracks').appendChild(movedsample);
                var tracks = document.getElementsByClassName('track');
                var tracks = document.getElementsByClassName('track');
                createNotesInTracks(tracks,loopsections,quantization);
            }

        });
    }


    /* CREATING THE ACTUAL SOUND REFERENCES THAT WILL BE PLAYED */

    looper = new Looper();
    var loopStationBeats = [];
    function updateTheLoopstation(){
        console.log(playingSounds);
        var track = document.getElementsByClassName('track');
        //collection all in a array
        for(var t = 0;t < track.length;t++){
        var dropzones = track[t].getElementsByClassName('dropzone');
            loopStationBeats[t] = [];
            for(var c = 0;c < dropzones.length;c++){
                 if(hasClass(dropzones[c],'active')){
//                if(dropzones[c].children[0]){
                    var originalSoundId = dropzones[c].parentNode.parentNode.dataset.reference.split('_')[1];
                    console.log(playingSounds['collectionPlayBtn_'+originalSoundId]);
                    var movedsound = playingSounds['collectionPlayBtn_'+originalSoundId].sound.cloneNode(true);
                    movedsound.setAttribute('id','d'+c+'_'+originalSoundId);
                    loopStationBeats[t][c] = movedsound;
                }else{
                    loopStationBeats[t][c] = false;
                }
            }
        }
        console.log(loopStationBeats);
    }

    function Wave(wavename){
        this.source = wavename;
        this.isPlaying = false;
        this.loop = false;
        this.orginalInput  = false;
        this.wavesurfer = false;
        this.playButton = false;
        this.pauseButton = false;
        this.LoopButton = false;
        this.canvasHeight = getCanvasHeight();
        this.loopStationcount = 0;

    }
    Wave.prototype.loadWaveForm = function (){
        wavesurfer.load(wave.source);
        displaySongInfo();
    };

    var loopstationcount = 0, playLoop = false;
    Wave.prototype.play = function (){
        //
        //if looper then the controls control the loopstation
        //
        if(hasClass(document.getElementById('looper'),'showMe')){
            if(playLoop !== false){
                clearInterval(playLoop);
                playLoop = false;
            }else{
                var bpm = parseInt(looper.loopStationbpm);
                playLoop = setInterval(function(){
                    loopStationBeats.forEach(function(i,v){
                    if(loopStationBeats[v][loopstationcount] !== false){
//                        highlightPlayingDroparea(loopStationBeats[v][loopstationcount]);
                        var sound = loopStationBeats[v][loopstationcount];
                        if(typeof sound !== 'undefined'){
                            sound.pause();
                            sound.play();
                        }
                    }
                    });
                    loopstationcount++;
                    if(loopstationcount === (looper.quantization * looper.rows)){
                        loopstationcount = 0;
                    }
                }, 60/bpm*1000/looper.quantization);
            }

        }else{
            //
            //
            //

            wavesurfer.playPause();
        }
        toggleClass(wave.playButton);
    };
    Wave.prototype.pause = function (){
        if(hasClass(document.getElementById('looper'),'showMe')){
            clearInterval(playLoop);
        }else{
            wavesurfer.playPause();
        }

    };

    Wave.prototype.initWavesurfer = function (){
        //iniit wavesurfer
        var wavesurfer = WaveSurfer.create({
            container: '#waveform',
            waveColor: '#689da1', //#fc6 #2e53a1
            progressColor: '#689da1', //#689da1
            pixelRatio: 1, // limits the ratio to faster render - remove to use default setting window.devicePixelRatio
            height:this.canvasHeight
//            ,barHeight: 1.4,
//            barWidth:2
        });
        wave.wavesurfer = wavesurfer;
        return wavesurfer;
    };

    /* GLOBAL SETTINGS */
    /* PRESET AND BUILD */

    //Some presets
    //Not working as intended.
//    var redirectedPageload = false;
//    if(localStorage.getItem('redirect') === 'true'){
//        redirectedPageload = true;
//    }


    //new global functions
    function getCanvasHeight(){
        return wavesurferHeight;
    }

    function highlightPlayingDroparea(ref){

         console.log(ref);
        var reference = ref.getAttribute('id');
         console.log(reference);
        document.querySelectorAll("[data-reference='"+reference+"']")[0].style.background = "#689da1";
        document.querySelectorAll("[data-reference='"+reference+"']")[0].style.color = "#ffffff";
        setTimeout(function(){
            document.querySelectorAll("[data-reference='"+reference+"']")[0].style.background = "";
        document.querySelectorAll("[data-reference='"+reference+"']")[0].style.color = "#689da1";
        },200);
    }

    showLoader();


    console.log('Init interface - Upload');
    // On page load - if audiosource present
    if(audioSource !== ''){

        smallScreenFix();
        var d = document.getElementById('upload');
            d.className = " ";

        initInterface();
        setCurrentNavigationTo();



        // instantiate constructor class on primary wave
        wave = new Wave(audioSource);
        //set the element for play button
        wave.playButton = document.getElementById("play_pause");
        //set the element for pause button
        wave.pauseButton = document.getElementById("play_pause");
        //set the element for loop button
        wave.loopButton = document.getElementById("toggleLoop");

        //initialize the wavesurfer
        var wavesurfer = wave.initWavesurfer();
        //load audiosource to wavesurfer
        wave.loadWaveForm();

        // If no collection cuts already in memory then add the loaded soundwave - Otherwise it would be added on every pageload
        if(waves.samples.length === 0){
            makeWaveform(audioSource);
        }
        var minimap;


        //////////////////////////////////////////
        // EVENTS                               //
        //////////////////////////////////////////

        wavesurfer.on('ready', function () {
            console.log('wavesurfer ready');
            // Enable regions by dragging
            wavesurfer.enableDragSelection({});
            hideLoader();
            console.log(waves.samples.length);
            //minimap
            minimap = wavesurfer.initMinimap({
                height: 30,
                waveColor: '#fff',
                progressColor: '#fff',
                cursorColor: '#69a',
                barHeight: 1.4
            });

            //run functions for wavesurfer when wave is ready
            console.log(audioSource);
            console.log('HARD CORE SET NEW CURRENT');
            setNewCurrentWave(audioSource);

//            buildEqualizer();
            showDuration();
            showCurrentPointer();
            showZoomer();
            console.log('wavesurfer functions done');
            makeWaveImage();
            createSampleCollection();




//        if(redirectedPageload && audioSource !== waves.samples[waves.currentwave]){
//            var canvas = document.querySelector("canvas");
//            if(canvas !== 'undefined'){
//                if(waves.samples.length > waves.images.length){
//                    var dataURL  = canvas.toDataURL("image/png");
//                    waves.images[waves.samples.length-1] = dataURL;
//                    console.log('<img src="'+dataURL+'">');
//                }
//                setTimeout(function(){
//                    var url = window.location.href.split('?');
//                    window.location.href =  url[0]+'?samplepath='+waves.samples[waves.currentwave];
//                },1000);
//            }
//        }


            deselectRegion(); //Resetting the selection
            makePrettyOverflowOnSidebarColumns();
            createGroupedEventListners();


//Build predefined region
//        wavesurfer.addRegion({
//          start: 2, // time in seconds
//          end: 20, // time in seconds
//          color: 'hsla(100, 100%, 30%, 0.1)'
//        });

        });
        wavesurfer.on('play', function () {
            console.log('play');
            isPlaying = true;
        });

        wavesurfer.on('pause', function () {
            console.log('pause');
            isPlaying = false;
        });
        wavesurfer.on('finish', function () {
            console.log('end reached');
            if(waves.loop){
                console.log('Initiate loop');
                wavesurfer.play(0);
            }else{
                //set play btn to default
                toggleClass(document.getElementById("play_pause"));
            }
        });
        wavesurfer.on('region-created', function () {
            console.log('created');
            if(hasClass(document.getElementById('leftPanel'),'on')){

            }else{
                toggleClass(document.getElementById('leftPanel'));
            }
            showRemoveRegionBtn();
        });
        wavesurfer.on('seek', function () {
            console.log('seeking');
            showCurrentPointer();
        });
        var samplestart, sampleend;
        wavesurfer.on('region-update-end', function () {
            //clear regions to set new.
            var obj = wavesurfer.regions.list;


            console.log('updated');
            var obj = wavesurfer.regions.list;


            last = Object.keys(obj)[Object.keys(obj).length-1];

            console.log('cut ');
            console.log(obj);
            console.log(obj[last].start);
            console.log(obj[last].end);

            var start = obj[last].start;
            var end = obj[last].end;
            samplestart = start;
            samplelength = end-start;

            saveRecentlyCreatedSample(start,end,samplelength); // tmp save the region
            removeRegion(); // clear all regions to ensure only one region visible
            addResentlyCreatedSampleAsRegion(); // add the tmp region to wavesurfer

            turnSecondCounterIntoNiceFormat(start,'startmark');
            turnSecondCounterIntoNiceFormat(end,'endmark');
        });
        wavesurfer.on('region-in', function () {
        });

        wavesurfer.on('region-out', function () {
            wavesurfer.playPause();

            var regions = wavesurfer.regions.list;
            last = Object.keys(regions)[Object.keys(regions).length-1];

            var start = regions[last].start;
            var end = regions[last].end;
            wavesurfer.play(start);


        });
//
        wavesurfer.on('audioprocess', function () {
            showCurrentPointer();
        });




    function saveRecentlyCreatedSample(start,end,samplelength){
        localStorage.setItem('samplestart',start);
        localStorage.setItem('sampleend',end);
        localStorage.setItem('samplelength',samplelength);
    }
    function addResentlyCreatedSampleAsRegion(){
        var samplestart  = localStorage.getItem('samplestart');
        var sampleend    = localStorage.getItem('sampleend');

        var r = wavesurfer.addRegion({
          start: samplestart, // time in seconds
          end: sampleend, // time in seconds
          color: 'rgba(255,255,255,0.1)'
        });
    }

    //////////////////////////////////////////
    // Listeners                            //
    //////////////////////////////////////////

    //sample buttons
//    var samples = document.getElementsByClassName("sample_item");
//    for(var i = 0; i < samples.length; i++){
//        var cur_id = samples[i].id;
//        samples[i].addEventListener("click", function(e){
//            e.preventDefault();
//            //navigate to wave by link
//            var current = setNewCurrentWave(this.href);
//            //navigate to new sample
//            var url = window.location.href.split('?');
//            window.location.href =  url[0]+'?samplepath='+waves.samples[current];
//        });
//    }

//    ****** DEPRECATED ********
//    //back button
//    document.getElementById("previousSample").addEventListener("click", function(){
//        //go back to previous wave
//        var current = setNewCurrentWave('prev');
//
//
//        //navigate to new sample
//        var url = window.location.href.split('?');
//        window.location.href =  url[0]+'?samplepath='+waves.samples[current];
//    });
//     //forward button
//    document.getElementById("nextSample").addEventListener("click", function(){
//
//        var current = setNewCurrentWave('next');
//
//        //navigate to new sample
//        var url = window.location.href.split('?');
//        window.location.href =  url[0]+'?samplepath='+waves.samples[current];
//    });
//


        //download btn  ****** DEPRECATED - individual samples can be downloaded instead of current
//    document.getElementById("download_btn").addEventListener("click", downloadSample);



    function showRemoveRegionBtn(){
        var el = document.getElementById('remove_region');
        el.classList.remove('hide');
    }

    function hideRemoveRegionBtn(){
        var el = document.getElementById('remove_region');
        el.classList.add('hide');
    }

    function navigation(){
        //save the current navigation click
        localStorage['current_sidebar_state'] = this.id;

        //clear active
        btns =  document.getElementsByClassName('nav_btn');
        for (var i = 0; i < btns.length; i++) {
            btns[i].classList = 'nav_btn';
        }
        //Set active
        this.classList = 'nav_btn active';
        if(this.id === 'sampleinfo_button'){
            document.getElementById('sampleinfo').classList = 'transition sidebar_content sidebar_sampleinfo showMe';
            document.getElementById('archive').classList = 'transition sidebar_content sidebar_archive';
        }else{
            document.getElementById('sampleinfo').classList = 'transition sidebar_content sidebar_sampleinfo';
            document.getElementById('archive').classList = 'transition sidebar_content sidebar_archive showMe';
        }
    }

    function setCurrentNavigationTo(){
        //current_sidebar_state save from previously clicked
        if(localStorage.getItem('current_sidebar_state') !== null && typeof localStorage.getItem('current_sidebar_state') !== 'undefined'){
            //clear actuel active navbtn
            btns =  document.getElementsByClassName('nav_btn');
            for (var i = 0; i < btns.length; i++) {
                btns[i].classList = 'nav_btn';
            }
            //Set class on sidebar navigation
            var that = localStorage.getItem('current_sidebar_state');
            console.log(that);
            document.getElementById(that).classList = 'nav_btn active';


            //clear actuel active sidebar box
            boxes =  document.getElementsByClassName('sidebar_content');
            for (var i = 0; i < boxes.length; i++) {
                var id = boxes[i];
                var list = boxes[i].classList;
                boxes[i].classList = 'sidebar_content sidebar_'+id;
            }
            //Set class on the sidebar box
            var element = that.split('_')[0];
            document.getElementById(element).classList = 'sidebar_content sidebar_'+element+' showMe';

        }
    }


    function createGroupedEventListners(){
        //Create eventlistners for collection btns created programtically PLAY
        var collectionplaybtns = document.getElementsByClassName("collectionPlayBtn");
        for (var i = 0; i < collectionplaybtns.length; i++) {
            collectionplaybtns[i].addEventListener('mouseup', collectionBtnClick);
        }
        //Create eventlistners for collection btns created programtically LOOP
        var collectionplaybtns = document.getElementsByClassName("collectionLoopBtn");
        for (var i = 0; i < collectionplaybtns.length; i++) {
            collectionplaybtns[i].addEventListener('mouseup', collectionBtnClick);
        }

        //navigation controls for the sidebar
        var navbtns = document.getElementsByClassName("nav_btn");
        for (var i = 0; i < navbtns.length; i++) {
            navbtns[i].addEventListener('mouseup', navigation);
        }

        //Button toggler

        var buttonTogglers = document.getElementsByClassName("buttonToggler");
        for (var i = 0; i < buttonTogglers.length; i++) {
            buttonTogglers[i].addEventListener('mouseup', buttonTogglers);
        }
    }




    /* Collection sample btns - play and loop */


    function collectionBtnClick(){

//        get parent and select a from the parent to get destination
//        console.log(this.parentNode.previousSibling.getAttribute('id'));
        if(hasClass(this,'collectionPlayBtn') && hasClass(this,'off') ){
            //paused or not started = click for play
            var url = this.parentNode.previousSibling.getAttribute('id');
            var aSound = '';
            console.log('this id');
            console.log(this.id);
            console.log(playingSounds);
            if(playingSounds[this.id].sound){
                aSound = playingSounds[this.id].sound;
            }
            //play
            aSound.play();
            playingSounds[this.id].isPlaying = 'true';
            playingSounds[this.id].sound = aSound; // element , loop
            toggleClass(this);

            console.log(playingSounds[this.id]);


        }else if(hasClass(this,'collectionPlayBtn') && hasClass(this,'on') ){
            //playing - clicked for pause
            var url = this.parentNode.previousSibling.getAttribute('id');
            var aSound = '';

            playingSounds[this.id].isPlaying = 'false';
            aSound = playingSounds[this.id].sound;
            aSound.pause();

            toggleClass(this);

            console.log('this id');
            console.log(this.id);

            console.log('pause');
            console.log(playingSounds[this.id]);


        }else if(hasClass(this,'collectionLoopBtn')){
            //loop
            if(playingSounds[this.id]){
                aSound = playingSounds[this.id].sound;
            }else{
                aSound = new Audio(url);
            }

            if(playingSounds[this.id].loop === 'true'){
                aSound.setAttribute('loop','false');
                playingSounds[this.id].sound = aSound; // element , loop
                playingSounds[this.id].loop = 'false'; // element , loop
            }else{
                aSound.setAttribute('loop','true');
                playingSounds[this.id].sound = aSound; // element , loop
                playingSounds[this.id].loop = 'true'; // element , loop
            }

            console.log(playingSounds);
//            if(playingSounds[this.id].isPlaying === 'true'){
//
//
//            }
        }

    }

    function isPlaying(audioelem) {
        return !audioelem.paused;
    }

    function buttonTogglers(){
        //clear active
        btns =  document.getElementsByClassName('buttonToggler');
        for (var i = 0; i < btns.length; i++) {
            btns[i].classList = 'buttonToggler';
        }
        //Set active
        this.classList = 'buttonToggler active';

        //close all togglers and open this
        togglers =  document.getElementsByClassName('area_definer');
        for (var i = 0; i < togglers.length; i++) {
            togglers[i].classList = 'area_definer';
        }
        //Set active
        this.classList = 'area_definer active';

    }

    //submit form
    document.getElementById("goFullScreen").addEventListener("click", goFullScreen);




    // cut the sample
    document.getElementById("cutSample").addEventListener("click", cutTheSample);
    document.getElementById("cutSample").addEventListener("mousedown", toggleClickEffect);
    document.getElementById("cutSample").addEventListener("mouseup", toggleClickEffect);


    //the main wave - on play click or on space key
    document.getElementById("play_pause").addEventListener("click", wave.play);
    document.getElementById("play_pause").addEventListener("mousedown", toggleClickEffect);
    document.getElementById("play_pause").addEventListener("mouseup", toggleClickEffect);
    document.body.onkeyup = function(e){
        if(e.keyCode == 32){ //spacebar

            //instance of wave class -
            // with prototype function to handle difference between sampler play and loopstation play, when looper is active
            wave.play();

        }else{
            e.preventDefault();
        }
    }
    function toggleClickEffect(){
        this.classList.toggle('mousedown');
    }


    //toggle loop
    document.getElementById("toggleLoop").addEventListener("click", toggleLoop);
    document.getElementById("toggleLoop").addEventListener("mousedown", toggleClickEffect);
    document.getElementById("toggleLoop").addEventListener("mouseup", toggleClickEffect);

    //remove regions
    document.getElementById("remove_region").addEventListener("mousedown", removeRegion);


    //remove regions


     /*****************
    Zoom the wave
    **************** */
    var scroll = document.getElementById("waveform");
    // For Chrome
     document.getElementById("waveform").addEventListener('mousewheel', mouseWheelEvent);
    // For Firefox
     document.getElementById("waveform").addEventListener('DOMMouseScroll', mouseWheelEvent);
     var isScrolling;

    //////////////////////////////////////////
    // FUNCTIONS                            //
    //////////////////////////////////////////


//    function updateCursorTextPosition(){
//        ww = document.querySelector('wave wave').style.width;
//
//        document.querySelector('wave wave').innerHTML = "<p>CURSOR</p>" ;
//        if(parseInt(ww.replace("px", "")) > '26'){
//            document.querySelector('wave wave p').style.marginLeft = '-26px';
//        }else{
//             document.querySelector('wave wave p').style.marginLeft = '0';
//        }
//
//        document.querySelector('wave wave p').style.left = ww;
//    }








}else{
    //check if a session is in memory
    if(localStorage.getItem('waves')){
        waves =  JSON.parse(localStorage.getItem('waves'));
        console.log('user got a session in memory');

        //show options to user, Continue with memory session or start new
        toggleClass(document.querySelector('body'),'upload');
        toggleClass(document.getElementById('upload'),'showMe');
        toggleClass(document.getElementById('upload'),'hide');
        toggleClass(document.getElementById('userMemoryOptions'),'hide');
        toggleClass(document.getElementById('userMemoryOptions'),'showMe');

        document.getElementById('previousSession').addEventListener("click", function (e){
            //start with previous wave session
            console.log(waves.samples[0]);

            window.location.href = '?samplepath='+waves.samples[0];
        });
        document.getElementById('newSession').addEventListener("click", function (e){
            //Show uploadpage

            toggleClass(document.querySelector('body'),'upload');
            toggleClass(document.getElementById('upload'),'hide');
            toggleClass(document.getElementById('upload'),'showMe');
            toggleClass(document.getElementById('userMemoryOptions'),'showMe');
            toggleClass(document.getElementById('userMemoryOptions'),'hide');
        });

    }else{
        //no session in memory

        //The upload screen is shown
    }


//
//   localStorage.removeItem('waves');
//   console.log('localstorage was emptied');


   /*
    * hide this hide in production
    *
    * upload section eventlistners
    *
    */

       if( downloadFromYoutube !== false){
            document.getElementById("wave_from_form").addEventListener("click", function (e){

                e.preventDefault();

                    var d = document.getElementById('loader');
                        d.className = " showMe";


            //        document.getElementById('audioform').submit();


                    console.log(document.getElementById('samplepath'));
                    var urlyt = document.getElementById('samplepath').value;
                   // do sanity check on url
                    if(document.getElementById('samplepath') !== null){

                        var xhr = new XMLHttpRequest();
                            xhr.open('POST', 'fetchmp3fromyoutube.php', true);
                            xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                            xhr.onload = function () {
                                //get the wave
                                console.log(this.responseText);

                                var d = document.getElementById('loader');
                                    d.innerHTML = 'SUCCES!';

                                var url = window.location.href.split('?');
                                window.location.href =  url[0]+'?samplepath='+this.responseText;
                            };
                            xhr.send('url='+urlyt);
                    }else{
                    }

           });
        }

   hideLoader();
}



/* FUNCTIONS */

function userOptionsForSessionInMemory(){

}

function goFullScreen(){
    var sidebar = document.getElementById('sidebar');
    toggleClass(sidebar);

    var body = document.querySelector('body');
    toggleClass(body,'noSidebar');

    //if body has class = noSidebar
    //the move #controls to .controls in controls_in_scene
    var controls = document.getElementById('coreControls');
    if(controls.parentNode.id === 'innerControls'){
    var before = document.getElementById('remove_region');
        document.getElementById('controls').insertBefore(controls, document.getElementById('controls').firstChild);
    }else{
        document.getElementById('innerControls').appendChild(controls);
    }

//
//    //Readjust the wave
//    wavesurfer.empty();
    wave.wavesurfer.drawBuffer();
    minimap.render();

//    makePrettyOverflowOnSidebarColumns();
}

    function toggleLoop(){
        console.log('loop toggle');
        if(waves.loop){
             waves.loop = false;
        }else{
             waves.loop = true;
        }
//        if(isPlaying){
//            //if song is playing, toggle the class
//            play_pause();
//            toggleClass(document.getElementById("play_pause"));
//        }
            toggleClass( document.getElementById("toggleLoop"));


    }

    function btnToggle(){
        //hasClass
        if((' ' + this.className + ' ').indexOf(' on ') > -1){
            this.classList.remove("on");
            this.className += " off";
        }else{
            this.classList.remove("off");
            this.className += " on";
        }

    }


    function toggleClass(element,classActive){
        if(classActive){
            if((' ' + element.className + ' ').indexOf(' ' + classActive + ' ') > -1){
                element.classList.remove(classActive);
            }else{
                element.className += " "+classActive;
            }
        }else{
            classActive = 'on';
            classDeactive = 'off';
             //hasClass
            if((' ' + element.className + ' ').indexOf(' ' + classActive + ' ') > -1){
                element.classList.remove(classActive);
                element.className += " "+classDeactive;
            }else{
                element.classList.remove(classDeactive);
                element.className += " "+classActive;
            }
        }

    }
    function hasClass(element,theclass){
        if((' ' + element.className + ' ').indexOf(' ' + theclass + ' ') > -1){
           return true;
        }else{
           return false;
        }
    }
//     function btnToggleClickers(){
//        this.classList.remove("on");
//    }

    function loadWaveForm(){
        wavesurfer.load(audioSource);
        displaySongInfo();
    }


     function initInterface(){
        //Check if theres waves in cookies
        if(localStorage.getItem('waves')){
            waves =  JSON.parse(localStorage.getItem('waves'));
//            console.log('got cookie waves');
        }else{
            waves = {
                currentwave:0,
                originalwave:0,
                samples:[],
                images:[],
                loop:true
            };
//
//            console.log('no sample loaded');
//            console.log('no cookie waves');
//            console.log(waves);
        }
        createLoopstationInterface();
        showWaveInterface();
        showSidebarContent();
    }

    function createLoopstationInterface(){

        var track_wrap = document.getElementsByClassName('tracks');
        var tracks = document.getElementsByClassName('track');
        tracks.innerHTML = '';

//        createNotesInTracks(tracks);

        var looperElement = document.getElementsByClassName('looperbtn');
        //Create eventlistners
        for (var i = 0; i < looperElement.length; i++) {
            looperElement[i].addEventListener("change", function(){
                if(this.id === 'setQuantization'){
//
//                    var val = document.getElementById('setBpm').value;
//                    console.log('value');
//                    console.log(val);
//                    looper.loopStationbpm = val;
//                    document.getElementById('currentBpm').innerHTML = '('+val+')';
//                    document.getElementById('setBpm').value = val;
//
                }else  if(this.id === 'setRows'){
                   number = 0; // get from element
                   changeRows(number);
                }else  if(this.id === 'setBpm'){

                    var val = document.getElementById('setBpm').value;
                    console.log('value');
                    console.log(val);
                    looper.loopStationbpm = val;
                    document.getElementById('currentBpm').innerHTML = '('+val+')';
                    document.getElementById('setBpm').value = val;
                    createLoopstationInterface();
                }
            }, false);
        }
    }
    function createNotesInTracks(tracks,loopsections,quantization){
        var singleNoteCssWidth = 52; // with border px
        looper.quantization = parseInt(quantization);
        looper.rows = parseInt(loopsections);

        console.log('createNotesInTracks');
        console.log(looper.rows);

        //calcwidth of total
        var res = ((looper.quantization * looper.rows ) * singleNoteCssWidth) * 1.2; // single width
        for(var i = 0; i < tracks.length; i++){
            console.dir(tracks[i]);
            if(tracks[i].childNodes.length === 1){

                tracks[i].setAttribute('style','width:'+res+'px;');
                for(var x = 0; x < looper.rows; x++){
                    var row = document.createElement('div');
                        row.setAttribute('class','trackrow');

                    for(var o = 0; o < looper.quantization; o++){
                        var div = document.createElement('div');
                            div.setAttribute('class','dropzone');
                            div.setAttribute('data-count',looper.totalcount);
                            row.appendChild(div);
                            console.log(looper.totalcount);
                            looper.totalcount++;
                            tracks[i].appendChild(row);

                     div.addEventListener("mouseup", function(){
                           console.log(i);
                           this.classList.toggle('active');
                           updateTheLoopstation();

                          //            console.log("drop in");
//            if(event.target.className == 'dropzone'){
//                console.log('THE');
//
//                console.log(event.target.className);
//
////                clone = document.querySelectorAll("[data-sample='"+dragged+"']")[0].cloneNode(true);
//                var movedsample = document.createElement('div');
//                var count = event.target.dataset.count;
//                movedsample.setAttribute('data-reference','d'+count+'_'+dragged);
//                movedsample.innerHTML = dragged;
//                event.target.appendChild(movedsample);
//
//                updateTheLoopstation();
//            }


                       }, false);
                    }
                }
            }
        }
    }

    function updateLoopstation(){

    }
    function showSidebarContent(){
        document.querySelector('#sidebarnav').classList.remove('hide');
        document.querySelector('#controls').classList.remove('hide');
        document.querySelector('#controls').classList.remove('hide');
        boxes =  document.getElementsByClassName('sidebar_content');
        for (var i = 0; i < boxes.length; i++) {
            boxes[i].classList.add('transition');
        }
    }

    function makeWaveImage(){
        console.log('before waveimage update' );
        console.log(waves);
        console.log(waves.samples.length);

        var canvas = document.querySelector("canvas");
        if(typeof canvas !== 'undefined'){
            console.log(canvas);
            var dataURL  = canvas.toDataURL("image/png");

            waveArchiveEditor('addnewimage',dataURL);
            if(localStorage.getItem('samplecut') && waves.currentwave !== localStorage.getItem('samplecut')){

                localStorage.setItem('samplecut',false);
                waves.samples.length;
                waves.images.splice(waves.samples.length, waves.images.length-waves.samples.length);
                saveWaves();
            }

            var mirror = document.getElementById('mirror');
            if(mirror){
                mirror.src = dataURL;

            }

        }


        console.log('after waveimg update');
        console.log(waves);

    }

    function saveWaves(){
        //save wave in localstorage
        localStorage['waves'] = JSON.stringify(waves);
    }

    function setNewCurrentWave(dir){
        console.log('current wave changed to');
        var current = waves.currentwave;
        if(current === 0 && dir === 'prev'){
            current = waves.samples.length-1;
        }else if(current === waves.samples.length-1 && dir === 'next'){
            current = 0;
        }else if(current !== 0 && dir === 'prev'){
            current--;
        }else if(current !== waves.samples.length-1 && dir === 'next'){
            current++;
        }
        if(dir !== 'next' && dir !== 'prev'){
//            dir is a wave identifier - find the id to match and set current
//            if(dir >== 0){
                console.log('in');
                for(var x = 0; x <= waves.samples.length;x++){
                    if(waves.samples[x] === dir){
                        current = x;
                        console.log(current);
                        //save in object

                    }
                }
//            }

        }

        waves.currentwave = current;

        //save wave in localstorage
        saveWaves();

        return current;
    }

    function makeWaveform(wave){
        console.log('before wave update' );
        console.log(waves);
        waveArchiveEditor('addnew',wave);
        console.log('after wave update');
        console.log(waves);
        console.log('done');
    }
    function createSampleCollection(){
        console.log(waves);
        var wavelen = waves.samples.length-1;
        //place samples in #sample_collection
        if(waves.samples.length > 0){
            for(var i = wavelen; i >= 0 ; i--){
//                if(i !== wavelen){
                    //not first
                    console.log(i);
                    console.log('colledtioncount');
                var wrap = document.createElement('div');
                    wrap.setAttribute('class','sample_item');
                    wrap.setAttribute('draggable','true');
                    wrap.setAttribute('data-sample',i);

                var btns = document.createElement('div');
                    btns.setAttribute('class','btns');
                    btns.setAttribute('id','btns_'+i);
                    btns.innerHTML = '<div id="collectionPlayBtn_'+ i +'" class="collectionPlayBtn off"></div><div id="collectionPlayBtn_'+ i +'" class="collectionLoopBtn off"></div>';


                var el = document.createElement('a');
                    el.setAttribute('id',waves.samples[i]);
                    el.setAttribute('href','?samplepath='+waves.samples[i]);
//                    el.setAttribute('onclick',localStorage.setItem('redirect',false));
                    el.setAttribute('data-sample',i);

                    aSound = new Audio(waves.samples[i]);
                    aSound.setAttribute('id','collectionPlayBtn_'+ i);
                    if(typeof playingSounds === 'undefined'){
                        playingSounds = [];
                    }
                    console.log('create collection');
                    console.log(playingSounds);
                    playingSounds['collectionPlayBtn_'+ i] = {};
                    playingSounds['collectionPlayBtn_'+ i].sound = aSound;
                    playingSounds['collectionPlayBtn_'+ i].loop = 'false';


                    aSound.addEventListener("ended", function(){

                        aSound.currentTime = 0;
                        console.log(this.id.replace('sound_','')+ " ended");
                        var that = document.getElementById(this.id.replace('sound_',''));
                        if(playingSounds[this.id].isPlaying === 'true'){
                            toggleClass(that);
                            playingSounds[this.id].isPlaying = 'false';
                        }else{
                            toggleClass(that);
                            playingSounds[this.id].isPlaying = 'true';
                        }
                    });


                    //create wave alias
                    var thiswavename;
                    if (waves.samples[i].indexOf('cut_') > -1){
                        //has cuts
                        thiswavename = waves.samples[i].split('cut_')[0] +'cut_';
                    }else{
                        thiswavename = waves.samples[i];
                    }

                    console.log(thiswavename);
                    console.log('i count '+ i);
                var samplename = document.createElement('div');
                    samplename.innerHTML = thiswavename.replace('output/','');

                var img = document.createElement('img');
                    img.setAttribute('class','sample_item_img');
                    img.setAttribute('src',waves.images[i]);
                    img.setAttribute('data-sample',i);
//                    if(i === wavelen){
//                        img.setAttribute('id','mirror');
//                    }

                    el.appendChild(samplename);
                    el.appendChild(img);


                    wrap.appendChild(el);
                    wrap.appendChild(btns);


                if(enableDownloadFromSampleCollection ){
                    var download = document.createElement('a');
                        download.setAttribute('class','download_btn');
                        download.setAttribute('href','?samplepath='+waves.samples[i]);
                        download.setAttribute('download',true);
                        download.innerHTML = 'Download sample';

                        wrap.appendChild(download);

                }

//                }else{
//
//
//                var wrap = document.createElement('div');
//                    wrap.setAttribute('class','sample_item');
//
//                var el = document.createElement('a');
//                    el.setAttribute('id',waves.samples[i]);
//                    el.setAttribute('href','?samplepath='+waves.samples[i]);
//                    el.setAttribute('onclick',localStorage.setItem('redirect',false));
//
//                var div = document.createElement('img');
//                    div.setAttribute('id','mirror');
//                    div.setAttribute('class','sample_item_img');
//
//                //create wave alias
//                var thiswavename;
//                    if (waves.samples[i].indexOf('cut_') > -1){
//                        //has cuts
//                        thiswavename = waves.samples[i].split('cut_')[0] +'cut_';
//                    }else{
//                        thiswavename = waves.samples[i];
//                    }
//
//                var samplename = document.createElement('div');
//                    samplename.innerHTML = thiswavename.replace('output/','');
//
//                    el.appendChild(div);
//                    el.appendChild(samplename);
//
//                    wrap.appendChild(el);
//
////                    //latest image not accessible
////                    console.log(waves.samples[i]);
////
////                var wrap = document.createElement('div');
////                    wrap.setAttribute('class','sample_item');
////
////                var el = document.createElement('a');
////                    el.setAttribute('id',waves.samples[i]);
////                    el.setAttribute('href','?samplepath='+waves.samples[i]);
////
////                    //create wave alias
////                    var thiswavename;
////                    if (waves.samples[i].indexOf('cut_') > -1){
////                        //has cuts
////                        thiswavename = waves.samples[i].split('cut_')[0] +'cut_';
////                    }else{
////                        thiswavename = waves.samples[i];
////                    }
////
////
////                    el.innerHTML = thiswavename;
////
////                    wrap.appendChild(el);
////
////                var download = document.createElement('a');
////                    download.setAttribute('class','download_btn');
////                    download.setAttribute('href',waves.samples[i]);
////                    download.setAttribute('download',waves.samples[i]);
////                    download.innerHTML = 'Download sample';
////
////
////
////
////
////                var samplename2 = document.createElement('div');
////                    samplename2.innerHTML = 'Latest cut sample';
////
////                    wrap.appendChild(samplename2);
////                    wrap.appendChild(el);
//
//
//
//    //                wrap.appendChild(download);
//                }

                var sample_collection = document.getElementById('sample_collection');
                    sample_collection.appendChild(wrap);

            }
        }



    }


//    function downloadSample(){
//        document.getElementById("download_btn").href = audioSource;
//        document.getElementById("download_btn").click();
//    }

    /*
     * Function to archive cutted samples and base64 images related to those
     *  Multiple purpose function with
     *  - addnew (Adds a soundwave to the collection)
     *  - addnewimage (Adds a base64 to the soundwave collection)
     *  - changecurrent (*** Deprecated  Not in use **** )
     */
    function waveArchiveEditor(action,wave){
        if(action === 'addnew'){
            //move current to sample
            waves.samples.push(wave);

            var last = waves.samples.length-2;
            // set new current
            waves.currentwave = last;

            //reload current wavesurfer


        }else if(action === 'addnewimage'){
            //move current to sample
            waves.images.push(wave);
        }else if(action === 'changecurrent'){
            loadWaveForm();
        }
        return waves;
    }






    function formatSecondsToMinAndSec(duration_time){
        var minutes = Math.floor(duration_time / 60);
        var seconds = Math.floor(duration_time - minutes * 60);

        return [minutes,seconds];
    }



   function cutTheSample(){
        var parts = audioSource.split('/');
        var last = parts.length-1;
        var name = parts[last];
      var outputPath = name;

        var xhr = new XMLHttpRequest();
            xhr.open('POST', 'cutAudio.php', true);
            xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            xhr.onload = function () {

                //get the wave
                console.log(this.responseText);
                var out = this.responseText;
                var parts = out.split('/');
                var last = parts.length-1;
                var name = 'output/'+parts[last];

                makeWaveform(out);


                //save wave object to cookie - on reload the new is added adn object recreated

                saveWaves();
                localStorage.setItem('samplecut',waves.samples.length);
                console.log(JSON.stringify(waves));

                //navigate to new sample
                var url = window.location.href.split('?');
                window.location.href =  url[0]+'?samplepath='+out;
            };
            xhr.send('filesource='+audioSource+'&newname='+outputPath+'&start='+samplestart+'&end='+samplelength);


   }






    //build a scroll vertically to adjust zoom

    function setCookie(cname, cvalue, exdays) {
        var d = new Date();
        d.setTime(d.getTime() + (exdays*24*60*60*1000));
        var expires = "expires="+ d.toUTCString();
        document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
    }
    function getCookie(cname) {
        var name = cname + "=";
        var decodedCookie = decodeURIComponent(document.cookie);
        var ca = decodedCookie.split(';');
        for(var i = 0; i <ca.length; i++) {
            var c = ca[i];
            while (c.charAt(0) == ' ') {
                c = c.substring(1);
            }
            if (c.indexOf(name) == 0) {
                return c.substring(name.length, c.length);
            }
        }
        return "";
    }

//Deprecated

//    function setCountDownToStop(total){
//        var count = total;
//        var interval = setInterval(function(){
//           count--;
//            console.log(count);
//            document.getElementById('timeLeft').innerHTML = count;
//            if(count === 0){
//                clearInterval(interval);
//            }
//        },1000);
//    }

     function showWaveInterface(){
        var d = document.querySelector('#wave');
            d.className += " showMe";

    }

    // make nice overflow on sidebar columns
    // if content height more then allowed column height, then do shade on the end to visualize the hidden content .

    function makePrettyOverflowOnSidebarColumns(){
        var sidebarColumns = document.getElementsByClassName('sidebarColumn');
        for( var i = 0; i < sidebarColumns.length; i++ ){
            var id = sidebarColumns[i].id;
            if (sidebarColumns[i].offsetHeight < sidebarColumns[i].scrollHeight ||
                sidebarColumns[i].offsetWidth < sidebarColumns[i].scrollWidth) {
                // element have overflow
                if(!hasClass(sidebarColumns[i],'overflowWraps')){
                    sidebarColumns[i].className += " overflowWraps";
                }
            }else{
                var classes = sidebarColumns[i].className;
                sidebarColumns[i].className = classes.replace('overflowWraps','');
            }
        }
    }



    function mouseWheelEvent(e) {
        var count = parseInt(document.getElementById("slider").getAttribute('datacount'));
        var delta = e.wheelDelta ? e.wheelDelta : -e.detail;
        if (e.deltaY < 0) {
            console.log('scrolling up');

            if(count <= 200 && count >= 0){
                if(delta < 0){
                    count = count-1;
                    console.log('down');

                }else{
                    count = count+1;
                    console.log('up');
                }

            }else{
                if(count>200){
                    count = 200;
                }else{
                    count = 0;
                }
            }
            document.getElementById("slider").setAttribute('datacount',count);
            window.clearTimeout( isScrolling );
            isScrolling = setTimeout(function(){
            console.log('timed out');


                //make the wave zoom
                zoomWaveToPosition(count);
            },10);
        }
        if (e.deltaY > 0) {
            console.log('scrolling down');

            if(count <= 200 && count >= 0){
                if(delta < 0){
                    count = count-1;
                    console.log('down');

                }else{
                    count = count+1;
                    console.log('up');
                }

            }else{
                if(count>200){
                    count = 200;
                }else{
                    count = 0;
                }
            }
            document.getElementById("slider").setAttribute('datacount',count);
            window.clearTimeout( isScrolling );
            isScrolling = setTimeout(function(){
            console.log('timed out');


                //make the wave zoom
                zoomWaveToPosition(count);
            },10);
        }


    }

    function zoomWaveToPosition(count){

        console.log(count);
        var zoomLevel = Number(count);
            wavesurfer.zoom(zoomLevel);
            document.getElementById("slider").value = count;
            console.log('wave zoomed');

//            updateCursorTextPosition();
    }


    function showZoomer(){
        var slider = document.querySelector('#slider');
            slider.classList.remove('hide');
            slider.oninput = function () {
                var zoomLevel = Number(slider.value);
                wavesurfer.zoom(zoomLevel);
                //reset counter
                document.getElementById("slider").setAttribute('datacount',zoomLevel);

//            updateCursorTextPosition();
            };
    }

    //Set duration
    function showDuration(){
        var duration_time = wavesurfer.getDuration();

        turnSecondCounterIntoNiceFormat(duration_time,'duration');
//
//        var duration = document.getElementById('duration');
//        var minuts = Math.floor(duration_time/60);
//        var sec = Math.floor((duration_time/60 - minuts) *100);
//
//        duration.innerHTML = minuts +'min '+sec +'sec';
    }


    function showCurrentPointer(){
        var pointer = document.getElementById('currentPointer');
        var sec = wavesurfer.getCurrentTime();
        res = sec;
        turnSecondCounterIntoNiceFormat(res,'currentPointer');
    }



//    var moment = require("moment");
//    var momentDurationFormatSetup = require("moment-duration-format");

    function turnSecondCounterIntoNiceFormat(count,elementID){
        // your input
        var duration_seconds = count;

            if(elementID === 'startmark' || elementID === 'endmark'){
                var duration = moment.duration(duration_seconds, "seconds").format("hh:mm:ss", {
                    trim: false
                });
                var time =  duration +':'+subStrAfterChars(duration_seconds,'.');
            }else{
                var duration = moment.duration(duration_seconds, "seconds").format("hh:mm:ss:SSS", {
                    trim: false
                });
                var time =  duration;
            }


        document.getElementById(elementID).innerHTML = time;
            duration = null;

    }

    function subStrAfterChars(str, char){
        str = str.toString();
       return str.substring(str.indexOf(char) + 1);
    }

    function displaySongInfo(){
        //display name
        var parts = audioSource.split('/');
        var last = parts.length-1;
        var name = parts[last];

        if (name.indexOf('cut_') > -1){
            //is a cut
            var nameparts = name.split('cut_');
            var string = '';
            var i = 0;
            for(var item in nameparts){
                var prestring = '';
                if(i === 0){
                    //first
                    string += 'Current wave name:<br> <strong>' +nameparts[item] + 'cut_</strong><br><br>';

                }else{
                    if(nameparts[item].length > lengthOfSampleCutName){
                        //original
                        string += 'Origin:<br> <strong>'+nameparts[item] + '</strong><br>';
                    }else{
                        //is cut
                         string += 'Cut from:<br> <strong>' +nameparts[item] + 'cut_</strong><br><br>';

                    }
                }

                i++;
            }
        }else{
        //origin.
//       show children
            var nameparts = waves.samples;
            var string = '';
            var i = 0;
            for(var item in nameparts){
                var prestring = '';
                if(i === 0){
                    //first
                    string += 'Current wave name:<br> <strong>' +nameparts[item] + '</strong><br><br>Origin to these samples <br>';

                }else{
                    if(nameparts[item].indexOf(name) > -1){
                        if(nameparts[item].length > lengthOfSampleCutName){
                             string += ' <strong>' +nameparts[item].split('cut_')[0] + '</strong><br><br>';
                        }
                    }
                }

                i++;
            }

        }
        var songtitle = document.getElementById('songinformation');
        songtitle.innerHTML = string;



    }
    function removeRegion(){
        wavesurfer.clearRegions();
        deselectRegion();
        hideRemoveRegionBtn();
    }

    function deselectRegion(){
        toggleClass(document.getElementById('leftPanel'));
        turnSecondCounterIntoNiceFormat(0,'startmark');
        turnSecondCounterIntoNiceFormat(0,'endmark');
    }

    // functions
    function setMark(){
        console.log(this.getAttribute('id'));
    }

    function play_pause(){
        console.log('play pause funk');
        wavesurfer.playPause();
        //toggle on off class
        toggleClass(document.getElementById("play_pause"));

    }

    function playFromMark(start_mark, end_mark){
        wavesurfer.play(start_mark, end_mark);
    }

     function buildEqualizer(){
        var eq_div = document.createElement('div');
            eq_div.setAttribute('id','equalizer');
            var sc = document.getElementById('snatcher_controls');
            sc.appendChild(eq_div);
            equalizer();
     }

    function equalizer(){
        // Equalizer
        wavesurfer.on('ready', function () {
          var EQ = [
            {
              f: 32,
              type: 'lowshelf'
            }, {
              f: 64,
              type: 'peaking'
            }, {
              f: 125,
              type: 'peaking'
            }, {
              f: 250,
              type: 'peaking'
            }, {
              f: 500,
              type: 'peaking'
            }, {
              f: 1000,
              type: 'peaking'
            }, {
              f: 2000,
              type: 'peaking'
            }, {
              f: 4000,
              type: 'peaking'
            }, {
              f: 8000,
              type: 'peaking'
            }, {
              f: 16000,
              type: 'highshelf'
            }
          ];

          // Create filters
          var filters = EQ.map(function (band) {
            var filter = wavesurfer.backend.ac.createBiquadFilter();
            filter.type = band.type;
            filter.gain.value = 0;
            filter.Q.value = 1;
            filter.frequency.value = band.f;
            return filter;
          });

          // Connect filters to wavesurfer
          wavesurfer.backend.setFilters(filters);

          // Bind filters to vertical range sliders
          var container = document.querySelector('#equalizer');
          filters.forEach(function (filter) {
            var input = document.createElement('input');
            wavesurfer.util.extend(input, {
              type: 'range',
              min: -40,
              max: 40,
              value: 0,
              title: filter.frequency.value
            });
            input.style.display = 'inline-block';
            input.setAttribute('orient', 'vertical');
            wavesurfer.drawer.style(input, {
              'webkitAppearance': 'slider-vertical',
              width: '50px',
              height: '150px'
            });
            container.appendChild(input);

            var onChange = function (e) {
              filter.gain.value = ~~e.target.value;
            };

            input.addEventListener('input', onChange);
            input.addEventListener('change', onChange);
          });

          // For debugging
          wavesurfer.filters = filters;
        });
    }

    function objectKeyByValue (obj, val) {
        return Object.keys(obj)[Object.values(obj).indexOf(val)];
    }

    function showLoader(){
        var d = document.getElementById('loader');
            d.className = " showMe";
    }

    function hideLoader(){
        var d = document.getElementById('loader');
            d.className = "";
    }

    function smallScreenFix(){
        // small screen fix
        // Fixedsidebar, fixes problem when resize
        if(window.innerWidth < 1467){
            document.getElementById('scene').className = "wrapper fixedSidebar";
            document.getElementById('timerPanel').className = "wrapper fixedSidebar";
        }
        //resize small screen fix
        window.onresize = function(event) {
            if(window.innerWidth < 1467){
                document.getElementById('scene').className = "wrapper fixedSidebar";
                document.getElementById('timerPanel').className = "wrapper fixedSidebar";
            }else{
                document.getElementById('scene').className = "wrapper";
                document.getElementById('timerPanel').className = "wrapper";
            }

            wavesurfer.empty();
            wavesurfer.drawBuffer();
    //        minimap.drawBuffer();


            makePrettyOverflowOnSidebarColumns();
        };
    }

    /* Replace img src=svg with actuall svg */
    /*
 * Replace all SVG images with inline SVG
 */
//jQuery('img.svg').each(function(){
//    var $img = jQuery(this);
//    var imgID = $img.attr('id');
//    var imgClass = $img.attr('class');
//    var imgURL = $img.attr('src');
//
//    jQuery.get(imgURL, function(data) {
//        // Get the SVG tag, ignore the rest
//        var $svg = jQuery(data).find('svg');
//
//        // Add replaced image's ID to the new SVG
//        if(typeof imgID !== 'undefined') {
//            $svg = $svg.attr('id', imgID);
//        }
//        // Add replaced image's classes to the new SVG
//        if(typeof imgClass !== 'undefined') {
//            $svg = $svg.attr('class', imgClass+' replaced-svg');
//        }
//
//        // Remove any invalid XML tags as per http://validator.w3.org
//        $svg = $svg.removeAttr('xmlns:a');
//
//        // Check if the viewport is set, if the viewport is not set the SVG wont't scale.
//        if(!$svg.attr('viewBox') && $svg.attr('height') && $svg.attr('width')) {
//            $svg.attr('viewBox', '0 0 ' + $svg.attr('height') + ' ' + $svg.attr('width'))
//        }
//
//        // Replace image with new SVG
//        $img.replaceWith($svg);
//
//    }, 'xml');
//
//});
</script>
