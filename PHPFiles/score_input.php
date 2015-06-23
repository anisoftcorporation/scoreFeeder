<?php
session_start();
$result="";
include("functions.php");
$match="";
$team="";
if (!isset($_SESSION['uname']) || $_SESSION['uname'] == '')
{

session_destroy();
header('location:score_login.php');
}
else
{
if ( isset( $_POST['btnsubmit'] ) ) 
{ 
$match=$_POST['match'];
$team=$_POST['team'];
$runs=$_POST['runs'];
$wickets=$_POST['wickets'];
$overs=$_POST['overs'];

$url = 'http://localhost:8080/doSave';
$data = array(
						'match' => urlencode($match),
						'team' => urlencode($team),
						 'runs' => urlencode($runs),
						'wickets' => urlencode($wickets),
						'overs' => urlencode($overs),
						'by' => urlencode($_SESSION['uname'])
				);
$result=doCurl($data,$url);
//doCurl($fields,$url)

}
}
?>
<html>
<head>
<title>Login</title>

<script>
function limitTeams(val)
{
var teamArr = val.split("VS");
document.getElementById("team").options[0].text=teamArr[0].trim();
document.getElementById("team").options[0].value=teamArr[0].trim();
document.getElementById("team").options[1].text=teamArr[1].trim();
document.getElementById("team").options[1].value=teamArr[1].trim();
}
</script>
<style media="screen" type="text/css">
 .form{ 
    max-width: 100%; 
    min-width: 25%; 
    border-width: 2px; 
    border-color: #CCCCCC; 
    border-radius: 4px; 
    border-style: solid; 
    color: #222222; 
    font-size: 14px; 
    margin: 0px; 
    background-color: #FFFFFF; 
    padding: 20px; 
} 
.content{ 
    margin: 0px; 
} 
.form label{ 
    color: #222222; 
    font-size: 14px; 
    display: block; 
} 
.form input[type=radio], input[type=checkbox]{ 
    margin: 10px; 
    width: 13px; 
} 
.form div{ 
    display: block; 
} 
.form input, form textarea, form select{ 
    border-width: 1px; 
    border-style: solid; 
    border-color: #666666; 
    border-radius: 0px; 
    padding: 3px; 
    width: 100%; 
} 
.form h1{ 
    font-size: 40px; 
    color: #607A75; 
    padding: 0px; 
    margin: 0px; 
    margin-bottom: 10px; 
    border-bottom-style: dotted; 
    border-bottom-color: #CCCCCC; 
    border-bottom-width: 2px; 
    border-radius: 0px; 
    background-color: #FFFFFF; 
} 
.intro{ 
    margin-bottom: 10px; 
} 
.clear{ 
    clear: both; 
} 
.form textarea{ 
    height: 50px; 
    width: 100%; 
} 
.form input[type=submit]{ 
    width: 100%; 
    background-color: #CCCCCC; 
    color: #222222; 
} 
.field{ 
    margin-bottom: 5px; 
} 
</style>
</head>
<body>
<form id="form" class="form" method="post" enctype="application/x-www-form-urlencoded" accept-charset="UTF-8" action="">
    <h1>Score Input</h1>
    <div class="content">
        <div class="intro"><p>Input the score here</p></div>
        <div id="section0" >
            <div class="field"><label for="selecttmatch">Select Match</label>
				    <select name="match" id="match" onChange="limitTeams(this.value)" required>
<option value="">Select</option>
<?php
foreach($matchList as $cur)
{
$op="";
if($match==$cur)
{
$op="selected";
}
?>
<option value="<?php echo $cur; ?>" <?php echo $op;?>><?php echo $cur; ?></option>
<?php
}

?>
				</select>
			</div>
            <div class="field"><label for="selectteam">Who is playing right now?</label>
				
<select name="team" id="team" required>
<?php
if($match!=""){
$isSelected="";
$teams=explode("VS",$match);
foreach($teams as $curTeam){
$option=trim($curTeam);
if($option==$team){
$isSelected="selected";
}
?>
<option value="<?php echo $option;?>" <?php echo $isSelected; ?>><?php echo $option;?></option>

<?php 
}
}
else
{
?>
					<option name=""></option>
					<option name=""></option>
<?php
}
?>
				</select>
			</div>
			<div class="field"><label for="runs">Runs</label><input type="text" id="runs" name="runs" required></div>
			<div class="field"><label for="wickets">Wickets</label><input type="text" id="wickets" name="wickets" required></div>
			<div class="field"><label for="overs">Overs</label><input type="text" id="overs" name="overs" required></div>
			
			<div class="field"><input type="submit" id="btnsubmit" name="btnsubmit"></div>
        </div>
    </div>
</form>
</body>
</html>
