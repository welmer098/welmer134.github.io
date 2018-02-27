<?php
if(isset($_POST['search']))
{
	$valueToSearch = $_POST['valueToSearch'];
	$query = "SELECT *, b.courseDesc FROM contact_tbl a 
     JOIN Course_tbl b ON b.courseNo=a.courseNo WHERE CONCAT(`StudID`,`Name`,`courseDesc`) LIKE '%".$valueToSearch."%'";
	$search_result = filterTable($query);
	
	$query2 = "SELECT * FROM Course_tbl";
	$search_result2 = filterTable($query2);

}
else {
	$query = "SELECT *, b.courseDesc FROM contact_tbl a 
    JOIN Course_tbl b ON b.courseNo=a.courseNo";
	$search_result = filterTable($query);

	$query2 = "SELECT * FROM Course_tbl";
	$search_result2 = filterTable($query2);

	
}



function filterTable($query)
{
	$connect = mysqli_connect("localhost","root","","smsdb");
	$filter_Result = mysqli_query($connect,$query);
	return $filter_Result;
}
?>
<!DOCTYPE html> 
<html>
	<head>

		
		<title>PHP HTML TABLE DATA </title>
		<style>
			tr
			{
				
			}
			th{

			}
			td{
				border: 1px solid black;
			}
		</style>

		 <style>
        table{

            font-family: arial,sans-serif;
            border-style:double;
            width:95%;
            
           

        }

        td,th{
           
            width: 240px;
   
        }

        tr:nth-child(even){
            background-color: #dddddd;

        }
        table.scroll{
        	border-spacing: 100;
        	border: 2px solid black;
        }
        table.scroll tbody,
        table.scroll thead { 
        	display: block; 

        }

        thead tr th {
        	height: 30px;
        	width: 205px;

        }

        table.scroll tbody {
        	height: 200px;
        	overflow-y: auto;
        	overflow-x: hidden;
        }
        tbody { 
        	 
        }
       
textarea {
    overflow-y: scroll;
    height: 200px;
    width: 500px;
    resize: none; /* Remove this if you want the user to resize the textarea */
}

.myDiv { 
height: 800px; 
width: 900px; 

background-color: #FFFFFF;

}

#getSelected {
	height: 40px;
	width: 100px;

}

#subm {
	height: 40px;
	width: 100px;
}

#bodyback{
	background: url(back.jpg);
    position: relative;
    background-repeat:no-repeat;
    background-size:100% 100vh;

}
#wrapper {
      width:900px;
      height: 50px;
      text-align:center;
      margin-right:auto;
      margin-left:auto;
      margin-top:0px;
      background-color: #EE6363;
      color:#FFFAFA;
      padding:0px;
      position: relative;
    }

    		</style>
		
		</head>
<center>
		<div class="myDiv">
	<body id=bodyback>

<form action="thesis.php" method="POST">

	

			<div id="wrapper"><h1>SMS Notification For UIC Students</h1>
			<pre><a href="login.php?logout='1'" style="color: blue;"><h3>logout</h3></a></pre>
			</div>
			<br>
			<br>
			
			 <input type="text" name="valueToSearch" placeholder="Search">  
			<input type="submit" name="search" value="Search"> <br><br> 
		    <table class="scroll"> <thead>
			<tr>
				<th> Student ID </th>
				<th> Name </th>
				<th> Course </th>
				<th> Mobile Number </th>
			</tr>
		</thead>
		<tbody>
			<?php while($row = mysqli_fetch_array($search_result)):?>

			<tr> 

				<td><?php echo $row['StudID'];?></td>
				<td><?php echo $row['Name'];?></td>
				<td><?php echo $row['courseDesc'];?></td>
				<td><?php echo $row['CpNo'];?></td>
				
				</tr>

		     	<?php endwhile;?>
		     </tbody>
		</table>
		

		
		<br>
	

		<br>
	    <textarea rows="10" cols="20" id="text" name="text" placeholder="Input Text"></textarea>

	
	<br> 
		<select name="getSelected" id="getSelected" class="form-control"> <br>
	
		<option value='0'>ALL</option>";</td>
		<?php while($row = mysqli_fetch_array($search_result2)):?>
	    <?php echo "<option value='". $row['courseNo'] ."'>" .$row['courseDesc'] ."</option>"; ?></td>
		<?php endwhile;?> </select>

		<input type="submit" id="subm" name="submit" value="send">
		<?php if(isset($_POST['submit']))
{


$text = $_POST['text'];
$link = mysqli_connect("localhost", "root", "", "smsdb");
$getSelected = $_POST['getSelected'];

if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
$sql = "INSERT INTO inbox (Inbox_Text, Inbox_Dept, Inbox_Status) VALUES ('".$text."', '".$getSelected."','waiting')";
if(mysqli_query($link, $sql)){
	?>      
	 <br> <br>  <h1>MESSAGE SENT </h1>
	 <?php


} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);}

mysqli_close($link);

} ?>

</div>
</center>
	</form>

	</body>


