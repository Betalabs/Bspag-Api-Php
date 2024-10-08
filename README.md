
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

### Funcionalidades Principais
- **Criação de Transações:** Suporte a diferentes métodos de pagamento (cartão de crédito, boleto, etc.).
- **Cancelamento e Estorno:** Realize cancelamentos ou estornos de transações diretamente pelo SDK.

### Documentação
A documentação completa da API BsPag está disponível em nosso [Portal de Desenvolvedores](https://bspag.com/docs).

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

### Documentation
The full BsPag API documentation is available on our [Developer Portal](https://bspag.com/docs).

### Support
If you encounter any issues or have questions, please open an issue in this repository or contact our support team.
