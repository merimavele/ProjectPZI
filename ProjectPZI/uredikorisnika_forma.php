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
        
$naslov= "Uredi korisinika";
include("header1.php");
    

include 'baza.php';
    
    // Inicijaliziraj bazu
    $baza = new Baza();
    
    $id = $_GET['id'];
    
    // Izvrši upit
    $rezultat = $baza->query('SELECT * FROM korisnik WHERE ID = ?', [$id] );
    
    // Naša stavka je prvi rezultat iz baze
    $korisnik = $rezultat[0];
    
    
    ?>
    
    
    <div class="container">
        <div class="row">
            <div class="col-md-12">
    
                <h4>Uredi korisnika:</h4>
                
                <form class="form-horizontal" action="uredikorisnika.php" method="POST">
    
                    <!-- Moramo proslijediti ID stavke preko forme! -->
                    <input type="hidden" name="ID" value="<?php echo $korisnik['ID']; ?>">
    
                    <div class="form-group">
                        <label for="input" class="col-sm-2 control-label">ime</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="input" name="ime" value="<?php echo $korisnik['ime']; ?>">
                        </div>
                    </div>
    
                    <div class="form-group">
                        <label for="input" class="col-sm-2 control-label">prezime</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="input" name="prezime" value="<?php echo $korisnik['prezime']; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="input" class="col-sm-2 control-label">email</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="input" name="email" value="<?php echo $korisnik['email']; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="input" class="col-sm-2 control-label">lozinka</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="input" name="lozinka" value="<?php echo $korisnik['lozinka']; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="input" class="col-sm-2 control-label">uloga</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="input" name="uloga" value="<?php echo $korisnik['uloga']; ?>">
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
    <?php
    
   
    
    
    
    

?> 

</div>
</div>
