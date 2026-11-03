
# BsPag API SDK - PHP

## Português (BR)

### Introdução
Este SDK em PHP foi criado para facilitar a integração com a **API BsPag**, permitindo que aplicações PHP interajam com a plataforma BsPag para realizar e gerenciar transações financeiras. O SDK abstrai a complexidade da comunicação direta com a API, proporcionando métodos simples e eficazes para a criação, consulta e manipulação de transações de pagamento.

### Requisitos
- PHP 8.1 ou superior
- Composer

### Instalação
Para instalar o SDK BsPag em seu projeto, utilize o Composer para adicionar o pacote:

```bash
composer require betalabs/bspag-api-php
```

### Configuração
Antes de utilizar o SDK, configure a API com sua chave de autenticação. A autenticação é realizada via cabeçalho com o token fornecido pela plataforma BsPag.

```php
use Bspag\Bspag;

// Configuração da chave API
$apiKey = 'sua-chave-api-aqui';
$bspag = new Bspag($apiKey);
```

### Exemplo de Uso

#### Criar uma Transação de Pagamento
```php
$transactionData = [
    'amount' => 100.00,
    'reference' => 'REF12345',
    'customer' => [
        'name' => 'João da Silva',
        'email' => 'joao@email.com',
        'phone' => '5199999999',
    ],
    'paymentMethod' => 'credit_card'
];

$response = $bspag->createTransaction($transactionData);

if ($response->isSuccess()) {
    echo "Transação criada com sucesso: " . $response->getTransactionId();
} else {
    echo "Erro ao criar transação: " . $response->getError();
}
```

### Pix Automático

Controller escrito à mão (`$client->getPixAutomatic()`), que **recebe e devolve arrays** e chama os endpoints
`/api/v1/pix-automatic/*` do Bspag. Valores em centavos. Erros viram `Exceptions\ErrorException` (corpo em
`getResponseBody()`).

```php
$pix = $client->getPixAutomatic();

$authorization = $pix->createAuthorization([
    'contract' => ['name' => 'Clube do Café', 'description' => 'Assinatura Clube do Café'],
    'customer' => [/* mesmo formato do createOrder */],
    'calendar' => ['start_date' => '2026-11-03', 'periodicity' => 'monthly'],
    'allows_retries' => true,
    'amount' => ['mode' => 'variable', 'value' => 5000],
    'immediate_payment' => ['amount' => 4990, 'reference' => 'subscription-77'],
], $idempotencyKey);
// ['id' => ..., 'status' => 'pending', 'qr_code_url' => ..., 'copy_and_paste' => ..., 'immediate_payment' => [...]]

$pix->getAuthorization($authorization['id']);      // consulta o estado atual
$charge = $pix->createCharge($authorization['id'], ['due_date' => '2026-12-03', 'amount' => 4990, 'description' => 'Assinatura - 12/2026']);
$pix->retryCharge($charge['code'], ['date' => '2026-12-05']);
$pix->cancelCharge($charge['code']);
$pix->cancelAuthorization($authorization['id']);
```

Contrato completo (campos, janela D-10 a D-2, restrições): `docs/pix-automatico.md` do repositório do Bspag
(`BetaPay`). Não há sandbox da Safe2Pay para esses endpoints.

**Verificação:** o repositório não tem PHPUnit (a lib é gerada pelo APIMATIC). `tests/smoke_pix_automatic.php` sobe um
servidor PHP embutido e confere, por HTTP real, método, caminho, cabeçalhos (Basic auth, `Idempotency-Key`), corpo e
mapeamento de erros: `php tests/smoke_pix_automatic.php [caminho/do/vendor/autoload.php]`.

### Funcionalidades Principais
- **Criação de Transações:** Suporte a diferentes métodos de pagamento (cartão de crédito, boleto, etc.).
- **Cancelamento e Estorno:** Realize cancelamentos ou estornos de transações diretamente pelo SDK.

### Documentação
A documentação completa da API BsPag está em desenvolvimento. (https://www.bspag.com.br).

### Suporte
Se encontrar algum problema ou tiver dúvidas, abra uma issue neste repositório ou entre em contato com nosso suporte.

---

## English

### Introduction
This PHP SDK was developed to simplify the integration with the **BsPag API**, allowing PHP applications to interact with BsPag’s platform for performing and managing financial transactions. The SDK abstracts the complexity of direct API communication, providing easy-to-use methods for creating, querying, and managing payment transactions.

### Requirements
- PHP 8.1 or higher
- Composer

### Installation
To install the BsPag SDK in your project, use Composer to add the package:

```bash
composer require betalabs/bspag-api-php
```

### Configuration
Before using the SDK, configure it with your API authentication key. Authentication is performed using a token provided by the BsPag platform in the request headers.

```php
use Bspag\Bspag;

// Set up the API key
$apiKey = 'your-api-key-here';
$bspag = new Bspag($apiKey);
```

### Usage Example

#### Create a Payment Transaction
```php
$transactionData = [
    'amount' => 100.00,
    'reference' => 'REF12345',
    'customer' => [
        'name' => 'John Doe',
        'email' => 'john@email.com',
        'phone' => '5199999999',
    ],
    'paymentMethod' => 'credit_card'
];

$response = $bspag->createTransaction($transactionData);

if ($response->isSuccess()) {
    echo "Transaction successfully created: " . $response->getTransactionId();
} else {
    echo "Error creating transaction: " . $response->getError();
}
```

### Main Features
- **Transaction Creation:** Support for different payment methods (credit card, boleto, etc.).
- **Cancellation and Refunds:** Cancel or refund transactions directly using the SDK.


### Support
If you encounter any issues or have questions, please open an issue in this repository or contact our support team.
