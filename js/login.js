$(document).ready(function(){
	$("#add_err").css('display', 'none', 'important');
	 $("#submit-log").click(function(){	
		  username=$("#email-log").val();
		  password=$("#password-log").val();
		  lan = $('#submit-reg').val();

		  $.ajax({
		   type: "POST",
		   url: "parse/login.php",
			data: "name="+username+"&pwd="+password,
		   success: function(html){    
			if(html=='true')    {
			 $("#add_err").html("<div class='success'><?php echo DEFINE_LOGGING_IN;?>Logging in...</div>");
			 if (lan != 'Login!') {
			 window.location="home.php?lan=bg";
			}else{
			 window.location="home.php?lan=en";
			}
			}
			else {
			$("#add_err").css('display', 'inline', 'important');
			 $("#add_err").html("<div class='error'><?php echo DEFINE_ERROR;?></div>");
			}
		   },
		   beforeSend:function()
		   {
			$("#add_err").css('display', 'inline', 'important');
			$("#add_err").html("<img src='imgs/ajax-loader.gif' /> Loading...")
		   }
		  });
		return false;
	});
});