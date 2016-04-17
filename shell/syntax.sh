#!/bin/bash
for (( i = 0; i < 4; i++ )); do
    echo success;
    sleep 1
done

# shell 实现多进程
for (( i = 0; i < 4; i++ )); do
    {
        echo success; sleep 1
    }&
done
