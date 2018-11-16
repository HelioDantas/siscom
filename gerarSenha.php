<?php

function fncGera_Senha( $Qt_Caracteres, $Fl_Letras, $Fl_Maiusculas, $Fl_Numeros, $Fl_Simbolos )
{

    if ( $Qt_Caracteres == 0 )
    {
        return null;
    }

    if ( !$Fl_Letras && !$Fl_Numeros && !$Fl_Simbolos )
    {
        return null;
    }


    $caracteresValidos = "";

    if ( $Fl_Letras )
    {
        $caracteresValidos .= "abcdefghijklmnopqrstuvwxyz";
    }

    if ( $Fl_Letras && $Fl_Maiusculas )
    {
        $caracteresValidos .= "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    }

    if ( $Fl_Numeros )
    {
        $caracteresValidos .= "1234567890";
    }

    if ( $Fl_Simbolos )
    {
        $caracteresValidos .= "!@#$%&*()_+-={}/\<>?§£¢¬|.,;:";
    }


    $valormaximo = strlen( $caracteresValidos );
    $senha = "";

    for ( $i = 0; $i < $Qt_Caracteres; $i++ )
    {
        $senha .= $caracteresValidos[rand( 0, $valormaximo - 1 )];
    }

    return $senha;

}