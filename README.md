# DSBR API

WebServices - Criação de Encomendas no BlueX via DSBR API

### Métodos
- CreateCertificate_CNPJ
- CreateCertificate_ME
- CreateCertificate_NFE
- CreateCertificate_ECPF
- SetPaymentOrder
- StatusCertificado

### Configuração

- Defina as informações de PF / PJ no arquivo `Data.php`
- Atenção para `$_Data['reqid_orderid']` que precisa ser preenchida com o ID de uma solicitação já enviada, é utilizada em `StatusCertificado.php`
