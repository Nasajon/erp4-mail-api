## Como Enviar E-mail

O envio de e-mail é feito via [SDK](https://github.com/Nasajon/SDK), fazendo uso do cliente do diretório, para o seu envio, além disso, todo Email precisa ter um template cadastrado na tabela `email.templates` do Banco do serviço de email.

### Instalação

#### Dependência

A dependência do sdk já conta na blioteca do Login Bundle, não sendo necessária nenhuma instalação adicional.

#### Symfony

Para fazer uso do serviço de email basta injetar sua dependência `Nasajon\SDK\Diretorio\DiretorioClient`, no serviço que irá fazer a chamada.
por exemplo, para injetar em um servico qualquer no `services.yml` seria:

```sh
    Nasajon\MDABundle\Service\ContasService:
        class: Nasajon\AdminWeb\AppBundle\Service\ContasService
        public: true
        lazy: true
        arguments:
            - '@Nasajon\MDABundle\Repository\ContasRepository'
            - '@Nasajon\SDK\Diretorio\DiretorioClient' # Injeta como parâmetro no serviço de contas
```
O serviço precisa de três argumentos para seu funcionamento, sendo

| Parâmetro | Tipo   | Descrição | Obrigatório
| --------- | -------| --------- | -----------
| apikey    | String | Api Key de Sistema, cada sistema da nasajon possui uma própria. Pode ser solicitado ao InfraSRE | Sim
| Options   | Array  | Conjunto de opções que podem, ser passadas para o Client, para o envio de email; usa-se `base_uri` onde nesta deve ser passada a url do diretório de acordo com o ambiente (DEV, QA, PROD) | Sim
| Cache     | Doctrine\Common\Cache\Cache  | Mecanismo de cache da aplicação | Sim

No exemplo acima foram usadas as variáveis de ambiente `api_key` e `diretorio_url` que deverão constar no `common.env` do projeto. Observe que o uso de variáveis de ambiente não é obrigatório, para versões que não suprtem este recurso pode-se usar os [parameters](https://symfony.com/doc/3.4/service_container/parameters.html) do Symfony.

### Usando a API

Uma vez instalado e configurado, o serviço de envio de emails pode ser invocado pelo método `enviaEmail(array $dados)` onde `$dados` receberá os parâmetros necessários para que o email seja enviado

```sh
'to' => [email@email.com.br],
'from' => 'naoresponda@email.com.br',
'split' => true,
'codigo' => 'codigo_template',
'tags' => [ 'nome_tag' => 'valor_tag'],
'tenant' => 47,
'attachments' => [(...)],
'attachments_names' => ['nome_do_anexo.pdf']],
'attachments_content_types' => ['application/pdf']
```

| Parâmetro                 | Tipo    | Descrição | Obrigatório
| ------------------------- | ------- | --------- | -----------
| to                        | Array   | Array de endereços de e-mail destinatário | Sim
| from                      | String  | String com endereço de e-mail de origem a exemplo `noreply@nomesistema.nasajon.com.br` | Sim
| split                     | Boolean | Caso seja verdadeiro ou a lista de destinatários seja maior igual a 50, envia cada email separadamente | Não
| codigo                    | String  | Código do Template usado para envio. | Sim
| tags                      | Array   | Array de Chaves => valor contendo os valores que serão renderizados dentro do template. | Sim
| tenant                    | Integer | Id do Tenant solicitante do envio | Não
| attachments               | Array   | Array de Streams dos anexos que serão enviados |Não
| attachments_names         | Array   | Array de nomes dos anexos que serão enviados | Não
| attachments_content_types | Array   | Array de [content types](https://developer.mozilla.org/pt-BR/docs/Web/HTTP/Basico_sobre_HTTP/MIME_types) dos anexos | Não

#### Notas

Os parâmetros `attachments`, `attachments_names` e `attachments_content_types` devem ter o mesmo tamanho (length).

Caso o campo tenant seja informado, a busca de templates irá considerar o campo código e o tenant, caso contrário somente o código será levado em consideração.

### Templates

Os templates de email deverão existir na tabela `email.templates`, sendo que serão suportados tanto formato de texto quanto html.

O Template deverá conter tags que funcionam como campos que são preenchidos quando do envio do email através do parâmetro tags.

Por exemplo para um template com o seguinte formato:

```sh
Nome: {{nome}}
Email: {{email}}
Telefone: {{telefone}}
Empresa: {{empresa}}
Estado: {{estado}}
```
Quando do envio de email o parâmetro `tags` poderia assumir

```sh
...
'tags'=> [
    'nome' => 'Fulano de Tal',
    'email' => 'fulano@nasajon.com.br',
    'telefone' => '(21) 99999-9999',
    'empresa'  => 'Nasajon',
    'estado'   => 'RJ',
]
...
```

### Adicionando um novo Template

Para a criação de um novo template é necessário baixar o repositório do [erp4-mail-api](https://github.com/Nasajon/erp4-mail-api) e criar um arquivo de migração na pasta database, onde neste deverá ser colocado o script que irá criar o novo template. No erp4-mail-api existe uma api que cria o template, conforme o exemplo.

Ex:

```sh
    SELECT email.api_criar_template(
        'template_webinar' /*codigo*/ ,
        'WebinarioGanheTempo - nova inscrição' /*descricao*/,
        'Webinário Ganhe Tempo - nova inscrição' /*assunto*/,
        '<p>{{nome}} &lt;{{email}}&gt;</p>' /*conteudo*/,
        47 /*tenant*/);
```


Por fim, após a criação do script de criação de template, este deverá ser submetido ao Pull Request para aprovação.

### Envio via SMTP:

Também é permitido o envio de e-mails pelo protocolo SMTP.
Para tal, é necessário cadastrar o e-mail do cliente vide **[API de Cadastro de Configurações SMTP.](./inserir-configuracao-smtp.md)**

O processo de envio via SMTP é automatizado, e o envio será feito apenas se as configurações SMTP estiverem preenchidas na tabela de configurações. Caso contrario, o e-mail é enviado via Amazon SES, conforme descrito abaixo.

**Nota: Para o envio via SMTP, é necessário executar todos os passos acima descritos.**



### Envio via Amazon SES:

Para envio com o SES, existe um bloqueio nos emails enviados pelos sistemas em QA/DEV que somente permite que sejam enviadas mensagens para destinatários de email contidos em uma lista de permissão e somente sejam enviados a partir de um email contido em uma lista de permissão.

Emails permitidos para enviar como:
 * *@dev.nasajonsistemas.com.br
 * *@nasajonsistemas.com.br

Emails permitidos para enviar para:
 * *@nasajon.com.br
 * *@nasajonsistemas.com.br
 * *@atendimento.nasajonsistemas.com.br
 * *@mailinator.com
 * *@simulator.amazonses.com

Caso precise que algum email específico seja incluído na lista de permissão, peço que solicitem para suporte3@nasajon.com.br .

Esse bloqueio é importante para evitar que testes em aplicações que, por acaso, utilizem alguma base de cliente não envie emails para funcionários ou clientes desse cliente.