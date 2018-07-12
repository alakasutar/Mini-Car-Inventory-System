<?php

require "config.php";
require "common.php";
require "templates/header.php";

$sqlCarInfo= " SELECT * from carModel";
$exeQuery = mysqli_query($conn_rw, $sqlCarInfo);
?>

<h5 style='color:#808080;'> View Inventory</h5>
<div style='margin: 30px;'>
<table id='tblInventory' class='table table-striped table-bordered'>
<thead>
<tr>
<th>Sr No.</th>
<th>Manufacturer Name</th>
<th>Model Name</th>
<th>Count</th>
<th>Action</th>
</tr></thead><tbody class='tbodyfontSize'>

<?php
while($row = mysqli_fetch_array($exeQuery))
  {
?>
  <tr>
    <td> <?php echo $row['id'] ?> </td>
    <td>  <?php echo  $row['manufacturerName']  ?></td>
    <td> <?php echo  $row['modelName']  ?></td>
    <td> <?php echo  $row['carCount']  ?></td>
    <td>
      <input type='button' class='btn btn-primary' style='width: 100%;' value='Sold' onClick='hello(<?php echo  '"' . $row['modelName'] .'",' . $row['carCount']   ?>);'> 
    </td>
  </tr>
<?php
  }  
?>
</tbody></table></div>




<?php require "templates/footer.php"; ?>