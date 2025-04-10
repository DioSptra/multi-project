#!/bin/bash

# Exit on error
set -e

# Update package index
echo "Updating package index..."
sudo apt update

# Install required packages
echo "Installing prerequisite packages..."
sudo apt install -y apt-transport-https ca-certificates curl software-properties-common

# Add Docker's official GPG key
echo "Adding Docker GPG key..."
curl -fsSL https://download.docker.com/linux/ubuntu/gpg | sudo gpg --dearmor -o /usr/share/keyrings/docker-archive-keyring.gpg

# Add Docker APT repository
echo "Adding Docker repository..."
echo "deb [arch=$(dpkg --print-architecture) signed-by=/usr/share/keyrings/docker-archive-keyring.gpg] https://download.docker.com/linux/ubuntu $(lsb_release -cs) stable" | sudo tee /etc/apt/sources.list.d/docker.list > /dev/null

# Update again
sudo apt update

apt-cache policy docker-ce
# Install Docker CE (Community Edition)
echo "Installing Docker..."
sudo apt install -y docker-ce

# Enable and start Docker
echo "Enabling and starting Docker..."
sudo systemctl enable docker
sudo systemctl start docker

# Show Docker version
sudo docker --version

echo "Docker installation completed successfully."