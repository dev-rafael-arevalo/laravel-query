# Laravel Query Documentation

## Introduction

This API provides endpoints for interacting with a database of users and orders. The API is built using Laravel and provides a RESTful interface for performing CRUD operations and querying data.

## Base URL
http://your-domain.com/api/v1

## Endpoints

| Method | Endpoint | Description |
|---|---|---|
| POST | /task/1 | Creates 5 sample users and orders |
| GET | /task/2 | Gets all orders for user with ID 2 |
| GET | /task/3 | Gets all orders with user details |
| GET | /task/4 | Gets orders with total between $100 and $250 |
| GET | /task/5 | Gets users whose names start with 'R' |
| GET | /task/6 | Gets the total number of orders for user with ID 5 |
| GET | /task/7 | Gets all orders ordered by total descending |
| GET | /task/8 | Gets the total sum of all orders |
| GET | /task/9 | Gets the cheapest order with user details |
| GET | /task/10 | Gets products, quantity, and total for each order, grouped by user |

## Authentication
* **Note:** Currently, this API does not require authentication. Implement authentication (e.g., API tokens, OAuth) as needed.

## Error Handling
* **HTTP Status Codes:** Standard HTTP status codes are used to indicate success or errors.
