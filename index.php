<?php

require "config.php";
require "common.php";
require "templates/header.php";

if (isset($_POST['submit']) && $_POST['manufacturerName'] != "") {
  $manufacturerName =$_POST['manufacturerName'];
  $manufacturerName1 = "'" . $_POST['manufacturerName'] . "'";

  $sqlManfName= "SELECT manufacturerName FROM carmanufacturer WHERE manufacturerName = $manufacturerName1 ";
  $exeQueryManfName = mysqli_query($conn_rw, $sqlManfName);
  $manfName = mysqli_fetch_array($exeQueryManfName);

  $manfNameVal = $manfName['manufacturerName'];

  if($manfNameVal != $manufacturerName ){
    $sqlInsert=" INSERT INTO carmanufacturer (manufacturerName)
    VALUES ('$manufacturerName')";
    mysqli_query($conn_rw, $sqlInsert); 
    echo '<script type="text/javascript">
    var msgAlert = "Manufacturer name added successfully";

					$("#msgSuccess").text("");
					$("#msgSuccess").append(msgAlert);
					$("#modalSuccess").modal();
    </script>';
  }
  else{
    echo '<script type="text/javascript">
    var msgAlert = "Manufacturer name already exist";

					$("#msgAlertError").text("");
					$("#msgAlertError").append(msgAlert);
					$("#modalError").modal();
    </script>';
  }
} 

?>
  
  <h5 style="color:#808080;"> Add Manufacturer</h5>
  <div style="margin: 30px;">
  <form method="post">
    <label for="manufacturerName">Manufacturer Name <span style="color:red">*<span></label>
    <input type="text"  name="manufacturerName" id="manufacturerName" required="required">
    <input type="submit" class="btn btn-primary" name="submit" value="Submit">
  </form>
</div>

<?php require "templates/footer.php"; ?>
