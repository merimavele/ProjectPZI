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
$naslov= "Početna";
include("header1.php");

?>




</header>
<div class=".container-fluid">
<div class= "row" style="margin-top: 15px; ">
<div class="col-sm-5">
<img src="kkk1.jpg" width="570px"  height="350px" align="left"  alt style=" margin-top: 15px;">
     </div>

<div class="col-sm-7">
<div class="tekst1">
                <p>
    Ova stranica je nastala u cilju  istraživanja mogućnosti online edukacije i razvoja interaktivnih sustava za 
    podučavanje matematike.
                  </p>
                  <p>
    Na ovoj stranici možete pronaći teoriju i riješene zadatke iz matematike 
    za srednju školu. 
                 </p>
                <p></p>
    Nadamo se da će vam posjet ovoj stranici donijeti veću ljubav prema matematici i pomoći pri savladavanju prepreka
    na koje nailazite na redovnoj nastavi. 
  

  </p>
            <div class="tekst2">

              <p>
                "Bit matematike nije u tome da jednostavne stvari zakomplicira, već da pojednostavi složene stvari." - S. Gudder
              </p>
            </div>
</div>
</div>
</div>

<?php include('podnozje.php'); ?>
