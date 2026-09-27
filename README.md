# Área do Aluno

Sistema escolar criado do zero com PHP, MySQL, HTML5, CSS3, JavaScript e PDO.

## Requisitos
- XAMPP com Apache e MySQL
- PHP 8.1+ recomendado
- MySQL/MariaDB

## Instalação no XAMPP

1. Extraia a pasta `area-aluno` para:
   `C:\xampp\htdocs\area-aluno`

2. Abra o XAMPP e inicie:
   - Apache
   - MySQL

3. Acesse o phpMyAdmin:
   `http://localhost/phpmyadmin`

4. Importe:
   `database/area_aluno.sql`

   O SQL cria automaticamente o banco `area_aluno` e os dados de demonstração.

5. Se o MySQL do seu XAMPP tiver senha para o usuário `root`, altere:
   `config/database.php`

6. Abra:
   `http://localhost/area-aluno/`

## Login de demonstração

E-mail:
`joao@escola.local`

Senha:
`123456`

## Estrutura

- `dashboard/` painel inicial
- `tarefas/` CRUD de tarefas
- `notas/` notas e médias
- `disciplinas/` disciplinas
- `calendario/` calendário
- `avisos/` sistema de avisos
- `perfil/` dados do aluno
- `configuracoes/` preferências
- `config/` conexão PDO, autenticação e layout
- `css/` estilos
- `js/` comportamento
- `database/` SQL

## Observação

O projeto foi pensado para rodar em uma instalação local do XAMPP. O caminho `/area-aluno` é usado nos links internos porque a pasta do projeto deve estar dentro de `htdocs`.
