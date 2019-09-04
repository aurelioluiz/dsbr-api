<?php
/**
 * @service DSBRAPISoapClient
 */
class DSBRAPISoapClient{
	/**
	 * The WSDL URI
	 *
	 * @var string
	 */
	public static $_WsdlUri='https://www-dev.digitalsigncertificadora.com.br/api2.1.php?WSDL';
	/**
	 * The PHP SoapClient object
	 *
	 * @var object
	 */
	public static $_Server=null;

	/**
	 * Send a SOAP request to the server
	 *
	 * @param string $method The method name
	 * @param array $param The parameters
	 * @return mixed The server response
	 */
	public static function _Call($method,$param){
		if(is_null(self::$_Server))
			self::$_Server=new SoapClient(self::$_WsdlUri);
		return self::$_Server->__soapCall($method,$param);
	}

	/**
	 * Este metodo permite consultar o estado do servidor de webservice. Dado um dado especifico ele devolve o nome.
	 *
	 * @param string $info
	 * @retusrn string Texto concatenado com o $info
	 */
	public function ping($info){
		return self::_Call('ping',Array(
			$info
		));
	}

	/**
	 * Este metodo permite consultar o estado em que se encontra o certificado
	 *
	 * @param AuthType $authtype
	 * @param CertData $certData
	 * @retusrn string Tipo de dados retornado
	 */
	public function StatusCertificado($authtype,$certData){
		return self::_Call('StatusCertificado',Array(
			$authtype,
			$certData
		));
	}

	/**
	 * Este metodo permite consultar a trilha de um certificado
	 *
	 * @param AuthType $authtype
	 * @param Trilha $trilha
	 * @retusrn string Tipo de dados retornado
	 */
	public function ConsultaTrilha($authtype,$trilha){
		return self::_Call('ConsultaTrilha',Array(
			$authtype,
			$trilha
		));
	}

	/**
	 * Este metodo permite pela API da eRede consultar o pagamento por Cartao
	 *
	 * @param AuthType $authtype
	 * @param PaymentCard $paymentcard
	 * @retusrn string Tipo de dados retornado
	 */
	public function SetPaymentOrder($authtype,$paymentcard){
		return self::_Call('SetPaymentOrder',Array(
			$authtype,
			$paymentcard
		));
	}

	/**
	 * Este metodo permite pela API da eRede consultar o pagamento por Cartao
	 *
	 * @param AuthType $authtype
	 * @param string $bx_order
	 * @retusrn string Tipo de dados retornado
	 */
	public function GetPaymentOrder($authtype,$bx_order){
		return self::_Call('GetPaymentOrder',Array(
			$authtype,
			$bx_order
		));
	}

	/**
	 * Este metodo pede uma lista de certificados para um periodo.
	 *
	 * @param AuthType $authtype
	 * @param PedCertificate $pedidoCert
	 * @retusrn string Tipo de dados retornado
	 */
	public function GetIntervalCertificate($authtype,$pedidoCert){
		return self::_Call('GetIntervalCertificate',Array(
			$authtype,
			$pedidoCert
		));
	}

	/**
	 * Este metodo pede a Frase de IdentificaÃ§Ã£o para um Certificado.
	 *
	 * @param AuthType $authtype
	 * @param CertPhrase $certificado
	 * @retusrn string Tipo de dados retornado
	 */
	public function GetPassphrase($authtype,$certificado){
		return self::_Call('GetPassphrase',Array(
			$authtype,
			$certificado
		));
	}

	/**
	 * Este metodo pede o Envio de Email de enrolment para emissÃµes normais e renovaÃ§Ãµes.
	 *
	 * @param AuthType $authtype
	 * @param CertPhrase $certificado
	 * @retusrn string Tipo de dados retornado
	 */
	public function SendEnrolmentEmail($authtype,$certificado){
		return self::_Call('SendEnrolmentEmail',Array(
			$authtype,
			$certificado
		));
	}

	/**
	 * Este metodo cria um certificado eCPF A1 A3.
	 *
	 * @param AuthType $authtype
	 * @param OrderType $ordertype
	 * @param CPFCertType $cpftype
	 * @retusrn string Tipo de dados retornado
	 */
	public function CreateCertificate_ECPF($authtype,$ordertype,$cpftype){
		return self::_Call('CreateCertificate_ECPF',Array(
			$authtype,
			$ordertype,
			$cpftype
		));
	}

	/**
	 * Este metodo cria um certificado eCNPJ A1 A3.
	 *
	 * @param AuthType $authtype
	 * @param OrderType $ordertype
	 * @param CNPJCertType $cnpjtype
	 * @retusrn string Tipo de dados retornado
	 */
	public function CreateCertificate_CNPJ($authtype,$ordertype,$cnpjtype){
		return self::_Call('CreateCertificate_CNPJ',Array(
			$authtype,
			$ordertype,
			$cnpjtype
		));
	}

	/**
	 * Este metodo cria um certificado NF-e A1 A3.
	 *
	 * @param AuthType $authtype
	 * @param OrderType $ordertype
	 * @param CNPJCertType $cnpjtype
	 * @retusrn string Tipo de dados retornado
	 */
	public function CreateCertificate_NFE($authtype,$ordertype,$cnpjtype){
		return self::_Call('CreateCertificate_NFE',Array(
			$authtype,
			$ordertype,
			$cnpjtype
		));
	}

