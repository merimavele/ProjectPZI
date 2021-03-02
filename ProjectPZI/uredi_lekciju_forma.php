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
    
        
        header("Location: nastava.php");
        echo json_encode(["message" => "Nemate pristup podacima", "status" => 400]);}
        
$naslov= "Uredi lekciju ";
include("header1.php");
    

include 'baza.php';

// Inicijaliziraj bazu
$baza = new Baza();

// ID stavke
$id = $_GET['id'];

// Izvrši upit
$rezultat = $baza->query('SELECT * FROM materijali WHERE id = ?', [$id] );

// Naša stavka je prvi rezultat iz baze
$materijali = $rezultat[0];
// Uključi zaglavlje
require('zaglavlje.php');

?>


<div class="container">
    <div class="row">
        <div class="col-md-12">

            <h1>Uredi lekciju</h1>
            
            <form class="form-horizontal" action="uredilekciju.php" method="POST">

                <!-- Moramo proslijediti ID stavke preko forme! -->
                <input type="hidden" name="id" value="<?php echo $materijali['id']; ?>">

                <div class="form-group">
                    <label for="input" class="col-sm-2 control-label">Ime</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="input" name="ime" value="<?php echo $materijali['ime']; ?>">
                    </div>
                </div>

                <div class="form-group">
                    <label for="input" class="col-sm-2 control-label">Opis</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="input" name="opis" value="<?php echo $materijali['opis']; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="input" class="col-sm-2 control-label">Naziv razreda</label>
                    <div class="col-sm-10">
                    <select required class="form-control" name="Nazivrazreda">
                  <option value="Prvi">1</option>
                  <option value="Drugi">2</option>
                  <option value="Treći">3</option>
                  <option value="Četvrti">4</option>
                </select>
                </div>
                </div>
 
                <input type="hidden" name="lekcija" value="<?php echo $materijali['lekcija']; ?>">
                
                
               
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-default">Pošalji</button> 
                    </div>
                </div>

            </form>

        </div>
    </div>
</div>

