<?php
/**
 * Auto-generated code below aims at helping you parse
 * the standard input according to the problem statement.
 **/

fscanf(STDIN, "%d",
    $road // the length of the road before the gap.
);
fscanf(STDIN, "%d",
    $gap // the length of the gap.
);
fscanf(STDIN, "%d",
    $platform // the length of the landing platform.
);

//Функции действий
function Speed()
{
  echo("SPEED\n");
}
function Slow()
{
  echo("SLOW\n");
}
function Jump()
{
  echo("JUMP\n");
}
function Wait()
{
  echo("WAIT\n");
}

//Точка края
$edge1 = $road - 1;
$edge2 = $road + $gap + 1;

// game loop
while (TRUE)
{
    fscanf(STDIN, "%d",
        $speed // the motorbike's speed.
    );
    fscanf(STDIN, "%d",
        $coordX // the position on the road of the motorbike.
    );

    // Write an action using echo(). DON'T FORGET THE TRAILING \n
    // To debug (equivalent to var_dump): error_log(var_export($var, true));

    //echo("SPEED\n"); A single line containing one of 4 keywords: SPEED, SLOW, JUMP, WAIT.
//Разгон
    if ($coordX < $edge1)
    {
        if ($speed < $gap + 1)
        {
          Speed();
        }
        elseif ($speed == $gap + 1)
        {
          Wait();
        }
        else
        {
        Slow();
        }
    }
//Один (!!) прыжок
    elseif ($coordX = $edge1 and $jumped === null)
    {
      Jump();
      $jumped++;
    }
//Остановка
    else
    {
      Slow();
    }









}
?>
