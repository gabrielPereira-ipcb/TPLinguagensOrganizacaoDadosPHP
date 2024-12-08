<?php
ob_start();
include_once("../basedados/basedados.h");

//criacao do documento xml

$xml = new DOMDocument('1.0','UTF-8');
//cria um novo elemtento XML
$root = $xml->createElement("dados");
//anexa 'dados' como nó da raiz do documento XML
$xml->appendChild($root);


$sql_col = "SHOW COLUMNS FROM cursos";
$res_col = mysqli_query($conn,$sql_col);
$n_col = 0;

while ($row_col = mysqli_fetch_array($res_col)) {
    # code...
    $nome_col[$n_col++]=$row_col[0];
}
//print_r($nome_col);

$sql_select = "SELECT * FROM cursos";
$res_select = mysqli_query($conn, $sql_select);
$num_select = mysqli_num_rows($res_select);

if($num_select>0){
    //echo "$num_select cursos encontrados<br>";
    $tcurso = $xml->createElement("tabela_curso");
    $root->appendChild($tcurso);

    while($row=mysqli_fetch_array($res_select, MYSQLI_NUM)){
        $curso = $xml->createElement("curso");
        $tcurso->appendChild($curso);
        
        for ($n=0; $n<$n_col; $n++){
            $col = $xml->createElement($nome_col[$n], htmlspecialchars($row[$n]));
            $curso->appendChild($col);
        }
    }
}


$xslt_curso = new DOMDocument();

$xslt_curso->loadXML('<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
<xsl:template match="/">
    <html>
    <head>
        <title>Cursos Disponíveis</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                line-height: 1.6;
                color: #333;
                max-width: 1200px;
                margin: 0 auto;
                padding: 20px;
                background-color: #f4f4f4;
            }
            h1 {
                color: #2c3e50;
                text-align: left;
                border-bottom: 2px solid #3498db;
                padding-bottom: 10px;
            }
            table {
                width: 100%;
                border-collapse: collapse;
                margin-top: 20px;
                background-color: white;
                box-shadow: 0 0 20px rgba(0,0,0,0.1);
            }
            th, td {
                padding: 12px 15px;
                text-align: left;
                border-bottom: 1px solid #ddd;
            }
            th {
                background-color: #3498db;
                color: white;
                text-transform: uppercase;
                font-size: 14px;
            }
            tr:hover {
                background-color: #f5f5f5;
            }
            a {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 15px;
            background-color: #3498db;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
            }
            a:hover {
                background-color: #2980b9;
            }
        </style>
    </head>
    <body>
        <h1>Cursos Disponíveis</h1>
        <table>
            <tr>
                <xsl:for-each select="dados/tabela_curso/curso[1]/*">
                    <th><xsl:value-of select="name()"/></th>
                </xsl:for-each>
            </tr>
            <xsl:for-each select="dados/tabela_curso/curso">
                <tr>
                    <xsl:for-each select="*">
                        <td><xsl:value-of select="."/></td>
                    </xsl:for-each>
                </tr>
            </xsl:for-each>
        </table>
        <a href="index.php">Voltar para a Página Inicial</a>
    </body>
    </html>
</xsl:template>
</xsl:stylesheet>');

//aplicar tranformacao do xslt ao xml
$xslt_processor = new XSLTProcessor();
$xslt_processor->importStylesheet($xslt_curso);
echo $xslt_processor->transformToXml($xml);

?>
