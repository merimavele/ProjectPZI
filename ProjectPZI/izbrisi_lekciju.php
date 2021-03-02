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


// Uključi vanjsku biblioteku
include 'baza.php';

// Inicijaliziraj bazu
$baza = new Baza();

// ID stavke
$id = $_GET['id'];
// Izvrši upit
$baza->exec('DELETE FROM materijali WHERE id = ?', [$id]);

header('Location: ' . $_SERVER['HTTP_REFERER']);
?>