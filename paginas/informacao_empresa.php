<?php


$xml_dados_empresa = '<?xml version="1.0" encoding="UTF-8"?>
<informacao_empresa>
    <morada> Avenida do Empresário </morada>
    <freguesia> Castelo Branco </freguesia>
    <codigo_postal> 6000-767 </codigo_postal>
    <horario_funcionamento>Segunda-Sexta: 8:00 às 22:00 Sábado: 9:00 às 13:00</horario_funcionamento>
    
</informacao_empresa>';

$xslt_dados_empresa = '<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
<xsl:template match="/">
    <html>
    <head>
        <title>Informações da Empresa</title>
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
    <h1>Informações da Empresa</h1>
    <table>
        <tr>
            <th>Morada</th>
            <th>Freguesia</th>
            <th>Código Postal</th>
            <th>Horário de Funcionamento</th>
        </tr>
        <xsl:for-each select="informacao_empresa">
        <tr>
            <td><xsl:value-of select="morada"/></td>
            <td><xsl:value-of select="freguesia"/></td>
            <td><xsl:value-of select="codigo_postal"/></td>
            <td><xsl:value-of select="horario_funcionamento"/></td>
        </tr>
        </xsl:for-each>
    </table>
    <a href="index.php">Voltar para a Página Inicial</a>
</body>
</html>
</xsl:template>
</xsl:stylesheet>';

$xslt = new XSLTProcessor();
$xslt->importStylesheet(new SimpleXMLElement($xslt_dados_empresa));
echo $xslt->transformToXml(new SimpleXMLElement($xml_dados_empresa));
//echo ($xml_dados_empresa);
