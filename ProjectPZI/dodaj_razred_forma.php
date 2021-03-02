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
if ($prijavljeni_korisnik["uloga"] != "Administrator") {
    
        
        header("Location: administracijaprovjera.php");
        echo json_encode(["message" => "Nemate pristup podacima", "status" => 400]);
    }

$naslov= "Dodaj razred";
include("header1.php"); ?>
<div class="container">
    <div class="row">
        <div class="col-md-12">

            <h4>Dodaj novi razred</h4>

            <?php if(isset($_SESSION['obavijest_greska'])): ?>
                <!-- Obavijesti greške -->
                <div class="obavijest">
                    <div class="alert alert-danger alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <?php

                        // Ispiši obavijest
                        echo $_SESSION['obavijest_greska'];

                        // Isprazni spremnik za obavijesti
                        unset($_SESSION['obavijest_greska']);

                        ?>
                    </div>
                </div>
            <?php endif; ?>

            <?php if(isset($_SESSION['obavijest_uspjeh'])): ?>
                <!-- Obavijesti uspjeha -->
                <div class="obavijest">
                    <div class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <?php

                        // Ispiši obavijest
                        echo $_SESSION['obavijest_uspjeh'];

                        // Isprazni spremnik za obavijesti
                        unset($_SESSION['obavijest_uspjeh']);

                        ?>
                    </div>
                </div>
            <?php endif; ?>

            <form class="form-horizontal" action="dodaj_razred.php" method="POST" enctype="multipart/form-data">

      
            <div class="form-group">
                <!-- Dodavanje polja za pohranu ID korisnika -->
                <input type="hidden" name="id" />
                <!-- Dodavanje polja za pohranu ID korisnika -->
               
                <div class="form-group">
                    <label for="input" class="col-sm-2 control-label">Naziv</label>
                    <div class="col-sm-10">
                    <select required class="form-control" id="input" name="Naziv">
                       
                  <option value="Prvi">Prvi</option>
                  <option value="Drugi">Drugi</option>
                  <option value="Treći">Treći</option>
                  <option value="Četvrti">Četvrti</option>
                </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="input" class="col-sm-2 control-label">email nastavnika</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="input" name="emailNastavnika">
                    </div>
               
                </div>
                </div>

               

                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-default">Spasi</button>
                    </div>
                </div>
                </form>
            </div>
            </div>
            </div>

