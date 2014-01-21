<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>SwapDeal</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" type="text/css" href="css/style1.css"/>
<link href="css/lightbox.css" rel="stylesheet" />
<link href="css/TableCSSRed-1.css" rel="stylesheet" />
<link type="text/css" rel="stylesheet" href="/_docs/syntax/!style.css"/>
<link type="text/css" rel="stylesheet" href="/_docs/!style.css"/>
<link type="text/css" rel="stylesheet" href="css/jquery-ui-1.10.3.custom.css"/>
<style>
    body { font-size: 62.5%; }
    label, input { display:block; }
    input.text { margin-bottom:12px; width:95%; padding: .4em; }
    fieldset { padding:0; border:0; margin-top:25px; }
    h1 { font-size: 1.2em; margin: .6em 0; }
    div#users-contain { width: 350px; margin: 20px 0; }
    div#users-contain table { margin: 1em 0; border-collapse: collapse; width: 100%; }
    div#users-contain table td, div#users-contain table th { border: 1px solid #eee; padding: .6em 10px; text-align: left; }
    .ui-dialog .ui-state-error { padding: .3em; }
    .validateTips { border: 1px solid transparent; padding: 0.3em; }
  </style>
<script src="http://code.jquery.com/jquery-latest.js"></script>
<script type="text/javascript" src="/_lib/jquery.js"></script>
<script type="text/javascript" src="/_lib/jquery.cookie.js"></script>
<script type="text/javascript" src="/_lib/jquery.hotkeys.js"></script>
<script type="text/javascript" src="jquery.jstree.js"></script>
<script src="js/jquery-1.10.2.min.js"></script>
<script src="js/lightbox-2.6.min.js"></script>
<script src="js/jquery-1.9.1.js"></script>
<script src="js/jquery-ui-1.10.3.custom.js"></script>
<script src="js/swapScriptInterest.js"></script>
<script src="js/swapScriptCreate.js"></script>


<script type="text/javascript">
        
		$(document).ready(function() {
			setTimeout(function() {
				// Slide
				$('#menu1 > li > a.expanded + ul').slideToggle('medium');
				$('#menu1 > li > a').click(function() {
					$(this).toggleClass('expanded').toggleClass('collapsed').parent().find('> ul').slideToggle('medium');
				});
				$('#example1 .expand_all').click(function() {
					$('#menu1 > li > a.collapsed').addClass('expanded').removeClass('collapsed').parent().find('> ul').slideDown('medium');
				});
				$('#example1 .collapse_all').click(function() {
					$('#menu1 > li > a.expanded').addClass('collapsed').removeClass('expanded').parent().find('> ul').slideUp('medium');
				});
				// Fade
				$('#menu2 > li > a.expanded + ul').fadeIn();
				$('#menu2 > li > a').click(function() {
					var el = $(this).parent().find('> ul');
					if($(this).hasClass('collapsed'))
						$(el).fadeIn();
					else
						$(el).fadeOut();
					$(this).toggleClass('expanded').toggleClass('collapsed');
				});
				$('#example2 .expand_all').click(function() {
					$('#menu2 > li > a.collapsed').addClass('expanded').removeClass('collapsed').parent().find('> ul').fadeIn();
				});
				$('#example2 .collapse_all').click(function() {
					$('#menu2 > li > a.expanded').addClass('collapsed').removeClass('expanded').parent().find('> ul').fadeOut();
				});
				// Grow/Shrink
				$('#menu3 > li > a.expanded + ul').show('normal');
				$('#menu3 > li > a').click(function() {
					$(this).toggleClass('expanded').toggleClass('collapsed').parent().find('> ul').toggle('normal');
				});
				$('#example3 .expand_all').click(function() {
					$('#menu3 > li > a.collapsed').addClass('expanded').removeClass('collapsed').parent().find('> ul').show('normal');
				});
				$('#example3 .collapse_all').click(function() {
					$('#menu3 > li > a.expanded').addClass('collapsed').removeClass('expanded').parent().find('> ul').hide('normal');
				});
				// Appear/Disappear
				$('#menu4 > li > a.expanded + ul').show();
				$('#menu4 > li > a').click(function() {
					$(this).toggleClass('expanded').toggleClass('collapsed').parent().find('> ul').toggle();
				});
				$('#example4 .expand_all').click(function() {
					$('#menu4 > li > a.collapsed').addClass('expanded').removeClass('collapsed').parent().find('> ul').show();
				});
				$('#example4 .collapse_all').click(function() {
					$('#menu4 > li > a.expanded').addClass('collapsed').removeClass('expanded').parent().find('> ul').hide();
				});
				// Accordion
				$('#menu5 > li > a.expanded + ul').slideToggle('medium');
				$('#menu5 > li > a').click(function() {
					$('#menu5 > li > a.expanded').not(this).toggleClass('expanded').toggleClass('collapsed').parent().find('> ul').slideToggle('medium');
					$(this).toggleClass('expanded').toggleClass('collapsed').parent().find('> ul').slideToggle('medium');
				});
			}, 250);
});
		
	function exposeURL(){
        xmlhttpPost("http://localhost/swapdeal.in/php/SwapAjax.php");
        
    }

   function xmlhttpPost(strURL) {
    	var xmlHttpReq = false;
		alert(strURL);
    	var self = this;
    	// Mozilla/Safari
    	if (window.XMLHttpRequest) {
    		self.xmlHttpReq = new XMLHttpRequest();
    	}
    	// IE
    	else if (window.ActiveXObject) {
    		self.xmlHttpReq = new ActiveXObject("Microsoft.XMLHTTP");
    	}
    	self.xmlHttpReq.open('GET', strURL, true);
    	self.xmlHttpReq.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    	self.xmlHttpReq.onreadystatechange = function() {alert(self.xmlHttpReq.status);
    	if (self.xmlHttpReq.readyState == 4 ) {
        		updatepage(self.xmlHttpReq.responseText);
        	}
    	}
    //	alert(getquerystring);
    	self.xmlHttpReq.send(false);
        //alert("Submit Disposition");
    }
    /*
    function replaySell(){
        alert(document.getElementById('tr_reply').style.visibility);
        document.getElementById('tr_reply').style.visibility = 'visible';
        document.getElementById('div_reply').style.visibility = 'visible';
        
    }*/
	function updatepage(str){
	   alert("got response");
	   alert(str);
    }	
	function search(){
			 	 var response;
				 //alert("search");
				 //xmlhttpPost("http://localhost/swapdeal.in/php/SwapAjax.php");
				 //alert(document.getElementById("searchDiv"));
				 $.get("http://localhost/swapdeal.in/php/SwapRealRecords.php", function(responseText) {
    			 // alert(responseText);
                 document.getElementById("searchDiv").innerHTML = responseText;
		 		});
				 
		}
        
  
       
    $(function(){
        $("#black_only").click(function(){
        $("#white").hide();
        $(".black").hide();
        $(".tr_reply").show();
        
    
   });
   });
   
   $(function(){
        $("#reply1").click(function(){
        $("#white").hide();
        $(".black").hide();
        $(".tr_reply").show();
        
    
   });
   });
   
	</script>
    			
