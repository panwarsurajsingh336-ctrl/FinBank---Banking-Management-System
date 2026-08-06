# Deploy FinBank to Render

FinBank is a Laravel/PHP application, not a static Vite site. Deploy it as a
Docker web service. The Vite output in `public/build` contains only frontend
assets and cannot run Laravel by itself.

## Recommended: Render Blueprint

1. Commit and push `Dockerfile`, `docker/start-render.sh`, `.dockerignore`, and
   `render.yaml` to GitHub.
2. Delete the failed **Static Site** in Render. A Render service cannot be
   changed from `static` to `docker` after it has been created.
3. In Render, select **New > Blueprint**, connect this repository, and deploy
   the `render.yaml` Blueprint.
4. When prompted, set `APP_KEY` to the output of
   `php artisan key:generate --show`. For `APP_URL` and `ASSET_URL`, enter the
   web-service URL Render assigns, such as `https://finbank.onrender.com` (no
   trailing slash).

The Blueprint creates a Docker web service and a PostgreSQL database. On every
start, the container runs Laravel's migrations and optimization commands before
starting Apache.

## Manual alternative

Create a **Web Service** (not a Static Site), select **Docker** as the runtime,
and leave the Dockerfile path as `./Dockerfile`. Create a Render PostgreSQL
database and configure these environment variables:

| Key | Value |
| --- | --- |
| `APP_KEY` | Output of `php artisan key:generate --show` |
| `APP_URL` | Your `https://...onrender.com` URL |
| `ASSET_URL` | The same Render URL |
| `DB_CONNECTION` | `pgsql` |
| `DB_URL` | The database's internal connection string |
| `SESSION_DRIVER` | `database` |
| `CACHE_STORE` | `database` |
| `APP_ENV` | `production` |
| `APP_DEBUG` | `false` |

Do not configure a build command, start command, or publish directory for the
Docker service; the Docker image supplies them.
