<?php
/**
 * Auto-generated code below aims at helping you parse
 * the standard input according to the problem statement.
 **/

fscanf(STDIN, "%d",
    $N // Number of elements which make up the association table.
);
fscanf(STDIN, "%d",
    $Q // Number Q of file names to be analyzed.
);
//Считываем в массив миме-типы
$mimeTypes = [];
for ($i = 0; $i < $N; $i++)
{
    fscanf(STDIN, "%s %s",
        $EXT, // file extension
        $MT // MIME type.
    );
    $EXT = strtolower($EXT);
    $mimeTypes [$EXT] = $MT;
}

$fileTypes = [];
//Считываем данные файлов в массив
for ($i = 0; $i < $Q; $i++)
{
    $FNAME = stream_get_line(STDIN, 500, "\n"); // One file name per line.
    //list($fileName, $fileType) = explode(".", $FNAME);
    $fileType = substr(strrchr($FNAME, "."), 1 );
    $fileType = strtolower($fileType);
    $fileTypes[$i] = $fileType;

}

// Write an action using echo(). DON'T FORGET THE TRAILING \n
// To debug (equivalent to var_dump): error_log(var_export($var, true));

//echo("UNKNOWN\n"); // For each of the Q filenames, display on a line the corresponding MIME type. If there is no corresponding type, then display UNKNOWN.



for ($i = 0; $i < $Q; $i++)
{
//Проверка существования расширения в массиве по ключам
  if (array_key_exists($fileTypes[$i], $mimeTypes))
  {
    echo $mimeTypes[$fileTypes[$i]]."\n";
  }
  else
  {
    echo("UNKNOWN\n");
  }
}


?>
