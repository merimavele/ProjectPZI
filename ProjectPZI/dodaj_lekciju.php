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
    
        
        header("Location: nastava.php");
        echo json_encode(["message" => "Nemate pristup podacima", "status" => 400]);
    }

$naslov= "Dodaj lekciju";

// Započni novu ili nastavi postojeću sesiju


// Uključi vanjsku biblioteku
include 'baza.php';

// Inicijaliziraj bazu
$baza = new Baza();

// Provjeri tip HTTP zahtjeva
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    // Podaci iz forme
    $ime = $_POST['ime'];
    $opis = $_POST['opis'];
    $id1 = $_SESSION["token"];
    $IDNastavnika = $id1;
    $Nazivrazreda = $_POST['Nazivrazreda'];

    // Upload datoteka
    $tip_datoteke = pathinfo($_FILES['datoteka']['name'], PATHINFO_EXTENSION);

    $direktorij_za_upload = 'datoteke/';
    $novi_naziv_datoteke = uniqid() . '.' . $tip_datoteke;

    $uploadOk = true;

    // Provjeri da li datoteka već postoji
    if(file_exists($direktorij_za_upload . $novi_naziv_datoteke))
    {
        $uploadOk = false;
        $_SESSION['obavijest_greska'] = 'Datoteka već postoji!';
    }

    // Provjeri veličinu datoteke
    else if($_FILES['datoteka']['size'] > 200000)
    {
        $uploadOk = false;
        $_SESSION['obavijest_greska'] = 'Datoteka je prevelika!';
    }

    // Dozvoli samo određene formate datoteke
    else if($tip_datoteke != 'jpg' && $tip_datoteke != 'jpeg'  && $tip_datoteke != 'png' && $tip_datoteke != 'docx' && $tip_datoteke != 'pdf')
    {
        $uploadOk = false;
        $_SESSION['obavijest_greska'] = 'Ovaj tip datoteke nije dozvoljen!';
    }

    // Provjeri stanje uploada
    if($uploadOk == true)
    {
        // Sve je uredu, uploadaj datoteku

        if(move_uploaded_file($_FILES['datoteka']['tmp_name'], $direktorij_za_upload . $novi_naziv_datoteke))
        {
            // Unesi unos u bazu
            $baza->exec('INSERT INTO materijali(ime, opis, lekcija, IDNastavnika, Nazivrazreda) VALUES (?, ?, ?, ?, ?)', [$ime, $opis, $novi_naziv_datoteke, $IDNastavnika, $Nazivrazreda]);

            // Pohrani poruku o uspješnoj izmjeni
            $_SESSION['obavijest_uspjeh'] = 'Datoteka uspješno uploadana.';

            // Preusmjeri na početnu stranicu
            if($Nazivrazreda=="Prvi"){ 
                header('Location: nastavnikprovjera1.php');}
                elseif($Nazivrazreda=="Drugi"){
                    header('Location: nastavnikprovjera2.php');}
                    elseif($Nazivrazreda=="Treći"){
                        header('Location: nastavnikprovjera3.php');}
                        elseif($Nazivrazreda=="Četvrti"){
                            header('Location: nastavnikprovjera4.php');}
            exit();
        }
        else
        {
            $_SESSION['obavijest_greska'] = 'Dogodila se greška prilikom uploada.';
        }
    }
}
