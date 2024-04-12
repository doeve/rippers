<?php
    //https://www.wordproject.org/bibles/sr/02/1.htm {https://www.wordproject.org/bibles/sr/ + book []}

    function get_http_response_code($url) {
        $headers = get_headers($url);
        return substr($headers[0], 9, 3);
    }

    /*for ($file = fopen("wordproject.txt", "w"), $book_nr = 1, $chap = 1, $link = "https://www.wordproject.org/bibles/sr/".sprintf("%02d", $book_nr)."/1.htm", $webpg = file_get_contents($link), preg_match_all("/span class=\"verse\" id=\"\d*\">\d* <\/span(?:--)?>(.*)(?:(?:<)|(?:\n))/sU", $webpg, $verses); $book_nr <= 66;  $link = "https://www.wordproject.org/bibles/sr/".sprintf("%02d", $book_nr)."/1.htm", ++$book_nr, $webpg = file_get_contents($link), preg_match_all("/span class=\"verse\" id=\"\d*\">\d* <\/span(?:--)?>(.*)(?:(?:<)|(?:\n))/sU", $webpg, $verses)) {*/
    for ($book_nr = 1; $book_nr <= 66; ++$book_nr) {
        $chap = 1;
        $link = "https://www.wordproject.org/bibles/sr/".sprintf("%02d", $book_nr)."/1.htm";
        while (get_http_response_code($link) == 200) {
        // for ($chap = 1, $link = "https://www.wordproject.org/bibles/sr/".sprintf("%02d", $book_nr)."/1.htm"; get_http_response_code($link) == 200; $link = "https://www.wordproject.org/bibles/sr/".sprintf("%02d", $book_nr)."/".$chap.".htm", $chap++) {
        /*for ($webpg = file_get_contents($link), preg_match("/<h1> ?(.*) ?<\/h1>/", $webpg, $book), preg_match_all("/span class=\"verse\" id=\"\d*\">\d* <\/span(?:--)?>(.*)(?:(?:<)|(?:\n))/sU", $webpg, $verses); get_http_response_code($old_link) == 200; $old_link = $link, ++$chap, $link =  "https://www.wordproject.org/bibles/sr/".sprintf("%02d", $book_nr)."/".$chap.".htm", $webpg = file_get_contents($link), preg_match("/<h1> ?(.*) ?<\/h1>/", $webpg, $book), preg_match_all("/span class=\"verse\" id=\"\d*\">\d* <\/span(?:--)?>(.*)(?:(?:<)|(?:\n))/sU", $webpg, $verses)) {*/
        /*for (preg_match("/<h1> ?(.*) ?<\/h1>/", $webpg, $book); get_http_response_code($link) == 200; $webpg = file_get_contents($link), preg_match_all("/span class=\"verse\" id=\"\d*\">\d* <\/span(?:--)?>(.*)(?:(?:<)|(?:\n))/sU", $webpg, $verses), ++$chap, $link =  "https://www.wordproject.org/bibles/sr/".sprintf("%02d", $book_nr)."/".$chap.".htm") {*/
            $webpg = file_get_contents($link);
            /*preg_match_all("/span class=\"verse\" id=\"\d*\">\d* <\/span(?:--)?>(.*)(?:(?:<)|(?:\n))/sU", $webpg, $verses);*/
            // $webpg = file_get_contents($link);
            if ($chap == 1) {
                preg_match("/<h1> ?(.*) ?<\/h1>/", $webpg, $book);
            }
            /*preg_match_all("/span class=\"verse\" id=\"\d*\">\d* <\/span(?:--)?>(.*)/", $webpg, $verses);*/
            preg_match_all("/span class=\"verse\" id=\"\d*\">\d* <\/span(?:--)?>(.*)(?:(?:<)|(?:\n))/sU", $webpg, $verses);
            foreach ($verses[1] as $key => $verse) {
                $write = $book[1]."\t".$chap."\t".($key + 1)."\t".$verse;
                echo $write."<br>";
            }
            ++$chap;
            $link = "https://www.wordproject.org/bibles/sr/".sprintf("%02d", $book_nr)."/".$chap.".htm";
        }
    }
?>