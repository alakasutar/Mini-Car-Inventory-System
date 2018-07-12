<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Mini Car Inventory System</title>

	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css">

	<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.js"></script>

	<script type="text/javascript">
		
		function hello(abc){
			
		}

function hello(modelName,carCount){
        $.ajax({
                    type: "POST", url: "sold-model.php",
                    data: {modelName:modelName,carCount:carCount },
                    success: function (data) {
                         location.reload();
                    }
        });
}



		$(document).ready(function() {
			$('#tblInventory').DataTable(
				{
					columnDefs: [{ orderable: false, "targets": -1 }] 
				}
			);
		} );
	</script>
</head>

<body class="tbodyfontSize">
	<div class="container-fluid">
		<div class="sidenav">
			<a href="index.php">Add Manufacturer</a>
			<a href="add-model.php">Add Model</a>
			<a href="view-inventory.php">View Inventory</a>
		</div>
		<div class="main">
		<div class="modal fade" id="modalSuccess" data-backdrop="false">
				<div class="modal-dialog">
					<div class="modal-content">
						<!-- Modal body -->
						<div class="alert alert-success alert-dismissible alertCommon fade show" role="alert">
							<button type="button" id="btnCloseAlert" data-dismiss="modal" class="close" data-dismiss="alert">&times;</button>
							<span id="msgSuccess"> </span>
						</div>
					</div>
				</div>
			</div>
			<div class="modal fade" id="modalError" data-backdrop="false">
				<div class="modal-dialog">
					<div class="modal-content">
						<!-- Modal body -->
						<div class="alert alert-warning alert-dismissible alertCommon fade show" role="alert">
							<button type="button" id="btnCloseAlert" class="close" data-dismiss="modal">&times;</button>
							<span id="msgAlertError"> </span>
						</div>
					</div>
				</div>
			</div>
			<div style="padding:20px;">
				<h3 style="color:#808080;" >Mini Car Inventory System</h3>
				<hr>