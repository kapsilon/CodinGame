<?php
/**
 * Auto-generated code below aims at helping you parse
 * the standard input according to the problem statement.
 **/

fscanf(STDIN, "%d",
    $n // the number of temperatures to analyse
);

//Пустой массив для значений температуры
$allTemps = [];

//Считываем все температуры в массив чисел
$temps = stream_get_line(STDIN, 256, "\n"); // the n temperatures expressed as integers ranging from -273 to 5526
$allTemps = explode(" ", $temps);

for ($i=0; $i < $n; $i++) //форич не работает с функцией интеджер??
{
  $allTemps[$i] = (integer)$allTemps[$i];
}

// Write an action using echo(). DON'T FORGET THE TRAILING \n
// To debug (equivalent to var_dump): error_log(var_export($var, true));


//Ищем первое число от нуля в массиве
$i = 0;
while ($stop < 1)
{
  if (in_array($i, $allTemps))
  {
    $result = $i;
    $stop = 1;
  }
  elseif (in_array(-$i, $allTemps)) {
    $result = -$i;
    $stop = 1;
  }
  $i++;
}


//Выводим результат
echo ("$result\n");

?>