	/**
	 * Este metodo cria um certificado E-CNPJ EMPREENDEDOR (ME, EPP, MEI).
	 *
	 * @param AuthType $authtype
	 * @param OrderType $ordertype
	 * @param CNPJCertType $cnpjtype
	 * @retusrn string Tipo de dados retornado
	 */
	public function CreateCertificate_ME($authtype,$ordertype,$cnpjtype){
		return self::_Call('CreateCertificate_ME',Array(
			$authtype,
			$ordertype,
			$cnpjtype
		));
	}

	/**
	 * Metodo que valida CPF e CNPJ na RFB (Receita Federal do Brasil).
	 *
	 * @param AuthType $authtype
	 * @param RFBType $param
	 * @retusrn string Tipo de dados retornados
	 */
	public function consultaRFB($authtype,$param){
		return self::_Call('consultaRFB',Array(
			$authtype,
			$param
		));
	}
}

/**
 * Dado um array com os parametros valida CPF junto da RFB (Receita Federal do Brasil)
 *
 * @pw_element string $cpf numero do CPF.
 * @pw_element string $birthday Data de Nascimento no formato ddmmyyyy.
 * @pw_element string $cnpj numero do cnpj.
 * @pw_element string $certtype tipo de certificado.
 * @pw_complex RFBType
 */
class RFBType{
	/**
	 * numero do CPF.
	 *
	 * @var string
	 */
	public $cpf;
	/**
	 * Data de Nascimento no formato ddmmyyyy.
	 *
	 * @var string
	 */
	public $birthday;
	/**
	 * numero do cnpj.
	 *
	 * @var string
	 */
	public $cnpj;
	/**
	 * tipo de certificado.
	 *
	 * @var string
	 */
	public $certtype;
}

/**
 * O object com os dados necessarios para aceder ao webservice. Os dados fornecidos terao que ser previamente fornecidos pela DigitalSign
 *
 * @pw_element string $client_name Nome do cliente, para aceder ao webservice.
 * @pw_element string $auth_token Um token de acesso que pertence ao cliente indicado.
 * @pw_complex AuthType
 */
class AuthType{
	/**
	 * Nome do cliente, para aceder ao webservice.
	 *
	 * @var string
	 */
	public $client_name;
	/**
	 * Um token de acesso que pertence ao cliente indicado.
	 *
	 * @var string
	 */
	public $auth_token;
}

/**
 * Objeto devolvido na validacao do CPF. Se sucesso devolve resultado e o nome completo. Se houver erro devolve resultado, codigo e mensagem.
 *
 * @pw_element string $nomeCompleto Devolve nome completo em caso de corretamente validado
 * @pw_element string $resultado Devolve Sucesso ou Erro dependendo da validacao
 * @pw_element string $code Devolve o codigo de erro em caso de falha na validacao
 * @pw_element string $message Devolve a mensagem de erro em caso de falha na validacao
 * @pw_complex consultaRFBResponseType
 */
class consultaRFBResponseType{
	/**
	 * Devolve nome completo em caso de corretamente validado
	 *
	 * @var string
	 */
	public $nomeCompleto;
	/**
	 * Devolve Sucesso ou Erro dependendo da validacao
	 *
	 * @var string
	 */
	public $resultado;
	/**
	 * Devolve o codigo de erro em caso de falha na validacao
	 *
	 * @var string
	 */
	public $code;
	/**
	 * Devolve a mensagem de erro em caso de falha na validacao
	 *
	 * @var string
	 */
	public $message;
}

/**
 * O object com os dados necessarios para a emissao de um certificado do tipo: e-CPF
 *
 * Campos com 'minoccurs=0' sao opcionais.
 *
 * @pw_element string $cpf A string with a value. Max size: 11
 * @pw_element string $data_nascimento Data de nascimento do Titular do Certificado (Formato: ddmmaaaa) Ex: 30101987.
 * @pw_element string $email Email do Titular do Certificado
 * @pw_element string $estado Estado do Titular do Certificado Ex: SP
 * @pw_element string $municipio Codigo Municipio do Titular do Certificado do IBGE. Pode consultar aqui: http://www.ibge.gov.br/home/geociencias/areaterritorial/area.shtm
 * @pw_element string $telefone_area DDD do telefone do Titular do Certificado
 * @pw_element string $telefone Telefone do Titular do Certificado
 * @pw_element string $revogation_passphrase Senha de gerenciamento do certificado. Permite fazer acoes no certificado: revogar, levantar, etc
 * @pw_element string $documento_identificacao Documento de Indentificacao do Titular do Certificado.
 * @pw_element string $cei Numero do Cadastro Especifico do INSS (CEI) da Pessoa Fisica Titular do Certificado.
 * @pw_element string $nis Numero NIS (PIS/PASEP/NIT)
 * @pw_element string $num_eleitor Numero de Eleitor do Titular do Certificado
 * @pw_element string $zona_eleitoral Zona Eleitoral do Titular do Certificado
 * @pw_element string $secao_eleitoral Zona Eleitoral do Titular do Certificado
 * @pw_element string $municipio_eleitoral Municipio Eleitoral do Titular do Certificado + Estado. Ex: SAOBERNARDODOCAMPOSP
 * @pw_element string $rg Numero do RG
 * @pw_element string $sigla_orgao_expedidor orgao Expedidor e UF (Exemplo: SSPSP)
 * @pw_complex CPFCertType
 */
