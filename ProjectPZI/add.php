<?php



include("db.php"); 
include("korisnikclass.php");

$id = $_SESSION["token"];
$upit = "SELECT * FROM korisnik WHERE ID=".$id;
if (!Korisnik::jePrijavljen()) header("Location: index.php");
$prijavljeni_korisnik = Korisnik::$prijavljeniKorisnik;
$naslov=" Dodaj korisnika ";
include("header1.php");
if ($prijavljeni_korisnik["uloga"] == "Administrator")
    Korisnik::spasi($_POST);


header("Location: admin_korisnici.php");

?>