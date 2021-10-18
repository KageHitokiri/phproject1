<?php
    
    function isActiveMenu(string $option) : bool {
        if  (strpos($_SERVER["REQUEST_URI"],$option) ) {
            return true;        
        } else {
            return false;
        }
    }

    function existsInActiveArrayMenu (array $options): bool {
        foreach ($options as $value) {
            if (isActiveMenu($value)) {
                return true;
            } else {
                return false;
            }
        }        
    }
?>