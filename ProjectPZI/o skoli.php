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
$naslov="O školi";
include("header1.php");
?>>
  
  <div class=".container-fluid">
      <div class="row">
      <div class="col-sm-6" style="
    padding-left: 40px;
    padding-right: 30px;
    margin-top: 20px; ">

                <p> <img src="skola.jpg" width="600"  height="350" align="left" vspace="100"  alt style=" margin-top: 15px;">  </p>
               
             >
             
            </div>
            <div class="col-sm-6" style="
    padding-left: 30px;
    padding-right: 30px;
    margin-top: 20px; ">
    <div class="tekst1">
              <p>Srednja elektrotehnička škola Mostar se sastoji od četverogodišnje i trogodišnje škole.Poslije rata škola je počela sa radom školske 1992./93.g. Zbog ratnih dejstava nastava je bila organizovana po mjesnim zajednicama.  10.marta 1994.g. sve srednje škole sa punktova prelaze u zgradu IV OŠ. Tada je za direktora elektrotehničke škole imenovan prof.Zulfo Vejzović.Nastava je počela 21.3.1994.g. Upisano 149 učenika u 5 odjeljenja. Naziv škole tada je bio Mješovita srednja elektrotehnička škola.

Rješenjem koje je donio Sekretarijat društvenih djelatnosti školske 1996./97.g.  Mješovita srednja elektrotehnička škola prelazi u prostorije VI OŠ gdje smo ostali do danas.

Škola ima formiran razvojni tim koji  intenzivno radi na dobijanju nove školske zgrade.

Škola se nalazi u ulici Alekse Šantića br. 10. Više o školi možete pročitati na <a href="http://www.etsmostar.edu.ba/
                "> JU Srednja elektrotehnička Škola Mostar</a>.  
              </p>
            </div>
            </div>
           
          </div>
          </div>
          </div>

      
  


    

<?php include('podnozje.php'); ?>
 
