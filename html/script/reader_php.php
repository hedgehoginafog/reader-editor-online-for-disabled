<?php
session_start();
if ($_SESSION["session_reader"]!=10){
	$_SESSION["session_reader"] = 10;
	$_SESSION["reader_counter"] = 0;
	}
//-- go ---------------------------------------------------------------------
if (isset($_POST['reader_menu_go_files'])) {
	header('Location:/index.html');
	}	
if (isset($_POST['reader_menu_go_file1'])) {
	header('Location:/index.html');
	}

echo '<div style="left: 85%; top: 46%; position:fixed;"> 
<form action="" method="post"> <input type="text" id="word_i" name="lastname" value="Mouse" style="width:0%;height:0%;">
<input type="submit" value="edit" name="edit_word" class="buttons" style="left: 85%; top: 46%; position:fixed;height:5%;">
	</div>';
if (isset($_POST['edit_word'])) {
	$_SESSION["editor_exit"] = '/reader.html';
	$_SESSION["letter_counter"]=0;
	$_SESSION["word_i"] = $_POST["lastname"];
	header('Location:/editor_word.html');
}

//-- text -------------------------------------------------------------------
//$test = "<em id='w53'> the</em><em id='w54'> arsenic</em>";
$new_text = parse_text($_SESSION["file_text"]);
echo "<div id='text_from_file' class='text_scroll' > $new_text </div>";

//-- buttons ----------------------------------------------------------------
echo '<div id="reader_menu" style="left: 85%;	top: 2%; position:fixed;"> 
	<form action="" method="post"> <input type="submit" value="menu" name="reader_menu" class="buttons" style="width:14%;">
	</div>';

echo '<div id="paragraph_sentence_word" style="left: 85%; top: 53%; position:fixed; "> 
	<input type="button" class="buttons" value="type" onclick="change_type(type);"  style="width:14%;">   
	</div>';


echo '<div id="next" style="left: 65%; top: 75%; position:fixed; "> 
	<input type="button" class="buttons" value="prev" onclick="scrollbut_div(prev);"  style="width:14%;">   
	</div>';
echo '<div id="prev" style="left: 85%; top: 75%; position:fixed;"> 
	<input type="button" class="buttons" value="next" onclick="scrollbut_div(next);"  style="width:14%;">   
	</div>';

//-- menu -------------------------------------------------------------------
if (isset($_POST['reader_menu'])) {
	echo "<div class='buttons' style='width:100%; height:100%; left:0%; top:0%;background-color: rgba(0,0,0,0.4);' > </div>";
	echo "<div class='buttons' style='width:80%; height:86%; left:10%; top:7%;background-color: rgba(255,255,255,0.9);' > </div>";
	echo '<div id="reader_menu_appearance" style="left: 15%; top: 15%; position:fixed;"> 
		<form action="" method="post"> <input type="submit" value="appearance" name="reader_menu_appearance" class="buttons" >
		</div>';
	echo '<div id="reader_menu_appearance-common" style="left: 35%; top: 15%; position:fixed;"> 
		<form action="" method="post"> <input type="submit" value="appearance common" name="reader_menu_appearance-common" class="buttons" >
		</div>';
	echo '<div id="reader_menu_edit" style="left: 68%; top: 15%; position:fixed;"> 
		<form action="" method="post"> <input type="submit" value="edit" name="reader_menu_edit" class="buttons" >
		</div>';
	echo '<div id="reader_menu_sound" style="left: 15%; top: 50%; position:fixed;"> 
		<form action="" method="post"> <input type="submit" value="sound" name="reader_menu_sound" class="buttons" >
		</div>';
	echo '<div id="reader_menu_go" style="left: 68%; top: 50%; position:fixed;"> 
		<form action="" method="post"> <input type="submit" value="go" name="reader_menu_go" class="buttons" >
		</div>';
	//header('Location:/index.html');
	}

if (isset($_POST['reader_menu_appearance'])) {
	header('Location:/reader.html');
	}
if (isset($_POST['reader_menu_edit'])) {
	header('Location:/reader.html');
	}
if (isset($_POST['reader_menu_sound'])) {
	header('Location:/reader.html');
	}

if (isset($_POST['reader_menu_go'])) {
	echo "<div class='buttons' style='width:100%; height:100%; left:0%; top:0%;background-color: rgba(0,0,0,0.4);' > </div>";
	echo "<div class='buttons' style='width:80%; height:86%; left:10%; top:7%;background-color: rgba(255,255,255,0.9);' > </div>";
	echo '<div id="reader_menu_go_files" style="left: 15%; top: 15%; position:fixed;"> 
		<form action="" method="post"> <input type="submit" value="files" name="reader_menu_go_files" class="buttons" >
		</div>';
	echo '<div id="reader_menu_go_file1" style="left: 35%; top: 15%; position:fixed;"> 
		<form action="" method="post"> <input type="submit" value="file1" name="reader_menu_fo_file1" class="buttons" >
		</div>';
	//header('Location:/index.html');
	}	

