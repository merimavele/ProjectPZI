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

    
$naslov= "Dodaj razred";
// Uključi vanjsku biblioteku
include 'baza.php';
// Inicijaliziraj bazu
$baza = new Baza();

// Provjeri tip HTTP zahtjeva
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    // Podaci iz forme
  
    $Naziv = $_POST['Naziv'];
    $emailNastavnika = $_POST['emailNastavnika'];
  
  
            $baza->exec('INSERT INTO razred ( Naziv, emailNastavnika) VALUES ( ?, ?)', [$Naziv, $emailNastavnika]);

            // Pohrani poruku o uspješnoj izmjeni
            $_SESSION['obavijest_uspjeh'] = 'Razred uspješno dodan.';

            // Preusmjeri na početnu stranicu
            header('Location: razredi_ispis.php');
            exit();
        }
        else
        {
            $_SESSION['obavijest_greska'] = 'Dogodila se greška prilikom dodavanja.';
        }
    

