<?php
    $konekcija=mysqli_connect('localhost','fpmoz062021','csdigital2021','fpmoz062021');


if (!$konekcija) {
    die("Nismo se spojili na bazu iz nekog razloga, možda znate o čemu se radi, evo greška: " . mysqli_connect_error());
}
?>


