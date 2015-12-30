<?php
/**
 * Auto-generated code below aims at helping you parse
 * the standard input according to the problem statement.
 **/

fscanf(STDIN, "%d",
    $N
);

//Считываем лошадей в массив
$horses = [];
for ($i = 0; $i < $N; $i++)
{
    fscanf(STDIN, "%d",
        $Pi
    );
    $horses[$i] = $Pi;
}

// Write an action using echo(). DON'T FORGET THE TRAILING \n
// To debug (equivalent to var_dump): error_log(var_export($var, true));


//Сортируем массив лошадок
sort($horses);
//задаём максимум по условию задачи
$answer = 10000000;
//сравниваем соседние элементы в поисках минимальной разницы
for ($i = 0; $i < $N; $i++)
{
  $difference = $horses[$i] - $horses[$i-1];
  if ($difference < $answer) {
    $err .= $difference." ";
    $answer = $difference;
  }
}

//Вывод результата
echo $answer."\n";


?>
