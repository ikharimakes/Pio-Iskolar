<?php
$currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$recordsPerPage = 15;
$search = isset($_GET['search']) ? htmlspecialchars($_GET['search']) : '';
$sortColumn = isset($_GET['sort']) ? htmlspecialchars($_GET['sort']) : 'batch_num';
$sortOrder = isset($_GET['order']) ? htmlspecialchars($_GET['order']) : 'DESC';

$totalRecords = getTotalRecords($search);
$totalPages = ceil($totalRecords / $recordsPerPage);
$startRecord = ($currentPage - 1) * $recordsPerPage + 1;
$endRecord = min($startRecord + $recordsPerPage - 1, $totalRecords);
?>

<div class="pagination">
    <p>Showing <?= $startRecord ?> - <?= $endRecord ?> of <?= $totalRecords ?> records</p>
    <div class="box">
        <button type="button" class="prev" <?= $currentPage == 1 ? 'disabled' : '' ?>>
            <a href="?page=<?= $currentPage - 1 ?>&search=<?= $search ?>&sort=<?= $sortColumn ?>&order=<?= $sortOrder ?>">Prev</a>
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
        <button type="button" class="next" <?= $currentPage == $totalPages ? 'disabled' : '' ?>>
            <a href="?page=<?= $currentPage + 1 ?>&search=<?= $search ?>&sort=<?= $sortColumn ?>&order=<?= $sortOrder ?>">Next</a>
        </button>
    </div>
</div>
