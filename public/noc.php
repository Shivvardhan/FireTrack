<?php
session_start();
if (isset($_SESSION['username'])) {
    include "head.php";
    include "function.php";
    include "topandsidenav.php";
    date_default_timezone_set("Asia/Kolkata");
?>
<div class="card mb-3">
    <div class="bg-holder d-none d-lg-block bg-card"
        style="background-image:url(assets/img/icons/spot-illustrations/corner-4.png);">
    </div>
    <!--/.bg-holder-->

    <div class="card-body position-relative">
        <div class="row">
            <div class="col-lg-8">
                <h3>NOC Application form Fire Department</h3>
                <p class="mb-0">Please provide accurate details for your NOC application.</p>
            </div>
        </div>
    </div>
</div>
<form action="#" method="POST" enctype="multipart/form-data">
    <div class="card-body bg-light">
        <div class="tab-content">
            <div class="tab-pane preview-tab-pane active" role="tabpanel"
                aria-labelledby="tab-dom-aaae31fb-8418-4ebf-bfb2-12b905874396"
                id="dom-aaae31fb-8418-4ebf-bfb2-12b905874396">

                <!-- Applicant Details -->
                <h4 class="mt-4">Applicant Details</h4>
                <div class="mb-3">
                    <label class="form-label" for="applicant_name">Name of the Applicant/Owner</label>
                    <input class="form-control" id="applicant_name" type="text" placeholder="Enter your full name"
                        name="applicant_name" required />
                </div>
                <div class="mb-3">
                    <label class="form-label" for="applicant_email">Email Address</label>
                    <input class="form-control" id="applicant_email" type="email" placeholder="Enter your email address"
                        name="applicant_email" required />
                </div>
                <div class="mb-3">
                    <label class="form-label" for="applicant_phone">Phone Number</label>
                    <input class="form-control" id="applicant_phone" type="tel" placeholder="Enter your phone number"
                        name="applicant_phone" required />
                </div>
                <div class="mb-3">
                    <label class="form-label" for="applicant_address">Address of the Property/Site</label>
                    <textarea class="form-control" id="applicant_address" rows="3"
                        placeholder="Enter the address of the property/site" name="applicant_address"
                        required></textarea>
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
                    <input class="form-control" id="built_up_area" type="number"
                        placeholder="Enter the total built-up area in square feet" name="built_up_area" required />
                </div>
                <div class="mb-3">
                    <label class="form-label" for="number_of_floors">Number of Floors</label>
                    <input class="form-control" id="number_of_floors" type="number"
                        placeholder="Enter the number of floors" name="number_of_floors" required />
                </div>
                <div class="mb-3">
                    <label class="form-label" for="intended_use">Intended Use of the Building</label>
                    <textarea class="form-control" id="intended_use" rows="3"
                        placeholder="Enter the intended use of the building" name="intended_use" required></textarea>
                </div>

                <!-- Fire Safety Equipment Details -->
                <h4 class="mt-4">Fire Safety Equipment Details</h4>
                <div class="mb-3">
                    <label class="form-label" for="fire_extinguishers">Number and Type of Fire Extinguishers</label>
                    <input class="form-control" id="fire_extinguishers" type="text"
                        placeholder="e.g., 2 kg dry chemical" name="fire_extinguishers" required />
                </div>
                <div class="mb-3">
                    <label class="form-label" for="fire_alarm_system">Fire Alarm System Specifications</label>
                    <input class="form-control" id="fire_alarm_system" type="text"
                        placeholder="Enter fire alarm system specifications" name="fire_alarm_system" />
                </div>
                <div class="mb-3">
                    <label class="form-label" for="emergency_lighting">Emergency Lighting and Exit Signage
                        Locations</label>
                    <textarea class="form-control" id="emergency_lighting" rows="3"
                        placeholder="Enter emergency lighting and exit signage locations" name="emergency_lighting"
                        required></textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="fire_hydrant_system">Fire Hydrant System (if applicable)</label>
                    <input class="form-control" id="fire_hydrant_system" type="text"
                        placeholder="Enter fire hydrant system details" name="fire_hydrant_system" />
                </div>

                <!-- Utility Information -->
                <h4 class="mt-4">Utility Information</h4>
                <div class="mb-3">
                    <label class="form-label" for="water_supply_source">Water Supply Source for Firefighting</label>
                    <input class="form-control" id="water_supply_source" type="text"
                        placeholder="e.g., overhead tank, municipal connection" name="water_supply_source" required />
                </div>
                <div class="mb-3">
                    <label class="form-label" for="access_points">Access Points for Fire Tenders (Road Width, Entry/Exit
                        Points)</label>
                    <textarea class="form-control" id="access_points" rows="3"
                        placeholder="Enter access points for fire tenders" name="access_points" required></textarea>
                </div>

                <!-- Declaration -->
                <h4 class="mt-4">Declaration</h4>
                <div class="mb-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="declaration" name="declaration"
                            value="accepted" required>
                        <label class="form-check-label" for="declaration">
                            I confirm that I comply with all fire safety regulations and that the information provided
                            is accurate and complete to the best of my knowledge.
                        </label>
                    </div>
                </div>

                <!-- Documents to Be Uploaded -->
                <h4 class="mt-4">Documents to Be Uploaded</h4>
                <div class="mb-3">
                    <label class="form-label" for="land_ownership_proof">Land Ownership Proof (Sale Deed, Lease
                        Agreement, or Property Tax Receipt)</label>
                    <input class="form-control" id="land_ownership_proof" type="file" name="land_ownership_proof"
                        accept=".pdf,.jpg,.jpeg,.png" required />
                </div>
                <div class="mb-3">
                    <label class="form-label" for="approved_building_plans">Approved Building Plans (Signed by a
                        Licensed Architect)</label>
                    <input class="form-control" id="approved_building_plans" type="file" name="approved_building_plans"
                        accept=".pdf,.jpg,.jpeg,.png" required />
                </div>
                <div class="mb-3">
                    <label class="form-label" for="fire_safety_layout">Detailed Fire Safety Layout</label>
                    <input class="form-control" id="fire_safety_layout" type="file" name="fire_safety_layout"
                        accept=".pdf,.jpg,.jpeg,.png" required />
                </div>
                <div class="mb-3">
                    <label class="form-label" for="structural_stability_certificate">Structural Stability Certificate
                        (Issued by a Licensed Civil Engineer)</label>
                    <input class="form-control" id="structural_stability_certificate" type="file"
                        name="structural_stability_certificate" accept=".pdf,.jpg,.jpeg,.png" required />
                </div>
                <div class="mb-3">
                    <label class="form-label" for="fire_safety_equipment_details">Specifications of Installed Fire
                        Safety Equipment</label>
                    <input class="form-control" id="fire_safety_equipment_details" type="file"
                        name="fire_safety_equipment_details" accept=".pdf,.jpg,.jpeg,.png" required />
                </div>
                <div class="mb-3">
                    <label class="form-label" for="utility_clearances">Utility Clearances (Water Connection Approval for
                        Firefighting Purposes)</label>
                    <input class="form-control" id="utility_clearances" type="file" name="utility_clearances"
                        accept=".pdf,.jpg,.jpeg,.png" required />
                </div>
                <div class="mb-3">
                    <label class="form-label" for="affidavit">Notarized Affidavit Confirming Adherence to Fire Safety
                        Norms</label>
                    <input class="form-control" id="affidavit" type="file" name="affidavit"
                        accept=".pdf,.jpg,.jpeg,.png" required />
                </div>
                <div class="mb-3">
                    <label class="form-label" for="fee_payment_receipt">Proof of Payment for Fire NOC Application
                        Fees</label>
                    <input class="form-control" id="fee_payment_receipt" type="file" name="fee_payment_receipt"
                        accept=".pdf,.jpg,.jpeg,.png" required />
                </div>
                <div class="mb-3">
                    <label class="form-label" for="additional_documents">Additional Documents (If Applicable)</label>
                    <input class="form-control" id="additional_documents" type="file" name="additional_documents"
                        accept=".pdf,.jpg,.jpeg,.png" />
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

// Function to handle file upload
function uploadFile($file, $folder) {
    $target_dir = "uploads/" . $folder . "/";
    if (!file_exists($target_dir)) {
        mkdir($target_dir, 0777, true);
    }

    $target_file = $target_dir . basename($file["name"]);
    if (move_uploaded_file($file["tmp_name"], $target_file)) {
        return $target_file;
    } else {
        return null;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $submitted_by = $_SESSION['id'];
    $applicant_name = $_POST["applicant_name"];
    $applicant_email = $_POST["applicant_email"];
    $applicant_phone = $_POST["applicant_phone"];
    $applicant_address = $_POST["applicant_address"];
    $building_type = $_POST["building_type"];
    $built_up_area = $_POST["built_up_area"];
    $number_of_floors = $_POST["number_of_floors"];
    $intended_use = $_POST["intended_use"];
    $fire_extinguishers = $_POST["fire_extinguishers"];
    $fire_alarm_system = $_POST["fire_alarm_system"];
    $emergency_lighting = $_POST["emergency_lighting"];
    $fire_hydrant_system = $_POST["fire_hydrant_system"];
    $water_supply_source = $_POST["water_supply_source"];
    $access_points = $_POST["access_points"];
    $declaration = $_POST["declaration"];

    // File Upload Handling
    $land_ownership_proof = uploadFile($_FILES["land_ownership_proof"], "documents");
    $approved_building_plans = uploadFile($_FILES["approved_building_plans"], "documents");
    $fire_safety_layout = uploadFile($_FILES["fire_safety_layout"], "documents");
    $structural_stability_certificate = uploadFile($_FILES["structural_stability_certificate"], "documents");
    $fire_safety_equipment_details = uploadFile($_FILES["fire_safety_equipment_details"], "documents");
    $utility_clearances = uploadFile($_FILES["utility_clearances"], "documents");
    $affidavit = uploadFile($_FILES["affidavit"], "documents");
    $fee_payment_receipt = uploadFile($_FILES["fee_payment_receipt"], "documents");
    $additional_documents = isset($_FILES["additional_documents"]) ? uploadFile($_FILES["additional_documents"], "documents") : null;

    echo "<script>alert(`$submitted_by, $applicant_name, $applicant_email, $applicant_phone, $applicant_address, $building_type, $built_up_area, $number_of_floors, $intended_use,
            $fire_extinguishers, $fire_alarm_system, $emergency_lighting, $fire_hydrant_system,
            $water_supply_source, $access_points, $declaration,
            $land_ownership_proof, $approved_building_plans, $fire_safety_layout,
            $structural_stability_certificate, $fire_safety_equipment_details,
            $utility_clearances, $affidavit, $fee_payment_receipt, $additional_documents`)</script>";
            
    // Prepare SQL statement
    $stmt = $conn->prepare("INSERT INTO noc_applications (submitted_by,
        applicant_name, applicant_email, applicant_phone, applicant_address, 
        building_type, built_up_area, number_of_floors, intended_use, 
        fire_extinguishers, fire_alarm_system, emergency_lighting, fire_hydrant_system, 
        water_supply_source, access_points, declaration, 
        land_ownership_proof, approved_building_plans, fire_safety_layout, 
        structural_stability_certificate, fire_safety_equipment_details, 
        utility_clearances, affidavit, fee_payment_receipt, additional_documents
    ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

    if ($stmt) {
        $stmt->bind_param(
            "isssssiisssssssssssssssss",
            $submitted_by, $applicant_name, $applicant_email, $applicant_phone, $applicant_address,
            $building_type, $built_up_area, $number_of_floors, $intended_use,
            $fire_extinguishers, $fire_alarm_system, $emergency_lighting, $fire_hydrant_system,
            $water_supply_source, $access_points, $declaration,
            $land_ownership_proof, $approved_building_plans, $fire_safety_layout,
            $structural_stability_certificate, $fire_safety_equipment_details,
            $utility_clearances, $affidavit, $fee_payment_receipt, $additional_documents
        );
        
        if ($stmt->execute()) {
            echo "<script>
                Swal.fire({
                    icon: 'success',
                    title: 'Success!',
                    text: 'NOC Application submitted.',
                    confirmButtonText: 'OK'
                }).then(() => {
                    window.location.href = 'noc.php';
                });
            </script>";
        } else {
            echo "<script>
                Swal.fire({
                    icon: 'error',
                    title: 'Error!',
                    text: 'Something went wrong. Please try again.',
                    confirmButtonText: 'OK'
                });
            </script>";
        }

        $stmt->close();
    } else {
        echo "Error in SQL statement: " . $conn->error;
    }
}

?>


<?php
    include "footer.php";
} else {
    echo "<script>window.location.href = '../index.php'; </script>";
}
?>