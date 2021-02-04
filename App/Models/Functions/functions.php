<?php
    function prp($input, ?string $name = null) {
        echo '<pre>';
        echo isset($name) ? $name . ':<br>' : null . '<br>' . "\n";
        print_r($input);
        echo '</pre>', "\n";
    }

    function vdp($input, ?string $name = null) {
        echo '<pre>';
        echo isset($name) ? $name . ':<br>' : null . "\n";
        var_dump($input);
        echo '</pre>', "\n";
    }