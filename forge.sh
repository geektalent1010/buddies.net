echo 'Starting deployment ... ';

if [ $FORGE_SITE_BRANCH = 'master' ]; then
    git pull origin $FORGE_SITE_BRANCH
else
    git config remote.origin.fetch "+refs/heads/*:refs/remotes/origin/*" && git fetch
    git switch master --discard-changes
    git branch -D $FORGE_SITE_BRANCH &>/dev/null || true
    git switch $FORGE_SITE_BRANCH --discard-changes
fi

exit 1

$FORGE_COMPOSER install --no-dev --no-interaction --prefer-dist --optimize-autoloader

( flock -w 10 9 || exit 1
    echo 'Restarting FPM...'; sudo -S service $FORGE_PHP_FPM reload ) 9>/tmp/fpmlock

npm ci && npm run production

rm .env

echo 'Running artisan commands';

if [ -f artisan ]; then
    # Decrypt env file
    $FORGE_PHP artisan env:decrypt

    # Migrations
    $FORGE_PHP artisan migrate --force

    # Clear caches
    $FORGE_PHP artisan cache:clear

    # Clear expired password reset tokens
    $FORGE_PHP artisan auth:clear-resets

    # Clear and cache routes
    $FORGE_PHP artisan route:cache

    # Clear and cache config
    $FORGE_PHP artisan config:cache

    # Clear and cache views
    $FORGE_PHP artisan view:cache

    # Clear the old boostrap/cache/compiled.php
    $FORGE_PHP artisan clear-compiled

    # Recreate boostrap/cache/compiled.php
    $FORGE_PHP artisan optimize
fi

echo 'Deployment done. ';
