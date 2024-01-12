<?php
session_start();
require_once 'config/db.php';
?>


<!DOCTYPE html>
<html>

<head>
    <!-- Basic -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Site Metas -->
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>simsaifah</title>


    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

    <!-- fonts style -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,600,700&display=swap" rel="stylesheet">

    <!-- font awesome style -->
    <link href="css/font-awesome.min.css" rel="stylesheet" />
    <!-- nice select -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/css/nice-select.min.css"
        integrity="sha256-mLBIhmBvigTFWPSCtvdu6a76T+3Xyt+K571hupeFLg4=" crossorigin="anonymous" />

    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet" />
    <!-- responsive style -->
    <link href="css/responsive.css" rel="stylesheet" />

</head>


<div class="form-group col-lg-4">
    <label for="numberFilter">Select Numbers:</label>
    <div id="numberFilter">
        <!-- Green buttons for selected numbers -->
        <button class="number-button selected" data-number="0">0</button>
        <button class="number-button selected" data-number="1">1</button>
        <button class="number-button selected" data-number="2">2</button>
        <button class="number-button selected" data-number="3">3</button>
        <button class="number-button selected" data-number="1">1</button>
        <button class="number-button selected" data-number="1">1</button>
        <button class="number-button selected" data-number="1">1</button>
        <button class="number-button selected" data-number="1">1</button>
        <button class="number-button selected" data-number="1">1</button>
        <button class="number-button selected" data-number="1">1</button>
        <button class="number-button selected" data-number="1">1</button>
        <!-- Add buttons for numbers 2 to 9 here -->

        <!-- Red buttons for unselected numbers -->
        <button class="number-button unselected" data-number="2">2</button>
        <button class="number-button unselected" data-number="3">3</button>
        <button class="number-button unselected" data-number="2">2</button>
        <button class="number-button unselected" data-number="3">3</button>
        <button class="number-button unselected" data-number="2">2</button>
        <button class="number-button unselected" data-number="3">3</button>
        <button class="number-button unselected" data-number="2">2</button>
        <button class="number-button unselected" data-number="3">3</button>

        <!-- Add buttons for numbers 4 to 9 here -->
    </div>
</div>

<script>
$(document).ready(function() {
    // Initialize an array to store selected numbers
    var selectedNumbers = [];

    // Add click event handlers for number buttons
    $('.number-button').click(function() {
        var number = $(this).data('number');
        if ($(this).hasClass('selected')) {
            // If the button is currently selected (green), unselect it (make it red)
            $(this).removeClass('selected').addClass('unselected');
            // Remove the number from the selectedNumbers array
            var index = selectedNumbers.indexOf(number);
            if (index !== -1) {
                selectedNumbers.splice(index, 1);
            }
        } else {
            // If the button is currently unselected (red), select it (make it green)
            $(this).removeClass('unselected').addClass('selected');
            // Add the number to the selectedNumbers array
            selectedNumbers.push(number);
        }

        // Update the $sql query based on the selectedNumbers
        var sql = "SELECT * FROM stock WHERE 1=1";
        if (selectedNumbers.length > 0) {
            // If there are selected numbers, add them to the query
            sql += " AND (";
            for (var i = 0; i < selectedNumbers.length; i++) {
                sql += "phonenumber LIKE '%" + selectedNumbers[i] + "%'";
                if (i < selectedNumbers.length - 1) {
                    sql += " OR ";
                }
            }
            sql += ")";
        }

        // You can update the query string in the form's action attribute or use it in your AJAX request
        $('#searchForm').attr('action', 'filter.php?sql=' + encodeURIComponent(sql));

        // Debug: Display the current SQL query in the console
        console.log(sql);
    });
});
</script>
<?php include('footer.php'); ?>
<!-- footer section -->

<!-- jQery -->
<script src="js/jquery-3.4.1.min.js"></script>
<!-- bootstrap js -->
<script src="js/bootstrap.js"></script>
<!-- nice select -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/js/jquery.nice-select.min.js"
    integrity="sha256-Zr3vByTlMGQhvMfgkQ5BtWRSKBGa2QlspKYJnkjZTmo=" crossorigin="anonymous"></script>
<!-- custom js -->
<script src="js/custom.js"></script>
Default (GPT-3.5)

User
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>

<?php
session_start();
require_once 'config/db.php';


