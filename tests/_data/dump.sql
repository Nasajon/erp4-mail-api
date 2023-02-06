TRUNCATE TABLE email.envios, email.tenants_configuracoes_smtp;

CREATE EXTENSION IF NOT EXISTS "uuid-ossp";

CREATE OR REPLACE FUNCTION uuid_generate_v4()
  RETURNS uuid AS
'$libdir/uuid-ossp', 'uuid_generate_v4'
  LANGUAGE c VOLATILE STRICT
  COST 1;
ALTER FUNCTION uuid_generate_v4()
  OWNER TO group_nasajon;

--Template do mala para os testes
INSERT INTO email.templates (template, descricao, conteudo, tenant, assunto, codigo)
VALUES
(uuid_generate_v4(), 'Nasajon - Gerenciador de Usuários - Convite', '<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN" "http://www.w3.org/TR/REC-html40/loose.dtd">
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="utf-8">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
</head>
<body>
<div>
	<p>
	Olá,<br />
	{{usuario}} convidou você para juntar-se à organização {{tenant}}. <br />
	Ao aceitar este convite, você terá acesso à sistemas web da linha Nasajon que irão lhe proporcionar agilidade e segurança nas rotinas da sua empresa.
	</p>
	<p>
		Para se juntar à organização, acesse o link abaixo:<br />
		<br />
		<a href="{{url}}">{{url}}</a><br />
		<br />
	</p>

	{% if sistemas|length > 0 %}
	<p>
		Sistemas liberados para seu uso:
		<ul>
		{% for sistema in sistemas %}
			<li><a href="{{sistema.url}}">{{ sistema.nome }}</a></li>
		{% endfor %}
		</ul>
	</p>
	{% endif %}

	<p>
		Algumas dicas úteis:
		<ul>
			<li>Caso você não tenha cadastro, será necessário realizar o cadastro.</li>
			<li>Caso você esteja recebendo um aviso de "Você não tem permissão para acessar esse aplicativo", entre em contato com {{usuario}} ({{usuario_email}}).</li>
		</ul>
	</p>
	<p>Se você não estava esperando esse email, simplesmente ignore-o.</p>
	<p>
		Atenciosamente,<br />
		<a style="color:#666; text-decoration: none;" href="http://www.nasajon.com.br">Nasajon Sistemas</a>
	</p>
</div>
</body>
</html>', 47, '[Nasajon] {{usuario}} convidou você para juntar-se à organização {{tenant}}', 'nsj_gerenciador_usuarios_convite'),
(uuid_generate_v4(), 'Nasajon - Gerenciador de Usuários - Convite', '<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN" "http://www.w3.org/TR/REC-html40/loose.dtd">
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="utf-8">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
</head>
<body>
<div>
	<p>
	Olá,<br />
	{{usuario}} convidou você para juntar-se à organização {{tenant}}. <br />
	Ao aceitar este convite, você terá acesso à sistemas web da linha Nasajon que irão lhe proporcionar agilidade e segurança nas rotinas da sua empresa.
	</p>
	<p>
		Para se juntar à organização, acesse o link abaixo:<br />
		<br />
		<a href="{{url}}">{{url}}</a><br />
		<br />
	</p>

	{% if sistemas|length > 0 %}
	<p>
		Sistemas liberados para seu uso:
		<ul>
		{% for sistema in sistemas %}
			<li><a href="{{sistema.url}}">{{ sistema.nome }}</a></li>
		{% endfor %}
		</ul>
	</p>
	{% endif %}

	<p>
		Algumas dicas úteis:
		<ul>
			<li>Caso você não tenha cadastro, será necessário realizar o cadastro.</li>
			<li>Caso você esteja recebendo um aviso de "Você não tem permissão para acessar esse aplicativo", entre em contato com {{usuario}} ({{usuario_email}}).</li>
		</ul>
	</p>
	<p>Se você não estava esperando esse email, simplesmente ignore-o.</p>
	<p>
		Atenciosamente,<br />
		<a style="color:#666; text-decoration: none;" href="http://www.nasajon.com.br">Nasajon Sistemas</a>
	</p>
</div>
</body>
</html>', null, '[Nasajon] {{usuario}} convidou você para juntar-se à organização {{tenant}}', 'nsj_gerenciador_usuarios_convite');