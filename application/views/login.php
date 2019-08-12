<?php $this->load->view('header'); ?>

<div class="container">
	<form class="login" action="" method="post">
		<div class="row">
			<div class="col-12">
				<h3>Ponto Eletrônico</h3>
			</div>

			<div class="col-12">
				<div class="form-group">
					<label for="usuario">Usuário</label>
		    		<input type="text" id="usuario" class="form-control" name="usuario" placeholder="Usuário">
				</div>
			</div>
			<div class="col-12">
				<div class="form-group">
					<label for="senha">Senha</label>
	  				<input type="password" id="senha" class="form-control" name="senha" placeholder="Senha">
				</div>
			</div>
			<div class="col-12">
	  			<button type="submit" class="btn btn-primary btn-block">Entrar</button>
			</div>
		</div>
    </form>
</div>

<?php $this->load->view('footer'); ?>
