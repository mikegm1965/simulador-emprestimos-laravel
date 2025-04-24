# 📊 Simulador de Empréstimos - API REST em Laravel

Este projeto é uma API REST desenvolvida em Laravel para simulação de empréstimos, conforme especificações de uma prova técnica. A API permite consultar instituições financeiras, convênios disponíveis e realizar simulações de crédito com base em dados de arquivos JSON.

---

## 🚀 Tecnologias

- PHP 8+
- Laravel 10
- JSON como fonte de dados (sem banco de dados)

---

## 📁 Organização dos Arquivos

Os dados são lidos de arquivos `.json` localizados na pasta:

storage/app/data/

- `instituicoes.json`
- `convenios.json`
- `taxas.json`

---

## 🔧 Instalação e Execução

```bash
git clone https://github.com/mikegm1965/simulador-emprestimos-laravel.git
cd simulador-emprestimos-laravel

composer install
cp .env.example .env
php artisan key:generate

php artisan serve


🔌 Endpoints
1. Listar Instituições
GET /api/instituicoes

Retorna um JSON com todas as instituições disponíveis.

2. Listar Convênios
GET /api/convenios

Retorna um JSON com todos os convênios disponíveis.

3. Simular Empréstimo
POST /api/simulacoes

Payload JSON:

{
  "valor_emprestimo": 10000,
  "instituicoes": ["bmg", "pan"],
  "convenios": ["inss"],
  "parcela": 24
}
Resposta: Lista de simulações com valor da parcela, taxa aplicada e dados da instituição/convênio.

📦 Collection Postman
A collection para testes está disponível em /postman/simulador-emprestimos.postman_collection.json.

📧 Contato
Em caso de dúvidas ou sugestões, estou à disposição!

Desenvolvido com ❤️ por Michael Vieira Silva
