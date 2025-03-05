<?php
session_start();
if (isset($_SESSION['username'])) {
    include "head.php";
    include "function.php";
    include "topandsidenav.php";
    date_default_timezone_set("Asia/Kolkata");

?>
    <div class="card mb-3">
        <div class="bg-holder d-none d-lg-block bg-card" style="background-image:url(assets/img/icons/spot-illustrations/corner-4.png);">
        </div>
        <!--/.bg-holder-->

        <div class="card-body position-relative">
            <div class="row">
                <div class="col-lg-8">
                    <h3>Print List of Patient Between Date</h3>
                    <!-- <p class="mb-0">Please Enter full and acurate data.</p> -->
                </div>
            </div>
        </div>
    </div>
    <form action="print_list.php" method="POST">
        <div class="card-body bg-light">
            <div class="tab-content">
                <div class="tab-pane preview-tab-pane active" role="tabpanel" aria-labelledby="tab-dom-aaae31fb-8418-4ebf-bfb2-12b905874396" id="dom-aaae31fb-8418-4ebf-bfb2-12b905874396">
                    <div class="mb-3">
                        <label class="form-label" for="exampleFormControlInput1">Print Type</label>
                        <select class="form-select" required name="printtype" required>

                            <option selected value="">select</option>
                            <option value="consultation">Patient Consultaion List</option>
                            <option value="treatment">Patient Treatment List</option>
                            <option value="totalot">PaTient Operation List</option>
                            <!-- <option value="O">Both </option> -->

                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="datepicker">Start Date</label>
                        <input class="form-control" id="datepicker" type="date" placeholder="d/m/y" data-options='{"disableMobile":true}' name="startdate" max="<?php echo date('Y-m-d');  ?>" />
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="datepicker">End Date</label>
                        <input class="form-control" id="datepicker" type="date" placeholder="d/m/y" data-options='{"disableMobile":true}' name="enddate" max="<?php echo date('Y-m-d');  ?>" />
                    </div>
                    <div class="col-12">
                        <input class="btn btn-primary" type="submit" value="Print List" name="submit">
                    </div>
                </div>
            </div>
        </div>
    </form>

<?php

    include "footer.php";
} else {
    echo "<script>window.location.href = '../index.php'; </script>";
}
?>