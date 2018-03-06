<!DOCTYPE html>
<html>
 <head>
  <title>Webslesson Tutorial | Upload File without using Form Submit in Ajax PHP</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 </head>
 <body>
 
 <table border="0" cellpadding="1" cellspacing="1" align="center" width="100%" height="300">
<!-- Header.. -->
<tr>
	<td align="left" width="100%"><?php include("common/vendor_header_tpl.php");?></td>
</tr>

<!-- Bredcrembs.. -->
<tr>
	<td align="left" width="100%" colspan="2" class="bred">
		<a href="home.php" class="bred_link">Home</a> >> 
		Defect Information Report	
	</td>
</tr>
<!-- Bredcrembs.. -->

<!-- Create Delivery List.. -->
<tr>
	<td align="center" valign="top" colspan="2" width="100%">
		<table align="center" width="100%" cellpadding="0" cellspacing="0" border="0">
			<tr>
				<td style="font-size:16px;">
					DEFECT INFORMATION REPORT
				</td>
			</tr>			
			<tr>
				<td>
					<table style="font-size:16px;padding-top:10px; border-top:2px solid #4E8CCF; border-left:1px solid #ABC3D7; border-right:1px solid #ABC3D7; border-bottom:1px solid #ABC3D7; background-color:#F6F6F6;" width="80%" cellpadding="0" cellspacing="0" border="1">
						<tr height="30px">
							<td width="50%" style="">
								<span style="padding-left:50px;"><input type="file" name="file" id="file" /></span>
							</td>
							<td width="50%" style="">
							</td>
						</tr>
						<tr height="300px">
							<td style="border:2px solid green;">
								<span  id="uploaded_image1" style="border:2px solid blue;"></span>
							</td>
							<td style="border:2px solid red;">
								<span id="uploaded_image2"></span>
							</td>
						</tr>
					</table>
				</td>
			</tr>
		</table>		
	</td>
</tr>

<tr>
	<td align="left" width="100%" colspan="2" ><?php include("common/footer_tpl.php");?></td>
</tr>
<!-- Footer.. -->

</table>

   
  </body>
</html>

<script>
$(document).ready(function(){
 $(document).on('change', '#file', function(){
  var name = document.getElementById("file").files[0].name;
  //alert(name); return false;
  var form_data = new FormData();
  var ext = name.split('.').pop().toLowerCase();
  if(jQuery.inArray(ext, ['gif','png','jpg','jpeg']) == -1) 
  {
   alert("Invalid Image File");
  }
  var oFReader = new FileReader();
  oFReader.readAsDataURL(document.getElementById("file").files[0]);
  var f = document.getElementById("file").files[0];
  var fsize = f.size||f.fileSize;
  if(fsize > 2000000)
  {
   alert("Image File Size is very big");
  }
  else
  {
   form_data.append("file", document.getElementById('file').files[0]);
   $.ajax({
    url:"test_upload.php",
    method:"POST",
    data: form_data,
    contentType: false,
    cache: false,
    processData: false,
    beforeSend:function(){
     $('#uploaded_image1').html("<label class='text-success'>Image Uploading...</label>");
    },   
    success:function(data)
    {
     $('#uploaded_image1').html(data);
    }
   });
  }
 });
});
</script>