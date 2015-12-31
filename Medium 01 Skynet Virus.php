<?php
/**
 * Auto-generated code below aims at helping you parse
 * the standard input according to the problem statement.
 **/
 //Функция отрезания связи
 function CutLink($N1,$N2,&$links,$L)
 {
   for ($i = 0; $i < $L; $i++)
   {
     if ($links[$i][0] == $N1 and $links[$i][1] == $N2)
     {
       unset($links[$i]);
     }
     elseif ($links[$i][0] == $N2 and $links[$i][1] == $N1)
     {
       $N1 = $N2;
       $N2 = $N1;
       unset($links[$i]);
     }
   }
   echo $N1." ".$N2."\n";
 }
 //Возможные ходы из точки
 function PossibleNodes($place,$links,$L)
 {

   $possibleWays = [];
   for ($i=0; $i < $L; $i++)
   {
     if ($links[$i][0] == $place)
     {
       $possibleWays[] = $links[$i][1];
     }
     elseif ($links[$i][1] == $place)
     {
       $possibleWays[] = $links[$i][0];
     }
   }
   return $possibleWays;
}

//Проверяем есть ли в возможных ходах выход
function IsExit($possibleWays, $exits, $E, $place, &$exit, &$nodeToExit)
{
  $exit = NULL;
  foreach ($possibleWays as $value)
  {
    for ($i = 0; $i < $E; $i++)
      if ($value == $exits[$i])
      {
        $exit = $exits[$i];
        $nodeToExit = $place;
      }
  }
}

fscanf(STDIN, "%d %d %d",
    $N, // the total number of nodes in the level, including the gateways
    $L, // the number of links
    $E // the number of exit gateways
);

//Считываем данные связей в массив
$links = [];
for ($i = 0; $i < $L; $i++)
{
    fscanf(STDIN, "%d %d",
        $N1, // N1 and N2 defines a link between these nodes
        $N2
    );
    $links[$i] = array($N1, $N2);
}

////Считываем точки выхода в массив
$exits = [];
for ($i = 0; $i < $E; $i++)
{
    fscanf(STDIN, "%d",
        $EI // the index of a gateway node
    );
    $exits[$i] = $EI;
}

// game loop
while (TRUE)
{
    fscanf(STDIN, "%d",
        $SI // The index of the node on which the Skynet agent is positioned this turn
    );

    // Write an action using echo(). DON'T FORGET THE TRAILING \n
    // To debug (equivalent to var_dump): error_log(var_export($var, true));

    //echo("0 1\n"); Example: 0 1 are the indices of the nodes you wish to sever the link between

    $place0 = $SI;

    //задаём максимальную длину прохода
    $maxSteps = 2;
    $step = $maxSteps;
    $ways = [];
    $possibleWays0 = PossibleNodes($place0, $links, $L);

    //for ($k=1; $k <= $maxSteps; $k++)


      $possibleWays0 = PossibleNodes($place0, $links, $L);
      IsExit($possibleWays0, $exits, $E, $place0, $exit, $nodeToExit);
      if ($exit)
      {
        $step = 0;
        $ways[0] = array($exit, $nodeToExit);
      }
      else
      {
        foreach ($possibleWays0 as $value)
        {
          $place1 = $value;
          $possibleWays1= PossibleNodes($place1, $links, $L);
          IsExit($possibleWays1, $exits, $E, $place1, $exit, $nodeToExit);
          if ($exit)
          {
            $step = 1;
            $ways[1] = array($exit, $nodeToExit);
          }
          else
          {
            foreach ($possibleWays1 as $value)
            {
              $place2 = $value;
              $possibleWays2 = PossibleNodes($place2, $links, $L);
              IsExit($possibleWays2, $exits, $E, $place2, $exit, $nodeToExit);
              if ($exit)
              {
                $step = 2;
                $ways[2] = array($exit, $nodeToExit);
              }
            }

          }
        }

      }




      if (is_array($ways[$step]))
      {
        $exit1 = $ways[$step][0];
        $nodeToExit1 = $ways[$step][1];
        $errstr = $step;
      }


    CutLink($nodeToExit1, $exit1, $L);



error_log(var_export($step, true));

}
?>
