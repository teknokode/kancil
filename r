#!/usr/bin/env bash

str="$*"

git pull 
git add .
git commit -m "$str"
git push origin 