class CPFCertType{
	/**
	 * A string with a value. Max size: 11
	 *
	 * @var string
	 */
	public $cpf;
	/**
	 * Data de nascimento do Titular do Certificado (Formato: ddmmaaaa) Ex: 30101987.
	 *
	 * @var string
	 */
	public $data_nascimento;
	/**
	 * Email do Titular do Certificado
	 *
	 * @var string
	 */
	public $email;
	/**
	 * Estado do Titular do Certificado Ex: SP
	 *
	 * @var string
	 */
	public $estado;
	/**
	 * Codigo Municipio do Titular do Certificado do IBGE. Pode consultar aqui: http://www.ibge.gov.br/home/geociencias/areaterritorial/area.shtm
	 *
	 * @var string
	 */
	public $municipio;
	/**
	 * DDD do telefone do Titular do Certificado
	 *
	 * @var string
	 */
	public $telefone_area;
	/**
	 * Telefone do Titular do Certificado
	 *
	 * @var string
	 */
	public $telefone;
	/**
	 * Senha de gerenciamento do certificado. Permite fazer acoes no certificado: revogar, levantar, etc
	 *
	 * @var string
	 */
	public $revogation_passphrase;
	/**
	 * Documento de Indentificacao do Titular do Certificado.
	 *
	 * @var string
	 */
	public $documento_identificacao;
	/**
	 * Numero do Cadastro Especifico do INSS (CEI) da Pessoa Fisica Titular do Certificado.
	 *
	 * @var string
	 */
	public $cei;
	/**
	 * Numero NIS (PIS/PASEP/NIT)
	 *
	 * @var string
	 */
	public $nis;
	/**
	 * Numero de Eleitor do Titular do Certificado
	 *
	 * @var string
	 */
	public $num_eleitor;
	/**
	 * Zona Eleitoral do Titular do Certificado
	 *
	 * @var string
	 */
	public $zona_eleitoral;
	/**
	 * Zona Eleitoral do Titular do Certificado
	 *
	 * @var string
	 */
	public $secao_eleitoral;
	/**
	 * Municipio Eleitoral do Titular do Certificado + Estado. Ex: SAOBERNARDODOCAMPOSP
	 *
	 * @var string
	 */
	public $municipio_eleitoral;
	/**
	 * Numero do RG
	 *
	 * @var string
	 */
	public $rg;
	/**
	 * orgao Expedidor e UF (Exemplo: SSPSP)
	 *
	 * @var string
	 */
	public $sigla_orgao_expedidor;
}

/**
 * Objeto devolvido na criacao de certificados. Se houver erro, vem um grupo "erro" com as variaveis "mensagem" e "codigo".
 *
 * @pw_element string $resultado Resultado: Sucesso / Erro
 * @pw_element string $reqid Identificador do Pedido de Certificado
 * @pw_element int $orderid Identificador da Encomenda
 * @pw_element string $cn DN do certificado
 * @pw_element string $boleto Caso seja feito pagamento por boleto devolve o numero (para efetuar pagamento por boleto nÃ£o deve ser inserido nenhuma forma de pagamento)
 * @pw_element int $codigo Codigo de Erro
 * @pw_element string $mensagem Mensagem de erro
 * @pw_complex CreateResponseType
 */
class CreateResponseType{
	/**
	 * Resultado: Sucesso / Erro
	 *
	 * @var string
	 */
	public $resultado;
	/**
	 * Identificador do Pedido de Certificado
	 *
	 * @var string
	 */
	public $reqid;
	/**
	 * Identificador da Encomenda
	 *
	 * @var int
	 */
	public $orderid;
	/**
	 * DN do certificado
	 *
	 * @var string
	 */
	public $cn;
	/**
	 * Caso seja feito pagamento por boleto devolve o numero (para efetuar pagamento por boleto nÃ£o deve ser inserido nenhuma forma de pagamento)
	 *
	 * @var string
	 */
	public $boleto;
	/**
	 * Codigo de Erro
	 *
	 * @var int
	 */
	public $codigo;
	/**
	 * Mensagem de erro
	 *
	 * @var string
	 */
	public $mensagem;
}

