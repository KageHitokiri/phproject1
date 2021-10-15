<?php

    function isActiveMenu(string $option) : bool {
        if (strpos($_SERVER["REQUEST_URI"],$option)) {
            return true;            
        } else {
            return false;
        }
    }

    function isActiveMenu2() : bool {
        $option = "und";
        $source = "roundabout";
        return strpos($source,$option,0);
    }

    if (isActiveMenu2()) {
        echo "funciona";
    } else {
        echo "No funciona";
    }

?>