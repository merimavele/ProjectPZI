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
if ($prijavljeni_korisnik["uloga"] != "Administrator") {
    
        
        header("Location: administracijaprovjera.php");
        echo json_encode(["message" => "Nemate pristup podacima", "status" => 400]);
    } 
        
$naslov= "Uredi razred";
include("header1.php");
    

include 'baza.php';

// Inicijaliziraj bazu
$baza = new Baza();

// ID stavke
$id = $_GET['id'];

// Izvrši upit
$rezultat = $baza->query('SELECT * FROM razred WHERE ID = ?', [$id] );

// Naša stavka je prvi rezultat iz baze
$razred = $rezultat[0];
// Uključi zaglavlje
require('zaglavlje.php');

?>


<div class="container">
    <div class="row">
        <div class="col-md-12">

            <h4>Uredi razred:</h4>
            
            <form class="form-horizontal" action="uredi_razred.php" method="POST">

                <!-- Moramo proslijediti ID stavke preko forme! -->
                <input type="hidden" name="ID" value="<?php echo $razred['ID']; ?>">
                <div class="form-group">
                    <label for="input" class="col-sm-2 control-label">email nastavnika</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="input" name="emailNastavnika" value="<?php echo $razred['emailNastavnika']; ?>">
                    </div>
                </div>
 
                

              
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-default">Pošalji</button>
                    </div>
                </div>

            </form>

        </div>
    </div>
</div>

