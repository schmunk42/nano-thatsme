#!/usr/bin/env bash

set -e

# Create tagged image from git tag
LATEST_TAG=$(git describe --abbrev=0)
CURRENT_VERSION=$(git describe)

# Login to registry
docker login --username="${REGISTRY_USER}" --password="${REGISTRY_PASS}" --email reg@h17n.de "${REGISTRY_HOST}"

# Create and push :latest
docker tag -f "${COMPOSE_PROJECT_NAME}_php" "${IMAGE_NAME}":latest
docker push "${IMAGE_NAME}":latest

# Create and push :<CURRENT_VERSION>
if [ "$LATEST_TAG" = "$CURRENT_VERSION" ]; then
    echo "Stable tag $CURRENT_VERSION detected, tagging image..."
    docker tag "${COMPOSE_PROJECT_NAME}_php" "${IMAGE_NAME}":"${CURRENT_VERSION}"
    docker push "${IMAGE_NAME}:${CURRENT_VERSION}"
    echo "Image pushed to registry."
else
    echo "No stable tag found."
fi;

exit 0