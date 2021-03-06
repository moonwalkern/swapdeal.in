  $(function() {
    var name1 = $( "#name" )
      mobile1 = $("#mobile"),
      email1 = $( "#email" ),
      rate = $( "#rate" ),
      note = $( "#note" ),
      allFields = $( [] ).add( name1 ).add( mobile1 ).add( email1 ).add( rate ).add( note ),
      tips = $( ".validateTips" );
                   
 
    function updateTips( t ) {
      tips
        .text( t )
        .addClass( "ui-state-highlight" );
      setTimeout(function() {
        tips.removeClass( "ui-state-highlight", 1500 );
      }, 500 );
    }
 
    function checkLength( o, n, min, max ) {
        //alert(o.val() + " "+ o.val().length  + " >  " + max + " and " + o.val().length + " < " + min);
      if ( o.val().length > max || o.val().length < min ) {
        o.addClass( "ui-state-error" );
        updateTips( "Length of " + n + " must be between " +
          min + " and " + max + "." );
        return false;
      } else {
        return true;
      }
    }
 
    function checkRegexp( o, regexp, n ) {
      if ( !( regexp.test( o.val() ) ) ) {
        o.addClass( "ui-state-error" );
        updateTips( n );
        return false;
      } else {
        return true;
      }
    }
    
   
    function insert(urlParam){
			 	 var response;
				 //alert("search");
				 //xmlhttpPost("http://localhost/swapdeal.in/php/SwapAjax.php");
				 //alert(document.getElementById("searchDiv"));
				 $.get("http://localhost/swapdeal.in/php/SwapRegisterInterest.php"+urlParam, function(responseText) {
                 //getURL("http://localhost/swapdeal.in/php/SwapInsertUser.php"+urlParam);
    			 //alert(responseText);
                 document.getElementById("dialog").innerHTML = responseText;
                 document.getElementById("dialog").style.visibility = 'visible';
                 
                 //document.getElementById("searchDiv").innerHTML = responseText;
	 		});
				 
		}
        function getURL(url){
       
    }
 
    $( "#dialog-form" ).dialog({
      autoOpen: false,
      height: 400,
      width: 300,
      modal: true,
      buttons: {
        "ExpressInterest": function() {
          var bValid = true;
          
          allFields.removeClass( "ui-state-error" );
          alert(mobile1.val());  
          bValid = bValid && checkLength( name1, "username", 3, 16 );
          bValid = bValid && checkLength( mobile1 , "mobile", 3, 12 );
          bValid = bValid && checkLength( email1, "email", 6, 80 );
          
        
          bValid = bValid && checkRegexp( name1, /^[a-z]([0-9a-z_])+$/i, "Name may consist of a-z, 0-9, underscores, begin with a letter." );
          bValid = bValid && checkRegexp( mobile1, /(\+91-?|0)?\d{10}/, "Mobile number should be 10 digit or 12 digit with +91" );
          // From jquery.validate.js (by joern), contributed by Scott Gonzalez: http://projects.scottsplayground.com/email_address_validation/
          bValid = bValid && checkRegexp( email1, /^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i, "eg. ui@jquery.com" );
 
          if ( bValid ) {
            //building the url string for inserting data, here username is email.
            //username=<username>&name=<name>&mobile=<mobile>&email=<email>&password=<password>
            var itemID = $(this).data("itemID");
            //alert(itemID);
            var urlParam = "?username="+email1.val()+"&name="+name1.val()+"&mobile="+mobile1.val()+"&email="+email1.val()+"&itemID="+itemID+"&note="+note.val()+"&rate="+rate.val();
            alert(urlParam);
            
            document.getElementById("dialog").style.visibility = 'visible';
            document.getElementById("dialog").innerHTML = "<p>Please wait while your request is registered.</p> <img src='img/loading.gif' width='32' height='32' />";
            insert(urlParam);
            
            $(function() {
                $( "#dialog" ).dialog({ 
                    title: "Swap Create",
                    buttons: [
                                {
                                text : "Close",
                                click: function(){
                                    $( this ).dialog( "close" ) ;
                                }
                            }
                        ]
                    });
            });
            
            
            $( this ).dialog( "close" );
          }
        },
        Cancel: function() {
          $( this ).dialog( "close" );
        }
      },
      close: function() {
        allFields.val( "" ).removeClass( "ui-state-error" );
      }
    });
 
 
    
   
      
    $('body').on('click','.create-user13',function(){
        $( "#dialog-form" ).dialog( "open" ); 
        });   
    $("#searchDiv").on('click','#create-user13',function(){
        $( "#dialog-form" ).dialog( "open" ); 
        });
    $("#searchDiv").on('click','#create-user',function(){
        
        $( "#dialog-form" )
        .data("itemID",$( this ).val())
        .dialog( "open" ); 
        });
    
  });
  
   

  