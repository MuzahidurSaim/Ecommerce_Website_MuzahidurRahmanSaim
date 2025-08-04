#!/bin/bash

# Headline required
if [ -z "$1" ]; then
  echo "Usage: ./add_commit_push.sh \"Headline\" [\"Detailed description\"]"
  exit 1
fi

# Stage all changes
git add .

# Commit with headline and optional body
if [ -z "$2" ]; then
  git commit -m "$1"
else
  git commit -m "$1" -m "$2"
fi

# Push to GitHub
git push