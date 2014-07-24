<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Confirmation</title>
<style>

table.DataEntry
{
	border-style: solid;
	border-color: #000000;
	border-width: thin;
}
td.Label1
{
	background-color: #6699CC;
	font-weight: bold;
	border-top-style: solid;
	border-color: #000000;
	border-width: thin;
}
td.Input1
{
	background-color:#6699CC;
	font-weight: bold;
	border-top-style: solid;
	border-color: #000000;
	border-width: thin;
}
td.Label2
{
	background-color: #FFFFFF;
	font-weight: bold;
	border-top-style: solid;
	border-color: #000000;
	border-width: thin;
}
td.Input2
{
	background-color:#FFFFFF;
	font-weight: bold;
	border-top-style: solid;
	border-color: #000000;
	border-width: thin;
}
input.Field
{
	background-color: #CCCCCC;
	width: 250px;
}
</style>
</head>
<body style="background-color: #999999;">
<div align="center">
<? 
//Setup the database connection as a interface.
class DBInterface
{
	//Function to connect to the database.
	static function ExecuteQuery($Query)
	{
		
		$Username = "rj";
		$Password = "rj02";

		$Connection = mysql_connect('localhost', $Username, $Password) or die("Cnnx Issues");
		mysql_select_db('UserRegistration');	
	
		$Result = mysql_query($Query) or die("Query Issues for - ".$Query);
		mysql_close($Connection);		

		return $Result;

	}//End function.

}//End class.
//End database connection function.

//Function to create a database object, used to parse submitted text, I use this function for sanizting text for MySQL databases, in order to add the correct escape strings.
function DBO() 
{

	$Username = "rj";
	$Password = "rj02";

	$link = new mysqli('localhost',$Username,$Password,'UserRegistration') or die("Cnnx Issues");

	return $link;

}//End function to create database object.

function SanitizeText($Data)
{

	$Link = DBO();

	//Remove whitespaces.
	$Data = trim($Data);

	//Convert HTML entities back to original characters.
	$Data = html_entity_decode($Data,ENT_QUOTES);

	//Remove all slashes.
	if (get_magic_quotes_gpc()) 
	{
		$Data = stripslashes($Data);
	}//END IF.

	#A mySQL connection is required before using this function.
	$Data = mysqli_real_escape_string($Link,$Data);

	return $Data;

}//End function to sanitize text.

//Grab the user submitted variables, check if it is a null value, and sanitize before it is inserted into the database.
if($_POST['FirstName'] != "")
{
	$FirstName = SanitizeText($_POST['FirstName']);
}

if($_POST['LastName'] != "")
{
	$LastName = SanitizeText($_POST['LastName']);
}

if($_POST['Address1'] != "")
{
	$Address1 = SanitizeText($_POST['Address1']);
}

if($_POST['Address2'] != "")
{
	$Address2 = SanitizeText($_POST['Address2']);
}

if($_POST['City'] != "")
{
	$City = SanitizeText($_POST['City']);
}

$State = $_POST['State'];

if($_POST['Zip'] != "")
{
	$Zip = SanitizeText($_POST['Zip']);
}

$Country = $_POST['Country'];

if($FirstName != "" && $LastName != "")
{
	CreateUser($FirstName,$LastName,$Address1,$Address2,$City,$State,$Zip,$Country);
}//End check before inserting data. This basically just checks that you at least entered a username. This way you can add further parameters to determine what fields must be provided before insertion.

//Function to create a user.
function CreateUser($FirstName,$LastName,$Address1,$Address2,$City,$State,$Zip,$Country)
{
	$Timestamp = date('Y-m-d h:i:s');
	$Query = "INSERT INTO Users(FirstName,LastName,Address1,Address2,City,State,Zip,Country,Timestamp) VALUES('$FirstName','$LastName','$Address1','$Address2','$City','$State','$Zip','$Country','$Timestamp')";
	$ResultsSet = DBInterface::ExecuteQuery($Query);

}//Emd function to create new user.


echo "User:".$FirstName." ".$LastName." has been registered successfully.";
?>
<br />
<a href="Report.php">User Report</a> | <a href="Registration.php">User Registration</a> 
</div>
</body>
