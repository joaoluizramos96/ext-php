<?php
        $variavel_bool = TRUE; // um booleano
        $variavel_str = "foo"; // uma string
        $variavel_str2 = 'foo'; // outra string
        $variavel_int = 12; // um inteiro

        echo gettype($variavel_bool); // exibe: boolean
        echo gettype($variavel_str); // exibe: string

        // Se ele é um inteiro, incrementa-o com quatro

        if (is_int($variavel_int)) {
                $variavel_int += 4;
                echo $variavel_int;
        }

        // Se $variavel_bool é uma string, exibe (neste caso, não exibe nada)

        if (is_string($variavel_bool)) {
                echo "É string";
        } ?>

