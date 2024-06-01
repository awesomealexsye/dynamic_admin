<?php
require_once('../../config.php');
require_once(APP_PATH."/dist/handler/check-session.php");
$app_name = APP_NAME;
$app_path = APP_PATH;
$app_url = APP_URL;
$page_title = "Dashboard";
?>
<!DOCTYPE html>
<html lang="en">

<?php require_once($app_path . '/dist/layout/header-cdn.php'); ?>

<body class="layout-fixed sidebar-expand-lg bg-body-tertiary"> <!--begin::App Wrapper-->
    <div class="app-wrapper"> <!--begin::Header-->
        <nav class="app-header navbar navbar-expand bg-body"> <!--begin::Container-->
            <div class="container-fluid"> <!--begin::Start Navbar Links-->
                <ul class="navbar-nav">
                    <li class="nav-item"> <a class="nav-link" data-lte-toggle="sidebar" href="#" role="button"> <i class="bi bi-list"></i> </a> </li>
                    <li class="nav-item d-none d-md-block"> <a href="#" class="nav-link">Home</a> </li>
                    <li class="nav-item d-none d-md-block"> <a href="#" class="nav-link">Contact</a> </li>
                </ul>

            </div>
        </nav> <!--end::Header--> <!--begin::Sidebar-->
        <?php require_once($app_path . '/dist/layout/header.php'); ?>
        <!--end::Sidebar--> <!--begin::App Main-->
        <main class="app-main"> <!--begin::App Content Header-->
            <div class="app-content-header"> <!--begin::Container-->
                <div class="container-fluid"> <!--begin::Row-->
                    <div class="row">
                        <div class="col-sm-6">
                            <h3 class="mb-0"><?= $page_title ?></h3>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-end">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    <?= $page_title ?>
                                </li>
                            </ol>
                        </div>
                    </div> <!--end::Row-->
                </div> <!--end::Container-->
            </div> <!--end::App Content Header--> <!--begin::App Content-->
            <div class="app-content"> <!--begin::Container-->
                <div class="container-fluid"> <!--begin::Row-->
                    <div class="row justify-content-center"> <!--begin::Col-->
                        <div class="col-12"> <!--begin::Quick Example-->
                            <div class="card card-primary card-outline"> <!--begin::Header-->
                                <div class="card-header">
                                    <div class="card-title">Add Forms</div>
                                </div>
                                <div class="card-body">
                                    <form id="dynamicForm" method="POST" action="<?= $app_url . "dist/handler/form-handler.php" ?>">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="mb-3">
                                                    <label for="tableName" class="form-label">Table Name</label>
                                                    <input type="text" class="form-control" id="tableName" name="tableName" required>
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="mb-3">
                                                    <label for="tableName" class="form-label">Editable</label>
                                                    <input type="checkbox"  id="is_editable" name="is_editable" value="1" >
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="">
                                                    <label for="tableName" class="form-label">Deletable</label>
                                                    <input type="checkbox"  id="is_deletable" name="is_deletable"  value="1" >
                                                </div>
                                            </div>
                                        </div>
                                        <div id="dynamicFields">
                                        </div>
                                        <div class="mt-3">
                                            <button type="button" class="btn btn-primary" id="addField">Add Field</button>
                                            <button type="button" onclick="submitFormCreated()" class="btn btn-success">Submit</button>
                                        </div>
                                    </form><!--end::Form-->
                                </div>

                            </div> <!--end::Quick Example--> <!--begin::Input Group-->
                        </div> <!--end::Col--> <!--begin::Col-->

                    </div> <!--end::Row-->
                </div> <!--end::Container-->
            </div> <!--end::App Content-->
        </main> <!--end::App Main--> <!--begin::Footer-->

        <?php require_once($app_path . '/dist/layout/footer.php'); ?>
        <!--end::Footer-->
    </div> <!--end::App Wrapper--> <!--begin::Script--> <!--begin::Third Party Plugin(OverlayScrollbars)-->
    <?php require_once($app_path . '/dist/layout/footer-cdn.php'); ?>
    <script>
        function submitFormCreated(){
            const dev_code = prompt("Enter Developer Code to Create a new DB table");
            if(dev_code == "<?=DEV_CODE?>"){
                $("#dynamicForm").submit();
            }else{
                alert("Invalid Code");
            }
        }

        $(document).ready(function() {
            $('#addField').click(function() {
                const newField = `
                <div class="row">
                                                <div class="col-4">
                                                    <div class="mb-3 dynamic-field">
                                                        <label class="form-label">Field Type</label>
                                                        <!-- <input type="text" class="form-control" name="fieldNames[]" required> -->
                                                        <select class="form-control" name="fieldType[]" id="field_type" required>
                                                            <option value="">Please select</option>
                                                            <option value="INT">INT</option>
                                                            <option value="VARCHAR">VARCHAR</option>
                                                            <option value="TEXT">TEXT</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="mb-3 dynamic-field">
                                                        <label class="form-label">Field Name</label>
                                                        <input type="text" class="form-control" name="fieldNames[]" required>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="mb-3 dynamic-field">
                                                        <label class="form-label">Field Length</label>
                                                        <input type="number" class="form-control" name="fieldLength[]" required>
                                                    </div>
                                                </div>  
                                                <div class="col-4">
                                                    <button type="button" class="btn btn-danger mt-2 removeField">Remove</button>
                                                </div>
                                            </div>
                `;
                $('#dynamicFields').append(newField);
            });

            $('#dynamicForm').on('click', '.removeField', function() {
                $(this).parent().parent().remove();
            });
        });
    </script>
</body><!--end::Body-->

</html>