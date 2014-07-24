<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>User Registration Form</title>

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

<!-- Initial User Registration Page
Used regular expressions to validate on client side, instead of Javascript alert boxes, as this would be a less obstrusive way of communicating. I also kept all styles, and PHP functions on the page they are used. Typically I would organize my functions, styles into a separate file that could be referenced with an 'include' statement. For this assessmentI left this on the page themselves so it would be easy to review.
 --> 
 
<body style="background-color: #999999;">
<div align="center">
<label style="font-weight:bold;">User Registration</label>
<form name="UserDetails" action="Confirmation.php" method="post">
	<table class="DataEntry" cellpadding="2" cellspacing="0">
		<tr>
        	<td class="Label1" style="border: none;">
            First Name:
            </td>
            <td class="Input1" style="border: none;">
            <input type="text" maxlength="40" name="FirstName" class="Field" required pattern="[a-zA-Z\d\s\-\,\#\.\+]+"  />
            </td>
		</tr>
		<tr class="Entry">
        	<td class="Label2">
            Last Name:
            </td>
            <td class="Input2">
            <input type="text" maxlength="40" name="LastName" class="Field" required pattern="[a-zA-Z\d\s\-\,\#\.\+]+"  />
            </td>
		</tr>   
		<tr class="Entry">
        	<td class="Label1" colspan="2">
            Address 1:
            </td>
         </tr>
         <tr>
            <td colspan="2" class="Input1" style="border: none;">
            <input type="text" maxlength="60" name="Address1" class="Field" style="width: 336px;" required pattern="[a-zA-Z\d\s\-\,\#\.\+]+" />
            </td>
		</tr>   
		<tr>
        	<td class="Label2" colspan="2">
            Address 2:
            </td>
         </tr>
         <tr>
            <td colspan="2" class="Input2" style=" border:none;">
            <input type="text" maxlength="60" name="Address2" class="Field" style="width: 336px;" pattern="[a-zA-Z\d\s\-\,\#\.\+]+" />
            </td>
		</tr>    
		<tr class="Entry">
        	<td class="Label1">
            City:
            </td>
            <td class="Input1">
            <input type="text" maxlength="40" name="City" class="Field" required pattern="[a-zA-Z\d\s\-\,\#\.\+]+"  />
            </td>
		</tr>
		<tr class="Entry">
        	<td class="Label2">
            State:
            </td>
            <!-- Created a dropdown selector for all states, as this makes it easier to validate as compared to a user string -->
            <td class="Input2">
				<select name="State">
  					<option value="AL">Alabama</option>
  					<option value="AK">Alaska</option>
  					<option value="AZ">Arizona</option>
  					<option value="AR">Arkansas</option>
  					<option value="CA">California</option>
  					<option value="CO">Colorado</option>
  					<option value="CT">Connecticut</option>
  					<option value="DE">Delaware</option>
  					<option value="DC">Dist of Columbia</option>
  					<option value="FL">Florida</option>
  					<option value="GA">Georgia</option>
  					<option value="HI">Hawaii</option>
  					<option value="ID">Idaho</option>
  					<option value="IL">Illinois</option>
  					<option value="IN">Indiana</option>
  					<option value="IA">Iowa</option>
  					<option value="KS">Kansas</option>
  					<option value="KY">Kentucky</option>
  					<option value="LA">Louisiana</option>
  					<option value="ME">Maine</option>
  					<option value="MD">Maryland</option>
  					<option value="MA">Massachusetts</option>
  					<option value="MI">Michigan</option>
  					<option value="MN">Minnesota</option>
  					<option value="MS">Mississippi</option>
  					<option value="MO">Missouri</option>
  					<option value="MT">Montana</option>
  					<option value="NE">Nebraska</option>
  					<option value="NV">Nevada</option>
  					<option value="NH">New Hampshire</option>
  					<option value="NJ">New Jersey</option>
  					<option value="NM">New Mexico</option>
  					<option value="NY">New York</option>
  					<option value="NC">North Carolina</option>
  					<option value="ND">North Dakota</option>
  					<option value="OH">Ohio</option>
  					<option value="OK">Oklahoma</option>
  					<option value="OR">Oregon</option>
  					<option value="PA">Pennsylvania</option>
  					<option value="RI">Rhode Island</option>
  					<option value="SC">South Carolina</option>
  					<option value="SD">South Dakota</option>
  					<option value="TN">Tennessee</option>
  					<option value="TX">Texas</option>
  					<option value="UT">Utah</option>
  					<option value="VT">Vermont</option>
  					<option value="VA">Virginia</option>
 					<option value="WA">Washington</option>
					<option value="WV">West Virginia</option>
 					<option value="WI">Wisconsin</option>
  					<option value="WY">Wyoming</option>
				</select>
            </td>
		</tr>
		<tr class="Entry">
        	<td class="Label1">
            Zip Code*:
            </td>
            <td class="Input1">
            <input type="text" maxlength="10"name="Zip" class="Field" required pattern="^\d{5,6}(?:[-\s]\d{4})?$" />
            </td>
		</tr>
		<tr class="Entry">
        	<td class="Label2">
            Country:
            </td>
            <td class="Input2">
            United States*
            <input type="hidden" name="Country" class="Country" value="US" />
            </td>
		</tr>                                                       
	</table>
    <input type="submit" name="submit" value="Submit" />
</form>
*Currently only valid for users located in the United States.
<br />
**Must Include "-" if typing a 9 digit code.
<br />
<a href="Report.php">User Report</a>
</div>
</body>
