<?php session_start(); ?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<html LANG=ru> 
<title> reader </title>
<link rel="stylesheet"  href="style/common.css" />
<script language=JavaScript type="text/javascript" src="script/plugins/jquery-3.1.1.min.js"></script>
<script language=JavaScript type="text/javascript" src="script/plugins/jquery.foggy.min.js"></script>

<link type="text/css" href="//fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet"/>
<link href='https://fonts.googleapis.com/css?family=Jura' rel='stylesheet'>
<link href='https://fonts.googleapis.com/css?family=PT Serif Caption' rel='stylesheet'>
<link href='https://fonts.googleapis.com/css?family=Ubuntu' rel='stylesheet'> 

<link href='https://fonts.googleapis.com/css?family=Kameron' rel='stylesheet'>
<link href='https://fonts.googleapis.com/css?family=Khula' rel='stylesheet'>
<link href='https://fonts.googleapis.com/css?family=Rasa' rel='stylesheet'>
<link href='https://fonts.googleapis.com/css?family=Swanky and Moo Moo' rel='stylesheet'> 
</head>

<body id='body' class='body_bkg' id='reader_body' onresize="reader_resize()">
<?php include 'script/reader.php'; ?>    
<!-- <div id='reader_buttons_area' class='buttons_area'></div> -->
<!-- <div style='position:fixed; top:0%; left:0%;background-color:#5c4023; opacity:0.1;width:100vw;height:7vh;'></div> -->

<div hidden id='hidden_text_parsed' style='position:fixed; top:0%; left:0%'>0</div>
<div hidden id='hidden_text' style='position:fixed; top:45%; left:83%'>0</div>
<div hidden id='temp' style='position:fixed; top:50%; left:83%'>0</div>

<div id='base_elements'>
    <div id='buttons_area' class='buttons_area'></div>
</div>
<div id='created_elements'> </div>
<div id='editor_base_elements'> </div>
<div id='editor_created_elements'> </div>

<div hidden id="reader_forms"> 
<form action="" method="post">  
	<input id="freader_save_text"       type="text"   name="freader_save_text"        value="empty" >
	<input id="freader_save_submit"     type="submit" name="freader_save_submit"      value="empty" >
	<input id="freader_sendmail_submit" type="submit" name="freader_sendmail_submit"  value="empty" >
</form>
</div>

<script language=JavaScript type="text/javascript" src="script/common.js"></script> 
<script language=JavaScript type="text/javascript" src="script/reader.js"></script>
<script language=JavaScript type="text/javascript" src="script/editor.js"></script>

</body>
</html>