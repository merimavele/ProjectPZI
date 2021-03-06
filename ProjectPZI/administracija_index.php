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

if (!$prijavljeni_korisnik) header("Location: index.php");
if ($prijavljeni_korisnik["uloga"] != "Administrator") {
    header("Location: adminstracijaprovjera.php");}
 $naslov=" Administracija ";
include("header1.php");
?>
<div class=".container-fluid">
      <div class="row">
      <div class="col-sm-3">
      <?php
include("nav1.php");
?>
  </div>
  
  <div class="col-sm-9" >
  <p> <img src="administracija.jpg"  width="100%" height="670px" alt style="
    margin-top: 50px; ">  </p>
  </div>
</div>
</div>
</div>
  


  
<?php
include("podnozje.php");?>

