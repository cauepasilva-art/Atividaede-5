# S5_R1_AT1 — Respostas

* **Onde ocorre o CRUD:**
  Fica dentro dos arquivos de repositório (`ClienteRepository.php` e `LivroRepository.php`), que é onde estão os códigos que salvam, buscam, editam e apagam as coisas no banco de dados.

* **Onde está a regra de negócio:**
  Fica nas classes de modelo (`Cliente.php` e `Livro.php`), onde a gente define o que cada coisa tem (como nome ou título), e nas páginas (`criar.php`, `editar.php`, `excluir.php`), que pegam o que foi digitado nos formulários e mandam para o repositório.

* **Por que a classe `Cliente` não acessa o banco diretamente:**
  Para não misturar tudo num lugar só e deixar o código mais fácil de mexer. A classe `Cliente` serve só para guardar os dados do cliente, enquanto o repositório cuida só da parte do banco. Se precisar mudar algo no banco depois, a gente não precisa mexer na classe do cliente.

---

## 🔹 Desafio Profissional *(Ampliação do sistema para Livros)*

* **O Repository pode ser reutilizado?**
  A ideia, a estrutura e a interface (`RepositoryInterface.php`) dão para reaproveitar totalmente. A gente só precisa criar um arquivo novo (`LivroRepository.php`) para colocar os comandos do banco voltados para a tabela de livros.

* **O que muda:**
  * A classe do modelo (sai a de cliente e entra a `Livro.php`, com título, autor e ano).
  * Os comandos do banco dentro do repositório (mudam o nome da tabela e as colunas).
  * Os campos dos formulários e as colunas das tabelas nas páginas (`index.php`, `criar.php`, `editar.php`).

* **O que permanece igual:**
  * A organização das pastas (`config`, `interfaces`, `models`, `repositories`, `public`).
  * A conexão com o banco no arquivo `Database.php`.
  * Os nomes das funções principais (`criar`, `listar`, `buscarPorId`, `atualizar`, `excluir`).
  * O jeito que as telas enviam e recebem os dados (`$_POST` e `$_GET`) e voltam para a página inicial (`index.php`).
