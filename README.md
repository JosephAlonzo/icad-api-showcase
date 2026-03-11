# icad-api-showcase

> Personal project built as a proactive initiative to demonstrate backend skills
> and genuine interest in joining the I-CAD team.
> Not requested, not affiliated — just motivated.

## 🐾 I-CAD — REST API

Unofficial backend implementation for the I-CAD platform (French national pet identification system). Built with Symfony 7 + Doctrine ORM as a companion to the [frontend redesign](https://github.com/JosephAlonzo/icad-frontend-showcase), demonstrating full-stack motivation and technical skills.

## Stack

- PHP 8.2+
- Symfony 7
- Doctrine ORM
- PostgreSQL
- Symfony MakerBundle

## What's inside

- Entity modeling based on I-CAD's domain (animals, owners, identification)
- RESTful endpoints for the frontend to consume
- Doctrine migrations for database versioning
- Clean architecture following Symfony best practices

## Project Setup

### Requirements

- PHP 8.2+
- Composer
- PostgreSQL

### Install dependencies

```bash
composer install
```

### Configure environment

Copy `.env` and set your database credentials:

```bash
cp .env .env.local
```

```env
DATABASE_URL="postgresql://user:password@127.0.0.1:5432/icad"
```

### Create database & run migrations

```bash
php bin/console doctrine:database:create
php bin/console doctrine:migrations:migrate
```

### Start development server

```bash
symfony server:start
```

## Related

- 🖥️ Frontend: [icad-frontend-showcase](https://github.com/JosephAlonzo/icad-frontend-showcase) — Vue 3 + TypeScript + Vuetify

---

> Not affiliated with I-CAD. Built as a personal initiative to showcase skills.
