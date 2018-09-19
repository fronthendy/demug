<?php include_once('header.php') ?>
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <form action="login.php" id="login">
                <fieldset>
                        <legend>Já sou cadastrado</legend>
                        <input type="email" name="email" id="email" placeholder="email" class="form-control" required>
                        <input type="password" name="password" id="password" placeholder="senha" class="form-control" required>
                        <button type="submit" class="btn btn-primary">Entrar</button>
                        <br>
                        <a href="#">esqueci minha senha</a>
                </fieldset>
            </form>
        </div>
        <div class="col-md-6">
            <form action="cadastro.php" method="get" id="pre-cadastro">
                <fieldset>
                    <legend>Ainda não possuo cadastro</legend>
                    <div class="input-group">
                        <input type="email" name="email" id="email" placeholder="digite o email que deseja cadastrar" class="form-control" required>
                        <span class="input-group-btn">
                            <button type="submit" class="btn btn-secondary">Entrar</button>
                        </span>
                        </div><!-- /input-group -->
                </fieldset>
            </form>
        </div>
    </div>

</div>
<?php include_once('footer.php') ?>