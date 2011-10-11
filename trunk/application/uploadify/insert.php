<?php

// connect database
$dbc = mysql_connect("localhost", "root", "");

// select database
mysql_select_db("uplbdadb", $dbc);

if(isset($_POST)) {

	$fileName = $_POST['name'];
	$filepath = $_POST['path'];
        $fpath = dirname($filepath);
        $proj_id = $_POST['proj_id'];
        $filetype = $_POST['filetype'];
        $newfname = $proj_id."_".$fileName;
        $newfpath = $fpath."/".$proj_id."_".$fileName;
        


if($filetype == "Dorsal")
{
    mysql_query("INSERT INTO images(filename, filepath, proj_id, view_type) VALUES('$newfname', '$newfpath', '$proj_id', '$filetype' )");
	$inserted_id = mysql_insert_id($dbc);
}
else if($filetype == "Ventral")
{
    mysql_query("INSERT INTO images(filename, filepath, proj_id, view_type) VALUES('$newfname', '$newfpath', '$proj_id', '$filetype')");
	$inserted_id = mysql_insert_id($dbc);
}
else if($filetype == "Lateral")
{
    mysql_query("INSERT INTO images(filename, filepath, proj_id, view_type) VALUES('$newfname', '$newfpath', '$proj_id', '$filetype')");
	$inserted_id = mysql_insert_id($dbc);
}
else if($filetype == "Other")
{
    mysql_query("INSERT INTO images(filename, filepath, proj_id, view_type) VALUES('$newfname', '$newfpath', '$proj_id', '$filetype')");
	$inserted_id = mysql_insert_id($dbc);
}
else if($filetype == "Video")
{
    mysql_query("INSERT INTO videos(filename, filepath, proj_id) VALUES('$newfname', '$newfpath', '$proj_id')");
	$inserted_id = mysql_insert_id($dbc);
}
else if($filetype == "Document")
{
    mysql_query("INSERT INTO docs(filename, filepath, proj_id) VALUES('$newfname', '$newfpath', '$proj_id')");
	$inserted_id = mysql_insert_id($dbc);
}


	if($inserted_id > 0) { // if success
		echo "Files uploaded successfully!";
	}
        
        
}
?>