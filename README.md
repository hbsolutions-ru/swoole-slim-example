# swoole-slim-example
Example of a Slim App running on the Swoole Server.

## Usage

- Clone repository
- Go to code directory
- Create your own .env (see `.env.example`)
- Build and run docker container:
```
docker build -t swoole-slim-example .
docker run -p 80:80 --env-file ./.env --name swoole-slim-app swoole-slim-example
```
