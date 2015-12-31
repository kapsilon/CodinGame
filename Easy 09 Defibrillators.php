<?php
/**
 * Auto-generated code below aims at helping you parse
 * the standard input according to the problem statement.
 **/
//константа перевода радиан
const rad = 6371;

//Функция расчёта дистанции
 function Distance($xA, $yA, $xB, $yB)
 {
   $x = ($xB - $xA) * cos(($yA + $yB) / 2);
   $y = $yB - $yA;
   $dist = sqrt($x*$x + $y*$y) * rad;
   return $dist;
 }
 //Функция приведия чисел с запятой
 function FloatRadStyle($number)
 {
   $number = str_replace(",", ".", $number);
   $number = deg2rad($number);
   return $number;
 }

fscanf(STDIN, "%s",
    $LON
);
//Превращаем градусы в радианы
$LON = FloatRadStyle($LON);

fscanf(STDIN, "%s",
    $LAT
);
$LAT = FloatRadStyle($LAT);

fscanf(STDIN, "%d",
    $N
);



//Считываем данные в двумерный массив
$defibrillators = [];
for ($i = 0; $i < $N; $i++)
{
    $DEFIB = stream_get_line(STDIN, 256, "\n");
    list($num, $name, $address, $phone, $lonB, $latB) = explode(";", $DEFIB);
    $lonB = FloatRadStyle($lonB);
    $latB = FloatRadStyle($latB);
    $defibrillators[$i] = array($name, $lonB, $latB);
}

// Write an action using echo(). DON'T FORGET THE TRAILING \n
// To debug (equivalent to var_dump): error_log(var_export($var, true));


//Ищем минимальную дистанцию
$minDist = pow(2, 32);
$choice = 0;
for ($i = 0; $i < $N; $i++)
{
  $dist = Distance($LON, $LAT, $defibrillators[$i][1], $defibrillators[$i][2]);

  if ($dist < $minDist)
  {
    $minDist = $dist;
    $choice = $i;
  }
}

//Вывод ответа
echo $defibrillators[$choice][0];

?>
