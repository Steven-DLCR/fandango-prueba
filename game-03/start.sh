#!/bin/bash

# Build Docker Image
docker build --tag gilded-rose .

# Run Container
docker run \
	--detach \
	--interactive \
	--tty \
	--volume $(pwd):/opt/project \
	--name gilded-rose \
	gilded-rose

# Install dependencies
docker exec gilded-rose composer install