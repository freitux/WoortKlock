<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="css/style.css" media="screen" rel="stylesheet" type="text/css">
        <link href='https://fonts.googleapis.com/css?family=Roboto:400,500,700|Dosis' rel='stylesheet' type='text/css'>
        <title>de Woort Klock</title>

        <script type="text/javascript">
            <!--
              function wellerhalen() {
                nu = new Date();
                nu_minuut = nu.getMinutes();
                if (minuut !== nu_minuut) {
                    window.location.reload(true);
                }
            }
            -->
        </script>    

    </head>
    <body onload="window.setInterval('wellerhalen()', 1000)">
        <script type="text/javascript">
            tied = new Date();
            minuut = tied.getMinutes();
        </script>    
        <div id="wrapper">
            <div id="header">
                Moinsens,</br>
                <small>dat is min nige Woort Klock</small>
            </div>
            <div id="content">
                <?php
                include_once 'include/config.inc.php';
                include_once 'include/function.inc.php';

                $minuut = date("i");
                $stuenn = date("g");

                $arrWoortKlockAnzeige = createWoortKlockAnzeige();
                $arrWoortKlockAnzeige = setWoortKlock_DE_KLOCK_IS_DAT_IS($arrWoortKlockAnzeige, $arrWoortKlockElement, $minuut);
                $arrWoortKlockAnzeige = setWoortMFIEF($arrWoortKlockAnzeige, $arrWoortKlockElement, $minuut);
                $arrWoortKlockAnzeige = setWoortMTEIHN($arrWoortKlockAnzeige, $arrWoortKlockElement, $minuut);
                $arrWoortKlockAnzeige = setWoortVEERDEL($arrWoortKlockAnzeige, $arrWoortKlockElement, $minuut);
                $arrWoortKlockAnzeige = setWoortMTWINTIG($arrWoortKlockAnzeige, $arrWoortKlockElement, $minuut);
                $arrWoortKlockAnzeige = setWoortKORT($arrWoortKlockAnzeige, $arrWoortKlockElement, $minuut);
                $arrWoortKlockAnzeige = setWoortVOR_NA($arrWoortKlockAnzeige, $arrWoortKlockElement, $minuut);
                $arrWoortKlockAnzeige = setWoortHALVIG($arrWoortKlockAnzeige, $arrWoortKlockElement, $minuut);
                $arrWoortKlockAnzeige = setStuenn($arrWoortKlockAnzeige, $arrWoortKlockElement, $stuenn, $minuut);
                // displayWoortKlockAnzeige($arrWoortKlockAnzeige);
                WoortKlockDisplay($arrWoortKlock, $arrWoortKlockAnzeige);
                ?>
            </div>
            <div id="footer">
                ...so nu hast ja bannig veel herrumsnökert. Nu is Tied för et Tachwark.<br>
                Du Tüffeltuter
            </div>     
        </div>  
    </body>
</html>
