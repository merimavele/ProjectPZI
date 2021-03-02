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
$naslov="NPP";
include("header1.php");
?>
<div class=".container-fluid">
      <div class="row">
      <div class="col-sm-3">
      <?php
include("navnpp.php");
?>
  </div>
  <div class="col-sm-9" style="background-image: url(npp.jpg);">
  
</div>
</div>
</div>
<?php
include("podnozje.php");?>

 