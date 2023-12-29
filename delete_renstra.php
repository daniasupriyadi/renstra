<?php
include('config.php');

$indikator_kinerja_id = $_GET['indikator_kinerja_id'];

$delete_data = mysqli_query($mysql, "DELETE FROM Indikator_Kinerja WHERE indikator_kinerja_id=$indikator_kinerja_id");

header("Location:renstra.php");
?>