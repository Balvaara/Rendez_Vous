

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Patients</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>
	<?php require"header.php"; ?><br><br><br>
<div class="container">
  <h2>Liste Des Patients</h2>
  <div class="row">
    <div class="col-md-4">
        <div class="col-sm-8 mb-8">
            <input type="text" name="rec" id="rec" class="form-control" placeholder="Rechercher" >
        </div>
    </div>
    <script>
    $(document).ready(function(){
      $("#rec").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#myTable tr").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
      });
    });
    </script>
		    <div class=" col-md-8 text-right">
		    	<a href="add.php" >
				<button type="button" class="btn btn-success"><p class="glyphicon glyphicon-plus">Nouvel-Patient</p></button> 
				</a>
			</div>
		</div><br>
 <table class="table table-striped table-bordered text-center">
	<tr>
		<th  style="text-align: center;">Nom</th>
    <th  style="text-align: center;">Prenom</th>
    <th  style="text-align: center;">Age</th>
    <th  style="text-align: center;">Sexe</th>
    <th  style="text-align: center;">Adresse</th>
    <th  style="text-align: center;">Telephone</th>
		<th  style="text-align: center;">Action</th>
	</tr>
   <tbody id="myTable">
	<?php 
require "fonction.php";
	$db=database::connect();
 	$stm=$db->prepare("SELECT  *FROM patient");
 	$stm->execute();

 	database::deconnect();

		while ($par =$stm->fetch())
		{?>

	<tr>
     	<td ><?=$par['nom_pt']?></td>
     	<td><?=$par['prenom_pt']?></td>
      <td><?=$par['age_pt'] .' '.'ans'?></td>
      <td><?=$par['sexe']?></td>
      <td><?=$par['adresse_pt']?></td>
      <td><?=$par['tel_pt']?></td>

     	<td>
     		<a  href="edite.php?id=<?=$par['id']?>" >
                <button type="button" class="btn btn-primary"><span class="glyphicon glyphicon-pencil"></span> Modd</button>
            </a>
     		<a  href="delete.php?id=<?=$par['id']?>" >
                <button type="button" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span>Supp</button>
            </a>
     	</td>
     </tr>
		<?php }

	?> 
	</tbody>

</table>
</div>

</body>
</html>
