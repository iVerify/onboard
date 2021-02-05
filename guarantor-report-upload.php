<?php
include "./components/header.php";
include "./components/navbar.php";

?>
    <div class="header">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center text-center py-4">
                <div class="pl-3">
                    <a href="report-category" class="btn btn-icon btn-default" type="button">
                        <span class="btn-inner--icon"><i class="ni ni-bold-left"></i></span>
                        <span class="btn-inner--text">Go Back</span>
                    </a>
                </div>
                <div class="col-lg-12">
                    <h1 class="header-title1 pt-3">
                        Guarantor Verification
                    </h1>
                    <p>Integrity is the seed for achievement <span style='font-size:15px;'>&#128519;</span></p>
                </div>
            </div>

            <div class="container">
                <div class="row">
                    <div class="col-xl-12 order-xl-1">
                        <div class="card">
                            <div class="card-body">
                                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" autocomplete="off" enctype="multipart/form-data">
                                    <h6 class="heading-small text-muted mb-4">Employee information</h6>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-username">Agent ID</label>
                                                <input type="text" name="agentID" id="agentID" class="form-control" value="<?php echo $_SESSION['agentID']; ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="example-date-input" class="form-control-label">Date of Visitation</label>
                                                <input class="form-control" type="date" placeholder="2018-11-23" name="emVisitDate" id="emVisitDate">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-first-name">First Name</label>
                                                <input type="text" name="emFirstName" id="emFirstName" class="form-control" placeholder="Desmond">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-last-name">Last Name</label>
                                                <input type="text" name="emLastName" id="emLastName" class="form-control" placeholder="Fegor">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-city">Occupation/Office</label>
                                                <input type="text" name="emOccupation" id="emOccupation" class="form-control" placeholder="Engineer">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-address">Residential Address Visited</label>
                                                <input name="emAddress" id="emAddress" class="form-control" placeholder="7/9 Adebisi Oyenola street Idado Estate Etiosa, IGBOEFON, Lagos." type="text">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-address">Upload Onsite Pictures</label>
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" name="emUpload" id="emUpload" lang="en" multiple>
                                                    <label class="custom-file-label" for="customFileLang">Select file</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-country">Residential Address Landmark & Description</label>
                                                <input type="text" name="emAddressDesc" id="emAddressDesc" class="form-control" placeholder="Chevron Lekki">
                                            </div>
                                        </div>
                                    </div>
                                    <hr class="my-4">
                                    <h6 class="heading-small text-muted mb-4">Work information</h6>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-first-name">First Name</label>
                                                <input type="text" name="emGuarantorFirstName" id="emGuarantorFirstName" class="form-control" placeholder="Desmond">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-last-name">Last Name</label>
                                                <input type="text" name="emGuarantorLastName" id="emGuarantorLastName" class="form-control" placeholder="Fegor">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-city">Occupation/Office</label>
                                                <input type="text" name="emGuarantorOccupation" id="emGuarantorOccupation" class="form-control" placeholder="Engineer">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-address">Address Visited</label>
                                                <input name="emGuarantorAddress" id="emGuarantorAddress" class="form-control" placeholder="7/9 Adebisi Oyenola street Idado Estate Etiosa, IGBOEFON, Lagos." type="text">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-address">Upload Onsite Pictures</label>
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" name="emGuarantorUpload" id="emGuarantorUpload" lang="en" multiple>
                                                    <label class="custom-file-label" for="customFileLang">Select file</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-country">Address Landmark & Description</label>
                                                <input type="text" name="emGuarantorDesc" id="emGuarantorDesc" class="form-control" placeholder="Chevron Lekki">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label">Agent Remark</label>
                                        <textarea rows="4" class="form-control" name="emGuarantorRemark" id="emGuarantorRemark" placeholder="Give full report about the guarantor's verification and observations."></textarea>
                                    </div>
                                    <div class="text-center">
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="emCheck" required>
                                                <label class="custom-control-label" for="customCheck1">I hereby confirm that the information above are correct and accurate.
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-center text-white">
                                        <div class="form-group">
                                            <button name="employee_upload_btn" class="btn btn-icon btn-default" type="submit">
                                                <span class="btn-inner--icon"><i class="ni ni-cloud-upload-96"></i></span>
                                                <span class="btn-inner--text">Upload Report</span>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php include "./components/footer.php"; ?>