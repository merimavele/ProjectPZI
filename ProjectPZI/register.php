<?php
require ("db.php");
if (isset($_POST["imeKorisnika"])) {
    if ($_POST["imeKorisnika"] == ""  || $_POST["prezimeKorisnika"] == ""  || $_POST["emailKorisnika"] == "" ||  $_POST["lozinkaKorisnika"] == "" || $_POST["pLozinkaKorisnika"] == "")
        $greska = "Nastala je greška niste unijeli sva polja.";
    else if ($_POST["lozinkaKorisnika"] != $_POST["pLozinkaKorisnika"])
        $greska = "Nastala je greška lozinke se ne podudaraju!";
    else {
        $SQL = "INSERT INTO korisnik VALUES (null, '";
        $SQL.= $_POST["imeKorisnika"] . "', '";
        $SQL.= $_POST["prezimeKorisnika"] . "', '";
        $SQL.= $_POST["emailKorisnika"] . "', '";
        $SQL.= md5($_POST["lozinkaKorisnika"]) . "', 'učenik');";
        $rezultat = mysqli_query($konekcija, $SQL);
        $uspjeh = "Uspješno ste se registrovali na sustav! Prijavite se!";
    }
}
$naslov = "Registracija na sustav";
include("static/header.php");


?>
<div class="container h-100">
    <div class="row align-items-center h-100">
        <div class="col shadow p-5">
            <h5>Registracija na sustav OnlineMaths</h5>
            <?php if (isset($greska)): ?>
            <div class="alert alert-danger"><?php echo($greska) ?></div>
            <?php endif ?>
            <?php if (isset($uspjeh)): ?>
            <div class="alert alert-success"><?php echo($uspjeh) ?></div>
            <?php endif ?>
            <form method="POST" action="register.php">
                <div class="form-group">
                    <label>Ime:</label>
                    <input type="text" class="form-control" name="imeKorisnika" placeholder="Unesite Vaše ime" />
                </div>

                <div class="form-group">
                    <label>Prezime:</label>
                    <input type="text" class="form-control" name="prezimeKorisnika" placeholder="Unesite Vaše prezime" />
                </div>

                
                <div class="form-group">
                    <label>E-mail adresa:</label>
                    <input type="email" class="form-control" name="emailKorisnika" placeholder="Unesite Vašu email adresu" />
                </div>

                <div class="form-group">
                    <label>Vaša lozinka:</label>
                    <input type="password" class="form-control" name="lozinkaKorisnika" placeholder="Unesite Vašu lozinku" />
                </div>

                <div class="form-group">
                    <label>Ponovite Vašu lozinku:</label>
                    <input type="password" class="form-control" name="pLozinkaKorisnika" placeholder="Ponovite Vašu lozinku" />
                </div>
                <p>Imate račun? Prijavite se <a  href="index.php">ovdje</a>.</p>
                
                <button type="submit" class="btn btn-primary">Pošalji obrazac</button>
            </form>
        </div>
    </div>
</div>


