<div class="container login-container d-flex justify-content-center">
    <div class="col-md-6 login-form-1">
        <h3>Fazer login</h3>
        <form action="/realiza-login" method="POST">
            <?php if (isset($_SESSION['message']) && $_SESSION['position'] == 'login') :?>
                <div class="alert alert-<?= $_SESSION['message_type']; ?> alert-dismissible fade show" role="alert">
                    <strong><?= (isset($_SESSION['strong_message'])) ? $_SESSION['strong_message'] : ''; ?></strong><br><?= $_SESSION['message']; ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php
                unset($_SESSION['message_type']);
                unset($_SESSION['message']);
                unset($_SESSION['strong_message']);
            endif; ?>
            <div class="form-group mt-1">
                <input type="email" id="email" name="email" class="form-control" placeholder="E-mail" value="" required/>
            </div>
            <div class="form-group mt-1">
                <input type="password" id="password" name="password" class="form-control" placeholder="Senha" value="" required/>
            </div>
            <div class="form-group mt-3 d-flex justify-content-center">
                <input type="submit" class="btnSubmit" value="Login" />
            </div>
            <div class="form-group mt-1 d-flex justify-content-center">
                <a href="/resetar-senha" class="ForgetPwd">Esqueceu a senha?</a>
            </div>
        </form>
    </div>
</div>