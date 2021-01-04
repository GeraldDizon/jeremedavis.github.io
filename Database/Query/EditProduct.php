<?php
require("../Connection/Connect.php");

// php delete data in mysql database using PDO
if(isset($_POST['EditProduct']))
{
    try {
        $conn = new PDO("mysql:host=localhost;dbname=$dbname", $username, $password);
    } catch (PDOException $exc) {
        echo $exc->getMessage();
        exit();
    }
    
     // get id to delete

    $id = $_POST['id'];
    $ProductImage = $_POST['ImageFile'];
    $Link = $_POST['Link'];
    $ProductName = $_POST['Name'];
    $ProductType = $_POST['Type'];
    $ProductPrice = $_POST['Price'];
    $ProductDescription = $_POST['Description'];
    $ProductSize = $_POST['Size'];
    $ProductWood = $_POST['Wood'];


        if(!empty($_FILES["fileUpload"]["name"])){
            $imageFile = $_FILES["fileUpload"]["name"];
            $imageType = $_FILES["fileUpload"]["type"];
            $validext = array("jpeg","jpg","png");
            $fileExt = pathinfo($imageFile, PATHINFO_EXTENSION);

            //echo $fileExt . "<br>"; Checking what file extension.
            
            $errorsEditProduct = array();
            if((($imageType == "image/jpeg") || ($imageType == "image/jpg") || ($imageType == "image/png")) && in_array($fileExt, $validext)){
                //echo "valid image "; Check if file extension is listed above.
            }else{
                $errorsEditProduct[] =  "not valid image";
            }
            
            if($_FILES['fileUpload']["size"] < 1000000){
                //echo "file size is " . $_FILES["fileUpload"]["size"]; Check if file size is not greater than 25mb
            }else{
                $errorsEditProduct[] = "File too big";
            }

            $targetPath = "../Images/" . $imageFile;
            $sourcePath = $_FILES["fileUpload"]["tmp_name"];
            if(file_exists($targetPath)){
                $errorsEditProduct[] = "File already there";
            }
            if(empty($ProductName) == true || empty($ProductType) == true || empty($ProductPrice) == true){
                $errorsEditProduct[] = "Please don't leave a blank";
            }
        
        else{
            if(empty($errorsEditProduct) === true){
                if (file_exists($ProductImage)){
                    if (unlink($ProductImage)) {   
                        echo "success";
                    } else {
                        echo "fail";    
                    }   
                } else {
                    echo "file does not exist";
                    echo $ProductImage;
                }
                        move_uploaded_file($sourcePath, $targetPath);
                    $sql = "UPDATE product SET Image = :ImageFile  WHERE id = :id";
                    $query = $conn->prepare($sql);
                    $stmt = $query->execute(array(":ImageFile"=>$targetPath, ":id"=>$id));

                if($stmt){
                        echo $_POST['id'];
                        echo 'Data Inserted';
                    }else{
                        echo 'Data Not Inserted';
                    }

                }

        }
        }


$sql = "UPDATE product SET 3dLink = :Link, Name = :Name, Type = :Type, Price = :Price, Description = :Description, Size = :Size, Wood = :Wood WHERE id = :id";
$query = $conn->prepare($sql);
$result = $query->execute(array(":Link"=>$Link, ":Name"=>$ProductName, ":Type"=>$ProductType, ":Price"=>$ProductPrice, ":Description"=>$ProductDescription, ":Size"=>$ProductSize, ":Wood"=>$ProductWood, ":id"=>$id));

if($result){
    header("Location: ../Admin/Admin-AddProduct.php");
} else {
    echo 'error';
}

}
?>


