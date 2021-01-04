<?php
include("../Connection/Connect.php");

if(isset($_POST['AddProduct'])){

                $ProductName = $_POST['Name'];
                $Link = $_POST['Link'];
                $ProductType = $_POST['Type'];
                $ProductPrice = $_POST['Price'];
                $ProductDescription = $_POST['Description'];
                $ProductSize = $_POST['Size'];
                $ProductWood = $_POST['Wood'];


    if(empty($_POST) === false){
        if(isset($_FILES["fileUpload"]["name"])){
            $imageFile = $_FILES["fileUpload"]["name"];
            $imageType = $_FILES["fileUpload"]["type"];
            $validext = array("jpeg","jpg","png");
            $fileExt = pathinfo($imageFile, PATHINFO_EXTENSION);

            //echo $fileExt . "<br>"; Checking what file extension.
            
            $errorsAddProduct = array();
            if((($imageType == "image/jpeg") || ($imageType == "image/jpg") || ($imageType == "image/png")) && in_array($fileExt, $validext)){
                //echo "valid image "; Check if file extension is listed above.
            }else{
                $errorsAddProduct[] =  "not valid image";
            }
            
            if($_FILES['fileUpload']["size"] < 1000000){
                //echo "file size is " . $_FILES["fileUpload"]["size"]; Check if file size is not greater than 25mb
            }else{
                $errorsAddProduct[] = "File too big";
            }

            $targetPath = "../Images/" . $imageFile;
            $sourcePath = $_FILES["fileUpload"]["tmp_name"];
            if(file_exists($targetPath)){
                $errorsAddProduct[] = "File already there";
            }
            if(empty($ProductName) == true || empty($ProductType) == true || empty($ProductPrice) == true){
                $errorsAddProduct[] = "Please don't leave a blank";
            }
        
        else{
            if(empty($errorsAddProduct) === true){

                    move_uploaded_file($sourcePath, $targetPath);
                    $sql = "INSERT INTO product(Image, 3dLink, Name, Type, Price, Description, Size, Wood) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
                    $query = $conn->prepare($sql);
                    $stmt = $query->execute(array($targetPath, $Link, $ProductName, $ProductType, $ProductPrice, $ProductDescription, $ProductSize, $ProductWood));

                if($stmt){
                        header("Location: ../Admin/Admin-AddProduct.php");
                    }else{
                        echo 'Data Not Inserted';
                    }

                }

        }
        }
    }
}
?>