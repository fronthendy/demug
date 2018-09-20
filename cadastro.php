<?php
    session_start();

    if($_POST){
        
        $erros = [];
        foreach($_POST as $campo => $valor){
            if($valor === ''){
                $erros[] = "Preencha $campo corretamente";
            }
        }
        if($_POST['email'] != $_POST['confirma-email']){
            $erros[] = "Emails não conferem";
        }
        if($_POST['senha'] != $_POST['confirma-senha']){
            $erros[] = "Senhas não conferem";
        }

        if(!count($erros)){
            $usuariosJson = 'usuarios.json';
            if(file_exists($usuariosJson)){
                $usuarios = file_get_contents($usuariosJson);
                $usuarios = json_decode($usuarios, true);
            }else {
                $usuarios = ['usuarios'=>[]];
            }

            foreach($usuarios['usuarios'] as $user){
                if($_POST['email'] === $user['email']){
                    $erros[] = "Já existe um cadastro com esse email";
                }
            }

            if(!count($erros)){
                $nomeArquivo = null;
                if(isset($_FILES['foto']) && $_FILES['foto']['error'] == 0){
                    $nomeArquivo =  time() . $_FILES['foto']['name'];
                    $arquivo =  $_FILES['foto']['tmp_name'];
                    $caminho = "img/fotoUsuario/". $nomeArquivo;
                    $ok =  move_uploaded_file($arquivo, $caminho);

                }
                $dadosUsuario = [
                    'nome'=>$_POST['nome'],
                    'sobrenome'=>$_POST['sobrenome'],
                    'email'=>$_POST['email'],
                    'senha'=>password_hash($_POST['senha'], 1),
                    'data-nascimento'=>$_POST['data-nascimento'],
                    'sexo'=>$_POST['sexo'],
                    'celular'=>$_POST['celular'],
                    'endereco'=>$_POST['endereco'],
                    'cidade'=>$_POST['cidade'],
                    'uf'=>$_POST['uf'],
                    'foto'=> $nomeArquivo
                ];

                $usuarios['usuarios'][] = $dadosUsuario;

                file_put_contents($usuariosJson,json_encode($usuarios));

                $_SESSION['nome-usuario'] = $dadosUsuario['nome'];
                
                header('location: home.php');

            }


        }
    }

?>
<?php include_once('header.php') ?>
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <form action="cadastro.php" method="post" id="login" enctype="multipart/form-data">
                <fieldset>
                    <legend>Cadastro</legend>
                    <div class="row">
                        <div class="col-md-6 pull-right">
                           <?php if(count($erros)): ?>
                                <div class="alert alert-danger">
                                        <?php 
                                            foreach($erros as $erro){
                                                echo "<li>$erro</li>";
                                            }
                                        
                                        ?>

                                </div>

                           <?php endif; ?>
                        </div>
                        <div class="col-md-6">
                            <input type="text" name="nome" value="<?php echo isset($_POST['nome']) ? $_POST['nome'] : '';  ?>" id="nome" placeholder="nome" class="form-control" >
                            <input type="text" name="sobrenome"  value="<?php echo isset($_POST['sobrenome']) ? $_POST['sobrenome'] : '';  ?>"  id="sobrenome" placeholder="sobrenome" class="form-control">
                            <input type="email" name="email"  value="<?php echo isset($_POST['email']) ? $_POST['email'] : '';  ?>"  id="email" placeholder="email" value="<?php echo isset($_GET['email'])? $_GET['email'] : ''; ?>" class="form-control" >
                            <input type="email" name="confirma-email"  value="<?php echo isset($_POST['confirma-email']) ? $_POST['confirma-email'] : '';  ?>"  id="confirma-email" placeholder="confirmar email" class="form-control" >
                            <input type="password" name="senha"  value="<?php echo isset($_POST['senha']) ? $_POST['senha'] : '';  ?>"  id="senha" placeholder="senha" class="form-control" >
                            <input type="password" name="confirma-senha"  value="<?php echo isset($_POST['confirma-senha']) ? $_POST['confirma-senha'] : '';  ?>"  id="confirma-senha" placeholder="confirmar senha" class="form-control" >
                            <div class="row">
                                <div class="col-sm-6">
                                    <label for="data-nascimento">Data de Nascimento</label>
                                    <input type="date" name="data-nascimento" value="<?php echo isset($_POST['data-nascimento']) ? $_POST['data-nascimento'] : '';  ?>"   id="data-nascimento" class="form-control" placeholder="data nascimento">
                                </div>
                                <div class="col-sm-6">
                                    <label for="sexo">Sexo</label>
                                    <br>
                                    <input type="radio" name="sexo"  <?php echo isset($_POST['sexo']) && $_POST['sexo'] === 'feminino'  ? 'checked' : '';  ?>  id="feminino" value="feminino"><label for="feminino">Feminino</label>
                                    <input type="radio" name="sexo" <?php echo isset($_POST['sexo']) && $_POST['sexo'] === 'masculino'  ? 'checked' : '';  ?> id="masculino" value="masculino"><label for="masculino">Masculino</label>
                                </div>
                            </div>
                            <input type="text" name="celular" value="<?php echo isset($_POST['celular']) ? $_POST['celular'] : '';  ?>"  id="celular" placeholder="celular" class="form-control">
                            <input type="text" name="endereco" value="<?php echo isset($_POST['endereco']) ? $_POST['endereco'] : '';  ?>"  id="endereco" placeholder="endereço" class="form-control">
                            <div class="row">
                                <div class="col-sm-6">
                                    <input type="text" name="cidade" value="<?php echo isset($_POST['cidade']) ? $_POST['cidade'] : '';  ?>" id="cidade" placeholder="cidade" class="form-control">
                                </div>
                                <div class="col-sm-6">
                                    <select name="uf" id="uf" class="form-control">
                                        <option disabled selected>estado</option>
                                        <option value="SP" <?php echo isset($_POST['uf']) && $_POST['uf'] === 'SP'  ? 'selected' : '';  ?> >SP</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12">
                                    <label for="foto">Foto</label>
                                    <input type="file" name="foto" id="foto">
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