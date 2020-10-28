<!DOCTYPE html> 
<html lang="en"> 
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" /> 
	<meta name="description" content="Web Programming :: Assignment 1" />
	<meta name="keywords" content="Web,programming" />
	<meta name="author" content="Connor Nee-Salvador"/>
	<link href= "style.css" rel="stylesheet"/>
	<title>Job Vacancy Posting System</title>
</head>
<body>

	<h1>Job Vacancy Posting System</h1> 
	
	<nav>
		<ul>
		<li><a href="index.php">Home</a></li>
		<li><a href="postjobform.php">Post Job</a></li>
		<li><a href="searchjobform.php">Search Job</a></li>
		<li><a href="about.php">About</a></li>
		</ul>		
	</nav>

	<h2>Post Job</h2>

	<br>
	<br>

	<article>
		<?php
		
			if (isset ($_POST["positionid"]) && isset ($_POST["jobtitle"]) && isset ($_POST["description"]) && isset ($_POST["closingdate"]) && isset ($_POST["position"]) && isset ($_POST["contract"]) && (isset ($_POST["post"]) || isset ($_POST["mail"])) && isset ($_POST["location"])) {
				$positionid = $_POST["positionid"];
				$jobtitle = $_POST["jobtitle"];
				$description = $_POST["description"];
				$closingdate = $_POST["closingdate"];
				$position = $_POST["position"];
				$contract = $_POST["contract"];

				if ((isset ($_POST["post"])) && (isset ($_POST["mail"]))) {
					$post = $_POST["post"];
					$mail = $_POST["mail"];
					$application = $post." and ".$mail;
				} else if ((isset ($_POST["post"])) && (!isset ($_POST["mail"]))) {
					$post = $_POST["post"];
					$application = $post;
				} else {
					$mail = $_POST["mail"];
					$application = $mail;
				}

				$location = $_POST["location"];
				

				umask(0007);
				$dir = "/home/students/accounts/s102061410/cos30020/www/data/jobposts";
				if (!file_exists($dir)) {
					mkdir($dir, 02770);
				}


				$filename = "/home/students/accounts/s102061410/cos30020/www/data/jobposts/jobs.txt"; 
				$handle = fopen($filename, "a") or die ("File not found");
				$line = file("/home/students/accounts/s102061410/cos30020/www/data/jobposts/jobs.txt");
				$check = implode($line);

	    		$today = mktime(0,0,0,date("m"),date("d"),date("Y"));
	    		$currentdate = date("Y-m-d", $today);

	    		if (file_exists($filename)) {

					if (preg_match("/^[P][0-9][0-9][0-9][0-9]{0,5}$/", $positionid)) {
						if(!stristr($check, $positionid)) {
							if (preg_match("/^[a-zA-Z0-9,.!? ]{2,20}$/", $jobtitle)) {
								if (preg_match("/^[a-zA-Z0-9,.!? ]{1,260}$/", $description)) {
									if (preg_match("/^[0-9]{4}-[0-1][0-9]-[0-3][0-9]$/", $closingdate)) {
										if ($closingdate > $currentdate) {
										$data = $positionid. "\t". $jobtitle. "\t". $description."\t". $closingdate. "\t". $position. "\t". $contract. "\t". $application. "\t". $location. "\t". "\n";
										fwrite($handle, $data); 
										fclose($handle);

										echo "<p>New job has been successfuly posted!</p>";

										} else {
											echo "<p>The closing date cannot be today or earlier than today</p>";
										}
									} else {
										echo "<p>Date format is incorrect<p>";
									}
								} else {
									echo "<p>Please enter a VALID description (must be less than 260 characters)</p>";
								}
							} else {
								echo "<p>Please enter a VALID job title (must be less than 20 characters)</p>";
							}
						} else {
							echo "<p>Please enter a UNIQUE postion ID</p>";
						}
					} else {
						echo "<p>Please enter a VALID postion ID</p>";
					}
				}

			} else {
				echo "<p>Please be sure to fill out the ENTIRE form</p>";
			}

		?>

		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>

		<footer>
			<p>COS30020</p>
			<p>&#169; Swinburne University of Technology</p>
			<p>Assignment 1</p>
		</footer>
	</article>

</body>
</html>