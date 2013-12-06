<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Pure Web 2.0</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" type="text/css" href="style1.css" />


<!--[if IE]><link rel="stylesheet" type="text/css" href="ie_style.css" /><![endif]-->
<!--[if lt IE 7]>
<script language="JavaScript">

</script>
<![endif]-->
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
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
        xmlhttpPost("http://localhost/swapdeal.in/php/SwapRealRecords.php");
        
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
    
	function updatepage(str){
	   alert("got response");
	   alert(str);
    }	
	function search(){
			 	 var response;
				 alert("search");
				 //xmlhttpPost("http://localhost/swapdeal.in/php/SwapRealRecords.php");
				 //alert(document.getElementById("searchDiv"));
				 $.get("http://localhost/swapdeal.in/php/SwapRealRecords.php", function(responseText) {
    			 alert(responseText);document.getElementById("searchDiv").innerHTML = responseText;
				 			 		});
				 
		}
	</script>			
</head>
<body>
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
        <br />
        Mauris porttitor, eros at cursus fermentum, felis nibh rhoncus quam, a volutpat enim mauris at elit.<br />
        <br />
        <em>Lorem ipsum dolor sit amet</em></div>
  </div>
</div>	
<div id="headerBox">
       <div id="example1">
		<h4>Slide <a class="expand_all"><img src="images/expand.gif" alt="" /></a> <a class="collapse_all"><img src="images/collapse.gif" alt="" /></a></h4>
		<ul id="menu1" class="example_menu">
			<li><a class="expanded">Section A</a>
		<ul>
			<li><a href="#">Link A-A</a>
		<ul>
			<li><a href="#">Link A-A-A</a></li>
			<li><a href="#">Link A-A-B</a></li>
		</ul>
		</li>
			<li class="active"><a href="#">Link A-B</a></li>
			<li><a href="#">Link A-C</a></li>
			<li><a href="#">Link A-D</a></li>
		</ul>
		</li>
			<li class="footer"><span> </span></li>
			<li><a class="collapsed">Section B</a>
		<ul>
			<li><a href="#">Link B-A</a>
		<ul>
			<li><a href="#">Link B-A-A</a></li>
			<li><a href="#">Link B-A-B</a></li>
			<li><a href="#">Link B-A-C</a></li>
		</ul>
		</li>
			<li><a href="#">Link B-B</a>
		<ul>
			<li><a href="#">Link B-B-A</a></li>
			<li><a href="#">Link B-B-B</a></li>
		</ul>
		</li>
			<li><a href="#">Link B-C</a></li>
			<li><a href="#">Link B-D</a></li>
		</ul>
		</li>
			<li class="footer"><span> </span></li>
			<li><a class="collapsed">Section C</a>
		<ul>
			<li><a href="#">Link C-A</a></li>
			<li><a href="#">Link C-B</a></li>
			<li><a href="#">Link C-C</a></li>
			<li><a href="#">Link C-D</a></li>
		</ul>
		 	<li class="footer"><span> </span></li>
			<li><a class="collapsed">Section D</a>
		<ul>
			<li><a href="#">Link C-A</a></li>
			<li><a href="#">Link C-B</a></li>
			<li><a href="#">Link C-C</a></li>
			<li><a href="#">Link C-D</a></li>
		</ul>
		</li>
			<li class="footer"><span> </span></li>
		</ul>
	</div>
	<div id="servicesbox">
    <div class="servicesItem" id="searchDiv">
      <table class="myTable">
      <tr>
      <th>Table Header</th><th>Table Header</th>
      </tr>
      <tr>
      <td>Table cell 1</td><td>Table cell 2</td>
      </tr>
      <tr>
      <td>Table cell 3</td><td>Table cell 4</td>
      </tr>
      </table>
<table class="curvedEdges">
<tr>
<th>Table header</th><th>Table header</th>
</tr>
<tr>
<td>Table cell 1</td><td>Table cell 2</td>
<td>Table cell 1</td><td>Table cell 2</td>
</tr>
</table>

<table class="imagetable"  >
<tr>
	<th>Page</th><th>1 of 10</th><th>&nbsp;</th><th>&nbsp;</th>
</tr>
<tr>
	<td><b>Text 1A</b><p>ssss</p><p>ssss</p></td><td>Text 1B</td><td>Text 1C</td><td>Text 1C</td>
</tr>
<tr>
	<td>Text 2A</td><td>Text 2B</td><td>Text 2C</td><td>Text 1Csssssssssssss</td>
</tr>
</table>


    </div>

</body>
</html>
