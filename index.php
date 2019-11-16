<?php
require_once 'CSV/Read.php';
require_once 'CSV/Write.php';

$set_content = new Write('data.csv');
$get_content = new Read('data.csv');
$arr = $get_content->getCSV();

print <<<Doc
<html lang="">
<head><title>TITTLE</title></head>
    <body>
         <form action=" " method="POST">
             <input type="text" name="name" placeholder="Введите Имя:">
             <input type="date" name="date">
             <input type="submit" name="submit"value="Записать в файл">
         </form>    
    </body>
</html>
Doc;

echo '<table border="1">';
echo '<tr>';
echo '<th>Имя:</th>';
echo '<th>Дата рождения:</th>';
echo '</tr>';

foreach ($arr as $value) {
    echo '<tr>';
    echo '<td>' . $value['0'] . '</td>';
    echo '<td>' . $value['1'] . '</td>';
    echo '</td>';
    echo '</tr>';
}

if (isset($_POST['submit'])) {
    if (!empty($_POST['name']) && !empty($_POST['date'])) {
        $SendArr = [
            [
                '0' => $_POST['name'],
                '1' => $_POST['date'],
            ]];
        $set_content->setCSV($SendArr);
    } else {
        echo 'Введите имя и дату рождения!<br>';
    }
}
