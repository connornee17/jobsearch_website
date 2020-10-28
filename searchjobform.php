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

    <form action="searchjobprocess.php" method="get">
      <p>Title:<input type="text" name="jobtitle"></p>
      <p>Postion:</p><label>Full Time</label><input type="radio" name="position" value="fulltime"/>
                 <label>Part Time</label> <input type="radio" name="position" value="parttime"/>
      <p>Contract:</p><label>On-going</label><input type="radio" name="contract" value="ongoing"/>
                  <label>Fixed Term</label> <input type="radio" name="contract" value="fixedterm"/>
      <p>Application by:</p><label>Post</label> <input type="checkbox" name="post" value="post" />
                        <label>Mail</label> <input type="checkbox" name="mail" value="mail" />
      <p>Location:<select name="location">
                    <option value="" disabled selected>---</option>
                    <option value="VIC">VIC</option>      
                    <option value="TAS">TAS</option>
                    <option value="NSW">NSW</option>
                    <option value="QLD">QLD</option>
                    <option value="WA">WA</option>
                    <option value="SA">SA</option>
                    <option value="NT">NT</option>
                  </select></p>
      <input type= "submit" value="ENTER"/>
      <input type= "reset" value="RESET" />
    </form>

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