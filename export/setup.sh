#!/usr/bin/env bash
#
# Mokhetle Attorneys Inc. — one-command WordPress setup + DB export.
#
# Prerequisites: Docker + Docker Compose, and `docker compose up -d` already run
# from the repo root (starts WordPress + MariaDB + a wp-cli container).
#
# What it does:
#   1. Waits for the database.
#   2. Installs WordPress (admin / mokhetle-admin).
#   3. Sets pretty permalinks.
#   4. Activates the Mokhetle Attorneys theme — its activation routine creates
#      all pages (with the right templates), the primary menu, and the static
#      front page automatically.
#   5. Exports a real MySQL dump to export/mokhetle-db.sql (the "DB" deliverable).
#
# Re-runnable: skips install if WordPress is already installed.

set -euo pipefail

SITE_URL="${SITE_URL:-http://localhost:8080}"
TITLE="Mokhetle Attorneys Inc."
ADMIN_USER="admin"
ADMIN_PASS="mokhetle-admin"
ADMIN_EMAIL="info@mokhetleinc.co.za"

wp() { docker compose run --rm cli wp --path=/var/www/html "$@"; }

echo "==> Waiting for the database…"
until wp db check >/dev/null 2>&1; do
  sleep 3
  echo "    …still waiting"
done

if wp core is-installed >/dev/null 2>&1; then
  echo "==> WordPress already installed — skipping core install."
else
  echo "==> Installing WordPress…"
  wp core install \
    --url="$SITE_URL" \
    --title="$TITLE" \
    --admin_user="$ADMIN_USER" \
    --admin_password="$ADMIN_PASS" \
    --admin_email="$ADMIN_EMAIL" \
    --skip-email
fi

echo "==> Setting pretty permalinks…"
wp rewrite structure '/%postname%/' --hard
wp rewrite flush --hard

echo "==> Activating the Mokhetle Attorneys theme (auto-creates pages, menu, front page)…"
wp theme activate mokhetle-attorneys

echo "==> Verifying pages were created…"
wp post list --post_type=page --fields=ID,post_name,post_status --format=table

echo "==> Exporting the database to export/mokhetle-db.sql…"
wp db export /export/mokhetle-db.sql

echo ""
echo "Done."
echo "  Site:  $SITE_URL"
echo "  Admin: $SITE_URL/wp-admin  ($ADMIN_USER / $ADMIN_PASS)"
echo "  DB dump: export/mokhetle-db.sql"
