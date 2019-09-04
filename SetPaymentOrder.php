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
$OrderType->payMethod = 'credito';
$OrderType->orderbase = $_Data['orderbase'];
$OrderType->renewal = $_Data['renewal'];

$CNPJCertType = new CNPJCertType();
$CNPJCertType->cnpj = $_Data['cnpj'];
$CNPJCertType->cpf = $_Data['cpf'];
$CNPJCertType->data_nascimento = $_Data['data_nascimento'];
$CNPJCertType->nome_empresa = $_Data['nome_empresa'];
$CNPJCertType->name_cnpj = $_Data['name_cnpj'];
$CNPJCertType->documento_identificacao = $_Data['documento_identificacao'];
$CNPJCertType->email = $_Data['email'];
$CNPJCertType->estado = $_Data['estado'];
$CNPJCertType->municipio = $_Data['municipio'];
$CNPJCertType->telefone_area_representante = $_Data['telefone_area_representante'];
$CNPJCertType->telefone_representante = $_Data['telefone_representante'];
$CNPJCertType->revogation_passphrase = $_Data['revogation_passphrase'];
// opcionais
$CNPJCertType->cei_pessoa_juridica = $_Data['cei_pessoa_juridica'];
$CNPJCertType->nis = $_Data['nis'];
$CNPJCertType->num_eleitor = $_Data['num_eleitor'];
$CNPJCertType->zona_eleitoral = $_Data['zona_eleitoral'];
$CNPJCertType->secao_eleitoral = $_Data['secao_eleitoral'];
$CNPJCertType->municipio_eleitoral = $_Data['municipio_eleitoral'];
$CNPJCertType->rg = $_Data['rg'];
$CNPJCertType->sigla_orgao_expedidor = $_Data['sigla_orgao_expedidor'];
$CNPJCertType->telefone_area_empresa = $_Data['telefone_area_empresa'];
$CNPJCertType->telefone = $_Data['telefone'];
$CNPJCertType->estado_representante = $_Data['estado_representante'];
$CNPJCertType->municipio_representante = $_Data['municipio_representante'];

try {
  $client = new DSBRAPISoapClient();

  switch ($_GET['type']) {
    case 'nfe': $xml = $client->CreateCertificate_NFE($AuthType, $OrderType, $CNPJCertType); break;
    case 'me': $xml = $client->CreateCertificate_ME($AuthType, $OrderType, $CNPJCertType); break;
    default: $xml = $client->CreateCertificate_CNPJ($AuthType, $OrderType, $CNPJCertType); break;
  }

  $certificate = new SimpleXMLElement($xml);
  $PaymentCard = new PaymentCard();
  $PaymentCard->payMethod = $OrderType->payMethod;
	$PaymentCard->card_number = $_Data['card_number'];
	$PaymentCard->expire_month = $_Data['expire_month'];
	$PaymentCard->expire_year = $_Data['expire_year'];
	$PaymentCard->card_name = $_Data['card_name'];
	$PaymentCard->card_cvv = $_Data['card_cvv'];
	$PaymentCard->parcela_valor = '00';
	$PaymentCard->orderid_pay = $certificate->orderid;
	$PaymentCard->url_retorno = '?';

  $xml = $client->SetPaymentOrder($AuthType, $PaymentCard);
  $payment = new SimpleXMLElement($xml);
} catch (Exception $e) {
  $certificate = $e->getMessage();
  $payment = [];
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
          <p class="panel-heading has-background-info has-text-white has-text-weight-semibold">e-CNPJ SetPaymentOrder</p>
          <pre><?php var_dump($certificate); ?></pre>
          <pre><?php var_dump($payment); ?></pre>
        </nav>
        <a class="button is-light" href="index.php">Voltar</a>
      </div>
    </section>
  </body>
</html>
