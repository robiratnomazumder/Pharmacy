	<!-- gallery -->
	<div class="gallery">
		<div class="container">
			<h3>Pharmacy Name</h3> 
			<div class="row gallery-info">			
				<div class="col-sm-4 col-md-4 gallery-grids ">
					<div class="thumbnail moments-bottom">
						<a href="images/img7.jpg" title="">
							<img src="images/img7.jpg" class="img-responsive zoom-img " alt="">				
						</a>						
					</div>

			    <div class="col-container">
                <div class="col">		
                <?php 
				  $jsn = json_decode(fetchNotice1());
				  ?>
				</div> </div>
                <?php

				  function fetchNotice1(){
				    $conn = new mysqli("localhost", "root", "", "pharmacy");
				    if($conn->connect_error)die("Database connection failed" . $conn->connect_error);
				    
				    foreach($conn->query('SELECT * from location') as $row){
				    echo "<div style='font-size:18px;'>";
		            echo "<div style='margin-left:15px;'> Pharmacy Name: ".$row['name']."</div>";
		            echo "<div style='margin-left:15px;'> Pharmacy Address: ".$row['address']."</div>";
		            echo "<div style='margin-left:15px;'> Pharmacy Id: ".$row['pharmacy_id']."</div>";
		            echo "<div style='color:#7343db;margin-left:20px;'> Latituade: ".$row['lat']."</div>";
		            echo "<div style='color:#7343db;margin-left:20px;'> Longitude: ".$row['lat']."</div>";  	 echo "<br></div>";		     			  			       
                     }
                      echo "<br>";
                 }?> 




				</div>
				<div class="col-sm-4 col-md-4 gallery-grids">
					<div class="thumbnail moments-bottom">
						<a href="images/img9.jpg" title="" class="moments-bottom">
							<img src="images/img9.jpg" class="img-responsive zoom-img " alt="">				
						</a>						
					</div>
				
		
				<div class="clearfix"> </div>
			</div>			
		</div>
	</div>
	<!-- //gallery -->