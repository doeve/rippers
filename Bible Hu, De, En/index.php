<?php

    function get_http_response_code($url) {
        $headers = get_headers($url);
        return substr($headers[0], 9, 3);
    }

    function w1250_to_utf8($text) {
        $map = array(
            chr(0x8A) => chr(0xA9),
            chr(0x8C) => chr(0xA6),
            chr(0x8D) => chr(0xAB),
            chr(0x8E) => chr(0xAE),
            chr(0x8F) => chr(0xAC),
            chr(0x9C) => chr(0xB6),
            chr(0x9D) => chr(0xBB),
            chr(0xA1) => chr(0xB7),
            chr(0xA5) => chr(0xA1),
            chr(0xBC) => chr(0xA5),
            chr(0x9F) => chr(0xBC),
            chr(0xB9) => chr(0xB1),
            chr(0x9A) => chr(0xB9),
            chr(0xBE) => chr(0xB5),
            chr(0x9E) => chr(0xBE),
            chr(0x80) => '&euro;',
            chr(0x82) => '&sbquo;',
            chr(0x84) => '&bdquo;',
            chr(0x85) => '&hellip;',
            chr(0x86) => '&dagger;',
            chr(0x87) => '&Dagger;',
            chr(0x89) => '&permil;',
            chr(0x8B) => '&lsaquo;',
            chr(0x91) => '&lsquo;',
            chr(0x92) => '&rsquo;',
            chr(0x93) => '&ldquo;',
            chr(0x94) => '&rdquo;',
            chr(0x95) => '&bull;',
            chr(0x96) => '&ndash;',
            chr(0x97) => '&mdash;',
            chr(0x99) => '&trade;',
            chr(0x9B) => '&rsquo;',
            chr(0xA6) => '&brvbar;',
            chr(0xA9) => '&copy;',
            chr(0xAB) => '&laquo;',
            chr(0xAE) => '&reg;',
            chr(0xB1) => '&plusmn;',
            chr(0xB5) => '&micro;',
            chr(0xB6) => '&para;',
            chr(0xB7) => '&middot;',
            chr(0xBB) => '&raquo;',
        );
        return html_entity_decode(mb_convert_encoding(strtr($text, $map), 'UTF-8', 'ISO-8859-2'), ENT_QUOTES, 'UTF-8');
    }

    $booksHu = array(
        1 => "Mózes I. könyve",
        2 => "Mózes II. könyve",
        3 => "Mózes III. könyve",
        4 => "Mózes IV. könyve",
        5 => "Mózes V. könyve",
        6 => "Józsué könyve",
        7 => "Bírák könyve",
        8 => "Ruth könyve",
        9 => "Sámuel I. könyve",
        10 => "Sámuel II. könyve",
        11 => "Királyok I. könyve",
        12 => "Királyok II. könyve",
        13 => "Krónika I. könyve",
        14 => "Krónika II. könyve",
        15 => "Ezsdrás könyve",
        16 => "Nehémiás könyve",
        17 => "Eszter könyve",
        18 => "Jób könyve",
        19 => "Zsoltárok könyve",
        20 => "Példabeszédek",
        21 => "Prédikátor könyve",
        22 => "Énekek Éneke",
        23 => "Ésaiás próféta könyve",
        24 => "Jeremiás próféta könyve",
        25 => "Jeremiás siralmai",
        26 => "Ezékiel próféta könyve",
        27 => "Dániel próféta könyve",
        28 => "Hóseás próféta könyve",
        29 => "Jóel próféta könyve",
        30 => "Ámós próféta könyve",
        31 => "Abdiás próféta könyve",
        32 => "Jónás próféta könyve",
        33 => "Mikeás próféta könyve",
        34 => "Náhum próféta könyve",
        35 => "Habakuk próféta könyve",
        36 => "Sofóniás próféta könyve",
        37 => "Aggeus próféta könyve",
        38 => "Zakariás próféta könyve",
        39 => "Malakiás próféta könyve",
        40 => "Máté Evangyélioma",
        41 => "Márk Evangyélioma",
        42 => "Lukács Evangyélioma",
        43 => "János Evangyélioma",
        44 => "Apostolok Cselekedetei",
        45 => "Rómabeliekhez írt levél",
        46 => "Korinthusbeliekhez írt I. levél",
        47 => "Korinthusbeliekhez írt II. levél",
        48 => "Galátziabeliekhez írt levél",
        49 => "Efézusbeliekhez írt levél",
        50 => "Filippibeliekhez írt levél",
        51 => "Kolossébeliekhez írt levél",
        52 => "Thessalonikabeliekhez írt I. levél",
        53 => "Thessalonikabeliekhez írt II. levél",
        54 => "Timótheushoz írt I. levél",
        55 => "Timótheushoz írt II. levél",
        56 => "Titushoz írt levél",
        57 => "Filemonhoz írt levél",
        58 => "Zsidókhoz írt levél",
        59 => "Jakab Apostol levele",
        60 => "Péter Apostol I. levele",
        61 => "Péter Apostol II. levele",
        62 => "János Apostol I. levele",
        63 => "János Apostol II. levele",
        64 => "János Apostol III. levele",
        65 => "Júdás Apostol levele",
        66 => "Jelenések könyve"
    );

    $booksEn = array(
        1 => "Genesis",
        2 => "Exodus",
        3 => "Leviticus",
        4 => "Numbers",
        5 => "Deuteronomy",
        6 => "Joshua",
        7 => "Judges",
        8 => "Ruth",
        9 => "1 Samuel",
        10 => "2 Samuel",
        11 => "1 Kings",
        12 => "2 Kings",
        13 => "1 Chronicles",
        14 => "2 Chronicles",
        15 => "Ezra",
        16 => "Nehemiah",
        17 => "Esther",
        18 => "Job",
        19 => "Psalms",
        20 => "Proverbs",
        21 => "Ecclesiastes",
        22 => "Song of Solomon",
        23 => "Isaiah",
        24 => "Jeremiah",
        25 => "Lamentations",
        26 => "Ezekiel",
        27 => "Daniel",
        28 => "Hosea",
        29 => "Joel",
        30 => "Amos",
        31 => "Obadiah",
        32 => "Jonah",
        33 => "Micah",
        34 => "Nahum",
        35 => "Habakkuk",
        36 => "Zephaniah",
        37 => "Haggai",
        38 => "Zechariah",
        39 => "Malachi",
        40 => "Matthew",
        41 => "Mark",
        42 => "Luke",
        43 => "John",
        44 => "Acts",
        45 => "Romans",
        46 => "1 Corinthians",
        47 => "2 Corinthians",
        48 => "Galatians",
        49 => "Ephesians",
        50 => "Philippians",
        51 => "Colossians",
        52 => "1 Thessalonians",
        53 => "2 Thessalonians",
        54 => "1 Timothy",
        55 => "2 Timothy",
        56 => "Titus",
        57 => "Philemon",
        58 => "Hebrews",
        59 => "James",
        60 => "1 Peter",
        61 => "2 Peter",
        62 => "1 John",
        63 => "2 John",
        64 => "3 John",
        65 => "Jude",
        66 => "Revelation"
    );
    
    $booksDe = array(
        1 => "Das 1. Buch Mose",
        2 => "Das 2. Buch Mose",
        3 => "Das 3. Buch Mose",
        4 => "Das 4. Buch Mose",
        5 => "Das 5. Buch Mose",
        6 => "Das Buch Josua",
        7 => "Das Buch der Richter",
        8 => "Das Buch Rut",
        9 => "Das 1. Buch Samuel",
        10 => "Das 2. Buch Samuel",
        11 => "Das 1. Buch der Könige",
        12 => "Das 2. Buch der Könige",
        13 => "Das 1. Buch der Chronik",
        14 => "Das 2. Buch der Chronik",
        15 => "Das Buch Esra",
        16 => "Das Buch Nehemia",
        17 => "Das Buch Ester",
        18 => "Das Buch Hiob (Ijob)",
        19 => "Der Psalter",
        20 => "Die Sprüche Salomos",
        21 => "Der Prediger Salomo",
        22 => "Das Hohelied Salomos",
        23 => "Der Prophet Jesaja",
        24 => "Der Prophet Jeremia",
        25 => "Die Klagelieder Jeremias",
        26 => "Der Prophet Hesekiel",
        27 => "Der Prophet Daniel",
        28 => "Der Prophet Hosea",
        29 => "Der Prophet Joel",
        30 => "Der Prophet Amos",
        31 => "Der Prophet Obadja",
        32 => "Der Prophet Jona",
        33 => "Der Prophet Micha",
        34 => "Der Prophet Nahum",
        35 => "Der Prophet Habakuk",
        36 => "Der Prophet Zefanja",
        37 => "Der Prophet Haggai",
        38 => "Der Prophet Sacharja",
        39 => "Der Prophet Maleachi",
        40 => "Das Evangelium nach Matthäus",
        41 => "Das Evangelium nach Markus",
        42 => "Das Evangelium nach Lukas",
        43 => "Das Evangelium nach Johannes",
        44 => "Die Apostelgeschichte des Lukas",
        45 => "Der Brief an die Römer",
        46 => "Der 1. Brief an die Korinther",
        47 => "Der 2. Brief an die Korinther",
        48 => "Der Brief an die Galater",
        49 => "Der Brief an die Epheser",
        50 => "Der Brief an die Philipper",
        51 => "Der Brief an die Kolosser",
        52 => "Der 1. Brief an die Thessalonicher",
        53 => "Der 2. Brief an die Thessalonicher",
        54 => "Der 1. Brief an Timotheus",
        55 => "Der 2. Brief an Timotheus",
        56 => "Der Brief an Titus",
        57 => "Der Brief an Philemon",
        58 => "Der Brief an die Hebräer",
        59 => "Der Brief des Jakobus",
        60 => "Der 1. Brief des Petrus",
        61 => "Der 2. Brief des Petrus",
        62 => "Der 1. Brief des Johannes",
        63 => "Der 2. Brief des Johannes",
        64 => "Der 3. Brief des Johannes",
        65 => "Der Brief des Judas",
        66 => "Die Offenbarung des Johannes"
    );

    ini_set('max_execution_time', 0);
    $q = $_REQUEST["q"];
    $link = "";
    switch ($q) {
        case "hu":
            $link = "http://biblia.hu/biblia_k/k_";
            $books = $booksHu;
            break;
        case "en":
            $link = "http://biblia.hu/biblia_a/a_";
            $books = $booksEn;
            break;
        case "de":
            $link = "http://biblia.hu/biblia_n/n_";
            $books = $booksDe;
            break;
        default:
            echo "the query must be 'hu/en/de'";
    }
    if ($link != "") {
        // $pattern = "/\d\.?(&nbsp;){1,2}(.*)</";
        $pattern = "/\d\.?(&nbsp;){1,2}(.*)</msDU";
        $file = fopen("biblia_".$q.".txt", "w");   
        for ($b = 1; $b <= 66; ++$b) {
            for ($j = 1; get_http_response_code($link.$b."_".$j.".htm") == "200"; ++$j) {
                $webpg = file_get_contents($link.$b."_".$j.".htm");
                if (preg_match_all($pattern, $webpg, $texts)) {
                    foreach ($texts[2] as $key => $str) {
                        $str = w1250_to_utf8($str);
                        fwrite($file, $books[$b]."\t".$j."\t".($key + 1)."\t".str_replace("\n", "", $str)."\n");
                    }
                }
            }  
        }
        fclose($file);
        echo "done.";
    }
?>