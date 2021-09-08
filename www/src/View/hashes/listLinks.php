<table class="table">
    <thead>
        <tr>
            <th scope="col">#Id</th>
            <th scope="col">Link</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($links as $link): ?>
        <tr>
            <td scope="row"><?= $link->getId(); ?></td>
            <td class="d-flex justify-content-between">
                <?= $link->getHash(); ?>
                <div>
                    <a href="<?= $link->getHash(); ?>" target="_blank" class="btn btn-info btn-sm">
                    <i class="fas fa-link mr-1"></i>
                        Acessar
                    </a>
                    <a href="/excluir-link?id=<?= $link->getId(); ?>" class="btn btn-danger btn-sm">
                        <i class="far fa-trash-alt mr-1"></i>
                        Excluir
                    </a>
                </div>
                
            </td>    
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>