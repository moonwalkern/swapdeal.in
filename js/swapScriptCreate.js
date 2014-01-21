  $(function() {
    var name = $( "#name" )
      mobile = $("#mobile"),
      email = $( "#email" ),
      password = $( "#password" ),
      allFields = $( [] ).add( name ).add( mobile ).add( email ).add( password ),
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
    /*
    $(document).ready(function(){
    alert();
        $( ".create-user1" )
      .button()
      .click(function() {
        $( "#dialog-form-create" ).dialog( "open" );
      });  
    }); 
    */
    function insert(urlParam){
			 	 var response;
				 //alert("search");
				 //xmlhttpPost("http://localhost/swapdeal.in/php/SwapAjax.php");
				 //alert(document.getElementById("searchDiv"));
				 $.get("http://localhost/swapdeal.in/php/SwapInsertUser.php"+urlParam, function(responseText) {
                 //getURL("http://localhost/swapdeal.in/php/SwapInsertUser.php"+urlParam);
    			 //alert(responseText);
                 document.getElementById("dialog").innerHTML = responseText;
                 document.getElementById("dialog").style.visibility = 'visible';
                 
                 //document.getElementById("searchDiv").innerHTML = responseText;
	 		});
				 
		}
        function getURL(url){
       
    }
 
    $( "#dialog-form-create" ).dialog({
      autoOpen: false,
      height: 370,
      width: 370,
      modal: true,
      buttons: {
        "Create an account": function() {
          var bValid = true;
          
          allFields.removeClass( "ui-state-error" );
 
          bValid = bValid && checkLength( name, "username", 3, 16 );
          bValid = bValid && checkLength( mobile, "mobile", 3, 12 );
          bValid = bValid && checkLength( email, "email", 6, 80 );
          bValid = bValid && checkLength( password, "password", 5, 16 );
        
          bValid = bValid && checkRegexp( name, /^[a-z]([0-9a-z_])+$/i, "Username may consist of a-z, 0-9, underscores, begin with a letter." );
          bValid = bValid && checkRegexp( mobile, /(\+91-?|0)?\d{10}/, "Mobile number should be 10 digit or 12 digit with +91" );
          // From jquery.validate.js (by joern), contributed by Scott Gonzalez: http://projects.scottsplayground.com/email_address_validation/
          bValid = bValid && checkRegexp( email, /^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i, "eg. ui@jquery.com" );
          bValid = bValid && checkRegexp( password, /^([0-9a-zA-Z])+$/, "Password field only allow : a-z 0-9" );
 
          if ( bValid ) {
            //building the url string for inserting data, here username is email.
            //username=<username>&name=<name>&mobile=<mobile>&email=<email>&password=<password>
            var urlParam = "?username="+email.val()+"&name="+name.val()+"&mobile="+mobile.val()+"&email="+email.val()+"&password="+password.val();
            alert(urlParam);
            var itemID = $(this).data("itemID");            
            alert(itemID)
            document.getElementById("dialog").style.visibility = 'visible';
            document.getElementById("dialog").innerHTML = "<p>Please wait while we checking for your account creation.</p> <img src='img/loading.gif' width='32' height='32' />";
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
    
    $('#searchDiv').on('click','#create-user13',function() {
    //alert("Click");
    // here goes some code   
    });
 
    $( "#create-user1" )
      .button()
      .click(function() {
        $( "#dialog-form-create" ).dialog( "open" );
      });
      
    

    
  });
  
   

  