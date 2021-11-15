<?php
	$isbnno = $_POST['isbnno'];
	$booktitle = $_POST['booktitle'];
	$category = $_POST['category'];
	$publisher = $_POST['publisher'];
	$author = $_POST['author'];
	$language = $_POST['language'];
        
	$description = $_POST['description'];

        $barcode = $_POST['barcode'];
        
        $purchaseprice = $_POST['purchaseprice'];
        $purchasedate = $_POST['purchasedate'];

	// Database connection
	$conn = new mysqli('localhost','root','','vijay143');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into mscproject(isbnno, booktitle, category, publisher, author, language, description, barcode, purchaseprice, purchasedate) values(?, ?, ?, ?, ?, ?,?,?,?,?)");
		$stmt->bind_param("isssssssss", $isbnno, $booktitle, $category, $publisher, $author, $language, $description, $barcode, $purchaseprice, $purchasedate);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successfully...";
		$stmt->close();
		$conn->close();
	}
?>