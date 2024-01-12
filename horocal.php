<script src="https://code.jquery.com/jquery-3.6.0.js"></script>

<?php
session_start();
require_once 'config/db.php';

if (isset($_POST['submit'])) {

    $phoneFilter = $_POST["phone_filter"];

    // Collect user input from the 10-digit input fields
    $numbers = isset($_POST['numbers']) ? $_POST['numbers'] : [];
    $filteredInput = '';

    // Ensure we have exactly 10 digits
    if (count($numbers) == 10) {
        foreach ($numbers as $number) {
            if ($number === '') {
                $filteredInput .= '_';
            } elseif (ctype_digit($number)) {
                $filteredInput .= $number;
            } else {
                die("Invalid input. Please provide 10 digits.");
            }
        }
    } else {
        die("Please provide 10 digits.");
    }

    // Modify your SQL query to include LIMIT and OFFSET
    $sql = "SELECT * FROM horo WHERE 1=1";

    // ... (your existing SQL query conditions)

    // Add LIMIT and OFFSET to the query


    if (!empty($filteredInput)) {
        $sql .= " AND phonenumber LIKE :filteredInput";
    }

    if (!empty($phoneFilter)) {
        $sql .= " AND phonenumber LIKE :phoneFilter";
    }
    //$sql .= " LIMIT $resultsPerPage OFFSET $offset";

    // Prepare the SQL statement
    $stmt = $conn->prepare($sql);

    // Bind parameters for filteredInput
    if (!empty($filteredInput)) {
        $filteredInputParam = "%$filteredInput%";
        $stmt->bindParam(':filteredInput', $filteredInputParam, PDO::PARAM_STR);
    }


    if (!empty($phoneFilter)) {
        $phoneFilterParam = "%$phoneFilter%";
        $stmt->bindParam(':phoneFilter', $phoneFilterParam, PDO::PARAM_STR);
    }

    // Execute the SQL statement
    // Execute the query and fetch results
    $stmt->execute();
    // $searchResults = $stmt->fetchAll(PDO::FETCH_ASSOC);



    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);


    $_SESSION['search_results'] = $results;

    header("location: horo.php");
}

?>