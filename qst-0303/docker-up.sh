#!/bin/bash
docker network create reverse-proxy-network
cd ./aaa
docker compose up --build -d
cd ../bbb
docker compose up --build -d
cd ../reverse-proxy
docker compose up --build -d