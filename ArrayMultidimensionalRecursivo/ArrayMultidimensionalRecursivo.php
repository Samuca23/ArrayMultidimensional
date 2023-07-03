<?php
/**
 * Adiciona um valor em uma estrutura de array multidimensional com base em uma string de chaves.
 *
 * @param array $aArray O array existente.
 * @param string $sString A string de chaves.
 * @param mixed $xValor O valor a ser adicionado na última posição do array.
 * @return array O array resultante após a adição do valor.
 */
function adicionarValorArray($aArray, $sString, $xValor) {
    if ($aArray === null) {
        $aArray = [];
    }

    //Explode para dividir a string de chaves em um array
    $aChave = explode('.', $sString);

    // Cria uma referência ao array existente
    $aArrayAtual = &$aArray;

    // Foreach para percorrer as chaves
    foreach ($aChave as $sChave) {
        // Verifica se a chave não existe ou não é um array
        if (!isset($aArrayAtual[$sChave]) || !is_array($aArrayAtual[$sChave])) {
            $aArrayAtual[$sChave] = [];
        }

        // Atualiza a referência do array atual para o próximo nível.
        $aArrayAtual = &$aArrayAtual[$sChave];
    }

    // Atribui o valor à última posição do array.
    $aArrayAtual = $xValor;

    return $aArray;
}

// $aArrayExistente = [
//     'geral' => [
//         'campo' => [
//             'habilita_campo' => 1,
//             'bloqueia_tela' => 0
//         ]
//     ]
// ];

$aArrayExistente = null;

$sConf = 'notificacao.campo.envia';
$valor = 0;

$aArrayFinal = adicionarValorArray($aArrayExistente, $sConf, $valor);

var_dump($aArrayFinal);
echo '<br>';
echo '<br>';
var_dump(json_encode($aArrayFinal));
