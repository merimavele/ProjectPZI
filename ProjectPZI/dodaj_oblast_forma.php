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

if (!$prijavljeni_korisnik) header("Location: login.php");
if ($prijavljeni_korisnik["uloga"] == "Učenik") {
    
        
        header("Location: npp.php");
        echo json_encode(["message" => "Nemate pristup podacima", "status" => 400]);
    }
    $naslov= "Dodaj oblast";
    include("header1.php");


?>
<div class="container">
    <div class="row">
        <div class="col-md-12">

            <h4>Dodaj novu oblast</h4>

          

            <form class="form-horizontal" action="dodaj_oblast.php" method="POST" enctype="multipart/form-data">

                <div class="form-group">
                    <label for="input" class="col-sm-2 control-label">Naziv oblasti</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="input" name="Nazivoblasti">
                    </div>
                </div>

            
                
                <div class="form-group">
                <label for="input" class="col-sm-2 control-label">Razred</label>
                <div class="col-sm-10">
                <select required class="form-control" name="Nazivrazreda">
                  <option value="Prvi">1</option>
                  <option value="Drugi">2</option>
                  <option value="Treći">3</option>
                  <option value="Četvrti">4</option>
                </select>
            </div>
            </div> 
                


              

                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-default">Pošalji</button>
                    </div>
               
                </div>

                </form>
            </div>
            </div>
            </div>

            
