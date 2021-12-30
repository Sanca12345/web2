
<?php
include_once 'header.php';
include_once '../helpers/session_helper.php';
if(isset($_SESSION['usersId'])){
    echo explode(" ", $_SESSION['usersName'])[0];
}else{
    redirect("login.php");
} 

if(isset($_POST["datum1"])and isset($_POST["datum2"]))
{
       $date1=$_POST["datum1"];
       $date2=$_POST["datum2"];


       $objClient = new SoapClient("http://www.mnb.hu/arfolyamok.asmx?WSDL", array('trace' => true));
       $currrates = $objClient->GetExchangeRates(['startDate' => $date1, 'endDate' => $date2, 'currencyNames' => "EUR"])->GetExchangeRatesResult;
       $dom_root = new DOMDocument();
       $dom_root->loadXML($currrates);
       $searchNode = $dom_root->getElementsByTagName("Day");
}



?>
<html>
    <head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.6.2/chart.min.js" integrity="sha512-tMabqarPtykgDtdtSqCL3uLVM0gS1ZkUAVhRFu1vSEFgvB73niFQWJuvviDyBGBH22Lcau4rHB5p2K2T0Xvr6Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <style>
.chartBox{
    width: 700px;
    margin-left: auto;
  margin-right: auto;
}
table, th, td{
    
    width: 80%;
    text-align: center;
    position: center;
    margin-left: auto;
  margin-right: auto;
}

th, td {
  border-bottom: 1px solid #ddd;
}



</style>
    </head>

<form action="" method="POST">
<label for="date">kezdő dátum</label>
<input type="date" name="datum1" placeholder="Dátumra keresés yyyy-mm-dd formátum">
<label for="date">záró dátum</label>
<input type="date" name="datum2" placeholder="Dátumra keresés yyyy-mm-dd formátum">
<button type="submit" name="submit">Keresés</button>
</form>
<?php
if(isset($_POST["datum1"])and isset($_POST["datum2"]))
{

?>
<table>
    <thead>
        <tr>
            <th>Dátum</th>
            
            <th>Váltó:</th>
            
        </tr>
    
    </thead>
    <tbody>
<?php 
$chartdate = [];
$chartrate = [];
foreach( $searchNode as $searchNode ) {
    $date = $searchNode->getAttribute('date');
    print "<tr>"."<td>".$date . "</td>";
    $rates = $searchNode->getElementsByTagName( "Rate" ); 
    foreach( $rates as $rate ) {
        print "<td>" . $rate->getAttribute('unit')." " . "</td>" ;
        print "<td>" .$rate->getAttribute('curr')." "."</td>";
        print "<td>"."  =  "."</td>";
        print "<td>".$rate->nodeValue."</td>";
        print "<td>"." HUF"."</td>"."</tr>";

        //chart date
        $erate = $rate->nodeValue;
        $chartdate[] = [$date];
        $chartrate[] = floatval(str_replace(",",".",$erate));
        
       
    }
   
    }
   

?>

</tbody>
</table>
<?php
}
?>


<div class="chartBox">
<canvas id="myChart"></canvas>
</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
var chartdate = <?php echo json_encode(array_reverse($chartdate)); ?>;
var chartrate = <?php echo json_encode(array_reverse($chartrate)); ?>;
console.log(chartrate); 

const ctx = document.getElementById('myChart').getContext('2d');
const myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: chartdate,
        datasets: [{
            label: '# Eur árfolyam',
            data: chartrate ,
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
</script>
</div>
 

</html>

<script>

const labels = <?php echo $date?>;
const data = {
  labels: labels,
  datasets: [{
    label: 'My First Dataset',
    data: [<?php echo $$rate->nodeValue;?>],
    fill: false,
    borderColor: 'rgb(75, 192, 192)',
    tension: 0.1
  }]
};


  // === include 'setup' then 'config' above ===
/*
  const myChart = new Chart(
    document.getElementById('myChart'),
    config
  );*/
</script>