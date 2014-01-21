<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>SwapDeal</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" type="text/css" href="css/style1.css"/>



<!-- Links for CSS and JavaScripts -->
<link href="postform/bootstrap/css/bootstrap.css" rel="stylesheet">
<link href="postform/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="postform/css/canvas.css" rel="stylesheet">
<link href="postform/css/canvas.css" rel="stylesheet">
<link href="postform/css/jTools.css" rel="stylesheet">
<link href="postform/js/usertools_run.css" rel="stylesheet">




<script src="postform/js/canvas_libs.js"></script>

<script src="postform/js/usertools_design.js"></script>
<script src="postform/js/usertools_run.js"></script>
<script type="text/javascript" src="js/Ajaxfileupload-jquery-1.3.2.js" ></script>
<script type="text/javascript" src="js/ajaxupload.3.5.js" ></script>
<script type="text/javascript" >

    function call_insert(){
        var data = $( "#myform" ).serialize();
        var data1 = $( "#category" ).val();
        $.ajax({
       type: "POST",
       url: "php/SwapItemInsert.php",
       data: data
      
     });
    }
    
    
    function insert(){
			 	 var response;
				 //alert("search");
				 //xmlhttpPost("http://localhost/swapdeal.in/php/SwapAjax.php");
				 //alert(document.getElementById("searchDiv"));
				 $.post("http://localhost/swapdeal.in/php/SwapItemInsert.php", function(responseText) {
    			 alert(responseText);
                 //document.getElementById("searchDiv").innerHTML = responseText;
		 		});
				 
		}
    
	$(function(){
		var btnUpload=$('#me');
		var mestatus=$('#mestatus');
		var files=$('#files');
        var itemid='1';
        
		new AjaxUpload(btnUpload, {
			action: 'php/SwapUploadItems.php',
			name: 'uploadfile',
            itemid: itemid,
			onSubmit: function(file, ext){
				 if (! (ext && /^(jpg|png|jpeg|gif)$/.test(ext))){ 
                    // extension is not allowed 
					mestatus.text('Only JPG, PNG or GIF files are allowed');
					return false;
				}
				mestatus.html('<img src="css/ajax-loader.gif" height="16" width="16">');
			},
			onComplete: function(file, response){
				//On completion clear the status
				mestatus.text('Photo Uploaded Sucessfully!');
				//On completion clear the status
				files.html('');
				//Add uploaded file to list
				if(response==="success"){
					$('<li></li>').appendTo('#files').html('<img src="swapitems/webinfopedia_'+file+'" alt="" height="40" width="40" /><br />').addClass('success');
				} else{
					$('<li></li>').appendTo('#files').text(file).addClass('error');
				}
			}
		});
        btnUpload=$('#me1');
		mestatus=$('#mestatus1');
		files=$('#files1');
        var itemid='2';
        new AjaxUpload(btnUpload, {
			action: 'php/SwapUploadItems.php',
			name: 'uploadfile',
            itemid: itemid,
			onSubmit: function(file, ext){
				 if (! (ext && /^(jpg|png|jpeg|gif)$/.test(ext))){ 
                    // extension is not allowed 
					mestatus.text('Only JPG, PNG or GIF files are allowed');
					return false;
				}
				mestatus.html('<img src="css/ajax-loader.gif" height="16" width="16">');
			},
			onComplete: function(file, response){
				//On completion clear the status
				mestatus.text('Photo Uploaded Sucessfully!');
				//On completion clear the status
				files.html('');
				//Add uploaded file to list
				if(response==="success"){
					$('<li></li>').appendTo('#files1').html('<img src="swapitems/webinfopedia_'+file+'" alt="" height="40" width="40" /><br />').addClass('success');
				} else{
					$('<li></li>').appendTo('#files1').text(file).addClass('error');
				}
			}
		});
		
	});
</script>

