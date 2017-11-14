<!DOCTYPE html>
<html lang="en">

<head>
    <META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=iso-8859-2"/>
    <title>Klienci</title>
</head>

<body>
  <form method="post" onsubmit="nowa();" name="form2">
   <input  type="submit" value="Stwórz nową bazę lub wyzerój starą" action="nowa()">
    </form>
    <?php 
    
        function nowa(){
            echo "tak";
     $p = mysqli_connect('localhost', 'root','','elo') or Die("Nie udało się połączyć z bazą lub serwerem bazy");
    mysqli_query($p,'CREATE OR REPLACE TABLE klienci (id INT AUTO_INCREMENT PRIMARY KEY, imie VARCHAR(15) NOT NULL, nazwisko VARCHAR(15), data_ur DATE);');
    }
    ?>

    <center>

        <h3>Dodawanie klientów</h3>

        <form method="post" name="form">
           Podaj id: <input type="number" size="30" name="id"> <br>
            Podaj imie: <input type="text" size="30" name="imie"> <br>
            Podaj nazwisko: <input type="text" size="30" name="nazwisko"> <br>
            Podaj datę urodzenia: <input type="date" size="30" name="data_ur"> <br>

            <input type="submit" name="submit1" value="wyślij!" action="zap()">
        </form>



    </center>

    <?php
    
    
    
    $id = $_POST['id'];
    $imie = $_POST['imie'];
    $nazwisko = $_POST['nazwisko'];
    $data_ur = $_POST['data_ur'];

    $p = mysqli_connect('localhost', 'root','','elo') or Die("Nie udało się połączyć z bazą lub serwerem bazy");
    $q = mysqli_query($p,'SELECT * FROM klienci') or Die("błąd zapytania");
   
    while($r=mysqli_fetch_assoc($q)){
    echo "Id: ".$r['id'].".<br>";
    echo "Imie: ".$r['imie'].".<br>";
    echo "Nazwisko: ".$r['nazwisko'].".<br>";
    echo "Data urodzenia: ".$r['data_ur'].".<br>";  
    }
  if (isset($_POST['submit1'])){
    $zapytanie = "INSERT INTO klienci VALUES('$id','$imie','$nazwisko','$data_ur')";
    $wpis = mysqli_query($p, $zapytanie ) or DIE("Błąd wpisu");
  }
    mysqli_close($p);
    
    ?>
</body>

</html>
