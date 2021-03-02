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
        echo json_encode(["message" => "Nemate pristup podacima", "status" => 400]);
    }

    
$naslov= "Dodaj oblasta";
// Uključi vanjsku biblioteku
include 'baza.php';

// Inicijaliziraj bazu
$baza = new Baza();

// Provjeri tip HTTP zahtjeva
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    // Podaci iz forme
    $Nazivoblasti= $_POST['Nazivoblasti'];
    
    $Nazivrazreda = $_POST['Nazivrazreda'];

  
            // Unesi unos u bazu
            $baza->exec('INSERT INTO npp(Nazivoblasti, Nazivrazreda) VALUES (?, ?)', [$Nazivoblasti,$Nazivrazreda]);

             
            // Preusmjeri na početnu stranicu
                // Preusmjeri na početnu stranicu
                if($Nazivrazreda=="Prvi"){
                    
                header('Location: nppnastavnik1razred.php');}
                elseif($Nazivrazreda=="Drugi"){
                    header('Location: nppnastavnik2razred.php');}
                    elseif($Nazivrazreda=="Treći"){
                        header('Location: nppnastavnik3razred.php');}
                        elseif($Nazivrazreda=="Četvrti"){
                            header('Location: nppnastavnik4razred.php');}
                exit();
            
        }
        else
        {
            $_SESSION['obavijest_greska'] = 'Dogodila se greška prilikom dodavanja.';
        }
  
        ?>