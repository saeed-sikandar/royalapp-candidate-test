# RoyalApps Candidate Test Project.

Welcome to My Awesome Laravel Breeze project! This repository contains the source code for assesment  web application built using Laravel Breeze.

## Table of Contents

- [Getting Started](#getting-started)
  - [Prerequisites](#prerequisites)
  - [Installation](#installation)
  - [Configuration](#configuration)
- [Usage](#usage)


## Getting Started

To get started with this project, follow the steps below.

### Prerequisites

Before you begin, make sure you have the following installed on your machine:

- PHP (>= 8.1)
- Composer
- Node.js
- NPM 

### Installation

1. Clone this repository to your local machine using the following command:

        git clone https://github.com/saeed-sikandar/royalapp-candidate-test.git


2.  Navigate to the project directory:

        cd your-project

3. Install the PHP dependencies:

        composer install
4.  Install the JavaScript dependencies:

        npm install

### Configuration

1. Create a new `.env` file by copying the example file:

        cp .env.example .env
2.  Generate a new application key:

        php artisan key:generate
3. Run the migration and seed data:

        php artisan migrate --seed

### Usage

To run the development server, execute the following command:

    php artisan serve