<link rel="stylesheet" type="text/css" href="css/Ajaxfile-upload.css" />
<!-- Links for CSS and JavaScripts -->
<style type="text/css">
<!--
body,td,th {
	font-family: Georgia,"Times New Roman",Times,serif;;
	font-size: 12px;
	color: #333;
}
body {
	margin-left: 0px;
	margin-top: 30px;
	margin-right: 0px;
	margin-bottom: 0px;
}
.maindiv{ width:640px; margin:0 auto; padding:20px; background:#CCC;}
.innerbg{ padding:6px; background:#FFF;}
.result{ border:solid 1px #CCC; margin:10px 2px; padding:4px 2px;}
.title a{ font-weight:bold; color:#c24f00; text-decoration:none; font-size:14px;}
.discptn a{ text-decoration:none; color:#999;}
.link a{ color:#008000; text-decoration:none;}
-->
</style>    			
</head>
<body>


<div id="wrapper">

  <div id="head">
    <div id="logo"></div>
    <div id="navi">
      <ul>
        <li>
			
    		<div class="search">
              
    
              <input type="text" placeholder="Search...." name="s" id="s">

              <input name="searchsubmit" type="image" src="images/search.gif" value="Go" id="searchsubmit" class="btn" onClick="search()">
    		  <input name="searchsubmit1" type="button" src="images/search.gif" value="Go" id="searchsubmit" class="btn" onClick="search()">
              </span>
               
    		</div>
		</li>	
      </ul>
    </div>
</div>

<form id="myform">
    <!--Building Post Ad form -->
<div id="servicesbox" style='overflow:auto; width:950px;height:890px;'>
        <!-- legend -->
<legend id="leg65021453" class="">
  Place an Ad
</legend>
<!-- text field -->
<!-- horizontal form -->
<!-- text field -->
<!-- horizontal form -->
<div style="position: relative; left: 0px; top: 0px; width: 1578px; height: 1263px;" id="bform73219655" class="form-horizontal">
  <!-- text field -->
  <div id="bgroup8539264" class="control-group">
    <label class="control-label" for="bform_input8539264">
      Category:
    </label>
    <div class="controls">
      <select id="category" name="category">
        <option>
          Mobile Phones
        </option>
        <option>
          Electronics & Technology
        </option>
        <option>
          Home & Lifestyle
        </option>
        <option>
          Real Estate
        </option>
        <option>
          Cars & Bikes
        </option>
        <option>
          Others
        </option>
      </select>
    </div>
  </div>
   
  <!-- horizontal form -->
  <div id="bgroup462077" class="control-group">
    <label class="control-label" for="bform_input462077">
      Are You:
    </label>
    <div class="controls">
      <label id="lbl53115926" class="radio inline">
        <input name="typecustomer" id="typecustomer1" value="buyer" type="radio" checked="checked">
        Buyer
      </label>
      <label id="lbl53115926" class="radio inline">
        <input name="typecustomer" id="typecustomer2" value="seller" type="radio">
        Seller
      </label>
    </div>
  </div>
  <!-- text field -->
  <div id="bgroup758262239" class="control-group">
    <label class="control-label" for="bform_input758262239">
      Your Ad Title:
    </label>
    <div class="controls">
      <input id="title" name="title" placeholder="Placeholder" type="text">
    </div>
  </div>
  
  <!-- text field -->
  <!-- text field -->
  <!-- text field -->
  <div id="bgroup167292649" class="control-group">
    <label class="control-label" for="bform_input167292649">
      Photos:
    </label>
    <div class="controls">
      
        <table width="630" border="0" cellspacing="0" cellpadding="0">
		    <tr>
		      <td width="194" align="center" valign="middle">
              <div id="me" class="styleall" style=" cursor:pointer;"><input id="itemID" type="text" value="2000"/><span style=" cursor:pointer; font-family:Verdana, Geneva, sans-serif; font-size:9px;"><span style=" cursor:pointer;">Click to Upload Item Pic</span></span></div><span id="mestatus" ></span>
              
              
              </td>
		      <td width="208" align="center" valign="middle"><div id="files">
              <li class="success">
              </li>
              </div>
              </td>
              <td width="228" align="right" valign="center">&nbsp;</td>
	        </tr>		    
	      </table>
          <table width="630" border="0" cellspacing="0" cellpadding="0">
		    <tr>
		      <td width="194" align="center" valign="middle">
              <div id="me1" class="styleall" style=" cursor:pointer;"><span style=" cursor:pointer; font-family:Verdana, Geneva, sans-serif; font-size:9px;"><span style=" cursor:pointer;">Click to Upload Item Pic</span></span></div><span id="mestatus1" ></span>
              
              
              </td>
		      <td width="208" align="center" valign="middle"><div id="files1">
              <li class="success">
              </li>
              </div>
              </td>
              <td width="228" align="right" valign="center">&nbsp;</td>
	        </tr>		    
	      </table>

    </div>
  </div>
  <div style="" id="bgroup462077" class="control-group">
    <label class="control-label" for="bform_input462077">
      Item:
    </label>
    <div class="controls">
      <label id="lbl53115926" class="radio inline">
        <input name="typeitem" id="typeitem1" value="new" type="radio" checked="checked">
        New
      </label>
      <label id="lbl53115926" class="radio inline">
        <input name="typeitem" id="typeitem2" value="old" type="radio">
        Old
      </label>
    </div>
  </div>
  <!-- text field -->
  <div id="bgroup33433312" class="control-group">
    <label class="control-label" for="bform_input33433312">
      Price:
    </label>
    <div class="controls">
      <input id="price" name="price" placeholder="Placeholder" type="text">
      .Rs
    </div>
  </div>
  <!-- text field -->
  <!-- select box -->
  <div id="bgroup443353222" class="control-group">
    <label class="control-label" for="bform_input443353222">
      Brand:
    </label>
    <div class="controls">
      <select id="brand" name="brand">
        <option>
          Sony
        </option>
        <option>
          Samsung
        </option>
        <option>
          LG
        </option>
        <option>
          Reconnect
        </option>
        <option>
          Otheres
        </option>
      </select>
    </div>
  </div>
  <!-- date box -->
  <!-- select box -->
  <!-- legend -->
  <!-- select box -->
  <div id="bgroup8539264" class="control-group">
    <label class="control-label" for="bform_input8539264">
      Brand Feature 1:
    </label>
    <div class="controls">
      <select id="feature1" name="feature1">
        <option>
          LED
        </option>
        <option>
          LCD
        </option>
        <option>
          Plasma
        </option>
        <option>
          CRT
        </option>
        <option>
          Others
        </option>
      </select>
    </div>
  </div>
  <!-- select box -->
  <div style="" id="bgroup27940267" class="control-group">
    <label class="control-label" for="bform_input27940267">
      Brand Feature 2:
    </label>
    <div class="controls">
      <select id="fetature2" name="fetature2">
        <option>
          1
        </option>
        <option>
          2
        </option>
        <option>
          3
        </option>
        <option>
          4
        </option>
        <option>
          5
        </option>
      </select>
    </div>
  </div>
  <!-- select box -->
  <div id="bgroup854412846" class="control-group">
    <label class="control-label" for="bform_input854412846">
      City:
    </label>
    <div class="controls">
      <select id="city" name="city">
        <option>
          Pune
        </option>
        <option>
          Mumbai
        </option>
        <option>
          Chennai
        </option>
        <option>
          Delhi
        </option>
        <option>
          Cochin
        </option>
      </select>
    </div>
  </div>
  <!-- select box -->
  <div id="bgroup600422851" class="control-group">
    <label class="control-label" for="bform_input600422851">
      Locality:
    </label>
    <div class="controls">
      <select id="locality" name="locality">
        <option>
          Wadgonsheri
        </option>
        <option>
          KalyaniNagar
        </option>
        <option>
          KoregonPark
        </option>
        <option>
          Shivaji Nagar
        </option>
        <option>
          Otheres
        </option>
      </select>
    </div>
  </div>
  <!-- text field -->
  <div style="position: relative; left: 0px; top: 0px;" id="bgroup115432944" class="control-group">
    <label class="control-label" for="bform_input115432944">
      Description:
    </label>
    <div class="controls">
      <input id="itemdesc" name="itemdesc" placeholder="Placeholder" type="text">
    </div>
  </div>
  <!-- legend -->
  <legend id="leg679443119" class="">
    Seller / Buyer Details
  </legend>
  <!-- legend -->
  <!-- horizontal form -->
  <div id="bform676645519" class="form-horizontal ui-sortable">
    <!-- text field -->
    <div id="bgroup819655524" class="control-group">
      <label class="control-label" for="bform_input462077">
        Are You:
      </label>
      <div class="controls">
        <label id="lbl53115926" class="radio inline">
          <input name="customertype" id="opt53115926" value="individual" type="radio" checked="checked">
          Indiviual
        </label>
        <label id="lbl53115926" class="radio inline">
          <input name="customertype" id="opt53115926" value="agent/dealer" type="radio">
          Agent/Dealer
        </label>
      </div>
    </div>
    <!-- text field -->
    <div id="bgroup919665527" class="control-group">
      <label class="control-label" for="bform_input919665527">
        Name:
      </label>
      <div class="controls">
        <input id="customername" name="customername" placeholder="Placeholder" type="text">
      </div>
    </div>
    <!-- text field -->
    <div id="bgroup988675528" class="control-group">
      <label class="control-label" for="bform_input988675528">
        Email:
      </label>
      <div class="controls">
        <input id="customeremail" name="customeremail" placeholder="Placeholder" type="text">
      </div>
    </div>
    <!-- text field -->
    <div id="bgroup247685530" class="control-group">
      <label class="control-label" for="bform_input247685530">
        Phone:
      </label>
      <div class="controls">
        <input id="customerphone" name="customerphone" placeholder="Placeholder" type="text">
      </div>
    </div>
    <!-- button -->
    <div class="control-group">
      <div class="controls">
        <button id="placeadbutton" class="btn" onclick="call_insert()">
          Place Ad
        </button>
      </div>
    </div>
  </div>
</div>
    </div>
</div>
</form>
<!--Building Post Ad form End -->
    

</body>
</html>
