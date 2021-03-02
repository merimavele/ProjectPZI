<?php

include("db.php"); 
include("korisnikclass.php");

if (!Korisnik::jePrijavljen()) header("Location: index.php");
$prijavljeni_korisnik = Korisnik::$prijavljeniKorisnik;

if ($prijavljeni_korisnik["uloga"] == "Administrator"){
    header("Location: admin_korisnici.php");
    

} if ($prijavljeni_korisnik["uloga"] == "Učenik"){
    echo json_encode(["message" => "Nemate pristup podacima", "status" => 400]);
}
if ($prijavljeni_korisnik["uloga"] == "Nastavnik"){
    echo json_encode(["message" => "Nemate pristup podacima", "status" => 400]);
}
?> 