# iWorkflow
Projeto de PAPS/Gerência de Projetos/Prática de Banco de Dados

O projeto destina-se ao aprendizado das disciplinas citadas e para o auxílio das atividades do iComp.

# Procedimentos para a instalação da aplicação no computador.

Instalar o seguintes itens:
  1. Github
  2. Wamp, Mamp ou Xamp (Ou qualquer gerenciador php com mysql)
  3. Composer
  4. MySQLWorkbench
  5. SublimeText

Após realizar as instalações, abra o terminal e siga esses passos:

## Passo 1
Clonar a aplicação do GitHub na pasta do php utilizando o comando:

``` git clone https://github.com/EdleySantana/iworkflow ```

Vá para a pasta “aplicacao” dentro do diretório “iworkflow”.

## Passo 2
Se o composer não estiver instalado, instalar dentro da pasta
“aplicacao” que está na pasta “iworkflow”. Depois use o comando para atualizar as dependências.

Se o Composer já estiver instalado como uma aplicação completa, vá para a pasta “aplicacao” dentro de “iworkflow” e use o comando abaixo para atualizar as dependências do composer.

``` php composer.phar global require "fxp/composer-asset-plugin:^1.2.0" ```

Essa atualização pode demorar alguns minutos.

## Passo 3
Agora utilize o comando para finalmente instalar a aplicação:

``` php composer.phar install ```

Essa instalação também pode demorar vários minutos.
Lembrando que todos esses comandos devem ser feitos dentro da pasta “aplicacao” dentro do diretório “iworkflow”.

## Passo 4
Ainda dentro da pasta “aplicacao”, dê o seguinte comando para inicializar a aplicação:

``` php yii init ```

Se não funcionar, use apenas:

``` php init ```

Escolha “0” para indicar que é uma aplicação em desenvolvimento e digite “yes”, para confirmar.

# A partir desse momento, a aplicação já está instalada.

Agora é necessária a configuração para a utilização do banco de dados MySQL.

## Passo 1

Abra o phpMyAdmin e crie um banco chamado “iworkflowdb”.

## Passo 2
Abra o SublimeText e abra o arquivo “aplicacao/common/config/main-local.php”. Coloque as configurações do seu banco.

Nome do banco: iworkflowdb

Usuário e a senha definidos na instalação do seu MySQL.

## Passo 3
Abra o terminal e vá para a pasta “aplicacao” dentro do diretório “iworkflow”.
Digite o comando:
``` php yii migrate ```

Se não funcionar, tente apenas:
``` php migrate ```

Digite “yes” para confirmar e as tabelas serão criadas no banco.

## Passo 4

Abra o navegador e acesse o frontend da aplicação!

# Já está pronto pra usar!
