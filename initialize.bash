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

WHOAMI=`whoami`

echo "VARIABLE: ${WHOAMI}"

sudo mkdir -p /app/symfony2app/app/cache
sudo mkdir -p /app/symfony2app/app/logs
sudo mkdir -p /app/symfony2app/app/cache/sessions
sudo mkdir -p /app/symfony2app/vendor

sudo chmod -R 0777 /app/symfony2app
sudo chown -R "${WHOAMI}:${WHOAMI}" /app/symfony2app

