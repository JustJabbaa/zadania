<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    body{
    text-align:center;
    }
    table,tr,td
     {
        border: 1px solid black;
    }
</style>
<body>
<?php
    require("connect.php");
    if(isset($_POST['submit'])){
        if(!empty($_POST['numer_dziennik']) && ($_POST['imie']) && ($_POST['nazwisko'])){
            $nrdziennik = $_REQUEST['numer_dziennik'];
            $imie1 = $_REQUEST['imie'];
            $nazwisko1 = $_REQUEST['nazwisko'];

            $qr1 = $conn->prepare("INSERT INTO `klasa` (`id`, `numer_dziennik`, `imie`, `nazwisko`) VALUES ('NULL', ?, ?, ?);");
            $qr1->bind_param("iss",$nrdziennik,$imie1,$nazwisko1);
            $qr1->execute();
        };
    };
?>
<form action="strona.php" method="POST">
            Numer w dzienniku: <input type="number"  name="numer_dziennik">
            Imię: <input type="text"  name="imie">
            Nazwisko: <input type="text"  name="nazwisko">
            <button name="submit"type="submit">DODAJ</button>
        </form>
<table>
    <tr>
        <th>ID</th>
        <th>Numer z dziennika</th>
        <th>Imie</th>
        <th>Naziwsko</th>
    </tr>
    <?php
    require("connect.php");
    while ($row = $result->fetch_assoc()) {
        $id= $row['id'];
        $numer = $row['numer_dziennik'];
        $imie = $row['imie'];
        $nazwisko = $row['nazwisko'];

        echo '<tr>';
        echo '<td>'.$id.'</td>';
        echo '<td>'.$numer.'</td>';
        echo '<td>'.$imie.'</td>';
        echo '<td>'.$nazwisko.'</td>';
        echo '</tr>';
        
    }
    $conn->close();
    ?>
</table>
</body>
</html>