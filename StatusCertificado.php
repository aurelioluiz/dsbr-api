<?php require 'Auth.php';

try {
  $CertData = new CertData();
  $CertData->cpf_cnpj = $_Data['cnpj'];
  $CertData->reqid_orderid = $_Data['reqid_orderid'];

  $client = new DSBRAPISoapClient();
  $result = $client->StatusCertificado($AuthType, $CertData);
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
          <p class="panel-heading has-background-info has-text-white has-text-weight-semibold">e-CPF StatusCertificado</p>
          <pre><?php var_dump($result); ?></pre>
        </nav>
        <a class="button is-light" href="index.php">Voltar</a>
      </div>
    </section>
  </body>
</html>
