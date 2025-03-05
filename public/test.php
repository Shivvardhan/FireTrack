<form action="" method="POST">
    <div class="card-body bg-light">
        <div class="tab-content">
        
              
                <div class="mb-3">
                    <label class="form-label" for="exampleFormControlInput1">Pre Name</label>
                    <select class="form-select" required name="pre">

                        <option selected value="">select</option>
                        <option value="Shri">Shri</option>
                        <option value="Smt.">Smt.</option>
                        <option value="Ku.">Ku.</option>

                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="exampleFormControlInput1">Name</label>
                    <input class="form-control" id="exampleFormControlInput1" type="text" placeholder="" required name="name" />
                </div>
                <div class="mb-3">
                    <label class="form-label" for="exampleFormControlInput1">Gender</label>
                    <select class="form-select" required name="gender">

                        <option selected value="">select</option>
                        <option value="M">Male</option>
                        <option value="F">Female</option>
                        <option value="O">Others</option>

                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="exampleFormControlInput1">Date of Birth</label>
                    <input class="form-control" id="exampleFormControlInput1" type="date" placeholder="" required name="dob" max="<?php echo date('Y-m-d');  ?>" min="<?php echo date('Y-m-d', strtotime("-150 years"));  ?>" />
                </div>
                <div class="mb-3">
                    <label class="form-label" for="exampleFormControlInput1">Payment</label>
                    <select class="form-select" required name="payment">

                        <option value="">select</option>
                        <option value="cash" selected>Cash</option>
                        <option value="cheque">Cheque</option>


                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="exampleFormControlInput1">Cheque No.</label>
                    <input class="form-control" id="exampleFormControlInput1" type="text" placeholder="" name="chno" />
                </div>
                <div class="mb-3">
                    <input class="form-control" type="hidden" required value="<?php $d = date('Y-m-d');
                                                                                echo row_count_rdate_with_increment($d); ?>" name="checkup" />
                </div>
                <div class="mb-3">

                    <input class="form-control" id="exampleFormControlInput1" type="hidden" placeholder="" required value="<?php echo date('Y-m-d'); ?>" name="rdate" />
                </div>
                <div class="mb-3">
                    <label class="form-label" for="exampleFormControlInput1">check multiple</label><br>

                    <div class="form-check form-check-inline"><input class="form-check-input" id="inlineCheckbox1" type="checkbox" value="Y" name="d1" /><label class="form-check-label" for="inlineCheckbox1">O.C.T.</label></div>
                    <div class="form-check form-check-inline"><input class="form-check-input" id="inlineCheckbox2" type="checkbox" value="Y" name="d2" /><label class="form-check-label" for="inlineCheckbox2">F.F.A.</label></div>
                    <div class="form-check form-check-inline"><input class="form-check-input" id="inlineCheckbox1" type="checkbox" value="Y" name="d3" /><label class="form-check-label" for="inlineCheckbox1">GREEN LASER</label></div>
                    <div class="form-check form-check-inline"><input class="form-check-input" id="inlineCheckbox2" type="checkbox" value="Y" name="d4" /><label class="form-check-label" for="inlineCheckbox2">YAG LASER</label></div>
                    <div class="form-check form-check-inline"><input class="form-check-input" id="inlineCheckbox1" type="checkbox" value="Y" name="d5" /><label class="form-check-label" for="inlineCheckbox1">B.SCAN</label></div>
                    <div class="form-check form-check-inline"><input class="form-check-input" id="inlineCheckbox2" type="checkbox" value="Y" name="d6" /><label class="form-check-label" for="inlineCheckbox2">F.PHOTO</label></div>
                    <div class="form-check form-check-inline"><input class="form-check-input" id="inlineCheckbox1" type="checkbox" value="Y" name="d7" /><label class="form-check-label" for="inlineCheckbox1">C.C.T.</label></div>
                    <div class="form-check form-check-inline"><input class="form-check-input" id="inlineCheckbox2" type="checkbox" value="Y" name="d8" /><label class="form-check-label" for="inlineCheckbox2">PERIMETRY</label></div>
                    <div class="form-check form-check-inline"><input class="form-check-input" id="inlineCheckbox1" type="checkbox" value="Y" name="d9" /><label class="form-check-label" for="inlineCheckbox1">YAG P.I.</label></div>
                    <div class="form-check form-check-inline"><input class="form-check-input" id="inlineCheckbox2" type="checkbox" value="Y" name="d10" /><label class="form-check-label" for="inlineCheckbox2">AVASTIN INJ</label></div>
                    <div class="form-check form-check-inline"><input class="form-check-input" id="inlineCheckbox1" type="checkbox" value="Y" name="d11" /><label class="form-check-label" for="inlineCheckbox1">GLAUCOMA WORK UP</label></div>
                    <div class="form-check form-check-inline"><input class="form-check-input" id="inlineCheckbox2" type="checkbox" value="Y" name="d12" /><label class="form-check-label" for="inlineCheckbox2">I.O.L WORKUP</label></div>

                </div>

               

            </div>
            

        </div>
    </div>
   
</form>