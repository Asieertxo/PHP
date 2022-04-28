<?php

function replace($needle, $replace_string, $haystack){
    $edited_text = str_replace($needle, "<span style=' background-color: yellow'>$replace_string</span>", $haystack);       
    printEditedText($needle, $replace_string, $edited_text);
}

function search($needle, $haystack){
    replace($needle, $needle, $haystack);
}

function position($needle, $haystack){
    $ocurrences_array = [];
    $number_of_ocurrences = substr_count($haystack, $needle);
    $initial_position = 0;
    while ($number_of_ocurrences > 0){
        $next_position = strpos($haystack, $needle, $initial_position);
        if($next_position !== false){
            $ocurrence_position = $next_position;
            $ocurrences_array[count($ocurrences_array)] = $next_position;
            $initial_position = $next_position + 1;
            $number_of_ocurrences--;
        }
    }
    printOcurrences($ocurrences_array);

    /*for($i = 0; $i<$haystack.length; $i++){
        if($ocurrences_array.iclu)
    }
    printEditedText($needle, $replace_string, $edited_text);*/
}

function exists($needle, $haystack){
    $number_of_ocurrences = substr_count($haystack, $needle);

    printIfItExists($number_of_ocurrences);
}

?>