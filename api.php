<?php
    if(isset($_GET['set']))
        if($_GET['set'] == '0')
        {
            $handle = fopen("led_status.txt", "r");
            echo fgets($handle);
            fclose($handle);
            die();
        }
    if(isset($_GET['red']) && isset($_GET['green']) && isset($_GET['blue']))
    {
        $red = $_GET['red'];
        $green = $_GET['green'];
        $blue = $_GET['blue'];
        //echo "$red $green $blue";
        $handle = fopen("led_status.txt", "w");
        fwrite($handle , "$red $green $blue");
        fclose($handle);
        die();
    }
    
?>
