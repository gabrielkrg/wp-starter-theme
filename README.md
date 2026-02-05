# WordPress Starter Theme com Vite e Tailwind CSS

Tema WordPress moderno usando Vite como bundler e Tailwind CSS como framework de estilos.

## Requisitos

- Node.js 18+ 
- npm ou yarn

## Instalação

1. Instale as dependências:
```bash
npm install
```

## Desenvolvimento

Para iniciar o servidor de desenvolvimento do Vite:

```bash
npm run dev
```

O servidor Vite estará rodando em `http://localhost:3000`. O tema WordPress detectará automaticamente o modo de desenvolvimento e carregará os assets do servidor Vite.

## Build para Produção

Para gerar os arquivos otimizados para produção:

```bash
npm run build
```

Os arquivos serão gerados na pasta `dist/`. O tema WordPress detectará automaticamente o modo de produção e carregará os assets da pasta `dist/`.

## Estrutura

- `assets/js/main.js` - Arquivo JavaScript principal
- `assets/scss/styles.scss` - Arquivo SCSS principal com Tailwind
- `dist/` - Arquivos compilados (gerados automaticamente)
- `vite.config.js` - Configuração do Vite
- `tailwind.config.js` - Configuração do Tailwind CSS
- `postcss.config.js` - Configuração do PostCSS

## Classes Tailwind

O tema usa Tailwind CSS em vez de Bootstrap. As classes principais usadas:

- Container: `container mx-auto px-4`
- Grid: `flex flex-wrap` com `w-full`, `w-1/2`, `w-1/3`, `md:w-1/3`, etc.
- Espaçamento: `py-4`, `mb-5`, `px-4`, etc.
- Display: `block`, `hidden`, `flex`
- Cores: `text-primary`, `bg-primary`, `text-dark-gray`, etc.

## Notas

- O tema detecta automaticamente se está em desenvolvimento ou produção
- Em desenvolvimento, os assets são carregados do servidor Vite
- Em produção, os assets são carregados da pasta `dist/`
- O arquivo `dist/.vite/manifest.json` é usado para mapear os arquivos em produção
