#!/bin/bash

# If
#   (not within Vagrant Guest OS) and (not within Travis)
# then
#    exit 1

if [ `whoami` != "vagrant" ] && [ `whoami` != "travis" ];
then
    echo The command should be executed within the guest OS!
    exit 1
fi

php app/console cache:clear --env=prod
php app/console cache:warmup --env=prod

mysql -u root < 00-extra/db/create-empty-database.sql
php app/console doctrine:schema:update --force

php app/console doctrine:fixtures:load -n
php app/console fos:user:create admin admin@example.net loremipsum --super-admin
