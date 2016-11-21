<?php
$xmlstring = <<<XML
<?xml version="1.0" encoding="ISO-8859-1"?>
<note>
<to>George</to>
<from>John</from>
<heading>Reminder</heading>
<body>Don't forget the meeting!</body>
<to>George1</to>
<from>John1</from>
<heading>Reminder1</heading>
<body>Don't forget the meeting!1</body>
</note>
XML;

$xml = simplexml_load_string($xmlstring);

echo $xml->to[1];

//var_dump($xml);
?>