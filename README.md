
![Logo](https://img.freepik.com/vetores-gratis/logotipo-grafico-abstrato_1043-36.jpg?size=338&ext=jpg&ga=GA1.1.386372595.1698537600&semt=ais)


# Financas

Financas é uma aplicação web feita inicialmente para uso pessoal. Nele é possível realizar organização financeira, como controle de gastos, cadastro de cartões de crédito, organização de salário, etc.


## Stack utilizada

**Front-end:** Vue.js

**Back-end:** Node, Laravel



## Funcionalidades

- Temas dark e light
- Preview em tempo real
- Modo tela cheia
- Multiplataforma



## Documentação da API

#### Retorna todos os itens

```http
  GET /api/items
```

| Parâmetro   | Tipo       | Descrição                           |
| :---------- | :--------- | :---------------------------------- |
| `api_key` | `string` | **Obrigatório**. A chave da sua API |

#### Retorna um item

```http
  GET /api/items/${id}
```

| Parâmetro   | Tipo       | Descrição                                   |
| :---------- | :--------- | :------------------------------------------ |
| `id`      | `string` | **Obrigatório**. O ID do item que você quer |

#### add(num1, num2)

Recebe dois números e retorna a sua soma.


## Variáveis de Ambiente

Para rodar esse projeto, você vai precisar adicionar as seguintes variáveis de ambiente no seu .env

`API_KEY`

`ANOTHER_API_KEY`


## Rodando localmente

Clone o projeto

```bash
  git clone https://github.com/constpereiradev/financas.git
```

Entre no diretório do projeto

```bash
  cd my-project
```

Instale as dependências

```bash
  composer install
```

```bash
  npm install
```

```bash
  php artisan migrate
```


Inicie o servidor

```bash
  npm run watch
```

## Documentação

[Documentação](https://link-da-documentação)




## Contribuindo

Contribuições são sempre bem-vindas!

Veja `contribuindo.md` para saber como começar.

Por favor, siga o `código de conduta` desse projeto.


## Roadmap

- Melhorar o suporte de navegadores

- Adicionar mais integrações


## Referência

 - [Awesome Readme Templates](https://awesomeopensource.com/project/elangosundar/awesome-README-templates)
 - [Awesome README](https://github.com/matiassingers/awesome-readme)
 - [How to write a Good readme](https://bulldogjob.com/news/449-how-to-write-a-good-readme-for-your-github-project)


## Autores

- Amanda Pereira -  [@constpereiradev](https://www.github.com/constpereiradev)

## 🚀 Sobre mim
Desenvolvedora Web FullStack Aprendiz.

## 🛠 Habilidades

* Laravel
* Vue.js
* SQL

## 🔗 Links
[![portfolio](https://img.shields.io/badge/my_portfolio-000?style=for-the-badge&logo=ko-fi&logoColor=white)](https://katherineoelsner.com/)
[![linkedin](https://img.shields.io/badge/linkedin-0A66C2?style=for-the-badge&logo=linkedin&logoColor=white)](https://www.linkedin.com/)
[![twitter](https://img.shields.io/badge/twitter-1DA1F2?style=for-the-badge&logo=twitter&logoColor=white)](https://twitter.com/)



## Suporte

Para suporte, mande um email para amandapereiradevcontact@gmail.com.


## Licença

[MIT](https://choosealicense.com/licenses/mit/)


