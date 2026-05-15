# Deployment Guide

This Laravel application is now configured for Docker-based deployment.

## Recommended deployment

Use a Docker-compatible hosting provider such as Render, Railway, or any VPS.

### Deploy using Render

1. Push your repository to GitHub.
2. Create a new Render Web Service.
3. Choose `Docker` as the environment.
4. Set the build branch to `main`.
5. Set the `Dockerfile` path to `Dockerfile`.
6. Configure environment variables:
   - `APP_KEY` (generate a 32-character key)
   - `APP_ENV=production`
   - `APP_DEBUG=false`
   - `APP_URL=https://<your-domain>`
   - `DB_CONNECTION=mysql`
   - `DB_HOST=<host>`
   - `DB_PORT=<port>`
   - `DB_DATABASE=<database>`
   - `DB_USERNAME=<username>`
   - `DB_PASSWORD=<password>`
   - `SESSION_DRIVER=cookie`

### Deploy using Docker locally

Build image:

```bash
docker build -t technologialaravelapp .
```

Run container:

```bash
docker run -p 8080:80 \
  -e APP_ENV=production \
  -e APP_DEBUG=false \
  -e APP_KEY="base64:$(php -r 'echo base64_encode(random_bytes(32));')" \
  -e DB_CONNECTION=mysql \
  -e DB_HOST=<host> \
  -e DB_PORT=<port> \
  -e DB_DATABASE=<database> \
  -e DB_USERNAME=<username> \
  -e DB_PASSWORD=<password> \
  technologialaravelapp
```

Open `http://localhost:8080`.

## Notes

- This setup builds frontend assets with `npm run build`.
- The Docker image uses `php:8.2-apache` and installs required PHP extensions.
- The `render.yaml` file is provided for easy Render deployment.
