<?php

$hu_id = $_SESSION['id'];
//echo $hu_id;

$sum = 0;
 include('phpscripts/connection.php');
   $sql = "SELECT * FROM `deposit_list` WHERE u_id = '$hu_id' AND status = 'pending'";
$prods = [];
          if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result)>0){
        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            $sum += $row['amount'];
            $prods[] = $row;
            
        }
    }
          }
//print_r($prods);
?>
    <!-- Page wrapper  -->
    <div class="page-wrapper">
        <!-- Bread crumb -->
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h3 class="text-primary">Deposit List</h3>
            </div>
            <div class="col-md-7 align-self-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active">Deposit List</li>
                </ol>
            </div>
        </div>
        <!-- End Bread crumb -->
        <!-- Container fluid  -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12 text-left">
                    <div class="card p-30 bg-primary">
                        <h5 class="text-white">Your deposits</h5>

                        <div class="card-body">


                            <b>Total: $<?php echo  normalize_amount($sum); ?></b><br><br>

                            <div class="table-responsive">
                                <table class="table table-centered m-0">
                                    <tr>
                                        <td class=item>
                                            <table class="table table-centered bg-warning m-0 text-center">

                                                <tr>

                                                    <td colspan=3 align=center>
                                                        <div class="alert alert-success text-center" role="alert"><b>Basic</b></div>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <thead class="thead-dark">
                                                        <th>Plan</th>
                                                        <th>Amount Spent ($)</th>
                                                        <th>
                                                            <nobr> Profit (%)</nobr>
                                                        </th>
                                                </tr>
                                                </thead>
                                                <tr>
                                                    <td class=item>Plan 1</td>
                                                    <td class=item>$100.00 - $499.00</td>
                                                    <td class=item>10.00</td>
                                                </tr>
                                            </table>
                                            <br>
                                            <table class="table table-borderless  table-centered m-0">
                                                <?php
                                                $basic_prods = [];
                                                if(!empty($prods) && $prods[0] != ''){
                                                    foreach($prods as $prod){
                                                        if($prod['type'] == '1'){
                                                            $basic_prods[] = $prod;
                                                        }
                                                    
                                                }
                                                }
                                                if(!empty($basic_prods) && $basic_prods[0] != ''){
                                                    foreach($basic_prods as $prod){
                                                        $profit = (10/100) * $prod['amount'];
                                                        $profit = normalize_amount($profit);
                                                        ?>
                                                    <tr>
                                                    <td colspan=1>
                                                        <div style="color:black" class="alert alert-primary text-center">Basic</div>
                                                    </td>
                                                    <td colspan=1>
                                                        <div style="color:black" class="alert alert-primary text-center"><b>$ <?php echo $prod['amount']; ?></b></div>
                                                    </td>
                                                    <td colspan=1>
                                                        <div style="color:black" class="alert alert-primary text-center"><b>$ <?php echo $profit; ?></b></div>
                                                    </td>
                                                        <!-- <td>Plan 1</td>
                                                        <td>$ <?php echo $prod['amount']; ?></td>
                                                        <td>$ <?php echo $profit; ?></td>
                                                        <td> $ <?php echo $profit; ?></td> -->
                                                    </tr>
                                                        <?php
                                                    }
                                                    
                                                }else{
                                                    ?>
                                                <tr>
                                                    <td colspan=4>
                                                        <div class="alert alert-danger text-center" role="alert"><b>No deposits for this
                                                            plan</b></div>
                                                    </td>
                                                </tr>
                                                    <?php
                                                }
                                                ?>
                                            </table>
                                            <br>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <br>

                            <div class="table-responsive">
                                <table class="table table-centered m-0">
                                    <tr>
                                        <td class=item>
                                            <table class="table table-centered bg-warning m-0 text-center">

                                                <tr>

                                                    <td colspan=3 align="center">
                                                        <div class="alert alert-success" role="alert"><b>Intermediate</b>
                                                        </div>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <thead class="thead-dark">
                                                        <th>Plan</th>
                                                        <th>Amount Spent ($)</th>
                                                        <th>
                                                            <nobr> Profit (%)</nobr>
                                                        </th>
                                                </tr>
                                                </thead>
                                                <tr>
                                                    <td class=item>Plan 1</td>
                                                    <td class=item>$500.00 - $1999.00</td>
                                                    <td class=item>20.00</td>
                                                </tr>
                                            </table>
                                            <br>
                                            <table class="table table-borderless  table-centered m-0">
                                                <?php
                                                $basic_prods = [];
                                                if(!empty($prods) && $prods[0] != ''){
                                                    foreach($prods as $prod){
                                                        if($prod['type'] == '2'){
                                                            $basic_prods[] = $prod;
                                                        }
                                                    
                                                }
                                                }
                                                if(!empty($basic_prods) && $basic_prods[0] != ''){
                                                    foreach($basic_prods as $prod){
                                                        $profit = (20/100) * $prod['amount'];
                                                        $profit = normalize_amount($profit);
                                                        ?>
                                                    <tr>
                                                    <td colspan=1>
                                                        <div style="color:black" class="alert alert-primary text-center">Intermediate</div>
                                                    </td>
                                                    <td colspan=1>
                                                        <div style="color:black" class="alert alert-primary text-center"><b>$ <?php echo $prod['amount']; ?></b></div>
                                                    </td>
                                                    <td colspan=1>
                                                        <div style="color:black" class="alert alert-primary text-center"><b>$ <?php echo $profit; ?></b></div>
                                                    </td>
                                                    </tr>
                                                        <?php
                                                    }
                                                    
                                                }else{
                                                    ?>
                                                <tr>
                                                    <td colspan=4>
                                                        <div class="alert alert-danger text-center" role="alert"><b>No deposits for this
                                                            plan</b></div>
                                                    </td>
                                                </tr>
                                                    <?php
                                                }
                                                ?>
                                            </table>
                                            <br>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <br>
                            <div class="table-responsive">
                                <table class="table table-centered m-0">
                                    <tr>
                                        <td class=item>
                                            <table class="table table-centered bg-warning m-0 text-center">

                                                <tr>

                                                    <td colspan=3 align=center>
                                                        <div class="alert alert-success" role="alert"><b>Standard</b></div>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <thead class="thead-dark">
                                                        <th>Plan</th>
                                                        <th>Amount Spent ($)</th>
                                                        <th>
                                                            <nobr> Profit (%)</nobr>
                                                        </th>
                                                </tr>
                                                </thead>
                                                <tr>
                                                    <td class=item>Plan 1</td>
                                                    <td class=item>$2000.00 - $9999.00</td>
                                                    <td class=item>35.00</td>
                                                </tr>
                                            </table>
                                            <br>
                                            <table class="table table-borderless  table-centered m-0">
                                                <?php
                                                $basic_prods = [];
                                                if(!empty($prods) && $prods[0] != ''){
                                                    foreach($prods as $prod){
                                                        if($prod['type'] == '3'){
                                                            $basic_prods[] = $prod;
                                                        }
                                                    
                                                }
                                                }
                                                if(!empty($basic_prods) && $basic_prods[0] != ''){
                                                    foreach($basic_prods as $prod){
                                                        $profit = (35/100) * $prod['amount'];
                                                        $profit = normalize_amount($profit);
                                                        ?>
                                                    <tr>
                                                    <td colspan=1>
                                                        <div style="color:black" class="alert alert-primary text-center">Standard</div>
                                                    </td>
                                                    <td colspan=1>
                                                        <div style="color:black" class="alert alert-primary text-center"><b>$ <?php echo $prod['amount']; ?></b></div>
                                                    </td>
                                                    <td colspan=1>
                                                        <div style="color:black" class="alert alert-primary text-center"><b>$ <?php echo $profit; ?></b></div>
                                                    </td>
                                                    </tr>
                                                        <?php
                                                    }
                                                    
                                                }else{
                                                    ?>
                                                <tr>
                                                    <td colspan=4>
                                                        <div class="alert alert-danger text-center" role="alert"><b>No deposits for this
                                                            plan</b></div>
                                                    </td>
                                                </tr>
                                                    <?php
                                                }
                                                ?>
                                            </table>
                                            <br>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <br>
                            <div class="table-responsive">
                                <table class="table table-centered m-0">
                                    <tr>
                                        <td class=item>
                                            <table class="table table-centered bg-warning m-0 text-center">

                                                <tr>

                                                    <td colspan=3 align=center>
                                                        <div class="alert alert-success" role="alert"><b>Premium</b></div>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <thead class="thead-dark">
                                                        <th>Plan</th>
                                                        <th>Amount Spent ($)</th>
                                                        <th>
                                                            <nobr> Profit (%)</nobr>
                                                        </th>
                                                </tr>
                                                </thead>
                                                <tr>
                                                    <td class=item>Plan 1</td>
                                                    <td class=item>$10000.00 and more</td>
                                                    <td class=item>60.00</td>
                                                </tr>
                                            </table>
                                            <br>
                                            <table class="table table-borderless  table-centered m-0">
                                                <?php
                                                $basic_prods = [];
                                                if(!empty($prods) && $prods[0] != ''){
                                                    foreach($prods as $prod){
                                                        if($prod['type'] == '4'){
                                                            $basic_prods[] = $prod;
                                                        }
                                                    
                                                }
                                                }
                                                if(!empty($basic_prods) && $basic_prods[0] != ''){
                                                    foreach($basic_prods as $prod){
                                                        $profit = (60/100) * $prod['amount'];
                                                        $profit = normalize_amount($profit);
                                                        ?>
                                                    <tr>
                                                    <td colspan=1>
                                                        <div style="color:black" class="alert alert-primary text-center">Premium</div>
                                                    </td>
                                                    <td colspan=1>
                                                        <div style="color:black" class="alert alert-primary text-center"><b>$ <?php echo $prod['amount']; ?></b></div>
                                                    </td>
                                                    <td colspan=1>
                                                        <div style="color:black" class="alert alert-primary text-center"><b>$ <?php echo $profit; ?></b></div>
                                                    </td>
                                                    </tr>
                                                        <?php
                                                    }
                                                    
                                                }else{
                                                    ?>
                                                <tr>
                                                    <td colspan=4>
                                                        <div class="alert alert-danger text-center" role="alert"><b>No deposits for this
                                                            plan</b></div>
                                                    </td>
                                                </tr>
                                                    <?php
                                                }
                                                ?>
                                            </table>
                                            <br>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <br>
                        </div>
                    </div>
                </div>
            </div>
        </div>