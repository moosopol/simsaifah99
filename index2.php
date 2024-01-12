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

</head>
<?php include('nav.php'); ?>

<body>

    <!--  -->
    <section id="wrap-simsearch" style=" display: block;     box-sizing: border-box;
}">
        <div class="my-container">
            <div class="row">
                <div class="col-md-6">
                    <h1>Filter Data</h1>
                </div>
            </div>
            <hr>


            <div class="mb-3">
                <form action="filter.php" method="post">
                    <label for="filterBySum" class="col-form-label">Sum:</label>
                    <select type="text" class="form-control" name="filterBySum">
                        <option value="">all</option>
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

                    <label for="network" class="col-form-label">Network:</label>
                    <select type="text" class="form-control" name="network">

                        <option value="">all</option>
                        <option value="logo_ais.png">ais</option>
                        <option value="logo_dtac.png">dtac</option>
                        <option value="logo_dtac_happy.png">happy</option>
                        <option value="logo_true.png">true prepaid</option>
                        <option value="logo_true_postpaid.png">true postpaid</option>
                    </select>

                    <label for="owner">owner:</label>
                    <select name="owner" class="form-control">
                        <option value="">all</option>
                        <option value="0">best</option>
                        <option value="1">mim</option>
                        <option value="2">imm</option>
                    </select>

                    <label for="price">price:</label>
                    <select name="price" class="form-control">
                        <option value="">all</option>
                        <option value="2000">2000</option>
                        <option value="4000">4000</option>
                        <option value="6000">6000</option>
                    </select>

                    <label for="phone_filter">Phone Number Filter:</label>
                    <input type="text" class="form-control" name="phone_filter" placeholder="ใส่เลขที่ชอบ">


                    <div class="col-12 col-md-12 col-lg-8">
                        <label for=""><i class="fa fa-asterisk"></i> ระบุตัวเลขตามตำแหน่ง</label>
                        <div class="form-control" style="flex-direction:row; display: flex;">

                            <div style="flex:0 ; padding:0 1px;  ">
                                <input style="text-align: center; width: 20px ;" align="middle" class="my-container"
                                    type="text" name="digit[]" onkeydown="" maxlength="1" value="0" pattern="[0-9]*">
                            </div>

                            <div style="flex:0; padding:0 1px; ">
                                <input style="text-align: center; width: 20px ;" align="middle" class="my-container"
                                    type="text" name="digit[]" onkeydown="" maxlength="1" value="" pattern="[0-9]*">
                            </div>

                            <div style="flex:0; padding:0 1px; ">
                                <input style="text-align: center; width: 20px ;" align="middle" class="my-container"
                                    type="text" name="digit[]" onkeydown="" maxlength="1" value="" pattern="[0-9]*">
                            </div>
                            -
                            <div style="flex:0; padding:0 1px; ">
                                <input style="text-align: center; width: 20px ;" align="middle" class="my-container"
                                    type="text" name="digit[]" onkeydown="" maxlength="1" value="" pattern="[0-9]*">
                            </div>

                            <div style="flex:0; padding:0 1px; ">
                                <input style="text-align: center; width: 20px ;" align="middle" class="my-container"
                                    type="text" name="digit[]" onkeydown="" maxlength="1" value="" pattern="[0-9]*">
                            </div>

                            <div style="flex:0; padding:0 1px; ">
                                <input style="text-align: center; width: 20px ;" align="middle" class="my-container"
                                    type="text" name="digit[]" onkeydown="" maxlength="1" value="" pattern="[0-9]*">
                            </div>
                            -
                            <div style="flex:0; padding:0 1px; ">
                                <input style="text-align: center; width: 20px ;" align="middle" class="my-container"
                                    type="text" name="digit[]" onkeydown="" maxlength="1" value="" pattern="[0-9]*">
                            </div>

                            <div style="flex:0; padding:0 1px; ">
                                <input style="text-align: center; width: 20px ;" align="middle" class="my-container"
                                    type="text" name="digit[]" onkeydown="" maxlength="1" value="" pattern="[0-9]*">
                            </div>

                            <div style="flex:0; padding:0 1px; ">
                                <input style="text-align: center; width: 20px ;" align="middle" class="my-container"
                                    type="text" name="digit[]" onkeydown="" maxlength="1" value="" pattern="[0-9]*">
                            </div>

                            <div style="flex:0; padding:0 1px; ">
                                <input style="text-align: center; width: 20px ;" align="middle" class="my-container"
                                    type="text" name="digit[]" onkeydown="" maxlength="1" value="" pattern="[0-9]*">
                            </div>
                        </div><br>
                        <div class="row">
                            <div class="col-12 col-md-12 col-lg-12">
                                <button type="submit" id="submit" name="submit" class="btn btn-success">Submit</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Ber</th>
                <th scope="col">network</th>
                <th scope="col">price</th>
                <th scope="col">sum</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $result = $conn->query($sql);
            $result->execute();
            $stock = $result->fetchAll();
            if (!$stock) {
                echo "<tr><td colspan='4' class='text-center'>No phonenumber found</td></tr>";
            } else {
                foreach ($stock as $number) {
                    ?>
            <tr>

                <td><?= $number['phonenumber']; ?></td>
                <td width="15px"><img width="100%" src="network/<?= $number['network']; ?>" class="rounded" alt="">
                </td>
                <td><?= $number['price']; ?></td>
                <td><?= $number['sum']; ?></td>
            </tr>
            <?php }
            } ?>
        </tbody>
    </table>

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



    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
    </script>

</body>

<?php include('footer.php'); ?>


</html>