//-- appearance-common ------------------------------------------------------
if (isset($_POST['reader_menu_appearance-common'])) {
	echo "<div class='buttons' style='width:100%; height:100%; left:0%; top:0%;background-color: rgba(0,0,0,0.4);' > </div>";
	echo "<div class='buttons' style='width:80%; height:86%; left:10%; top:7%;background-color: rgba(255,255,255,0.9);' > </div>";
	echo '<div id="reader_menu_appearance-common_reset" style="left: 15%; top: 15%; position:fixed;"> 
		<form action="" method="post"> <input type="submit" value="reset" name="reader_menu_appearance-common_reset" class="buttons" >
		</div>';
	echo '<div id="reader_menu_appearance-common_buttonsize" style="left: 35%; top: 15%; position:fixed;"> 
		<form action="" method="post"> <input type="submit" value="button size" name="reader_menu_appearance-common_buttonsize" class="buttons" >
		</div>';
	//header('Location:/reader.html');
	}
if (isset($_POST['reader_menu_appearance-common_reset'])) {
	header('Location:/reader.html');
	}
if (isset($_POST['reader_menu_appearance-common_buttonsize'])) {
	header('Location:/reader.html');
	}
//---------------------------------------------------------------------------

function parse_text($text_origin){
	$arr = array();
	$i_start=0;
	$proceed = 1;
	$k=0;
	while ($proceed==1){
		$k+=1;
		$i = strpos($text_origin,' ',$i_start+1);
		//echo ' III-'.$i;
		if ($i==False){
			$word = substr($text_origin,$i_start);
			$proceed=0; }
		else{
			$word = substr($text_origin,$i_start,$i-$i_start); 
			$i_start = $i;
			}
		array_push($arr, $word);
		//echo ' WORD '.$i.' '.$word;
		if ($word==' '){echo 'EMPTY!!!!!';}
		if (strpos($word,'\n')!=False){echo 'PARAGRAPH!!!';}
		}
	//$tag = 'mark style="background-color: rgba(0,0,0,0);"';
	$tag = 'em';
	//$text = '<div id="p0"><em id="p0s0"><em id="p0s0w0">';
	$text = "<div id='p0'><$tag id='s0'><$tag id='w0'>";
	$i_w = 1; $i_s = 1; $i_p = 1;
	//$arr_w=['p0s0w0']; $arr_s=['p0s0']; $arr_p=['p0'];
	$arr_w=['w0']; $arr_s=['s0']; $arr_p=['p0'];
	for ($k=0; $k<count($arr); $k++){
		$word=$arr[$k];
		
		if ($k==count($arr)-1){ $text = $text.$word."</$tag></$tag></div>";}

		else{
			if ( strpos($word,'\n')!=False ){ 
				//$text = $text.'|'.$word.'|'."</$tag></$tag></div><div id=p$i_p><$tag id=p$i_p"."s$i_s><$tag id=p$i_p"."s$i_s"."w$i_w>";
				$text = $text.$word."</$tag></$tag></div><div id=p$i_p><$tag id=s$i_s><$tag id=w$i_w>";
				array_push($arr_p, "p$i_p");
				$i_p+=1; $i_s+=1; $i_w+=1;
				}
			elseif ( strpos($word,'.')!=False ){ 
				//$text = $text.'|'.$word.'|'."</$tag></$tag><$tag id=p$i_p"."s$i_s><$tag id=p$i_p"."s$i_s"."w$i_w>";
				$text = $text.$word."</$tag></$tag><$tag id=s$i_s><$tag id=w$i_w>";
				array_push($arr_s, "p$i_p"."s$i_s");
				$i_s+=1; $i_w+=1;
				}
			else{ 
				//$text = $text.'|'.$word.'|'."</$tag><$tag id=p$i_p"."s$i_s"."w$i_w>";
				$text = $text.$word."</$tag><$tag id=w$i_w>";
				array_push($arr_w, "p$i_p"."s$i_s"."w$i_w");
				$i_w+=1;
				}
			}
			 
		}
	//echo $text;
	//echo "<div style='position:fixed; top:20%; left:15%'>".$text."</div>";
	//echo "<div style='position:fixed; top:20%; left:1%'>".htmlspecialchars($text)."</div>";
	//echo "$lt ".$text."$gt";
	//echo htmlspecialchars($text);
	//echo "<div id='hidden_array_p' style='position:fixed; top:40%; left:85%'>$arr_p</div>";
	//echo "<div id='hidden_array_s' style='position:fixed; top:42%; left:85%'>$arr_s</div>";
	//echo "<div id='hidden_array_w' style='position:fixed; top:44%; left:85%'>".htmlspecialchars($arr_w)."</div>";
	//echo "<div id='text_from_file' class='buttons' style='width:83%; height:95%; left:1%; top:2%;background-color: rgba(255,255,255,0.1);' >  $text </div>";
	return ($text);
}
?>
