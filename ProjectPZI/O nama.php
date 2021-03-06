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
$naslov="O nama";
include("header1.php");
?>
    <div class="pre-header1">
    <div class=".container-fluid">
<div class= "row" style="margin-top: 15px; ">
      
    <img src="classroom-mathematics.jpg" width="100%"  height="300"  alt style="padding-top: 20px;">
        </div>
        </div>
        </div>
  <div>
  <div class=".container-fluid">
      <div class="row">
      <div class="col-sm-3" style="
    padding-left: 40px;
    padding-right: 30px;
    margin-top: 20px; ">

                <p> <img src="MERIMA.jpg" width="200px" height="200px" alt="">  </p>
               
                <div class="tekst1"> 
                <B>Merima Vele</B>
              
        <p>  Rođena: 24.3.1996. god. </p>
        <p> Magistra  matematike </p>
        <p> Profesor matematike </p>
          <p> Student 3. godine matematike i informatike </p> </div>
             
            </div>
            <div class="col-sm-6" style="
    padding-left: 30px;
    padding-right: 30px;
    margin-top: 20px; ">
    <div class="tekst1">
              <p>Tehnologije i vremena se mijenjaju. U današnje vrijeme više nije dovoljno da komunikacija sa učenicima bude dostupna u određenom periodu dana.
                Iz tog razloga važno nam je imati web-stranicu koja će omogućiti učenicima učenje matematike periodima kojim oni žele. 
                Učenici  se susreću sa brojnim poteškoćama, trudeći se da razumiju zadatke iz ove struke, zakazuju instrukcije i daju mnogo novca, kako bi uspjeli razumijeti gradivo koje im je potrebno.
                Ova stranica nudi raspored gradiva po razredima tako da možete učiti sistematično, dobiti bolji uvid u matematiku i savladati prepreke sa koje nailazite na redovnoj nastavi iz matematike.
                Više o ovom sajtu možete pročitati na <a href="https://drive.google.com/file/d/1eEOLoDoq4nksXUbrGS2cCMdZxxcivw9t/view
                "> vizija</a>.  Autori ove stranice su Merima Vele i Nikola Ivanović.
              </p>
            </div>
            </div>
            <div class="col-sm-3" style="
    padding-left: 30px;
    padding-right: 30px;
    margin-top: 20px; ">
              
              <p> <img src="Nikola.jpg" width="200px" height="200px" alt=""> 
              <div class="tekst1"> 
               </p>
              <B>Nikola Ivanović</B>
      <p>  Rođen: 22.10.1997. god. </p>
     
        <p> Student 3. godine informatike </p></p> </div>

            </div>
          </div>
          </div>
          </div>

          <?php include('podnozje.php'); ?>
