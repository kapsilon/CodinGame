<?php
/**
 * Auto-generated code below aims at helping you parse
 * the standard input according to the problem statement.
 **/

fscanf(STDIN, "%d",
    $L
);
fscanf(STDIN, "%d",
    $H
);
$T = stream_get_line(STDIN, 256, "\n");

//Массив таблицы кодов
$allRows = [];
//Массив ответов
$answer = [];

for ($i = 0; $i < $H; $i++)
{
    $ROW = stream_get_line(STDIN, 1024, "\n");
//Отправляем строки в массив
    $allRows[$i] = $ROW;
}

// Write an action using echo(). DON'T FORGET THE TRAILING \n
// To debug (equivalent to var_dump): error_log(var_export($var, true));

$T = strtoupper($T);

//номер символа по порядку в системе ASCII
for ($i=0; $i < strlen($T); $i++)
{
  $asciiNum = ord($T[$i])-64;
//Заменяем все лишние эжлементы на "?"
  if (0 < $asciiNum and $asciiNum < 27)
  {
    $symbolNumber[] = $asciiNum;
  }
  else
  {
    $symbolNumber[] = 27;
  }

}


//Процедура для каждого символа ?? форич по строки хочет лишний элемент и в итоге Undefined offset
foreach ($symbolNumber as $value) {
    for ($i=0; $i < $H; $i++)
    {
//определяем начало нужного символа
      $symbolStart = ($value-1)*$L;
//переносим его символы из заданоного шаблона в ответ
      $answer[$i] .= substr($allRows[$i], $symbolStart, $L);
    }
}
//Выводим ответ построчно
foreach ($answer as $key => $value)
{
  echo $value."\n";
}


?>
