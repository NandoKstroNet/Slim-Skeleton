# Slim Framework 3 Estrutura de Aplicação

Esta estrutura de aplicação é baseada em slim/Slim-Skeleton e pode ser utilizada para criar e começar a trabalhar rapidamente em uma aplicação baseada no Slim Framework 3. Esta aplicação renderiza PHP-View e Monolog.

Esta estrutura de aplicação foi construída com Composer, permitindo uma construção rápida e fácil da sua aplicação Slim.

## Instalando a Aplicação

Execute este comando a partir do diretório em que você quer instalar sua aplicação Slim.

    php composer.phar create-project ramcoelho/slim-skeleton [nome-da-minha-aplicacao]

Troque `[nome-da-minha-aplicacao]` pelo nome desejado. Você também precisará:

* Apontar a raiz de documento do seu host virtual para o diretório `public/` da sua aplicação.
* Garantir que o diretório `logs/` tem permissão de escrita para o usuário do apache/nginx.

Para executar a aplicação em desenvolvimento, execute estes comandos:

	cd [nome-da-minha-aplicacao]
	php composer.phar start

Execute este comando para executar a rotina de testes:

	php composer.phar test

Isto é tudo! Agora vá e construa algo legal.
