# Sistema CRUD de vendas
## Codificado em PHP e MySQL
Sistema de cadastro de vendedores e vendas CRUD

## Telas do sistema:
![print_menu](https://github.com/Lz-Rod/crud_vendas_php/blob/main/docs/img/tela-inicial-sistema.PNG)
- Tela principal: Nessa tela é possivel ver todos os vendedores cadastrados. Acessar telas de detalhes, cadastro, alteração e exclusão de vendedores e cadastro de vendas.

![print_menu](https://github.com/Lz-Rod/crud_vendas_php/blob/main/docs/img/barra-buscar-ordenar-vendedores.PNG)
- Tela principal - Ordenar e buscar vendedores: Na tela principal podemos ordenar os vendedores por ID, Nome e E-mail, assim como fazer uma busca simples que considera esses três parâmetros.

![print_menu](https://github.com/Lz-Rod/crud_vendas_php/blob/main/docs/img/tela-detalhes-vendas.PNG)
- Detalhes das vendas: Ao clicar no link do nome do vendedor na tela principal, você será redirecionado para a tela de detalhes onde é possível ver todos os dados do vendedor e todas as suas vendas cadastradas.

![print_menu](https://github.com/Lz-Rod/crud_vendas_php/blob/main/docs/img/tela-cadatrar-vendedor.PNG)
- Cadastro de vendedores: Ao clicar no botão ![print_menu](https://github.com/Lz-Rod/crud_vendas_php/blob/main/docs/img/bt-cadastrar-vendedor.PNG) no topo do sistema você será redirecionado para a tela de cadastro de vendedores, onde deverá inserir um ID único, nome e email do novo vendedor, e ao clicar no botão cadastrar, o mesmo será salvo no DB e automaticamente exibido na tela principal

![print_menu](https://github.com/Lz-Rod/crud_vendas_php/blob/main/docs/img/tela-cadastrar-venda.PNG)
- Cadastro de vendedores: Ao clicar no botão ![print_menu](https://github.com/Lz-Rod/crud_vendas_php/blob/main/docs/img/bt-cadastrar-venda.PNG) no topo do sistema você será redirecionado para a tela de cadastro de venda, onde deverá inserir o ID do vendedor e o valor da venda. Ao clicar no botão cadastrar, o mesmo será salvo no DB, sendo a data e a comissão de 8,5% preenchidos automaticamente.

![print_menu](https://github.com/Lz-Rod/crud_vendas_php/blob/main/docs/img/tela-alterar-vendedores.PNG)
- Editar dados do vendedor: Ao clicar no ícone ![print_menu](https://github.com/Lz-Rod/crud_vendas_php/blob/main/docs/img/icone-editar.PNG) na tabela de vendedores da tela principal você será redirecionado para a tela de Editar dados do vendedor, os dados serão preenchidos automaticamente de acordo com o vendedor escolhido, e poderá ser alterado nome e e-mail, sendo o id impossivel de alterar. Ao clicar no botão Alterar, o mesmo será salvo no DB e exibido na tela principal automaticamente.

![print_menu](https://github.com/Lz-Rod/crud_vendas_php/blob/main/docs/img/tela-excluir-vendedores.PNG)
- Excluir cadastro do vendedor: Ao clicar no ícone ![print_menu](https://github.com/Lz-Rod/crud_vendas_php/blob/main/docs/img/icone-excluir.PNG) na tabela de vendedores da tela principal você será redirecionado para a tela de Excluir cadastro do vendedor. Os dados serão exibidos automaticamente de acordo com o vendedor escolhido, e o sistema mostrará um aviso perguntando se realmente deseja excluir aquele cadastro, lembrando que suas respectivas vendas também serão excluídas do DB. Abaixo haverá dois botões Excluir e Cancelar, caso clique em excluir será redirecionado para uma tela confirmando a exclusão do cadastro e caso clique em  cancelar será redirecionado para a tela principal.

![print_menu](https://github.com/Lz-Rod/crud_vendas_php/blob/main/docs/img/tela-relatorio-diario.PNG)
- Tela principal com envio do relatório diário: de acordo com o horário, remetente e destinatários cadastrados no sistema o relatório diário será enviado mostrando essa notificação no topo da tela principal.

## Configuração do DB:
O dump do DB usado assim como a query completa estão na pasta DB desse repositorio: https://github.com/Lz-Rod/crud_vendas_php/tree/main/db

![print_menu](https://github.com/Lz-Rod/crud_vendas_php/blob/main/docs/img/conexao-db.PNG)
- A configuração de acesso do DB deve ser feita no arquivo db.php no caminho https://github.com/Lz-Rod/crud_vendas_php/tree/main/develop/includes como mostrado na imagem acima de acordo com suas configurações de servidor.

## Configuração do Relatório diário:
O sistema possuí a função de enviar um relatório com o valor de todas as vendas daquele dia em um horário estipulado

![print_menu](https://github.com/Lz-Rod/crud_vendas_php/blob/main/docs/img/destino-relatorio.PNG)
- A configuração de email destinatário e remetente devem ser preenchidas na linha 17 do index.php como mostra a imagem

![print_menu](https://github.com/Lz-Rod/crud_vendas_php/blob/main/docs/img/funcao-env-email.PNG)
- no arquivo functions.php é possível fazer outras alterações na função de envio de relatório como horário de envio que está marcado para 23:59:00 do dia.

## Configuração do Localhost para envio do email de relatório diário:
Caso queira testar em um localhost serão necessárias configurações para o correto envio do email, nesse sistema usei o XAMMP com o envio pelo gmail e foram realizadas as seguintes configurações:

### php.ini:
Edite o arquivo php.ini na pasta C:\Xampp\php. Dentro deste arquivo, encontre a seção [mail function], comente duas as linhas ativas logo abaixo dela com ; e cole depois as seguintes diretivas:

- SMTP=smtp.gmail.com
- smtp_port=587
- sendmail_from = usuario@gmail.com
- sendmail_path = "\"X:\xampp\sendmail\sendmail.exe\" -t" 
O X é a letra da partição onde está instalado o Xampp (Cou D, etc)

### sendmail.ini:
Agora edite o arquivo sendmail.ini na pasta C:\Xampp\sendmail. Dentro deste arquivo, encontre a seção [sendmail], comente todas as linhas abaixo dela com um ; e depois no final do arquivo cole as linhas abaixo:

- smtp_server=smtp.gmail.com
- smtp_port=587
- smtp_ssl=tls
- error_logfile=error.log
- debug_logfile=debug.log
- error_logfile=error.log
- auth_username=seu_email@gmail.com
- auth_password=sua_senha
- force_sender=seu_email@gmail.com
- hostname=localhost
Não esqueça de colocar o seu email do Gmail em "auth_username" e "force_sender" e a sua senha em "auth_password".

### Conta GOOGLE:
Acessa o Painel Minha Conta do Google e no menu lateral você deve clicar em Segurança, rolar para baixo até “Acesso a app menos seguro” e ative-o.
