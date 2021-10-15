<?php

    function isActiveMenu(string $option) : bool {
        if (strpos($_SERVER["REQUEST_URI"],$option)) {
            return true;            
        } elseif (strpos($_SERVER["REQUEST_URI"],"/")){
            return true;
        } else {
            return false;
        }
    }
?>