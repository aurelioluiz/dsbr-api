<?php require 'Auth.php';

$OrderType = new OrderType();
$OrderType->financial_name = '';
$OrderType->financial_cpf_cnpj = '';
$OrderType->financial_company = '';
$OrderType->financial_email = '';
$OrderType->financial_state = '';
$OrderType->financial_location = '';
$OrderType->financial_phone_area_code = '';
$OrderType->financial_phone = '';
$OrderType->financial_cep = '';
$OrderType->financial_address = '';
$OrderType->financial_number = '';
$OrderType->financial_neighborhood = '';
$OrderType->product_code = $_GET['code'];
// opcionais
$OrderType->promocode = '';
$OrderType->financial_complement = '';
$OrderType->payMethod = 'boleto';
$OrderType->orderbase = '';
$OrderType->renewal = '';

$CPFCertType = new CPFCertType();
$CPFCertType->cpf = '';
$CPFCertType->data_nascimento = '';
$CPFCertType->email = '';
$CPFCertType->estado = '';
$CPFCertType->municipio = '';
$CPFCertType->telefone_area = '';
$CPFCertType->telefone = '';
$CPFCertType->revogation_passphrase = '';
$CPFCertType->documento_identificacao = '';
// opcionais
$CPFCertType->cei = '';
$CPFCertType->nis = '';
$CPFCertType->num_eleitor = '';
$CPFCertType->zona_eleitoral = '';
$CPFCertType->secao_eleitoral = '';
$CPFCertType->municipio_eleitoral = '';
$CPFCertType->rg = '';
$CPFCertType->sigla_orgao_expedidor = '';

try {
  $client = new DSBRAPISoapClient();
  $result = $client->CreateCertificate_ECPF($AuthType, $OrderType, $CPFCertType);
} catch (Exception $e) {
  $result = $e->getMessage();
}

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>DSBR API</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.5/css/bulma.min.css" />
  </head>
  <body>
    <section class="section">
      <div class="container">
        <h1 class="title">DSBR API</h1>
        <h2 class="subtitle">WebServices - Criação de Encomendas no BlueX via DSBR API</h2>
        <nav class="panel">
          <p class="panel-heading has-background-info has-text-white has-text-weight-semibold">e-CPF</p>
          <pre><?php var_dump($result); ?></pre>
        </nav>
        <a class="button is-light" href="index.php">Voltar</a>
      </div>
    </section>
  </body>
</html>
