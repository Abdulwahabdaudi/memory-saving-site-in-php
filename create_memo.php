<?php


include "./crud.php";

if (isset($_POST["add_memo"])) {




   
    // Check if file is uploaded
    if (isset($_FILES['photo'])) {
    
      // Get file details
      $fileName = $_FILES['photo']['name'];
      $fileType = $_FILES['photo']['type'];
      $fileSize = $_FILES['photo']['size'];
      $tmpName = $_FILES['photo']['tmp_name'];
      $error = $_FILES['photo']['error'];
    
      // Validate file
      $allowedExtensions = ['image/jpeg', 'image/png'];
      $maxSize = 1048576; // 1 MB
    
      if ($error === 0) {
        if (in_array($fileType, $allowedExtensions) && $fileSize <= $maxSize) {
    
          // Generate a unique filename (optional)
          $newFileName = uniqid('', true) . '.' . pathinfo($fileName, PATHINFO_EXTENSION);
    
          // Upload the file
          $uploadDir = 'uploads/'; // Adjust upload directory path
          $uploadPath = $uploadDir . $newFileName;
    
          if (move_uploaded_file($tmpName, $uploadPath)) {
            echo "Photo uploaded successfully!";
          } else {
            echo "Failed to upload photo.";
          }
        } else {
          echo "Invalid file type or size.";
        }
      } else {
        echo "Upload error: $error";
      }
    } else {
      echo "No file selected.";
    }
    
















    $title = $_POST["title"];
    $place = $_POST["place"];
    $description = $_POST["description"];
    $photo = $uploadPath;
    $crud = new Crud();
    $msg = $crud->create_memo($title, $place, $description, $photo);
    session_start();
    if ($msg) {
        $_SESSION['status'] = 'successfully created';
        header('Location: index.php');
        exit();
    } else {
        $_SESSION['status'] = 'unsuccessfully created';
    }
}

// $crud = new Crud();
// $crud->create();

// $show = $crud->read();
// print_r($show);


// $crud->update();
// $crud->delete();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADVENT_MEMO | WELCOME</title>
    <link rel="stylesheet" href="./src/style.css">
</head>

<body>
    <div class="container">
        <nav>
            <div class="nav-header">
                <h1 class="brand"><span>ADVENT</span>memo</h1>
                <p>/create memo</p>
            </div>
            <div class="profile">
                <a href="#">
                    <img src="" alt="">
                </a>
            </div>
        </nav>
        <main>
            <div class="header">
                <h2>ADD MEMORIES</h2>
            </div>
            <div class="card">
                <form 
                action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" 
                method="POST" 
                enctype="multipart/form-data">
                    <div>
                        <label for="memo_topic">Memo Topic</label>
                        <input name="title" type="text" placeholder="Enter you memo_topic...." required />
                    </div>
                    <div>
                        <label for="place">Place</label>
                        <input name="place" type="text" placeholder="Enter you place...." required />
                    </div>
                    <div>
                        <label for="description">Description</label>
                        <input name="description" type="text" placeholder="Enter you description...." required />
                    </div>
                    <div>
                        <label for="image">Photo</label>
                        <input name="photo" type="file" accept="image/jpeg,image/png" />
                    </div>
                    <input name="add_memo" type="submit" value="ADD" />
                </form>
            </div>

        </main>
        <footer class="card">
            <p>copy@<?= date("Y") ?> DEVELOPED BY ABDUL</p>
        </footer>
    </div>


</body>
<script src="./src/script.js"></script>

</html>