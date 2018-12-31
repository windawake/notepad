//编译c

docker run --rm -v "$PWD":/code -w /code gcc:latest gcc -o demo demo.c

//编译go

docker run --rm -v "$PWD":/code -w /code golang:latest go run demo.go

