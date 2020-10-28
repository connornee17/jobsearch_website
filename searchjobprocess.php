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

  <h2>Search Job</h2>

  <br>
  <br>
  
  <article>
    <?php
      $filename = "/home/students/accounts/s102061410/cos30020/www/data/jobposts/jobs.txt"; 

      if (isset($_GET["jobtitle"])) {
        $jobtitle = $_GET["jobtitle"];
      }
      if (empty($jobtitle)) {
        $jobtitle = "P";
      }
      if (isset($_GET["position"])) {
        $position = $_GET["position"];
      } else {
        $position = "P";
      }
      if (isset($_GET["contract"])) {
        $contract =  $_GET["contract"];
      } else {
        $contract = "P";
      }
      if (isset($_GET["location"])) {
        $location = $_GET["location"];
      } else {
        $location = "P";
      }
      if ((isset ($_GET["post"])) && (isset ($_GET["mail"]))) {
        $post = $_GET["post"];
        $mail = $_GET["mail"];
        $application = $post." and ".$mail;
      } else if ((isset ($_GET["post"])) && (!isset ($_GET["mail"]))) {
        $post = $_GET["post"];
        $application = $post;
      } else if ((!isset ($_GET["post"])) && (isset ($_GET["mail"]))) {
        $mail = $_GET["mail"];
        $application = $mail;
      } else {
        $application = "P";
      }

      umask(0007);
      $dir = "/home/students/accounts/s102061410/cos30020/www/data/jobposts";
      if (!file_exists($dir)) {
        mkdir($dir, 02770);
      }

      if (file_exists($filename)) {
          $handle = fopen($filename, "r") or die ("File not found"); 
          while (! feof ($handle)) {
            $onedata = fgets($handle); 
            if ($onedata != "") {
              $data = explode("\t", $onedata);
              if(stristr($onedata, $jobtitle) && stristr($onedata, $position) && stristr($onedata, $contract) && stristr($onedata, $application) && stristr($onedata, $location)) {
                $alldata [] = $data; 
              }
            } 
          }
          fclose ($handle);
      


      
        $today = mktime(0,0,0,date("m"),date("d"),date("Y"));
        $currentdate = date("Y-m-d", $today);
      
        

        
        if (!empty($alldata)) {
          foreach ($alldata as $data) {
            $myarray = $data[3]. ",". $data[0]. ",". $data[1]. ",". $data[2]. ",". $data[4]. ",". $data[5]. ",". $data[6]. ",". $data[7];
            $mydata = explode(",", $myarray);
            $myalldata [] = $mydata;
          }
          rsort($myalldata);

          echo "<table>";
          echo "<tr><th>Position ID</th><th>Job Title</th><th>Description</th><th>Closing Date</th><th>Position</th><th>Contract</th><th>Application</th><th>Location</th></tr>";

          foreach ($myalldata as $data) { 
            if ($data[0] >= $currentdate) {
            echo "<tr><td>", $data[1], "</td><td>", $data[2], "</td><td>", $data[3],"</td><td>", $data[0],"</td><td>", $data[4], "</td><td>", $data[5],"</td><td>", $data[6],"</td><td>", $data[7],"</td></tr>";
            }
          }
          echo "</table>";
        } else {
          echo "<p>No results found from search</p>";
        }
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