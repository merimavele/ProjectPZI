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
include 'baza.php';


// Inicijaliziraj bazu
$baza = new Baza();


    // Podaci iz forme
    $id = $_POST['id'];
    $Nazivoblasti = $_POST['Nazivoblasti'];
    $Nazivrazreda = $_POST['Nazivrazreda'];
 
    

    
 
// Izvrši upit
$baza->exec('UPDATE npp SET Nazivoblasti = ?,  Nazivrazreda = ? WHERE id = ?', [$Nazivoblasti,  $Nazivrazreda, $id ]);
        
    

           
             // Preusmjeri na početnu stranicu

             if ($prijavljeni_korisnik["uloga"] == "Nastavnik") {         
                if($Nazivrazreda=="Prvi"){
                    header('Location: nppnastavnik1razred.php');}
                    elseif($Nazivrazreda=="Drugi"){
                        header('Location: nppnastavnik2razred.php');}
                        elseif($Nazivrazreda=="Treći"){
                            header('Location: nppnastavnik3razred.php');}
                            elseif($Nazivrazreda=="Četvrti"){
                                header('Location: nppnastavnik4razred.php');}
                             }
                 if ($prijavljeni_korisnik["uloga"] == "Administrator") {         
                
                           header('Location: npp_admin.php');}
                       
             
            exit();
            

// Uključi podnožje
require('podnozje.php');

?>