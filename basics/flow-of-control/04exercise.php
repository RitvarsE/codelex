<?php

$inputMethod = readline('Choose your input method(switch 1/IF 2): ');

if (!is_numeric($inputMethod) || ($inputMethod > 2 || $inputMethod < 1)) {
    echo 'You must input 1 or 2';
} else {

    switch ($inputMethod) {
        case 1:

//switch method
            $dayNumberSwitch = readline('Input day number( 0 - 6 ): ');

            if (!is_numeric($dayNumberSwitch) || ($dayNumberSwitch > 6 || $dayNumberSwitch < 0)) {
                echo 'Not valid day';

            } else {
                switch ($dayNumberSwitch) {
                    case 0:
                        echo 'Sunday';
                        break;
                    case 1:
                        echo 'Monday';
                        break;
                    case 2:
                        echo 'Tuesday';
                        break;
                    case 3:
                        echo 'Wednesday';
                        break;
                    case 4:
                        echo 'Thursday';
                        break;
                    case 5:
                        echo 'Friday';
                        break;
                    case 6:
                        echo 'Saturday';
                        break;
                }

            }
            break;

// if method
        case 2:
            $dayNumberIf = readline('Input day number( 0 - 6 ): ');

            if (!is_numeric($dayNumberIf) || ($dayNumberIf > 6 || $dayNumberIf < 0)) {
                echo 'Not valid day';

            } else {
                if ($dayNumberIf == 0) {
                    echo 'Sunday';
                } elseif ($dayNumberIf == 1) {
                    echo 'Monday';
                } elseif ($dayNumberIf == 2) {
                    echo 'Tuesday';
                } elseif ($dayNumberIf == 3) {
                    echo 'Wednesday';
                } elseif ($dayNumberIf == 4) {
                    echo 'Thursday';
                } elseif ($dayNumberIf == 5) {
                    echo 'Friday';
                } elseif ($dayNumberIf == 6) {
                    echo 'Saturday';
                }
            }
            break;
    }
}