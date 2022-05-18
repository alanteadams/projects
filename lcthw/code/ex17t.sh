#!/bin/zsh
set -e

echo "Creating database..."
./ex17sss db.dat c

echo "Saving zed, frank, joe to database..."
./ex17sss db.dat s 1 zed zed@zedshaw.com password123 facebook.com
./ex17sss db.dat s 2 frank frank@zedshaw.com password123 google.com
./ex17sss db.dat s 3 joe joe@zedshaw.com password123 yahoo.com

echo "Printing all records..."
./ex17sss db.dat l

echo "Deleting record by id 3..."
./ex17sss db.dat d 3

echo "Printing all records..."
./ex17sss db.dat l

echo "Getting record by id 2 ..."
./ex17sss db.dat g 2

echo "Finding google.com keyword..."
./ex17sss db.dat f google.com

echo "Ok."

