<?php
session_start();
if ($_SESSION["loggedin"]) {
	include '../php/db.php';

	$email = $_SESSION["email"];

	$conn = new mysqli($servername, $username, $password, $dbname);

	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}

	$sql = "SELECT * FROM customer WHERE C_email='$email'";
	$sq = "SELECT * FROM booking WHERE C_email='$email'";

	$result = $conn->query($sql);
	$res = $conn->query($sq);
	$row = $result->fetch_assoc();
	if ($row) {
?>

		<!DOCTYPE html>
		<html lang='en'>

		<head>
			<meta charset='UTF-8'>
			<meta name='viewport' content='width=device-width, initial-scale=1.0'>

			<!-- Boxicons -->
			<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
			<!-- My CSS -->
			<link href='../CSS/dash.css' rel='stylesheet'>
			<link rel='icon' type='image/x-icon' href='../img/fav.png'>

			<title>TwiGo Dashboard</title>
		</head>

		<body>
			<style>
				* {
					color: #000;
				}

				input[type=submit] {
					background-color: #ee0000;
					color: white;
					padding: 16px 20px;
					margin: 8px 0;
					border: none;
					cursor: pointer;
					width: 80%;
					display: inline-block;
					opacity: 0.9;
					border-radius: 30px;
				}


				/* #sidebar .side-menu.top li.active a {
					color: red;
				} */
			</style>
			<!-- SIDEBAR -->

			<section id='sidebar'>
				<a href='#' class='brand'>
					<span class='text' id='twi' style='color: #000;'>Twi<span style='color: red;'>Go</span></span>
				</a>
				<ul class='side-menu top'>
					<li>
						<a href='dash.php'>
							<i class='bx bxs-dashboard'></i>
							<span class='text'>HOME</span>
						</a>
					</li>
					<li class='active'>
						<a href='booking.php'>
							<i class='bx bxs-shopping-bag-alt' style="color: #ee0000;"></i>
							<span class='text' style="color: #ee0000;">BOOKINGS</span>
						</a>
					</li>

					<li>
						<a href='rate.php'>

							<i class='bx bx-rupee'></i>
							<span class='text'>RATES</span>
						</a>
					</li>

					<li>
						<a href='history.php'>
							<i class='bx bxs-doughnut-chart'></i>
							<span class='text'>HISTORY</span>
						</a>
					</li>
					<li>
						<a href='profiledash.php'>
							<i class='bx bxs-message-dots'></i>
							<span class='text'>MY PROFILE</span>
						</a>
					</li>

				</ul>
				<ul class='side-menu'>
					<li>
						<a href='helpdash.php'>
							<i class='bx bxs-cog'></i>
							<span class='text'>HELP CENTER</span>
						</a>
					</li>
					<li>
						<a href='logout.php' class='logout'>
							<i class='bx bxs-log-out-circle' style="color: #ee0000;"></i>
							<span class='text' style="color: #ee0000;">Logout</span>
						</a>
					</li>
				</ul>
			</section>
			<section id='content'>
				<nav>
					<i class='bx bx-menu'></i>
					<a href='#' class='nav-link'>Categories</a>
					<form action='#'>
						<div class='form-input'>
							<input type='search' placeholder='Search...'>
							<button type='submit' class='search-btn'><i class='bx bx-search'></i></button>
						</div>
					</form>
					<a href='profiledash.php' class='profile' id='prop'>
						<img src='../img/undraw_male_avatar_323b.svg'>

					</a>
				</nav>

				<main>
					<div class='head-title'>
						<div class='left'>
							<h1><?php echo $row["C_name"]; ?></h1>

						</div>
						<a href='#' class='btn-download'>
							<i class='bx bxs-cloud-download'></i>
							<span class='text'>Download PDF</span>
						</a>
					</div>
					<div class='table-data'>
						<div class='order' id="booking">
							<div class='head'>
								<h3>Recent Orders</h3>
								<i class='bx bx-search'></i>
								<i class='bx bx-filter'></i>
							</div>
							<table>
								<thead>
									<tr>
										<th>Booking ID</th>
										<th>Vehicle Name</th>
										<th>Vehicle ID</th>
										<th>Booking Date</th>
										<th>Payment status</th>
										<th></th>
									</tr>
								</thead>
								<tbody>
									<?php while ($r = $res->fetch_assoc()) { ?>
										<tr>
											<td><?php echo $r["B_id"] ?></td>
											<?php
											$s = "SELECT * FROM vehicle WHERE V_id='$r[V_id]'";
											$ro = $conn->query($s);
											$po = $ro->fetch_assoc()
											?>
											<td><?php echo $po["V_name"] ?></td>
											<td>
												<p><?php echo $r["V_id"] ?></p>
											</td>
											<td><?php echo $r["B_date"] ?></td>
											<?php
											$pay = $r["B_img_pay"];
											
											if ($pay != "") {
												$pstat = "pending";
												$wr = "completed";
											} else {
												$pstat = "completed";
												$wr = "pending";
											} ?>
											<td><span class='status <?php echo $pstat ?>'><?php echo $wr ?></span></td>
											<td>
												<form action="" method="POST">
												<input type='submit' name='val' value='Cancel booking' id='btn' class='button' >
												<?php $po  = $_SESSION["V_id"]?>
												</form>
												
												
											</td>
										</tr>
									<?php } ?>
									<script src='../JS/dash.js'></script>
		</body>

		</html>
<?php }
} else {
	header("location: ../html/customerlog.html");
} ?>