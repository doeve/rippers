<?php
    $file = fopen("quran_ro.txt", "w");
    $link = "https://quranenc.com/ar/browse/romanian_assoc/";
    $pattern_ar = "/<div class=\"aya_text\">\s*([^<]*)/m";
    $pattern_ro = "/<span class=\"ttc\">\d+\.([^<]*)/m";
    $pattern_title = "/<h4 class=\"text-center\"> (.*) -[^>]*>([^<]*)/";
    for ($book = 1; $book <= 114; ++$book) {
        // echo $link.$book."<br>";
        $webpg = file_get_contents($link.$book);
        preg_match_all($pattern_ar, $webpg, $ar);
        preg_match_all($pattern_ro, $webpg, $ro);
        preg_match($pattern_title, $webpg, $title);
        foreach ($ar[1] as $key => $_ar) {
            $write = $title[1]."\t".$title[2]."\t".($key + 1)."\t".$ar[1][$key]."\t".trim($ro[1][$key]);
            echo $write."<br>";
            fwrite($file, $write."\n");
        }
    }
    fclose($file);
?>