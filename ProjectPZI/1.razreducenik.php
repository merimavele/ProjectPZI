<?php
include("db.php"); 

include ("korisnikclass.php");
if (!isset($_SESSION["token"])) header("Location: index.php");
$id = $_SESSION["token"];
$upit = "SELECT * FROM korisnik WHERE ID=".$id;
if (!Korisnik::jePrijavljen()) header("Location: index.php");
$prijavljeni_korisnik = Korisnik::$prijavljeniKorisnik;

$rezultat = mysqli_query($konekcija, $upit);
$prijavljeni_korisnik = mysqli_fetch_assoc($rezultat);

if (!$prijavljeni_korisnik) header("Location: index.php");
$naslov=" I razred lekcije ";
include("header1.php");
?>
<div class=".container-fluid">
      <div class="row">
      <div class="col-sm-2">
      <?php
include("nav.php");
?>
  </div>
            <div class="col-sm-10">
    

<?php

// Uključi vanjsku biblioteku
include ('baza.php');


// Inicijaliziraj bazu
$baza = new Baza();

// Dohvati sve stavke iz baze

$materijali = $baza->query('SELECT * FROM materijali  WHERE Nazivrazreda = "Prvi" ');
?>
<div class="container h-100">

<div class="row shadow p-5" style="
    border-top-width: 30px;
    margin-top: 150px;
">

    <div class="col-12 mb-5">
    
        <h3 class="float-left">Popis lekcija</h3>
        <a class="btn btn-primary float-right mt-1" href="nastavnikprovjera1.php">Nastavnik</a>
        
    </div>
    <div class="col-8">
      <div class="alert alert-success d-none" id="info"></div>
      <div class="alert alert-danger d-none" id="error"></div>
      <table class="table table-striped table-hover">
        <tr>
          <th>Naziv</th>
          <th>Opis</th>
          <th>Sadržaj</th>
      
        </tr>

                <?php if(count($materijali) > 0): ?>

                    <?php foreach($materijali as $materijal ): ?>


     
          <td class="Naziv"><?= $materijal["ime"] ?></td>
          <td class="Opis"><?= $materijal["opis"] ?></td>
          <td class="Sadržaj"><a href="datoteke/<?php echo $materijal['lekcija']; ?>"><?php echo $materijal['ime'] ?></a></td>
          
         
          
        </tr>
                    <?php endforeach; ?>

                <?php else: ?>

                    <p>Nema materijala u bazi.</p>
                    <hr>

                <?php endif; ?>

               
                </table>
            </div>
        </div>
    </div>
    </div>
    </div>
   
        


 