if (isset($_GET['price'])) {
    $maxPrice = intval($_GET['price']);

    // Modify your SQL query to search for phone numbers with price less than or equal to the maximum price
    $sql = "SELECT * FROM stock WHERE price <= :maxPrice";

    // Prepare the SQL statement
    $stmt = $conn->prepare($sql);

    // Bind the maxPrice as a parameter
    $stmt->bindParam(':maxPrice', $maxPrice, PDO::PARAM_INT);

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

this is filter.php
ChatGPT
The provided code appears to be a PHP script named filter.php that is responsible for handling various filtering and
searching functionalities related to phone numbers in a database. Here's a breakdown of what this script does:

It includes the jQuery library by adding a script tag to an external source.

It starts a PHP session and includes a configuration file (db.php) that presumably contains database connection details.

The script checks if a GET parameter named price is set. If it is set, it retrieves the maximum price from the parameter
and constructs an SQL query to select phone numbers with a price less than or equal to the specified maximum price. The
results of this query are stored in a session variable named search_results, and the script redirects the user to a page
named searchNumber.php.

Similarly, if a GET parameter named search is set, it retrieves a search query, constructs an SQL query to search for
phone numbers containing the query, and stores the results in the search_results session variable. It then redirects the
user to searchNumber.php.

If the script receives a POST request with a form submission (i.e., submit button is clicked), it collects various form
inputs such as filterBySum, phoneFilter, price, and network. It also collects a 10-digit phone number split into
individual digits. It validates that there are exactly 10 digits and constructs a filtered input string.

The script then constructs an SQL query to filter phone numbers based on the collected inputs and conditions. The SQL
query includes various filters like sum, network, and price, and it uses the LIKE operator to filter phone numbers based
on patterns.

The SQL query also includes pagination logic using LIMIT and OFFSET, although this part is currently commented out in
the code (//$sql .= " LIMIT $resultsPerPage OFFSET $offset";). This suggests that pagination functionality is being
considered but not yet implemented.

The script prepares the SQL statement and binds parameters for filtering inputs.

It executes the SQL query and fetches the results into an associative array named $results.

The filtered results are stored in the search_results session variable.

Finally, the script redirects the user to searchNumber.php, presumably to display the filtered results.

It's worth noting that some parts of the code are commented out (e.g., the pagination code), indicating that they may be
a work in progress or are not currently active in the script. Additionally, the code lacks error handling and input
validation in some areas, which may need to be implemented to ensure the security and reliability of the application.




User
<?php
session_start();
require_once 'config/db.php';
?>
<!DOCTYPE html>
<html>

<head>
    <!-- Basic -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Site Metas -->
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>simsaifah</title>


    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

    <!-- fonts style -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,600,700&display=swap" rel="stylesheet">

    <!-- font awesome style -->
    <link href="css/font-awesome.min.css" rel="stylesheet" />
    <!-- nice select -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/css/nice-select.min.css"
        integrity="sha256-mLBIhmBvigTFWPSCtvdu6a76T+3Xyt+K571hupeFLg4=" crossorigin="anonymous" />

    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet" />
    <!-- responsive style -->
    <link href="css/responsive.css" rel="stylesheet" />

</head>

<body class="sub_page">
    <?php
    if (isset($_SESSION['user_login'])) {
        $user_id = $_SESSION['user_login'];
        $stmt = $conn->query("SELECT * FROM users WHERE id = $user_id");
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
    }
    ?>
    <div class="hero_area">
        <!-- header section strats -->
        <?php include('nav.php'); ?>
        <!-- end header section -->

        <section class="slider_section ">
            <div class="container ">
                <div class="row">
                    <div class="col-lg-7 col-md-8 mx-auto">
                        <div class="detail-box">
                            <h1>
                                ค้นหา <br>
                                เบอร์ที่ท่านต้องการ
                            </h1>
                            <p>
                                จากโปรแกรมค้นหาของเรา
                            </p>
                        </div>
                    </div>
                </div>
                <div class="find_container ">
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <form id="searchForm" action="filter.php" method="post" enctype="multipart/form-data">
                                    <!-- บรรทัด1 -->
                                    <div class="form-row col-lg-7 col-md-12 mx-auto">
                                        <div class="my-container">

                                            <div class="form-group col-lg-12 " style="display: flex; ">
                                                <div>
                                                    <input type="text" class="form-control digit" placeholder="0"
                                                        maxlength="1" autocomplete="off" value="0" pattern="[0-9]*"
                                                        name="numbers[]" onkeydown=""
                                                        style="width:30px;text-align: center;flex:5; padding:0 1px;">
                                                </div>-
                                                <div>
                                                    <input type="text" class="form-control digit" placeholder=""
                                                        maxlength="1" autocomplete="off" value="" pattern="[0-9]*"
                                                        name="numbers[]" onkeydown=""
                                                        style="width:30px;text-align: center;flex:5; padding:0 1px;">
                                                </div>-
                                                <div>
                                                    <input type="text" class="form-control digit" placeholder=""
                                                        maxlength="1" autocomplete="off" value="" pattern="[0-9]*"
                                                        name="numbers[]" onkeydown=""
                                                        style="width:30px;text-align: center;flex:5; padding:0 1px;">
                                                </div>--
                                                <div>
                                                    <input type="text" class="form-control digit" placeholder=""
                                                        maxlength="1" autocomplete="off" value="" pattern="[0-9]*"
                                                        name="numbers[]" onkeydown=""
                                                        style="width:30px;text-align: center;flex:5; padding:0 1px;">
                                                </div>-
                                                <div>
                                                    <input type="text" class="form-control digit" placeholder=""
                                                        maxlength="1" autocomplete="off" value="" pattern="[0-9]*"
                                                        name="numbers[]" onkeydown=""
                                                        style="width:30px;text-align: center;flex:5; padding:0 1px;">
                                                </div>-
                                                <div>
                                                    <input type="text" class="form-control digit" placeholder=""
                                                        maxlength="1" autocomplete="off" value="" pattern="[0-9]*"
                                                        name="numbers[]" onkeydown=""
                                                        style="width:30px;text-align: center;flex:5; padding:0 1px;">
                                                </div>--
                                                <div>
                                                    <input type="text" class="form-control digit" placeholder=""
                                                        maxlength="1" autocomplete="off" value="" pattern="[0-9]*"
                                                        name="numbers[]" onkeydown=""
                                                        style="width:30px;text-align: center;flex:5; padding:0 1px;">
                                                </div>-
                                                <div>
                                                    <input type="text" class="form-control digit" placeholder=""
                                                        maxlength="1" autocomplete="off" value="" pattern="[0-9]*"
                                                        name="numbers[]" onkeydown=""
                                                        style="width:30px;text-align: center;flex:5; padding:0 1px;">
                                                </div>-
                                                <div>
                                                    <input type="text" class="form-control digit" placeholder=""
                                                        maxlength="1" autocomplete="off" value="" pattern="[0-9]*"
                                                        name="numbers[]" onkeydown=""
                                                        style="width:30px;text-align: center;flex:5; padding:0 1px;">
                                                </div>-
                                                <div>
                                                    <input type="text" class="form-control digit" placeholder=""
                                                        maxlength="1" autocomplete="off" value="" pattern="[0-9]*"
                                                        name="numbers[]" onkeydown=""
                                                        style="width:30px;text-align: center;flex:5; padding:0 1px;">
                                                </div>-
                                            </div>
                                        </div>
                                        <div class="form-group col-lg-3">
                                            <select name="filterBySum" class="form-control wide" id="filterBySum">
                                                <option value="" name="filterBySum">ผลรวม</option>
                                                <option value="30">30</option>
                                                <option value="31">31</option>
                                                <option value="32">32</option>
                                                <option value="33">33</option>
                                                <option value="34">34</option>
                                                <option value="35">35</option>
                                                <option value="36">36</option>
                                                <option value="37">37</option>
                                                <option value="38">38</option>
                                                <option value="39">39</option>
                                                <option value="40">40</option>
                                                <option value="41">41</option>
                                                <option value="42">42</option>
                                                <option value="43">43</option>
                                                <option value="44">44</option>
                                                <option value="45">45</option>
                                                <option value="46">46</option>
                                                <option value="47">47</option>
                                                <option value="48">48</option>
                                                <option value="49">49</option>
                                                <option value="50">50</option>
                                                <option value="51">51</option>
                                                <option value="52">52</option>
                                                <option value="53">53</option>
                                                <option value="54">54</option>
                                                <option value="55">55</option>
                                                <option value="56">56</option>
                                                <option value="57">57</option>
                                                <option value="58">58</option>
                                                <option value="59">59</option>
                                                <option value="60">60</option>
                                                <option value="61">61</option>
                                                <option value="62">62</option>
                                                <option value="63">63</option>
                                                <option value="64">64</option>
                                                <option value="65">65</option>
                                                <option value="66">66</option>
                                                <option value="67">67</option>
                                                <option value="68">68</option>
                                                <option value="69">69</option>
                                                <option value="70">70</option>
                                                <option value="71">71</option>
                                                <option value="72">72</option>
                                            </select>
                                        </div>
                                    </div>

                                    <!-- บรรทัด2 -->
                                    <div class="form-row col-lg-7 col-md-12 mx-auto">
                                        <div class="form-group col-lg-4" style="display: flex;" name="phone_filter">
                                            <input type="text" class="form-control" id="phone_filter"
                                                placeholder="ใส่เลขที่ชอบ" name="phone_filter"
                                                style="text-align: left;flex:5; padding: 5  1px;">-

                                        </div><br>

                                        <div class="form-group col-lg-4">
                                            <select class="form-control wide" id="price" name="price">
                                                <option value="">ทุกช่วงราคา </option>
                                                <option value="2000">ไม่เกิน 2000 </option>
                                                <option value="4000">ไม่เกิน 4000</option>
                                                <option value="6000">ไม่เกิน 6000</option>
                                                <option value="10000">ไม่เกิน 10000</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-lg-4">
                                            <select class="form-control wide" id="network" name="network">
                                                <option value="">เครือข่าย </option>
                                                <option value="ais">AIS </option>
                                                <option value="dtac">DTAC</option>
                                                <option value="true">TRUEMOVE</option>
                                            </select>
                                        </div>
                                    </div><br>
                                    <div class="form-row col-lg-7 col-md-12 mx-auto">

                                        <div class="form-group col-lg-4 col-md-12 mx-auto">
                                            <div class="btn-box">
                                                <button type="submit" name="submit" class="btn">เริ่มค้นหา</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- job section -->
    <section class="job_section layout_padding">
        <div class="container">
            <div class="heading_container heading_center">
                <h2>
                    ผลการค้นหา
                </h2>
            </div>
            <div class="job_container">
                <h4 class="job_heading">
                </h4>
                <!-- ////////////////////////////////////////////// -->
                <div class="row" id="content">

                    <?php

                    if (isset($_SESSION['search_results'])) {

                        echo '<script>
        function scrollToContent() {
            const element = document.getElementById("content");
            if (element) {
                element.scrollIntoView({ behavior: "smooth" }); // Scroll smoothly
            }
        }
        // Scroll to content if session data is available
        scrollToContent();
    </script>';
                        $resultsPerPage = 18; // Adjust this based on your preference
                    
                        // Calculate the total number of pages
                        $totalResults = count($_SESSION['search_results']);
                        $totalPages = ceil($totalResults / $resultsPerPage);

                        // Get the current page from the URL or default to page 1
                        $currentPage = isset($_GET['page']) ? intval($_GET['page']) : 1;

                        // Calculate the offset for the current page
                        $offset = ($currentPage - 1) * $resultsPerPage;

                        // Extract a subset of results for the current page
                        $currentResults = array_slice($_SESSION['search_results'], $offset, $resultsPerPage);

                        if (empty($currentResults)) {
                            echo "<div class='col-lg-12'>No phonenumber found</div>";
                        } else {
                            foreach ($currentResults as $number) {

                                ?>

                    <div class="col-lg-4">
                        <div class="box">
                            <div class="job_content-box">
                                <div class="img-box">
                                    <img width="50%" src="network/<?= $number['network']; ?>" class="rounded" alt="">
                                </div>
                                <div class="detail-box">
                                    <h5>
                                        <?= $number['phonenumber']; ?>
                                    </h5>
                                    <div class="detail-info">
                                        <h6>
                                            <i class="fa fa-map-marker" aria-hidden="true"></i>
                                            <span>
                                                <?= $number['sum']; ?>
                                            </span>
                                        </h6>
                                        <h6>
                                            <?php
                                                        // Assuming you have fetched the $number['price'] value from the database
                                                        $price = $number['price'];

                                                        if ($price > 0) {
                                                            // Display the price and the "Buy Now" button if the price is greater than 0
                                                            echo '<i class="fa fa-money" aria-hidden="true"></i> ';
                                                            echo '<span>' . $price . '</span>';
                                                        } else {

                                                        }
                                                        ?>
                                        </h6>
                                    </div>
                                </div>
                            </div>
                            <div class="option-box">

                                <!-- <button class="fav-btn">
                                    <i class="fa fa-heart-o" aria-hidden="true"></i>
                                </button> -->

                                <?php
                                            // Assuming you have fetched the $number['price'] value from the database
                                            $price = $number['price'];

                                            if ($price > 0) {
                                                // Display the "Buy Now" button if the price is greater than 0
                                                echo '<a href="singleNumber.php?id=' . $number['id'] . '" class="apply-btn">Buy Now</a>';
                                            } else {
                                                // Display the "Booked" button if the price is 0
                                                echo '<button class="booked-btn">Booked</button>';
                                            } ?>
                            </div>
                        </div>
                    </div>





                    <?php }
                        }

                        // Unset the session variable to clear the results
                        //unset($_SESSION['search_results']);
                    
                        ?>



                    <div class="container">
                        <div class="heading_container heading_center">
                            <?php
                                // Assuming you already have $totalResults and $resultsPerPage defined based on your query
                            

                                // for debug
                            


                                /////////////////////////////////////
                            


                                echo ($totalPages);
                                if ($totalPages > 1) {
                                    echo "<div class='pagination'>";

                                    // Calculate the range of page links to display
                                    $numLinksToShow = 10;
                                    $startPage = max(1, $currentPage - floor($numLinksToShow / 2));
                                    $endPage = min($totalPages, $startPage + $numLinksToShow - 1);



                                    if ($currentPage > 1) {
                                        echo "<a href='searchNumber.php?page=1'>&laquo;&laquo; First &nbsp;&nbsp;</a>";
                                    }

                                    // Display previous page link
                                    if ($currentPage > 1) {
                                        echo "<a href='searchNumber.php?page=" . ($currentPage - 1) . "'>&laquo; Previous &nbsp;&nbsp;</a>";
                                    }

                                    // Display numbered page links
                                    for ($i = $startPage; $i <= $endPage; $i++) {
                                        if ($i == $currentPage) {
                                            echo "<span class='current-page'>$i</span>";
                                        } else {
                                            echo "<a href='searchNumber.php?page=$i'>$i</a>";
                                        }
                                        if ($i < $endPage) {
                                            echo "&nbsp;&nbsp;"; // Add space between links
                                        }
                                    }

                                    // Display next page link
                                    if ($currentPage < $totalPages) {
                                        echo "<a href='searchNumber.php?page=" . ($currentPage + 1) . "'>&nbsp;&nbsp;&raquo Next &raquo;</a>";
                                    }

                                    if ($currentPage < $totalPages) {
                                        echo "<a href='searchNumber.php?page=" . $totalPages . "'>&nbsp;&nbsp; Last &raquo;&raquo;</a>";
                                    }


                                    echo "</div>";
                                } else {
                                    echo "error";
                                }
                                ?>
                        </div>
                    </div>

                    <?php


                    } else {
                        // Handle the case when no search results are available
                        echo "<div class='col-lg-12'>No phonenumber found</div>";
                    }
                    ?>

                </div>




                <!-- ////////////////////////////////////////////// -->


            </div>
        </div>
        </div>


        </div>


    </section>
    <!-- end job section -->

    <!-- info section -->
    <?php include('footer.php'); ?>
    <!-- footer section -->

    <!-- jQery -->
    <!-- <script src="js/jquery-3.4.1.min.js"></script> -->
    <!-- bootstrap js -->
    <script src="js/bootstrap.js"></script>
    <!-- nice select -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/js/jquery.nice-select.min.js"
        integrity="sha256-Zr3vByTlMGQhvMfgkQ5BtWRSKBGa2QlspKYJnkjZTmo=" crossorigin="anonymous"></script>
    <!-- custom js -->
    <script src="js/custom.js"></script>
    <script>
    var container = document.getElementsByClassName("my-container")[0];
    container.onkeyup = function(e) {

        var target = e.srcElement || e.target;


        var maxLength = parseInt(target.attributes["maxlength"].value, 10);

        var myLength = target.value.length;

        if (myLength >= maxLength) {
            var next = target;

            while (next = next.parentNode.nextElementSibling.firstElementChild) {

                if (next == null)
                    break;
                if (next.tagName.toLowerCase() === "input" && next.classList.contains('digit')) {
                    next.focus();
                    break;
                }
            }
        }
        // Move to previous field if empty (user pressed backspace)
        else if (myLength === 0) {
            var previous = target;
            while (previous = previous.parentNode.previousElementSibling.firstElementChild) {
                if (previous == null)
                    break;
                if (previous.tagName.toLowerCase() === "input") {
                    previous.focus();
                    break;
                }
            }
        }
    }
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>


</body>

</html>


<div class="form-group col-lg-4">
    <select class="form-control wide" id="network" name="network">
        <option value="">เครือข่าย </option>
        <option value="ais">AIS </option>
        <option value="dtac">DTAC</option>
        <option value="true">TRUEMOVE</option>
    </select>
</div>

<div class=" form-group col-lg-4">
    <label for="numberFilter">Select Numbers:</label>
    <div id="numberFilter">
        <!-- Green buttons for selected numbers -->
        <button class="number-button selected" data-number="0">0</button>
        <button class="number-button selected" data-number="1">1</button>
        <!-- Add buttons for numbers 2 to 9 here -->

        <!-- Red buttons for unselected numbers -->
        <button class="number-button unselected" data-number="2">2</button>
        <button class="number-button unselected" data-number="3">3</button>
        <!-- Add buttons for numbers 4 to 9 here -->
    </div>
</div>
Add JavaScript to handle the button clicks and update the $sql query string accordingly. You can use jQuery for this
purpose:
html
Copy code
<script>
$(document).ready(function() {
    // Initialize an array to store selected numbers
    var selectedNumbers = [];

    // Add click event handlers for number buttons
    $('.number-button').click(function() {
        var number = $(this).data('number');
        if ($(this).hasClass('selected')) {
            // If the button is currently selected (green), unselect it (make it red)
            $(this).removeClass('selected').addClass('unselected');
            // Remove the number from the selectedNumbers array
            var index = selectedNumbers.indexOf(number);
            if (index !== -1) {
                selectedNumbers.splice(index, 1);
            }
        } else {
            // If the button is currently unselected (red), select it (make it green)
            $(this).removeClass('unselected').addClass('selected');
            // Add the number to the selectedNumbers array
            selectedNumbers.push(number);
        }

        // Update the $sql query based on the selectedNumbers
        var sql = "SELECT * FROM stock WHERE 1=1";
        if (selectedNumbers.length > 0) {
            // If there are selected numbers, add them to the query
            sql += " AND (";
            for (var i = 0; i < selectedNumbers.length; i++) {
                sql += "phonenumber LIKE '%" + selectedNumbers[i] + "%'";
                if (i < selectedNumbers.length - 1) {
                    sql += " OR ";
                }
            }
            sql += ")";
        }

        // You can update the query string in the form's action attribute or use it in your AJAX request
        $('#searchForm').attr('action', 'filter.php?sql=' + encodeURIComponent(sql));

        // Debug: Display the current SQL query in the console
        console.log(sql);
    });
});
</script>

<div class="form-group col-lg-4">
    <label for="numberFilter">Select Numbers:</label>
    <div id="numberFilter">
        <!-- Green buttons for selected numbers -->
        <button class="number-button selected" data-number="0">0</button>
        <button class="number-button selected" data-number="1">1</button>
        <!-- Add buttons for numbers 2 to 9 here -->

        <!-- Red buttons for unselected numbers -->
        <button class="number-button unselected" data-number="2">2</button>
        <button class="number-button unselected" data-number="3">3</button>
        <!-- Add buttons for numbers 4 to 9 here -->
    </div>
</div>

<style>
/* Styling for selected buttons (green) */
.number-button.selected {
    background-color: green;
    color: white;
}

/* Styling for unselected buttons (red) */
.number-button.unselected {
    background-color: red;
    color: white;
}
</style>
<script>
var container = document.getElementsByClassName("my-container")[0];
container.onkeyup = function(e) {

    var target = e.srcElement || e.target;


    var maxLength = parseInt(target.attributes["maxlength"].value, 10);

    var myLength = target.value.length;

    if (myLength >= maxLength) {
        var next = target;

        while (next = next.parentNode.nextElementSibling.firstElementChild) {

            if (next == null)
                break;
            if (next.tagName.toLowerCase() === "input" && next.classList.contains('digit')) {
                next.focus();
                break;
            }
        }
    }
    // Move to previous field if empty (user pressed backspace)
    else if (myLength === 0) {
        var previous = target;
        while (previous = previous.parentNode.previousElementSibling.firstElementChild) {
            if (previous == null)
                break;
            if (previous.tagName.toLowerCase() === "input") {
                previous.focus();
                break;
            }
        }
    }
}
</script>

</body>

</html>