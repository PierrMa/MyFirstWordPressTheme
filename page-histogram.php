<?php 
session_start();

//retrieve data from the database
try
{
    $mysqlClient = new PDO('mysql:host=localhost;dbname=local;charset=utf8;port=10011', 'root', 'root');
}
catch(Exception $e)
{
    die('Erreur : '.$e->getMessage());
}
//retrieve the number of people sponsored by the user of each type of subscription
$sqlQuery= 'SELECT number_of_sponsored_2,number_of_sponsored_5,number_of_sponsored_10,number_of_sponsored_30,number_of_sponsored_50,number_of_sponsored_VIP FROM account WHERE user_login = :id AND user_pass =:pwd';
$sqlResponse = $mysqlClient->prepare($sqlQuery);
$sqlResponse ->execute([
    'id'=>$_SESSION['ID'],
    'pwd'=>$_SESSION['PWD'],
]);
$sponsoredPeople = $sqlResponse -> fetchAll();
$maxNum=0;//max of people among all categories of subscription
for($i=0;$i<6;$i++){
    if($sponsoredPeople[0][$i]>$maxNum){$maxNum=$sponsoredPeople[0][$i];}
}

//creating the histogram
// content="text/plain; charset=utf-8"
require_once ('src/jpgraph.php');
require_once ('src/jpgraph_bar.php');

//abscissa data
$datay=[$sponsoredPeople[0]['number_of_sponsored_2'],$sponsoredPeople[0]['number_of_sponsored_5'],$sponsoredPeople[0]['number_of_sponsored_10'],$sponsoredPeople[0]['number_of_sponsored_30'],$sponsoredPeople[0]['number_of_sponsored_50'],$sponsoredPeople[0]['number_of_sponsored_VIP']];

// Create the graph. These two calls are always required
$graph = new Graph(380,250,'auto');
$graph->SetScale("textlin");

//$theme_class="DefaultTheme";
//$graph->SetTheme(new $theme_class());

// set major and minor tick positions manually
$graph->yaxis->SetTickPositions(range(0,$maxNum,1), range(0.1,$maxNum,0.1));
$graph->SetBox(false);

//$graph->ygrid->SetColor('gray');
$graph->ygrid->SetFill(false);
$graph->xaxis->SetTickLabels(array('2€/m','5€/m','10€/m','30€/m','50€/m','VIP'));
$graph->yaxis->HideLine(false);
$graph->yaxis->HideTicks(false,false);

// Create the bar plots
$b1plot = new BarPlot($datay);

// ...and add it to the graPH
$graph->Add($b1plot);


$b1plot->SetColor("white");
$b1plot->SetFillGradient("#4B0082","white",GRAD_LEFT_REFLECTION);
$b1plot->SetWidth(45);
$graph->title->Set("Number of people sponsored by subscription category");
$graph->xaxis->title->Set("Subscription Category");
$graph->yaxis->title->Set("Number of people sponsored");

$graph->title->SetFont(FF_ARIAL,FS_BOLD,10.5);
$graph->yaxis->title->SetFont(FF_VERDANA,FS_BOLD,8);
$graph->xaxis->title->SetFont(FF_VERDANA,FS_BOLD,8);

$graph->title->SetColor("red");
$graph->yaxis->title->SetColor("blue");
$graph->xaxis->title->SetColor("blue");

// Display the graph
$graph->Stroke();
?>