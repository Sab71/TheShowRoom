<?php
try {
    include 'dbc.php';
    if (isset($_GET['id'])) {
        $un = $_GET['id'];
        $stmt = $conn->query("DELETE FROM emp WHERE un='{$un}'");
        $stmt->execute();
        header("Location: manage.php");
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>