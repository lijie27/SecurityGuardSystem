<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['clientmsuid']==0)) {
  header('location:logout.php');
  } else{
  	?>

<!DOCTYPE HTML>
<html>
<head>
	<title>Client Management Sysytem || Service Control </title>
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
							<li class="active">Services Control</li>
						</ol>
					</div>
					<!--//sub-heard-part-->
					<div class="graph-visual tables-main">
						<div class="graph">
						
							<div class="tables">
								<table class="table" border="1"> <thead> 
                                    <th>No.</th> 
									<th>Photo</th>
									<th>Name</th>
									<th>StaffID</th>
									<th>Start Date</th> 
									<th>End Date</th>
									<th>Contact Number</th>
									<th>Health Checkup</th> 
									<th>Status</th>
									<th>Permission</th>
									<th>Assigned</th>
									<th>View Profile</th>

									</tr>
									
									</thead>
									<tbody>
									<?php
									
									
									$sql="select tblclient.ContactName,tblclient.CompanyName,tblinvoice.BillingId,tblinvoice.PostingDate,tblclient.Cellphnumber,tblclient.client_id, tblinvoice.EndDate, tblclient.Photo from  tblclient   
									join tblinvoice on tblclient.ID=tblinvoice.Userid  where tblinvoice.Userid";
								$query = $dbh -> prepare($sql);
								
								$query->execute();
								$results=$query->fetchAll(PDO::FETCH_OBJ);
								
								$cnt=1;
								if($query->rowCount() > 0)
								{
								foreach($results as $row)
								{               ?>
																		 <tr class="active">
																		  <th scope="row"><?php echo htmlentities($cnt);?></th>
																		   <td><img src="<?php echo ($row->Photo);?>" width="100" height="100"></td>
																		   <td><?php  echo htmlentities($row->ContactName);?></td>
																			<td><?php  echo htmlentities($row->client_id);?></td>
																			 <td><?php  echo htmlentities($row->PostingDate);?></td> 
																			 <td><?php  echo htmlentities($row->EndDate);?></td> 
																			 <td><?php  echo htmlentities($row->Cellphnumber);?></td> 
																			 <td>Yes</td>
																			 <td>Active</td> 
																			 <td>No</td> 
																			 <td>Assigned</td>  
																			 
																			<td><a href="view-employee.php?invoiceid=<?php  echo $row->BillingId;?>">View</a></td>
									     </tr>
									     <?php $cnt=$cnt+1;}} ?>
									     </tbody> </table> 
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
</body>
</html>
<?php }  ?>