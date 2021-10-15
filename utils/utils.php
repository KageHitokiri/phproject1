<?php

    function isActiveMenu(string $option) : bool {
        if (strpos($_SERVER["REQUEST_URI"],$option)) {
            return true;            
        } else {
            return false;
        }
    }
?>