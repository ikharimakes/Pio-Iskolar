<?php
$currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$recordsPerPage = 15;
$search = isset($_GET['search']) ? htmlspecialchars($_GET['search']) : '';
$sortColumn = isset($_GET['sort']) ? htmlspecialchars($_GET['sort']) : 'batch_num';
$sortOrder = isset($_GET['order']) ? htmlspecialchars($_GET['order']) : 'DESC';

$totalRecords = getTotalRecords($search);
$totalPages = $totalRecords > 0 ? ceil($totalRecords / $recordsPerPage) : 1;
$startRecord = $totalRecords > 0 ? ($currentPage - 1) * $recordsPerPage + 1 : 0;
$endRecord = $totalRecords > 0 ? min($startRecord + $recordsPerPage - 1, $totalRecords) : 0;
?>

<div class="pagination">
    <p>Showing <?= $startRecord ?> - <?= $endRecord ?> of <?= $totalRecords ?> records</p>
    <div class="box">
        <button type="button" class="prev" <?= $currentPage == 1 || $totalRecords == 0 ? 'disabled' : '' ?>>
            <a href="?page=<?= max(1, $currentPage - 1) ?>&search=<?= $search ?>&sort=<?= $sortColumn ?>&order=<?= $sortOrder ?>">Prev</a>
        </button>
        <ul class="ul" data-total-pages="<?= $totalPages ?>" data-current-page="<?= $currentPage ?>">
            <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                <li>
                    <a href="?page=<?= $i ?>&search=<?= $search ?>&sort=<?= $sortColumn ?>&order=<?= $sortOrder ?>" class="page_number <?= $i == $currentPage ? 'active_page' : '' ?>">
                        <?= $i ?>
                    </a>
                </li>
            <?php endfor; ?>
        </ul>
        <button type="button" class="next" <?= $currentPage == $totalPages || $totalRecords == 0 ? 'disabled' : '' ?>>
            <a href="?page=<?= min($totalPages, $currentPage + 1) ?>&search=<?= $search ?>&sort=<?= $sortColumn ?>&order=<?= $sortOrder ?>">Next</a>
        </button>
    </div>
</div>
