# Turborepo Playground

A monorepo playground demonstrating the integration of Laravel, Next.js, and a shared API client package.

## Project Overview

This playground demonstrates:

- **Turborepo** for managing a monorepo with multiple projects
- **Laravel Backend**: Exposes REST APIs and Inertia pages
- **Next.js Frontend**: Consumes the Laravel APIs
- **Shared API Client**: Package for Next.js to call Laravel APIs

## Custom Packages

This project showcases the usage of:

- [martinpham/laravel-type-generator](https://github.com/martinpham/laravel-type-generator): Automatically generates TypeScript types from Laravel routes
- [martinpham/laravel-inertia-attributes](https://github.com/martinpham/laravel-inertia-attributes): Enhances Laravel Inertia integration with attribute-based render

## Data Model

The project implements a simple garage management system:
- User has one Car
- Car has one Plate
- Car belongs to a Mechanic

## Features

### Laravel Backend
- Exposes 3 REST APIs:
  - List of cars
  - Get car info
  - Get user info
- Provides 3 Inertia pages with the same functionality
- Watches for changes in controllers and models to automatically:
  - Generate OpenAPI specification
  - Create Inertia pageprops type hints

### Next.js Frontend
- 3 pages consuming the Laravel APIs:
  - List of cars
  - Car details
  - User information

## Getting Started

This project uses Nix for development environment setup.

### Prerequisites
- Install Nix package manager

### Setup
1. Clone the repository
2. Navigate to the project directory
3. Run `nix-shell` to enter the development environment

### Development
- Start MySQL: `mysql-start` (or use SQLite)
- Start development servers: `turbo dev`
- Build all projects: `turbo build`