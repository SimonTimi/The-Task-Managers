<?php
function escape($data) {
    if ($data === null) {
        return null;  // Return null if the input is null
    }
    
    $data = htmlspecialchars($data, ENT_QUOTES | ENT_SUBSTITUTE, "UTF-8");
    $data = trim($data);
    $data = stripslashes($data);
    
    return $data;
}