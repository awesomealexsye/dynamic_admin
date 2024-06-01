<?php
// require_once('../../config.php');
require_once(APP_PATH . "/dist/handler/database.php");

$app_name = APP_NAME;
$app_path = APP_PATH;
$app_url = APP_URL;
// Fetch records from all_table_records
$table_name = $_REQUEST['table_name'] ?? '';
$sql = "SELECT * FROM all_table_records where status=1";
$result = $conn->query($sql);

// $stmt = $conn->prepare($sql);
// // $stmt->bind_param("s", $table_name);
// $stmt->execute();
// $result = $stmt->get_result();

// Store records in an array
$records = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $records[] = $row;
    }
}
?>
<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark"> 
    <div class="sidebar-brand"> <a href="#" class="brand-link"> <!--begin::Brand Image--> <!--end::Brand Image--> <!--begin::Brand Text--> <span class="brand-text fw-light"><?= APP_NAME ?></span> <!--end::Brand Text--> </a> <!--end::Brand Link--> </div> <!--end::Sidebar Brand--> <!--begin::Sidebar Wrapper-->
    <div class="sidebar-wrapper">
        <nav class="mt-2"> <!--begin::Sidebar Menu-->
            <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu" data-accordion="false">
                <li class="nav-item"> <a href="<?=APP_URL."index.html"?>" class="nav-link"> <i class="nav-icon bi bi-speedometer"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>

                </li>

                <li class="nav-item menu-open"> <a href="<?=APP_URL."dist/pages/form-creator.php"?>" class="nav-link active"> <i class="nav-icon bi bi-pencil-square"></i>
                        <p>
                        Creator Tool
                        </p>
                    </a>
                </li>
                <?php foreach ($records as $record) : ?>
                    <li class="nav-item">
                        <a href="<?= APP_URL . "dist/pages/tables/records.php?table_name=" . $record['table_name'] ?>" class="nav-link">
                            <i class="nav-icon bi bi-table"></i>
                            <p><?= htmlspecialchars(ucfirst($record['table_name'])) ?></p>
                        </a>
                    </li>
                <?php endforeach; ?>
                <li class="nav-item menu-open"> <a href="<?=APP_URL."dist/pages/logout.php"?>" class="nav-link active"> <i class="nav-icon bi bi-lock"></i>
                        <p>
                        Logout
                        </p>
                    </a>
                </li>
            </ul> <!--end::Sidebar Menu-->
        </nav>
    </div> <!--end::Sidebar Wrapper-->
</aside>