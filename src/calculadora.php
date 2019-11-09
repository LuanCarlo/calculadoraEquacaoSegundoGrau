<?php


    $request = json_decode(file_get_contents("php://input"));

    $a = floatval ($request->valor_a);
    $b = floatval ($request->valor_b);
    $c = floatval ($request->valor_c);

    $delta = ($b * $b) - ((4 * $a) * $c);

    $x1 = (-$b + sqrt($delta)) / (2 * $a);

    $x2 = (-$b - sqrt($delta)) / (2 * $a);

    if ($x1 != 'NAN' and $x2 != 'NAN') {

        $results = [
            "success" => true,
            "x1" => $x1,
            "x2" => $x2,
            "delta" => $delta
        ];
        $results = json_encode($results);

    } else {

        $results = [
            "success" => false,
            "delta" => $delta,
        ];

        $results = json_encode($results);
    }

    echo $results;
    return $results;
?>