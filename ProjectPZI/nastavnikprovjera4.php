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

if ($prijavljeni_korisnik["uloga"] == "Učenik" ){
    echo json_encode(["message" => "Nemate pristup podacima", "status" => 400]);}
    else if($prijavljeni_korisnik["uloga"] == "Administrator" ){ 
      header("Location: admin_4razred.php");
  }
  else {
    header("Location: nastavnik_4_razred.php");
}


?>

<?php
include("static/footer.php");
?>

