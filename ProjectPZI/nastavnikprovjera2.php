<?php
include("db.php"); 
include("korisnikclass.php");
$naslov="Provjera";
include("header1.php"); ?>
<div class=".container-fluid">
      <div class="row">
      <div class="col-sm-3">
      <?php include("nav.php"); ?>

  </div>
            <div class="col-sm-9" style="padding-top: 60px;">
    

<?php



if (!Korisnik::jePrijavljen()) header("Location: login.php");
$prijavljeni_korisnik = Korisnik::$prijavljeniKorisnik;

if ($prijavljeni_korisnik["uloga"] == "Nastavnik" ){
  header("Location: nastavnik_2_razred.php");}
    else if($prijavljeni_korisnik["uloga"] == "Administrator" ){ 
      header("Location: admin_2razred.php");
  }
  else {

    echo json_encode(["message" => "Nemate pristup podacima", "status" => 400]);}



?>

<?php
include("static/footer.php");
?>

