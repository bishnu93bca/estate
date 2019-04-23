<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->
<link rel="stylesheet" type="text/css" href="https://bootswatch.com/4/simplex/bootstrap.css">
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <style>
  #draggable { width: 150px; height: 150px; padding: 0.5em; }
  </style>
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<div class="jumbotron">
<div class="form-group">
  <label class="col-form-label" for="inputDefault">Enter</label>
  <input type="text" class="form-control" placeholder="Default input" id="inputDefault" list="languages">
	  <!-- <datalist id="languages">
	  <option value="PHP" />
	  <option value="C++" />
	  <option value="Java" />
	  <option value="Ruby" />
	  <option value="Python" />
	  <option value="Go" />
	  <option value="Perl" />
	  <option value="Erlang" />
	</datalist> -->
</div>
</div>

<script type="text/javascript">
	$(document).ready(function(){
		$("#inputDefault").keyup(function(){
			var query= $(this).val();
			
		 $.ajax({url : 'home/ajax',type : 'GET',data:{'query':query},dataType:'json',success : function(data) {  
			        $('#inputDefault').autocomplete({source:data});
			    },
			    error : function(request,error)
			    {
			        alert("Request: "+JSON.stringify(request));
			    }
			});
		});
	});
</script>