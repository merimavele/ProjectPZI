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

if (!$prijavljeni_korisnik) header("Location: login.php");
if ($prijavljeni_korisnik["uloga"] == "Učenik") {
    header("Location: npp4razred_ucenik.php");}
$naslov=" NPP za IV razred ";
include("header1.php");
?>
<div class=".container-fluid">
      <div class="row">
      <div class="col-sm-2">
      <?php
include("navnpp.php");
?>
  </div>
            <div class="col-sm-10">
          

<?php

// Uključi vanjsku biblioteku
include ('baza.php');


// Inicijaliziraj bazu
$baza = new Baza();

// Dohvati sve stavke iz baze

$npp = $baza->query('SELECT * FROM npp n  WHERE n.Nazivrazreda = "Četvrti"');
?>


<div class="container h-100">

<div class="row shadow p-5" style="
    border-top-width: 30px;
    margin-top: 150px;
">

    <div class="col-12 mb-5">
        <h3 class="float-left">Nastavni plan i program za IV razred</h3>
        <a class="btn btn-success float-right mt-1" href="dodaj_oblast_forma.php">Dodaj novu oblast</a>
        
    </div>
    <div class="col-8">
      <div class="alert alert-success d-none" id="info"></div>
      <div class="alert alert-danger d-none" id="error"></div>
      <table class="table table-striped table-hover">
        <tr>
          <th>Naziv oblasti</th>
        
          <th>Razred</th>
          <th class="text-center"> Akcije</th>
        </tr>

                <?php if(count($npp) > 0): ?>

                    <?php foreach($npp as $npp ): ?>


     
          <td class="Naziv"><?= $npp["Nazivoblasti"] ?></td>
          <td class="Naziv razreda"><?= $npp["Nazivrazreda"] ?></td>
         
          <td>

                   <div class="btn-group" role="group" aria-label="Basic example">
                   <a class="btn btn-primary btn-sm" href="uredi_oblast_forma.php?id=<?php echo $npp['ID']; ?>">Uredi oblast</a>
                        <a class="btn btn-danger btn-sm" href="izbrisi_oblast.php?id=<?php echo $npp['ID']; ?>">Izbriši oblast</a>
                        <hr>
                        



       
          </div>
          
          </td>
          
        </tr>
                    <?php endforeach; ?>

                <?php else: ?>

                    <p>Nema podataka u bazi.</p>
                    <hr>

                <?php endif; ?>

               
                </table>
            </div>
        </div>
    </div>
    </div>
    </div>
   
