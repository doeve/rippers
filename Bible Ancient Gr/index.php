<?php

    function get_http_response_code($url) {
        $headers = get_headers($url);
        return substr($headers[0], 9, 3);
    }

    ini_set('max_execution_time', 0);

    $q = $_REQUEST["q"];
    switch ($q) {
        case 1:
            $name = "septuaginta";
            $b = 101;
            $e = 160;
            break;
        case 2:
            $name = "ujszovetseg";
            $b = 201;
            $e = 227;
            break;
        case 3:
            $name = "patrologia";
            $b = 301;
            $e = 302;
            break;
        case 4:
            $name = "klasszikus_gorog";
            $b = 401;
            $e = 401;
            break;
        default:
            echo "the \"q\" argument must be [1; 4] being Szeptuaginta/Ujszovetseg/Patrologia/Klasszikus Gorog accordingly";
            return;
    }
    $pattern_enc = '/<span class="verse ">(.*)<\/span>(\s*)(<\/span>|<\/p)/sU';
    $pattern_ver = '/data-unic="(.*)"/';
    $pattern_bk = '/selected>(.*)<\/option>/';
    echo "<b>file will also be written in <i>ujszov_".$name.".txt</i></b><br>";
    $file = fopen("ujszov_".$name.".txt", "w");
    for ($i = $b; $i <= $e; ++$i) {
        $chap = 1;
        $link = "https://ujszov.hu/text?corpus=".$q."&book=".$i."&chapter=";
        while (get_http_response_code($link.$chap) == 200) {
            $webpg = file_get_contents($link.$chap);
            preg_match_all($pattern_enc, $webpg, $verse_enc);
            preg_match($pattern_bk, $webpg, $book);
            foreach ($verse_enc[1] as $key => $string) {
                preg_match_all($pattern_ver, $string, $verse);
                $write = $book[1]."\t".$chap."\t".($key + 1)."\t";
                foreach ($verse[1] as $word) {
                    $write .= $word." ";
                }
                $write .= "\n";
                $write = str_replace(array("¹ ", "*"), array("", ""), mb_convert_case($write, MB_CASE_TITLE, "UTF-8"));
                echo $write."<br>";
                stream_copy_to_stream(fopen("data://text/plain,".$write, "r"), $file);
            }
            ++$chap;
        }
    }
    fclose($file);
?>