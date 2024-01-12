<script src="https://code.jquery.com/jquery-3.6.0.js"></script>

<?php
session_start();
require_once 'config/db.php';


if (isset($_GET['price'])) {
    $Price = intval($_GET['price']);

    // Modify your SQL query to search for phone numbers with price less than or equal to the maximum price
    $sql = "SELECT * FROM stock WHERE price <= :price";

    // Prepare the SQL statement
    $stmt = $conn->prepare($sql);

    // Bind the maxPrice as a parameter
    $stmt->bindParam(':price', $Price, PDO::PARAM_INT);

    // Execute the SQL statement
    $stmt->execute();

    // Fetch and display the search results as needed
    // ...

    // Store the search results in a session variable for pagination or other uses
    $_SESSION['search_results'] = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Redirect to the search results page
    header("location: searchNumber.php");
    exit(); // Ensure that the script terminates after the redirection
}

if (isset($_GET['search'])) {
    $searchQuery = $_GET['search'];

    // Modify your SQL query to search for phone numbers containing the query
    $sql = "SELECT * FROM stock WHERE phonenumber LIKE :searchQuery";

    // Prepare the SQL statement
    $stmt = $conn->prepare($sql);

    // Bind the search query as a parameter
    $searchQuery = "%" . $searchQuery . "%";
    $stmt->bindParam(':searchQuery', $searchQuery, PDO::PARAM_STR);

    // Execute the SQL statement
    $stmt->execute();

    // Fetch and display the search results as needed
    // ...

    // Store the search results in a session variable for pagination or other uses
    $_SESSION['search_results'] = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Redirect to the search results page
    header("location: searchNumber.php");
    exit(); // Ensure that the script terminates after the redirection
}



if (isset($_POST['submit'])) {
    $filterBySum = $_POST["filterBySum"];
    $phoneFilter = $_POST["phone_filter"];
    $price = $_POST["price"];
    $network = $_POST["network"];

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
    $currentPage = isset($_GET['page']) ? intval($_GET['page']) : 1; // Get the current page number from the URL or default to page 1
    $resultsPerPage = 51; // Number of results to display per page
    $offset = ($currentPage - 1) * $resultsPerPage;

    // Modify your SQL query to include LIMIT and OFFSET
    $sql = "SELECT * FROM stock WHERE 1=1";

    // ... (your existing SQL query conditions)

    // Add LIMIT and OFFSET to the query


    if (!empty($filteredInput)) {
        $sql .= " AND phonenumber LIKE :filteredInput";
    }
    if (!empty($filterBySum) && $filterBySum !== 'All') {
        $sql .= " AND sum = :filterBySum";
    }
    if (!empty($network) && $network !== 'All') {
        $sql .= " AND network like :network";
    }
    if (!empty($price) && $price !== 'All') {
        $sql .= " AND price <= :price";
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

    // Bind parameters for filterBySum, network, price, and phoneFilter
    if (!empty($filterBySum) && $filterBySum !== 'All') {
        $stmt->bindParam(':filterBySum', $filterBySum, PDO::PARAM_STR);
    }
    if (!empty($network) && $network !== 'All') {
        $network = "%$network%";
        $stmt->bindParam(':network', $network, PDO::PARAM_STR);
    }
    if (!empty($price) && $price !== 'All') {
        $stmt->bindParam(':price', $price, PDO::PARAM_INT);
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

    header("location: searchNumber.php");
}
?>