<?php
session_start();
if ($_SESSION["remail"]) {
	include '../php/db.php';

	$remail = $_SESSION["remail"];

	$conn = new mysqli($servername, $username, $password, $dbname);

	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}

	$sql = "SELECT * FROM renter WHERE R_email='$remail'";
	$result = $conn->query($sql);
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

			<title>TwiGo Help Centre</title>
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

				
				#sidebar .side-menu.top li.active a {
	color: red;	
}
			
			</style>
			<!-- SIDEBAR -->
			
			<section id='sidebar'>
				<a href='#' class='brand'>
					<span class='text' id='twi' style='color: #000;'>Twi<span style='color: red;'>Go</span></span>
				</a>
				<ul class='side-menu top'>
					<li>
						<a href='renterdash.php'>
							<i class='bx bxs-dashboard'></i>
							<span class='text'>MY VEHICLES</span>
						</a>
					</li>
					<li>
						<a href=''>
							<i class='bx bxs-shopping-bag-alt'></i>
							<span class='text'>BOOKING DETAILS</span>
						</a>
					</li>
					<li>
						<a href=''>
							<i class='bx bxs-doughnut-chart'></i>
							<span class='text'>HISTORY</span>
						</a>
					</li>
					<li>
						<a href='renterprofiledash.php'>
							<i class='bx bxs-message-dots'></i>
							<span class='text'>MY PROFILE</span>
						</a>
					</li>

				</ul>
				<ul class='side-menu'>
					<li class='active'>
						<a href='rhelpcenter.php'>
							<i class='bx bxs-cog'></i>
							<span class='text'>HELP CENTER</span>
						</a>
					</li>
					<li>
						<a href='logout.php' class='logout'>
							<i class='bx bxs-log-out-circle'style="color: #ee0000;"></i>
							<span class='text'style="color: #ee0000;">Logout</span>
						</a>
					</li>
				</ul>
			</section>
			<!-- SIDEBAR -->

			<!-- CONTENT -->
			<section id='content'>
				<!-- NAVBAR -->
				<nav>
					<i class='bx bx-menu'></i>
					<a href='#' class='nav-link'>Categories</a>
					<form action='#'>
						<div class='form-input'>
							<input type='search' placeholder='Search...'>
							<button type='submit' class='search-btn'><i class='bx bx-search'></i></button>
						</div>
					</form>
					<!-- <input type='checkbox' id='switch-mode' hidden> -->
					<!-- <label for='switch-mode' class='switch-mode'></label> -->
					<a href='renterprofiledash.php' class='profile' id='prop'>
						<!-- <script>
					document.body.classList.add('dark');
				</script> -->
						<img src='../img/undraw_male_avatar_323b.svg'>

					</a>
				</nav>
				<!-- NAVBAR -->

				<!-- MAIN -->
				<main>
					<div class='head-title'>
						<div class='left'>
							<h1><?php echo $row["R_name"]; ?></h1>

						</div>
						
					</div>
					<div class="table-data">
				<div class="order">
					<div class="head">
						<h3><span style="color: #ee0000;">SORRY!</span> FOR INCONVENIENCE -- REACH OUT VIA </h3>
						<!-- <i class='bx bx-search' ></i>
						<i class='bx bx-filter' ></i> -->
					</div>
					<table>
						<thead>
							<tr>
								<th>CITY NAME</th>
								<th>CUSTOMER HELPLINE NUMBER</th>
								<th>EMAIL</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>
									<p>KOLKATA</p>
								</td>
								<td>1800 900546</td>
								<td>twigo247@gmail.com</td>


							</tr>
							<tr>
								<td>
									<p>MUMBAI</p>
								<td>1800 900548</td>
								<td>twigo247@gmail.com</td>
								</td>
							</tr>
							<tr>
								<td>
									<p>DELHI</p>
								<td>1800 900547</td>
								<td>twigo247@gmail.com</td>
								</td>
							</tr>
							<!-- <tr>
								<td>
									<img src="img/people.png">
									<p>John Doe</p>
								</td>
								<td>01-10-2021</td>
								<td><span class="status pending">Pending</span></td>
							</tr>
							<tr>
								<td>
									<img src="img/people.png">
									<p>John Doe</p>
								</td>
								<td>01-10-2021</td>
								<td><span class="status process">Process</span></td>
							</tr>
							<tr>
								<td>
									<img src="img/people.png">
									<p>John Doe</p>
								</td>
								<td>01-10-2021</td>
								<td><span class="status pending">Pending</span></td>
							</tr>
							<tr>
								<td>
									<img src="img/people.png">
									<p>John Doe</p>
								</td>
								<td>01-10-2021</td>
								<td><span class="status completed">Completed</span></td>
							</tr> -->
						</tbody>
					</table>
				</div>
				<!-- <div class="todo">
					<div class="head">
						<h3>Todos</h3>
						<i class='bx bx-plus' ></i>
						<i class='bx bx-filter' ></i>
					</div>
					<ul class="todo-list">
						<li class="completed">
							<p>Todo List</p>
							<i class='bx bx-dots-vertical-rounded' ></i>
						</li>
						<li class="completed">
							<p>Todo List</p>
							<i class='bx bx-dots-vertical-rounded' ></i>
						</li>
						<li class="not-completed">
							<p>Todo List</p>
							<i class='bx bx-dots-vertical-rounded' ></i>
						</li>
						<li class="completed">
							<p>Todo List</p>
							<i class='bx bx-dots-vertical-rounded' ></i>
						</li>
						<li class="not-completed">
							<p>Todo List</p>
							<i class='bx bx-dots-vertical-rounded' ></i>
						</li>
					</ul>
				</div> -->
			</div>
			<script src='../JS/dash.js'></script>
		</body>

		</html>
<?php }
} else {
	header("location: ../html/customerlog.html");
} ?>