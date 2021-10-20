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

    function sanitizeInput(string $data): string  {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    
?>