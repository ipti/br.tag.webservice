<h1 align="center">
    TAG-CMDCA-API
</h1>

<p>Api REST criada para prover serviços ao módulo do TAG para o Conselho Municipal da Criança e do Adolescente (CMDCA).</p>


## Endpoints:

#### Criando usuários:

<p> POST on /register </p>

```js
{
    name:string
    email:string
    password:string
}
```

#### Autenticando usuários:

<p> POST on /authenticate </p>

```js
{
    email:string
    password:string
}
```
** Os tokens de acesso gerados expiram em 8 horas.
