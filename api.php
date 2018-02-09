<?php
    $json = false;
    if(isset($_GET['json']))
    {
        if($_GET['json'] == 1)
            $json = true;
    }
    if(isset($_GET['set']))
        if($_GET['set'] == '0')
        {
            $handle = fopen("led_status.txt", "r");
            $data = fgets($handle);
            if($json == true)
            {
                $tmp = explode(' ',$data);
                $obj = array('red' => $tmp[0], 'green' => $tmp[1], 'blue' => $tmp[2] );
                echo json_encode($obj);
                
            }
            else
                echo $data;
            fclose($handle);
            //header("location:index.php");
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
        header("location:index.php");
        die();
    }
    

?>
