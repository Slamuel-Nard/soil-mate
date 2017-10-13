<?php
        $debug = false;
        if (isset($_GET["debug"])) {
             $debug = true;
        }

        $myFolder = '';

        $myFileName = ‘top20_vt’;

        $fileExt = '.csv';

        $filename = $myFolder . $myFileName . $fileExt;

        if ($debug) print '<p>filename is ' . $filename;

        $file=fopen($filename, "r");

        if ($debug) {
        if ($file) {
            print '<p>File Opened Successfully.</p>';
        } else {
            print '<p>File Open Failed.</p>';
        }
        } 
        if ($file) {
        if ($debug) print '<p>Begin reading data into an array</p>';

            // read the header row, copy the line for each header row
            // you have.
            $headers[] = fgetcsv($file);

        if ($debug) {
            print '<p>Finished reading headers.</p>';
            print '<p>My header array:</p><pre>';
            print_r($headers);
            print '</pre>';
        }

             // read all the data
        while (!feof($file)) {
            $soilDatas[] = fgetcsv($file);
        }

        if ($debug) {
            print '<p>Finished reading data. File closed.</p>';
            print '<p>My data array<p><pre> ';
            print_r($soilDatas);
            print '</pre></p>';
        }
        } 
        fclose($file);// ends if file was opened
?>