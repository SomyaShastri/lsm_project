<?php
$file="";
$fileName="";
$fileTmpName="";
$fileSize="";
$fileError="";
$fileType="";
if (isset($_POST['submit'])) {

	$file = $_FILES['file'];
	echo "1";
	print_r($file);
	$fileName = $file['name'];
	$fileTmpName = $file['tmp_name'];
	$fileSize = $file['size'];
	$fileError = $file['error'];
	$fileType = $file['type'];

	$fileExt = explode('.', $fileName);
	$fileActualExt = strtolower(end($fileExt));

	$allowed = array('jpg', 'jpeg', 'png', 'pdf');

	if (in_array($fileActualExt, $allowed)) {
		echo "2";
		if ($fileError === 0) {
			echo "3";
			if ($fileSize < 1000000) {
				echo "4";
				$fileNameNew = uniqid('', true).".".$fileActualExt;
				$fileDestination = 'docs/'.$fileNameNew;
				move_uploaded_file($fileTmpName, $fileDestination);
				header("Location: Print_req_stu.html?uploadsuccess");
			} else {
				echo "Your file is too big!";
			}
		} else {
			echo "There was an error uploading your file!";
		}
	} else {
		echo "You cannot upload files of this type!";
	}
}
?>