</head>
<body onload="search()">

<div id="dialog-form" title="Express Interest">
  <p class="validateTips">All form fields are required.</p>
 
  <form>
  <fieldset>
    <span style="float:left"><label for="name">Name</label></span>
    <input type="text" name="name" id="name" class="text ui-widget-content ui-corner-all">
    <span style="float:left"><label for="mobile">Mobile</label></span>
    <input type="text" name="mobile" id="mobile" class="text ui-widget-content ui-corner-all">
    <span style="float:left"><label for="email">Email</label></span>
    <input type="text" name="email" id="email" value="" class="text ui-widget-content ui-corner-all">
    <span style="float:left"><label for="rate">Expected Rate</label></span>
    <input type="text" name="rate" id="rate" value="" class="text ui-widget-content ui-corner-all">
    <span style="float:left"><label for="note">Note</label></span>
    <input type="text" name="note" id="note" value="" class="text ui-widget-content ui-corner-all">
  </fieldset>
  </form>
</div>

<div id="dialog-form-create" title="Create new user">
  <p class="validateTips">All form fields are required.</p>
 
  <form>
  <fieldset>
    <span style="float:left"><label for="name">Name</label></span>
    <input type="text" name="name" id="name" class="text ui-widget-content ui-corner-all">
    <span style="float:left"><label for="mobile">Mobile</label></span>
    <input type="text" name="mobile" id="mobile" class="text ui-widget-content ui-corner-all">
    <span style="float:left"><label for="email">Email</label></span>
    <input type="text" name="email" id="email" value="" class="text ui-widget-content ui-corner-all">
    <span style="float:left"><label for="password">Password</label></span>
    <input type="password" name="password" id="password" value="" class="text ui-widget-content ui-corner-all">
  </fieldset>
  </form>
</div>

<div id="dialog" title="Swap Deal Create" style="visibility: hidden">
</div>

<div id="dialogload" title="Swap Deal Create" style="visibility: hidden">
    <img src="img/loading.gif" width="32" height="32" />
</div>
<button id="create-user1">Create new user</button>
<div id="wrapper">

  <div id="head">
    <div id="logo"></div>
    <div id="navi">
      <ul>
        <li>
			
    		<div class="search">
              <form method="get" id="search" action="#"> <span>
    
              <input type="text" placeholder="Search...." name="s" id="s">
    
              <input name="searchsubmit" type="image" src="images/search.gif" value="Go" id="searchsubmit" class="btn" onClick="search()">
    		  <input name="searchsubmit1" type="button" src="images/search.gif" value="Go" id="searchsubmit" class="btn" onClick="search()">
              </span>
    		</div>
		</li>	
      </ul>
    </div>
</div>
<div id="headerBox1">
      <div class="header_h1">sWAP dEAL</div>
      <div class="header_p"> Just Sell.<br />
      <span id="black_only">Show only black</span><br>
      <table>
      <thead>
  <tr class="black">
    <th>Header Text</th>
    <th>Header Text</th>
    <th>Header Text</th>
    <th>Header Text</th>
    <th>Header Text</th>
    <th>Header Text</th>
  </tr>
</thead>
      </table>
        <br />
        <br />
        <br />
        <em></em></div>
      </div>
</div>	
<div id="headerBox">
       <div id="servicesbox1">
		<div class="CSSTableGenerator" id="searchDiv1">
            <div id="demo1" class="demo" style="height:100px;">
	<ul>
		<li id="phtml_1">
			<a href="#">Root node 1</a>
			<ul>
				<li id="phtml_2">
					<a href="#">Child node 1</a>
				</li>
				<li id="phtml_3">
					<a href="#">Child node 2</a>
				</li>
				<li id="phtml_4">
					<a href="#">Child node 3</a>
				</li>
			</ul>
		</li>
		<li id="phtml_1_1">
			<a href="#">Root node 2</a>
			<ul>
				<li id="phtml_1_2">
					<a href="#">Child node 1</a>
				</li>
				<li id="phtml_1_3">
					<a href="#">Child node 2</a>
				</li>
				<li id="phtml_1_4">
					<a href="#">Child node 3</a>
				</li>
			</ul>
		</li>
	</ul>

</div>

            
        </div>
	   </div>
	<div id="servicesbox">
    <div class="servicesItem" id="searchDiv">
   
    </div>
 </div>
 </div>

    

</body>
</html>
