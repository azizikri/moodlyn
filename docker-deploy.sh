#!/bin/bash

# Moodlyn Docker Deployment Script
echo "🚀 Starting Moodlyn deployment..."

# Check if Docker is running
if ! docker info > /dev/null 2>&1; then
    echo "❌ Docker is not running. Please start Docker and try again."
    exit 1
fi

# Create necessary directories on host with proper permissions
echo "📁 Creating necessary directories..."
mkdir -p storage/logs
mkdir -p storage/framework/cache/data
mkdir -p storage/framework/sessions
mkdir -p storage/framework/views
mkdir -p bootstrap/cache

# Stop existing containers
echo "🛑 Stopping existing containers..."
docker compose down

# Remove old database volume if exists (optional - comment out to preserve data)
# echo "🗑️ Removing old database volume..."
# docker volume rm moodlyn_database_data 2>/dev/null || true

# Build and start containers
echo "🔨 Building and starting containers..."
docker compose up --build -d

# Wait for containers to be ready
echo "⏳ Waiting for containers to be ready..."
sleep 15

# Check if the application is responding
echo "🔍 Checking application status..."
if curl -f http://localhost:80 > /dev/null 2>&1; then
    echo "✅ Application is responding!"
else
    echo "⚠️ Application might not be ready yet. Check logs below:"
    docker compose logs app | tail -20
fi

echo "✅ Deployment complete!"
echo "🌐 Your application should be available at: http://localhost:80"
echo "📊 Check container status with: docker compose ps"
echo "📋 View logs with: docker-compose logs -f app"
echo "🔧 For development mode, use: docker-compose -f docker-compose.yml -f docker-compose.dev.yml up --build"
