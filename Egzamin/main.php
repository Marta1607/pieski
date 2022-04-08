<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="navi">
        <h1>Forum wielbicieli psów</h1>
    </div>
    <div class="lewy">
        <img src="./piesek.jpg" alt="foksterier">
    </div>
    <div class="prawy1">
        <h2>Zapisz się</h2>
        <form action="main.php" method="post">
            login
            <input type="text" name="log"><br>
            hasło
            <input type="password" name="has" id=""><br>
            powtórz hasło
            <input type="password" name="hasp" id=""><br>
            <button type="submit">Zapisz</button>
        </form>

<?php

    if(isset($_POST['log'])){
            
            $pobieranie=mysqli_connect('localhost','root','','psy');

            $log=$_POST['log'];
            $has=$_POST['has'];
            $hasp=$_POST['hasp'];

            $sql = mysqli_query($pobieranie, "SELECT login from uzytkownicy where login='$log'");

            if(empty($log) || empty($has) || empty($hasp)){
                echo "<p>wypełnij wszystkie pola</p>";
            }
            else{
                if(mysqli_num_rows($sql)!=0){
                    echo "<p>login już istnieje</p>";
                }
                else if($has != $hasp){
                    echo "<p>hasła nie są takie same</p>";
                }
                else{
                    $za=sha1('$has');
                    $q3 = mysqli_query($pobieranie,"INSERT uzytkownicy(login,haslo) VALUES ('$log', '$za')");
                    echo "<p>konto zostało dodane</p>";
                    
                }
                
            }


        $h = mysqli_close($pobieranie);
    }
?>

    </div>
    <div class="prawy2">
        <h2>Zapraszamy wszystkich</h2>
        <ol>
            <li>właścicieli psów</li>
            <li>weterynarzy</li>
            <li>tych, co chcą adoptować psa</li>
            <li>tych, co lubią psy</li>
        </ol>
        <a href="index.html">regulamin</a>
    </div>
    <footer>
        Stronę wykonał: 2137
    </footer>
</body>
</html>