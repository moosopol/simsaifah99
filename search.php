<?php
session_start();
require_once 'config/db.php';


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css ">
    <!--  -->
    <link href="https://www.siamphone.com/style/luckynumber-category.css" rel="stylesheet" type="text/css">
    <link href="https://www.siamphone.com/style/bootstrap5.1/css/bootstrap.min.css" rel="stylesheet"
        crossorigin="anonymous">
    <link href="https://www.siamphone.com/style/search-luckynumber.css" rel="stylesheet" type="text/css">
    <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet">
    <!--  -->
</head>
<?php include('nav.php'); ?>

<body>

    <div class="container ">
        <section id="wrap-simsearch">
            <div class="container">
                <div class="my-container">
                    <div class="search-function">
                        <h1>ค้นหาเบอร์มงคล</h1>
                        <form action="search.php" method="post">
                            <div class="row mb-4">
                                <div class="col-12 col-md-12 col-lg-8">

                                    <div class="">
                                        <label for="tellNumber" class="text-left"><span> ใส่ตำแหน่งเลขที่ต้องการ
                                                :</span></label>
                                        <div class="field-filter">
                                            <input type="tel" id="tellNumber" name="txtNumber[0]" maxlength="1"
                                                value="0" class="textNumber">
                                            <input type="tel" class="textNumber" maxlength="1" name="txtNumber[1]"
                                                autocomplete="off" value="">
                                            <input type="tel" class="textNumber" maxlength="1" name="txtNumber[2]"
                                                autocomplete="off" value="">
                                            <span>-</span>
                                            <input type="tel" class="textNumber" maxlength="1" name="txtNumber[3]"
                                                autocomplete="off" value="">
                                            <input type="tel" class="textNumber" maxlength="1" name="txtNumber[4]"
                                                autocomplete="off" value="">
                                            <input type="tel" class="textNumber" maxlength="1" name="txtNumber[5]"
                                                autocomplete="off" value="">
                                            <span>-</span>
                                            <input type="tel" class="textNumber" maxlength="1" name="txtNumber[6]"
                                                autocomplete="off" value="">
                                            <input type="tel" class="textNumber" maxlength="1" name="txtNumber[7]"
                                                autocomplete="off" value="">
                                            <input type="tel" class="textNumber" maxlength="1" name="txtNumber[8]"
                                                autocomplete="off" value="">
                                            <input type="tel" class="textNumber" maxlength="1" name="txtNumber[9]"
                                                autocomplete="off" value="">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-9 col-lg-4 block-network">
                                    <label for="" class="text-left"><span>เครือข่าย :</span></label>
                                    <ul class="tab-list">

                                        <li class="checkbox">
                                            <input type="checkbox" name="network[0]" id="network_dtac" class=""
                                                value="Dtac">
                                            <label for="network_dtac"><img
                                                    src="https://www.siamphone.com/images/partner/logo_dtac.png"
                                                    width="60" height="30" alt=""></label>
                                        </li>
                                        <li class="checkbox">
                                            <input type="checkbox" name="network[1]" id="network_true" class=""
                                                value="True">
                                            <label for="network_true"><img
                                                    src="https://www.siamphone.com/images/partner/logo_true.png"
                                                    width="60" height="30" alt=""></label>
                                        </li>
                                        <li class="checkbox">
                                            <input type="checkbox" name="network[2]" id="network_ais" class=""
                                                value="Ais">
                                            <label for="network_ais"><img
                                                    src="https://www.siamphone.com/images/partner/logo_ais.png"
                                                    width="60" height="30" alt=""></label>
                                        </li>

                                    </ul>
                                </div>

                                <hr>

                                <div class="col-3 col-md-3 col-lg-2 block-totalNumber">
                                    <label for="totalNumber" class="text-left"><span> ผลรวม<span
                                                class="d-none d-lg-inline">เลข</span> :</span></label>
                                    <div class="">
                                        <input type="text" id="totalNumber" name="totalNumber" maxlength="2" value=""
                                            class="totalNumber">
                                    </div>
                                </div>
                                <div class="col-9 col-md-6 col-lg-4 block-number-gb">
                                    <div class="row">
                                        <div class="col-6 col-md-6">
                                            <label for="goodNumber" class="text-left"><span> เลขที่ชอบ :</span></label>
                                            <div class="">
                                                <input type="text" class="goodNumber" maxlength="1" name="goodNumber[]"
                                                    autocomplete="off" value="">
                                                <input type="text" class="goodNumber" maxlength="1" name="goodNumber[]"
                                                    autocomplete="off" value="">
                                            </div>
                                        </div>
                                        <div class="col-6 col-md-6">
                                            <label for="badNumber" class="text-left"><span> เลขที่ไม่ชอบ
                                                    :</span></label>
                                            <div class="">
                                                <input type="text" class="badNumber" maxlength="1" name="badNumber[]"
                                                    autocomplete="off" value="">
                                                <input type="text" class="badNumber" maxlength="1" name="badNumber[]"
                                                    autocomplete="off" value="">
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-6 col-md-3 col-lg-3">
                                    <label for="simCategory" class="text-left"><span> หมวดหมู่เบอร์ :</span></label>
                                    <div class="wrapper-demo">
                                        <div id="simCategory" class="wrapper-dropdown-3">
                                            <span class="showtext">เลือกหมวดหมู่</span>
                                            <ul class="dropdown">
                                                <li class="checkbox">
                                                    <input type="checkbox" name="sim_cat[]" id="sim_cat1" class=""
                                                        value="1">
                                                    <label for="sim_cat1">789 เบอร์มังกร</label>
                                                </li>
                                                <li class="checkbox">
                                                    <input type="checkbox" name="sim_cat[]" id="sim_cat2" class=""
                                                        value="2">
                                                    <label for="sim_cat2">782 เบอร์มังกร</label>
                                                </li>
                                                <li class="checkbox">
                                                    <input type="checkbox" name="sim_cat[]" id="sim_cat3" class=""
                                                        value="3">
                                                    <label for="sim_cat3">287 เบอร์มังกร</label>
                                                </li>
                                                <li class="checkbox">
                                                    <input type="checkbox" name="sim_cat[]" id="sim_cat4" class=""
                                                        value="4">
                                                    <label for="sim_cat4">787 เบอร์มังกร</label>
                                                </li>
                                                <li class="checkbox">
                                                    <input type="checkbox" name="sim_cat[]" id="sim_cat5" class=""
                                                        value="5">
                                                    <label for="sim_cat5">879 เบอร์มังกร</label>
                                                </li>
                                                <li class="checkbox">
                                                    <input type="checkbox" name="sim_cat[]" id="sim_cat6" class=""
                                                        value="6">
                                                    <label for="sim_cat6">289 เบอร์หงส์</label>
                                                </li>
                                                <li class="checkbox">
                                                    <input type="checkbox" name="sim_cat[]" id="sim_cat7" class=""
                                                        value="7">
                                                    <label for="sim_cat7">282 เบอร์หงส์</label>
                                                </li>
                                                <li class="checkbox">
                                                    <input type="checkbox" name="sim_cat[]" id="sim_cat8" class=""
                                                        value="8">
                                                    <label for="sim_cat8">639 เบอร์โชค เงิน ทอง</label>
                                                </li>
                                                <li class="checkbox">
                                                    <input type="checkbox" name="sim_cat[]" id="sim_cat9" class=""
                                                        value="9">
                                                    <label for="sim_cat9">415 เบอร์เรียนเก่ง</label>
                                                </li>
                                                <li class="checkbox">
                                                    <input type="checkbox" name="sim_cat[]" id="sim_cat10" class=""
                                                        value="10">
                                                    <label for="sim_cat10">239 เบอร์เสน่ห์แรง ค้าขายปัง</label>
                                                </li>
                                                <li class="checkbox">
                                                    <input type="checkbox" name="sim_cat[]" id="sim_cat11" class=""
                                                        value="11">
                                                    <label for="sim_cat11">539 เบอร์เสริมพลังในการทำงาน</label>
                                                </li>
                                                <li class="checkbox">
                                                    <input type="checkbox" name="sim_cat[]" id="sim_cat12" class=""
                                                        value="12">
                                                    <label for="sim_cat12">เบอร์มงคลราคาประหยัด</label>
                                                </li>
                                                <li class="checkbox">
                                                    <input type="checkbox" name="sim_cat[]" id="sim_cat13" class=""
                                                        value="13">
                                                    <label for="sim_cat13">เบอร์วีไอพี</label>
                                                </li>
                                                <li class="checkbox">
                                                    <input type="checkbox" name="sim_cat[]" id="sim_cat14" class=""
                                                        value="14">
                                                    <label for="sim_cat14">เบอร์สุขภาพ</label>
                                                </li>
                                                <li class="checkbox">
                                                    <input type="checkbox" name="sim_cat[]" id="sim_cat15" class=""
                                                        value="15">
                                                    <label for="sim_cat15">เบอร์สวยเบอร์จำง่าย</label>
                                                </li>
                                                <li class="checkbox">
                                                    <input type="checkbox" name="sim_cat[]" id="sim_cat16" class=""
                                                        value="16">
                                                    <label for="sim_cat16">เบอร์มงคล</label>
                                                </li>
                                                <li class="checkbox">
                                                    <input type="checkbox" name="sim_cat[]" id="sim_cat17" class=""
                                                        value="17">
                                                    <label for="sim_cat17">กลุ่มปัญญา การเรียน ราชการ</label>
                                                </li>
                                                <li class="checkbox">
                                                    <input type="checkbox" name="sim_cat[]" id="sim_cat18" class=""
                                                        value="18">
                                                    <label for="sim_cat18">เบอร์เสน่ห์ค้าขายดี</label>
                                                </li>
                                                <li class="checkbox">
                                                    <input type="checkbox" name="sim_cat[]" id="sim_cat19" class=""
                                                        value="19">
                                                    <label for="sim_cat19">เบอร์ร่ำรวยรักรุ่ง</label>
                                                </li>
                                                <li class="checkbox">
                                                    <input type="checkbox" name="sim_cat[]" id="sim_cat20" class=""
                                                        value="20">
                                                    <label for="sim_cat20">เบอร์สุขภาพงานเด่น</label>
                                                </li>
                                                <li class="checkbox">
                                                    <input type="checkbox" name="sim_cat[]" id="sim_cat21" class=""
                                                        value="21">
                                                    <label for="sim_cat21">เบอร์งานเด่นปัญญาดี</label>
                                                </li>
                                                <li class="checkbox">
                                                    <input type="checkbox" name="sim_cat[]" id="sim_cat22" class=""
                                                        value="22">
                                                    <label for="sim_cat22">เบอร์รุ่งเรืองมั่งคั่ง</label>
                                                </li>
                                                <li class="checkbox">
                                                    <input type="checkbox" name="sim_cat[]" id="sim_cat23" class=""
                                                        value="23">
                                                    <label for="sim_cat23">เบอร์กวนอู</label>
                                                </li>
                                                <li class="checkbox">
                                                    <input type="checkbox" name="sim_cat[]" id="sim_cat24" class=""
                                                        value="24">
                                                    <label for="sim_cat24">เบอร์หงส์ มังกร</label>
                                                </li>


                                            </ul>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-6 col-md-3 col-lg-3">
                                    <label for="priceRange" class="text-left"><span> ช่วงราคา :</span></label>
                                    <div class="wrapper-demo">
                                        <div id="priceRange" class="wrapper-dropdown-3">
                                            <span class="showtext">เลือกช่วงราคา</span>
                                            <ul class="dropdown">
                                                <li class="radio">
                                                    <input type="radio" name="price" id="price01" class="" value="2999">
                                                    <label for="price01">เบอร์มงคลราคาประหยัด</label>
                                                </li>

                                                <li class="radio">
                                                    <input type="radio" name="price" id="price02" class="" value="3000">
                                                    <label for="price02">ไม่เกิน 3,000</label>
                                                </li>

                                                <li class="radio">
                                                    <input type="radio" name="price" id="price03" class="" value="5000">
                                                    <label for="price03">ไม่เกิน 5,000</label>
                                                </li>

                                                <li class="radio">
                                                    <input type="radio" name="price" id="price04" class=""
                                                        value="10000">
                                                    <label for="price04">ไม่เกิน 10,000</label>
                                                </li>

                                                <li class="radio">
                                                    <input type="radio" name="price" id="price05" class=""
                                                        value="50000">
                                                    <label for="price05">ไม่เกิน 50,000</label>
                                                </li>

                                                <li class="radio">
                                                    <input type="radio" name="price" id="price06" class=""
                                                        value="50001">
                                                    <label for="price06">50,000 ขึ้นไป</label>
                                                </li>

                                            </ul>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <!-- <hr />

                        <div class="row">
                            <div class="col-md-12">
                                <label for="price_range" class="text-left"><span>ราคา :</span></label> 
                                <input type="text" id="demo_2" class="js-range-slider" name="my_range" value="" />
                            </div>
                        </div> -->


                            <div class="row">
                                <div class="col-12 col-md-12 col-lg-12">
                                    <button type="submit" class="btn btn-search">ค้นหาเบอร์</button>
                                </div>
                            </div>

                        </form>
                    </div>



                </div><!-- end tab two -->


            </div>

        </section>
        <!--  -->
        <div class="card">
            <div class="card-body">


                <!-- START SEARCH -->
                <script src="https://momentjs.com/downloads/moment.min.js"></script>
                <link rel="stylesheet"
                    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
                <form method="GET" action="https://explore.berthongpol.com/number" accept-charset="UTF-8" class=""
                    role="search">

                    <div class="row mt-4">
                        <div class="form-group col-lg-6">
                            <label for=""><i class="fa fa-search"></i> ค้นหาเบอร์</label>


                            <input type="text" class="form-control" id="search" name="search" value="">

                        </div>
                    </div>

                    <div class="row">

                        <div class="form-group col-lg-6">
                            <label for=""><i class="fa fa-signal"></i> ค่ายมือถือ</label>
                            <select name="operator" id="operator" class="form-control">
                                <option value="">ทั้งหมด</option>
                                <option value="ais"
                                    style="background-image:url(https://explore.berthongpol.com/img/operators/logo_ais.jpg); background-repeat: no-repeat, repeat;">
                                    ais (1,694 รายการ)
                                </option>
                                <option value="dtac"
                                    style="background-image:url(https://explore.berthongpol.com/img/operators/logo_dtac.jpg); background-repeat: no-repeat, repeat;">
                                    dtac (9,816 รายการ)
                                </option>
                                <option value="happy"
                                    style="background-image:url(https://explore.berthongpol.com/img/operators/logo_happy.jpg); background-repeat: no-repeat, repeat;">
                                    happy (12,989 รายการ)
                                </option>
                                <option value="my"
                                    style="background-image:url(https://explore.berthongpol.com/img/operators/logo_my.jpg); background-repeat: no-repeat, repeat;">
                                    my (11 รายการ)
                                </option>
                                <option value="true"
                                    style="background-image:url(https://explore.berthongpol.com/img/operators/logo_true.jpg); background-repeat: no-repeat, repeat;">
                                    true (3,531 รายการ)
                                </option>

                            </select>
                        </div>

                        <div class="form-group col-lg-6">
                            <label for=""><i class="fa fa-birthday-cake"></i> ตามวันเกิด</label>
                            <select name="birthday" id="birthday" class="form-control">
                                <option value="">ทั้งหมด</option>

                                <option value="sun">เกิดวันอาทิตย์ </option>

                                <option value="mon">เกิดวันจันทร์ </option>

                                <option value="tue">เกิดวันอังคาร </option>

                                <option value="wed">เกิดวันพุธ </option>

                                <option value="thu">เกิดวันพฤหัส </option>

                                <option value="fri">เกิดวันศุกร์ </option>

                                <option value="saa">เกิดวันเสาร์ </option>
                            </select>
                            <input type="password" class="form-control d-none" id="exampleInputPassword1">
                        </div>

                        <div class="form-group col-lg-6">
                            <label for=""><i class="fa fa-align-justify"></i> ผลรวมเบอร์</label>
                            <select name="total" id="total" class="form-control">
                                <option value="">ทั้งหมด</option>

                                <option value="30">30 (มี 4 รายการ)</option>

                                <option value="31">31 (มี 3 รายการ)</option>

                                <option value="32">32 (มี 3 รายการ)</option>

                                <option value="33">33 (มี 19 รายการ)</option>

                                <option value="34">34 (มี 40 รายการ)</option>

                                <option value="35">35 (มี 63 รายการ)</option>

                                <option value="36">36 (มี 23 รายการ)</option>

                                <option value="37">37 (มี 151 รายการ)</option>

                                <option value="38">38 (มี 196 รายการ)</option>

                                <option value="39">39 (มี 350 รายการ)</option>

                                <option value="40">40 (มี 349 รายการ)</option>

                                <option value="41">41 (มี 235 รายการ)</option>

                                <option value="42">42 (มี 246 รายการ)</option>

                                <option value="43">43 (มี 1,235 รายการ)</option>

                                <option value="44">44 (มี 665 รายการ)</option>

                                <option value="45">45 (มี 543 รายการ)</option>

                                <option value="46">46 (มี 868 รายการ)</option>

                                <option value="47">47 (มี 2,023 รายการ)</option>

                                <option value="48">48 (มี 2,426 รายการ)</option>

                                <option value="49">49 (มี 2,424 รายการ)</option>

                                <option value="50">50 (มี 1,369 รายการ)</option>

                                <option value="51">51 (มี 1,058 รายการ)</option>

                                <option value="52">52 (มี 2,533 รายการ)</option>

                                <option value="53">53 (มี 2,363 รายการ)</option>

                                <option value="54">54 (มี 942 รายการ)</option>

                                <option value="55">55 (มี 918 รายการ)</option>

                                <option value="56">56 (มี 833 รายการ)</option>

                                <option value="57">57 (มี 1,765 รายการ)</option>

                                <option value="58">58 (มี 1,433 รายการ)</option>

                                <option value="59">59 (มี 525 รายการ)</option>

                                <option value="60">60 (มี 624 รายการ)</option>

                                <option value="61">61 (มี 733 รายการ)</option>

                                <option value="62">62 (มี 488 รายการ)</option>

                                <option value="63">63 (มี 171 รายการ)</option>

                                <option value="64">64 (มี 195 รายการ)</option>

                                <option value="65">65 (มี 34 รายการ)</option>

                                <option value="66">66 (มี 89 รายการ)</option>

                                <option value="67">67 (มี 58 รายการ)</option>

                                <option value="68">68 (มี 25 รายการ)</option>

                                <option value="69">69 (มี 8 รายการ)</option>

                                <option value="70">70 (มี 8 รายการ)</option>

                                <option value="71">71 (มี 2 รายการ)</option>

                                <option value="72">72 (มี 1 รายการ)</option>
                            </select>
                            <input type="password" class="form-control d-none" id="exampleInputPassword1">
                        </div>


                        <div class="form-group col-lg-6">
                            <label for=""><i class="fa fa-tags"></i> ค้นหาจากราคา</label>
                            <select name="price" id="price" class="form-control">
                                <option value="1000000">ทุกราคา</option>
                                <option value="1000">ไม่เกิน 1,000</option>
                                <option value="1500">ไม่เกิน 1,500</option>
                                <option value="2000">ไม่เกิน 2,000</option>
                                <option value="2500">ไม่เกิน 2,500</option>
                                <option value="3000">ไม่เกิน 3,000</option>
                                <option value="4000">ไม่เกิน 4,000</option>
                                <option value="5000">ไม่เกิน 5,000</option>
                                <option value="8000">ไม่เกิน 8,000</option>
                                <option value="10000">ไม่เกิน 10,000</option>
                                <option value="20000">ไม่เกิน 20,000</option>

                            </select>
                        </div>

                        <div class="form-group col-lg-6">
                            <label for=""><i class="fa fa-sort"></i> เรียงลำดับ</label>
                            <select name="sort" id="sort" class="form-control">
                                <option value="number">หมายเลขเบอร์</option>
                                <option value="asc">ราคาจากน้อยไปหามาก</option>
                                <option value="desc">ราคาจากมากไปหาน้อย</option>

                            </select>
                        </div>

                    </div>

                    <div class="form-group col-lg-6">

                        <label for=""><i class="fa fa-asterisk"></i> ระบุตัวเลขตามตำแหน่ง</label>
                        <div class="my-container" style="flex-direction:row; display: flex;">



                            <div style="flex:5; padding:0 1px; ">
                                <input style="text-align: center;" align="middle" class="my-container" type="text"
                                    name="numbers[]" onkeydown="" maxlength="1" value="0" pattern="[0-9]*">
                            </div>




                            <div style="flex:5; padding:0 1px; ">
                                <input style="text-align: center;" align="middle" class="my-container" type="text"
                                    name="numbers[]" onkeydown="" maxlength="1" value="" pattern="[0-9]*">
                            </div>




                            <div style="flex:5; padding:0 1px; ">
                                <input style="text-align: center;" align="middle" class="my-container" type="text"
                                    name="numbers[]" onkeydown="" maxlength="1" value="" pattern="[0-9]*">
                            </div>




                            <div style="flex:5; padding:0 1px; ">
                                <input style="text-align: center;" align="middle" class="my-container" type="text"
                                    name="numbers[]" onkeydown="" maxlength="1" value="" pattern="[0-9]*">
                            </div>




                            <div style="flex:5; padding:0 1px; ">
                                <input style="text-align: center;" align="middle" class="my-container" type="text"
                                    name="numbers[]" onkeydown="" maxlength="1" value="" pattern="[0-9]*">
                            </div>




                            <div style="flex:5; padding:0 1px; ">
                                <input style="text-align: center;" align="middle" class="my-container" type="text"
                                    name="numbers[]" onkeydown="" maxlength="1" value="" pattern="[0-9]*">
                            </div>




                            <div style="flex:5; padding:0 1px; ">
                                <input style="text-align: center;" align="middle" class="my-container" type="text"
                                    name="numbers[]" onkeydown="" maxlength="1" value="" pattern="[0-9]*">
                            </div>




                            <div style="flex:5; padding:0 1px; ">
                                <input style="text-align: center;" align="middle" class="my-container" type="text"
                                    name="numbers[]" onkeydown="" maxlength="1" value="" pattern="[0-9]*">
                            </div>




                            <div style="flex:5; padding:0 1px; ">
                                <input style="text-align: center;" align="middle" class="my-container" type="text"
                                    name="numbers[]" onkeydown="" maxlength="1" value="" pattern="[0-9]*">
                            </div>




                            <div style="flex:5; padding:0 1px; ">
                                <input style="text-align: center;" align="middle" class="my-container" type="text"
                                    name="numbers[]" onkeydown="" maxlength="1" value="" pattern="[0-9]*">
                            </div>


                        </div>

                        <style>
                        .number-sm {
                            width: 100%;
                        }

                        input[type=number]::-webkit-inner-spin-button,
                        input[type=number]::-webkit-outer-spin-button {
                            -webkit-appearance: none;
                            margin: 0;
                        }

                        .dash {
                            border: none;
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
                                // console.log(target.value,maxLength,myLength,next);
                                // console.log(next.parentNode);
                                // console.log(next.parentNode.nextElementSibling);
                                // console.log(next.parentNode.nextElementSibling.firstElementChild );
                                while (next = next.parentNode.nextElementSibling.firstElementChild) {

                                    if (next == null)
                                        break;
                                    if (next.tagName.toLowerCase() === "input" && next.classList.contains(
                                            'digit')) {
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
                    </div>
                    <div class="form-group col-lg-6 ">
                        <label for="">
                            <i class="fa fa-check"></i>
                            เลขที่ต้องการ
                            <span class="text-secondary" data-toggle="tooltip" data-placement="top"
                                title="ตัวอย่างเช่น 55, 88, 99 เป็นต้น">
                                <i class="fa fa-question-circle"></i>
                            </span>
                        </label>
                        <input type="text" class="form-control" id="whitelist" name="whitelist" value="">

                    </div>
                    <div class="form-group col-lg-6">
                        <label for="">
                            <i class="fa fa-times"></i>
                            เลขที่ไม่ต้องการ
                            <span class="text-secondary" data-toggle="tooltip" data-placement="top"
                                title="ตัวอย่างเช่น 00, 11 เป็นต้น">
                                <i class="fa fa-question-circle"></i>
                            </span>
                        </label>
                        <input type="text" class="form-control" id="blacklist" name="blacklist" value="">

                    </div>




                    <a class="btn btn-outline-danger" href="https://explore.berthongpol.com/number">ล้าง</a>
                    <button class="btn btn-danger" type="submit">ค้นหา</button>
                </form>
                <!-- END SEARH -->


            </div>
        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
    </script>








</body>



<?php include('footer.php'); ?>

</html>