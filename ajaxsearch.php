	<?php

		include('include/config.php');

		if ((isset($_GET['city'])) && (!empty($_GET['city'])) && (isset($_GET['blood_group'])) && (!empty($_GET['blood_group'])) )
		{
			$city = $_GET['city'];
			$blood_group = $_GET['blood_group'];

			$sql = "SELECT * from blooddonation WHERE (City='$city' OR Blood_Group='$blood_group')";

			$result = mysqli_query($connection,$sql);

			if(mysqli_num_rows($result)>0)
			{
				while($row = mysqli_fetch_assoc($result))
				{
					if($row['save_life_date']=='0')
					{
						echo '<div class="col-md-3 col-sm-12 col-lg-3 donors_data">
						<span class="name">'.$row['Name'] .'</span>
						<span>'.$row['City'] .'</span>
						<span>'.$row['Blood_Group'] .'</span>
						<span>'.$row['Gender'] .'</span>
						<span>'.$row['Email'] .'</span>
						<span>'.$row['Contact_no'] .'</span>
						</div>';
					}
					else
					{
						echo '<div class="col-md-3 col-sm-12 col-lg-3 donors_data">
						<span class="name">'.$row['Name'] .'</span>
						<span>'.$row['City'] .'</span>
						<span>'.$row['Blood_Group'] .'</span>
						<span>'.$row['Gender'] .'</span>
						<h4 class="name text-center">Donated</h4>
						</div>';
					}
				}
			}
			else
			{
				echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
				<strong>Data not found</strong>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
		  		</div>';
			}

		}

	?>