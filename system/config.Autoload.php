<?php

	spl_autoload_register(function ($className) {
            $posibilidades = array(
                SYSTEM.'Class'.DS.$className.'.php',
                SYSTEM.'Model'.DS.$className.'.php',
                SYSTEM.'Controller'.DS.$className.'.php',
                SYSTEM.'View'.DS.$className.'.php',
            );
            foreach ($posibilidades as $archivo) {
                if (file_exists($archivo)) {
                    require_once($archivo);
                    return true;
                }
            }
            return false;
        }
    );
?>