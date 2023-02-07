### API para cadastrar uma configuração de SMTP para um Tenant.

Para que serve? Essa API é responsável por inserir uma configuração de SMTP para um tenant utilizar o serviço de email próprio.

>POST http://{url_base}/v2/api/configuracao-smtp

### HEADERS.
Para essa API será necessário informar os seguintes cabeçalhos:

| Header            | Descrição                                   | Obrigatório |
| ----------------- | ------------------------------------------- | ----------- |
| Content-Type      | application/json                            | Sim         |
| apikey            | Token de sistema                            | Sim         |



### REQUISIÇÃO.
Essa rota espera os seguintes parâmetros na URL da requisição:

| Parâmetro         | Descrição                                   | Obrigatório |
| ----------------- | ------------------------------------------- | ----------- |
| Nome              | Identificação do Rementente do E-Mail.      | Sim         |
| Host              | Servidor SMTP do Usuário.                   | Sim         |
| Usuário           | Endereço de E-mail do Remetente.            | Sim         |
| Senha             | Senha do E-mail do Remetente.               | Sim         |
| Porta             | Porta do cliente SMTP do Remetente.         | Sim         |
| Tenant            | Tenant do cliente.                          | Sim         |

**OBS: As portas aceitas são as seguintes: 587 (TLS), 465 (SSL) e 25 (PADRÃO)**

### Exemplo de requisição POST:

```json
{
	"nome": "Fulano de tal",
	"host": "smtp.gmail.com",	
	"usuario": "fulanodetal@gmail.com",
	"senha": "senha-alguma-coisa",
	"port": 465,
	"tenant_id": 47
}
```

### Resposta
Caso a requisição finalize com sucesso, será retornado o status **201 (CREATED)** com o conteúdo semelhante a este:

```json
{
	"nome": "Fulano de tal",
	"host": "smtp.gmail.com",	
	"usuario": "fulanodetal@gmail.com",
	"senha": "senha-alguma-coisa",
	"port": 465,
	"tenant_id": 47
}
```