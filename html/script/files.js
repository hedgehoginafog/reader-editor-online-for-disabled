
//alert('scroll_test');
var files_session = localStorage.getItem('files_session');
if (files_session!='started'){
	files_session = 'started';
	localStorage.setItem('files_session', files_session);
	localStorage.setItem('files_iter', JSON.stringify(1));
	}
var files_iter = JSON.parse(localStorage.getItem('files_iter'));
var nentry = document.getElementById('hidden_files_nentry').innerHTML;

//alert('scroll_test');
function scroll_files(order){
	files_iter = JSON.parse(localStorage.getItem('files_iter'));
	//alert('scroll');
	//var files_iter = JSON.parse(localStorage.getItem('files_iter'));
	if (order==next){ if (files_iter<nentry) {files_iter+=1;} }
	if (order==prev){ if (files_iter>0) {files_iter-=1;} }
	//files_iter+=1;
	localStorage.setItem('files_iter', JSON.stringify(files_iter));
	document.getElementById('hidden_file_iter').innerHTML='iter:'+JSON.stringify(files_iter);
	document.getElementById('file_n').value = files_iter; 
	}

//---------------------------------------------------------------------------
function new_file(){
	//alert('hello');
	//text = '<input type="button" class="buttons" value="folder" onclick="alert();" style="width:32%"> ';
	text = '<form action="" class="buttons" method="post" style="width:32%"> <input type="text" name="dir_name"><br> <input type="submit" value="button">';
	var temp_div = document.getElementById('files_button_foptions');
	temp_div.innerHTML=text;
	document.getElementById('files_button_enter').innerHTML='';
	//text = '<input type="button" class="buttons" value="txt file" onclick="alert();" style="width:32%"> ';
	text = '<form action="" class="buttons" method="post" style="width:32%"> <input type="text" name="file_name"><br> <input type="submit" value="button">';
	var temp_div = document.getElementById('files_button_prev');
	temp_div.innerHTML=text;
	document.getElementById('files_button_next').innerHTML='';
	}

function show_letters(n){
	//alert('hello');
	text = '<div style="left: 84%;	top: 8%; position:fixed;"> <form action="" method="post"> <input type="submit" value="edit" name="edit_word" class="buttons"> </div>';
	text = '<form action="" class="buttons" method="post" style="width:32%"> <input type="text" name="dir_name"><br> <input type="submit" value="button">';
	var temp_div = document.getElementById('input_area');
	//temp_div.innerHTML=text;
	//document.getElementById('files_button_enter').innerHTML='';
	}
	