/**
 * O object com os dados necessarios para a emissao da Nota Fiscal (dados de faturamento)
 *
 * @pw_element string $financial_name Nome da Empresa
 * @pw_element string $financial_cpf_cnpj CPF ou CNPJ a ser usado no faturamento
 * @pw_element string $financial_company Nome do Contato
 * @pw_element string $financial_email Email da Encomenda
 * @pw_element string $financial_state Estado da Encomenda Ex: SP
 * @pw_element string $financial_location Codigo do Municipio da Encomenda do IBGE. Pode consultar aqui: http://www.ibge.gov.br/home/geociencias/areaterritorial/area.shtm
 * @pw_element string $financial_phone_area_code DDD do telefone da Encomenda
 * @pw_element string $financial_phone Telefone da Encomenda
 * @pw_element string $financial_cep CEP da morada da encomenda.
 * @pw_element string $financial_address Endereco da Encomenda
 * @pw_element string $financial_number Numero do endereco da Encomenda
 * @pw_element string $financial_neighborhood Bairro do endereco da Encomenda
 * @pw_element string $product_code Codigo do produto eCNPJ/NFe/ME, EPP, MEI/eCPF e validade (ex: C01RPJA3SE12) sendo 12 a validade do certificado.
 * @pw_element string $promocode Codigo Promocional.
 * @pw_element string $financial_complement Complemento da morada
 * @pw_element string $payMethod Define o metodo de pagamento de acordo com o que foi definido para cada parceiro (pagseguro, voucher, cardcredit, cardedit, pospagamento, boleto).
 * @pw_element string $orderbase Numero da Encomenda base do Certificado em caso de Renovacao.
 * @pw_element string $renewal Indica se e renovacao 0 - Nao, 1 - Renovacao.
 * @pw_complex OrderType
 */
class OrderType{
	/**
	 * Nome da Empresa
	 *
	 * @var string
	 */
	public $financial_name;
	/**
	 * CPF ou CNPJ a ser usado no faturamento
	 *
	 * @var string
	 */
	public $financial_cpf_cnpj;
	/**
	 * Nome do Contato
	 *
	 * @var string
	 */
	public $financial_company;
	/**
	 * Email da Encomenda
	 *
	 * @var string
	 */
	public $financial_email;
	/**
	 * Estado da Encomenda Ex: SP
	 *
	 * @var string
	 */
	public $financial_state;
	/**
	 * Codigo do Municipio da Encomenda do IBGE. Pode consultar aqui: http://www.ibge.gov.br/home/geociencias/areaterritorial/area.shtm
	 *
	 * @var string
	 */
	public $financial_location;
	/**
	 * DDD do telefone da Encomenda
	 *
	 * @var string
	 */
	public $financial_phone_area_code;
	/**
	 * Telefone da Encomenda
	 *
	 * @var string
	 */
	public $financial_phone;
	/**
	 * CEP da morada da encomenda.
	 *
	 * @var string
	 */
	public $financial_cep;
	/**
	 * Endereco da Encomenda
	 *
	 * @var string
	 */
	public $financial_address;
	/**
	 * Numero do endereco da Encomenda
	 *
	 * @var string
	 */
	public $financial_number;
	/**
	 * Bairro do endereco da Encomenda
	 *
	 * @var string
	 */
	public $financial_neighborhood;
	/**
	 * Codigo do produto eCNPJ/NFe/ME, EPP, MEI/eCPF e validade (ex: C01RPJA3SE12) sendo 12 a validade do certificado.
	 *
	 * @var string
	 */
	public $product_code;
	/**
	 * Codigo Promocional.
	 *
	 * @var string
	 */
	public $promocode;
	/**
	 * Complemento da morada
	 *
	 * @var string
	 */
	public $financial_complement;
	/**
	 * Define o metodo de pagamento de acordo com o que foi definido para cada parceiro (pagseguro, voucher, cardcredit, cardedit, pospagamento, boleto).
	 *
	 * @var string
	 */
	public $payMethod;
	/**
	 * Numero da Encomenda base do Certificado em caso de Renovacao.
	 *
	 * @var string
	 */
	public $orderbase;
	/**
	 * Indica se e renovacao 0 - Nao, 1 - Renovacao.
	 *
	 * @var string
	 */
	public $renewal;
}

/**
 * O object com os dados necessarios para a emissao de um certificado do tipo: e-CNPJ
 *
 * Campos com 'minoccurs=0' sao opcionais.
 *
 * @pw_element string $cnpj A string with a value. Max size:14
 * @pw_element string $cpf A string with a value. Max size: 11
 * @pw_element string $data_nascimento Data de nascimento do Titular do Certificado (Formato: ddmmaaaa) Ex: 30101987
 * @pw_element string $nome_empresa Nome da Empresa
 * @pw_element string $name_cnpj Nome do representante
 * @pw_element string $documento_identificacao Documento de identificacao do representante
 * @pw_element string $email Email da empresa
 * @pw_element string $estado Estado da empresa Ex: SP
 * @pw_element string $municipio Codigo Municipio da Empresa do Certificado do IBGE. Pode consultar aqui: http://www.ibge.gov.br/home/geociencias/areaterritorial/area.shtm
 * @pw_element string $telefone_area_representante DDD do telefone do representante
 * @pw_element string $telefone_representante Telefone do representante
 * @pw_element string $revogation_passphrase Senha de gerenciamento do certificado. Permite fazer acoes no certificado: revogar, levantar, etc
 * @pw_element string $cei_pessoa_juridica Numero do Cadastro.
 * @pw_element string $nis Numero NIS (PIS/PASEP/NIT)
 * @pw_element string $num_eleitor Numero de Eleitor do Titular do Certificado
 * @pw_element string $zona_eleitoral Zona Eleitoral do Titular do Certificado
 * @pw_element string $secao_eleitoral Zona Eleitoral do Titular do Certificado
 * @pw_element string $municipio_eleitoral Municipio Eleitoral do Titular do Certificado + Estado. Ex: SAOBERNARDODOCAMPOSP
 * @pw_element string $rg Numero do RG. Registro Geral ou carteira de identidade
 * @pw_element string $sigla_orgao_expedidor orgao Expedidor e UF Ex: SSPSP
 * @pw_element string $telefone_area_empresa Area da empresa DDD
 * @pw_element string $telefone Telefone da empresa
 * @pw_element string $estado_representante Estado do representante Ex: SP
 * @pw_element string $municipio_representante Municipio representante Ex: Sao Bernardo do Campo
 * @pw_complex CNPJCertType
 */
