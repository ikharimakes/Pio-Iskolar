<div class="box">
    <button type="button" class="prev" <?= $currentPage == 1 ? 'disabled' : '' ?>> <a href="?page=<?= $currentPage - 1 ?>&search=<?= htmlspecialchars($search) ?>">Prev</a> </button>
    <ul class="ul" data-total-pages="<?= $totalPages ?>" data-current-page="<?= $currentPage ?>">
        <?php for ($i = 1; $i <= $totalPages; $i++): ?>
            <li>
                <a href="?page=<?= $i ?>&search=<?= htmlspecialchars($search) ?>" class="page_number <?= $i == $currentPage ? 'active_page' : '' ?>">
                    <?= $i ?>
                </a>
            </li>
        <?php endfor; ?>
    </ul>
    <button type="button" class="next" <?= $currentPage == $totalPages ? 'disabled' : '' ?>> <a href="?page=<?= $currentPage + 1 ?>&search=<?= htmlspecialchars($search) ?>">Next</a> </button>
</div>