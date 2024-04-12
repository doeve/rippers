<?php
    $de_file = fopen("biblia_de.txt", "r");
    $en_file = fopen("biblia_en.txt", "r");
    $hu_file = fopen("biblia_hu.txt", "r");
    $pattern = "/\t(\d*)\t(\d*)/";
    while (($de = fgets($de_file)) && ($en = fgets($en_file)) && ($hu = fgets($hu_file))) {
        preg_match($pattern, $hu, $num);
        if (!(strpos($en, $num[0]) && strpos($de, $num[0]))) {
            echo $num[0]."<br>";
        }
    }
    fclose($de_file);
    fclose($en_file);
    fclose($hu_file);
?>