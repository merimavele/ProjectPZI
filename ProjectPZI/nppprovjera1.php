<?php
include("db.php"); 
include("korisnikclass.php");
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
$id1 = $_SESSION["token"];


 if($prijavljeni_korisnik["uloga"] == "Administrator"  ){ 
      header("Location: nppnastavnik1razred.php");}
      else if($prijavljeni_korisnik["uloga"] == "Nastavnik" ){ 
        header("Location: nppnastavnik1razred.php");
  }
  else if($prijavljeni_korisnik["uloga"] == "Učenik" ){ 
    header("Location: npp1razred_ucenik.php");
}
 


?>

<?php
include("static/footer.php");
?>

