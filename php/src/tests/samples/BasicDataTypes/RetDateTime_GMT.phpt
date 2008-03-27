--TEST--
RetDateTime_GMT(2005-06-30T08:30:00-07:00)
--FILE--
<?php

try {

   $wsdl = file_get_contents('config/SimpleDataTypesWsdlDoclitB.txt');

    $client = new WSClient(array("wsdl" => $wsdl));
    
    $proxy = $client->getProxy();
    $val =  $proxy->RetDateTime("2005-06-30T08:30:00-07:00");
    echo $val."\n";

} catch (Exception $e) {

        if ($e instanceof WSFault) {
                printf("Soap Fault: %s\n", $e->Code);
                printf("Soap Reason: %s\n", $e->Reason);
        } else {
                printf("Message = %s\n",$e->getMessage());
        }
}
?>
--EXPECT--
2005-06-30T08:30:00-07:00