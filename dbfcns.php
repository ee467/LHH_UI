<?php

// THESE FUNCTIONS ARE FOR THE betadb DATABASE! NOT THE gammadb DATABASE!
// That means do not include this file if you want to connect the the gammadb database!
// Use "require("dbfcns.php");"


/* This function connects to the practice database called betadb.
 */
function dbconnect()
{
	$msq_conn = @mysql_connect('localhost','ee467','hookuka');
	
	if($msq_conn)
	{	$db_conn=mysql_select_db("betadb");
		
		if(!$db_conn)
		{	die("Unable to connect to the database</p>");
		}
	}
	
	else
	{	die ("Unable to connect to MySQL</p>");
	}
	
	return $msq_conn;
}


/* getname() returns the First Name, Middle Initial, and Last Name of
 * the user in a string that corresponds to the given UH Banner ID. This function
 * automatically connects to the database, so an example usage of this function 
 * would be:
 *
 *	$name = getname(99999999);
 *
 */
function getname($uhbid)
{	$connection = dbconnect();
	
	$name = "SELECT First, MI, Last
			 FROM pinfo
			 WHERE UHBID = $uhbid";
	
	if($result = mysql_query($name))
	{	$row = mysql_fetch_array($result);
		return $row['First'] . " " . $row['MI'] . " " . $row['Last'] . "\n";
	}
	
	
	else
	{	die("Database Connection Failure</p>");
	} 
	
	mysql_close($connection);
}

?>