class CNPJCertType{
	/**
	 * A string with a value. Max size:14
	 *
	 * @var string
	 */
	public $cnpj;
	/**
	 * A string with a value. Max size: 11
	 *
	 * @var string
	 */
	public $cpf;
	/**
	 * Data de nascimento do Titular do Certificado (Formato: ddmmaaaa) Ex: 30101987
	 *
	 * @var string
	 */
	public $data_nascimento;
	/**
	 * Nome da Empresa
	 *
	 * @var string
	 */
	public $nome_empresa;
	/**
	 * Nome do representante
	 *
	 * @var string
	 */
	public $name_cnpj;
	/**
	 * Documento de identificacao do representante
	 *
	 * @var string
	 */
	public $documento_identificacao;
	/**
	 * Email da empresa
	 *
	 * @var string
	 */
	public $email;
	/**
	 * Estado da empresa Ex: SP
	 *
	 * @var string
	 */
	public $estado;
	/**
	 * Codigo Municipio da Empresa do Certificado do IBGE. Pode consultar aqui: http://www.ibge.gov.br/home/geociencias/areaterritorial/area.shtm
	 *
	 * @var string
	 */
	public $municipio;
	/**
	 * DDD do telefone do representante
	 *
	 * @var string
	 */
	public $telefone_area_representante;
	/**
	 * Telefone do representante
	 *
	 * @var string
	 */
	public $telefone_representante;
	/**
	 * Senha de gerenciamento do certificado. Permite fazer acoes no certificado: revogar, levantar, etc
	 *
	 * @var string
	 */
	public $revogation_passphrase;
	/**
	 * Numero do Cadastro.
	 *
	 * @var string
	 */
	public $cei_pessoa_juridica;
	/**
	 * Numero NIS (PIS/PASEP/NIT)
	 *
	 * @var string
	 */
	public $nis;
	/**
	 * Numero de Eleitor do Titular do Certificado
	 *
	 * @var string
	 */
	public $num_eleitor;
	/**
	 * Zona Eleitoral do Titular do Certificado
	 *
	 * @var string
	 */
	public $zona_eleitoral;
	/**
	 * Zona Eleitoral do Titular do Certificado
	 *
	 * @var string
	 */
	public $secao_eleitoral;
	/**
	 * Municipio Eleitoral do Titular do Certificado + Estado. Ex: SAOBERNARDODOCAMPOSP
	 *
	 * @var string
	 */
	public $municipio_eleitoral;
	/**
	 * Numero do RG. Registro Geral ou carteira de identidade
	 *
	 * @var string
	 */
	public $rg;
	/**
	 * orgao Expedidor e UF Ex: SSPSP
	 *
	 * @var string
	 */
	public $sigla_orgao_expedidor;
	/**
	 * Area da empresa DDD
	 *
	 * @var string
	 */
	public $telefone_area_empresa;
	/**
	 * Telefone da empresa
	 *
	 * @var string
	 */
	public $telefone;
	/**
	 * Estado do representante Ex: SP
	 *
	 * @var string
	 */
	public $estado_representante;
	/**
	 * Municipio representante Ex: Sao Bernardo do Campo
	 *
	 * @var string
	 */
	public $municipio_representante;
}

/**
 * O object com os dados necessarios para a verificacao do estado do certificado
 *
 * @pw_element string $cpf_cnpj CPF ou CPNJ usado na criacao do certificado sem espacos e caracteres especiais.
 * @pw_element string $reqid_orderid Request ID, o numero retornado aquando da criacao da order reqid(XXXX-XXXX). Pode tambem ser feita a pesquisa pelo numero da encomenda (orderid), no entanto so usar caso uma encomenda so tenha um certificado registado na mesma. Usar um ou outro, dependendo da preferencia.
 * @pw_complex CertData
 */
class CertData{
	/**
	 * CPF ou CPNJ usado na criacao do certificado sem espacos e caracteres especiais.
	 *
	 * @var string
	 */
	public $cpf_cnpj;
	/**
	 * Request ID, o numero retornado aquando da criacao da order reqid(XXXX-XXXX). Pode tambem ser feita a pesquisa pelo numero da encomenda (orderid), no entanto so usar caso uma encomenda so tenha um certificado registado na mesma. Usar um ou outro, dependendo da preferencia.
	 *
	 * @var string
	 */
	public $reqid_orderid;
}

/**
 * O object devolve a trilha de um certificado
 *
 * Campos com 'minoccurs=0' sao opcionais.
 *
 * @pw_element string $reqid Id do certificado a consultar.
 * @pw_element string $trilhaCompleta Se enviado TRUE envia a trilha completa, caso nÃ£o seja enviado nada e devolvido a trilha resumida (FROM_STATE != TO_STATE).
 * @pw_complex Trilha
 */
