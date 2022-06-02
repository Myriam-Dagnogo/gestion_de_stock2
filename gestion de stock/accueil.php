<?php
//faire appel a la base de donnee
require_once 'db.php';

//ajouter un produit depuis le formulaire

if(isset($_POST['ajouter']) 
                         && !empty($_POST['libelle'])
                         && !empty($_POST['quantite_minimale'])
                         && !empty($_POST['quantite_en_stock']))



 {
     
      $libelle= $_POST['libelle'];
      $quantite_minimale = $_POST['quantite_minimale'];
      $quantite_en_stock =$_POST['quantite_en_stock'];


      $sql= "INSERT INTO `produit`(  `libelle`, `quantite_minimale`, `quantite_en_stock`)
       VALUES ( :libelle, :quantite_minimale, :quantite_en_stock)";
       $stmt = $pdo-> prepare($sql);

       
       $stmt->bindParam(':libelle', $libelle);
       $stmt->bindParam(':quantite_minimale', $quantite_minimale);
       $stmt->bindParam(':quantite_en_stock', $quantite_en_stock);

       
       $stmt ->execute();
       header('Location:accueil.php');
}
  
       
   $stmt = $pdo->query(' SELECT * FROM produit');

?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DRYMS_SHOP</title>
    <link rel="stylesheet" href="./css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>
<body>
    <header>
        <nav class="navbar">
        <p class="logo">DRYMS_SHOP</p>
      
            <ul class="navlinks" >
                <li> <a href="produit.php">Les produits</a></li>
                <li> <a href="deconnection.php">Deconnexion</a></li>
               
            </ul>
        </nav>
    </header>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <div class="container">
    <div class="row">
     <div class="col-10 mt-3">
        <form action="" class="form-control" method="post">
           
            <label for=""> libelle</label>
            <input type="text" class="form-control" name="libelle" required>
            <label for=""> quantite_minimale</label>
            <input type="text" class="form-control" name="quantite_minimale" required>
            <label for=""> quantite_en_stock</label>
            <input type="text" class="form-control" name="quantite_en_stock" required>
            <button type="submit" class="btn btn-primary mt-3" name="ajouter">Enregistrer</button>
        </form>
     </div>
     <div class="col-10 mt-3">
        <table class="table table-striped display" id="example" >
            <thead>
            <th>Reference</th>
            <th>libelle</th>
            <th>Quantite minimale</th>
            <th>Quantite en stock</th>
            </thead>
        <tbody>

         <?php
             while($row = $stmt ->fetch())
            {
                ?> 
           

        
            <tr>
                <td><?php echo $row-> reference; ?></td>
                <td><?php echo $row-> libelle; ?></td>
                <td><?php echo $row-> quantite_minimale; ?></td>
                <td><?php echo $row-> quantite_en_stock; ?></td>
                
            </tr>
            <?php } ?>
           

        </tbody>
        </table>
        </div>
  </div>
</div>
</div>
    <script>
                $(document).ready(function() {
                    $('#example').DataTable( {
                        "scrollY":        "500px",
                        "scrollCollapse": true,
                        "paging":         false
                        } );
                    } );
            </script>

</body>
</html>