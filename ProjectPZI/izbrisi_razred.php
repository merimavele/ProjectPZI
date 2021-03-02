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
        header("Location: adminstracijaprovjera.php");}
 
    

include 'baza.php';

// Inicijaliziraj bazu
$baza = new Baza();

// ID stavke
$ID = $_GET['id'];

// Izvrši upit
$baza->exec('DELETE FROM razred WHERE ID = ?', [$ID]);

// Preusmjeri na početnu stranicu

header('Location: ' . $_SERVER['HTTP_REFERER']);
?>