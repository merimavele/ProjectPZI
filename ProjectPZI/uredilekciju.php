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
        echo json_encode(["message" => "Nemate pristup podacima", "status" => 400]);}
        
include ("baza.php");
// Inicijaliziraj bazu
$baza = new Baza();


    // Podaci iz forme
    $id = $_POST['id'];
    $ime = $_POST['ime'];
    $opis = $_POST['opis']; 
    $id1 = $_SESSION["token"];
    $IDNastavnika = $id1;
    $Nazivrazreda = $_POST['Nazivrazreda'];
    $lekcija = $_POST['lekcija'];
    

    
 
// Izvrši upit
$baza->exec('UPDATE materijali SET ime = ?, opis = ?, Nazivrazreda = ?, lekcija = ? WHERE id = ?', [$ime, $opis, $Nazivrazreda, $lekcija, $id ]);
        
    

if ($prijavljeni_korisnik["uloga"] == "Nastavnik") {         
if($Nazivrazreda=="Prvi"){
    header('Location: nastavnik_1_razred.php');}
    elseif($Nazivrazreda=="Drugi"){
        header('Location: nastavnik_2_razred.php');}
        elseif($Nazivrazreda=="Treći"){
            header('Location: nastavnik_3_razred.php');}
            elseif($Nazivrazreda=="Četvrti"){
                header('Location: nastavnik_1_razred.php');}
             }
 if ($prijavljeni_korisnik["uloga"] == "Administrator") {         
     if($Nazivrazreda=="Prvi"){
           header('Location: admin_1razred.php');}
     elseif($Nazivrazreda=="Drugi"){
          header('Location: admin_2razred.php');}
     elseif($Nazivrazreda=="Treći"){
          header('Location: admin_3razred.php');}
    elseif($Nazivrazreda=="Četvrti"){
          header('Location: admin_4razred.php');} }          
            exit();
            

// Uključi podnožje
require('podnozje.php');

?>