class Trilha{
	/**
	 * Id do certificado a consultar.
	 *
	 * @var string
	 */
	public $reqid;
	/**
	 * Se enviado TRUE envia a trilha completa, caso nÃ£o seja enviado nada e devolvido a trilha resumida (FROM_STATE != TO_STATE).
	 *
	 * @var string
	 */
	public $trilhaCompleta;
}

/**
 * Objeto devolvido na consulta da trilha. Se sucesso devolve resultado=Sucesso e um array com a trilha. Se houver erro devolve resultado, codigo e mensagem.
 *
 * @pw_element string $trilha Devolve um array com a trilha
 * @pw_element string $resultado Devolve Sucesso ou Erro dependendo da validacao
 * @pw_element string $code Devolve o codigo de erro em caso de falha na validacao
 * @pw_element string $message Devolve a mensagem de erro em caso de falha na validacao
 * @pw_complex TrilhaResponse
 */
class TrilhaResponse{
	/**
	 * Devolve um array com a trilha
	 *
	 * @var string
	 */
	public $trilha;
	/**
	 * Devolve Sucesso ou Erro dependendo da validacao
	 *
	 * @var string
	 */
	public $resultado;
	/**
	 * Devolve o codigo de erro em caso de falha na validacao
	 *
	 * @var string
	 */
	public $code;
	/**
	 * Devolve a mensagem de erro em caso de falha na validacao
	 *
	 * @var string
	 */
	public $message;
}

/**
 * Objeto devolvido com o estado do certificado
 *
 * @pw_element string $NomeCompleto Devolve nome completo.
 * @pw_element string $certType Devolve o tipo de certificado.
 * @pw_element string $status Devolve o estado atual do certificado.
 * @pw_element string $code Devolve o codigo de erro em caso de falha na consulta.
 * @pw_element string $message Devolve a mensagem de erro em caso de falha na consulta.
 * @pw_element string $serialnumber Devolve o numero de serie do certificado.
 * @pw_element string $cpf Devolve o CPF CNPJ.
 * @pw_element string $email Devolve o email.
 * @pw_element string $ncaOperatorDn Devolve operador de validacao.
 * @pw_element string $ncaValidationOperatorDn Devolve operador de verificacao.
 * @pw_element string $ncaValidationDate Devolve a data de validacao.
 * @pw_element string $ncaVerificationDate Devolve a data de verificacao.
 * @pw_element string $notBefore Devolve a data de emissao.
 * @pw_element string $notAfter Devolve a data de validade.
 * @pw_element string $ncaRevocationDate Devolve a data de revogacao.
 * @pw_element string $ncaProductionStatus Devolve o estado atual.
 * @pw_complex CreateResponseStatus
 */
class CreateResponseStatus{
	/**
	 * Devolve nome completo.
	 *
	 * @var string
	 */
	public $NomeCompleto;
	/**
	 * Devolve o tipo de certificado.
	 *
	 * @var string
	 */
	public $certType;
	/**
	 * Devolve o estado atual do certificado.
	 *
	 * @var string
	 */
	public $status;
	/**
	 * Devolve o codigo de erro em caso de falha na consulta.
	 *
	 * @var string
	 */
	public $code;
	/**
	 * Devolve a mensagem de erro em caso de falha na consulta.
	 *
	 * @var string
	 */
	public $message;
	/**
	 * Devolve o numero de serie do certificado.
	 *
	 * @var string
	 */
	public $serialnumber;
	/**
	 * Devolve o CPF CNPJ.
	 *
	 * @var string
	 */
	public $cpf;
	/**
	 * Devolve o email.
	 *
	 * @var string
	 */
	public $email;
	/**
	 * Devolve operador de validacao.
	 *
	 * @var string
	 */
	public $ncaOperatorDn;
	/**
	 * Devolve operador de verificacao.
	 *
	 * @var string
	 */
	public $ncaValidationOperatorDn;
	/**
	 * Devolve a data de validacao.
	 *
	 * @var string
	 */
	public $ncaValidationDate;
	/**
	 * Devolve a data de verificacao.
	 *
	 * @var string
	 */
	public $ncaVerificationDate;
	/**
	 * Devolve a data de emissao.
	 *
	 * @var string
	 */
	public $notBefore;
	/**
	 * Devolve a data de validade.
	 *
	 * @var string
	 */
	public $notAfter;
	/**
	 * Devolve a data de revogacao.
	 *
	 * @var string
	 */
	public $ncaRevocationDate;
	/**
	 * Devolve o estado atual.
	 *
	 * @var string
	 */
	public $ncaProductionStatus;
}

/**
 * O object com os dados necessarios para realizar um pedido de consulta de Certificados num intervalo de Data / Projecto.
 *
 * Campos com 'minoccurs=0' sao opcionais.
 *
 * @pw_element string $date_first Data inicial, para aceder ao webservice.
 * @pw_element string $date_last Data final, para aceder ao webservice.
 * @pw_element string $projeto Projecto afecto ao Periodo de extracao.
 * @pw_complex PedCertificate
 */
