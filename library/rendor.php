<?php
/**
 * Rendering PHP file
 * 
 * @param string $path is template file's path
 * @param array  $args is template's arguments
 * 
 * @param return string email's html body
 */
function render_php(string $path, array $args)
{
    ob_start();

    include($path);
    $email_body=ob_get_contents(); 
    
    ob_end_clean();

    return $email_body;
}