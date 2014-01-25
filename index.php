<!DOCTYPE HTML>
<!--
	Minimaxing 3.1 by HTML5 UP
	html5up.net | @n33co
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
<?php
include ("supports/connect.php");
?>
	<head>
	<!--Load the AJAX API-->
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
     <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
	 
      function drawChart() {
		   var jsonData =$.ajax({
          url: "goo2.php",
          dataType:"json",
          async: false
          }).responseText;

		   
		  console.log(jsonData); 
             
        var data = new google.visualization.DataTable(JSON.parse(jsonData));
		var options = {'title':'Flooded Areas - Obando, Bulacan',
                       color: ['#088A08']};

		var chart = new google.visualization.BarChart(document.getElementById('chart_div'));
        chart.draw(data,options);
      }
    </script>
		<title>Flood Monitoring System</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
		<link href="http://fonts.googleapis.com/css?family=Ubuntu+Condensed" rel="stylesheet">
		<script src="js/jquery.min.js"></script>
		<script src="js/config.js"></script>
		<script src="js/skel.min.js"></script>
		<script src="js/skel-panels.min.js"></script>
		<noscript>
			<link rel="stylesheet" href="css/skel-noscript.css" />
			<link rel="stylesheet" href="css/style.css" />
			<link rel="stylesheet" href="css/mobile.css" />
			<link rel="stylesheet" href="css/style-1000px.css" />
		</noscript>
		<!--[if lte IE 9]><link rel="stylesheet" href="css/ie9.css" /><![endif]-->
		<!--[if lte IE 8]><script src="js/html5shiv.js"></script><![endif]-->
	</head>
	<body>
	<!-- ********************************************************* -->
		<div id="header-wrapper">
			<div class="container">
				<div class="row">
					<div class="12u">
						
						<header id="header">
							<h1><a href="#" id="logo">Flood Monitoring System</a></h1>
							<nav id="nav">
							<?php include ("supports/menu.php"); ?>
								
							</nav>
						</header>
					
					</div>
				</div>
			</div>
		</div>
		<div id="banner-wrapper">
			<div class="container">
				<div class="row">
					<div class="12u">
					
						<div id="banner">
							
						</div>
				
					</div>
				</div>
			</div>
		</div>
		<div id="main">
			<div class="container">
				<div class="row main-row">
					<div class="4u">
						
						<section>
						<?php
							$sql="Select home_id,title,subtitle,content,h_img from home";
                	$res=mysql_query($sql);
						$strData="";                         
                         while($row=mysql_fetch_array($res)){			             	 
                			$strData.="<h2>".$row['title']."</h2>";
                			$strData.="<div class='content_box_inner'>";
							$strData.="<div class='image_wrapper image_fl'>";
							$strData.="<img src='images/".$row['h_img'].".jpg' alt='image' width='200px' height='200px' />";
							$strData.="<p><em>".$row['subtitle']."</em></p>";
							$strData.="<p align='justify'>".substr($row['content'],0,100)." . . . </p></div>";
														
							$strData.="<div class='cleaner'></div>";	
							$strData.=" </div>";										
                		}
                			echo $strData;                		       
          		 ?> 
				 <footer class="controls">
								<a href="announcement.php" class="button">Continue Reading</a>
								
								
											
							</footer>
						</section>
					<div class="cleaner"></div>
					</div>
					<div class="4u">
						
						<section>
							<div id="chart_div" ></div>
	
						</section>
					
				<div class="row main-row">
					<div class="4u">
					
						<section><h2>Reports</h2>
						
							<?php
		  	$sqlt="select * from testimonials ORDER BY testi_id DESC limit 5";
			$rest=mysql_query($sqlt);
				$strSide="<div class='sidebar_content'>";
				while($rowt=mysql_fetch_array($rest)){
					$strSide.="<blockquote>";
					$strSide.="<p>".$rowt['testi']."</p>";
					$strSide.="<a href='images/".$rowt['report_img'].".jpg'/><h4>Click to see image.</h4></a><br/>";
					$strSide.="<cite>".$rowt['name']."</cite>";
					$strSide.="<p class='date'>".$rowt['date']."</p>";
					$strSide.="<p></p>";
					$strSide.="</blockquote>";
				}
					$strSide.="</div>";
					echo $strSide;
		  ?>
							

</form>
                         <br />
			 
						 
                    
                            
                    </form>
					</div>

					</div>
					<div class="6u">
					
						<article class="blog-post">
							<h2>Latest News</h2>
							<?php
						$sqln="select * from news order by title limit 1";
						$resn=mysql_query($sqln);
							$strN="";
							while($rown=mysql_fetch_array($resn)){
								$strN.="<div class='image_wrapper'><img src='images/".$rown['news_img'].".jpg' alt='image' width='450px' height='250px'' alt='image' /></div>";
								$strN.="<p align='justify'>".substr($rown['content'],0,100)." . . . </p>";
								$strN.="<div class='cleaner'></div>";																
							}
							echo $strN;
					?>     
							<footer class="controls">
								<a href="news.php" class="button">Continue Reading</a>
								
								
											
							</footer>
						</article>
					<div class="cleaner"></div>
					</div>
					<div class="6u">
					
						<article class="blog-post">
							<h2>About Us</h2>
							<?php
						$sqlb="select * from aboutus order by about_id limit 1";
						$resb=mysql_query($sqlb);
							$strB="";
							while($rowb=mysql_fetch_array($resb)){
								$strB.="<div class='image_wrapper'><img src='images/".$rowb['about_img'].".jpg' alt='image' width='450px' height='250px'' alt='image' /></div>";
								$strB.="<p align='justify'>".substr($rowb['content'],0,100)." . . . </p>";
								$strB.="<div class='cleaner'></div>";								
							}
							echo $strB;
?>							
							<footer class="controls">
								<a href="news.php" class="button">Continue Reading</a>
								
								
											
							</footer>
							
						</article>

					</div>
					
					
					
				</div>
			</div>
		</div>
		<div id="footer-wrapper">
			<div class="container">
				<div class="row">
					
				
					<div class="12u">

						<div id="copyright">
							 Copyright &copy; 2014 | Flood Monitoring System - Obando, Bulacan | Developer: <a href="http://www.facebook.com/wagkamakulet">Dave Dallo</a>
						</div>

					</div>
				</div>
			</div>
		</div>
	<!-- ********************************************************* -->
	</body>
</html>
