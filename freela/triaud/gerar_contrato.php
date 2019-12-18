<?php 
function populate_RTF($vars, $doc_file)
{

    $replacements = array('\\' => "\\\\",
        '{' => "\{",
        '}' => "\}");

    $document = file_get_contents($doc_file);
    if (!$document) {
        return false;
    }

    foreach ($vars as $key => $value) {
        $search = "%%" . strtoupper($key) . "%%";

        foreach ($replacements as $orig => $replace) {
            $value = str_replace($orig, $replace, $value);
        }

        $document = str_replace($search, $value, $document);
    }

    return $document;
}
$documento = "contrato.rtf";

$variables = array(
    "socio_adm" => "socio_adm",
    "cpf" => "cpf",
    "rg" => "rg",
    "firma" => "firma",
    "rua" => "rua",
    "numero" => "numero",
    "bairro" => "bairro",
    "cidade" => "cidade",
    "estado" => "estado",
    "cep" => "cep",
    "cnpj" => "cnpj",
    "data_vigencia" => "data_vigencia",
    "s_contabil" => "___",
    "n_contabil" => "___",
    "s_fiscal" => "___",
    "n_fiscal" => "___",
    "b_dp" => "___",
    "m_dp" => "___",
    "p_dp" => "___",
    "b_bpo" => "___",
    "m_bpo" => "___",
    "p_bpo" => "___",
    "dia" => "dia",
    "mes" => "mes",
    "ano" => "ano"
);

$content = base64_decode( populate_RTF( $variables,$documento));
// header("Content-Type: application/vnd.ms-excel");
// header('Content-Disposition: attachment; filename="contrato.pdf');

header('Content-type:application/octet-stream');
header('Content-disposition: attachment; filename=export.pdf');
header('Content-Transfer-Encoding: binary'); 
header('Expires: 0'); 
header('Cache-Control: must-revalidate, post-check=0, pre-check=0'); 
echo $content;