<!DOCTYPE html> 
<html>
<head> 
	<title>FoodTracker @yeild('title')</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css"> 
	
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.0/jquery.min.js"></script>
	<script type="text/javascript">

	//Dynamically add row to form
	    $(document).ready(function() {
	        $("#add").click(function() {
	          $('#formTable tbody>tr:last').clone(true).insertAfter('#formTable tbody>tr:last');
	          return false;
	        });
	    });

	//Dynamically remove row from form
	    function deleteRow(el) 
	    {
			while (el.parentNode && el.tagName.toLowerCase() != 'tr') {
				el = el.parentNode;
			}
			if (el.parentNode && el.parentNode.rows.length > 1) {
				el.parentNode.removeChild(el);
			}
		}
	</script>
</head> 
<body> 

<nav role="navigation" class="navbar navbar-default">
    <div class="navbar-header">
        <a href="/dashboard" class="navbar-brand">FoodTracker.</a>
    </div>
</nav>

<div class="container"> 

	<h1>What is in your meal?</h1>

	<form method="post">
		<table id="formTable" class="table">
			<tbody>
				<tr>
					<td>
						<select name="select_food" class="form-control">
							<option value="">All</option>
							<?php foreach ($foods as $food){?>
								<option value="<?php echo $food->id ?>">
									<?php echo $food->name ?>
								</option>
							<?php } ?>
						</select>
						<a id="add">Add another entry.</a>
						<input type="button" value="Delete row" class="btn" onclick="deleteRow(this);">
					</td>


				</tr>
			</tbody>
		</table> 
		


		<input type="submit" value="Calculate Nutrition." class="btn btn-primary">
	</form>

</div> 

</body> 
</html>