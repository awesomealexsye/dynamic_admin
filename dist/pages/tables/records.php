<?php
require_once('../../../config.php');
require_once(APP_PATH . "/dist/handler/database.php");
require_once(APP_PATH."/dist/handler/check-session.php");


$app_name = APP_NAME;
$app_path = APP_PATH;
$app_url = APP_URL;
// Fetch records from all_table_records
$tableName = $_REQUEST['table_name'] ?? '';

// Initialize an array to store table data
$tableData = [];
$tableFields = [];

if ($tableName) {
    // Prepare the SQL query to fetch all records from the specified table
    try {
        $sql = "SELECT * FROM $tableName";
        $result = $conn->query($sql);

        if ($result) {
            // Fetch fields
            $fieldInfo = $result->fetch_fields();
            foreach ($fieldInfo as $val) {
                $tableFields[] = $val->name;
            }
            // Fetch data
            while ($row = $result->fetch_assoc()) {
                $tableData[] = $row;
            }
        } else {
            echo "Error fetching data: " . $conn->error;
        }
    } catch (\Throwable $th) {
        echo "No Table Record Found: " . $conn->error;
        echo "<br><h1>Contact Developer</h1>";
        exit;
    }
}

$page_title = ucfirst($tableName) . " - Records";
?>
<!DOCTYPE html>
<html lang="en"> <!--begin::Head-->

<?php require_once($app_path . '/dist/layout/header-cdn.php'); ?>
<link href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" rel="stylesheet">


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
                            <table id="example" class="table table-striped" style="width:100%">
                                <thead>
                                    <tr>
                                        <?php foreach ($tableFields as $field) : ?>
                                            <th><?= htmlspecialchars(ucfirst($field)) ?></th>
                                        <?php endforeach; ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($tableData as $row) : ?>
                                        <tr>
                                            <?php foreach ($tableFields as $field) : ?>
                                                <?php if ((strpos($field, '_image') !== false)) : ?>
                                                    <td> <a href="<?= APP_URL."dist/uploads/". htmlspecialchars($row[$field]) ?>" target="_blank"><img width="100" height="100" src="<?= APP_URL."dist/uploads/". htmlspecialchars($row[$field]) ?>" alt="<?= htmlspecialchars($row[$field]) ?>"></a></td>
                                                <?php else : ?>
                                                    <td><?= htmlspecialchars($row[$field]) ?></td>
                                                <?php endif ?>

                                            <?php endforeach; ?>
                                        </tr>
                                    <?php endforeach; ?>

                                </tbody>
                            </table>
                        </div> <!--end::Col--> <!--begin::Col-->

                    </div> <!--end::Row-->
                </div> <!--end::Container-->
            </div> <!--end::App Content-->
        </main> <!--end::App Main--> <!--begin::Footer-->

        <?php require_once($app_path . '/dist/layout/footer.php'); ?>
        <!--end::Footer-->
    </div> <!--end::App Wrapper--> <!--begin::Script--> <!--begin::Third Party Plugin(OverlayScrollbars)-->
    <?php require_once($app_path . '/dist/layout/footer-cdn.php'); ?>
    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>
</body><!--end::Body-->

</html>