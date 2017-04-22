<?php

function createWoortKlockAnzeige() {
    for ($i = 0; $i <= 9; $i++) {
        for ($j = 0; $j <= 10; $j++) {
            $arrWoortKlockAnzeige[$i][$j] = 0;
        }
    }
    return $arrWoortKlockAnzeige;
}

function displayWoortKlockAnzeige($arrWoortKlockAnzeige) {
    for ($i = 0; $i <= 9; $i++) {
        for ($j = 0; $j <= 10; $j++) {
            echo $arrWoortKlockAnzeige[$i][$j] . " ";
        }
        echo "<br>";
    }
}

function WoortKlockAN($arrWoortKlockAnzeige, $zeile, $start, $laenge) {
    for ($i = $start; $i <= $start + $laenge - 1; $i++) {
        $arrWoortKlockAnzeige[$zeile][$i] = 1;
    }
    return $arrWoortKlockAnzeige;
}

function WoortKlockDisplay($arrWoortKlock, $arrWoortKlockAnzeige) {

    echo "<table>\n";

    for ($i = 0; $i <= 9; $i++) {

        echo "  <tr>\n   ";
        for ($j = 0; $j <= 10; $j++) {

            if ($arrWoortKlockAnzeige[$i][$j] == 0) {
                $strClassWoortKlockZelle = "class=ZIFFER-AUS";
            } else {
                $strClassWoortKlockZelle = "class=ZIFFER-AN";
            }

            echo '<td ' . $strClassWoortKlockZelle . ' >' . $arrWoortKlock[$i][$j] . '</td> ';
        }

        echo "\n  </tr>\n";
    }


    echo "</table>\n";
}

function WoortKlockWoortAn($arrWoortKlockAnzeige, $arrWoortKlockElement, $arrWoort) {
    foreach ($arrWoort as $TIED) {
        $arrWoortKlockAnzeige = WoortKlockAN($arrWoortKlockAnzeige, $arrWoortKlockElement[$TIED][0], $arrWoortKlockElement[$TIED][1], $arrWoortKlockElement[$TIED][2]);
    }
    return $arrWoortKlockAnzeige;
}

function setStuenn($arrWoortKlockAnzeige, $arrWoortKlockElement, $stuenn, $minuut) {



    if ($stuenn == 0) {
        $stuenn = 12;
    } elseif ($stuenn > 12) {
        $stuenn = $stuenn - 12;
    }

    if ($minuut >= 25) {
        $stuenn = $stuenn + 1;
        if ($stuenn == 0) {
            $stuenn = 1;
        }
        if ($stuenn == 13) {
            $stuenn = 1;
        }
    }


    $arrStuenn[1] = "EEN";
    $arrStuenn[2] = "TWEE";
    $arrStuenn[3] = "DREE";
    $arrStuenn[4] = "VEER";
    $arrStuenn[5] = "FIEF";
    $arrStuenn[6] = "SOSS";
    $arrStuenn[7] = "SOVEN";
    $arrStuenn[8] = "ACHT";
    $arrStuenn[9] = "NEGEN";
    $arrStuenn[10] = "TEIHN";
    $arrStuenn[11] = "ELVEN";
    $arrStuenn[12] = "TWOLF";


    $arrWoortKlockAnzeige = WoortKlockWoortAn($arrWoortKlockAnzeige, $arrWoortKlockElement, array($arrStuenn[$stuenn]));

    return $arrWoortKlockAnzeige;
}

function setWoortKlock_DE_KLOCK_IS_DAT_IS($arrWoortKlockAnzeige, $arrWoortKlockElement, $minuut) {
    if (in_array($minuut, array(0, 1, 29, 30, 31))) {
        $arrWoortKlockAnzeige = WoortKlockWoortAn($arrWoortKlockAnzeige, $arrWoortKlockElement, array("DE", "KLOCK", "IS"));
    } else {
        $arrWoortKlockAnzeige = WoortKlockWoortAn($arrWoortKlockAnzeige, $arrWoortKlockElement, array("DAT", "IS"));
    }
    return $arrWoortKlockAnzeige;
}

function setWoortMFIEF($arrWoortKlockAnzeige, $arrWoortKlockElement, $minuut) {
    if (in_array($minuut, array(5, 6, 7, 8, 9, 25, 26, 27, 28, 35, 36, 37, 38, 39, 55, 56, 57, 58))) {
        $arrWoortKlockAnzeige = WoortKlockWoortAn($arrWoortKlockAnzeige, $arrWoortKlockElement, array("MFIEF"));
    }
    return $arrWoortKlockAnzeige;
}

function setWoortMTEIHN($arrWoortKlockAnzeige, $arrWoortKlockElement, $minuut) {
    if (in_array($minuut, array(10, 11, 12, 13, 14, 50, 51, 52, 53, 54))) {
        $arrWoortKlockAnzeige = WoortKlockWoortAn($arrWoortKlockAnzeige, $arrWoortKlockElement, array("MTEIHN"));
    }
    return $arrWoortKlockAnzeige;
}

function setWoortVEERDEL($arrWoortKlockAnzeige, $arrWoortKlockElement, $minuut) {
    if (in_array($minuut, array(15, 16, 17, 18, 19, 45, 46, 47, 48, 49))) {
        $arrWoortKlockAnzeige = WoortKlockWoortAn($arrWoortKlockAnzeige, $arrWoortKlockElement, array("VEERDEL"));
    }
    return $arrWoortKlockAnzeige;
}

function setWoortMTWINTIG($arrWoortKlockAnzeige, $arrWoortKlockElement, $minuut) {
    if (in_array($minuut, array(20, 21, 22, 23, 24, 40, 41, 42, 43, 44))) {
        $arrWoortKlockAnzeige = WoortKlockWoortAn($arrWoortKlockAnzeige, $arrWoortKlockElement, array("MTWINTIG"));
    }
    return $arrWoortKlockAnzeige;
}

function setWoortKORT($arrWoortKlockAnzeige, $arrWoortKlockElement, $minuut) {
    if (in_array($minuut, array(1, 2, 3, 4, 28, 29, 31, 32, 33,59))) {
        $arrWoortKlockAnzeige = WoortKlockWoortAn($arrWoortKlockAnzeige, $arrWoortKlockElement, array("KORT"));
    }
    return $arrWoortKlockAnzeige;
}

function setWoortVOR_NA($arrWoortKlockAnzeige, $arrWoortKlockElement, $minuut) {
    if (in_array($minuut, array(25, 26, 27, 28, 29,40, 41, 42, 43, 44, 45, 46, 47, 48, 49, 50, 51, 52, 53, 54, 55, 56, 57, 58, 59))) {
        $arrWoortKlockAnzeige = WoortKlockWoortAn($arrWoortKlockAnzeige, $arrWoortKlockElement, array("VOR"));
    } elseif (in_array($minuut, array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 31, 32, 33, 34, 35, 36, 37, 38, 39))) {
        $arrWoortKlockAnzeige = WoortKlockWoortAn($arrWoortKlockAnzeige, $arrWoortKlockElement, array("NA"));
    }
    return $arrWoortKlockAnzeige;
}

function setWoortHALVIG($arrWoortKlockAnzeige, $arrWoortKlockElement, $minuut) {
    if (in_array($minuut, array(25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39))) {
        $arrWoortKlockAnzeige = WoortKlockWoortAn($arrWoortKlockAnzeige, $arrWoortKlockElement, array("HALVIG"));
    }
    return $arrWoortKlockAnzeige;
}

?>