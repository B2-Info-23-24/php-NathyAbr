<?php 


include("config/config.php");

if(isset($_POST['book_property'])){
	
$property_id=$_GET['property_id'];
  
$sql="SELECT * FROM user where email='$u_email'";
    $query=mysqli_query($db,$sql);

    if(mysqli_num_rows($query)>0)
    {
      while ($rows=mysqli_fetch_assoc($query)) {
      	$users_id=$rows['user_id'];


      	$sql1="UPDATE add_property SET booked='Yes' WHERE property_id='$property_id'";
      	$query1=mysqli_query($db,$sql1);

      	$sql2="INSERT INTO booking(property_id,user_id) VALUES ('$property_id','$user_id')";
      	$query2=mysqli_query($db,$sql2);}

		?>
    <script>
	window.setTimeout(function() {
    $(".alert").fadeTo(1000, 0).slideUp(500, function(){
        $(this).remove(); 
    });
}, 2000);
</script>
<div class="container">
<div class="alert" role='alert'>
  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
  <center><strong>Thank you for booking.</strong></center>
</div></div>



		<?php

		}

      }
?>