<form action="/salvar-hash" method="POST">
    <div class="form-group">
        <input type="text" id="id" name="id" value="<?= $id ?? ''; ?>" style="display: none;">
        <label for="link">Link</label>
        <input 
            type="text" 
            id="link" 
            name="link" 
            class="form-control" 
            placeholder="Link"
            value="<?= $link ?? ''; ?>"
            autocomplete="off"
        >
    </div>
    <button class="btn btn-success mt-2">Salvar</button>
</form>