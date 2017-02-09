#!/bin/bash

export DEV_UID=$(id -u)
export DEV_GID=$(id -g)

cd docker && docker-compose exec php php bin/console $@
