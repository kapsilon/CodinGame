<?php
/**
 * Auto-generated code below aims at helping you parse
 * the standard input according to the problem statement.
 * ---
 * Hint: You can use the debug stream to print initialTX and initialTY, if Thor seems not follow your orders.
 **/

fscanf(STDIN, "%d %d %d %d",
    $lightX, // the X position of the light of power
    $lightY, // the Y position of the light of power
    $initialTX, // Thor's starting X position
    $initialTY // Thor's starting Y position
);

//Движение по линии
function LineMovement($movX, $movY)
{
  //Движемся по горизонтале
  if ($movX > 0) {
      echo("E\n");
    }
  elseif ($movX < 0) {
      echo("W\n");
    }
  //Движемся по вертикале
  if ($movY > 0) {
      echo("S\n");
    }
  elseif ($movY < 0) {
      echo("N\n");
    }
}
//Движение под углом
function AngleMovement($angleX, $angleY)
{
  $angleZ = $angleY - $angleX;
  if ($angleZ > 0)
  {
    if (abs($angleY) < abs($angleX) )
    {
      echo("SW\n");
    }
    else
    {
      echo("SE\n");
    }
  }
  else
  {
    if (abs($angleY) < abs($angleX))
    {
      echo("NW\n");
    }
    else
    {
      echo("NE\n");
    }
  }

}


// game loop
while (TRUE)
{
    fscanf(STDIN, "%d",
        $remainingTurns // The remaining amount of turns Thor can move. Do not remove this line.
    );

    // Write an action using echo(). DON'T FORGET THE TRAILING \n
    // To debug (equivalent to var_dump): error_log(var_export($var, true));

    // A single line providing the move to be made: N NE E SE S SW W or NW

//Считаем смещение
    $movX = $lightX - $initialTX;
    $movY = $lightY - $initialTY;
//Определяем разницу между смещениями
    $angleX = $movX - $movY;
    $angleY = $movY + $movX;
//Определяем количество прямых шагов до цели
    $absX = abs($movX);
    $absY = abs($movY);
    $abs = abs($absX-$absY);

//Идём прямо
    if ($stop == 0) {
      for ($i=0; $i < $abs; $i++) {
        if ($absY < $absX)
        {
            LineMovement($movX, 0);
        }
        else
        {
            LineMovement(0, $movY);
        }
      }
      $stop = 1;
    }
//Идём наискосок
    AngleMovement($angleX, $angleY);
















}

?>
