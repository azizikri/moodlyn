#!/bin/bash

# Moodlyn Docker Deployment Script
echo "🚀 Starting Moodlyn deployment..."

# Check if Docker is running
if ! docker info > /dev/null 2>&1; then
    echo "❌ Docker is not running. Please start Docker and try again."
    exit 1
fi

# Stop existing containers
echo "🛑 Stopping existing containers..."
docker-compose down

# Build and start containers
echo "🔨 Building and starting containers..."
docker-compose up --build -d

# Wait for containers to be ready
echo "⏳ Waiting for containers to be ready..."
sleep 10

echo "✅ Deployment complete!"
echo "🌐 Your application should be available"
echo "📊 Check container status with: docker-compose ps"
echo "📋 View logs with: docker-compose logs -f app"
