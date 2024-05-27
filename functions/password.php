<?php
include_once('../functions/general.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $uid = $_SESSION['uid'];
    $oldPassword = $_POST['oldPassword'];
    $newPassword = $_POST['newPassword'];
    $confirmPassword = $_POST['confirmPassword'];

    // Check if new password and confirm password match
    if ($newPassword !== $confirmPassword) {
        echo "New password and confirm password do not match.";
        exit;
    }

    // Fetch the current password from the database
    $query = "SELECT passhash FROM user WHERE user_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $uid);
    $stmt->execute();
    $stmt->bind_result($currentPasshash);
    $stmt->fetch();
    $stmt->close();

    // Verify the old password (simple comparison)
    if ($oldPassword !== $currentPasshash) {
        echo "Current password is incorrect.";
        exit;
    }

    // Update the password in the database
    $updateQuery = "UPDATE user SET passhash = ? WHERE user_id = ?";
    $updateStmt = $conn->prepare($updateQuery);
    $updateStmt->bind_param("si", $newPassword, $uid);

    if ($updateStmt->execute()) {
        echo "Password changed successfully.";
    } else {
        echo "Error updating password.";
    }

    $updateStmt->close();
}
?>
