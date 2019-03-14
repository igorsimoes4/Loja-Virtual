<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" integrity="sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">

<!-- Optional theme -->
 <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css" integrity="sha384-aUGj/X2zp5rLCbBxumKTCw2Z50WgIr1vs/PFN4praOTvYXWlVyh2UtNUU0KAUhAX" crossorigin="anonymous">
-->
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js" integrity="sha512-K1qjQ+NcF2TYO/eI3M6v8EiNYZfA95pQumfvcVrTHtwQVDG+aHRqLi/ETn2uB+1JqwYqVG3LIvdm9lj6imS/pQ==" crossorigin="anonymous"></script>

<script src="https://github.com/makeusabrew/bootbox/releases/download/v4.4.0/bootbox.min.js"></script>

<script type="text/javascript">
    $("#cpf").mask("000.000.000-00");
    $("#rg").mask("00.000.000-00");
    $("#residencial").mask("(00) 0000-0000");
    $("#celular").mask("(00) 0 0000-0000");
    $("#comercial").mask("(00) 0000-0000");
    $("#cep").mask("00000-000");
    $("#data").mask("00/00/0000");

    function limpa_formulário_cep() {
	            //Limpa valores do formulário de cep.
	            document.getElementById('rua').value=("");
	            document.getElementById('bairro').value=("");
	            document.getElementById('cidade').value=("");
	            document.getElementById('uf').value=("");
	           // document.getElementById('ibge').value=("");
	    }

	    function meu_callback(conteudo) {
	        if (!("erro" in conteudo)) {
	            //Atualiza os campos com os valores.
	            document.getElementById('rua').value=(conteudo.logradouro);
	            document.getElementById('bairro').value=(conteudo.bairro);
	            document.getElementById('cidade').value=(conteudo.localidade);
	            document.getElementById('uf').value=(conteudo.uf);
	            //document.getElementById('ibge').value=(conteudo.ibge);
	        } //end if.
	        else {
	            //CEP não Encontrado.
	            limpa_formulário_cep();
	            bootbox.alert("CEP não encontrado.");
	        }
	    }
	        
	    function pesquisacep(valor) {

	        //Nova variável "cep" somente com dígitos.
	        var cep = valor.replace(/\D/g, '');

	        //Verifica se campo cep possui valor informado.
	        if (cep != "") {

	            //Expressão regular para validar o CEP.
	            var validacep = /^[0-9]{8}$/;

	            //Valida o formato do CEP.
	            if(validacep.test(cep)) {

	                //Preenche os campos com "..." enquanto consulta webservice.
	                document.getElementById('rua').value="...";
	                document.getElementById('bairro').value="...";
	                document.getElementById('cidade').value="...";
	                document.getElementById('uf').value="...";
	                //document.getElementById('ibge').value="...";

	                //Cria um elemento javascript.
	                var script = document.createElement('script');

	                //Sincroniza com o callback.
	                script.src = '//viacep.com.br/ws/'+ cep + '/json/?callback=meu_callback';

	                //Insere script no documento e carrega o conteúdo.
	                document.body.appendChild(script);

	            } //end if.
	            else {
	                //cep é inválido.
	                limpa_formulário_cep();
	                bootbox.alert("Formato de CEP inválido.");
	            }
	        } //end if.
	        else {
	            //cep sem valor, limpa formulário.
	            limpa_formulário_cep();
	        }
	    };

</script>
<div class="container">
	</br>	
		<div class="card border-dark mb-3">
			<div class="card-header">
				<h5>Formulário de cadastro</h5>
			</div>
			<div class="card-body text-dark">
		    	<form method="post" class="form-row">
		    		
		    			<div class="col-6">
		    				<div class="form-group">
								<label>Nome:</label>
								<input type="name" name="name" class="form-control" />
							</div>
		    			</div>
		    			
		    			<div class="col-6">
		    				<div class="form-group">
								<label>CPF:</label>
								<input type="cpf" placeholder="xxx.xxx.xxx-xx" id="cpf" name="cpf" class="form-control" />
							</div>
		    			</div>
		    			<div class="col-4">
		    				<div class="form-group">
								<label>RG:</label>
								<input type="rg" id="rg"placeholder="xx.xxx.xxx-xx" name="rg" class="form-control" />
							</div>
		    			</div>

						<div class="col-4">
		    				<div class="form-group">
								<label>E-mail:</label>
								<input type="email" name="email" class="form-control" />
							</div>
		    			</div>
		    			<div class="col-4">
		    				<div class="form-group">
								<label>Senha:</label>
								<input type="password" name="senha" class="form-control" />
							</div>
		    			</div>

		    			<div class="col-3">
		    				<div class="form-group">
								<label>Data de Nascimento:</label>
								<input type="text" placeholder="dd/mm/YYYY" id="data" name="data" class="form-control" />
							</div>
		    			</div>
		    		
		    		<div class="col-6">
		    			<div class="form-group">
		    				<label>Cep:</label>
				        	<input name="cep" placeholder="00000-000" type="text" id="cep" value="" size="10" maxlength="9"
				               onblur="pesquisacep(this.value);" class="form-control" />
		    			</div>
				    </div>
				    <div class="col-3">
				    	<div class="form-group">
				    		<label>Número</label>
				        	<input name="numero" type="text" class="form-control" />
				    	</div>
				    </div>
				    <div class="col-6">
				    	<div class="form-group">
				    		<label>Rua:</label>
				        	<input name="rua" type="text" id="rua" size="60" class="form-control" />
				    	</div>
				    </div>
				    
				    <div class="col-6">
				    	<div class="form-group">
				    		<label>Complemento</label>
				        	<input name="complemento" type="text" class="form-control" />
				    	</div>
				    </div>
				    <div class="col-6">
				    	<div class="form-group">
				    		<label>Bairro:</label>
				        <input name="bairro" type="text" id="bairro" size="40" class="form-control" />
				    	</div>
				    </div>
				    <div class="col-3">
				    	<div class="form-group">
				    		<div class="form-group">
					    		<label>Cidade:</label>
					        	<input name="cidade" type="text" id="cidade" size="40" class="form-control" />
					    	</div>
				    	</div>
				    </div>
				    <div class="col-3">
				    	<div class="form-group">
				    		<label>Estado:</label>
				        	<input name="uf" type="text" id="uf" size="2" class="form-control" />
				    	</div>
				    </div>  
      				    			
		    			<div class="col-4">
		    				<div class="form-group">
								<label>Telefone Residencial:</label>
								<input type="text" placeholder="(DD) 0000-0000" id="residencial" name="residencial" class="form-control" />
							</div>
		    			</div>
		    			
		    			<div class="col-4">
		    				<div class="form-group">
								<label>Telefone Celular:</label>
								<input type="text" placeholder="(DD) 0 0000-0000" id="celular" name="celular" class="form-control" />
							</div>
		    			</div>
		    			
		    			<div class="col-4">
		    				<div class="form-group">
								<label>Telefone Comercial:</label>
								<input type="text" placeholder="(DD) 0000-0000" id="comercial" name="comercial" class="form-control" />
							</div>
		    			</div>
		    			<div class="col-4">
		    				<div class="form-group">
								
							</div>
		    			</div>
		    			<div class="col-4">
		    				<div class="form-group">
							</div>
		    			</div>
		    			<div class="col-4">
		    				<div class="form-group">
		    				</br>
		    					<a href="" class="btn btn-primary form-control">Efetuar Cadastro</a>
							</div>
		    			</div>
		    		</div>
		            
		 		</form>
		  	</div>
		</div>
		
	</div>
