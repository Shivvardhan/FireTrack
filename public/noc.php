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
                    <h3>NOC Application form from Fire Department</h3>
                    <p class="mb-0">Please provide accurate details for your NOC application.</p>
                </div>
            </div>
        </div>
    </div>
    <form action="process_noc_application.php" method="POST" enctype="multipart/form-data">
        <div class="card-body bg-light">
            <div class="tab-content">
                <div class="tab-pane preview-tab-pane active" role="tabpanel" aria-labelledby="tab-dom-aaae31fb-8418-4ebf-bfb2-12b905874396" id="dom-aaae31fb-8418-4ebf-bfb2-12b905874396">
                    
                    <!-- Applicant Details -->
                    <h4 class="mt-4">Applicant Details</h4>
                    <div class="mb-3">
                        <label class="form-label" for="applicant_name">Name of the Applicant/Owner</label>
                        <input class="form-control" id="applicant_name" type="text" placeholder="Enter your full name" name="applicant_name" required />
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="applicant_email">Email Address</label>
                        <input class="form-control" id="applicant_email" type="email" placeholder="Enter your email address" name="applicant_email" required />
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="applicant_phone">Phone Number</label>
                        <input class="form-control" id="applicant_phone" type="tel" placeholder="Enter your phone number" name="applicant_phone" required />
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="applicant_address">Address of the Property/Site</label>
                        <textarea class="form-control" id="applicant_address" rows="3" placeholder="Enter the address of the property/site" name="applicant_address" required></textarea>
                    </div>

                    <!-- Building Details -->
                    <h4 class="mt-4">Building Details</h4>
                    <div class="mb-3">
                        <label class="form-label" for="building_type">Type of Building</label>
                        <select class="form-select" id="building_type" name="building_type" required>
                            <option selected value="">Select building type</option>
                            <option value="residential">Residential</option>
                            <option value="commercial">Commercial</option>
                            <option value="industrial">Industrial</option>
                            <option value="other">Other</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="built_up_area">Total Built-Up Area (sq ft)</label>
                        <input class="form-control" id="built_up_area" type="number" placeholder="Enter the total built-up area in square feet" name="built_up_area" required />
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="number_of_floors">Number of Floors</label>
                        <input class="form-control" id="number_of_floors" type="number" placeholder="Enter the number of floors" name="number_of_floors" required />
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="intended_use">Intended Use of the Building</label>
                        <textarea class="form-control" id="intended_use" rows="3" placeholder="Enter the intended use of the building" name="intended_use" required></textarea>
                    </div>

                    <!-- Fire Safety Equipment Details -->
                    <h4 class="mt-4">Fire Safety Equipment Details</h4>
                    <div class="mb-3">
                        <label class="form-label" for="fire_extinguishers">Number and Type of Fire Extinguishers</label>
                        <input class="form-control" id="fire_extinguishers" type="text" placeholder="e.g., 2 kg dry chemical" name="fire_extinguishers" required />
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="fire_alarm_system">Fire Alarm System Specifications</label>
                        <input class="form-control" id="fire_alarm_system" type="text" placeholder="Enter fire alarm system specifications" name="fire_alarm_system"  />
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="emergency_lighting">Emergency Lighting and Exit Signage Locations</label>
                        <textarea class="form-control" id="emergency_lighting" rows="3" placeholder="Enter emergency lighting and exit signage locations" name="emergency_lighting" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="fire_hydrant_system">Fire Hydrant System (if applicable)</label>
                        <input class="form-control" id="fire_hydrant_system" type="text" placeholder="Enter fire hydrant system details" name="fire_hydrant_system" />
                    </div>

                    <!-- Utility Information -->
                    <h4 class="mt-4">Utility Information</h4>
                    <div class="mb-3">
                        <label class="form-label" for="water_supply_source">Water Supply Source for Firefighting</label>
                        <input class="form-control" id="water_supply_source" type="text" placeholder="e.g., overhead tank, municipal connection" name="water_supply_source" required />
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="access_points">Access Points for Fire Tenders (Road Width, Entry/Exit Points)</label>
                        <textarea class="form-control" id="access_points" rows="3" placeholder="Enter access points for fire tenders" name="access_points" required></textarea>
                    </div>

                    <!-- Declaration -->
                    <h4 class="mt-4">Declaration</h4>
                    <div class="mb-3">
                        <label class="form-label" for="declaration">Signed Declaration Stating Compliance with Fire Safety Norms</label>
                        <textarea class="form-control" id="declaration" rows="3" placeholder="Enter your declaration" name="declaration" required></textarea>
                    </div>

                    <!-- Documents to Be Uploaded -->
                    <h4 class="mt-4">Documents to Be Uploaded</h4>
                    <div class="mb-3">
                        <label class="form-label" for="land_ownership_proof">Land Ownership Proof (Sale Deed, Lease Agreement, or Property Tax Receipt)</label>
                        <input class="form-control" id="land_ownership_proof" type="file" name="land_ownership_proof" accept=".pdf,.jpg,.jpeg,.png" required />
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="approved_building_plans">Approved Building Plans (Signed by a Licensed Architect)</label>
                        <input class="form-control" id="approved_building_plans" type="file" name="approved_building_plans" accept=".pdf,.jpg,.jpeg,.png" required />
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="fire_safety_layout">Detailed Fire Safety Layout</label>
                        <input class="form-control" id="fire_safety_layout" type="file" name="fire_safety_layout" accept=".pdf,.jpg,.jpeg,.png" required />
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="structural_stability_certificate">Structural Stability Certificate (Issued by a Licensed Civil Engineer)</label>
                        <input class="form-control" id="structural_stability_certificate" type="file" name="structural_stability_certificate" accept=".pdf,.jpg,.jpeg,.png" required />
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="fire_safety_equipment_details">Specifications of Installed Fire Safety Equipment</label>
                        <input class="form-control" id="fire_safety_equipment_details" type="file" name="fire_safety_equipment_details" accept=".pdf,.jpg,.jpeg,.png" required />
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="utility_clearances">Utility Clearances (Water Connection Approval for Firefighting Purposes)</label>
                        <input class="form-control" id="utility_clearances" type="file" name="utility_clearances" accept=".pdf,.jpg,.jpeg,.png" required />
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="affidavit">Notarized Affidavit Confirming Adherence to Fire Safety Norms</label>
                        <input class="form-control" id="affidavit" type="file" name="affidavit" accept=".pdf,.jpg,.jpeg,.png" required />
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="fee_payment_receipt">Proof of Payment for Fire NOC Application Fees</label>
                        <input class="form-control" id="fee_payment_receipt" type="file" name="fee_payment_receipt" accept=".pdf,.jpg,.jpeg,.png" required />
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="additional_documents">Additional Documents (If Applicable)</label>
                        <input class="form-control" id="additional_documents" type="file" name="additional_documents" accept=".pdf,.jpg,.jpeg,.png" />
                    </div>

                    <!-- Submit Button -->
                    <div class="col-12">
                        <input class="btn btn-primary" type="submit" value="Submit Application" name="submit">
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