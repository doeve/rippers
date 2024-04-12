<?php
    ini_set("max_execution_time", 0);
    $books = array("1 Mózes", "2 Mózes", "3 Mózes", "4 Mózes", "5 Mózes", "Józsué", "Birák", "Ruth", "1 Sámuel", "2 Sámuel", "1 Királyok", "2 Királyok", "1 Krónika", "2 Krónika", "Ezsdrás", "Nehemiás", "Eszter", "Jób", "Zsoltárok", "Példabeszédek", "Prédikátor", "Énekek Éneke", "Ézsaiás", "Jeremiás", "Jeremiás sir", "Ezékiel", "Dániel", "Hóseás", "Jóel", "Ámos", "Abdiás", "Jónás", "Mikeás", "Náhum", "Habakuk", "Sofoniás", "Aggeus", "Zakariás", "Malakiás", "Máté", "Márk", "Lukács", "János", "Apostolok", "Rómaiakhoz", "1 Korintusi", "2 Korintusi", "Galatákhoz", "Efézusiakhoz", "Filippiekhez", "Kolosséiakhoz", "1 Tesszalonika", "2 Tesszalonika", "1 Timóteushoz", "2 Timóteushoz", "Titushoz", "Filemonhoz", "Zsidókhoz", "Jakab", "1 Péter", "2 Péter", "1 János", "2 János", "3 János", "Júdás", "Jelenések");
    $chapters = array(50, 40, 27, 36, 34, 24, 21, 4, 31, 24, 22, 25, 29, 36, 10, 13, 10, 42, 150, 31, 12, 8, 66, 52, 5, 48, 12, 14, 3, 9, 1, 4, 7, 3, 3, 3, 2, 14, 4, 28, 16, 24, 21, 28, 16, 16, 13, 6, 6, 4, 4, 5, 3, 6, 4, 3, 1, 13, 5, 5, 3, 5, 1, 1, 1, 22);
    $file = fopen("magyar_cimek.txt", "w");
    foreach ($books as $key => $book) {
        for ($chapter = 1; $chapter <= $chapters[$key]; ++$chapter) {
            $link = "https://www.biblegateway.com/passage/?search=".$book."%20".$chapter."&version=ERV-HU";
            $nkjv = file_get_contents($link);
            if (preg_match_all("/id=\"[a-zA-Zz0-9\-]+\" class=\"text \w+-\d+-(\d+)\">([^<]+)/", $nkjv, $titles)) {
                foreach ($titles[1] as $key => $title) {
                    $write = $book."\t".$chapter."\t".$title."\t".$titles[2][$key];
                    fwrite($file, $write."\n");
                    echo $write."<br>";
                    flush();
                    ob_flush();
                }
            }
        }
    }
    fclose($file);
?>