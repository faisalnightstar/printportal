<?php
include('userHeader.php');
include('manu.php');
?>

<div class="content-wrap">
    <div class="main">
        <div class="col-md-12">
            <div class="main-content">
                <section class="section">
                    <div class="section-header">
                        <div class="card-header">


                            <!-- Main content -->
                            <section class="content">
                                <div class="container-fluid">

                                    <div class="row">
                                        <div class="col-md-12">

                                            <!-- Profile Image -->
                                            <div class="card card-primary card-outline">
                                                <div class="card-body box-profile">

                                                    <h3 class="profile-username text-bottom">Add Money using <span style="color:rgb(255, 99, 71)">Print Portal Card</span></h3>
                                                    <h6>Add Minimum Balance Rs. 100</h6>
                                                    <div class="d-flex d-lg-flex d-md-block align-items-center">
                                                        <div>

                                                            <form class="mt-2" method="post" action="findwalletpay/index.php">

                                                                <div class="form-group">

                                                                    <input tabindex="2" type="hidden" maxlength="15" size="15" name="userid" autocomplete="off" value="<?php echo $_SESSION['userid'] ?>">
                                                                    <input tabindex="2" type="hidden" maxlength="15" size="15" name="emailid" autocomplete="off" value="<?php echo $rw['emailid'] ?>">
                                                                    <input tabindex="2" type="hidden" maxlength="15" size="15" name="phone" autocomplete="off" value="<?php echo $rw['mobileno'] ?>">
                                                                    <!--New code added-->
                                                                    <div class="info-item">
                                                                        <label for="email" style="font-weight: bold;">Email ID:</label>
                                                                        <span id="email"><?php echo $rw['emailid']; ?></span>
                                                                    </div>

                                                                    <div class="info-item">
                                                                        <label for="phone" style="font-weight: bold;">Mobile Number:</label>
                                                                        <span id="phone"><?php echo $rw['mobileno']; ?></span>
                                                                    </div>
                                                                      <!--New code added-->
                                                                    <input type="number" class="form-control" min="10" id="amount" name="amount" required="" placeholder="ENTER AMOUNT HERE">
                                                                </div>

                                                                <button class="btn-primary" style="width:100%"> Add Money </button>


                                                            </form>
                                                            </h6>
                                                        </div>
                                                        <div class="ml-auto mt-md-3 mt-lg-0">
                                                            <span class=""><img src="https://www.logo.wine/a/logo/Paytm/Paytm-Logo.wine.svg" alt="" height="60px" width="60px"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- *************************************************************** -->
                                        <!-- End Sales Charts Section -->
                                        <!-- *************************************************************** -->

                                    </div>
                                </div>
                        </div>
                        <!-- ./wrapper -->


                        </body>

                        </html>
                        <?php
                        include('userFooter.php');
                        ?>