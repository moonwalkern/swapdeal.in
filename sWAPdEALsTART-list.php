<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Pure Web 2.0</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" type="text/css" href="css/style1.css"/>
<link href="css/lightbox.css" rel="stylesheet" />
<link href="css/TableCSSRed-1.css" rel="stylesheet" />

<script type="text/javascript" src="/_lib/jquery.js"></script>
<script type="text/javascript" src="/_lib/jquery.cookie.js"></script>
<script type="text/javascript" src="/_lib/jquery.hotkeys.js"></script>
<script type="text/javascript" src="jquery.jstree.js"></script>
<link type="text/css" rel="stylesheet" href="/_docs/syntax/!style.css"/>
<link type="text/css" rel="stylesheet" href="/_docs/!style.css"/>
<!--[if IE]><link rel="stylesheet" type="text/css" href="ie_style.css" /><![endif]-->
<!--[if lt IE 7]>
<script language="JavaScript">

</script>
<![endif]-->

<script src="js/jquery-1.10.2.min.js"></script>
<script src="js/lightbox-2.6.min.js"></script>

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
    			 //alert(responseText);
                 document.getElementById("searchDiv").innerHTML = responseText;
				 			 		});
				 
		}
	</script>
    			
</head>
<body>
<a href="img/demopage/image-2.jpg" data-lightbox="roadtrip">image #2</a>
<a href="img/demopage/image-3.jpg" data-lightbox="roadtrip"></a>
<a href="img/demopage/image-4.jpg" data-lightbox="roadtrip"></a>
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
	<script type="text/javascript" class="source below">
$(function () {
	// TO CREATE AN INSTANCE
	// select the tree container using jQuery
	$("#demo1")
		// call `.jstree` with the options object
		.jstree({
			// the `plugins` array allows you to configure the active plugins on this instance
			"plugins" : ["themes","html_data","ui","crrm","hotkeys"],
			// each plugin you have included can have its own config object
			"core" : { "initially_open" : [ "phtml_1" ] }
			// it makes sense to configure a plugin only if overriding the defaults
		})
		// EVENTS
		// each instance triggers its own events - to process those listen on the container
		// all events are in the `.jstree` namespace
		// so listen for `function_name`.`jstree` - you can function names from the docs
		.bind("select_node.jstree", function (event, data) {
			// you get two params - event & data - check the core docs for a detailed description
			alert(data.rslt.obj.attr("id"));
		});
	// INSTANCES
	// 1) you can call most functions just by selecting the container and calling `.jstree("func",`
	setTimeout(function () { $("#demo1").jstree("set_focus"); }, 500);
	// with the methods below you can call even private functions (prefixed with `_`)
	// 2) you can get the focused instance using `$.jstree._focused()`. 
	setTimeout(function () { $.jstree._focused().select_node("#phtml_1"); }, 1000);
	// 3) you can use $.jstree._reference - just pass the container, a node inside it, or a selector
	setTimeout(function () { $.jstree._reference("#phtml_1").close_node("#phtml_1"); }, 1500);
	// 4) when you are working with an event you can use a shortcut
	$("#demo1").bind("open_node.jstree", function (e, data) {
		// data.inst is the instance which triggered this event
		data.inst.select_node("#phtml_2", true);
	});
	setTimeout(function () { $.jstree._reference("#phtml_1").open_node("#phtml_1"); }, 2500);
});
</script>
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
