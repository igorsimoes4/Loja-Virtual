<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>

<h1 align="center">Checkout Transparente - Pagseguro</h1>
<div class="container">

	<form>
		<h3>Dados Pessoais</h3>
		<div class="row">
			<div class="col-sm-6">
		    	<div class="form-group">
					<label>Nome:</label>
					<input type="text" name="name" class="form-control" />
				</div>
		    </div>
		    <div class="col-sm-6">
		    	<div class="form-group">
					<label>CPF:</label>
					<input type="cpf" placeholder="xxx.xxx.xxx-xx" id="cpf" name="cpf" class="form-control" />
				</div>
		    </div>
		    <div class="col-sm-4">
		    	<div class="form-group">
					<label>RG:</label>
					<input type="rg" id="rg"placeholder="xx.xxx.xxx-xx" name="rg" class="form-control" />
				</div>
		    </div>
			<div class="col-sm-4">
		    	<div class="form-group">
					<label>E-mail:</label>
					<input type="email" name="email" class="form-control" />
				</div>
		    </div>
		    <div class="col-sm-4">
		    	<div class="form-group">
					<label>Senha:</label>
					<input type="password" name="senha" class="form-control" />
				</div>
		    </div>
		</div>
		<div class="linha"></div>
		<h3>Informações de Endereço</h3>
		<div class="row">
			<div class="col-sm-6">
		    	<div class="form-group">
		    		<label>Cep:</label>
				    <input name="cep" placeholder="00000-000" type="text" id="cep" value="" size="10" maxlength="9"
				               onblur="pesquisacep(this.value);" class="form-control" />
		    	</div>
		    </div>
			<div class="col-sm-6">
			   	<div class="form-group">
			   		<label>Número</label>
			       	<input name="numero" type="text" class="form-control" />
			   	</div>
			</div>
			<div class="col-sm-6">
			  	<div class="form-group">
			  		<label>Rua:</label>
			       	<input name="rua" type="text" id="rua" size="60" class="form-control" />
			   	</div>
			</div>
			<div class="col-sm-6">
			   	<div class="form-group">
			   		<label>Complemento</label>
			       	<input name="complemento" type="text" class="form-control" />
			   	</div>
			</div>
			<div class="col-sm-6">
			   	<div class="form-group">
			   		<label>Bairro:</label>
			        <input name="bairro" type="text" id="bairro" size="40" class="form-control" />
			   	</div>
			</div>
			<div class="col-sm-3">
			   	<div class="form-group">
			  		<div class="form-group">
			    		<label>Cidade:</label>
			        	<input name="cidade" type="text" id="cidade" size="40" class="form-control" />
			    	</div>
			   	</div>
			</div>
			<div class="col-sm-3">
			   	<div class="form-group">
			   		<label>Estado:</label>
			       	<input name="uf" type="text" id="uf" size="2" class="form-control" />
			   	</div>
			</div>  
		</div>
		<div class="linha"></div>
		<h3>Informações de Pagamento</h3>
		<div class="row">
			<div class="col-sm-3">
		    	<div class="form-group">
		    		<label>Número do Cartão:</label>
				    <input type="text" name="cartao_numero" class="form-control">
		    	</div>
		    </div>
		    <div class="col-sm-3">
		    	<div class="form-group">
		    		<label>Bandeira do Cartão:</label>
				</div>
		    </div>
			<div class="col-sm-3">
			   	<div class="form-group">
			   		<label>Código de Segurança</label>
			       	<input name="cartao_cvv" type="text" class="form-control" />
			   	</div>
			</div>
			<div class="col-sm-1">
		    	<div class="form-group">
					<label>Mês:</label>
					<input type="text" placeholder="MM" id="data_mes" name="cartao_mes" class="form-control" />
				</div>
		    </div>
		    <div class="col-sm-2">
		    	<div class="form-group">
					<label>Ano:</label>
					<input type="text" placeholder="YYYY" id="data_ano" name="cartao_ano" class="form-control" />
				</div>
		    </div>
		
		    <div class="col-sm-4">
		    	<div class="form-group"></div>
		    </div>
		    <div class="col-sm-4">
		    	<div class="form-group"></div>
		    </div>
		    <div class="col-sm-4">
		    	<div class="form-group">
		    		</br>
		    		<a href="" class="btn btn-primary form-control">Efetuar Compra</a>
				</div>
		    </div>
		</div>
	</form>
	
</div>
<script type="text/javascript" src="https://stc.sandbox.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.directpayment.js"></script>
<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/psckttransparente.js"></script>
<script type="text/javascript">
	PagSeguroDirectPayment.setSessionId("<?php echo $sessionCode; ?>");
</script>
<script type="text/javascript">
    $("#cpf").mask("000.000.000-00");
    $("#rg").mask("00.000.000-00");
    $("#residencial").mask("(00) 0000-0000");
    $("#celular").mask("(00) 0 0000-0000");
    $("#comercial").mask("(00) 0000-0000");
    $("#data_mes").mask("00");
    $("#data_ano").mask("0000");

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