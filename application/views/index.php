<body style="background-image: url(<?php echo base_url('assets/img/background2.jpg');?>);" class="hm-gradient">

	<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.mask.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/mascara.js"></script>
	<script type="text/javascript"  src="<?php echo base_url();?>assets/js/preencheCep.js"></script>
	<main>
		<div class="container">

			<div class="text-center darken-grey-text mb-4">
			</div>

			<div class="col-md-9 col-centered">
				<div class="card">
					<div class="card-body">
						<?= $mensagens;?>
						<?php
						if (($this->session->flashdata('dados')) != NULL){
							$dados = $this->session->flashdata('dados');
							echo "<script>$( document ).ready(function() {
												pesquisacep('" . $dados['cep']. "');
												$('#deficiencia option:eq(".$dados['deficiencia'].")').prop('selected', true);
												$('#submeter_trabalho option:eq(".$dados['submeter_trabalho'].")').prop('selected', true);
												$('#tipo option:eq(".$dados['id_tipo_inscricao'].")').prop('selected', true);
											});</script>";
						}
						?>
						<!-- Form -->
						<form method="POST" action="<?php echo base_url('home/cadastrar') ?>">
							<h1 class="text-center font-bold deep-black-text py-4" align="center">Congresso:<br> Pedagogia Histórico-Crítica</h2>
								<h2 class="text-center font-bold deep-orange-text py-4">Cadastro participante</h2>
								<p align="center">Use o formulário abaixo para se inscrever no congresso!</p>
								<center><img src="<?= base_url('assets/img/progress1.png')?>" width="80%" margin="auto" ></center>

								<h3 class="text-center font-bold deep-black-text py-4">Dados Pessoais</h3>

								<div class="md-form">
									<i class="fa fa-user prefix grey-text"></i>
									<input type="text" id="nome" name="nome" class="form-control" required="true" minlength="2" maxlength="100" value="<?=$dados['nome'] ?? '';?>">
									<label for="nome">Nome Completo*</label>
								</div>

								<div class="md-form">
									<i class="fa fa-id-card prefix grey-text"></i>
									<input type="text" id="cpf" name="cpf" class="form-control" required="true" minlength="2" maxlength="15" value="<?=$dados['cpf'] ?? '';?>">
									<label for="cpf">CPF*</label>
								</div>

								<div class="md-form">
									<i class="fa fa-envelope prefix grey-text"></i>
									<input type="email" id="email" name="email" class="form-control"  required="true" minlenght="5" maxlength="100" value="<?=$dados['email'] ?? '';?>">
									<label for="email">E-mail*</label>
								</div>

								<div class="md-form">
									<i class="fa fa-lock prefix grey-text"></i>
									<input type="password" id="senha" name="senha" class="form-control"  required="true" minlength="6" maxlength="30">
									<label for="senha">Senha*</label>
								</div>

								<div class="md-form">
									<i class="fa fa-repeat prefix grey-text"></i>
									<input type="password" id="confirma-senha" name="confirma-senha" class="form-control" required="true" minlength="6" maxlength="30">
									<label for="confirma-senha">Confirmar Senha*</label>
								</div>

								<div class="md-form">

									<i class="fa fa-mobile prefix grey-text"></i>
									<input type="text" id="celular" name="celular" class="form-control" required="true" maxlength="15" value="<?=$dados['celular'] ?? '';?>">

									<label for="celular">Celular*</label>
								</div>

								<div class="md-form">
									<i class="fa fa-phone prefix grey-text"></i>
									<input type="text" id="telefone" name="telefone" class="form-control" value="<?=$dados['telefone'] ?? '';?>">
									<label for="telefone">Telefone</label>
								</div>

								<div class="md-form"> 
									<label class="mr-sm-2" for="deficiencia"></label> 
									<select name="deficiencia" id="deficiencia" class="form-control" required="false" value="<?=$dados['deficiencia'] ?? '';?>">
										<option disabled="">Possui Deficiência?</option> 
										<option value="0">Não</option>
										<option value="1">Sim</option> 
									</select> 
									<script type="text/javascript"> 
										$("#deficiencia").change(function(){ 
											if($(this).val() == 1) $("#txtdediciaencia").show(); 
											else $("#txtdediciaencia").hide(); 
										}); 
									</script> 
								</div> 
								
								<div class="md-form" id="txtdediciaencia" style="display: none;"> 
									<i class="fa fa-id-card prefix grey-text"></i> 
									<input type="text" id="deficiencia_desc" name="deficiencia_desc" class="form-control" maxlength="250" 
									value="<?=$dados['deficiencia_desc'] ?? '';?>">
									<label for="deficiencia_desc">Especifique sua deficiência</label> 
								</div> 
								

								<h3 class="text-center font-bold deep-black-text py-4">Dados de Endereço</h3>

								<div class="" role="alert" id="erroCep">
								</div>
								<div class="md-form">
									<i class="fa fa-map-o prefix grey-text"></i>
									<input type="text" id="cep" name="cep" class="form-control" required="true" minlength="8" maxlength="9" onfocusout="pesquisacep(this.value);" value="<?=$dados['cep'] ?? '';?>">
									<label for="cep">CEP*</label>
								</div>
								<div id="div_escondida" hidden="true">
									<div class="md-form">
										<i class="fa fa-home prefix grey-text"></i>
										<input type="text" id="rua" name="endereco" class="form-control" required="true" minlength="3" maxlength="50" value="<?=$dados['endereco'] ?? '';?>">
										<label for="rua">Endereço*</label>
									</div>

									<div class="md-form">
										<i class="fa fa-home prefix grey-text"></i>
										<input type="text" id="bairro" name="bairro" class="form-control" required="true" minlength="3" maxlength="50" value="<?=$dados['bairro'] ?? '';?>">
										<label for="bairro">Bairro*</label>
									</div>

									<div class="md-form">
										<i class="fa fa-map-marker prefix grey-text"></i>


										<input type="text" id="cidade" name="cidade" class="form-control" required="true" minlength="1" maxlength="100"  value="<?=$dados['cidade'] ?? '';?>">
										<label for="cidade">Cidade*</label>
									</div>
									<select required="true" class="form-control" id="estado" name="estado" value="<?=$dados['estado'] ?? '';?>">


										<option value="">Selecione um Estado</option>

										<option value="AC">Acre</option> 
										<option value="AL">Alagoas</option> 
										<option value="AP">Amapá</option> 
										<option value="AM">Amazonas</option> 
										<option value="BA">Bahia</option> 
										<option value="CE">Ceará</option> 
										<option value="DF">Distrito Federal</option> 
										<option value="ES">Espírito Santo</option> 
										<option value="GO">Goiás</option> 
										<option value="MA">Maranhão</option> 
										<option value="MT">Mato Grosso</option> 
										<option value="MS">Mato Grosso do Sul</option> 
										<option value="MG">Minas Gerais</option> 
										<option value="PA">Pará</option> 
										<option value="PB">Paraíba</option> 
										<option value="PR">Paraná</option> 
										<option value="PE">Pernambuco</option> 
										<option value="PI">Piauí</option> 
										<option value="RJ">Rio de Janeiro</option> 
										<option value="RN">Rio Grande do Norte</option> 
										<option value="RS">Rio Grande do Sul</option> 
										<option value="RO">Rondônia</option> 
										<option value="RR">Roraima</option> 
										<option value="SC">Santa Catarina</option> 
										<option value="SP">São Paulo</option> 
										<option value="SE">Sergipe</option> 
										<option value="TO">Tocantins</option> 
									</select> 



									<label class="mr-sm-2" for="submeter_trabalho"></label>
									<select class="form-control" id="submeter_trabalho" name="submeter_trabalho" required="" value="<?=$dados['submeter_trabalho'] ?? '';?>">
										<option value="">Irá submeter Trabalho?*</option>
										<option value="1">Sim</option>
										<option value="0">Não</option>
									</select>



									<label class="mr-sm-2" for="tipo"></label>
									<select class="form-control" id="tipo" name="id_tipo_inscricao" required="" value="<?=$dados['id_tipo_inscricao'] ?? '';?>">
										<option value="">Tipo da Inscrição*</option>
										<option value="1">Aluno Graduação</option>
										<option value="2">Aluno Pós-Graduação</option>
										<option value="3">Professor Universitário</option>
										<option value="4">Professor Ensino Público</option>
										<option value="5">Demais Profissionais</option>
									</select>



									<div class="text-center">
										<button class="btn btn-deep-orange">Próximo<i class="fa fa-angle-double-right pl-2" aria-hidden="true"></i></button>
									</div>
								</form>
								<!-- Form -->
							</div>
						</div>
					</div>

					<div class="text-center darken-grey-text mb-4">
					</div>

				</div>
				<!--modalCep-->
				<div class="modal" id="modalCep" tabindex="-1" role="dialog">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">Carregando</h5>
								Aguarde! informações do CEP sendo carregadas.
							</div>
							<div class="modal-body">
								<p style="text-align: center;"><img src="assets/img/loading.gif"></p>
							</div>
						</div>
					</div>
				</div>


			</main>


			<script type="text/javascript"> 
				var senha = $('#senha'); 
				var confirma_senha = $('#confirma-senha') 
				
				confirma_senha.focusout(function(){ 
					if(senha.val() != confirma_senha.val()){ 
						alert("AVISO! Senha e Confirmar Senha estão diferentes!"); 
						senha.val(''); 
						confirma_senha.val(''); 
						senha.focus(); 
					} 
				}); 
				
				senha.focusout(function(){ 
					if(confirma_senha.val() != ''){   
						if(senha.val() != confirma_senha.val()){ 
							alert("AVISO! Senha e Confirmar Senha estão diferentes!"); 
							senha.val(''); 
							confirma_senha.val(''); 
							senha.focus(); 
						} 
					} 
				}); 
				
				
			</script> 