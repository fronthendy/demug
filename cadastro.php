<?php include_once('header.php') ?>
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <form action="login.php" id="login">
                <fieldset>
                    <legend>Cadastro</legend>
                    <div class="row">
                        <div class="col-md-6">
                            <input type="text" name="nome" id="nome" placeholder="nome" class="form-control" required>
                            <input type="text" name="sobrenome" id="nome" placeholder="sobrenome" class="form-control">
                            <input type="email" name="email" id="email" placeholder="email" value="<?php echo isset($_GET['email'])? $_GET['email'] : ''; ?>" class="form-control" required>
                            <input type="email" name="confirmar-email" id="confirmar-email" placeholder="confirmar email" class="form-control" required>
                            <input type="password" name="senha" id="senha" placeholder="senha" class="form-control" required>
                            <input type="password" name="confirma-senha" id="confirma-senha" placeholder="confirmar senha" class="form-control" required>
                            <div class="row">
                                <div class="col-sm-6">
                                    <label for="data-nascimento">Data de Nascimento</label>
                                    <input type="date" name="data-nascimento" id="data-nascimento" class="form-control" placeholder="data nascimento">
                                </div>
                                <div class="col-sm-6">
                                    <label for="sexo">Sexo</label>
                                    <br>
                                    <input type="radio" name="sexo" id="feminino" value="femino"><label for="feminino">Feminino</label>
                                    <input type="radio" name="sexo" id="masculino" value="masculino"><label for="masculino">Masculino</label>
                                </div>
                            </div>
                            <input type="text" name="celular" id="celular" placeholder="celular" class="form-control">
                            <input type="text" name="endereco" id="endereco" placeholder="endereço" class="form-control">
                            <div class="row">
                                <div class="col-sm-6">
                                    <input type="text" name="cidade" id="cidade" placeholder="cidade" class="form-control">
                                </div>
                                <div class="col-sm-6">
                                    <select name="uf" id="uf" class="form-control">
                                        <option disabled selected>estado</option>
                                        <option value="SP">SP</option>
                                    </select>
                                </div>
                            </div>
                         </div>
                    </div>
                    <div class="col-md-6 col-xs-12 text-right">
                        <a class="btn" href="javascript:window.history.back();">Voltar</a>
                        <button type="submit" class="btn btn-primary">Criar conta</button>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>

</div>
<?php include_once('footer.php') ?>