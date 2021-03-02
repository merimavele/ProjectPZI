<?php
 


 
 
 
include("db.php"); 
include("korisnikclass.php");





$id = $_SESSION["token"];
$upit = "SELECT * FROM korisnik WHERE ID=".$id;

$rezultat = mysqli_query($konekcija, $upit);
$prijavljeni_korisnik = mysqli_fetch_assoc($rezultat);
if (!$prijavljeni_korisnik) header("Location: login.php");
if ($prijavljeni_korisnik["uloga"] != "Administrator") {
   header("Location: adminstracijaprovjera.php");}
 
   $naslov=" Razredi ";
   include("header1.php");

?>
<div class=".container-fluid">
      <div class="row">
      <div class="col-sm-3">
      <?php
include("nav1.php");
?>
  </div>
            <div class="col-sm-9">
          

<?php

// Uključi vanjsku biblioteku
include ('baza.php');


// Inicijaliziraj bazu
$baza = new Baza();

// Dohvati sve stavke iz baze

$razred = $baza->query('SELECT * FROM razred');
?>
<div class="container h-100">

<div class="row shadow p-5" style="
    border-top-width: 30px;
    margin-top: 150px;
">

    <div class="col-12 mb-5">
        <h3 class="float-left">Popis razreda</h3>
        <a class="btn btn-success float-right mt-1" href="dodaj_razred_forma.php">Dodaj novi razred</a>
        
    </div>
    <div class="col-8">
      <div class="alert alert-success d-none" id="info"></div>
      <div class="alert alert-danger d-none" id="error"></div>
      <table class="table table-striped table-hover">
        <tr>
          <th>#ID</th>
          <th>Naziv</th>
          <th>email nastavnika</th>
          
          
          <th class="text-center"> Akcije</th>
        </tr>

                <?php if(count($razred) > 0): ?>

                    <?php foreach($razred as $razredi ): ?>


     
          <td class="#ID"><?= $razredi["ID"] ?></td>
          <td class="Naziv"><?= $razredi["Naziv"] ?></td>
          <td class="email Nastavnika"><?= $razredi["emailNastavnika"] ?></td>
          
          <td>

                   <div class="btn-group" role="group" aria-label="Basic example">
                        <a class="btn btn-primary btn-sm" href="uredi_razred_forma.php?id=<?php echo $razredi["ID"]; ?>">Uredi razred</a>
                        <a class="btn btn-danger btn-sm" href="izbrisi_razred.php?id=<?php echo $razredi["ID"]; ?>">Izbriši razred</a>
                        <hr>
                        



       
          </div>
          
          </td>
          
        </tr>
                    <?php endforeach; ?>

                <?php else: ?>

                    <p>Nema razreda u bazi.</p>
                    <hr>

                <?php endif; ?>

               
                </table>
            </div>
        </div>
    </div>
    </div>
    </div>
   
        
<?php
include( "podnozje.php");
// Uključi podnožje


?>