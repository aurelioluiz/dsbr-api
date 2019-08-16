<?php require 'Auth.php';

$OrderType = new OrderType();
$OrderType->financial_name = $_Data['financial_name'];
$OrderType->financial_cpf_cnpj = $_Data['financial_cpf_cnpj'];
$OrderType->financial_company = $_Data['financial_company'];
$OrderType->financial_email = $_Data['financial_email'];
$OrderType->financial_state = $_Data['financial_state'];
$OrderType->financial_location = $_Data['financial_location'];
$OrderType->financial_phone_area_code = $_Data['financial_phone_area_code'];
$OrderType->financial_phone = $_Data['financial_phone'];
$OrderType->financial_cep = $_Data['financial_cep'];
$OrderType->financial_address = $_Data['financial_address'];
$OrderType->financial_number = $_Data['financial_number'];
$OrderType->financial_neighborhood = $_Data['financial_neighborhood'];
$OrderType->product_code = $_GET['code'];
// opcionais
$OrderType->promocode = $_Data['promocode'];
$OrderType->financial_complement = $_Data['financial_complement'];
$OrderType->payMethod = 'boleto';
$OrderType->orderbase = $_Data['orderbase'];
$OrderType->renewal = $_Data['renewal'];

$CPFCertType = new CPFCertType();
$CPFCertType->cpf = $_Data['cpf'];
$CPFCertType->data_nascimento = $_Data['data_nascimento'];
$CPFCertType->email = $_Data['email'];
$CPFCertType->estado = $_Data['estado'];
$CPFCertType->municipio = $_Data['municipio'];
$CPFCertType->telefone_area = $_Data['telefone_area'];
$CPFCertType->telefone = $_Data['telefone'];
$CPFCertType->revogation_passphrase = $_Data['revogation_passphrase'];
$CPFCertType->documento_identificacao = $_Data['documento_identificacao'];
// opcionais
$CPFCertType->cei = $_Data['cei'];
$CPFCertType->nis = $_Data['nis'];
$CPFCertType->num_eleitor = $_Data['num_eleitor'];
$CPFCertType->zona_eleitoral = $_Data['zona_eleitoral'];
$CPFCertType->secao_eleitoral = $_Data['secao_eleitoral'];
$CPFCertType->municipio_eleitoral = $_Data['municipio_eleitoral'];
$CPFCertType->rg = $_Data['rg'];
$CPFCertType->sigla_orgao_expedidor = $_Data['sigla_orgao_expedidor'];

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
