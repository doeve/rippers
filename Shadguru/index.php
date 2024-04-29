<?php
    ini_set('max_execution_time', 0);
    $begin = new DateTime("2014-09-16");
    $end = new DateTime("2022-11-18");
    // $begin = new DateTime("2022-10-20");
    // $end = new DateTime("2022-11-01");
    $int = DateInterval::createFromDateString("1 day");
    $period = new DatePeriod($begin, $int, $end);
    $file = fopen("Sadhguru Quotes.txt", "w");
    $rp = array("<br/>", "<em>", "</em>");
    $rp_w = array(" ", "", "");
    foreach ($period as $date) {
        $webpg = file_get_contents("https://isha.sadhguru.org/us/en/wisdom/quotes/date/".strtolower($date -> format("F-d-Y")));
        if (preg_match('/<div class="css-1cw0rco">(.*?)<\/div>/', $webpg, $rquote)) {
            $quote = str_replace($rp, $rp_w, htmlspecialchars_decode($rquote[1]));
            fwrite($file, $quote."\thttps://isha.sadhguru.org/us/en/wisdom/quotes/date/".strtolower($date -> format("F-d-Y"))."\t".$date -> format("Y\tm\td")."\n");
        }
    }
    fclose($file);
?>