<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['clientmsuid']==0)) {
  header('location:logout.php');
  } else{
	if(isset($_POST['submit']))
	{
		$visitorName =$_POST['visitorName']; 
		$visitorIC = $_POST['visitorIC'];
		$visitorPhone = $_POST['visitorPhone'];
		$visitorDate = $_POST['visitorDate'];	
		$visitLocation = $_POST['visitLocation'];
		$walkinTime = $_POST['walkinTime'];
		$visitMethod = $_POST['visitMethod'];
		$visitRemark = $_POST['visitRemark'];
		$visitStatus= $_POST['visitStatus'];

		$sql = "insert into tblvisitor(visitorName,visitorIC,visitorPhone,visitorDate,visitLocation,walkinTime,visitMethod,visitRemark,visitStatus )values
		(:visitorName,:visitorIC,:visitorPhone,:visitorDate,:visitLocation,:walkinTime,:visitMethod,:visitRemark,:visitStatus)";
		   $query = $dbh -> prepare($sql);
$query->bindParam(':visitorName',$visitorName,PDO::PARAM_STR);
$query->bindParam(':visitorIC',$visitorIC,PDO::PARAM_STR);
$query->bindParam(':visitorPhone',$visitorPhone,PDO::PARAM_STR);
$query->bindParam(':visitorDate',$visitorDate,PDO::PARAM_STR);
$query->bindParam(':visitLocation',$visitLocation,PDO::PARAM_STR);
$query->bindParam(':walkinTime',$walkinTime,PDO::PARAM_STR);
$query->bindParam(':visitMethod',$visitMethod,PDO::PARAM_STR);
$query->bindParam(':visitRemark',$visitRemark,PDO::PARAM_STR);
$query->bindParam(':visitStatus',$visitStatus,PDO::PARAM_STR);
		   $query->execute();
		   $LastInsertId=$dbh->lastInsertId();
   if ($LastInsertId>0) {
    echo '<script>alert("Visitor has been added.")</script>';
echo "<script>window.location.href ='add-visitor.php'</script>";
  }
  else
    {
         echo '<script>alert("Something Went Wrong. Please try again")</script>';
    }
		
	}
	
  	?>

<!DOCTYPE HTML>
<html>
<head>
	<title>Client Management Sysytem || Add Visitor </title>
	<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
	<!-- Bootstrap Core CSS -->
	<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
	<!-- Custom CSS -->
	<link href="css/style.css" rel='stylesheet' type='text/css' />
	<!-- Graph CSS -->
	<link href="css/font-awesome.css" rel="stylesheet"> 
	<!-- jQuery -->
	<link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet' type='text/css'>
	<!-- lined-icons -->
	<link rel="stylesheet" href="css/icon-font.min.css" type='text/css' />
	<!-- /js -->
	<script src="js/jquery-1.10.2.min.js"></script>
	<!-- //js-->
</head> 
<body>
	<div class="page-container">
		<!--/content-inner-->
		<div class="left-content">
			<div class="inner-content">
				<!-- header-starts -->
				<?php include_once('includes/header.php');?>
				<!-- //header-ends -->
				<!--outter-wp-->
				<div class="outter-wp">
					<!--sub-heard-part-->
					<div class="sub-heard-part">
						<ol class="breadcrumb m-b-0">
							<li><a href="dashboard.php">Home</a></li>
							<li class="active"><a href="customer-module.php">Customer Module</a></li>
							<li class="active">Add Visitor Profile</li>
						</ol>
					</div>
					<!--//sub-heard-part-->
					<div class="forms-main">
<div class="graph-form">
<div class="form-body">
<form method="post" action="">
<div class="row"> 
<div class="form-group col-xs-3"><label>Name: </label> <input type="text" name="visitorName" class="form-control" placeholder="Enter Name" required /></div>
<div class="form-group col-xs-3"> <label>IC: </label> <input type="text" name="visitorIC" class="form-control" placeholder="Enter IC" required /></div>
<div class="form-group col-xs-3"> <label>Phone Number:</label><input type="text" name="visitorPhone" class="form-control" placeholder="Enter Phone Number" required /></div>
</div>
<br>
<div class="row"> 
<div class="form-group col-xs-3"><label>Date Visited: </label><input type="text" name="visitorDate" class="form-control" value="<?php echo  "" . date("Y/m/d") . "";?>"readonly></div>
<div class="form-group col-xs-3"><label>Visit Location: </label><input type="text" name="visitLocation" class="form-control" placeholder="Enter Visit Location" required /></div>
<div class="form-group col-xs-3"><label>Walk-In Time: </label><input type="text" name="walkinTime" class="form-control" value="<?php date_default_timezone_set("Asia/Kuala_Lumpur"); echo "" . date("h:i:sa");?>"></div>
</div>
<br>
<div class="row"> 
<div class="form-group col-xs-3"><label>Visit Method: </label><input type="text" name="visitMethod" class="form-control" placeholder ="Enter Visit Method" required /></div>
<div class="form-group col-xs-3"><label>Remarks: </label><input type="text" name="visitRemark" class="form-control" placeholder ="Enter Remarks" required /></div>
<div class="form-group col-xs-3"><label>Status: </label>
<select style="height:50px" name="visitStatus"  class="form-control" value="<?php  echo $row->visitStatus;?>">
		<option value="Visiting">Visiting</option>
</select></div>
</div>  
<br>                             
<button type="button" class="btn btn-default" value="Go back!" onclick="history.back()">Back</button>
<button type="submit" input name="submit" class="btn btn-default">Add</button>
								

								</form>

							</div>

						</div>
				
					</div>
					<!--//graph-visual-->
				</div>
				<!--//outer-wp-->
				<?php include_once('includes/footer.php');?>
			</div>
		</div>
		<!--//content-inner-->
		<!--/sidebar-menu-->
		<?php include_once('includes/sidebar.php');?>
		<div class="clearfix"></div>		
	</div>
	<script>
		var toggle = true;

		$(".sidebar-icon").click(function() {                
			if (toggle)
			{
				$(".page-container").addClass("sidebar-collapsed").removeClass("sidebar-collapsed-back");
				$("#menu span").css({"position":"absolute"});
			}
			else
			{
				$(".page-container").removeClass("sidebar-collapsed").addClass("sidebar-collapsed-back");
				setTimeout(function() {
					$("#menu span").css({"position":"relative"});
				}, 400);
			}

			toggle = !toggle;
		});
	</script>
	<!--js -->
	<script src="js/jquery.nicescroll.js"></script>
	<script src="js/scripts.js"></script>
	<!-- Bootstrap Core JavaScript -->
	<script src="js/bootstrap.min.js"></script>
	<script>
function CallPrint(strid) {
var prtContent = document.getElementById("exampl");
var WinPrint = window.open('', '', 'left=0,top=0,width=800,height=900,toolbar=0,scrollbars=0,status=0');
WinPrint.document.write(prtContent.innerHTML);
WinPrint.document.close();
WinPrint.focus();
WinPrint.print();
WinPrint.close();
}
</script>
</body>
</html>
<?php }  ?>