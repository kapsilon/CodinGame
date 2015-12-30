<?php
/**
 * Auto-generated code below aims at helping you parse
 * the standard input according to the problem statement.
 **/
 //функция преобразования строки в бинарный код ascii
function DecSymbol($symbol)
{
  $binSymbol = decbin(ord($symbol));
//цифры и знаки составляют всего шесть байт, поэтому добвляем 0 впереди для них
  if (strlen($binSymbol) == 6)
  {
    $binSymbol = "0".$binSymbol;
  }
  return $binSymbol;
}

//определяем первый символ
function FirstBinary($binSymbol)
{
  $firstByte = (integer)$binSymbol[0];
  return $firstByte;
}
 //функция определения единички и нуля
function BinaryStyle($binSymbol)
{
  $firstByte = (integer)$binSymbol[0];
  $answer = "";
  if ($firstByte)
  {
   $answer .= "0 ";
  }
  elseif (!$firstByte)
  {
     $answer .= "00 ";
  }
  return $answer;
 }

$MESSAGE = stream_get_line(STDIN, 100, "\n");
//строка ответа
$answer = "";

// Write an action using echo(). DON'T FORGET THE TRAILING \n
// To debug (equivalent to var_dump): error_log(var_export($var, true));
//определяем количество символов

//преобразуем символ(ы) в бинарную строку

$numOfSymbols = strlen($MESSAGE);
$binSymbol = "";
for ($i=0; $i < $numOfSymbols; $i++) {
  $symbol = $MESSAGE[$i];
  $binSymbol .= DecSymbol($symbol);
}


//Проверяем первый байт
$firstByte = FirstBinary($binSymbol);
$binSymbol1 = $binSymbol;
//всю строку в цикл пока она не закончится
$noStop = 1;
while ($noStop)
{
  $answer .= BinaryStyle($binSymbol);
  //определяем позицию следующего другого сивола т.е. количество текущих символов
  $firstByte = (integer)(!$firstByte);
  $nextByte = strpos($binSymbol, (string)$firstByte);
  //определяем конец строки
  if (!$nextByte)
  {
    $nextByte = strlen($binSymbol);
    $noStop = 0;
  }
  //дополнием строку количеством символов с помощью нулей
  for ($i=0; $i < $nextByte; $i++)
  {
    $answer .= "0";
  }
  //ставим разделитель (кроме последнего)
  if ($noStop) {
    $answer .= " ";
  }
  //меняем параметры
  $binSymbol = substr($binSymbol, $nextByte);
}

//выводим результат
echo("$answer\n");

?>
