<?fscanf(STDIN,"%d %d %d %d",$c,$d,$e,$f);
function LM($g,$h){if($g>0){echo("E\n");}elseif($g<0){echo("W\n");}if($h>0){echo("S\n");}elseif($h<0){echo("N\n");}}
function AM($a,$b){$j=$b-$a;if($j>0){if(abs($b)<abs($a)){echo("SW\n");}else{echo("SE\n");}}else{if(abs($b)<abs($a)){echo("NW\n");}else{echo("NE\n");}}}
$g=$c-$e;$h=$d-$f;$a=$g-$h;$b=$h+$g;$k=abs($g);$l=abs($h);
while(TRUE){if($n==0){for($i=0;$i<abs($k-$l);$i++){if($l<$k){LM($g,0);}else{LM(0,$h);}}$n=1;}AM($a,$b);}?>
