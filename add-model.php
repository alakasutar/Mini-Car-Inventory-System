
<?php

require "config.php";
require "common.php";
require "templates/header.php";
$initialCarCount =1;
$sqlManFactName= " SELECT * from carmanufacturer";
$exeQuery = mysqli_query($conn_rw, $sqlManFactName);
//print_r($exeQuery);

if (isset($_POST['submit']) && $_POST['manufacturerName'] != "" && $_POST['modelName'] != "") {

  $manufacturerName = "'" . $_POST['manufacturerName'] . "'";
  $modelName ="'" . $_POST['modelName'] . "'";

  $sqlCarCount= "SELECT carCount FROM carmodel WHERE modelName = $modelName ";
  $exeQueryCarCount = mysqli_query($conn_rw, $sqlCarCount);
  $rowCount = mysqli_fetch_array($exeQueryCarCount);

  $carCountVal = $rowCount['carCount'];


  if($carCountVal >0 ){

    $sqlInsert=" UPDATE carModel SET carCount = $carCountVal +1 WHERE modelName = $modelName ";
    mysqli_query($conn_rw, $sqlInsert);

    echo '<script type="text/javascript">
    var msgAlert = "Model name alreaady exist. Updated count successfully.";

					$("#msgSuccess").text("");
					$("#msgSuccess").append(msgAlert);
					$("#modalSuccess").modal();
    </script>';
  }
  else{
    $sqlInsert=" INSERT INTO carModel (manufacturerName,modelName,carCount)
    VALUES ($manufacturerName,$modelName,$initialCarCount )";

    mysqli_query($conn_rw, $sqlInsert);

    echo '<script type="text/javascript">
    var msgAlert = "Model name added successfully";

					$("#msgSuccess").text("");
					$("#msgSuccess").append(msgAlert);
					$("#modalSuccess").modal();
    </script>';
  }
}
?>

  <h5 style="color:#808080;"> Add Model</h5>
  <form method="post">
    <div class="row" style="margin:30px;">
    <div class="col-lg-5">
    <label for="manufacturerName">Manufacturer Name </label>
    <select name="manufacturerName" class="selectpicker" id="manufacturerName"  required="required">
    echo "<option value=''>Select</option>";
    <?php while($row = mysqli_fetch_array($exeQuery)){
        
        echo "<option id=".$row["id"].">".$row["manufacturerName"]."</option>";
    }?>
        
    </select>
  </div>
  <div class="col-lg-5">
    <label for="modelName">Model Name <span style="color:red">*<span></label>
    <input type="text" name="modelName" id="modelName" style="width:70%" required="required">
  </div>
  <div class="col-lg-2"> 
    <input type="submit" class="btn btn-primary" name="submit" value="Submit" style="margin-top:5px">
  </div>
  </div>
  </form>


<?php require "templates/footer.php"; ?>