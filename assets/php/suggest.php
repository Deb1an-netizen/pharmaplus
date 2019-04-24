<?php

    $conn = mysqli_connect("localhost","root","","pharmaplus");

    
    if(!empty($_POST["keyword"])) {
        $query ="SELECT * FROM patient WHERE pssn like '" . $_POST["keyword"] . "%' ORDER BY pssn LIMIT 0,6";
        $result = $conn->query($query);
        if(!empty($result)) {
        ?>
        <ul id="country-list">
        <?php
        foreach($result as $pat) {
        ?>
        <li onClick="selectPatient('<?php echo $pat["pssn"]; ?>');"><?php echo $pat["pssn"]; ?></li>
        <?php } ?>
        </ul>
        <?php } } ?>