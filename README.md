# PreservSign

<!--- Exemplos de badges. Acesse https://shields.io para outras opções. Você pode querer incluir informações de dependencias, build, testes, licença, etc. --->
![GitHub repo size](https://img.shields.io/github/repo-size/igorbgalvan/progweb13)
![GitHub contributors](https://img.shields.io/github/contributors/igorbgalvan/progweb13)

PreservSign é um clube de assinatura que tem por objetivo facilitar a aquisição de preservativos, através do qual se espera difundir a cultura de uso de preservativos em uma tentativa de mitigar o crescimento exponencial dos índices de infecção por IST's.

A aplicação permitirá que o usuário receba mensalmente uma quantidade variável de preservativos e complementos. O funcionamento se dá através de planos que serão pagos mensalmente, ou anualmente com desconto.

Os planos serão divididos em 3 categorias: básico, premium, exxxtra. Cada plano dá direito a tipos diferentes de preservativos e o plano exxxtra adiciona lubrificante como complemento a ser enviado.


## Pré-requisitos

Antes de iniciar, certifique-se de cumprir os seguintes requisitos:
<!--- Estes são alguns exemplos de requisitos. Adicione, duplique e remove como necessário --->
* Você deve possuir a última versão do PHP, HTML, JavaScript e CSS instalado.
* Você deve possuir uma máquina Linux.
* Você deve ler o https://www.php.net/manual/pt_BR/ dos termos de uso do PHP.
* Você deve ler o https://dev.w3.org/html5/html-author/ dos termos de uso do HTML 5.
* Você deve ler o https://www.w3schools.com/cssref/ dos termos de uso do CSS 3.
* Você deve possuir o composer na versão 1.6.3 https://getcomposer.org/download/
* Você deve possuir a última versão do Laravel https://laravel.com/docs/7.x/installation
* Você deve possuir o laravel/ui https://laravel.com/docs/7.x/authentication
* Você deve possuir um banco de dados que deve ser especificado no arquivo ".env"

## Como executar

Para fazer o deploy da aplicação siga os seguintes passos:

Linux:
```
* Passo a passo do nosso ambiente:
 - Instale o xampp;
 - Inicialize o xamppp usando 'sudo /opt/lampp/xampp start';
 - Acesse localhost/phpmyadmin
 - Crie um banco de dados;
 - Crie um arquivo .env usando a mesma estrututa presente no '.env.example';
 - Altere o arquivo .env, onde estiver "DB_DATABASE" troque pelo nome do banco criado acima, tais como informações de acesso;
 - Use o comando 'composer update';
 - Use o comando 'composer require laravel/ui';
 - Use o comando 'php artisan migrate';
 - Use o comando 'php artisan key:generate'
 - Use o comando 'php artisan serve';
 - Desfrute do sistema.

 obs: O primeiro administrador do sistema deve ser promovido diretamente no banco de dados. 
      Para isso, entre no banco criado, vá para a tabela 'users' e altere o 'groupid' para 2 do usuário que deseja.
      Após ter um primeiro administrador, o mesmo poderá alterar o cargo de outros usuários na página do perfil.

* Para fins de teste, o banco de dados utilizado foi o mySQL.
* (Feito em ambiente unix - Ubuntu)
sudo apt-get install php-mysql
```

## Usando PreservSign

Para usar PreservSign, estas são as opções:
* Abra o navegador e digite o endereço explicitado pelo seu servidor.
* Ao abrir a aplicação você poderá:
  * Navegar pelo conteúdo público
  * Entrar com usuário e senha
  * Cadastrar novo usuário e senha
  * Realizar assinatura com boleto bancário
  * Realizar assinatura com cartão de crédito
  * Cancelar assinatura
  * Fazer upgrade da assinatura
  * Fazer downgrade da assinatura
  * Alterar endereço da assinatura
  * Alterar a forma de pagamento da assinatura
  * Promover ou rebaixar usuário;
  * Visitar a tabela de log de alterações
  * Adicionar novos endereços
  * Remover endereços
  * Editar endereços
  * Adicionar novos planos
  * Remover planos
  * Editar planos
  * Entrar em contato diretamente pelo o site
  * Visualizar mensagens de contato pelo o site
  * Remover mensagens de contato pelo o site
  * Alterar informações de usuário
  * Deletar conta


## Evolução da Aplicação
* Primeira Sprint
    * Protótipo das Telas
    * Esqueleto Visual da Aplicação
* Segunda Sprint
    * Cadastro
    * Login
    * Edição de Perfil
    * Edição de Senha
    * Banco de Dados da Aplicação
    * Refinamentos Visuais
* Terceira Sprint
    * Finalização da Aplicação 

## Contribuidores

As seguintes pessoas contribuiram para este projeto:

* Ericca Rickli (https://github.com/ericcarickli)
* Gabriel Matias (https://github.com/gabbmatias)
* Guilherme Jardim (https://github.com/jardimguilherme)
* Igor Galvan (https://github.com/igorbgalvan)
* Ricardo Koester (https://github.com/Ricardoksp)

## Licença de uso

<!--- Se não tiver certeza de qual, verifique este site: https://choosealicense.com/--->
Este projeto usa a seguinte licença: https://mit-license.org.
