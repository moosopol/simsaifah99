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
                                                <!-- <option value=""> </option>
                                                <option value="ais">AIS </option>
                                                <option value="dtac">DTAC</option>
                                                <option value="true">TRUEMOVE</option> -->
                                                <option value="">ทุกเครือข่าย</option>
                                                <option value="logo_ais.png">ais เติมเงิน</option>
                                                <option value="logo_dtac.png">dtac รายเดือน</option>
                                                <option value="logo_dtac_happy.png">dtac เติมเงิน</option>
                                                <option value="logo_true.png">true เติมเงิน</option>
                                                <option value="logo_true_postpaid.png">true รายเดือน</option>
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
    <section class="job_section layout_padding" style="background-color: #F8F8F8;">
        <div class="container">
            <div class="heading_container heading_center">
                <h2 style="color: #08135c">
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
                        $resultsPerPage = 99; // Adjust this based on your preference
                    
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
                        <div class="box"
                            style=" background: linear-gradient(to bottom right, #d7b335 20%, #FFD700 100%);">
                            <table class="table-layout">
                                <tr>
                                    <td rowspan=2 colspan=5 class="left-cell">
                                        <div class="job_content-box">
                                            <h3>
                                                <?php
                                                            $phoneNumber = $number['phonenumber'];
                                                            $formattedPhoneNumber = substr($phoneNumber, 0, 3) . '-' . substr($phoneNumber, 3, 3) . '-' . substr($phoneNumber, 6);
                                                            ?>
                                                <a href="horo.php"
                                                    title="คำทำนาย"><?php echo $formattedPhoneNumber; ?></a>
                                            </h3>

                                        </div>
                                    </td>

                                    <td class="right-cell">
                                        <div class="job_content-box">
                                            <img width="30%" src="network/<?= $number['network']; ?>" class="rounded"
                                                alt="">

                                        </div>
                                    </td>

                                </tr>

                                <tr>
                                    <td class="right-cell">
                                        <div class="job_content-box">
                                            <?php
                                                        $network_value = $number['network'];

                                                        switch ($network_value) {
                                                            case 'logo_ais.png':
                                                                echo 'ais';
                                                                break;
                                                            case 'logo_dtac.png':
                                                                echo 'dtac';
                                                                break;
                                                            case 'logo_dtac_happy.png':
                                                                echo 'happy';
                                                                break;
                                                            case 'logo_true.png':
                                                                echo 'true-pre';
                                                                break;
                                                            case 'logo_true_postpaid.png':
                                                                echo 'true-post';
                                                                break;
                                                            default:
                                                                // Handle any other case if needed
                                                                break;
                                                        }
                                                        ?>
                                        </div>
                                    </td>
                                </tr>

                                <tr>

                                    <div class="left-cell">
                                        <td>
                                            <div class="detail-box">
                                                <div class="detail-info">
                                                    <h6>
                                                        <i class="fa fa-plus-square-o" aria-hidden="true"></i>
                                                        <span><?= $number['sum']; ?></span>
                                                    </h6>

                                                </div>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="detail-box">
                                                <div class="detail-info">

                                                    <h6>
                                                        <?php
                                                                    $price = $number['price'];
                                                                    if ($price > 0) {
                                                                        echo '<i class="fa fa-money" aria-hidden="true"></i> ';
                                                                        echo '<span>' . number_format($price) . '.-</span>';
                                                                    }
                                                                    ?>
                                                    </h6>
                                                </div>
                                            </div>
                                        </td>

                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </div>
                                    <td colspan=2 class="right-cell">
                                        <div class="option-box">
                                            <?php
                                                        $status = $number['status'];
                                                        if ($status === 'avialable') {
                                                            echo '<a href="createOrder.php?id=' . $number['id'] . '" class="apply-btn">detail</a>';
                                                        } elseif ($status === 'booked') {
                                                            echo '<button class="booked-btn">Booked</button>';
                                                        }
                                                        ?>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>

                    <style>
                    .table-layout {
                        width: 100%;
                    }

                    .left-cell {
                        width: 60%;
                    }

                    .right-cell {
                        width: 20%;
                    }
                    </style>


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
    <script src="js/jquery-3.4.1.min.js"></script>
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
    <!-- <script src="https://code.jquery.com/jquery-3.6.0.js"></script> -->


</body>

</html>