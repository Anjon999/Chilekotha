<?php
      include 'connection.php';
if(isset($_POST['submit'])){
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$message = $_POST['message'];

 
 
 $query = "INSERT INTO comment
                (name,email,phone,message)
                VALUES ('".$name."','".$email."','".$phone."','".$message."')";
                mysqli_query($db,$query)or die ('Error in updating Database');
?>
<script type="text/javascript">
 alert("Successfull Updated Teacher Info");
            
</script>
<?php
}
      ?>