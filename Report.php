<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Registered User Report</title>

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
	border-left-style: solid;
	border-color: #000000;
	border-width: thin;
	text-align: center;
}
td.Data1
{
	background-color:#FFFFFF;
	border-top-style: solid;
	border-left-style: solid;
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
	text-align: center;
}
td.Data2
{
	background-color:#99CCFF;
	border-top-style: solid;
	border-left-style: solid;
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


//Pull all users from the database.
$Query = "SELECT * FROM users ORDER BY Timestamp";
$ResultsSet = DBInterface::ExecuteQuery($Query);

echo "<label style='font-weight:bold;'>User Report</label>";
echo "<table class='DataEntry' cellpadding='2' cellspacing='0'>";
		echo "<tr>";
		
        	echo "<td class='Label1' style='border: none;'>";
            echo "ID";
            echo "</td>";
		
        	echo "<td class='Label1'>";
            echo "First Name";
            echo "</td>";		
		
        	echo "<td class='Label1'>";
            echo "Last Name";
            echo "</td>";
			
        	echo "<td class='Label1'>";
            echo "Address 1";
            echo "</td>";	
			
        	echo "<td class='Label1'>";
            echo "Address 2";
            echo "</td>";	
							
        	echo "<td class='Label1'>";
            echo "City";
            echo "</td>";
			
        	echo "<td class='Label1'>";
            echo "State";
            echo "</td>";
						
        	echo "<td class='Label1'>";
            echo "Zip Code";
            echo "</td>";
			
        	echo "<td class='Label1' style='border-right: none;'>";
            echo "Country";
            echo "</td>";		
			
        	echo "<td class='Label1' style='border-right: none;'>";
            echo "Registration Date";
            echo "</td>";						
														
		echo "</tr>";	

$RowCounter = 0;
while($Info = mysql_fetch_array($ResultsSet))
{
		if($RowCounter%2 == 0)
		{
			$Class = "Data1";
		}
		else
		{
			$Class = "Data2";
		}
		
		echo "<tr>";
        	echo "<td align='right' class='$Class' style='border-left: none;'>";
            echo $Info['ID'];
            echo "</td>";
			
        	echo "<td class='$Class'>";
            echo $Info['FirstName'];
            echo "</td>";		
			
        	echo "<td class='$Class'>";
            echo $Info['LastName'];
            echo "</td>";		
			
        	echo "<td class='$Class'>";
            echo $Info['Address1'];
            echo "</td>";			
			
        	echo "<td class='$Class'>";
            echo $Info['Address2'];
            echo "</td>";					

        	echo "<td class='$Class'>";
            echo $Info['City'];
            echo "</td>";
			
        	echo "<td class='$Class'>";
            echo $Info['State'];
            echo "</td>";		
		
        	echo "<td align='right' class='$Class'>";
            echo $Info['Zip'];
            echo "</td>";	
			
        	echo "<td class='$Class' style='border-right: none;'>";
            echo $Info['Country'];
            echo "</td>";		
			
        	echo "<td class='$Class' style='border-right: none;'>";
            echo $Info['Timestamp'];
            echo "</td>";							
		
		echo "</tr>";		
		
		$RowCounter++;
}
echo "</table>";		
?>
<br />
<a href="Registration.php">User Registration</a> 
</div>
</body>
