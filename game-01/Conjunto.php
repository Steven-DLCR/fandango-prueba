// [2, 5, 8, 14, 0] y N = 10, el subconjunto resultante debe ser [2, 8].

function conjunto($matriz = array/(), $valor = 0) 
{
    $x = 0;
    $y = 0;
    for ($i=0; $i < count($matriz); $i++) { 
        $resta = $valor - $matriz[$i];
        $index = array_search($resta, $matriz);
        if ($index != "") {
            $x = $matriz[$i];
            $y = $matriz[$index];
            break;
        }
    }

    print "[{$x}, {$y}]";
}