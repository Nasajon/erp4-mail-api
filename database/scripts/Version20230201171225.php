<?php

declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\DBAL\Migrations\AbstractMigration;

final class Version20230201171225 extends AbstractMigration {

    public function up(Schema $schema) {

        /**
         * Carga dos templates
         */
        $this->addSql(<<<'EOT'
        Do
        $$
        begin

            INSERT INTO email.remetentes
            (remetente, tenant, email, nome, envio_ativo, recepcao_ativa, padrao, interno, sistema_id, lastupdate)
            VALUES('333486a9-8eba-436e-b0d7-42e2c54e5843'::uuid, 10656, 'assistencia@maracanaassistencia.com.br', 'Assistência Maracanã', false, true, false, false, 282, '2021-02-04 12:24:46.673');

            INSERT INTO email.templates
            ("template", categoria, descricao, conteudo, lastupdate, versao, tenant, assunto, codigo, empresa, remetente)
            VALUES('2ceee455-98f4-44d8-ab6d-8433ef28351f'::uuid, NULL, 'Campanha Teste ...', '<div aria-describedby="cke_49" title="Editor de Rich Text, editor1" aria-label="Editor de Rich Text, editor1" role="textbox" style="position: relative;" spellcheck="false" tabindex="0" class="cke_editable cke_editable_inline cke_contents_ltr cke_focus cke_show_borders" contenteditable="true"><p>Clique aqui para começar a</p><p>----------------<br></p><p>=================<br></p><p>criar sua mensagem...</p></div>', NULL, NULL, 15, 'Campanha Teste ...', NULL, 18, NULL);
            INSERT INTO email.templates
            ("template", categoria, descricao, conteudo, lastupdate, versao, tenant, assunto, codigo, empresa, remetente)
            VALUES('139984b0-fce2-4772-b30a-ea5a821376ef'::uuid, NULL, 'Teste A', 'fdgfdg', NULL, NULL, 15, 'dfdsf', 'dsfd', 18, NULL);
            INSERT INTO email.templates
            ("template", categoria, descricao, conteudo, lastupdate, versao, tenant, assunto, codigo, empresa, remetente)
            VALUES('3d1aeaff-ddfc-445e-803e-dbf461d49214'::uuid, NULL, 'Contato interessado: Campanha Valores de 2017 EM', '<div class="gmail_default" style="color: rgb(33, 33, 33); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px;"><span style="font-family: verdana, geneva, sans-serif;">Aten&ccedil;&atilde;o, equipe! O contato abaixo preencheu o&nbsp;<strong>formul&aacute;rio&nbsp;da p&aacute;gina da</strong>&nbsp;<strong>Campanha Valores de 2017 via e-mail mkt</strong></span></div>

            <div class="gmail_default" style="color: rgb(33, 33, 33); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px;"><span style="font-family: verdana, geneva, sans-serif;">N&atilde;o se esque&ccedil;am de cadastrar a m&iacute;dia de origem no ERP!&nbsp;</span></div>

            <div class="gmail_default" style="color: rgb(33, 33, 33); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px;">&nbsp;</div>

            <div class="gmail_default" style="color: rgb(33, 33, 33); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px;"><span style="font-family: verdana, geneva, sans-serif;">Nome: {{nome}}</span></div>

            <div class="gmail_default" style="color: rgb(33, 33, 33); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px;"><span style="font-family: verdana, geneva, sans-serif;">Email:&nbsp;<span style="line-height: 19.8px;">{{email}}</span></span></div>

            <div class="gmail_default" style="color: rgb(33, 33, 33); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px;"><span style="font-family: verdana, geneva, sans-serif;">Telefone:&nbsp;<span style="line-height: 19.8px;">{{telefone}}</span></span></div>

            <div class="gmail_default" style="color: rgb(33, 33, 33); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px;"><span style="color: rgb(33, 33, 33); font-family: verdana, geneva, sans-serif; font-size: 13.2px;">Empresa:&nbsp;</span><span style="color: rgb(33, 33, 33); font-family: verdana, geneva, sans-serif; font-size: 13.2px; line-height: 19.8px;">{{empresa}}</span></div>

            <div class="gmail_default" style="color: rgb(33, 33, 33); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px;"><span style="font-family: verdana, geneva, sans-serif;">Estado:&nbsp;<span style="line-height: 19.8px;">{{estado}}</span></span>​</div>

            <div class="gmail_default" style="color: rgb(33, 33, 33); font-size: 13.2px; line-height: 19.8px;"><font face="verdana, geneva, sans-serif">Mensagem: {{mensagem}}</font></div>

            <div class="gmail_default" style="color: rgb(33, 33, 33); font-size: 13.2px; line-height: 19.8px;"><font face="verdana, geneva, sans-serif">&Eacute; cliente Nasajon: {{clientesim}}<br />
            &Eacute; cliente Nasajon: {{clientenao}}</font></div>

            <div class="gmail_default" style="color: rgb(33, 33, 33); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px;">
            <div class="gmail_default" style="line-height: 19.8px;"><span style="font-family: verdana, geneva, sans-serif;"><span style="line-height: 19.8px;"><span style="line-height: 19.8px;">​</span></span></span>

            <div class="gmail_default" style="line-height: 19.8px;"><span style="font-family: verdana, geneva, sans-serif;"><span style="line-height: 19.8px;"><span style="line-height: 19.8px;">&nbsp;</span></span></span></div>

            <div class="gmail_default" style="line-height: 19.8px;"><span style="font-family: verdana, geneva, sans-serif;"><span style="line-height: 19.8px;"><span style="line-height: 19.8px;">Lembrando que o prazo ideal para primeiro contato com o lead s&atilde;o 24 horas.</span></span></span></div>

            <div class="gmail_default" style="line-height: 19.8px;"><span style="font-family: verdana, geneva, sans-serif;"><span style="line-height: 19.8px;"><span style="line-height: 19.8px;">Juntos podemos fazer muito!</span></span></span></div>
            </div>
            </div>', NULL, NULL, 10058, 'Contato interessado: Campanha Valores de 2017 EM', NULL, NULL, NULL);
            INSERT INTO email.templates
            ("template", categoria, descricao, conteudo, lastupdate, versao, tenant, assunto, codigo, empresa, remetente)
            VALUES('aac0d741-9940-49bf-82ec-1c711c6d0be0'::uuid, NULL, 'Teste Teste Teste', '<div aria-describedby="cke_81" title="Editor de Rich Text, editor1" aria-label="Editor de Rich Text, editor1" role="textbox" style="position: relative;" spellcheck="false" tabindex="0" class="cke_editable cke_editable_inline cke_contents_ltr cke_show_borders" contenteditable="true"><p>Clique aqui para começar a criar sua mensagem...<br></p><p><br></p><p><img src="/MalaDireta/web/uploads/images/74ccf732ca801c8508ecd560cb1000bf3d1502bc.jpg" data-cke-saved-src="/MalaDireta/web/uploads/images/74ccf732ca801c8508ecd560cb1000bf3d1502bc.jpg" style="width: 154px; height: 34px;" alt=""><br></p><p><br></p></div>', NULL, NULL, 15, 'Teste X', NULL, 18, NULL);
            INSERT INTO email.templates
            ("template", categoria, descricao, conteudo, lastupdate, versao, tenant, assunto, codigo, empresa, remetente)
            VALUES('195a834b-b4a0-4fd0-af19-e52c9d3ce787'::uuid, NULL, 'Contato interessado: Campanha Valores de 2017 PF', '<div class="gmail_default" style="color: rgb(33, 33, 33); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px;"><span style="font-family: verdana, geneva, sans-serif;">Aten&ccedil;&atilde;o, equipe! O contato abaixo preencheu o&nbsp;<strong>formul&aacute;rio&nbsp;da p&aacute;gina da</strong>&nbsp;<strong>Campanha Valores de 2017 via&nbsp;painel de fundo</strong></span></div>

            <div class="gmail_default" style="color: rgb(33, 33, 33); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px;"><span style="font-family: verdana, geneva, sans-serif;">N&atilde;o se esque&ccedil;am de cadastrar a m&iacute;dia de origem no ERP!&nbsp;</span></div>

            <div class="gmail_default" style="color: rgb(33, 33, 33); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px;">&nbsp;</div>

            <div class="gmail_default" style="color: rgb(33, 33, 33); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px;"><span style="font-family: verdana, geneva, sans-serif;">Nome: {{nome}}</span></div>

            <div class="gmail_default" style="color: rgb(33, 33, 33); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px;"><span style="font-family: verdana, geneva, sans-serif;">Email:&nbsp;<span style="line-height: 19.8px;">{{email}}</span></span></div>

            <div class="gmail_default" style="color: rgb(33, 33, 33); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px;"><span style="font-family: verdana, geneva, sans-serif;">Telefone:&nbsp;<span style="line-height: 19.8px;">{{telefone}}</span></span></div>

            <div class="gmail_default" style="color: rgb(33, 33, 33); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px;"><span style="font-family: verdana, geneva, sans-serif;">Empresa:&nbsp;</span><span style="font-family: verdana, geneva, sans-serif; line-height: 19.8px;">{{empresa}}</span></div>

            <div class="gmail_default" style="color: rgb(33, 33, 33); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px;"><span style="font-family: verdana, geneva, sans-serif;">Estado:&nbsp;<span style="line-height: 19.8px;">{{estado}}</span></span>​</div>

            <div class="gmail_default" style="color: rgb(33, 33, 33); font-size: 13.2px; line-height: 19.8px;"><font face="verdana, geneva, sans-serif">Mensagem: {{mensagem}}</font></div>

            <div class="gmail_default" style="color: rgb(33, 33, 33); font-size: 13.2px; line-height: 19.8px;"><font face="verdana, geneva, sans-serif">&Eacute; cliente Nasajon: {{clientesim}}<br />
            &Eacute; cliente Nasajon: {{clientenao}}</font></div>

            <div class="gmail_default" style="color: rgb(33, 33, 33); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px;">
            <div class="gmail_default" style="line-height: 19.8px;"><span style="font-family: verdana, geneva, sans-serif;"><span style="line-height: 19.8px;"><span style="line-height: 19.8px;">​</span></span></span>

            <div class="gmail_default" style="line-height: 19.8px;"><span style="font-family: verdana, geneva, sans-serif;"><span style="line-height: 19.8px;"><span style="line-height: 19.8px;">&nbsp;</span></span></span></div>

            <div class="gmail_default" style="line-height: 19.8px;"><span style="font-family: verdana, geneva, sans-serif;"><span style="line-height: 19.8px;"><span style="line-height: 19.8px;">Lembrando que o prazo ideal para primeiro contato com o lead s&atilde;o 24 horas.</span></span></span></div>

            <div class="gmail_default" style="line-height: 19.8px;"><span style="font-family: verdana, geneva, sans-serif;"><span style="line-height: 19.8px;"><span style="line-height: 19.8px;">Juntos podemos fazer muito!</span></span></span></div>
            </div>
            </div>', NULL, NULL, 10058, 'Contato interessado: Campanha Valores de 2017 PF', NULL, NULL, NULL);
            INSERT INTO email.templates
            ("template", categoria, descricao, conteudo, lastupdate, versao, tenant, assunto, codigo, empresa, remetente)
            VALUES('dee4eee1-e3e9-46fd-bbd3-ced972a162b5'::uuid, NULL, 'Campanha Teste 222', NULL, NULL, NULL, 15, 'Campanha Teste 222', NULL, 18, NULL);
            INSERT INTO email.templates
            ("template", categoria, descricao, conteudo, lastupdate, versao, tenant, assunto, codigo, empresa, remetente)
            VALUES('d4d58cc2-995e-480a-9da7-891dfd38b724'::uuid, NULL, 'Teste Campanha 2', '<div aria-describedby="cke_81" title="Editor de Rich Text, editor1" aria-label="Editor de Rich Text, editor1" role="textbox" style="position: relative;" spellcheck="false" tabindex="0" class="cke_editable cke_editable_inline cke_contents_ltr cke_show_borders" contenteditable="true"><p><br></p><p><img src="/MalaDireta/web/uploads/images/efa7d4da55a92bf47ec78fcf8ee39e011deb9026.jpg" data-cke-saved-src="/MalaDireta/web/uploads/images/efa7d4da55a92bf47ec78fcf8ee39e011deb9026.jpg" style="width: 154px; height: 34px;" alt=""></p><p><br></p><p>Teste Campanha<br></p></div>', NULL, NULL, 15, 'Teste Campanha 2', NULL, 18, NULL);
            INSERT INTO email.templates
            ("template", categoria, descricao, conteudo, lastupdate, versao, tenant, assunto, codigo, empresa, remetente)
            VALUES('24f98f7e-ef86-4292-b3fd-b2f4c185e1f1'::uuid, NULL, 'Teste Campanha 3', '<div aria-describedby="cke_81" title="Editor de Rich Text, editor1" aria-label="Editor de Rich Text, editor1" role="textbox" style="position: relative;" spellcheck="false" tabindex="0" class="cke_editable cke_editable_inline cke_contents_ltr cke_show_borders" contenteditable="true"><p>Nome: &nbsp;&nbsp; {{nome}}&nbsp;&nbsp; ...<br></p></div>', NULL, NULL, 15, 'Teste Campanha {{nome}}', NULL, 18, NULL);
            INSERT INTO email.templates
            ("template", categoria, descricao, conteudo, lastupdate, versao, tenant, assunto, codigo, empresa, remetente)
            VALUES('2ac7a0f7-86df-4fac-aebf-8dc79733d929'::uuid, NULL, '1 Bloco em Branco', '<div class="block_border" style="width:780px;margin: 10px 10px 0 10px;">
            <div contenteditable="true">
            <p><br />
            <br />
            <br />
            &nbsp;</p>
            </div>
            </div>', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
            INSERT INTO email.templates
            ("template", categoria, descricao, conteudo, lastupdate, versao, tenant, assunto, codigo, empresa, remetente)
            VALUES('ae5bab48-7636-40ff-bccb-116874672338'::uuid, NULL, '3 Blocos - 2 Colunas, 1 Linha', '<div class="block_border" style="width:700px;margin: 10px 10px 0 10px;">
            <div contenteditable="true">
            <p><br />
            <br />
            <br />
            <br />
            <br />
            <br />
            &nbsp;</p>
            </div>
            </div>

            <div class="block_border" style="float:left;width:350px;margin: 10px 5px 0px 10px;">
            <div contenteditable="true">
            <p><br />
            <br />
            <br />
            <br />
            <br />
            <br />
            &nbsp;</p>
            </div>
            </div>

            <div class="block_border" style="float:left;width:350px;margin: 10px 10px 0px 5px;">
            <div contenteditable="true">
            <p><br />
            <br />
            <br />
            <br />
            <br />
            <br />
            &nbsp;</p>
            </div>
            </div>

            <div style="clear:both">&nbsp;</div>', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
            INSERT INTO email.templates
            ("template", categoria, descricao, conteudo, lastupdate, versao, tenant, assunto, codigo, empresa, remetente)
            VALUES('370543dc-07d1-4a12-9137-93f25569ddba'::uuid, NULL, 'Novo contato: Agende o horário com um professor Nasajon', '<p>Nome: {{nome}}</p>

            <p>Email: {{email}}</p>

            <p>Telefone: {{telefone}}</p>

            <p>Empresa: {{empresa}}</p>

            <p>Sistema: {{sistema}}</p>

            <p>Data: {{data}}</p>', NULL, NULL, 10058, 'Novo contato: Agende o horário com um professor Nasajon', NULL, NULL, NULL);
            INSERT INTO email.templates
            ("template", categoria, descricao, conteudo, lastupdate, versao, tenant, assunto, codigo, empresa, remetente)
            VALUES('4a04e2ed-1843-49f6-894f-32bb5886996b'::uuid, NULL, 'Autoresposta enviado ao cliente após criação de um chamado por um atendente', '<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN" "http://www.w3.org/TR/REC-html40/loose.dtd">
                    <html lang="en" xmlns="http://www.w3.org/1999/xhtml">
                    <head>
                    <meta charset="utf-8">
                    <title>Re: #{{protocolo}} - {{resumo}}</title>
                    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
                    </head>
                    <body>
                    <table cellpadding="0" cellspacing="0" border="0" align="center" width="600" style="border-top:3px solid #2b6584; font-family:Arial, Helvetica, sans-serif; color:#555555;">
                        <tbody>
                            <tr>
                                <td style="padding-top:10px;">
                                    <img src="http://s3-us-west-2.amazonaws.com/static.nasajon/logos/michelin-logo-165x35.png" />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p style="font-size:16px; line-height:22px;">
                                        {{ mensagem|nl2br }}
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h1 style="font-size:20px; margin:8px 0 20px 0; font-family:''Lato'', Arial, Helvetica, sans-serif;">
                                        <a href="{{ main_url ~ ''/chamados/''~ atendimento.atendimento}}" title="#{{protocolo}} - {{resumo}}" style="color:#2b6584; text-decoration:none;">#{{protocolo}} - {{resumo}}</a>
                                    </h1>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <table cellpadding="0" cellspacing="0" border="0" align="center" width="100%" style="margin-top:30px; padding:15px; border:1px solid #ccc;">
                                        <tr>
                                            <td>
                                                <h2 style="font-size:16px; margin:0 0 20px 0; font-family:''Lato'', Arial, Helvetica, sans-serif; color:#2b6584;">Detalhes do Atendimento</h2>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <table cellpadding="3" cellspacing="0" border="0" align="center" width="100%">
                                                    <tr>
                                                        <td style="text-align:right; padding-right:10px;" width="100" valign="top"><strong style="font-size:11px; line-height:18px;">CRIADO EM</strong></td>
                                                        <td style="font-size:14px; line-height:18px;" valign="top">{{ atendimento.created_at|date("d/m/Y") }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td style="text-align:right; padding-right:10px;" width="100" valign="top"><strong style="font-size:11px; line-height:18px;">DESCRIÇÃO</strong></td>
                                                        <td style="font-size:14px; line-height:18px;">
                                                            <p style="margin:0;" valign="top">
                                                            {% for item in atendimento.followups %}
                                                            <table cellpadding="0" cellspacing="0" border="0" align="center" width="100%" style="padding-left:8px; border-left:1px solid #ccc;">
                                                                <tr>
                                                                    <td style="padding-bottom:20px;">
                                                                        <p style="font-size:12px; line-height:16px; margin:5px 0;">{{ item.historico|raw }}</p>

                                                                        {% if item.anexos|length > 0 %}
                                                                            <strong style="font-size:11px; line-height:16px;">ANEXOS:</strong><br />
                                                                            <ul style="padding:0; margin:0; list-style:none;">
                                                                                {% for anexo in item.anexos %}
                                                                                    <li><a href="{{anexo.url}}" style="text-decoration:none; color:#428bca;">{{anexo.nome}}</a></li>
                                                                                {% endfor %}
                                                                            </ul>
                                                                        {% endif %}

                                                            {% if (item.url_avaliacao is defined) %}
                                                            <p style="font-size:12px">
                                                            <a style="text-decoration:none;color:#2b6584;" href="{{ item.url_avaliacao }}" target="_blank"><img src="https://s3-us-west-2.amazonaws.com/static.nasajon/img/atendimento/ico-thumbs-up.gif"> Avalie essa resposta</a>
                                                            </p>
                                                            {% endif %}

                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                    {% endfor %}
                                                                    {% for item in atendimento.followups  %}
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                            {% endfor %}
                                                            </p>
                                                        </td>
                                                    </tr>
                                                    {% if atendimento.anexos|length > 0 %}
                                                        <tr>
                                                            <td style="text-align:right; padding-right:10px;" width="100" valign="top"><strong style="font-size:11px; line-height:18px;">ANEXOS</strong></td>
                                                            <td style="font-size:14px; line-height:18px;" valign="top">
                                                                <ul style="padding:0; margin:0; list-style:none;">
                                                                    {% for anexo in atendimento.anexos %}
                                                                    <li><a href="{{anexo.url}}" style="text-decoration:none; color:#428bca;">{{anexo.nome}}</a></li>
                                                                    {% endfor %}
                                                                </ul>
                                                            </td>
                                                        </tr>''
                                                    {% endif %}
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align:center">
                                    <p style="font-size:11px; margin:20px 0 5px;">Responda o e-mail para adicionar uma resposta • <a href="{{ main_url ~ ''/chamados/''~ atendimento.atendimento}}" style="text-decoration:none; color:#428bca;">Visualizar no Sistema de Atendimentos</a></p>
                                    <p style="font-size:11px; margin:0 0 8px;">Desenvolvido por <a href="http://www.nasajon.com.br" style="text-decoration:none; color:#428bca;">Nasajon Sistemas</a></p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    </body>
                    </html>', '2019-04-17 13:39:38.033', 1, 10237, 'Re: #{{protocolo}} - {{resumo}}', 'atendimento_admin_novo', NULL, NULL);
            INSERT INTO email.templates
            ("template", categoria, descricao, conteudo, lastupdate, versao, tenant, assunto, codigo, empresa, remetente)
            VALUES('c9d565b0-0b35-4242-8abe-bb70cf170d53'::uuid, NULL, 'Novo Contato: LP Curso Analista Folha', '<p style="line-height: 20.8px;">Gente,&nbsp;</p>

            <p style="line-height: 20.8px;">O contato abaixo deseja se inscrever no curso de Analista de Folha de Pagamento&nbsp;nortuno:</p>

            <p style="line-height: 20.8px;">Nome: {{nome}}<br />
            Email: {{email}}<br />
            Telefone: {{telefone}}<br />
            Mensagem: {{mensagem}}</p>', NULL, NULL, 10058, 'Novo Contato: LP Curso Analista Folha', NULL, NULL, NULL);
            INSERT INTO email.templates
            ("template", categoria, descricao, conteudo, lastupdate, versao, tenant, assunto, codigo, empresa, remetente)
            VALUES('427ce697-bfed-406e-8bc5-9100b8ae5f6a'::uuid, NULL, 'Ponto Web Notificação de Recálculo', '<p>{{message}}</p>

            <p>&nbsp;</p>', NULL, NULL, NULL, 'Ponto Web Notificacao de Recalculo - {{tenant}}', 'pontoweb_notificacao_recalculo', NULL, NULL);
            INSERT INTO email.templates
            ("template", categoria, descricao, conteudo, lastupdate, versao, tenant, assunto, codigo, empresa, remetente)
            VALUES('69057f59-4f92-4fd9-9ea9-f5a0b41fd36c'::uuid, NULL, 'Novo Contato Site Educacional', '<p>Gente,</p>

            <p>O contato abaixo preencheu o formul&aacute;rio de falecon no site do Educacional:</p>

            <p>Nome: {{nome}}<br />
            Email: {{email}}&nbsp;<br />
            Telefone: {{telefone}}<br />
            Estado: {{estado}}<br />
            Mensagem: {{mensagem}}</p>', NULL, NULL, 10058, 'Novo Contato Site Educacional', NULL, NULL, NULL);
            INSERT INTO email.templates
            ("template", categoria, descricao, conteudo, lastupdate, versao, tenant, assunto, codigo, empresa, remetente)
            VALUES('441c26c5-714c-493e-ba79-a3a75f400d3a'::uuid, NULL, 'Contato interessado: Demo ERP - Webinar Amaro', '<p>Aten&ccedil;&atilde;o, equipe! O contato abaixo se inscreveu para receber um contato para <strong>Demonstra&ccedil;&atilde;o do ERP</strong> , atrav&eacute;s do Webinar&nbsp;&quot;<strong>Descobrindo o ERP Nasajon</strong>&quot;:</p>

            <p>Nome: {{nome}}<br />
            Email: {{email}}<br />
            Telefone: {{telefone}}<br />
            &nbsp;</p>', NULL, NULL, 10058, 'Contato interessado: Demo ERP - Webinar Amaro', NULL, NULL, NULL);
            INSERT INTO email.templates
            ("template", categoria, descricao, conteudo, lastupdate, versao, tenant, assunto, codigo, empresa, remetente)
            VALUES('4feebdd3-eaa2-494d-8059-de1a6c187756'::uuid, NULL, 'teste 2', '<div class="block_border" style="width:700px;margin: 10px 10px 0 10px;">
            <div aria-describedby="cke_57" title="Editor de Rich Text, editor1" aria-label="Editor de Rich Text, editor1" role="textbox" style="position: relative;" spellcheck="false" tabindex="0" class="cke_editable cke_editable_inline cke_contents_ltr cke_show_borders" contenteditable="true">..............<p>jhkjhk<br><br><br></p></div>
            </div>

            <div class="block_border" style="float:left;width:350px;margin: 10px 5px 0px 10px;">
            <div aria-describedby="cke_98" title="Editor de Rich Text, editor2" aria-label="Editor de Rich Text, editor2" role="textbox" style="position: relative;" spellcheck="false" tabindex="0" class="cke_editable cke_editable_inline cke_contents_ltr cke_show_borders" contenteditable="true"><p>hjkjhkjh<br><br>.........<br><br><br><br></p></div>
            </div>

            <div class="block_border" style="float:left;width:350px;margin: 10px 10px 0px 5px;">
            <div aria-describedby="cke_139" title="Editor de Rich Text, editor3" aria-label="Editor de Rich Text, editor3" role="textbox" style="position: relative;" spellcheck="false" tabindex="0" class="cke_editable cke_editable_inline cke_contents_ltr cke_show_borders" contenteditable="true"><p>jhkjhkjhk<br><br><br>...............<br></p></div>
            </div>

            <div style="clear:both">&nbsp;</div>', NULL, NULL, 15, 'yuetdfusayt 2', 'tesete 2', 18, NULL);
            INSERT INTO email.templates
            ("template", categoria, descricao, conteudo, lastupdate, versao, tenant, assunto, codigo, empresa, remetente)
            VALUES('38864b84-c359-465e-b2a5-5a5b696706af'::uuid, NULL, 'Teste Nasajon', '<div aria-describedby="cke_49" title="Editor de Rich Text, editor1" aria-label="Editor de Rich Text, editor1" role="textbox" style="position: relative;" spellcheck="false" tabindex="0" class="cke_editable cke_editable_inline cke_contents_ltr cke_show_borders cke_focus" contenteditable="true"><p><img src="http://email.nasajonsistemas.com.br/uploads/images/30a1c7001db80fe3f35b55e547d8e66d7d112148.jpg" data-cke-saved-src="http://email.nasajonsistemas.com.br/uploads/images/30a1c7001db80fe3f35b55e547d8e66d7d112148.jpg" style="width: 154px; height: 34px;" alt=""><br></p><p>Mensagem Nasajon<br></p></div>', NULL, NULL, 15, 'Assunto Nasajon', NULL, 18, NULL);
            INSERT INTO email.templates
            ("template", categoria, descricao, conteudo, lastupdate, versao, tenant, assunto, codigo, empresa, remetente)
            VALUES('31c63c69-ab3e-43a6-b94d-aa1c05987fcf'::uuid, NULL, 'Contato interessado: Campanha Valores de 2017 RS', '<div class="gmail_default" style="color: rgb(33, 33, 33); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px;"><span style="font-family: verdana, geneva, sans-serif;">Aten&ccedil;&atilde;o, equipe! O contato abaixo preencheu o&nbsp;<strong>formul&aacute;rio&nbsp;da p&aacute;gina da</strong>&nbsp;<strong>Campanha Valores de 2017 via redes sociais</strong></span></div>

            <div class="gmail_default" style="color: rgb(33, 33, 33); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px;"><span style="font-family: verdana, geneva, sans-serif;">N&atilde;o se esque&ccedil;am de cadastrar a m&iacute;dia de origem no ERP!&nbsp;</span></div>

            <div class="gmail_default" style="color: rgb(33, 33, 33); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px;">&nbsp;</div>

            <div class="gmail_default" style="color: rgb(33, 33, 33); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px;"><span style="font-family: verdana, geneva, sans-serif;">Nome: {{nome}}</span></div>

            <div class="gmail_default" style="color: rgb(33, 33, 33); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px;"><span style="font-family: verdana, geneva, sans-serif;">Email:&nbsp;<span style="line-height: 19.8px;">{{email}}</span></span></div>

            <div class="gmail_default" style="color: rgb(33, 33, 33); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px;"><span style="font-family: verdana, geneva, sans-serif;">Telefone:&nbsp;<span style="line-height: 19.8px;">{{telefone}}</span></span></div>

            <div class="gmail_default" style="color: rgb(33, 33, 33); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px;"><span style="font-family: verdana, geneva, sans-serif;">Empresa:&nbsp;</span><span style="font-family: verdana, geneva, sans-serif; line-height: 19.8px;">{{empresa}}</span></div>

            <div class="gmail_default" style="color: rgb(33, 33, 33); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px;"><span style="font-family: verdana, geneva, sans-serif;">Estado:&nbsp;<span style="line-height: 19.8px;">{{estado}}</span></span>​</div>

            <div class="gmail_default" style="color: rgb(33, 33, 33); font-size: 13.2px; line-height: 19.8px;"><font face="verdana, geneva, sans-serif">Mensagem: {{mensagem}}</font></div>

            <div class="gmail_default" style="color: rgb(33, 33, 33); font-size: 13.2px; line-height: 19.8px;"><font face="verdana, geneva, sans-serif">&Eacute; cliente Nasajon: {{clientesim}}<br />
            &Eacute; cliente Nasajon: {{clientenao}}</font></div>

            <div class="gmail_default" style="color: rgb(33, 33, 33); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px;">
            <div class="gmail_default" style="line-height: 19.8px;"><span style="font-family: verdana, geneva, sans-serif;"><span style="line-height: 19.8px;"><span style="line-height: 19.8px;">​</span></span></span>

            <div class="gmail_default" style="line-height: 19.8px;"><span style="font-family: verdana, geneva, sans-serif;"><span style="line-height: 19.8px;"><span style="line-height: 19.8px;">&nbsp;</span></span></span></div>

            <div class="gmail_default" style="line-height: 19.8px;"><span style="font-family: verdana, geneva, sans-serif;"><span style="line-height: 19.8px;"><span style="line-height: 19.8px;">Lembrando que o prazo ideal para primeiro contato com o lead s&atilde;o 24 horas.</span></span></span></div>

            <div class="gmail_default" style="line-height: 19.8px;"><span style="font-family: verdana, geneva, sans-serif;"><span style="line-height: 19.8px;"><span style="line-height: 19.8px;">Juntos podemos fazer muito!</span></span></span></div>
            </div>
            </div>', NULL, NULL, 10058, 'Contato interessado: Campanha Valores de 2017 RS', NULL, NULL, NULL);
            INSERT INTO email.templates
            ("template", categoria, descricao, conteudo, lastupdate, versao, tenant, assunto, codigo, empresa, remetente)
            VALUES('ef01952a-f94e-4e9a-82ae-f2060aaa136a'::uuid, NULL, 'Falecon: Soluções Comerciais', '<div class="gmail_default" style="color: rgb(33, 33, 33); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px;"><span style="font-family: verdana, geneva, sans-serif;">Aten&ccedil;&atilde;o, equipe! O contato abaixo preencheu o formul&aacute;rio de&nbsp;contato da p&aacute;gina de&nbsp;<strong>Solu&ccedil;&otilde;es Comerciais</strong>:&nbsp;</span><br />
            &nbsp;</div>

            <div class="gmail_default" style="color: rgb(33, 33, 33); font-size: 13.2px; line-height: 19.8px;"><font face="verdana, geneva, sans-serif">Nome: {{nome}}</font></div>

            <div class="gmail_default" style="color: rgb(33, 33, 33); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px;"><span style="font-family: verdana, geneva, sans-serif;">Email:&nbsp;<span style="font-size: 13.2px; line-height: 19.8px;">{{email}}</span></span></div>

            <div class="gmail_default" style="color: rgb(33, 33, 33); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px;"><span style="font-family: verdana, geneva, sans-serif;">Telefone:&nbsp;<span style="font-size: 13.2px; line-height: 19.8px;">{{telefone}}</span></span></div>

            <div class="gmail_default" style="color: rgb(33, 33, 33); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px;"><span style="font-family: verdana, geneva, sans-serif;">Estado:&nbsp;<span style="font-size: 13.2px; line-height: 19.8px;">{{estado}}</span></span></div>

            <div class="gmail_default" style="color: rgb(33, 33, 33); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px;"><span style="font-family: verdana, geneva, sans-serif;">Munic&iacute;pio:&nbsp;<span style="font-size: 13.2px; line-height: 19.8px;">{{cidade}}</span></span></div>

            <div class="gmail_default" style="color: rgb(33, 33, 33); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px;"><span style="font-family: verdana, geneva, sans-serif;">Mensagem:&nbsp;<span style="font-size: 13.2px; line-height: 19.8px;">{{mensagem}}</span></span></div>

            <div class="gmail_default" style="color: rgb(33, 33, 33); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px;">
            <div class="gmail_default" style="color: rgb(33, 33, 33); font-size: 13.2px; line-height: 19.8px;"><span style="font-family: verdana, geneva, sans-serif; font-size: 13.2px;">&Eacute; cliente Nasajon: {{cliente}}</span></div>

            <div class="gmail_default" style="color: rgb(33, 33, 33); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px;">
            <div class="gmail_default" style="line-height: 19.8px;">
            <div class="gmail_default" style="font-size: 13.2px; line-height: 19.8px;"><span style="font-family: verdana, geneva, sans-serif; font-size: 13.2px;">Origem:&nbsp;</span><span style="font-family: verdana, geneva, sans-serif; font-size: 13.2px; line-height: 19.8px;">{{origem}}</span></div>

            <div class="gmail_default" style="font-size: 13.2px; line-height: 19.8px;"><span style="font-family: verdana, geneva, sans-serif; font-size: 13.2px;">M&iacute;dia:&nbsp;</span><span style="font-family: verdana, geneva, sans-serif; font-size: 13.2px; line-height: 19.8px;">{{midia}}</span></div>

            <div class="gmail_default" style="font-size: 13.2px; line-height: 19.8px;"><span style="font-family: verdana, geneva, sans-serif; font-size: 13.2px;">Campanha:&nbsp;</span><span style="font-family: verdana, geneva, sans-serif; font-size: 13.2px; line-height: 19.8px;">{{campanha}}</span></div>
            </div>
            </div>
            </div>', NULL, NULL, 10058, 'Falecon: Soluções Comerciais', NULL, NULL, NULL);
            INSERT INTO email.templates
            ("template", categoria, descricao, conteudo, lastupdate, versao, tenant, assunto, codigo, empresa, remetente)
            VALUES('76dc27d5-9580-4254-a541-245e93085595'::uuid, NULL, 'Teste', '<div class="block_border" style="width:700px;margin: 10px 10px 0 10px;">
            <div contenteditable="true" class="cke_editable cke_editable_inline cke_contents_ltr cke_show_borders" tabindex="0" spellcheck="false" role="textbox" aria-label="Editor de Rich Text, editor2" title="Editor de Rich Text, editor2" aria-describedby="cke_105" style="position: relative;"><p>Bloco 1 - 700px<br><br>weewewew<br><br></p></div>
            </div>

            <div class="block_border" style="float:left;width:350px;margin: 10px 5px 0px 10px;">
            <div contenteditable="true" class="cke_editable cke_editable_inline cke_contents_ltr cke_show_borders" tabindex="0" spellcheck="false" role="textbox" aria-label="Editor de Rich Text, editor3" title="Editor de Rich Text, editor3" aria-describedby="cke_149" style="position: relative;"><p>Bloco 2 - 350px<br><br><br><br><br><br><br></p></div>
            </div>

            <div class="block_border" style="float:left;width:350px;margin: 10px 10px 0px 5px;">
            <div contenteditable="true" class="cke_editable cke_editable_inline cke_contents_ltr cke_show_borders" tabindex="0" spellcheck="false" role="textbox" aria-label="Editor de Rich Text, editor4" title="Editor de Rich Text, editor4" aria-describedby="cke_193" style="position: relative;"><p>Bloco 3 - 350px<br><br><br><br><br><br><br></p></div>
            </div>

            <div style="clear:both">&nbsp;</div>

            <div class="block_border" style="width:700px;margin: 10px 10px 0 10px;">
            <div contenteditable="true" class="cke_editable cke_editable_inline cke_contents_ltr cke_show_borders cke_focus" tabindex="0" spellcheck="false" role="textbox" aria-label="Editor de Rich Text, editor5" title="Editor de Rich Text, editor5" aria-describedby="cke_237" style="position: relative;"><p>Bloco 4 - 700px.<br><br><br><br><br><br><br></p></div>
            </div>', NULL, NULL, 15, 'teste jmf', NULL, 18, NULL);
            INSERT INTO email.templates
            ("template", categoria, descricao, conteudo, lastupdate, versao, tenant, assunto, codigo, empresa, remetente)
            VALUES('2cc8e8c0-d167-497f-882a-8100b2d405a7'::uuid, NULL, 'Nasajon - Carta de Atualização', '<div aria-describedby="cke_49" title="Editor de Rich Text, editor1" aria-label="Editor de Rich Text, editor1" role="textbox" style="position: relative;" spellcheck="false" tabindex="0" class="cke_editable cke_editable_inline cke_contents_ltr cke_show_borders" contenteditable="true"><p><img src="http://email.nasajonsistemas.com.br/uploads/images/484b1627634ea3108d07f5dc381e8f131fc59954.jpg" data-cke-saved-src="http://email.nasajonsistemas.com.br/uploads/images/484b1627634ea3108d07f5dc381e8f131fc59954.jpg" style="width: 756px; height: 81px;" alt=""><br></p><p style="margin-bottom:0cm;line-height:100%"><strong><font color="#004586"><span style="text-decoration:none"><font face="Lato Black, sans-serif"><font style="font-size:13pt" size="3"><span lang="pt-BR"></span></font></font></span></font></strong><br></p><p style="margin-bottom:0cm;line-height:100%"><strong><font color="#004586"><span style="text-decoration:none"><font face="Lato Black, sans-serif"><font style="font-size:13pt" size="3"><span lang="pt-BR">Prezado cliente,</span></font></font></span></font></strong><br></p><p style="margin-bottom:0cm;line-height:100%"><strong><font color="#004586"><span style="text-decoration:none"><font face="Lato Black, sans-serif"><font style="font-size:13pt" size="3"><span lang="pt-BR">Informamos que a versão 1.41.05.01 do Persona encontra-se em nossa homepage para download (<a data-cke-saved-href="http://www.nasajon.com.br" href="http://www.nasajon.com.br" target="_blank">www.nasajon.com.br</a>). </span></font></font></span></font></strong><br></p><p style="margin-bottom:0cm;line-height:100%"><br></p><p style="margin-bottom:0cm;line-height:100%"><strong><font color="#ff9900"><span style="text-decoration:none"><font face="Lato Black, sans-serif"><font style="font-size:13pt" size="3"><span lang="pt-BR">Alteração: </span></font></font></span></font></strong><br></p><p style="margin-bottom:0cm;line-height:100%"><strong><font color="#ff9900"><span style="text-decoration:none"><font face="Lato Black, sans-serif"><font style="font-size:13pt" size="3"><span lang="pt-BR"></span></font></font></span></font></strong><br></p><p style="margin-bottom:0cm;line-height:100%"><strong><font color="#0084d1"><span style="text-decoration:none"><font face="Lato, serif"><font style="font-size:10pt" size="2"><span lang="pt-BR">Relatórios \ Em Disco \ CAGED </span></font></font></span></font></strong><br></p><p style="margin-bottom:0cm;line-height:100%"><strong><font color="#4c4c4c"><span style="text-decoration:none"><font face="Lato, serif"><font style="font-size:10pt" size="2"><span lang="pt-BR"><span style="font-weight:normal"></span></span></font></font></span></font></strong><br></p><p style="margin-bottom:0cm;line-height:100%"><strong><font color="#4c4c4c"><span style="text-decoration:none"><font face="Lato, serif"><font style="font-size:10pt" size="2"><span lang="pt-BR"><span style="font-weight:normal">- Solicitação 43918</span></span></font></font></span></font></strong><br></p><p style="margin-bottom:0cm;line-height:100%"><strong><font color="#4c4c4c"><span style="text-decoration:none"><font face="Lato, serif"><font style="font-size:10pt" size="2"><span lang="pt-BR"><span style="font-weight:normal">O Sistema passou a gerar o CAGED diário sem apresentar a mensagem de erro "record key delete".</span></span></font></font></span></font></strong><br></p><p><br></p><p style="margin-bottom:0cm;line-height:100%"><strong><font color="#4c4c4c"><span style="text-decoration:none"><font face="Lato, serif"><font style="font-size:10pt" size="2"><span lang="pt-BR"><span style="font-weight:normal">O horário de atendimento do Suporte do Rio de Janeiro é das 07h40 às 20h20, de segunda a sexta e, aos sábados, das 9h às 14h, no telefone (21) 2213-9300 para Persona, Scritta, Contábil e Nota Fiscal Eletrônica. No caso de demais dúvidas de Controller, Cobranza e LojaPDV, o atendimento será pelo número (21) 8679-0679. Após às 14h de sábado e, a partir das 15h de domingo, temos um suporte emergencial para o Loja PDV pelo número (21) 8901-8616.</span></span></font></font></span></font></strong><br></p><p style="margin-bottom:0cm;line-height:100%"><br></p><p style="margin-bottom:0cm;line-height:100%"><strong><font color="#4c4c4c"><span style="text-decoration:none"><font face="Lato, serif"><font style="font-size:10pt" size="2"><span lang="pt-BR"><span style="font-weight:normal">MATRIZ (RIO DE JANEIRO):</span></span></font></font></span></font></strong></p><p style="margin-bottom:0cm;line-height:100%"><strong><font color="#4c4c4c"><span style="text-decoration:none"><font face="Lato, serif"><font style="font-size:10pt" size="2"><span lang="pt-BR"><span style="font-weight:normal"><a data-cke-saved-href="mailto:suportecontroller@nasajon.com.br" href="mailto:suportecontroller@nasajon.com.br" target="_blank">suportecontroller@nasajon.com.<wbr>br</a> para os sistemas Controller, Cobranza, Comerzio, Protocolo, LojaPDV e Libro </span></span></font></font></span></font></strong></p><p style="margin-bottom:0cm;line-height:100%"><strong><font color="#4c4c4c"><span style="text-decoration:none"><font face="Lato, serif"><font style="font-size:10pt" size="2"><span lang="pt-BR"><span style="font-weight:normal"><a data-cke-saved-href="mailto:suportepersona@nasajon.com.br" href="mailto:suportepersona@nasajon.com.br" target="_blank">suportepersona@nasajon.com.br</a> para os sistemas Persona, Humanis, Marcação de Ponto, Locare e Abitare.</span></span></font></font></span></font></strong></p><p style="margin-bottom:0cm;line-height:100%"><strong><font color="#4c4c4c"><span style="text-decoration:none"><font face="Lato, serif"><font style="font-size:10pt" size="2"><span lang="pt-BR"><span style="font-weight:normal"><a data-cke-saved-href="mailto:suportecontabil@nasajon.com.br" href="mailto:suportecontabil@nasajon.com.br" target="_blank">suportecontabil@nasajon.com.br</a> para os sistemas Contábil e Scritta</span></span></font></font></span></font></strong><br></p><p style="margin-bottom:0cm;line-height:100%"><br></p><p><strong><font color="#ff9900"><span style="text-decoration:none"><font face="Lato Black, sans-serif"><font style="font-size:13pt" size="3"><span lang="pt-BR">ESCRITÓRIOS : </span></font></font></span></font></strong><br></p><p><strong><font color="#0084d1"><span style="text-decoration:none"><font face="Lato, serif"><font style="font-size:10pt" size="2"><span lang="pt-BR"><b>SÃO PAULO</b></span></font></font></span></font></strong><font face="Lato, serif"> </font><strong><font color="#4c4c4c"><span style="text-decoration:none"><font face="Lato, serif"><font style="font-size:10pt" size="2"><span lang="pt-BR"><span style="font-weight:normal">-</span></span></font></font></span></font></strong><strong><font color="#4c4c4c"><span style="text-decoration:none"><font face="Meta-Normal, serif"><font style="font-size:10pt" size="2"><span lang="pt-BR"><span style="font-weight:normal"> </span></span></font></font></span></font></strong><font color="#0000ff"><span lang="zxx"><u><a data-cke-saved-href="mailto:nasajonsp@nasajon.com.br" href="mailto:nasajonsp@nasajon.com.br" target="_blank">nasajonsp@nasajon.com.br</a></u></span></font></p><p><strong><font color="#0084d1"><span style="text-decoration:none"><font face="Lato, serif"><font style="font-size:10pt" size="2"><span lang="pt-BR"><b>BELO HORIZONTE</b></span></font></font></span></font></strong><font face="Times New Roman, serif"> </font><strong><font color="#4c4c4c"><span style="text-decoration:none"><font face="Meta-Normal, serif"><font style="font-size:10pt" size="2"><span lang="pt-BR"><span style="font-weight:normal">-</span></span></font></font></span></font></strong><font face="Times New Roman, serif"> </font><font color="#0000ff"><span lang="zxx"><u><a data-cke-saved-href="mailto:nasajonmg@nasajon.com.br" href="mailto:nasajonmg@nasajon.com.br" target="_blank">nasajonmg@nasajon.com.br</a></u></span></font></p><p><strong><font color="#0084d1"><span style="text-decoration:none"><font face="Lato, serif"><font style="font-size:10pt" size="2"><span lang="pt-BR"><b>BAHIA</b></span></font></font></span></font></strong><strong><font color="#0084d1"><span style="text-decoration:none"><font face="Meta-Normal, serif"><font style="font-size:10pt" size="2"><span lang="pt-BR"><b> </b></span></font></font></span></font></strong><strong><font color="#4c4c4c"><span style="text-decoration:none"><font face="Meta-Normal, serif"><font style="font-size:10pt" size="2"><span lang="pt-BR"><span style="font-weight:normal">- </span></span></font></font></span></font></strong><font color="#0000ff"><span lang="zxx"><u><a data-cke-saved-href="mailto:nasajonba@nasajon.com.br" href="mailto:nasajonba@nasajon.com.br" target="_blank">nasajonba@nasajon.com.br</a></u></span></font></p><p><strong><font color="#0084d1"><span style="text-decoration:none"><font face="Lato, serif"><font style="font-size:10pt" size="2"><span lang="pt-BR"><b>MANAUS </b></span></font></font></span></font></strong><strong><font color="#4c4c4c"><span style="text-decoration:none"><font face="Meta-Normal, serif"><font style="font-size:10pt" size="2"><span lang="pt-BR"><span style="font-weight:normal">-</span></span></font></font></span></font></strong><font face="Times New Roman, serif"><span lang="pt-BR"> </span></font><font color="#0000ff"><span lang="zxx"><u><a data-cke-saved-href="mailto:nasajonam@nasajon.com.br" href="mailto:nasajonam@nasajon.com.br" target="_blank">nasajonam@nasajon.com.br</a></u></span></font></p><p><strong><font color="#0084d1"><span style="text-decoration:none"><font face="Lato, serif"><font style="font-size:10pt" size="2"><span lang="pt-BR"><b>BELÉM </b></span></font></font></span></font></strong><strong><font color="#4c4c4c"><span style="text-decoration:none"><font face="Meta-Normal, serif"><font style="font-size:10pt" size="2"><span lang="pt-BR"><span style="font-weight:normal">- </span></span></font></font></span></font></strong><font color="#0000ff"><span lang="zxx"><u><a data-cke-saved-href="mailto:nasajonpa@nasajon.com.br" href="mailto:nasajonpa@nasajon.com.br" target="_blank">nasajonpa@nasajon.com.br</a></u></span></font></p><p><strong><font color="#0084d1"><span style="text-decoration:none"><font face="Lato, serif"><font style="font-size:10pt" size="2"><span lang="pt-BR"><b>AMAPÁ </b></span></font></font></span></font></strong><strong><font color="#4c4c4c"><span style="text-decoration:none"><font face="Meta-Normal, serif"><font style="font-size:10pt" size="2"><span lang="pt-BR"><span style="font-weight:normal">- </span></span></font></font></span></font></strong><font color="#0000ff"><span lang="zxx"><u><a data-cke-saved-href="mailto:nasajonap@nasajon.com.br" href="mailto:nasajonap@nasajon.com.br" target="_blank"><span style="text-decoration:none"><font face="Lato, serif"><font style="font-size:10pt" size="2"><span style="font-weight:normal">nasajonap@nasajon.com.br</span></font></font></span></a></u></span></font></p><p style="margin-bottom:0cm;line-height:100%"><strong><font color="#4c4c4c"><span style="text-decoration:none"><font face="Lato, serif"><font style="font-size:10pt" size="2"><span lang="pt-BR"><span style="font-weight:normal">Atenciosamente,</span></span></font></font></span></font></strong></p><p style="margin-bottom:0cm;line-height:100%"><strong><font color="#4c4c4c"><span style="text-decoration:none"><font face="Lato, serif"><font style="font-size:10pt" size="2"><span lang="pt-BR"><span style="font-weight:normal">Marcelo Balaciano</span></span></font></font></span></font></strong></p><p style="margin-bottom:0cm;line-height:100%"><strong><font color="#4c4c4c"><span style="text-decoration:none"><font face="Lato, serif"><font style="font-size:10pt" size="2"><span lang="pt-BR"><span style="font-weight:normal">Gerente de Suporte</span></span></font></font></span></font></strong></p><p style="margin-bottom:0cm;line-height:100%"><strong><font color="#4c4c4c"><span style="text-decoration:none"><font face="Lato, serif"><font style="font-size:10pt" size="2"><span lang="pt-BR"><span style="font-weight:normal">Telefones para contato :</span></span></font></font></span></font></strong></p><p style="margin-bottom:0cm;line-height:100%"><strong><font color="#4c4c4c"><span style="text-decoration:none"><font face="Lato, serif"><font style="font-size:10pt" size="2"><span lang="pt-BR"><span style="font-weight:normal">Depto.de Suporte ao Persona - 22139300</span></span></font></font></span></font></strong></p><p style="margin-bottom:0cm;line-height:100%"><strong><font color="#4c4c4c"><span style="text-decoration:none"><font face="Lato, serif"><font style="font-size:10pt" size="2"><span lang="pt-BR"><span style="font-weight:normal">Supervisor de Suporte Sônia - 22139300 Ramal 321</span></span></font></font></span></font></strong></p><p style="margin-bottom:0cm;line-height:100%"><strong><font color="#4c4c4c"><span style="text-decoration:none"><font face="Lato, serif"><font style="font-size:10pt" size="2"><span lang="pt-BR"><span style="font-weight:normal">Gerente do Suporte Marcelo - 22139300 Ramal 312</span></span></font></font></span></font></strong></p><p style="margin-bottom:0cm;line-height:100%"><strong><font color="#4c4c4c"><span style="text-decoration:none"><font face="Lato, serif"><font style="font-size:10pt" size="2"><span lang="pt-BR"><span style="font-weight:normal">Diretor do Suporte Carlos - 22139300 Ramal 304</span></span></font></font></span></font></strong><br></p><p><br></p><p><br></p></div>', NULL, NULL, 15, 'Carta de Atualização - Persona 1.41.05.01', NULL, 18, NULL);
            INSERT INTO email.templates
            ("template", categoria, descricao, conteudo, lastupdate, versao, tenant, assunto, codigo, empresa, remetente)
            VALUES('07465fdd-ec0f-4c16-bad8-478c6cd559f5'::uuid, NULL, 'Contato interessado: EM NF Arquivo', '<div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px;"><span style="font-family: verdana, geneva, sans-serif;">Aten&ccedil;&atilde;o, equipe! O contato deseja receber mais informa&ccedil;&otilde;es sobre o NF Arquivo via EM:</span></div>

            <div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px;">&nbsp;</div>

            <div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px;"><span style="font-family: verdana, geneva, sans-serif;">Nome: {{nome}}</span></div>

            <div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px;"><span style="font-family: verdana, geneva, sans-serif;">Email:&nbsp;<span style="font-size: 13.2px; line-height: 19.8px;">{{email}}</span></span></div>

            <div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px;"><span style="font-family: verdana, geneva, sans-serif;">Telefone:&nbsp;<span style="font-size: 13.2px; line-height: 19.8px;">{{telefone}}</span></span></div>

            <div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px;"><span style="font-family: verdana, geneva, sans-serif;">Estado:&nbsp;<span style="font-size: 13.2px; line-height: 19.8px;">{{estado}}</span></span></div>

            <div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px;"><span style="font-family: verdana, geneva, sans-serif;">Munic&iacute;pio:&nbsp;<span style="font-size: 13.2px; line-height: 19.8px;">{{cidade}}</span></span></div>

            <div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px;"><span style="font-family: verdana, geneva, sans-serif;">Mensagem:&nbsp;<span style="font-size: 13.2px; line-height: 19.8px;">{{mensagem}}</span></span></div>', NULL, NULL, 10058, 'Contato interessado: EM NF Arquivo', NULL, NULL, NULL);
            INSERT INTO email.templates
            ("template", categoria, descricao, conteudo, lastupdate, versao, tenant, assunto, codigo, empresa, remetente)
            VALUES('85b032f4-5005-4f55-8a91-4dad11b1ccd7'::uuid, NULL, 'EM Contato interessado: 7 características do consumidor moderno', '<p>Gente,&nbsp;</p>

            <p>O contato abaixo realizou o download do&nbsp;Infogr&aacute;fico&nbsp;<span style="color: rgb(34, 34, 34); font-family: arial, sans-serif; font-size: 12.8px;">7 caracter&iacute;sticas do consumidor moderno</span>&nbsp;via Email Mkt:</p>

            <p>Nome: {{nome}}<br />
            Email: {{email}}<br />
            Telefone: {{telefone}}<br />
            Empresa: {{empresa}}</p>', NULL, NULL, 10058, 'EM Contato interessado: 7 características do consumidor moderno', NULL, NULL, NULL);
            INSERT INTO email.templates
            ("template", categoria, descricao, conteudo, lastupdate, versao, tenant, assunto, codigo, empresa, remetente)
            VALUES('ee485d23-7c7d-43e8-a66e-7d1e2b6caa63'::uuid, NULL, 'Falecon: Contábil (ERP)', '<div class="gmail_default" style="color: rgb(33, 33, 33); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px;"><span style="font-family: verdana, geneva, sans-serif;">Aten&ccedil;&atilde;o, equipe! O contato abaixo deseja receber uma demonstra&ccedil;&atilde;o gr&aacute;tis do&nbsp;<strong>Cont&aacute;bil&nbsp;</strong>via Falecon:</span></div>

            <div class="gmail_default" style="color: rgb(33, 33, 33); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px;">&nbsp;</div>

            <div class="gmail_default" style="color: rgb(33, 33, 33); font-size: 13.2px; line-height: 19.8px;"><font face="verdana, geneva, sans-serif">Nome: {{nome}}</font></div>

            <div class="gmail_default" style="color: rgb(33, 33, 33); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px;"><span style="font-family: verdana, geneva, sans-serif;">Email:&nbsp;<span style="font-size: 13.2px; line-height: 19.8px;">{{email}}</span></span></div>

            <div class="gmail_default" style="color: rgb(33, 33, 33); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px;"><span style="font-family: verdana, geneva, sans-serif;">Telefone:&nbsp;<span style="font-size: 13.2px; line-height: 19.8px;">{{telefone}}</span></span></div>

            <div class="gmail_default" style="color: rgb(33, 33, 33); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px;"><span style="font-family: verdana, geneva, sans-serif;">Estado:&nbsp;<span style="font-size: 13.2px; line-height: 19.8px;">{{estado}}</span></span></div>

            <div class="gmail_default" style="color: rgb(33, 33, 33); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px;"><span style="font-family: verdana, geneva, sans-serif;">Munic&iacute;pio:&nbsp;<span style="font-size: 13.2px; line-height: 19.8px;">{{cidade}}</span></span></div>

            <div class="gmail_default" style="color: rgb(33, 33, 33); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px;"><span style="font-family: verdana, geneva, sans-serif;">Mensagem:&nbsp;<span style="font-size: 13.2px; line-height: 19.8px;">{{mensagem}}</span></span></div>

            <div class="gmail_default" style="color: rgb(33, 33, 33); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px;"><span style="color: rgb(33, 33, 33); font-size: 13.2px; font-family: verdana, geneva, sans-serif;">&Eacute; cliente Nasajon?: {{cliente}}</span><br style="color: rgb(33, 33, 33); font-size: 13.2px; font-family: verdana, geneva, sans-serif;" />
            <span style="color: rgb(33, 33, 33); font-size: 13.2px; font-family: verdana, geneva, sans-serif;">Origem: {{origem}}</span><br style="color: rgb(33, 33, 33); font-size: 13.2px; font-family: verdana, geneva, sans-serif;" />
            <span style="color: rgb(33, 33, 33); font-size: 13.2px; font-family: verdana, geneva, sans-serif;">M&iacute;dia: {{midia}}</span><br style="color: rgb(33, 33, 33); font-size: 13.2px; font-family: verdana, geneva, sans-serif;" />
            <span style="color: rgb(33, 33, 33); font-size: 13.2px; font-family: verdana, geneva, sans-serif;">Campanha: {{campanha}}</span></div>', NULL, NULL, 10058, 'Falecon: Contábil', NULL, NULL, NULL);
            INSERT INTO email.templates
            ("template", categoria, descricao, conteudo, lastupdate, versao, tenant, assunto, codigo, empresa, remetente)
            VALUES('3c8a1c96-e502-4c36-9d45-a0f4352575dc'::uuid, NULL, 'Solicitação de Admissão Completa', '<!DOCTYPE html>
                    <html lang="en">
                    <head>
                        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
                        <meta http-equiv="X-UA-Compatible" content="IE=edge">
                        <meta name="viewport" content="width=device-width, initial-scale=1">
                        <meta name="msapplication-config" content="none" />
                        <title>Nasajon Sistemas</title>
                    </head>

                    <body style="background-color: #FAFAFA;">
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                                <td align="center">
                                    <table style="min-width: 650px;min-height: 650px;">
                                        <tr>
                                            <td>
                                                <table width="100%" border="0" cellspacing="0" cellpadding="0" align="center" style="font-family: Arial, Helvetica, sans-serif;
                                                            font-size: 14px;
                                                            background-color: white;
                                                            border-width: 1px;
                                                            border-style: solid;
                                                            border-color: #DDDDDD;
                                                            border-radius: 4px;
                                                            margin-top: 10px;
                                                            padding: 20px;">
                                                    {% if logourl  %}
                                                    <tr height="40">
                                                        <td width="50%" align="center">
                                                            <img src="{{logourl}}" width="auto" height="40" border="0"
                                                                style="margin: 10px auto; outline:none; border:none;">
                                                        </td>
                                                    </tr>
                                                    {% endif %}
                                                    <tr height="40">
                                                        <td width="50%" align="center">
                                                            <h1 style="font-family: Arial, Helvetica, sans-serif;
                                                                    font-size: 21px;
                                                                    color:#5A5A5A;
                                                                    font-weight: bold;
                                                                    margin-top: 10px;
                                                                    margin:10px;
                                                                    mso-line-height-rule:exactly;
                                                                    padding-bottom: 20px;">
                                                                {{mensagem}}
                                                            </h1>
                                                        </td>

                                                    </tr>
                                                    <tr height="40">
                                                        <td width="50%" align="center">
                                                            <h1 style="font-family: Arial, Helvetica, sans-serif;
                                                                    font-size: 15px;
                                                                    color:#5A5A5A;
                                                                    font-weight: bold;
                                                                    margin-top: 0;
                                                                    margin:0;
                                                                    mso-line-height-rule:exactly;
                                                                    padding-bottom: 20px;">
                                                                {{notificacao}}
                                                            </h1>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                    <td>
                                                    {% if justificativamensagem  %}
                                                    <hr style="border-width: 1px;border-color: #DDDDDD;border-style: solid;margin-top: 0;margin-bottom: 16px;">
                                                    <tr height="40" style="border-width: 1px;border-color: #5A5A5A;border-style: solid;margin-top: 0;margin-bottom: 16px;">
                                                        <td width="50%" align="center">
                                                            <h1 style="font-family: Arial, Helvetica, sans-serif;
                                                                    font-size: 21px;
                                                                    color:#5A5A5A;
                                                                    font-weight: bold;
                                                                    margin-top: 0;
                                                                    margin:0;
                                                                    mso-line-height-rule:exactly;
                                                                    padding-bottom: 20px;">
                                                                Justificativa:
                                                            </h1>
                                                        </td>
                                                    </tr>
                                                    <tr height="40">
                                                        <td width="50%" align="center">
                                                            <p
                                                                style="font-family: Arial, Helvetica, sans-serif;  color:#5A5A5A; font-size: 14px;">
                                                                <img src="https://s3.sa-east-1.amazonaws.com/imagens.nasajon/geral/email-de-notificacoes/quote-left.png"
                                                                    width="auto" height="30" border="0" style=" outline:none; border:none;">
                                                                {{justificativamensagem}}
                                                                <img src="https://s3.sa-east-1.amazonaws.com/imagens.nasajon/geral/email-de-notificacoes/quote-right.png"
                                                                    width="auto" height="30" border="0" style=" outline:none; border:none;">
                                                        </td>
                                                    </tr>
                                                    {% endif %}
                                                    <tr>
                                                        <td>
                                                            <table width="100%" border="0" cellspacing="0" cellpadding="0" align="center" style="font-family: Arial, Helvetica, sans-serif;
                                                            font-size: 14px;
                                                            background-color: white;
                                                            border-width: 1px;
                                                            border-style: solid;
                                                            border-color: #5A5A5A;
                                                            border-radius: 4px;
                                                            margin-top: 10px;
                                                            padding: 20px;">
                                                                <tr height="40">
                                                                    <td width="100%" align="left">
                                                                        <img src="https://s3.sa-east-1.amazonaws.com/imagens.nasajon/geral/email-de-notificacoes/user.png"
                                                                        width="auto" height="20" border="0" style=" outline:none; border:none;">
                                                                        <span style="font-family: Arial, Helvetica, sans-serif;
                                                                        font-size: 15px;
                                                                        color:#5A5A5A;
                                                                        font-weight: bold;
                                                                        margin-top: 0;
                                                                        margin:0;
                                                                        mso-line-height-rule:exactly;">
                                                                        {{nomecolaborador}}:
                                                                        </span>

                                                                        {{colaboradorcargoniveltexto}}
                                                                    </td>
                                                                </tr>
                                                                <tr height="40">
                                                                    <td width="100%" align="left">
                                                                        <img src="https://s3.sa-east-1.amazonaws.com/imagens.nasajon/geral/email-de-notificacoes/building.png"
                                                                        width="auto" height="20" border="0" style=" outline:none; border:none;">
                                                                        <span style="font-family: Arial, Helvetica, sans-serif;
                                                                        font-size: 15px;
                                                                        color:#5A5A5A;
                                                                        font-weight: bold;
                                                                        margin-top: 0;
                                                                        margin:0;
                                                                        mso-line-height-rule:exactly;">
                                                                        Empresa:
                                                                        </span>

                                                                        {{colaboradorempresatexto}}
                                                                    </td>
                                                                </tr>
                                                                <tr height="40">
                                                                    <td width="100%" align="left">
                                                                        <img src="https://s3.sa-east-1.amazonaws.com/imagens.nasajon/geral/email-de-notificacoes/store-alt.png"
                                                                        height="20" border="0" style=" outline:none; border:none;">
                                                                        <span style="font-family: Arial, Helvetica, sans-serif;
                                                                        font-size: 15px;
                                                                        color:#5A5A5A;
                                                                        font-weight: bold;
                                                                        margin-top: 0;
                                                                        margin:0;
                                                                        mso-line-height-rule:exactly;">
                                                                        Estabelecimento:
                                                                        </span>

                                                                        {{colaboradorestabelecimentotexto}}
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                    </table>
                            <tr>
                                <td align="center">
                                    <font face="Arial, Helvetica, sans-serif" color="#767676" style="font-size: 12px;">
                                        Esta é uma mensagem automática. Por favor, não responda a este e-mail. <br>
                                        Desensolvido pela Nasajon
                                    </font>
                                </td>
                            </tr>
                            <tr height="10">
                                <td></td>
                            </tr>
                            <tr>
                                <td align="center">
                                    <img src="https://s3.sa-east-1.amazonaws.com/imagens.nasajon/logos/nasajon/versao-acinzentada/nova-marca/logo-nasajon_acinzentada-horizontal.png"
                                        alt="Logo da Nasajon Sistemas" width="128" height="30" border="0"
                                        style="margin: 0 auto; outline:none; border:none;">
                                </td>
                            </tr>
                        </table>
                        </td>
                        </tr>
                        </table>
                        </td>
                        </tr>
                        </table>
                    </body>
                </html>', '2022-05-11 14:21:55.913', 1, NULL, 'Solicitação de Admissão Completa', 'meurh_admissaocompleta_generico', NULL, NULL);
            INSERT INTO email.templates
            ("template", categoria, descricao, conteudo, lastupdate, versao, tenant, assunto, codigo, empresa, remetente)
            VALUES('6b9df59a-c9de-46cd-acd8-b35ab64fcfe1'::uuid, NULL, 'Contato interessado: Campanha Valores de 2017 Google', '<div class="gmail_default" style="color: rgb(33, 33, 33); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px;"><span style="font-family: verdana, geneva, sans-serif;">Aten&ccedil;&atilde;o, equipe! O contato abaixo preencheu o&nbsp;<strong>formul&aacute;rio&nbsp;da p&aacute;gina da</strong>&nbsp;<strong>Campanha Valores de 2017 via Google</strong></span></div>

            <div class="gmail_default" style="color: rgb(33, 33, 33); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px;"><span style="font-family: verdana, geneva, sans-serif;">N&atilde;o se esque&ccedil;am de cadastrar a m&iacute;dia de origem no ERP!&nbsp;</span></div>

            <div class="gmail_default" style="color: rgb(33, 33, 33); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px;">&nbsp;</div>

            <div class="gmail_default" style="color: rgb(33, 33, 33); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px;"><span style="font-family: verdana, geneva, sans-serif;">Nome: {{nome}}</span></div>

            <div class="gmail_default" style="color: rgb(33, 33, 33); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px;"><span style="font-family: verdana, geneva, sans-serif;">Email:&nbsp;<span style="line-height: 19.8px;">{{email}}</span></span></div>

            <div class="gmail_default" style="color: rgb(33, 33, 33); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px;"><span style="font-family: verdana, geneva, sans-serif;">Telefone:&nbsp;<span style="line-height: 19.8px;">{{telefone}}</span></span></div>

            <div class="gmail_default" style="color: rgb(33, 33, 33); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px;"><span style="font-family: verdana, geneva, sans-serif;">Empresa:&nbsp;</span><span style="font-family: verdana, geneva, sans-serif; line-height: 19.8px;">{{empresa}}</span></div>

            <div class="gmail_default" style="color: rgb(33, 33, 33); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px;"><span style="font-family: verdana, geneva, sans-serif;">Estado:&nbsp;<span style="line-height: 19.8px;">{{estado}}</span></span>​</div>

            <div class="gmail_default" style="color: rgb(33, 33, 33); font-size: 13.2px; line-height: 19.8px;"><font face="verdana, geneva, sans-serif">Mensagem: {{mensagem}}</font></div>

            <div class="gmail_default" style="color: rgb(33, 33, 33); font-size: 13.2px; line-height: 19.8px;"><font face="verdana, geneva, sans-serif">&Eacute; cliente Nasajon: {{clientesim}}<br />
            &Eacute; cliente Nasajon: {{clientenao}}</font></div>

            <div class="gmail_default" style="color: rgb(33, 33, 33); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px;">
            <div class="gmail_default" style="line-height: 19.8px;"><span style="font-family: verdana, geneva, sans-serif;"><span style="line-height: 19.8px;"><span style="line-height: 19.8px;">​</span></span></span>

            <div class="gmail_default" style="line-height: 19.8px;"><span style="font-family: verdana, geneva, sans-serif;"><span style="line-height: 19.8px;"><span style="line-height: 19.8px;">&nbsp;</span></span></span></div>

            <div class="gmail_default" style="line-height: 19.8px;"><span style="font-family: verdana, geneva, sans-serif;"><span style="line-height: 19.8px;"><span style="line-height: 19.8px;">Lembrando que o prazo ideal para primeiro contato com o lead s&atilde;o 24 horas.</span></span></span></div>

            <div class="gmail_default" style="line-height: 19.8px;"><span style="font-family: verdana, geneva, sans-serif;"><span style="line-height: 19.8px;"><span style="line-height: 19.8px;">Juntos podemos fazer muito!</span></span></span></div>
            </div>
            </div>', NULL, NULL, 10058, 'Contato interessado: Campanha Valores de 2017 Google', NULL, NULL, NULL);
            INSERT INTO email.templates
            ("template", categoria, descricao, conteudo, lastupdate, versao, tenant, assunto, codigo, empresa, remetente)
            VALUES('43b9d2b1-a6f1-4cee-ab11-398e0f1cf61e'::uuid, NULL, 'Mensagem Nasajon', '<div class="block_border" style="width:780px;margin: 10px 10px 0 10px;">
            <div contenteditable="true" class="cke_editable cke_editable_inline cke_contents_ltr cke_show_borders" tabindex="0" spellcheck="false" role="textbox" aria-label="Editor de Rich Text, editor2" title="Editor de Rich Text, editor2" aria-describedby="cke_94" style="position: relative;"><p><img alt="" data-cke-saved-src="https://email.nasajon.com.br/uploads/nasajon/nasajon/images/abcff5694c57a18a74f4f8cf3c7e731a1f33d46a.jpg" src="https://email.nasajon.com.br/uploads/nasajon/nasajon/images/abcff5694c57a18a74f4f8cf3c7e731a1f33d46a.jpg"><br><br><br><br></p></div>
            </div>', NULL, NULL, 47, 'Mensagem Nasajon', NULL, 19, NULL);
            INSERT INTO email.templates
            ("template", categoria, descricao, conteudo, lastupdate, versao, tenant, assunto, codigo, empresa, remetente)
            VALUES('517135ea-0f86-41a9-ab93-fbe20b5f3150'::uuid, NULL, 'Falecon: Soluções para RH e DP', '<div class="gmail_default" style="color: rgb(33, 33, 33); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px;"><span style="font-family: verdana, geneva, sans-serif;">Aten&ccedil;&atilde;o, equipe! O contato abaixo preencheu o formul&aacute;rio de&nbsp;contato da p&aacute;gina de&nbsp;<strong>Solu&ccedil;&otilde;es para RH e DP</strong>:&nbsp;</span><br />
            &nbsp;</div>

            <div class="gmail_default" style="color: rgb(33, 33, 33); font-size: 13.2px; line-height: 19.8px;"><font face="verdana, geneva, sans-serif">Nome: {{nome}}</font></div>

            <div class="gmail_default" style="color: rgb(33, 33, 33); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px;"><span style="font-family: verdana, geneva, sans-serif;">Email:&nbsp;<span style="font-size: 13.2px; line-height: 19.8px;">{{email}}</span></span></div>

            <div class="gmail_default" style="color: rgb(33, 33, 33); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px;"><span style="font-family: verdana, geneva, sans-serif;">Telefone:&nbsp;<span style="font-size: 13.2px; line-height: 19.8px;">{{telefone}}</span></span></div>

            <div class="gmail_default" style="color: rgb(33, 33, 33); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px;"><span style="font-family: verdana, geneva, sans-serif;">Estado:&nbsp;<span style="font-size: 13.2px; line-height: 19.8px;">{{estado}}</span></span></div>

            <div class="gmail_default" style="color: rgb(33, 33, 33); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px;"><span style="font-family: verdana, geneva, sans-serif;">Munic&iacute;pio:&nbsp;<span style="font-size: 13.2px; line-height: 19.8px;">{{cidade}}</span></span></div>

            <div class="gmail_default" style="color: rgb(33, 33, 33); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px;"><span style="font-family: verdana, geneva, sans-serif;">Mensagem:&nbsp;<span style="font-size: 13.2px; line-height: 19.8px;">{{mensagem}}</span></span></div>

            <div class="gmail_default" style="color: rgb(33, 33, 33); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px;">
            <div class="gmail_default" style="color: rgb(33, 33, 33); font-size: 13.2px; line-height: 19.8px;"><span style="font-family: verdana, geneva, sans-serif; font-size: 13.2px;">&Eacute; cliente Nasajon: {{cliente}}</span></div>

            <div class="gmail_default" style="color: rgb(33, 33, 33); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px;">
            <div class="gmail_default" style="line-height: 19.8px;">
            <div class="gmail_default" style="font-size: 13.2px; line-height: 19.8px;"><span style="font-family: verdana, geneva, sans-serif; font-size: 13.2px;">Origem:&nbsp;</span><span style="font-family: verdana, geneva, sans-serif; font-size: 13.2px; line-height: 19.8px;">{{origem}}</span></div>

            <div class="gmail_default" style="font-size: 13.2px; line-height: 19.8px;"><span style="font-family: verdana, geneva, sans-serif; font-size: 13.2px;">M&iacute;dia:&nbsp;</span><span style="font-family: verdana, geneva, sans-serif; font-size: 13.2px; line-height: 19.8px;">{{midia}}</span></div>

            <div class="gmail_default" style="font-size: 13.2px; line-height: 19.8px;"><span style="font-family: verdana, geneva, sans-serif; font-size: 13.2px;">Campanha:&nbsp;</span><span style="font-family: verdana, geneva, sans-serif; font-size: 13.2px; line-height: 19.8px;">{{campanha}}</span></div>
            </div>
            </div>
            </div>', NULL, NULL, 10058, 'Falecon: Soluções para RH e DP', NULL, NULL, NULL);
            INSERT INTO email.templates
            ("template", categoria, descricao, conteudo, lastupdate, versao, tenant, assunto, codigo, empresa, remetente)
            VALUES('b64b6743-718b-4298-9053-c99bd43f1f19'::uuid, NULL, 'Falecon: Estoque (ERP)', '<div class="gmail_default" style="color: rgb(33, 33, 33); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px;"><span style="font-family: verdana, geneva, sans-serif;">Aten&ccedil;&atilde;o, equipe! O contato abaixo deseja receber uma demonstra&ccedil;&atilde;o gr&aacute;tis do&nbsp;<strong>Estoque&nbsp;</strong>via Falecon:</span></div>

            <div class="gmail_default" style="color: rgb(33, 33, 33); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px;">&nbsp;</div>

            <div class="gmail_default" style="color: rgb(33, 33, 33); font-size: 13.2px; line-height: 19.8px;"><font face="verdana, geneva, sans-serif">Nome: {{nome}}</font></div>

            <div class="gmail_default" style="color: rgb(33, 33, 33); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px;"><span style="font-family: verdana, geneva, sans-serif;">Email:&nbsp;<span style="font-size: 13.2px; line-height: 19.8px;">{{email}}</span></span></div>

            <div class="gmail_default" style="color: rgb(33, 33, 33); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px;"><span style="font-family: verdana, geneva, sans-serif;">Telefone:&nbsp;<span style="font-size: 13.2px; line-height: 19.8px;">{{telefone}}</span></span></div>

            <div class="gmail_default" style="color: rgb(33, 33, 33); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px;"><span style="font-family: verdana, geneva, sans-serif;">Estado:&nbsp;<span style="font-size: 13.2px; line-height: 19.8px;">{{estado}}</span></span></div>

            <div class="gmail_default" style="color: rgb(33, 33, 33); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px;"><span style="font-family: verdana, geneva, sans-serif;">Munic&iacute;pio:&nbsp;<span style="font-size: 13.2px; line-height: 19.8px;">{{cidade}}</span></span></div>

            <div class="gmail_default" style="color: rgb(33, 33, 33); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px;"><span style="font-family: verdana, geneva, sans-serif;">Mensagem:&nbsp;<span style="font-size: 13.2px; line-height: 19.8px;">{{mensagem}}</span></span></div>

            <div class="gmail_default" style="color: rgb(33, 33, 33); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px;"><span style="color: rgb(33, 33, 33); font-size: 13.2px; font-family: verdana, geneva, sans-serif;">&Eacute; cliente Nasajon?: {{cliente}}</span><br style="color: rgb(33, 33, 33); font-size: 13.2px; font-family: verdana, geneva, sans-serif;" />
            <span style="color: rgb(33, 33, 33); font-size: 13.2px; font-family: verdana, geneva, sans-serif;">Origem: {{origem}}</span><br style="color: rgb(33, 33, 33); font-size: 13.2px; font-family: verdana, geneva, sans-serif;" />
            <span style="color: rgb(33, 33, 33); font-size: 13.2px; font-family: verdana, geneva, sans-serif;">M&iacute;dia: {{midia}}</span><br style="color: rgb(33, 33, 33); font-size: 13.2px; font-family: verdana, geneva, sans-serif;" />
            <span style="color: rgb(33, 33, 33); font-size: 13.2px; font-family: verdana, geneva, sans-serif;">Campanha: {{campanha}}</span></div>', NULL, NULL, 10058, 'Falecon: Estoque', NULL, NULL, NULL);
            INSERT INTO email.templates
            ("template", categoria, descricao, conteudo, lastupdate, versao, tenant, assunto, codigo, empresa, remetente)
            VALUES('8dee00e4-7a32-4730-a315-178ce4554855'::uuid, NULL, 'Recupera Senha', '<div contenteditable="true" class="cke_editable cke_editable_inline cke_contents_ltr cke_show_borders cke_focus" tabindex="0" spellcheck="false" role="textbox" aria-label="Editor de Rich Text, editor1" title="Editor de Rich Text, editor1" aria-describedby="cke_49" style="position: relative;"><table align="center" width="650" cellspacing="0" cellpadding="0" border="0" style="color: rgb(34, 34, 34); font-family: arial, sans-serif; font-size: 12.8000001907349px; background-color: rgb(255, 255, 255);" class=" cke_show_border"><tbody><tr><td width="230" style="margin: 0px;"><a data-cke-saved-href="http://www.nasajon.com.br/workshop-erp-sao-paulo" href="http://www.nasajon.com.br/workshop-erp-sao-paulo" title="Visite nosso Site" target="_blank" style="color: rgb(17, 85, 204);"></a><img data-cke-saved-src="http://www.nasajon.com.br/images/logo-nova.png" src="http://www.nasajon.com.br/images/logo-nova.png" alt="Logotipo - Nasajon sistemas"><a data-cke-saved-href="http://www.nasajon.com.br/workshop-erp-sao-paulo" href="http://www.nasajon.com.br/workshop-erp-sao-paulo" title="Visite nosso Site" target="_blank" style="color: rgb(17, 85, 204);"></a></td><td width="420" align="right" style="margin: 0px;"><span style="font-family: ''Times New Roman'', serif; font-size: 30px; color: rgb(51, 51, 51); letter-spacing: -1px;">Recuperação de Senha!</span></td></tr></tbody></table><table align="center" width="650" cellspacing="0" cellpadding="0" border="0" style="color: rgb(34, 34, 34); font-family: arial, sans-serif; font-size: 12.8000001907349px; background-color: rgb(255, 255, 255);" class=" cke_show_border"><tbody><tr><td height="20" style="margin: 0px;"><br></td></tr><tr><td height="2" bgcolor="#CCCCCC" style="margin: 0px;"><br></td></tr></tbody></table><table align="center" width="650" cellspacing="0" cellpadding="0" border="0" style="color: rgb(34, 34, 34); font-family: arial, sans-serif; font-size: 12.8000001907349px; background-color: rgb(255, 255, 255);" class=" cke_show_border"><tbody><tr><td style="margin: 0px;"><p style="font-family: ''Times New Roman'', serif; font-size: 28px; color: rgb(51, 51, 51); letter-spacing: -1px;">Olá,&nbsp;<span style="color: rgb(3, 61, 131);">{{usuario}}&nbsp;</span>!</p><p style="font-family: ''Times New Roman'', serif; font-size: 28px; color: rgb(51, 51, 51); letter-spacing: -1px;">Segue abaixo sua senha para acesso:</p><p style="font-family: ''Times New Roman'', serif; font-size: 28px; color: rgb(51, 51, 51); letter-spacing: -1px;">Login {{login}}<br>Senha&nbsp;<span style="color: rgb(3, 61, 131);">{{senha}}</span></p><p style="font-family: ''Times New Roman'', serif; font-size: 18px; color: rgb(51, 51, 51); letter-spacing: -1px;">Atenciosamente,<br>Equipe&nbsp;<a data-cke-saved-href="http://www.nasajon.com.br/" href="http://www.nasajon.com.br/" title="Acesse nosso site" target="_blank" style="color: rgb(3, 61, 131); text-decoration: none;">Nasajon</a></p></td></tr></tbody></table></div>', NULL, NULL, NULL, 'Recuperação de Senha - {{area}}', 'RECSENHA', NULL, NULL);
            INSERT INTO email.templates
            ("template", categoria, descricao, conteudo, lastupdate, versao, tenant, assunto, codigo, empresa, remetente)
            VALUES('6d9c14f4-5c45-4c77-9c8f-f3397fece276'::uuid, NULL, 'Solicitação de Admissão', '<html lang="en">
                    <head>
                        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
                        <meta http-equiv="X-UA-Compatible" content="IE=edge">
                        <meta name="viewport" content="width=device-width, initial-scale=1">
                        <meta name="msapplication-config" content="none" />
                        <title>Nasajon Sistemas</title>
                    </head>

                    <body style="background-color: #FAFAFA;">
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                                <td align="center">
                                    <table style="min-width: 650px;min-height: 650px;">
                                        <tr>
                                            <td>
                                                <table width="100%" border="0" cellspacing="0" cellpadding="0" align="center" style="font-family: Arial, Helvetica, sans-serif;
                                                            font-size: 14px;
                                                            background-color: white;
                                                            border-width: 1px;
                                                            border-style: solid;
                                                            border-color: #DDDDDD;
                                                            border-radius: 4px;
                                                            margin-top: 10px;
                                                            padding: 20px;">
                                                    {% if logourl  %}
                                                    <tr height="40">
                                                        <td width="50%" align="center">
                                                            <img src="{{logourl}}" width="auto" height="40" border="0"
                                                                style="margin: 10px auto; outline:none; border:none;">
                                                        </td>
                                                    </tr>
                                                    {% endif %}
                                                    <tr height="40">
                                                        <td width="50%" align="center">
                                                            <h1 style="font-family: Arial, Helvetica, sans-serif;
                                                                    font-size: 21px;
                                                                    color:#5A5A5A;
                                                                    font-weight: bold;
                                                                    margin-top: 10px;
                                                                    margin:10px;
                                                                    mso-line-height-rule:exactly;
                                                                    padding-bottom: 20px;">
                                                                {{mensagem}}
                                                            </h1>
                                                        </td>

                                                    </tr>
                                                    <tr height="40">
                                                        <td width="50%" align="center">
                                                            <h1 style="font-family: Arial, Helvetica, sans-serif;
                                                                    font-size: 15px;
                                                                    color:#5A5A5A;
                                                                    font-weight: bold;
                                                                    margin-top: 0;
                                                                    margin:0;
                                                                    mso-line-height-rule:exactly;
                                                                    padding-bottom: 20px;">
                                                                {{notificacao}}
                                                            </h1>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                    <td>
                                                    {% if justificativamensagem  %}
                                                    <hr style="border-width: 1px;border-color: #DDDDDD;border-style: solid;margin-top: 0;margin-bottom: 16px;">
                                                    <tr height="40" style="border-width: 1px;border-color: #5A5A5A;border-style: solid;margin-top: 0;margin-bottom: 16px;">
                                                        <td width="50%" align="center">
                                                            <h1 style="font-family: Arial, Helvetica, sans-serif;
                                                                    font-size: 21px;
                                                                    color:#5A5A5A;
                                                                    font-weight: bold;
                                                                    margin-top: 0;
                                                                    margin:0;
                                                                    mso-line-height-rule:exactly;
                                                                    padding-bottom: 20px;">
                                                                Justificativa:
                                                            </h1>
                                                        </td>
                                                    </tr>
                                                    <tr height="40">
                                                        <td width="50%" align="center">
                                                            <p
                                                                style="font-family: Arial, Helvetica, sans-serif;  color:#5A5A5A; font-size: 14px;">
                                                                <img src="https://s3.sa-east-1.amazonaws.com/imagens.nasajon/geral/email-de-notificacoes/quote-left.png"
                                                                    width="auto" height="30" border="0" style=" outline:none; border:none;">
                                                                {{justificativamensagem}}
                                                                <img src="https://s3.sa-east-1.amazonaws.com/imagens.nasajon/geral/email-de-notificacoes/quote-right.png"
                                                                    width="auto" height="30" border="0" style=" outline:none; border:none;">
                                                        </td>
                                                    </tr>
                                                    {% endif %}
                                                    <tr>
                                                        <td>
                                                            <table width="100%" border="0" cellspacing="0" cellpadding="0" align="center" style="font-family: Arial, Helvetica, sans-serif;
                                                            font-size: 14px;
                                                            background-color: white;
                                                            border-width: 1px;
                                                            border-style: solid;
                                                            border-color: #5A5A5A;
                                                            border-radius: 4px;
                                                            margin-top: 10px;
                                                            padding: 20px;">
                                                                <tr height="40">
                                                                    <td width="100%" align="left">
                                                                        <img src="https://s3.sa-east-1.amazonaws.com/imagens.nasajon/geral/email-de-notificacoes/user.png"
                                                                        width="auto" height="20" border="0" style=" outline:none; border:none;">
                                                                        <span style="font-family: Arial, Helvetica, sans-serif;
                                                                        font-size: 15px;
                                                                        color:#5A5A5A;
                                                                        font-weight: bold;
                                                                        margin-top: 0;
                                                                        margin:0;
                                                                        mso-line-height-rule:exactly;">
                                                                        Nome:
                                                                        </span>

                                                                        {{nomecolaborador}}
                                                                    </td>
                                                                </tr>
                                                                <tr height="40">
                                                                    <td width="100%" align="left">

                                                                        <span style="padding-left: 22px; font-family: Arial, Helvetica, sans-serif;
                                                                        font-size: 15px;
                                                                        color:#5A5A5A;
                                                                        font-weight: bold;
                                                                        margin-top: 0;
                                                                        margin:0;
                                                                        mso-line-height-rule:exactly;">
                                                                        Matricula:
                                                                        </span>

                                                                        {{matricula}}
                                                                    </td>
                                                                </tr>
                                                                <tr height="40">
                                                                    <td width="100%" align="left">

                                                                        <span style="padding-left: 22px; font-family: Arial, Helvetica, sans-serif;
                                                                        font-size: 15px;
                                                                        color:#5A5A5A;
                                                                        font-weight: bold;
                                                                        margin-top: 0;
                                                                        margin:0;
                                                                        mso-line-height-rule:exactly;">
                                                                        CPF:
                                                                        </span>

                                                                        {{cpf}}
                                                                    </td>
                                                                </tr>
                                                                <tr height="40">
                                                                    <td width="100%" align="left">

                                                                        <span style="padding-left: 22px; font-family: Arial, Helvetica, sans-serif;
                                                                        font-size: 15px;
                                                                        color:#5A5A5A;
                                                                        font-weight: bold;
                                                                        margin-top: 0;
                                                                        margin:0;
                                                                        mso-line-height-rule:exactly;">
                                                                        Admissão:
                                                                        </span>

                                                                        {{dataadmissaoformatada}}
                                                                    </td>
                                                                </tr>
                                                                <tr height="40">
                                                                    <td width="100%" align="left">

                                                                        <span style="padding-left: 22px; font-family: Arial, Helvetica, sans-serif;
                                                                        font-size: 15px;
                                                                        color:#5A5A5A;
                                                                        font-weight: bold;
                                                                        margin-top: 0;
                                                                        margin:0;
                                                                        mso-line-height-rule:exactly;">
                                                                        Cargo:
                                                                        </span>

                                                                        {{colaboradorcargoniveltexto}}
                                                                    </td>
                                                                </tr>
                                                                <tr height="40">
                                                                    <td width="100%" align="left">
                                                                        <img src="https://s3.sa-east-1.amazonaws.com/imagens.nasajon/geral/email-de-notificacoes/building.png"
                                                                        width="auto" height="20" border="0" style=" outline:none; border:none;">
                                                                        <span style="font-family: Arial, Helvetica, sans-serif;
                                                                        font-size: 15px;
                                                                        color:#5A5A5A;
                                                                        font-weight: bold;
                                                                        margin-top: 0;
                                                                        margin:0;
                                                                        mso-line-height-rule:exactly;">
                                                                        Empresa:
                                                                        </span>

                                                                        {{colaboradorempresatexto}}
                                                                    </td>
                                                                </tr>
                                                                <tr height="40">
                                                                    <td width="100%" align="left">
                                                                        <img src="https://s3.sa-east-1.amazonaws.com/imagens.nasajon/geral/email-de-notificacoes/store-alt.png"
                                                                        height="20" border="0" style=" outline:none; border:none;">
                                                                        <span style="font-family: Arial, Helvetica, sans-serif;
                                                                        font-size: 15px;
                                                                        color:#5A5A5A;
                                                                        font-weight: bold;
                                                                        margin-top: 0;
                                                                        margin:0;
                                                                        mso-line-height-rule:exactly;">
                                                                        Estabelecimento:
                                                                        </span>

                                                                        {{colaboradorestabelecimentotexto}}
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                    </table>
                            <tr>
                                <td align="center">
                                    <font face="Arial, Helvetica, sans-serif" color="#767676" style="font-size: 12px;">
                                        Esta é uma mensagem automática. Por favor, não responda a este e-mail. <br>
                                        Desensolvido pela Nasajon
                                    </font>
                                </td>
                            </tr>
                            <tr height="10">
                                <td></td>
                            </tr>
                            <tr>
                                <td align="center">
                                    <img src="https://s3.sa-east-1.amazonaws.com/imagens.nasajon/logos/nasajon/versao-acinzentada/nova-marca/logo-nasajon_acinzentada-horizontal.png"
                                        alt="Logo da Nasajon Sistemas" width="128" height="30" border="0"
                                        style="margin: 0 auto; outline:none; border:none;">
                                </td>
                            </tr>
                        </table>
                        </td>
                        </tr>
                        </table>
                        </td>
                        </tr>
                        </table>
                    </body>
                    </html>', '2022-06-10 19:43:39.592', 1, 11063, 'Solicitação de Admissão', 'meurh_admissao_generico', NULL, NULL);
            INSERT INTO email.templates
            ("template", categoria, descricao, conteudo, lastupdate, versao, tenant, assunto, codigo, empresa, remetente)
            VALUES('0b76bbf2-f248-4140-893d-0834c9b64c54'::uuid, NULL, 'E-mail enviado ao atendente quando atribuído a um chamado', '<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
            <head>
            <meta charset="utf-8">
            <title>Re: #{{protocolo}} - {{resumo}}</title>
            <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
            </head>
            <body>
            <table cellpadding="0" cellspacing="0" border="0" align="center" width="600" style="border-top:3px solid #2b6584; font-family:Arial, Helvetica, sans-serif; color:#555555;">
                <tbody>
                    <tr>
                        <td style="padding-top:10px;">
                            <img src="http://s3-us-west-2.amazonaws.com/static.nasajon/img/logo.png" />
                        </td>
                    </tr>
                <tr>
                        <td style="padding-top:15px;">
                                <p style="display:block; width:100%; background-color:#f3e9e9; color:#a94442; border:1px solid #ebccd1; font-size:16px; font-weight:bold; padding:15px;">
                                        <img src="https://s3-us-west-2.amazonaws.com/static.nasajon/img/atendimento/ico-troca-atribuicao.png" alt="Troca de Atribuição!" style="display:inline-block; margin-right:5px;">
                                O chamado abaixo foi atribuído a você.
                                </p>
                    </td>
                </tr>
                    <tr>
                        <td>
                            <h1 style="font-size:20px; margin:8px 0 20px 0; font-family:''Lato'', Arial, Helvetica, sans-serif;">
                                <a href="{{ main_url ~ ''#/chamados/''~ atendimento.atendimento}}" title="#{{protocolo}} - {{resumo}}" style="color:#2b6584; text-decoration:none;">#{{protocolo}} - {{resumo}}</a>
                            </h1>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            {% for item in atendimento.followups %}
                                <table cellpadding="0" cellspacing="0" border="0" align="center" width="100%" style="padding-left:8px; border-left:1px solid #ccc;">
                                    <tr>
                                        <td><strong style="font-size:12px;">{{ item.created_by.nome }} -</strong> <span style="font-size:12px; color:#949494;">{{ item.created_at | date("d/m/Y") }} às {{ item.created_at | date("H:i") }}</span></td>
                                    </tr>
                                    <tr>
                                        <td style="padding-bottom:20px;">
                                            <p style="font-size:12px; line-height:16px; margin:5px 0;">{{ item.historico|raw }}</p>

                                            {% if item.anexos|length > 0 %}
                                                <strong style="font-size:11px; line-height:16px;">ANEXOS:</strong><br />
                                                <ul style="padding:0; margin:0; list-style:none;">
                                                    {% for anexo in item.anexos %}
                                                        <li><a href="{{anexo.url}}" style="text-decoration:none; color:#428bca;">{{anexo.nome}}</a></li>
                                                    {% endfor %}
                                                </ul>
                                            {% endif %}

                            {% if (item.url_avaliacao is defined) %}
                                <p style="font-size:12px">
                                <a style="text-decoration:none;color:#2b6584;" href="{{ item.url_avaliacao }}" target="_blank"><img src="https://s3-us-west-2.amazonaws.com/static.nasajon/img/atendimento/ico-thumbs-up.gif"> Avalie essa resposta</a>
                                </p>
                            {% endif %}

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                        {% endfor %}
                                        {% for item in atendimento.followups  %}
                                        </td>
                                    </tr>
                                </table>
                            {% endfor %}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <table cellpadding="0" cellspacing="0" border="0" align="center" width="100%" style="margin-top:30px; padding:15px; border:1px solid #ccc;">
                                <tr>
                                    <td>
                                        <h2 style="font-size:16px; margin:0 0 20px 0; font-family:''Lato'', Arial, Helvetica, sans-serif; color:#2b6584;">Detalhes do Atendimento</h2>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <table cellpadding="3" cellspacing="0" border="0" align="center" width="100%">
                                            <tr>
                                                <td style="text-align:right; padding-right:10px;" width="100" valign="top"><strong style="font-size:11px; line-height:18px;">CRIADO EM</strong></td>
                                                <td style="font-size:14px; line-height:18px;" valign="top">{{ atendimento.created_at | date("d/m/Y") }}</td>
                                            </tr>
                                            <tr>
                                                <td style="text-align:right; padding-right:10px;" width="100" valign="top"><strong style="font-size:11px; line-height:18px;">DESCRIÇÃO</strong></td>
                                                <td style="font-size:14px; line-height:18px;">
                                                    <p style="margin:0;" valign="top">{{ atendimento.sintoma|raw }}</p>
                                                </td>
                                            </tr>
                                            {% if atendimento.anexos|length > 0 %}
                                                <tr>
                                                    <td style="text-align:right; padding-right:10px;" width="100" valign="top"><strong style="font-size:11px; line-height:18px;">ANEXOS</strong></td>
                                                    <td style="font-size:14px; line-height:18px;" valign="top">
                                                        <ul style="padding:0; margin:0; list-style:none;">
                                                            {% for anexo in atendimento.anexos %}
                                                            <li><a href="{{anexo.url}}" style="text-decoration:none; color:#428bca;">{{anexo.nome}}</a></li>
                                                            {% endfor %}
                                                        </ul>
                                                    </td>
                                                </tr>
                                            {% endif %}
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align:center">
                            <p style="font-size:11px; margin:20px 0 5px;">Responda o e-mail para adicionar uma resposta • <a href="{{ main_url ~ ''#/chamados/''~ atendimento.atendimento}}" style="text-decoration:none; color:#428bca;">Visualizar no Sistema de Atendimentos</a></p>
                            <p style="font-size:11px; margin:0 0 8px;">Desenvolvido por <a href="http://www.nasajon.com.br" style="text-decoration:none; color:#428bca;">Nasajon Sistemas</a></p>
                        </td>
                    </tr>
                </tbody>
            </table>
            </body>
            </html>', '2017-05-17 19:05:55.807', 1, NULL, 'Re: #{{protocolo}} - {{resumo}}', 'atendimento_admin_atribuido', NULL, NULL);
            INSERT INTO email.templates
            ("template", categoria, descricao, conteudo, lastupdate, versao, tenant, assunto, codigo, empresa, remetente)
            VALUES('29e51144-2c36-43f1-af3c-b7d6285f6b11'::uuid, NULL, 'Mensagem usuário - O que é um ERP - Conteúdos gratuitos', '<div class="aOT" data-type="m" style="padding: 1px 0px; position: relative; color: rgb(0, 0, 0); font-family: arial, sans-serif; font-size: 12.8px;">&nbsp;</div>

            <div class="aOT" data-type="m" id=":zt" style="padding: 1px 0px; position: relative; color: rgb(0, 0, 0); font-family: arial, sans-serif; font-size: 12.8px;"><span style="font-family:verdana,geneva,sans-serif;">Ol&aacute;!</span></div>

            <div class="aOT" data-type="m" style="padding: 1px 0px; position: relative; color: rgb(0, 0, 0); font-family: arial, sans-serif; font-size: 12.8px;">&nbsp;</div>

            <div class="aOT" data-type="m" style="padding: 1px 0px; position: relative; color: rgb(0, 0, 0); font-family: arial, sans-serif; font-size: 12.8px;"><span style="font-family:verdana,geneva,sans-serif;">Agradecemos a sua inscri&ccedil;&atilde;o na p&aacute;gina &quot;O que &eacute; um ERP&quot;! </span></div>

            <div class="aOT" data-type="m" style="padding: 1px 0px; position: relative; color: rgb(0, 0, 0); font-family: arial, sans-serif; font-size: 12.8px;">&nbsp;</div>

            <div class="aOT" data-type="m" style="padding: 1px 0px; position: relative; color: rgb(0, 0, 0); font-family: arial, sans-serif; font-size: 12.8px;"><span style="font-family:verdana,geneva,sans-serif;">A partir de agora, voc&ecirc; ir&aacute; receber conte&uacute;dos completos sobre o software ERP.</span></div>

            <div class="aOT" data-type="m" style="padding: 1px 0px; position: relative; color: rgb(0, 0, 0); font-family: arial, sans-serif; font-size: 12.8px;">&nbsp;</div>

            <div class="aOT" data-type="m" id=":zs" style="padding: 1px 0px; position: relative; color: rgb(0, 0, 0); font-family: arial, sans-serif; font-size: 12.8px;"><span style="font-family:verdana,geneva,sans-serif;">Aproveite para conhecer o&nbsp;ERP Nasajon, &eacute; s&oacute; clicar <a href="https://www.nasajon.com.br/erp/">aqui</a>.</span></div>

            <div class="aOT" data-type="m" style="padding: 1px 0px; position: relative; color: rgb(0, 0, 0); font-family: arial, sans-serif; font-size: 12.8px;">&nbsp;</div>

            <div class="aOT" data-type="m" id=":zr" style="padding: 1px 0px; position: relative; color: rgb(0, 0, 0); font-family: arial, sans-serif; font-size: 12.8px;"><span style="font-family:verdana,geneva,sans-serif;">At&eacute; mais!<br />
            Equipe Nasajon</span></div>', NULL, NULL, 10058, '[O que é um ERP?] Inscrição realizada com sucesso!', NULL, NULL, NULL);
            INSERT INTO email.templates
            ("template", categoria, descricao, conteudo, lastupdate, versao, tenant, assunto, codigo, empresa, remetente)
            VALUES('4bbbfde6-00c4-4359-8ad9-ab12d3558334'::uuid, NULL, 'RS Contato interessado: Solicitação de proposta - O que é um ERP?', '<p>Aten&ccedil;&atilde;o, equipe! O contato abaixo preencheu o formul&aacute;rio&nbsp;<strong>Solicite sua proposta - &quot;O que &eacute; um ERP?&quot; </strong>via p&aacute;gina<strong> <a href="http://nasajon.com.br/erp">ERP</a> &gt; <a href="https://lp.nasajon.com.br/o-que-e-um-erp/">O que &eacute; um ERP?</a></strong></p>

            <p>Nome: {{nome}}<br />
            Email: {{email}}<br />
            Telefone: {{telefone}}<br />
            Estado: {{estado}}<br />
            Mensagem: {{mensagem}}</p>', NULL, NULL, 10058, '[MD] Contato interessado: Solicitação de proposta - O que é um ERP?', NULL, NULL, NULL);
            INSERT INTO email.templates
            ("template", categoria, descricao, conteudo, lastupdate, versao, tenant, assunto, codigo, empresa, remetente)
            VALUES('50657ee1-24ca-4465-9400-f2e849b47ce9'::uuid, NULL, 'CRMWeb - Documentos do atendimento', '<!DOCTYPE html>
                            <html lang="en">
                                <head>
                                    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
                                    <meta http-equiv="X-UA-Compatible" content="IE=edge">
                                    <meta name="viewport" content="width=device-width, initial-scale=1">
                                    <meta name="msapplication-config" content="none" />
                                    <title>Atendimento Comercial Web - Nasajon Sistemas</title>
                                </head>
                                <body style="background-color: #FAFAFA;">
                                        {{corpoMensagem}}
                                </body>

                            </html>', '2021-05-05 13:47:45.243', 1, 10656, '[Atendimento Comercial] - Documentos do atendimento {{assunto_custom}}', 'crmweb_documentos_email', NULL, '333486a9-8eba-436e-b0d7-42e2c54e5843'::uuid);
            INSERT INTO email.templates
            ("template", categoria, descricao, conteudo, lastupdate, versao, tenant, assunto, codigo, empresa, remetente)
            VALUES('30cdf6f8-8f61-4e53-9b34-803288062c20'::uuid, NULL, 'E-mail enviado ao atendente observador de fila após o cliente criar um chamado', '<!DOCTYPE html PUBLIC "-//W4C//DTD HTML 4.0 Transitional//EN" "http://www.w3.org/TR/REC-html40/loose.dtd">
            <html lang="en" xmlns="http://www.w3.org/1999/xhtml">

                <head>
                    <meta charset="utf-8"> <title>#{{protocolo}}-{{resumo}}</title>
                    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
                </head>

                <body>
                    <table cellpadding="0" cellspacing="0" border="0" align="center" width="600" style="border-top:3px solid #00459B; font-family:Arial, Helvetica, sans-serif; color:#555555;">
                        <tbody>
                            <tr> <td style="padding-top:10px;"> <img src="https://s3-us-west-2.amazonaws.com/static.nasajon/img/logo.png"/> </td></tr>
                            <tr>
                                <td>
                                    <h1 style="font-size:20px; margin:8px 0 20px 0; font-family:Lato, Arial, Helvetica, sans-serif;">
                                        <a href="https://atendimento.nasajon.com.br/{{tenantCodigo}}/admin/chamados/{{atendimento.atendimento}}" title="#{{protocolo}}-{{resumo}}" style="color:#00459B; text-decoration:none;">
                                            #{{protocolo}}-{{resumo}}
                                        </a>
                                    </h1>
                                </td>
                            </tr>
                            <tr> <td style="padding-top:10px;"> <img src="https://19999098.fs1.hubspotusercontent-na1.net/hubfs/19999098/Ativos%20-%20Email/Observador%20de%20Fila.png"/> </td></tr>

                            {% for historico in atendimento.historico %}
                            {% if historico["tipo"]==1 %}

                            <tr>
                                <td>
                                    <table cellpadding="0" cellspacing="0" border="0" align="center" width="100%" style="border-bottom:1px solid #ccc; padding:0 10px;">
                                        <tr>
                                            <td style="padding-top:10px;">
                                                <strong style="font-size:14px;"> <img src="https://s3-us-west-2.amazonaws.com/static.nasajon/img/atendimento/ico-resposta-recebida.gif" style="border:none; margin:0; vertical-align:middle"/>{{historico["created_by"]["nome"]}}({{historico["created_by"]["email"]}}) </strong>
                                                <span style="font-size:12px; color:#949494;">em {{historico["created_at"]|date("d/m/Y")}} às {{historico["created_at"]|date("H:i")}}:</span>
                                            </td>
                                        </tr>
                                        <tr> <td style="padding-bottom:20px;">{{historico["valornovo"]["sintoma"]|raw}}</td></tr>
                                    </table>
                                </td>
                            </tr>

                            {% elseif historico["tipo"]==2 %}

                            <tr>
                                <td style="padding:20px 0; border-bottom:1px solid #ccc; font-size:11px; color:#828282;">
                                    <strong>{{historico["created_by"]["nome"]}}({{historico["created_by"]["email"]}})</strong> em {{historico["created_at"]|date("d/m/Y")}} às {{historico["created_at"]|date("H:i")}}: <br/> <strong>Email do contato: </strong>{{historico.valorantigo ? historico.valorantigo : "(Vazio)"}} → {{historico.valornovo ? historico.valornovo : "(Vazio)"}}
                                </td>
                            </tr>

                            {% elseif historico["tipo"]==3 %}

                            <tr>
                                <td style="padding:20px 0; border-bottom:1px solid #ccc; font-size:11px; color:#828282;">
                                    <strong>{{historico["created_by"]["nome"]}}({{historico["created_by"]["email"]}})</strong> em {{historico["created_at"]|date("d/m/Y")}} às {{historico["created_at"]|date("H:i")}}: <br/> <strong>Situação: </strong>{{["Aberto", "Fechado"][historico.valorantigo.situacao]}} → {{["Aberto", "Fechado"][historico.valornovo.situacao]}}
                                </td>
                            </tr>

                            {% elseif historico["tipo"]==4 %}

                            <tr>
                                <td style="padding:20px 0; border-bottom:1px solid #ccc; font-size:11px; color:#828282;">
                                    <strong>{{historico["created_by"]["nome"]}}({{historico["created_by"]["email"]}})</strong> em {{historico["created_at"]|date("d/m/Y")}} às {{historico["created_at"]|date("H:i")}}: <br/> <strong>Atribuição: </strong>{{historico.valorantigo.nome ? historico.valorantigo.nome : "(Vazio)"}}→{{historico.valornovo.nome ? historico.valornovo.nome : "(Vazio)"}}
                                </td>
                            </tr>

                            {% elseif historico["tipo"]==5 %}

                            <tr>
                                <td style="padding:20px 0; border-bottom:1px solid #ccc; font-size:11px; color:#828282;">
                                    <strong>{{historico["created_by"]["nome"]}}({{historico["created_by"]["email"]}})</strong> em {{historico["created_at"]|date("d/m/Y")}} às {{historico["created_at"]|date("H:i")}}:{% for campo in historico.valornovo %}{% if campo["valor_antigo"] is not same as(campo["valor_novo"]) %}<br/> <strong>{{campo["label"]}}:</strong>{{campo["valor_antigo"]}} → {{campo["valor_novo"]}}{% endif %}{% endfor %}
                                </td>
                            </tr>

                            {% elseif historico["tipo"]==6 %}

                            {% if historico["valornovo"]["followup"]["tipo"] == 0 %}

                            <tr>
                                <td>
                                    <table cellpadding="0" cellspacing="0" border="0" align="center" width="100%" style="background:#f7f7f7; border-bottom:1px solid #ccc; padding:0 10px;">
                                        <tr>
                                            <td style="padding-top:10px;">
                                                <strong style="font-size:14px;"><img src="https://s3-us-west-2.amazonaws.com/static.nasajon/img/atendimento/ico-msg-enviada.gif" style="border:none; margin:0; vertical-align:middle"/>{{historico["created_by"]["nome"]}}({{historico["created_by"]["email"]}}) </strong>
                                                <span style="font-size:12px; color:#949494;"> em {{historico["created_at"]|date("d/m/Y")}} às {{historico["created_at"]|date("H:i")}}:</span>
                                            </td>
                                        </tr>
                                        <tr> <td style="padding-bottom:20px;">{{ historico["valornovo"]["followup"]["historico"]|raw }}</td></tr>
                                    </table>
                                </td>
                            </tr>

                            {% elseif historico["valornovo"]["followup"]["tipo"] == 1 %}

                            <tr>
                                <td>
                                    <table cellpadding="0" cellspacing="0" border="0" align="center" width="100%" style="background:#fffdef; border-bottom:1px solid #ccc; padding:0 10px;">
                                        <tr>
                                            <td style="padding-top:10px;">
                                                <strong style="font-size:14px;"> <img src="https://s3-us-west-2.amazonaws.com/static.nasajon/img/atendimento/ico-comentario.gif" style="border:none; margin:0; vertical-align:middle"/>{{historico["created_by"]["nome"]}}({{historico["created_by"]["email"]}}) </strong>
                                                <span style="font-size:12px; color:#949494;"> em {{historico["created_at"]|date("d/m/Y")}} às {{historico["created_at"]|date("H:i")}}:</span>
                                            </td>
                                        </tr>
                                        <tr> <td style="padding-bottom:20px;">{{ historico["valornovo"]["followup"]["historico"]|raw}}</td></tr>
                                    </table>
                                </td>
                            </tr>

                            {% endif %}

                            {% elseif historico["tipo"]==7 %}

                            <tr>
                                <td style="padding:20px 0; border-bottom:1px solid #ccc; font-size:11px; color:#828282;">
                                    <strong>{{historico["created_by"]["nome"]}}({{historico["created_by"]["email"]}})</strong> em {{historico["created_at"]|date("d/m/Y")}} às {{historico["created_at"]|date("H:i")}}: <br/> <strong>Cliente: </strong>{{historico.valorantigo.nome ? historico.valorantigo.nome : "(Vazio)"}} → {{historico.valornovo.nome ? historico.valornovo.nome : "(Vazio)"}}
                                </td>
                            </tr>

                            {% endif %}

                            {% endfor %}

                            <tr>
                                <td>
                                    <table cellpadding="0" cellspacing="0" border="0" align="center" width="100%" style="margin-top:30px; padding:15px; border:1px solid #ccc;">
                                        <tr>
                                            <td>
                                                <h2 style="font-size:16px; margin:0 0 20px 0; font-family:Lato, Arial, Helvetica, sans-serif; color:#00459B;">
                                                    Detalhes do Atendimento
                                                </h2>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <table cellpadding="3" cellspacing="0" border="0" align="center" width="100%">

                                                    <tr>
                                                        <td>
                                                            <table cellpadding="3" cellspacing="0" border="0" align="center" width="100%">
                                                                <tr>
                                                                    <td style="text-align:right; padding-right:10px;" width="120" valign="top"><strong style="font-size:11px; line-height:18px;">ATRIBUÍDO A</strong></td>
                                                                    <td style="font-size:14px; line-height:18px;" valign="top">{{atendimento.atribuido_a.label}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td style="text-align:right; padding-right:10px;" width="120" valign="top"><strong style="font-size:11px; line-height:18px;">CRIADO EM</strong></td>
                                                                    <td style="font-size:14px; line-height:18px;" valign="top">{{atendimento.created_at|date("d/m/Y")}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td style="text-align:right; padding-right:10px;" width="120" valign="top"><strong style="font-size:11px; line-height:18px;">CRIADO POR</strong></td>
                                                                    <td style="font-size:14px; line-height:18px;" valign="top">{{atendimento.created_by.nome}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td style="text-align:right; padding-right:10px;" width="120" valign="top"><strong style="font-size:11px; line-height:18px;">E-MAIL DO CONTATO</strong></td>
                                                                    <td style="font-size:14px; line-height:18px;" valign="top">{{atendimento.email}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td style="text-align:right; padding-right:10px;" width="120" valign="top"><strong style="font-size:11px; line-height:18px;">ASSUNTO</strong></td>
                                                                    <td style="font-size:14px; line-height:18px;">{{atendimento.resumo|raw}}</td>
                                                                </tr>

                                                                {% if atendimento.anexos|length > 0 %}

                                                                <tr>
                                                                    <td style="text-align:right; padding-right:10px;" width="100" valign="top"><strong style="font-size:11px; line-height:18px;">ANEXOS</strong></td>
                                                                    <td style="font-size:14px; line-height:18px;" valign="top">
                                                                        <ul style="padding:0; margin:0; list-style:none;">

                                                                            {% for anexo in atendimento.anexos %}
                                                                            <li>
                                                                                <a href="{{anexo.url}}" style="text-decoration:none; color:#428bca;">{{anexo.nome}}</a>
                                                                            </li>
                                                                            {% endfor %}

                                                                        </ul>
                                                                    </td>
                                                                </tr>

                                                                {% endif %}

                                                            </table>
                                                        </td>
                                                    </tr>
                                                    {% if atendimento.cliente is not null %}
                                                    <tr>
                                                        <td>
                                                            <h3 style="font-size:16px; margin:15px 0; font-family:Lato, Arial, Helvetica, sans-serif; color:#3c3c3c; font-weight:normal;">Detalhes do Cliente</h3>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <table cellpadding="3" cellspacing="0" border="0" align="center" width="100%">
                                                                <tr>
                                                                    <td style="text-align:right; padding-right:10px;" width="120" valign="top"><strong style="font-size:11px; line-height:18px;">CÓDIGO</strong></td>
                                                                    <td style="font-size:14px; line-height:18px;" valign="top">{{atendimento.cliente["codigo"]}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td style="text-align:right; padding-right:10px;" width="120" valign="top"><strong style="font-size:11px; line-height:18px;">NOME</strong></td>
                                                                    <td style="font-size:14px; line-height:18px;" valign="top">{{atendimento.cliente["nome"]}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td style="text-align:right; padding-right:10px;" width="120" valign="top"><strong style="font-size:11px; line-height:18px;">NOME FANTASIA</strong></td>
                                                                    <td style="font-size:14px; line-height:18px;" valign="top">{{atendimento.cliente["nomefantasia"]}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td style="text-align:right; padding-right:10px;" width="120" valign="top"><strong style="font-size:11px; line-height:18px;">CNPJ/CPF</strong></td>
                                                                    <td style="font-size:14px; line-height:18px;" valign="top">{{atendimento.cliente["cnpj"] ? atendimento.cliente["cnpj"] : atendimento.cliente["cpf"]}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td style="text-align:right; padding-right:10px;" width="120" valign="top"><strong style="font-size:11px; line-height:18px;">CLIENTE DESDE</strong></td>
                                                                    <td style="font-size:14px; line-height:18px;" valign="top">
                                                                        {{atendimento.cliente["datacliente"]}}
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td style="text-align:right; padding-right:10px;" width="120" valign="top"><strong style="font-size:11px; line-height:18px;">VENDEDOR</strong></td>
                                                                    <td style="font-size:14px; line-height:18px;" valign="top">
                                                                        {{atendimento.cliente["vendedor"] ? atendimento.cliente["vendedor"]["nome"] : "Não informado"}}
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td style="text-align:right; padding-right:10px;" width="120" valign="top"><strong style="font-size:11px; line-height:18px;">REPRESENTANTE</strong></td>
                                                                    <td style="font-size:14px; line-height:18px;" valign="top">
                                                                        {{atendimento.cliente["representante"] ? atendimento.cliente["representante"]["nome"] : "Não informado"}}
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td style="text-align:right; padding-right:10px;" width="120" valign="top"><strong style="font-size:11px; line-height:18px;">REPRES. TÉCNICO</strong></td>
                                                                    <td style="font-size:14px; line-height:18px;" valign="top">
                                                                        {{atendimento.cliente["representante_tecnico"] ? atendimento.cliente["representante_tecnico"]["nome"] : "Não informado"}}
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td style="text-align:right; padding-right:10px;" width="120" valign="top"><strong style="font-size:11px; line-height:18px;">BLOQUEADO</strong></td>
                                                                    <td style="font-size:14px; line-height:18px;" valign="top">
                                                                        {{atendimento.cliente["bloqueado"] ? "Sim" : "Não"}}
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                    {% if atendimento.cliente.flags|length > 0 %}
                                                    <tr>
                                                        <td>
                                                            <table cellpadding="3" cellspacing="0" border="0" align="center" width="100%" style="border-top:1px solid #e7e7e7; margin-top:15px;">
                                                                {% for flag in atendimento.cliente.flags %}
                                                                {% if loop.index % 2 !=0 %}
                                                                <tr>
                                                                    {% endif %}
                                                                    <td style="padding:15px 7px 0 0; font-size:11px;" width="50%">
                                                                        <span style="width: 18px; height: 34px; margin-right: 10px; position: relative; display: inline-block; float: left; background:#{{flag["corfundo"]}};">
                                                                            <span style="display: block; border: 9px solid transparent; border-bottom-color: #FFF; position: absolute; bottom: 0;"></span>
                                                                        </span>
                                                                        <span style="float:left;">
                                                                            <strong style="font-size:14px;">{{flag["titulo"]}}</strong> <br/>
                                                                            {{flag["descricao"]}}
                                                                        </span>
                                                                    </td>
                                                                    {% if loop.index0 % 2 !=0 %}
                                                                </tr>
                                                                {% endif %}
                                                                {% endfor %}
                                                            </table>
                                                        </td>
                                                    </tr>
                                                    {% endif %}
                                                    {% endif %}
                                                </table>
                                            </td>
                                        </tr>

                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align:center">
                                    <p style="font-size:11px; margin:20px 0 5px;">
                                        <a href="https://atendimento.nasajon.com.br/{{tenantCodigo}}/admin/chamados/{{atendimento.atendimento}}" style="text-decoration:none; color:#428bca;">Visualizar no Sistema de Atendimentos</a>
                                    </p>
                                    <p style="font-size:11px; margin:0 0 8px;">Desenvolvido por
                                        <a href="http://www.nasajon.com.br" style="text-decoration:none; color:#428bca;">Nasajon</a>
                                    </p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </body>
            </html>', NULL, 1, 47, '#{{protocolo}} - {{resumo}}', 'atendimento_cliente_novo_observador_fila', NULL, NULL);
            INSERT INTO email.templates
            ("template", categoria, descricao, conteudo, lastupdate, versao, tenant, assunto, codigo, empresa, remetente)
            VALUES('89473fa4-8de9-4efd-86f6-f08b75f38673'::uuid, NULL, 'Mensagem usuário - Newsletter', '<p><span style="font-family:verdana,geneva,sans-serif;">Ol&aacute;!</span></p>

            <p><span style="font-family:verdana,geneva,sans-serif;">Agradecemos o seu interesse na nossa Newsletter!&nbsp;</span><span style="color: rgb(34, 34, 34); font-family: arial, sans-serif; font-size: 17.6px;">✉&nbsp;</span></p>

            <p><span style="font-family:verdana,geneva,sans-serif;">A sua inscri&ccedil;&atilde;o foi realizada com sucesso e voc&ecirc; j&aacute; receber&aacute; a pr&oacute;xima edi&ccedil;&atilde;o ;)&nbsp;</span></p>

            <p><span style="font-family:verdana,geneva,sans-serif;">Enquanto isso, que tal dar uma olhada nos nossos conte&uacute;dos gratuitos? Temos eBooks, Planilhas, Infogr&aacute;ficos e mais! Para acessar, <a href="https://www.nasajon.com.br/materiais-gratuitos/">clique aqui</a>.<br />
            <br />
            Um abra&ccedil;o!<br />
            Equipe Nasajon</span></p>', NULL, NULL, 10058, 'A sua inscrição na Newsletter Nasajon foi realizada com sucesso!', NULL, NULL, NULL);
            INSERT INTO email.templates
            ("template", categoria, descricao, conteudo, lastupdate, versao, tenant, assunto, codigo, empresa, remetente)
            VALUES('26d17dee-6fb7-46fe-82f1-c3d977408430'::uuid, NULL, 'Falecon: Contábil (Soluções Contábeis)', '<div class="gmail_default" style="color: rgb(33, 33, 33); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px;"><span style="font-family: verdana, geneva, sans-serif;">Aten&ccedil;&atilde;o, equipe! O contato abaixo deseja receber uma demonstra&ccedil;&atilde;o gr&aacute;tis do&nbsp;<strong>Cont&aacute;bil&nbsp;</strong>via Falecon:</span></div>

            <div class="gmail_default" style="color: rgb(33, 33, 33); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px;">&nbsp;</div>

            <div class="gmail_default" style="color: rgb(33, 33, 33); font-size: 13.2px; line-height: 19.8px;"><font face="verdana, geneva, sans-serif">Nome: {{nome}}</font></div>

            <div class="gmail_default" style="color: rgb(33, 33, 33); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px;"><span style="font-family: verdana, geneva, sans-serif;">Email:&nbsp;<span style="font-size: 13.2px; line-height: 19.8px;">{{email}}</span></span></div>

            <div class="gmail_default" style="color: rgb(33, 33, 33); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px;"><span style="font-family: verdana, geneva, sans-serif;">Telefone:&nbsp;<span style="font-size: 13.2px; line-height: 19.8px;">{{telefone}}</span></span></div>

            <div class="gmail_default" style="color: rgb(33, 33, 33); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px;"><span style="font-family: verdana, geneva, sans-serif;">Estado:&nbsp;<span style="font-size: 13.2px; line-height: 19.8px;">{{estado}}</span></span></div>

            <div class="gmail_default" style="color: rgb(33, 33, 33); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px;"><span style="font-family: verdana, geneva, sans-serif;">Munic&iacute;pio:&nbsp;<span style="font-size: 13.2px; line-height: 19.8px;">{{cidade}}</span></span></div>

            <div class="gmail_default" style="color: rgb(33, 33, 33); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px;"><span style="font-family: verdana, geneva, sans-serif;">Mensagem:&nbsp;<span style="font-size: 13.2px; line-height: 19.8px;">{{mensagem}}</span></span></div>

            <div class="gmail_default" style="color: rgb(33, 33, 33); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px;"><span style="font-family:verdana,geneva,sans-serif;">&Eacute; cliente Nasajon: {{cliente}}<br />
            Origem: {{origem}}<br />
            M&iacute;dia: {{midia}}<br />
            Campanha: {{campanha}}</span></div>', NULL, NULL, 10058, 'Falecon: Contábil', NULL, NULL, NULL);
            INSERT INTO email.templates
            ("template", categoria, descricao, conteudo, lastupdate, versao, tenant, assunto, codigo, empresa, remetente)
            VALUES('173e6caa-3cae-4146-9309-2c83ca195b4a'::uuid, NULL, 'Novo Contato: HSM - {{sistema}} Optimizepress', '<p>Aten&ccedil;&atilde;o, equipe! O contato abaixo preencheu o formul&aacute;rio da HSM&nbsp;{{sistema}}.<br />
            N&atilde;o se esque&ccedil;am de cadastrar a m&iacute;dia de origem no ERP!&nbsp;</p>

            <p>Nome: {{nome}}<br />
            Email: {{email}}<br />
            Telefone: {{telefone}}<br />
            Estado: {{estado}}​<br />
            Mensagem: {{mensagem}}<br />
            Cliente Nasajon: {{clientenasajon}}<br />
            Empresa: {{empresa}}<br />
            ​<br />
            &nbsp;<br />
            Lembrando que o prazo ideal para primeiro contato com o lead s&atilde;o 24 horas.<br />
            Juntos podemos fazer muito!</p>', NULL, NULL, 10058, 'Novo Contato: HSM - {{sistema}} Optimizepress', NULL, NULL, NULL);
            INSERT INTO email.templates
            ("template", categoria, descricao, conteudo, lastupdate, versao, tenant, assunto, codigo, empresa, remetente)
            VALUES('2c78ca61-723e-4a8d-8063-988103a24db5'::uuid, NULL, 'Diagnóstico Imersão eSocial', '<p>Gente,&nbsp;</p>

            <p>O contato abaixo acabou de realizar o Diagn&oacute;stico Imers&atilde;o eSocial:</p>

            <p><font color="#263238" face="arial, sans-serif"><span style="line-height: 16px;">{{mensagem}}</span></font></p>', NULL, NULL, 10058, 'Novo contato: Diagnóstico Imersão eSocial', NULL, NULL, NULL);
            INSERT INTO email.templates
            ("template", categoria, descricao, conteudo, lastupdate, versao, tenant, assunto, codigo, empresa, remetente)
            VALUES('ba65ae0c-4bdf-40c2-89a0-2570dea4c7dc'::uuid, NULL, 'EM Contato interessado: Infográfico 4 Perguntas Fundamentais Sobre o Bloco K', '<p>Gente,&nbsp;</p>

            <p>O contato abaixo realizou o download do&nbsp;Infogr&aacute;fico &quot;<strong>4 Perguntas Fundamentais Sobre o Bloco K&quot;</strong>&nbsp;via <strong>Email mkt</strong>:</p>

            <p>Nome: {{nome}}<br />
            Email: {{email}}<br />
            Telefone: {{telefone}}<br />
            Empresa: {{empresa}}</p>', NULL, NULL, 10058, 'EM Contato interessado: Infográfico 4 Perguntas Fundamentais Sobre o Bloco K', NULL, NULL, NULL);
            INSERT INTO email.templates
            ("template", categoria, descricao, conteudo, lastupdate, versao, tenant, assunto, codigo, empresa, remetente)
            VALUES('592063c1-d52a-4a4d-adb1-553905fff59d'::uuid, NULL, 'Confirmação de Cadastro Estudante', '<div contenteditable="true" class="cke_editable cke_editable_inline cke_contents_ltr cke_show_borders cke_focus" tabindex="0" spellcheck="false" role="textbox" aria-label="Editor de Rich Text, editor1" title="Editor de Rich Text, editor1" aria-describedby="cke_49" style="position: relative;"><table align="center" width="650" cellspacing="0" cellpadding="0" border="0" style="color: rgb(34, 34, 34); font-family: arial, sans-serif; font-size: 12.8000001907349px; background-color: rgb(255, 255, 255);" class=" cke_show_border"><tbody><tr><td style="margin: 0px;"><p style="font-family: ''Times New Roman'', serif; font-size: 28px; color: rgb(51, 51, 51); letter-spacing: -1px;"><font color="#000000" face="Times New Roman" size="3"><span style="letter-spacing: normal;"><img data-cke-saved-src="http://www.nasajon.com.br/images/logo-nova.png" src="http://www.nasajon.com.br/images/logo-nova.png" alt="Logotipo - Nasajon sistemas"></span></font></p><p style="font-family: ''Times New Roman'', serif; font-size: 28px; color: rgb(51, 51, 51); letter-spacing: -1px;"><font color="#000000" face="Times New Roman" size="3"><span style="letter-spacing: normal;">Olá,&nbsp;{{estudante}}!</span></font></p><p style="font-family: ''Times New Roman'', serif; font-size: 28px; color: rgb(51, 51, 51); letter-spacing: -1px;"><font color="#000000" face="Times New Roman" size="3"><span style="letter-spacing: normal;">Recebemos seu cadastro de estudante em nosso site.</span></font></p><p style="font-family: ''Times New Roman'', serif; font-size: 28px; color: rgb(51, 51, 51); letter-spacing: -1px;"><font color="#000000" face="Times New Roman" size="3"><span style="letter-spacing: normal;">Clique no link abaixo para validar seu cadastro, e ter acesso ao nosso sistema para enviar um currículo ou escolher um de <a data-cke-saved-href="http://www.nasajonestudante.com.br" href="http://www.nasajonestudante.com.br">nossos sistemas</a>&nbsp;para fazer download<br></span></font></p><p style="color: rgb(51, 51, 51); letter-spacing: -1px;"><font face="arial, helvetica, sans-serif"><span style="font-size: 14px;">{{link}}</span></font></p><p style="font-family: ''Times New Roman'', serif; font-size: 18px; color: rgb(51, 51, 51); letter-spacing: -1px;"><font color="#000000" face="Times New Roman" size="3"><span style="letter-spacing: normal;">Atenciosamente,<br>Equipe&nbsp;<a data-cke-saved-href="http://www.nasajon.com.br/" href="http://www.nasajon.com.br/" title="Acesse nosso site" target="_blank">Nasajon</a></span></font></p></td></tr></tbody></table></div>', NULL, NULL, 47, 'Cadastro de Estudante - [nasajonestudante.com.br]', 'cadEstudante', NULL, NULL);
            INSERT INTO email.templates
            ("template", categoria, descricao, conteudo, lastupdate, versao, tenant, assunto, codigo, empresa, remetente)
            VALUES('73abeef6-f6a9-4163-a23f-fef8873f49eb'::uuid, NULL, 'Contato interessado: Aula 2 - DP 5 Estrelas (Sônia real)', '<p style="line-height: 20.8px;">Aten&ccedil;&atilde;o, equipe! O contato abaixo se inscreveu para receber a <strong>Aula 2 -&nbsp;DP 5 Estrelas (S&ocirc;nia real)</strong>:</p>

            <div>&nbsp;</div>

            <div>
            <div class="gmail_default" style="color: rgb(33, 33, 33); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px;"><span style="font-family: verdana, geneva, sans-serif;">Nome: {{nome}}</span></div>

            <div class="gmail_default" style="color: rgb(33, 33, 33); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px;"><span style="font-family: verdana, geneva, sans-serif;">Email:&nbsp;<span style="font-size: 13.2px; line-height: 19.8px;">{{email}}</span></span></div>
            </div>

            <div>&nbsp;</div>', NULL, NULL, 10058, 'Contato interessado: Aula 2 - DP 5 Estrelas (Sônia real)', NULL, NULL, NULL);
            INSERT INTO email.templates
            ("template", categoria, descricao, conteudo, lastupdate, versao, tenant, assunto, codigo, empresa, remetente)
            VALUES('0e35db94-73d0-4c04-8bb2-fa545b4c1e8f'::uuid, NULL, 'Contato interessado: Aula 2 - DP 5 Estrelas (Sônia animada)', '<p style="line-height: 20.8px;">Aten&ccedil;&atilde;o, equipe! O contato abaixo se inscreveu para receber a <strong>Aula 2 -&nbsp;DP 5 Estrelas (S&ocirc;nia animada)</strong>:</p>

            <div>&nbsp;</div>

            <div>
            <div class="gmail_default" style="color: rgb(33, 33, 33); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px;"><span style="font-family: verdana, geneva, sans-serif;">Nome: {{nome}}</span></div>

            <div class="gmail_default" style="color: rgb(33, 33, 33); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px;"><span style="font-family: verdana, geneva, sans-serif;">Email:&nbsp;<span style="font-size: 13.2px; line-height: 19.8px;">{{email}}</span></span></div>
            </div>', NULL, NULL, 10058, 'Contato interessado: Aula 2 - DP 5 Estrelas (Sônia animada)', NULL, NULL, NULL);
            INSERT INTO email.templates
            ("template", categoria, descricao, conteudo, lastupdate, versao, tenant, assunto, codigo, empresa, remetente)
            VALUES('66ce25bb-6e24-4028-862f-5321cbe9727b'::uuid, NULL, 'Contato interessado: O que é um ERP?', '<div class="gmail_default" style="color: rgb(33, 33, 33); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px;"><span style="font-family: verdana, geneva, sans-serif;">Aten&ccedil;&atilde;o, equipe! O contato abaixo preencheu o formul&aacute;rio da p&aacute;gina <strong>O que &eacute; um ERP?</strong>:</span></div>

            <div class="gmail_default" style="color: rgb(33, 33, 33); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px;">&nbsp;</div>

            <div class="gmail_default" style="color: rgb(33, 33, 33); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px;">&nbsp;</div>

            <div class="gmail_default" style="color: rgb(33, 33, 33); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px;"><span style="font-family: verdana, geneva, sans-serif;">Nome: {{nome}}</span></div>

            <div class="gmail_default" style="color: rgb(33, 33, 33); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px;"><span style="font-family: verdana, geneva, sans-serif;">Email:&nbsp;<span style="font-size: 13.2px; line-height: 19.8px;">{{email}}</span></span></div>

            <div class="gmail_default" style="color: rgb(33, 33, 33); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px;"><span style="font-family: verdana, geneva, sans-serif;">Telefone:&nbsp;<span style="font-size: 13.2px; line-height: 19.8px;">{{telefone}}</span></span></div>

            <div class="gmail_default" style="color: rgb(33, 33, 33); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px;"><span style="font-family: verdana, geneva, sans-serif;">Estado:&nbsp;<span style="font-size: 13.2px; line-height: 19.8px;">{{estado}}</span></span>​</div>

            <div class="gmail_default" style="color: rgb(33, 33, 33); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px;"><span style="font-family: verdana, geneva, sans-serif;">Mensagem:&nbsp;<span style="font-size: 13.2px; line-height: 19.8px;">{{mensagem}}</span></span></div>

            <div class="gmail_default" style="color: rgb(33, 33, 33); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px;">
            <div class="gmail_default" style="font-size: 13.2px; line-height: 19.8px;"><br />
            <div class="gmail_default" style="font-size: 13.2px; line-height: 19.8px;">&nbsp;</div>
            </div>
            </div>', NULL, NULL, 10058, 'Contato interessado: O que é um ERP?', NULL, NULL, NULL);
            INSERT INTO email.templates
            ("template", categoria, descricao, conteudo, lastupdate, versao, tenant, assunto, codigo, empresa, remetente)
            VALUES('50a597df-a0f9-46fa-9bc9-69e52dd5ce87'::uuid, NULL, 'PF Contato interessado: Solicitação de proposta - O que é um ERP?', '<p>Aten&ccedil;&atilde;o, equipe! O contato abaixo preencheu o formul&aacute;rio&nbsp;<strong>Solicite sua proposta - &quot;O que &eacute; um ERP?&quot; via Painel de fundo</strong></p>

            <p>Nome: {{nome}}<br />
            Email: {{email}}<br />
            Telefone: {{telefone}}<br />
            Estado: {{estado}}<br />
            Mensagem: {{mensagem}}</p>', NULL, NULL, 10058, 'PF Contato interessado: Solicitação de proposta - O que é um ERP?', NULL, NULL, NULL);
            INSERT INTO email.templates
            ("template", categoria, descricao, conteudo, lastupdate, versao, tenant, assunto, codigo, empresa, remetente)
            VALUES('a7de36d7-39cd-477d-88b7-3a413835144a'::uuid, NULL, 'Mensagem 1', '<div contenteditable="true" class="cke_editable cke_editable_inline cke_contents_ltr cke_show_borders" tabindex="0" spellcheck="false" role="textbox" aria-label="Editor de Rich Text, editor1" title="Editor de Rich Text, editor1" aria-describedby="cke_49" style="position: relative;"><p>Campanha marketing</p></div>', NULL, NULL, 49, 'Campanha', NULL, 21, NULL);
            INSERT INTO email.templates
            ("template", categoria, descricao, conteudo, lastupdate, versao, tenant, assunto, codigo, empresa, remetente)
            VALUES('4971056f-d8b3-46d6-9ff7-7f3fce5d447b'::uuid, NULL, 'Contato interessado: Campanha Valores de 2017 Site', '<div class="gmail_default" style="color: rgb(33, 33, 33); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px;"><span style="font-family: verdana, geneva, sans-serif;">Aten&ccedil;&atilde;o, equipe! O contato abaixo preencheu o&nbsp;<strong>formul&aacute;rio&nbsp;da p&aacute;gina da</strong>&nbsp;<strong>Campanha Valores de 2017 via site</strong></span></div>

            <div class="gmail_default" style="color: rgb(33, 33, 33); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px;"><span style="font-family: verdana, geneva, sans-serif;">N&atilde;o se esque&ccedil;am de cadastrar a m&iacute;dia de origem no ERP!&nbsp;</span></div>

            <div class="gmail_default" style="color: rgb(33, 33, 33); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px;">&nbsp;</div>

            <div class="gmail_default" style="color: rgb(33, 33, 33); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px;"><span style="font-family: verdana, geneva, sans-serif;">Nome: {{nome}}</span></div>

            <div class="gmail_default" style="color: rgb(33, 33, 33); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px;"><span style="font-family: verdana, geneva, sans-serif;">Email:&nbsp;<span style="line-height: 19.8px;">{{email}}</span></span></div>

            <div class="gmail_default" style="color: rgb(33, 33, 33); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px;"><span style="font-family: verdana, geneva, sans-serif;">Telefone:&nbsp;<span style="line-height: 19.8px;">{{telefone}}</span></span></div>

            <div class="gmail_default" style="color: rgb(33, 33, 33); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px;"><span style="font-family: verdana, geneva, sans-serif;">Empresa:&nbsp;</span><span style="font-family: verdana, geneva, sans-serif; line-height: 19.8px;">{{empresa}}</span></div>

            <div class="gmail_default" style="color: rgb(33, 33, 33); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px;"><span style="font-family: verdana, geneva, sans-serif;">Estado:&nbsp;<span style="line-height: 19.8px;">{{estado}}</span></span>​</div>

            <div class="gmail_default" style="color: rgb(33, 33, 33); font-size: 13.2px; line-height: 19.8px;"><font face="verdana, geneva, sans-serif">Mensagem: {{mensagem}}</font></div>

            <div class="gmail_default" style="color: rgb(33, 33, 33); font-size: 13.2px; line-height: 19.8px;"><font face="verdana, geneva, sans-serif">&Eacute; cliente Nasajon: {{clientesim}}<br />
            &Eacute; cliente Nasajon: {{clientenao}}</font></div>

            <div class="gmail_default" style="color: rgb(33, 33, 33); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px;">
            <div class="gmail_default" style="line-height: 19.8px;"><span style="font-family: verdana, geneva, sans-serif;"><span style="line-height: 19.8px;"><span style="line-height: 19.8px;">​</span></span></span>

            <div class="gmail_default" style="line-height: 19.8px;"><span style="font-family: verdana, geneva, sans-serif;"><span style="line-height: 19.8px;"><span style="line-height: 19.8px;">&nbsp;</span></span></span></div>

            <div class="gmail_default" style="line-height: 19.8px;"><span style="font-family: verdana, geneva, sans-serif;"><span style="line-height: 19.8px;"><span style="line-height: 19.8px;">Lembrando que o prazo ideal para primeiro contato com o lead s&atilde;o 24 horas.</span></span></span></div>

            <div class="gmail_default" style="line-height: 19.8px;"><span style="font-family: verdana, geneva, sans-serif;"><span style="line-height: 19.8px;"><span style="line-height: 19.8px;">Juntos podemos fazer muito!</span></span></span></div>
            </div>
            </div>', NULL, NULL, 10058, 'Contato interessado: Campanha Valores de 2017 Site', NULL, NULL, NULL);
            INSERT INTO email.templates
            ("template", categoria, descricao, conteudo, lastupdate, versao, tenant, assunto, codigo, empresa, remetente)
            VALUES('39b06d84-c0c5-46ce-97da-d44fb1984ca5'::uuid, NULL, 'Falecon: Atendimento Web', '<div class="gmail_default" style="color: rgb(33, 33, 33); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px;"><span style="font-family: verdana, geneva, sans-serif;">Aten&ccedil;&atilde;o, equipe! O contato abaixo se inscreveu para receber uma demonstra&ccedil;&atilde;o do <strong>Atendimento Web:&nbsp;</strong></span><br />
            &nbsp;</div>

            <div class="gmail_default" style="color: rgb(33, 33, 33); font-size: 13.2px; line-height: 19.8px;"><font face="verdana, geneva, sans-serif">Nome: {{nome}}</font></div>

            <div class="gmail_default" style="color: rgb(33, 33, 33); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px;"><span style="font-family: verdana, geneva, sans-serif;">Email:&nbsp;<span style="font-size: 13.2px; line-height: 19.8px;">{{email}}</span></span></div>

            <div class="gmail_default" style="color: rgb(33, 33, 33); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px;"><span style="font-family: verdana, geneva, sans-serif;">Telefone:&nbsp;<span style="font-size: 13.2px; line-height: 19.8px;">{{telefone}}</span></span></div>

            <div class="gmail_default" style="color: rgb(33, 33, 33); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px;"><span style="font-family: verdana, geneva, sans-serif;">Estado:&nbsp;<span style="font-size: 13.2px; line-height: 19.8px;">{{estado}}</span></span></div>

            <div class="gmail_default" style="color: rgb(33, 33, 33); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px;"><span style="font-family: verdana, geneva, sans-serif;">Munic&iacute;pio:&nbsp;<span style="font-size: 13.2px; line-height: 19.8px;">{{cidade}}</span></span></div>

            <div class="gmail_default" style="color: rgb(33, 33, 33); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px;"><span style="font-family: verdana, geneva, sans-serif;">Mensagem:&nbsp;<span style="font-size: 13.2px; line-height: 19.8px;">{{mensagem}}</span></span></div>

            <div class="gmail_default" style="color: rgb(33, 33, 33); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px;"><span style="color: rgb(33, 33, 33); font-family: verdana, geneva, sans-serif; font-size: 13.2px;">&Eacute; cliente Nasajon: {{cliente}}</span><br style="color: rgb(33, 33, 33); font-family: verdana, geneva, sans-serif; font-size: 13.2px;" />
            <span style="color: rgb(33, 33, 33); font-family: verdana, geneva, sans-serif; font-size: 13.2px;">Origem: {{origem}}</span><br style="color: rgb(33, 33, 33); font-family: verdana, geneva, sans-serif; font-size: 13.2px;" />
            <span style="color: rgb(33, 33, 33); font-family: verdana, geneva, sans-serif; font-size: 13.2px;">M&iacute;dia: {{midia}}</span><br style="color: rgb(33, 33, 33); font-family: verdana, geneva, sans-serif; font-size: 13.2px;" />
            <span style="color: rgb(33, 33, 33); font-family: verdana, geneva, sans-serif; font-size: 13.2px;">Campanha: {{campanha}}</span></div>', NULL, NULL, 10058, 'Falecon: Atendimento Web', NULL, NULL, NULL);
            INSERT INTO email.templates
            ("template", categoria, descricao, conteudo, lastupdate, versao, tenant, assunto, codigo, empresa, remetente)
            VALUES('6c7f891b-d1de-44d5-9cf5-b4df05028369'::uuid, NULL, 'WebinarioGanheTempo - email de retorno', '<p>Ol&aacute;,</p>

            <p>Aqui Claudio Nasajon para avisar que <strong>a sua inscri&ccedil;&atilde;o no Webin&aacute;rio &quot;5 t&eacute;cnicas para ganhar tempo e aumentar a sua produtividade em 30%, mesmo sem ter a quem delegar&quot; foi realizada com sucesso</strong>.</p>

            <p>1h antes do evento enviarei um e-mail para voc&ecirc; contendo o link para participar do encontro online.</p>

            <p><strong>Esta &eacute; uma boa hora para compartilhar a oportunidade com os seus amigos e colegas</strong>. Basta informar o link para inscri&ccedil;&atilde;o:</p>

            <p><a href="http://www.claudionasajon.com.br/aula-ganhe-tempo"><strong>www.claudionasajon.com.br/aula-ganhe-tempo</strong></a> e colocar a boca no trombone :-)</p>

            <p>A prop&oacute;sito: eu organizei as dicas mais &uacute;teis para mim quando o tema &eacute; produtividade e controle do tempo, mas para ter certeza de que vou poder ajudar VOC&Ecirc;, seria poss&iacute;vel voc&ecirc; responder esta mensagem indicando qual &eacute; o SEU&nbsp;maior desafio ou o problema que voc&ecirc; mais gostaria que eu abordasse nesse webin&aacute;rio?&nbsp;</p>

            <p>Este &eacute; um e-mail autom&aacute;tico, mas se voc&ecirc; respond&ecirc;-lo&nbsp;indicando o assunto que, para voc&ecirc;, eu n&atilde;o posso deixar de abordar no webin&aacute;rio, eu receberei e lerei pessoalmente a sua resposta (e isso vai me ajudar a organizar o conte&uacute;do para melhor atender as suas expectativas).</p>

            <p>Dese j&aacute; super-obrigado!&nbsp;</p>

            <p>Claudio</p>

            <p>&nbsp;</p>

            <p>&nbsp;</p>

            <p>&nbsp;</p>', NULL, NULL, 10074, 'Sua inscricao no Webinario Ganhe Tempo com Claudio Nasajon', NULL, NULL, NULL);
            INSERT INTO email.templates
            ("template", categoria, descricao, conteudo, lastupdate, versao, tenant, assunto, codigo, empresa, remetente)
            VALUES('1951248b-fbe2-4dad-9c8a-53ded753db7e'::uuid, NULL, '4 Blocos - 1 Linha, 2 Colunas, 1 Linha', '<div class="block_border" style="width:700px;margin: 10px 10px 0 10px;">
            <div contenteditable="true">
            <p><br />
            <br />
            <br />
            &nbsp;</p>
            </div>
            </div>

            <div class="block_border" style="float:left;width:350px;margin: 10px 5px 0px 10px;">
            <div contenteditable="true">
            <p><br />
            <br />
            <br />
            <br />
            <br />
            <br />
            &nbsp;</p>
            </div>
            </div>

            <div class="block_border" style="float:left;width:350px;margin: 10px 10px 0px 5px;">
            <div contenteditable="true">
            <p><br />
            <br />
            <br />
            <br />
            <br />
            <br />
            &nbsp;</p>
            </div>
            </div>

            <div style="clear:both">&nbsp;</div>

            <div class="block_border" style="width:700px;margin: 10px 10px 0 10px;">
            <div contenteditable="true">
            <p><br />
            <br />
            <br />
            <br />
            <br />
            <br />
            &nbsp;</p>
            </div>
            </div>', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
            INSERT INTO email.templates
            ("template", categoria, descricao, conteudo, lastupdate, versao, tenant, assunto, codigo, empresa, remetente)
            VALUES('b5fea564-6e38-4ce1-83d5-80b371a5b5bf'::uuid, NULL, 'Falecon: Finanças', '<div class="gmail_default" style="color: rgb(33, 33, 33); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px;"><span style="font-family: verdana, geneva, sans-serif;">Aten&ccedil;&atilde;o, equipe! O contato abaixo deseja receber uma demonstra&ccedil;&atilde;o gr&aacute;tis do&nbsp;<strong>Finan&ccedil;as&nbsp;</strong>via Falecon:</span></div>

            <div class="gmail_default" style="color: rgb(33, 33, 33); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px;">&nbsp;</div>

            <div class="gmail_default" style="color: rgb(33, 33, 33); font-size: 13.2px; line-height: 19.8px;"><font face="verdana, geneva, sans-serif">Nome: {{nome}}</font></div>

            <div class="gmail_default" style="color: rgb(33, 33, 33); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px;"><span style="font-family: verdana, geneva, sans-serif;">Email:&nbsp;<span style="font-size: 13.2px; line-height: 19.8px;">{{email}}</span></span></div>

            <div class="gmail_default" style="color: rgb(33, 33, 33); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px;"><span style="font-family: verdana, geneva, sans-serif;">Telefone:&nbsp;<span style="font-size: 13.2px; line-height: 19.8px;">{{telefone}}</span></span></div>

            <div class="gmail_default" style="color: rgb(33, 33, 33); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px;"><span style="font-family: verdana, geneva, sans-serif;">Estado:&nbsp;<span style="font-size: 13.2px; line-height: 19.8px;">{{estado}}</span></span></div>

            <div class="gmail_default" style="color: rgb(33, 33, 33); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px;"><span style="font-family: verdana, geneva, sans-serif;">Munic&iacute;pio:&nbsp;<span style="font-size: 13.2px; line-height: 19.8px;">{{cidade}}</span></span></div>

            <div class="gmail_default" style="color: rgb(33, 33, 33); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px;"><span style="font-family: verdana, geneva, sans-serif;">Mensagem:&nbsp;<span style="font-size: 13.2px; line-height: 19.8px;">{{mensagem}}</span></span></div>

            <div class="gmail_default" style="color: rgb(33, 33, 33); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px;"><span style="color: rgb(33, 33, 33); font-size: 13.2px; font-family: verdana, geneva, sans-serif;">&Eacute; cliente Nasajon?: {{cliente}}</span><br style="color: rgb(33, 33, 33); font-size: 13.2px; font-family: verdana, geneva, sans-serif;" />
            <span style="color: rgb(33, 33, 33); font-size: 13.2px; font-family: verdana, geneva, sans-serif;">Origem: {{origem}}</span><br style="color: rgb(33, 33, 33); font-size: 13.2px; font-family: verdana, geneva, sans-serif;" />
            <span style="color: rgb(33, 33, 33); font-size: 13.2px; font-family: verdana, geneva, sans-serif;">M&iacute;dia: {{midia}}</span><br style="color: rgb(33, 33, 33); font-size: 13.2px; font-family: verdana, geneva, sans-serif;" />
            <span style="color: rgb(33, 33, 33); font-size: 13.2px; font-family: verdana, geneva, sans-serif;">Campanha: {{campanha}}</span></div>', NULL, NULL, 10058, 'Falecon: Finanças', NULL, NULL, NULL);
            INSERT INTO email.templates
            ("template", categoria, descricao, conteudo, lastupdate, versao, tenant, assunto, codigo, empresa, remetente)
            VALUES('efadac38-e2ee-4dc6-b10b-91940f5b6402'::uuid, NULL, 'EM Planilha Controle de Estoque', '<p style="line-height: 20.8px;">Gente,&nbsp;</p>

            <p style="line-height: 20.8px;">O contato abaixo realizou o download da planilha Controle de Estoque via Email Marketing:</p>

            <p style="line-height: 20.8px;">Nome: {{nome}}<br />
            Email: {{email}}<br />
            Telefone: {{telefone}}<br />
            Empresa: {{empresa}}</p>', NULL, NULL, 10058, 'EM Planilha Controle de Estoque', NULL, NULL, NULL);
            INSERT INTO email.templates
            ("template", categoria, descricao, conteudo, lastupdate, versao, tenant, assunto, codigo, empresa, remetente)
            VALUES('9ecbc4ca-2f52-4e48-a4c3-4fc35d50299a'::uuid, NULL, 'E-mail treinamento', '<table border="0" cellpadding="1" cellspacing="1" style="height: 200px; width: 600px;">
                <tbody>
                    <tr>
                        <td style="text-align: center;"><img alt="" src="https://nasajon-email.s3.us-west-2.amazonaws.com/nasajon/images/1489d604198920223851f5c9e73dad02e0e3481b.png" style="width: 600px; height: 200px;" /></td>
                    </tr>
                </tbody>
            </table>

            <table border="0" cellpadding="1" cellspacing="1" style="height: 282px; width: 600px;">
                <tbody>
                    <tr>
                        <td style="text-align: center;">
                        <p style="text-align: left;"><font face="verdana, geneva, sans-serif"><span style="font-size: 14px;">{{primeironome}},</span></font></p>

                        <p style="text-align: left;"><span style="font-size: 14px;"><span style="font-family: verdana, geneva, sans-serif;">Chegou a hora de contabilizarmos os seus treinamentos do primeiro semestre de 2019.</span></span></p>

                        <p style="text-align: left;"><span style="font-size: 14px;"><span style="font-family: verdana, geneva, sans-serif;">Este ano,&nbsp;a contagem dos treinamentos est&aacute; sendo realizada atrav&eacute;s do e-mail.</span></span></p>

                        <p style="text-align: left;"><span style="font-size: 14px;"><span style="font-family: verdana, geneva, sans-serif;">A cada trimestre, voc&ecirc; receber&aacute; uma comunica&ccedil;&atilde;o com a lista atualizada. Por isso,&nbsp;<strong>fique atento!</strong></span></span></p>

                        <p style="text-align: left;"><span style="font-size: 14px;"><span style="font-family: verdana, geneva, sans-serif;">Confira quais foram os seus treinamentos realizados at&eacute; junho de 2019.</span></span></p>

                        <p style="text-align: left;"><br />
                        <span style="font-size:14px;"><span style="font-family:verdana,geneva,sans-serif;">{{trein1}}<br />
                        {{trein2}}<br />
                        {{trein3}}<br />
                        {{trein4}}<br />
                        {{trein5}}<br />
                        {{trein6}}<br />
                        {{trein7}}<br />
                        {{trein8}}<br />
                        {{trein9}}<br />
                        {{trein10}}<br />
                        {{trein11}}<br />
                        {{trein12}}<br />
                        {{trein13}}</span></span></p>

                        <p style="text-align: left;"><strong><span style="font-size: 14px;"><span style="font-family: verdana, geneva, sans-serif;">Pintou&nbsp;</span></span></strong><span style="font-family: verdana, geneva, sans-serif; font-size: 14px;"><strong>d&uacute;vida?</strong><br />
                        Entre em contato com a analista de RH Camila Tavares (camilatavares@nasajon.com.br).</span></p>

                        <p><em><span style="font-family: verdana, geneva, sans-serif; font-size: 14px;">O conhecimento move o mundo.</span></em></p>
                        </td>
                    </tr>
                </tbody>
            </table>

            <table border="0" cellpadding="1" cellspacing="1" style="height: 102px; width: 600px;">
                <tbody>
                    <tr>
                        <td style="text-align: center;">
                        <hr />
                        <p style="text-align: left;"><br />
                        O RH da Nasajon integra, cuida, educa, avalia, reconhece e celebra.<br />
                        Quer falar com a gente?</p>

                        <p style="text-align: left;"><img alt="" src="https://nasajon-email.s3-us-west-2.amazonaws.com/nasajon/images/acb9d46f3cae2a2f015d65f7c00a2e0045284ca2.jpg" style="width: 30px; height: 31px; float: left;" />&nbsp; &nbsp;&nbsp;Ramal 680<br />
                        &nbsp;</p>

                        <p style="text-align: left;">&nbsp; &nbsp;rh@nasajon.com.br | comunicacaointerna@nasajon.com.br<img alt="" src="https://nasajon-email.s3-us-west-2.amazonaws.com/nasajon/images/49bea0ce014488f6aaba9b0f3e04754816d9e848.jpg" style="color: rgb(105, 105, 105); width: 35px; height: 30px; float: left;" />&nbsp;&nbsp;<br />
                        &nbsp;</p>

                        <p style="text-align: left;"><img alt="" src="https://nasajon-email.s3-us-west-2.amazonaws.com/nasajon/images/1072ae061bb927915d34109ebe964a3a80cf3167.jpg" style="color: rgb(105, 105, 105); font-size: 12px; width: 31px; height: 29px; float: left;" />&nbsp; &nbsp; Sala 1801, 18&ordm; andar.&nbsp;<br />
                        &nbsp;</p>

                        <hr />
                        <p style="text-align: left;">MISS&Atilde;O<br />
                        Fornecer sistemas de gest&atilde;o confi&aacute;veis, f&aacute;ceis de usar e com atendimento de excel&ecirc;ncia para melhorar o desempenho de empresas.</p>

                        <p style="text-align: left;">VIS&Atilde;O<br />
                        At&eacute; 2020, ser o fornecedor de ERP preferido dos setores em que somos especialistas.</p>

                        <p style="text-align: left;">VALORES<br />
                        Conduta l&iacute;cita e &eacute;tica, boa gente boa, foco em resultados, zelo pela qualidade e atendimento de excel&ecirc;ncia.</p>

                        <div>
                        <hr />
                        <p style="text-align: left;">&nbsp;<br />
                        <img alt="" src="https://nasajon-email.s3-us-west-2.amazonaws.com/nasajon/images/80add7a903c81bb4904848deaddd2b7d5e2b6bf0.png" style="width: 90px; height: 73px; float: left; margin-left: 10px; margin-right: 10px;" />Fundada em 1982, a Nasajon Sistemas desenvolve software de gest&atilde;o integrada com o foco no desenvolvimento de empresas. Com a miss&atilde;o de fornecer solu&ccedil;&otilde;es de confian&ccedil;a, a marca investe em tecnologia e atendimento, o que resultou em 96,2% de satisfa&ccedil;&atilde;o do cliente, na &uacute;ltima pesquisa realizada - de janeiro a novembro de 2016. Com atua&ccedil;&atilde;o em todo o Brasil, a Nasajon est&aacute; entre as 200 que mais crescem no pa&iacute;s, al&eacute;m de ser uma das melhores empresas para trabalhar.</p>
                        </div>

                        <p>&nbsp;</p>
                        </td>
                    </tr>
                </tbody>
            </table>', NULL, NULL, 47, '{{primeironome}}, confira os seus treinamentos de 2019', NULL, NULL, NULL);
            INSERT INTO email.templates
            ("template", categoria, descricao, conteudo, lastupdate, versao, tenant, assunto, codigo, empresa, remetente)
            VALUES('4591aa61-fad2-4569-81f2-e0bd12162fa9'::uuid, NULL, 'E-mail OS', '<!DOCTYPE html>
            <html lang="en">

                <head>
                    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
                    <meta http-equiv="X-UA-Compatible" content="IE=edge">
                    <meta name="viewport" content="width=device-width, initial-scale=1">
                    <meta name="msapplication-config" content="none" />

                    <title>Serviços Web - Nasajon Sistemas</title>

                </head>

                <body style="background-color: #FAFAFA;">

                    <table width="100%" border="0" cellspacing="0" cellpadding="0">

                        <tr>
                            <td align="center">
                                <table>
                                    <tr>
                                        <td style="margin:0px auto;max-width:600px">
                                            <table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
                                                <tr height="40">
                                                    <td width="50%" align="left">
                                                        {% if logo %}
                                                        <img
                                                            src="{{logo}}"
                                                            alt="Logo da empresa"
                                                            width= "auto"
                                                            height="40"
                                                            border="0"
                                                            style="margin: 0 auto; outline:none; border:none;"
                                                        >
                                                        {% endif %}
                                                    </td>
                                                </tr>
                                            </table>

                                            <table
                                                width="100%"
                                                border="0"
                                                cellspacing="0"
                                                cellpadding="0"
                                                align="center"
                                                style="font-family: Arial, Helvetica, sans-serif;
                                                    font-size: 14px;
                                                    background-color: white;
                                                    border-width: 1px;
                                                    border-style: solid;
                                                    border-color: #DDDDDD;
                                                    border-radius: 4px;
                                                    margin-top: 10px;">
                                                <tr height="40">
                                                    <td width="40"></td>
                                                    <td width="40"></td>
                                                    <td width="40"></td>
                                                </tr>
                                                <tr>
                                                    <td width="40"></td>
                                                    <td width="520">
                                                        <h1 style="font-family: Arial, Helvetica, sans-serif;font-size: 21px;color:#5A5A5A;font-weight: bold;margin-top: 0;margin:0; mso-line-height-rule:exactly;">
                                                            Ordem de Serviço
                                                        </h1>


                                                        <hr style="border-width: 1px;border-color: #DDDDDD;border-style: solid;margin-top: 16px;margin-bottom: 16px;">


                                                        <p style="font-family: Arial, Helvetica, sans-serif;
                                                            color:#5A5A5A;
                                                            font-size: 14px;">
                                                            As informações listadas abaixo são referentes à <b>Ordem de Serviços número {{os.numero}}</b> . <br>
                                                            A Ordem de Serviço está anexada neste email.
                                                        </p>

                                                        <table
                                                            border="0"
                                                            width="100%"
                                                            cellspacing="0"
                                                            cellpadding="0"
                                                            style="background-color: white;
                                                            border-width: 1px;
                                                            border-style: solid;
                                                            border-color: rgba(0, 0, 0, 0.10);
                                                            margin-top: 16px;">
                                                            <tr height="30">
                                                                <td width="185"
                                                                    align="right"
                                                                    style="background-color: #909090;
                                                                    border-width: 1px;
                                                                    border-style: solid;
                                                                    border-color: rgba(0, 0, 0, 0.10);
                                                                    padding-right: 10px;">
                                                                    <p style="font-family: Arial, Helvetica, sans-serif;
                                                                        font-size: 14px;
                                                                        color:white;
                                                                        font-weight: bold;">
                                                                        Número
                                                                    </p>
                                                                </td>
                                                                <td width="375"
                                                                    style="border-width: 1px;
                                                                    border-style: solid;
                                                                    border-color: rgba(0, 0, 0, 0.10);
                                                                    padding-left: 10px;">
                                                                    <p style="font-family: Arial, Helvetica, sans-serif;
                                                                        font-size: 14px;
                                                                        color:#5A5A5A;">
                                                                        {{os.numero}}
                                                                    </p>
                                                                </td>
                                                            </tr>
                                                            <tr height="30">
                                                                <td width="185"
                                                                    align="right"
                                                                    style="background-color: #909090;
                                                                    border-width: 1px;
                                                                    border-style: solid;
                                                                    border-color: rgba(0, 0, 0, 0.10);
                                                                    padding-right: 10px;">
                                                                    <p style="font-family: Arial, Helvetica, sans-serif;
                                                                        font-size: 14px;
                                                                        color:white;
                                                                        font-weight: bold;">
                                                                        Estabelecimento
                                                                    </p>
                                                                </td>
                                                                <td width="375"
                                                                    style="border-width: 1px;
                                                                    border-style: solid;
                                                                    border-color: rgba(0, 0, 0, 0.10);
                                                                    padding-left: 10px;">
                                                                    <p style="font-family: Arial, Helvetica, sans-serif;
                                                                        font-size: 14px;
                                                                        color:#5A5A5A;">
                                                                        {{os.estabelecimento}}
                                                                    </p>
                                                                </td>
                                                            </tr>
                                                            <tr height="30">
                                                                <td width="185"
                                                                    align="right"
                                                                    style="background-color: #909090;
                                                                    border-width: 1px;
                                                                    border-style: solid;
                                                                    border-color: rgba(0, 0, 0, 0.10);
                                                                    padding-right: 10px;">
                                                                    <p style="font-family: Arial, Helvetica, sans-serif;
                                                                        font-size: 14px;
                                                                        color:white;
                                                                        font-weight: bold;">
                                                                        Cliente
                                                                    </p>
                                                                </td>
                                                                <td width="375"
                                                                    style="border-width: 1px;
                                                                    border-style: solid;
                                                                    border-color: rgba(0, 0, 0, 0.10);
                                                                    padding-left: 10px;">
                                                                    <p style="font-family: Arial, Helvetica, sans-serif;
                                                                        font-size: 14px;
                                                                        color:#5A5A5A;">
                                                                        {{os.cliente}}
                                                                    </p>
                                                                </td>
                                                            </tr>
                                                            <tr height="30">
                                                                <td width="185"
                                                                    align="right"
                                                                    style="background-color: #909090;
                                                                    border-width: 1px;
                                                                    border-style: solid;
                                                                    border-color: rgba(0, 0, 0, 0.10);
                                                                    padding-right: 10px;">
                                                                    <p style="font-family: Arial, Helvetica, sans-serif;
                                                                        font-size: 14px;
                                                                        color:white;
                                                                        font-weight: bold;">
                                                                        Agendamento
                                                                    </p>
                                                                </td>
                                                                <td width="375"
                                                                    style="border-width: 1px;
                                                                    border-style: solid;
                                                                    border-color: rgba(0, 0, 0, 0.10);
                                                                    padding-left: 10px;">

                                                                    {% if (os.datainicio and os.datafim) %}
                                                                        <p style="font-family: Arial, Helvetica, sans-serif;
                                                                            font-size: 14px;
                                                                            color:#5A5A5A;">
                                                                            Início: {{os.datainicio}} - Fim: {{os.datafim}}
                                                                        </p>
                                                                    {% endif %}
                                                                </td>
                                                            </tr>
                                                            <tr height="30">
                                                                <td width="185"
                                                                    align="right"
                                                                    style="background-color: #909090;
                                                                    border-width: 1px;
                                                                    border-style: solid;
                                                                    border-color: rgba(0, 0, 0, 0.10);
                                                                    padding-right: 10px;">
                                                                    <p style="font-family: Arial, Helvetica, sans-serif;
                                                                        font-size: 14px;
                                                                        color:white;
                                                                        font-weight: bold;">
                                                                        Serviços
                                                                    </p>
                                                                </td>
                                                                <td width="375"
                                                                    style="border-width: 1px;
                                                                    border-style: solid;
                                                                    border-color: rgba(0, 0, 0, 0.10);
                                                                    padding-left: 10px;">
                                                                    <p style="font-family: Arial, Helvetica, sans-serif;
                                                                        font-size: 14px;
                                                                        color:#5A5A5A;">
                                                                        {{os.servicos}}
                                                                    </p>
                                                                </td>
                                                            </tr>
                                                            <tr height="30">
                                                                <td width="185"
                                                                    align="right"
                                                                    style="background-color: #909090;
                                                                    border-width: 1px;
                                                                    border-style: solid;
                                                                    border-color: rgba(0, 0, 0, 0.10);
                                                                    padding-right: 10px;">
                                                                    <p style="font-family: Arial, Helvetica, sans-serif;
                                                                        font-size: 14px;
                                                                        color:white;
                                                                        font-weight: bold;">
                                                                        Técnicos Executores
                                                                    </p>
                                                                </td>
                                                                <td width="375"
                                                                    style="border-width: 1px;
                                                                    border-style: solid;
                                                                    border-color: rgba(0, 0, 0, 0.10);
                                                                    padding-left: 10px;">
                                                                    <p style="font-family: Arial, Helvetica, sans-serif;
                                                                        font-size: 14px;
                                                                        color:#5A5A5A;">
                                                                        {{os.executores}}
                                                                    </p>
                                                                </td>
                                                            </tr>
                                                            <tr height="30">
                                                                <td width="185"
                                                                    align="right"
                                                                    style="background-color: #909090;
                                                                    border-width: 1px;
                                                                    border-style: solid;
                                                                    border-color: rgba(0, 0, 0, 0.10);
                                                                    padding-right: 10px;">
                                                                    <p style="font-family: Arial, Helvetica, sans-serif;
                                                                        font-size: 14px;
                                                                        color:white;
                                                                        font-weight: bold;">
                                                                        Situação
                                                                    </p>
                                                                </td>
                                                                <td width="375"
                                                                    style="border-width: 1px;
                                                                    border-style: solid;
                                                                    border-color: rgba(0, 0, 0, 0.10);
                                                                    padding-left: 10px;">
                                                                    <p style="font-family: Arial, Helvetica, sans-serif;
                                                                        font-size: 14px;
                                                                        color:#5A5A5A;">
                                                                        {{os.situacao}}
                                                                    </p>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                    <td width="40"></td>
                                                </tr>
                                                <tr height="40">
                                                    <td width="40"></td>
                                                    <td width="40"></td>
                                                    <td width="40"></td>
                                                </tr>
                                            </table>

                                            <table align="center" width="100%">
                                                <tr height="20">
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td align="center">
                                                        <font
                                                            face="Arial, Helvetica, sans-serif"
                                                            color="#767676"
                                                            style="font-size: 12px;">
                                                            Esta é uma mensagem automática. Por favor, não responda a este e-mail. <br>
                                                            Desenvolvido por ERP Nasajon (Módulo Serviços Web)
                                                        </font>
                                                    </td>
                                                </tr>
                                                <tr height="10">
                                                    <td></td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>

                    </table>

                </body>

            </html>', '2020-06-17 14:21:01.255', 1, NULL, '[Serviços Web] Ordem de Serviço - Número: {{os.numero}}', 'servicosweb_os_email', NULL, NULL);
            INSERT INTO email.templates
            ("template", categoria, descricao, conteudo, lastupdate, versao, tenant, assunto, codigo, empresa, remetente)
            VALUES('00000000-83ef-4541-9d28-4c15d6e3cb28'::uuid, NULL, 'E-mail OS', '<!DOCTYPE html>
            <html lang="en">

                <head>
                    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
                    <meta http-equiv="X-UA-Compatible" content="IE=edge">
                    <meta name="viewport" content="width=device-width, initial-scale=1">
                    <meta name="msapplication-config" content="none" />

                    <title>Serviços Web - Nasajon Sistemas</title>

                </head>

                <body style="background-color: #FAFAFA;">

                    <table width="100%" border="0" cellspacing="0" cellpadding="0">

                        <tr>
                            <td align="center">
                                <table>
                                    <tr>
                                        <td style="margin:0px auto;max-width:600px">
                                            <table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
                                                <tr height="40">
                                                    <td width="50%" align="left">
                                                        {% if logo %}
                                                        <img
                                                            src="{{logo}}"
                                                            alt="Logo da empresa"
                                                            width= "auto"
                                                            height="40"
                                                            border="0"
                                                            style="margin: 0 auto; outline:none; border:none;"
                                                        >
                                                        {% endif %}
                                                    </td>
                                                </tr>
                                            </table>

                                            <table
                                                width="100%"
                                                border="0"
                                                cellspacing="0"
                                                cellpadding="0"
                                                align="center"
                                                style="font-family: Arial, Helvetica, sans-serif;
                                                    font-size: 14px;
                                                    background-color: white;
                                                    border-width: 1px;
                                                    border-style: solid;
                                                    border-color: #DDDDDD;
                                                    border-radius: 4px;
                                                    margin-top: 10px;">
                                                <tr height="40">
                                                    <td width="40"></td>
                                                    <td width="40"></td>
                                                    <td width="40"></td>
                                                </tr>
                                                <tr>
                                                    <td width="40"></td>
                                                    <td width="520">
                                                        <h1 style="font-family: Arial, Helvetica, sans-serif;font-size: 21px;color:#5A5A5A;font-weight: bold;margin-top: 0;margin:0; mso-line-height-rule:exactly;">
                                                            Ordem de Serviço
                                                        </h1>


                                                        <hr style="border-width: 1px;border-color: #DDDDDD;border-style: solid;margin-top: 16px;margin-bottom: 16px;">


                                                        <p style="font-family: Arial, Helvetica, sans-serif;
                                                            color:#5A5A5A;
                                                            font-size: 14px;">
                                                            As informações listadas abaixo são referentes à <b>Ordem de Serviços número {{os.numero}}</b> . <br>
                                                            A Ordem de Serviço está anexada neste email.
                                                        </p>

                                                        <table
                                                            border="0"
                                                            width="100%"
                                                            cellspacing="0"
                                                            cellpadding="0"
                                                            style="background-color: white;
                                                            border-width: 1px;
                                                            border-style: solid;
                                                            border-color: rgba(0, 0, 0, 0.10);
                                                            margin-top: 16px;">
                                                            <tr height="30">
                                                                <td width="185"
                                                                    align="right"
                                                                    style="background-color: #909090;
                                                                    border-width: 1px;
                                                                    border-style: solid;
                                                                    border-color: rgba(0, 0, 0, 0.10);
                                                                    padding-right: 10px;">
                                                                    <p style="font-family: Arial, Helvetica, sans-serif;
                                                                        font-size: 14px;
                                                                        color:white;
                                                                        font-weight: bold;">
                                                                        Número
                                                                    </p>
                                                                </td>
                                                                <td width="375"
                                                                    style="border-width: 1px;
                                                                    border-style: solid;
                                                                    border-color: rgba(0, 0, 0, 0.10);
                                                                    padding-left: 10px;">
                                                                    <p style="font-family: Arial, Helvetica, sans-serif;
                                                                        font-size: 14px;
                                                                        color:#5A5A5A;">
                                                                        {{os.numero}}
                                                                    </p>
                                                                </td>
                                                            </tr>
                                                            <tr height="30">
                                                                <td width="185"
                                                                    align="right"
                                                                    style="background-color: #909090;
                                                                    border-width: 1px;
                                                                    border-style: solid;
                                                                    border-color: rgba(0, 0, 0, 0.10);
                                                                    padding-right: 10px;">
                                                                    <p style="font-family: Arial, Helvetica, sans-serif;
                                                                        font-size: 14px;
                                                                        color:white;
                                                                        font-weight: bold;">
                                                                        Estabelecimento
                                                                    </p>
                                                                </td>
                                                                <td width="375"
                                                                    style="border-width: 1px;
                                                                    border-style: solid;
                                                                    border-color: rgba(0, 0, 0, 0.10);
                                                                    padding-left: 10px;">
                                                                    <p style="font-family: Arial, Helvetica, sans-serif;
                                                                        font-size: 14px;
                                                                        color:#5A5A5A;">
                                                                        {{os.estabelecimento}}
                                                                    </p>
                                                                </td>
                                                            </tr>
                                                            <tr height="30">
                                                                <td width="185"
                                                                    align="right"
                                                                    style="background-color: #909090;
                                                                    border-width: 1px;
                                                                    border-style: solid;
                                                                    border-color: rgba(0, 0, 0, 0.10);
                                                                    padding-right: 10px;">
                                                                    <p style="font-family: Arial, Helvetica, sans-serif;
                                                                        font-size: 14px;
                                                                        color:white;
                                                                        font-weight: bold;">
                                                                        Cliente
                                                                    </p>
                                                                </td>
                                                                <td width="375"
                                                                    style="border-width: 1px;
                                                                    border-style: solid;
                                                                    border-color: rgba(0, 0, 0, 0.10);
                                                                    padding-left: 10px;">
                                                                    <p style="font-family: Arial, Helvetica, sans-serif;
                                                                        font-size: 14px;
                                                                        color:#5A5A5A;">
                                                                        {{os.cliente}}
                                                                    </p>
                                                                </td>
                                                            </tr>
                                                            <tr height="30">
                                                                <td width="185"
                                                                    align="right"
                                                                    style="background-color: #909090;
                                                                    border-width: 1px;
                                                                    border-style: solid;
                                                                    border-color: rgba(0, 0, 0, 0.10);
                                                                    padding-right: 10px;">
                                                                    <p style="font-family: Arial, Helvetica, sans-serif;
                                                                        font-size: 14px;
                                                                        color:white;
                                                                        font-weight: bold;">
                                                                        Agendamento
                                                                    </p>
                                                                </td>
                                                                <td width="375"
                                                                    style="border-width: 1px;
                                                                    border-style: solid;
                                                                    border-color: rgba(0, 0, 0, 0.10);
                                                                    padding-left: 10px;">

                                                                    {% if (os.datainicio and os.datafim) %}
                                                                        <p style="font-family: Arial, Helvetica, sans-serif;
                                                                            font-size: 14px;
                                                                            color:#5A5A5A;">
                                                                            Início: {{os.datainicio}} - Fim: {{os.datafim}}
                                                                        </p>
                                                                    {% endif %}
                                                                </td>
                                                            </tr>
                                                            <tr height="30">
                                                                <td width="185"
                                                                    align="right"
                                                                    style="background-color: #909090;
                                                                    border-width: 1px;
                                                                    border-style: solid;
                                                                    border-color: rgba(0, 0, 0, 0.10);
                                                                    padding-right: 10px;">
                                                                    <p style="font-family: Arial, Helvetica, sans-serif;
                                                                        font-size: 14px;
                                                                        color:white;
                                                                        font-weight: bold;">
                                                                        Serviços
                                                                    </p>
                                                                </td>
                                                                <td width="375"
                                                                    style="border-width: 1px;
                                                                    border-style: solid;
                                                                    border-color: rgba(0, 0, 0, 0.10);
                                                                    padding-left: 10px;">
                                                                    <p style="font-family: Arial, Helvetica, sans-serif;
                                                                        font-size: 14px;
                                                                        color:#5A5A5A;">
                                                                        {{os.servicos}}
                                                                    </p>
                                                                </td>
                                                            </tr>
                                                            <tr height="30">
                                                                <td width="185"
                                                                    align="right"
                                                                    style="background-color: #909090;
                                                                    border-width: 1px;
                                                                    border-style: solid;
                                                                    border-color: rgba(0, 0, 0, 0.10);
                                                                    padding-right: 10px;">
                                                                    <p style="font-family: Arial, Helvetica, sans-serif;
                                                                        font-size: 14px;
                                                                        color:white;
                                                                        font-weight: bold;">
                                                                        Técnicos Executores
                                                                    </p>
                                                                </td>
                                                                <td width="375"
                                                                    style="border-width: 1px;
                                                                    border-style: solid;
                                                                    border-color: rgba(0, 0, 0, 0.10);
                                                                    padding-left: 10px;">
                                                                    <p style="font-family: Arial, Helvetica, sans-serif;
                                                                        font-size: 14px;
                                                                        color:#5A5A5A;">
                                                                        {{os.executores}}
                                                                    </p>
                                                                </td>
                                                            </tr>
                                                            <tr height="30">
                                                                <td width="185"
                                                                    align="right"
                                                                    style="background-color: #909090;
                                                                    border-width: 1px;
                                                                    border-style: solid;
                                                                    border-color: rgba(0, 0, 0, 0.10);
                                                                    padding-right: 10px;">
                                                                    <p style="font-family: Arial, Helvetica, sans-serif;
                                                                        font-size: 14px;
                                                                        color:white;
                                                                        font-weight: bold;">
                                                                        Situação
                                                                    </p>
                                                                </td>
                                                                <td width="375"
                                                                    style="border-width: 1px;
                                                                    border-style: solid;
                                                                    border-color: rgba(0, 0, 0, 0.10);
                                                                    padding-left: 10px;">
                                                                    <p style="font-family: Arial, Helvetica, sans-serif;
                                                                        font-size: 14px;
                                                                        color:#5A5A5A;">
                                                                        {{os.situacao}}
                                                                    </p>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                    <td width="40"></td>
                                                </tr>
                                                <tr height="40">
                                                    <td width="40"></td>
                                                    <td width="40"></td>
                                                    <td width="40"></td>
                                                </tr>
                                            </table>

                                            <table align="center" width="100%">
                                                <tr height="20">
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td align="center">
                                                        <font
                                                            face="Arial, Helvetica, sans-serif"
                                                            color="#767676"
                                                            style="font-size: 12px;">
                                                            Esta é uma mensagem automática. Por favor, não responda a este e-mail. <br>
                                                            Desenvolvido por ERP Nasajon (Módulo Serviços Web)
                                                        </font>
                                                    </td>
                                                </tr>
                                                <tr height="10">
                                                    <td></td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>

                    </table>

                </body>

            </html>', '2020-09-22 11:30:12.600', 1, NULL, '[Serviços Web] Ordem de Serviço - Número: {{os.numero}}', 'servicosweb_os_email', NULL, NULL);
            INSERT INTO email.templates
            ("template", categoria, descricao, conteudo, lastupdate, versao, tenant, assunto, codigo, empresa, remetente)
            VALUES('1e80dcb5-2cfc-4351-987e-8ac9acf3caac'::uuid, NULL, 'Contato interessado: Promoção Integratto Contábil - Canais', '<p>Aten&ccedil;&atilde;o, equipe! O contato abaixo preencheu o formul&aacute;rio da <strong>Promo&ccedil;&atilde;o&nbsp;Integratto Cont&aacute;bil - Canais</strong></p>

            <p>Nome: {{nome}}<br />
            Email: {{email}}<br />
            Telefone: {{telefone}}<br />
            Estado: {{estado}}<br />
            Mensagem: {{mensagem}}</p>', NULL, NULL, 10058, 'Contato interessado: Promoção Integratto Contábil - Canais', NULL, NULL, NULL);
            INSERT INTO email.templates
            ("template", categoria, descricao, conteudo, lastupdate, versao, tenant, assunto, codigo, empresa, remetente)
            VALUES('f6a7ce26-3206-4d8a-9d91-18d5a4bb5ce7'::uuid, NULL, 'WebinarioGanheTempo - nova inscrição', '<p>{{nome}} &lt;{{email}}&gt;</p>', NULL, NULL, 10074, 'Webinário Ganhe Tempo - nova inscrição', NULL, NULL, NULL);
            INSERT INTO email.templates
            ("template", categoria, descricao, conteudo, lastupdate, versao, tenant, assunto, codigo, empresa, remetente)
            VALUES('8d4f9b2f-449b-4c53-9941-3c015addc9de'::uuid, NULL, 'PF Integratto Contábil (Optimizepress)', '<div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px;"><span style="font-family: verdana, geneva, sans-serif;">Aten&ccedil;&atilde;o, equipe! O contato abaixo preencheu o formul&aacute;rio da p&aacute;gina PF do Integratto Cont&aacute;bil (Optimizepress)</span></div>

            <div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px;"><span style="font-family: verdana, geneva, sans-serif;">N&atilde;o se esque&ccedil;am de cadastrar a m&iacute;dia de origem no ERP!&nbsp;</span></div>

            <div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px;">&nbsp;</div>

            <div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px;"><span style="font-family: verdana, geneva, sans-serif;">Nome: {{nome}}</span></div>

            <div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px;"><span style="font-family: verdana, geneva, sans-serif;">Email:&nbsp;<span style="font-size: 13.2px; line-height: 19.8px;">{{email}}</span></span></div>

            <div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px;"><span style="font-family: verdana, geneva, sans-serif;">Telefone:&nbsp;<span style="font-size: 13.2px; line-height: 19.8px;">{{telefone}}</span></span></div>

            <div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px;"><span style="font-family: verdana, geneva, sans-serif;">Estado:&nbsp;<span style="font-size: 13.2px; line-height: 19.8px;">{{estado}}</span></span>​</div>

            <div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px;"><span style="font-family: verdana, geneva, sans-serif;">Mensagem:&nbsp;<span style="font-size: 13.2px; line-height: 19.8px;">{{mensagem}}</span></span></div>

            <div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px;"><span style="font-family: verdana, geneva, sans-serif;"><span style="font-size: 13.2px; line-height: 19.8px;">Cliente Nasajon: {{clientenasajon}}</span></span>

            <div class="gmail_default" style="font-size: 13.2px; line-height: 19.8px;"><span style="font-family: verdana, geneva, sans-serif;"><span style="font-size: 13.2px; line-height: 19.8px;"><span style="font-size: 13.2px; line-height: 19.8px;">Empresa: {{empresa}}<br />
            ​</span></span></span>

            <div class="gmail_default" style="font-size: 13.2px; line-height: 19.8px;"><span style="font-family: verdana, geneva, sans-serif;"><span style="font-size: 13.2px; line-height: 19.8px;"><span style="font-size: 13.2px; line-height: 19.8px;">&nbsp;</span></span></span></div>

            <div class="gmail_default" style="font-size: 13.2px; line-height: 19.8px;"><span style="font-family: verdana, geneva, sans-serif;"><span style="font-size: 13.2px; line-height: 19.8px;"><span style="font-size: 13.2px; line-height: 19.8px;">Lembrando que o prazo ideal para primeiro contato com o lead s&atilde;o 24 horas.</span></span></span></div>

            <div class="gmail_default" style="font-size: 13.2px; line-height: 19.8px;"><span style="font-family: verdana, geneva, sans-serif;"><span style="font-size: 13.2px; line-height: 19.8px;"><span style="font-size: 13.2px; line-height: 19.8px;">Juntos podemos fazer muito!</span></span></span></div>
            </div>
            </div>', NULL, NULL, 10058, 'PF Integratto Contábil (Optimizepress)', NULL, NULL, NULL);
            INSERT INTO email.templates
            ("template", categoria, descricao, conteudo, lastupdate, versao, tenant, assunto, codigo, empresa, remetente)
            VALUES('38094980-f639-4b3a-92fd-d072d8c22e7f'::uuid, NULL, 'Mensagem usuário Infográfico Bloco K', '<p style="line-height: 20.8px;">Ol&aacute;!</p>

            <p style="line-height: 20.8px;">Agradecemos o interesse no Infogr&aacute;fico&nbsp;&quot;4 Perguntas Fundamentais Sobre o Bloco K&quot;.&nbsp;</p>

            <p style="line-height: 20.8px;"><a href="https://marketingnasajon.s3.amazonaws.com/Infografico-4-perguntas-fundamentais-sobre-o-Bloco-K_RS.pdf">Clique&nbsp;aqui</a>&nbsp;para abrir o conte&uacute;do e acesse-o a qualquer momento.</p>

            <p style="line-height: 20.8px;">Aproveite!&nbsp;</p>

            <p style="line-height: 20.8px;">At&eacute; breve,</p>

            <p style="line-height: 20.8px;">Nasajon Sistemas</p>', NULL, NULL, 10058, '[Infográfico Gratuito] 4 Perguntas Fundamentais Sobre o Bloco K', NULL, NULL, NULL);
            INSERT INTO email.templates
            ("template", categoria, descricao, conteudo, lastupdate, versao, tenant, assunto, codigo, empresa, remetente)
            VALUES('a2950eea-4473-4623-886f-70d64dfd9533'::uuid, NULL, 'Contato Interessado: LP Estoque Google', '<p dir="ltr" style="line-height:1.38;margin-top:0pt;margin-bottom:0pt;"><span id="docs-internal-guid-078b2e6c-7fff-9b17-54d6-baab476aab9a"><span style="font-size: 11pt; font-family: Arial; color: rgb(0, 0, 0); background-color: transparent; font-variant-numeric: normal; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;">Aten&ccedil;&atilde;o, equipe! O contato abaixo preencheu o formul&aacute;rio da p&aacute;gina: </span><span style="font-size: 11pt; font-family: Arial; color: rgb(0, 0, 0); background-color: transparent; font-weight: 700; font-variant-numeric: normal; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;">Estoque do Google</span></span></p>

            <p dir="ltr" style="line-height:1.38;margin-top:0pt;margin-bottom:0pt;"><span id="docs-internal-guid-078b2e6c-7fff-9b17-54d6-baab476aab9a"><span style="font-size: 11pt; font-family: Arial; color: rgb(0, 0, 0); background-color: transparent; font-variant-numeric: normal; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;">N&atilde;o se esque&ccedil;am de cadastrar a m&iacute;dia de origem no ERP! </span></span><br class="kix-line-break" />
            &nbsp;</p>

            <p dir="ltr" style="line-height:1.38;margin-top:0pt;margin-bottom:0pt;"><span id="docs-internal-guid-078b2e6c-7fff-9b17-54d6-baab476aab9a"><span style="font-size: 11pt; font-family: Arial; color: rgb(0, 0, 0); background-color: transparent; font-variant-numeric: normal; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;">Seu nome: </span></span></p>

            <p dir="ltr" style="line-height:1.38;margin-top:0pt;margin-bottom:0pt;"><span id="docs-internal-guid-078b2e6c-7fff-9b17-54d6-baab476aab9a"><span style="font-size: 11pt; font-family: Arial; color: rgb(0, 0, 0); background-color: transparent; font-variant-numeric: normal; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;">Email: </span></span></p>

            <p dir="ltr" style="line-height:1.38;margin-top:0pt;margin-bottom:0pt;"><span id="docs-internal-guid-078b2e6c-7fff-9b17-54d6-baab476aab9a"><span style="font-size: 11pt; font-family: Arial; color: rgb(0, 0, 0); background-color: transparent; font-variant-numeric: normal; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;">Telefone: </span></span></p>

            <p dir="ltr" style="line-height:1.38;margin-top:0pt;margin-bottom:0pt;">&nbsp;</p>

            <p dir="ltr" style="line-height:1.38;margin-top:0pt;margin-bottom:0pt;">&nbsp;</p>

            <p><span id="docs-internal-guid-078b2e6c-7fff-9b17-54d6-baab476aab9a"><span style="font-size: 11pt; font-family: Arial; color: rgb(0, 0, 0); background-color: transparent; font-variant-numeric: normal; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;">Lembrando que o prazo ideal para primeiro contato com o lead s&atilde;o 24 horas.</span></span></p>

            <p dir="ltr" style="line-height:1.38;margin-top:0pt;margin-bottom:0pt;"><span id="docs-internal-guid-078b2e6c-7fff-9b17-54d6-baab476aab9a"><span style="font-size: 11pt; font-family: Arial; color: rgb(0, 0, 0); background-color: transparent; font-variant-numeric: normal; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;">Juntos podemos fazer muito!</span></span></p>

            <div>&nbsp;</div>', NULL, NULL, 10058, 'Contato Interessado: LP Estoque Google', NULL, NULL, NULL);
            INSERT INTO email.templates
            ("template", categoria, descricao, conteudo, lastupdate, versao, tenant, assunto, codigo, empresa, remetente)
            VALUES('ebac9d88-9356-476b-8514-4e28bf161022'::uuid, NULL, 'RS Integratto Contábil (Optimizepress)', '<div class="gmail_default" style="color: rgb(33, 33, 33); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px;"><span style="font-family: verdana, geneva, sans-serif;">Aten&ccedil;&atilde;o, equipe! O contato abaixo preencheu o formul&aacute;rio da p&aacute;gina RS do Integratto Cont&aacute;bil (Optimizepress)</span></div>

            <div class="gmail_default" style="color: rgb(33, 33, 33); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px;"><span style="font-family: verdana, geneva, sans-serif;">N&atilde;o se esque&ccedil;am de cadastrar a m&iacute;dia de origem no ERP!&nbsp;</span></div>

            <div class="gmail_default" style="color: rgb(33, 33, 33); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px;">&nbsp;</div>

            <div class="gmail_default" style="color: rgb(33, 33, 33); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px;"><span style="font-family: verdana, geneva, sans-serif;">Nome: {{nome}}</span></div>

            <div class="gmail_default" style="color: rgb(33, 33, 33); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px;"><span style="font-family: verdana, geneva, sans-serif;">Email:&nbsp;<span style="font-size: 13.2px; line-height: 19.8px;">{{email}}</span></span></div>

            <div class="gmail_default" style="color: rgb(33, 33, 33); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px;"><span style="font-family: verdana, geneva, sans-serif;">Telefone:&nbsp;<span style="font-size: 13.2px; line-height: 19.8px;">{{telefone}}</span></span></div>

            <div class="gmail_default" style="color: rgb(33, 33, 33); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px;"><span style="font-family: verdana, geneva, sans-serif;">Estado:&nbsp;<span style="font-size: 13.2px; line-height: 19.8px;">{{estado}}</span></span>​</div>

            <div class="gmail_default" style="color: rgb(33, 33, 33); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px;"><span style="font-family: verdana, geneva, sans-serif;">Mensagem:&nbsp;<span style="font-size: 13.2px; line-height: 19.8px;">{{mensagem}}</span></span></div>

            <div class="gmail_default" style="color: rgb(33, 33, 33); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px;"><span style="font-family: verdana, geneva, sans-serif;"><span style="font-size: 13.2px; line-height: 19.8px;">Cliente Nasajon: {{clientenasajon}}</span></span>

            <div class="gmail_default" style="font-size: 13.2px; line-height: 19.8px;"><span style="font-family: verdana, geneva, sans-serif;"><span style="font-size: 13.2px; line-height: 19.8px;"><span style="font-size: 13.2px; line-height: 19.8px;">Empresa: {{empresa}}<br />
            ​</span></span></span>

            <div class="gmail_default" style="font-size: 13.2px; line-height: 19.8px;"><span style="font-family: verdana, geneva, sans-serif;"><span style="font-size: 13.2px; line-height: 19.8px;"><span style="font-size: 13.2px; line-height: 19.8px;">&nbsp;</span></span></span></div>

            <div class="gmail_default" style="font-size: 13.2px; line-height: 19.8px;"><span style="font-family: verdana, geneva, sans-serif;"><span style="font-size: 13.2px; line-height: 19.8px;"><span style="font-size: 13.2px; line-height: 19.8px;">Lembrando que o prazo ideal para primeiro contato com o lead s&atilde;o 24 horas.</span></span></span></div>

            <div class="gmail_default" style="font-size: 13.2px; line-height: 19.8px;"><span style="font-family: verdana, geneva, sans-serif;"><span style="font-size: 13.2px; line-height: 19.8px;"><span style="font-size: 13.2px; line-height: 19.8px;">Juntos podemos fazer muito!</span></span></span></div>
            </div>
            </div>', NULL, NULL, 10058, 'RS Integratto Contábil (Optimizepress)', NULL, NULL, NULL);
            INSERT INTO email.templates
            ("template", categoria, descricao, conteudo, lastupdate, versao, tenant, assunto, codigo, empresa, remetente)
            VALUES('a3991696-1484-49ab-be03-d0fd30cc2505'::uuid, NULL, 'RS Contato interessado: Campanha de final de ano', '<p style="line-height: 20.8px;">Aten&ccedil;&atilde;o, equipe! O contato est&aacute; interessado&nbsp;no Integratto ERP, atrav&eacute;s da <strong>Campanha de final de ano - Redes Sociais</strong></p>

            <div>&nbsp;</div>

            <div>
            <div class="gmail_default" style="color: rgb(33, 33, 33); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px;"><span style="font-family: verdana, geneva, sans-serif;">Nome: {{nome}}</span></div>

            <div class="gmail_default" style="color: rgb(33, 33, 33); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px;"><span style="font-family: verdana, geneva, sans-serif;">Email:&nbsp;<span style="font-size: 13.2px; line-height: 19.8px;">{{email}}</span></span></div>

            <div class="gmail_default" style="color: rgb(33, 33, 33); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px;"><span style="font-family: verdana, geneva, sans-serif;">Telefone:&nbsp;<span style="font-size: 13.2px; line-height: 19.8px;">{{telefone}}</span></span></div>

            <div class="gmail_default" style="color: rgb(33, 33, 33); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px;"><span style="font-family: verdana, geneva, sans-serif;">Estado:&nbsp;<span style="font-size: 13.2px; line-height: 19.8px;">{{estado}}</span></span>​</div>

            <div class="gmail_default" style="color: rgb(33, 33, 33); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px;"><span style="font-family: verdana, geneva, sans-serif;">Mensagem:&nbsp;<span style="font-size: 13.2px; line-height: 19.8px;">{{mensagem}}</span></span></div>

            <div class="gmail_default" style="color: rgb(33, 33, 33); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px;"><span style="font-family: verdana, geneva, sans-serif;"><span style="font-size: 13.2px; line-height: 19.8px;">Cliente Nasajon: {{clientenasajon}}</span></span>

            <div class="gmail_default" style="font-size: 13.2px; line-height: 19.8px;"><span style="font-family: verdana, geneva, sans-serif;"><span style="font-size: 13.2px; line-height: 19.8px;"><span style="font-size: 13.2px; line-height: 19.8px;">Empresa: {{empresa}}</span></span></span></div>
            </div>
            </div>', NULL, NULL, 10058, 'RS Contato interessado: Campanha de final de ano', NULL, NULL, NULL);
            INSERT INTO email.templates
            ("template", categoria, descricao, conteudo, lastupdate, versao, tenant, assunto, codigo, empresa, remetente)
            VALUES('a868f3cd-a895-4f0c-8f66-323b68a09954'::uuid, NULL, 'Contato interessado no CRM - Google', '<p dir="ltr" style="line-height:1.38;margin-top:0pt;margin-bottom:0pt;">&nbsp;</p>

            <p dir="ltr" style="line-height:1.38;margin-top:0pt;margin-bottom:0pt;"><span id="docs-internal-guid-431f56ec-7fff-04fc-23bf-95b38e95c8fa"><span style="font-size: 11pt; font-family: Arial; color: rgb(0, 0, 0); background-color: transparent; font-variant-numeric: normal; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;">Aten&ccedil;&atilde;o, equipe! O contato abaixo preencheu o formul&aacute;rio da p&aacute;gina: <b>CRM GOOGLE</b></span></span></p>

            <p dir="ltr" style="line-height:1.38;margin-top:0pt;margin-bottom:0pt;"><span id="docs-internal-guid-431f56ec-7fff-04fc-23bf-95b38e95c8fa"><span style="font-size: 11pt; font-family: Arial; color: rgb(0, 0, 0); background-color: transparent; font-variant-numeric: normal; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;">N&atilde;o se esque&ccedil;am de cadastrar a m&iacute;dia de origem no ERP! </span></span><br class="kix-line-break" />
            &nbsp;</p>

            <p dir="ltr" style="line-height:1.38;margin-top:0pt;margin-bottom:0pt;"><span id="docs-internal-guid-431f56ec-7fff-04fc-23bf-95b38e95c8fa"><span style="font-size: 11pt; font-family: Arial; color: rgb(0, 0, 0); background-color: transparent; font-variant-numeric: normal; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;">Seu nome: </span></span></p>

            <p dir="ltr" style="line-height:1.38;margin-top:0pt;margin-bottom:0pt;"><span id="docs-internal-guid-431f56ec-7fff-04fc-23bf-95b38e95c8fa"><span style="font-size: 11pt; font-family: Arial; color: rgb(0, 0, 0); background-color: transparent; font-variant-numeric: normal; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;">Email: </span></span></p>

            <p dir="ltr" style="line-height:1.38;margin-top:0pt;margin-bottom:0pt;"><span id="docs-internal-guid-431f56ec-7fff-04fc-23bf-95b38e95c8fa"><span style="font-size: 11pt; font-family: Arial; color: rgb(0, 0, 0); background-color: transparent; font-variant-numeric: normal; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;">Telefone: </span></span></p>

            <p dir="ltr" style="line-height:1.38;margin-top:0pt;margin-bottom:0pt;">&nbsp;</p>

            <p dir="ltr" style="line-height:1.38;margin-top:0pt;margin-bottom:0pt;"><span id="docs-internal-guid-431f56ec-7fff-04fc-23bf-95b38e95c8fa"><span style="font-size: 11pt; font-family: Arial; color: rgb(0, 0, 0); background-color: transparent; font-variant-numeric: normal; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;">Lembrando que o prazo ideal para primeiro contato com o lead s&atilde;o 24 horas.</span></span></p>

            <p dir="ltr" style="line-height:1.38;margin-top:0pt;margin-bottom:0pt;"><span id="docs-internal-guid-431f56ec-7fff-04fc-23bf-95b38e95c8fa"><span style="font-size: 11pt; font-family: Arial; color: rgb(0, 0, 0); background-color: transparent; font-variant-numeric: normal; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;">Juntos podemos fazer muito!</span></span></p>

            <p>&nbsp;</p>', NULL, NULL, 10058, 'Contato interessado no CRM - Google', NULL, NULL, NULL);
            INSERT INTO email.templates
            ("template", categoria, descricao, conteudo, lastupdate, versao, tenant, assunto, codigo, empresa, remetente)
            VALUES('b4eedc44-e947-40f4-8a82-bba0ec1a0b38'::uuid, NULL, 'Mensagem contato interessado curso DP 5 Estrelas', '<p>Ol&aacute;!</p>

            <p>Recebemos a sua pr&eacute;-inscri&ccedil;&atilde;o no curso Pr&aacute;ticas de DP 5 Estrelas!</p>

            <p>Em breve, vamos enviar para o seu email mais informa&ccedil;&otilde;es para finalizar&nbsp;a inscri&ccedil;&atilde;o.</p>

            <p>Agradecemos o interesse,<br />
            Equipe Nasajon Educacional</p>', NULL, NULL, 10058, 'Confirmação de pré-inscrição', NULL, NULL, NULL);
            INSERT INTO email.templates
            ("template", categoria, descricao, conteudo, lastupdate, versao, tenant, assunto, codigo, empresa, remetente)
            VALUES('acdb0512-cd8f-4881-9003-5d52c3d54b1c'::uuid, NULL, 'RS Contato interessado: Infográfico 4 Perguntas Fundamentais Sobre o Bloco K', '<p>Gente,&nbsp;</p>

            <p>O contato abaixo realizou o download do&nbsp;Infogr&aacute;fico &quot;<strong>4 Perguntas Fundamentais Sobre o Bloco K&quot;</strong>&nbsp;via&nbsp;<strong>Redes Sociais</strong>:</p>

            <p>Nome: {{nome}}<br />
            Email: {{email}}<br />
            Telefone: {{telefone}}<br />
            Empresa: {{empresa}}</p>

            <p>&Eacute; cliente Nasajon? {{cliente}}</p>', NULL, NULL, 10058, 'RS Contato interessado: Infográfico 4 Perguntas Fundamentais Sobre o Bloco K', NULL, NULL, NULL);
            INSERT INTO email.templates
            ("template", categoria, descricao, conteudo, lastupdate, versao, tenant, assunto, codigo, empresa, remetente)
            VALUES('d36f4856-cd33-4d7a-bfef-add50aeeb8c3'::uuid, NULL, 'RS Planilha Controle de Estoque', '<p style="line-height: 20.8px;">Gente,&nbsp;</p>

            <p style="line-height: 20.8px;">O contato abaixo realizou o download da planilha Controle de Estoque via Redes Sociais:</p>

            <p style="line-height: 20.8px;">Nome: {{nome}}<br />
            Email: {{email}}<br />
            Telefone: {{telefone}}<br />
            Empresa: {{empresa}}</p>

            <p style="line-height: 20.8px;">&Eacute; cliente Nasajon? {{cliente}}</p>', NULL, NULL, 10058, 'RS Planilha Controle de Estoque', NULL, NULL, NULL);
            INSERT INTO email.templates
            ("template", categoria, descricao, conteudo, lastupdate, versao, tenant, assunto, codigo, empresa, remetente)
            VALUES('409f6ba2-d22f-4da0-86e1-869b61447d32'::uuid, NULL, 'Código de Verificação de Admissão', '<!DOCTYPE html>
                        <html lang="en">
                            <head>
                                <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
                                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                                <meta name="viewport" content="width=device-width, initial-scale=1">
                                <meta name="msapplication-config" content="none" />
                                <title>Nasajon Sistemas</title>
                                <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.7/css/all.css"> -->
                            </head>
                            <body style="background-color: #FAFAFA;">
                                <table style="margin: 0 auto;" cellspacing="0" cellpadding="0">
                                    <tr>
                                        <td align="center">
                                            <table style="min-width: 650px; min-height: 650px; margin: 0 auto;">
                                                <tr>
                                                    <td>
                                                        <table cellspacing="0" cellpadding="0"
                                                        style="width: 560px;
                                                            font-family: Arial, Helvetica, sans-serif;
                                                            font-size: 14px;
                                                            color: #5A5A5A;
                                                            background-color: #FFFFFF;
                                                            border-width: 1px;
                                                            border-style: solid;
                                                            border-color: #DDDDDD;
                                                            border-radius: 4px;
                                                            margin: 10px auto 20px auto;
                                                            padding: 20px 0;">
                                                            <tr height="40px">
                                                                <td align="center" width="50%" style="padding: 0 20px;">
                                                                    <img src="{{url_logo_estabelecimento}}" width="130px" height="auto" border="0" style="margin: 20px auto; outline: none;">
                                                                </td>
                                                            </tr>
                                                            <tr height="40px">
                                                                <td align="center" width="50%" style="padding: 0 20px;">
                                                                    <h1 style="font-size: 21px; font-weight: bold; margin: 0 0 12px 0;">
                                                                        ParabÃ©ns, {{primeiro_nome}}!
                                                                    </h1>
                                                                </td>
                                                            </tr>
                                                            <tr height="40px">
                                                                <td align="center" width="50%" style="padding: 0 20px;">
                                                                    <h1 style="font-size: 15px; font-weight: bold; margin: 0 0 20px 0;">
                                                                        VocÃª foi {{genero_aprovar}} no processo seletivo para a vaga de {{cargo}} {{nivel}}.
                                                                    </h1>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td align="center"width="50%" style="padding: 0 20px;">
                                                                    <hr style="border-width: 1px; border-color: #0000001A; border-style: solid; margin: 0; margin-bottom: 20px;">
                                                                    <p style="margin: 0 0 20px 0; font-size: 12px; line-height: 18px;">A <strong>{{nome_estabelecimento}}</strong> se orgulha em ter as melhores pessoas e queremos que vocÃª venha fazer parte da nossa equipe! Estamos muito empolgados com a sua aprovaÃ§Ã£o e te convidamos para fazer histÃ³ria com a gente!</p>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td align="center"
                                                                style="padding: 20px 40px;
                                                                background-color: #E5E5E5;">
                                                                    <table cellspacing="0" cellpadding="0" style="align-items: center; width: 100%;">
                                                                        <tr>
                                                                            <td>
                                                                                <!-- <table cellspacing="0" cellpadding="0" align="center" style="width: 100%;
                                                                                background-color: #5A5A5A;
                                                                                border-radius: 4px;
                                                                                color: #FFFFFF;
                                                                                padding: 20px 0;">
                                                                                    <tr>
                                                                                        <td align="center">
                                                                                            <h1 style="margin: 0 0 4px 0; font-size: 22px; font-weight: bold; line-height: 25px; letter-spacing: 0em;">Baixe o app</h1>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td align="center">
                                                                                            <h4 style="margin: 0 0 12px 0; font-size: 12px; font-weight: bold; line-height: 18px; letter-spacing: 0em;">e inicie sua admissÃ£o agora mesmo!</h4>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td align="center">
                                                                                            <a href="{{url_googleplay}}" style="text-decoration: none;">
                                                                                                <img src="https://s3.sa-east-1.amazonaws.com/imagens.nasajon/geral/email-de-notificacoes/departamento-pessoal-e-recursos-humanos/admiss%C3%A3o/botao_google-play.png" width="174px" height="auto">
                                                                                            </a>
                                                                                        </td>
                                                                                    </tr>
                                                                                </table> -->
                                                                                <!-- <table cellspacing="0" cellpadding="0" align="center" style="width: 20px;
                                                                                height: 20px;
                                                                                background: #5A5A5A;
                                                                                transform: rotate(45deg);
                                                                                margin-top: -10px;"></table> -->
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td align="center">
                                                                                <h3 style="margin: 10px 0 4px 0; font-size: 12px; font-weight: bold; line-height: 22px; letter-spacing: 0em;">CÃ³digo de validaÃ§Ã£o:</h3>
                                                                                <h1 style="margin: 0 0 20px 0; font-size: 22px; font-weight: bold; line-height: 14px; letter-spacing: 0em;">{{codigo_validacao}}</h1>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td align="center">
                                                                                <a href="{{url_admissao}}" style="text-decoration: none; color: #FFFFFF;">
                                                                                    <p style="font-size: 14px; font-weight: bold; text-align: center; border-radius: 4px; padding: 10px 0 10px 2px; margin: 0; background-color: #00469B; width: 152px;">
                                                                                        <!-- <i class="fas fa-id-badge" style="margin-right: 9px;"></i> -->
                                                                                        Iniciar admissÃ£o
                                                                                    </p>
                                                                                </a>
                                                                            </td>
                                                                        </tr>
                                                                    </table>
                                                                </td>
                                                            </tr>
                                                            <!-- <tr>
                                                                <td align="center" style="padding: 0 20px;">
                                                                    <h4 style="font-size: 12px; line-height: 18px; font-weight: 400; margin: 20px 0;">
                                                                        Ainda nÃ£o sabe como iniciar a admissÃ£o? <strong>Confira o passo a passo abaixo:</strong>
                                                                    </h4>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td align="center" style="padding: 0 20px;">
                                                                    <table align="center">
                                                                        <tr>
                                                                            <td>
                                                                                <table cellspacing="0" cellpadding="0" style="width: 165px;">
                                                                                    <tr>
                                                                                        <td align="center">
                                                                                            <h1 style="margin: 0 0 4px 0;
                                                                                            font-size: 22px;
                                                                                            font-weight: 700;
                                                                                            line-height: 25px;
                                                                                            letter-spacing: 0em;">1</h1>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td align="center">
                                                                                            <img src="https://s3.sa-east-1.amazonaws.com/imagens.nasajon/geral/email-de-notificacoes/departamento-pessoal-e-recursos-humanos/admiss%C3%A3o/passo1.png" width="80px" height="auto">
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td align="center">
                                                                                            <h3 style="margin: 12px 0 8px 0;
                                                                                            font-size: 12px;
                                                                                            font-weight: bold;
                                                                                            line-height: 14px;
                                                                                            letter-spacing: 0em;">Baixe o app</h3>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td align="center">
                                                                                            <p style="margin: 0 0 20px 0;
                                                                                            font-size: 12px;
                                                                                            line-height: 18px;
                                                                                            height: 54px;">FaÃ§a download e abra o app â€œMeu Trabalhoâ€;</p>
                                                                                        </td>
                                                                                    </tr>
                                                                                </table>
                                                                            </td>
                                                                            <td>
                                                                                <table cellspacing="0" cellpadding="0" style="width: 165px;">
                                                                                    <tr>
                                                                                        <td align="center">
                                                                                            <h1 style="margin: 0 0 4px 0;
                                                                                            font-size: 22px;
                                                                                            font-weight: 700;
                                                                                            line-height: 25px;
                                                                                            letter-spacing: 0em;">2</h1>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td align="center">
                                                                                            <img src="https://s3.sa-east-1.amazonaws.com/imagens.nasajon/geral/email-de-notificacoes/departamento-pessoal-e-recursos-humanos/admiss%C3%A3o/passo2.png" width="80px" height="auto">
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td align="center">
                                                                                            <h3 style="margin: 12px 0 8px 0;
                                                                                            font-size: 12px;
                                                                                            font-weight: bold;
                                                                                            line-height: 14px;
                                                                                            letter-spacing: 0em;">Valide a admissÃ£o</h3>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td align="center">
                                                                                            <p style="margin: 0 0 20px 0;
                                                                                            font-size: 12px;
                                                                                            line-height: 18px;
                                                                                            height: 54px;">Informe o cÃ³digo de validaÃ§Ã£o indicado no e-mail;</p>
                                                                                        </td>
                                                                                    </tr>
                                                                                </table>
                                                                            </td>
                                                                            <td>
                                                                                <table cellspacing="0" cellpadding="0" style="width: 165px;">
                                                                                    <tr>
                                                                                        <td align="center">
                                                                                            <h1 style="margin: 0 0 4px 0;
                                                                                            font-size: 22px;
                                                                                            font-weight: 700;
                                                                                            line-height: 25px;
                                                                                            letter-spacing: 0em;">3</h1>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td align="center">
                                                                                            <img src="https://s3.sa-east-1.amazonaws.com/imagens.nasajon/geral/email-de-notificacoes/departamento-pessoal-e-recursos-humanos/admiss%C3%A3o/passo3.png" width="80px" height="auto">
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td align="center">
                                                                                            <h3 style="margin: 12px 0 8px 0;
                                                                                            font-size: 12px;
                                                                                            font-weight: bold;
                                                                                            line-height: 14px;
                                                                                            letter-spacing: 0em;">Informe os dados</h3>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td align="center">
                                                                                            <p style="margin: 0 0 20px 0;
                                                                                            font-size: 12px;
                                                                                            line-height: 18px;
                                                                                            height: 54px;">Certifique-se de estar em um local com internet estÃ¡vel e claridade adequada;</p>
                                                                                        </td>
                                                                                    </tr>
                                                                                </table>
                                                                            </td>
                                                                        </tr>
                                                                    </table>
                                                                </td>
                                                            </tr> -->
                                                        </table>
                                                        <tr>
                                                            <td align="center">
                                                                <span style="font-family: Arial, Helvetica, sans-serif; font-size: 12px; color: #767676">
                                                                    Esta Ã© uma mensagem automÃ¡tica. Por favor, nÃ£o responda este e-mail.<br>
                                                                    Desenvolvido pela Nasajon.
                                                                </span>
                                                            </td>
                                                        </tr>
                                                        <tr height="10px">
                                                            <td></td>
                                                        </tr>
                                                        <tr>
                                                            <td align="center">
                                                                <img src="https://s3.sa-east-1.amazonaws.com/imagens.nasajon/logos/nasajon/nova-marca/logo-padrao_nasajon.png"
                                                                    alt="Logo da Nasajon Sistemas" width="130px" height="auto" border="0" style="margin: 0 auto; outline: none;">
                                                            </td>
                                                        </tr>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                </table>
                            </body>
                        </html>', '2022-06-20 19:53:35.506', 1, NULL, 'AprovaÃ§Ã£o - Processo Seletivo - {{resumo_nome_estabelecimento}}', 'meurh_enviar_codigo_verificacao_admissao', NULL, NULL);
            INSERT INTO email.templates
            ("template", categoria, descricao, conteudo, lastupdate, versao, tenant, assunto, codigo, empresa, remetente)
            VALUES('99816917-7d9a-4eda-9e77-c536df584ba3'::uuid, NULL, 'Autoresposta enviado ao cliente após criação de um chamado por um atendente', '<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN" "http://www.w3.org/TR/REC-html40/loose.dtd">
            <html lang="en" xmlns="http://www.w3.org/1999/xhtml">
            <head>
            <meta charset="utf-8">
            <title>Re: #{{protocolo}} - {{resumo}}</title>
            <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
            </head>
            <body>
            <table cellpadding="0" cellspacing="0" border="0" align="center" width="600" style="border-top:3px solid #2b6584; font-family:Arial, Helvetica, sans-serif; color:#555555;">
                    <tbody>

                            <tr>
                                <td style="padding-top:10px;">
                                    <img src="http://s3-us-west-2.amazonaws.com/static.nasajon/img/logo.png" />
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <h1 style="font-size:20px; margin:8px 0 20px 0; font-family:Lato, Arial, Helvetica, sans-serif;">
                                        <a href="https://paineldocliente.nasajon.com.br/tiquetes/{{atendimento.atendimento}}"  title="#{{protocolo}} - {{resumo}}" style="color:#2b6584; text-decoration:none;">#{{protocolo}} - {{resumo}}</a>
                                    </h1>
                                </td>
                            </tr>

                            <tr>
                                <td style="padding-top:10px;">
                                    <img src="https://19999098.fs1.hubspotusercontent-na1.net/hubfs/19999098/Ativos%20-%20Email/Tiquete%20Criado.png" />
                                </td>
                            </tr>
                            <tr>
                                    <td>
                                            <p style="font-size:16px; line-height:22px;">
                                                    {{ mensagem|nl2br }}
                                            </p>
                                    </td>
                            </tr>
                            <tr>
                                <td>
                                    <table cellpadding="0" cellspacing="0" border="0" align="center" width="100%" style="margin-top:30px; padding:15px; border:1px solid #ccc;">
                                        <tr>
                                            <td>
                                                <h2 style="font-size:16px; margin:0 0 20px 0; font-family:Lato, Arial, Helvetica, sans-serif; color:#2b6584;">Detalhes do Atendimento</h2>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <table cellpadding="3" cellspacing="0" border="0" align="center" width="100%">
                                                    <tr>
                                                        <td style="text-align:right; padding-right:10px;" width="100" valign="top"><strong style="font-size:11px; line-height:18px;">CRIADO EM</strong></td>
                                                        <td style="font-size:14px; line-height:18px;" valign="top">{{ atendimento.created_at|date("d/m/Y") }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td style="text-align:right; padding-right:10px;" width="100" valign="top"><strong style="font-size:11px; line-height:18px;">DESCRIÇÃO</strong></td>
                                                        <td style="font-size:14px; line-height:18px;">
                                                            <p style="margin:0;" valign="top">
                                                            {% for item in atendimento.followups %}
                                                            <table cellpadding="0" cellspacing="0" border="0" align="center" width="100%" style="padding-left:8px; border-left:1px solid #ccc;">
                                                                    <tr>
                                                                            <td style="padding-bottom:20px;">
                                                                                    <p style="font-size:12px; line-height:16px; margin:5px 0;">{{ item.historico|raw }}</p>

                                                                                    {% if item.anexos|length > 0 %}
                                                                                            <strong style="font-size:11px; line-height:16px;">ANEXOS:</strong><br />
                                                                                            <ul style="padding:0; margin:0; list-style:none;">
                                                                                                    {% for anexo in item.anexos %}
                                                                                                            <li><a href="{{anexo.url}}" style="text-decoration:none; color:#428bca;">{{anexo.nome}}</a></li>
                                                                                                    {% endfor %}
                                                                                            </ul>
                                                                                    {% endif %}

                                                            {% if (item.url_avaliacao is defined) %}
                                                            <p style="font-size:12px">
                                                                <a style="text-decoration:none;color:#2b6584;" href="{{ item.url_avaliacao }}" target="_blank"><img src="https://s3-us-west-2.amazonaws.com/static.nasajon/img/atendimento/ico-thumbs-up.gif"> Avalie essa resposta</a>
                                                            </p>
                                                            {% endif %}

                                                                            </td>
                                                                    </tr>
                                                                    <tr>
                                                                            <td>
                                                                            {% endfor %}
                                                                            {% for item in atendimento.followups  %}
                                                                            </td>
                                                                    </tr>
                                                            </table>
                                                            {% endfor %}
                                                            </p>
                                                        </td>
                                                    </tr>
                                                    {% if atendimento.anexos|length > 0 %}
                                                        <tr>
                                                            <td style="text-align:right; padding-right:10px;" width="100" valign="top"><strong style="font-size:11px; line-height:18px;">ANEXOS</strong></td>
                                                            <td style="font-size:14px; line-height:18px;" valign="top">
                                                                <ul style="padding:0; margin:0; list-style:none;">
                                                                    {% for anexo in atendimento.anexos %}
                                                                    <li><a href="{{anexo.url}}" style="text-decoration:none; color:#428bca;">{{anexo.nome}}</a></li>
                                                                    {% endfor %}
                                                                </ul>
                                                            </td>
                                                        </tr>
                                                    {% endif %}
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align:center">
                                    <p style="font-size:11px; margin:20px 0 5px;">
                                        <a href="https://paineldocliente.nasajon.com.br/tiquetes/{{atendimento.atendimento}}"  style="text-decoration:none; color:#428bca;">Visualizar no Sistema de Atendimentos</a>
                                    </p>
                                    <p style="font-size:11px; margin:0 0 8px;">Desenvolvido por <a href="http://www.nasajon.com.br" style="text-decoration:none; color:#428bca;">Nasajon </a></p>
                                </td>
                            </tr>
                    </tbody>
            </table>
            </body>
            </html>', '2019-04-16 18:44:31.636', 1, NULL, 'Re: #{{protocolo}} - {{resumo}}', 'atendimento_admin_novo', NULL, NULL);
            INSERT INTO email.templates
            ("template", categoria, descricao, conteudo, lastupdate, versao, tenant, assunto, codigo, empresa, remetente)
            VALUES('757f33a4-4a13-4e44-8fe1-77b8de4117d5'::uuid, NULL, 'EM Integratto Contábil (Optimizepress)', '<div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px;"><span style="font-family: verdana, geneva, sans-serif;">Aten&ccedil;&atilde;o, equipe! O contato abaixo preencheu o formul&aacute;rio da p&aacute;gina EM do Integratto Cont&aacute;bil (Optimizepress)</span></div>

            <div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px;"><span style="font-family: verdana, geneva, sans-serif;">N&atilde;o se esque&ccedil;am de cadastrar a m&iacute;dia de origem no ERP!&nbsp;</span></div>

            <div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px;">&nbsp;</div>

            <div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px;"><span style="font-family: verdana, geneva, sans-serif;">Nome: {{nome}}</span></div>

            <div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px;"><span style="font-family: verdana, geneva, sans-serif;">Email:&nbsp;<span style="font-size: 13.2px; line-height: 19.8px;">{{email}}</span></span></div>

            <div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px;"><span style="font-family: verdana, geneva, sans-serif;">Telefone:&nbsp;<span style="font-size: 13.2px; line-height: 19.8px;">{{telefone}}</span></span></div>

            <div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px;"><span style="font-family: verdana, geneva, sans-serif;">Estado:&nbsp;<span style="font-size: 13.2px; line-height: 19.8px;">{{estado}}</span></span>​</div>

            <div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px;"><span style="font-family: verdana, geneva, sans-serif;">Mensagem:&nbsp;<span style="font-size: 13.2px; line-height: 19.8px;">{{mensagem}}</span></span></div>

            <div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px;"><span style="font-family: verdana, geneva, sans-serif;"><span style="font-size: 13.2px; line-height: 19.8px;">Cliente Nasajon: {{clientenasajon}}</span></span>

            <div class="gmail_default" style="font-size: 13.2px; line-height: 19.8px;"><span style="font-family: verdana, geneva, sans-serif;"><span style="font-size: 13.2px; line-height: 19.8px;"><span style="font-size: 13.2px; line-height: 19.8px;">Empresa: {{empresa}}<br />
            ​</span></span></span>

            <div class="gmail_default" style="font-size: 13.2px; line-height: 19.8px;"><span style="font-family: verdana, geneva, sans-serif;"><span style="font-size: 13.2px; line-height: 19.8px;"><span style="font-size: 13.2px; line-height: 19.8px;">&nbsp;</span></span></span></div>

            <div class="gmail_default" style="font-size: 13.2px; line-height: 19.8px;"><span style="font-family: verdana, geneva, sans-serif;"><span style="font-size: 13.2px; line-height: 19.8px;"><span style="font-size: 13.2px; line-height: 19.8px;">Lembrando que o prazo ideal para primeiro contato com o lead s&atilde;o 24 horas.</span></span></span></div>

            <div class="gmail_default" style="font-size: 13.2px; line-height: 19.8px;"><span style="font-family: verdana, geneva, sans-serif;"><span style="font-size: 13.2px; line-height: 19.8px;"><span style="font-size: 13.2px; line-height: 19.8px;">Juntos podemos fazer muito!</span></span></span></div>
            </div>
            </div>', NULL, NULL, 10058, 'EM Integratto Contábil (Optimizepress)', NULL, NULL, NULL);
            INSERT INTO email.templates
            ("template", categoria, descricao, conteudo, lastupdate, versao, tenant, assunto, codigo, empresa, remetente)
            VALUES('482c414f-1222-4190-b5c8-3172fd61aa14'::uuid, NULL, 'WebinárioFranquia - nova inscrição', '<p><span style="line-height: 20.8px;">{{nome}} &lt;{{email}}&gt;</span></p>', NULL, NULL, 10074, 'Webinário Franquia - nova inscrição', NULL, NULL, NULL);
            INSERT INTO email.templates
            ("template", categoria, descricao, conteudo, lastupdate, versao, tenant, assunto, codigo, empresa, remetente)
            VALUES('a74ee74f-8162-4803-bb89-5ef912431dd1'::uuid, NULL, 'RS eBook - 5 sinais de que chegou a hora de investir em um ERP', '<p style="line-height: 20.8px;">Gente,&nbsp;</p>

            <p style="line-height: 20.8px;">O contato abaixo realizou o download do&nbsp;eBook&nbsp;<strong>5 Sinais de que chegou a hora de investir em um ERP&nbsp;</strong>via Home do site:</p>

            <p style="line-height: 20.8px;">Nome: {{nome}}<br />
            Email: {{email}}<br />
            Telefone: {{telefone}}<br />
            Empresa: {{empresa}}</p>

            <p style="line-height: 20.8px;">&Eacute; cliente Nasajon? {{cliente}}</p>', NULL, NULL, 10058, 'Home Site eBook - 5 sinais de que chegou a hora de investir em um ERP', NULL, NULL, NULL);
            INSERT INTO email.templates
            ("template", categoria, descricao, conteudo, lastupdate, versao, tenant, assunto, codigo, empresa, remetente)
            VALUES('c0a98d5a-4c72-4c86-9a6e-eb8e33e20cc8'::uuid, NULL, 'Mensagem usuário Planilha Controle de Estoque', '<p style="line-height: 20.8px;">Ol&aacute;!</p>

            <p style="line-height: 20.8px;">Agradecemos o interesse na planilha &quot;Controle de Estoque&quot;.&nbsp;</p>

            <p style="line-height: 20.8px;"><a href="https://marketingnasajon.s3.amazonaws.com/Planilha-Controle-de-Estoque.xlsx">Clique&nbsp;aqui</a>&nbsp;para abrir o conte&uacute;do e acesse-o a qualquer momento.</p>

            <p style="line-height: 20.8px;">Aproveite!&nbsp;</p>

            <p style="line-height: 20.8px;">At&eacute; breve,</p>

            <p style="line-height: 20.8px;">Nasajon Sistemas</p>', NULL, NULL, 10058, '[Planilha Gratuita] Controle de Estoque', NULL, NULL, NULL);
            INSERT INTO email.templates
            ("template", categoria, descricao, conteudo, lastupdate, versao, tenant, assunto, codigo, empresa, remetente)
            VALUES('d85fab3c-b391-4e58-ba66-d0c13c271173'::uuid, NULL, 'Contato interessado Sindicont: Workshop Imersão eSocial', '<p style="line-height: 20.8px;">Gente,&nbsp;</p>

            <p style="line-height: 20.8px;">O contato abaixo se inscreveu&nbsp;para receber o v&iacute;deo do Workshop Imers&atilde;o eSocial (mergulhe nessa realidade) pela divulga&ccedil;&atilde;o do Sindicont:</p>

            <p style="line-height: 20.8px;">Nome: {{nome}}<br />
            Email: {{email}}<br />
            Telefone: {{telefone}}<br />
            Mensagem: {{mensagem}}</p>', NULL, NULL, 10058, 'Contato interessado Sindicont: Workshop Imersão eSocial', NULL, NULL, NULL);
            INSERT INTO email.templates
            ("template", categoria, descricao, conteudo, lastupdate, versao, tenant, assunto, codigo, empresa, remetente)
            VALUES('40aa0b6d-5d41-42f7-b7ff-9938b566ef5f'::uuid, NULL, 'Expologística 2016', '<p style="line-height: 20.8px;">Gente,&nbsp;</p>

            <p style="line-height: 20.8px;">O contato abaixo se inscreveu&nbsp;para receber um par de ingressos para a Expo.Log&iacute;stica 2016:</p>

            <p style="line-height: 20.8px;">Nome: {{nome}}<br />
            CPF: {{cpf}}<br />
            Cargo: {{cargo}}<br />
            Email: {{email}}<br />
            Telefone: {{telefone}}<br />
            Empresa: {{empresa}}</p>', NULL, NULL, 10058, 'Expologística 2016', NULL, NULL, NULL);
            INSERT INTO email.templates
            ("template", categoria, descricao, conteudo, lastupdate, versao, tenant, assunto, codigo, empresa, remetente)
            VALUES('0db9e829-b19a-4ce7-a643-c951306c0b8a'::uuid, NULL, 'Campanha Estoque PF', '<p>Aten&ccedil;&atilde;o, equipe! O contato abaixo preencheu o formul&aacute;rio do Campanha Estoque via Painel de Fundo:<br />
            &nbsp;</p>

            <p>Nome: {{nome}}<br />
            Email: {{email}}<br />
            Telefone: {{telefone}}<br />
            Estado: {{estado}}<br />
            Mensagem: {{mensagem}}</p>', NULL, NULL, 10058, 'Campanha Estoque PF', NULL, NULL, NULL);
            INSERT INTO email.templates
            ("template", categoria, descricao, conteudo, lastupdate, versao, tenant, assunto, codigo, empresa, remetente)
            VALUES('ff926c0e-b781-41a5-8c44-416ebe3ab0f0'::uuid, NULL, 'EM eBook - 5 sinais de que chegou a hora de investir em um ERP', '<p style="line-height: 20.8px;">Gente,&nbsp;</p>

            <p style="line-height: 20.8px;">O contato abaixo realizou o download do&nbsp;eBook <strong>5 Sinais de que chegou a hora de investir em um ERP&nbsp;</strong>via Email Mkt:</p>

            <p style="line-height: 20.8px;">Nome: {{nome}}<br />
            Email: {{email}}<br />
            Telefone: {{telefone}}<br />
            Empresa: {{empresa}}</p>', NULL, NULL, 10058, 'EM eBook - 5 sinais de que chegou a hora de investir em um ERP', NULL, NULL, NULL);
            INSERT INTO email.templates
            ("template", categoria, descricao, conteudo, lastupdate, versao, tenant, assunto, codigo, empresa, remetente)
            VALUES('110199e8-be64-48f1-92f6-a34ddd577238'::uuid, NULL, 'Mensagem usuário eBook 5 Sinais de que chegou a hora de investir em um ERP', '<p style="line-height: 20.8px;">Ol&aacute;!</p>

            <p style="line-height: 20.8px;">Agradecemos o interesse no eBook&nbsp;&ldquo;5 Sinais de que chegou a hora de investir em um ERP&rdquo;.</p>

            <p style="line-height: 20.8px;"><a href="https://marketingnasajon.s3.amazonaws.com/Ebook-5-sinais-de-que-chegou-a-hora-de-investir-em-um-ERP.pdf">Clique&nbsp;aqui</a>&nbsp;para abrir o conte&uacute;do e acesse-o a qualquer momento.</p>

            <p style="line-height: 20.8px;">Aproveite!&nbsp;</p>

            <p style="line-height: 20.8px;">At&eacute; breve,</p>

            <p style="line-height: 20.8px;">Nasajon Sistemas</p>', NULL, NULL, 10058, '[eBook Gratuito] 5 Sinais de que chegou a hora de investir em um ERP', NULL, NULL, NULL);
            INSERT INTO email.templates
            ("template", categoria, descricao, conteudo, lastupdate, versao, tenant, assunto, codigo, empresa, remetente)
            VALUES('36e14506-4766-4cc9-af28-a628bf3c11ce'::uuid, NULL, 'Campanha Estoque EM', '<p>Aten&ccedil;&atilde;o, equipe! O contato abaixo preencheu o formul&aacute;rio do Campanha Estoque (Optmize):<br />
            &nbsp;</p>

            <p>Nome: {{nome}}<br />
            Email: {{email}}<br />
            Telefone: {{telefone}}<br />
            Estado: {{estado}}<br />
            Mensagem: {{mensagem}}</p>', NULL, NULL, 10058, 'Campanha Estoque EM', NULL, NULL, NULL);
            INSERT INTO email.templates
            ("template", categoria, descricao, conteudo, lastupdate, versao, tenant, assunto, codigo, empresa, remetente)
            VALUES('43fd03aa-fc86-49e3-8e6b-af19951f73e2'::uuid, NULL, 'PF Contato interessado: Infográfico 4 Perguntas Fundamentais Sobre o Bloco K', '<p>Gente,&nbsp;</p>

            <p>O contato abaixo realizou o download do&nbsp;Infogr&aacute;fico &quot;<strong>4 Perguntas Fundamentais Sobre o Bloco K&quot;</strong>&nbsp;via&nbsp;<strong>Painel de Fundo</strong>:</p>

            <p>Nome: {{nome}}<br />
            Email: {{email}}<br />
            Telefone: {{telefone}}<br />
            Empresa: {{empresa}}</p>', NULL, NULL, 10058, 'PF Contato interessado: Infográfico 4 Perguntas Fundamentais Sobre o Bloco K', NULL, NULL, NULL);
            INSERT INTO email.templates
            ("template", categoria, descricao, conteudo, lastupdate, versao, tenant, assunto, codigo, empresa, remetente)
            VALUES('fc4fd374-1737-4706-88a3-337d96191556'::uuid, NULL, 'Notificação periódica Colaborador', '<!DOCTYPE html>
            <html lang="en">

                <head>
                    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
                    <meta http-equiv="X-UA-Compatible" content="IE=edge">
                    <meta name="viewport" content="width=device-width, initial-scale=1">
                    <meta name="msapplication-config" content="none" />

                    <title>Ponto Web - Nasajon Sistemas</title>

                </head>

                <body style="background-color: #FAFAFA;">

                    <table width="100%" border="0" cellspacing="0" cellpadding="0">

                        <tr>
                            <td align="center">
                                <table style="margin: 12px 20px 20px 12px;">
                                    <tr>
                                        <td>
                                            <table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
                                                <tr height="40">
                                                    <td width="50%" align="left">
                                                        <img
                                                            src="http://s3.sa-east-1.amazonaws.com/imagens.nasajon/logos/sistemas-web/versao-padrao/icone-mais-nome/icn-nome-ponto.svg"
                                                            alt="Logo"
                                                            width= "auto"
                                                            height="40"
                                                            border="0"
                                                            style="margin: 0 auto; outline:none; border:none;"
                                                        >
                                                    </td>
                                                    <td width="50%" align="right">
                                                        <a href="https://pontoweb.nasajon.com.br/nasajon/relatorio/ponto"
                                                            style="text-decoration: none;color: white;">
                                                            <p style="font-family: Arial, Helvetica, sans-serif;
                                                                color: #FFFFFF;
                                                                font-size: 14px;
                                                                font-weight: bold;
                                                                text-align: center;
                                                                border-radius: 4px;
                                                                padding-top: 10px;
                                                                padding-right: 15px;
                                                                padding-bottom: 10px;
                                                                padding-left: 15px;
                                                                background-color: #2BAD1B;
                                                                width: 130px;">
                                                                Ver no Sistema
                                                            </p>
                                                        </a>
                                                    </td>
                                                </tr>
                                            </table>

                                            <table
                                                width="100%"
                                                border="0"
                                                cellspacing="0"
                                                cellpadding="0"
                                                align="center"
                                                style="font-family: Arial, Helvetica, sans-serif;
                                                    font-size: 14px;
                                                    background-color: white;
                                                    border-width: 1px;
                                                    border-style: solid;
                                                    border-color: #DDDDDD;
                                                    border-radius: 4px;
                                                    margin-top: 10px;
                                                    padding: 20px;">

                                                <tr>
                                                    <td>
                                                        <h1 style="font-family: Arial, Helvetica, sans-serif;
                                                            font-size: 21px;
                                                            color:#5A5A5A;
                                                            font-weight: bold;
                                                            margin-top: 0;
                                                            margin:0;
                                                            mso-line-height-rule:exactly;
                                                            padding-bottom: 20px;">
                                                            Notificação Periódica
                                                        </h1>
                                                        <hr style="border-width: 1px;border-color: #DDDDDD;border-style: solid;margin-top: 0;margin-bottom: 16px;">

                                                        <p style="font-family: Arial, Helvetica, sans-serif;
                                                            color:#5A5A5A;
                                                            font-size: 14px;">
                                                            As informações listadas abaixo são referentes às <b>notificações do dia {{data}}</b> . <br>
                                                        </p>

                                                        {% for item in empresas %}
                                                            <table border="0"
                                                                width="100%"
                                                                cellspacing="0"
                                                                cellpadding="0"
                                                                style="background-color: white;
                                                                margin-top: 16px;
                                                                width: 100%;">
                                                                    <tr height="30">
                                                                        <td align="right"
                                                                            style="background-color: #909090;
                                                                            border-width: 1px;
                                                                            border-style: solid;
                                                                            border-color: rgba(0, 0, 0, 0.10);
                                                                            border-radius: 4px 0 0 4px;
                                                                            padding-right: 10px;">
                                                                            <p style="font-family: Arial, Helvetica, sans-serif;
                                                                                font-size: 14px;
                                                                                color:white;
                                                                                font-weight: bold;">
                                                                                Empresa
                                                                            </p>
                                                                        </td>
                                                                        <td style="border-width: 1px;
                                                                            border-style: solid;
                                                                            border-color: rgba(0, 0, 0, 0.10);
                                                                            border-radius: 0 4px 4px 0;
                                                                            padding-left: 10px;">
                                                                            <p style="font-family: Arial, Helvetica, sans-serif;
                                                                                font-size: 14px;
                                                                                color:#5A5A5A;">
                                                                                {{item.razaosocial}}
                                                                            </p>
                                                                        </td>
                                                                    </tr>
                                                            </table>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>
                                                            <table
                                                                border="0"
                                                                width="100%"
                                                                cellspacing="0"
                                                                style="background-color: white;
                                                                margin-top: 16px;">
                                                                    <tr height="30">
                                                                        <th align="center"
                                                                            style="background-color: #909090;
                                                                            border-width: 1px;
                                                                            border-style: solid;
                                                                            border-color: rgba(0, 0, 0, 0.10);
                                                                            border-radius: 4px 0 0 0;
                                                                            padding: 10px;">
                                                                            <p style="font-family: Arial, Helvetica, sans-serif;
                                                                                font-size: 14px;
                                                                                color:white;
                                                                                font-weight: bold;
                                                                                margin:0;">
                                                                                Nome
                                                                            </p>
                                                                        </th>
                                                                        <th align="center"
                                                                            style="background-color: #909090;
                                                                            border-width: 1px;
                                                                            border-style: solid;
                                                                            border-color: rgba(0, 0, 0, 0.10);
                                                                            padding: 10px;">
                                                                            <p style="font-family: Arial, Helvetica, sans-serif;
                                                                                font-size: 14px;
                                                                                color:white;
                                                                                font-weight: bold;
                                                                                margin:0;">
                                                                                Ajustes
                                                                            </p>
                                                                        </th>
                                                                        <th align="center"
                                                                            style="background-color: #909090;
                                                                            border-width: 1px;
                                                                            border-style: solid;
                                                                            border-color: rgba(0, 0, 0, 0.10);
                                                                            padding: 10px;">
                                                                            <p style="font-family: Arial, Helvetica, sans-serif;
                                                                                font-size: 14px;
                                                                                color:white;
                                                                                font-weight: bold;
                                                                                margin:0;">
                                                                                Alertas
                                                                            </p>
                                                                        </th>
                                                                        <th align="center"
                                                                            style="background-color: #909090;
                                                                            border-width: 1px;
                                                                            border-style: solid;
                                                                            border-color: rgba(0, 0, 0, 0.10);
                                                                            padding: 10px;">
                                                                            <p style="font-family: Arial, Helvetica, sans-serif;
                                                                                font-size: 14px;
                                                                                color:white;
                                                                                font-weight: bold;
                                                                                margin:0;">
                                                                                Inconsistências
                                                                            </p>
                                                                        </th>
                                                                        <th align="center"
                                                                            style="background-color: #909090;
                                                                            border-width: 1px;
                                                                            border-style: solid;
                                                                            border-color: rgba(0, 0, 0, 0.10);
                                                                            padding: 10px;">
                                                                            <p style="font-family: Arial, Helvetica, sans-serif;
                                                                                font-size: 14px;
                                                                                color:white;
                                                                                font-weight: bold;
                                                                                margin:0;">
                                                                                Locais Inválidos
                                                                            </p>
                                                                        </th>
                                                                        <th align="center"
                                                                            style="background-color: #909090;
                                                                            border-width: 1px;
                                                                            border-style: solid;
                                                                            border-color: rgba(0, 0, 0, 0.10);
                                                                            padding: 10px;">
                                                                            <p style="font-family: Arial, Helvetica, sans-serif;
                                                                                font-size: 14px;
                                                                                color:white;
                                                                                font-weight: bold;
                                                                                margin:0;">
                                                                                Fotos Inválidas
                                                                            </p>
                                                                        </th>
                                                                        <th align="center"
                                                                            style="background-color: #909090;
                                                                            border-width: 1px;
                                                                            border-style: solid;
                                                                            border-color: rgba(0, 0, 0, 0.10);
                                                                            padding: 10px;">
                                                                            <p style="font-family: Arial, Helvetica, sans-serif;
                                                                                font-size: 14px;
                                                                                color:white;
                                                                                font-weight: bold;
                                                                                margin:0;">
                                                                                Atrasos
                                                                            </p>
                                                                        </th>
                                                                        <th align="center"
                                                                            style="background-color: #909090;
                                                                            border-width: 1px;
                                                                            border-style: solid;
                                                                            border-color: rgba(0, 0, 0, 0.10);
                                                                            padding: 10px;">
                                                                            <p style="font-family: Arial, Helvetica, sans-serif;
                                                                                font-size: 14px;
                                                                                color:white;
                                                                                font-weight: bold;
                                                                                margin:0;">
                                                                                Horas Extras
                                                                            </p>
                                                                        </th>
                                                                        <th align="center"
                                                                            style="background-color: #909090;
                                                                            border-width: 1px;
                                                                            border-style: solid;
                                                                            border-color: rgba(0, 0, 0, 0.10);
                                                                            border-radius: 0 4px 0 0;
                                                                            padding: 10px;">
                                                                            <p style="font-family: Arial, Helvetica, sans-serif;
                                                                                font-size: 14px;
                                                                                color:white;
                                                                                font-weight: bold;
                                                                                margin:0;">
                                                                                Ausências de Marcação
                                                                            </p>
                                                                        </th>

                                                                    </tr>
                                                                    {% for colaborador in item.colaboradores %}
                                                                        <tr height="30">
                                                                            <td style="border-width: 1px;
                                                                                border-style: solid;
                                                                                border-color: rgba(0, 0, 0, 0.10);
                                                                                border-radius: 0 0 0 4px;
                                                                                padding: 0 10px;">
                                                                                <p style="font-family: Arial, Helvetica, sans-serif;
                                                                                    font-size: 14px;
                                                                                    color:#5A5A5A;">
                                                                                    {{colaborador.nome}}
                                                                                </p>
                                                                            </td>
                                                                            <td style="border-width: 1px;
                                                                                border-style: solid;
                                                                                border-color: rgba(0, 0, 0, 0.10);
                                                                                padding: 0 10px;">
                                                                                <p style="font-family: Arial, Helvetica, sans-serif;
                                                                                    font-size: 14px;
                                                                                    color:#5A5A5A;">
                                                                                    {{colaborador.ajustes}}
                                                                                </p>
                                                                            </td>
                                                                            <td style="border-width: 1px;
                                                                                border-style: solid;
                                                                                border-color: rgba(0, 0, 0, 0.10);
                                                                                padding: 0 10px;">
                                                                                <p style="font-family: Arial, Helvetica, sans-serif;
                                                                                    font-size: 14px;
                                                                                    color:#5A5A5A;">
                                                                                    {{colaborador.alertas}}
                                                                                </p>
                                                                            </td>
                                                                            <td style="border-width: 1px;
                                                                                border-style: solid;
                                                                                border-color: rgba(0, 0, 0, 0.10);
                                                                                padding: 0 10px;">
                                                                                <p style="font-family: Arial, Helvetica, sans-serif;
                                                                                    font-size: 14px;
                                                                                    color:#5A5A5A;">
                                                                                    {{colaborador.inconsistencias}}
                                                                                </p>
                                                                            </td>
                                                                            <td style="border-width: 1px;
                                                                                border-style: solid;
                                                                                border-color: rgba(0, 0, 0, 0.10);
                                                                                padding: 0 10px;">
                                                                                <p style="font-family: Arial, Helvetica, sans-serif;
                                                                                    font-size: 14px;
                                                                                    color:#5A5A5A;">
                                                                                    {{colaborador.locais_invalidos}}
                                                                                </p>
                                                                            </td>
                                                                            <td style="border-width: 1px;
                                                                                border-style: solid;
                                                                                border-color: rgba(0, 0, 0, 0.10);
                                                                                padding: 0 10px;">
                                                                                <p style="font-family: Arial, Helvetica, sans-serif;
                                                                                    font-size: 14px;
                                                                                    color:#5A5A5A;">
                                                                                    {{colaborador.fotos_invalidas}}
                                                                                </p>
                                                                            </td>
                                                                            <td style="border-width: 1px;
                                                                                border-style: solid;
                                                                                border-color: rgba(0, 0, 0, 0.10);
                                                                                padding: 0 10px;">
                                                                                <p style="font-family: Arial, Helvetica, sans-serif;
                                                                                    font-size: 14px;
                                                                                    color:#5A5A5A;">
                                                                                    {{colaborador.atrasos}}
                                                                                </p>
                                                                            </td>
                                                                            <td style="border-width: 1px;
                                                                                border-style: solid;
                                                                                border-color: rgba(0, 0, 0, 0.10);
                                                                                padding: 0 10px;">
                                                                                <p style="font-family: Arial, Helvetica, sans-serif;
                                                                                    font-size: 14px;
                                                                                    color:#5A5A5A;">
                                                                                    {{colaborador.horas_extras}}
                                                                                </p>
                                                                            </td>
                                                                            <td style="border-width: 1px;
                                                                                border-style: solid;
                                                                                border-color: rgba(0, 0, 0, 0.10);
                                                                                border-radius: 0 0 4px 0;
                                                                                padding: 0 10px;">
                                                                                <p style="font-family: Arial, Helvetica, sans-serif;
                                                                                    font-size: 14px;
                                                                                    color:#5A5A5A;">
                                                                                    {{colaborador.outros}}
                                                                                </p>
                                                                            </td>
                                                                        </tr>
                                                                    {% endfor %}
                                                                </table>
                                                                {% endfor %}
                                                        </td>
                                                </tr>
                                            </table>





                                            <table align="center" width="100%">
                                                <tr height="20">
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td align="center">
                                                        <font
                                                            face="Arial, Helvetica, sans-serif"
                                                            color="#767676"
                                                            style="font-size: 12px;">
                                                            Esta é uma mensagem automática. Por favor, não responda a este e-mail. <br>
                                                            Desenvolvido pela Nasajon.
                                                        </font>
                                                    </td>
                                                </tr>
                                                <tr height="10">
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td align="center">
                                                        <img
                                                            src="https://s3.sa-east-1.amazonaws.com/imagens.nasajon/geral/email-de-notificacoes/logo-padrao_nasajon-pb.png"
                                                            alt="Logo da Nasajon Sistemas"
                                                            border="0"
                                                            style="margin: 0 auto; outline:none; border:none;"
                                                        >
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>

                    </table>

                </body>

            </html>', '2020-11-05 13:34:07.223', 1, NULL, 'Notificação Periódica Gestor', 'pontoweb_notificacao_periodica_gestor', NULL, NULL);
            INSERT INTO email.templates
            ("template", categoria, descricao, conteudo, lastupdate, versao, tenant, assunto, codigo, empresa, remetente)
            VALUES('576ff396-5f78-45c6-a799-c5987511cd62'::uuid, NULL, 'EM - Contato interessado: Campanha ERP 1', '<p style="line-height: 20.8px;">Aten&ccedil;&atilde;o, equipe! O contato est&aacute; interessado&nbsp;na campanha ERP 1&nbsp;via Email Marketing:</p>

            <div>&nbsp;</div>

            <div>
            <div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px;"><span style="font-family: verdana, geneva, sans-serif;">Nome: {{nome}}</span></div>

            <div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px;"><span style="font-family: verdana, geneva, sans-serif;">Email:&nbsp;<span style="font-size: 13.2px; line-height: 19.8px;">{{email}}</span></span></div>

            <div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px;"><span style="font-family: verdana, geneva, sans-serif;">Telefone:&nbsp;<span style="font-size: 13.2px; line-height: 19.8px;">{{telefone}}</span></span></div>

            <div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px;"><span style="font-family: verdana, geneva, sans-serif;">Estado:&nbsp;<span style="font-size: 13.2px; line-height: 19.8px;">{{estado}}</span></span>​</div>

            <div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px;"><span style="font-family: verdana, geneva, sans-serif;">Mensagem:&nbsp;<span style="font-size: 13.2px; line-height: 19.8px;">{{mensagem}}</span></span></div>

            <div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px;"><span style="font-family: verdana, geneva, sans-serif;"><span style="font-size: 13.2px; line-height: 19.8px;">Cliente Nasajon: {{clientenasajon}}</span></span>

            <div class="gmail_default" style="font-size: 13.2px; line-height: 19.8px;"><span style="font-family: verdana, geneva, sans-serif;"><span style="font-size: 13.2px; line-height: 19.8px;"><span style="font-size: 13.2px; line-height: 19.8px;">Empresa: {{empresa}}</span></span></span></div>
            </div>
            </div>', NULL, NULL, 10058, 'EM - Contato interessado: Campanha ERP 1', NULL, NULL, NULL);
            INSERT INTO email.templates
            ("template", categoria, descricao, conteudo, lastupdate, versao, tenant, assunto, codigo, empresa, remetente)
            VALUES('d81a75e4-6ef0-40a5-8e6c-5445200cbd5d'::uuid, NULL, 'Geral - eBook - 5 dicas para se tornar um líder admirável de DP', '<p style="line-height: 20.8px;">Gente,&nbsp;</p>

            <p style="line-height: 20.8px;">O contato abaixo realizou o download do&nbsp;eBook BI - &quot;<strong>5 dicas para se tornar um l&iacute;der admir&aacute;vel de DP</strong>&quot;<b>:</b></p>

            <p style="line-height: 20.8px;">Nome: {{nome}}<br />
            Email: {{email}}<br />
            Telefone: {{telefone}}<br />
            Empresa: {{empresa}}</p>', NULL, NULL, 10058, 'Geral - eBook - 5 dicas para se tornar um líder admirável de DP', NULL, NULL, NULL);
            INSERT INTO email.templates
            ("template", categoria, descricao, conteudo, lastupdate, versao, tenant, assunto, codigo, empresa, remetente)
            VALUES('b98556ef-3886-455e-8d18-c71db583a916'::uuid, NULL, 'Landing Page - Integratto Contabil', '<div contenteditable="true" class="cke_editable cke_editable_inline cke_contents_ltr cke_focus cke_show_borders" tabindex="0" spellcheck="false" role="textbox" aria-label="Editor de Rich Text, editor1" title="Editor de Rich Text, editor1" aria-describedby="cke_51" style="position: relative;"><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: Helvetica Neue, Helvetica, Arial, sans-serif; font-size: 13.1999998092651px; line-height: 19.7999992370605px; background-color: rgb(255, 255, 255);"><font face="arial, helvetica, sans-serif">Olá, {{nome}}</font></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: Helvetica Neue, Helvetica, Arial, sans-serif; font-size: 13.1999998092651px; line-height: 19.7999992370605px; background-color: rgb(255, 255, 255);"><br></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: Helvetica Neue, Helvetica, Arial, sans-serif; font-size: 13.1999998092651px; line-height: 19.7999992370605px; background-color: rgb(255, 255, 255);"><font face="arial, helvetica, sans-serif">Vimos que você tem interesse pelo Integratto Contábil e gostaríamos de agendar uma demonstração grátis.</font></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: Helvetica Neue, Helvetica, Arial, sans-serif; font-size: 13.1999998092651px; line-height: 19.7999992370605px; background-color: rgb(255, 255, 255);"><br></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: Helvetica Neue, Helvetica, Arial, sans-serif; font-size: 13.1999998092651px; line-height: 19.7999992370605px; background-color: rgb(255, 255, 255);"><font face="arial, helvetica, sans-serif">Será ótimo conhecer mais sobre o seu negócio e como o nosso sistema integrado pode aumentar a produtividade e a eficiência do seu escritório contábil.</font></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: Helvetica Neue, Helvetica, Arial, sans-serif; font-size: 13.1999998092651px; line-height: 19.7999992370605px; background-color: rgb(255, 255, 255);"><br></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: Helvetica Neue, Helvetica, Arial, sans-serif; font-size: 13.1999998092651px; line-height: 19.7999992370605px; background-color: rgb(255, 255, 255);"><font face="arial, helvetica, sans-serif">Em breve, entraremos em contato.</font></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: Helvetica Neue, Helvetica, Arial, sans-serif; font-size: 13.1999998092651px; line-height: 19.7999992370605px; background-color: rgb(255, 255, 255);"><br></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: Helvetica Neue, Helvetica, Arial, sans-serif; font-size: 13.1999998092651px; line-height: 19.7999992370605px; background-color: rgb(255, 255, 255);"><font face="arial, helvetica, sans-serif">Até logo!</font></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: Helvetica Neue, Helvetica, Arial, sans-serif; font-size: 13.1999998092651px; line-height: 19.7999992370605px; background-color: rgb(255, 255, 255);"><font face="arial, helvetica, sans-serif">Atenciosamente,</font></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: Helvetica Neue, Helvetica, Arial, sans-serif; font-size: 13.1999998092651px; line-height: 19.7999992370605px; background-color: rgb(255, 255, 255);"><font face="arial, helvetica, sans-serif">Equipe Nasajon</font></div></div>', NULL, NULL, 10058, 'Obrigado pelo seu interesse no Integratto Contábil', NULL, 37, NULL);
            INSERT INTO email.templates
            ("template", categoria, descricao, conteudo, lastupdate, versao, tenant, assunto, codigo, empresa, remetente)
            VALUES('31675ffe-9425-4d8e-ac4c-95691dba22c0'::uuid, NULL, 'Workshop Online eSocial - Da Teoria à Prática (não cliente)', '<div contenteditable="true" class="cke_editable cke_editable_inline cke_contents_ltr cke_focus cke_show_borders" tabindex="0" spellcheck="false" role="textbox" aria-label="Rich Text Editor, editor1" title="Rich Text Editor, editor1" aria-describedby="cke_51" style="position: relative;"><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.1999998092651px; line-height: 19.7999992370605px; background-color: rgb(255, 255, 255);"><span style="font-family:tahoma,geneva,sans-serif;">Olá equipe, temos <strong>não cliente</strong>&nbsp;inscrito no&nbsp;Workshop Online eSocial - Da Teoria à Prática.&nbsp;Seguem abaixo os dados.</span></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.1999998092651px; line-height: 19.7999992370605px; background-color: rgb(255, 255, 255);"><br></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.1999998092651px; line-height: 19.7999992370605px; background-color: rgb(255, 255, 255);"><div class="gmail_default" style="font-size: 13.1999998092651px; line-height: 19.7999992370605px;"><span style="font-family:tahoma,geneva,sans-serif;">Nome: {{nome}}</span></div><div class="gmail_default" style="font-size: 13.1999998092651px; line-height: 19.7999992370605px;"><span style="font-family:tahoma,geneva,sans-serif;">CNPJ/CPF: {{cnpj}}</span></div><div class="gmail_default" style="font-size: 13.1999998092651px; line-height: 19.7999992370605px;"><span style="font-family:tahoma,geneva,sans-serif;">RG: {{RG}}</span></div><div class="gmail_default" style="font-size: 13.1999998092651px; line-height: 19.7999992370605px;"><span style="font-family:tahoma,geneva,sans-serif;">CEP:{{CEP}}</span></div><div class="gmail_default" style="font-size: 13.1999998092651px; line-height: 19.7999992370605px;"><span style="font-family:tahoma,geneva,sans-serif;">Endereço:{{endereço}}</span></div><div class="gmail_default" style="font-size: 13.1999998092651px; line-height: 19.7999992370605px;"><span style="font-family:tahoma,geneva,sans-serif;"><span style="line-height: 19.7999992370605px; color: rgb(34, 34, 34); font-size: 12.8000001907349px; background-color: rgb(255, 255, 255);">Número: {{numero}}(somente números)</span><br style="line-height: 19.7999992370605px; color: rgb(34, 34, 34); font-family: arial, sans-serif; font-size: 12.8000001907349px; background-color: rgb(255, 255, 255);"><span style="line-height: 19.7999992370605px; color: rgb(34, 34, 34); font-size: 12.8000001907349px; background-color: rgb(255, 255, 255);">Complemento: {{complemento}}</span><br style="line-height: 19.7999992370605px; color: rgb(34, 34, 34); font-family: arial, sans-serif; font-size: 12.8000001907349px; background-color: rgb(255, 255, 255);"><span style="line-height: 19.7999992370605px; color: rgb(34, 34, 34); font-size: 12.8000001907349px; background-color: rgb(255, 255, 255);">Bairro: {{bairro}}</span><br style="line-height: 19.7999992370605px; color: rgb(34, 34, 34); font-family: arial, sans-serif; font-size: 12.8000001907349px; background-color: rgb(255, 255, 255);"><span style="line-height: 19.7999992370605px; color: rgb(34, 34, 34); font-size: 12.8000001907349px; background-color: rgb(255, 255, 255);">Cidade: {{cidade}}</span><br style="line-height: 19.7999992370605px; color: rgb(34, 34, 34); font-family: arial, sans-serif; font-size: 12.8000001907349px; background-color: rgb(255, 255, 255);"><span style="line-height: 19.7999992370605px; color: rgb(34, 34, 34); font-size: 12.8000001907349px; background-color: rgb(255, 255, 255);">UF: {{uf}}</span><br style="line-height: 19.7999992370605px; color: rgb(34, 34, 34); font-family: arial, sans-serif; font-size: 12.8000001907349px; background-color: rgb(255, 255, 255);"><span style="line-height: 19.7999992370605px; color: rgb(34, 34, 34); font-size: 12.8000001907349px; background-color: rgb(255, 255, 255);">Tel. comercial: {{telefonecomercial}}</span><br style="line-height: 19.7999992370605px; color: rgb(34, 34, 34); font-family: arial, sans-serif; font-size: 12.8000001907349px; background-color: rgb(255, 255, 255);"><span style="line-height: 19.7999992370605px; color: rgb(34, 34, 34); font-size: 12.8000001907349px; background-color: rgb(255, 255, 255);">E-mail: {{email}}</span><br style="line-height: 19.7999992370605px; color: rgb(34, 34, 34); font-family: arial, sans-serif; font-size: 12.8000001907349px; background-color: rgb(255, 255, 255);"><strong><span style="line-height: 19.7999992370605px; color: rgb(34, 34, 34); font-size: 12.8000001907349px; background-color: rgb(255, 255, 255);">Dados dos alunos:&nbsp;</span></strong><br style="line-height: 19.7999992370605px; color: rgb(34, 34, 34); font-family: arial, sans-serif; font-size: 12.8000001907349px; background-color: rgb(255, 255, 255);"><span style="line-height: 19.7999992370605px; color: rgb(34, 34, 34); font-size: 12.8000001907349px; background-color: rgb(255, 255, 255);">Nome do aluno: {{nomedoaluno}}</span><br style="line-height: 19.7999992370605px; color: rgb(34, 34, 34); font-family: arial, sans-serif; font-size: 12.8000001907349px; background-color: rgb(255, 255, 255);"><span style="line-height: 19.7999992370605px; color: rgb(34, 34, 34); font-size: 12.8000001907349px; background-color: rgb(255, 255, 255);">E-mail do aluno: {{emaildoaluno}}&nbsp;</span></span></div><div class="gmail_default" style="font-size: 13.1999998092651px; line-height: 19.7999992370605px;"><span style="font-family:tahoma,geneva,sans-serif;">Autorizo a emissão do boleto com o valor de R$200: {{autorizado}}</span></div><div class="gmail_default" style="font-size: 13.1999998092651px; line-height: 19.7999992370605px;"><br></div><div class="gmail_default" style="font-size: 13.1999998092651px; line-height: 19.7999992370605px;"><br></div></div></div>', NULL, NULL, 10058, 'Workshop Online eSocial: Não Cliente Inscrito', NULL, 37, NULL);
            INSERT INTO email.templates
            ("template", categoria, descricao, conteudo, lastupdate, versao, tenant, assunto, codigo, empresa, remetente)
            VALUES('03c174b0-1784-4b5e-98de-39a0c62fdfac'::uuid, NULL, 'Formulario de Contato', '<div contenteditable="true" class="cke_editable cke_editable_inline cke_contents_ltr cke_focus cke_show_borders" tabindex="0" spellcheck="false" role="textbox" aria-label="Editor de Rich Text, editor1" title="Editor de Rich Text, editor1" aria-describedby="cke_49" style="position: relative;"><p>Novo contato feito pelo formulário de contato do site Nasajon.</p><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.1999998092651px; line-height: 19.7999992370605px; background-color: rgb(255, 255, 255);"><font face="arial, helvetica, sans-serif">Nome: {{nome}}</font></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.1999998092651px; line-height: 19.7999992370605px; background-color: rgb(255, 255, 255);"><font face="arial, helvetica, sans-serif">Email:&nbsp;</font><span style="font-family: arial, helvetica, sans-serif; font-size: 13.1999998092651px; line-height: 19.7999992370605px;">{{email}}</span></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.1999998092651px; line-height: 19.7999992370605px; background-color: rgb(255, 255, 255);"><font face="arial, helvetica, sans-serif"></font>Telefone: {{telefone}}</div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.1999998092651px; line-height: 19.7999992370605px; background-color: rgb(255, 255, 255);">Estado: {{estado}}</div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.1999998092651px; line-height: 19.7999992370605px; background-color: rgb(255, 255, 255);">Cidade: {{cidade}}</div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.1999998092651px; line-height: 19.7999992370605px; background-color: rgb(255, 255, 255);"><font face="arial, helvetica, sans-serif">Mensagem:&nbsp;</font><span style="font-family: arial, helvetica, sans-serif; font-size: 13.1999998092651px; line-height: 19.7999992370605px;">{{mensagem}}</span></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.1999998092651px; line-height: 19.7999992370605px; background-color: rgb(255, 255, 255);"><br></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.1999998092651px; line-height: 19.7999992370605px; background-color: rgb(255, 255, 255);"><br></div></div>', NULL, NULL, 10058, 'Novo contato pelo site Nasajon', NULL, 37, NULL);
            INSERT INTO email.templates
            ("template", categoria, descricao, conteudo, lastupdate, versao, tenant, assunto, codigo, empresa, remetente)
            VALUES('a6558c82-db03-44c2-b382-2deb10e0c89b'::uuid, NULL, 'Workshop Online eSocial - Da Teoria à Prática (não cliente)2', '<div contenteditable="true" class="cke_editable cke_editable_inline cke_contents_ltr cke_show_borders" tabindex="0" spellcheck="false" role="textbox" aria-label="Editor de Rich Text, editor1" title="Editor de Rich Text, editor1" aria-describedby="cke_51" style="position: relative;"><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.1999998092651px; line-height: 19.7999992370605px; background-color: rgb(255, 255, 255);"><span style="font-family: tahoma, geneva, sans-serif;">Olá equipe, temos&nbsp;<strong>não cliente</strong>&nbsp;inscrito no&nbsp;Workshop Online eSocial - Da Teoria à Prática.&nbsp;Seguem abaixo os dados.</span></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.1999998092651px; line-height: 19.7999992370605px; background-color: rgb(255, 255, 255);"><br></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.1999998092651px; line-height: 19.7999992370605px; background-color: rgb(255, 255, 255);"><div class="gmail_default" style="font-size: 13.1999998092651px; line-height: 19.7999992370605px;"><span style="font-family: tahoma, geneva, sans-serif;">Nome: {{nome}}</span></div><div class="gmail_default" style="font-size: 13.1999998092651px; line-height: 19.7999992370605px;"><span style="font-family: tahoma, geneva, sans-serif;">CNPJ/CPF: {{cnpj}}</span></div><div class="gmail_default" style="font-size: 13.1999998092651px; line-height: 19.7999992370605px;"><span style="font-family: tahoma, geneva, sans-serif;">RG: {{RG}}</span></div><div class="gmail_default" style="font-size: 13.1999998092651px; line-height: 19.7999992370605px;"><span style="font-family: tahoma, geneva, sans-serif;">CEP: {{CEP}}</span></div><div class="gmail_default" style="font-size: 13.1999998092651px; line-height: 19.7999992370605px;"><span style="font-family: tahoma, geneva, sans-serif;">Endereço: {{endereço}}</span></div><div class="gmail_default" style="font-size: 13.1999998092651px; line-height: 19.7999992370605px;"><span style="font-family: tahoma, geneva, sans-serif;"><span style="line-height: 19.7999992370605px; color: rgb(34, 34, 34); font-size: 12.8000001907349px;">Número: {{numero}}</span><br style="line-height: 19.7999992370605px; color: rgb(34, 34, 34); font-family: arial, sans-serif; font-size: 12.8000001907349px;"><span style="line-height: 19.7999992370605px; color: rgb(34, 34, 34); font-size: 12.8000001907349px;">Complemento: {{complemento}}</span><br style="line-height: 19.7999992370605px; color: rgb(34, 34, 34); font-family: arial, sans-serif; font-size: 12.8000001907349px;"><span style="line-height: 19.7999992370605px; color: rgb(34, 34, 34); font-size: 12.8000001907349px;">Bairro: {{bairro}}</span><br style="line-height: 19.7999992370605px; color: rgb(34, 34, 34); font-family: arial, sans-serif; font-size: 12.8000001907349px;"><span style="line-height: 19.7999992370605px; color: rgb(34, 34, 34); font-size: 12.8000001907349px;">Cidade: {{cidade}}</span><br style="line-height: 19.7999992370605px; color: rgb(34, 34, 34); font-family: arial, sans-serif; font-size: 12.8000001907349px;"><span style="line-height: 19.7999992370605px; color: rgb(34, 34, 34); font-size: 12.8000001907349px;">UF: {{uf}}</span><br style="line-height: 19.7999992370605px; color: rgb(34, 34, 34); font-family: arial, sans-serif; font-size: 12.8000001907349px;"><span style="line-height: 19.7999992370605px; color: rgb(34, 34, 34); font-size: 12.8000001907349px;">Tel. comercial: {{telefone}}</span><br style="line-height: 19.7999992370605px; color: rgb(34, 34, 34); font-family: arial, sans-serif; font-size: 12.8000001907349px;"><span style="line-height: 19.7999992370605px; color: rgb(34, 34, 34); font-size: 12.8000001907349px;">E-mail: {{email}}</span><br style="line-height: 19.7999992370605px; color: rgb(34, 34, 34); font-family: arial, sans-serif; font-size: 12.8000001907349px;"><strong><span style="line-height: 19.7999992370605px; color: rgb(34, 34, 34); font-size: 12.8000001907349px;">Dados dos alunos:&nbsp;</span></strong><br style="line-height: 19.7999992370605px; color: rgb(34, 34, 34); font-family: arial, sans-serif; font-size: 12.8000001907349px;"><span style="line-height: 19.7999992370605px; color: rgb(34, 34, 34); font-size: 12.8000001907349px;">Nome do aluno: {{nomedoparticipante}}</span><br style="line-height: 19.7999992370605px; color: rgb(34, 34, 34); font-family: arial, sans-serif; font-size: 12.8000001907349px;"><span style="line-height: 19.7999992370605px; color: rgb(34, 34, 34); font-size: 12.8000001907349px;">E-mail do aluno: {{emaildoparticipante}}&nbsp;</span></span></div><div class="gmail_default" style="font-size: 13.1999998092651px; line-height: 19.7999992370605px;"><span style="font-family: tahoma, geneva, sans-serif;">Autorizo a emissão do boleto com o valor de R$200: {{autorizado}}</span></div></div></div>', NULL, NULL, 10058, 'Workshop Online eSocial: Não Cliente Inscrito', NULL, 37, NULL);
            INSERT INTO email.templates
            ("template", categoria, descricao, conteudo, lastupdate, versao, tenant, assunto, codigo, empresa, remetente)
            VALUES('8f07c057-93c1-463b-9b42-5790e437d563'::uuid, NULL, 'Landing Page - Integratto ERP', '<div contenteditable="true" class="cke_editable cke_editable_inline cke_contents_ltr cke_focus cke_show_borders" tabindex="0" spellcheck="false" role="textbox" aria-label="Editor de Rich Text, editor1" title="Editor de Rich Text, editor1" aria-describedby="cke_51" style="position: relative;"><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: Helvetica Neue, Helvetica, Arial, sans-serif; font-size: 13.1999998092651px; line-height: 19.7999992370605px; background-color: rgb(255, 255, 255);"><font face="arial, helvetica, sans-serif">Olá, {{nome}}</font></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: Helvetica Neue, Helvetica, Arial, sans-serif; font-size: 13.1999998092651px; line-height: 19.7999992370605px; background-color: rgb(255, 255, 255);"><br></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: Helvetica Neue, Helvetica, Arial, sans-serif; font-size: 13.1999998092651px; line-height: 19.7999992370605px; background-color: rgb(255, 255, 255);"><font face="arial, helvetica, sans-serif">Vimos que você tem interesse pelo Integratto ERP e gostaríamos de agendar uma demonstração grátis.</font></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: Helvetica Neue, Helvetica, Arial, sans-serif; font-size: 13.1999998092651px; line-height: 19.7999992370605px; background-color: rgb(255, 255, 255);"><br></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: Helvetica Neue, Helvetica, Arial, sans-serif; font-size: 13.1999998092651px; line-height: 19.7999992370605px; background-color: rgb(255, 255, 255);"><font face="arial, helvetica, sans-serif">Será ótimo conhecer mais sobre o seu negócio e como o nosso sistema integrado pode aumentar a produtividade e a eficiência da gestão da sua empresa.</font></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: Helvetica Neue, Helvetica, Arial, sans-serif; font-size: 13.1999998092651px; line-height: 19.7999992370605px; background-color: rgb(255, 255, 255);"><br></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: Helvetica Neue, Helvetica, Arial, sans-serif; font-size: 13.1999998092651px; line-height: 19.7999992370605px; background-color: rgb(255, 255, 255);"><font face="arial, helvetica, sans-serif">Em breve, entraremos em contato.</font></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: Helvetica Neue, Helvetica, Arial, sans-serif; font-size: 13.1999998092651px; line-height: 19.7999992370605px; background-color: rgb(255, 255, 255);"><br></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: Helvetica Neue, Helvetica, Arial, sans-serif; font-size: 13.1999998092651px; line-height: 19.7999992370605px; background-color: rgb(255, 255, 255);"><font face="arial, helvetica, sans-serif">Até logo!</font></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: Helvetica Neue, Helvetica, Arial, sans-serif; font-size: 13.1999998092651px; line-height: 19.7999992370605px; background-color: rgb(255, 255, 255);"><font face="arial, helvetica, sans-serif">Atenciosamente,</font></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: Helvetica Neue, Helvetica, Arial, sans-serif; font-size: 13.1999998092651px; line-height: 19.7999992370605px; background-color: rgb(255, 255, 255);"><font face="arial, helvetica, sans-serif">Equipe Nasajon</font></div></div>', NULL, NULL, 10058, 'Obrigado pelo seu interesse no Integratto ERP', NULL, 37, NULL);
            INSERT INTO email.templates
            ("template", categoria, descricao, conteudo, lastupdate, versao, tenant, assunto, codigo, empresa, remetente)
            VALUES('055cf714-3586-40d9-bd62-edd997464613'::uuid, NULL, 'WebinarioFranquia - email de retorno', '<p style="line-height: 20.8px;">Ol&aacute;,</p>

            <p style="line-height: 20.8px;">Aqui Claudio Nasajon para avisar que&nbsp;<strong>a sua inscri&ccedil;&atilde;o no Webin&aacute;rio &quot;Como transformar seu neg&oacute;cio numa franquia&quot; foi realizada com sucesso</strong>.</p>

            <p style="line-height: 20.8px;">1h antes do evento enviarei um e-mail para voc&ecirc; contendo o link para participar do encontro online.</p>

            <p style="line-height: 20.8px;"><strong>Para receber um alerta por SMS quinze minutos antes do in&iacute;cio, deixe o seu n&uacute;mero de telefone <a href="https://docs.google.com/forms/d/1zMH3dEibisdGDkL5xh-vTkXlNOmOsvg9lXP4oY4gDwI/viewform?entry.972455649={{email}}&amp;entry.1524700583">neste link:</a></strong></p>

            <p style="line-height: 20.8px;">A prop&oacute;sito: eu organizei as dicas da forma que me pareceu mais l&oacute;gica, mas para ter certeza de que vou poder ajudar VOC&Ecirc;, seria poss&iacute;vel voc&ecirc; responder esta mensagem indicando qual &eacute; o SEU&nbsp;maior desafio ou o problema que voc&ecirc; mais gostaria que eu abordasse nesse webin&aacute;rio?&nbsp;</p>

            <p style="line-height: 20.8px;">Qual &eacute; o assunto que, para voc&ecirc;, eu n&atilde;o posso deixar de abordar no webin&aacute;rio?</p>

            <p style="line-height: 20.8px;">Basta responder a esta mensagem e eu&nbsp;receberei pessoalmente a sua sugest&atilde;o (isso vai me ajudar a organizar o conte&uacute;do para melhor atender as suas expectativas).</p>

            <p style="line-height: 20.8px;">Dese j&aacute; super-obrigado!&nbsp;</p>

            <p style="line-height: 20.8px;">Claudio</p>

            <p style="line-height: 20.8px;"><a href="https://docs.google.com/forms/d/1zMH3dEibisdGDkL5xh-vTkXlNOmOsvg9lXP4oY4gDwI/viewform?entry.972455649={{email}}&amp;entry.1524700583"><strong>N&atilde;o perca a hora!&nbsp;Cadastre o seu telefone para receber um alerta por SMS antes do in&iacute;cio do webin&aacute;rio</strong></a></p>

            <p style="line-height: 20.8px;">&nbsp;</p>

            <p style="line-height: 20.8px;">&nbsp;</p>

            <p style="line-height: 20.8px;">&nbsp;</p>

            <p style="line-height: 20.8px;">&nbsp;</p>', NULL, NULL, 10074, 'Sua inscrição no Webinário "como transformar seu negócio numa franquia"', NULL, NULL, NULL);
            INSERT INTO email.templates
            ("template", categoria, descricao, conteudo, lastupdate, versao, tenant, assunto, codigo, empresa, remetente)
            VALUES('79ff2f5a-318b-4fda-a786-5246c70750dc'::uuid, NULL, 'Mensagem usuário eBook 5 Sinais de que chegou a hora de investir em um ERP', '<p style="line-height: 20.8px;">Ol&aacute;!</p>

            <p style="line-height: 20.8px;">Agradecemos o interesse no eBook&nbsp;&ldquo;5 Sinais de que chegou a hora de investir em um ERP&rdquo;.</p>

            <p style="line-height: 20.8px;"><a href="https://marketingnasajon.s3.amazonaws.com/Ebook-5-sinais-de-que-chegou-a-hora-de-investir-em-um-ERP.pdf">Clique&nbsp;aqui</a>&nbsp;para abrir o conte&uacute;do e acesse-o a qualquer momento.</p>

            <p style="line-height: 20.8px;">Aproveite!&nbsp;</p>

            <p style="line-height: 20.8px;">At&eacute; breve,</p>

            <p style="line-height: 20.8px;">Nasajon Sistemas</p>', NULL, NULL, 10058, '[eBook Gratuito] 5 Sinais de que chegou a hora de investir em um ERP', NULL, NULL, NULL);
            INSERT INTO email.templates
            ("template", categoria, descricao, conteudo, lastupdate, versao, tenant, assunto, codigo, empresa, remetente)
            VALUES('6d3b772e-0885-4719-933d-9bef7ecbfc33'::uuid, NULL, 'Newsletter Nasajon - Encaminhamento Mkt', '<div contenteditable="true" class="cke_editable cke_editable_inline cke_contents_ltr cke_show_borders" tabindex="0" spellcheck="false" role="textbox" aria-label="Editor de Rich Text, editor1" title="Editor de Rich Text, editor1" aria-describedby="cke_49" style="position: relative;"><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: Helvetica Neue, Helvetica, Arial, sans-serif; font-size: 13.1999998092651px; line-height: 19.7999992370605px; background-color: rgb(255, 255, 255);"><font face="arial, helvetica, sans-serif">Olá equipe, temos um novo email na Newsletter. Segue abaixo os dados.</font></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: Helvetica Neue, Helvetica, Arial, sans-serif; font-size: 13.1999998092651px; line-height: 19.7999992370605px; background-color: rgb(255, 255, 255);"><br></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: Helvetica Neue, Helvetica, Arial, sans-serif; font-size: 13.1999998092651px; line-height: 19.7999992370605px; background-color: rgb(255, 255, 255);"><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.1999998092651px; line-height: 19.7999992370605px; background-color: rgb(255, 255, 255);"><font face="arial, helvetica, sans-serif">Nome: {{nome}}</font></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.1999998092651px; line-height: 19.7999992370605px; background-color: rgb(255, 255, 255);"><font face="arial, helvetica, sans-serif">Email:&nbsp;</font><span style="font-family: arial, helvetica, sans-serif; font-size: 13.1999998092651px; line-height: 19.7999992370605px;">{{email}}</span></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.1999998092651px; line-height: 19.7999992370605px; background-color: rgb(255, 255, 255);"><span style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.1999998092651px; line-height: 19.7999992370605px; background-color: rgb(255, 255, 255);">Empresa: {{empresa}}</span></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.1999998092651px; line-height: 19.7999992370605px; background-color: rgb(255, 255, 255);">Telefone: {{telefone}}</div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.1999998092651px; line-height: 19.7999992370605px; background-color: rgb(255, 255, 255);"><br></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.1999998092651px; line-height: 19.7999992370605px; background-color: rgb(255, 255, 255);"><br></div></div></div>', NULL, NULL, 10058, 'Nova inscrição Newsletter', NULL, 37, NULL);
            INSERT INTO email.templates
            ("template", categoria, descricao, conteudo, lastupdate, versao, tenant, assunto, codigo, empresa, remetente)
            VALUES('9b2fa105-9a83-434d-9959-a59925e6eab8'::uuid, NULL, 'Mensagem Educacional para Nasajon', '<div contenteditable="true" class="cke_editable cke_editable_inline cke_contents_ltr cke_show_borders cke_focus" tabindex="0" spellcheck="false" role="textbox" aria-label="Editor de Rich Text, editor1" title="Editor de Rich Text, editor1" aria-describedby="cke_49" style="position: relative;"><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.1999998092651px; line-height: 19.7999992370605px; background-color: rgb(255, 255, 255);"><span style="font-family:courier new,courier,monospace;">Atenção, equipe! O contato abaixo preencheu o formulário da landing page {{sistema}}.</span></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.1999998092651px; line-height: 19.7999992370605px; background-color: rgb(255, 255, 255);"><span style="font-family:courier new,courier,monospace;">Não se esqueçam de cadastrar a mídia de origem no ERP!&nbsp;</span></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.1999998092651px; line-height: 19.7999992370605px; background-color: rgb(255, 255, 255);"><br></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.1999998092651px; line-height: 19.7999992370605px; background-color: rgb(255, 255, 255);"><span style="font-family:courier new,courier,monospace;">Nome: {{nome}}</span></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.1999998092651px; line-height: 19.7999992370605px; background-color: rgb(255, 255, 255);"><span style="font-family:courier new,courier,monospace;">Email:&nbsp;<span style="font-size: 13.1999998092651px; line-height: 19.7999992370605px;">{{email}}</span></span></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.1999998092651px; line-height: 19.7999992370605px; background-color: rgb(255, 255, 255);"><span style="font-family:courier new,courier,monospace;">Telefone:&nbsp;<span style="font-size: 13.1999998092651px; line-height: 19.7999992370605px;">{{telefone}}</span></span></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.1999998092651px; line-height: 19.7999992370605px; background-color: rgb(255, 255, 255);"><span style="font-family:courier new,courier,monospace;">Curso de Interesse:&nbsp;<span style="font-size: 13.1999998092651px; line-height: 19.7999992370605px;">{{programacaocompleta}}</span></span></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.1999998092651px; line-height: 19.7999992370605px; background-color: rgb(255, 255, 255);"><br></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.1999998092651px; line-height: 19.7999992370605px; background-color: rgb(255, 255, 255);"><span style="font-family:courier new,courier,monospace;">Lembrando que o prazo ideal para primeiro contato com o lead são 24 horas.</span></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.1999998092651px; line-height: 19.7999992370605px; background-color: rgb(255, 255, 255);"><span style="font-family:courier new,courier,monospace;">Juntos podemos fazer muito!</span></div></div>', NULL, NULL, 10058, 'Novo Contato Landing Page Nasajon Educacional', NULL, 37, NULL);
            INSERT INTO email.templates
            ("template", categoria, descricao, conteudo, lastupdate, versao, tenant, assunto, codigo, empresa, remetente)
            VALUES('9a55c92d-40e0-4b68-be6a-34936b9f7462'::uuid, NULL, 'Landing Page - Familly Office', '<div contenteditable="true" class="cke_editable cke_editable_inline cke_contents_ltr cke_show_borders cke_focus" tabindex="0" spellcheck="false" role="textbox" aria-label="Editor de Rich Text, editor1" title="Editor de Rich Text, editor1" aria-describedby="cke_49" style="position: relative;"><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.1999998092651px; line-height: 19.7999992370605px; background-color: rgb(255, 255, 255);"><font face="arial, helvetica, sans-serif">Olá,</font></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.1999998092651px; line-height: 19.7999992370605px; background-color: rgb(255, 255, 255);"><br></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.1999998092651px; line-height: 19.7999992370605px; background-color: rgb(255, 255, 255);"><font face="arial, helvetica, sans-serif">Vimos que você tem interesse pelo Familly Office e gostaríamos de agendar uma demonstração.</font></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.1999998092651px; line-height: 19.7999992370605px; background-color: rgb(255, 255, 255);"><br></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.1999998092651px; line-height: 19.7999992370605px; background-color: rgb(255, 255, 255);"><font face="arial, helvetica, sans-serif">Será ótimo conhecer mais sobre o seu negócio e como o nosso sistema integrado pode aumentar a produtividade e a eficiência da gestão da sua empresa.</font></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.1999998092651px; line-height: 19.7999992370605px; background-color: rgb(255, 255, 255);"><br></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.1999998092651px; line-height: 19.7999992370605px; background-color: rgb(255, 255, 255);"><font face="arial, helvetica, sans-serif">Em breve, entraremos em contato.</font></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.1999998092651px; line-height: 19.7999992370605px; background-color: rgb(255, 255, 255);"><br></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.1999998092651px; line-height: 19.7999992370605px; background-color: rgb(255, 255, 255);"><font face="arial, helvetica, sans-serif">Até logo!</font></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.1999998092651px; line-height: 19.7999992370605px; background-color: rgb(255, 255, 255);"><font face="arial, helvetica, sans-serif">Atenciosamente,</font></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.1999998092651px; line-height: 19.7999992370605px; background-color: rgb(255, 255, 255);"><font face="arial, helvetica, sans-serif">Equipe Nasajon</font></div></div>', NULL, NULL, 10058, 'Obrigado pelo seu interesse pelo Familly Office', NULL, 37, NULL);
            INSERT INTO email.templates
            ("template", categoria, descricao, conteudo, lastupdate, versao, tenant, assunto, codigo, empresa, remetente)
            VALUES('06366708-96c7-4292-bab9-597f18e2e732'::uuid, NULL, 'Landing Page - Educacional', '<div contenteditable="true" class="cke_editable cke_editable_inline cke_contents_ltr cke_focus cke_show_borders" tabindex="0" spellcheck="false" role="textbox" aria-label="Editor de Rich Text, editor1" title="Editor de Rich Text, editor1" aria-describedby="cke_49" style="position: relative;"><p><font size="3">Olá, {{nome}}<br><br>Vimos que você tem interesse pelo curso {{cursovisitado}}.<br>Veja abaixo a programação completa do curso da Nasajon Educacional.</font></p><p><a data-cke-saved-href="http://nasajon.com.br/sites/default/files/{{programacaocompleta}}" href="http://nasajon.com.br/sites/default/files/{{programacaocompleta}}">http://nasajon.com.br/sites/default/files/{{programacaocompleta}}</a><br></p><p><br><font size="3">Em breve, entraremos em contato com você.</font></p></div>', NULL, NULL, 10058, 'Obrigado pelo seu interesse pela Nasajon Educacional', NULL, 37, NULL);
            INSERT INTO email.templates
            ("template", categoria, descricao, conteudo, lastupdate, versao, tenant, assunto, codigo, empresa, remetente)
            VALUES('cd0d3956-96ec-411f-8972-a9db85caabd7'::uuid, NULL, 'Landing Page - Persona', '<div contenteditable="true" class="cke_editable cke_editable_inline cke_contents_ltr cke_focus cke_show_borders" tabindex="0" spellcheck="false" role="textbox" aria-label="Editor de Rich Text, editor1" title="Editor de Rich Text, editor1" aria-describedby="cke_51" style="position: relative;"><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: Helvetica Neue, Helvetica, Arial, sans-serif; font-size: 13.1999998092651px; line-height: 19.7999992370605px; background-color: rgb(255, 255, 255);"><font face="arial, helvetica, sans-serif">Olá, {{nome}}</font></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: Helvetica Neue, Helvetica, Arial, sans-serif; font-size: 13.1999998092651px; line-height: 19.7999992370605px; background-color: rgb(255, 255, 255);"><br></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: Helvetica Neue, Helvetica, Arial, sans-serif; font-size: 13.1999998092651px; line-height: 19.7999992370605px; background-color: rgb(255, 255, 255);"><font face="arial, helvetica, sans-serif">Vimos que você tem interesse pelo Persona e gostaríamos de agendar uma demonstração grátis.</font></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: Helvetica Neue, Helvetica, Arial, sans-serif; font-size: 13.1999998092651px; line-height: 19.7999992370605px; background-color: rgb(255, 255, 255);"><br></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: Helvetica Neue, Helvetica, Arial, sans-serif; font-size: 13.1999998092651px; line-height: 19.7999992370605px; background-color: rgb(255, 255, 255);"><font face="arial, helvetica, sans-serif">Será ótimo conhecer mais sobre o seu negócio e como o nosso sistema pode aumentar a velocidade e segurança nas rotinas mensais e anuais do Departamento de Pessoal e Recursos Humanos.</font></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: Helvetica Neue, Helvetica, Arial, sans-serif; font-size: 13.1999998092651px; line-height: 19.7999992370605px; background-color: rgb(255, 255, 255);"><br></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: Helvetica Neue, Helvetica, Arial, sans-serif; font-size: 13.1999998092651px; line-height: 19.7999992370605px; background-color: rgb(255, 255, 255);"><font face="arial, helvetica, sans-serif">Em breve, entraremos em contato.</font></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: Helvetica Neue, Helvetica, Arial, sans-serif; font-size: 13.1999998092651px; line-height: 19.7999992370605px; background-color: rgb(255, 255, 255);"><br></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: Helvetica Neue, Helvetica, Arial, sans-serif; font-size: 13.1999998092651px; line-height: 19.7999992370605px; background-color: rgb(255, 255, 255);"><font face="arial, helvetica, sans-serif">Até logo!</font></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: Helvetica Neue, Helvetica, Arial, sans-serif; font-size: 13.1999998092651px; line-height: 19.7999992370605px; background-color: rgb(255, 255, 255);"><font face="arial, helvetica, sans-serif">Atenciosamente,</font></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: Helvetica Neue, Helvetica, Arial, sans-serif; font-size: 13.1999998092651px; line-height: 19.7999992370605px; background-color: rgb(255, 255, 255);"><font face="arial, helvetica, sans-serif">Equipe Nasajon</font></div></div>', NULL, NULL, 10058, 'Obrigado pelo seu interesse no Persona', NULL, 37, NULL);
            INSERT INTO email.templates
            ("template", categoria, descricao, conteudo, lastupdate, versao, tenant, assunto, codigo, empresa, remetente)
            VALUES('e010d208-22c6-4552-a424-c69e08d63d31'::uuid, NULL, 'diagnotico_esocial', '<div contenteditable="true" class="cke_editable cke_editable_inline cke_contents_ltr cke_show_borders cke_focus" tabindex="0" spellcheck="false" role="textbox" aria-label="Editor de Rich Text, editor1" title="Editor de Rich Text, editor1" aria-describedby="cke_49" style="position: relative;"><p>Digite a mensagem aqui!</p></div>', NULL, NULL, 10058, 'Diagnostico', 'diagnotico_esocial', 37, NULL);
            INSERT INTO email.templates
            ("template", categoria, descricao, conteudo, lastupdate, versao, tenant, assunto, codigo, empresa, remetente)
            VALUES('c1f4fad7-78b6-4ea8-8c23-75196b1c708d'::uuid, NULL, 'Landing Page - Avaliação de Desempenho', '<div contenteditable="true" class="cke_editable cke_editable_inline cke_contents_ltr cke_focus cke_show_borders" tabindex="0" spellcheck="false" role="textbox" aria-label="Editor de Rich Text, editor1" title="Editor de Rich Text, editor1" aria-describedby="cke_49" style="position: relative;"><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.1999998092651px; line-height: 19.7999992370605px; background-color: rgb(255, 255, 255);"><font face="arial, helvetica, sans-serif">Olá, {{nome}}</font></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.1999998092651px; line-height: 19.7999992370605px; background-color: rgb(255, 255, 255);"><br></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.1999998092651px; line-height: 19.7999992370605px; background-color: rgb(255, 255, 255);"><font face="arial, helvetica, sans-serif">Vimos que você tem interesse pelo Avaliação de Desempenho&nbsp;e gostaríamos de agendar uma demonstração grátis.</font></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.1999998092651px; line-height: 19.7999992370605px; background-color: rgb(255, 255, 255);"><br></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.1999998092651px; line-height: 19.7999992370605px; background-color: rgb(255, 255, 255);"><font face="arial, helvetica, sans-serif">Será ótimo conhecer mais sobre o seu negócio e como o nosso sistema pode aumentar a produtividade e a eficiência da gestão de talentos da sua empresa.</font></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.1999998092651px; line-height: 19.7999992370605px; background-color: rgb(255, 255, 255);"><br></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.1999998092651px; line-height: 19.7999992370605px; background-color: rgb(255, 255, 255);"><font face="arial, helvetica, sans-serif">Em breve, entraremos em contato.</font></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.1999998092651px; line-height: 19.7999992370605px; background-color: rgb(255, 255, 255);"><br></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.1999998092651px; line-height: 19.7999992370605px; background-color: rgb(255, 255, 255);"><font face="arial, helvetica, sans-serif">Até logo!</font></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.1999998092651px; line-height: 19.7999992370605px; background-color: rgb(255, 255, 255);"><font face="arial, helvetica, sans-serif">Atenciosamente,</font></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.1999998092651px; line-height: 19.7999992370605px; background-color: rgb(255, 255, 255);"><font face="arial, helvetica, sans-serif">Equipe Nasajon</font></div></div>', NULL, NULL, 10058, 'Obrigado pelo seu interesse pelo Avaliação de Desempenho', NULL, 37, NULL);
            INSERT INTO email.templates
            ("template", categoria, descricao, conteudo, lastupdate, versao, tenant, assunto, codigo, empresa, remetente)
            VALUES('ddcb36f2-652d-4d69-b46c-668abdfeb370'::uuid, NULL, 'Novo Contato - email MKT NF Arquivo', '<div contenteditable="true" class="cke_editable cke_editable_inline cke_contents_ltr cke_show_borders" tabindex="0" spellcheck="false" role="textbox" aria-label="Editor de Rich Text, editor1" title="Editor de Rich Text, editor1" aria-describedby="cke_49" style="position: relative;"><p>Olá equipe, temos um novo contato que deseja receber mais informações sobre a&nbsp;indicação do NF Arquivo para clientes. Seguem os dados:</p><p>Nome: {{nome}}<br>Email: {{email}}<br>Empresa: {{empresa}}<br>Telefone: {{telefone}}</p></div>', NULL, NULL, 10058, 'Novo Contato - email MKT NF Arquivo', NULL, 37, NULL);
            INSERT INTO email.templates
            ("template", categoria, descricao, conteudo, lastupdate, versao, tenant, assunto, codigo, empresa, remetente)
            VALUES('c34dba8d-d494-4c2c-95d0-b10f275550a0'::uuid, NULL, 'EM Contato interessado: Campanha de final de ano', '<p style="line-height: 20.8px;">Aten&ccedil;&atilde;o, equipe! O contato est&aacute; interessado&nbsp;no Integratto ERP, atrav&eacute;s da&nbsp;<strong>Campanha de final de ano - Email mkt:</strong></p>

            <div>&nbsp;</div>

            <div>
            <div class="gmail_default" style="color: rgb(33, 33, 33); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px;"><span style="font-family: verdana, geneva, sans-serif;">Nome: {{nome}}</span></div>

            <div class="gmail_default" style="color: rgb(33, 33, 33); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px;"><span style="font-family: verdana, geneva, sans-serif;">Email:&nbsp;<span style="font-size: 13.2px; line-height: 19.8px;">{{email}}</span></span></div>

            <div class="gmail_default" style="color: rgb(33, 33, 33); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px;"><span style="font-family: verdana, geneva, sans-serif;">Telefone:&nbsp;<span style="font-size: 13.2px; line-height: 19.8px;">{{telefone}}</span></span></div>

            <div class="gmail_default" style="color: rgb(33, 33, 33); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px;"><span style="font-family: verdana, geneva, sans-serif;">Estado:&nbsp;<span style="font-size: 13.2px; line-height: 19.8px;">{{estado}}</span></span>​</div>

            <div class="gmail_default" style="color: rgb(33, 33, 33); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px;"><span style="font-family: verdana, geneva, sans-serif;">Mensagem:&nbsp;<span style="font-size: 13.2px; line-height: 19.8px;">{{mensagem}}</span></span></div>

            <div class="gmail_default" style="color: rgb(33, 33, 33); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px;"><span style="font-family: verdana, geneva, sans-serif;"><span style="font-size: 13.2px; line-height: 19.8px;">Cliente Nasajon: {{clientenasajon}}</span></span>

            <div class="gmail_default" style="font-size: 13.2px; line-height: 19.8px;"><span style="font-family: verdana, geneva, sans-serif;"><span style="font-size: 13.2px; line-height: 19.8px;"><span style="font-size: 13.2px; line-height: 19.8px;">Empresa: {{empresa}}</span></span></span></div>
            </div>
            </div>', NULL, NULL, 10058, 'EM Contato interessado: Campanha de final de ano', NULL, NULL, NULL);
            INSERT INTO email.templates
            ("template", categoria, descricao, conteudo, lastupdate, versao, tenant, assunto, codigo, empresa, remetente)
            VALUES('bc658715-5bff-490f-90e3-3de8c027119c'::uuid, NULL, 'Email MKT indicação', '<div contenteditable="true" class="cke_editable cke_editable_inline cke_contents_ltr cke_show_borders cke_focus" tabindex="0" spellcheck="false" role="textbox" aria-label="Editor de Rich Text, editor1" title="Editor de Rich Text, editor1" aria-describedby="cke_49" style="position: relative;"><p>Olá equipe, temos um novo contato que deseja receber mais informações sobre a indicação do NF Arquivo para clientes. Seguem os dados:</p><p>Nome: {{nome}}<br>Email: {{email}}<br>Telefone: {{telefone}}<br>Empresa Indicada: {{empresadocliente}}<br>Empresa Contador: {{suaempresa}}</p></div>', NULL, NULL, 10058, 'Email MKT indicação NF Arquivo', NULL, 37, NULL);
            INSERT INTO email.templates
            ("template", categoria, descricao, conteudo, lastupdate, versao, tenant, assunto, codigo, empresa, remetente)
            VALUES('27586130-f715-46cc-909f-22e6f081deea'::uuid, NULL, 'Formulário Curso ECF Educacional', '<div contenteditable="true" class="cke_editable cke_editable_inline cke_contents_ltr cke_show_borders" tabindex="0" spellcheck="false" role="textbox" aria-label="Editor de Rich Text, editor1" title="Editor de Rich Text, editor1" aria-describedby="cke_51" style="position: relative;"><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.1999998092651px; line-height: 19.7999992370605px; background-color: rgb(255, 255, 255);"><span style="font-size:12px;"><span style="font-family:arial,helvetica,sans-serif;">Olá equipe, temos um novo email na Newsletter. Segue abaixo os dados.</span></span></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.1999998092651px; line-height: 19.7999992370605px; background-color: rgb(255, 255, 255);"><span style="font-size:12px;"><span style="font-family:arial,helvetica,sans-serif;"><br></span></span></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.1999998092651px; line-height: 19.7999992370605px; background-color: rgb(255, 255, 255);"><div class="gmail_default" style="font-size: 13.1999998092651px; line-height: 19.7999992370605px;"><span style="font-size:12px;"><span style="font-family:arial,helvetica,sans-serif;">Nome: {{nome}}</span></span></div><div class="gmail_default" style="font-size: 13.1999998092651px; line-height: 19.7999992370605px;"><span style="font-size:12px;"><span style="font-family:arial,helvetica,sans-serif;"><span style="color: rgb(33, 33, 33); line-height: 19.7999992370605px; background-color: rgb(255, 255, 255);">Empresa: {{suaempresa}}</span><br></span></span></div><div class="gmail_default" style="font-size: 13.1999998092651px; line-height: 19.7999992370605px;"><span style="font-size:12px;"><span style="font-family:arial,helvetica,sans-serif;">Email:&nbsp;<span style="line-height: 19.7999992370605px;">{{email}}</span><br></span></span></div><div class="gmail_default" style="font-size: 13.1999998092651px; line-height: 19.7999992370605px;"><span style="font-size:12px;"><span style="font-family:arial,helvetica,sans-serif;">Telefone: {{telefone}}</span></span></div><div class="gmail_default" style="font-size: 13.1999998092651px; line-height: 19.7999992370605px;"><span style="font-size:12px;"><span style="font-family:arial,helvetica,sans-serif;"></span></span><br></div></div></div>', NULL, NULL, 10058, 'Formulário Curso ECF Educacional', NULL, 37, NULL);
            INSERT INTO email.templates
            ("template", categoria, descricao, conteudo, lastupdate, versao, tenant, assunto, codigo, empresa, remetente)
            VALUES('f4fb7f6b-2b52-4d9c-a631-5d94186ed804'::uuid, NULL, 'Curso ECF Educacional', '<div contenteditable="true" class="cke_editable cke_editable_inline cke_contents_ltr cke_show_borders" tabindex="0" spellcheck="false" role="textbox" aria-label="Editor de Rich Text, editor1" title="Editor de Rich Text, editor1" aria-describedby="cke_51" style="position: relative;"><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.1999998092651px; line-height: 19.7999992370605px; background-color: rgb(255, 255, 255);"><span style="font-size:12px;"><span style="font-family:arial,helvetica,sans-serif;">Olá equipe, temos um inscrito no Curso ECF Educacional.&nbsp;Seguem abaixo os dados.</span></span></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.1999998092651px; line-height: 19.7999992370605px; background-color: rgb(255, 255, 255);"><span style="font-size:12px;"><span style="font-family:arial,helvetica,sans-serif;"><br></span></span></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.1999998092651px; line-height: 19.7999992370605px; background-color: rgb(255, 255, 255);"><div class="gmail_default" style="font-size: 13.1999998092651px; line-height: 19.7999992370605px;"><span style="font-size:12px;"><span style="font-family:arial,helvetica,sans-serif;">Nome: {{nome}}</span></span></div><div class="gmail_default" style="font-size: 13.1999998092651px; line-height: 19.7999992370605px;"><span style="font-size:12px;"><span style="font-family:arial,helvetica,sans-serif;"><span style="line-height: 19.7999992370605px;">Empresa: {{suaempresa}}</span></span></span></div><div class="gmail_default" style="font-size: 13.1999998092651px; line-height: 19.7999992370605px;"><span style="font-size:12px;"><span style="font-family:arial,helvetica,sans-serif;">Email:&nbsp;<span style="line-height: 19.7999992370605px;">{{email}}</span></span></span></div><div class="gmail_default" style="font-size: 13.1999998092651px; line-height: 19.7999992370605px;"><span style="font-size:12px;"><span style="font-family:arial,helvetica,sans-serif;">Telefone: {{telefone}}</span></span></div><div class="gmail_default" style="font-size: 13.1999998092651px; line-height: 19.7999992370605px;"><span style="font-size:12px;"><span style="font-family:arial,helvetica,sans-serif;">Autorizo a emissão do boleto com o valor de R$50 por participante:<span style="line-height: 19.7999992370605px;">{{</span>autorizado<span style="line-height: 19.7999992370605px;">}}</span></span></span></div></div></div>', NULL, NULL, 10058, 'Curso ECF Educacional', NULL, 37, NULL);
            INSERT INTO email.templates
            ("template", categoria, descricao, conteudo, lastupdate, versao, tenant, assunto, codigo, empresa, remetente)
            VALUES('5d30c576-ac77-437a-8bdc-05c60ae05b6a'::uuid, NULL, 'Curso E.C.F. Educacional', '<div contenteditable="true" class="cke_editable cke_editable_inline cke_contents_ltr cke_show_borders" tabindex="0" spellcheck="false" role="textbox" aria-label="Editor de Rich Text, editor1" title="Editor de Rich Text, editor1" aria-describedby="cke_51" style="position: relative;"><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.1999998092651px; line-height: 19.7999992370605px; background-color: rgb(255, 255, 255);"><span style="font-size: 12px;"><span style="font-family: arial, helvetica, sans-serif;">Olá equipe, temos um inscrito no Curso ECF Educacional.&nbsp;Seguem abaixo os dados.</span></span></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.1999998092651px; line-height: 19.7999992370605px; background-color: rgb(255, 255, 255);"><br></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.1999998092651px; line-height: 19.7999992370605px; background-color: rgb(255, 255, 255);"><div class="gmail_default" style="font-size: 13.1999998092651px; line-height: 19.7999992370605px;"><span style="font-size: 12px;"><span style="font-family: arial, helvetica, sans-serif;">Nome: {{nome}}</span></span></div><div class="gmail_default" style="font-size: 13.1999998092651px; line-height: 19.7999992370605px;"><span style="font-size: 12px;"><span style="font-family: arial, helvetica, sans-serif;">Empresa: {{suaempresa}}</span></span></div><div class="gmail_default" style="font-size: 13.1999998092651px; line-height: 19.7999992370605px;"><span style="font-size: 12px;"><span style="font-family: arial, helvetica, sans-serif;">Email:&nbsp;<span style="line-height: 19.7999992370605px;">{{email}}</span></span></span></div><div class="gmail_default" style="font-size: 13.1999998092651px; line-height: 19.7999992370605px;"><span style="font-size: 12px;"><span style="font-family: arial, helvetica, sans-serif;">Telefone: {{telefone}}</span></span></div><div class="gmail_default" style="font-size: 13.1999998092651px; line-height: 19.7999992370605px;"><span style="font-size: 12px;"><span style="font-family: arial, helvetica, sans-serif;">Autorizo a emissão do boleto com o valor de R$50 por participante:<span style="line-height: 19.7999992370605px;">{{</span>autorizado<span style="line-height: 19.7999992370605px;">}}</span></span></span></div></div></div>', NULL, NULL, 10058, 'Curso ECF Educacional', NULL, 37, NULL);
            INSERT INTO email.templates
            ("template", categoria, descricao, conteudo, lastupdate, versao, tenant, assunto, codigo, empresa, remetente)
            VALUES('829c7f61-bb45-4c8b-abb6-9f38105b2427'::uuid, NULL, 'Curso ECF. Educacional', '<div contenteditable="true" class="cke_editable cke_editable_inline cke_contents_ltr cke_show_borders cke_focus" tabindex="0" spellcheck="false" role="textbox" aria-label="Editor de Rich Text, editor1" title="Editor de Rich Text, editor1" aria-describedby="cke_51" style="position: relative;"><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.1999998092651px; line-height: 19.7999992370605px; background-color: rgb(255, 255, 255);"><span style="font-size: 12px;"><span style="font-family: arial, helvetica, sans-serif;">Olá equipe, temos um inscrito no Curso ECF Educacional.&nbsp;Seguem abaixo os dados.</span></span></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.1999998092651px; line-height: 19.7999992370605px; background-color: rgb(255, 255, 255);"><br></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.1999998092651px; line-height: 19.7999992370605px; background-color: rgb(255, 255, 255);"><div class="gmail_default" style="font-size: 13.1999998092651px; line-height: 19.7999992370605px;"><span style="font-size: 12px;"><span style="font-family: arial, helvetica, sans-serif;">Nome: {{nome}}</span></span></div><div class="gmail_default" style="font-size: 13.1999998092651px; line-height: 19.7999992370605px;"><span style="font-size: 12px;"><span style="font-family: arial, helvetica, sans-serif;">Empresa: {{suaempresa}}</span></span></div><div class="gmail_default" style="font-size: 13.1999998092651px; line-height: 19.7999992370605px;"><span style="font-size: 12px;"><span style="font-family: arial, helvetica, sans-serif;">Email:&nbsp;<span style="line-height: 19.7999992370605px;">{{email}}</span></span></span></div><div class="gmail_default" style="font-size: 13.1999998092651px; line-height: 19.7999992370605px;"><span style="font-size: 12px;"><span style="font-family: arial, helvetica, sans-serif;">Telefone: {{telefone}}</span></span></div><div class="gmail_default" style="font-size: 13.1999998092651px; line-height: 19.7999992370605px;"><span style="font-size: 12px;"><span style="font-family: arial, helvetica, sans-serif;">Autorizo a emissão do boleto com o valor de R$50 por participante:{{autorizado}}</span></span></div></div></div>', NULL, NULL, 10058, 'Curso ECF Educacional', NULL, 37, NULL);
            INSERT INTO email.templates
            ("template", categoria, descricao, conteudo, lastupdate, versao, tenant, assunto, codigo, empresa, remetente)
            VALUES('51fcc44c-e193-43af-8fbf-730c85f017e1'::uuid, NULL, 'Curso ECF Educacional: contato turma extra', '<div contenteditable="true" class="cke_editable cke_editable_inline cke_contents_ltr cke_show_borders" tabindex="0" spellcheck="false" role="textbox" aria-label="Editor de Rich Text, editor1" title="Editor de Rich Text, editor1" aria-describedby="cke_51" style="position: relative;"><p><span style="font-size:12px;"><span style="font-family:arial,helvetica,sans-serif;">Gente,<br></span></span></p><p><span style="font-size:12px;"><span style="font-family:arial,helvetica,sans-serif;">Novo contato para uma turma extra do&nbsp;Curso ECF Educacional:&nbsp;</span></span></p><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.1999998092651px; line-height: 19.7999992370605px; background-color: rgb(255, 255, 255);"><span style="font-size:12px;"><span style="font-family:arial,helvetica,sans-serif;">Nome: {{nome}}</span></span></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.1999998092651px; line-height: 19.7999992370605px; background-color: rgb(255, 255, 255);"><span style="font-size:12px;"><span style="font-family:arial,helvetica,sans-serif;">Email:&nbsp;<span style="line-height: 19.7999992370605px;">{{email}}</span></span></span></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.1999998092651px; line-height: 19.7999992370605px; background-color: rgb(255, 255, 255);"><span style="font-size:12px;"><span style="font-family:arial,helvetica,sans-serif;">Telefone: {{telefone}}</span></span></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.1999998092651px; line-height: 19.7999992370605px; background-color: rgb(255, 255, 255);"><span style="font-family: arial, helvetica, sans-serif; font-size: 13.1999998092651px; line-height: 19.7999992370605px;"></span></div></div>', NULL, NULL, 10058, 'Curso ECF Educacional: contato turma extra', NULL, 37, NULL);
            INSERT INTO email.templates
            ("template", categoria, descricao, conteudo, lastupdate, versao, tenant, assunto, codigo, empresa, remetente)
            VALUES('9f9c7171-3380-4294-bc33-1cfafdfac42e'::uuid, NULL, 'ECF Curso Educacional: contato turma extra', '<div contenteditable="true" class="cke_editable cke_editable_inline cke_contents_ltr cke_show_borders" tabindex="0" spellcheck="false" role="textbox" aria-label="Editor de Rich Text, editor1" title="Editor de Rich Text, editor1" aria-describedby="cke_51" style="position: relative;"><p><span style="font-size: 12px;"><span style="font-family: arial, helvetica, sans-serif;">Olá equipe, temos um interessado em uma turma extra do Curso ECF Educacional.&nbsp;Seguem abaixo os dados:</span></span></p><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.1999998092651px; line-height: 19.7999992370605px; background-color: rgb(255, 255, 255);"><br></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.1999998092651px; line-height: 19.7999992370605px; background-color: rgb(255, 255, 255);"><div class="gmail_default" style="font-size: 13.1999998092651px; line-height: 19.7999992370605px;"><span style="font-size: 12px;"><span style="font-family: arial, helvetica, sans-serif;">Nome: {{nome}}</span></span></div><div class="gmail_default" style="font-size: 13.1999998092651px; line-height: 19.7999992370605px;"><span style="font-size: 12px;"><span style="font-family: arial, helvetica, sans-serif;">Empresa: {{suaempresa}}</span></span></div><div class="gmail_default" style="font-size: 13.1999998092651px; line-height: 19.7999992370605px;"><span style="font-size: 12px;"><span style="font-family: arial, helvetica, sans-serif;">Email:&nbsp;<span style="line-height: 19.7999992370605px;">{{email}}</span></span></span></div><div class="gmail_default" style="font-size: 13.1999998092651px; line-height: 19.7999992370605px;"><span style="font-size: 12px;"><span style="font-family: arial, helvetica, sans-serif;">Telefone: {{telefone}}</span></span></div></div></div>', NULL, NULL, 10058, 'Curso ECF Educacional: contato turma extra', NULL, 37, NULL);
            INSERT INTO email.templates
            ("template", categoria, descricao, conteudo, lastupdate, versao, tenant, assunto, codigo, empresa, remetente)
            VALUES('041d189f-39d2-4107-bde6-15d836a5d05b'::uuid, NULL, 'Workshop Online eSocial - Da Teoria à Prática', '<div contenteditable="true" class="cke_editable cke_editable_inline cke_contents_ltr cke_show_borders cke_focus" tabindex="0" spellcheck="false" role="textbox" aria-label="Editor de Rich Text, editor1" title="Editor de Rich Text, editor1" aria-describedby="cke_51" style="position: relative;"><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.1999998092651px; line-height: 19.7999992370605px; background-color: rgb(255, 255, 255);"><span style="font-family: verdana, geneva, sans-serif;"><span style="font-size: 12px;">Olá equipe, temos cliente&nbsp;inscrito no&nbsp;</span>Workshop Online eSocial - Da Teoria à Prática<span style="font-size: 12px;">.&nbsp;Seguem abaixo os dados.</span></span></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.1999998092651px; line-height: 19.7999992370605px; background-color: rgb(255, 255, 255);"><br></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.1999998092651px; line-height: 19.7999992370605px; background-color: rgb(255, 255, 255);"><div class="gmail_default" style="font-size: 13.1999998092651px; line-height: 19.7999992370605px;"><span style="font-family: verdana, geneva, sans-serif;"><span style="font-size: 12px;">Nome: {{nome}}</span></span></div><div class="gmail_default" style="font-size: 13.1999998092651px; line-height: 19.7999992370605px;"><span style="font-family: verdana, geneva, sans-serif;"><span style="font-size: 12px;">CNPJ: {{cnpj}}</span></span></div><div class="gmail_default" style="font-size: 13.1999998092651px; line-height: 19.7999992370605px;"><span style="font-family: verdana, geneva, sans-serif;"><span style="font-size: 12px;">Email:&nbsp;<span style="line-height: 19.7999992370605px;">{{email}}</span></span></span></div><div class="gmail_default" style="font-size: 13.1999998092651px; line-height: 19.7999992370605px;"><span style="font-family: verdana, geneva, sans-serif;"><span style="font-size: 12px;">Telefone: {{telefone}}</span></span></div><div class="gmail_default" style="font-size: 13.1999998092651px; line-height: 19.7999992370605px;"><span style="font-family: verdana, geneva, sans-serif;"><span style="font-size: 12px;">Autorizo a emissão do boleto com o valor de R$200: {{autorizado}}</span></span></div></div></div>', NULL, NULL, 10058, 'Workshop Online eSocial: Cliente Inscrito', NULL, 37, NULL);
            INSERT INTO email.templates
            ("template", categoria, descricao, conteudo, lastupdate, versao, tenant, assunto, codigo, empresa, remetente)
            VALUES('c64677ce-50ec-4e59-ac6f-399d411716dc'::uuid, NULL, 'EM Contato interessado: Infográfico Boleto com e sem registro', '<p>Gente,&nbsp;</p>

            <p>O contato abaixo realizou o download do&nbsp;Infogr&aacute;fico &quot;<strong>Boleto com e sem registro: qual &eacute; a diferen&ccedil;a</strong>?<strong>&quot;</strong>&nbsp;via&nbsp;<strong>Email mkt</strong>:</p>

            <p>Nome: {{nome}}<br />
            Email: {{email}}<br />
            Telefone: {{telefone}}<br />
            Empresa: {{empresa}}</p>', NULL, NULL, 10058, 'EM Contato interessado: Infográfico Boleto com e sem registro', NULL, NULL, NULL);
            INSERT INTO email.templates
            ("template", categoria, descricao, conteudo, lastupdate, versao, tenant, assunto, codigo, empresa, remetente)
            VALUES('d4ca26e2-f91e-4a31-9af1-545c3198aaaf'::uuid, NULL, 'Nova mensagem Family Office', '<div contenteditable="true" class="cke_editable cke_editable_inline cke_contents_ltr cke_show_borders cke_focus" tabindex="0" spellcheck="false" role="textbox" aria-label="Editor de Rich Text, editor1" title="Editor de Rich Text, editor1" aria-describedby="cke_51" style="position: relative;"><p><span style="font-size:12px;"><span style="font-family:verdana,geneva,sans-serif;">Olá,</span></span></p><p><span style="font-size:12px;"><span style="font-family:verdana,geneva,sans-serif;">Recebi o seu contato através da página do&nbsp;Family Office e gostaria de agendar uma demonstração.</span></span></p><p><span style="font-size:12px;"><span style="font-family:verdana,geneva,sans-serif;">Será ótimo conhecer mais sobre o seu negócio e como o nosso software pode ser eficiente na gestão de patrimônio com tecnologia e segurança.</span></span></p><p><span style="font-size:12px;"><span style="font-family:verdana,geneva,sans-serif;">Vamos marcar um café?</span></span></p><p><span style="font-size:12px;"><span style="font-family:verdana,geneva,sans-serif;">Aproveito para te enviar um lançamento exclusivo para clientes,&nbsp;o e-book <u><a data-cke-saved-href="http://www.nasajon.com.br/sites/default/files/ebook_6habitosdeverdadeirospensadoresestrategicos.pdf" href="http://www.nasajon.com.br/sites/default/files/ebook_6habitosdeverdadeirospensadoresestrategicos.pdf">6 Hábitos de Verdadeiros Pensadores Estratégicos</a>,</u>&nbsp;produzido pelo nosso Presidente e Fundador Claudio Nasajon.&nbsp;Para ler, é só clicar no link acima.&nbsp;</span></span></p><p><span style="font-size:12px;"><span style="font-family:verdana,geneva,sans-serif;">Até logo!</span></span></p><p><span style="font-size:12px;"><span style="font-family:verdana,geneva,sans-serif;">Amanda Vieira<br>Gerente Comercial</span></span><br></p></div>', NULL, NULL, 10058, 'Um convite para um café', NULL, 37, NULL);
            INSERT INTO email.templates
            ("template", categoria, descricao, conteudo, lastupdate, versao, tenant, assunto, codigo, empresa, remetente)
            VALUES('7e1194dd-3b30-446a-96eb-58d75cf398c3'::uuid, NULL, 'Nova mensagem Integratto ERP', '<div contenteditable="true" class="cke_editable cke_editable_inline cke_contents_ltr cke_show_borders cke_focus" tabindex="0" spellcheck="false" role="textbox" aria-label="Editor de Rich Text, editor1" title="Editor de Rich Text, editor1" aria-describedby="cke_51" style="position: relative;"><p><span style="font-size:12px;"><span style="font-family:verdana,geneva,sans-serif;">Olá,</span></span></p><p><span style="font-size:12px;"><span style="font-family:verdana,geneva,sans-serif;">Recebi seu contato através da página do Integratto ERP e gostaria de agendar uma demonstração.</span></span></p><p><span style="font-size:12px;"><span style="font-family:verdana,geneva,sans-serif;">Será ótimo conhecer mais sobre o seu negócio e como o nosso sistema integrado pode aumentar a produtividade e a eficiência da gestão da sua empresa. &nbsp; &nbsp;</span></span></p><p><span style="font-size:12px;"><span style="font-family:verdana,geneva,sans-serif;">Vamos marcar um café?</span></span></p><p><span style="font-size:12px;"><span style="font-family:verdana,geneva,sans-serif;">Aproveito para te enviar um lançamento exclusivo para clientes:o e-book <a data-cke-saved-href="http://www.nasajon.com.br/sites/default/files/ebook_6habitosdeverdadeirospensadoresestrategicos.pdf" href="http://www.nasajon.com.br/sites/default/files/ebook_6habitosdeverdadeirospensadoresestrategicos.pdf"><u>6 Hábitos de Verdadeiros Pensadores Estratégicos</u></a>&nbsp;produzido pelo nosso Presidente e Fundador Claudio Nasajon.&nbsp;Para ler, é só clicar no link acima.&nbsp;</span></span></p><p><span style="font-size:12px;"><span style="font-family:verdana,geneva,sans-serif;">Até logo!</span></span></p><p><span style="font-size:12px;"><span style="font-family:verdana,geneva,sans-serif;">Amanda Vieira<br>Gerente Comercial</span></span><br></p></div>', NULL, NULL, 10058, 'Um convite para um café', NULL, 37, NULL);
            INSERT INTO email.templates
            ("template", categoria, descricao, conteudo, lastupdate, versao, tenant, assunto, codigo, empresa, remetente)
            VALUES('7b3cca12-0ab3-4879-97db-3661036b0eeb'::uuid, NULL, 'Confirmação da Compra do video curso ECF', '<div aria-describedby="cke_51" title="Editor de Rich Text, editor1" aria-label="Editor de Rich Text, editor1" role="textbox" style="position: relative;" spellcheck="false" tabindex="0" class="cke_editable cke_editable_inline cke_contents_ltr cke_show_borders" contenteditable="true"><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.1999998092651px; line-height: 19.7999992370605px; background-color: rgb(255, 255, 255);"><span style="font-size:12px;"><span style="font-family:arial,helvetica,sans-serif;">Olá equipe, temos uma compra do video do Curso ECF Educacional.&nbsp;Seguem abaixo os dados.</span></span><br></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.1999998092651px; line-height: 19.7999992370605px; background-color: rgb(255, 255, 255);"><br></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.1999998092651px; line-height: 19.7999992370605px; background-color: rgb(255, 255, 255);"><div class="gmail_default" style="font-size: 13.1999998092651px; line-height: 19.7999992370605px;"><span style="font-size:12px;"><span style="font-family:arial,helvetica,sans-serif;">Nome: {{nome}}</span></span></div><div class="gmail_default" style="font-size: 13.1999998092651px; line-height: 19.7999992370605px;"><span style="font-size:12px;"><span style="font-family:arial,helvetica,sans-serif;"><span style="line-height: 19.7999992370605px;">Empresa: {{suaempresa}}</span></span></span></div><div class="gmail_default" style="font-size: 13.1999998092651px; line-height: 19.7999992370605px;"><span style="font-size:12px;"><span style="font-family:arial,helvetica,sans-serif;">Email:&nbsp;<span style="line-height: 19.7999992370605px;">{{email}}</span></span></span></div><div class="gmail_default" style="font-size: 13.1999998092651px; line-height: 19.7999992370605px;"><span style="font-size:12px;"><span style="font-family:arial,helvetica,sans-serif;">Telefone: {{telefone}}</span></span></div><div class="gmail_default" style="font-size: 13.1999998092651px; line-height: 19.7999992370605px;"><span style="font-size:12px;"><span style="font-family:arial,helvetica,sans-serif;">Autorizo a emissão do boleto com o valor de R$50 por participante:<span style="line-height: 19.7999992370605px;">{{</span>autorizado<span style="line-height: 19.7999992370605px;">}}</span></span></span><br></div></div></div>', NULL, NULL, 10058, 'Compra do video - Curso ECF', NULL, 37, NULL);
            INSERT INTO email.templates
            ("template", categoria, descricao, conteudo, lastupdate, versao, tenant, assunto, codigo, empresa, remetente)
            VALUES('5796a79d-48d0-4287-8826-bebc1de507d5'::uuid, NULL, 'Confirmação da Compra do video curso ECF 2', '<div aria-describedby="cke_51" title="Editor de Rich Text, editor1" aria-label="Editor de Rich Text, editor1" role="textbox" style="position: relative;" spellcheck="false" tabindex="0" class="cke_editable cke_editable_inline cke_contents_ltr cke_show_borders" contenteditable="true"><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.1999998092651px; line-height: 19.7999992370605px; background-color: rgb(255, 255, 255);"><span style="font-size:12px;"><span style="font-family:arial,helvetica,sans-serif;">Olá equipe, temos uma compra do video do Curso ECF Educacional.&nbsp;Seguem abaixo os dados.</span></span></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.1999998092651px; line-height: 19.7999992370605px; background-color: rgb(255, 255, 255);"><br></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.1999998092651px; line-height: 19.7999992370605px; background-color: rgb(255, 255, 255);"><div class="gmail_default" style="font-size: 13.1999998092651px; line-height: 19.7999992370605px;"><span style="font-size:12px;"><span style="font-family:arial,helvetica,sans-serif;">Nome: {{nome}}</span></span></div><div class="gmail_default" style="font-size: 13.1999998092651px; line-height: 19.7999992370605px;"><span style="font-size:12px;"><span style="font-family:arial,helvetica,sans-serif;"><span style="line-height: 19.7999992370605px;">CNPJ: {{CNPJ}}</span></span></span><br></div><div class="gmail_default" style="font-size: 13.1999998092651px; line-height: 19.7999992370605px;"><span style="font-size:12px;"><span style="font-family:arial,helvetica,sans-serif;">Email:&nbsp;<span style="line-height: 19.7999992370605px;">{{email}}</span></span></span></div><div class="gmail_default" style="font-size: 13.1999998092651px; line-height: 19.7999992370605px;"><span style="font-size:12px;"><span style="font-family:arial,helvetica,sans-serif;">Telefone: {{telefone}}</span></span></div><div class="gmail_default" style="font-size: 13.1999998092651px; line-height: 19.7999992370605px;"><span style="font-size:12px;"><span style="font-family:arial,helvetica,sans-serif;">Autorizo a emissão do boleto com o valor de R$50:<span style="line-height: 19.7999992370605px;">{{</span>autorizado<span style="line-height: 19.7999992370605px;">}}</span></span></span><br></div></div></div>', NULL, NULL, 10058, 'Compra do video - Curso ECF', NULL, 37, NULL);
            INSERT INTO email.templates
            ("template", categoria, descricao, conteudo, lastupdate, versao, tenant, assunto, codigo, empresa, remetente)
            VALUES('e2c7d409-1998-4bae-95b8-c434c9cf6979'::uuid, NULL, 'Confirmação da Compra do video curso ECF 3', '<div contenteditable="true" class="cke_editable cke_editable_inline cke_contents_ltr cke_show_borders" tabindex="0" spellcheck="false" role="textbox" aria-label="Editor de Rich Text, editor1" title="Editor de Rich Text, editor1" aria-describedby="cke_51" style="position: relative;"><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.1999998092651px; line-height: 19.7999992370605px; background-color: rgb(255, 255, 255);"><span style="font-size: 12px;"><span style="font-family: arial, helvetica, sans-serif;">Olá equipe, temos uma compra do video do Curso ECF Educacional.&nbsp;Seguem abaixo os dados.</span></span></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.1999998092651px; line-height: 19.7999992370605px; background-color: rgb(255, 255, 255);"><br></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.1999998092651px; line-height: 19.7999992370605px; background-color: rgb(255, 255, 255);"><div class="gmail_default" style="font-size: 13.1999998092651px; line-height: 19.7999992370605px;"><span style="font-size: 12px;"><span style="font-family: arial, helvetica, sans-serif;">Nome: {{nome}}</span></span></div><div class="gmail_default" style="font-size: 13.1999998092651px; line-height: 19.7999992370605px;"><span style="font-size: 12px;"><span style="font-family: arial, helvetica, sans-serif;">CNPJ: {{CNPJ}}</span></span></div><div class="gmail_default" style="font-size: 13.1999998092651px; line-height: 19.7999992370605px;"><span style="font-size: 12px;"><span style="font-family: arial, helvetica, sans-serif;">Email:&nbsp;<span style="line-height: 19.7999992370605px;">{{email}}</span></span></span></div><div class="gmail_default" style="font-size: 13.1999998092651px; line-height: 19.7999992370605px;"><span style="font-size: 12px;"><span style="font-family: arial, helvetica, sans-serif;">Telefone: {{telefone}}</span></span></div><div class="gmail_default" style="font-size: 13.1999998092651px; line-height: 19.7999992370605px;"><span style="font-size: 12px;"><span style="font-family: arial, helvetica, sans-serif;">Autorizo a emissão do boleto com o valor de R$50: {{autorizado}}</span></span></div></div></div>', NULL, NULL, 10058, 'Compra do video - Curso ECF', NULL, 37, NULL);
            INSERT INTO email.templates
            ("template", categoria, descricao, conteudo, lastupdate, versao, tenant, assunto, codigo, empresa, remetente)
            VALUES('2b4c816a-4fd9-4dce-a498-55e23832cdf1'::uuid, NULL, 'Workshop Online eSocial - Da Teoria à Prática', '<div contenteditable="true" class="cke_editable cke_editable_inline cke_contents_ltr cke_show_borders" tabindex="0" spellcheck="false" role="textbox" aria-label="Editor de Rich Text, editor1" title="Editor de Rich Text, editor1" aria-describedby="cke_51" style="position: relative;"><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.1999998092651px; line-height: 19.7999992370605px; background-color: rgb(255, 255, 255);"><span style="font-family:verdana,geneva,sans-serif;"><span style="font-size: 12px;">Olá equipe, temos cliente&nbsp;inscrito no </span>Workshop Online eSocial - Da Teoria à Prática<span style="font-size: 12px;">.&nbsp;Seguem abaixo os dados.</span></span></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.1999998092651px; line-height: 19.7999992370605px; background-color: rgb(255, 255, 255);"><span style="font-family:verdana,geneva,sans-serif;"><br></span></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.1999998092651px; line-height: 19.7999992370605px; background-color: rgb(255, 255, 255);"><div class="gmail_default" style="font-size: 13.1999998092651px; line-height: 19.7999992370605px;"><span style="font-family:verdana,geneva,sans-serif;"><span style="font-size: 12px;">Nome: {{nome}}</span></span></div><div class="gmail_default" style="font-size: 13.1999998092651px; line-height: 19.7999992370605px;"><span style="font-family:verdana,geneva,sans-serif;"><span style="font-size: 12px;">CNPJ: {{cnpj}}</span></span></div><div class="gmail_default" style="font-size: 13.1999998092651px; line-height: 19.7999992370605px;"><span style="font-family:verdana,geneva,sans-serif;"><span style="font-size: 12px;">Email:&nbsp;<span style="line-height: 19.7999992370605px;">{{email}}</span></span></span></div><div class="gmail_default" style="font-size: 13.1999998092651px; line-height: 19.7999992370605px;"><span style="font-family:verdana,geneva,sans-serif;"><span style="font-size: 12px;">Telefone: {{telefone}}</span></span></div><div class="gmail_default" style="font-size: 13.1999998092651px; line-height: 19.7999992370605px;"><span style="font-family:verdana,geneva,sans-serif;"><span style="font-size: 12px;">Autorizo a emissão do boleto com o valor de R$200:<span style="line-height: 19.7999992370605px;">{{</span>autorizado<span style="line-height: 19.7999992370605px;">}}</span></span></span></div></div></div>', NULL, NULL, 10058, 'Workshop Online eSocial: Cliente Inscrito', NULL, 37, NULL);
            INSERT INTO email.templates
            ("template", categoria, descricao, conteudo, lastupdate, versao, tenant, assunto, codigo, empresa, remetente)
            VALUES('20bde3ea-0db5-4097-8709-ad9d968c0644'::uuid, NULL, 'RS Contato interessado: Infográfico Boleto com e sem registro', '<p>Gente,&nbsp;</p>

            <p>O contato abaixo realizou o download do&nbsp;Infogr&aacute;fico &quot;<strong>Boleto com e sem registro: qual &eacute; a diferen&ccedil;a</strong>?<strong>&quot;</strong>&nbsp;via&nbsp;<strong>Redes Sociais</strong>:</p>

            <p>Nome: {{nome}}<br />
            Email: {{email}}<br />
            Telefone: {{telefone}}<br />
            Empresa: {{empresa}}</p>', NULL, NULL, 10058, 'RS Contato interessado: Infográfico Boleto com e sem registro', NULL, NULL, NULL);
            INSERT INTO email.templates
            ("template", categoria, descricao, conteudo, lastupdate, versao, tenant, assunto, codigo, empresa, remetente)
            VALUES('2f32f8b9-a3a2-453a-9b64-3a8706d0f2d9'::uuid, NULL, 'Curso Online eSocial: Inscrito com desconto', '<div contenteditable="true" class="cke_editable cke_editable_inline cke_contents_ltr cke_show_borders" tabindex="0" spellcheck="false" role="textbox" aria-label="Editor de Rich Text, editor1" title="Editor de Rich Text, editor1" aria-describedby="cke_51" style="position: relative;"><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><span style="font-family: verdana, geneva, sans-serif;">Atenção, equipe! O contato deseja se inscrever no Curso Online sobre eSocial com o valor de desconto:</span></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><br></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><span style="font-family: verdana, geneva, sans-serif;">Nome: {{nome}}</span></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><span style="font-family: verdana, geneva, sans-serif;">CNPJ ou CPF:&nbsp;<span style="font-size: 13.2px; line-height: 19.8px;">{{cnpj}}</span></span></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><span style="font-family: verdana, geneva, sans-serif;">Email: {{email}}</span></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><span style="font-family: verdana, geneva, sans-serif;">Telefone:&nbsp;<span style="font-size: 13.2px; line-height: 19.8px;">{{telefone}}</span></span></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><font face="verdana, geneva, sans-serif">Autorização: {{autorizado}}&nbsp;</font></div></div>', NULL, NULL, 10058, 'Curso Online eSocial: Inscrito com desconto', NULL, NULL, NULL);
            INSERT INTO email.templates
            ("template", categoria, descricao, conteudo, lastupdate, versao, tenant, assunto, codigo, empresa, remetente)
            VALUES('ab9be12d-ccd5-440a-8d8e-ec09c5aabf51'::uuid, NULL, 'E-mail que o condomíno recebe com o link para o boleto a ser pago', '<html>
                        <head>
                            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
                            <link rel="stylesheet" type="text/css" href="http://meucondominio.nasajonsisitemas.com.br/estilo_emails.css">
                            <title>Cota Condominial - {{condominio}}</title>
                        </head>
                        <body>
                            <h1>Cota Condominial - {{condominio}}</h1>
                            <p>Prezado {{cliente}}, sua cota condominial referente ao mês de {{mes}} já está disponível para pagamento:</p>
                            <p><a href={{link}}>Clique aqui</a> para visualizar o boleto da mesma.</p>
                        </body>
                    <html>', '2020-01-27 14:50:31.376', 1, NULL, 'Cota Condominial - {{condominio}}', 'meucondominio_boleto', NULL, NULL);
            INSERT INTO email.templates
            ("template", categoria, descricao, conteudo, lastupdate, versao, tenant, assunto, codigo, empresa, remetente)
            VALUES('53424ccf-ef9c-49b0-8bdf-4b9de0651ba0'::uuid, NULL, 'Contato interessado: Reativação Integratto Contábil - Rio', '<p>Aten&ccedil;&atilde;o, equipe! O contato abaixo preencheu o formul&aacute;rio da&nbsp;<strong>Reativa&ccedil;&atilde;o Integratto Cont&aacute;bil - Rio de Janeiro:</strong></p>

            <p>Nome: {{nome}}<br />
            Email: {{email}}<br />
            Telefone: {{telefone}}<br />
            Estado: {{estado}}<br />
            Mensagem: {{mensagem}}</p>', NULL, NULL, 10058, 'Contato interessado: Reativação Integratto Contábil - Rio', NULL, NULL, NULL);
            INSERT INTO email.templates
            ("template", categoria, descricao, conteudo, lastupdate, versao, tenant, assunto, codigo, empresa, remetente)
            VALUES('c8f748cf-697c-4357-b9c5-159c51ab15f3'::uuid, NULL, 'Contato interessado: ERP II', '<div aria-describedby="cke_51" title="Editor de Rich Text, editor1" aria-label="Editor de Rich Text, editor1" role="textbox" style="position: relative;" spellcheck="false" tabindex="0" class="cke_editable cke_editable_inline cke_contents_ltr cke_show_borders" contenteditable="true"><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><span style="font-family: verdana, geneva, sans-serif;">Atenção, equipe! O contato deseja receber mais informações sobre a Campanha ERP II:</span><br></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><br></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><span style="font-family: verdana, geneva, sans-serif;">Nome: {{nome}}</span></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><span style="font-family: verdana, geneva, sans-serif;">Email:&nbsp;<span style="font-size: 13.2px; line-height: 19.8px;">{{email}}</span></span></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><span style="font-family: verdana, geneva, sans-serif;">Telefone:&nbsp;<span style="font-size: 13.2px; line-height: 19.8px;">{{telefone}}</span></span></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><span style="font-family: verdana, geneva, sans-serif;">Estado:&nbsp;<span style="font-size: 13.2px; line-height: 19.8px;">{{estado}}</span></span></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><span style="font-family: verdana, geneva, sans-serif;">Município:&nbsp;<span style="font-size: 13.2px; line-height: 19.8px;">{{cidade}}</span></span></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><span style="font-family: verdana, geneva, sans-serif;">Mensagem:&nbsp;<span style="font-size: 13.2px; line-height: 19.8px;">{{mensagem}}</span></span></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><br></div></div>', NULL, NULL, 10058, 'Contato Interessado: ERP II', NULL, NULL, NULL);
            INSERT INTO email.templates
            ("template", categoria, descricao, conteudo, lastupdate, versao, tenant, assunto, codigo, empresa, remetente)
            VALUES('adb39fd3-c65a-43a5-91ff-eeada60aa513'::uuid, NULL, 'Curso Homolognet', '<div contenteditable="true" class="cke_editable cke_editable_inline cke_contents_ltr cke_show_borders cke_focus" tabindex="0" spellcheck="false" role="textbox" aria-label="Editor de Rich Text, editor1" title="Editor de Rich Text, editor1" aria-describedby="cke_51" style="position: relative;"><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><span style="font-family:tahoma,geneva,sans-serif;">Olá equipe, temos um inscrito no Curso Homolognet Educacional.&nbsp;Seguem abaixo os dados:</span></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><br></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><div class="gmail_default" style="font-size: 13.2px; line-height: 19.8px;"><span style="font-family:tahoma,geneva,sans-serif;">Nome:&nbsp;{{nome}}</span></div><div class="gmail_default" style="font-size: 13.2px; line-height: 19.8px;"><span style="font-family:tahoma,geneva,sans-serif;">Empresa:&nbsp;{{suaempresa}}</span></div><div class="gmail_default" style="font-size: 13.2px; line-height: 19.8px;"><span style="font-family:tahoma,geneva,sans-serif;"><span style="color: rgb(33, 33, 33); line-height: 19.8px; background-color: rgb(255, 255, 255);">CNPJ:&nbsp;{{cnpj}}</span></span></div><div class="gmail_default" style="font-size: 13.2px; line-height: 19.8px;"><span style="font-family:tahoma,geneva,sans-serif;">Email:&nbsp;<span style="line-height: 19.8px;">{{email}}</span></span></div><div class="gmail_default" style="font-size: 13.2px; line-height: 19.8px;"><span style="font-family:tahoma,geneva,sans-serif;">Telefone:&nbsp;{{telefone}}</span></div><div class="gmail_default" style="font-size: 13.2px; line-height: 19.8px;"><span style="font-family:tahoma,geneva,sans-serif;">Autorização: {{autorizado}}</span></div></div></div>', NULL, NULL, 10058, 'Curso Homolognet: Novo Inscrito', NULL, NULL, NULL);
            INSERT INTO email.templates
            ("template", categoria, descricao, conteudo, lastupdate, versao, tenant, assunto, codigo, empresa, remetente)
            VALUES('269cc864-699c-4ff1-b565-c046e40412af'::uuid, NULL, 'Email MKT Ponto Web: Novo Contato', '<div contenteditable="true" class="cke_editable cke_editable_inline cke_contents_ltr cke_show_borders" tabindex="0" spellcheck="false" role="textbox" aria-label="Editor de Rich Text, editor1" title="Editor de Rich Text, editor1" aria-describedby="cke_51" style="position: relative;"><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><span style="font-family: verdana, geneva, sans-serif;">Atenção, equipe! O contato deseja receber mais informações sobre o Ponto Web:</span><br></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><br></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><span style="font-family: verdana, geneva, sans-serif;">Nome: {{nome}}</span></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><span style="font-family: verdana, geneva, sans-serif;">Email:&nbsp;<span style="font-size: 13.2px; line-height: 19.8px;">{{email}}</span></span></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><span style="font-family: verdana, geneva, sans-serif;">Telefone:&nbsp;<span style="font-size: 13.2px; line-height: 19.8px;">{{telefone}}</span></span></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><span style="font-family: verdana, geneva, sans-serif;">Estado:&nbsp;<span style="font-size: 13.2px; line-height: 19.8px;">{{estado}}</span></span></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><span style="font-family: verdana, geneva, sans-serif;">Município:&nbsp;<span style="font-size: 13.2px; line-height: 19.8px;">{{cidade}}</span></span></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><span style="font-family: verdana, geneva, sans-serif;">Mensagem:&nbsp;<span style="font-size: 13.2px; line-height: 19.8px;">{{mensagem}}</span></span></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><span style="font-family: verdana, geneva, sans-serif;"></span><span style="font-family: verdana, geneva, sans-serif;"></span></div></div>', NULL, NULL, 10058, 'Email MKT Ponto Web: Novo Contato', NULL, NULL, NULL);
            INSERT INTO email.templates
            ("template", categoria, descricao, conteudo, lastupdate, versao, tenant, assunto, codigo, empresa, remetente)
            VALUES('11265dca-b38f-496e-8c0a-da1da97f5a8a'::uuid, NULL, 'Curso Online eSocial: Não Cliente inscrito', '<div contenteditable="true" class="cke_editable cke_editable_inline cke_contents_ltr cke_show_borders" tabindex="0" spellcheck="false" role="textbox" aria-label="Editor de Rich Text, editor1" title="Editor de Rich Text, editor1" aria-describedby="cke_51" style="position: relative;"><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><span style="font-family: verdana, geneva, sans-serif;">Atenção, equipe! O contato deseja se inscrever no Curso Online sobre eSocial:</span></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><br></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><span style="font-family: verdana, geneva, sans-serif;">Nome: {{nome}}</span></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><span style="font-family: verdana, geneva, sans-serif;">CNPJ ou CPF:&nbsp;<span style="font-size: 13.2px; line-height: 19.8px;">{{cnpj}}</span></span></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><span style="font-family: verdana, geneva, sans-serif;">Email: {{email}}</span></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><span style="font-family: verdana, geneva, sans-serif;">Telefone:&nbsp;<span style="font-size: 13.2px; line-height: 19.8px;">{{telefone}}</span></span><br></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><font face="verdana, geneva, sans-serif">Endereço: {{endereço}}</font><br></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><font face="verdana, geneva, sans-serif">Número: {{numero}}</font><br></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><font face="verdana, geneva, sans-serif">Complemento: {{complemento}}</font><br></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><font face="verdana, geneva, sans-serif">Bairro: {{bairro}}</font><br></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><font face="verdana, geneva, sans-serif">Cidade: {{cidade}}</font><br></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><font face="verdana, geneva, sans-serif">UF: {{uf}}</font><br></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><font face="verdana, geneva, sans-serif"></font><span style="color: rgb(33, 33, 33); font-family: verdana, geneva, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);">CEP: {{CEP}}</span><font face="verdana, geneva, sans-serif"></font><br></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><font face="verdana, geneva, sans-serif">Autorização: {{autorizado}}&nbsp;</font></div></div>', NULL, NULL, 10058, 'Curso Online eSocial: Não Cliente inscrito', NULL, NULL, NULL);
            INSERT INTO email.templates
            ("template", categoria, descricao, conteudo, lastupdate, versao, tenant, assunto, codigo, empresa, remetente)
            VALUES('8895b592-bc5b-4d0e-b282-4720474b9d1b'::uuid, NULL, 'eBook CN', '<div contenteditable="true" class="cke_editable cke_editable_inline cke_contents_ltr cke_show_borders" tabindex="0" spellcheck="false" role="textbox" aria-label="Editor de Rich Text, editor1" title="Editor de Rich Text, editor1" aria-describedby="cke_51" style="position: relative;"><p>Olá!&nbsp;</p><p>Clique no link abaixo para acessar o seu eBook:<br></p><p><a data-cke-saved-href="http://www.nasajon.com.br/sites/default/files/ebook_claudionasajon_6habitosdeverdadeirospensadoresestrategicos.pdf" href="http://www.nasajon.com.br/sites/default/files/ebook_claudionasajon_6habitosdeverdadeirospensadoresestrategicos.pdf"><strong>eBook: 6 Hábitos de Verdadeiros Pensadores Estratégicos</strong></a><br></p><p><strong></strong>Agradecemos o seu interesse,<br></p><p>Equipe Nasajon&nbsp;<br></p></div>', NULL, NULL, 10058, 'eBook Claudio Nasajon', NULL, NULL, NULL);
            INSERT INTO email.templates
            ("template", categoria, descricao, conteudo, lastupdate, versao, tenant, assunto, codigo, empresa, remetente)
            VALUES('450c00b0-8022-4fdd-bac1-3e37375afe8e'::uuid, NULL, 'eBook CN - Resposta', '<div contenteditable="true" class="cke_editable cke_editable_inline cke_contents_ltr cke_show_borders" tabindex="0" spellcheck="false" role="textbox" aria-label="Editor de Rich Text, editor1" title="Editor de Rich Text, editor1" aria-describedby="cke_51" style="position: relative;"><p>Olá, equipe!</p><p>Um novo contato baixou o eBook do Claudio Nasajon:</p><p>Nome: {{nome}}</p><p>Email: {{email}}</p><p><br></p></div>', NULL, NULL, 10058, 'eBook CN: Novo contato', NULL, NULL, NULL);
            INSERT INTO email.templates
            ("template", categoria, descricao, conteudo, lastupdate, versao, tenant, assunto, codigo, empresa, remetente)
            VALUES('16614a3a-22ef-4c53-99ab-d5daa94532c6'::uuid, NULL, 'Mensagem usuário Infográfico Boleto com e sem registro', '<p style="line-height: 20.8px;">Ol&aacute;!</p>

            <p style="line-height: 20.8px;">Agradecemos o interesse no Infogr&aacute;fico&nbsp;&quot;Boleto com e sem registro: qual &eacute; a diferen&ccedil;a?&quot;.&nbsp;</p>

            <p style="line-height: 20.8px;"><a href="https://marketingnasajon.s3.amazonaws.com/Boleto-com-e-sem-registro.pdf">Clique&nbsp;aqui</a>&nbsp;para abrir o conte&uacute;do e acesse-o a qualquer momento.</p>

            <p style="line-height: 20.8px;">Aproveite!&nbsp;</p>

            <p style="line-height: 20.8px;">At&eacute; breve,</p>

            <p style="line-height: 20.8px;">Nasajon Sistemas</p>', NULL, NULL, 10058, '[Infográfico Gratuito] Boleto com e sem registro: qual é a diferença?', NULL, NULL, NULL);
            INSERT INTO email.templates
            ("template", categoria, descricao, conteudo, lastupdate, versao, tenant, assunto, codigo, empresa, remetente)
            VALUES('b1da5924-c64f-4754-b372-485a2b8da708'::uuid, NULL, 'eSocial: A implantação_cliente', '<div contenteditable="true" class="cke_editable cke_editable_inline cke_contents_ltr cke_show_borders" tabindex="0" spellcheck="false" role="textbox" aria-label="Editor de Rich Text, editor1" title="Editor de Rich Text, editor1" aria-describedby="cke_51" style="position: relative;"><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><span style="font-family: verdana, geneva, sans-serif;">Atenção, equipe! O contato deseja se inscrever no Curso Online sobre eSocial:</span></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><br></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><span style="font-family: verdana, geneva, sans-serif;">Nome: {{nome}}</span></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><span style="font-family: verdana, geneva, sans-serif;">CNPJ ou CPF:&nbsp;<span style="font-size: 13.2px; line-height: 19.8px;">{{cnpj}}</span></span></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><span style="font-family: verdana, geneva, sans-serif;">Email: {{email}}</span></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><span style="font-family: verdana, geneva, sans-serif;">Telefone:&nbsp;<span style="font-size: 13.2px; line-height: 19.8px;">{{telefone}}</span></span></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><font face="verdana, geneva, sans-serif">Autorização: {{autorizado}}&nbsp;</font></div></div>', NULL, NULL, 10058, 'eSocial: A implantação_cliente', NULL, NULL, NULL);
            INSERT INTO email.templates
            ("template", categoria, descricao, conteudo, lastupdate, versao, tenant, assunto, codigo, empresa, remetente)
            VALUES('b21a6d2d-7761-47bb-8e5c-db1c238bbf99'::uuid, NULL, 'Persona Ponto - Notificação de Marcação para Gestor', '<div contenteditable="true"><p><span style="font-size:12px, "><span style="font-family:verdana,geneva,sans-serif, "><strong>Ponto Web</strong></span></span></p><p><span style="font-size:12px, "><span style="font-family:verdana,geneva,sans-serif, ">Um colaborador do seu grupo ({{grupo_nome}}) fez uma marcação em local desconhecido.</span></span></p><p><span style="font-size:12px, "><span style="font-family:verdana,geneva,sans-serif, ">Nome: {{trabalhador_nome}}</span></span></p><p><span style="font-size:12px, "><span style="font-family:verdana,geneva,sans-serif, ">Data e Hora: {{data_hora}}</span></span></p><p><span style="font-size:12px, "><span style="font-family:verdana,geneva,sans-serif, ">IP: {{ip}}</span></span></p></div>', NULL, NULL, NULL, 'Ponto Web - Marcação em local desconhecido', 'persona_pontoweb_notificacao_marcacao_gestor', NULL, NULL);
            INSERT INTO email.templates
            ("template", categoria, descricao, conteudo, lastupdate, versao, tenant, assunto, codigo, empresa, remetente)
            VALUES('24b9ef31-180c-4f88-8a97-0966c64530d4'::uuid, NULL, 'eSocial: A implantação_não cliente', '<div contenteditable="true" class="cke_editable cke_editable_inline cke_contents_ltr cke_show_borders" tabindex="0" spellcheck="false" role="textbox" aria-label="Editor de Rich Text, editor1" title="Editor de Rich Text, editor1" aria-describedby="cke_51" style="position: relative;"><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><span style="font-family: verdana, geneva, sans-serif;">Atenção, equipe! O contato deseja se inscrever no Curso Online sobre eSocial:</span></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><br></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><span style="font-family: verdana, geneva, sans-serif;">Nome: {{nome}}</span></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><span style="font-family: verdana, geneva, sans-serif;">CNPJ ou CPF:&nbsp;<span style="font-size: 13.2px; line-height: 19.8px;">{{cnpj}}</span></span></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><span style="font-family: verdana, geneva, sans-serif;">Email: {{email}}</span></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><span style="font-family: verdana, geneva, sans-serif;">Telefone:&nbsp;<span style="font-size: 13.2px; line-height: 19.8px;">{{telefone}}</span></span></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><font face="verdana, geneva, sans-serif">Endereço: {{endereço}}</font></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><font face="verdana, geneva, sans-serif">Número: {{numero}}</font></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><font face="verdana, geneva, sans-serif">Complemento: {{complemento}}</font></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><font face="verdana, geneva, sans-serif">Bairro: {{bairro}}</font></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><font face="verdana, geneva, sans-serif">Cidade: {{cidade}}</font></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><font face="verdana, geneva, sans-serif">UF: {{uf}}</font></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><span style="font-family: verdana, geneva, sans-serif; font-size: 13.2px; line-height: 19.8px;">CEP: {{CEP}}</span></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><span style="font-family: verdana, geneva, sans-serif; font-size: 13.2px; line-height: 19.8px;">Mensagem: {{mensagem}}</span><br></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><font face="verdana, geneva, sans-serif">Autorização: {{autorizado}}</font>​</div></div>', NULL, NULL, 10058, 'eSocial: A implantação_não cliente', NULL, NULL, NULL);
            INSERT INTO email.templates
            ("template", categoria, descricao, conteudo, lastupdate, versao, tenant, assunto, codigo, empresa, remetente)
            VALUES('b2df7b43-4e57-4542-9379-139aac259cfc'::uuid, NULL, '[Curso Online Ao Vivo - Novo Simples Nacional] Formulário Cliente', '<div class="gmail_default" style="color: rgb(33, 33, 33); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px;"><span style="font-family: verdana, geneva, sans-serif;">Aten&ccedil;&atilde;o, equipe! O contato abaixo preencheu o&nbsp;<strong>Formul&aacute;rio de Cliente para o curso online ao vivo Novo Simples Nacional:</strong>&nbsp;</span></div>

            <div class="gmail_default" style="color: rgb(33, 33, 33); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px;">&nbsp;</div>

            <div class="gmail_default" style="color: rgb(33, 33, 33); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px;"><span style="font-family: verdana, geneva, sans-serif;">Nome: {{nome}}</span></div>

            <div class="gmail_default" style="color: rgb(33, 33, 33); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px;"><span style="font-family: verdana, geneva, sans-serif;">Email:&nbsp;<span style="font-size: 13.2px; line-height: 19.8px;">{{email}}</span></span></div>

            <div class="gmail_default" style="color: rgb(33, 33, 33); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px;"><span style="font-family: verdana, geneva, sans-serif;">Telefone:&nbsp;<span style="font-size: 13.2px; line-height: 19.8px;">{{telefone}}</span></span></div>

            <div class="gmail_default" style="color: rgb(33, 33, 33); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px;"><span style="font-family: verdana, geneva, sans-serif;">Estado:&nbsp;<span style="font-size: 13.2px; line-height: 19.8px;">{{estado}}</span></span>​</div>

            <div class="gmail_default" style="color: rgb(33, 33, 33); font-size: 13.2px; line-height: 19.8px;"><font face="verdana, geneva, sans-serif">Cidade: {{cidade}}</font></div>

            <div class="gmail_default" style="color: rgb(33, 33, 33); font-size: 13.2px; line-height: 19.8px;"><font face="verdana, geneva, sans-serif">Mensagem: {{mensagem}}</font></div>

            <div class="gmail_default" style="color: rgb(33, 33, 33); font-size: 13.2px; line-height: 19.8px;"><font face="verdana, geneva, sans-serif">Autoriza o boleto: {{autoriza}}</font></div>

            <div class="gmail_default" style="color: rgb(33, 33, 33); font-size: 13.2px; line-height: 19.8px;"><span style="font-size: 13.2px; font-family: verdana, geneva, sans-serif;"><span style="font-size: 13.2px; line-height: 19.8px;"><span style="font-size: 13.2px; line-height: 19.8px;">​</span></span></span>

            <div class="gmail_default" style="font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px;"><span style="font-family: verdana, geneva, sans-serif;"><span style="font-size: 13.2px; line-height: 19.8px;"><span style="font-size: 13.2px; line-height: 19.8px;">&nbsp;</span></span></span></div>

            <div class="gmail_default" style="font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px;"><span style="font-family: verdana, geneva, sans-serif;"><span style="font-size: 13.2px; line-height: 19.8px;"><span style="font-size: 13.2px; line-height: 19.8px;">Lembrando que o prazo ideal para primeiro contato com o lead s&atilde;o 24 horas.</span></span></span></div>

            <div class="gmail_default" style="font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px;"><span style="font-family: verdana, geneva, sans-serif;"><span style="font-size: 13.2px; line-height: 19.8px;"><span style="font-size: 13.2px; line-height: 19.8px;">Juntos podemos fazer muito!</span></span></span></div>
            </div>', NULL, NULL, 10058, '[Curso Online Ao Vivo - Novo Simples Nacional] Formulário Cliente', NULL, NULL, NULL);
            INSERT INTO email.templates
            ("template", categoria, descricao, conteudo, lastupdate, versao, tenant, assunto, codigo, empresa, remetente)
            VALUES('40478902-468a-42a3-a999-90240de3d55f'::uuid, NULL, 'Falecon: Persona (Soluções contábeis)', '<div class="gmail_default" style="color: rgb(33, 33, 33); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px;"><span style="font-family: verdana, geneva, sans-serif;">Aten&ccedil;&atilde;o, equipe! O contato abaixo deseja receber uma demonstra&ccedil;&atilde;o gr&aacute;tis do&nbsp;<strong>Persona&nbsp;</strong>via Falecon:</span></div>

            <div class="gmail_default" style="color: rgb(33, 33, 33); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px;">&nbsp;</div>

            <div class="gmail_default" style="color: rgb(33, 33, 33); font-size: 13.2px; line-height: 19.8px;"><font face="verdana, geneva, sans-serif">Nome: {{nome}}</font></div>

            <div class="gmail_default" style="color: rgb(33, 33, 33); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px;"><span style="font-family: verdana, geneva, sans-serif;">Email:&nbsp;<span style="font-size: 13.2px; line-height: 19.8px;">{{email}}</span></span></div>

            <div class="gmail_default" style="color: rgb(33, 33, 33); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px;"><span style="font-family: verdana, geneva, sans-serif;">Telefone:&nbsp;<span style="font-size: 13.2px; line-height: 19.8px;">{{telefone}}</span></span></div>

            <div class="gmail_default" style="color: rgb(33, 33, 33); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px;"><span style="font-family: verdana, geneva, sans-serif;">Estado:&nbsp;<span style="font-size: 13.2px; line-height: 19.8px;">{{estado}}</span></span></div>

            <div class="gmail_default" style="color: rgb(33, 33, 33); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px;"><span style="font-family: verdana, geneva, sans-serif;">Munic&iacute;pio:&nbsp;<span style="font-size: 13.2px; line-height: 19.8px;">{{cidade}}</span></span></div>

            <div class="gmail_default" style="color: rgb(33, 33, 33); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px;"><span style="font-family: verdana, geneva, sans-serif;">Mensagem:&nbsp;<span style="font-size: 13.2px; line-height: 19.8px;">{{mensagem}}</span></span></div>

            <div class="gmail_default" style="color: rgb(33, 33, 33); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px;"><span style="color: rgb(33, 33, 33); font-size: 13.2px; font-family: verdana, geneva, sans-serif;">&Eacute; cliente Nasajon?: {{cliente}}</span><br style="color: rgb(33, 33, 33); font-size: 13.2px; font-family: verdana, geneva, sans-serif;" />
            <span style="color: rgb(33, 33, 33); font-size: 13.2px; font-family: verdana, geneva, sans-serif;">Origem: {{origem}}</span><br style="color: rgb(33, 33, 33); font-size: 13.2px; font-family: verdana, geneva, sans-serif;" />
            <span style="color: rgb(33, 33, 33); font-size: 13.2px; font-family: verdana, geneva, sans-serif;">M&iacute;dia: {{midia}}</span><br style="color: rgb(33, 33, 33); font-size: 13.2px; font-family: verdana, geneva, sans-serif;" />
            <span style="color: rgb(33, 33, 33); font-size: 13.2px; font-family: verdana, geneva, sans-serif;">Campanha: {{campanha}}</span></div>', NULL, NULL, 10058, 'Falecon: Persona', NULL, NULL, NULL);
            INSERT INTO email.templates
            ("template", categoria, descricao, conteudo, lastupdate, versao, tenant, assunto, codigo, empresa, remetente)
            VALUES('39ddf7fc-bf61-45eb-88f8-adb1e2f52d7b'::uuid, NULL, 'Persona Ponto - Notificação de Marcação para Colaborador', '<div contenteditable="true" class="cke_editable cke_editable_inline cke_contents_ltr cke_show_borders cke_focus" tabindex="0" spellcheck="false" role="textbox" aria-label="Editor de Rich Text, editor1" title="Editor de Rich Text, editor1" aria-describedby="cke_51" style="position: relative, "><p><span style="font-size:12px, "><span style="font-family:verdana,geneva,sans-serif, "><strong>Ponto Web</strong></span></span></p><p><span style="font-size:12px, "><span style="font-family:verdana,geneva,sans-serif, ">Você fez uma marcação de um local desconhecido.</span></span></p><p><span style="font-size:12px, "><span style="font-family:verdana,geneva,sans-serif, ">Data e Hora: {{data_hora}}</span></span></p><p><span style="font-size:12px, "><span style="font-family:verdana,geneva,sans-serif, ">IP: {{ip}}</span></span></p><p><br></p></div>', NULL, NULL, NULL, 'Ponto Web - Marcação em local desconhecido', 'persona_pontoweb_notificacao_marcacao_colaborador', NULL, NULL);
            INSERT INTO email.templates
            ("template", categoria, descricao, conteudo, lastupdate, versao, tenant, assunto, codigo, empresa, remetente)
            VALUES('5f4e7a79-ae29-4831-9492-89a90faaaf79'::uuid, NULL, 'Acesso ao curso online', '<div contenteditable="true" class="cke_editable cke_editable_inline cke_contents_ltr cke_show_borders cke_focus" tabindex="0" spellcheck="false" role="textbox" aria-label="Editor de Rich Text, editor1" title="Editor de Rich Text, editor1" aria-describedby="cke_51" style="position: relative;"><p>Olá,</p><p>Preparado para o curso online sobre a&nbsp;ECF?</p><p>Você já pode entrar no seminário exclusivo da Nasajon que vai começar daqui a pouco.&nbsp;Mas não esqueça que o treinamento será ministrado de acordo com o horário de Brasília. Esteja atento ao horário de verão, caso o seu estado não adote o mesmo.</p><p>É importante lembrar que para garantir sua vaga, você precisa se conectar o quanto antes!</p><p><strong>Assunto de hoje:</strong>&nbsp;{{nomecursoonline}}</p><p><strong>Número do evento:</strong>&nbsp;{{numeroevento}}</p><p>Entre <b><i>aqui</i></b>&nbsp;para ter acesso ao seminário!</p><p>Ou copie e cole o seguinte link em um navegador:&nbsp;</p><p>{{linkdocurso}}</p><p>Em caso de qualquer dúvida, você pode entrar em contato com o Instrutor Especializado da Nasajon em:&nbsp;<a data-cke-saved-href="mailto:ead@nasajon.com.br" href="mailto:ead@nasajon.com.br" target="_blank">ead@nasajon.com.br</a></p><p><br></p><p><strong>Atenção:</strong>&nbsp;Este serviço WebEx inclui um recurso que permite que a sessão seja gravada. Ao participar desta sessão, você automaticamente autoriza a gravação. Se não, converse com o organizador da reunião antes do início da gravação ou não participe da sessão. As gravações estarão sujeitas à divulgação, no caso de litígio.</p></div>', NULL, NULL, 10058, 'Acesse já!', NULL, NULL, NULL);
            INSERT INTO email.templates
            ("template", categoria, descricao, conteudo, lastupdate, versao, tenant, assunto, codigo, empresa, remetente)
            VALUES('d8cce4e9-796c-4824-a6fd-d3e03e1a8d75'::uuid, NULL, 'Parceiro Nasajon: Interessado', '<div contenteditable="true" class="cke_editable cke_editable_inline cke_contents_ltr cke_show_borders cke_focus" tabindex="0" spellcheck="false" role="textbox" aria-label="Editor de Rich Text, editor1" title="Editor de Rich Text, editor1" aria-describedby="cke_51" style="position: relative;"><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><span style="font-family: verdana, geneva, sans-serif;">Atenção, equipe! O contato deseja ser um Parceiro Nasajon:</span></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><br></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><span style="font-family: verdana, geneva, sans-serif;">Nome: {{nome}}</span></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><span style="font-family: verdana, geneva, sans-serif;">Email:&nbsp;<span style="font-size: 13.2px; line-height: 19.8px;">{{email}}</span></span></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><span style="font-family: verdana, geneva, sans-serif;">Telefone:&nbsp;<span style="font-size: 13.2px; line-height: 19.8px;">{{telefone}}</span></span></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><span style="font-family: verdana, geneva, sans-serif;">Estado:&nbsp;<span style="font-size: 13.2px; line-height: 19.8px;">{{estado}}</span></span></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><span style="font-family: verdana, geneva, sans-serif;">Município:&nbsp;<span style="font-size: 13.2px; line-height: 19.8px;">{{cidade}}</span></span></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><span style="font-family: verdana, geneva, sans-serif;">Mensagem:&nbsp;<span style="font-size: 13.2px; line-height: 19.8px;">{{mensagem}}</span></span></div></div>', NULL, NULL, 10058, 'Parceiro Nasajon: Interessado', NULL, NULL, NULL);
            INSERT INTO email.templates
            ("template", categoria, descricao, conteudo, lastupdate, versao, tenant, assunto, codigo, empresa, remetente)
            VALUES('98ee76dc-d9a1-4df9-a174-1ba875343d0c'::uuid, NULL, 'Workshop Online Legislação de Férias e 13º Salário com desconto', '<div aria-describedby="cke_51" title="Editor de Rich Text, editor1" aria-label="Editor de Rich Text, editor1" role="textbox" style="position: relative;" spellcheck="false" tabindex="0" class="cke_editable cke_editable_inline cke_contents_ltr cke_focus cke_show_borders" contenteditable="true"><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><span style="font-family: verdana, geneva, sans-serif;">Atenção, equipe! O contato deseja se inscrever no&nbsp;</span>Workshop Legislação de Férias e 13º Salário com desconto:</div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><br></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><span style="font-family: verdana, geneva, sans-serif;">Nome: {{nome}}</span><br></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><span style="font-family: verdana, geneva, sans-serif;">Email:&nbsp;<span style="font-size: 13.2px; line-height: 19.8px;">{{email}}</span></span><br></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><span style="font-family: verdana, geneva, sans-serif;">Telefone:&nbsp;<span style="font-size: 13.2px; line-height: 19.8px;">{{telefone}}</span></span><br></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><span style="font-family: verdana, geneva, sans-serif;"><span style="font-size: 13.2px; line-height: 19.8px;">CNPJ: {{CNPJ}}</span></span><br></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><span style="font-family: verdana, geneva, sans-serif;">Autorização:&nbsp;<span style="font-size: 13.2px; line-height: 19.8px;">{{autorizo}}</span></span></div></div>', NULL, NULL, 10058, 'Workshop Online Legislação de Férias e 13º Salário com desconto', NULL, NULL, NULL);
            INSERT INTO email.templates
            ("template", categoria, descricao, conteudo, lastupdate, versao, tenant, assunto, codigo, empresa, remetente)
            VALUES('ba897c25-bfe8-451f-b397-f5a4d2b6e58f'::uuid, NULL, 'Contato interessado: Workshop Legislação de Férias e 13º Salário', '<div class="cke_editable cke_editable_inline cke_contents_ltr cke_focus cke_show_borders" tabindex="0" spellcheck="false" role="textbox" aria-label="Editor de Rich Text, editor1" title="Editor de Rich Text, editor1" aria-describedby="cke_51" style="position: relative;" contenteditable="true"><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><span style="font-family: verdana, geneva, sans-serif;">Atenção, equipe! O contato deseja se inscrever no&nbsp;</span>Workshop Legislação de Férias e 13º Salário:</div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><br></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><span style="font-family: verdana, geneva, sans-serif;">Nome: {{nome}}</span></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><span style="font-family: verdana, geneva, sans-serif;">Email:&nbsp;<span style="font-size: 13.2px; line-height: 19.8px;">{{email}}</span></span></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><span style="font-family: verdana, geneva, sans-serif;">Telefone:&nbsp;<span style="font-size: 13.2px; line-height: 19.8px;">{{telefone}}</span></span><br></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);">CNPJ: <span style="font-family: verdana, geneva, sans-serif;"><span style="font-size: 13.2px; line-height: 19.8px;">{{CNPJ}}</span></span><br></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><span style="font-family: verdana, geneva, sans-serif;">Autorização:&nbsp;<span style="font-size: 13.2px; line-height: 19.8px;">{{autorizo}}</span></span></div></div>', NULL, NULL, 10058, 'Contato interessado: Workshop Legislação de Férias e 13º Salário', NULL, NULL, NULL);
            INSERT INTO email.templates
            ("template", categoria, descricao, conteudo, lastupdate, versao, tenant, assunto, codigo, empresa, remetente)
            VALUES('c7945edf-d5be-4bb5-aa8b-bd93b27cdcf2'::uuid, NULL, 'Workshop Online Legislação de Férias e 13º Salário', '<div aria-describedby="cke_51" title="Editor de Rich Text, editor1" aria-label="Editor de Rich Text, editor1" role="textbox" style="position: relative;" spellcheck="false" tabindex="0" class="cke_editable cke_editable_inline cke_contents_ltr cke_show_borders" contenteditable="true"><link rel="shortcut icon" href="https://ssl.gstatic.com/docs/spreadsheets/forms/favicon_qp2.png" type="image/x-icon"><!--{cke_protected}%3Cmeta%20http-equiv%3D%22Content-type%22%20content%3D%22text%2Fhtml%3B%20charset%3Dutf-8%22%3E--><!--{cke_protected}%3Cmeta%20http-equiv%3D%22X-UA-Compatible%22%20content%3D%22IE%3D10%3B%20chrome%3D1%3B%22%3E--><!--{cke_protected}%3Cmeta%20name%3D%22fragment%22%20content%3D%22!%22%3E--><!--{cke_protected}%3Cmeta%20name%3D%22viewport%22%20content%3D%22width%3Ddevice-width%22%3E--><base target="_blank"><title>Formulário de Pagamento</title><link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Roboto:400,700"><link href="/static/forms/client/css/174611631-formview_st_ltr.css" type="text/css" rel="stylesheet"><style type="text/css">
            body {
            background-color: rgb(231,238,247);
            background-image: url(''//ssl.gstatic.com/docs/forms/themes/images/v1/0AX42CRMsmRFbUy03NTAzM2Q4My03ODU1LTQ2NzItODI2YS1kZmU5YzdiMzZjOGQ/blue-stripe-bg.png'');
            background-repeat: repeat;
            background-position: left top;
            }

            .ss-form-container, .ss-resp-card {
            background-color: rgb(255,255,255);
            }

            .ss-footer, .ss-response-footer {
            background-color: rgb(255,255,255);
            }

            .ss-grid-row-odd {
            background-color: rgb(242,242,242);
            }

            .ss-form-container, .ss-resp-card {
            border-color: rgb(212,212,212);
            }

            .ss-form-title {
            text-align: left;
            }

            .ss-form-title[dir="rtl"] {
            text-align: right;
            }

            .ss-form-desc {
            text-align: left;
            }

            .ss-form-desc[dir="rtl"] {
            text-align: right;
            }

            .ss-header-image-container {
            height: 0;
            }

            .ss-item {
            font-size: 1.080rem;
            }

            .ss-choices {
            font-size: 1.000rem;
            }

            body {
            font-family: "Roboto";
            color: rgb(119,119,119);
            font-weight: 400;
            font-size: 1.080rem;
            font-style: normal;
            }

            .ss-record-username-message {
            font-family: "Roboto";
            color: rgb(119,119,119);
            font-weight: 400;
            font-size: 1.080rem;
            font-style: normal;
            }

            .ss-form-title {
            font-family: "Roboto";
            color: rgb(80,80,80);
            font-weight: 400;
            font-size: 2.460rem;
            font-style: normal;
            }

            .ss-confirmation {
            font-family: "Roboto";
            color: rgb(80,80,80);
            font-weight: 400;
            font-size: 2.460rem;
            font-style: normal;
            }

            .ss-page-title, .ss-section-title {
            font-family: "Roboto";
            color: rgb(80,80,80);
            font-weight: 400;
            font-size: 1.845rem;
            font-style: normal;
            }

            .ss-form-desc, .ss-page-description, .ss-section-description {
            font-family: "Roboto";
            color: rgb(140,140,140);
            font-weight: 400;
            font-size: 1.080rem;
            font-style: normal;
            }

            .ss-resp-content {
            font-family: "Roboto";
            color: rgb(119,119,119);
            font-weight: 400;
            font-size: 1.080rem;
            font-style: normal;
            }

            .ss-q-title {
            font-family: "Roboto";
            color: rgb(80,80,80);
            font-weight: 700;
            font-size: 1.080rem;
            font-style: normal;
            }

            .ss-embeddable-object-container .ss-q-title {
            font-family: "Roboto";
            color: rgb(80,80,80);
            font-weight: 700;
            font-size: 1.845rem;
            font-style: normal;
            }

            .ss-q-help, .ss-q-time-hint {
            font-family: "Roboto";
            color: rgb(140,140,140);
            font-weight: 400;
            font-size: 1.000rem;
            font-style: normal;
            }

            .ss-choice-label, .video-secondary-text, .ss-gridrow-leftlabel, .ss-gridnumber, .ss-scalenumber, .ss-leftlabel, .ss-rightlabel {
            font-family: "Roboto";
            color: rgb(80,80,80);
            font-weight: 400;
            font-size: 1.000rem;
            font-style: normal;
            }

            .error-message, .required-message, .ss-required-asterisk {
            font-family: "Roboto";
            color: rgb(196,59,29);
            font-weight: 400;
            font-size: 1.000rem;
            font-style: normal;
            }

            .ss-send-email-receipt {
            font-family: "Roboto";
            color: rgb(80,80,80);
            font-weight: 400;
            font-size: 1.000rem;
            font-style: normal;
            }

            .ss-password-warning {
            font-family: "Arial";
            color: rgb(119,119,119);
            font-weight: 400;
            font-size: 1.000rem;
            font-style: italic;
            }

            .disclaimer {
            font-family: "Arial";
            color: rgb(119,119,119);
            font-weight: 400;
            font-size: 0.850rem;
            font-style: normal;
            }

            .ss-footer-content {
            font-family: "Arial";
            color: rgb(80,80,80);
            font-weight: 400;
            font-size: 1.000rem;
            font-style: normal;
            }

            .progress-label {
            font-family: "Roboto";
            color: rgb(140,140,140);
            font-weight: 400;
            font-size: 1.000rem;
            font-style: normal;
            }

            a:link {
            color: rgb(0,0,238);
            }

            a:visited {
            color: rgb(85,26,139);
            }

            a:active {
            color: rgb(252,0,0);
            }

            input[type=''text''], input:not([type]), textarea {
            font-size: 1.000rem;
            }

            .error, .required, .errorbox-bad {
            border-color: rgb(196,59,29);
            }

            .jfk-progressBar-nonBlocking .progress-bar-thumb {
            background-color: rgb(140,140,140);
            }

            .ss-logo-image {
            background-image: url(''//ssl.gstatic.com/docs/forms/forms_logo_2_small_dark.png'');
            background-size: 108px 21px;
            width: 108px;
            height: 21px;
            }

            @media screen and (-webkit-device-pixel-ratio: 2) {
            .ss-logo-image {
            background-image: url(''//ssl.gstatic.com/docs/forms/forms_logo_2_small_dark_2x.png'');
            }
            }</style><link href="/static/forms/client/css/3145455273-mobile_formview_st_ltr.css" type="text/css" rel="stylesheet" media="screen and (max-device-width: 721px)"><!--{cke_protected}%3Cscript%20type%3D%22text%2Fjavascript%22%3E%0A%20%20%20%20%20%20%20%20%20%20%2F**%0A%20*%20%40license%0A%20*%0A%20*%20H5F%201.1.1%0A%20*%20See%20https%3A%2F%2Fgithub.com%2Fryanseddon%2FH5F%2F%20for%20details.%0A%20*%0A%20*%20Copyright%20(c)%202013%20Ryan%20Seddon%0A%20*%0A%20*%20Permission%20is%20hereby%20granted%2C%20free%20of%20charge%2C%20to%20any%20person%0A%20*%20obtaining%20a%20copy%20of%20this%20software%20and%20associated%20documentation%0A%20*%20files%20(the%20%22Software%22)%2C%20to%20deal%20in%20the%20Software%20without%0A%20*%20restriction%2C%20including%20without%20limitation%20the%20rights%20to%20use%2C%0A%20*%20copy%2C%20modify%2C%20merge%2C%20publish%2C%20distribute%2C%20sublicense%2C%20and%2For%20sell%0A%20*%20copies%20of%20the%20Software%2C%20and%20to%20permit%20persons%20to%20whom%20the%0A%20*%20Software%20is%20furnished%20to%20do%20so%2C%20subject%20to%20the%20following%0A%20*%20conditions%3A%0A%20*%0A%20*%20The%20above%20copyright%20notice%20and%20this%20permission%20notice%20shall%20be%0A%20*%20included%20in%20all%20copies%20or%20substantial%20portions%20of%20the%20Software.%0A%20*%0A%20*%20THE%20SOFTWARE%20IS%20PROVIDED%20%22AS%20IS%22%2C%20WITHOUT%20WARRANTY%20OF%20ANY%20KIND%2C%0A%20*%20EXPRESS%20OR%20IMPLIED%2C%20INCLUDING%20BUT%20NOT%20LIMITED%20TO%20THE%20WARRANTIES%0A%20*%20OF%20MERCHANTABILITY%2C%20FITNESS%20FOR%20A%20PARTICULAR%20PURPOSE%20AND%0A%20*%20NONINFRINGEMENT.%20IN%20NO%20EVENT%20SHALL%20THE%20AUTHORS%20OR%20COPYRIGHT%0A%20*%20HOLDERS%20BE%20LIABLE%20FOR%20ANY%20CLAIM%2C%20DAMAGES%20OR%20OTHER%20LIABILITY%2C%0A%20*%20WHETHER%20IN%20AN%20ACTION%20OF%20CONTRACT%2C%20TORT%20OR%20OTHERWISE%2C%20ARISING%0A%20*%20FROM%2C%20OUT%20OF%20OR%20IN%20CONNECTION%20WITH%20THE%20SOFTWARE%20OR%20THE%20USE%20OR%0A%20*%20OTHER%20DEALINGS%20IN%20THE%20SOFTWARE.%0A%20*%2F%0A(function(e%2Ct)%7B%22function%22%3D%3Dtypeof%20define%26%26define.amd%3Fdefine(t)%3A%22object%22%3D%3Dtypeof%20module%26%26module.exports%3Fmodule.exports%3Dt()%3Ae.H5F%3Dt()%7D)(this%2Cfunction()%7Bvar%20e%2Ct%2Ca%2Ci%2Cn%2Cr%2Cl%2Cs%2Co%2Cu%2Cd%2Cc%2Cv%2Cp%2Cf%2Cm%2Cb%2Ch%2Cg%2Cy%2Cw%2CC%2CN%2CA%2CE%2C%24%2Cx%3Ddocument%2Ck%3Dx.createElement(%22input%22)%2Cq%3D%2F%5E%5Ba-zA-Z0-9.!%23%24%25%26''*%2B-%5C%2F%3D%3F%5C%5E_%60%7B%7C%7D~-%5D%2B%40%5Ba-zA-Z0-9-%5D%2B(%3F%3A%5C.%5Ba-zA-Z0-9-%5D%2B)*%24%2F%2CM%3D%2F%5Ba-z%5D%5B%5C-%5C.%2Ba-z%5D*%3A%5C%2F%5C%2F%2Fi%2CL%3D%2F%5E(input%7Cselect%7Ctextarea)%24%2Fi%3Breturn%20r%3Dfunction(e%2Ct)%7Bvar%20a%3D!e.nodeType%7C%7C!1%2Ci%3D%7BvalidClass%3A%22valid%22%2CinvalidClass%3A%22error%22%2CrequiredClass%3A%22required%22%2CplaceholderClass%3A%22placeholder%22%2ConSubmit%3AFunction.prototype%2ConInvalid%3AFunction.prototype%7D%3Bif(%22object%22%3D%3Dtypeof%20t)for(var%20r%20in%20i)t%5Br%5D%3D%3D%3Dvoid%200%26%26(t%5Br%5D%3Di%5Br%5D)%3Bif(n%3Dt%7C%7Ci%2Ca)for(var%20s%3D0%2Co%3De.length%3Bo%3Es%3Bs%2B%2B)l(e%5Bs%5D)%3Belse%20l(e)%7D%2Cl%3Dfunction(a)%7Bvar%20i%2Cr%3Da.elements%2Cl%3Dr.length%2Cc%3D!!a.attributes.novalidate%3Bif(g(a%2C%22invalid%22%2Co%2C!0)%2Cg(a%2C%22blur%22%2Co%2C!0)%2Cg(a%2C%22input%22%2Co%2C!0)%2Cg(a%2C%22keyup%22%2Co%2C!0)%2Cg(a%2C%22focus%22%2Co%2C!0)%2Cg(a%2C%22change%22%2Co%2C!0)%2Cg(a%2C%22click%22%2Cu%2C!0)%2Cg(a%2C%22submit%22%2Cfunction(i)%7Breturn%20e%3D!0%2Ct%7C%7Cc%7C%7Ca.checkValidity()%3F(n.onSubmit.call(a%2Ci)%2Cvoid%200)%3A(w(i)%2Cvoid%200)%7D%2C!1)%2C!v())for(a.checkValidity%3Dfunction()%7Breturn%20d(a)%7D%3Bl%2D%2D%3B)i%3D!!r%5Bl%5D.attributes.required%2C%22fieldset%22!%3D%3Dr%5Bl%5D.nodeName.toLowerCase()%26%26s(r%5Bl%5D)%7D%2Cs%3Dfunction(e)%7Bvar%20t%3De%2Ca%3Dh(t)%2Cn%3D%7Btype%3At.getAttribute(%22type%22)%2Cpattern%3At.getAttribute(%22pattern%22)%2Cplaceholder%3At.getAttribute(%22placeholder%22)%7D%2Cr%3D%2F%5E(email%7Curl)%24%2Fi%2Cl%3D%2F%5E(input%7Ckeyup)%24%2Fi%2Cs%3Dr.test(n.type)%3Fn.type%3An.pattern%3Fn.pattern%3A!1%2Co%3Dp(t%2Cs)%2Cu%3Dm(t%2C%22step%22)%2Cv%3Dm(t%2C%22min%22)%2Cb%3Dm(t%2C%22max%22)%2Cg%3D!(%22%22%3D%3D%3Dt.validationMessage%7C%7Cvoid%200%3D%3D%3Dt.validationMessage)%3Bt.checkValidity%3Dfunction()%7Breturn%20d.call(this%2Ct)%7D%2Ct.setCustomValidity%3Dfunction(e)%7Bc.call(t%2Ce)%7D%2Ct.validity%3D%7BvalueMissing%3Aa%2CpatternMismatch%3Ao%2CrangeUnderflow%3Av%2CrangeOverflow%3Ab%2CstepMismatch%3Au%2CcustomError%3Ag%2Cvalid%3A!(a%7C%7Co%7C%7Cu%7C%7Cv%7C%7Cb%7C%7Cg)%7D%2Cn.placeholder%26%26!l.test(i)%26%26f(t)%7D%2Co%3Dfunction(e)%7Bvar%20t%3DC(e)%7C%7Ce%2Ca%3D%2F%5E(input%7Ckeyup%7Cfocusin%7Cfocus%7Cchange)%24%2Fi%2Cr%3D%2F%5E(submit%7Cimage%7Cbutton%7Creset)%24%2Fi%2Cl%3D%2F%5E(checkbox%7Cradio)%24%2Fi%2Cu%3D!0%3B!L.test(t.nodeName)%7C%7Cr.test(t.type)%7C%7Cr.test(t.nodeName)%7C%7C(i%3De.type%2Cv()%7C%7Cs(t)%2Ct.validity.valid%26%26(%22%22!%3D%3Dt.value%7C%7Cl.test(t.type))%7C%7Ct.value!%3D%3Dt.getAttribute(%22placeholder%22)%26%26t.validity.valid%3F(A(t%2C%5Bn.invalidClass%2Cn.requiredClass%5D)%2CN(t%2Cn.validClass))%3Aa.test(i)%3Ft.validity.valueMissing%26%26A(t%2C%5Bn.requiredClass%2Cn.invalidClass%2Cn.validClass%5D)%3At.validity.valueMissing%3F(A(t%2C%5Bn.invalidClass%2Cn.validClass%5D)%2CN(t%2Cn.requiredClass))%3At.validity.valid%7C%7C(A(t%2C%5Bn.validClass%2Cn.requiredClass%5D)%2CN(t%2Cn.invalidClass))%2C%22input%22%3D%3D%3Di%26%26u%26%26(y(t.form%2C%22keyup%22%2Co%2C!0)%2Cu%3D!1))%7D%2Cd%3Dfunction(t)%7Bvar%20a%2Ci%2Cr%2Cl%2Cs%2Cu%3D!1%3Bif(%22form%22%3D%3D%3Dt.nodeName.toLowerCase())%7Ba%3Dt.elements%3Bfor(var%20d%3D0%2Cc%3Da.length%3Bc%3Ed%3Bd%2B%2B)i%3Da%5Bd%5D%2Cr%3D!!i.attributes.disabled%2Cl%3D!!i.attributes.required%2Cs%3D!!i.attributes.pattern%2C%22fieldset%22!%3D%3Di.nodeName.toLowerCase()%26%26!r%26%26(l%7C%7Cs%26%26l)%26%26(o(i)%2Ci.validity.valid%7C%7Cu%7C%7C(e%26%26i.focus()%2Cu%3D!0%2Cn.onInvalid.call(t%2Ci)))%3Breturn!u%7Dreturn%20o(t)%2Ct.validity.valid%7D%2Cc%3Dfunction(e)%7Bvar%20t%3Dthis%3Bt.validationMessage%3De%7D%2Cu%3Dfunction(e)%7Bvar%20a%3DC(e)%3Ba.attributes.formnovalidate%26%26%22submit%22%3D%3D%3Da.type%26%26(t%3D!0)%7D%2Cv%3Dfunction()%7Breturn%20E(k%2C%22validity%22)%26%26E(k%2C%22checkValidity%22)%7D%2Cp%3Dfunction(e%2Ct)%7Bif(%22email%22%3D%3D%3Dt)return!q.test(e.value)%3Bif(%22url%22%3D%3D%3Dt)return!M.test(e.value)%3Bif(t)%7Bvar%20i%3De.getAttribute(%22placeholder%22)%2Cn%3De.value%3Breturn%20a%3DRegExp(%22%5E(%3F%3A%22%2Bt%2B%22)%24%22)%2Cn%3D%3D%3Di%3F!1%3A%22%22%3D%3D%3Dn%3F!1%3A!a.test(e.value)%7Dreturn!1%7D%2Cf%3Dfunction(e)%7Bvar%20t%3D%7Bplaceholder%3Ae.getAttribute(%22placeholder%22)%7D%2Ca%3D%2F%5E(focus%7Cfocusin%7Csubmit)%24%2Fi%2Cr%3D%2F%5E(input%7Ctextarea)%24%2Fi%2Cl%3D%2F%5Epassword%24%2Fi%2Cs%3D!!(%22placeholder%22in%20k)%3Bs%7C%7C!r.test(e.nodeName)%7C%7Cl.test(e.type)%7C%7C(%22%22!%3D%3De.value%7C%7Ca.test(i)%3Fe.value%3D%3D%3Dt.placeholder%26%26a.test(i)%26%26(e.value%3D%22%22%2CA(e%2Cn.placeholderClass))%3A(e.value%3Dt.placeholder%2Cg(e.form%2C%22submit%22%2Cfunction()%7Bi%3D%22submit%22%2Cf(e)%7D%2C!0)%2CN(e%2Cn.placeholderClass)))%7D%2Cm%3Dfunction(e%2Ct)%7Bvar%20a%3DparseInt(e.getAttribute(%22min%22)%2C10)%7C%7C0%2Ci%3DparseInt(e.getAttribute(%22max%22)%2C10)%7C%7C!1%2Cn%3DparseInt(e.getAttribute(%22step%22)%2C10)%7C%7C1%2Cr%3DparseInt(e.value%2C10)%2Cl%3D(r-a)%25n%3Breturn%20h(e)%7C%7CisNaN(r)%3F%22number%22%3D%3D%3De.getAttribute(%22type%22)%3F!0%3A!1%3A%22step%22%3D%3D%3Dt%3Fe.getAttribute(%22step%22)%3F0!%3D%3Dl%3A!1%3A%22min%22%3D%3D%3Dt%3Fe.getAttribute(%22min%22)%3Fa%3Er%3A!1%3A%22max%22%3D%3D%3Dt%3Fe.getAttribute(%22max%22)%3Fr%3Ei%3A!1%3Avoid%200%7D%2Cb%3Dfunction(e)%7Bvar%20t%3D!!e.attributes.required%3Breturn%20t%3Fh(e)%3A!1%7D%2Ch%3Dfunction(e)%7Bvar%20t%3De.getAttribute(%22placeholder%22)%2Ca%3D%2F%5E(checkbox%7Cradio)%24%2Fi%2Ci%3D!!e.attributes.required%3Breturn!(!i%7C%7C%22%22!%3D%3De.value%26%26e.value!%3D%3Dt%26%26(!a.test(e.type)%7C%7C%24(e)))%7D%2Cg%3Dfunction(e%2Ct%2Ca%2Ci)%7BE(window%2C%22addEventListener%22)%3Fe.addEventListener(t%2Ca%2Ci)%3AE(window%2C%22attachEvent%22)%26%26window.event!%3D%3Dvoid%200%26%26(%22blur%22%3D%3D%3Dt%3Ft%3D%22focusout%22%3A%22focus%22%3D%3D%3Dt%26%26(t%3D%22focusin%22)%2Ce.attachEvent(%22on%22%2Bt%2Ca))%7D%2Cy%3Dfunction(e%2Ct%2Ca%2Ci)%7BE(window%2C%22removeEventListener%22)%3Fe.removeEventListener(t%2Ca%2Ci)%3AE(window%2C%22detachEvent%22)%26%26window.event!%3D%3Dvoid%200%26%26e.detachEvent(%22on%22%2Bt%2Ca)%7D%2Cw%3Dfunction(e)%7Be%3De%7C%7Cwindow.event%2Ce.stopPropagation%26%26e.preventDefault%3F(e.stopPropagation()%2Ce.preventDefault())%3A(e.cancelBubble%3D!0%2Ce.returnValue%3D!1)%7D%2CC%3Dfunction(e)%7Breturn%20e%3De%7C%7Cwindow.event%2Ce.target%7C%7Ce.srcElement%7D%2CN%3Dfunction(e%2Ct)%7Bvar%20a%3Be.className%3F(a%3DRegExp(%22(%5E%7C%5C%5Cs)%22%2Bt%2B%22(%5C%5Cs%7C%24)%22)%2Ca.test(e.className)%7C%7C(e.className%2B%3D%22%20%22%2Bt))%3Ae.className%3Dt%7D%2CA%3Dfunction(e%2Ct)%7Bvar%20a%2Ci%2Cn%3D%22object%22%3D%3Dtypeof%20t%3Ft.length%3A1%2Cr%3Dn%3Bif(e.className)if(e.className%3D%3D%3Dt)e.className%3D%22%22%3Belse%20for(%3Bn%2D%2D%3B)a%3DRegExp(%22(%5E%7C%5C%5Cs)%22%2B(r%3E1%3Ft%5Bn%5D%3At)%2B%22(%5C%5Cs%7C%24)%22)%2Ci%3De.className.match(a)%2Ci%26%263%3D%3D%3Di.length%26%26(e.className%3De.className.replace(a%2Ci%5B1%5D%26%26i%5B2%5D%3F%22%20%22%3A%22%22))%7D%2CE%3Dfunction(e%2Ct)%7Bvar%20a%3Dtypeof%20e%5Bt%5D%2Ci%3DRegExp(%22%5Efunction%7Cobject%24%22%2C%22i%22)%3Breturn!!(i.test(a)%26%26e%5Bt%5D%7C%7C%22unknown%22%3D%3D%3Da)%7D%2C%24%3Dfunction(e)%7Bfor(var%20t%3Ddocument.getElementsByName(e.name)%2Ca%3D0%3Bt.length%3Ea%3Ba%2B%2B)if(t%5Ba%5D.checked)return!0%3Breturn!1%7D%2C%7Bsetup%3Ar%7D%7D)%3B%0A%0A%20%20%20%20%20%20%20%20%3C%2Fscript%3E--><link rel="alternate" type="text/xml+oembed" href="https://docs.google.com/forms/d/1qiregATuJuvL22GDMTmjGDnBxOupUCC2W0cSLXYrqzY/oembed?url=https://docs.google.com/forms/d/1qiregATuJuvL22GDMTmjGDnBxOupUCC2W0cSLXYrqzY/viewform&amp;format=xml"><!--{cke_protected}%3Cmeta%20property%3D%22og%3Atitle%22%20content%3D%22Formul%C3%A1rio%20de%20Pagamento%22%3E--><!--{cke_protected}%3Cmeta%20property%3D%22og%3Atype%22%20content%3D%22article%22%3E--><!--{cke_protected}%3Cmeta%20property%3D%22og%3Asite_name%22%20content%3D%22Google%20Docs%22%3E--><!--{cke_protected}%3Cmeta%20property%3D%22og%3Aurl%22%20content%3D%22https%3A%2F%2Fdocs.google.com%2Fforms%2Fd%2F1qiregATuJuvL22GDMTmjGDnBxOupUCC2W0cSLXYrqzY%2Fviewform%3Fusp%3Dembed_facebook%22%3E--><!--{cke_protected}%3Cmeta%20property%3D%22og%3Aimage%22%20content%3D%22https%3A%2F%2Flh6.googleusercontent.com%2FOaA44_9KZgQKnfl2syJnQKaHLbbwLxOSqAEOsgWibrf47z0zPRt_hXYmKmvdU0TuZaM%3Dw1200-h630-p%22%3E--><!--{cke_protected}%3Cmeta%20property%3D%22og%3Aimage%3Awidth%22%20content%3D%221200%22%3E--><!--{cke_protected}%3Cmeta%20property%3D%22og%3Aimage%3Aheight%22%20content%3D%22630%22%3E--><!--{cke_protected}%3Cmeta%20property%3D%22og%3Adescription%22%20content%3D%22Preencha%20os%20campos%20abaixo%20para%20a%20realiza%C3%A7%C3%A3o%20do%20pagamento%20do%20Workshop%20Online%20Legisla%C3%A7%C3%A3o%20de%20F%C3%A9rias%20e%2013%C2%BA%20Sal%C3%A1rio%22%3E--><!--{cke_protected}%3Cmeta%20name%3D%22twitter%3Acard%22%20content%3D%22player%22%3E--><!--{cke_protected}%3Cmeta%20name%3D%22twitter%3Atitle%22%20content%3D%22Formul%C3%A1rio%20de%20Pagamento%22%3E--><!--{cke_protected}%3Cmeta%20name%3D%22twitter%3Aurl%22%20content%3D%22https%3A%2F%2Fdocs.google.com%2Fforms%2Fd%2F1qiregATuJuvL22GDMTmjGDnBxOupUCC2W0cSLXYrqzY%2Fviewform%3Fusp%3Dembed_twitter%22%3E--><!--{cke_protected}%3Cmeta%20name%3D%22twitter%3Aimage%22%20content%3D%22https%3A%2F%2Flh6.googleusercontent.com%2FOaA44_9KZgQKnfl2syJnQKaHLbbwLxOSqAEOsgWibrf47z0zPRt_hXYmKmvdU0TuZaM%3Dw435-h251-p-b1-c0x00999999%22%3E--><!--{cke_protected}%3Cmeta%20name%3D%22twitter%3Aplayer%3Awidth%22%20content%3D%22435%22%3E--><!--{cke_protected}%3Cmeta%20name%3D%22twitter%3Aplayer%3Aheight%22%20content%3D%22251%22%3E--><!--{cke_protected}%3Cmeta%20name%3D%22twitter%3Aplayer%22%20content%3D%22https%3A%2F%2Fdocs.google.com%2Fforms%2Fd%2F1qiregATuJuvL22GDMTmjGDnBxOupUCC2W0cSLXYrqzY%2Fviewform%3Fembedded%3Dtrue%26amp%3Busp%3Dembed_twitter%22%3E--><!--{cke_protected}%3Cmeta%20name%3D%22twitter%3Adescription%22%20content%3D%22Preencha%20os%20campos%20abaixo%20para%20a%20realiza%C3%A7%C3%A3o%20do%20pagamento%20do%20Workshop%20Online%20Legisla%C3%A7%C3%A3o%20de%20F%C3%A9rias%20e%2013%C2%BA%20Sal%C3%A1rio%22%3E--><!--{cke_protected}%3Cmeta%20name%3D%22twitter%3Asite%22%20content%3D%22%40googledocs%22%3E--><div itemscope="" itemtype="http://schema.org/CreativeWork/FormObject"><!--{cke_protected}%3Cmeta%20itemprop%3D%22name%22%20content%3D%22Formul%26aacute%3Brio%20de%20Pagamento%22%3E--><!--{cke_protected}%3Cmeta%20itemprop%3D%22description%22%20content%3D%22Preencha%20os%20campos%20abaixo%20para%20a%20realiza%26ccedil%3B%26atilde%3Bo%20do%20pagamento%20do%20Workshop%20Online%20Legisla%26ccedil%3B%26atilde%3Bo%20de%20F%26eacute%3Brias%20e%2013%26ordm%3B%20Sal%26aacute%3Brio%22%3E--><!--{cke_protected}%3Cmeta%20itemprop%3D%22url%22%20content%3D%22https%3A%2F%2Fdocs.google.com%2Fforms%2Fd%2F1qiregATuJuvL22GDMTmjGDnBxOupUCC2W0cSLXYrqzY%2Fviewform%22%3E--><!--{cke_protected}%3Cmeta%20itemprop%3D%22embedUrl%22%20content%3D%22https%3A%2F%2Fdocs.google.com%2Fforms%2Fd%2F1qiregATuJuvL22GDMTmjGDnBxOupUCC2W0cSLXYrqzY%2Fviewform%3Fembedded%3Dtrue%22%3E--><!--{cke_protected}%3Cmeta%20itemprop%3D%22faviconUrl%22%20content%3D%22https%3A%2F%2Fssl.gstatic.com%2Fdocs%2Fspreadsheets%2Fforms%2Ffavicon_qp2.png%22%3E--><div class="ss-form-container"><div class="ss-header-image-container"><div class="ss-header-image-image"><div class="ss-header-image-sizer"><br></div><div class="ss-header-image-sizer"><br></div><div class="ss-header-image-sizer"><br></div></div></div><div class="ss-top-of-page"><div class="ss-form-heading"><h1 class="ss-form-title" dir="ltr"><span style="color:#000000;"><span style="font-size:16px;">Olá,<br><br>Será um prazer&nbsp;tê-lo como nosso aluno!</span><span style="font-size:16px;"></span><span style="font-size:16px;"></span></span><span style="font-size:16px;"><span style="color:#000000;"><br>Já estamos providenciando a emissão do boleto.<br><br></span><a data-cke-saved-href="http://www.nasajonsistemas.com.br/mkt/13oSalario.pdf" href="http://www.nasajonsistemas.com.br/mkt/13oSalario.pdf"><span style="color:#000000;">Acesse</span></a><span style="color:#000000;">&nbsp;a ementa completa do Workshop Online Legislação de Férias e 13º Salário.</span></span><span style="color:#000000;"><br></span></h1><p dir="ltr"><span style="color:#000000;"><span style="font-size:16px;"></span><span style="font-size:16px;">Até lá!</span><span style="font-size:16px;"><br>Fabiana Guerreiro</span><span style="font-size:16px;"><br>Nasajon Educacional</span></span><strong><span style="font-size:16px;"></span></strong><br></p></div></div></div></div></div>', NULL, NULL, 10058, 'Workshop Online Legislação de Férias e 13º Salário', NULL, NULL, NULL);
            INSERT INTO email.templates
            ("template", categoria, descricao, conteudo, lastupdate, versao, tenant, assunto, codigo, empresa, remetente)
            VALUES('2823462f-68e4-4601-8dc4-50af52571aee'::uuid, NULL, 'Dados não cliente: Workshop 13º', '<div contenteditable="true" class="cke_editable cke_editable_inline cke_contents_ltr cke_show_borders cke_focus" tabindex="0" spellcheck="false" role="textbox" aria-label="Editor de Rich Text, editor1" title="Editor de Rich Text, editor1" aria-describedby="cke_51" style="position: relative;"><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><span style="font-family: verdana, geneva, sans-serif;">Atenção, equipe! O contato deseja se inscrever no Workshop 13º Salário:</span></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><br></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><span style="font-family: verdana, geneva, sans-serif;">Nome: {{nome}}</span></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><span style="font-family: verdana, geneva, sans-serif;">CNPJ ou CPF:&nbsp;<span style="font-size: 13.2px; line-height: 19.8px;">{{cnpj}}</span></span></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><span style="font-family: verdana, geneva, sans-serif;">Email: {{email}}</span></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><span style="font-family: verdana, geneva, sans-serif;">Telefone:&nbsp;<span style="font-size: 13.2px; line-height: 19.8px;">{{telefone}}</span></span></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><font face="verdana, geneva, sans-serif">Endereço: {{endereço}}</font></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><font face="verdana, geneva, sans-serif">Número: {{numero}}</font></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><font face="verdana, geneva, sans-serif">Complemento: {{complemento}}</font></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><font face="verdana, geneva, sans-serif">Bairro: {{bairro}}</font></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><font face="verdana, geneva, sans-serif">Cidade: {{cidade}}</font></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><font face="verdana, geneva, sans-serif">UF: {{uf}}</font></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><span style="font-family: verdana, geneva, sans-serif; font-size: 13.2px; line-height: 19.8px;">CEP: {{CEP}}</span></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><span style="font-family: verdana, geneva, sans-serif; font-size: 13.2px; line-height: 19.8px;">Mensagem: {{mensagem}}</span>​</div></div>', NULL, NULL, 10058, 'Dados não cliente: Workshop 13º', NULL, NULL, NULL);
            INSERT INTO email.templates
            ("template", categoria, descricao, conteudo, lastupdate, versao, tenant, assunto, codigo, empresa, remetente)
            VALUES('e61febdb-98dd-4c02-b220-37b1e84c4dca'::uuid, NULL, 'Dados não cliente: Curso de Oratória e Apresentações Profissionais', '<div aria-describedby="cke_51" title="Editor de Rich Text, editor1" aria-label="Editor de Rich Text, editor1" role="textbox" style="position: relative;" spellcheck="false" tabindex="0" class="cke_editable cke_editable_inline cke_contents_ltr cke_focus cke_show_borders" contenteditable="true"><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><span style="font-family: verdana, geneva, sans-serif;">Atenção, equipe! O contato deseja se inscrever no Curso de Oratória e Apresentações Profissionais:</span></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><br></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><span style="font-family: verdana, geneva, sans-serif;">Nome: {{nome}}</span></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><span style="font-family: verdana, geneva, sans-serif;">CNPJ ou CPF:&nbsp;<span style="font-size: 13.2px; line-height: 19.8px;">{{cnpj}}</span></span></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><span style="font-family: verdana, geneva, sans-serif;">Email: {{email}}</span></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><span style="font-family: verdana, geneva, sans-serif;">Telefone:&nbsp;<span style="font-size: 13.2px; line-height: 19.8px;">{{telefone}}</span></span></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><font face="verdana, geneva, sans-serif">Endereço: {{endereço}}</font></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><font face="verdana, geneva, sans-serif">Número: {{numero}}</font></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><font face="verdana, geneva, sans-serif">Complemento: {{complemento}}</font></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><font face="verdana, geneva, sans-serif">Bairro: {{bairro}}</font></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><font face="verdana, geneva, sans-serif">Cidade: {{cidade}}</font></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><font face="verdana, geneva, sans-serif">UF: {{uf}}</font></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><span style="font-family: verdana, geneva, sans-serif; font-size: 13.2px; line-height: 19.8px;">CEP: {{CEP}}</span></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><span style="font-family: verdana, geneva, sans-serif; font-size: 13.2px; line-height: 19.8px;">Mensagem: {{mensagem}}</span>​</div></div>', NULL, NULL, 10058, 'Dados não cliente: Curso de Oratória e Apresentações Profissionais', NULL, NULL, NULL);
            INSERT INTO email.templates
            ("template", categoria, descricao, conteudo, lastupdate, versao, tenant, assunto, codigo, empresa, remetente)
            VALUES('5e821774-9799-4aaf-8184-0614c0b2f27f'::uuid, NULL, 'Email MKT - Sorteio Relâmpago EAD', '<div aria-describedby="cke_51" title="Editor de Rich Text, editor1" aria-label="Editor de Rich Text, editor1" role="textbox" style="position: relative;" spellcheck="false" tabindex="0" class="cke_editable cke_editable_inline cke_contents_ltr cke_show_borders" contenteditable="true"><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.1999998092651px; line-height: 19.7999992370605px; background-color: rgb(255, 255, 255);"><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.1999998092651px; line-height: 19.7999992370605px; background-color: rgb(255, 255, 255);"><span style="font-family:courier new,courier,monospace;">Atenção, equipe! O contato abaixo preencheu o formulário da landing page do EM - Curso Online EAD.</span></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.1999998092651px; line-height: 19.7999992370605px; background-color: rgb(255, 255, 255);"><br></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.1999998092651px; line-height: 19.7999992370605px; background-color: rgb(255, 255, 255);"><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.1999998092651px; line-height: 19.7999992370605px; background-color: rgb(255, 255, 255);"><font face="arial, helvetica, sans-serif">Nome: {{nome}}</font></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.1999998092651px; line-height: 19.7999992370605px; background-color: rgb(255, 255, 255);"><font face="arial, helvetica, sans-serif">Empresa:&nbsp;</font><span style="font-family: arial, helvetica, sans-serif; font-size: 13.1999998092651px; line-height: 19.7999992370605px;">{{empresa}}</span></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.1999998092651px; line-height: 19.7999992370605px; background-color: rgb(255, 255, 255);"><font face="arial, helvetica, sans-serif">Email:&nbsp;</font><span style="font-family: arial, helvetica, sans-serif; font-size: 13.1999998092651px; line-height: 19.7999992370605px;">{{email}}</span></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.1999998092651px; line-height: 19.7999992370605px; background-color: rgb(255, 255, 255);">Telefone: {{telefone}}<br></div></div></div></div>', NULL, NULL, 10058, 'Email MKT - Sorteio Relâmpago EAD', NULL, NULL, NULL);
            INSERT INTO email.templates
            ("template", categoria, descricao, conteudo, lastupdate, versao, tenant, assunto, codigo, empresa, remetente)
            VALUES('6c9b84b1-4cbd-4475-9f23-e2219e11a1f7'::uuid, NULL, 'E-mail para avisar que falta 7 dias para a cota vencer', '<html>
                        <head>
                            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
                            <link rel="stylesheet" type="text/css" href="http://meucondominio.nasajonsisitemas.com.br/estilo_emails.css">
                            <title>Aviso de Cota Condominial em Aberto</title>
                        </head>
                        <body>
                            <h1>Aviso de Cota Condominial em Aberto</h1>
                            <p>Prezado cliente, sua cota condominial vencerá em cerca de 7 dias.</p>
                        </body>
                    <html>', '2020-01-27 14:50:31.376', 1, NULL, 'Aviso de Cota Condominial em Aberto - 7 Dias', 'regua_cobranca_7dias', NULL, NULL);
            INSERT INTO email.templates
            ("template", categoria, descricao, conteudo, lastupdate, versao, tenant, assunto, codigo, empresa, remetente)
            VALUES('198a7de0-a623-4ad7-9896-44714f2bb78a'::uuid, NULL, 'Contato Interessado: Curso de Oratória e Apresentações Profissionais.', '<div aria-describedby="cke_51" title="Editor de Rich Text, editor1" aria-label="Editor de Rich Text, editor1" role="textbox" style="position: relative;" spellcheck="false" tabindex="0" class="cke_editable cke_editable_inline cke_contents_ltr cke_focus cke_show_borders" contenteditable="true"><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><span style="font-family: verdana, geneva, sans-serif;">Atenção, equipe! O contato deseja se inscrever no Curso de Oratória e Apresentações Profissionais.</span></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><br></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><span style="font-family: verdana, geneva, sans-serif;">Nome: {{nome}}</span></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><span style="font-family: verdana, geneva, sans-serif;">Email:&nbsp;<span style="font-size: 13.2px; line-height: 19.8px;">{{email}}</span></span></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><span style="font-family: verdana, geneva, sans-serif;">Telefone:&nbsp;<span style="font-size: 13.2px; line-height: 19.8px;">{{telefone}}</span></span></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);">CNPJ ou CPF: <span style="font-family: verdana, geneva, sans-serif;"><span style="font-size: 13.2px; line-height: 19.8px;">{{CNPJ}}</span></span></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><span style="font-family: verdana, geneva, sans-serif;">Cliente: {{Pagamento}}</span></div></div>', NULL, NULL, 10058, 'Curso de Oratória e Apresentações Profissionais', NULL, NULL, NULL);
            INSERT INTO email.templates
            ("template", categoria, descricao, conteudo, lastupdate, versao, tenant, assunto, codigo, empresa, remetente)
            VALUES('156d1cee-1d5a-48cd-b901-88194f397071'::uuid, NULL, 'Falecon: Mala Direta', '<div aria-describedby="cke_51" aria-label="Editor de Rich Text, editor1" contenteditable="true" role="textbox" spellcheck="false" style="position: relative;" tabindex="0" title="Editor de Rich Text, editor1">
            <div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><span style="font-family: verdana, geneva, sans-serif;">Aten&ccedil;&atilde;o, equipe! O contato deseja receber mais informa&ccedil;&otilde;es sobre o Mala Direta:</span></div>

            <div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);">&nbsp;</div>

            <div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><span style="font-family: verdana, geneva, sans-serif;">Nome: {{nome}}</span></div>

            <div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><span style="font-family: verdana, geneva, sans-serif;">Email:&nbsp;<span style="font-size: 13.2px; line-height: 19.8px;">{{email}}</span></span></div>

            <div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><span style="font-family: verdana, geneva, sans-serif;">Telefone:&nbsp;<span style="font-size: 13.2px; line-height: 19.8px;">{{telefone}}</span></span></div>

            <div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><span style="font-family: verdana, geneva, sans-serif;">Estado:&nbsp;<span style="font-size: 13.2px; line-height: 19.8px;">{{estado}}</span></span></div>

            <div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><span style="font-family: verdana, geneva, sans-serif;">Munic&iacute;pio:&nbsp;<span style="font-size: 13.2px; line-height: 19.8px;">{{cidade}}</span></span></div>

            <div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><span style="font-family: verdana, geneva, sans-serif;">Mensagem:&nbsp;<span style="font-size: 13.2px; line-height: 19.8px;">{{mensagem}}</span></span></div>
            </div>', NULL, NULL, 10058, 'Falecon: Mala Direta', NULL, NULL, NULL);
            INSERT INTO email.templates
            ("template", categoria, descricao, conteudo, lastupdate, versao, tenant, assunto, codigo, empresa, remetente)
            VALUES('de14e157-a366-4e78-89a3-f1e4b118a9d7'::uuid, NULL, 'Amigo indicado: Workshop Gratuito - Imersão eSocial', '<div class="gmail_default" style="color: rgb(33, 33, 33); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px;"><span style="font-family: verdana, geneva, sans-serif;">Aten&ccedil;&atilde;o, equipe! O contato abaixo indicou um amigo para o Workshop gratuito - Imers&atilde;o eSocial:</span></div>

            <div class="gmail_default" style="color: rgb(33, 33, 33); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px;">&nbsp;</div>

            <div class="gmail_default" style="color: rgb(33, 33, 33); font-size: 13.2px; line-height: 19.8px;"><font face="verdana, geneva, sans-serif">Nome do inscrito: {{nome}}</font></div>

            <div class="gmail_default" style="color: rgb(33, 33, 33); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px;"><span style="font-family: verdana, geneva, sans-serif;">Email do inscrito:&nbsp;<span style="font-size: 13.2px; line-height: 19.8px;">{{email}}</span></span></div>

            <div class="gmail_default" style="color: rgb(33, 33, 33); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px;"><span style="font-family: verdana, geneva, sans-serif;">Email do amigo 1:&nbsp;<span style="font-size: 13.2px; line-height: 19.8px;">{{amigo1}}</span></span></div>

            <div class="gmail_default" style="color: rgb(33, 33, 33); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px;"><span style="font-family: verdana, geneva, sans-serif;"><span style="font-size: 13.2px; line-height: 19.8px;">Email do amigo 2: {{amigo2}}</span></span></div>

            <div class="gmail_default" style="color: rgb(33, 33, 33); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px;"><span style="font-family: verdana, geneva, sans-serif;"><span style="font-size: 13.2px; line-height: 19.8px;">Email do amigo 3: {{amigo3}}</span></span></div>

            <div class="gmail_default" style="color: rgb(33, 33, 33); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px;">&nbsp;</div>', NULL, NULL, 10058, 'Amigo indicado: Workshop Gratuito - Imersão eSocial', NULL, NULL, NULL);
            INSERT INTO email.templates
            ("template", categoria, descricao, conteudo, lastupdate, versao, tenant, assunto, codigo, empresa, remetente)
            VALUES('bcb0ea86-8f80-4c05-9d57-77bb73a3ca17'::uuid, NULL, '2015-11-29 Cartilha de detecção de problemas', '<div contenteditable="true" class="cke_editable cke_editable_inline cke_contents_ltr cke_focus cke_show_borders" tabindex="0" spellcheck="false" role="textbox" aria-label="Rich Text Editor, editor1" title="Rich Text Editor, editor1" aria-describedby="cke_51" style="position: relative;"><p>Olá</p><p>Obrigado por seu interesse na Cartilha "5 Estratégias para evitar que probleminhas se transformem em problemões".&nbsp;</p><p>Este é um resumo de algumas ações que implementamos na minha empresa e, desde então, têm evitado a ocorrência de problemas por melhorar a qualidade da comunicação entre os diversos setores.</p><p><strong>Clique neste link para fazer o download:</strong> <a data-cke-saved-href="http://bit.ly/eviteproblemoes" target="_blank" href="http://bit.ly/eviteproblemoes"><strong>http://bit.ly/eviteproblemoes</strong></a></p><p>Espero que goste e&nbsp;apreciarei as suas críticas, elogios ou sugestões - por favor, deixe a sua opinião no site.</p><p>Até a próxima!</p><p style="text-align: center;">Claudio Nasajon</p><p style="text-align: center;">www.claudionasajon.com.br</p><p style="text-align: center;"><br></p></div>', NULL, NULL, 10074, 'Aqui está a Cartilha para Detecção de Problemas', NULL, NULL, NULL);
            INSERT INTO email.templates
            ("template", categoria, descricao, conteudo, lastupdate, versao, tenant, assunto, codigo, empresa, remetente)
            VALUES('791f72b7-55e4-4106-8723-7f93227ddb16'::uuid, NULL, 'Agora estamos conectados :-)', '<div contenteditable="true" class="cke_editable cke_editable_inline cke_contents_ltr cke_show_borders cke_focus" tabindex="0" spellcheck="false" role="textbox" aria-label="Rich Text Editor, editor1" title="Rich Text Editor, editor1" aria-describedby="cke_51" style="position: relative;"><p>Olá,</p><p>Escrevo para avisar que já realizei a sua inscrição na lista&nbsp;de dicas sobre empreendedorismo e gestão empresarial.</p><p>Espero que goste dos conteúdos, mas quero aproveitar para pedir um favor. Até agora venho escrevendo sobre os temas que EU acho relevantes, mas gostaria de saber quais são os SEUS interesses.</p><p>Daí pergunto: se fôssemos almoçar juntos, que perguntas você me faria? Sobre o que gostaria de conversar?</p><p>Por favor, responda neste link:&nbsp;<strong>http://bit.ly/1NHMiYN</strong></p><p>Vou usar as suas sugestões para criar conteúdos cada vez mais úteis para você e a sua equipe.</p><p>Desde já obrigado pela confiança!</p><p style="text-align: center;">Claudio Nasajon</p><p style="text-align: center;">claudionasajon.com.br</p><p style="text-align: center;">Dê a sua sugestão de temas aqui:&nbsp;<strong>http://bit.ly/1NHMiYN</strong></p></div>', NULL, NULL, 10074, 'Agora estamos conectados :-)', NULL, NULL, NULL);
            INSERT INTO email.templates
            ("template", categoria, descricao, conteudo, lastupdate, versao, tenant, assunto, codigo, empresa, remetente)
            VALUES('c50c78be-ef0b-44b7-bbc4-a3a0e64741ac'::uuid, NULL, 'Curso de Oratória e Apresentações Profissionais', '<div aria-describedby="cke_51" title="Editor de Rich Text, editor1" aria-label="Editor de Rich Text, editor1" role="textbox" style="position: relative;" spellcheck="false" tabindex="0" class="cke_editable cke_editable_inline cke_contents_ltr cke_show_borders" contenteditable="true"><h1 dir="ltr"><span style="color:#000000"><span style="font-size:16px">Olá,<br><br>Será um prazer&nbsp;tê-lo como nosso aluno!</span></span><br><span style="font-size:16px"><span style="color:#000000">Já estamos providenciando o seu pagamento.</span></span><br><br><span style="font-size:14px;"><a data-cke-saved-href="http://goo.gl/kWhz6J" href="http://goo.gl/kWhz6J"><strong>Acesse a ementa</strong></a> do <span style="font-family: arial,helvetica,sans-serif;"><strong><span style="color: rgb(0, 0, 128);">Curso de Oratória e Apresentações Profissionais</span></strong></span>. </span></h1><p><span style="color:#000000"><span style="font-size:16px">Até lá!</span><br><span style="font-size:16px">Fabiana Guerreiro</span><br><span style="font-size:16px">Nasajon Educacional</span></span><strong>.</strong></p></div>', NULL, NULL, 10058, 'Curso de Oratória e Apresentações Profissionais', NULL, NULL, NULL);
            INSERT INTO email.templates
            ("template", categoria, descricao, conteudo, lastupdate, versao, tenant, assunto, codigo, empresa, remetente)
            VALUES('d0c250c4-ec1d-4b17-b173-ad1e496d0f6b'::uuid, NULL, 'Falecon: Drive', '<div class="gmail_default" style="color: rgb(33, 33, 33); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px;"><span style="font-family: verdana, geneva, sans-serif;">Aten&ccedil;&atilde;o, equipe! O contato abaixo deseja receber uma demonstra&ccedil;&atilde;o gr&aacute;tis do&nbsp;<strong>Drive&nbsp;</strong>via Falecon:</span></div>

            <div class="gmail_default" style="color: rgb(33, 33, 33); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px;">&nbsp;</div>

            <div class="gmail_default" style="color: rgb(33, 33, 33); font-size: 13.2px; line-height: 19.8px;"><font face="verdana, geneva, sans-serif">Nome: {{nome}}</font></div>

            <div class="gmail_default" style="color: rgb(33, 33, 33); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px;"><span style="font-family: verdana, geneva, sans-serif;">Email:&nbsp;<span style="font-size: 13.2px; line-height: 19.8px;">{{email}}</span></span></div>

            <div class="gmail_default" style="color: rgb(33, 33, 33); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px;"><span style="font-family: verdana, geneva, sans-serif;">Telefone:&nbsp;<span style="font-size: 13.2px; line-height: 19.8px;">{{telefone}}</span></span></div>

            <div class="gmail_default" style="color: rgb(33, 33, 33); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px;"><span style="font-family: verdana, geneva, sans-serif;">Estado:&nbsp;<span style="font-size: 13.2px; line-height: 19.8px;">{{estado}}</span></span></div>

            <div class="gmail_default" style="color: rgb(33, 33, 33); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px;"><span style="font-family: verdana, geneva, sans-serif;">Munic&iacute;pio:&nbsp;<span style="font-size: 13.2px; line-height: 19.8px;">{{cidade}}</span></span></div>

            <div class="gmail_default" style="color: rgb(33, 33, 33); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px;"><span style="font-family: verdana, geneva, sans-serif;">Mensagem:&nbsp;<span style="font-size: 13.2px; line-height: 19.8px;">{{mensagem}}</span></span></div>', NULL, NULL, 10058, 'Falecon: Drive', NULL, NULL, NULL);
            INSERT INTO email.templates
            ("template", categoria, descricao, conteudo, lastupdate, versao, tenant, assunto, codigo, empresa, remetente)
            VALUES('4c474324-6a8a-4b78-b826-935e55ec9cf9'::uuid, NULL, 'Email MKT Av. Desempenho: Novo Contato', '<div contenteditable="true" class="cke_editable cke_editable_inline cke_contents_ltr cke_show_borders cke_focus" tabindex="0" spellcheck="false" role="textbox" aria-label="Editor de Rich Text, editor1" title="Editor de Rich Text, editor1" aria-describedby="cke_51" style="position: relative;"><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><span style="font-family: verdana, geneva, sans-serif;">Atenção, equipe! O contato abaixo deseja receber uma demonstração grátis do Avaliação de Desempenho:</span></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><br></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><font face="verdana, geneva, sans-serif">Nome: {{nome}}</font></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><span style="font-family: verdana, geneva, sans-serif;">Email:&nbsp;<span style="font-size: 13.2px; line-height: 19.8px;">{{email}}</span></span></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><span style="font-family: verdana, geneva, sans-serif;">Telefone:&nbsp;<span style="font-size: 13.2px; line-height: 19.8px;">{{telefone}}</span></span></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><span style="font-family: verdana, geneva, sans-serif;">Estado:&nbsp;<span style="font-size: 13.2px; line-height: 19.8px;">{{estado}}</span></span></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><span style="font-family: verdana, geneva, sans-serif;">Município:&nbsp;<span style="font-size: 13.2px; line-height: 19.8px;">{{cidade}}</span></span></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><span style="font-family: verdana, geneva, sans-serif;">Mensagem:&nbsp;<span style="font-size: 13.2px; line-height: 19.8px;">{{mensagem}}</span></span></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><br></div></div>', NULL, NULL, 10058, 'Email MKT Av. Desempenho: Novo Contato', NULL, NULL, NULL);
            INSERT INTO email.templates
            ("template", categoria, descricao, conteudo, lastupdate, versao, tenant, assunto, codigo, empresa, remetente)
            VALUES('25586590-8c62-4fff-84f8-f155a25424ca'::uuid, NULL, 'Teste Esqueleto 2', '<div contenteditable="true" class="cke_editable cke_editable_inline cke_contents_ltr cke_focus cke_show_borders" tabindex="0" spellcheck="false" role="textbox" aria-label="Editor de Rich Text, editor1" title="Editor de Rich Text, editor1" aria-describedby="cke_51" style="position: relative;"><table border="0" cellspacing="1" style="table-layout:fixed;" width="700" align="center" class=" cke_show_border"><tbody><tr><td style="font-family:Trebuchet MS; font-size:18px; height:70;"><br></td></tr><tr><td style="font-family:Trebuchet MS; font-size:18px; height:350;"><br></td></tr><tr><td style="font-family:Trebuchet MS; font-size:18px; height:70;"><br></td></tr></tbody></table></div>', NULL, NULL, 10058, 'Teste Esqueleto 2', NULL, NULL, NULL);
            INSERT INTO email.templates
            ("template", categoria, descricao, conteudo, lastupdate, versao, tenant, assunto, codigo, empresa, remetente)
            VALUES('6827829d-ebbb-4de5-b684-ae70b3d9cc06'::uuid, NULL, 'Video extra 2 (Evora) sobre diferenciação', '<div contenteditable="true" class="cke_editable cke_editable_inline cke_contents_ltr cke_show_borders" tabindex="0" spellcheck="false" role="textbox" aria-label="Rich Text Editor, editor1" title="Rich Text Editor, editor1" aria-describedby="cke_51" style="position: relative;"><p>Olá,</p><p>Ontem passei por Évora, no Sudoeste de Portugal, e durante um tour guiado vi um exemplo de como "diferenciar o indiferenciável" que decidi compartilhar com você <strong><a data-cke-saved-href="https://www.youtube.com/watch?v=sJGcjazxGlQ" href="https://www.youtube.com/watch?v=sJGcjazxGlQ">neste video</a>&nbsp;</strong>porque tem tudo a ver com um dos pilares da Empresa Vendável<strong>.</strong></p><p>Espero que goste e, como sempre, apreciarei os seus comentários :-)</p><p>Um abraçao,</p><p>Claudio</p><p>Veja o vídeo direto no Youtube:&nbsp;<a data-cke-saved-href="https://www.youtube.com/watch?v=sJGcjazxGlQ" href="https://www.youtube.com/watch?v=sJGcjazxGlQ">https://www.youtube.com/watch?v=sJGcjazxGlQ</a></p></div>', NULL, NULL, 10082, 'Como diferenciar o indiferenciável', NULL, NULL, NULL);
            INSERT INTO email.templates
            ("template", categoria, descricao, conteudo, lastupdate, versao, tenant, assunto, codigo, empresa, remetente)
            VALUES('03558739-5410-497c-b101-b1dce3d9a7cc'::uuid, NULL, 'EM Contato interessado: Conteúdo gratuito - O que é um ERP?', '<p>Aten&ccedil;&atilde;o, equipe! O contato abaixo preencheu o formul&aacute;rio&nbsp;<strong>Conte&uacute;do gratuito - &quot;O que &eacute; um ERP?&quot; via Email Mkt</strong></p>

            <p>Email: {{email}}<br />
            &nbsp;</p>', NULL, NULL, 10058, 'EM Contato interessado: Conteúdo gratuito - O que é um ERP?', NULL, NULL, NULL);
            INSERT INTO email.templates
            ("template", categoria, descricao, conteudo, lastupdate, versao, tenant, assunto, codigo, empresa, remetente)
            VALUES('dd40a4fa-6d54-4146-89d4-cd79bb8de840'::uuid, NULL, 'Teste Esqueleto 1', '<div class="block_border" style="width:780px;margin: 10px 10px 0 10px;">
            <div contenteditable="true" class="cke_editable cke_editable_inline cke_contents_ltr cke_show_borders cke_focus" tabindex="0" spellcheck="false" role="textbox" aria-label="Editor de Rich Text, editor1" title="Editor de Rich Text, editor1" aria-describedby="cke_51" style="position: relative;"><table align="center" border="0" cellspacing="1" style="table-layout:fixed;" width="600" class=" cke_show_border"><tbody><tr><td colspan="3" style="font-family:Trebuchet MS; font-size:18px height:100px;"><br><br></td></tr><tr><td colspan="3" style="font-family:Trebuchet MS; font-size:18px; height:160px;"><br><br></td></tr><tr><td style="font-family:Trebuchet MS; font-size:18px; padding-right:10px; height:200px;"><br></td><td style="font-family:Trebuchet MS; font-size:18px; padding-right:10px; padding-left:10px; height:200px;"><br></td><td style="font-family:Trebuchet MS; font-size:18px; padding-left:10px; height:200px;"><br></td></tr><tr><td style="font-family:Trebuchet MS; font-size:18px;"><br></td><td style="font-family:Trebuchet MS; font-size:18px;"><br></td><td style="font-family:Trebuchet MS; font-size:18px;"><br></td></tr><tr><td colspan="3" style="font-family:Trebuchet MS; font-size:18px; height:90px;"><br></td></tr><tr><td colspan="3" style="font-family:Trebuchet MS; font-size:18px; height:50px;"><br></td></tr></tbody></table><p><br></p></div>
            </div>', NULL, NULL, 10058, 'Teste Esqueleto 1', NULL, NULL, NULL);
            INSERT INTO email.templates
            ("template", categoria, descricao, conteudo, lastupdate, versao, tenant, assunto, codigo, empresa, remetente)
            VALUES('c082d117-ad2f-45ba-b215-937f71688904'::uuid, NULL, 'Teste Esqueleto 3', '<div contenteditable="true" class="cke_editable cke_editable_inline cke_contents_ltr cke_show_borders cke_focus" tabindex="0" spellcheck="false" role="textbox" aria-label="Editor de Rich Text, editor1" title="Editor de Rich Text, editor1" aria-describedby="cke_51" style="position: relative;"><table align="center" border="0" cellspacing="1" style="table-layout:fixed;" width="600" class=" cke_show_border"><tbody><tr><td colspan="2" style="font-family:Trebuchet MS; font-size:18px; height:100;"><br></td></tr><tr><td colspan="2" style="font-family:Trebuchet MS; font-size:18px; height:380;"><br></td></tr></tbody></table></div>', NULL, NULL, 10058, 'Teste Esqueleto 3', NULL, NULL, NULL);
            INSERT INTO email.templates
            ("template", categoria, descricao, conteudo, lastupdate, versao, tenant, assunto, codigo, empresa, remetente)
            VALUES('123c4a6a-a11a-4b20-b857-526f5200c8cb'::uuid, NULL, 'Teste Esqueleto 4', '<div contenteditable="true" class="cke_editable cke_editable_inline cke_contents_ltr cke_show_borders cke_focus" tabindex="0" spellcheck="false" role="textbox" aria-label="Editor de Rich Text, editor1" title="Editor de Rich Text, editor1" aria-describedby="cke_51" style="position: relative;"><table align="center" border="0" cellspacing="1" style="table-layout:fixed" width="600" class=" cke_show_border"><tbody><tr><td colspan="3" style="font-family:Trebuchet MS; font-size:18px; height:100;"><br></td></tr><tr><td colspan="2" style="font-family:Trebuchet MS; font-size:18px; padding-right:10px; height:200;"><br></td><td style="font-family:Trebuchet MS; font-size:18px; padding-left:10px; height:200;"><br></td></tr><tr><td style="font-family:Trebuchet MS; font-size:18px; padding-right:10px; height:200;"><br></td><td colspan="2" style="font-family:Trebuchet MS; font-size:18px; padding-left:10px; height:200;"><br></td></tr><tr><td colspan="3" style="font-family:Trebuchet MS; font-size:18px; height:100;"><br></td></tr></tbody></table></div>', NULL, NULL, 10058, 'Teste Esqueleto 4', NULL, NULL, NULL);
            INSERT INTO email.templates
            ("template", categoria, descricao, conteudo, lastupdate, versao, tenant, assunto, codigo, empresa, remetente)
            VALUES('2eba3aa5-360a-443c-84f4-75d8f2ca0fa9'::uuid, NULL, 'E-mail que o atendente recebe após um cliente responder um chamado', '<!doctype html>
            <html>
                <head>
                    <meta charset="utf-8">
                    <title>Re: #{{protocolo}} - {{resumo}}</title>
                </head>
                <body>
                    <table cellpadding="0" cellspacing="0" border="0" align="center" width="600" style="border-top:3px solid #2b6584; font-family:Arial, Helvetica, sans-serif; color:#555555;">
                        <tbody>
                            <tr>
                                <td style="padding-top:10px;"><img src="http://s3-us-west-2.amazonaws.com/static.nasajon/img/logo.png" /></td>
                            </tr>
                            <tr>
                                <td>
                                    <h1 style="font-size:20px; margin:8px 0 20px 0; font-family:''Lato'', Arial, Helvetica, sans-serif;">
                                        <a href="{{ main_url ~ ''/chamados/''~ atendimento.atendimento}}" title="Re: #{{protocolo}} - {{resumo}}" style="color:#2b6584; text-decoration:none;">Re: #{{protocolo}} - {{resumo}}</a>
                                    </h1>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <a href="{{ main_url ~ ''/chamados/''~ atendimento.atendimento}}" title="Visualizar atendimento : #{{protocolo}}" style="display:inline-block; border-radius:3px; -moz-border-radius:3px; -webkit-border-radius:3px; background:#428bca; border:1px solid #357ebd; color:#FFF; padding:8px 10px; text-decoration:none; font-size:14px; margin-bottom:20px;">Visualizar atendimento</a>
                                </td>
                            </tr>
                            {% for item in atendimento.followups %}
                                {% if item.tipo == 1 %}
                                    {% set img_url = "https://s3-us-west-2.amazonaws.com/static.nasajon/img/atendimento/ico-comentario.gif" %}
                                    {% set background = "background:#fffdef;" %}
                                {% elseif item.criador %}
                                    {% set img_url = "https://s3-us-west-2.amazonaws.com/static.nasajon/img/atendimento/ico-resposta.gif" %}
                                    {% set background = "" %}
                                {% else %}
                                    {% set img_url = "https://s3-us-west-2.amazonaws.com/static.nasajon/img/atendimento/ico-msg-enviada.gif" %}
                                    {% set background = "background:#f7f7f7;" %}
                                {% endif %}
                            <tr>
                                <td>
                                    <table cellpadding="0" cellspacing="0" border="0" align="center" width="100%" style="{{ background }} border-bottom:1px solid #ccc; padding:0 10px;">
                                        <tr>
                                            <td style="padding-top:10px;">
                                                <strong style="font-size:14px;">
                                                    <img src="{{ img_url }}" style="border:none; margin:0; vertical-align:middle" />
                                                    {{ item.created_by.nome }} -
                                                </strong>
                                                <span style="font-size:12px; color:#949494;">{{ item.created_at | date("d/m/Y") }} às {{ item.created_at | date("H:i") }}</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="padding-bottom:20px;">
                                                <p style="font-size:14px; line-height:18px; margin:0 0;">{{ item.historico|raw }}</p>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        {% endfor %}
                        <tr>
                            <td>
                                <table cellpadding="0" cellspacing="0" border="0" align="center" width="100%" style="margin-top:30px; padding:15px; border:1px solid #ccc;">
                                    <tr>
                                        <td>
                                            <h2 style="font-size:16px; margin:0 0 20px 0; font-family:''Lato'', Arial, Helvetica, sans-serif; color:#2b6584;">Detalhes do Atendimento</h2>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <table cellpadding="3" cellspacing="0" border="0" align="center" width="100%">
                                                <tr>
                                                    <td style="text-align:right; padding-right:10px;" width="120" valign="top"><strong style="font-size:11px; line-height:18px;">ATRIBUÍDO A</strong></td>
                                                    <td style="font-size:14px; line-height:18px;" valign="top">
                                                        {# <a style="color:#428bca; text-decoration:none;" href="#" title="patriciaribeiro@nasajon.com.br">patriciaribeiro@nasajon.com.br</a>#}
                                                        {{ atendimento.atribuido_a.label }}
                                                    </td>
                                                </tr>
                                                {% if atendimento.cliente is not null %}
                                                    <tr>
                                                        <td style="text-align:right; padding-right:10px;" width="120" valign="top"><strong style="font-size:11px; line-height:18px;">CLIENTE</strong></td>
                                                        <td style="font-size:14px; line-height:18px;" valign="top">{{ atendimento.cliente.nome }}</td>
                                                    </tr>
                                                {% endif %}
                                                <tr>
                                                    <td style="text-align:right; padding-right:10px;" width="120" valign="top"><strong style="font-size:11px; line-height:18px;">CRIADO EM</strong></td>
                                                    <td style="font-size:14px; line-height:18px;" valign="top">{{ atendimento.created_at|date("d/m/Y") }}</td>
                                                </tr>
                                                <tr>
                                                    <td style="text-align:right; padding-right:10px;" width="120" valign="top"><strong style="font-size:11px; line-height:18px;">CRIADO POR</strong></td>
                                                    <td style="font-size:14px; line-height:18px;" valign="top">
                                                        {{ atendimento.created_by.nome }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="text-align:right; padding-right:10px;" width="120" valign="top"><strong style="font-size:11px; line-height:18px;">E-MAIL DO CONTATO</strong></td>
                                                    <td style="font-size:14px; line-height:18px;" valign="top">
                                                        {{ atendimento.email }}
                                                    </td>
                                                </tr>
                                                {#<tr>
                                                    <td style="text-align:right; padding-right:10px;" width="120" valign="top"><strong style="font-size:11px; line-height:18px;">SISTEMA</strong></td>
                                                    <td style="font-size:14px; line-height:18px;" valign="top">Contábil SQL</td>
                                                </tr>
                                                <tr>
                                                    <td style="text-align:right; padding-right:10px;" width="120" valign="top"><strong style="font-size:11px; line-height:18px;">OCORRÊNCIA</strong></td>
                                                    <td style="font-size:14px; line-height:18px;" valign="top">Contábil SQL</td>
                                                </tr>#}
                                                <tr>
                                                    <td style="text-align:right; padding-right:10px;" width="120" valign="top"><strong style="font-size:11px; line-height:18px;">DESCRIÇÃO</strong></td>
                                                    <td style="font-size:14px; line-height:18px;">
                                                        <p style="margin:0;" valign="top">{{ atendimento.sintoma|raw }}</p>
                                                    </td>
                                                </tr>
                                                {% if atendimento.anexos|length > 0 %}
                                                <tr>
                                                    <td style="text-align:right; padding-right:10px;" width="100" valign="top"><strong style="font-size:11px; line-height:18px;">ANEXOS</strong></td>
                                                    <td style="font-size:14px; line-height:18px;" valign="top">
                                                        <ul style="padding:0; margin:0; list-style:none;">
                                                            {% for anexo in atendimento.anexos %}
                                                            <li><a href="{{anexo.url}}" style="text-decoration:none; color:#428bca;">{{anexo.nome}}</a></li>
                                                            {% endfor %}
                                                        </ul>
                                                    </td>
                                                </tr>
                                                {% endif %}
                                            </table>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align:center">
                                <p style="font-size:11px; margin:20px 0 5px;">{#Responda o e-mail para adicionar uma resposta • #}<a href="{{ main_url ~ ''/chamados/''~ atendimento.atendimento}}" style="text-decoration:none; color:#428bca;">Visualizar no Sistema de Atendimentos</a></p>
                                <p style="font-size:11px; margin:0 0 8px;">Desenvolvido por <a href="http://www.nasajon.com.br" style="text-decoration:none; color:#428bca;">Nasajon Sistemas</a></p>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </body>
            </html>', '2016-06-14 21:50:05.891', 1, NULL, 'Re: #{{protocolo}} - {{resumo}}', 'atendimento_resposta_cliente', NULL, NULL);
            INSERT INTO email.templates
            ("template", categoria, descricao, conteudo, lastupdate, versao, tenant, assunto, codigo, empresa, remetente)
            VALUES('bdbb0d48-4283-4c17-9306-7fe85191524b'::uuid, NULL, 'Aqui está o seu link para os modelos de quadros de acompanhamento', '<div contenteditable="true" class="cke_editable cke_editable_inline cke_contents_ltr cke_show_borders cke_focus" tabindex="0" spellcheck="false" role="textbox" aria-label="Rich Text Editor, editor1" title="Rich Text Editor, editor1" aria-describedby="cke_51" style="position: relative;"><p>Olá</p><p>Obrigado por seu interesse nos modelos de quadros de acompanhamento. Eu tenho usado nos meus próprios projetos para manter a equipe sintonizada. Espero que sejam úteis para você também.</p><p>Os modelos estão em formato Google DOCs então você pode fazer uma cópia e adaptar para a sua própria realidade. Basicamente no cabeçalho eu coloco as fases do projeto, ou as datas devidas ou o tipo de trabalho a ser executado, e nas linhas eu coloco os diversos projetos ou os diferentes recursos usados (pessoas, empresas contratadas etc.). Daí todos os dias os "post-it" mudam de lugar e todos tem uma visão do que acontece sem precisar ligar os computadores.<br></p><p><strong>Clique neste link para acessar os modelos:</strong>&nbsp;<a data-cke-saved-href="http://bit.ly/1n0zl5X" href="http://bit.ly/1n0zl5X" class="copyable-link v-middle" style="box-sizing: border-box; padding: 2px 0px; margin: 0px; text-decoration: none; color: rgb(238, 97, 35); vertical-align: middle; white-space: nowrap; display: inline-block; max-width: calc(100% - 65px); overflow: hidden; font-family: ''Source Sans Pro'', sans-serif; font-size: 14px; line-height: 14px; background-color: rgb(255, 255, 255);" target="_blank">bit.ly/<span class="copy-hash semibold" style="box-sizing: border-box; padding: 0px; margin: 0px; font-weight: 600;">1n0zl5X</span></a></p><p>Espero que goste e&nbsp;apreciarei as suas críticas, elogios ou sugestões - por favor, deixe a sua opinião no site.</p><p>Até a próxima!</p><p style="text-align: center;">Claudio Nasajon</p><p style="text-align: center;">www.claudionasajon.com.br</p></div>', NULL, NULL, 10074, 'Aqui estão os seus modelos de quadros de acompanhamento', NULL, NULL, NULL);
            INSERT INTO email.templates
            ("template", categoria, descricao, conteudo, lastupdate, versao, tenant, assunto, codigo, empresa, remetente)
            VALUES('64cbfe79-f517-4c47-aea0-792ee4471010'::uuid, NULL, 'Contato interessado no Finanças - Google', '<p dir="ltr" style="line-height: 1.38; margin-top: 0pt; margin-bottom: 0pt;"><span id="docs-internal-guid-431f56ec-7fff-04fc-23bf-95b38e95c8fa"><span style="font-size: 11pt; font-family: Arial; color: rgb(0, 0, 0); background-color: transparent; font-variant-numeric: normal; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;">Aten&ccedil;&atilde;o, equipe! O contato abaixo preencheu o formul&aacute;rio da p&aacute;gina: <b>FINAN&Ccedil;AS GOOGLE</b></span></span></p>

            <p dir="ltr" style="line-height: 1.38; margin-top: 0pt; margin-bottom: 0pt;"><span id="docs-internal-guid-431f56ec-7fff-04fc-23bf-95b38e95c8fa"><span style="font-size: 11pt; font-family: Arial; color: rgb(0, 0, 0); background-color: transparent; font-variant-numeric: normal; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;">N&atilde;o se esque&ccedil;am de cadastrar a m&iacute;dia de origem no ERP! </span></span><br class="kix-line-break" />
            &nbsp;</p>

            <p dir="ltr" style="line-height:1.38;margin-top:0pt;margin-bottom:0pt;"><span id="docs-internal-guid-d638e3ac-7fff-53a8-f024-05d662591fbd"><span style="font-size: 11pt; font-family: Arial; color: rgb(0, 0, 0); background-color: transparent; font-variant-numeric: normal; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;">Seu nome: {{nome}}</span></span></p>

            <p dir="ltr" style="line-height:1.38;margin-top:0pt;margin-bottom:0pt;"><span id="docs-internal-guid-d638e3ac-7fff-53a8-f024-05d662591fbd"><span style="font-size: 11pt; font-family: Arial; color: rgb(0, 0, 0); background-color: transparent; font-variant-numeric: normal; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;">Email: {{email}}</span></span></p>

            <p dir="ltr" style="line-height:1.38;margin-top:0pt;margin-bottom:0pt;"><span id="docs-internal-guid-d638e3ac-7fff-53a8-f024-05d662591fbd"><span style="font-size: 11pt; font-family: Arial; color: rgb(0, 0, 0); background-color: transparent; font-variant-numeric: normal; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;">Telefone: {{telefone}}</span></span></p>

            <p dir="ltr" style="line-height: 1.38; margin-top: 0pt; margin-bottom: 0pt;">&nbsp;</p>

            <p dir="ltr" style="line-height: 1.38; margin-top: 0pt; margin-bottom: 0pt;"><span id="docs-internal-guid-431f56ec-7fff-04fc-23bf-95b38e95c8fa"><span style="font-size: 11pt; font-family: Arial; color: rgb(0, 0, 0); background-color: transparent; font-variant-numeric: normal; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;">Lembrando que o prazo ideal para primeiro contato com o lead s&atilde;o 24 horas.</span></span></p>

            <p dir="ltr" style="line-height: 1.38; margin-top: 0pt; margin-bottom: 0pt;"><span id="docs-internal-guid-431f56ec-7fff-04fc-23bf-95b38e95c8fa"><span style="font-size: 11pt; font-family: Arial; color: rgb(0, 0, 0); background-color: transparent; font-variant-numeric: normal; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;">Juntos podemos fazer muito!</span></span></p>', NULL, NULL, 10058, 'Contato interessado no Finanças - Google', NULL, NULL, NULL);
            INSERT INTO email.templates
            ("template", categoria, descricao, conteudo, lastupdate, versao, tenant, assunto, codigo, empresa, remetente)
            VALUES('5a11b943-fffc-4dd6-b43f-958e29f0eec6'::uuid, NULL, 'Email MKT Novo indicado: Programa de Indicação', '<div contenteditable="true" class="cke_editable cke_editable_inline cke_contents_ltr cke_show_borders cke_focus" tabindex="0" spellcheck="false" role="textbox" aria-label="Editor de Rich Text, editor1" title="Editor de Rich Text, editor1" aria-describedby="cke_51" style="position: relative;"><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><span style="font-size:12px;"><span style="font-family:verdana,geneva,sans-serif;">Atenção, equipe! O contato abaixo deseja indicar um contato/cliente para o Programa de Indicação:</span></span></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><br></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><span style="font-size:12px;"><span style="font-family:verdana,geneva,sans-serif;">Nome: {{nome}}</span></span></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><span style="font-size:12px;"><span style="font-family:verdana,geneva,sans-serif;">CNPJ: {{cnpj}}</span></span></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><span style="font-size:12px;"><span style="font-family:verdana,geneva,sans-serif;">Email:&nbsp;<span style="line-height: 19.8px;">{{email}}</span></span></span></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><span style="font-size:12px;"><span style="font-family:verdana,geneva,sans-serif;">Nome do Indicado: {{nome}}</span></span></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><span style="font-size:12px;"><span style="font-family:verdana,geneva,sans-serif;">Email do Indicado: {{email}}</span></span></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><span style="font-size:12px;"><span style="font-family:verdana,geneva,sans-serif;">Telefone do Indicado: {{telefone}}</span></span>​<br></div></div>', NULL, NULL, 10058, 'Email MKT Novo indicado: Programa de Indicação', NULL, NULL, NULL);
            INSERT INTO email.templates
            ("template", categoria, descricao, conteudo, lastupdate, versao, tenant, assunto, codigo, empresa, remetente)
            VALUES('5d8dbf49-f6c0-4fbd-b94d-3563ff49c5e6'::uuid, NULL, 'Contato Interessado: Programa - Google: Eu Quero!', '<div aria-describedby="cke_51" aria-label="Editor de Rich Text, editor1" contenteditable="true" role="textbox" spellcheck="false" style="position: relative;" tabindex="0" title="Editor de Rich Text, editor1">
            <p>Ol&aacute; equipe, temos um parceiro que deseja receber mais informa&ccedil;&otilde;es sobre o Programa - Google: Eu Quero!<br />
            Seguem os dados:</p>

            <p>Nome: {{nome}}<br />
            Email: {{email}}<br />
            Telefone: {{telefone}}<br />
            Estado: {{estado}}<br />
            Interesse: {{interesse}}</p>
            </div>', NULL, NULL, 10058, 'Contato Interessado: Programa - Google: Eu Quero!', NULL, NULL, NULL);
            INSERT INTO email.templates
            ("template", categoria, descricao, conteudo, lastupdate, versao, tenant, assunto, codigo, empresa, remetente)
            VALUES('9f2b76a2-8f83-428d-bf19-4875dd77ca3b'::uuid, NULL, 'RS eBook - O fim do boleto sem registro chegou... E agora?', '<p style="line-height: 20.8px;">Gente,&nbsp;</p>

            <p style="line-height: 20.8px;">O contato abaixo realizou o download do&nbsp;eBook&nbsp;<strong>O fim do boleto sem registro chegou... E agora?</strong><strong>&nbsp;</strong>via Redes Sociais:</p>

            <p style="line-height: 20.8px;">Nome: {{nome}}<br />
            Email: {{email}}<br />
            Telefone: {{telefone}}<br />
            Empresa: {{empresa}}</p>', NULL, NULL, 10058, 'RS eBook - O fim do boleto sem registro chegou... E agora?', NULL, NULL, NULL);
            INSERT INTO email.templates
            ("template", categoria, descricao, conteudo, lastupdate, versao, tenant, assunto, codigo, empresa, remetente)
            VALUES('abeadf4d-b712-4f3c-8b39-35d036ff99f9'::uuid, NULL, 'EM Contato interessado: Solicitação de proposta - O que é um ERP?', '<p>Aten&ccedil;&atilde;o, equipe! O contato abaixo preencheu o formul&aacute;rio&nbsp;<strong>Solicite sua proposta - &quot;O que &eacute; um ERP?&quot; via Email Mkt</strong></p>

            <p>Nome: {{nome}}<br />
            Email: {{email}}<br />
            Telefone: {{telefone}}<br />
            Estado: {{estado}}<br />
            Mensagem: {{mensagem}}</p>', NULL, NULL, 10058, 'EM Contato interessado: Solicitação de proposta - O que é um ERP?', NULL, NULL, NULL);
            INSERT INTO email.templates
            ("template", categoria, descricao, conteudo, lastupdate, versao, tenant, assunto, codigo, empresa, remetente)
            VALUES('c3ae5e42-b031-47a9-86db-c4636a41cbdf'::uuid, NULL, 'eBook Varejo - EM', '<p style="line-height: 20.8px;">Gente,&nbsp;</p>

            <p style="line-height: 20.8px;">O contato abaixo realizou o download do&nbsp;eBook&nbsp;<strong>Varejo&nbsp;</strong>via Email Mkt:</p>

            <p style="line-height: 20.8px;">Nome: {{nome}}<br />
            Email: {{email}}<br />
            &nbsp;</p>', NULL, NULL, 10058, 'eBook Varejo - EM', NULL, NULL, NULL);
            INSERT INTO email.templates
            ("template", categoria, descricao, conteudo, lastupdate, versao, tenant, assunto, codigo, empresa, remetente)
            VALUES('1e14f47d-3852-499f-8fd2-a3068ddd15be'::uuid, NULL, 'PF Novo indicado: Programa de Indicação', '<div aria-describedby="cke_51" title="Editor de Rich Text, editor1" aria-label="Editor de Rich Text, editor1" role="textbox" style="position: relative;" spellcheck="false" tabindex="0" class="cke_editable cke_editable_inline cke_contents_ltr cke_focus cke_show_borders" contenteditable="true"><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><span style="font-size:12px;"><span style="font-family:verdana,geneva,sans-serif;">Atenção, equipe! O contato abaixo deseja indicar um contato/cliente para o Programa de Indicação PF:</span></span></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><br></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><span style="font-size:12px;"><span style="font-family:verdana,geneva,sans-serif;">Nome: {{nome}}</span></span></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><span style="font-size:12px;"><span style="font-family:verdana,geneva,sans-serif;">CNPJ: {{cnpj}}</span></span></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><span style="font-size:12px;"><span style="font-family:verdana,geneva,sans-serif;">Email:&nbsp;<span style="line-height: 19.8px;">{{email}}</span></span></span></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><span style="font-size:12px;"><span style="font-family:verdana,geneva,sans-serif;">Nome do Indicado: {{nome}}</span></span></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><span style="font-size:12px;"><span style="font-family:verdana,geneva,sans-serif;">Email do Indicado: {{email}}</span></span></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><span style="font-size:12px;"><span style="font-family:verdana,geneva,sans-serif;">Telefone do Indicado: {{telefone}}</span></span></div></div>', NULL, NULL, 10058, 'PF Novo indicado: Programa de Indicação', NULL, NULL, NULL);
            INSERT INTO email.templates
            ("template", categoria, descricao, conteudo, lastupdate, versao, tenant, assunto, codigo, empresa, remetente)
            VALUES('75858eb8-4af9-42f8-8af3-d5ea83024044'::uuid, NULL, '2015-12-05 Cartilha Estilos de negociação', '<div contenteditable="true" class="cke_editable cke_editable_inline cke_contents_ltr cke_show_borders cke_focus" tabindex="0" spellcheck="false" role="textbox" aria-label="Rich Text Editor, editor1" title="Rich Text Editor, editor1" aria-describedby="cke_51" style="position: relative;"><p><span style="font-size:12px;"><span style="font-family:arial,helvetica,sans-serif;">Olá</span></span></p><p><span style="font-size:12px;"><span style="font-family:arial,helvetica,sans-serif;">Obrigado por seu interesse na cartilha "Como lidar com os diferentes estilos de negociação".&nbsp;</span></span></p><p><span style="font-size:12px;"><span style="font-family:arial,helvetica,sans-serif;">Nela apresento os quatro estilos de negociação identificados por Jung e mostro algumas táticas que costumam usar (e como lidar com elas).<span id="docs-internal-guid-ac86ab28-73b4-0d94-62b3-5f2f77db590c"><span style="vertical-align: baseline; white-space: pre-wrap;"> </span></span></span></span><span style="font-size:12px;"><span style="font-family:arial,helvetica,sans-serif;"><br></span></span></p><p><span style="font-size:12px;"><span style="font-family:arial,helvetica,sans-serif;"><strong>Clique neste link para fazer o download:</strong>&nbsp;<a data-cke-saved-href="http://bit.ly/1NzUdX8" target="_blank" href="http://bit.ly/1NzUdX8"><strong></strong></a></span></span><a data-cke-saved-href="http://bit.ly/1NzUdX8" href="http://bit.ly/1NzUdX8" class="copyable-link v-middle" style="box-sizing: border-box; padding: 2px 0px; margin: 0px; text-decoration: none; color: rgb(238, 97, 35); vertical-align: middle; white-space: nowrap; display: inline-block; max-width: calc(100% - 65px); overflow: hidden; font-family: ''Source Sans Pro'', sans-serif; font-size: 14px; line-height: 14px; background-color: rgb(255, 255, 255);">bit.ly/<span class="copy-hash semibold" style="box-sizing: border-box; padding: 0px; margin: 0px; font-weight: 600;">1NzUdX8</span></a><span style="font-size:12px;"><span style="font-family:arial,helvetica,sans-serif;"><a data-cke-saved-href="http://bit.ly/1NzUdX8" target="_blank" href="http://bit.ly/1NzUdX8"><strong></strong></a></span></span></p><p><span style="font-size:12px;"><span style="font-family:arial,helvetica,sans-serif;">Espero que goste e&nbsp;apreciarei as suas críticas, elogios ou sugestões - por favor, deixe a sua opinião no site.</span></span></p><p><span style="font-size:12px;"><span style="font-family:arial,helvetica,sans-serif;">Até a próxima!</span></span></p><p style="text-align: center;"><span style="font-size:12px;"><span style="font-family:arial,helvetica,sans-serif;">Claudio Nasajon</span></span></p><p style="text-align: center;"><span style="font-size:12px;"><span style="font-family:arial,helvetica,sans-serif;">www.claudionasajon.com.br</span></span></p></div>', NULL, NULL, 10074, 'Aqui está a sua cartilha "Como lidar com os diferentes estilos de negociação"', NULL, NULL, NULL);
            INSERT INTO email.templates
            ("template", categoria, descricao, conteudo, lastupdate, versao, tenant, assunto, codigo, empresa, remetente)
            VALUES('a8961bb5-ffae-47ba-a8a4-3f91c0f9a530'::uuid, NULL, '2015-12-03 Lições de um motoboy para evitar que probleminhas virem problemões', '<div contenteditable="true" class="cke_editable cke_editable_inline cke_contents_ltr cke_focus cke_show_borders" tabindex="0" spellcheck="false" role="textbox" aria-label="Rich Text Editor, editor1" title="Rich Text Editor, editor1" aria-describedby="cke_51" style="position: relative;"><p>Olá!</p><p>Semana passada pedi uma pizza em casa. Quando chegou estava totalmente deformada, provavelmente fruto de algum tombo do motoboy no caminho.</p><p>O que aconteceu depois serviu para ilustrar uma lição de como uma empresa pode evitar que pequenos foguinhos se transformem num incêndio. Confira&nbsp;neste vídeo:</p><p><a data-cke-saved-href="http://claudionasajon.com.br/licoes-de-um-motoboy-para-evitar-que-probleminhas-virem-problemoes/" href="http://claudionasajon.com.br/licoes-de-um-motoboy-para-evitar-que-probleminhas-virem-problemoes/"><strong>http://claudionasajon.com.br/licoes-de-um-motoboy-para-evitar-que-probleminhas-virem-problemoes/</strong></a></p><p>Logo abaixo do vídeo tem um botão para você fazer o download da cartilha "<strong>5 Estratégias para evitar que probleminhas virem problemões</strong>", onde&nbsp;descrevo algumas ações de alto impacto e baixo (ou nenhum) custo que você pode implementar imediatamente (não requerem recursos especiais) para promover a camaradagem e melhorar a comunicação interna em sua organização.</p><p><strong><a data-cke-saved-href="http://claudionasajon.com.br/licoes-de-um-motoboy-para-evitar-que-probleminhas-virem-problemoes/" href="http://claudionasajon.com.br/licoes-de-um-motoboy-para-evitar-que-probleminhas-virem-problemoes/">Confira o vídeo e faça o download neste link</a></strong>.</p><p>E se gostar, deixe o seu comentário. Críticas, elogios e sugestões são sempre bem-vindos para melhorar as próximas edições.</p><p>Um forte abraço,</p><p style="text-align: center;">Claudio Nasajon</p><p style="text-align: center;">claudionasajon.com.br</p><p style="text-align: center;"><br></p><p style="text-align: center;">PS: Este é um e-mail automático, mas se você respondê-lo, receberei pessoalmente a sua mensagem.</p><p style="text-align: center;">PS (2): Não deixe de colocar o seu comentário na página (ou pelo menos um "curti") para eu saber se estou no caminho certo :)</p></div>', NULL, NULL, 10074, 'Lições de um motoboy para evitar que probleminhas virem problemões', NULL, NULL, NULL);
            INSERT INTO email.templates
            ("template", categoria, descricao, conteudo, lastupdate, versao, tenant, assunto, codigo, empresa, remetente)
            VALUES('34c9ef36-60e7-43d5-9562-d85b85c97b29'::uuid, NULL, 'E-mail quando se encaminha cópia do historico', '<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN" "http://www.w3.org/TR/REC-html40/loose.dtd">
            <html lang="en" xmlns="http://www.w3.org/1999/xhtml">
                <head>
                    <meta charset="utf-8">
                    <title>#{{protocolo}} - {{resumo}}</title>
                    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
                </head>
                <body>
                    <table cellpadding="0" cellspacing="0" border="0" align="center" width="600" style="border-top:3px solid #2b6584; font-family:Arial, Helvetica, sans-serif; color:#555555;">
                        <tbody>
                            {% if mensagem %}
                            <tr>
                                <td style="padding-top:10px;">
                                    {{mensagem}}
                                </td>
                            </tr>
                            {% endif %}
                            <tr>
                                <td style="padding-top:10px;">
                                    <img src="http://s3-us-west-2.amazonaws.com/static.nasajon/img/logo.png" />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h1 style="font-size:20px; margin:8px 0 20px 0; font-family:''Lato'', Arial, Helvetica, sans-serif;">
                                        <a href="{{ main_url ~ ''/chamados/''~ atendimento.atendimento}}" title="#{{protocolo}} - {{resumo}}" style="color:#2b6584; text-decoration:none;">#{{protocolo}} - {{resumo}}</a>
                                    </h1>
                                </td>
                            </tr>
                            {% for historico in atendimento.historico %}
                                {% if historico[''tipo''] == 1 %}
                                    <tr>
                                        <td>
                                            <table cellpadding="0" cellspacing="0" border="0" align="center" width="100%" style="border-bottom:1px solid #ccc; padding:0 10px;">
                                                <tr>
                                                    <td style="padding-top:10px;">
                                                        <strong style="font-size:14px;">
                                                            <img src="https://s3-us-west-2.amazonaws.com/static.nasajon/img/atendimento/ico-resposta-recebida.gif" style="border:none; margin:0; vertical-align:middle" />
                                                            {{ historico[''created_by''][''nome''] }}({{historico[''created_by''][''email'']}} )
                                                        </strong>
                                                        <span style="font-size:12px; color:#949494;">em {{ historico[''created_at''] |date("d/m/Y") }} às {{ historico[''created_at''] |date("H:i") }}:</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="padding-bottom:20px;">
                                                        {{ historico[''valornovo''][''sintoma''] |raw }}
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                {% elseif historico[''tipo''] == 2 %} <!--email contato -->
                                    <tr>
                                        <td style="padding:20px 0; border-bottom:1px solid #ccc; font-size:11px; color:#828282;">
                                            <strong>{{ historico[''created_by''][''nome''] }}({{historico[''created_by''][''email'']}} )</strong> em {{ historico[''created_at''] |date("d/m/Y") }} às {{ historico[''created_at''] |date("H:i") }}: <br />
                                            <strong>Email do contato:</strong> {{historico.valorantigo ? historico.valorantigo : ''(Vazio)''}} → {{historico.valornovo ? historico.valornovo : ''(Vazio)''}}
                                        </td>
                                    </tr>
                                {% elseif historico[''tipo''] == 3 %}
                                    <tr>
                                        <td style="padding:20px 0; border-bottom:1px solid #ccc; font-size:11px; color:#828282;">
                                            <strong>{{ historico[''created_by''][''nome''] }}({{historico[''created_by''][''email'']}} )</strong> em {{ historico[''created_at''] |date("d/m/Y") }} às {{ historico[''created_at''] |date("H:i") }}: <br />
                                            <strong>Situação:</strong> {{[''Aberto'', ''Fechado''][historico.valorantigo.situacao]}}→ {{[''Aberto'', ''Fechado''][historico.valornovo.situacao]}}
                                        </td>
                                    </tr>
                                {% elseif historico[''tipo''] == 4 %}
                                    <tr>
                                        <td style="padding:20px 0; border-bottom:1px solid #ccc; font-size:11px; color:#828282;">
                                            <strong>{{ historico[''created_by''][''nome''] }}({{historico[''created_by''][''email'']}} )</strong> em {{ historico[''created_at''] |date("d/m/Y") }} às {{ historico[''created_at''] |date("H:i") }}: <br />
                                            <strong>Atribuição:</strong> {{historico.valorantigo.nome ? historico.valorantigo.nome : ''(Vazio)''}} → {{historico.valornovo.nome ? historico.valornovo.nome : ''(Vazio)''}}
                                        </td>
                                    </tr>
                                {% elseif historico[''tipo''] == 5 %}
                                    <tr>
                                        <td style="padding:20px 0; border-bottom:1px solid #ccc; font-size:11px; color:#828282;">
                                            <strong>{{ historico[''created_by''][''nome''] }}({{historico[''created_by''][''email'']}} )</strong> em {{ historico[''created_at''] |date("d/m/Y") }} às {{ historico[''created_at''] |date("H:i") }}:
                                            {% for campo in historico.valornovo %}
                                                {% if campo[''valor_antigo''] is not same as(campo[''valor_novo'']) %}
                                                    <br /> <strong>{{campo[''label'']}}:</strong> {{ campo[''valor_antigo''] }} → {{ campo[''valor_novo''] }}
                                                {% endif %}
                                            {% endfor %}
                                        </td>
                                    </tr>
                                {% elseif historico[''tipo''] == 6 %}

                                    {% if historico[''valornovo''][''tipo''] == 0 %}
                                        <tr>
                                            <td>
                                                <table cellpadding="0" cellspacing="0" border="0" align="center" width="100%" style="background:#f7f7f7; border-bottom:1px solid #ccc; padding:0 10px;">
                                                    <tr>
                                                        <td style="padding-top:10px;" colspan="2">
                                                            <strong style="font-size:14px;"><img src="https://s3-us-west-2.amazonaws.com/static.nasajon/img/atendimento/ico-msg-enviada.gif" style="border:none; margin:0; vertical-align:middle" />
                                                                {{ historico[''created_by''][''nome''] }}({{historico[''created_by''][''email'']}} )
                                                            </strong>
                                                            <span style="font-size:12px; color:#949494;">em {{ historico[''created_at''] |date("d/m/Y") }} às {{ historico[''created_at''] |date("H:i") }}:</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="padding-bottom:20px;">
                                                            {{ historico[''valornovo''][''followup''][''historico'']|raw }}
                                                        </td>
                                                    </tr>
                                                    {% if historico[''valornovo''][''followup''][''anexos'']|length > 0 %}
                                                        <tr>
                                                            <td style="text-align:right; padding-right:10px;" width="100" valign="top"><strong style="font-size:11px; line-height:18px;">ANEXOS</strong></td>
                                                            <td style="font-size:14px; line-height:18px;" valign="top">
                                                                <ul style="padding:0; margin:0; list-style:none;">
                                                                    {% for anexo in historico[''valornovo''][''followup''][''anexos''] %}
                                                                        <li><a href="{{anexo.url}}" style="text-decoration:none; color:#428bca;">{{anexo.nome}}</a></li>
                                                                        {% endfor %}
                                                                </ul>
                                                            </td>
                                                        </tr>
                                                    {% endif %}

                                                </table>
                                            </td>
                                        </tr>
                                    {% elseif historico[''valornovo''][''tipo''] == 1 %}
                                        <tr>
                                            <td>
                                                <table cellpadding="0" cellspacing="0" border="0" align="center" width="100%" style="background:#fffdef; border-bottom:1px solid #ccc; padding:0 10px;">
                                                    <tr>
                                                        <td style="padding-top:10px;" colspan="2">
                                                            <strong style="font-size:14px;">
                                                                <img src="https://s3-us-west-2.amazonaws.com/static.nasajon/img/atendimento/ico-comentario.gif" style="border:none; margin:0; vertical-align:middle" />
                                                                {{ historico[''created_by''][''nome''] }}({{historico[''created_by''][''email'']}} )
                                                            </strong>
                                                            <span style="font-size:12px; color:#949494;">em {{ historico[''created_at''] |date("d/m/Y") }} às {{ historico[''created_at''] |date("H:i") }}:</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="padding-bottom:20px;">
                                                            {{ historico[''valornovo''][''followup''][''historico'']|raw }}
                                                        </td>
                                                    </tr>

                                                    {% if historico[''valornovo''][''followup''][''anexos'']|length > 0 %}
                                                        <tr>
                                                            <td style="text-align:right; padding-right:10px;" width="100" valign="top"><strong style="font-size:11px; line-height:18px;">ANEXOS</strong></td>
                                                            <td style="font-size:14px; line-height:18px;" valign="top">
                                                                <ul style="padding:0; margin:0; list-style:none;">
                                                                    {% for anexo in historico[''valornovo''][''followup''][''anexos''] %}
                                                                        <li><a href="{{anexo.url}}" style="text-decoration:none; color:#428bca;">{{anexo.nome}}</a></li>
                                                                        {% endfor %}
                                                                </ul>
                                                            </td>
                                                        </tr>
                                                    {% endif %}


                                                </table>
                                            </td>
                                        </tr>

                                    {% endif %}

                                {% elseif historico[''tipo''] == 7 %}
                                    <tr>
                                        <td style="padding:20px 0; border-bottom:1px solid #ccc; font-size:11px; color:#828282;">
                                            <strong>{{ historico[''created_by''][''nome''] }}({{historico[''created_by''][''email'']}} )</strong> em {{ historico[''created_at''] |date("d/m/Y") }} às {{ historico[''created_at''] |date("H:i") }}: <br />
                                            <strong>Cliente:</strong> {{historico.valorantigo.nome ? historico.valorantigo.nome : ''(Vazio)''}} → {{historico.valornovo.nome ? historico.valornovo.nome : ''(Vazio)''}}
                                        </td>
                                    </tr>
                                {% elseif historico[''tipo''] == 10 %} <!--email contato -->
                                <tr>
                                    <td style="padding:20px 0; border-bottom:1px solid #ccc; font-size:11px; color:#828282;">
                                    <strong>{{ historico[''created_by''][''nome''] }}({{historico[''created_by''][''email'']}} )</strong> em {{ historico[''created_at''] |date("d/m/Y") }} às {{ historico[''created_at''] |date("H:i") }}: <br />
                                    <strong>Encaminhado histórico para:</strong> {{historico.valornovo.historicoencaminhado}}
                                    </td>
                                </tr>

                                {% endif %}

                            {% endfor %}
                            <tr>
                                <td>
                                    <table cellpadding="0" cellspacing="0" border="0" align="center" width="100%" style="margin-top:30px; padding:15px; border:1px solid #ccc;">
                                        <tr>
                                            <td>
                                                <h2 style="font-size:16px; margin:0 0 20px 0; font-family:''Lato'', Arial, Helvetica, sans-serif; color:#2b6584;">Detalhes do Atendimento</h2>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <table cellpadding="3" cellspacing="0" border="0" align="center" width="100%">

                                                    <tr>
                                                        <td>
                                                            <table cellpadding="3" cellspacing="0" border="0" align="center" width="100%">
                                                                <tr>
                                                                    <td style="text-align:right; padding-right:10px;" width="120" valign="top"><strong style="font-size:11px; line-height:18px;">ATRIBUÍDO A</strong></td>
                                                                    <td style="font-size:14px; line-height:18px;" valign="top">{{ atendimento.atribuido_a.label }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td style="text-align:right; padding-right:10px;" width="120" valign="top"><strong style="font-size:11px; line-height:18px;">CRIADO EM</strong></td>
                                                                    <td style="font-size:14px; line-height:18px;" valign="top">{{ atendimento.created_at|date("d/m/Y") }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td style="text-align:right; padding-right:10px;" width="120" valign="top"><strong style="font-size:11px; line-height:18px;">CRIADO POR</strong></td>
                                                                    <td style="font-size:14px; line-height:18px;" valign="top">{{ atendimento.created_by.nome}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td style="text-align:right; padding-right:10px;" width="120" valign="top"><strong style="font-size:11px; line-height:18px;">E-MAIL DO CONTATO</strong></td>
                                                                    <td style="font-size:14px; line-height:18px;" valign="top">{{ atendimento.email}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td style="text-align:right; padding-right:10px;" width="120" valign="top"><strong style="font-size:11px; line-height:18px;">DESCRIÇÃO</strong></td>
                                                                    <td style="font-size:14px; line-height:18px;">
                                                                        {{ atendimento.sintoma|raw }}
                                                                    </td>
                                                                </tr>
                                                                {% if atendimento.anexos|length > 0 %}
                                                                    <tr>
                                                                        <td style="text-align:right; padding-right:10px;" width="120" valign="top"><strong style="font-size:11px; line-height:18px;">ANEXOS</strong></td>
                                                                        <td style="font-size:14px; line-height:18px;" valign="top">
                                                                            <ul style="padding:0; margin:0; list-style:none;">
                                                                                {% for anexo in atendimento.anexos %}
                                                                                    <li><a href="{{anexo.url}}" style="text-decoration:none; color:#428bca;">{{anexo.nome}}</a></li>
                                                                                    {% endfor %}
                                                                            </ul>
                                                                        </td>
                                                                    </tr>
                                                                {% endif %}
                                                            </table>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align:center">
                                    <p style="font-size:11px; margin:0 0 8px;">Desenvolvido por <a href="http://www.nasajon.com.br" style="text-decoration:none; color:#428bca;">Nasajon Sistemas</a></p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </body>
            </html>', '2019-01-03 11:26:30.282', 1, NULL, 'Fwd: #{{protocolo}}-{{resumo}}', 'atendimento_email_encaminhar_historico', NULL, NULL);
            INSERT INTO email.templates
            ("template", categoria, descricao, conteudo, lastupdate, versao, tenant, assunto, codigo, empresa, remetente)
            VALUES('18d3a45c-ee55-467e-867f-20af20c05de2'::uuid, NULL, 'EM eBook - O fim do boleto sem registro chegou... E agora?', '<p style="line-height: 20.8px;">Gente,&nbsp;</p>

            <p style="line-height: 20.8px;">O contato abaixo realizou o download do&nbsp;eBook&nbsp;<strong>O fim do boleto sem registro chegou... E agora?</strong><strong>&nbsp;</strong>via Email Mkt:</p>

            <p style="line-height: 20.8px;">Nome: {{nome}}<br />
            Email: {{email}}<br />
            Telefone: {{telefone}}<br />
            Empresa: {{empresa}}</p>', NULL, NULL, 10058, 'EM eBook - O fim do boleto sem registro chegou... E agora?', NULL, NULL, NULL);
            INSERT INTO email.templates
            ("template", categoria, descricao, conteudo, lastupdate, versao, tenant, assunto, codigo, empresa, remetente)
            VALUES('8686d4cf-32a9-4916-aaa9-672de455dc48'::uuid, NULL, 'Email MKT -  Promoção Int. Contábil + Educacional', '<div aria-describedby="cke_51" title="Editor de Rich Text, editor1" aria-label="Editor de Rich Text, editor1" role="textbox" style="position: relative;" spellcheck="false" tabindex="0" class="cke_editable cke_editable_inline cke_contents_ltr cke_show_borders cke_focus" contenteditable="true"><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><span style="font-family: verdana, geneva, sans-serif;">Atenção, equipe! O contato deseja receber mais informações sobre a </span>Promoção Int. Contábil + Educacional<span style="font-family: verdana, geneva, sans-serif;"> (Email MKT):</span><br></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><br></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><span style="font-family: verdana, geneva, sans-serif;">Nome: {{nome}}</span></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><span style="font-family: verdana, geneva, sans-serif;">Email:&nbsp;<span style="font-size: 13.2px; line-height: 19.8px;">{{email}}</span></span></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><span style="font-family: verdana, geneva, sans-serif;">Telefone:&nbsp;<span style="font-size: 13.2px; line-height: 19.8px;">{{telefone}}</span></span></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><span style="font-family: verdana, geneva, sans-serif;">Estado:&nbsp;<span style="font-size: 13.2px; line-height: 19.8px;">{{estado}}</span></span></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><span style="font-family: verdana, geneva, sans-serif;">Município:&nbsp;<span style="font-size: 13.2px; line-height: 19.8px;">{{cidade}}</span></span></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><span style="font-family: verdana, geneva, sans-serif;">Mensagem:&nbsp;<span style="font-size: 13.2px; line-height: 19.8px;">{{mensagem}}</span></span></div></div>', NULL, NULL, 10058, 'Email MKT -  Promoção Int. Contábil + Educacional', NULL, NULL, NULL);
            INSERT INTO email.templates
            ("template", categoria, descricao, conteudo, lastupdate, versao, tenant, assunto, codigo, empresa, remetente)
            VALUES('2820ab94-0fce-4f0f-b857-8660f70cc8a9'::uuid, NULL, 'Inclusão na lista de Quadros de acompanhamento', '<div contenteditable="true" class="cke_editable cke_editable_inline cke_contents_ltr cke_show_borders cke_focus" tabindex="0" spellcheck="false" role="textbox" aria-label="Rich Text Editor, editor1" title="Rich Text Editor, editor1" aria-describedby="cke_51" style="position: relative;"><p>{{nome}} &lt;{{email}}&gt;</p></div>', NULL, NULL, 10074, 'Inclusão na lista de quadros de acompanhamento', NULL, NULL, NULL);
            INSERT INTO email.templates
            ("template", categoria, descricao, conteudo, lastupdate, versao, tenant, assunto, codigo, empresa, remetente)
            VALUES('5901ed28-6ad1-4d9b-8c84-88b4bb2a3ccd'::uuid, NULL, 'Email do video extra 1 (Sintra, PT, sobre compartilhar informacao)', '<div contenteditable="true" class="cke_editable cke_editable_inline cke_contents_ltr cke_show_borders cke_focus" tabindex="0" spellcheck="false" role="textbox" aria-label="Rich Text Editor, editor1" title="Rich Text Editor, editor1" aria-describedby="cke_51" style="position: relative;"><p>Olá,</p><p>Ontem estava em Sintra, Portugal, e aconteceu uma situação que precisei resolver ligando para o escritório no Brasil. Gravei um vídeo para contar o que aconteceu (e de quebra, você pode ver algumas imagens da cidade).&nbsp;<br></p><p><a data-cke-saved-href="https://www.youtube.com/watch?v=M8UY2DFwesg" href="https://www.youtube.com/watch?v=M8UY2DFwesg">Clique aqui para ver no YouTube</a> (ou copie/cole este endereço no seu navegador: <a data-cke-saved-href="https://www.youtube.com/watch?v=M8UY2DFwesg" href="https://www.youtube.com/watch?v=M8UY2DFwesg">https://www.youtube.com/watch?v=M8UY2DFwesg</a>)&nbsp;<br></p><p>Espero que seja útil a você também.&nbsp;<br></p><p>Um abraço,&nbsp;</p><p>Claudio</p></div>', NULL, NULL, 10082, 'Olha o que aconteceu em Sintra e a lição que pude tirar disso', NULL, NULL, NULL);
            INSERT INTO email.templates
            ("template", categoria, descricao, conteudo, lastupdate, versao, tenant, assunto, codigo, empresa, remetente)
            VALUES('00b6cab2-970a-4b4b-8c61-a1c468f3b5b7'::uuid, NULL, '2015-12-07 Precisamos reaprender a negociar.', '<div contenteditable="true" class="cke_editable cke_editable_inline cke_contents_ltr cke_focus cke_show_borders" tabindex="0" spellcheck="false" role="textbox" aria-label="Rich Text Editor, editor1" title="Rich Text Editor, editor1" aria-describedby="cke_51" style="position: relative;"><div>Olá,</div><div><br></div><div>Semana passada li um estudo do Prof. Scott Wiltermuth, da Marshall School of Business (Universidade da Carolina do Sul) que sugere que, ao contrário do que reza o senso comum,&nbsp;<b>dominar sempre a negociação NÃO conduz aos melhores resultados para nenhuma das partes.</b>..&nbsp;</div><div><br></div><div>Sinistro. Eu sempre achei que duas pessoas com postura conciliadora chegariam a melhores resultados numa negociação do que se uma delas quisesse ganhar tudo sempre, mas parece que não é bem assim...&nbsp;</div><div><br></div><div>Fiz um vídeo de &nbsp;5 min. com as observações. Veja neste link:&nbsp;<b>http://claudionasajon.com.br/negociandomelhor</b></div><div><br></div><div>No vídeo apresento a lógica do estudo de Wiltermuth e analiso algumas situações que você talvez vivencie no seu dia a dia. Conhecer as técnicas de equilíbrio pode ser útil para chegar a melhores resultados.</div><div><br></div><div>Além disso, fiz uma cartilha com os diversos tipos de negociador (segundo o modelo de Jung) e algumas táticas para lidar com eles. Para fazer o download simplesmente clique no botão sob o vídeo ou acesse a página http://claudionasajon.com.br/negociandomelhor-lp</div><div><br></div><div>Se gostar, não esqueça de deixar a sua opinião no site.</div><div><br></div><div>Aliás, se não gostar também.</div><div><br></div><div>O seu feedback é o meu combustível para produzir mais desses materiais, mas preciso de orientação para saber do quê falar.</div><div><br></div><div>Desde já obrigado e até a próxima!</div><div><br></div><div>Link do vídeo:&nbsp;<b>http://claudionasajon.com.br/negociandomelhor</b></div><div><br></div><div><br></div><div style="text-align: center;">Claudio Nasajon</div><div style="text-align: center;">www.claudionasajon.com.br</div><div style="text-align: center;"><br></div><div style="text-align: center;"><span style="color: rgb(255, 102, 0);">PS: Este é um e-mail automático, mas se você respondê-lo eu receberei pessoalmente a sua mensagem.</span></div></div>', NULL, NULL, 10074, '[Claudio Nasajon] Precisamos reaprender a negociar. Parece que nem sempre dominar a conversa conduz ao melhor resultado...', NULL, NULL, NULL);
            INSERT INTO email.templates
            ("template", categoria, descricao, conteudo, lastupdate, versao, tenant, assunto, codigo, empresa, remetente)
            VALUES('7fe2e675-d63f-4b3c-a4aa-ab8c90c93e72'::uuid, NULL, 'Email MKT Persona: Novo Contato', '<div contenteditable="true" class="cke_editable cke_editable_inline cke_contents_ltr cke_show_borders" tabindex="0" spellcheck="false" role="textbox" aria-label="Editor de Rich Text, editor1" title="Editor de Rich Text, editor1" aria-describedby="cke_51" style="position: relative;"><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><span style="font-family: verdana, geneva, sans-serif;">Atenção, equipe! O contato deseja receber mais informações sobre o Persona:</span></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><br></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><span style="font-family: verdana, geneva, sans-serif;">Nome: {{nome}}</span></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><span style="font-family: verdana, geneva, sans-serif;">Email:&nbsp;<span style="font-size: 13.2px; line-height: 19.8px;">{{email}}</span></span></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><span style="font-family: verdana, geneva, sans-serif;">Telefone:&nbsp;<span style="font-size: 13.2px; line-height: 19.8px;">{{telefone}}</span></span></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><span style="font-family: verdana, geneva, sans-serif;">Estado:&nbsp;<span style="font-size: 13.2px; line-height: 19.8px;">{{estado}}</span></span></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><span style="font-family: verdana, geneva, sans-serif;">Município:&nbsp;<span style="font-size: 13.2px; line-height: 19.8px;">{{cidade}}</span></span></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><span style="font-family: verdana, geneva, sans-serif;">Mensagem:&nbsp;<span style="font-size: 13.2px; line-height: 19.8px;">{{mensagem}}</span></span></div></div>', NULL, NULL, 10058, 'Email MKT Persona: Novo Contato', NULL, NULL, NULL);
            INSERT INTO email.templates
            ("template", categoria, descricao, conteudo, lastupdate, versao, tenant, assunto, codigo, empresa, remetente)
            VALUES('8c420b83-f001-4dd2-9103-b99419934660'::uuid, NULL, 'Video sobre negociação', '<div contenteditable="true" class="cke_editable cke_editable_inline cke_contents_ltr cke_focus cke_show_borders" tabindex="0" spellcheck="false" role="textbox" aria-label="Rich Text Editor, editor1" title="Rich Text Editor, editor1" aria-describedby="cke_51" style="position: relative;"><div>Olá,</div><div><br></div><div>Semana passada li um estudo do Prof. Scott Wiltermuth, da Marshall School of Business (Universidade da Carolina do Sul) que sugere que, ao contrário do que reza o senso comum,&nbsp;<b>dominar sempre a negociação NÃO conduz aos melhores resultados para nenhuma das partes.</b>..&nbsp;</div><div><br></div><div>Sinistro. Eu sempre achei que duas pessoas com postura conciliadora chegariam a melhores resultados numa negociação do que se uma delas quisesse ganhar tudo sempre, mas parece que não é bem assim...&nbsp;</div><div><br></div><div>Fiz um vídeo de &nbsp;5 min. com as observações. Veja neste link:&nbsp;<b>http://claudionasajon.com.br/negociandomelhor</b></div><div><br></div><div>No vídeo apresento a lógica do estudo de Wiltermuth e analiso algumas situações que você talvez vivencie no seu dia a dia. Conhecer as técnicas de equilíbrio pode ser útil para chegar a melhores resultados.</div><div><br></div><div>Além disso, fiz uma cartilha com os diversos tipos de negociador (segundo o modelo de Jung) e algumas táticas para lidar com eles. Para fazer o download simplesmente clique no botão sob o vídeo ou acesse a página http://claudionasajon.com.br/negociandomelhor-lp</div><div><br></div><div>Se gostar, não esqueça de deixar a sua opinião no site.</div><div><br></div><div>Aliás, se não gostar também.</div><div><br></div><div>O seu feedback é o meu combustível para produzir mais desses materiais, mas preciso de orientação para saber do que&nbsp;falar.</div><div><br></div><div>Desde já obrigado e até a próxima!</div><div><br></div><div>Link do vídeo:&nbsp;<b>http://claudionasajon.com.br/negociandomelhor</b></div><div><br></div><div><br></div><div style="text-align: center;">Claudio Nasajon</div><div style="text-align: center;">www.claudionasajon.com.br</div><div style="text-align: center;"><br></div><div style="text-align: center;"><span style="color: rgb(255, 102, 0);">PS: Este é um e-mail automático, mas se você respondê-lo eu receberei pessoalmente a sua mensagem.</span></div></div>', NULL, NULL, 10058, '[Nasajon] Video sobre negociação', NULL, NULL, NULL);
            INSERT INTO email.templates
            ("template", categoria, descricao, conteudo, lastupdate, versao, tenant, assunto, codigo, empresa, remetente)
            VALUES('11723f01-4b5c-4b0d-9281-fecd89ab15e1'::uuid, NULL, '2015-12-11 Cartilha Apresentações convincentes', '<div contenteditable="true" class="cke_editable cke_editable_inline cke_contents_ltr cke_show_borders cke_focus" tabindex="0" spellcheck="false" role="textbox" aria-label="Rich Text Editor, editor1" title="Rich Text Editor, editor1" aria-describedby="cke_51" style="position: relative;"><p><span style="font-size: 12px;"><span style="font-family: arial, helvetica, sans-serif;">Olá</span></span></p><p><span style="font-size: 12px;"><span style="font-family: arial, helvetica, sans-serif;">Obrigado por seu interesse na cartilha "Apresentações convincentes".&nbsp;</span></span></p><p><span style="font-size: 12px;"><span style="font-family: arial, helvetica, sans-serif;">Nela apresento algumas práticas que uso com sucesso nas minhas palestras e talvez possam ser úteis em suas próprias apresentações.</span></span></p><p><span style="font-size: 12px;"><span style="font-family: arial, helvetica, sans-serif;"><strong>Clique neste link para fazer o download:</strong>&nbsp;</span></span><a data-cke-saved-href="http://bit.ly/1IK8btI" href="http://bit.ly/1IK8btI" class="copyable-link v-middle" style="box-sizing: border-box; padding: 2px 0px; margin: 0px; text-decoration: none; color: rgb(238, 97, 35); vertical-align: middle; white-space: nowrap; display: inline-block; max-width: calc(100% - 65px); overflow: hidden; font-family: ''Source Sans Pro'', sans-serif; font-size: 14px; line-height: 14px; background-color: rgb(255, 255, 255);">bit.ly/<span class="copy-hash semibold" style="box-sizing: border-box; padding: 0px; margin: 0px; font-weight: 600;">1IK8btI</span></a><span style="font-size: 12px;"><span style="font-family: arial, helvetica, sans-serif;"></span></span></p><p><span style="font-size: 12px;"><span style="font-family: arial, helvetica, sans-serif;">Espero que goste e&nbsp;apreciarei as suas críticas, elogios ou sugestões - por favor, deixe a sua opinião no site.</span></span></p><p><span style="font-size: 12px;"><span style="font-family: arial, helvetica, sans-serif;">Até a próxima!</span></span></p><p style="text-align: center;"><span style="font-size: 12px;"><span style="font-family: arial, helvetica, sans-serif;">Claudio Nasajon</span></span></p><p style="text-align: center;"><span style="font-size: 12px;"><span style="font-family: arial, helvetica, sans-serif;">www.claudionasajon.com.br</span></span></p></div>', NULL, NULL, 10074, 'Aqui está a Cartilha de Apresentações convincentes.', NULL, NULL, NULL);
            INSERT INTO email.templates
            ("template", categoria, descricao, conteudo, lastupdate, versao, tenant, assunto, codigo, empresa, remetente)
            VALUES('bc41a8cd-0016-48d1-990b-e0ebcb445083'::uuid, NULL, 'Dados não cliente: Curso de Férias Nasajon Educacional', '<div aria-describedby="cke_51" title="Editor de Rich Text, editor1" aria-label="Editor de Rich Text, editor1" role="textbox" style="position: relative;" spellcheck="false" tabindex="0" class="cke_editable cke_editable_inline cke_contents_ltr cke_show_borders cke_focus" contenteditable="true"><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><span style="font-family: verdana, geneva, sans-serif;">Atenção, equipe! O contato deseja se inscrever no Curso de Férias Nasajon Educacional:</span><br></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><br></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><span style="font-family: verdana, geneva, sans-serif;">Nome: {{nome}}</span></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><span style="font-family: verdana, geneva, sans-serif;">CNPJ ou CPF:&nbsp;<span style="font-size: 13.2px; line-height: 19.8px;">{{cnpj}}</span></span></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><span style="font-family: verdana, geneva, sans-serif;">Email: {{email}}</span></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><span style="font-family: verdana, geneva, sans-serif;">Telefone:&nbsp;<span style="font-size: 13.2px; line-height: 19.8px;">{{telefone}}</span></span></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><font face="verdana, geneva, sans-serif">Endereço: {{endereço}}</font></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><font face="verdana, geneva, sans-serif">Número: {{numero}}</font></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><font face="verdana, geneva, sans-serif">Complemento: {{complemento}}</font></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><font face="verdana, geneva, sans-serif">Bairro: {{bairro}}</font></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><font face="verdana, geneva, sans-serif">Cidade: {{cidade}}</font></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><font face="verdana, geneva, sans-serif">UF: {{uf}}</font></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><span style="font-family: verdana, geneva, sans-serif; font-size: 13.2px; line-height: 19.8px;">CEP: {{CEP}}</span></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><span style="font-family: verdana, geneva, sans-serif; font-size: 13.2px; line-height: 19.8px;">Mensagem: {{mensagem}}</span>​<br></div></div>', NULL, NULL, 10058, 'Dados não cliente: Curso de Férias Nasajon Educacional', NULL, NULL, NULL);
            INSERT INTO email.templates
            ("template", categoria, descricao, conteudo, lastupdate, versao, tenant, assunto, codigo, empresa, remetente)
            VALUES('d9d1825e-bb7d-4eb6-b99f-6b45b2e4f43d'::uuid, NULL, 'Mensagem usuário eBook - O fim do boleto sem registro chegou... E agora?', '<p style="line-height: 20.8px;">Ol&aacute;!</p>

            <p style="line-height: 20.8px;">Agradecemos o interesse no eBook &quot;<strong>O fim do boleto sem registro chegou... E agora?</strong>&quot;.&nbsp;</p>

            <p style="line-height: 20.8px;"><a href="https://marketingnasajon.s3.amazonaws.com/[EBOOK]Fim-do-boleto-sem-registro-chegou.pdf" target="_blank">Clique&nbsp;aqui</a>&nbsp;para abrir o conte&uacute;do e acesse-o a qualquer momento.</p>

            <p style="line-height: 20.8px;">Aproveite!&nbsp;</p>

            <p style="line-height: 20.8px;">At&eacute; breve,</p>

            <p style="line-height: 20.8px;">Nasajon Sistemas</p>', NULL, NULL, 10058, '[eBookGratuito] O fim do boleto sem registro chegou... E agora?', NULL, NULL, NULL);
            INSERT INTO email.templates
            ("template", categoria, descricao, conteudo, lastupdate, versao, tenant, assunto, codigo, empresa, remetente)
            VALUES('e7cf9644-f713-4e00-91b5-752468fdff5b'::uuid, NULL, 'Solicitação de Admissão efetuada', '<!DOCTYPE html>
            <html lang="en">
            <head>
                <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1">
                <meta name="msapplication-config" content="none" />
                <title>Nasajon Sistemas</title>
            </head>

            <body style="background-color: #FAFAFA;">
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                        <td align="center">
                            <table style="min-width: 650px;min-height: 650px;">
                                <tr>
                                    <td>
                                        <table width="100%" border="0" cellspacing="0" cellpadding="0" align="center" style="font-family: Arial, Helvetica, sans-serif;
                                                    font-size: 14px;
                                                    background-color: white;
                                                    border-width: 1px;
                                                    border-style: solid;
                                                    border-color: #DDDDDD;
                                                    border-radius: 4px;
                                                    margin-top: 10px;
                                                    padding: 20px;">
                                            {% if logourl  %}
                                            <tr height="40">
                                                <td width="50%" align="center">
                                                    <img src="{{logourl}}" width="auto" height="40" border="0"
                                                        style="margin: 10px auto; outline:none; border:none;">
                                                </td>
                                            </tr>
                                            {% endif %}
                                            <tr height="40">
                                                <td width="50%" align="center">
                                                    <h1 style="font-family: Arial, Helvetica, sans-serif;
                                                        font-size: 21px;
                                                        color:#5A5A5A;
                                                        font-weight: bold;
                                                        margin-top: 10px;
                                                        margin:10px;
                                                        mso-line-height-rule:exactly;
                                                        padding-bottom: 20px;">
                                                            {% if nomeemailabreviado  %}
                                                                Olá, {{nomeemailabreviado}}!
                                                            {% else   %}
                                                                Olá!
                                                            {% endif %}
                                                    </h1>
                                                </td>
                                            </tr>
                                            <tr height="40">
                                                <td width="50%" align="center">
                                                    <h1 style="font-family: Arial, Helvetica, sans-serif;
                                                            font-size: 15px;
                                                            color:#5A5A5A;
                                                            font-weight: bold;
                                                            margin-top: 0;
                                                            margin:0;
                                                            mso-line-height-rule:exactly;
                                                            padding-bottom: 20px;">
                                                            Solicitação de admissão completa efetuada.                                              </h1>
                                                </td>
                                            </tr>
                                            <tr>
                                            <td>
                                            {% if justificativamensagem  %}
                                            <hr style="border-width: 1px;border-color: #DDDDDD;border-style: solid;margin-top: 0;margin-bottom: 16px;">
                                            <tr height="40" style="border-width: 1px;border-color: #5A5A5A;border-style: solid;margin-top: 0;margin-bottom: 16px;">
                                                <td width="50%" align="center">
                                                    <h1 style="font-family: Arial, Helvetica, sans-serif;
                                                            font-size: 21px;
                                                            color:#5A5A5A;
                                                            font-weight: bold;
                                                            margin-top: 0;
                                                            margin:0;
                                                            mso-line-height-rule:exactly;
                                                            padding-bottom: 20px;">
                                                        Justificativa:
                                                    </h1>
                                                </td>
                                            </tr>
                                            <tr height="40">
                                                <td width="50%" align="center">
                                                    <p
                                                        style="font-family: Arial, Helvetica, sans-serif;  color:#5A5A5A; font-size: 14px;">
                                                        <img src="https://s3.sa-east-1.amazonaws.com/imagens.nasajon/geral/email-de-notificacoes/quote-left.png"
                                                            width="auto" height="30" border="0" style=" outline:none; border:none;">
                                                        {{justificativamensagem}}
                                                        <img src="https://s3.sa-east-1.amazonaws.com/imagens.nasajon/geral/email-de-notificacoes/quote-right.png"
                                                            width="auto" height="30" border="0" style=" outline:none; border:none;">
                                                </td>
                                            </tr>
                                            {% endif %}
                                            <tr>
                                            {% if urlsolicitacao %}
                                            <td width="50%" align="center">
                                                <hr
                                                    style="border-width: 1px; border-color: #DDDDDD; border-style: solid; margin-top: 0; margin-bottom: 16px;">
                                                <a href="{{urlsolicitacao}}" style="text-decoration: none; color: white;">
                                                    <p style="font-family: Arial, Helvetica, sans-serif;
                                                                    color: #FFFFFF;
                                                                    font-size: 14px;
                                                                    font-weight: bold;
                                                                    text-align: center;
                                                                    border-radius: 4px;
                                                                    padding: 10px;
                                                                    margin: 0;
                                                                    background-color: #2cae1b;
                                                                    width: 130px;">
                                                        <i class="fas fa-external-link-alt" style="margin-right: 4px;"></i>
                                                        Ver no sistema
                                                    </p>
                                                </a>
                                            </td>
                                            {% endif %}
                                        </tr>
                                        <tr>
                                            <td>
                                                <table width="100%" border="0" cellspacing="0" cellpadding="0" align="center" style="font-family: Arial, Helvetica, sans-serif;
                                                font-size: 14px;
                                                background-color: white;
                                                border-width: 1px;
                                                border-style: solid;
                                                border-color: #5A5A5A;
                                                border-radius: 4px;
                                                margin-top: 10px;
                                                padding: 20px;">

                                            <tr height="40">
                                                <td width="100%" align="left">
                                                    <span style="font-family: Arial, Helvetica, sans-serif;
                                                    font-size: 15px;
                                                    color:#5A5A5A;
                                                    font-weight: bold;
                                                    margin-top: 0;
                                                    margin:0;
                                                    mso-line-height-rule:exactly;">
                                                    Colaborador:
                                                    </span>
                                                    <span style="font-family: Arial, Helvetica, sans-serif;
                                                    font-size: 15px;
                                                    margin-top: 0;
                                                    margin:0;
                                                    mso-line-height-rule:exactly;">
                                                    {{nomecolaborador}}
                                                    </span>
                                                </td>
                                            </tr>
                                            <tr height="40">
                                            <td width="100%" align="left">
                                                <span style="font-family: Arial, Helvetica, sans-serif;
                                                font-size: 15px;
                                                color:#5A5A5A;
                                                font-weight: bold;
                                                margin-top: 0;
                                                margin:0;
                                                mso-line-height-rule:exactly;">
                                                Cargo:
                                                </span>
                                                <span style="font-family: Arial, Helvetica, sans-serif;
                                                font-size: 15px;
                                                margin-top: 0;
                                                margin:0;
                                                mso-line-height-rule:exactly;">
                                                {{colaboradorcargoniveltexto}}
                                                </span>
                                            </td>
                                        </tr>
                                            <tr height="40">
                                                <td width="100%" align="left">
                                                    <span style="font-family: Arial, Helvetica, sans-serif;
                                                    font-size: 15px;
                                                    color:#5A5A5A;
                                                    font-weight: bold;
                                                    margin-top: 0;
                                                    margin:0;
                                                    mso-line-height-rule:exactly;">
                                                    Empresa:
                                                    </span>
                                                    <span style="font-family: Arial, Helvetica, sans-serif;
                                                    font-size: 15px;
                                                    margin-top: 0;
                                                    margin:0;
                                                    mso-line-height-rule:exactly;">
                                                    {{colaboradorempresatexto}}
                                                    </span>
                                                </td>
                                            </tr>
                                            <tr height="40">
                                                <td width="100%" align="left">
                                                    <span style="font-family: Arial, Helvetica, sans-serif;
                                                    font-size: 15px;
                                                    color:#5A5A5A;
                                                    font-weight: bold;
                                                    margin-top: 0;
                                                    margin:0;
                                                    mso-line-height-rule:exactly;">
                                                    Estabelecimento:
                                                    </span>
                                                    <span style="font-family: Arial, Helvetica, sans-serif;
                                                    font-size: 15px;
                                                    margin-top: 0;
                                                    margin:0;
                                                    mso-line-height-rule:exactly;">
                                                    {{colaboradorestabelecimentotexto}}
                                                    </span>

                                                </td>
                                            </tr>
                                                </table>
                                                </td>
                                            </tr>
                            </table>
                    <tr>
                        <td align="center">
                            <font face="Arial, Helvetica, sans-serif" color="#767676" style="font-size: 12px;">
                                Esta é uma mensagem automática. Por favor, não responda a este e-mail. <br>
                                Desensolvido pela Nasajon
                            </font>
                        </td>
                    </tr>
                    <tr height="10">
                        <td></td>
                    </tr>
                    <tr>
                        <td align="center">
                            <img src="https://s3.sa-east-1.amazonaws.com/imagens.nasajon/logos/nasajon/versao-acinzentada/nova-marca/logo-nasajon_acinzentada-horizontal.png"
                                alt="Logo da Nasajon Sistemas" width="128" height="30" border="0"
                                style="margin: 0 auto; outline:none; border:none;">
                        </td>
                    </tr>
                </table>
                </td>
                </tr>
                </table>
                </td>
                </tr>
                </table>
            </body>
            </html>', '2021-09-01 13:47:27.419', 1, NULL, 'Solicitação de Admissão efetuada', 'meurh_admissao_efetuar', NULL, NULL);
            INSERT INTO email.templates
            ("template", categoria, descricao, conteudo, lastupdate, versao, tenant, assunto, codigo, empresa, remetente)
            VALUES('57537fdf-448d-4042-8577-cd6dbbe4474f'::uuid, NULL, 'Mensagem usuário: Newsletter DP 5 Estrelas', '<p><span style="font-family:verdana,geneva,sans-serif;"><span style="color: rgb(38, 50, 56);">Ol&aacute;!</span></span></p>

            <p><span style="font-family:verdana,geneva,sans-serif;"><span style="color: rgb(38, 50, 56);">Estamos enviando este e-mail para confirmar o seu cadastro na newsletter do DP 5 estrelas.<br />
            <br />
            A partir de agora, voc&ecirc; receber&aacute; todos os conte&uacute;dos exclusivos em seu e-mail!&nbsp;</span></span></p>

            <p><span style="font-family:verdana,geneva,sans-serif;"><span style="color: rgb(38, 50, 56);">Aproveite para j&aacute; conferir os posts do blog DP 5 Estrelas! &Eacute; s&oacute; <a href="http://dp5estrelas.educacional.nasajon.com.br/" target="_blank">clicar aqui</a>.</span></span></p>

            <p>&nbsp;</p>

            <p><span style="color: rgb(38, 50, 56); font-family: arial, sans-serif;"><span style="font-family:verdana,geneva,sans-serif;">At&eacute; mais!<br />
            Equipe Nasajon</span></span></p>', NULL, NULL, 10058, '[DP 5 estrelas] Seu cadastro foi realizado com sucesso!', NULL, NULL, NULL);
            INSERT INTO email.templates
            ("template", categoria, descricao, conteudo, lastupdate, versao, tenant, assunto, codigo, empresa, remetente)
            VALUES('dd7494e0-b9d5-4b9c-8e7d-e4d5f63a048c'::uuid, NULL, '2015-11-14 [VideoDica de Claudio Nasajon] Apresentações convincentes dão "selo de autoridade"', '<div contenteditable="true" class="cke_editable cke_editable_inline cke_contents_ltr cke_focus cke_show_borders" tabindex="0" spellcheck="false" role="textbox" aria-label="Rich Text Editor, editor1" title="Rich Text Editor, editor1" aria-describedby="cke_51" style="position: relative;"><p>Olá,</p><p>Quem faz apresentações convincentes em público, recebe automaticamente um “carimbo de autoridade" altamente&nbsp;positivo para a sua carreira.&nbsp;</p><p>Estranhamente, um estudo publicado por Thomas Mann, da Universidade da Carolina do Sul, sugere que a FORMA, mais do que o CONTEÚDO, é o fator de maior impacto na formação da opinião.&nbsp;</p><p>Eu gravei um vídeo com algumas dicas apresentadas nesse estudo (e adicionei outras da minha própria experiência como palestrante) que talvez sejam úteis na sua próxima apresentação. Espero que goste. Eis o link:&nbsp;</p><p><a data-cke-saved-href="http://claudionasajon.com.br/apresentacoesconvincentes" target="_blank" href="http://claudionasajon.com.br/apresentacoesconvincentes"><strong>http://claudionasajon.com.br/apresentacoesconvincentes&nbsp;</strong></a></p><p>Também fiz a cartilha "<strong>Apresentações Convincentes</strong>" com algumas dicas que uso nas minhas próprias apresentações. Para fazer o download basta clicar no botão sob o vídeo&nbsp;<a data-cke-saved-href="http://claudionasajon.com.br/apresentacoesconvincentes" target="_blank" href="http://claudionasajon.com.br/apresentacoesconvincentes">neste link</a>.&nbsp;</p><p>Ah, sim, por favor: deixe o seu comentário! Essa é a forma de me incentivar a (ou demover de) fazer mais vídeos como esse :)&nbsp;</p><p>Até a próxima!&nbsp;</p><p><br></p><p style="text-align: center;">Claudio Nasajon<br><a data-cke-saved-href="http://claudionasajon.com.br" target="_blank" href="http://claudionasajon.com.br/">claudionasajon.com.br</a>&nbsp;</p><p style="text-align: center;"><span style="color: rgb(255, 0, 0);">PS: Este é um e-mail automático, mas se você o responder, eu&nbsp;receberei pessoalmente a sua mensagem.</span></p></div>', NULL, NULL, 10058, '[VideoDica de Claudio Nasajon] Apresentações convincentes dão "selo de autoridade"', NULL, NULL, NULL);
            INSERT INTO email.templates
            ("template", categoria, descricao, conteudo, lastupdate, versao, tenant, assunto, codigo, empresa, remetente)
            VALUES('61fbe14e-bac0-4f83-a2cf-2d7154c1e24e'::uuid, NULL, '2015-12-14 [Video] Apresentações convincentes dão "selo de autoridade"', '<div contenteditable="true" class="cke_editable cke_editable_inline cke_contents_ltr cke_focus cke_show_borders" tabindex="0" spellcheck="false" role="textbox" aria-label="Rich Text Editor, editor1" title="Rich Text Editor, editor1" aria-describedby="cke_51" style="position: relative;"><p>Olá,</p><p>Quem faz apresentações convincentes em público, recebe automaticamente um “carimbo de autoridade" altamente&nbsp;positivo para a sua carreira.&nbsp;</p><p>Estranhamente, um estudo publicado por Thomas Mann, da Universidade da Carolina do Sul, sugere que a FORMA, mais do que o CONTEÚDO, é o fator de maior impacto na formação da opinião.&nbsp;</p><p>Eu gravei um vídeo com algumas dicas apresentadas nesse estudo (e adicionei outras da minha própria experiência como palestrante) que talvez sejam úteis na sua próxima apresentação. Espero que goste. Eis o link:&nbsp;</p><p><a data-cke-saved-href="http://claudionasajon.com.br/apresentacoesconvincentes" target="_blank" href="http://claudionasajon.com.br/apresentacoesconvincentes"><strong>http://claudionasajon.com.br/apresentacoesconvincentes&nbsp;</strong></a></p><p>Também fiz a cartilha "<strong>Apresentações Convincentes</strong>" com algumas dicas que uso nas minhas próprias apresentações. Para fazer o download basta clicar no botão sob o vídeo&nbsp;<a data-cke-saved-href="http://claudionasajon.com.br/apresentacoesconvincentes" target="_blank" href="http://claudionasajon.com.br/apresentacoesconvincentes">neste link</a>.&nbsp;</p><p>Ah, sim, por favor: deixe o seu comentário! Essa é a forma de me incentivar a (ou demover de) fazer mais vídeos como esse :)&nbsp;</p><p>Até a próxima!&nbsp;</p><p><br></p><p style="text-align: center;">Claudio Nasajon<br><a data-cke-saved-href="http://claudionasajon.com.br" target="_blank" href="http://claudionasajon.com.br/">claudionasajon.com.br</a>&nbsp;</p><p style="text-align: center;"><span style="color: rgb(255, 0, 0);">PS: Este é um e-mail automático, mas se você o responder, eu&nbsp;receberei pessoalmente a sua mensagem.</span></p></div>', NULL, NULL, 10074, '[Video] Apresentações convincentes dão "selo de autoridade"', NULL, NULL, NULL);
            INSERT INTO email.templates
            ("template", categoria, descricao, conteudo, lastupdate, versao, tenant, assunto, codigo, empresa, remetente)
            VALUES('80ea0c1b-24bf-4533-85f5-54967891dd0c'::uuid, NULL, 'Aviso de inscrição no Blog', '<div contenteditable="true" class="cke_editable cke_editable_inline cke_contents_ltr cke_focus cke_show_borders" tabindex="0" spellcheck="false" role="textbox" aria-label="Rich Text Editor, editor1" title="Rich Text Editor, editor1" aria-describedby="cke_51" style="position: relative;"><p>{{nome}} &lt;{{email}}&gt;</p></div>', NULL, NULL, 10074, 'Inscrição no Blog', NULL, NULL, NULL);
            INSERT INTO email.templates
            ("template", categoria, descricao, conteudo, lastupdate, versao, tenant, assunto, codigo, empresa, remetente)
            VALUES('d166791f-0782-4159-9cde-e2b24fcbe8d7'::uuid, NULL, 'RS Contato interessado: Conteúdo gratuito - O que é um ERP?', '<p>Aten&ccedil;&atilde;o, equipe! O contato abaixo preencheu o formul&aacute;rio&nbsp;<strong>Conte&uacute;do gratuito - &quot;O que &eacute; um ERP?&quot; via Redes Sociais</strong></p>

            <p>Email: {{email}}</p>', NULL, NULL, 10058, 'RS Contato interessado: Conteúdo gratuito - O que é um ERP?', NULL, NULL, NULL);
            INSERT INTO email.templates
            ("template", categoria, descricao, conteudo, lastupdate, versao, tenant, assunto, codigo, empresa, remetente)
            VALUES('ed41fa13-d526-426d-867c-7a5a15fcea15'::uuid, NULL, 'Dados não cliente: Workshop de Férias ONLINE Nasajon Educacional', '<div aria-describedby="cke_51" title="Editor de Rich Text, editor1" aria-label="Editor de Rich Text, editor1" role="textbox" style="position: relative;" spellcheck="false" tabindex="0" class="cke_editable cke_editable_inline cke_contents_ltr cke_focus cke_show_borders" contenteditable="true"><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><span style="font-family: verdana, geneva, sans-serif;">Atenção, equipe! O contato deseja se inscrever no Workshop de Férias ONLINE Nasajon Educacional:</span><br></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><br></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><span style="font-family: verdana, geneva, sans-serif;">Nome: {{nome}}</span></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><span style="font-family: verdana, geneva, sans-serif;">CNPJ ou CPF:&nbsp;<span style="font-size: 13.2px; line-height: 19.8px;">{{cnpj}}</span></span></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><span style="font-family: verdana, geneva, sans-serif;">Email: {{email}}</span></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><span style="font-family: verdana, geneva, sans-serif;">Telefone:&nbsp;<span style="font-size: 13.2px; line-height: 19.8px;">{{telefone}}</span></span></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><font face="verdana, geneva, sans-serif">Endereço: {{endereço}}</font></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><font face="verdana, geneva, sans-serif">Número: {{numero}}</font></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><font face="verdana, geneva, sans-serif">Complemento: {{complemento}}</font></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><font face="verdana, geneva, sans-serif">Bairro: {{bairro}}</font></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><font face="verdana, geneva, sans-serif">Cidade: {{cidade}}</font></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><font face="verdana, geneva, sans-serif">UF: {{uf}}</font></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><span style="font-family: verdana, geneva, sans-serif; font-size: 13.2px; line-height: 19.8px;">CEP: {{CEP}}</span></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><span style="font-family: verdana, geneva, sans-serif; font-size: 13.2px; line-height: 19.8px;">Mensagem: {{mensagem}}</span>​</div></div>', NULL, NULL, 10058, 'Dados não cliente: Workshop de Férias ONLINE Nasajon Educacional', NULL, NULL, NULL);
            INSERT INTO email.templates
            ("template", categoria, descricao, conteudo, lastupdate, versao, tenant, assunto, codigo, empresa, remetente)
            VALUES('ec9a5f70-b74d-46bf-9294-96dd6eaced2d'::uuid, NULL, 'Contato Interessado: Workshop Online de Férias Nasajon Educacional', '<div aria-describedby="cke_51" title="Editor de Rich Text, editor1" aria-label="Editor de Rich Text, editor1" role="textbox" style="position: relative;" spellcheck="false" tabindex="0" class="cke_editable cke_editable_inline cke_contents_ltr cke_show_borders cke_focus" contenteditable="true"><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);">Atenção, equipe! O contato deseja se inscrever no <span style="font-family: verdana, geneva, sans-serif;">Workshop</span>&nbsp;Online de Férias Nasajon Educacional:</div></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><br></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);">Nome: {{nome}}</div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);">Email:&nbsp;<span style="font-size: 13.2px; line-height: 19.8px;">{{email}}</span></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);">Telefone:&nbsp;<span style="font-size: 13.2px; line-height: 19.8px;">{{telefone}}</span></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);">CNPJ ou CPF: <span style="font-size: 13.2px; line-height: 19.8px;">{{CNPJ}}</span></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><span style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);">Curso:&nbsp;</span><span style="color: rgb(33, 33, 33); font-size: 13.2px; line-height: 19.8px;">{{simplesNacional}}</span></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><span style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);">Curso: {{lucroPresumido}}</span></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><span style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);">Curso:&nbsp;</span><span style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);">{{lucroReal}}</span></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);">Cliente: <span style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);">{{Pagamento}}</span></div></div>', NULL, NULL, 10058, 'Contato Interessado: Workshop Online de Férias Nasajon Educacional', NULL, NULL, NULL);
            INSERT INTO email.templates
            ("template", categoria, descricao, conteudo, lastupdate, versao, tenant, assunto, codigo, empresa, remetente)
            VALUES('d198f120-c363-4c4c-9158-fe7b7ba09189'::uuid, NULL, 'Modelo de teste', '<p><a href="http://www.google.com"><img alt="" src="https://melhorcomsaude.com/wp-content/uploads/2013/09/beneficios-do-abacaxi-1-500x333.jpg" style="width: 500px; height: 333px;" /></a></p>', NULL, NULL, 10103, 'Modelo de teste', NULL, NULL, NULL);
            INSERT INTO email.templates
            ("template", categoria, descricao, conteudo, lastupdate, versao, tenant, assunto, codigo, empresa, remetente)
            VALUES('937d48fe-22a0-448e-a5d2-5dccbb748ee1'::uuid, NULL, 'SM Contato interessado: Conteúdo gratuito - O que é um ERP?', '<p>Aten&ccedil;&atilde;o, equipe! O contato abaixo preencheu o formul&aacute;rio&nbsp;<strong>Conte&uacute;do gratuito - &quot;O que &eacute; um ERP?&quot; via SurveyMonkey</strong></p>

            <p>Email: {{email}}</p>', NULL, NULL, 10058, 'SM Contato interessado: Conteúdo gratuito - O que é um ERP?', NULL, NULL, NULL);
            INSERT INTO email.templates
            ("template", categoria, descricao, conteudo, lastupdate, versao, tenant, assunto, codigo, empresa, remetente)
            VALUES('d224cc78-5be8-407a-9809-d2cbdab61068'::uuid, NULL, 'Você sabe o que o seu time anda fazendo?', '<div contenteditable="true" class="cke_editable cke_editable_inline cke_contents_ltr cke_show_borders cke_focus" tabindex="0" spellcheck="false" role="textbox" aria-label="Rich Text Editor, editor1" title="Rich Text Editor, editor1" aria-describedby="cke_51" style="position: relative;"><p>Digite a mensag</p><p dir="ltr" style="line-height:1.38;margin-top:0pt;margin-bottom:0pt;"><span id="docs-internal-guid-6850b467-0fb2-c3e4-ab89-5f90a29f1105"><span style="font-size: 24px; font-family: Arial; vertical-align: baseline; white-space: pre-wrap;">Já aconteceu de você passear pelo escritório, ver um monte de gente trabalhando, mas não ter a menor ideia do que eles estão fazendo? Bem eu tenho uma dica que talvez ajude a resolver essa questão.</span></span><br></p><p dir="ltr" style="line-height:1.38;margin-top:0pt;margin-bottom:0pt;"><br></p><p dir="ltr" style="line-height:1.38;margin-top:0pt;margin-bottom:0pt;"><span id="docs-internal-guid-6850b467-0fb2-c3e4-ab89-5f90a29f1105"><span style="font-size: 24px; font-family: Arial; vertical-align: baseline; white-space: pre-wrap;">Gravei um vídeo que você pode ver neste link: <a data-cke-saved-href="http://claudionasajon.com.br/quadrosdeacompanhamento" target="_blank" href="http://claudionasajon.com.br/quadrosdeacompanhamento">claudionasajon.com.br/quadrosdeacompanhamento</a></span></span><br></p><p dir="ltr" style="line-height:1.38;margin-top:0pt;margin-bottom:0pt;"><br></p><p dir="ltr" style="line-height:1.38;margin-top:0pt;margin-bottom:0pt;"><span id="docs-internal-guid-6850b467-0fb2-c3e4-ab89-5f90a29f1105"><span style="font-size: 24px; font-family: Arial; vertical-align: baseline; white-space: pre-wrap;">Em resumo, um líder precisa saber se o trabalho está sendo feito corretamente e, mais do que isso, os próprios empregados precisam compartilhar informações para funcionar da melhor forma possível. </span></span></p><p><span id="docs-internal-guid-6850b467-0fb2-c3e4-ab89-5f90a29f1105"><span style="font-size: 24px; font-family: Arial; vertical-align: baseline; white-space: pre-wrap;">Embora hoje existam aplicativos na Internet que permitam fazer um rastreamento visual do trabalho, como Trello.com, Asana.com e PipeDrive.com, por exemplo, eles ainda são meio </span></span><span id="docs-internal-guid-6850b467-0fb2-c3e4-ab89-5f90a29f1105"><span style="font-size: 24px; font-family: Arial; vertical-align: baseline; white-space: pre-wrap;">“escondidos”. </span></span><br></p><p><span><span style="font-size: 24px; font-family: Arial; vertical-align: baseline; white-space: pre-wrap;">O método que eu prefiro é um </span><span style="font-size: 24px; font-family: Arial; font-weight: 700; vertical-align: baseline; white-space: pre-wrap;">quadro</span><span style="font-size: 24px; font-family: Arial; vertical-align: baseline; white-space: pre-wrap;">, desses que você pendura na parede, onde cada pessoa da equipe atualiza as suas próprias informações ao final do dia usando post-it ou escrevendo com pilot.</span></span><br></p><p dir="ltr" style="line-height:1.38;margin-top:0pt;margin-bottom:0pt;"><span id="docs-internal-guid-6850b467-0fb2-c3e4-ab89-5f90a29f1105"><span style="font-size: 24px; font-family: Arial; vertical-align: baseline; white-space: pre-wrap;">Dessa forma todos podem ver facilmente a situação real do projeto, permitindo que uns ajudem os outros para concluir mais rapidamente os trabalhos.</span></span></p><p><span id="docs-internal-guid-6850b467-0fb2-c3e4-ab89-5f90a29f1105"><span style="font-size: 24px; font-family: Arial; vertical-align: baseline; white-space: pre-wrap;">Eu preparei alguns modelos de quadros de acompanhamento que uso com a minha equipe e você pode adaptar para usar com a sua. Para baixá-los, basta acessar o meu site: <a data-cke-saved-href="http://claudionasajon.com.br" target="_blank" href="http://claudionasajon.com.br">claudionasajon.com.br</a> &nbsp;</span></span></p><p><br><span id="docs-internal-guid-6850b467-0fb2-c3e4-ab89-5f90a29f1105"><span style="font-size: 24px; font-family: Arial; vertical-align: baseline; white-space: pre-wrap;">Até a próxima!</span></span><br></p><p style="text-align: center;"><span><span style="font-size: 24px; font-family: Arial; vertical-align: baseline; white-space: pre-wrap;">Claudio Nasajon<br>claudionasajon.com.br</span></span><br></p><p><br></p></div>', NULL, NULL, 10074, 'Você sabe o que o seu time anda fazendo?', NULL, NULL, NULL);
            INSERT INTO email.templates
            ("template", categoria, descricao, conteudo, lastupdate, versao, tenant, assunto, codigo, empresa, remetente)
            VALUES('0b9b0203-4e21-4f45-a92e-f53115f7ca73'::uuid, NULL, 'Contato Interessado: Workshop de Férias ONLINE Nasajon Educacional', '<div aria-describedby="cke_51" title="Editor de Rich Text, editor1" aria-label="Editor de Rich Text, editor1" role="textbox" style="position: relative;" spellcheck="false" tabindex="0" class="cke_editable cke_editable_inline cke_contents_ltr cke_focus cke_show_borders" contenteditable="true"><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);">Atenção, equipe! O contato deseja se inscrever no Curso de Férias ONLINE Nasajon Educacional.</div></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><br></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);">Nome: {{nome}}</div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);">Email:&nbsp;<span style="font-size: 13.2px; line-height: 19.8px;">{{email}}</span></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);">Telefone:&nbsp;<span style="font-size: 13.2px; line-height: 19.8px;">{{telefone}}</span></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);">CNPJ ou CPF: <span style="font-size: 13.2px; line-height: 19.8px;">{{CNPJ}}</span></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><span style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);">Curso:&nbsp;</span><span style="color: rgb(33, 33, 33); font-size: 13.2px; line-height: 19.8px;">{{simplesNacional}}</span></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><span style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);">Curso: {{lucroPresumido}}</span></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><span style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);">Curso:&nbsp;</span><span style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);">{{lucroReal}}</span></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><span style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);">Curso:&nbsp;</span><span style="color: rgb(33, 33, 33); font-size: 13.2px; line-height: 19.8px;">{{retencoes}}</span></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><span style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);">Curso: {{ecf}}</span></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><span style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);">Curso:&nbsp;</span><span style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);">{{nfe}}</span></div></div></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);">Cliente: <span style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);">{{Pagamento}}</span></div></div></div>', NULL, NULL, 10058, 'Contato Interessado: Workshop de Férias ONLINE Nasajon Educacional', NULL, NULL, NULL);
            INSERT INTO email.templates
            ("template", categoria, descricao, conteudo, lastupdate, versao, tenant, assunto, codigo, empresa, remetente)
            VALUES('794837cf-24d6-458a-96fa-08d98da08b76'::uuid, NULL, 'PF Contato Interessado - Workshop de Férias ONLINE Nasajon Educacional', '<div aria-describedby="cke_51" title="Editor de Rich Text, editor1" aria-label="Editor de Rich Text, editor1" role="textbox" style="position: relative;" spellcheck="false" tabindex="0" class="cke_editable cke_editable_inline cke_contents_ltr cke_show_borders" contenteditable="true"><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);">Atenção, equipe! O contato deseja se inscrever no PF Curso de Férias ONLINE Nasajon Educacional.</div></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><br></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);">Nome: {{nome}}</div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);">Email:&nbsp;<span style="font-size: 13.2px; line-height: 19.8px;">{{email}}</span></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);">Telefone:&nbsp;<span style="font-size: 13.2px; line-height: 19.8px;">{{telefone}}</span></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);">CNPJ ou CPF: <span style="font-size: 13.2px; line-height: 19.8px;">{{CNPJ}}</span></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><span style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);">Curso:&nbsp;</span><span style="color: rgb(33, 33, 33); font-size: 13.2px; line-height: 19.8px;">{{simplesNacional}}</span></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><span style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);">Curso: {{lucroPresumido}}</span></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><span style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);">Curso:&nbsp;</span><span style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);">{{lucroReal}}</span></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><span style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);">Curso:&nbsp;</span><span style="color: rgb(33, 33, 33); font-size: 13.2px; line-height: 19.8px;">{{retencoes}}</span></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><span style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);">Curso: {{ecf}}</span></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><span style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);">Curso:&nbsp;</span><span style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);">{{nfe}}</span></div></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);">Cliente: <span style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);">{{Pagamento}}</span></div></div>', NULL, NULL, 10058, 'PF Contato Interessado - Workshop de Férias ONLINE Nasajon Educacional', NULL, NULL, NULL);
            INSERT INTO email.templates
            ("template", categoria, descricao, conteudo, lastupdate, versao, tenant, assunto, codigo, empresa, remetente)
            VALUES('67ccfcf8-e5dc-4db7-8a94-9d187467b45e'::uuid, NULL, 'Contato Interessado: Curso de Férias Nasajon Educacional', '<div class="cke_editable cke_editable_inline cke_contents_ltr cke_focus cke_show_borders" tabindex="0" spellcheck="false" role="textbox" aria-label="Editor de Rich Text, editor1" title="Editor de Rich Text, editor1" aria-describedby="cke_51" style="position: relative;" contenteditable="true"><p>Gente,</p><p>O contato abaixo deseja se inscrever no Curso de Férias:</p><p>Nome: {{nome}}<br>E-mail: {{email}}<br>Telefone: {{telefone}}<br>CNPJ ou CPF: {{CNPJ}}<br>Curso: {{contabilidade}}<br>Curso: {{simplesNacional}}<br>Curso: {{lucroPresumido}}<br>Curso: {{lucroReal}}<br>Curso: {{avisoPrevio}}<br>Curso: {{rhPratica}}<br>Forma de pagamento: {{Pagamento}}<br></p></div>', NULL, NULL, 10058, 'Contato Interessado: Curso de Férias Nasajon Educacional', NULL, NULL, NULL);
            INSERT INTO email.templates
            ("template", categoria, descricao, conteudo, lastupdate, versao, tenant, assunto, codigo, empresa, remetente)
            VALUES('cebb3ca4-a8fc-4866-901d-83d3a5c465ba'::uuid, NULL, 'PF Dados não cliente - Workshop de Férias ONLINE Nasajon Educacional', '<div aria-describedby="cke_51" title="Editor de Rich Text, editor1" aria-label="Editor de Rich Text, editor1" role="textbox" style="position: relative;" spellcheck="false" tabindex="0" class="cke_editable cke_editable_inline cke_contents_ltr cke_show_borders cke_focus" contenteditable="true"><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><span style="font-family: verdana, geneva, sans-serif;">Atenção, equipe! O contato deseja se inscrever no PF Workshop de Férias ONLINE Nasajon Educacional:</span><br></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><br></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><span style="font-family: verdana, geneva, sans-serif;">Nome: {{nome}}</span></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><span style="font-family: verdana, geneva, sans-serif;">CNPJ ou CPF:&nbsp;<span style="font-size: 13.2px; line-height: 19.8px;">{{cnpj}}</span></span></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><span style="font-family: verdana, geneva, sans-serif;">Email: {{email}}</span></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><span style="font-family: verdana, geneva, sans-serif;">Telefone:&nbsp;<span style="font-size: 13.2px; line-height: 19.8px;">{{telefone}}</span></span></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><font face="verdana, geneva, sans-serif">Endereço: {{endereço}}</font></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><font face="verdana, geneva, sans-serif">Número: {{numero}}</font></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><font face="verdana, geneva, sans-serif">Complemento: {{complemento}}</font></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><font face="verdana, geneva, sans-serif">Bairro: {{bairro}}</font></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><font face="verdana, geneva, sans-serif">Cidade: {{cidade}}</font></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><font face="verdana, geneva, sans-serif">UF: {{uf}}</font></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><span style="font-family: verdana, geneva, sans-serif; font-size: 13.2px; line-height: 19.8px;">CEP: {{CEP}}</span></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><span style="font-family: verdana, geneva, sans-serif; font-size: 13.2px; line-height: 19.8px;">Mensagem: {{mensagem}}</span>​<br></div></div>', NULL, NULL, 10058, 'PF Dados não cliente - Workshop de Férias ONLINE Nasajon Educacional', NULL, NULL, NULL);
            INSERT INTO email.templates
            ("template", categoria, descricao, conteudo, lastupdate, versao, tenant, assunto, codigo, empresa, remetente)
            VALUES('8ac934ad-cc09-4ac5-b6a8-7c8429bb0782'::uuid, NULL, 'PF Contato Interessado: Workshop de Férias ONLINE Nasajon Educacional', '<div aria-describedby="cke_51" title="Editor de Rich Text, editor1" aria-label="Editor de Rich Text, editor1" role="textbox" style="position: relative;" spellcheck="false" tabindex="0" class="cke_editable cke_editable_inline cke_contents_ltr cke_show_borders" contenteditable="true"><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);">Atenção, equipe! O contato deseja se inscrever no Curso de Férias ONLINE Nasajon Educacional -&nbsp; vindo do Painel de Fundo.<br></div></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><br></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);">Nome: {{nome}}</div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);">Email:&nbsp;<span style="font-size: 13.2px; line-height: 19.8px;">{{email}}</span></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);">Telefone:&nbsp;<span style="font-size: 13.2px; line-height: 19.8px;">{{telefone}}</span></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);">CNPJ ou CPF: <span style="font-size: 13.2px; line-height: 19.8px;">{{CNPJ}}</span></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><span style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);">Curso:&nbsp;</span><span style="color: rgb(33, 33, 33); font-size: 13.2px; line-height: 19.8px;">{{simplesNacional}}</span></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><span style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);">Curso: {{lucroPresumido}}</span></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><span style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);">Curso:&nbsp;</span><span style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);">{{lucroReal}}</span></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><span style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);">Curso:&nbsp;</span><span style="color: rgb(33, 33, 33); font-size: 13.2px; line-height: 19.8px;">{{retencoes}}</span></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><span style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);">Curso: {{ecf}}</span></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><span style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);">Curso:&nbsp;</span><span style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);">{{nfe}}</span></div></div></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);">Cliente: <span style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);">{{Pagamento}}</span><br></div></div></div>', NULL, NULL, 10058, 'PF Contato Interessado: Workshop de Férias ONLINE Nasajon Educacional', NULL, NULL, NULL);
            INSERT INTO email.templates
            ("template", categoria, descricao, conteudo, lastupdate, versao, tenant, assunto, codigo, empresa, remetente)
            VALUES('b741e4ac-193d-4b41-b1c5-77a7aa6904b1'::uuid, NULL, 'Novo Contato: Promoção de início de ano', '<div aria-describedby="cke_51" title="Editor de Rich Text, editor1" aria-label="Editor de Rich Text, editor1" role="textbox" style="position: relative;" spellcheck="false" tabindex="0" class="cke_editable cke_editable_inline cke_contents_ltr cke_show_borders" contenteditable="true"><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);">Atenção, equipe! O contato deseja receber mais informações sobre os sistemas abaixo:</div></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><br></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);">Nome: {{nome}}</div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);">Empresa:&nbsp;<span style="font-size: 13.2px; line-height: 19.8px;">{{empresa}}</span></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><span style="font-size: 13.2px; line-height: 19.8px;">Email: {{email}}</span></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);">Telefone:&nbsp;<span style="font-size: 13.2px; line-height: 19.8px;">{{telefone}}</span></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);">Estado: <span style="font-size: 13.2px; line-height: 19.8px;">{{estado}}</span></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);">Município: <span style="font-size: 13.2px; line-height: 19.8px;">{{municipio}}</span></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><span style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);">Mensagem: {{mensagem}}</span></div></div>', NULL, NULL, 10058, 'Novo Contato: Promoção de início de ano', NULL, NULL, NULL);
            INSERT INTO email.templates
            ("template", categoria, descricao, conteudo, lastupdate, versao, tenant, assunto, codigo, empresa, remetente)
            VALUES('55528c62-45c0-424e-bc40-924b729c7379'::uuid, NULL, 'eBook Varejo - EM', '<p style="line-height: 20.8px;">Gente,&nbsp;</p>

            <p style="line-height: 20.8px;">O contato abaixo realizou o download do&nbsp;eBook&nbsp;<strong>Varejo&nbsp;</strong>via <strong>Email Mkt</strong>:</p>

            <p style="line-height: 20.8px;">Nome: {{nome}}<br />
            Email: {{email}}<br />
            &nbsp;</p>', NULL, NULL, 10058, 'eBook Varejo - EM', NULL, NULL, NULL);
            INSERT INTO email.templates
            ("template", categoria, descricao, conteudo, lastupdate, versao, tenant, assunto, codigo, empresa, remetente)
            VALUES('ee6d1a8c-73c3-4581-82c9-8ff7ef0aa743'::uuid, NULL, 'WebinarioFranquia - convite', '<p>Ol&aacute;,</p>

            <p>Semana passada tive uma grata surpresa ao ler o case de um amigo que n&atilde;o via desde a inf&acirc;ncia&nbsp;num livro sobre empreendedorismo. Quando eu o conheci, o pai dele&nbsp;tinha uma boutique de roupas femininas e com ela, criou os filhos e manteve a fam&iacute;lia at&eacute; a sua morte. Esse meu amigo, hoje na faixa dos quarenta anos,&nbsp;herdou a empresa e em menos de uma d&eacute;cada,&nbsp;transformou a pequena boutique num conglomerado de cento e cinquenta lojas em 7 pa&iacute;ses. Qual foi o segredo? Transformou a lojinha&nbsp;do pai numa franquia e <span style="line-height: 20.8px;">usou o dinheiro de outros para financiar a expans&atilde;o do seu neg&oacute;cio.&nbsp;</span>.</p>

            <p>Na pr&oacute;xima quinta-feira vou apresentar&nbsp;um webin&aacute;rio online sobre como voc&ecirc; pode fazer crescer o SEU neg&oacute;cio&nbsp;repassando os custos a terceiros; expandir rapidamente a sua &aacute;rea de atua&ccedil;&atilde;o para ocupar os espa&ccedil;os antes dos concorrentes e atrair os melhores talentos para gerenciar o neg&oacute;cio sem precisar pagar por isso.</p>

            <p><strong>Inscreva-se gratuitamente neste link: <a href="http://www.claudionasajon.com.br/como-transformar-seu-negocio-numa-franquia/">claudionasajon.com.br/como-transformar-seu-negocio-numa-fraquia</a></strong></p>

            <p>O webin&aacute;rio ser&aacute; na quinta-feira 16 de junho &agrave;s 20h e voc&ecirc; pode participar de qualquer computador, tablet ou smartphone com acesso &agrave; Internet.</p>

            <p>Disponibilizarei apenas 50 vagas para este evento, portanto se tiver interesse, aproveite agora que este lembrente est&aacute; &agrave; sua frente e garanta o seu lugar.</p>

            <p>At&eacute; l&aacute;,</p>

            <p>Claudio</p>

            <p><a href="http://claudionasajon.com.br/como-transformar-seu-negocio-numa-franquia/"><strong>Inscri&ccedil;&otilde;es: como transformar seu neg&oacute;cio numa franquia</strong></a></p>

            <p>&nbsp;</p>

            <p>&nbsp;</p>', NULL, NULL, 10074, '7 razões por que transformar o seu negócio numa franquia - e como fazê-lo.', NULL, NULL, NULL);
            INSERT INTO email.templates
            ("template", categoria, descricao, conteudo, lastupdate, versao, tenant, assunto, codigo, empresa, remetente)
            VALUES('b18a0eb7-f6b1-442a-8188-d08239936640'::uuid, NULL, 'PF - Contato interessado: workshop online NE', '<div contenteditable="true" class="cke_editable cke_editable_inline cke_contents_ltr cke_focus cke_show_borders" tabindex="0" spellcheck="false" role="textbox" aria-label="Editor de Rich Text, editor1" title="Editor de Rich Text, editor1" aria-describedby="cke_51" style="position: relative;"><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><span style="font-family: verdana, geneva, sans-serif;">Atenção, equipe! O contato deseja se inscrever nos cursos online Nasajon Educacional via painel:</span></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><br></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><span style="font-family: verdana, geneva, sans-serif;">Nome: {{nome}}</span></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><span style="font-family: verdana, geneva, sans-serif;">Email:&nbsp;<span style="font-size: 13.2px; line-height: 19.8px;">{{email}}</span></span></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><span style="font-family: verdana, geneva, sans-serif;">Telefone:&nbsp;<span style="font-size: 13.2px; line-height: 19.8px;">{{telefone}}</span></span></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><span style="font-family: verdana, geneva, sans-serif;">Estado:&nbsp;<span style="font-size: 13.2px; line-height: 19.8px;">{{estado}}</span></span></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><span style="font-family: verdana, geneva, sans-serif;">Município:&nbsp;<span style="font-size: 13.2px; line-height: 19.8px;">{{cidade}}</span></span></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><span style="font-family: verdana, geneva, sans-serif;">Mensagem:&nbsp;<span style="font-size: 13.2px; line-height: 19.8px;">{{mensagem}}</span></span><span style="font-family: verdana, geneva, sans-serif;"><span style="font-size: 13.2px; line-height: 19.8px;">​</span></span></div><div class="gmail_default" style="color: rgb(33, 33, 33); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px; background-color: rgb(255, 255, 255);"><span style="font-family: verdana, geneva, sans-serif;"><span style="font-size: 13.2px; line-height: 19.8px;">Pagamento: {{pagamento}}</span></span></div><div><br></div></div>', NULL, NULL, 10058, 'PF - Contato interessado: workshop online NE', NULL, NULL, NULL);
            INSERT INTO email.templates
            ("template", categoria, descricao, conteudo, lastupdate, versao, tenant, assunto, codigo, empresa, remetente)
            VALUES('cf40580f-b7e6-446c-8962-16ea1ab28e96'::uuid, NULL, '[Curso Online Ao Vivo - Novo Simples Nacional]  Formulário Não-cliente', '<div class="gmail_default" style="color: rgb(33, 33, 33); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px;"><span style="font-family: verdana, geneva, sans-serif; font-size: 13.2px;">Aten&ccedil;&atilde;o, equipe! O contato abaixo preencheu o&nbsp;</span><strong style="font-family: verdana, geneva, sans-serif; font-size: 13.2px;">Formul&aacute;rio de n&atilde;o-cliente no para o curso online e ao vivo Novo Simples Nacional:</strong><span style="font-family: verdana, geneva, sans-serif; font-size: 13.2px;">&nbsp;</span></div>

            <div class="gmail_default" style="color: rgb(33, 33, 33); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px;">&nbsp;</div>

            <div class="gmail_default" style="color: rgb(33, 33, 33); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px;"><span style="font-family: verdana, geneva, sans-serif;">Nome: {{nome}}</span></div>

            <div class="gmail_default" style="color: rgb(33, 33, 33); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px;"><span style="font-family: verdana, geneva, sans-serif;">Cpf:&nbsp;<span style="font-size: 13.2px; line-height: 19.8px;">{{cpf}}</span></span></div>

            <div class="gmail_default" style="color: rgb(33, 33, 33); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px;"><span style="font-family: verdana, geneva, sans-serif;">Telefone:&nbsp;<span style="font-size: 13.2px; line-height: 19.8px;">{{telefone}}</span></span></div>

            <div class="gmail_default" style="color: rgb(33, 33, 33); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px;"><span style="font-family: verdana, geneva, sans-serif;">Email:&nbsp;<span style="font-size: 13.2px; line-height: 19.8px;">{{email}}</span></span></div>

            <div class="gmail_default" style="color: rgb(33, 33, 33); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px;"><span style="font-family: verdana, geneva, sans-serif;">Telefone:&nbsp;<span style="font-size: 13.2px; line-height: 19.8px;">{{telefone}}</span></span></div>

            <div class="gmail_default" style="color: rgb(33, 33, 33); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px;"><span style="font-family: verdana, geneva, sans-serif;">Endere&ccedil;o:&nbsp;<span style="font-size: 13.2px; line-height: 19.8px;">{{endereco}}</span></span></div>

            <div class="gmail_default" style="color: rgb(33, 33, 33); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px;"><span style="font-family: verdana, geneva, sans-serif;"><span style="font-size: 13.2px; line-height: 19.8px;">N&uacute;mero: {{numero}}</span></span></div>

            <div class="gmail_default" style="color: rgb(33, 33, 33); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px;"><span style="font-family: verdana, geneva, sans-serif; font-size: 13.2px; line-height: 19.8px;">Complemento: {{complemento}}</span></div>

            <div class="gmail_default" style="color: rgb(33, 33, 33); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px;"><span style="font-family: verdana, geneva, sans-serif;"><span style="font-size: 13.2px; line-height: 19.8px;">Bairro: {{bairro}}</span></span></div>

            <div class="gmail_default" style="color: rgb(33, 33, 33); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 13.2px; line-height: 19.8px;">
            <div class="gmail_default" style="font-size: 13.2px; line-height: 19.8px;"><span style="font-family: verdana, geneva, sans-serif;">Cidade: {{cidade}}</span></div>

            <div class="gmail_default" style="font-size: 13.2px; line-height: 19.8px;"><span style="font-family: verdana, geneva, sans-serif;">UF: {{uf}}</span></div>

            <div class="gmail_default" style="font-size: 13.2px; line-height: 19.8px;">
            <div class="gmail_default" style="font-size: 13.2px; line-height: 19.8px;"><span style="font-family: verdana, geneva, sans-serif;">Cep: {{cep}}</span></div>

            <div class="gmail_default" style="font-size: 13.2px; line-height: 19.8px;"><span style="font-family: verdana, geneva, sans-serif;">Mensagem: {{mensagem}}</span></div>

            <div class="gmail_default" style="font-size: 13.2px; line-height: 19.8px;"><font face="verdana, geneva, sans-serif" style="font-size: 13.2px;">Autoriza: {{autoriza}}</font></div>

            <div class="gmail_default" style="font-size: 13.2px; line-height: 19.8px;"><span style="font-size: 13.2px; font-family: verdana, geneva, sans-serif;"><span style="font-size: 13.2px; line-height: 19.8px;"><span style="font-size: 13.2px; line-height: 19.8px;">​</span></span></span>

            <div class="gmail_default" style="font-size: 13.2px; line-height: 19.8px;"><span style="font-family: verdana, geneva, sans-serif;"><span style="font-size: 13.2px; line-height: 19.8px;"><span style="font-size: 13.2px; line-height: 19.8px;">&nbsp;</span></span></span></div>

            <div class="gmail_default" style="font-size: 13.2px; line-height: 19.8px;"><span style="font-family: verdana, geneva, sans-serif;"><span style="font-size: 13.2px; line-height: 19.8px;"><span style="font-size: 13.2px; line-height: 19.8px;">Lembrando que o prazo ideal para primeiro contato com o lead s&atilde;o 24 horas.</span></span></span></div>

            <div class="gmail_default" style="font-size: 13.2px; line-height: 19.8px;"><span style="font-family: verdana, geneva, sans-serif;"><span style="font-size: 13.2px; line-height: 19.8px;"><span style="font-size: 13.2px; line-height: 19.8px;">Juntos podemos fazer muito!</span></span></span></div>
            </div>
            </div>
            </div>', NULL, NULL, 10058, '[Curso Online Ao Vivo - Novo Simples Nacional]  Formulário Não-cliente', NULL, NULL, NULL);
            INSERT INTO email.templates
            ("template", categoria, descricao, conteudo, lastupdate, versao, tenant, assunto, codigo, empresa, remetente)
            VALUES('c4f3489e-4cc4-415f-b906-85d78a61a5f3'::uuid, NULL, 'Novo lead no empresavendavel', '<div contenteditable="true" class="cke_editable cke_editable_inline cke_contents_ltr cke_focus cke_show_borders" tabindex="0" spellcheck="false" role="textbox" aria-label="Rich Text Editor, editor1" title="Rich Text Editor, editor1" aria-describedby="cke_51" style="position: relative;"><p>{{nome}} &lt;{{email}}&gt;</p></div>', NULL, NULL, 10082, 'Novo lead no empresavendavel', NULL, NULL, NULL);
            INSERT INTO email.templates
            ("template", categoria, descricao, conteudo, lastupdate, versao, tenant, assunto, codigo, empresa, remetente)
            VALUES('dc189694-fed5-43ef-b5b1-92e917d03e77'::uuid, NULL, 'Email do video 1', '<div contenteditable="true" class="cke_editable cke_editable_inline cke_contents_ltr cke_focus cke_show_borders" tabindex="0" spellcheck="false" role="textbox" aria-label="Rich Text Editor, editor1" title="Rich Text Editor, editor1" aria-describedby="cke_51" style="position: relative;"><p dir="ltr" style="line-height:1.38;margin-top:0pt;margin-bottom:0pt;"><span id="docs-internal-guid-1547e650-19d0-fa7d-3ec3-11247d46bcf1"><span style="font-size: 12.6667px; font-family: ''Courier New''; color: rgb(34, 34, 34); vertical-align: baseline; white-space: pre-wrap; background-color: rgb(255, 255, 255);">Olá,</span></span></p><p dir="ltr" style="line-height:1.38;margin-top:0pt;margin-bottom:0pt;"><br></p><p dir="ltr" style="line-height:1.38;margin-top:0pt;margin-bottom:0pt;"><span><span style="font-size: 12.6667px; font-family: ''Courier New''; color: rgb(34, 34, 34); vertical-align: baseline; white-space: pre-wrap; background-color: rgb(255, 255, 255);">Há alguns dias publiquei um vídeo sobre como acompanhar o trabalho dos seus empregados usando quadros e adesivos. Confesso que fiquei surpreso com a quantidade de respostas que recebi comentando sobre a dificuldade de contratar "mão de obra de qualidade".</span></span></p><p dir="ltr" style="line-height:1.38;margin-top:0pt;margin-bottom:0pt;"><br></p><p dir="ltr" style="line-height:1.38;margin-top:0pt;margin-bottom:0pt;"><span id="docs-internal-guid-1547e650-19d0-fa7d-3ec3-11247d46bcf1"><span style="font-size: 12.6667px; font-family: ''Courier New''; color: rgb(34, 34, 34); vertical-align: baseline; white-space: pre-wrap; background-color: rgb(255, 255, 255);">Muita gente também mencionou que gostaria de receber dicas sobre como fazer a empresa crescer sem muito dinheiro para investir e fiquei feliz, pois isso eu </span><span style="font-size: 12.6667px; font-family: ''Courier New''; color: rgb(34, 34, 34); font-weight: 700; vertical-align: baseline; white-space: pre-wrap; background-color: rgb(255, 255, 255);">vou conseguir ajudar agora mesmo</span><span style="font-size: 12.6667px; font-family: ''Courier New''; color: rgb(34, 34, 34); vertical-align: baseline; white-space: pre-wrap; background-color: rgb(255, 255, 255);">. </span></span></p><p dir="ltr" style="line-height:1.38;margin-top:0pt;margin-bottom:0pt;"><br></p><p dir="ltr" style="line-height:1.38;margin-top:0pt;margin-bottom:0pt;"><span id="docs-internal-guid-1547e650-19d0-fa7d-3ec3-11247d46bcf1"><span style="font-size: 12.6667px; font-family: ''Courier New''; color: rgb(34, 34, 34); vertical-align: baseline; white-space: pre-wrap; background-color: rgb(255, 255, 255);">Lanço hoje uma série de 10 vídeos sobre como </span><span style="font-size: 12.6667px; font-family: ''Courier New''; color: rgb(34, 34, 34); font-weight: 700; vertical-align: baseline; white-space: pre-wrap; background-color: rgb(255, 255, 255);">construir uma empresa vendável.</span></span></p><p dir="ltr" style="line-height:1.38;margin-top:0pt;margin-bottom:0pt;"><br></p><p dir="ltr" style="line-height:1.38;margin-top:0pt;margin-bottom:0pt;"><span id="docs-internal-guid-1547e650-19d0-fa7d-3ec3-11247d46bcf1"><span style="font-size: 12.6667px; font-family: ''Courier New''; color: rgb(34, 34, 34); vertical-align: baseline; white-space: pre-wrap; background-color: rgb(255, 255, 255);">Olhando para trás e tentando entender o que me ajudou a fazer da Nasajon uma das 10 maiores empresas de software contábil do país, considerada a melhor em excelência de atendimento, entre as 150 melhores empresas para se trabalhar no Brasil e entre as dez mais rentáveis do setor, percebi que é possível mapear e ensinar algumas ferramentas e ações que podem ajudar qualquer pessoa a criar uma empresa vendável.</span></span></p><p dir="ltr" style="line-height:1.38;margin-top:0pt;margin-bottom:0pt;"><br></p><p dir="ltr" style="line-height:1.38;margin-top:0pt;margin-bottom:0pt;"><span id="docs-internal-guid-1547e650-19d0-fa7d-3ec3-11247d46bcf1"><span style="font-size: 12.6667px; font-family: ''Courier New''; color: rgb(34, 34, 34); font-weight: 700; vertical-align: baseline; white-space: pre-wrap; background-color: rgb(255, 255, 255);">O vídeo 1 já está no ar:</span><span style="font-size: 12.6667px; font-family: ''Courier New''; color: rgb(34, 34, 34); vertical-align: baseline; white-space: pre-wrap; background-color: rgb(255, 255, 255);"> </span><a data-cke-saved-href="http://www.empresavendavel.com.br/por-que" href="http://www.empresavendavel.com.br/por-que" style="text-decoration:none;"><span style="font-size: 12.6667px; font-family: ''Courier New''; color: rgb(17, 85, 204); text-decoration: underline; vertical-align: baseline; white-space: pre-wrap; background-color: rgb(255, 255, 255);">www.empresavendavel.com.br/por-que</span></a></span></p><p dir="ltr" style="line-height:1.38;margin-top:0pt;margin-bottom:0pt;"><br></p><p dir="ltr" style="line-height:1.38;margin-top:0pt;margin-bottom:0pt;"><span id="docs-internal-guid-1547e650-19d0-fa7d-3ec3-11247d46bcf1"><span style="font-size: 12.6667px; font-family: ''Courier New''; color: rgb(34, 34, 34); vertical-align: baseline; white-space: pre-wrap; background-color: rgb(255, 255, 255);">Para receber os outros vídeos, é só deixar seu e-mail clicando no link acima. Os próximos vídeos da série serão enviados exclusivamente por e-mail para quem se cadastrar pelo link.</span></span></p><p dir="ltr" style="line-height:1.38;margin-top:0pt;margin-bottom:0pt;"><br></p><p dir="ltr" style="line-height:1.38;margin-top:0pt;margin-bottom:0pt;"><span id="docs-internal-guid-1547e650-19d0-fa7d-3ec3-11247d46bcf1"><span style="font-size: 12.6667px; font-family: ''Courier New''; color: rgb(34, 34, 34); vertical-align: baseline; white-space: pre-wrap; background-color: rgb(255, 255, 255);">Vamos começar 2016 apostando no crescimento da sua empresa?</span></span></p><h1 dir="ltr" style="line-height:1.38;margin-top:10pt;margin-bottom:0pt;"><span id="docs-internal-guid-1547e650-19d0-fa7d-3ec3-11247d46bcf1"><span style="font-size: 12.6667px; font-family: ''Courier New''; color: rgb(34, 34, 34); font-weight: 400; vertical-align: baseline; white-space: pre-wrap; background-color: rgb(255, 255, 255);">Um forte abraço,</span></span></h1><h1 dir="ltr" style="line-height:1.38;margin-top:10pt;margin-bottom:0pt;"><span id="docs-internal-guid-1547e650-19d0-fa7d-3ec3-11247d46bcf1"><span style="font-size: 12.6667px; font-family: ''Courier New''; color: rgb(34, 34, 34); font-weight: 400; vertical-align: baseline; white-space: pre-wrap; background-color: rgb(255, 255, 255);">Claudio</span></span></h1><p><span id="docs-internal-guid-1547e650-19d0-fa7d-3ec3-11247d46bcf1"><span style="font-size: 12.6667px; font-family: ''Courier New''; color: rgb(61, 133, 198); vertical-align: baseline; white-space: pre-wrap; background-color: rgb(255, 255, 255);">PS: <a data-cke-saved-href="http://www.twitter.com/claudionasajon" href="http://www.twitter.com/claudionasajon">Siga-me no Twitter</a> | <a data-cke-saved-href="http://www.facebook.com/claudionasajon" href="http://www.facebook.com/claudionasajon">Siga-me no Facebook</a> | <a data-cke-saved-href="http://www.youtube.com/claudionasajon" href="http://www.youtube.com/claudionasajon">Siga-me no Youtube</a></span></span></p></div>', NULL, NULL, 10082, 'Por que você deveria querer construir uma empresa vendável?', NULL, NULL, NULL);
        end;
        $$;

EOT
        );
        $this->addSql("ALTER FUNCTION email.api_criar_template(varchar(250), varchar(250), varchar(250), text, integer)  OWNER TO group_nasajon;");


    }

    public function down(Schema $schema) {
    }

}