class PedCertificate{
	/**
	 * Data inicial, para aceder ao webservice.
	 *
	 * @var string
	 */
	public $date_first;
	/**
	 * Data final, para aceder ao webservice.
	 *
	 * @var string
	 */
	public $date_last;
	/**
	 * Projecto afecto ao Periodo de extracao.
	 *
	 * @var string
	 */
	public $projeto;
}

/**
 * O object devolvido com do Pedido de Certificado.
 *
 * @pw_element string $resultado Devolve o estado Sucess ou Fail.
 * @pw_element string $code Devolve o codigo de Erro.
 * @pw_element string $message Devolve a mensagem de erro em caso de falha na consulta.
 * @pw_element string $project Projecto.
 * @pw_element string $certType Devolve o tipo de certificado.
 * @pw_element string $cn Devolve operador de validacao.
 * @pw_element string $renewal Devolve o tipo de RenovaÃ§Ã£o 0 - Normal 1 - RenovaÃ§Ã£o.
 * @pw_element string $requestid numero do Certificado.
 * @pw_element string $mail Devolve o email.
 * @pw_element string $phone Devolve o Telefone.
 * @pw_element string $certificate Devolve o Certificado.
 * @pw_element string $issueDate Devolve a data do Certificado.
 * @pw_element string $expiryDate Devolve a data de ExpiraÃ§Ã£o do Certificado.
 * @pw_element string $actualStatus Devolve o estado atual do certificado.
 * @pw_complex PedCertificateResponse
 */
class PedCertificateResponse{
	/**
	 * Devolve o estado Sucess ou Fail.
	 *
	 * @var string
	 */
	public $resultado;
	/**
	 * Devolve o codigo de Erro.
	 *
	 * @var string
	 */
	public $code;
	/**
	 * Devolve a mensagem de erro em caso de falha na consulta.
	 *
	 * @var string
	 */
	public $message;
	/**
	 * Projecto.
	 *
	 * @var string
	 */
	public $project;
	/**
	 * Devolve o tipo de certificado.
	 *
	 * @var string
	 */
	public $certType;
	/**
	 * Devolve operador de validacao.
	 *
	 * @var string
	 */
	public $cn;
	/**
	 * Devolve o tipo de RenovaÃ§Ã£o 0 - Normal 1 - RenovaÃ§Ã£o.
	 *
	 * @var string
	 */
	public $renewal;
	/**
	 * numero do Certificado.
	 *
	 * @var string
	 */
	public $requestid;
	/**
	 * Devolve o email.
	 *
	 * @var string
	 */
	public $mail;
	/**
	 * Devolve o Telefone.
	 *
	 * @var string
	 */
	public $phone;
	/**
	 * Devolve o Certificado.
	 *
	 * @var string
	 */
	public $certificate;
	/**
	 * Devolve a data do Certificado.
	 *
	 * @var string
	 */
	public $issueDate;
	/**
	 * Devolve a data de ExpiraÃ§Ã£o do Certificado.
	 *
	 * @var string
	 */
	public $expiryDate;
	/**
	 * Devolve o estado atual do certificado.
	 *
	 * @var string
	 */
	public $actualStatus;
}

/**
 * O object com os dados necessarios para realizar os pedidos de frase de identificacao bem como para envio de email.
 *
 * @pw_element string $nrcertif Request ID, o numero com o formato reqid(XXXX-XXXX). Serve para ser feita a pesquisa.
 * @pw_element string $passphrase Frase de Identificacao, nao obrigatorio para pedido de Frase, mas para envio de email e obrigatorio.
 * @pw_element string $alternativeEmail Email alterantivo para envio, se indicado envia so para um email.
 * @pw_complex CertPhrase
 */
class CertPhrase{
	/**
	 * Request ID, o numero com o formato reqid(XXXX-XXXX). Serve para ser feita a pesquisa.
	 *
	 * @var string
	 */
	public $nrcertif;
	/**
	 * Frase de Identificacao, nao obrigatorio para pedido de Frase, mas para envio de email e obrigatorio.
	 *
	 * @var string
	 */
	public $passphrase;
	/**
	 * Email alterantivo para envio, se indicado envia so para um email.
	 *
	 * @var string
	 */
	public $alternativeEmail;
}

/**
 * O object devolvido com a Frase de Identificacao a pedido de um Certificado
 *
 * @pw_element string $resultado Devolve o estado Sucess ou Fail.
 * @pw_element string $code Devolve o codigo de Erro.
 * @pw_element string $message Devolve a mensagem de erro em caso de falha na consulta.
 * @pw_element string $phrasepass Devolve a Frase de IdentificaÃ§Ã£o.
 * @pw_complex PassphraseResponse
 */
class PassphraseResponse{
	/**
	 * Devolve o estado Sucess ou Fail.
	 *
	 * @var string
	 */
	public $resultado;
	/**
	 * Devolve o codigo de Erro.
	 *
	 * @var string
	 */
	public $code;
	/**
	 * Devolve a mensagem de erro em caso de falha na consulta.
	 *
	 * @var string
	 */
	public $message;
	/**
	 * Devolve a Frase de IdentificaÃ§Ã£o.
	 *
	 * @var string
	 */
	public $phrasepass;
}

