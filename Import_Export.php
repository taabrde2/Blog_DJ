<?php


    $csv_datei = "exchange/import.csv";

    $feler_trenner = ";";

    $zeilen_trenner = "n";

    if (@file_exists($csv_datei) == false) {

        echo 'Die CSV Datei: '. $csv_datei.' gibt es
            nicht!';
    } else {

        $datei_inhalt = @file_get_contents($csv_datei);

        $zeilen = explode($zeilen_trenner,
            $datei_inhalt);

        $anzahl_zeilen = count($zeilen);

        echo 'Es wurden in der CSV Datei: '.
            $csv_datei.' insgesamt
            '.($anzahl_zeilen-1).' Zeilen gefunden.<br>';

        if (is_array($zeilen) == true) {

            foreach($zeilen as $zeile) {

                $felder = explode($feler_trenner,
                    $zeile);

                $i = 0;
                if (is_array($felder) == true) {
                    foreach($felder as $felde) {

                        if ($felde != '') {

                            echo (($i != 0) ? ', ':
                                ''). str_replace('"',
                                '', $felde);

                            $i++;
                        }
                    }
                }

                echo '<br>';
            }
        }
    }
?>
