<?php
session_start();
include_once('dbConnect.php');
?>

<!--عايزه لما اسلكت اسم اليوزر يكتبلي الاي دي بتاعه ويبعته هناك-->
<!--عايزه ختار الريسبشنيست من الجدول الي هة الفورين كيمعرفش هل احط ال لرقم ولا احط اسمه واعمل زب الكبلينت -->
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Measurements Table</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="html/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="html/css/util.css">
	<link rel="stylesheet" type="text/css" href="html/css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-table100">
			<div class="wrap-table100">
				<div class="table100">
                                    <form action="Zindex.php" method="POST" >
					<table>
						<thead>
                                                        
                                                        <tr class="table100-head">
                                                            <th class="column2" style="color: white">
                                                            <p style="display: inline">Select User ID </p> 
            <select name="selectClient">
                                                           <!--this php code to select the client with its id-->
                                                           <?php 
                                                                //open the db connection
                                                                 include_once ('dbConnect.php');
                                                                $sql = "SELECT id, name FROM client";
                                                                $result = mysqli_query($link, $sql);
                                                                $resultCheck = mysqli_num_rows($result);echo'<br>';
                                                                echo $resultCheck;
                                                                if ($resultCheck < 0){
                                                                    echo'error from beforeMeasurementHtml.php select query';
                                                                }else{
                                                                    while($row = mysqli_fetch_assoc($result)){
//                                                                       foreach($row as $value){
                                                                         echo'<option>'."id: ".$row["id"]." ".$row["name"].'</option>';
//                                                                    }
                                                                }
                                                                }
                                                                ?>
            </select><br><br>
                                                            </th>
                                                        </tr>
                                                        
                                                        <tr class="table100-head">
                                                            <th class="column3" style="color: white">
                                                                <p style="display: inline">Select Receptionist ID</p> 
            <select name="selectReceptionist">
                                                                          <!--this php code to select the receptionisr id-->
                                                                        <?php
//                                                                             $sql = "SELECT id FROM recepionist";
//                                                                            $result = mysqli_query($link, $sql);
//                                                                            $resultCheck = mysqli_num_rows($result);
//                                                                       
//                                                                            if ($resultCheck < 0){
//                                                                                echo'error from indexhtml.php select receptioist query';
//                                                                            }else{
//                                                                            while($row = mysqli_fetch_assoc($result))
//                                                                             foreach($row as $value){
//                                                                                     echo'<option value="'.$value.'">'.$value.'</option>';
//                                                                    }
//                                                                }
                                                                        
                                                                               echo'<option>'.$_SESSION['user'].'</option>';            
                
                                                                        ?>
            </select>
           <br><br>
                                                            </th>
                                                        </tr>
						</thead>
						<tbody>
								<tr>
									<td class="column1">Weight</td>
                                                                        <td class="column2"><input type="text" name="weight1"></td>		
								</tr>
								<tr>
									<td class="column1">Body Fat</td>
									<td class="column2"><input type="text" name="fat1"></td>
								</tr>
								<tr>
									<td class="column1">Nick</td>
									<td class="column2"><input type="text" name="nick1"></td>
								</tr>
								<tr>
									<td class="column1">Shoulders</td>
									<td class="column2"><input type="text" name="shoulders1"></td>
                                                                </tr>
								<tr>
									<td class="column1">Chest</td>
									<td class="column2"><input type="text" name="chest1"></td>
								</tr>
								<tr>
									<td class="column1">Waist</td>
									<td class="column2"><input type="text" name="waist1"></td>
								<tr>
									<td class="column1">Upper Abs</td>
									<td class="column2"><input type="text" name="upAbs1"></td>
								</tr>
								<tr>
									<td class="column1">Lower Abs</td>
									<td class="column2"><input type="text" name="lowAbs1"></td>
								</tr>
								<tr>
									<td class="column1">Upper Thighs</td>
									<td class="column2"><input type="text" name="upthighs1"></td>
								</tr>
								<tr>
									<td class="column1">Lower Thighs</td>
									<td class="column2"><input type="text" name="lowthighs1"></td>
								</tr>
								<tr>
									<td class="column1">Calf</td>
									<td class="column2"><input type="text" name="calf1"></td>
<!--                                                                <tr>
                                                                    <td class="column1"><p>Receptionist ID</p></td>
                                                                    <td class="column2"></td>
                                                                </tr>-->
							
						</tbody>
					</table>
                                        <br><br>
                                        <input type="submit"   name="subMeasurementstbl"  value="Save">
                                    </form>
                                    
 <br><p style="display: inline;">Register New Client <a href="registerClientHtml.php">here</a></p><br>
 <p style="display: inline">Show All Registered Clients <a href="viewClientsHtml.php">here</a></p> <br>
 <p style="display: inline">Or Go To </p> <a href="mainPage.php"> Main Page</a>
				</div>
			</div>
		</div>
	</div>

</body>
</html>