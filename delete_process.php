<?php
session_start();
include "./crud.php";

$data = json_decode(file_get_contents('php://input'),true);
$id = $data['id'];

$crud = new Crud();
$result = $crud->delete_memo($id);




if ($result) {
    $_SESSION['flash_message'] = "Memo deleted successfully!";
 
} else {
    $_SESSION['flash_message'] = "Failed to delete memo!";
   
}

echo json_encode(['flash_message' => $_SESSION['flash_message']]);









// if ($result) {
//     $flashMessage = "Memo deleted successfully!";
//     header('Content-Type: application/json');
//     echo json_encode(['status' => $flashMessage]);
//     header("Location: index.php");
//     exit();
// } else {
//     // Redirect with a failure message if deletion failed
//     $flashMessage = "Failed to delete memo!";
//     $redirectUrl = "index.php?flash_message=" . urlencode($flashMessage);
//     header("Location: $redirectUrl");
//     exit();
// }







// if ($result) {
//     // Redirect if deletion was successful
//     header('Location: index.php');
//     exit(); // Ensure script stops executing after the redirect
// } else {
//     // Output JSON response if deletion failed
//     header('Content-Type: application/json');
//     echo json_encode(['status' => 'failed']);
// }