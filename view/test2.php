
<pre>
<?php
    try {
        $client = new SoapClient("http://www.mnb.hu/arfolyamok.asmx?WSDL");
      

        
        //var_dump($client->GetExchangeRates(['startDate'=> "2010.10.01", 'endDate' => "2010.10.30", 'currencyNames' => "USD,EUR"]));
        $response_stdclass = $client->GetExchangeRates();
        $xml = $response_stdclass->GetExchangeRates(['startDate'=> "2010.10.01", 'endDate' => "2010.10.30", 'currencyNames' => "USD,EUR"]);
        $parser=xml_parser_create();
        xml_parse_into_struct($parser, $xml, $ertekek);
        
        for ($i = 0; $i<= sizeof($ertekek); $i++) {
            if($ertekek[$i]['tag'] == 'RATE'){
                if($ertekek[$i]['attributes']['CURR'] == $_currency1){
                    xml_parser_free($parser); 
                    return str_replace(',','.',$ertekek[$i]['value']);
                }
            }
        }
       

    } catch (SoapFault $e) {
        var_dump($e);
    }
?>
</pre>
