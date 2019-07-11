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

$CNPJCertType = new CNPJCertType();
$CNPJCertType->cnpj = '';
$CNPJCertType->cpf = '';
$CNPJCertType->data_nascimento = '';
$CNPJCertType->nome_empresa = '';
$CNPJCertType->name_cnpj = '';
$CNPJCertType->documento_identificacao = '';
$CNPJCertType->email = '';
$CNPJCertType->estado = '';
$CNPJCertType->municipio = '';
$CNPJCertType->telefone_area_representante = '';
$CNPJCertType->telefone_representante = '';
$CNPJCertType->revogation_passphrase = '';
// opcionais
$CNPJCertType->cei_pessoa_juridica = '';
$CNPJCertType->nis = '';
$CNPJCertType->num_eleitor = '';
$CNPJCertType->zona_eleitoral = '';
$CNPJCertType->secao_eleitoral = '';
$CNPJCertType->municipio_eleitoral = '';
$CNPJCertType->rg = '';
$CNPJCertType->sigla_orgao_expedidor = '';
$CNPJCertType->telefone_area_empresa = '';
$CNPJCertType->telefone = '';
$CNPJCertType->estado_representante = '';
$CNPJCertType->municipio_representante = '';


try {
  $client = new DSBRAPISoapClient();

  switch ($_GET['type']) {
    case 'nfe': $result = $client->CreateCertificate_NFE($AuthType, $OrderType, $CNPJCertType); break;
    case 'me': $result = $client->CreateCertificate_ME($AuthType, $OrderType, $CNPJCertType); break;
    default: $result = $client->CreateCertificate_CNPJ($AuthType, $OrderType, $CNPJCertType); break;
  }
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
          <p class="panel-heading has-background-info has-text-white has-text-weight-semibold">e-CNPJ A1 12M</p>
          <pre><?php var_dump($result); ?></pre>
        </nav>
        <a class="button is-light" href="index.php">Voltar</a>
      </div>
    </section>
  </body>
</html>
