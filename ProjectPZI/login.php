<?php
session_start();

require("db.php");

if (isset($_POST["emailKorisnika"])){
    if ($_POST["emailKorisnika"] == "" || $_POST["lozinkaKorisnika"] == ""){
        $greska = "Molimo unesite Vašu email adresu i lozinku.";
    } else {
        $SQL = "SELECT ID FROM korisnik WHERE";
        $SQL .= " email='" . $_POST["emailKorisnika"] . "' AND ";
        $SQL .= " lozinka='". md5($_POST["lozinkaKorisnika"]) . "'";
        $rezultat = mysqli_query($konekcija, $SQL);
        
        if (mysqli_num_rows($rezultat) == 0) {
            $greska = "Vaši korisnički podaci nisu ispravni molimo pokušajte ponovo.";
        } else {
            $korisnik = mysqli_fetch_assoc($rezultat);
            $_SESSION["token"] = $korisnik["ID"]; }


         include("korisnikclass.php");}

            if (!Korisnik::jePrijavljen()) header("Location: index.php");
             $prijavljeni_korisnik = Korisnik::$prijavljeniKorisnik;
           if ($prijavljeni_korisnik) header("Location: pocetna.php");}

?> 
          
      


    <div class="container h-100">
        <div class="row align-items-center h-100">
            <div class="col shadow p-5">
                <h5>Prijava na sustav OnlineMaths</h5>
                <?php if (isset($greska)): ?>
                <div class="alert alert-danger"><?php echo($greska) ?></div>
                <?php endif ?>
                <form method="POST" action="login.php">
                    <div class="form-group">
                        <label>E-mail adresa:</label>
                        <input type="email" class="form-control" name="emailKorisnika" placeholder="Unesite Vašu email adresu" />
                    </div>

                    <div class="form-group">
                        <label>Vaša lozinka:</label>
                        <input type="password" class="form-control" name="lozinkaKorisnika" placeholder="Unesite Vašu lozinku" />
                    </div>
                    <p>Nemate račun? Napravite ga <a  href="register.php">ovdje</a>.</p>
                    <button type="submit" class="btn btn-primary">Pošalji obrazac</button>
                </form>
            </div>
        </div>
    </div>
