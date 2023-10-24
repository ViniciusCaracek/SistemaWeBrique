<!--<nav aria-label="paginacao">
    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
            <li class="page-item disabled">
                <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Anterior</a>
            </li>
            <li class="page-item"><a class="page-link" href="#">  1</a></li>
            <li class="page-item"><a class="page-link" href="#">  2</a></li>
           
            <li class="page-item">
                <a class="page-link" href="#">Próximo</a>
            </li>
        </ul>
    </nav>
</nav>-->
<style>
    .pagination > .active > a
    {
        
        color:white !important;
        background-color:#ff9e2f !Important;
        border: 0px white !Important;
        
    }
    .page-link{
        color:orange;
    }
    
    .page-link:hover{
        color:orangered;
    }


</style>

<?php $pager->setSurroundCount(2) ?>
<nav aria-label="paginacao">
    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
            <?php if ($pager->hasPreviousPage()) : ?>
                <li class="page-item">
                    <a class="page-link" href="<?= $pager->getFirst() ?>" aria-label="<?= lang('Pager.first') ?>">
                        <span aria-hidden="true"><?= lang('Primeira') ?></span>
                    </a>
                </li>
                <li class="page-item">
                    <a class="page-link" href="<?= $pager->getPreviousPage() ?>" aria-label="<?= lang('Pager.previous') ?>">
                        <span aria-hidden="true"><?= lang('Anterior') ?></span>
                    </a>
                </li>
            <?php endif ?>

            <?php foreach ($pager->links() as $link) : ?>
                <li class="page-item <?= $link['active'] ? 'active' : '' ?>">
                    <a class="page-link" href="<?= $link['uri'] ?>">
                        <?= $link['title'] ?>
                    </a>
                </li>
            <?php endforeach ?>

            <?php if ($pager->hasNextPage()) : ?>
                <li class="page-item">
                    <a class="page-link" href="<?= $pager->getNextPage() ?>" aria-label="<?= lang('Pager.next') ?>">
                        <span aria-hidden="true"><?= lang('Próxima') ?></span>
                    </a>
                </li>
                <li class="page-item">
                    <a class="page-link" href="<?= $pager->getLast() ?>" aria-label="<?= lang('Pager.last') ?>">
                        <span aria-hidden="true"><?= lang('Última') ?></span>
                    </a>
                </li>
            <?php endif ?>
        </ul>
    </nav>
</nav>