/**
 * O object devolvido com a resposta.
 *
 * @pw_element string $resultado Devolve o estado Sucess ou Fail.
 * @pw_element string $code Devolve o codigo de Erro.
 * @pw_element string $message Devolve a mensagem de erro em caso de falha na consulta.
 * @pw_complex SendEmailResponse
 */
class SendEmailResponse{
	/**
	 * Devolve o estado Sucess ou Fail.
	 *
	 * @var string
	 */
	public $resultado;
	/**
	 * Devolve o codigo de Erro.
	 *
	 * @var string
	 */
	public $code;
	/**
	 * Devolve a mensagem de erro em caso de falha na consulta.
	 *
	 * @var string
	 */
	public $message;
}

/**
 * O object com os dados necessarios para realizar um pagamento por Cartao Credito ou Debito.
 *
 * Campos com 'minoccurs=0' sao opcionais.
 *
 * @pw_element string $payMethod Define o metodo de pagamento de acordo com o que foi definido para cada parceiro (credito ou cardebit), por defeito e Credido.
 * @pw_element string $card_number Numero do Cartao para pagamento.
 * @pw_element string $expire_month Mes de validade do Cartao.
 * @pw_element string $expire_year Ano de validade do Cartao.
 * @pw_element string $card_name Nome o titular do Cartao no caso de Debito e um dado obrigatorio.
 * @pw_element string $card_cvv CVV do Cartao de pagamento.
 * @pw_element string $parcela_valor Numero de parcelas em Debito e zero.
 * @pw_element string $orderid_pay Numero de parcelas em Debito e zero.
 * @pw_element string $url_retorno Return para um URL de no Parceiro no Debito.
 * @pw_complex PaymentCard
 */
class PaymentCard{
	/**
	 * Define o metodo de pagamento de acordo com o que foi definido para cada parceiro (credito ou cardebit), por defeito e Credido.
	 *
	 * @var string
	 */
	public $payMethod;
	/**
	 * Numero do Cartao para pagamento.
	 *
	 * @var string
	 */
	public $card_number;
	/**
	 * Mes de validade do Cartao.
	 *
	 * @var string
	 */
	public $expire_month;
	/**
	 * Ano de validade do Cartao.
	 *
	 * @var string
	 */
	public $expire_year;
	/**
	 * Nome o titular do Cartao no caso de Debito e um dado obrigatorio.
	 *
	 * @var string
	 */
	public $card_name;
	/**
	 * CVV do Cartao de pagamento.
	 *
	 * @var string
	 */
	public $card_cvv;
	/**
	 * Numero de parcelas em Debito e zero.
	 *
	 * @var string
	 */
	public $parcela_valor;
	/**
	 * Numero de parcelas em Debito e zero.
	 *
	 * @var string
	 */
	public $orderid_pay;
	/**
	 * Return para um URL de no Parceiro no Debito.
	 *
	 * @var string
	 */
	public $url_retorno;
}

/**
 * O object devolvido com a resposta.
 *
 * @pw_element string $code Devolve o codigo de Erro.
 * @pw_element string $message Devolve a mensagem de erro em caso de falha na consulta.
 * @pw_element string $url_go Devolve a URL para autorizaÃ§Ã£o de Debito.
 * @pw_element string $pay_valid Devolve um texto com dados da Transacao.
 * @pw_element string $date_trans Devolve a data de Transacao.
 * @pw_element string $status_trans Devolve o estado da Transacao.
 * @pw_element string $name_trans Devolve o nome do cartao usado na Transacao.
 * @pw_element string $refer_trans Devolve a referencia da Transacao.
 * @pw_element string $kind_trans Devolve o Tipo da Transacao.
 * @pw_element string $value_trans Devolve o valor da Transacao.
 * @pw_element string $parcela_trans Devolve as parcelas do valor da Transacao.
 * @pw_complex PaymentCardResponse
 */
class PaymentCardResponse{
	/**
	 * Devolve o codigo de Erro.
	 *
	 * @var string
	 */
	public $code;
	/**
	 * Devolve a mensagem de erro em caso de falha na consulta.
	 *
	 * @var string
	 */
	public $message;
	/**
	 * Devolve a URL para autorizaÃ§Ã£o de Debito.
	 *
	 * @var string
	 */
	public $url_go;
	/**
	 * Devolve um texto com dados da Transacao.
	 *
	 * @var string
	 */
	public $pay_valid;
	/**
	 * Devolve a data de Transacao.
	 *
	 * @var string
	 */
	public $date_trans;
	/**
	 * Devolve o estado da Transacao.
	 *
	 * @var string
	 */
	public $status_trans;
	/**
	 * Devolve o nome do cartao usado na Transacao.
	 *
	 * @var string
	 */
	public $name_trans;
	/**
	 * Devolve a referencia da Transacao.
	 *
	 * @var string
	 */
	public $refer_trans;
	/**
	 * Devolve o Tipo da Transacao.
	 *
	 * @var string
	 */
	public $kind_trans;
	/**
	 * Devolve o valor da Transacao.
	 *
	 * @var string
	 */
	public $value_trans;
	/**
	 * Devolve as parcelas do valor da Transacao.
	 *
	 * @var string
	 */
	public $parcela_trans;
}
