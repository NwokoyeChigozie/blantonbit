<!-- Page wrapper  -->
<div class="page-wrapper">
    <!-- Bread crumb -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">Dashboard</h3>
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </div>
    </div>
    <!-- End Bread crumb -->
    <!-- Container fluid  -->
    <div class="container-fluid">
        <!-- Start Page Content -->
        <div class="row">
            <div class="col-sm-12 text-left">
                <div class="card bg-primary p-30">
                    <h5 class="text-white">Earnings</h5>

                    <div class="card-body">

                        <script language=javascript>
                            function go(p) {
                                document.opts.page.value = p;
                                document.opts.submit();
                            }
                        </script>




                        <div class="row">
                            <div class="col-md-12">
                                <form method=post name=opts><input type="hidden" name="form_id" value="16345436472214"><input type="hidden" name="form_token" value="32b77c6bccbe19130a11168aaa24f8fa">
                                    <input type=hidden name=a value=earnings>
                                    <input type=hidden name=page value=1>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <select name=type class="form-control" onchange="document.opts.submit();">
<option value="">All transactions</option>
<option value="deposit" selected>Deposit</option>
<option value="withdrawal" >Withdrawal</option>
<option value="earning" >Earning</option>
<option value="commissions" >Referral commission</option>
   </select>
                                                </div>

                                                <div class="col-md-1">
                                                    <label>From:</label>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name=month_from class="form-control">
<option value=1 >Jan
<option value=2 >Feb
<option value=3 >Mar
<option value=4 >Apr
<option value=5 >May
<option value=6 >Jun
<option value=7 >Jul
<option value=8 >Aug
<option value=9 >Sep
<option value=10 selected>Oct
<option value=11 >Nov
<option value=12 >Dec
</select> &nbsp;
                                                </div>
                                                <div class="col-md-2">
                                                    <select name=day_from class="form-control">
<option value=1 >1
<option value=2 >2
<option value=3 >3
<option value=4 >4
<option value=5 >5
<option value=6 >6
<option value=7 >7
<option value=8 >8
<option value=9 >9
<option value=10 >10
<option value=11 >11
<option value=12 selected>12
<option value=13 >13
<option value=14 >14
<option value=15 >15
<option value=16 >16
<option value=17 >17
<option value=18 >18
<option value=19 >19
<option value=20 >20
<option value=21 >21
<option value=22 >22
<option value=23 >23
<option value=24 >24
<option value=25 >25
<option value=26 >26
<option value=27 >27
<option value=28 >28
<option value=29 >29
<option value=30 >30
<option value=31 >31
</select> &nbsp;
                                                </div>
                                                <div class="col-md-2">
                                                    <select name=year_from class="form-control">
<option value=2011 >2011
<option value=2012 >2012
<option value=2013 >2013
<option value=2014 >2014
<option value=2015 >2015
<option value=2016 >2016
<option value=2017 >2017
<option value=2018 >2018
<option value=2019 >2019
<option value=2020 >2020
<option value=2021 selected>2021
</select><br><img src=images/q.gif width=1 height=4><br>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="row">

                                                <div class="col-md-4">
                                                    <br><img src=images/q.gif width=1 height=4><br>
                                                    <select name=ec class="form-control">
     <option value=-1>All eCurrencies</option>
 <option value=1006 >Bitcoin</option>
 <option value=1007 >Ethereum</option>
   </select>
                                                </div>

                                                <div class="col-md-1">
                                                    <label>To:</label>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name=month_to class="form-control">
<option value=1 >Jan
<option value=2 >Feb
<option value=3 >Mar
<option value=4 >Apr
<option value=5 >May
<option value=6 >Jun
<option value=7 >Jul
<option value=8 >Aug
<option value=9 >Sep
<option value=10 selected>Oct
<option value=11 >Nov
<option value=12 >Dec
</select> &nbsp;
                                                </div>
                                                <div class="col-md-2">
                                                    <select name=day_to class="form-control">
<option value=1 >1
<option value=2 >2
<option value=3 >3
<option value=4 >4
<option value=5 >5
<option value=6 >6
<option value=7 >7
<option value=8 >8
<option value=9 >9
<option value=10 >10
<option value=11 >11
<option value=12 >12
<option value=13 >13
<option value=14 >14
<option value=15 >15
<option value=16 >16
<option value=17 >17
<option value=18 selected>18
<option value=19 >19
<option value=20 >20
<option value=21 >21
<option value=22 >22
<option value=23 >23
<option value=24 >24
<option value=25 >25
<option value=26 >26
<option value=27 >27
<option value=28 >28
<option value=29 >29
<option value=30 >30
<option value=31 >31
</select> &nbsp;
                                                </div>
                                                <div class="col-md-2">
                                                    <select name=year_to class="form-control">
<option value=2011 >2011
<option value=2012 >2012
<option value=2013 >2013
<option value=2014 >2014
<option value=2015 >2015
<option value=2016 >2016
<option value=2017 >2017
<option value=2018 >2018
<option value=2019 >2019
<option value=2020 >2020
<option value=2021 selected>2021
</select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <br/>
                                    <div class="row">
                                        <div class="col-md-4">
                                            &nbsp; <input type=submit value="Go" class="btn btn-primary ml-auto">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <br><br>

                        <div class="table-responsive">
                            <table class="table table-borderless table-hover table-centered m-0">
                                <thead class="thead-light">
                                    <tr>
                                        <th><b>Type</b></th>
                                        <th><b>Amount</b></th>
                                        <th><b>Date</b></th>
                                    </tr>
                                </thead>
                                <tr>
                                    <td colspan=3 align=center>
                                        <div class="alert alert-warning m-b-lg" role="alert">
                                            No transactions found
                                        </div>
                                    </td>
                                </tr>


                                <tr>
                                    <td colspan=2>Total:</td>
                                    <td align=right><b>$ 0.00</b></td>
                                </tr>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    </html>