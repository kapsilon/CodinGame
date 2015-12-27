<?php
/**
 * Auto-generated code below aims at helping you parse
 * the standard input according to the problem statement.
 **/
 //Стрелять
 function Fire()
 {
   echo("FIRE\n");
 }
 //Не Стрелять
 function Hold()
 {
   echo("HOLD\n");
 }

// game loop
while (TRUE)
{
    fscanf(STDIN, "%d %d",
        $spaceX,
        $spaceY
    );
    for ($i = 0; $i < 8; $i++)
    {
        fscanf(STDIN, "%d",
            $mountainH // represents the height of one mountain, from 9 to 0. Mountain heights are provided from left to right.
        );
        $mountainArr[$i] = $mountainH;
    }

    // Write an action using echo(). DON'T FORGET THE TRAILING \n
    // To debug (equivalent to var_dump): error_log(var_export($var, true));

    //echo("HOLD\n"); // either:  FIRE (ship is firing its phase cannons) or HOLD (ship is not firing).

//Свободное пространство
    $freeSpase = $spaceY - $mountainArr[$spaceX]; //10
//Пустая клетка
    $Empty = !$mountainArr[$spaceX];
//Не стреляем в пустоту
    if ($Empty)
    {
      Hold();
    }
//Стреляем сейчас
    elseif ($freeSpase == 1)
    {
      Fire();
    }
//Стреляем порожником
    elseif ($freeSpase > 1)
    {
//Есть ли большие горы?
      $maxHeight = max($mountainArr);
      $maxHeight = $spaceY - $maxHeight;
//Нет отоварим другие)
      if ($maxHeight > 1 and !$Empty)
      {
        Fire();
      }
      else
      {
        Hold();
      }
    }

}
?>
