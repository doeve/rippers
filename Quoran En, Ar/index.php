<?php
    ini_set('max_execution_time', 0);
    
    function get_http_response_code($url) {
        $headers = get_headers($url);
        return substr($headers[0], 9, 3);
    }

    echo "<b>file will also be written in <i>\"quran.txt\"</i>.</b><br>";

    $books = array("surah-fatiha", "surah-baqarah", "surah-imran", "surah-nisa", "surah-maidah", "surah-anam", "surah-araf", "surah-anfal", "surah-taubah", "surah-yunus", "surah-hud", "surah-yusuf", "surah-rad", "surah-ibrahim", "surah-hijr", "surah-nahl", "surah-al-isra", "surah-kahf", "surah-maryam", "surah-taha", "surah-anbiya", "surah-hajj", "surah-muminun", "surah-nur", "surah-furqan", "surah-shuara", "surah-naml", "surah-qasas", "surah-ankabut", "surah-ar-rum", "surah-luqman", "surah-sajdah", "surah-ahzab", "surah-saba", "surah-fatir", "surah-yaseen", "surah-as-saffat", "surah-sad", "surah-az-zumar", "surah-al-mumin", "surah-fussilat", "surah-ash-shura", "surah-zukhruf", "surah-dukhan", "surah-jasiyah", "surah-ahqaf", "surah-muhammad", "surah-fath", "surah-hujurat", "surah-qaf", "surah-dhariyat", "surah-tur", "surah-najm", "surah-qamar", "surah-ar-rahman", "surah-waqiah", "surah-hadid", "surah-mujadilah", "surah-hashr", "surah-mumtahanah", "surah-saff", "surah-jumuah", "surah-munafiqun", "surah-taghabun", "surah-talaq", "surah-tahrim", "surah-mulk", "surah-qalam", "surah-haqqah", "surah-maarij", "surah-nuh", "surah-jinn", "surah-muzzammil", "surah-muddaththir", "surah-qiyamah", "surah-insan", "surah-mursalat", "surah-naba", "surah-naziat", "surah-abasa", "surah-takwir", "surah-infitaar", "surah-mutaffifin", "surah-inshiqaq", "surah-burooj", "surah-tariq", "surah-ala", "surah-ghaashiyah", "surah-fajr", "surah-balad", "surah-ash-shams", "surah-lail", "surah-duha", "surah-inshirah", "surah-tin", "surah-alaq", "surah-qadr", "surah-bayyinah", "surah-zilzal", "surah-adiyat", "surah-qariah", "surah-takathur", "surah-asr", "surah-humazah", "surah-fil", "surah-quraish", "surah-maun", "surah-kauthar", "surah-kafirun", "surah-nasr", "surah-lahab", "surah-ikhlas", "surah-falaq", "surah-nas");
    
    echo count($books)."<br>";
    flush();
    ob_flush();

    $pattern_ar = "/\d+\. ([^<]+)<br>/m";
    $pattern_en = "/<li> ([^<]+)/m";
    $pattern_book = "/<h1>\d+\. (.*)<\/h1>/m";
    $file = fopen("quran.txt", "w");

    foreach ($books as $book) {
        $webpg = file_get_contents("https://quran411.com/".$book);

        preg_match_all($pattern_ar, $webpg, $verses_ar);
        preg_match_all($pattern_en, $webpg, $verses_en);
        preg_match($pattern_book, $webpg, $book_name);

        // foreach ($verses_ar[1] as $key => $verse_ar) {
        //     $write = $book_name[1]."\t".($key + 1)."\t".$verse_ar."\t".str_replace(chr(180), "'", $verses_en[1][$key]);
        //     echo $write."<br>";
        //     fwrite($file, $write."\n");
        // }
        foreach ($verses_en[1] as $key => $verse_en) {
            $write = $book_name[1]."\t".($key + 1)."\t".$verses_ar[1][$key]."\t".str_replace(chr(180), "'", $verse_en);
            echo $write."<br>";
            fwrite($file, $write."\n");
        }
    }
    fclose($file);
?>