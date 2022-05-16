<?php
if(isset($_GET['samplepath'])){ //redirect to interface
    // check the path to validate the folder
    header('Location:interface.php?samplepath='.urlencode($_GET['samplepath']));
}
?>
<!DOCTYPE html>
<html class="js">
<head>
<title></title>
<link href="https://fonts.googleapis.com/css?family=Montserrat|Satisfy" rel="stylesheet">
<style>
*{
    margin:0;
    padding:0;
}
html,body{
    background:#37313d;
    font-family: 'Montserrat', sans-serif;
    font-weight: 100;
}
.container{
    width:80%;
    max-width: 1800px;
    margin-left:auto;
    margin-right:auto;

}
    
#sidebar{
    overflow: hidden;
    position: relative;
    z-index: 20;
    background:#689da1;
    width:15%;
    min-width: 220px;
    height:100vh;
    margin:0;
    float:left;
}

#logo{
    width:155px;
    position: fixed;
    z-index: 10000;
    right: 50px;
    top:25px;
}
#logo #logoimg{
    float: right;
    width:100px;
    height:auto;
}

#logo #loader{
    margin-top: 8px;
    float:left;
    width: 21px;
    height:21px;
    max-height: 21px;
    opacity: 0;
}
#logo #loader.showMe{
    opacity: 1;
    animation-name: rotate;
    animation-duration: 1s; /* or: Xms */
    animation-iteration-count: infinite;  
}
@keyframes rotate {
  from { transform:rotate(0deg);}
  to   { transform:rotate(360deg); }
}

#sidebarnav{
    background:#689da1;
    height:60px;
    position: relative;
    z-index: 10001;
}
#sidebarnav ul{
    margin:0;
    padding:0;
}
#sidebarnav ul li{
    font-size: 13px;
    text-align: center;
    list-style-type: none;
    height:60px;
    width:50%;
    line-height: 60px;
    float:left;
    background: rgba(255,255,255,0.3);
}

#sidebarnav li.active{
    font-weight: bold;
    background:#689da1;
    color:#fff;
}
section{
    position: relative;
    z-index: 10000;
    transform: translateX(-150px) translateY(5%);
    height:100%;
}
section.main:before{
    content: "";
    width: 180%;
    max-width: 1877px;
    height: 260%;
    position: fixed;
    z-index: 1;
    left: calc(2%);
    top: -60%;
    margin-left: -500px;
    opacity: 0.4;
    background-repeat: no-repeat;
    background-attachment: fixed;
    background: -moz-radial-gradient(center, ellipse cover, rgba(255,255,255,1) 0%, rgba(255,255,255,0) 53%, rgba(255,255,255,0) 59%);
    background: -webkit-radial-gradient(center, ellipse cover, rgba(255,255,255,1) 0%,rgba(255,255,255,0) 53%,rgba(255,255,255,0) 59%);
    background: radial-gradient(ellipse at center, rgba(255,255,255,1) 0%,rgba(255,255,255,0) 53%,rgba(255,255,255,0) 59%);
    filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ffffff', endColorstr='#00ffffff',GradientType=1 );
}
section h1{
    padding-top:100px;
    margin-left:-150px;
    color:#fff;
    font-size: 164px;
    letter-spacing: 4px;
    font-family: 'Montserrat', sans-serif;
    font-weight: 100;
    line-height: 159px;
    position: relative;
    z-index: 100000;
}
section h1 span{
    font-size: 130px;
    font-family: 'Satisfy', cursive;
}
</style>
</head>
<body>
    
<div class="wrapper">
    <div class="container">
         <div id="logo">
            <img id="loader" class="svg" src="assets/spinner.svg"/>
            <img id="logoimg" src="assets/logo-dirty-sample-snatcher.svg" class="svg center img-responsive">
        </div>
    </div>
    
    <aside id="sidebar" >
        <nav id="sidebarnav">
            <ul>
                <li id="sampleinfo_button" class="nav_btn active">What is it</li>
                <li id="archive_button" class="nav_btn">How to support</li>
            </ul>
        </nav>
    </aside>
    <section class="main">
        <h1>
            <span>Dirty</span><br>
            SAMPLE<br>
            SNATCHER        
        </h1>
    </section>
    
</div>
    

    <script>

    </script>
</body>
</html>

