
<?php
class MNBExchange{
    
    const WSDL = 'http://www.mnb.hu/arfolyamok.asmx?WSDL';

      
    public static function getRate(){

        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        $client = new SoapClient(self::WSDL);

        $response_stdclass = $client->GetCurrentExchangeRates();
        
        $xml = $response_stdclass->GetCurrentExchangeRatesResult;
        
        $parser=xml_parser_create();
        
        xml_parse_into_struct($parser, $xml, $ertekek);
        
        $_currency =  trim($_POST['currency']);

        for($i=0; $i<count($ertekek); $i++){
            if($ertekek[$i]['tag'] == 'RATE'){
                if($ertekek[$i]['attributes']['CURR'] == $_currency){
                    xml_parser_free($parser); 
                    return str_replace(',','.',$ertekek[$i]['value']);
                    
                    var_dump($_currency, $ertekek);
                }
            }
        }
        
        
    }
   
}
if(isset($_POST['currency'])){

    echo "POST";
    MNBExchange::getRate();

   
    
}

// hívás
MNBExchange::getRate('CHF');

var_dump(MNBExchange::getRate('CHF'));
?>