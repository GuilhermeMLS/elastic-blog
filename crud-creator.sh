#!/usr/bin/env bash

MODEL_NAME="$1";

php artisan make:migration Create${MODEL_NAME}sTable

php artisan make:model ${MODEL_NAME}

php artisan make:request ${MODEL_NAME}Request

php artisan make:resource ${MODEL_NAME}Resource

php artisan make:controller ${MODEL_NAME}Controller --resource


