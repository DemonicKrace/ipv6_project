<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>軟體搜尋</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900" rel="stylesheet" />
<link href="default.css" rel="stylesheet" type="text/css" media="all" />
<link href="fonts.css" rel="stylesheet" type="text/css" media="all" />

<!--[if IE 6]><link href="default_ie6.css" rel="stylesheet" type="text/css" /><![endif]-->
<script type="text/javascript" src="jquery.js"></script>

</head>
<body>
<div id="header-wrapper">
	<div id="header" class="container">
		<div id="logo">
			<h1></span><a href="index.html">支援IPv6軟硬體資料庫系統</a></h1>
		</div> 
		<div id="menu">
			<ul>
				<li class="current_page_item"><a href="hardware.php" accesskey="1" title="">IPv6硬體<br>支援查詢</a></li>
				<li><a href="software.php" accesskey="2" title="">IPv6軟體<br>支援查詢</a></li>
				<li><a href="device.php" accesskey="3" title="">IPv6相容<br>設備查詢</a></li>
				<li><a href="manufacturer.html" accesskey="4" title="">常用廠商<br>聯絡資料</a></li>
<!--				<li><a href="update_login.php" accesskey="4" title="">廠商資料<br>更新上傳</a></li>-->
				<li><a href="http://interop.ipv6.org.tw/index.php" target="_blank" accesskey="5" title=""><img src="images/logo.png" height="80px" style=" margin-top:-1.5em"></a></li>
			</ul>
		</div>
	</div>
</div>

<div id="wel">
	<div class="container">
		<h2>IPv6軟體支援查詢</h2>
			
			<form action="software_search_result.php" method="post"  name="Search" id="Search">

				<h1>
				<br />
				　設備類型:
				<select id="myParentSelect" Style="Font-Size:20pt">
					<option value="0">請選擇(*必選)</option>
				<?php
					
					//預計以後使用其他方式作第一個下拉式選單內容的初始化						
					echo '<option value="' . $j=5 . '">DNS伺服器軟體</option>' . "\n";
					echo '<option value="' . $j=8 . '">Web伺服器軟體</option>' . "\n";
					echo '<option value="' . $j=9 . '">E-mail伺服器軟體</option>' . "\n";
					echo '<option value="' . $j=10 . '">FTP伺服器軟體</option>' . "\n";
					echo '<option value="' . $j=11 . '">交換器作業系統</option>' . "\n";
					echo '<option value="' . $j=12 . '">路由器作業系統</option>' . "\n";
					
				?>
				</select>
				<br />
				<br />
				　品牌:
				<select id="myFirstChildSelect" Style="Font-Size:16pt">
					<option value="0">請選擇</option>
				</select>
				<br />
				<br />
				　版本:
				<select id="mySecondChildSelect" Style="Font-Size:20pt">
					<option value="0">請選擇</option>
				</select><br />

				<script> 
				$(document).ready(function(){  
				 	 //-------------------------更新 第2層 品牌-------------------------------
				   $('#myParentSelect').change(function(){  
				      //更動第一層時第二,三層清空
				     $('#myFirstChildSelect').empty().append("<option value='0'>請選擇</option>");
					 $('#mySecondChildSelect').empty().append("<option value='0'>請選擇</option>");
 				     if($('#myParentSelect').val() != 0){
					     var i=1;
						 var j=0;
					     $.ajax({  
					     type:    "GET",  
					     url:     "software_action.php",  
						  //data : 傳到software_action.php的值 
						  //table: 所選的元素 html輸出的格式，例：負載平衡器
						  //lv   : 所選的元素 selected的option參數，例如：1 (負載平衡器)
						  //
					     data:    {act:'first',table: $('#myParentSelect option:selected').html() ,lv:$('#myParentSelect option:selected').val()},
					     datatype:  "json",  
					     success: function(result){  
					     //當第一層回到預設值時，第二層回到預設位置

					      //依據第一層回傳的值去改變第二層的內容
					      while(i<result.length+1){  
					      $("#myFirstChildSelect").append("<option value='"+i+"'>"+result[j]['Search_menufactor']+"</option>");  
					      i++;
						  j++;
					     }  
					     },  
					     error:  function(error){  
					       alert("error,myParentSelect change"); 
					     }  
					     });
				 	 }
					});   
					   // -------------------------更新 第3層 版本------------------------------
				   $('#myFirstChildSelect').change(function(){  
				      //更動第一層時第二,三層清空
				     $('#mySecondChildSelect').empty().append("<option value='0'>請選擇</option>");

  				     if($('#myFirstChildSelect').val() != 0){				
					     var i=1;
						 var j=0;
					     $.ajax({  
					     type:    "GET",  
					     url:     "software_action.php",  
					     data:    {act:'second',table: $('#myFirstChildSelect option:selected').html() ,lv:$('#myParentSelect option:selected').val()},
					     datatype:  "json",  
					     success: function(result){  
	 				      //依據第2層回傳的值去改變第3層的內容
					      while(i<result.length+1){  
						      $("#mySecondChildSelect").append("<option value='"+i+"'>"+result[j]['Search_version']+"</option>");  
						      i++;
							  j++;
					      }  
					     },  
					     error:  function(error){  
					       alert("error,myFirstChildSelect change"); 
					     }  
					     });
				 	 }
					});
					   // -------------------------收尾用------------------------------
				   $('#mySecondChildSelect').change(function(){  

				   	 if($('#mySecondChildSelect').val() != 0){
					     $.ajax({  
					     type:    "GET",  
					     url:     "software_action.php",  
					     data:    {act:'third',table: $('#mySecondChildSelect option:selected').html() ,lv:$('#myParentSelect option:selected').val()},
					     datatype:  "json" ,
						  success: function(result){  
					      
					     },  
					     error:  function(error){  
					       alert("error,mySecondChildSelect change"); 
					     }
					     });
					 }
					});
				});
				</script>
				<br />
				<br />
				<input Style="Font-Size:20pt; background-color:#45443D; color:#FFF" name="確認送出" type="submit" value="確認送出" /></h1>
			</form>


		</div>
	</div>

<div id="copyright" class="container">
	<h1><p>本網站建置經費由財團法人台灣網路資訊中心-TWNIC 贊助</p></h1>
	<h2><p>&copy;Design by <a href="http://www.mcu.edu.tw" target="_blank">MCU</a>銘傳大學製作</p></h2>
</div>
</body>
</html>
