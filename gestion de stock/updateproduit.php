<?php 

require_once 'db.php';

if(isset($_POST['updatebtn']) 
                         && !empty($_POST['libelle'])
                         && !empty($_POST['quantite_minimale'])
                         && !empty($_POST['quantite_en_stock']))
{
      //  $prod_ref = intval ($_GET['reference']);
       // $libelle = $_POST['libelle'];
        //$quantite_minimale = $_POST['quantite_minimale'];
        //$quantite_en_stock = $_POST['quantite_en_stock'];

        $sql= " UPDATE `produit` SET `libelle`=?,`quantite_minimale`=?,`quantite_en_stock`=?WHERE reference=?";

        $query = $pdo->prepare($sql);
        
        $query->execute(array( $_POST['libelle'], $_POST['quantite_minimale'],$_POST['quantite_en_stock'],$_GET['reference']));

        echo "<script>alert('Vous avez modifier un produit');</script>";
        echo "<script> window.location.href='produit.php'</script>";

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Metre a jour Produit</title>
</head>
<body>

                <h1>Metre a jour ce Produit </h1>
       
       <div class="container">
        <div class="row">
        <div class="col-8">

        <?php 

        $prod_ref = intval ($_GET['reference']);
        $sql ="SELECT  `libelle`, `quantite_minimale`,`quantite_en_stock` FROM `produit` WHERE reference=:prod_ref";

        $query = $pdo->prepare($sql);
        $query->bindParam(':prod_ref', $prod_ref , PDO::PARAM_STR);
        $query->execute();

        $resultat= $query->fetchAll(PDO::FETCH_OBJ);

        foreach ($resultat as $row)
        {
?>
        

                <form action="" method="POST" class="form-group">
                        Libelle :
                        <input type="text" name="libelle" id="" class="form-control" value="<?php echo $row->libelle; ?>">
                        Quantite minimale : 
                        <input type="text" name="quantite_minimale" id="" class="form-control" value="<?php echo $row->quantite_minimale; ?>">
                        Quantite en stock : 
                        <input type="text" name="quantite_en_stock" id="" class="form-control" value="<?php echo $row->quantite_en_stock; ?>">

                        <input type="submit" name="updatebtn" id="" value="Mettre a jour" class="btn btn-primary mt-3">
                        <?php } ?>
                </form>
        </div>
        </div>
       </div>
        
</body>
</html>
