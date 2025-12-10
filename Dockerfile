FROM ubuntu:latest
LABEL authors="lazaaq"

ENTRYPOINT ["top", "-b"]
