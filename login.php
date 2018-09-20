<?php
    session_start();

    if($_POST){
        
        $erros = [];
        foreach($_POST as $campo => $valor){
            if($valor === ''){
                $erros[] = "O campo $campo é obrigatório";
            }
        }

        if(!count($erros)){
            $usuariosJson = 'usuarios.json';
            $usuarios = file_get_contents($usuariosJson);
            $usuarios = json_decode($usuarios, true);

            foreach($usuarios['usuarios'] as $key => $user){
                if($_POST['email'] === $user['email'] && password_verify($_POST['senha'], $user['senha'])){
                    $_SESSION['id-usuario']=$key;
                    $_SESSION['nome-usuario']=$user['nome'];
                    $_SESSION['foto-usuario'] = $user['foto'];

                    if($_POST['lembrar-usuario']){
                        setcookie('email', $_POST['email'], time()+1000);
                        setcookie('senha', $_POST['senha'], time()+1000);
                    }

                    header('location: index.php');
                }
            }
            $erros[] = "autenticação negada";

        }
    }

?>
<?php include_once('header.php') ?>
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <form action="login.php" id="login" method="post">
                <fieldset>
                    <legend>Já sou cadastrado</legend>
                    <input type="email" name="email" id="email" placeholder="email" class="form-control" >
                    <input type="password" name="senha" id="senha" placeholder="senha" class="form-control" >
                    <input type="checkbox" name="lembrar-usuario" id="lembrar-usuario"><label for="lembrar-usuario">Lembrar-me</label>
                    <br>
                    <?php if(count($erros)): ?>
                        <div class="alert alert-danger">
                                <?php 
                                    foreach($erros as $erro){
                                        echo "<li>$erro</li>";
                                    }
                                
                                ?>

                        </div>

                    <?php endif; ?>
                           <br>
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
                        <input type="email" name="email" id="email-cadastro" placeholder="digite o email que deseja cadastrar" class="form-control" required>
                        <span class="input-group-btn">
                            <button type="submit" class="btn btn-secondary">Cadastrar</button>
                        </span>
                        </div><!-- /input-group -->
                </fieldset>
            </form>
        </div>
    </div>

</div>
<?php include_once('footer.php') ?>