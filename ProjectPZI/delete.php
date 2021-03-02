<?php
include("db.php"); 
include("korisnikclass.php");

if (!Korisnik::jePrijavljen()) header("Location: login.php");
$prijavljeni_korisnik = Korisnik::$prijavljeniKorisnik;

if ($prijavljeni_korisnik["uloga"] == "Administrator")
    Korisnik::pobrisi($_GET["id"]);

header("Location: admin_korisnici.php");
?> 
