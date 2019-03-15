<h1 align="center">Checkout Transparente - Pagseguro</h1>
<div class="container">

	<form>
		<div class="row">
			<div class="col">
				<div class="form-group">
					<label>Nome:</label>
					<input type="text" name="name" class="form-control">
				</div>
			</div>
			<div class="col">
				<div class="form-group">
					<label>CPF:</label>
					<input type="text" name="cpf" class="form-control">
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