<?php
function getTimestamp()
{
    return time();
}

function pre($data)
{
    // Imprimir información
    echo '<pre>';
    print_r($data);
    echo '</pre>';
}

function pre_die($data)
{
    // Imprimir información
    echo '<pre>';
    print_r($data);
    echo '</pre>';

    // Finalizar el script
    die();
}

function validateText($text)
{
    if ((strlen($text) < 2) || !is_string($text)) {
        return true;
    } else {
        return false;
    }
}
