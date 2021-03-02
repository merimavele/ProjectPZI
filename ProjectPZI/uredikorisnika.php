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
     
include 'baza.php';
// Inicijaliziraj bazu
$baza = new Baza();

$ID = $_POST['ID'];
    $ime = $_POST['ime'];
    $prezime = $_POST['prezime'];
    $email = $_POST['email'];
    $lozinka = $_POST['lozinka'];
    $uloga = $_POST['uloga'];
       
           
            
    
 
// Izvrši upit
$baza->exec('UPDATE korisnik SET ime = ?, prezime= ?,lozinka= ?,   email= ?, uloga= ? WHERE ID = ?', [ $ime, $prezime, $lozinka, $email, $uloga, $ID ]);


           
            // Preusmjeri na početnu stranicu
            header('Location: admin_korisnici.php');
            exit();
    



// Uključi podnožje
require('podnozje.php');

?>