<?php
    ini_set('max_execution_time', 0);
    
    function get_http_response_code($url) {
        $headers = get_headers($url);
        return substr($headers[0], 9, 3);
    }

    $webpg = file_get_contents("https://biblia.resursecrestine.ro/");
    $pattern_books = "/<a class=\"test\" href=\"(.*)\">/";
    $pattern_verse = "/<span class=\"continut-verset resized-text\">(.*)<\/span>/m";
    $pattern_book = "/<title>(?:\s*)(.*),/";
    preg_match_all($pattern_books, $webpg, $all_books);
    $q = $_REQUEST["q"];
    switch ($q) {
        case 1:
            echo "<b>this file will also be written in <i>resursecrestine_vechiul_t.txt</i>.</b><br>";
            $file = fopen("resursecrestine_vechiul_t.txt", "w");
            $books = array_slice($all_books[1], 0, 39);
            break;
        case 2:
            echo "<b>this file will also be written in <i>resursecrestine_noul_t.txt</i>.</b><br>";
            $file = fopen("resursecrestine_noul_t.txt", "w");
            $books = array_slice($all_books[1], 39);
            break;
        default:
            echo "the \"q\" argument must be <b>1</b> or <b>2</b> being the old testament or the new accordingly!";
            return;
    }
    foreach ($books as $link) {
        for ($chap = 1; get_http_response_code($link."/".$chap) == 200; ++$chap) {
            $webpg = file_get_contents($link."/".$chap);
            if ($chap == 1) {
                preg_match($pattern_book, $webpg, $book);
            }
            preg_match_all($pattern_verse, $webpg, $verses);
            foreach ($verses[1] as $key => $verse) {
                // $write = substr($link, strpos($link, "ro") + 3)."\t".$chap."\t".($key + 1)."\t".str_replace(array("<span class=\"Isus\">","<span class=\"marcaj-biblie-normal\">", "*", "</span>", "†"), array_fill(0, 5, ""), $verse);
                $write = $book[1]."\t".$chap."\t".($key + 1)."\t".str_replace(array("<span class=\"Isus\">","<span class=\"marcaj-biblie-normal\">", "*", "</span>", "†"), array_fill(0, 5, ""), $verse);
                echo $write."<br>";
                fwrite($file, $write."\n");
            }
        }
    }
    fclose($file);
?>