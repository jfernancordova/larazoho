# Larazoho

[![Build Status](https://travis-ci.org/jfernancordova/docker-laravel-api-dev.svg?branch=master)](https://travis-ci.org/jfernancordova/docker-laravel-api-dev)
[![License](https://img.shields.io/badge/License-MIT-yellow.svg)](https://opensource.org/licenses/MIT)

A Laravel API Boilerplate For Zoho CRM.

* Accounts Module
* Contacts Module
* Leads Module
* Potentials Module

Clone this repository and follow the basic structure!.

## Basic Structure

* Config: in the .env, the value `ZOHO_CRM_AUTH_TOKEN` must be set to connect a Zoho CRM account to this boilerplate, however you can set it in the config/zoho directly.
    * [Reference](https://www.zoho.com/crm/help/api/using-authentication-token.html#Generate_Auth_Token)

* Controllers: For each module, there is a controller with a simple CRUD to process the data from ZOHO CRM.

* Services:  
    * ZohoKeysModules: This class is a stack of constants, in which parser the information from ZOHO CRM to this boilerplate.
    * ZohoManager: This class is a stack of methods to interact through a Library that get all the records and process them.
    * ZohoSync: This is a simple class to sync all modules through loop while and given condition, you can connect it with a WebHook from Zoho CRM and get the records every time a data is added, updated or deleted. In the route/api the second parameter can be set by a module, it can be executed and all the records will be sent in the database.
    
* Transformers: They are used to display the information given request, you can add or deleted value for any module in its controller.

* Cron: This project has service (docker-compose-dev.yml) that works to get all the records without the webhooks from Zoho CRM, only needs to set the time to call the endpoints.

## How to deploy this boilerplate

This project uses a containerized Laravel API development environment, in which has instructions and different ways to deploy and test.

[docker-laravel-api-dev](https://github.com/jfernancordova/docker-laravel-api-dev)

## Contributors

* [José Córdova](https://github.com/jfernancordova)
* [Cristian Pontes](https://github.com/cristianpontes)

