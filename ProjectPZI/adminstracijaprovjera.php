<?php
include("db.php"); 
include("korisnikclass.php");
include("header1.php");


if (!Korisnik::jePrijavljen()) header("Location: login.php");
$prijavljeni_korisnik = Korisnik::$prijavljeniKorisnik;

if ($prijavljeni_korisnik["uloga"] == "Administrator" ){
  header("Location: administracija_index.php");}
  else {
    echo json_encode(["message" => "Nemate pristup podacima", "status" => 400]);
}


?>

<?php
include("static/footer.php");
?>

