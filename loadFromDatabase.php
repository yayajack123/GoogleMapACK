<?php
    include "config.php";
    $queryGetData = $koneksi->query("SELECT * from tb_latlang ");
    $row = array();
    while ($rowData = mysqli_fetch_array($queryGetData)) {
        $row[] = $rowData;
    }
    print json_encode($row);
?>