<?php
require_once 'db.php';
$stmt = $pdo->query(' SELECT * FROM produit');
//supprimer les elements

if(isset($_REQUEST['reference']))
{
    $sup=intval ($_GET['reference']);
    $sql = "DELETE FROM produit WHERE  reference=?";
    $query =$pdo->prepare($sql);
    $query->execute(array($sup));
   
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
</head>
<body>
    <h1>MODIFIER ET SUPPRIMER LES ELEMENTS DU STOCK</h1>
<div class="container">
    
     <div class="container">
        <table class="table table-striped display mt-3" id="example">
            <thead>
            <th>Reference</th>
            <th>libelle</th>
            <th>Quantite minimale</th>
            <th>Quantite en stock</th>
            <th>Action</th>
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
                <td>
                <a href="updateproduit.php?reference=<?php echo $row->reference;?>"><button class="btn btn-primary" ><i class="fas fa-edit"></i></button></a>
                <a href="produit.php?reference=<?php echo $row->reference;?>"><button class="btn btn-danger" OnClick="return confirm ('Voulez vous vraiment suprimer')"><i class="fas fa-trash"></i></button></a>
                            
                            </td>
                        </tr>
                       <?php } ?>
                       
                    </tbody>
             </table>
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

                   
              