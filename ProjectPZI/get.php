<?php

session_start();
if (!isset($_SESSION["token"])) header("Location: login.php");

include("db.php"); 
include("korisnikclass.php");

$id = $_SESSION["token"];
$upit = "SELECT * FROM korisnik WHERE ID=".$id;

$rezultat = mysqli_query($konekcija, $upit);
$prijavljeni_korisnik = mysqli_fetch_assoc($rezultat);

if (!$prijavljeni_korisnik) header("Location: index.php");
if ($prijavljeni_korisnik["uloga"] == "administrator"){
    header('Content-type: application/json');
    $korisnik = Korisnik::daj($_GET["id"]);
    echo (json_encode($korisnik));
}
?> 