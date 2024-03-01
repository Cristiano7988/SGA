<?php
if (!function_exists('validaVariaveisComDadosFakes')) {
    function validaVariaveisComDadosFakes()
    {
        $variaveis = ['TOTAL_DE_CONVITES', 'TOTAL_DE_DIAS', 'TOTAL_DE_ENDERECOS', 'TOTAL_DE_EVENTOS', 'TOTAL_DE_PONTOS', 'TOTAL_DE_USUARIOS'];
        foreach ($variaveis as $indice => $variavel) {
            if (env($variavel) !== null) unset($variaveis[$indice]);
        }

        return count($variaveis)
            ? "Configure as seguintes variáveis de ambiente: \n -" . implode("\n -", $variaveis) . "\n"
            : false;
    }
}