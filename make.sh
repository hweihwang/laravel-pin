#!/bin/bash

set -e

if test ! -e ./.env -a ! -L ./.env; then
  echo "Copying the docker config .env"
  cp -f ./.env.dist ./.env
fi

if test ! -e ./app/.env -a ! -L ./app/.env; then
  echo "Copying the application config .env"
  cp -f ./app/.env.dist ./app/.env
fi

docker compose up -d